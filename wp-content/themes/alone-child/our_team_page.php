<?php
/**
 * Our Team Page - WordPress Shortcode Template
 * Rendered via [mws_our_team] shortcode in alone-child theme
 */
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    .page-titlebar { display: none !important; }

    /* Hide the old WP Team Showcase plugin output */
    .wp_teamshowcase_slider,
    .wp-team-showcase,
    .team_flavor_developer { display: none !important; }

    #mws-team {
        font-family: 'Poppins', sans-serif;
        line-height: 1.7;
        color: #444;
        -webkit-font-smoothing: antialiased;
    }

    #mws-team *,
    #mws-team *::before,
    #mws-team *::after {
        box-sizing: border-box;
    }

    #mws-team {
        --gold: #cda33b;
        --gold-hover: #b8930e;
        --gold-text: #8a6d1b;
        --navy: #232842;
        --white: #ffffff;
        --light-bg: #f8f8f8;
        --text: #444;
        --border: rgba(31,36,51,0.10);
        --radius: 16px;
    }

    /* ==========================================
       A — BOARD MISSION HERO
       ========================================== */
    #mws-team .tm-hero {
        background: var(--navy);
        padding: 110px 20px;
        color: var(--white);
        position: relative;
        overflow: hidden;
    }

    #mws-team .tm-hero::before {
        content: none;
    }

    #mws-team .tm-hero::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--gold), var(--gold-hover), var(--gold));
    }

    #mws-team .tm-hero-inner {
        max-width: 1120px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1.15fr 0.85fr;
        gap: 44px;
        align-items: start;
    }

    #mws-team .tm-hero h1 {
        font-size: 48px;
        font-weight: 700;
        margin: 0 0 12px;
        color: var(--white);
        line-height: 1.15;
    }

    #mws-team .tm-hero .tm-intro {
        font-size: 16px;
        opacity: 0.85;
        margin: 0 0 20px;
    }

    #mws-team .tm-hero .tm-mission {
        font-size: 16px;
        line-height: 1.7;
        color: rgba(255,255,255,0.92);
        margin: 0 0 20px;
        max-width: 58ch;
    }

    #mws-team .tm-goals {
        list-style: none;
        padding: 0;
        margin: 0 0 28px;
    }

    #mws-team .tm-goals li {
        position: relative;
        padding-left: 22px;
        margin-bottom: 10px;
        font-size: 15px;
        color: rgba(255,255,255,0.88);
        line-height: 1.6;
    }

    #mws-team .tm-goals li::before {
        content: '';
        position: absolute;
        left: 0;
        top: 9px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: var(--gold);
    }

    #mws-team .tm-hero-ctas {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
    }

    /* Right-side mission snapshot */
    #mws-team .tm-hero-right {
        background: rgba(255,255,255,0.07);
        border: 1px solid rgba(255,255,255,0.16);
        border-radius: 14px;
        padding: 22px 22px 20px;
        backdrop-filter: blur(2px);
    }

    #mws-team .tm-panel-kicker {
        margin: 0 0 6px;
        font-size: 12px;
        letter-spacing: 1px;
        text-transform: uppercase;
        font-weight: 700;
        color: var(--gold);
    }

    #mws-team .tm-panel-title {
        margin: 0 0 12px;
        font-size: 24px;
        line-height: 1.25;
        color: #fff;
        font-weight: 700;
    }

    #mws-team .tm-panel-quote {
        margin: 0 0 16px;
        font-size: 15px;
        line-height: 1.7;
        color: rgba(255,255,255,0.88);
    }

    #mws-team .tm-panel-quote strong {
        color: #fff;
    }

    #mws-team .tm-hero-stats {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 10px;
        margin-top: 6px;
    }

    #mws-team .tm-hero-stat {
        border-radius: 10px;
        border: 1px solid rgba(255,255,255,0.18);
        background: rgba(0,0,0,0.12);
        padding: 12px 10px;
        text-align: center;
    }

    #mws-team .tm-hero-stat .value {
        display: block;
        font-size: 24px;
        font-weight: 700;
        color: var(--gold);
        line-height: 1.1;
    }

    #mws-team .tm-hero-stat .label {
        display: block;
        margin-top: 4px;
        font-size: 11px;
        letter-spacing: 0.2px;
        text-transform: uppercase;
        color: rgba(255,255,255,0.8);
        line-height: 1.3;
    }

    /* Buttons */
    #mws-team .tm-btn-primary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 48px;
        padding: 13px 32px;
        background: var(--gold);
        color: var(--white);
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
        font-size: 15px;
        font-weight: 600;
        text-decoration: none;
        transition: background 0.15s;
    }

    #mws-team .tm-btn-primary:hover {
        background: var(--gold-hover);
        color: var(--white);
    }

    #mws-team .tm-btn-secondary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 48px;
        padding: 13px 32px;
        background: transparent;
        color: var(--white);
        border: 2px solid rgba(255,255,255,0.35);
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
        font-size: 15px;
        font-weight: 600;
        text-decoration: none;
        transition: border-color 0.15s, color 0.15s;
    }

    #mws-team .tm-btn-secondary:hover {
        border-color: var(--gold);
        color: var(--gold);
    }

    @media (max-width: 860px) {
        #mws-team .tm-hero { padding: 90px 16px; }
        #mws-team .tm-hero h1 { font-size: 36px; }
        #mws-team .tm-hero-ctas { justify-content: flex-start; }
        #mws-team .tm-hero-inner { grid-template-columns: 1fr; gap: 22px; }
        #mws-team .tm-hero-right { padding: 18px 16px; }
        #mws-team .tm-panel-title { font-size: 21px; }
    }

    /* ==========================================
       B — MEMBER PROFILES — Alternating Rows
       ========================================== */
    #mws-team .tm-profiles-header {
        max-width: 1120px;
        margin: 0 auto;
        padding: 32px 20px 0;
    }

    #mws-team .tm-profiles-header h2 {
        font-size: 28px;
        font-weight: 700;
        color: var(--navy);
        margin: 0 0 8px;
    }

    #mws-team .tm-row {
        padding: 36px 20px;
    }

    #mws-team .tm-row:first-of-type {
        padding-top: 24px;
    }

    #mws-team .tm-row-inner {
        max-width: 1120px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 48px;
        align-items: center;
    }

    /* Photo */
    #mws-team .tm-photo img {
        width: 100%;
        height: 420px;
        object-fit: cover;
        object-position: center 20%;
        border-radius: var(--radius);
        display: block;
    }

    #mws-team .tm-photo img:hover {
        transform: scale(1.02);
        transition: transform 0.15s;
    }

    /* Text */
    #mws-team .tm-text h3 {
        font-size: 28px;
        font-weight: 700;
        color: var(--navy);
        margin: 0 0 18px;
    }

    #mws-team .tm-text p {
        font-size: 15px;
        color: var(--text);
        line-height: 1.8;
        margin: 0 0 14px;
    }

    #mws-team .tm-text p:last-child {
        margin-bottom: 0;
    }

    /* Alternating backgrounds */
    #mws-team .tm-row:nth-child(odd) {
        background: var(--white);
    }

    #mws-team .tm-row:nth-child(even) {
        background: var(--light-bg);
    }

    /* Even rows: flip photo to right */
    #mws-team .tm-row-reverse .tm-photo {
        order: 2;
    }

    #mws-team .tm-row-reverse .tm-text {
        order: 1;
    }

    @media (max-width: 900px) {
        #mws-team .tm-row-inner { gap: 32px; }
        #mws-team .tm-photo img { height: 360px; }
        #mws-team .tm-text h3 { font-size: 24px; }
    }

    @media (max-width: 768px) {
        #mws-team .tm-row { padding: 32px 16px; }
        #mws-team .tm-row-inner {
            grid-template-columns: 1fr;
            gap: 24px;
        }
        #mws-team .tm-row-reverse .tm-photo { order: 0; }
        #mws-team .tm-row-reverse .tm-text { order: 0; }
        #mws-team .tm-photo img { height: 340px; }
        #mws-team .tm-text h3 { font-size: 24px; }
    }

    /* ==========================================
       C — CTA
       ========================================== */
    #mws-team .tm-cta-section {
        padding: 0 20px 48px;
    }

    #mws-team .tm-cta {
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
        border-radius: var(--radius);
        border: 1px solid rgba(205,163,59,0.25);
        background: rgba(205,163,59,0.08);
        padding: 36px 28px;
    }

    #mws-team .tm-cta h2 {
        font-size: 26px;
        font-weight: 700;
        color: var(--navy);
        margin: 0 0 10px;
    }

    #mws-team .tm-cta p {
        font-size: 15px;
        color: var(--text);
        margin: 0 0 28px;
        line-height: 1.7;
    }

    #mws-team .tm-cta-btns {
        display: flex;
        justify-content: center;
        gap: 14px;
        flex-wrap: wrap;
    }

    #mws-team .tm-cta .tm-btn-outline {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 48px;
        padding: 13px 28px;
        background: transparent;
        color: var(--navy);
        border: 2px solid var(--navy);
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
        font-size: 15px;
        font-weight: 600;
        text-decoration: none;
        transition: background 0.15s, color 0.15s;
    }

    #mws-team .tm-cta .tm-btn-outline:hover {
        background: var(--navy);
        color: var(--white);
    }

    /* ==========================================
       UTILITIES
       ========================================== */
    #mws-team a:focus-visible {
        outline: 3px solid var(--gold);
        outline-offset: 3px;
        border-radius: 8px;
    }
</style>

<div id="mws-team">

    <!-- ===== A — BOARD MISSION HERO ===== -->
    <div class="tm-hero">
        <div class="tm-hero-inner">
            <div class="tm-hero-left">
                <h1>Meet the Board</h1>
                <p class="tm-intro">The volunteers behind the Michael Williams Memorial Scholarship.</p>
                <p class="tm-mission">Michael had a rare gift &mdash; he made everyone feel like a friend. The scholarship keeps that spirit alive by bringing our community together throughout the year through events that celebrate life and create opportunity for students. Our board&rsquo;s purpose is simple: turn friendship and community into scholarships and acts of good in Michael&rsquo;s name.</p>
                <ul class="tm-goals">
                    <li>Bring the community together through annual events that fund scholarships</li>
                    <li>Award scholarships to graduating seniors who reflect creativity, character, and community</li>
                    <li>Grow sponsorships and participation to expand our annual impact</li>
                    <li>Operate with transparency, care, and respect for Michael&rsquo;s legacy</li>
                </ul>
                <div class="tm-hero-ctas">
                    <a href="mailto:info@michaelwilliamsscholarship.com" class="tm-btn-primary">Contact Us</a>
                    <a href="<?php echo home_url('/donate/'); ?>" class="tm-btn-secondary">Donate</a>
                </div>
            </div>
            <aside class="tm-hero-right" aria-label="Board snapshot">
                <p class="tm-panel-kicker">Board Snapshot</p>
                <h2 class="tm-panel-title">Turning Community Into Scholarships</h2>
                <p class="tm-panel-quote"><strong>Our mission:</strong> host meaningful events, grow support each year, and award scholarships that reflect Michael&rsquo;s values.</p>
                <div class="tm-hero-stats">
                    <div class="tm-hero-stat">
                        <span class="value">6</span>
                        <span class="label">Recipients Since 2020</span>
                    </div>
                    <div class="tm-hero-stat">
                        <span class="value">$30K+</span>
                        <span class="label">Awarded to Students</span>
                    </div>
                    <div class="tm-hero-stat">
                        <span class="value">100%</span>
                        <span class="label">Net Proceeds to Scholarships</span>
                    </div>
                </div>
            </aside>
        </div>
    </div>

    <!-- ===== B — BOARD PROFILES ===== -->
    <div class="tm-profiles-header" id="our-board">
        <h2>Our Board</h2>
    </div>

    <!-- Jason Stephens — photo left -->
    <div class="tm-row">
        <div class="tm-row-inner">
            <div class="tm-photo">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2024/09/jason.jpg" alt="Jason Stephens">
            </div>
            <div class="tm-text">
                <h3>Jason Stephens</h3>
                <p>Jason is the President of the Michael Williams Memorial Scholarship and co-founder of BlackBridge Investments, which he launched in 2011. A 2005 graduate of Quinnipiac University, Jason channels his entrepreneurial drive into growing the foundation&rsquo;s impact each year.</p>
                <p>He lives in Huntington, NY with his wife Jackie and their children Luke and Sophia. When he&rsquo;s not working on the scholarship, you&rsquo;ll find him playing drums or guitar &mdash; a passion he shared with Michael.</p>
            </div>
        </div>
    </div>

    <!-- Vincent Fabrico — photo right -->
    <div class="tm-row tm-row-reverse">
        <div class="tm-row-inner">
            <div class="tm-photo">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2023/06/IMG_0800.jpg" alt="Vincent Fabrico">
            </div>
            <div class="tm-text">
                <h3>Vincent Fabrico</h3>
                <p>Vincent is the Co-Founder and Director of Operations for the Michael Williams Memorial Scholarship. He co-founded BlackBridge Investments with Jason Stephens and graduated from Quinnipiac University in 2005, where his friendship with Michael began.</p>
                <p>He resides in Holmdel, NJ with his girlfriend Christine and their four sons. Vincent enjoys outdoor sports and family travel, and remains committed to honoring Michael&rsquo;s legacy through the foundation&rsquo;s events and outreach.</p>
            </div>
        </div>
    </div>

    <!-- Jesse Login — photo left -->
    <div class="tm-row">
        <div class="tm-row-inner">
            <div class="tm-photo">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2023/06/Jesse-Login_MW-1.jpg" alt="Jesse Login">
            </div>
            <div class="tm-text">
                <h3>Jesse Login</h3>
                <p>Jesse holds a marketing degree from Quinnipiac University (2005) and has spent over 15 years in marketing and events roles, including work with WWE. He joined the board in 2022 and was instrumental in launching the annual golf outing.</p>
                <p>Jesse lives in Huntington, NY with his wife Jessica and their two sons. His event-planning expertise and deep connection to Michael&rsquo;s community make him a driving force behind the foundation&rsquo;s fundraisers.</p>
            </div>
        </div>
    </div>

    <!-- Joe Prota — photo right -->
    <div class="tm-row tm-row-reverse">
        <div class="tm-row-inner">
            <div class="tm-photo">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2023/06/IMG_2284.jpg" alt="Joe Prota">
            </div>
            <div class="tm-text">
                <h3>Joe Prota</h3>
                <p>Joe is a Director of Brand Marketing at IBM with over 15 years of agency and in-house experience, including work with YouTube and BMW. He was Michael&rsquo;s college roommate at Quinnipiac University, making the scholarship&rsquo;s mission deeply personal.</p>
                <p>When he&rsquo;s not working, you&rsquo;ll find Joe with his wife, their two boys, and their dog &mdash; and always ready to support a good cause in Michael&rsquo;s name.</p>
            </div>
        </div>
    </div>

    <!-- Chris Goger — photo left -->
    <div class="tm-row">
        <div class="tm-row-inner">
            <div class="tm-photo">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2024/09/chris.jpg" alt="Chris Goger">
            </div>
            <div class="tm-text">
                <h3>Chris Goger</h3>
                <p>Chris has been the Senior Director of Recycling at BlackBridge Investments for nine years and is the co-founder of BlackBridge Logistics. His close ties to the founding team make him a natural fit on the board.</p>
                <p>He resides in Point Pleasant, NJ with his wife Megan, their children Thomas and Emma, and dog Jackson. Chris enjoys fitness, sports, and cooking &mdash; and brings the same energy and dedication to every foundation event.</p>
            </div>
        </div>
    </div>

    <!-- ===== C — GET INVOLVED CTA ===== -->
    <div class="tm-cta-section" id="get-involved">
        <div class="tm-cta">
            <h2>Want to Get Involved?</h2>
            <p>We&rsquo;re always grateful for community support &mdash; whether it&rsquo;s volunteering, sponsoring an event, or making a donation.</p>
            <div class="tm-cta-btns">
                <a href="mailto:info@michaelwilliamsscholarship.com" class="tm-btn-outline">Email Us</a>
                <a href="<?php echo home_url('/donate/'); ?>" class="tm-btn-primary">Donate</a>
            </div>
        </div>
    </div>

</div>

<script>
(function() {
    var links = document.querySelectorAll('#mws-team .tm-jumplinks a');
    links.forEach(function(link) {
        link.addEventListener('click', function(e) {
            var id = link.getAttribute('href').substring(1);
            var target = document.getElementById(id);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
})();
</script>
