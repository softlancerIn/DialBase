@extends('web.layout.main')

@section('title', 'Terms & Conditions | Aboutfirms')
@section('meta_description', 'Read the Terms & Conditions governing the use of Aboutfirms, the B2B directory platform.
    Learn about eligibility, accounts, listings, subscriptions, and your rights.')
@section('meta_keywords', 'Terms and Conditions, Terms, Aboutfirms terms, B2B directory terms, subscription terms, user
    agreement')
@section('meta_robots', 'index,follow')

@section('content')
    <!-- Breadcrumb -->
    <div class="gray py-3">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">/ Terms &amp; Conditions</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10 col-md-12">
                    <div class="text-center">
                        <h1 class="ft-bold mb-3">{{ $seoData->page_title ?? 'Terms & Conditions' }}</h1>
                        <p class="lead text-muted">{!! $seoData->page_sort_description ??
                            'Welcome to Aboutfirms. By accessing or using our B2B directory platform, you agree to be bound by these Terms and Conditions. Please read them carefully.' !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Terms Content -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10 col-md-12">
                    <div class="abt_caption">

                        <!-- Section 1 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">1. Acceptance of Terms</h3>
                            <p>By creating an account, listing your company, or using any of our services, you acknowledge
                                that you have read, understood, and agree to be bound by these Terms and Conditions, along
                                with our Privacy Policy. If you do not agree, please discontinue use of our platform
                                immediately.</p>
                        </div>

                        <!-- Section 2 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">2. Eligibility</h3>
                            <ul>
                                <li>You must be at least 18 years old and legally capable of entering into binding
                                    contracts.</li>
                                <li>You represent that all information provided during registration is accurate, complete,
                                    and current.</li>
                                <li>You must be authorized to represent the company you are listing or acting on behalf of.
                                </li>
                            </ul>
                        </div>

                        <!-- Section 3 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">3. User Accounts</h3>

                            <h5 class="ft-medium mb-2">Registration</h5>
                            <ul class="mb-3">
                                <li>You are responsible for maintaining the confidentiality of your account credentials.
                                </li>
                                <li>You agree to notify us immediately of any unauthorized access or security breach.</li>
                                <li>One account per company/business entity unless otherwise agreed.</li>
                            </ul>

                            <h5 class="ft-medium mb-2">Account Responsibilities</h5>
                            <ul>
                                <li>All activities under your account are your responsibility.</li>
                                <li>You must not share login credentials with unauthorized parties.</li>
                                <li>We reserve the right to suspend or terminate accounts that violate these terms.</li>
                            </ul>
                        </div>

                        <!-- Section 4 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">4. Company Listings</h3>

                            <h5 class="ft-medium mb-2">Listing Guidelines</h5>
                            <ul class="mb-3">
                                <li>All information provided must be accurate, truthful, and up-to-date.</li>
                                <li>You must have the legal right to list and represent the company.</li>
                                <li>Listings must not contain false, misleading, or deceptive information.</li>
                                <li>You are responsible for updating your listing information regularly.</li>
                            </ul>

                            <h5 class="ft-medium mb-2">Prohibited Content</h5>
                            <ul>
                                <li>Illegal products or services</li>
                                <li>Fraudulent or misleading claims</li>
                                <li>Copyrighted material without authorization</li>
                                <li>Offensive, defamatory, or discriminatory content</li>
                                <li>Competitor disparagement or false comparisons</li>
                                <li>Malware, viruses, or malicious links</li>
                                <li>Spam or irrelevant information</li>
                            </ul>
                        </div>

                        <!-- Section 5 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">5. Verification Process</h3>
                            <ul>
                                <li>We may verify company information before approval.</li>
                                <li>Verification does not guarantee the quality, reliability, or legitimacy of listed
                                    companies.</li>
                                <li>We reserve the right to reject or remove any listing at our discretion.</li>
                                <li>Verified badges indicate completion of our verification process only.</li>
                            </ul>
                        </div>

                        <!-- Section 6 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">6. Subscription Plans &amp; Payments</h3>

                            <h5 class="ft-medium mb-2">Billing</h5>
                            <ul class="mb-3">
                                <li>Subscription fees are charged in advance on a monthly or annual basis.</li>
                                <li>All prices are listed in the currency specified at checkout.</li>
                                <li>Prices may change with 30 days' notice to active subscribers.</li>
                            </ul>

                            <h5 class="ft-medium mb-2">Refunds</h5>
                            <ul class="mb-3">
                                <li>Monthly subscriptions: No refunds for partial months.</li>
                                <li>Annual subscriptions: Refunds available within 14 days of initial purchase only.</li>
                                <li>Refunds are processed within 10-15 business days.</li>
                            </ul>

                            <h5 class="ft-medium mb-2">Cancellation</h5>
                            <ul class="mb-3">
                                <li>You may cancel your subscription anytime from your account settings.</li>
                                <li>Cancellation takes effect at the end of the current billing period.</li>
                                <li>No refunds for unused time unless specified above.</li>
                            </ul>

                            <h5 class="ft-medium mb-2">Auto-Renewal</h5>
                            <ul>
                                <li>Subscriptions automatically renew unless cancelled before renewal date.</li>
                                <li>You will receive reminder emails before renewal.</li>
                            </ul>
                        </div>

                        <!-- Section 7 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">7. Prohibited Activities</h3>
                            <p class="mb-2">You agree NOT to:</p>
                            <ul>
                                <li>Use the platform for any illegal purposes</li>
                                <li>Scrape, harvest, or copy data without permission</li>
                                <li>Impersonate another company or person</li>
                                <li>Upload viruses or malicious code</li>
                                <li>Spam other users with unsolicited messages</li>
                                <li>Manipulate search rankings through artificial means</li>
                                <li>Create fake reviews or testimonials</li>
                                <li>Share or resell access to your account</li>
                                <li>Reverse engineer or attempt to access our source code</li>
                                <li>Interfere with the platform's functionality</li>
                            </ul>
                        </div>

                        <!-- Section 8 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">8. Intellectual Property</h3>

                            <h5 class="ft-medium mb-2">Our Content</h5>
                            <ul class="mb-3">
                                <li>All platform design, logos, trademarks, and content are owned by [Your Company Name].
                                </li>
                                <li>You may not copy, reproduce, or distribute our content without written permission.</li>
                            </ul>

                            <h5 class="ft-medium mb-2">Your Content</h5>
                            <ul>
                                <li>You retain ownership of the content you upload (company info, logos, images).</li>
                                <li>By uploading content, you grant us a worldwide, non-exclusive license to display,
                                    promote, and distribute it on our platform.</li>
                                <li>You warrant that you have all necessary rights to the content you upload.</li>
                            </ul>
                        </div>

                        <!-- Section 9 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">9. Third-Party Links &amp; Content</h3>
                            <ul>
                                <li>Our platform may contain links to third-party websites.</li>
                                <li>We are not responsible for external content or privacy practices.</li>
                                <li>Interactions with listed companies are solely between you and them.</li>
                                <li>We do not endorse or guarantee any third-party services.</li>
                            </ul>
                        </div>

                        <!-- Section 10 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">10. Disclaimer of Warranties</h3>
                            <p class="mb-2">THE PLATFORM IS PROVIDED "AS IS" AND "AS AVAILABLE" WITHOUT WARRANTIES OF ANY
                                KIND, EITHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO:</p>
                            <ul class="mb-3">
                                <li>Accuracy or reliability of listings</li>
                                <li>Uninterrupted or error-free service</li>
                                <li>Security of data transmission</li>
                                <li>Fitness for a particular purpose</li>
                                <li>Quality of listed companies or their services</li>
                            </ul>

                            <p class="mb-2">We do not guarantee:</p>
                            <ul>
                                <li>The legitimacy of any listed company</li>
                                <li>Successful business connections or outcomes</li>
                                <li>Availability of the platform at all times</li>
                            </ul>
                        </div>

                        <!-- Section 11 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">11. Limitation of Liability</h3>

                            <h5 class="ft-medium mb-2">TO THE MAXIMUM EXTENT PERMITTED BY LAW:</h5>
                            <ul class="mb-3">
                                <li>We are not liable for any direct, indirect, incidental, or consequential damages.</li>
                                <li>Our total liability shall not exceed the amount you paid us in the last 12 months.</li>
                                <li>We are not responsible for disputes between users or with listed companies.</li>
                                <li>We are not liable for data loss, business interruption, or lost profits.</li>
                            </ul>

                            <h5 class="ft-medium mb-2">You agree to indemnify and hold us harmless from any claims, damages,
                                or expenses arising from:</h5>
                            <ul>
                                <li>Your use of the platform</li>
                                <li>Your violation of these terms</li>
                                <li>Your violation of any third-party rights</li>
                            </ul>
                        </div>

                        <!-- Section 12 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">12. Data &amp; Privacy</h3>
                            <ul>
                                <li>We collect and process data as described in our Privacy Policy.</li>
                                <li>By using our platform, you consent to our data practices.</li>
                                <li>We implement reasonable security measures but cannot guarantee absolute security.</li>
                                <li>You are responsible for backing up your own data.</li>
                            </ul>
                        </div>

                        <!-- Section 13 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">13. Termination</h3>

                            <h5 class="ft-medium mb-2">We may terminate or suspend your account if:</h5>
                            <ul class="mb-3">
                                <li>You violate these Terms and Conditions</li>
                                <li>You engage in fraudulent activity</li>
                                <li>You damage our reputation or platform</li>
                                <li>Required by law</li>
                            </ul>

                            <h5 class="ft-medium mb-2">Upon termination:</h5>
                            <ul>
                                <li>Your access to the platform will be revoked immediately</li>
                                <li>Your listing will be removed</li>
                                <li>No refunds will be provided for violations</li>
                                <li>You must cease all use of our platform</li>
                            </ul>
                        </div>

                        <!-- Section 14 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">14. Dispute Resolution</h3>

                            <h5 class="ft-medium mb-2">Governing Law</h5>
                            <p class="mb-3">These terms are governed by the laws of [Your Country/State].</p>

                            <h5 class="ft-medium mb-2">Dispute Process</h5>
                            <ul>
                                <li>Contact us first to resolve issues amicably.</li>
                                <li>If unresolved, disputes will be handled through binding arbitration.</li>
                                <li>You waive the right to participate in class-action lawsuits.</li>
                            </ul>
                        </div>

                        <!-- Section 15 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">15. Jurisdiction</h3>
                            <p>Exclusive jurisdiction lies with courts in [Your City/State].</p>
                        </div>

                        <!-- Section 16 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">16. Modifications to Terms</h3>
                            <ul>
                                <li>We may update these Terms at any time.</li>
                                <li>Material changes will be notified via email or platform announcement.</li>
                                <li>Continued use after changes constitutes acceptance.</li>
                                <li>You are responsible for reviewing terms periodically.</li>
                            </ul>
                        </div>

                        <!-- Section 17 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">17. General Provisions</h3>

                            <h5 class="ft-medium mb-2">Severability</h5>
                            <p class="mb-3">If any provision is found unenforceable, the remaining provisions remain in
                                effect.</p>

                            <h5 class="ft-medium mb-2">No Waiver</h5>
                            <p class="mb-3">Our failure to enforce any right does not waive that right.</p>

                            <h5 class="ft-medium mb-2">Assignment</h5>
                            <p class="mb-3">You may not transfer your account. We may assign our rights without notice.
                            </p>

                            <h5 class="ft-medium mb-2">Entire Agreement</h5>
                            <p class="mb-3">These Terms constitute the entire agreement between you and us.</p>

                            <h5 class="ft-medium mb-2">Force Majeure</h5>
                            <p>We are not liable for delays caused by circumstances beyond our control.</p>
                        </div>

                        <!-- Section 18 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">18. Contact Us</h3>
                            <p class="mb-3">For questions, concerns, or disputes regarding these Terms:</p>

                            <div class="p-4 bg-light rounded">
                                <p class="mb-2"><strong>Email:</strong> sales@aboutfirms.com</p>
                                <p class="mb-2"><strong>Phone:</strong> 9971123025</p>
                                <p class="mb-2"><strong>Address:</strong> 1st Sector, HSR Layout, Bengaluru, Karnataka
                                    560102</p>
                                <p class="mb-0"><strong>Business Hours:</strong> Monday - Friday, 9 AM - 6 PM GMT+5:30
                                </p>
                            </div>
                        </div>

                        <!-- Acknowledgment -->
                        <div class="p-4 bg-light rounded border-left border-primary"
                            style="border-left-width: 4px !important;">
                            <h5 class="ft-medium mb-2">Acknowledgment</h5>
                            <p class="mb-0">By clicking "I Agree" or using our platform, you acknowledge that you have
                                read, understood, and agree to be bound by these Terms and Conditions.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="space bg-cover" style="background:#03343b url(assets/img/landing-bg.png) no-repeat;">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="text-center mb-5">
                        <h6 class="text-light mb-2 text-uppercase">Subscribe Now</h6>
                        <h2 class="ft-bold text-light">Get All Updates &amp; Advance Offers</h2>
                    </div>
                </div>
            </div>

            <div class="row align-items-center justify-content-center">
                <div class="col-xl-7 col-lg-10 col-md-12">
                    <form class="bg-white rounded p-1">
                        <div class="row no-gutters">
                            <div class="col-xl-9 col-lg-9 col-md-8 col-sm-8 col-8">
                                <div class="form-group mb-0 position-relative">
                                    <input type="email" class="form-control b-0"
                                        placeholder="Enter Your Email Address">
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-4">
                                <div class="form-group mb-0 position-relative">
                                    <button class="btn full-width btn-height theme-bg text-light fs-md"
                                        type="submit">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
