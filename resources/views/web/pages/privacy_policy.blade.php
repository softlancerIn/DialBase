@extends('web.layout.main')

@section('title', 'Privacy Policy | Aboutfirms')
@section('meta_description', 'Read the Privacy Policy for Aboutfirms to learn how we collect, use, share, and protect
    your information on our B2B directory platform.')
@section('meta_keywords', 'Privacy Policy, Data Protection, GDPR, CCPA, Aboutfirms privacy, cookies, data security')
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
                            <li class="breadcrumb-item active" aria-current="page">/ Privacy Policy</li>
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
                        <h1 class="ft-bold mb-3">{{ $seoData->page_title ?? 'Privacy Policy' }}</h1>
                        <p class="lead text-muted">{!! $seoData->page_sort_description ??
                            'At Aboutfirms, we are committed to protecting your privacy and ensuring the security of your personal information. This Privacy Policy explains how we collect, use, store, and protect your data when you use our B2B directory platform.' !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Privacy Content -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10 col-md-12">
                    <div class="abt_caption">

                        <!-- Section 1 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">1. Information We Collect</h3>

                            <h5 class="ft-medium mb-2">A. Information You Provide Directly</h5>

                            <h6 class="ft-medium mb-2">Account Registration:</h6>
                            <ul class="mb-3">
                                <li>Company name and business details</li>
                                <li>Contact person name and designation</li>
                                <li>Email address and phone number</li>
                                <li>Business address and location</li>
                                <li>Company logo and images</li>
                                <li>Products/services descriptions</li>
                                <li>Industry and category information</li>
                                <li>Website URL and social media links</li>
                            </ul>

                            <h6 class="ft-medium mb-2">Subscription & Payment:</h6>
                            <ul class="mb-3">
                                <li>Billing name and address</li>
                                <li>Payment card information (processed securely through third-party payment gateways)</li>
                                <li>Tax identification numbers (if applicable)</li>
                                <li>Purchase history and transaction records</li>
                            </ul>

                            <h6 class="ft-medium mb-2">Communications:</h6>
                            <ul class="mb-3">
                                <li>Messages sent through our platform</li>
                                <li>Support tickets and correspondence</li>
                                <li>Feedback and survey responses</li>
                                <li>Inquiry forms and contact requests</li>
                            </ul>

                            <h5 class="ft-medium mb-2">B. Information Collected Automatically</h5>

                            <h6 class="ft-medium mb-2">Technical Data:</h6>
                            <ul class="mb-3">
                                <li>IP address and device information</li>
                                <li>Browser type and version</li>
                                <li>Operating system</li>
                                <li>Login times and dates</li>
                                <li>Pages visited and time spent</li>
                                <li>Referring URLs</li>
                                <li>Cookies and tracking technologies</li>
                            </ul>

                            <h6 class="ft-medium mb-2">Usage Data:</h6>
                            <ul class="mb-3">
                                <li>Search queries and filters used</li>
                                <li>Listings viewed and clicked</li>
                                <li>Features accessed</li>
                                <li>Profile completeness</li>
                                <li>Engagement metrics</li>
                            </ul>

                            <h5 class="ft-medium mb-2">C. Information from Third Parties</h5>
                            <ul>
                                <li>Business verification services</li>
                                <li>Payment processors</li>
                                <li>Social media platforms (if you connect accounts)</li>
                                <li>Public business registries</li>
                                <li>Industry databases</li>
                            </ul>
                        </div>

                        <!-- Section 2 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">2. How We Use Your Information</h3>
                            <p class="mb-3">We use collected information for the following purposes:</p>

                            <h5 class="ft-medium mb-2">Platform Operations:</h5>
                            <ul class="mb-3">
                                <li>Create and manage your account</li>
                                <li>Process and display your company listing</li>
                                <li>Facilitate connections between businesses</li>
                                <li>Provide customer support</li>
                                <li>Process payments and subscriptions</li>
                                <li>Send transaction confirmations</li>
                            </ul>

                            <h5 class="ft-medium mb-2">Communication:</h5>
                            <ul class="mb-3">
                                <li>Respond to inquiries and support requests</li>
                                <li>Send important platform updates</li>
                                <li>Notify about account activities</li>
                                <li>Share relevant business opportunities</li>
                                <li>Provide subscription renewal reminders</li>
                            </ul>

                            <h5 class="ft-medium mb-2">Improvement & Analytics:</h5>
                            <ul class="mb-3">
                                <li>Analyze platform usage and trends</li>
                                <li>Improve user experience and features</li>
                                <li>Develop new services and offerings</li>
                                <li>Conduct research and testing</li>
                                <li>Generate anonymous statistics</li>
                            </ul>

                            <h5 class="ft-medium mb-2">Marketing (with consent):</h5>
                            <ul class="mb-3">
                                <li>Send newsletters and promotional content</li>
                                <li>Share industry insights and updates</li>
                                <li>Announce new features or plans</li>
                                <li>Conduct surveys and gather feedback</li>
                            </ul>

                            <h5 class="ft-medium mb-2">Legal & Security:</h5>
                            <ul>
                                <li>Verify identity and prevent fraud</li>
                                <li>Enforce Terms and Conditions</li>
                                <li>Comply with legal obligations</li>
                                <li>Protect against security threats</li>
                                <li>Resolve disputes and issues</li>
                            </ul>
                        </div>

                        <!-- Section 3 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">3. Legal Basis for Processing (GDPR)</h3>
                            <p class="mb-2">We process your data based on:</p>
                            <ul>
                                <li><strong>Contract Performance:</strong> To provide services you've subscribed to</li>
                                <li><strong>Legitimate Interests:</strong> To improve our platform and prevent fraud</li>
                                <li><strong>Legal Compliance:</strong> To meet regulatory requirements</li>
                                <li><strong>Consent:</strong> For marketing communications (you can opt-out anytime)</li>
                            </ul>
                        </div>

                        <!-- Section 4 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">4. How We Share Your Information</h3>

                            <h5 class="ft-medium mb-2">A. Public Information</h5>
                            <p class="mb-2">The following information is publicly visible on our platform:</p>
                            <ul class="mb-3">
                                <li>Company name and description</li>
                                <li>Business contact details</li>
                                <li>Products/services offered</li>
                                <li>Company logo and images</li>
                                <li>Location and industry</li>
                                <li>Website and social media links</li>
                            </ul>

                            <h5 class="ft-medium mb-2">B. With Service Providers</h5>
                            <p class="mb-2">We share data with trusted third parties who help us operate:</p>
                            <ul class="mb-2">
                                <li>Payment processors (Stripe, PayPal, Razorpay, etc.)</li>
                                <li>Email service providers</li>
                                <li>Cloud hosting services</li>
                                <li>Analytics platforms (Google Analytics)</li>
                                <li>Customer support tools</li>
                                <li>Verification services</li>
                            </ul>
                            <p class="mb-3 text-muted"><em>Note: These providers are contractually bound to protect your
                                    data and use it only for specified purposes.</em></p>

                            <h5 class="ft-medium mb-2">C. Business Transfers</h5>
                            <p class="mb-3">In case of merger, acquisition, or sale of assets, your information may be
                                transferred to the new entity. You will be notified of any such change.</p>

                            <h5 class="ft-medium mb-2">D. Legal Requirements</h5>
                            <p class="mb-2">We may disclose information when required by law:</p>
                            <ul class="mb-3">
                                <li>To comply with legal processes or court orders</li>
                                <li>To enforce our Terms and Conditions</li>
                                <li>To protect our rights, property, or safety</li>
                                <li>To prevent fraud or illegal activities</li>
                                <li>In emergency situations affecting safety</li>
                            </ul>

                            <h5 class="ft-medium mb-2">E. With Your Consent</h5>
                            <p>We may share information with third parties when you explicitly consent or request it.</p>
                        </div>

                        <!-- Section 5 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">5. Data Security</h3>
                            <p class="mb-3">We implement industry-standard security measures to protect your information:
                            </p>

                            <h5 class="ft-medium mb-2">Technical Safeguards:</h5>
                            <ul class="mb-3">
                                <li>SSL/TLS encryption for data transmission</li>
                                <li>Secure servers with firewall protection</li>
                                <li>Regular security audits and updates</li>
                                <li>Access controls and authentication</li>
                                <li>Encrypted database storage</li>
                            </ul>

                            <h5 class="ft-medium mb-2">Organizational Measures:</h5>
                            <ul class="mb-3">
                                <li>Limited employee access to personal data</li>
                                <li>Confidentiality agreements with staff</li>
                                <li>Regular security training</li>
                                <li>Incident response procedures</li>
                            </ul>

                            <h5 class="ft-medium mb-2">Payment Security:</h5>
                            <ul class="mb-3">
                                <li>We do NOT store complete credit card details</li>
                                <li>All payments processed through PCI-DSS compliant gateways</li>
                                <li>Tokenization for recurring payments</li>
                            </ul>

                            <p class="text-muted"><em>However, please note: No method of transmission over the internet is
                                    100% secure. While we strive to protect your data, we cannot guarantee absolute
                                    security.</em></p>
                        </div>

                        <!-- Section 6 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">6. Data Retention</h3>

                            <h5 class="ft-medium mb-2">Active Accounts:</h5>
                            <p class="mb-3">We retain your data as long as your account is active</p>

                            <h5 class="ft-medium mb-2">Closed Accounts:</h5>
                            <ul class="mb-3">
                                <li>Data deleted within 90 days of account closure</li>
                                <li>Some information retained longer for legal/compliance reasons</li>
                                <li>Transaction records kept for tax and audit purposes (typically 7 years)</li>
                            </ul>

                            <h5 class="ft-medium mb-2">Marketing Data:</h5>
                            <p class="mb-3">Retained until you unsubscribe or request deletion</p>

                            <p>You can request data deletion anytime by contacting us at <a
                                    href="mailto:sales@aboutfirms.com">sales@aboutfirms.com</a></p>
                        </div>

                        <!-- Section 7 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">7. Your Rights & Choices</h3>

                            <h5 class="ft-medium mb-2">A. Access & Portability</h5>
                            <ul class="mb-3">
                                <li>Request a copy of your personal data</li>
                                <li>Download your information in a portable format</li>
                            </ul>

                            <h5 class="ft-medium mb-2">B. Correction</h5>
                            <ul class="mb-3">
                                <li>Update or correct inaccurate information</li>
                                <li>Modify your profile details anytime</li>
                            </ul>

                            <h5 class="ft-medium mb-2">C. Deletion</h5>
                            <ul class="mb-3">
                                <li>Request deletion of your account and data</li>
                                <li>Right to be forgotten (subject to legal obligations)</li>
                            </ul>

                            <h5 class="ft-medium mb-2">D. Objection</h5>
                            <ul class="mb-3">
                                <li>Object to processing for marketing purposes</li>
                                <li>Opt-out of promotional communications</li>
                            </ul>

                            <h5 class="ft-medium mb-2">E. Restriction</h5>
                            <ul class="mb-3">
                                <li>Request limitation of data processing</li>
                                <li>Temporarily suspend account without deletion</li>
                            </ul>

                            <h5 class="ft-medium mb-2">F. Withdraw Consent</h5>
                            <ul class="mb-3">
                                <li>Unsubscribe from emails via link in each message</li>
                                <li>Opt-out of cookies through browser settings</li>
                                <li>Revoke marketing consent anytime</li>
                            </ul>

                            <p>To exercise these rights, contact us at: <a
                                    href="mailto:sales@aboutfirms.com">sales@aboutfirms.com</a></p>
                        </div>

                        <!-- Section 8 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">8. Cookies & Tracking Technologies</h3>

                            <h5 class="ft-medium mb-2">What We Use:</h5>

                            <h6 class="ft-medium mb-2">Essential Cookies: Required for platform functionality</h6>
                            <ul class="mb-3">
                                <li>Session management</li>
                                <li>Authentication</li>
                                <li>Security features</li>
                            </ul>

                            <h6 class="ft-medium mb-2">Analytics Cookies: Help us understand usage</h6>
                            <ul class="mb-3">
                                <li>Google Analytics</li>
                                <li>Page view tracking</li>
                                <li>User behavior analysis</li>
                            </ul>

                            <h6 class="ft-medium mb-2">Marketing Cookies: For targeted advertising (with consent)</h6>
                            <ul class="mb-3">
                                <li>Retargeting pixels</li>
                                <li>Social media integrations</li>
                                <li>Ad campaign tracking</li>
                            </ul>

                            <h5 class="ft-medium mb-2">Your Cookie Choices:</h5>
                            <ul>
                                <li>Manage preferences in our cookie banner</li>
                                <li>Adjust browser settings to block cookies</li>
                                <li>Use "Do Not Track" browser settings</li>
                                <li>Note: Disabling essential cookies may affect functionality</li>
                            </ul>
                        </div>

                        <!-- Section 9 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">9. Third-Party Links</h3>
                            <p class="mb-2">Our platform contains links to external websites and listed companies. We are
                                NOT responsible for:</p>
                            <ul class="mb-3">
                                <li>Privacy practices of third-party sites</li>
                                <li>Content on external websites</li>
                                <li>Data collection by listed companies</li>
                                <li>Security of other platforms</li>
                            </ul>
                            <p>Please review privacy policies of websites you visit.</p>
                        </div>

                        <!-- Section 10 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">10. International Data Transfers</h3>
                            <ul class="mb-3">
                                <li>Our servers may be located in different countries</li>
                                <li>Data may be transferred internationally for processing</li>
                                <li>We ensure adequate protection through standard contractual clauses</li>
                                <li>By using our platform, you consent to these transfers</li>
                            </ul>
                            <p class="text-muted"><em>For EU/EEA users: We comply with GDPR requirements for international
                                    transfers.</em></p>
                        </div>

                        <!-- Section 11 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">11. Children's Privacy</h3>
                            <ul>
                                <li>Our platform is NOT intended for users under 18</li>
                                <li>We do not knowingly collect data from minors</li>
                                <li>If we discover such data, we delete it immediately</li>
                                <li>Parents/guardians can contact us to remove minor's information</li>
                            </ul>
                        </div>

                        <!-- Section 12 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">12. Your California Privacy Rights (CCPA)</h3>
                            <p class="mb-2">California residents have additional rights:</p>
                            <ul class="mb-3">
                                <li><strong>Right to Know:</strong> What personal data we collect and how we use it</li>
                                <li><strong>Right to Delete:</strong> Request deletion of your data</li>
                                <li><strong>Right to Opt-Out:</strong> From sale of personal information (Note: We do NOT
                                    sell personal data)</li>
                                <li><strong>Non-Discrimination:</strong> We won't discriminate for exercising your rights
                                </li>
                            </ul>
                            <p>California Contact: <a href="mailto:sales@aboutfirms.com">sales@aboutfirms.com</a> with
                                subject "California Privacy Request"</p>
                        </div>

                        <!-- Section 13 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">13. European Users (GDPR)</h3>
                            <p class="mb-2">For users in the EU/EEA:</p>
                            <ul>
                                <li><strong>Data Controller:</strong> Aboutfirms</li>
                                <li><strong>Legal Basis:</strong> As outlined in Section 3</li>
                                <li><strong>Data Protection Officer:</strong> <a
                                        href="mailto:sales@aboutfirms.com">sales@aboutfirms.com</a></li>
                                <li><strong>Supervisory Authority:</strong> You can lodge complaints with your local data
                                    protection authority</li>
                            </ul>
                        </div>

                        <!-- Section 14 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">14. Email Communications</h3>

                            <h5 class="ft-medium mb-2">Transactional Emails (Cannot opt-out):</h5>
                            <ul class="mb-3">
                                <li>Account verification</li>
                                <li>Payment confirmations</li>
                                <li>Security alerts</li>
                                <li>Service announcements</li>
                            </ul>

                            <h5 class="ft-medium mb-2">Marketing Emails (Can opt-out):</h5>
                            <ul class="mb-3">
                                <li>Newsletters</li>
                                <li>Promotional offers</li>
                                <li>Product updates</li>
                                <li>Industry insights</li>
                            </ul>

                            <p><strong>Unsubscribe:</strong> Click the link at the bottom of any marketing email or email us
                                at <a href="mailto:sales@aboutfirms.com">sales@aboutfirms.com</a></p>
                        </div>

                        <!-- Section 15 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">15. Changes to This Privacy Policy</h3>
                            <ul>
                                <li>We may update this policy periodically</li>
                                <li>Material changes will be notified via email or platform notification</li>
                                <li>"Last Updated" date will reflect recent changes</li>
                                <li>Continued use after changes indicates acceptance</li>
                                <li>We encourage regular review of this policy</li>
                            </ul>
                        </div>

                        <!-- Section 16 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">16. Data Breach Notification</h3>
                            <p class="mb-2">In case of a data breach affecting your information:</p>
                            <ul>
                                <li>We will notify you within 72 hours (as required by law)</li>
                                <li>Notification will include nature of breach and steps taken</li>
                                <li>We will provide guidance on protective measures</li>
                                <li>Relevant authorities will be informed as required</li>
                            </ul>
                        </div>

                        <!-- Section 17 -->
                        <div class="mb-5">
                            <h3 class="ft-bold mb-3">17. Contact Us</h3>
                            <p class="mb-3">For privacy-related questions, concerns, or requests:</p>

                            <div class="p-4 bg-light rounded">
                                <h5 class="ft-medium mb-3">Privacy Team:</h5>
                                <p class="mb-2"><strong>Email:</strong> <a
                                        href="mailto:sales@aboutfirms.com">sales@aboutfirms.com</a></p>
                                <p class="mb-2"><strong>Phone:</strong> 9971123025</p>
                                <p class="mb-4"><strong>Address:</strong> 1st Sector, HSR Layout, Bengaluru, Karnataka
                                    560102</p>

                                <h5 class="ft-medium mb-3">Data Protection Officer:</h5>
                                <p class="mb-4"><strong>Email:</strong> <a
                                        href="mailto:sales@aboutfirms.com">sales@aboutfirms.com</a></p>

                                <h5 class="ft-medium mb-3">General Support:</h5>
                                <p class="mb-2"><strong>Email:</strong> <a
                                        href="mailto:sales@aboutfirms.com">sales@aboutfirms.com</a></p>
                                <p class="mb-2"><strong>Hours:</strong> Monday - Friday, 9 AM - 6 PM</p>
                                <p class="mb-0"><strong>Response Time:</strong> We aim to respond within 48 business
                                    hours.</p>
                            </div>
                        </div>

                        <!-- Section 18 -->
                        <div class="p-4 bg-light rounded border-left border-success"
                            style="border-left-width: 4px !important;">
                            <h3 class="ft-bold mb-3">18. Quick Summary</h3>
                            <ul class="mb-0">
                                <li>✓ We collect information you provide and usage data</li>
                                <li>✓ We use it to operate the platform and improve services</li>
                                <li>✓ Your listing information is publicly visible</li>
                                <li>✓ We don't sell your personal data</li>
                                <li>✓ You can access, correct, or delete your data anytime</li>
                                <li>✓ We use industry-standard security measures</li>
                                <li>✓ You can opt-out of marketing communications</li>
                                <li>✓ Contact us for any privacy concerns</li>
                            </ul>
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
