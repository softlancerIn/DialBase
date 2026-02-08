<template>
    <div class="scraper-container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label class="mb-1">Select Category</label>
                    <select v-model="categoryId" class="form-control rounded" required>
                        <option value="">-- Select Category --</option>
                        <option v-for="category in categories" :key="category.id" :value="category.id">
                            {{ category.name }}
                        </option>
                    </select>
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-2">
                <div class="form-group">
                    <label class="mb-1">Scraping Mode</label>
                    <div class="d-flex gap-3">
                        <label class="d-flex align-items-center gap-1">
                            <input type="radio" v-model="mode" value="auto"> Automatic (Proxy)
                        </label>
                        <label class="d-flex align-items-center gap-1">
                            <input type="radio" v-model="mode" value="manual"> Manual (Paste HTML)
                        </label>
                    </div>
                </div>
            </div>

            <div v-if="mode === 'auto'" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-2">
                <div class="form-group">
                    <label class="mb-1">Website URL (JustDial Category URL)</label>
                    <input type="text" v-model="url" class="form-control rounded"
                        placeholder="https://www.justdial.com/..." required>
                    <small class="text-muted">We will try to fetch this via a proxy. If it fails, use Manual mode.</small>
                </div>
            </div>

            <div v-if="mode === 'manual'" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-2">
                <div class="form-group">
                    <label class="mb-1">Paste Page HTML Source</label>
                    <textarea v-model="manualHtml" class="form-control rounded" rows="8" 
                        placeholder="Right-click on JustDial page -> View Page Source -> Copy All -> Paste here"></textarea>
                    <small class="text-muted">Open the JustDial URL in your browser, view source (Ctrl+U), copy everything and paste here.</small>
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3">
                <div class="form-group">
                    <button @click="startScraping" :disabled="loading" class="btn theme-bg text-light rounded">
                        <span v-if="loading"><i class="fa fa-spinner fa-spin"></i> Processing...</span>
                        <span v-else>{{ mode === 'auto' ? 'Scrape & Add Listings' : 'Parse & Add Listings' }}</span>
                    </button>
                </div>
            </div>
        </div>

        <div v-if="message" :class="['alert', messageType === 'success' ? 'alert-success' : 'alert-danger', 'mt-3']">
            <div v-html="message"></div>
        </div>

        <div v-if="progress > 0" class="progress mt-3">
            <div class="progress-bar" role="progressbar" :style="{ width: progress + '%' }" :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100">
                {{ progress }}%
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    props: {
        categories: {
            type: Array,
            required: true
        },
        storeUrl: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            categoryId: '',
            url: '',
            mode: 'auto',
            manualHtml: '',
            loading: false,
            message: '',
            messageType: '',
            progress: 0
        };
    },
    methods: {
        async startScraping() {
            if (!this.categoryId) {
                this.showMessage('Please select a category.', 'error');
                return;
            }

            if (this.mode === 'auto' && !this.url) {
                this.showMessage('Please provide a URL.', 'error');
                return;
            }

            if (this.mode === 'manual' && !this.manualHtml) {
                this.showMessage('Please paste the HTML source.', 'error');
                return;
            }

            this.loading = true;
            this.message = '';
            this.progress = 0;

            try {
                let html = '';
                if (this.mode === 'auto') {
                    html = await this.fetchWithProxy();
                } else {
                    html = this.manualHtml;
                }

                const listings = this.parseHtml(html);

                if (listings.length === 0) {
                    throw new Error('No listings found. If you are using Manual mode, make sure you copied the full page source.');
                }

                // Send data to backend
                await this.sendDataToBackend(listings);

            } catch (error) {
                console.error(error);
                this.showMessage(error.message || 'An error occurred.', 'error');
            } finally {
                this.loading = false;
            }
        },

        async fetchWithProxy() {
            // Try corsproxy.io first as it's often more reliable for JustDial
            const proxies = [
                `https://corsproxy.io/?url=${encodeURIComponent(this.url)}`,
                `https://api.allorigins.win/get?url=${encodeURIComponent(this.url)}`
            ];

            let lastError = null;
            for (const proxyUrl of proxies) {
                try {
                    const response = await axios.get(proxyUrl);
                    let content = '';
                    
                    if (proxyUrl.includes('allorigins')) {
                        content = response.data.contents;
                    } else {
                        content = response.data;
                    }

                    if (content && content.includes('Access Denied')) {
                        throw new Error('Proxy returned "Access Denied" from JustDial. Please try Manual mode.');
                    }

                    if (content) return content;
                } catch (e) {
                    lastError = e;
                }
            }

            throw new Error(`Automatic scraping failed (Access Denied). JustDial is blocking our proxies. <br><strong>Please switch to "Manual (Paste HTML)" mode above.</strong>`);
        },

        parseHtml(html) {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');

            const listings = [];
            const listingNodes = doc.querySelectorAll('.resultbox_info');

            listingNodes.forEach(node => {
                const titleNode = node.querySelector('.resultbox_title_anchor');
                const title = titleNode ? titleNode.textContent.trim() : null;

                const anchorNode = node.querySelector('.resultbox_title_anchorbox');
                const link = anchorNode ? anchorNode.getAttribute('href') : null;

                const ratingNode = node.querySelector('.resultbox_totalrate');
                const rating = ratingNode ? ratingNode.textContent.trim() : null;

                const voteNode = node.querySelector('.resultbox_countrate');
                const votes = voteNode ? voteNode.textContent.trim() : null;

                const addressNode = node.querySelector('.locatcity');
                const address = addressNode ? addressNode.textContent.trim() : null;

                const phoneNode = node.querySelector('.callcontent');
                const phone = phoneNode ? phoneNode.textContent.trim() : null;

                let image = null;
                const imgNodes = node.querySelectorAll('.resultbox_image img');
                for (let img of imgNodes) {
                    const src = img.getAttribute('src');
                    if (src && src.startsWith('http')) {
                        image = src;
                        break;
                    }
                }

                const amenities = [];
                node.querySelectorAll('.amenities_tabs').forEach(subNode => {
                    amenities.push(subNode.textContent.trim());
                });

                if (title) {
                    listings.push({
                        title,
                        link,
                        rating,
                        votes,
                        address,
                        phone,
                        image,
                        amenities
                    });
                }
            });

            return listings;
        },

        async sendDataToBackend(listings) {
            this.progress = 10;
            try {
                const response = await axios.post(this.storeUrl, {
                    category_id: this.categoryId,
                    listings: listings
                });

                if (response.data.success) {
                    this.showMessage(response.data.message, 'success');
                    this.progress = 100;
                } else {
                    this.showMessage(response.data.message || 'Failed to save listings.', 'error');
                }
            } catch (error) {
                console.error(error);
                this.showMessage('Failed to send data to server.', 'error');
            }
        },

        showMessage(msg, type) {
            this.message = msg;
            this.messageType = type;
        }
    }
};
</script>

<style scoped>
.scraper-container {
    padding: 10px 0;
}
.gap-3 { gap: 1rem; }
.gap-1 { gap: 0.25rem; }
</style>
