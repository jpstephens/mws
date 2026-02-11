# UX/UI & Usability Audit Report
## michaelwilliamsscholarship.com
**Audit Date:** February 10, 2026
**Auditor:** Claude Code (Opus 4.6)

---

## Table of Contents

1. [Executive Summary](#executive-summary)
2. [Top 10 Most Impactful Issues](#top-10-most-impactful-issues)
3. [Visual Design & Layout](#1-visual-design--layout)
4. [Typography & Readability](#2-typography--readability)
5. [Navigation & Information Architecture](#3-navigation--information-architecture)
6. [Accessibility (WCAG 2.1 AA)](#4-accessibility-wcag-21-aa)
7. [Mobile Responsiveness](#5-mobile-responsiveness)
8. [Performance & Technical](#6-performance--technical)
9. [Content & Messaging](#7-content--messaging)
10. [Conversion Optimization](#8-conversion-optimization)
11. [Page-by-Page Findings](#page-by-page-findings)
12. [Prioritized Implementation Roadmap](#prioritized-implementation-roadmap)

---

## Executive Summary

The Michael Williams Memorial Scholarship website serves a noble mission: honoring Michael Williams' legacy by awarding scholarships to deserving students from Rumson-Fair Haven Regional High School. The site successfully communicates Michael's story and showcases past winners, with a clean visual identity built around navy (#232842) and gold (#cda33b) branding.

However, the audit reveals several critical issues that undermine trust, accessibility, and conversion potential. The most damaging finding is **template placeholder content visible to visitors** -- the donation form's terms and conditions reference "Alone Covid 19" (the parent WordPress theme's demo organization), and the Contact Us page contains lorem ipsum text, a fake address ("120 Park Avenue, New York, NY 10044"), and a placeholder phone number ("+1 (234) 567 890"). For a 501(c)(3) asking for donations, this is a trust-destroying problem that likely costs real money in abandoned donations.

Additional systemic issues include: hundreds of images across gallery pages with zero alt text, no scholarship application path anywhere on the site, inconsistent donation progress data between pages, a copyright year stuck at 2024, multiple 404 pages linked from the navigation (Gallery and Art Gallery), and significant WCAG 2.1 AA accessibility failures throughout.

The volleyball tournament and hockey event pages are notably stronger -- they appear to be newer, purpose-built pages with better UX patterns, modern styling, and working functionality. The core WordPress/Elementor pages (homepage, about, contact, galleries) need substantially more attention.

**Overall Site Grade: C-**
- Visual Design: B-
- Content Quality: D (due to placeholder text)
- Accessibility: D
- Mobile Experience: B-
- Trust & Credibility: D+ (placeholder content, fake contact info)
- Conversion Optimization: C-

---

## Top 10 Most Impactful Issues

| # | Issue | Severity | Impact | Page(s) |
|---|-------|----------|--------|---------|
| 1 | **Donation terms reference "Alone Covid 19"** instead of the scholarship name | **CRITICAL** | Destroys donor trust at the moment of payment | Homepage, /donate/ |
| 2 | **Contact page is entirely placeholder content** -- lorem ipsum, fake address (120 Park Ave, NY), fake phone (+1 234 567 890), fake email (youremailaddress@mail.com), "Employment Opportunities" repeated 3x | **CRITICAL** | Visitors seeking to verify legitimacy find a page that looks abandoned/fraudulent | /contact/ |
| 3 | **No scholarship application path exists** -- no "Apply" page, no application form, no link to an external application, no deadline info | **CRITICAL** | The core purpose of the foundation (awarding scholarships) has no actionable user flow | Sitewide |
| 4 | **Gallery and Art Gallery pages return 404** from navigation links | **HIGH** | Broken navigation destroys confidence in site maintenance | /gallery/, /art-gallery/ |
| 5 | **400+ gallery images across 4 golf outing pages have zero alt text** | **HIGH** | Complete WCAG failure; images invisible to screen readers; poor SEO | All gallery pages |
| 6 | **Inconsistent donation amounts displayed** -- homepage shows "$5,235 Raised" while /donate/ shows "$13,000 Raised" with different goals | **HIGH** | Confusing and erodes trust in financial transparency | Homepage vs /donate/ |
| 7 | **Copyright stuck at 2024**, two years out of date | **MEDIUM** | Signals abandoned/unmaintained site | Sitewide footer |
| 8 | **No Open Graph / Twitter Card meta tags** detected | **MEDIUM** | Shared links on social media show no preview image, title, or description | Sitewide |
| 9 | **Gold accent color (#cda33b) fails WCAG AA contrast** against white backgrounds (ratio ~2.9:1, needs 4.5:1) | **MEDIUM** | Text using this color is illegible for low-vision users | Sitewide |
| 10 | **No sitemap.xml exists** and robots.txt blocks all query string URLs | **MEDIUM** | Impairs search engine crawling and indexing | Technical |

---

## 1. Visual Design & Layout

### 1.1 Visual Hierarchy

**Severity: Medium**

The homepage attempts a top-down narrative flow: hero/logo, donation CTA, mission, donation widget, golf outing promo, past winners. However, the visual hierarchy has issues:

- The donation widget competes with the golf outing promo for attention in the mid-page area. There is no clear single primary CTA above the fold.
- The "Past Winners" carousel at the bottom of the homepage is the most compelling content (real people, real stories) but is buried below the fold.
- The hero section lacks a clear value proposition headline. Visitors must scroll to understand what this organization does.

**Recommendation:** Restructure the homepage to lead with Michael's story (emotional hook), followed immediately by a clear mission statement, then past winners as social proof, then the donation CTA. The current order prioritizes asking for money before establishing emotional connection.

### 1.2 Design Consistency

**Severity: Medium**

The site uses two distinct design languages:

1. **WordPress/Elementor pages** (homepage, about, contact, galleries): Poppins font, navy (#232842) + gold (#cda33b), Elementor's widget-based layout
2. **Custom event pages** (volleyball, hockey): Inter font, darker navy/gray (#111827) + darker gold (#b8860b), modern card-based UI with CSS Grid

This creates a noticeable visual disconnect when navigating between pages. The event pages feel 2-3 years more modern than the core site.

**Recommendation:** Either update the core WordPress pages to match the event page aesthetic, or adjust the event pages to use Poppins and the same gold (#cda33b) to maintain brand consistency. The event page design language is objectively stronger and would be the better target.

### 1.3 Above-the-Fold Effectiveness

**Severity: Medium**

On the homepage, the above-the-fold content is dominated by the site logo and a large banner/CTA area. There is no hero image of Michael, no compelling headline, and no immediate emotional context. A first-time visitor does not immediately understand:
- Who Michael Williams was
- What the scholarship does
- Why they should care

**Recommendation:** Add a hero section with a photo of Michael, a one-line mission statement ("Honoring Michael Williams' legacy through music, art, and community"), and a clear CTA. Example:

```html
<section class="hero-banner" style="background: linear-gradient(rgba(35,40,66,0.85), rgba(35,40,66,0.85)), url('michael-hero.jpg'); background-size: cover; padding: 80px 20px; text-align: center; color: white;">
  <h1 style="font-size: 36px; margin-bottom: 16px;">The Michael Williams Memorial Scholarship</h1>
  <p style="font-size: 20px; max-width: 600px; margin: 0 auto 32px; opacity: 0.9;">
    Celebrating music, art, and community by supporting the next generation of creators from Rumson-Fair Haven.
  </p>
  <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
    <a href="/donate/" class="btn-primary">Donate Now</a>
    <a href="/about-us/" class="btn-secondary">Michael's Story</a>
  </div>
</section>
```

### 1.4 Image Quality & Sizing

**Severity: Low**

- Golf outing gallery images use compressed versions (filenames prefixed with `compressed_`), which is good for performance.
- Past winner profile images vary in quality and aspect ratio -- some are clearly cropped phone photos while others are formal portraits.
- The logo image (`g852.png`) appears to be an SVG exported as PNG, which may cause scaling artifacts.

**Recommendation:** Standardize past winner photos with consistent cropping (square, 400x400px minimum), consistent background treatment (or circular crop as used on the Our Team page). Convert the logo to actual SVG format for crisp rendering at all sizes.

---

## 2. Typography & Readability

### 2.1 Font Choices

**Severity: Low**

- **Primary font:** Poppins (400, 600, 700) -- a clean, modern geometric sans-serif. Good choice for a foundation site.
- **Event pages use:** Inter (400, 500, 600, 700, 800) -- also excellent, but inconsistent with the core site.
- **Montserrat** is referenced in the homepage CSS but its usage appears minimal.

Three font families across one site is excessive. Each additional font family adds ~20-50KB of download weight and creates visual inconsistency.

**Recommendation:** Consolidate to a single font family (Poppins or Inter) sitewide. Remove unused Montserrat reference.

### 2.2 Font Sizes & Line Heights

**Severity: Low**

Core pages use reasonable sizing:
- H1: 42px (bold) -- appropriate
- H2: 32px (bold) -- appropriate
- H3: 24px (bold) -- appropriate
- Body: appears to default to 16px with ~1.6 line-height -- good

The volleyball page uses smaller body text (14px in many places), which may be too small for older donors who are a key demographic for scholarship foundations.

### 2.3 Content Scannability

**Severity: Medium**

The About page presents Michael's story as dense paragraphs without visual breaks. The scholarship criteria are listed but not visually distinguished from surrounding narrative text.

**Recommendation:** Break the About page into scannable sections with:
- Pull quotes highlighting Michael's character
- Icon-accompanied criteria cards (similar to the volleyball page's info cards)
- A timeline of the foundation's history and impact

---

## 3. Navigation & Information Architecture

### 3.1 Menu Structure

**Current Navigation:**
```
Home | Events > [QU Hockey 2026, Volleyball Tournament 2026] | About Us | Past Winners | Our Team | Gallery > [Golf Outing 2025, 2024, 2023, 2022, Art Gallery]
```

**Issues Found:**

| Issue | Severity | Details |
|-------|----------|---------|
| No "Donate" in main nav | **HIGH** | The single most important action is hidden -- only accessible via buttons within page content or footer quick links |
| No "Apply" or "Scholarship" in main nav | **HIGH** | Prospective applicants have no clear entry point |
| No "Contact" in main nav | **MEDIUM** | Contact page exists at /contact/ but is not in the primary navigation (and is broken with placeholder content regardless) |
| Gallery parent link 404s | **HIGH** | Clicking "Gallery" itself (not a sub-item) returns a 404 |
| Art Gallery sub-link 404s | **HIGH** | The Art Gallery page does not exist |
| Gallery sub-menu has 5 items | **LOW** | 4 years of golf photos + art gallery is cluttered; consider consolidating |

**Recommended Navigation Restructure:**
```
Home | About Michael | Scholarship [Apply, Past Winners, Criteria] | Events [Hockey 2026, Volleyball 2026] | Gallery [Golf Outings, Art] | Our Team | Donate (highlighted button)
```

### 3.2 User Flow Analysis

**Flow 1: "I want to learn about the foundation" (Donor)**
- Current: Home -> scroll past donation widget -> find mission text -> About Us for full story
- Issues: Mission is below the fold on homepage; About Us is the 4th nav item
- Ideal: Home hero immediately communicates mission; About link is prominent

**Flow 2: "I want to donate" (Donor)**
- Current: Home -> scroll to donation widget OR find "Donate Now" in footer
- Issues: No persistent "Donate" button in header navigation; homepage widget is below fold
- Ideal: Prominent "Donate" button in header nav (contrasting color), visible on every page

**Flow 3: "I want to apply for the scholarship" (Student)**
- Current: DEAD END. No application page, no application form, no instructions, no deadline.
- Issues: This is the foundation's core purpose and it has zero user flow
- Ideal: "Apply" page with eligibility criteria, application form or link, deadline, FAQ

**Flow 4: "I want to attend an event" (Supporter)**
- Current: Events dropdown -> Hockey or Volleyball page -> Registration form
- Issues: This flow actually works reasonably well. The event pages have clear registration paths.
- Note: This is the strongest user flow on the site.

### 3.3 Footer Links

**Severity: Medium**

The footer contains:
- Contact Information (email only)
- Quick Links: Donate Now, Who We Are, What We Do, Past Winners
- Annual Golf Outing: Photo Gallery

**Issues:**
- "Who We Are" and "What We Do" are vague labels -- unclear where they lead
- No social media links in footer
- No link to the contact page
- No link to 501(c)(3) verification (e.g., GuideStar/Candid profile)
- "Photo Gallery" link likely points to the 404 gallery page

---

## 4. Accessibility (WCAG 2.1 AA)

### 4.1 Color Contrast Failures

**Severity: High**

| Element | Foreground | Background | Contrast Ratio | WCAG AA Required | Status |
|---------|-----------|------------|---------------|-----------------|--------|
| Gold accent text | #cda33b | #ffffff | ~2.9:1 | 4.5:1 (normal text) | **FAIL** |
| Gold button text | #ffffff | #cda33b | ~2.9:1 | 4.5:1 | **FAIL** |
| Gray placeholder text | #6b7280 | #ffffff | ~5.0:1 | 4.5:1 | PASS |
| Navy heading text | #232842 | #ffffff | ~14.5:1 | 4.5:1 | PASS |
| Body text | #333333 | #ffffff | ~12.6:1 | 4.5:1 | PASS |
| Volleyball gold | #b8860b | #ffffff | ~3.4:1 | 4.5:1 | **FAIL** |
| White on gold button | #ffffff | #b8860b | ~3.4:1 | 4.5:1 | **FAIL** |

**Recommendation:** Darken the gold to at least #8B6914 for text on white backgrounds (ratio ~4.8:1). For buttons, use white text on the navy (#232842) background instead, or darken gold further to #7A5C00 (ratio ~5.5:1).

```css
/* Before */
.btn-donate { background: #cda33b; color: #fff; }

/* After - Option A: Darker gold that passes AA */
.btn-donate { background: #8B6508; color: #fff; }

/* After - Option B: Navy button with gold accent */
.btn-donate { background: #232842; color: #fff; border: 2px solid #cda33b; }
```

### 4.2 Missing Alt Text

**Severity: High**

This is the single largest accessibility failure on the site. Findings by page:

| Page | Images | Missing Alt Text | Percentage |
|------|--------|-----------------|------------|
| Homepage | ~10 | ~8 | 80% |
| Past Winners | 6 | 6 | 100% |
| Our Team | 6 | 6 | 100% |
| Golf Outing 2025 | ~118 | ~118 | 100% |
| Golf Outing 2024 | ~126 | ~126 | 100% |
| Golf Outing 2023 | ~90 | ~90 | 100% |
| Golf Outing 2022 | ~50 | ~50 | 100% |
| About Us | ~1 | ~1 | 100% |
| **TOTAL** | **~407** | **~405** | **99.5%** |

This makes the site effectively unusable for screen reader users and also hurts SEO (Google uses alt text for image indexing).

**Recommendation (Quick Win for Profile Images):**
```html
<!-- Before -->
<img src="4.jpeg">

<!-- After -->
<img src="4.jpeg" alt="Evan McCormick, 2025 scholarship winner, Georgetown University">
```

**Recommendation (Gallery Images):**
At minimum, add generic contextual alt text:
```html
<img src="compressed_1-IMG_1234.jpg" alt="Photo from the 2025 Michael Williams Memorial Golf Outing">
```

### 4.3 Semantic HTML Issues

**Severity: Medium**

- Gallery pages use flat `<a><img></a>` structures without `<figure>`, `<figcaption>`, or gallery ARIA roles
- The Our Team page hides bio descriptions with `display: none` on certain views -- this content should use `visually-hidden` class or be accessible via expand/collapse with proper ARIA
- Carousel navigation on Past Winners lacks ARIA labels (`aria-label="Next winner"`, `aria-label="Previous winner"`)
- The donation form inputs lack `aria-required="true"` attributes
- The homepage H1 structure is unclear -- the page title may be the logo rather than a text heading

**Recommendation for gallery pages:**
```html
<!-- Before -->
<a href="full-image.jpg"><img src="thumb.jpg"></a>

<!-- After -->
<figure role="group">
  <a href="full-image.jpg" aria-label="View full size photo from 2025 golf outing">
    <img src="thumb.jpg" alt="Golfers at the 2025 MWS Golf Outing" loading="lazy">
  </a>
</figure>
```

### 4.4 Keyboard Navigation

**Severity: Medium**

- The volleyball registration page has custom-styled radio buttons and tab interfaces that may not have proper keyboard support (no visible focus indicators mentioned for custom controls)
- Carousel components (Past Winners, Our Team) may not be keyboard-navigable
- The Our Team page explicitly hides navigation arrows with `display: none !important`, removing the only carousel control mechanism

### 4.5 Form Accessibility

**Severity: Medium**

The donation form (GiveWP):
- Uses preset amount buttons that function as radio inputs -- need to verify keyboard selection works
- Title dropdown lacks an accessible label
- Terms checkbox requires reading hidden expandable content
- No error message association via `aria-describedby`

The volleyball registration forms:
- Form labels are present and associated with inputs (good)
- Error messages appear after interaction but lack `role="alert"` for screen reader announcement
- Division picker is a custom radio implementation -- verify keyboard accessibility

---

## 5. Mobile Responsiveness

### 5.1 Responsive Breakpoints

The site uses these breakpoints:
- **Elementor pages:** 768px, 880px, 1024px, 1200px
- **Volleyball page:** 480px, 768px, 1024px
- **Hockey page:** 768px, 991px

This is adequate coverage for most devices.

### 5.2 Mobile-Specific Issues

**Severity: Medium**

| Issue | Page | Details |
|-------|------|---------|
| Info section hidden on mobile | Volleyball (/volleyball/) | The entire left-column info section (`display: none` below 768px) hides event details like "What's Included" from mobile users. This is content, not decoration -- it should be visible. |
| Email field hidden on very small screens | Volleyball (/volleyball/) | Roster management email input is hidden below 480px -- users cannot see teammate emails on small phones |
| Carousel arrow controls hidden | Our Team | `display: none !important` on carousel arrows means no navigation on any screen size |
| Gallery image tap targets | Golf Outing pages | Thumbnail images may be too small on mobile for comfortable tapping (need to verify 44x44px minimum) |
| Horizontal scrolling risk | Past Winners | Carousel implementations can cause horizontal overflow issues if not contained properly |

**Recommendation for volleyball info section:**
```css
/* Before: info hidden entirely on mobile */
#mws-volleyball .info-section {
    display: none;
}

/* After: show info below the registration card on mobile */
#mws-volleyball .info-section {
    display: block;
    order: 2; /* appears after registration card */
    margin-top: 24px;
}

@media (min-width: 768px) {
    #mws-volleyball .info-section {
        order: -1; /* restore left-side position on desktop */
        margin-top: 0;
    }
}
```

### 5.3 Touch Target Sizes

**Severity: Low**

The volleyball page's registration type buttons have generous padding (14px 16px) with full-width layout -- these meet the 44x44px minimum. The donation preset amount buttons appear adequately sized. Gallery thumbnail images should be verified for minimum 44x44px tap targets.

---

## 6. Performance & Technical

### 6.1 Page Load Concerns

**Severity: Medium**

| Concern | Details | Impact |
|---------|---------|--------|
| Gallery page image count | Golf Outing 2025 has ~118 images, 2024 has ~126 images | Massive page weight even with lazy loading |
| Multiple Google Font loads | Poppins (3 weights) + Inter (5 weights) + Montserrat | ~150-250KB of font files |
| Elementor CSS/JS overhead | Full Elementor framework loaded on every page | Substantial unused CSS/JS |
| Redundant font declarations | Poppins @font-face appears 3 times in homepage CSS | Wasted bytes, potential render blocking |
| No image width/height attributes | Most images lack explicit dimensions | Causes layout shift (CLS) during load |

**Recommendation for galleries:** Implement pagination (20-30 images per page) or infinite scroll with intersection observer lazy loading rather than dumping 100+ images on a single page.

### 6.2 SEO Issues

**Severity: Medium**

| Issue | Details |
|-------|---------|
| **No sitemap.xml** | Neither `/sitemap.xml` nor `/wp-sitemap.xml` exists -- search engines cannot discover all pages |
| **robots.txt blocks query strings** | `Disallow: /*?` blocks all parameterized URLs including pagination, search, and UTM-tracked links |
| **No Open Graph tags detected** | Sharing on Facebook, LinkedIn, Twitter shows no preview image or description |
| **No Twitter Card tags** | Same social sharing issue |
| **No structured data** | No schema.org markup for Organization, NonProfit, Event, or Person types |
| **Meta descriptions may be missing** | Not detected on audited pages |
| **Gallery images have no alt text** | Hundreds of images provide zero SEO value |
| **Page title on hockey page uses display:none** | Hidden H1 is an anti-pattern for SEO |

**Recommendation -- Add Open Graph tags (Quick Win):**
```html
<meta property="og:title" content="The Michael Williams Memorial Scholarship">
<meta property="og:description" content="Honoring Michael Williams' legacy by awarding scholarships to RFH seniors who demonstrate excellence in music, art, academics, and community service.">
<meta property="og:image" content="https://michaelwilliamsscholarship.com/wp-content/uploads/og-image.jpg">
<meta property="og:url" content="https://michaelwilliamsscholarship.com">
<meta property="og:type" content="website">
<meta name="twitter:card" content="summary_large_image">
```

**Recommendation -- Add Organization schema:**
```html
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "NGO",
  "name": "The Michael Williams Memorial Scholarship",
  "url": "https://michaelwilliamsscholarship.com",
  "email": "info@michaelwilliamsscholarship.com",
  "description": "A 501(c)(3) memorial scholarship foundation supporting graduating seniors from Rumson-Fair Haven Regional High School.",
  "foundingDate": "2019",
  "nonprofitStatus": "501c3"
}
</script>
```

### 6.3 Broken Links & 404 Errors

**Severity: High**

| URL | Linked From | Status |
|-----|-------------|--------|
| `/gallery/` | Main navigation "Gallery" parent link | **404** |
| `/art-gallery/` | Main navigation under Gallery dropdown | **404** |
| `/art-gallery-2/` | Tested alternate slug | **404** |
| `/apply/` | Not linked (but should exist) | **404** |
| `/scholarship/` | Not linked (but should exist) | **404** |
| `/sitemap.xml` | Standard location | **404** |
| `/wp-sitemap.xml` | WordPress default | **404** |

### 6.4 SSL Status

**Severity: None (Pass)**

The site is served over HTTPS via `https://michaelwilliamsscholarship.com`. No mixed content warnings were detected during the audit.

---

## 7. Content & Messaging

### 7.1 Mission Clarity

**Severity: Medium**

The foundation's mission is communicated but requires effort to piece together. The homepage mentions the scholarship exists but does not prominently state:
- Exactly what the scholarship is for (amount? recurring?)
- Who is eligible (RFH seniors -- but this is only on the About page)
- How to apply (nowhere on the site)
- What impact it has had (dollar amounts awarded, number of recipients)

**Recommendation:** Add a clear mission banner to the homepage:
```
"Since 2020, the Michael Williams Memorial Scholarship has awarded [X] scholarships
totaling [$X,XXX] to graduating seniors from Rumson-Fair Haven Regional High School
who embody Michael's passion for music, art, and community."
```

### 7.2 Emotional Storytelling

**Severity: Medium**

The About page tells Michael's story in a respectful, warm tone. However, it could be significantly more impactful:

- **No photos of Michael on the homepage** -- the first visual impression should include him
- **No quotes from family, friends, or past winners** -- first-person testimonials are the most powerful trust and emotional signals for a memorial foundation
- **No video content** -- even a short 60-second video from the family or past winners would dramatically increase emotional engagement and donation conversion
- **Past winner bios are factual but not emotional** -- they describe academic achievements but not how the scholarship impacted them or how they connect to Michael's legacy

**Before (current past winner bio style):**
> "Evan McCormick is a Finance major at Georgetown University's McDonough School of Business..."

**After (emotionally resonant):**
> "Evan McCormick, our 2025 recipient, embodies the creative spirit and academic drive that defined Michael. A Finance major at Georgetown's McDonough School, Evan's passion for [music/art/community] reminded our selection committee of everything Michael stood for. 'Receiving this scholarship means...' -- Evan McCormick"

### 7.3 Placeholder & Template Content (CRITICAL)

**Severity: CRITICAL**

This is the most damaging content issue on the site. Multiple pages contain unmodified template/placeholder content:

**Contact Page (/contact/):**
- Lorem ipsum text appears TWICE: "Lorem ipsum dolor sit amet, consectetur notted adipisicing elit sed do eiusmod tempor incididunt ut labore."
- Fake address: "120 Park Avenue, New York, NY 10044, USA"
- Placeholder email: "youremailaddress@mail.com"
- Fake phone: "+1 (234) 567 890"
- "Employment Opportunities" heading repeated THREE TIMES (from the "Alone" theme template)
- "A few of the companies we have had charity team building events with" -- irrelevant template section

**Donation Form Terms & Conditions (Homepage & /donate/):**
- Terms reference "Alone Covid 19" instead of "The Michael Williams Memorial Scholarship"
- This text appears in the legal agreement donors must accept before giving money
- Example: "Acceptance of any contribution, gift or grant is at the discretion of the **Alone Covid 19**"

**Footer:**
- Copyright reads "2024" -- should be "2025" or dynamically generated

**This needs to be fixed TODAY.** Any donor who reads the terms before giving money will see a different organization's name and may assume the site is fraudulent or that their donation will go to the wrong place.

### 7.4 Content Gaps

**Severity: High**

| Missing Content | Why It Matters |
|----------------|----------------|
| **Scholarship application page** | Students cannot apply for the scholarship they see described |
| **Scholarship amount** | Donors don't know what their money funds ($500? $5,000? $25,000?) |
| **Application deadline** | Time-sensitive information for prospective applicants |
| **Impact numbers** | "6 scholarships awarded since 2020" is never stated explicitly |
| **Financial transparency** | No annual report, no breakdown of funds raised vs. awarded |
| **Past event recaps** | Golf outing galleries have photos but no narrative (who won? how much was raised?) |
| **FAQ section** | Common questions (Is it tax-deductible? Who is eligible? How are winners selected?) are unanswered |

---

## 8. Conversion Optimization

### 8.1 Donation Flow

**Severity: High**

**Current donation path analysis:**

1. Visitor arrives at homepage
2. Must scroll past logo area to find donation widget
3. Donation widget shows $5,235 of $30,000 goal (17% -- could feel discouraging)
4. Alternatively, /donate/ page shows $13,000 of $30,009 (43% -- inconsistent!)
5. Selects amount from preset buttons
6. Fills in personal information
7. Reaches terms acceptance -- sees "Alone Covid 19" in legal text
8. Completes Stripe checkout

**Issues:**
- No "Donate" button in the persistent header navigation
- Two different progress amounts on different pages destroy credibility
- Preset amounts ($10, $25, $50, $100, $250) are fine but there is no anchor/default selection
- No explanation of what the donation funds
- The terms contain the wrong organization name
- No post-donation thank you experience described
- No recurring donation option visible

**Recommendation -- Add persistent Donate button to header:**
```css
.nav-donate-btn {
    background: #cda33b;
    color: #fff;
    padding: 10px 24px;
    border-radius: 6px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-left: 16px;
    transition: background 0.2s;
}
.nav-donate-btn:hover {
    background: #b8860b;
}
```

**Recommendation -- Sync donation amounts:**
Ensure both the homepage widget and /donate/ page pull from the same GiveWP campaign/form so the progress bar is consistent.

### 8.2 Email Signup & Contact

**Severity: Medium**

- No email newsletter signup exists anywhere on the site
- The contact page is broken (placeholder content)
- The only contact path is `info@michaelwilliamsscholarship.com` in the footer
- No contact form that actually works
- The donation page shows a different email (`jstephens@blackbridgeinvestments.com`) than the site contact (`info@michaelwilliamsscholarship.com`)

**Recommendation:** Add a simple email signup to the footer:
```html
<div class="email-signup">
  <h3>Stay Connected</h3>
  <p>Get updates on events, scholarship announcements, and ways to support Michael's legacy.</p>
  <form action="/subscribe" method="POST">
    <input type="email" placeholder="Your email address" required aria-label="Email address">
    <button type="submit">Subscribe</button>
  </form>
</div>
```

### 8.3 Trust Indicators

**Severity: High**

For a 501(c)(3) asking for donations, trust signals are essential. Current state:

| Trust Signal | Present? | Notes |
|-------------|----------|-------|
| 501(c)(3) status mentioned | Partial | Only in footer copyright line, no EIN provided |
| GuideStar/Candid profile link | No | |
| Board member information | Yes | Our Team page (good) |
| Financial transparency | No | No annual report or fund allocation |
| Past impact data | Partial | Past winners shown but no dollar amounts |
| Donor testimonials | No | |
| Media mentions | No | |
| Social media presence | No links | No social media icons or links anywhere |
| SSL certificate | Yes | HTTPS is active |
| Professional email domain | Yes | @michaelwilliamsscholarship.com |
| Consistent contact info | No | Different emails on different pages |
| Privacy policy | No | Not found |
| Legitimate terms | No | Terms reference wrong organization |

**Recommendation:** Add a trust bar below the donation form:
```html
<div class="trust-indicators" style="display: flex; justify-content: center; gap: 24px; padding: 16px; border-top: 1px solid #e5e7eb; margin-top: 16px; font-size: 13px; color: #6b7280;">
  <span>501(c)(3) Tax-Exempt</span>
  <span>EIN: XX-XXXXXXX</span>
  <span>6 Scholarships Awarded Since 2020</span>
  <span>100% Goes to Students</span>
</div>
```

### 8.4 Social Media Integration

**Severity: Medium**

The site has zero social media links or integration. No Facebook, Instagram, Twitter/X, or LinkedIn icons appear anywhere -- not in the header, footer, or any page content. For a community-oriented scholarship foundation that runs events, social media is a critical channel for:
- Event promotion and ticket sales
- Donor engagement and updates
- Community building
- Sharing past winner stories
- Photo sharing from events (currently only via the website)

**Recommendation:** Add social media icons to both the header and footer. If accounts don't exist yet, create them -- Instagram is particularly important for event-driven nonprofits.

---

## Page-by-Page Findings

### Homepage (/)

| Finding | Severity | Category |
|---------|----------|----------|
| Donation terms reference "Alone Covid 19" | CRITICAL | Content |
| No hero image or compelling above-fold content | HIGH | Design |
| Donation progress inconsistent with /donate/ page | HIGH | Trust |
| No "Donate" in primary navigation | HIGH | Conversion |
| Logo image lacks alt text | MEDIUM | Accessibility |
| Copyright year is 2024 | MEDIUM | Content |
| Past Winners carousel buried at bottom | MEDIUM | Design |
| No social media links | MEDIUM | Conversion |
| Redundant Poppins font declarations (3x) | LOW | Performance |

### About Us (/about-us/)

| Finding | Severity | Category |
|---------|----------|----------|
| Michael's photo may lack alt text | MEDIUM | Accessibility |
| Dense paragraph format, not scannable | MEDIUM | Typography |
| No quotes or testimonials | MEDIUM | Content |
| Scholarship criteria well-stated but no "Apply" CTA | HIGH | Conversion |
| Good heading hierarchy (H1, H2 structure) | -- | Positive |
| Color contrast adequate for headings and body text | -- | Positive |

### Past Winners (/past-winners/)

| Finding | Severity | Category |
|---------|----------|----------|
| All 6 profile images lack alt text | HIGH | Accessibility |
| Winner names use H4 (skipping H2, H3) | MEDIUM | Accessibility |
| Carousel lacks ARIA navigation labels | MEDIUM | Accessibility |
| No scholarship amount mentioned | MEDIUM | Content |
| Bios are factual but lack emotional resonance | LOW | Content |
| Winner image filenames are non-descriptive (e.g., "4.jpeg") | LOW | Technical |

### Our Team (/our-team/)

| Finding | Severity | Category |
|---------|----------|----------|
| All team member images lack alt text | HIGH | Accessibility |
| Bio descriptions hidden with `display: none` | HIGH | Accessibility |
| Carousel arrows force-hidden (`display: none !important`) | HIGH | Usability |
| No way to navigate between team members on any device | HIGH | Usability |
| Charlie Eckstein listed as "rising junior" -- may be outdated | LOW | Content |
| No role/title shown for team members (President, Director, etc.) | MEDIUM | Content |

### Contact (/contact/)

| Finding | Severity | Category |
|---------|----------|----------|
| Entire page is template placeholder content | CRITICAL | Content |
| Lorem ipsum text (appears twice) | CRITICAL | Content |
| Fake address: "120 Park Avenue, New York, NY 10044" | CRITICAL | Trust |
| Placeholder email: "youremailaddress@mail.com" | CRITICAL | Trust |
| Fake phone: "+1 (234) 567 890" | CRITICAL | Trust |
| "Employment Opportunities" heading (3 times) | CRITICAL | Content |
| "Companies we have had charity team building events with" | HIGH | Content |
| Page not linked from main navigation | MEDIUM | Navigation |

### Volleyball (/volleyball/)

| Finding | Severity | Category |
|---------|----------|----------|
| Hero image may lack descriptive alt text | MEDIUM | Accessibility |
| Info section entirely hidden on mobile (`display: none`) | HIGH | Mobile |
| Roster email field hidden below 480px | MEDIUM | Mobile |
| Gold colors (#b8860b) fail WCAG AA contrast | MEDIUM | Accessibility |
| Error messages lack `role="alert"` | MEDIUM | Accessibility |
| Well-designed registration flow with 4 clear paths | -- | Positive |
| Supabase integration works for real-time team management | -- | Positive |
| Modern, card-based UI with good visual hierarchy | -- | Positive |
| Responsive grid layout with appropriate breakpoints | -- | Positive |

### Hockey (/qu-hockey-2026/)

| Finding | Severity | Category |
|---------|----------|----------|
| Page H1 hidden with `display: none` | MEDIUM | SEO/Accessibility |
| Form inputs lack ARIA labels | MEDIUM | Accessibility |
| Phone number field has no format guidance or input masking | LOW | Usability |
| No confirmation step before payment processing | MEDIUM | Usability |
| Gold text (#cda33b) on light backgrounds may fail contrast | MEDIUM | Accessibility |
| Hero image has alt text ("Quinnipiac Hockey") | -- | Positive |
| Clean two-column layout | -- | Positive |
| Dynamic ticket pricing works well | -- | Positive |

### Golf Outing Galleries (2022-2025)

| Finding | Severity | Category |
|---------|----------|----------|
| ~384 images across 4 pages have zero alt text | HIGH | Accessibility |
| No semantic gallery markup (figure/figcaption) | MEDIUM | Accessibility |
| 90-126 images loaded per page | MEDIUM | Performance |
| No narrative context (what happened at the event?) | MEDIUM | Content |
| Photographer credited (Christine Stillitano) | -- | Positive |
| Images use compressed versions | -- | Positive |

### Donate (/donate/)

| Finding | Severity | Category |
|---------|----------|----------|
| Shows $13,000 raised (homepage shows $5,235) | HIGH | Trust |
| Goal is $30,009 (oddly specific -- likely a data error) | LOW | Content |
| Contact email is jstephens@blackbridgeinvestments.com (not org email) | MEDIUM | Trust |
| Terms reference "Alone Covid 19" | CRITICAL | Content |
| Form labels may lack proper `for` attribute association | MEDIUM | Accessibility |
| No explanation of what donations fund | HIGH | Conversion |

### Gallery (/gallery/) & Art Gallery

| Finding | Severity | Category |
|---------|----------|----------|
| /gallery/ returns 404 | HIGH | Broken |
| /art-gallery/ returns 404 | HIGH | Broken |
| Both linked from main navigation | HIGH | Navigation |

---

## Prioritized Implementation Roadmap

### Phase 1: Emergency Fixes (Do This Week)
*Estimated effort: 2-4 hours*

These are trust-destroying issues that may be actively costing donations:

1. **Fix donation terms and conditions** -- Replace all instances of "Alone Covid 19" with "The Michael Williams Memorial Scholarship" in the GiveWP terms settings
   - Location: WordPress Admin > GiveWP > Settings > Terms & Conditions (or the specific form settings)

2. **Fix or hide the Contact page** -- Either:
   - (Quick) Remove /contact/ from any links and set to draft/private
   - (Better) Replace placeholder content with real contact information (just the email address is fine, no need for a physical address)

3. **Fix broken navigation links** -- Either create the /gallery/ and /art-gallery/ pages or remove them from the navigation menu
   - Location: WordPress Admin > Appearance > Menus

4. **Update copyright year** in footer from 2024 to 2025 (or ideally, make it dynamic)
   ```php
   // In footer template, replace "2024" with:
   <?php echo date('Y'); ?>
   ```

5. **Sync donation progress** -- Ensure homepage and /donate/ show the same raised amount by using the same GiveWP form ID

### Phase 2: Quick Wins (This Month)
*Estimated effort: 4-8 hours*

6. **Add "Donate" button to main navigation** -- Prominent, contrasting color, visible on every page

7. **Add alt text to Past Winners and Our Team images** -- Only 12 images total, high accessibility impact

8. **Add Open Graph meta tags** -- Install Yoast SEO or manually add OG tags to enable social media link previews

9. **Fix the Our Team page** -- Un-hide bio descriptions, fix carousel navigation, or convert to a static grid layout

10. **Add trust indicators** -- Display EIN number, "501(c)(3) Tax-Exempt" badge near donation forms

11. **Consolidate fonts** -- Remove unused Montserrat, choose either Poppins or Inter for all pages

### Phase 3: Content & IA Improvements (This Quarter)
*Estimated effort: 8-16 hours*

12. **Create a Scholarship Application page** -- Even if the application is handled externally (Google Form, etc.), create a page with:
    - Eligibility criteria
    - Application deadline
    - How to apply (link or embedded form)
    - FAQ
    - Past winner testimonials

13. **Restructure main navigation** following the recommended structure (see Section 3.1)

14. **Rewrite the homepage** with:
    - Hero section featuring Michael's photo and mission statement
    - Impact stats (scholarships awarded, total given, years active)
    - Past winner highlights as social proof
    - Clear donation CTA with context ("Your $100 helps fund the next scholarship")

15. **Add social media accounts and links** -- Create Instagram at minimum; add icons to header and footer

16. **Create an email signup** -- Use Mailchimp, ConvertKit, or similar free tier for nonprofit email list

17. **Add gallery page alt text** -- Use batch alt text tools or AI-assisted alt text generation for the ~384 gallery images

### Phase 4: Design & Technical Overhaul (Next Quarter)
*Estimated effort: 20-40 hours*

18. **Unify visual design language** -- Update core WordPress/Elementor pages to match the modern event page aesthetic, or vice versa

19. **Fix all WCAG color contrast failures** -- Darken gold accent color sitewide, test all text/background combinations

20. **Implement gallery pagination** -- Break 100+ image galleries into paginated views of 20-30 images

21. **Add structured data** -- Schema.org markup for Organization, Event, and Person types

22. **Create a proper sitemap.xml** -- Install a sitemap plugin or configure Yoast to generate one

23. **Add a Privacy Policy page** -- Required for 501(c)(3) organizations collecting personal data and payments

24. **Implement keyboard navigation testing** -- Ensure all interactive elements (carousels, forms, tabs) are fully keyboard-accessible

25. **Add event recap content to gallery pages** -- Each golf outing page should have a brief narrative: what happened, how much was raised, acknowledgments

26. **Performance audit** -- Run Lighthouse, optimize image delivery (WebP format, proper sizing), reduce Elementor overhead

---

## Appendix: Color Palette Accessibility Reference

### Current Colors and Their Contrast Ratios (on white #FFFFFF)

| Color | Hex | Ratio vs White | AA Normal Text | AA Large Text | Use |
|-------|-----|---------------|----------------|---------------|-----|
| Navy | #232842 | 14.5:1 | PASS | PASS | Headings, safe for all text |
| Dark Text | #333333 | 12.6:1 | PASS | PASS | Body text, safe |
| Gold (main site) | #cda33b | 2.9:1 | **FAIL** | **FAIL** | Buttons, accents -- NOT safe for text |
| Gold (events) | #b8860b | 3.4:1 | **FAIL** | PASS (barely) | Buttons, accents -- only safe for large bold text |
| Gray-500 | #6b7280 | 5.0:1 | PASS | PASS | Secondary text, safe |
| Gray-600 | #4b5563 | 7.2:1 | PASS | PASS | Secondary text, safe |

### Recommended Accessible Gold Alternatives

| Adjusted Gold | Hex | Ratio vs White | Notes |
|--------------|-----|---------------|-------|
| Darkened Gold | #8B6508 | 4.8:1 | Passes AA for normal text |
| Deep Gold | #7A5C00 | 5.5:1 | Comfortable margin for AA |
| Rich Gold | #6B5000 | 6.5:1 | Passes AA and AAA for large text |

Use these darkened golds for text. The original #cda33b can still be used for decorative elements (borders, backgrounds, icons) where contrast with text is not a concern.

---

*Report generated February 10, 2026. All findings are based on public-facing page analysis via web fetch. A more comprehensive audit would include browser DevTools inspection, Lighthouse performance testing, actual screen reader testing, and mobile device testing.*
