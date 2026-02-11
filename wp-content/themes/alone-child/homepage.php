<?php
/**
 * Homepage - WordPress Shortcode Template
 * Rendered via [mws_homepage] shortcode in alone-child theme
 */
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    .page-titlebar { display: none !important; }
    .elementor-page-4321 .elementor-section { display: none !important; }

    #mws-home {
        font-family: 'Poppins', sans-serif;
        line-height: 1.7;
        color: #444;
        -webkit-font-smoothing: antialiased;
    }

    #mws-home *,
    #mws-home *::before,
    #mws-home *::after {
        box-sizing: border-box;
    }

    #mws-home {
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
       1 — HERO + QUICK DONATE
       ========================================== */
    #mws-home .hp-hero {
        background: var(--navy);
        padding: 64px 20px 62px;
    }

    #mws-home .hp-hero-inner {
        max-width: 1120px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1.1fr 0.9fr;
        gap: 48px;
        align-items: center;
    }

    #mws-home .hp-hero-left .hp-gold-label {
        display: inline-block;
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: var(--gold);
        margin-bottom: 14px;
    }

    #mws-home .hp-hero-left h1 {
        font-size: 44px;
        font-weight: 700;
        color: var(--white);
        margin: 0 0 18px;
        line-height: 1.2;
    }

    #mws-home .hp-hero-left .hp-subhead {
        font-size: 17px;
        color: rgba(255,255,255,0.88);
        margin: 0 0 32px;
        line-height: 1.7;
        max-width: 480px;
    }

    #mws-home .hp-hero-ctas {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }

    #mws-home .hp-btn-primary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 48px;
        padding: 13px 34px;
        background: var(--gold);
        color: var(--white);
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
        font-weight: 600;
        text-decoration: none;
        transition: background 0.15s;
        border: none;
        cursor: pointer;
    }

    #mws-home .hp-btn-primary:hover {
        background: var(--gold-hover);
        color: var(--white);
    }

    #mws-home .hp-btn-secondary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 48px;
        padding: 13px 34px;
        background: transparent;
        color: var(--white);
        border: 2px solid rgba(255,255,255,0.35);
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
        font-weight: 600;
        text-decoration: none;
        transition: border-color 0.15s, color 0.15s;
    }

    #mws-home .hp-btn-secondary:hover {
        border-color: var(--gold);
        color: var(--gold);
    }

    #mws-home .hp-trust-line {
        font-size: 14px;
        color: rgba(255,255,255,0.6);
        letter-spacing: 0.3px;
    }

    /* Quick Donate Card */
    #mws-home .hp-donate-card {
        background: var(--white);
        border-radius: 14px;
        padding: 30px 26px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.18);
    }

    #mws-home .hp-donate-card h2 {
        font-size: 20px;
        font-weight: 700;
        color: var(--navy);
        margin: 0 0 4px;
        text-align: center;
    }

    #mws-home .hp-donate-sub {
        font-size: 14px;
        color: #666;
        text-align: center;
        margin: 0 0 18px;
    }

    /* Frequency Toggle */
    #mws-home .hp-freq-toggle {
        display: flex;
        background: var(--light-bg);
        border-radius: 30px;
        padding: 4px;
        margin-bottom: 18px;
    }

    #mws-home .hp-freq-btn {
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

    #mws-home .hp-freq-btn.hp-freq-active {
        background: var(--navy);
        color: var(--white);
        box-shadow: 0 2px 8px rgba(0,0,0,0.12);
    }

    /* Amount Pills */
    #mws-home .hp-pills {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 10px;
        margin-bottom: 14px;
    }

    #mws-home .hp-pill {
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
    }

    #mws-home .hp-pill:hover {
        border-color: var(--gold);
    }

    #mws-home .hp-pill.hp-pill-active {
        background: var(--navy);
        border-color: var(--navy);
        color: var(--white);
    }

    /* Custom Amount */
    #mws-home .hp-custom-link {
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

    #mws-home .hp-custom-link:hover {
        color: var(--gold-hover);
    }

    #mws-home .hp-custom-wrap {
        display: none;
        margin-bottom: 16px;
    }

    #mws-home .hp-custom-wrap.hp-custom-visible {
        display: block;
    }

    #mws-home .hp-custom-input {
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

    #mws-home .hp-custom-input:focus {
        border-color: var(--gold);
    }

    /* Continue Button */
    #mws-home .hp-continue-btn {
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

    #mws-home .hp-continue-btn:hover {
        background: var(--gold-hover);
    }

    #mws-home .hp-secure-line {
        font-size: 14px;
        color: #666;
        text-align: center;
        margin: 0;
    }

    @media (max-width: 860px) {
        #mws-home .hp-hero { padding-top: 160px; }
        #mws-home .hp-hero-inner {
            grid-template-columns: 1fr;
            gap: 32px;
            text-align: center;
        }
        #mws-home .hp-hero-left .hp-subhead {
            max-width: 100%;
            margin-left: auto;
            margin-right: auto;
        }
        #mws-home .hp-hero-ctas {
            justify-content: center;
        }
        #mws-home .hp-donate-card {
            max-width: 420px;
            margin: 0 auto;
        }
    }

    @media (max-width: 480px) {
        #mws-home .hp-hero { padding: 48px 16px 48px; }
        #mws-home .hp-hero-left h1 { font-size: 30px; }
        #mws-home .hp-hero-left .hp-subhead { font-size: 15px; }
        #mws-home .hp-pills { grid-template-columns: repeat(2, 1fr); }
    }

    /* ==========================================
       2 — EVENTS MODULE
       ========================================== */
    #mws-home .hp-events {
        max-width: 1120px;
        margin: 0 auto;
        padding: 44px 20px;
    }

    #mws-home .hp-section-heading {
        font-size: 30px;
        font-weight: 700;
        color: var(--navy);
        margin: 0 0 8px;
    }

    #mws-home .hp-section-lead {
        font-size: 16px;
        color: var(--text);
        margin: 0 0 28px;
        line-height: 1.7;
    }

    #mws-home .hp-events-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 24px;
    }

    #mws-home .hp-event-card {
        border-radius: 12px;
        overflow: hidden;
        background: var(--white);
        border: 1px solid #e5e7eb;
        transition: box-shadow 0.15s, transform 0.15s;
        text-decoration: none;
        color: inherit;
        display: block;
    }

    #mws-home .hp-event-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.12);
    }

    #mws-home .hp-event-card img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        object-position: center 30%;
        display: block;
    }

    #mws-home .hp-event-body {
        padding: 20px 22px;
    }

    #mws-home .hp-event-date {
        font-size: 14px;
        font-weight: 600;
        color: var(--gold-text);
        margin-bottom: 6px;
    }

    #mws-home .hp-event-card h3 {
        font-size: 20px;
        font-weight: 600;
        color: var(--navy);
        margin: 0 0 8px;
    }

    #mws-home .hp-event-link {
        font-size: 14px;
        font-weight: 600;
        color: var(--gold-text);
    }

    @media (max-width: 768px) {
        #mws-home .hp-events-grid {
            grid-template-columns: 1fr;
        }
    }

    /* ==========================================
       3 — IMPACT STRIP
       ========================================== */
    #mws-home .hp-impact-bg {
        background: var(--navy);
    }

    #mws-home .hp-impact-inner {
        max-width: 1120px;
        margin: 0 auto;
        padding: 36px 20px;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    #mws-home .hp-impact-stat {
        text-align: center;
        background: rgba(255,255,255,0.08);
        border-radius: 10px;
        padding: 24px 16px;
    }

    #mws-home .hp-impact-stat .hp-stat-number {
        font-size: 36px;
        font-weight: 700;
        color: var(--gold);
        display: block;
    }

    #mws-home .hp-impact-stat .hp-stat-label {
        font-size: 14px;
        color: var(--white);
        opacity: 0.85;
        margin-top: 6px;
        display: block;
    }

    @media (max-width: 600px) {
        #mws-home .hp-impact-inner {
            grid-template-columns: 1fr;
            gap: 12px;
        }
    }

    /* ==========================================
       4 — STORY PREVIEW
       ========================================== */
    #mws-home .hp-story-bg {
        background: var(--light-bg);
    }

    #mws-home .hp-story-inner {
        max-width: 1120px;
        margin: 0 auto;
        padding: 44px 20px;
        display: grid;
        grid-template-columns: 1.2fr 0.8fr;
        gap: 40px;
        align-items: center;
    }

    #mws-home .hp-story-text h2 {
        font-size: 30px;
        font-weight: 700;
        color: var(--navy);
        margin: 0 0 16px;
    }

    #mws-home .hp-story-text p {
        font-size: 16px;
        color: var(--text);
        line-height: 1.8;
        margin: 0 0 24px;
    }

    #mws-home .hp-story-img img {
        width: 100%;
        border-radius: 12px;
        object-fit: cover;
        object-position: center 20%;
    }

    @media (max-width: 768px) {
        #mws-home .hp-story-inner {
            grid-template-columns: 1fr;
            gap: 24px;
        }
        #mws-home .hp-story-img {
            order: -1;
        }
        #mws-home .hp-story-img img {
            max-height: 320px;
        }
    }

    /* ==========================================
       5 — PAST WINNERS PREVIEW
       ========================================== */
    #mws-home .hp-winners {
        max-width: 1120px;
        margin: 0 auto;
        padding: 44px 20px;
    }

    #mws-home .hp-winners-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-top: 24px;
    }

    #mws-home .hp-winner-card {
        text-align: center;
        background: var(--light-bg);
        border-radius: 10px;
        padding: 24px 20px;
        transition: transform 0.15s, box-shadow 0.15s;
        cursor: pointer;
    }

    #mws-home .hp-winner-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.12);
    }

    #mws-home .hp-winner-card img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        object-position: center 20%;
        margin-bottom: 12px;
        border: 3px solid var(--gold);
    }

    #mws-home .hp-winner-card h4 {
        font-size: 16px;
        font-weight: 600;
        color: var(--navy);
        margin: 0 0 4px;
    }

    #mws-home .hp-winner-card .hp-winner-year {
        font-size: 14px;
        color: var(--gold-text);
        font-weight: 600;
        margin-bottom: 6px;
    }

    #mws-home .hp-winner-card p {
        font-size: 14px;
        color: #666;
        margin: 0;
        line-height: 1.5;
    }

    #mws-home .hp-winners-cta {
        text-align: center;
        margin-top: 24px;
    }

    #mws-home .hp-winners-cta a {
        color: var(--gold-text);
        font-weight: 600;
        font-size: 15px;
        text-decoration: none;
    }

    #mws-home .hp-winners-cta a:hover {
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        #mws-home .hp-winners-grid {
            grid-template-columns: 1fr;
            gap: 14px;
        }
    }

    /* ==========================================
       6 — WAYS TO HELP
       ========================================== */
    #mws-home .hp-help {
        max-width: 1120px;
        margin: 0 auto;
        padding: 44px 20px;
    }

    #mws-home .hp-help-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-top: 24px;
    }

    #mws-home .hp-help-card {
        background: var(--light-bg);
        border-radius: 12px;
        padding: 24px 20px;
        text-align: center;
        transition: transform 0.15s, box-shadow 0.15s;
    }

    #mws-home .hp-help-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.12);
    }

    #mws-home .hp-help-card.hp-help-primary {
        background: var(--navy);
        color: var(--white);
    }

    #mws-home .hp-help-card .hp-help-icon {
        font-size: 32px;
        margin-bottom: 12px;
        display: block;
    }

    #mws-home .hp-help-card h3 {
        font-size: 20px;
        font-weight: 600;
        color: var(--navy);
        margin: 0 0 8px;
    }

    #mws-home .hp-help-card.hp-help-primary h3 {
        color: var(--white);
    }

    #mws-home .hp-help-card p {
        font-size: 14px;
        color: #666;
        margin: 0 0 18px;
        line-height: 1.6;
    }

    #mws-home .hp-help-card.hp-help-primary p {
        color: rgba(255,255,255,0.8);
    }

    #mws-home .hp-help-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 44px;
        padding: 10px 24px;
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: background 0.15s, color 0.15s;
    }

    #mws-home .hp-help-link-gold {
        background: var(--gold);
        color: var(--white);
    }

    #mws-home .hp-help-link-gold:hover {
        background: var(--gold-hover);
        color: var(--white);
    }

    #mws-home .hp-help-link-outline {
        background: transparent;
        color: var(--navy);
        border: 2px solid var(--navy);
    }

    #mws-home .hp-help-link-outline:hover {
        background: var(--navy);
        color: var(--white);
    }

    @media (max-width: 768px) {
        #mws-home .hp-help-grid {
            grid-template-columns: 1fr;
        }
    }

    /* ==========================================
       7 — TRUST FOOTER
       ========================================== */
    #mws-home .hp-trust-footer {
        max-width: 700px;
        margin: 0 auto;
        padding: 40px 20px;
        text-align: center;
        border-top: 1px solid #e5e7eb;
    }

    #mws-home .hp-trust-footer p {
        font-size: 14px;
        color: #666;
        line-height: 1.7;
        margin: 0 0 8px;
    }

    #mws-home .hp-trust-footer a {
        color: var(--gold);
        font-weight: 600;
        text-decoration: none;
    }

    #mws-home .hp-trust-footer a:hover {
        text-decoration: underline;
    }

    /* ==========================================
       8 — MOBILE BOTTOM ACTION BAR
       ========================================== */
    #mws-home .hp-mobile-bar {
        display: none;
    }

    @media (max-width: 767px) {
        #mws-home {
            padding-bottom: 80px;
        }
        #mws-home .hp-mobile-bar {
            display: flex;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 9999;
            background: var(--white);
            box-shadow: 0 -2px 12px rgba(0,0,0,0.12);
            padding: 10px 16px;
            gap: 10px;
        }
        #mws-home .hp-mobile-bar a {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 44px;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.15s;
        }
        #mws-home .hp-mob-donate {
            background: var(--gold);
            color: var(--white);
        }
        #mws-home .hp-mob-donate:hover {
            background: var(--gold-hover);
        }
        #mws-home .hp-mob-events {
            background: transparent;
            color: var(--navy);
            border: 2px solid var(--navy);
        }
        #mws-home .hp-mob-events:hover {
            background: var(--navy);
            color: var(--white);
        }
    }

    /* ==========================================
       UTILITIES
       ========================================== */
    #mws-home .hp-btn-primary:focus-visible,
    #mws-home .hp-btn-secondary:focus-visible,
    #mws-home .hp-help-link:focus-visible,
    #mws-home .hp-continue-btn:focus-visible,
    #mws-home a:focus-visible {
        outline: 3px solid var(--gold);
        outline-offset: 3px;
    }
</style>

<div id="mws-home">

    <!-- ===== 1 — HERO + QUICK DONATE ===== -->
    <div class="hp-hero">
        <div class="hp-hero-inner">
            <div class="hp-hero-left">
                <span class="hp-gold-label">The Michael Williams Memorial Scholarship</span>
                <h1>Honor Michael.<br>Fund a Student&rsquo;s Future.</h1>
                <p class="hp-subhead">Every dollar you give goes directly to a $5,000 scholarship for a Rumson-Fair Haven senior who shares Mikey&rsquo;s passion for music, art, and community.</p>
                <div class="hp-hero-ctas">
                    <a href="<?php echo home_url('/donate/'); ?>" class="hp-btn-primary">Donate Now</a>
                    <a href="#hp-events" class="hp-btn-secondary hp-scroll-link">View Events</a>
                </div>
                <div class="hp-trust-line">501(c)(3) Nonprofit &middot; 100% to Scholarships &middot; Tax-Deductible</div>
            </div>
            <div class="hp-donate-card">
                <h2>Quick Donate</h2>
                <p class="hp-donate-sub">100% of your gift funds student scholarships</p>

                <div class="hp-freq-toggle">
                    <button type="button" class="hp-freq-btn hp-freq-active" data-freq="one-time">One-Time</button>
                    <button type="button" class="hp-freq-btn" data-freq="monthly">Monthly</button>
                </div>

                <div class="hp-pills">
                    <button type="button" class="hp-pill" data-amount="25">$25</button>
                    <button type="button" class="hp-pill hp-pill-active" data-amount="50">$50</button>
                    <button type="button" class="hp-pill" data-amount="100">$100</button>
                    <button type="button" class="hp-pill" data-amount="250">$250</button>
                </div>

                <button type="button" class="hp-custom-link">Or enter custom amount</button>
                <div class="hp-custom-wrap">
                    <input type="number" class="hp-custom-input" placeholder="Enter amount ($)" min="1" step="1">
                </div>

                <button type="button" class="hp-continue-btn">Continue to Secure Donation</button>
                <p class="hp-secure-line">&#128274; Secure payment via Stripe</p>
            </div>
        </div>
    </div>

    <!-- ===== 2 — EVENTS MODULE ===== -->
    <div class="hp-events" id="hp-events">
        <h2 class="hp-section-heading">Upcoming Events</h2>
        <p class="hp-section-lead">Join us at our next fundraiser &mdash; every ticket and registration directly supports the scholarship fund.</p>
        <div class="hp-events-grid">
            <a href="<?php echo home_url('/qu-hockey-2026/'); ?>" class="hp-event-card">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/hockey-hero.jpeg" alt="Quinnipiac vs Colgate hockey game fundraiser">
                <div class="hp-event-body">
                    <div class="hp-event-date">February 21, 2026</div>
                    <h3>QU vs Colgate Hockey</h3>
                    <span class="hp-event-link">Get Tickets &rarr;</span>
                </div>
            </a>
            <a href="<?php echo home_url('/volleyball/'); ?>" class="hp-event-card">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/tournament.jpg" alt="Mikey's Beach Volleyball Tournament">
                <div class="hp-event-body">
                    <div class="hp-event-date">March 21, 2026</div>
                    <h3>Mikey&rsquo;s Beach Volleyball Tournament</h3>
                    <span class="hp-event-link">Register Now &rarr;</span>
                </div>
            </a>
        </div>
    </div>

    <!-- ===== 3 — IMPACT STRIP ===== -->
    <div class="hp-impact-bg">
        <div class="hp-impact-inner">
            <div class="hp-impact-stat">
                <span class="hp-stat-number">$30,000+</span>
                <span class="hp-stat-label">Awarded Since 2020</span>
            </div>
            <div class="hp-impact-stat">
                <span class="hp-stat-number">6</span>
                <span class="hp-stat-label">Scholarships Given</span>
            </div>
            <div class="hp-impact-stat">
                <span class="hp-stat-number">100%</span>
                <span class="hp-stat-label">Goes Directly to Students</span>
            </div>
        </div>
    </div>

    <!-- ===== 4 — STORY PREVIEW ===== -->
    <div class="hp-story-bg">
        <div class="hp-story-inner">
            <div class="hp-story-text">
                <h2>Who Was Michael Williams?</h2>
                <p>Mikey had a rare gift &mdash; he made everyone feel like a friend. A creative soul and a pillar of his community, his spirit lives on through every student this scholarship supports. Since 2020, this scholarship honors his legacy by supporting RFH seniors who share his passion for music, art, academics, and service.</p>
                <a href="<?php echo home_url('/about-us/'); ?>" class="hp-btn-primary">Read Michael&rsquo;s Story</a>
            </div>
            <div class="hp-story-img">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2023/02/9e63a8bd5b6decb9db92ff7fbe82fe69-rotated-1.jpg" alt="Michael Williams" width="480" height="480">
            </div>
        </div>
    </div>

    <!-- ===== 5 — PAST WINNERS PREVIEW ===== -->
    <div class="hp-winners">
        <h2 class="hp-section-heading">Past Scholarship Recipients</h2>
        <p class="hp-section-lead">Meet some of the students whose futures you&rsquo;ve helped shape.</p>
        <div class="hp-winners-grid">
            <div class="hp-winner-card">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2025/06/4.jpeg" alt="Evan McCormick, 2025 scholarship recipient">
                <h4>Evan McCormick</h4>
                <div class="hp-winner-year">2025 Recipient</div>
                <p>Georgetown University &mdash; Finance</p>
            </div>
            <div class="hp-winner-card">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2024/10/IMG_3041.jpg" alt="Melanie Marucci, 2024 scholarship recipient">
                <h4>Melanie Marucci</h4>
                <div class="hp-winner-year">2024 Recipient</div>
                <p>University of Richmond &mdash; Business</p>
            </div>
            <div class="hp-winner-card">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2023/06/68cf1109-5c8e-4f82-8408-6fd3f62c8f0a-modified.jpg" alt="Ethan Smith, 2023 scholarship recipient">
                <h4>Ethan Smith</h4>
                <div class="hp-winner-year">2023 Recipient</div>
                <p>Indiana University &mdash; Business</p>
            </div>
        </div>
        <div class="hp-winners-cta">
            <a href="<?php echo home_url('/past-winners/'); ?>">View all past recipients &rarr;</a>
        </div>
    </div>

    <!-- ===== 6 — WAYS TO HELP ===== -->
    <div class="hp-help">
        <h2 class="hp-section-heading">Ways to Help</h2>
        <div class="hp-help-grid">
            <div class="hp-help-card hp-help-primary">
                <span class="hp-help-icon" aria-hidden="true">&#128176;</span>
                <h3>Donate</h3>
                <p>Your gift directly funds the next $5,000 scholarship. Every dollar makes a difference.</p>
                <a href="<?php echo home_url('/donate/'); ?>" class="hp-help-link hp-help-link-gold">Donate Now</a>
            </div>
            <div class="hp-help-card">
                <span class="hp-help-icon" aria-hidden="true">&#127946;</span>
                <h3>Attend an Event</h3>
                <p>Join us at our annual fundraisers &mdash; from hockey games to volleyball tournaments.</p>
                <a href="#hp-events" class="hp-help-link hp-help-link-outline hp-scroll-link">See Events</a>
            </div>
            <div class="hp-help-card">
                <span class="hp-help-icon" aria-hidden="true">&#128227;</span>
                <h3>Spread the Word</h3>
                <p>Share our mission with friends and family. Every conversation helps grow Michael&rsquo;s legacy.</p>
                <a href="https://www.linkedin.com/company/the-michael-williams-memorial-scholarship" target="_blank" rel="noopener" class="hp-help-link hp-help-link-outline">Follow &amp; Share</a>
            </div>
        </div>
    </div>

    <!-- ===== 7 — TRUST FOOTER ===== -->
    <div class="hp-trust-footer">
        <p>The Michael Williams Memorial Scholarship is a registered 501(c)(3) nonprofit. All donations are tax-deductible to the full extent allowed by law.</p>
        <p>Questions? <a href="mailto:info@michaelwilliamsscholarship.com">info@michaelwilliamsscholarship.com</a> &middot; <a href="<?php echo home_url('/our-team/'); ?>">Meet Our Team</a></p>
    </div>

    <!-- ===== 8 — MOBILE BOTTOM BAR ===== -->
    <div class="hp-mobile-bar">
        <a href="<?php echo home_url('/donate/'); ?>" class="hp-mob-donate">Donate</a>
        <a href="#hp-events" class="hp-mob-events hp-scroll-link">Events</a>
    </div>

</div>

<script>
(function() {
    var home = document.getElementById('mws-home');
    if (!home) return;

    /* --- Amount pill selection --- */
    var pills = home.querySelectorAll('.hp-pill');
    var selectedAmount = 50;
    var customInput = home.querySelector('.hp-custom-input');

    pills.forEach(function(pill) {
        pill.addEventListener('click', function() {
            pills.forEach(function(p) { p.classList.remove('hp-pill-active'); });
            pill.classList.add('hp-pill-active');
            selectedAmount = parseInt(pill.getAttribute('data-amount'), 10);
            if (customInput) customInput.value = '';
        });
    });

    /* --- Custom amount toggle --- */
    var customLink = home.querySelector('.hp-custom-link');
    var customWrap = home.querySelector('.hp-custom-wrap');

    if (customLink && customWrap) {
        customLink.addEventListener('click', function() {
            customWrap.classList.toggle('hp-custom-visible');
            if (customWrap.classList.contains('hp-custom-visible') && customInput) {
                customInput.focus();
            }
        });
    }

    if (customInput) {
        customInput.addEventListener('input', function() {
            var val = parseInt(customInput.value, 10);
            if (val > 0) {
                selectedAmount = val;
                pills.forEach(function(p) { p.classList.remove('hp-pill-active'); });
                /* Re-highlight pill if it matches */
                pills.forEach(function(p) {
                    if (parseInt(p.getAttribute('data-amount'), 10) === val) {
                        p.classList.add('hp-pill-active');
                    }
                });
            }
        });
    }

    /* --- Frequency toggle --- */
    var freqBtns = home.querySelectorAll('.hp-freq-btn');
    var selectedFreq = 'one-time';

    freqBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            freqBtns.forEach(function(b) { b.classList.remove('hp-freq-active'); });
            btn.classList.add('hp-freq-active');
            selectedFreq = btn.getAttribute('data-freq');
        });
    });

    /* --- Continue button --- */
    var continueBtn = home.querySelector('.hp-continue-btn');
    if (continueBtn) {
        continueBtn.addEventListener('click', function() {
            var amt = selectedAmount;
            if (customInput && customInput.value) {
                amt = parseInt(customInput.value, 10);
            }
            if (!amt || amt < 1) {
                customWrap.classList.add('hp-custom-visible');
                customInput.focus();
                return;
            }
            var url = '/donate/?amount=' + amt + '&frequency=' + selectedFreq;
            window.location.href = url;
        });
    }

    /* --- Smooth scroll for #hp-events links --- */
    var scrollLinks = home.querySelectorAll('.hp-scroll-link');
    scrollLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            var target = document.getElementById('hp-events');
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
})();
</script>
