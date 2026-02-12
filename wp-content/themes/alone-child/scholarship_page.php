<?php
/**
 * Scholarship Info Page - WordPress Shortcode Template
 * Rendered via [mws_scholarship] shortcode in alone-child theme
 */
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    .page-titlebar { display: none !important; }

    #mws-scholarship {
        font-family: 'Poppins', sans-serif;
        line-height: 1.7;
        color: #333;
        -webkit-font-smoothing: antialiased;
    }

    #mws-scholarship *,
    #mws-scholarship *::before,
    #mws-scholarship *::after {
        box-sizing: border-box;
    }

    #mws-scholarship {
        --gold: #cda33b;
        --gold-hover: #b8930e;
        --gold-text: #8a6d1b;
        --navy: #232842;
        --white: #ffffff;
        --light-bg: #f8f8f8;
        --text: #444;
        --heading: #111;
    }

    /* Hero Banner */
    #mws-scholarship .sch-hero {
        background: var(--navy);
        padding: 112px 20px 56px;
        text-align: center;
        color: var(--white);
    }

    #mws-scholarship .sch-hero h1 {
        font-size: 46px;
        font-weight: 700;
        margin: 0 0 12px;
        color: var(--white);
    }

    #mws-scholarship .sch-hero p {
        font-size: 18px;
        max-width: 650px;
        margin: 0 auto;
        opacity: 0.9;
        line-height: 1.7;
    }

    #mws-scholarship .sch-hero .sch-amount {
        display: inline-block;
        background: var(--gold);
        color: var(--white);
        font-size: 22px;
        font-weight: 700;
        padding: 10px 28px;
        border-radius: 8px;
        margin-top: 20px;
    }

    @media (max-width: 768px) {
        #mws-scholarship .sch-hero { padding: 92px 16px 48px; }
        #mws-scholarship .sch-hero h1 { font-size: 34px; }
        #mws-scholarship .sch-hero p { font-size: 16px; }
    }

    /* Main Content */
    #mws-scholarship .sch-main {
        max-width: 960px;
        margin: 0 auto;
        padding: 50px 20px 60px;
    }

    #mws-scholarship .sch-section {
        margin-bottom: 36px;
    }

    #mws-scholarship .sch-section h2 {
        font-size: 28px;
        font-weight: 700;
        color: var(--navy);
        margin-bottom: 16px;
        padding-bottom: 8px;
        border-bottom: 3px solid var(--gold);
        display: inline-block;
    }

    #mws-scholarship .sch-section p {
        font-size: 16px;
        color: var(--text);
        margin-bottom: 14px;
        line-height: 1.8;
    }

    /* Criteria Cards */
    #mws-scholarship .criteria-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
        margin-top: 16px;
    }

    @media (max-width: 600px) {
        #mws-scholarship .criteria-grid {
            grid-template-columns: 1fr;
        }
    }

    #mws-scholarship .criteria-card {
        background: var(--light-bg);
        border-radius: 10px;
        padding: 20px 22px;
        border-left: 4px solid var(--gold);
        transition: transform 0.15s, box-shadow 0.15s;
    }

    #mws-scholarship .criteria-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.12);
    }

    #mws-scholarship .criteria-card h3 {
        font-size: 20px;
        font-weight: 600;
        color: var(--navy);
        margin: 0 0 6px;
    }

    #mws-scholarship .criteria-card p {
        font-size: 16px;
        margin: 0;
        color: #666;
    }

    /* Past Winners Highlights */
    #mws-scholarship .winners-strip {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-top: 20px;
    }

    @media (max-width: 768px) {
        #mws-scholarship .winners-strip {
            grid-template-columns: 1fr;
            gap: 14px;
        }
        #mws-scholarship .winner-card img {
            width: 156px;
            height: 156px;
        }
    }

    #mws-scholarship .winner-card {
        text-align: center;
        background: var(--light-bg);
        border-radius: 10px;
        padding: 24px 16px;
        transition: transform 0.15s, box-shadow 0.15s;
        cursor: pointer;
    }

    #mws-scholarship .winner-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.12);
    }

    #mws-scholarship .winner-card img {
        width: 190px;
        height: 190px;
        border-radius: 50%;
        object-fit: cover;
        object-position: center 20%;
        margin-bottom: 16px;
        border: 3px solid var(--gold);
    }

    #mws-scholarship .winner-card h4 {
        font-size: 16px;
        font-weight: 600;
        color: var(--navy);
        margin: 0 0 4px;
    }

    #mws-scholarship .winner-card .winner-year {
        font-size: 14px;
        color: var(--gold-text);
        font-weight: 600;
        margin-bottom: 6px;
    }

    #mws-scholarship .winner-card p {
        font-size: 14px;
        color: #666;
        margin: 0;
        line-height: 1.5;
    }

    /* Impact Stats */
    #mws-scholarship .impact-row {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-top: 20px;
    }

    @media (max-width: 600px) {
        #mws-scholarship .impact-row {
            grid-template-columns: 1fr;
            gap: 12px;
        }
    }

    #mws-scholarship .impact-stat {
        text-align: center;
        background: var(--navy);
        color: var(--white);
        border-radius: 10px;
        padding: 24px 16px;
    }

    #mws-scholarship .impact-stat .stat-number {
        font-size: 32px;
        font-weight: 700;
        color: var(--gold);
        display: block;
    }

    #mws-scholarship .impact-stat .stat-label {
        font-size: 14px;
        opacity: 0.85;
        margin-top: 4px;
        display: block;
    }

    /* CTA */
    #mws-scholarship .sch-cta {
        text-align: center;
        background: var(--light-bg);
        border-radius: 12px;
        padding: 36px 20px;
        margin-top: 36px;
    }

    #mws-scholarship .sch-cta h2 {
        border: none;
        display: block;
        margin-bottom: 12px;
    }

    #mws-scholarship .sch-cta p {
        max-width: 550px;
        margin: 0 auto 24px;
    }

    #mws-scholarship .btn-donate {
        display: inline-block;
        background: var(--gold);
        color: var(--white);
        padding: 14px 36px;
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
        font-weight: 600;
        text-decoration: none;
        transition: background 0.15s;
    }

    #mws-scholarship .btn-donate:hover {
        background: #b8930e;
        color: var(--white);
    }

    #mws-scholarship .sch-newsletter {
        margin: 22px auto 0;
        max-width: 760px;
    }

</style>

<div id="mws-scholarship">

    <div class="sch-hero">
        <h1>The Michael Williams Memorial Scholarship</h1>
        <p>Honoring Mikey&rsquo;s legacy by supporting the next generation of leaders from Rumson-Fair Haven Regional High School.</p>
        <div class="sch-amount">$5,000 Annual Scholarship</div>
    </div>

    <div class="sch-main">

        <div class="sch-section">
            <h2>About the Scholarship</h2>
            <p>Each year, the Michael Williams Memorial Scholarship awards <strong>$5,000</strong> to a graduating senior at Rumson-Fair Haven Regional High School who embodies the spirit that Michael carried throughout his life — a passion for music, art, academics, and community.</p>
            <p>The scholarship is awarded through RFH's guidance department. Recipients are selected based on how well they represent the values Michael held dear: creativity, kindness, academic curiosity, and a genuine commitment to making their community better.</p>
        </div>

        <div class="sch-section">
            <h2>What We Look For</h2>
            <div class="criteria-grid">
                <div class="criteria-card">
                    <h3>Music &amp; Arts</h3>
                    <p>A passion for creative expression — whether through music, visual art, theater, or other artistic pursuits.</p>
                </div>
                <div class="criteria-card">
                    <h3>Academic Excellence</h3>
                    <p>Strong academic performance that reflects intellectual curiosity and dedication to learning.</p>
                </div>
                <div class="criteria-card">
                    <h3>Community Service</h3>
                    <p>Active involvement in the community through volunteering, mentoring, or leadership.</p>
                </div>
                <div class="criteria-card">
                    <h3>Character &amp; Spirit</h3>
                    <p>The kind of person who lifts others up — embodying the warmth, humor, and generosity that defined Michael.</p>
                </div>
            </div>
        </div>

        <div class="sch-section">
            <h2>Our Impact</h2>
            <div class="impact-row">
                <div class="impact-stat">
                    <span class="stat-number">$30,000+</span>
                    <span class="stat-label">Awarded Since 2020</span>
                </div>
                <div class="impact-stat">
                    <span class="stat-number">6</span>
                    <span class="stat-label">Scholarships Given</span>
                </div>
                <div class="impact-stat">
                    <span class="stat-number">100%</span>
                    <span class="stat-label">Goes to Students</span>
                </div>
            </div>
        </div>

        <div class="sch-section">
            <h2>Past Recipients</h2>
            <div class="winners-strip">
                <div class="winner-card">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2025/06/4.jpeg" alt="Evan McCormick, 2025 scholarship winner">
                    <h4>Evan McCormick</h4>
                    <div class="winner-year">2025 Recipient</div>
                    <p>Georgetown University — Finance</p>
                </div>
                <div class="winner-card">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2024/10/IMG_3041.jpg" alt="Melanie Marucci, 2024 scholarship winner">
                    <h4>Melanie Marucci</h4>
                    <div class="winner-year">2024 Recipient</div>
                    <p>University of Richmond — Business</p>
                </div>
                <div class="winner-card">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2023/06/68cf1109-5c8e-4f82-8408-6fd3f62c8f0a-modified.jpg" alt="Ethan Smith, 2023 scholarship winner">
                    <h4>Ethan Smith</h4>
                    <div class="winner-year">2023 Recipient</div>
                    <p>Indiana University — Business</p>
                </div>
            </div>
            <p style="text-align: center; margin-top: 20px;">
                <a href="<?php echo home_url('/past-winners/'); ?>" style="color: var(--gold-text); font-weight: 600; text-decoration: none;">View all past recipients &rarr;</a>
            </p>
        </div>

        <div class="sch-cta">
            <h2>Support the Next Scholarship</h2>
            <p>Your donation directly funds the next $5,000 scholarship for an RFH senior. Every dollar makes a difference.</p>
            <a href="<?php echo home_url('/donate/'); ?>" class="btn-donate">Donate Now</a>
        </div>

        <div class="sch-newsletter">
            <?php
            if (function_exists('mws_render_newsletter_signup')) {
                echo mws_render_newsletter_signup(array(
                    'title' => 'Stay in the Loop',
                    'description' => 'Get scholarship milestones, event announcements, and impact updates.',
                    'button_text' => 'Join Newsletter',
                    'source' => 'scholarship',
                ));
            }
            ?>
        </div>

    </div>
</div>
