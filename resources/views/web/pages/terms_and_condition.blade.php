@extends('web.layout.main')

@section('title', 'Terms & Conditions | Aboutfirms')
@section('meta_description', 'Read the Terms & Conditions governing the use of Aboutfirms, the B2B directory platform. Learn about eligibility, accounts, listings, subscriptions, and your rights.')
@section('meta_keywords', 'Terms and Conditions, Terms, Aboutfirms terms, B2B directory terms, subscription terms, user agreement')
@section('meta_robots', 'index,follow')

@section('content')
    <div class="gray py-3">
        <div class="container">
            <div class="row">
                <div class="colxl-12 col-lg-12 col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Terms &amp; Conditions</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="middle">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-11 col-lg-12 col-md-6 col-sm-12">
                    <div class="abt_caption">
                        <h2 class="ft-medium mb-4">Terms &amp; Conditions</h2>

                        <p>Welcome to Aboutfirms. By accessing or using our B2B directory platform, you agree to be bound by these Terms and Conditions. Please read them carefully.</p>

                        <div>
                            <h4 class="ft-medium heading">1. Acceptance of Terms</h4>
                            <p>By creating an account, listing your company, or using any of our services, you acknowledge that you have read, understood, and agree to be bound by these Terms and Conditions, along with our Privacy Policy. If you do not agree, please discontinue use of our platform immediately.</p>
                        </div>

                        <div>
                            <h4 class="ft-medium heading">2. Eligibility</h4>

                            <ul>
                                <li>
                                    You must be at least 18 years old and legally capable of entering into binding contracts.
                                </li>
                                <li>
                                    You represent that all information provided during registration is accurate, complete, and current.
                                </li>
                                <li>
                                    You must be authorized to represent the company you are listing or acting on behalf of.
                                </li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="ft-medium heading">3. User Accounts</h4>
                            
                            <h6 class="ft-medium">Registration</h6>
                            <ul>
                                <li>You are responsible for maintaining the confidentiality of your account credentials.</li>
                                <li>You agree to notify us immediately of any unauthorized access or security breach.</li>
                                <li>One account per company/business entity unless otherwise agreed.</li>
                            </ul>
                            <br>

                            <h6 class="ft-medium">Account Responsibilities</h6>
                            <ul>
                                <li>All activities under your account are your responsibility.</li>
                                <li>You must not share login credentials with unauthorized parties.</li>
                                <li>We reserve the right to suspend or terminate accounts that violate these terms.</li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="ft-medium heading">4. Company Listings</h4>

                            <h6 class="ft-medium">Listing Guidelines</h6>
                            <ul>
                                <li>All information provided must be accurate, truthful, and up-to-date.</li>
                                <li>You must have the legal right to list and represent the company.</li>
                                <li>Listings must not contain false, misleading, or deceptive information.</li>
                                <li>You are responsible for updating your listing information regularly.</li>
                            </ul>

                            <h6 class="ft-medium">Prohibited Content</h6>
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

                        <div>
                            <h4 class="ft-medium heading">5. Verification Process</h4>

                            <ul>
                                <li>We may verify company information before approval.</li>
                                <li>Verification does not guarantee the quality, reliability, or legitimacy of listed companies.</li>
                                <li>We reserve the right to reject or remove any listing at our discretion.</li>
                                <li>Verified badges indicate completion of our verification process only.</li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="ft-medium heading">6. Subscription Plans &amp; Payments</h4>

                            <h6 class="ft-medium">Billing</h6>
                            <ul>
                                <li>Subscription fees are charged in advance on a monthly or annual basis.</li>
                                <li>All prices are listed in the currency specified at checkout.</li>
                                <li>Prices may change with 30 days' notice to active subscribers.</li>
                            </ul>
                            <br>
                            <h6 class="ft-medium">Refunds</h6>
                            <ul>
                                <li>Monthly subscriptions: No refunds for partial months.</li>
                                <li>Annual subscriptions: Refunds available within 14 days of initial purchase only.</li>
                                <li>Refunds are processed within 10-15 business days.</li>
                            </ul>
                            <br>
                            <h6 class="ft-medium">Cancellation</h6>
                            <ul>
                                <li>You may cancel your subscription anytime from your account settings.</li>
                                <li>Cancellation takes effect at the end of the current billing period.</li>
                                <li>No refunds for unused time unless specified above.</li>
                            </ul>
                            <br>
                            <h6 class="ft-medium">Auto-Renewal</h6>
                            <ul>
                                <li>Subscriptions automatically renew unless cancelled before renewal date.</li>
                                <li>You will receive reminder emails before renewal.</li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="ft-medium heading">7. Prohibited Activities</h4>
                            <ul>
                                <li>You agree NOT to:</li>
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

                        <div>
                            <h4 class="ft-medium heading">8. Intellectual Property</h4>
                            <h6 class="ft-medium">Our Content</h6>
                            <ul>
                                <li>All platform design, logos, trademarks, and content are owned by [Your Company Name].</li>
                                <li>You may not copy, reproduce, or distribute our content without written permission.</li>
                            </ul>
                            <br>
                            <h6 class="ft-medium">Your Content</h6>
                            <ul>
                                <li>You retain ownership of the content you upload (company info, logos, images).</li>
                                <li>By uploading content, you grant us a worldwide, non-exclusive license to display, promote, and distribute it on our platform.</li>
                                <li>You warrant that you have all necessary rights to the content you upload.</li>
                            </ul>
                        </div>


                        <div>
                            <h4 class="ft-medium heading">9. Third-Party Links &amp; Content</h4>

                            <ul>
                                <li>Our platform may contain links to third-party websites.</li>
                                <li>We are not responsible for external content or privacy practices.</li>
                                <li>Interactions with listed companies are solely between you and them.</li>
                                <li>We do not endorse or guarantee any third-party services.</li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="ft-medium heading">10. Disclaimer of Warranties</h4>
                            <p>
                                THE PLATFORM IS PROVIDED "AS IS" AND "AS AVAILABLE" WITHOUT WARRANTIES OF ANY KIND, EITHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO:
                            </p>

                            <ul>
                                <li>Accuracy or reliability of listings</li>
                                <li>Uninterrupted or error-free service</li>
                                <li>Security of data transmission</li>
                                <li>Fitness for a particular purpose</li>
                                <li>Quality of listed companies or their services</li>
                            </ul>

                            <p>We do not guarantee:</p>
                            <ul>
                                <li>The legitimacy of any listed company</li>
                                <li>Successful business connections or outcomes</li>
                                <li>Availability of the platform at all times</li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="ft-medium heading">11. Limitation of Liability</h4>

                            <h6>
                                TO THE MAXIMUM EXTENT PERMITTED BY LAW:
                            </h6>

                            <ul>
                                <li>We are not liable for any direct, indirect, incidental, or consequential damages.</li>
                                <li>Our total liability shall not exceed the amount you paid us in the last 12 months.</li>
                                <li>We are not responsible for disputes between users or with listed companies.</li>
                                <li>We are not liable for data loss, business interruption, or lost profits.</li>
                            </ul>

                            <h6>
                                You agree to indemnify and hold us harmless from any claims, damages, or expenses arising from:
                            </h6>
                            <ul>
                                <li>Your use of the platform</li>
                                <li>Your violation of these terms</li>
                                <li>Your violation of any third-party rights</li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="ft-medium heading">12. Data &amp; Privacy</h4>

                            <ul>
                                <li>We collect and process data as described in our Privacy Policy.</li>
                                <li>By using our platform, you consent to our data practices.</li>
                                <li>We implement reasonable security measures but cannot guarantee absolute security.</li>
                                <li>You are responsible for backing up your own data.</li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="ft-medium heading">13. Termination</h4>

                            <h6>
                                We may terminate or suspend your account if:
                            </h6>

                            <ul>
                                <li>You violate these Terms and Conditions</li>
                                <li>You engage in fraudulent activity</li>
                                <li>You damage our reputation or platform</li>
                                <li>Required by law</li>
                            </ul>

                            <h6>
                                Upon termination:
                            </h6>
                            <ul>
                                <li>Your access to the platform will be revoked immediately</li>
                                <li>Your listing will be removed</li>
                                <li>No refunds will be provided for violations</li>
                                <li>You must cease all use of our platform</li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="ft-medium heading">14. Dispute Resolution</h4>

                            <h6>
                                Governing Law
                            </h6>
                            <p>
                                These terms are governed by the laws of [Your Country/State].
                            </p>

                            <h5 class="ft-medium">Dispute Process</h5>
                            <ul>
                                <li>Contact us first to resolve issues amicably.</li>
                                <li>If unresolved, disputes will be handled through binding arbitration.</li>
                                <li>You waive the right to participate in class-action lawsuits.</li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="ft-medium heading">15. Jurisdiction</h4>
                            <h5 class="ft-medium">Jurisdiction</h5>
                            <p>
                                Exclusive jurisdiction lies with courts in [Your City/State].
                            </p>
                        </div>

                        <div>
                            <h4 class="ft-medium heading">15. Modifications to Terms</h4>

                            <ul>
                                <li>We may update these Terms at any time.</li>
                                <li>Material changes will be notified via email or platform announcement.</li>
                                <li>Continued use after changes constitutes acceptance.</li>
                                <li>You are responsible for reviewing terms periodically.</li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="ft-medium heading">16. General Provisions</h4>

                            <h6>
                                Severability
                            </h6>
                            <p>
                                If any provision is found unenforceable, the remaining provisions remain in effect.
                            </p>

                            <h6>
                                No Waiver
                            </h6>
                            <p>
                                Our failure to enforce any right does not waive that right.
                            </p>

                            <h6>
                                Assignment
                            </h6>
                            <p>
                                You may not transfer your account. We may assign our rights without notice.
                            </p>

                            <h6>
                                Entire Agreement
                            </h6>
                            <p>
                                These Terms constitute the entire agreement between you and us.
                            </p>

                            <h6>
                                Force Majeure
                            </h6>
                            <p>
                                We are not liable for delays caused by circumstances beyond our control.
                            </p>
                        </div>

                        <div>
                            <h4 class="ft-medium heading">17. Contact Us</h4>

                            <p>
                                For questions, concerns, or disputes regarding these Terms:
                            </p>
                            Email: contact@aboutfirms.com
                            Phone: 9971123025
                            Address: 1st Sector, HSR Layout, Bengaluru, Karnataka 560102
                            Business Hours: Monday - Friday, 9 AM - 6 PM GMT+5:30
                            <p>
                                Acknowledgment
                            </p>
                            <p>
                                By clicking "I Agree" or using our platform, you acknowledge that you have read, understood, and agree to be bound by these Terms and Conditions.
                            </p>
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
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="sec_title position-relative text-center mb-5">
                        <h6 class="text-light mb-0">Subscribe Now</h6>
                        <h2 class="ft-bold text-light">Get All Updates & Advance Offers</h2>
                    </div>
                </div>
            </div>

            <div class="row align-items-center justify-content-center">
                <div class="col-xl-7 col-lg-10 col-md-12 col-sm-12 col-12">
                    <form class="bg-white rounded p-1">
                        <div class="row no-gutters">
                            <div class="col-xl-9 col-lg-9 col-md-8 col-sm-8 col-8">
                                <div class="form-group mb-0 position-relative">
                                    <input type="text" class="form-control b-0" placeholder="Enter Your Email Address">
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-4">
                                <div class="form-group mb-0 position-relative">
                                    <button class="btn full-width btn-height theme-bg text-light fs-md" type="button">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- News Letter -->
@endsection
