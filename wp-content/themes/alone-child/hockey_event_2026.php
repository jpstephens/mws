<?php
/**
 * Hockey Fundraiser 2026 - WordPress Shortcode Template
 * Rendered via [mws_hockey_2026] shortcode in alone-child theme
 */
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    /* Hide WordPress page title bar */
    .page-titlebar { display: none !important; }

    /* Scoped styles for hockey fundraiser */
    #mws-hockey {
        font-family: 'Poppins', sans-serif;
        line-height: 1.6;
        color: #333;
        -webkit-font-smoothing: antialiased;
    }

    #mws-hockey *,
    #mws-hockey *::before,
    #mws-hockey *::after {
        box-sizing: border-box;
    }

    #mws-hockey {
        --gold: #cda33b;
        --gold-hover: #b8930e;
        --gold-text: #8a6d1b;
        --navy: #232842;
        --accent-blue: #002866;
        --text: #333;
        --heading: #111;
        --white: #ffffff;
        --light-bg: #f7f7f7;
        --border: #e0e0e0;
    }

    /* ==========================================
       HERO BANNER
       ========================================== */
    #mws-hockey .hk-hero {
        background: linear-gradient(135deg, #1a1f34, #232842 50%, #2a3052);
        padding: 112px 20px 58px;
        text-align: center;
        color: var(--white);
        position: relative;
        overflow: hidden;
    }

    #mws-hockey .hk-hero::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--gold), var(--gold-hover), var(--gold));
    }

    #mws-hockey .hk-hero h1 {
        font-size: 46px;
        font-weight: 700;
        margin: 0 0 12px;
        color: var(--white);
        line-height: 1.15;
    }

    #mws-hockey .hk-hero .hk-hero-sub {
        font-size: 18px;
        max-width: 620px;
        margin: 0 auto;
        opacity: 0.85;
        line-height: 1.7;
    }

    @media (max-width: 768px) {
        #mws-hockey .hk-hero { padding: 92px 16px 50px; }
        #mws-hockey .hk-hero h1 { font-size: 32px; }
        #mws-hockey .hk-hero .hk-hero-sub { font-size: 16px; }
    }

    /* ==========================================
       TWO-COLUMN MAIN CONTENT
       ========================================== */
    #mws-hockey .hk-main {
        max-width: 1120px;
        margin: 0 auto;
        padding: 50px 20px 60px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 50px;
        align-items: start;
    }

    @media (max-width: 1024px) {
        #mws-hockey .hk-main {
            grid-template-columns: 1fr;
            gap: 30px;
            padding: 30px 20px 40px;
        }
    }

    /* ==========================================
       LEFT COLUMN — Image + Event Info
       ========================================== */
    #mws-hockey .hero-image {
        width: 100%;
        border-radius: 12px;
        overflow: hidden;
        margin-bottom: 30px;
    }

    #mws-hockey .hero-image img {
        width: 100%;
        height: 340px;
        object-fit: cover;
        object-position: center 30%;
        display: block;
    }

    @media (max-width: 768px) {
        #mws-hockey .hero-image img {
            height: 260px;
        }
    }

    #mws-hockey .event-info h2 {
        font-size: 34px;
        font-weight: 700;
        color: var(--accent-blue);
        margin-bottom: 16px;
        line-height: 1.25;
    }

    @media (max-width: 768px) {
        #mws-hockey .event-info h2 {
            font-size: 26px;
        }
    }

    #mws-hockey .event-info p {
        font-size: 16px;
        line-height: 1.8;
        color: var(--text);
        margin-bottom: 24px;
    }

    #mws-hockey .event-meta {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    @media (max-width: 768px) {
        #mws-hockey .event-meta {
            gap: 10px;
        }
    }

    #mws-hockey .meta-item {
        background: var(--light-bg);
        border-radius: 8px;
        padding: 14px 16px;
        text-align: center;
        transition: transform 0.15s, box-shadow 0.15s;
    }

    #mws-hockey .meta-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.12);
    }

    #mws-hockey .meta-label {
        display: block;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        color: var(--gold-text);
        margin-bottom: 4px;
    }

    #mws-hockey .meta-value {
        font-size: 15px;
        font-weight: 600;
        color: var(--navy);
    }

    /* ==========================================
       RIGHT COLUMN — Form
       ========================================== */
    #mws-hockey .form-card {
        background: var(--white);
        border-radius: 12px;
        padding: 36px;
        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.1);
        border: 1px solid #eee;
        position: sticky;
        top: 100px;
    }

    @media (max-width: 991px) {
        #mws-hockey .form-card {
            position: static;
        }
    }

    @media (max-width: 768px) {
        #mws-hockey .form-card {
            padding: 24px;
        }
    }

    #mws-hockey .form-card h2 {
        font-size: 24px;
        font-weight: 700;
        color: var(--navy);
        margin-bottom: 4px;
        text-align: center;
    }

    #mws-hockey .form-subtitle {
        text-align: center;
        color: #666;
        margin-bottom: 24px;
        font-size: 14px;
    }

    #mws-hockey .form-group {
        margin-bottom: 16px;
    }

    #mws-hockey .form-group label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: var(--navy);
        margin-bottom: 5px;
    }

    #mws-hockey .form-group input,
    #mws-hockey .form-group select {
        width: 100%;
        padding: 11px 14px;
        border: 1px solid var(--border);
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
        color: var(--text);
        transition: border-color 0.15s;
        box-sizing: border-box;
        background: var(--white);
    }

    #mws-hockey .form-group input:focus,
    #mws-hockey .form-group select:focus {
        outline: none;
        border-color: var(--gold);
        box-shadow: 0 0 0 3px rgba(205, 163, 59, 0.15);
    }

    #mws-hockey .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }

    @media (max-width: 768px) {
        #mws-hockey .form-row {
            grid-template-columns: 1fr;
            gap: 0;
        }
    }

    /* Form Error Banner */
    #mws-hockey .form-error {
        background: #fef2f2;
        color: #b91c1c;
        border: 1px solid #fecaca;
        border-radius: 8px;
        padding: 12px 16px;
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 16px;
    }

    /* Total Display */
    #mws-hockey .total-display {
        background: var(--navy);
        color: var(--white);
        border-radius: 8px;
        padding: 14px 18px;
        margin: 20px 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    #mws-hockey .total-label {
        font-size: 14px;
        font-weight: 500;
    }

    #mws-hockey .total-amount {
        font-size: 22px;
        font-weight: 700;
        color: var(--gold);
    }

    /* Submit Button */
    #mws-hockey .btn-purchase {
        width: 100%;
        padding: 14px;
        background-color: var(--gold);
        color: var(--white);
        border: none;
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.15s, transform 0.1s;
        letter-spacing: 0.5px;
    }

    #mws-hockey .btn-purchase:hover {
        background-color: var(--gold-hover);
    }

    #mws-hockey .btn-purchase:active {
        transform: scale(0.98);
    }

    #mws-hockey .btn-purchase:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }

    /* Policy / Trust Block */
    #mws-hockey .policy-block {
        margin-top: 20px;
        padding-top: 16px;
        border-top: 1px solid var(--border);
    }

    #mws-hockey .policy-block ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    #mws-hockey .policy-block li {
        display: flex;
        align-items: flex-start;
        gap: 8px;
        font-size: 13px;
        color: #666;
        line-height: 1.5;
        padding: 5px 0;
    }

    #mws-hockey .policy-block li .policy-icon {
        flex-shrink: 0;
        font-size: 14px;
        line-height: 1.5;
    }

    #mws-hockey .policy-block .refund-note {
        font-size: 12px;
        color: #999;
        margin-top: 10px;
        text-align: center;
    }
</style>

<div id="mws-hockey">
    <div class="hk-hero">
        <h1>MWS Hockey Fundraiser</h1>
        <p class="hk-hero-sub">Join us as Quinnipiac takes on Colgate in Men's Ice Hockey. All proceeds go to the Michael Williams Memorial Scholarship.</p>
    </div>
    <main class="hk-main">
        <div class="left-column">
            <div class="hero-image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/hockey-hero.jpeg" alt="Quinnipiac Hockey">
            </div>
            <div class="event-info">
                <h2>Event Details</h2>
                <p>
                    The Michael Williams Scholarship has teamed up with Quinnipiac University once again to support this great cause.
                    Join us on Saturday, February 21st as Quinnipiac takes on Colgate in Men's Ice Hockey.
                    All proceeds go to the Michael Williams Scholarship.
                </p>
                <div class="event-meta">
                    <div class="meta-item">
                        <span class="meta-label">Date</span>
                        <span class="meta-value">Saturday, Feb 21</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Matchup</span>
                        <span class="meta-value">QU vs Colgate</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Sport</span>
                        <span class="meta-value">Men's Ice Hockey</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Price</span>
                        <span class="meta-value">$50 / ticket</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-column">
            <div class="form-card">
                <h2>Purchase Tickets</h2>
                <p class="form-subtitle">Secure your spot at the game</p>
                <form action="https://quhockey.michaelwilliamsscholarship.com/create-checkout-session" method="POST" id="hockeyTicketForm">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="hk_first_name">First Name</label>
                            <input type="text" id="hk_first_name" name="first_name" required placeholder="First name" autocomplete="given-name" aria-required="true">
                        </div>
                        <div class="form-group">
                            <label for="hk_last_name">Last Name</label>
                            <input type="text" id="hk_last_name" name="last_name" required placeholder="Last name" autocomplete="family-name" aria-required="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hk_email">Email Address</label>
                        <input type="email" id="hk_email" name="email" required placeholder="you@example.com" autocomplete="email" aria-required="true">
                    </div>
                    <div class="form-group">
                        <label for="hk_phone">Phone Number</label>
                        <input type="tel" id="hk_phone" name="phone" required placeholder="(555) 123-4567" autocomplete="tel" aria-required="true">
                    </div>
                    <div class="form-group">
                        <label for="hk_num_tickets">Number of Tickets</label>
                        <select id="hk_num_tickets" name="num_tickets">
                            <option value="1">1 ticket</option>
                            <option value="2">2 tickets</option>
                            <option value="3">3 tickets</option>
                            <option value="4">4 tickets</option>
                            <option value="5">5 tickets</option>
                            <option value="6">6 tickets</option>
                            <option value="7">7 tickets</option>
                            <option value="8">8 tickets</option>
                            <option value="9">9 tickets</option>
                            <option value="10">10 tickets</option>
                        </select>
                    </div>
                    <div class="total-display">
                        <span class="total-label">Total</span>
                        <span class="total-amount" id="hkTotalAmount">$50.00</span>
                    </div>
                    <div id="hkFormError" class="form-error" role="alert" hidden></div>
                    <button type="submit" class="btn-purchase" id="hkPurchaseBtn">Purchase Tickets</button>
                </form>
                <div class="policy-block">
                    <ul>
                        <li><span class="policy-icon" aria-hidden="true">&#9993;</span> You'll receive a confirmation email with your ticket details</li>
                        <li><span class="policy-icon" aria-hidden="true">&#127891;</span> All proceeds benefit the Michael Williams Memorial Scholarship</li>
                        <li><span class="policy-icon" aria-hidden="true">&#128172;</span> Questions? Contact <a href="mailto:info@michaelwilliamsscholarship.com" style="color: var(--gold); text-decoration: none;">info@michaelwilliamsscholarship.com</a></li>
                    </ul>
                    <p class="refund-note">All ticket sales are final. Contact us if you have any issues.</p>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
(function() {
    const ticketSelect = document.getElementById('hk_num_tickets');
    const totalDisplay = document.getElementById('hkTotalAmount');
    const form = document.getElementById('hockeyTicketForm');
    const btn = document.getElementById('hkPurchaseBtn');

    ticketSelect.addEventListener('change', function() {
        const qty = parseInt(this.value);
        const total = qty * 50;
        totalDisplay.textContent = '$' + total.toFixed(2);
    });

    form.addEventListener('submit', function() {
        btn.disabled = true;
        btn.textContent = 'Processing...';
    });

    window.addEventListener('pageshow', function() {
        btn.disabled = false;
        btn.textContent = 'Purchase Tickets';
    });

    // Show server-side error if redirected back with ?error=
    const params = new URLSearchParams(window.location.search);
    const err = params.get('error');
    if (err) {
        const el = document.getElementById('hkFormError');
        const msgs = {
            fields: 'Please fill in all fields.',
            tickets: 'Please select between 1 and 10 tickets.',
            server: 'Something went wrong. Please try again.'
        };
        el.textContent = msgs[err] || msgs.server;
        el.hidden = false;
        history.replaceState(null, '', window.location.pathname);
    }
})();
</script>
