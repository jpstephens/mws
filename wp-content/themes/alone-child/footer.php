<?php
/**
 * Custom Footer - alone-child theme
 *
 * Overrides the parent "alone" theme footer with a branded
 * three-column layout on navy background.
 */
?>

</div><!-- #page -->

<style>
/* ============================
   MWS CUSTOM FOOTER
   ============================ */
.mws-footer {
    background: #232842;
    color: #fff;
    font-family: 'Poppins', sans-serif;
    padding: 0;
    margin: 0;
    line-height: 1.6;
}

.mws-footer * {
    box-sizing: border-box;
}

/* ---------- Three-column grid ---------- */
.mws-footer-inner {
    max-width: 1120px;
    margin: 0 auto;
    padding: 56px 24px 40px;
    display: grid;
    grid-template-columns: 1.2fr 0.8fr 1fr;
    gap: 48px;
}

/* Column headings */
.mws-footer-col h3 {
    font-family: 'Poppins', sans-serif;
    font-size: 15px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.2px;
    color: #cda33b;
    margin: 0 0 18px;
}

/* ---------- Column 1 — Organization ---------- */
.mws-footer-brand-name {
    font-family: 'Poppins', sans-serif;
    font-size: 18px;
    font-weight: 700;
    color: #ffffff;
    margin: 0 0 12px;
    line-height: 1.35;
}

.mws-footer-mission {
    font-size: 14px;
    color: rgba(255, 255, 255, 0.72);
    margin: 0 0 18px;
    line-height: 1.65;
}

.mws-footer-email a {
    font-size: 14px;
    color: rgba(255, 255, 255, 0.72);
    text-decoration: none;
    transition: color 0.15s;
}

.mws-footer-email a:hover {
    color: #cda33b;
}

/* ---------- Column 2 — Quick Links ---------- */
.mws-footer-links {
    list-style: none;
    margin: 0;
    padding: 0;
}

.mws-footer-links li {
    margin: 0 0 10px;
}

.mws-footer-links a {
    font-size: 14px;
    color: rgba(255, 255, 255, 0.82);
    text-decoration: none;
    transition: color 0.15s;
}

.mws-footer-links a:hover {
    color: #cda33b;
}

/* ---------- Column 3 — Connect ---------- */
.mws-footer-connect-email {
    font-size: 14px;
    margin: 0 0 18px;
}

.mws-footer-connect-email a {
    color: rgba(255, 255, 255, 0.82);
    text-decoration: none;
    transition: color 0.15s;
}

.mws-footer-connect-email a:hover {
    color: #cda33b;
}

.mws-footer-follow-text {
    font-size: 13px;
    color: rgba(255, 255, 255, 0.55);
    margin: 0 0 12px;
}

.mws-footer-social {
    display: flex;
    align-items: center;
    gap: 10px;
}

.mws-footer-social a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 38px;
    height: 38px;
    background: rgba(255, 255, 255, 0.08);
    border-radius: 50%;
    color: #fff;
    text-decoration: none;
    transition: background 0.15s, color 0.15s;
}

.mws-footer-social a:hover {
    background: #cda33b;
    color: #fff;
}

.mws-footer-social a svg {
    fill: currentColor;
    width: 18px;
    height: 18px;
}

/* ---------- Divider ---------- */
.mws-footer-divider {
    max-width: 1120px;
    margin: 0 auto;
    padding: 0 24px;
}

.mws-footer-divider hr {
    border: none;
    border-top: 1px solid rgba(205, 163, 59, 0.5);
    margin: 0;
}

/* ---------- Bottom bar ---------- */
.mws-footer-bottom {
    max-width: 1120px;
    margin: 0 auto;
    padding: 20px 24px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 8px;
}

.mws-footer-copy,
.mws-footer-nonprofit {
    font-size: 13px;
    color: rgba(255, 255, 255, 0.48);
    margin: 0;
}

/* ---------- Responsive: stack on mobile ---------- */
@media (max-width: 768px) {
    .mws-footer-inner {
        grid-template-columns: 1fr;
        gap: 36px;
        padding: 40px 20px 32px;
    }

    .mws-footer-bottom {
        flex-direction: column;
        text-align: center;
        padding: 16px 20px 24px;
    }
}
</style>

<footer class="mws-footer" role="contentinfo">
    <div class="mws-footer-inner">

        <!-- Column 1 — Organization -->
        <div class="mws-footer-col">
            <p class="mws-footer-brand-name">Michael Williams<br>Memorial Scholarship</p>
            <p class="mws-footer-mission">Honoring Mikey&rsquo;s legacy by supporting the next generation of RFH seniors through annual scholarships.</p>
            <p class="mws-footer-email"><a href="mailto:info@michaelwilliamsscholarship.com">info@michaelwilliamsscholarship.com</a></p>
        </div>

        <!-- Column 2 — Quick Links -->
        <div class="mws-footer-col">
            <h3>Quick Links</h3>
            <ul class="mws-footer-links">
                <li><a href="<?php echo home_url('/donate/'); ?>">Donate</a></li>
                <li><a href="<?php echo home_url('/about-us/'); ?>">About Mikey</a></li>
                <li><a href="<?php echo home_url('/scholarship/'); ?>">Scholarship</a></li>
                <li><a href="<?php echo home_url('/qu-hockey-2026/'); ?>">Events</a></li>
                <li><a href="<?php echo home_url('/our-team/'); ?>">Our Team</a></li>
                <li><a href="<?php echo home_url('/past-winners/'); ?>">Past Winners</a></li>
            </ul>
        </div>

        <!-- Column 3 — Connect -->
        <div class="mws-footer-col">
            <h3>Connect</h3>
            <p class="mws-footer-connect-email"><a href="mailto:info@michaelwilliamsscholarship.com">info@michaelwilliamsscholarship.com</a></p>
            <p class="mws-footer-follow-text">Follow us on social media</p>
            <div class="mws-footer-social">
                <a href="https://www.linkedin.com/company/the-michael-williams-memorial-scholarship" target="_blank" rel="noopener" aria-label="Follow us on LinkedIn">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                </a>
            </div>
        </div>

    </div>

    <!-- Gold divider -->
    <div class="mws-footer-divider"><hr></div>

    <!-- Bottom bar -->
    <div class="mws-footer-bottom">
        <p class="mws-footer-copy">&copy; <?php echo date('Y'); ?> The Michael Williams Memorial Scholarship. All rights reserved.</p>
        <p class="mws-footer-nonprofit">501(c)(3) Tax-Exempt Nonprofit</p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
