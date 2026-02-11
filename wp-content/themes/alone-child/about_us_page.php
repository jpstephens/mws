<?php
/**
 * About Us Page - WordPress Shortcode Template
 * Rendered via [mws_about_us] shortcode in alone-child theme
 */
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    .page-titlebar { display: none !important; }

    #mws-about-us {
        font-family: 'Poppins', sans-serif;
        line-height: 1.7;
        color: #444;
        -webkit-font-smoothing: antialiased;
    }

    #mws-about-us *,
    #mws-about-us *::before,
    #mws-about-us *::after {
        box-sizing: border-box;
    }

    #mws-about-us {
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
       A — HERO
       ========================================== */
    #mws-about-us .au-hero {
        background: var(--navy);
        padding: 70px 20px 50px;
        text-align: center;
        color: var(--white);
    }

    #mws-about-us .au-hero h1 {
        font-size: 44px;
        font-weight: 700;
        margin: 0 0 14px;
        color: var(--white);
    }

    #mws-about-us .au-hero .au-subhead {
        font-size: 18px;
        max-width: 620px;
        margin: 0 auto 28px;
        opacity: 0.92;
        line-height: 1.7;
    }

    #mws-about-us .au-hero .au-ctas {
        display: flex;
        justify-content: center;
        gap: 14px;
        flex-wrap: wrap;
        margin-bottom: 24px;
    }

    #mws-about-us .au-btn-primary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 44px;
        padding: 12px 32px;
        background: var(--gold);
        color: var(--white);
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
        font-weight: 600;
        text-decoration: none;
        transition: background 0.15s;
    }

    #mws-about-us .au-btn-primary:hover {
        background: var(--gold-hover);
        color: var(--white);
    }

    #mws-about-us .au-btn-secondary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 44px;
        padding: 12px 32px;
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

    #mws-about-us .au-btn-secondary:hover {
        border-color: var(--gold);
        color: var(--gold);
    }

    #mws-about-us .au-trust-line {
        font-size: 14px;
        opacity: 0.7;
        letter-spacing: 0.3px;
    }

    @media (max-width: 768px) {
        #mws-about-us .au-hero { padding: 50px 16px 44px; }
        #mws-about-us .au-hero h1 { font-size: 32px; }
        #mws-about-us .au-hero .au-subhead { font-size: 16px; }
    }

    /* ==========================================
       SHARED SECTION STYLES
       ========================================== */
    #mws-about-us .au-section {
        max-width: 1120px;
        margin: 0 auto;
        padding: 44px 20px;
    }

    #mws-about-us .au-section h2 {
        font-size: 30px;
        font-weight: 700;
        color: var(--navy);
        margin: 0 0 20px;
        padding-bottom: 8px;
        border-bottom: 3px solid var(--gold);
        display: inline-block;
    }

    #mws-about-us .au-section p {
        font-size: 16px;
        color: var(--text);
        margin-bottom: 14px;
        line-height: 1.8;
    }

    /* ==========================================
       B — MICHAEL'S STORY
       ========================================== */
    #mws-about-us .au-story-grid {
        margin-top: 12px;
    }

    #mws-about-us .au-story-left h3 {
        font-size: 17px;
        font-weight: 600;
        color: var(--navy);
        margin: 24px 0 8px;
    }

    #mws-about-us .au-story-left h3:first-child {
        margin-top: 0;
    }

    #mws-about-us .au-story-right {
        position: sticky;
        top: 30px;
    }

    #mws-about-us .au-story-right img {
        width: 100%;
        border-radius: 12px;
        object-fit: cover;
        object-position: center 20%;
    }

    #mws-about-us .au-pull-quote {
        background: var(--light-bg);
        border-left: 4px solid var(--gold);
        padding: 18px 22px;
        margin-top: 20px;
        border-radius: 0 10px 10px 0;
        font-style: italic;
        font-size: 15px;
        color: #555;
        line-height: 1.7;
    }

    @media (max-width: 768px) {
        #mws-about-us .au-story-grid {
            grid-template-columns: 1fr;
            gap: 24px;
        }
        #mws-about-us .au-story-right {
            position: static;
            order: -1;
        }
        #mws-about-us .au-story-right img {
            max-height: 320px;
        }
    }

    /* Alternating Story Rows */
    #mws-about-us .au-story-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        align-items: center;
        margin-bottom: 36px;
    }

    #mws-about-us .au-story-row-reverse .au-story-row-img {
        order: 2;
    }

    #mws-about-us .au-story-row-reverse .au-story-row-text {
        order: 1;
    }

    #mws-about-us .au-story-row-img img {
        width: 100%;
        border-radius: 12px;
        object-fit: cover;
        object-position: center 20%;
        height: 380px;
    }

    #mws-about-us .au-story-row-text h3 {
        font-size: 22px;
        font-weight: 600;
        color: var(--navy);
        margin: 0 0 12px;
    }

    #mws-about-us .au-story-row-text p {
        font-size: 16px;
        color: var(--text);
        line-height: 1.8;
        margin: 0;
    }

    @media (max-width: 768px) {
        #mws-about-us .au-story-row {
            grid-template-columns: 1fr;
            gap: 24px;
        }
        #mws-about-us .au-story-row-reverse .au-story-row-img { order: 0; }
        #mws-about-us .au-story-row-reverse .au-story-row-text { order: 0; }
        #mws-about-us .au-story-row-img img { height: 300px; }
    }

    /* ==========================================
       C — VALUES WE HONOR
       ========================================== */
    #mws-about-us .au-values-bg {
        background: var(--light-bg);
    }

    #mws-about-us .au-values-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 18px;
        margin-top: 16px;
    }

    #mws-about-us .au-value-card {
        background: var(--white);
        border-radius: 10px;
        padding: 20px 18px;
        border-left: 4px solid var(--gold);
        transition: transform 0.15s, box-shadow 0.15s;
    }

    #mws-about-us .au-value-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.12);
    }

    #mws-about-us .au-value-card .au-value-icon {
        font-size: 28px;
        margin-bottom: 8px;
        display: block;
    }

    #mws-about-us .au-value-card h3 {
        font-size: 20px;
        font-weight: 600;
        color: var(--navy);
        margin: 0 0 4px;
    }

    #mws-about-us .au-value-card .au-value-sub {
        font-size: 14px;
        color: var(--gold-text);
        font-weight: 600;
        margin: 0 0 8px;
        display: block;
    }

    #mws-about-us .au-value-card p {
        font-size: 14px;
        color: #666;
        margin: 0;
        line-height: 1.6;
    }

    @media (max-width: 768px) {
        #mws-about-us .au-values-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 600px) {
        #mws-about-us .au-values-grid {
            grid-template-columns: 1fr;
        }
    }

    /* ==========================================
       D — SCHOLARSHIP AT A GLANCE
       ========================================== */
    #mws-about-us .au-glance-grid {
        display: grid;
        grid-template-columns: 1.2fr 0.8fr;
        gap: 36px;
        align-items: start;
        margin-top: 12px;
    }

    #mws-about-us .au-stat-tiles {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
    }

    #mws-about-us .au-stat-tile {
        background: var(--light-bg);
        border-radius: 10px;
        padding: 20px 16px;
        text-align: center;
        border-left: 4px solid var(--gold);
    }

    #mws-about-us .au-stat-tile .au-stat-num {
        font-size: 24px;
        font-weight: 700;
        color: var(--navy);
        display: block;
        line-height: 1.2;
    }

    #mws-about-us .au-stat-tile .au-stat-lbl {
        font-size: 13px;
        color: #666;
        margin-top: 4px;
        display: block;
    }

    #mws-about-us .au-glance-cta {
        margin-top: 24px;
    }

    @media (max-width: 768px) {
        #mws-about-us .au-glance-grid {
            grid-template-columns: 1fr;
        }
    }

    /* ==========================================
       E — IMPACT (navy background)
       ========================================== */
    #mws-about-us .au-impact-bg {
        background: var(--navy);
    }

    #mws-about-us .au-impact-bg h2 {
        color: var(--white);
    }

    #mws-about-us .au-impact-row {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-top: 16px;
    }

    #mws-about-us .au-impact-stat {
        text-align: center;
        background: rgba(255,255,255,0.08);
        border-radius: 10px;
        padding: 28px 16px;
    }

    #mws-about-us .au-impact-stat .stat-number {
        font-size: 36px;
        font-weight: 700;
        color: var(--gold);
        display: block;
    }

    #mws-about-us .au-impact-stat .stat-label {
        font-size: 14px;
        color: var(--white);
        opacity: 0.85;
        margin-top: 6px;
        display: block;
    }

    @media (max-width: 600px) {
        #mws-about-us .au-impact-row {
            grid-template-columns: 1fr;
            gap: 12px;
        }
    }

    /* ==========================================
       F — HOW TO HELP
       ========================================== */
    #mws-about-us .au-help-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-top: 16px;
    }

    #mws-about-us .au-help-card {
        background: var(--light-bg);
        border-radius: 12px;
        padding: 24px 20px;
        text-align: center;
        transition: transform 0.15s, box-shadow 0.15s;
    }

    #mws-about-us .au-help-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.12);
    }

    #mws-about-us .au-help-card.au-help-primary {
        background: var(--navy);
        color: var(--white);
    }

    #mws-about-us .au-help-card .au-help-icon {
        font-size: 32px;
        margin-bottom: 12px;
        display: block;
    }

    #mws-about-us .au-help-card h3 {
        font-size: 20px;
        font-weight: 600;
        color: var(--navy);
        margin: 0 0 8px;
    }

    #mws-about-us .au-help-card.au-help-primary h3 {
        color: var(--white);
    }

    #mws-about-us .au-help-card p {
        font-size: 14px;
        color: #666;
        margin: 0 0 18px;
        line-height: 1.6;
    }

    #mws-about-us .au-help-card.au-help-primary p {
        color: rgba(255,255,255,0.8);
    }

    #mws-about-us .au-help-card .au-help-link {
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
        transition: background 0.15s;
    }

    #mws-about-us .au-help-card .au-help-link-gold {
        background: var(--gold);
        color: var(--white);
    }

    #mws-about-us .au-help-card .au-help-link-gold:hover {
        background: var(--gold-hover);
        color: var(--white);
    }

    #mws-about-us .au-help-card .au-help-link-outline {
        background: transparent;
        color: var(--navy);
        border: 2px solid var(--navy);
    }

    #mws-about-us .au-help-card .au-help-link-outline:hover {
        background: var(--navy);
        color: var(--white);
    }

    @media (max-width: 768px) {
        #mws-about-us .au-help-grid {
            grid-template-columns: 1fr;
        }
    }

    /* ==========================================
       G — BOARD PREVIEW
       ========================================== */
    #mws-about-us .au-board-bg {
        background: var(--light-bg);
    }

    #mws-about-us .au-board-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 24px;
        margin-top: 20px;
        text-align: center;
    }

    #mws-about-us .au-board-member img {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        object-fit: cover;
        object-position: center 20%;
        border: 3px solid var(--gold);
        margin-bottom: 12px;
        transition: transform 0.15s;
    }

    #mws-about-us .au-board-member img:hover {
        transform: scale(1.05);
    }

    #mws-about-us .au-board-member h4 {
        font-size: 16px;
        font-weight: 600;
        color: var(--navy);
        margin: 0 0 2px;
    }

    #mws-about-us .au-board-member .au-board-role {
        font-size: 14px;
        color: #666;
    }

    #mws-about-us .au-board-cta {
        text-align: center;
        margin-top: 28px;
    }

    @media (max-width: 768px) {
        #mws-about-us .au-board-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 600px) {
        #mws-about-us .au-board-grid {
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }
        #mws-about-us .au-board-member img {
            width: 110px;
            height: 110px;
        }
    }

    /* ==========================================
       H — FAQ
       ========================================== */
    #mws-about-us .au-faq-list {
        max-width: 100%;
        margin-top: 16px;
    }

    #mws-about-us .au-faq-list details {
        border-bottom: 1px solid #e5e7eb;
    }

    #mws-about-us .au-faq-list details summary {
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

    #mws-about-us .au-faq-list details summary::-webkit-details-marker {
        display: none;
    }

    #mws-about-us .au-faq-list details summary::after {
        content: '+';
        font-size: 22px;
        font-weight: 400;
        color: var(--gold);
        flex-shrink: 0;
        margin-left: 16px;
        transition: transform 0.15s;
    }

    #mws-about-us .au-faq-list details[open] summary::after {
        content: '\2212';
    }

    #mws-about-us .au-faq-list details .au-faq-answer {
        font-size: 15px;
        color: var(--text);
        line-height: 1.7;
        padding: 0 0 18px;
    }

    #mws-about-us .au-faq-list details .au-faq-answer a {
        color: var(--gold-text);
        font-weight: 600;
        text-decoration: none;
    }

    #mws-about-us .au-faq-list details .au-faq-answer a:hover {
        text-decoration: underline;
    }

    /* ==========================================
       UTILITIES
       ========================================== */
    #mws-about-us .au-btn-primary:focus-visible,
    #mws-about-us .au-btn-secondary:focus-visible,
    #mws-about-us .au-help-link:focus-visible,
    #mws-about-us a:focus-visible {
        outline: 3px solid var(--gold);
        outline-offset: 3px;
    }

</style>

<div id="mws-about-us">

    <!-- ===== A — HERO ===== -->
    <div class="au-hero">
        <h1>About Michael Williams</h1>
        <p class="au-subhead">Mikey had a rare gift &mdash; he made everyone feel like a friend. This scholarship keeps his spirit alive by supporting the next generation of RFH seniors.</p>
        <div class="au-ctas">
            <a href="<?php echo home_url('/donate/'); ?>" class="au-btn-primary">Donate</a>
            <a href="<?php echo home_url('/scholarship/'); ?>" class="au-btn-secondary">Scholarship Details</a>
        </div>
        <div class="au-trust-line">501(c)(3) Nonprofit &middot; Secure Stripe Checkout &middot; 100% to Scholarships</div>
    </div>

    <!-- ===== B — MICHAEL'S STORY ===== -->
    <div class="au-section">
        <h2>Michael's Story</h2>
        <div class="au-story-grid">
            <!-- Full-width banner photo -->
            <div class="au-story-row">
                <div class="au-story-row-img" style="grid-column: 1 / -1;">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2023/02/9e63a8bd5b6decb9db92ff7fbe82fe69-rotated-1.jpg" alt="Michael Williams" style="height: 420px; width: 100%; border-radius: 12px; object-fit: cover; object-position: center 20%;">
                </div>
            </div>

            <!-- A friend to everyone — image left -->
            <div class="au-story-row">
                <div class="au-story-row-img">
                    <!-- TODO: Replace with additional photo of Michael -->
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2023/02/9e63a8bd5b6decb9db92ff7fbe82fe69-rotated-1.jpg" alt="Michael with friends">
                </div>
                <div class="au-story-row-text">
                    <h3>A friend to everyone</h3>
                    <p>Michael Williams&mdash;&ldquo;Mikey&rdquo; to everyone who knew him&mdash;left a lasting imprint on the people around him. He was generous with his time, genuinely curious about others, and the kind of person who made you feel like the most important one in the room.</p>
                </div>
            </div>

            <!-- Music and art — image right -->
            <div class="au-story-row au-story-row-reverse">
                <div class="au-story-row-img">
                    <!-- TODO: Replace with photo of Michael with music/art -->
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2023/02/9e63a8bd5b6decb9db92ff7fbe82fe69-rotated-1.jpg" alt="Michael playing guitar">
                </div>
                <div class="au-story-row-text">
                    <h3>Music and art were his language</h3>
                    <p>Whether playing acoustic guitar for friends, painting in his studio, or finding creative outlets in his career, Michael expressed himself through art. His mother Carol still maintains &ldquo;Mike&rsquo;s Gallery,&rdquo; a dedicated space showcasing his paintings&mdash;each one inspired by his personal thoughts, dreams, and the world around him.</p>
                </div>
            </div>

            <!-- A love for community — image left -->
            <div class="au-story-row">
                <div class="au-story-row-img">
                    <!-- TODO: Replace with photo of Michael in community -->
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2023/02/9e63a8bd5b6decb9db92ff7fbe82fe69-rotated-1.jpg" alt="Michael in his community">
                </div>
                <div class="au-story-row-text">
                    <h3>A love for community</h3>
                    <p>Michael grew up in Rumson and Sea Bright, where he built deep roots. He attended Rumson-Fair Haven Regional High School and later earned his MBA from Quinnipiac University. He loved the beach, sports, animals, and learning about people. Above all, he loved his family and his community.</p>
                </div>
            </div>

            <!-- Why this scholarship — image right -->
            <div class="au-story-row au-story-row-reverse">
                <div class="au-story-row-img">
                    <!-- TODO: Replace with scholarship/legacy photo -->
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2023/02/9e63a8bd5b6decb9db92ff7fbe82fe69-rotated-1.jpg" alt="The Michael Williams Memorial Scholarship">
                </div>
                <div class="au-story-row-text">
                    <h3>Why this scholarship exists</h3>
                    <p>Established in 2020, the Michael Williams Memorial Scholarship exists to keep Mikey&rsquo;s spirit alive by supporting a graduating RFH senior each year&mdash;someone who, like Michael, blends creativity, kindness, academic drive, and commitment to community.</p>
                </div>
            </div>

            <div class="au-pull-quote">
                &ldquo;Our goal is to memorialize his life in a new student each year.&rdquo;
            </div>
        </div>
    </div>

    <!-- ===== C — VALUES WE HONOR ===== -->
    <div class="au-values-bg">
        <div class="au-section">
            <h2>Values We Honor</h2>
            <div class="au-values-grid">
                <div class="au-value-card">
                    <span class="au-value-icon" aria-hidden="true">&#127928;</span>
                    <h3>Creativity</h3>
                    <span class="au-value-sub">Music &amp; Art</span>
                    <p>A passion for creative expression&mdash;through music, visual art, writing, or any form of artistic pursuit.</p>
                </div>
                <div class="au-value-card">
                    <span class="au-value-icon" aria-hidden="true">&#128218;</span>
                    <h3>Curiosity</h3>
                    <span class="au-value-sub">Academic Drive</span>
                    <p>Intellectual curiosity and dedication to learning that reflects a desire to grow and understand the world.</p>
                </div>
                <div class="au-value-card">
                    <span class="au-value-icon" aria-hidden="true">&#129309;</span>
                    <h3>Community</h3>
                    <span class="au-value-sub">Service &amp; Leadership</span>
                    <p>Active engagement through volunteering, mentoring, or leadership that makes the community stronger.</p>
                </div>
                <div class="au-value-card">
                    <span class="au-value-icon" aria-hidden="true">&#128156;</span>
                    <h3>Kindness</h3>
                    <span class="au-value-sub">Character &amp; Spirit</span>
                    <p>The warmth, humor, and generosity that lifts others up&mdash;the qualities that defined Michael.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== D — SCHOLARSHIP AT A GLANCE ===== -->
    <div class="au-section">
        <h2>Scholarship at a Glance</h2>
        <div class="au-glance-grid">
            <div class="au-glance-text">
                <p>Each year, the Michael Williams Memorial Scholarship awards <strong>$5,000</strong> to a graduating senior at Rumson-Fair Haven Regional High School. Recipients are selected through the RFH guidance department based on how well they embody the creativity, curiosity, community involvement, and kindness that Michael carried throughout his life.</p>
                <p>Since 2020, we&rsquo;ve supported six outstanding students on their path to college and beyond.</p>
                <div class="au-glance-cta">
                    <a href="<?php echo home_url('/scholarship/'); ?>" class="au-btn-primary">See Full Scholarship Details</a>
                </div>
            </div>
            <div class="au-stat-tiles">
                <div class="au-stat-tile">
                    <span class="au-stat-num">$5,000</span>
                    <span class="au-stat-lbl">Annual Award</span>
                </div>
                <div class="au-stat-tile">
                    <span class="au-stat-num">RFH</span>
                    <span class="au-stat-lbl">Seniors Eligible</span>
                </div>
                <div class="au-stat-tile">
                    <span class="au-stat-num">Spring</span>
                    <span class="au-stat-lbl">Awarded Each Year</span>
                </div>
                <div class="au-stat-tile">
                    <span class="au-stat-num">Guidance</span>
                    <span class="au-stat-lbl">Coordinated Through</span>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== E — IMPACT ===== -->
    <div class="au-impact-bg">
        <div class="au-section">
            <h2>Our Impact</h2>
            <div class="au-impact-row">
                <div class="au-impact-stat">
                    <span class="stat-number">$30,000+</span>
                    <span class="stat-label">Awarded Since 2020</span>
                </div>
                <div class="au-impact-stat">
                    <span class="stat-number">6</span>
                    <span class="stat-label">Scholarships Given</span>
                </div>
                <div class="au-impact-stat">
                    <span class="stat-number">100%</span>
                    <span class="stat-label">Goes Directly to Students</span>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== F — HOW TO HELP ===== -->
    <div class="au-section">
        <h2>How You Can Help</h2>
        <div class="au-help-grid">
            <div class="au-help-card au-help-primary">
                <span class="au-help-icon" aria-hidden="true">&#128176;</span>
                <h3>Donate</h3>
                <p>Your gift directly funds the next $5,000 scholarship. Every dollar makes a difference.</p>
                <a href="<?php echo home_url('/donate/'); ?>" class="au-help-link au-help-link-gold">Donate Now</a>
            </div>
            <div class="au-help-card">
                <span class="au-help-icon" aria-hidden="true">&#127946;</span>
                <h3>Attend an Event</h3>
                <p>Join us at our annual fundraisers&mdash;from hockey games to volleyball tournaments.</p>
                <a href="<?php echo home_url('/qu-hockey-2026/'); ?>" class="au-help-link au-help-link-outline">See Events</a>
            </div>
            <div class="au-help-card">
                <span class="au-help-icon" aria-hidden="true">&#128227;</span>
                <h3>Spread the Word</h3>
                <p>Share our mission with friends and family. Every conversation helps grow Michael&rsquo;s legacy.</p>
                <a href="https://www.linkedin.com/company/the-michael-williams-memorial-scholarship" target="_blank" rel="noopener" class="au-help-link au-help-link-outline">Follow &amp; Share</a>
            </div>
        </div>
    </div>

    <!-- ===== G — BOARD PREVIEW ===== -->
    <div class="au-board-bg">
        <div class="au-section">
            <h2>Meet the Board</h2>
            <div class="au-board-grid">
                <div class="au-board-member">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2024/09/jason.jpg" alt="Jason Stephens">
                    <h4>Jason Stephens</h4>
                </div>
                <div class="au-board-member">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2023/06/IMG_0800.jpg" alt="Vincent Fabrico">
                    <h4>Vincent Fabrico</h4>
                </div>
                <div class="au-board-member">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2023/06/Jesse-Login_MW-1.jpg" alt="Jesse Login">
                    <h4>Jesse Login</h4>
                </div>
                <div class="au-board-member">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2023/06/IMG_2284.jpg" alt="Joe Prota">
                    <h4>Joe Prota</h4>
                </div>
                <div class="au-board-member">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2024/09/chris.jpg" alt="Chris Goger">
                    <h4>Chris Goger</h4>
                </div>
            </div>
            <div class="au-board-cta">
                <a href="<?php echo home_url('/our-team/'); ?>" class="au-btn-primary">Meet Our Full Team</a>
            </div>
        </div>
    </div>

    <!-- ===== H — FAQ ===== -->
    <div class="au-section">
        <h2>Frequently Asked Questions</h2>
        <div class="au-faq-list">

            <details>
                <summary>Is my donation tax deductible?</summary>
                <div class="au-faq-answer">
                    Yes. The Michael Williams Memorial Scholarship is a registered 501(c)(3) nonprofit organization. All donations are tax-deductible to the full extent allowed by law. You will receive a receipt for your records after donating.
                </div>
            </details>

            <details>
                <summary>Is my payment secure?</summary>
                <div class="au-faq-answer">
                    Absolutely. All payments are processed through <strong>Stripe</strong>, an industry-leading payment processor used by millions of organizations. Your financial information is encrypted and never stored on our servers.
                </div>
            </details>

            <details>
                <summary>Do you accept corporate matching?</summary>
                <div class="au-faq-answer">
                    Yes, we welcome corporate matching gifts. If your employer offers a matching program, please check with your HR department. For any coordination needed, <a href="mailto:info@michaelwilliamsscholarship.com">contact us</a> and we&rsquo;ll be happy to help.
                </div>
            </details>

            <details>
                <summary>How are scholarship recipients selected?</summary>
                <div class="au-faq-answer">
                    Recipients are selected through the Rumson-Fair Haven Regional High School guidance department. Students are evaluated based on their demonstrated musical or artistic ability, academic dedication, and meaningful community engagement. <a href="<?php echo home_url('/scholarship/'); ?>">Learn more about the scholarship criteria</a>.
                </div>
            </details>

            <details>
                <summary>Can I volunteer or sponsor an event?</summary>
                <div class="au-faq-answer">
                    We&rsquo;d love your involvement! We host several fundraising events throughout the year, including hockey games and volleyball tournaments. To discuss sponsorship or volunteer opportunities, please reach out to us at <a href="mailto:info@michaelwilliamsscholarship.com">info@michaelwilliamsscholarship.com</a>.
                </div>
            </details>

            <details>
                <summary>How do I contact the board?</summary>
                <div class="au-faq-answer">
                    You can reach us by email at <a href="mailto:info@michaelwilliamsscholarship.com">info@michaelwilliamsscholarship.com</a>. You can also connect with us on <a href="https://www.linkedin.com/company/the-michael-williams-memorial-scholarship" target="_blank" rel="noopener">LinkedIn</a>. We&rsquo;re always happy to hear from supporters.
                </div>
            </details>

        </div>
    </div>

</div>
