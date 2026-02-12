<?php
/**
 * Past Scholarship Recipients Page - WordPress Shortcode Template
 * Rendered via [mws_past_winners] shortcode in alone-child theme
 */
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    .page-titlebar { display: none !important; }

    #mws-winners {
        font-family: 'Poppins', sans-serif;
        line-height: 1.7;
        color: #444;
        -webkit-font-smoothing: antialiased;
    }

    #mws-winners *,
    #mws-winners *::before,
    #mws-winners *::after {
        box-sizing: border-box;
    }

    #mws-winners {
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
       A — HERO BANNER
       ========================================== */
    #mws-winners .pw-hero {
        background: linear-gradient(135deg, #1a1f34, #232842 50%, #2a3052);
        padding: 110px 20px 56px;
        color: var(--white);
        position: relative;
        overflow: hidden;
    }

    #mws-winners .pw-hero::before {
        content: '';
        position: absolute;
        top: -80px;
        right: -120px;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(205,163,59,0.12), transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }

    #mws-winners .pw-hero::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--gold), var(--gold-hover), var(--gold));
    }

    #mws-winners .pw-hero-inner {
        max-width: 1120px;
        margin: 0 auto;
        text-align: center;
    }

    #mws-winners .pw-hero h1 {
        font-size: 48px;
        font-weight: 700;
        margin: 0 auto 14px;
        color: var(--white);
        line-height: 1.15;
        max-width: 16ch;
    }

    #mws-winners .pw-hero .pw-intro {
        font-size: 17px;
        opacity: 0.9;
        margin: 0 auto;
        max-width: 62ch;
    }

    @media (max-width: 768px) {
        #mws-winners .pw-hero { padding: 90px 16px 48px; }
        #mws-winners .pw-hero h1 { font-size: 30px; }
        #mws-winners .pw-hero .pw-intro { font-size: 15px; }
    }

    /* ==========================================
       B — YEAR DIVIDERS
       ========================================== */
    #mws-winners .pw-year-marker {
        text-align: center;
        padding: 32px 20px 0;
    }

    #mws-winners .pw-year-marker span {
        display: inline-block;
        background: var(--gold);
        color: var(--white);
        font-size: 20px;
        font-weight: 700;
        padding: 8px 32px;
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
        letter-spacing: 0.5px;
    }

    /* ==========================================
       C — WINNER PROFILES — Alternating Rows
       ========================================== */
    #mws-winners .pw-row {
        padding: 44px 20px;
    }

    #mws-winners .pw-row-inner {
        max-width: 1120px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 48px;
        align-items: center;
    }

    /* Photo */
    #mws-winners .pw-photo img {
        width: 100%;
        height: 420px;
        object-fit: cover;
        object-position: center 20%;
        border-radius: var(--radius);
        display: block;
    }

    #mws-winners .pw-photo img:hover {
        transform: scale(1.02);
        transition: transform 0.15s;
    }

    /* Text */
    #mws-winners .pw-text h3 {
        font-size: 28px;
        font-weight: 700;
        color: var(--navy);
        margin: 0 0 4px;
    }

    #mws-winners .pw-text .pw-details {
        font-size: 15px;
        font-weight: 600;
        color: var(--gold-text);
        margin: 0 0 16px;
    }

    #mws-winners .pw-text p {
        font-size: 15px;
        color: var(--text);
        line-height: 1.8;
        margin: 0 0 14px;
    }

    #mws-winners .pw-text p:last-child {
        margin-bottom: 0;
    }

    /* Alternating backgrounds */
    #mws-winners .pw-row:nth-child(odd) {
        background: var(--white);
    }

    #mws-winners .pw-row:nth-child(even) {
        background: var(--light-bg);
    }

    /* Even rows: flip photo to right */
    #mws-winners .pw-row-reverse .pw-photo {
        order: 2;
    }

    #mws-winners .pw-row-reverse .pw-text {
        order: 1;
    }

    @media (max-width: 1024px) {
        #mws-winners .pw-row-inner { gap: 32px; }
        #mws-winners .pw-photo img { height: 360px; }
        #mws-winners .pw-text h3 { font-size: 24px; }
    }

    @media (max-width: 768px) {
        #mws-winners .pw-row { padding: 32px 16px; }
        #mws-winners .pw-row-inner {
            grid-template-columns: 1fr;
            gap: 24px;
        }
        #mws-winners .pw-row-reverse .pw-photo { order: 0; }
        #mws-winners .pw-row-reverse .pw-text { order: 0; }
        #mws-winners .pw-photo img { height: 340px; }
        #mws-winners .pw-text h3 { font-size: 24px; }
        #mws-winners .pw-year-marker { padding: 24px 16px 0; }
        #mws-winners .pw-year-marker span { font-size: 18px; padding: 6px 24px; }
    }

    /* ==========================================
       D — CTA
       ========================================== */
    #mws-winners .pw-cta-section {
        padding: 44px 20px 64px;
    }

    #mws-winners .pw-cta {
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
        border-radius: var(--radius);
        border: 1px solid rgba(205,163,59,0.25);
        background: rgba(205,163,59,0.08);
        padding: 44px 28px;
    }

    #mws-winners .pw-cta h2 {
        font-size: 26px;
        font-weight: 700;
        color: var(--navy);
        margin: 0 0 10px;
    }

    #mws-winners .pw-cta p {
        font-size: 15px;
        color: var(--text);
        margin: 0 0 28px;
        line-height: 1.7;
    }

    #mws-winners .pw-cta-btns {
        display: flex;
        justify-content: center;
        gap: 14px;
        flex-wrap: wrap;
    }

    #mws-winners .pw-btn-primary {
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

    #mws-winners .pw-btn-primary:hover {
        background: var(--gold-hover);
        color: var(--white);
    }

    #mws-winners .pw-btn-outline {
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

    #mws-winners .pw-btn-outline:hover {
        background: var(--navy);
        color: var(--white);
    }

    /* ==========================================
       UTILITIES
       ========================================== */
    #mws-winners a:focus-visible {
        outline: 3px solid var(--gold);
        outline-offset: 3px;
        border-radius: 8px;
    }
</style>

<div id="mws-winners">

    <!-- ===== A — HERO BANNER ===== -->
    <div class="pw-hero">
        <div class="pw-hero-inner">
            <h1>Past Scholarship Recipients</h1>
            <p class="pw-intro">Celebrating students who carry Michael&rsquo;s spirit forward through creativity, character, and service at Rumson-Fair Haven and beyond.</p>
        </div>
    </div>

    <!-- ===== 2025 — Evan McCormick — photo left ===== -->
    <div class="pw-year-marker"><span>2025</span></div>
    <div class="pw-row">
        <div class="pw-row-inner">
            <div class="pw-photo">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2025/06/4.jpeg" alt="Evan McCormick, 2025 scholarship recipient">
            </div>
            <div class="pw-text">
                <h3>Evan McCormick</h3>
                <p class="pw-details">2025 Recipient &middot; Georgetown University &middot; Finance</p>
                <p>Evan McCormick exemplifies the qualities the Michael Williams Memorial Scholarship was created to honor. A standout member of the Rumson-Fair Haven community, Evan distinguished himself through his academic dedication and commitment to those around him.</p>
                <p>Evan is pursuing a degree in Finance at Georgetown University, where he continues to demonstrate the drive and character that made him the ideal recipient of this award. His passion for learning and his genuine care for others reflect the very spirit Michael carried throughout his life.</p>
            </div>
        </div>
    </div>

    <!-- ===== 2024 — Melanie Marucci — photo right ===== -->
    <div class="pw-year-marker"><span>2024</span></div>
    <div class="pw-row pw-row-reverse">
        <div class="pw-row-inner">
            <div class="pw-photo">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2024/10/IMG_3041.jpg" alt="Melanie Marucci, 2024 scholarship recipient">
            </div>
            <div class="pw-text">
                <h3>Melanie Marucci</h3>
                <p class="pw-details">2024 Recipient &middot; University of Richmond &middot; Business</p>
                <p>Melanie Marucci stood out as someone who truly embodies the heart of this scholarship &mdash; a deep involvement in her community paired with strong academic performance. Her teachers and peers recognized her as someone who consistently lifted others up.</p>
                <p>Now studying Business at the University of Richmond, Melanie continues to build on the foundation of creativity, leadership, and service that defined her time at RFH. She represents everything Michael valued in the people around him.</p>
            </div>
        </div>
    </div>

    <!-- ===== 2023 — Ethan Smith — photo left ===== -->
    <div class="pw-year-marker"><span>2023</span></div>
    <div class="pw-row">
        <div class="pw-row-inner">
            <div class="pw-photo">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2023/06/68cf1109-5c8e-4f82-8408-6fd3f62c8f0a-modified.jpg" alt="Ethan Smith, 2023 scholarship recipient">
            </div>
            <div class="pw-text">
                <h3>Ethan Smith</h3>
                <p class="pw-details">2023 Recipient &middot; Indiana University &middot; Business</p>
                <p>Ethan Smith was selected as the 2023 recipient for his well-rounded character and his commitment to making a positive impact in the RFH community. Known for his creativity and genuine kindness, Ethan reflected the values at the core of Michael&rsquo;s legacy.</p>
                <p>Ethan went on to study Business at Indiana University, carrying with him the same spirit of curiosity and generosity that earned him this scholarship. His enthusiasm for connecting with others mirrors the gift Michael had for making everyone feel like a friend.</p>
            </div>
        </div>
    </div>

    <!-- ===== 2022 — Tommy French — photo right ===== -->
    <div class="pw-year-marker"><span>2022</span></div>
    <div class="pw-row pw-row-reverse">
        <div class="pw-row-inner">
            <div class="pw-photo">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2021/05/image-e1659646573521.jpg" alt="Tommy French, 2022 scholarship recipient">
            </div>
            <div class="pw-text">
                <h3>Tommy French</h3>
                <p class="pw-details">2022 Recipient &middot; Babson College &middot; Business</p>
                <p>Tommy French was selected as the 2022 Michael Williams Memorial Scholarship recipient for his dedication as both a student and athlete at Rumson-Fair Haven. A member of the lacrosse team, Tommy embodied the competitive spirit and camaraderie that Michael valued so deeply.</p>
                <p>Tommy went on to attend Babson College, where he set his sights on graduating with a 3.8+ GPA while continuing to develop as a student-athlete. His drive and determination reflect the same qualities that made Michael such a beloved member of his community.</p>
            </div>
        </div>
    </div>

    <!-- ===== 2021 — Charlie Eckstein — photo left ===== -->
    <div class="pw-year-marker"><span>2021</span></div>
    <div class="pw-row">
        <div class="pw-row-inner">
            <div class="pw-photo">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2023/02/Recruitment-pic-.jpg" alt="Charlie Eckstein, 2021 scholarship recipient">
            </div>
            <div class="pw-text">
                <h3>Charlie Eckstein</h3>
                <p class="pw-details">2021 Recipient &middot; Tulane University &middot; Management, A.B. Freeman School of Business Honors</p>
                <p>Charlie Eckstein earned the 2021 Michael Williams Memorial Scholarship through his exceptional leadership and commitment to community. At RFH, Charlie distinguished himself as someone who brought people together &mdash; a quality that resonated deeply with Michael&rsquo;s own spirit.</p>
                <p>At Tulane University, Charlie pursued Management with a concentration in Finance and Accounting at the A.B. Freeman School of Business Honors program. He served as President of the Toastmasters chapter and Treasurer of his fraternity, channeling his passion for leadership and aspiring to a career in wealth management.</p>
            </div>
        </div>
    </div>

    <!-- ===== 2020 — Emily Grossarth — photo right ===== -->
    <div class="pw-year-marker"><span>2020</span></div>
    <div class="pw-row pw-row-reverse">
        <div class="pw-row-inner">
            <div class="pw-photo">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2023/02/img_0041-300x300-1-1.png" alt="Emily Grossarth, 2020 scholarship recipient">
            </div>
            <div class="pw-text">
                <h3>Emily Grossarth</h3>
                <p class="pw-details">2020 Recipient &middot; University of Pennsylvania &middot; Huntsman Dual-Degree Program, Wharton School</p>
                <p>Emily Grossarth was the inaugural recipient of the Michael Williams Memorial Scholarship in 2020, setting the standard for the remarkable young people who would follow. Her combination of academic excellence, creativity, and genuine care for others made her the perfect choice to carry Michael&rsquo;s legacy forward.</p>
                <p>Emily attended the University of Pennsylvania, where she pursued the prestigious Huntsman Dual-Degree Program in International Studies and Business at the Wharton School, with a Finance concentration and Hispanic Studies minor. Her ambition and intellect embody the limitless potential Michael saw in the people around him.</p>
            </div>
        </div>
    </div>

    <!-- ===== D — DONATE CTA ===== -->
    <div class="pw-cta-section">
        <div class="pw-cta">
            <h2>Help Fund the Next Scholarship</h2>
            <p>Every dollar you contribute goes directly toward awarding $5,000 to the next deserving RFH senior. Support Michael&rsquo;s legacy today.</p>
            <div class="pw-cta-btns">
                <a href="<?php echo home_url('/donate/'); ?>" class="pw-btn-primary">Donate Now</a>
                <a href="<?php echo home_url('/scholarship/'); ?>" class="pw-btn-outline">Learn About the Scholarship</a>
            </div>
        </div>
    </div>

</div>
