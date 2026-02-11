<?php
/**
 * Custom Footer - alone-child theme
 *
 * High-intent, action-oriented footer aligned to MWS brand.
 */
?>

</div><!-- #page -->

<style>
/* ============================
   MWS FOOTER
   ============================ */
.mws-footer {
    --mws-navy: #232842;
    --mws-navy-2: #1b2036;
    --mws-gold: #cda33b;
    --mws-gold-hover: #b8930e;
    --mws-text: rgba(255, 255, 255, 0.82);
    --mws-muted: rgba(255, 255, 255, 0.58);

    background: linear-gradient(180deg, var(--mws-navy) 0%, var(--mws-navy-2) 100%);
    color: #fff;
    font-family: 'Poppins', sans-serif;
    margin: 0;
    line-height: 1.6;
}

.mws-footer * {
    box-sizing: border-box;
}

.mws-footer-shell {
    max-width: 1160px;
    margin: 0 auto;
    padding: 0 24px;
}

/* Top CTA band */
.mws-footer-cta {
    border-bottom: 1px solid rgba(205, 163, 59, 0.28);
}

.mws-footer-cta-inner {
    display: grid;
    grid-template-columns: 1.3fr auto;
    gap: 20px;
    align-items: center;
    padding: 34px 0 28px;
}

.mws-footer-cta h2 {
    margin: 0 0 6px;
    font-size: 28px;
    font-weight: 700;
    line-height: 1.2;
    color: #fff;
}

.mws-footer-cta p {
    margin: 0;
    color: var(--mws-text);
    font-size: 15px;
}

.mws-footer-cta-actions {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    justify-content: flex-end;
}

.mws-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 44px;
    padding: 10px 20px;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 700;
    text-decoration: none;
    transition: background-color 0.15s ease, color 0.15s ease, border-color 0.15s ease;
    white-space: nowrap;
}

.mws-btn-primary {
    background: var(--mws-gold);
    color: #fff;
}

.mws-btn-primary:hover {
    background: var(--mws-gold-hover);
    color: #fff;
}

.mws-btn-outline {
    border: 1px solid rgba(255, 255, 255, 0.45);
    color: #fff;
    background: transparent;
}

.mws-btn-outline:hover {
    border-color: var(--mws-gold);
    color: var(--mws-gold);
}

/* Main columns */
.mws-footer-main {
    display: grid;
    grid-template-columns: 1.2fr 1fr 1fr 1fr;
    gap: 34px;
    padding: 34px 0 30px;
}

.mws-footer-title {
    margin: 0 0 12px;
    font-size: 15px;
    font-weight: 700;
    letter-spacing: 0.6px;
    text-transform: uppercase;
    color: var(--mws-gold);
}

.mws-footer-brand {
    margin: 0 0 10px;
    font-size: 20px;
    font-weight: 700;
    line-height: 1.3;
    color: #fff;
}

.mws-footer-copy {
    margin: 0 0 14px;
    color: var(--mws-text);
    font-size: 14px;
}

.mws-footer-meta {
    margin: 0;
    color: var(--mws-muted);
    font-size: 13px;
}

.mws-list {
    list-style: none;
    margin: 0;
    padding: 0;
}

.mws-list li {
    margin: 0 0 10px;
}

.mws-list a {
    color: var(--mws-text);
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    transition: color 0.15s ease;
}

.mws-list a:hover {
    color: var(--mws-gold);
}

.mws-footer-contact a {
    color: #fff;
    text-decoration: none;
    font-weight: 600;
}

.mws-footer-contact a:hover {
    color: var(--mws-gold);
}

.mws-footer-social {
    display: flex;
    gap: 10px;
    margin-top: 12px;
}

.mws-footer-social a {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: rgba(255, 255, 255, 0.1);
    color: #fff;
    transition: background-color 0.15s ease;
}

.mws-footer-social a:hover {
    background: var(--mws-gold);
}

.mws-footer-social svg {
    width: 18px;
    height: 18px;
    fill: currentColor;
}

/* Newsletter block in dark footer context */
.mws-footer .mws-newsletter {
    margin-top: 12px;
    background: rgba(255, 255, 255, 0.06);
    border: 1px solid rgba(205, 163, 59, 0.42);
}

.mws-footer .mws-newsletter-title {
    color: #fff;
    font-size: 18px;
}

.mws-footer .mws-newsletter-copy {
    color: rgba(255, 255, 255, 0.78);
    font-size: 13px;
}

.mws-footer .mws-newsletter-input {
    background: rgba(255, 255, 255, 0.96);
}

.mws-footer .mws-newsletter-note {
    color: rgba(255, 255, 255, 0.62);
}

/* Bottom bar */
.mws-footer-bottom {
    border-top: 1px solid rgba(255, 255, 255, 0.12);
}

.mws-footer-bottom-inner {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 10px;
    padding: 14px 0 22px;
}

.mws-footer-bottom p {
    margin: 0;
    color: var(--mws-muted);
    font-size: 12px;
}

@media (max-width: 1024px) {
    .mws-footer-cta-inner {
        grid-template-columns: 1fr;
        padding: 28px 0 24px;
    }

    .mws-footer-cta-actions {
        justify-content: flex-start;
    }

    .mws-footer-main {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 680px) {
    .mws-footer-shell {
        padding: 0 18px;
    }

    .mws-footer-cta h2 {
        font-size: 24px;
    }

    .mws-footer-main {
        grid-template-columns: 1fr;
        gap: 26px;
        padding: 28px 0 24px;
    }

    .mws-footer-bottom-inner {
        flex-direction: column;
        align-items: flex-start;
        padding: 12px 0 20px;
    }
}
</style>

<footer class="mws-footer" role="contentinfo">
    <div class="mws-footer-cta">
        <div class="mws-footer-shell mws-footer-cta-inner">
            <div>
                <h2>Help Fund the Next Scholarship</h2>
                <p>Every donation and event registration directly supports RFH seniors who embody creativity, character, and community.</p>
            </div>
            <div class="mws-footer-cta-actions">
                <a class="mws-btn mws-btn-primary" href="<?php echo home_url('/donate/'); ?>">Donate Now</a>
                <a class="mws-btn mws-btn-outline" href="<?php echo home_url('/qu-hockey-2026/'); ?>">See Events</a>
            </div>
        </div>
    </div>

    <div class="mws-footer-shell mws-footer-main">
        <div>
            <p class="mws-footer-brand">The Michael Williams Memorial Scholarship</p>
            <p class="mws-footer-copy">Honoring Mikey&rsquo;s legacy by supporting the next generation of students through annual scholarship awards.</p>
            <p class="mws-footer-meta">501(c)(3) Tax-Exempt Nonprofit</p>
        </div>

        <div>
            <p class="mws-footer-title">Quick Actions</p>
            <ul class="mws-list">
                <li><a href="<?php echo home_url('/donate/'); ?>">Donate</a></li>
                <li><a href="<?php echo home_url('/volleyball/'); ?>">Register for Volleyball</a></li>
                <li><a href="<?php echo home_url('/qu-hockey-2026/'); ?>">Get Hockey Tickets</a></li>
                <li><a href="<?php echo home_url('/gallery/'); ?>">View Gallery</a></li>
            </ul>
        </div>

        <div>
            <p class="mws-footer-title">Learn More</p>
            <ul class="mws-list">
                <li><a href="<?php echo home_url('/about-us/'); ?>">About Mikey</a></li>
                <li><a href="<?php echo home_url('/scholarship/'); ?>">Scholarship Details</a></li>
                <li><a href="<?php echo home_url('/past-winners/'); ?>">Past Recipients</a></li>
                <li><a href="<?php echo home_url('/our-team/'); ?>">Meet the Team</a></li>
            </ul>
        </div>

        <div class="mws-footer-contact">
            <p class="mws-footer-title">Connect</p>
            <p class="mws-footer-copy">Questions, sponsorship opportunities, or ways to help:</p>
            <p class="mws-footer-copy"><a href="mailto:info@michaelwilliamsscholarship.com">info@michaelwilliamsscholarship.com</a></p>
            <?php
            if (function_exists('mws_render_newsletter_signup')) {
                echo mws_render_newsletter_signup(array(
                    'title' => 'Newsletter',
                    'description' => 'Monthly updates, events, and impact stories.',
                    'button_text' => 'Join',
                    'source' => 'footer',
                    'compact' => true,
                ));
            }
            ?>
            <div class="mws-footer-social">
                <a href="https://www.linkedin.com/company/the-michael-williams-memorial-scholarship" target="_blank" rel="noopener" aria-label="Follow us on LinkedIn">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                </a>
            </div>
        </div>
    </div>

    <div class="mws-footer-bottom">
        <div class="mws-footer-shell mws-footer-bottom-inner">
            <p>&copy; <?php echo date('Y'); ?> The Michael Williams Memorial Scholarship. All rights reserved.</p>
            <p>100% of net proceeds support scholarship funding.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
