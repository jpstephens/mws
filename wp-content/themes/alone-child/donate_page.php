<?php
/**
 * Donate Page - WordPress Shortcode Template
 * Rendered via [mws_donate] shortcode in alone-child theme
 * Replaces GiveWP form with custom Stripe integration
 */
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    .page-titlebar { display: none !important; }

    #mws-donate {
        font-family: 'Poppins', sans-serif;
        line-height: 1.7;
        color: #444;
        -webkit-font-smoothing: antialiased;
    }

    #mws-donate *,
    #mws-donate *::before,
    #mws-donate *::after {
        box-sizing: border-box;
    }

    #mws-donate {
        --gold: #cda33b;
        --gold-hover: #b8930e;
        --gold-text: #8a6d1b;
        --navy: #232842;
        --white: #ffffff;
        --light-bg: #f8f8f8;
        --text: #444;
        --heading: #111;
    }

    /* ==========================================
       A - HERO
       ========================================== */
    #mws-donate .dn-hero {
        background: var(--navy);
        padding: 112px 20px 64px;
        text-align: center;
        color: var(--white);
    }

    #mws-donate .dn-hero h1 {
        font-size: 44px;
        font-weight: 700;
        margin: 0 0 14px;
        color: var(--white);
        line-height: 1.2;
    }

    #mws-donate .dn-hero .dn-subhead {
        font-size: 18px;
        max-width: 620px;
        margin: 0 auto;
        opacity: 0.92;
        line-height: 1.7;
    }

    @media (max-width: 768px) {
        #mws-donate .dn-hero { padding: 92px 16px 52px; }
        #mws-donate .dn-hero h1 { font-size: 32px; }
        #mws-donate .dn-hero .dn-subhead { font-size: 16px; }
    }

    /* ==========================================
       B - TWO-COLUMN LAYOUT
       ========================================== */
    #mws-donate .dn-body {
        max-width: 1120px;
        margin: 0 auto;
        padding: 44px 20px 60px;
        display: grid;
        grid-template-columns: 1.15fr 0.85fr;
        gap: 40px;
        align-items: start;
    }

    @media (max-width: 768px) {
        #mws-donate .dn-body {
            grid-template-columns: 1fr;
            gap: 32px;
        }
    }

    /* ==========================================
       C - LEFT COLUMN: WHY DONATE
       ========================================== */
    #mws-donate .dn-left h2 {
        font-size: 28px;
        font-weight: 700;
        color: var(--navy);
        margin: 0 0 16px;
        padding-bottom: 8px;
        border-bottom: 3px solid var(--gold);
        display: inline-block;
    }

    #mws-donate .dn-left p {
        font-size: 16px;
        color: var(--text);
        margin-bottom: 14px;
        line-height: 1.8;
    }

    /* Impact Stats Row */
    #mws-donate .dn-impact-row {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
        margin: 28px 0;
    }

    #mws-donate .dn-impact-stat {
        text-align: center;
        background: var(--navy);
        color: var(--white);
        border-radius: 10px;
        padding: 22px 14px;
        transition: transform 0.15s, box-shadow 0.15s;
    }

    #mws-donate .dn-impact-stat:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.12);
    }

    #mws-donate .dn-impact-stat .stat-number {
        font-size: 28px;
        font-weight: 700;
        color: var(--gold);
        display: block;
        line-height: 1.2;
    }

    #mws-donate .dn-impact-stat .stat-label {
        font-size: 13px;
        opacity: 0.85;
        margin-top: 4px;
        display: block;
    }

    @media (max-width: 600px) {
        #mws-donate .dn-impact-row {
            grid-template-columns: 1fr;
            gap: 10px;
        }
    }

    /* Trust Section */
    #mws-donate .dn-trust {
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
        margin: 24px 0 8px;
    }

    #mws-donate .dn-trust-badge {
        display: flex;
        align-items: center;
        gap: 8px;
        background: var(--light-bg);
        border-radius: 8px;
        padding: 12px 16px;
        font-size: 14px;
        font-weight: 500;
        color: var(--navy);
        transition: transform 0.15s, box-shadow 0.15s;
    }

    #mws-donate .dn-trust-badge:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.12);
    }

    #mws-donate .dn-trust-badge .badge-icon {
        font-size: 20px;
        flex-shrink: 0;
    }

    /* Social Proof */
    #mws-donate .dn-social-proof {
        font-size: 14px;
        color: #666;
        margin-top: 20px;
        padding-top: 16px;
        border-top: 1px solid #e5e7eb;
    }

    #mws-donate .dn-social-proof strong {
        color: var(--navy);
    }

    /* ==========================================
       D - RIGHT COLUMN: DONATION FORM CARD
       ========================================== */
    #mws-donate .dn-form-card {
        background: var(--white);
        border-radius: 14px;
        padding: 30px 26px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.10);
        border: 1px solid #e5e7eb;
        position: sticky;
        top: 120px;
    }

    @media (max-width: 768px) {
        #mws-donate .dn-form-card {
            position: static;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }
    }

    #mws-donate .dn-form-card h2 {
        font-size: 22px;
        font-weight: 700;
        color: var(--navy);
        margin: 0 0 4px;
        text-align: center;
    }

    #mws-donate .dn-form-sub {
        font-size: 14px;
        color: #666;
        text-align: center;
        margin: 0 0 20px;
    }

    /* Frequency Toggle */
    #mws-donate .dn-freq-toggle {
        display: flex;
        background: var(--light-bg);
        border-radius: 30px;
        padding: 4px;
        margin-bottom: 20px;
    }

    #mws-donate .dn-freq-btn {
        flex: 1;
        padding: 10px 0;
        border: none;
        background: transparent;
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        font-weight: 600;
        color: #666;
        border-radius: 26px;
        cursor: pointer;
        transition: background 0.15s, color 0.15s;
    }

    #mws-donate .dn-freq-btn.dn-freq-active {
        background: var(--navy);
        color: var(--white);
        box-shadow: 0 2px 8px rgba(0,0,0,0.12);
    }

    /* Amount Pills */
    #mws-donate .dn-pills {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 10px;
        margin-bottom: 14px;
    }

    #mws-donate .dn-pill {
        padding: 12px 0;
        border: 2px solid #e5e7eb;
        background: var(--white);
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
        font-weight: 600;
        color: var(--navy);
        cursor: pointer;
        transition: border-color 0.15s, background 0.15s, color 0.15s;
        text-align: center;
        min-height: 46px;
    }

    #mws-donate .dn-pill:hover {
        border-color: var(--gold);
    }

    #mws-donate .dn-pill.dn-pill-active {
        background: var(--navy);
        border-color: var(--navy);
        color: var(--white);
    }

    /* Custom Amount Toggle */
    #mws-donate .dn-custom-link {
        display: block;
        text-align: center;
        font-size: 13px;
        color: var(--gold-text);
        font-weight: 600;
        cursor: pointer;
        margin-bottom: 16px;
        background: none;
        border: none;
        font-family: 'Poppins', sans-serif;
        text-decoration: underline;
        width: 100%;
    }

    #mws-donate .dn-custom-link:hover {
        color: var(--gold-hover);
    }

    #mws-donate .dn-custom-wrap {
        display: none;
        margin-bottom: 16px;
    }

    #mws-donate .dn-custom-wrap.dn-custom-visible {
        display: block;
    }

    /* Form Inputs */
    #mws-donate .dn-input {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid #e5e7eb;
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
        color: var(--navy);
        outline: none;
        transition: border-color 0.15s;
    }

    #mws-donate .dn-input:focus {
        border-color: var(--gold);
    }

    #mws-donate .dn-input::placeholder {
        color: #999;
    }

    #mws-donate .dn-field {
        margin-bottom: 14px;
    }

    #mws-donate .dn-field label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: var(--navy);
        margin-bottom: 6px;
    }

    /* Submit Button */
    #mws-donate .dn-submit-btn {
        display: block;
        width: 100%;
        padding: 14px;
        background: var(--gold);
        color: var(--white);
        border: none;
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.15s;
        margin-bottom: 12px;
    }

    #mws-donate .dn-submit-btn:hover {
        background: var(--gold-hover);
    }

    #mws-donate .dn-submit-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }

    #mws-donate .dn-secure-line {
        font-size: 14px;
        color: #666;
        text-align: center;
        margin: 0;
    }

    /* Form validation error */
    #mws-donate .dn-input.dn-input-error {
        border-color: #e53e3e;
    }

    #mws-donate .dn-error-msg {
        font-size: 12px;
        color: #e53e3e;
        margin-top: 4px;
        display: none;
    }

    #mws-donate .dn-error-msg.dn-error-visible {
        display: block;
    }

    @media (max-width: 600px) {
        #mws-donate .dn-pills {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    /* ==========================================
       E - FAQ SECTION
       ========================================== */
    #mws-donate .dn-faq {
        max-width: 1120px;
        margin: 0 auto;
        padding: 0 20px 60px;
    }

    #mws-donate .dn-faq h2 {
        font-size: 28px;
        font-weight: 700;
        color: var(--navy);
        margin: 0 0 20px;
        padding-bottom: 8px;
        border-bottom: 3px solid var(--gold);
        display: inline-block;
    }

    #mws-donate .dn-faq-list {
        max-width: 100%;
        margin-top: 8px;
    }

    #mws-donate .dn-faq-list details {
        border-bottom: 1px solid #e5e7eb;
    }

    #mws-donate .dn-faq-list details summary {
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
        font-weight: 600;
        color: var(--navy);
        padding: 18px 0;
        cursor: pointer;
        list-style: none;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    #mws-donate .dn-faq-list details summary::-webkit-details-marker {
        display: none;
    }

    #mws-donate .dn-faq-list details summary::after {
        content: '+';
        font-size: 22px;
        font-weight: 400;
        color: var(--gold);
        flex-shrink: 0;
        margin-left: 16px;
        transition: transform 0.15s;
    }

    #mws-donate .dn-faq-list details[open] summary::after {
        content: '\2212';
    }

    #mws-donate .dn-faq-list details .dn-faq-answer {
        font-size: 15px;
        color: var(--text);
        line-height: 1.7;
        padding: 0 0 18px;
    }

    #mws-donate .dn-faq-list details .dn-faq-answer a {
        color: var(--gold-text);
        font-weight: 600;
        text-decoration: none;
    }

    #mws-donate .dn-faq-list details .dn-faq-answer a:hover {
        text-decoration: underline;
    }

    /* ==========================================
       UTILITIES
       ========================================== */
    #mws-donate .dn-submit-btn:focus-visible,
    #mws-donate .dn-freq-btn:focus-visible,
    #mws-donate .dn-pill:focus-visible,
    #mws-donate .dn-custom-link:focus-visible,
    #mws-donate a:focus-visible {
        outline: 3px solid var(--gold);
        outline-offset: 3px;
    }
</style>

<div id="mws-donate">

    <!-- ===== A - HERO ===== -->
    <div class="dn-hero">
        <h1>Support a Student&rsquo;s Future</h1>
        <p class="dn-subhead">Your donation directly funds a $5,000 scholarship for a Rumson-Fair Haven senior who shares Mikey&rsquo;s passion for music, art, and community. Every dollar makes a difference.</p>
    </div>

    <!-- ===== B - TWO-COLUMN BODY ===== -->
    <div class="dn-body">

        <!-- LEFT COLUMN: Why Donate -->
        <div class="dn-left">
            <h2>Your Impact</h2>
            <p>Every contribution to the Michael Williams Memorial Scholarship goes directly toward funding the next $5,000 scholarship. We are an all-volunteer organization&mdash;no salaries, no overhead. When you donate, 100% of your gift supports a graduating RFH senior on their path to college.</p>
            <p>Since 2020, generous donors like you have helped us award six scholarships to students who embody the creativity, kindness, and community spirit that defined Michael. Your support keeps his legacy alive and gives the next generation the resources they need to succeed.</p>

            <!-- Impact Stats -->
            <div class="dn-impact-row">
                <div class="dn-impact-stat">
                    <span class="stat-number">$30,000+</span>
                    <span class="stat-label">Awarded</span>
                </div>
                <div class="dn-impact-stat">
                    <span class="stat-number">6</span>
                    <span class="stat-label">Scholarships</span>
                </div>
                <div class="dn-impact-stat">
                    <span class="stat-number">100%</span>
                    <span class="stat-label">To Students</span>
                </div>
            </div>

            <!-- Trust Badges -->
            <div class="dn-trust">
                <div class="dn-trust-badge">
                    <span class="badge-icon" aria-hidden="true">&#9989;</span>
                    501(c)(3) Tax-Exempt
                </div>
                <div class="dn-trust-badge">
                    <span class="badge-icon" aria-hidden="true">&#128274;</span>
                    Powered by Stripe
                </div>
                <div class="dn-trust-badge">
                    <span class="badge-icon" aria-hidden="true">&#127891;</span>
                    100% to Scholarships
                </div>
            </div>

            <!-- Social Proof -->
            <div class="dn-social-proof">
                <strong>$30,000+ raised since 2020</strong> &mdash; Join our community of donors supporting the next generation of leaders from Rumson-Fair Haven.
            </div>
        </div>

        <!-- RIGHT COLUMN: Donation Form Card -->
        <div class="dn-form-card">
            <h2>Make a Donation</h2>
            <p class="dn-form-sub">100% of your gift funds student scholarships</p>

            <form id="donateForm" method="post" action="<?php echo site_url('stripe'); ?>" novalidate>

                <!-- Frequency Toggle -->
                <div class="dn-freq-toggle">
                    <button type="button" class="dn-freq-btn dn-freq-active" data-freq="one-time">One-Time</button>
                    <button type="button" class="dn-freq-btn" data-freq="monthly">Monthly</button>
                </div>

                <!-- Hidden frequency field -->
                <input type="hidden" name="frequency" id="donateFrequency" value="one-time">

                <!-- Amount Pills -->
                <div class="dn-pills">
                    <button type="button" class="dn-pill" data-amount="25">$25</button>
                    <button type="button" class="dn-pill" data-amount="50">$50</button>
                    <button type="button" class="dn-pill" data-amount="100">$100</button>
                    <button type="button" class="dn-pill" data-amount="250">$250</button>
                </div>

                <!-- Custom Amount Toggle -->
                <button type="button" class="dn-custom-link">Or enter a custom amount</button>
                <div class="dn-custom-wrap">
                    <input type="number" class="dn-input dn-custom-input" placeholder="Enter amount ($)" min="1" step="1">
                </div>

                <!-- Hidden amount field (submitted to Stripe) -->
                <input type="number" name="amount" id="donateAmount" required min="1" step="1" style="display:none;">

                <!-- Email Field -->
                <div class="dn-field">
                    <label for="donateEmail">Email Address</label>
                    <input type="email" name="zemail" id="donateEmail" class="dn-input" placeholder="you@example.com" required>
                    <div class="dn-error-msg" id="emailError">Please enter a valid email address.</div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="dn-submit-btn" id="donateSubmitBtn">Donate Securely</button>
                <p class="dn-secure-line">&#128274; Secure payment via Stripe</p>

            </form>
        </div>

    </div>

    <!-- ===== E - FAQ ===== -->
    <div class="dn-faq">
        <h2>Frequently Asked Questions</h2>
        <div class="dn-faq-list">

            <details>
                <summary>Is my donation tax-deductible?</summary>
                <div class="dn-faq-answer">
                    Yes. The Michael Williams Memorial Scholarship is a registered 501(c)(3) nonprofit organization. All donations are tax-deductible to the full extent allowed by law. You will receive a receipt for your records after donating.
                </div>
            </details>

            <details>
                <summary>Is my payment secure?</summary>
                <div class="dn-faq-answer">
                    Absolutely. All payments are processed through <strong>Stripe</strong>, an industry-leading payment processor used by millions of organizations worldwide. Your financial information is encrypted and never stored on our servers.
                </div>
            </details>

            <details>
                <summary>Can I make a monthly donation?</summary>
                <div class="dn-faq-answer">
                    Yes! Use the frequency toggle at the top of the donation form to switch between one-time and monthly giving. Monthly donations provide steady, predictable support that helps us plan each year&rsquo;s scholarship.
                </div>
            </details>

            <details>
                <summary>How are funds used?</summary>
                <div class="dn-faq-answer">
                    100% of every donation goes directly to funding student scholarships. We are an all-volunteer organization with no paid staff or administrative overhead. Your entire gift supports a graduating senior at Rumson-Fair Haven Regional High School. <a href="<?php echo home_url('/scholarship/'); ?>">Learn more about the scholarship</a>.
                </div>
            </details>

        </div>
    </div>

</div>

<script>
(function() {
    var root = document.getElementById('mws-donate');
    if (!root) return;

    var form = document.getElementById('donateForm');
    var freqField = document.getElementById('donateFrequency');
    var amountField = document.getElementById('donateAmount');
    var emailField = document.getElementById('donateEmail');
    var emailError = document.getElementById('emailError');
    var submitBtn = document.getElementById('donateSubmitBtn');
    var pills = root.querySelectorAll('.dn-pill');
    var freqBtns = root.querySelectorAll('.dn-freq-btn');
    var customLink = root.querySelector('.dn-custom-link');
    var customWrap = root.querySelector('.dn-custom-wrap');
    var customInput = root.querySelector('.dn-custom-input');

    var selectedAmount = 0;

    /* --- Pre-fill from URL parameters --- */
    var params = new URLSearchParams(window.location.search);

    var paramAmount = parseInt(params.get('amount'), 10);
    var paramFreq = params.get('frequency');

    if (paramAmount && paramAmount > 0) {
        selectedAmount = paramAmount;
        amountField.value = paramAmount;
        /* Highlight matching pill or show custom */
        var matched = false;
        pills.forEach(function(p) {
            p.classList.remove('dn-pill-active');
            if (parseInt(p.getAttribute('data-amount'), 10) === paramAmount) {
                p.classList.add('dn-pill-active');
                matched = true;
            }
        });
        if (!matched) {
            customWrap.classList.add('dn-custom-visible');
            customInput.value = paramAmount;
        }
    }

    if (paramFreq === 'monthly') {
        freqField.value = 'monthly';
        freqBtns.forEach(function(b) {
            b.classList.remove('dn-freq-active');
            if (b.getAttribute('data-freq') === 'monthly') {
                b.classList.add('dn-freq-active');
            }
        });
    }

    /* --- Frequency toggle --- */
    freqBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            freqBtns.forEach(function(b) { b.classList.remove('dn-freq-active'); });
            btn.classList.add('dn-freq-active');
            freqField.value = btn.getAttribute('data-freq');
        });
    });

    /* --- Amount pill selection --- */
    pills.forEach(function(pill) {
        pill.addEventListener('click', function() {
            pills.forEach(function(p) { p.classList.remove('dn-pill-active'); });
            pill.classList.add('dn-pill-active');
            selectedAmount = parseInt(pill.getAttribute('data-amount'), 10);
            amountField.value = selectedAmount;
            if (customInput) customInput.value = '';
        });
    });

    /* --- Custom amount toggle --- */
    if (customLink && customWrap) {
        customLink.addEventListener('click', function() {
            customWrap.classList.toggle('dn-custom-visible');
            if (customWrap.classList.contains('dn-custom-visible') && customInput) {
                customInput.focus();
            }
        });
    }

    /* --- Custom amount input sync --- */
    if (customInput) {
        customInput.addEventListener('input', function() {
            var val = parseInt(customInput.value, 10);
            if (val > 0) {
                selectedAmount = val;
                amountField.value = val;
                pills.forEach(function(p) { p.classList.remove('dn-pill-active'); });
                /* Re-highlight pill if it matches */
                pills.forEach(function(p) {
                    if (parseInt(p.getAttribute('data-amount'), 10) === val) {
                        p.classList.add('dn-pill-active');
                    }
                });
            } else {
                amountField.value = '';
            }
        });
    }

    /* --- Form validation and submit --- */
    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    form.addEventListener('submit', function(e) {
        var valid = true;

        /* Validate amount */
        var amt = parseInt(amountField.value, 10);
        if (!amt || amt < 1) {
            e.preventDefault();
            valid = false;
            /* Show custom amount field and focus */
            customWrap.classList.add('dn-custom-visible');
            customInput.classList.add('dn-input-error');
            customInput.focus();
            return;
        } else {
            customInput.classList.remove('dn-input-error');
        }

        /* Validate email */
        var email = emailField.value.trim();
        if (!email || !isValidEmail(email)) {
            e.preventDefault();
            valid = false;
            emailField.classList.add('dn-input-error');
            emailError.classList.add('dn-error-visible');
            emailField.focus();
            return;
        } else {
            emailField.classList.remove('dn-input-error');
            emailError.classList.remove('dn-error-visible');
        }

        if (valid) {
            submitBtn.disabled = true;
            submitBtn.textContent = 'Processing\u2026';
        }
    });

    /* Clear email error on input */
    emailField.addEventListener('input', function() {
        emailField.classList.remove('dn-input-error');
        emailError.classList.remove('dn-error-visible');
    });

    /* Clear custom amount error on input */
    if (customInput) {
        customInput.addEventListener('input', function() {
            customInput.classList.remove('dn-input-error');
        });
    }

})();
</script>
