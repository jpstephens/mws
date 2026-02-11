# MWS Deployment Guide

## Server Details

| Environment | URL | SSH Command |
|-------------|-----|-------------|
| **Production** | https://michaelwilliamsscholarship.com | `ssh -i ~/.ssh/id_flywheel jasonstephens+the-michael-williams-memorial-scholarship@ssh.getflywheel.com` |
| **Staging** | https://didactic-query.flywheelstaging.com | `ssh -i ~/.ssh/id_flywheel jasonstephens+staging+the-michael-williams-memorial-scholarship@ssh.getflywheel.com` |

- **Hosting**: Flywheel WordPress
- **Theme**: `alone` (parent) + `alone-child` (child theme)
- **WP-CLI**: Available on server at `/www`
- **File transfer**: SCP/SFTP don't work on Flywheel. Use: `cat localfile | ssh [SSH_CMD] "cat > /remote/path"`

## Repo Structure

```
MWS/
├── wp-content/themes/alone-child/   # Full child theme (mirrors server)
│   ├── functions.php                # Main theme functions, shortcodes, hooks
│   ├── style.css                    # Child theme stylesheet
│   ├── volleyball_event.php         # Volleyball tournament page [mws_volleyball]
│   ├── hockey_event_2026.php        # Hockey fundraiser page [mws_hockey_2026]
│   ├── scholarship_page.php         # Scholarship info page [mws_scholarship]
│   ├── about_us_page.php            # About Us page [mws_about_us]
│   ├── homepage.php                 # Homepage [mws_homepage]
│   ├── our_team_page.php            # Our Team page [mws_our_team]
│   ├── hockey_event.php             # Legacy hockey page
│   ├── footer.php                   # Custom footer
│   ├── page-success.php             # Payment success page
│   ├── page-stripe.php              # Stripe checkout page
│   ├── register.php / spo_register.php  # Legacy registration pages
│   ├── images/                      # Theme images
│   ├── js/                          # Theme JavaScript
│   └── stripe-lib/                  # Stripe PHP SDK
├── volleyball-standalone/           # Standalone volleyball backup
│   ├── index.html                   # Full standalone HTML version
│   └── emails/                      # Email templates
├── supabase/functions/send-email/   # Supabase Edge Function (Resend API)
├── DEPLOY.md                        # This file
├── batch-alt-text.php               # Utility: bulk alt text updater
└── michaelwilliams-ux-audit.md      # UX/UI audit report
```

## Deploy Child Theme to Staging

```bash
SSH="ssh -i ~/.ssh/id_flywheel jasonstephens+staging+the-michael-williams-memorial-scholarship@ssh.getflywheel.com"
THEME="/www/wp-content/themes/alone-child"
LOCAL="wp-content/themes/alone-child"

# Deploy all PHP/CSS files
for f in functions.php style.css volleyball_event.php hockey_event_2026.php scholarship_page.php about_us_page.php homepage.php our_team_page.php footer.php page-success.php page-stripe.php register.php spo_register.php hockey_event.php donate_page.php gallery_page.php past_winners_page.php; do
  cat "$LOCAL/$f" | $SSH "cat > $THEME/$f"
done

# Deploy JS
cat "$LOCAL/js/view.js" | $SSH "cat > $THEME/js/view.js"

# Flush caches
$SSH "cd /www && wp cache flush && wp elementor flush-css 2>/dev/null"
```

## Deploy Child Theme to Production

```bash
SSH="ssh -i ~/.ssh/id_flywheel jasonstephens+the-michael-williams-memorial-scholarship@ssh.getflywheel.com"
THEME="/www/wp-content/themes/alone-child"
LOCAL="wp-content/themes/alone-child"

# Deploy all PHP/CSS files
for f in functions.php style.css volleyball_event.php hockey_event_2026.php scholarship_page.php about_us_page.php homepage.php our_team_page.php footer.php page-success.php page-stripe.php register.php spo_register.php hockey_event.php donate_page.php gallery_page.php past_winners_page.php; do
  cat "$LOCAL/$f" | $SSH "cat > $THEME/$f"
done

# Deploy JS
cat "$LOCAL/js/view.js" | $SSH "cat > $THEME/js/view.js"

# Flush caches
$SSH "cd /www && wp cache flush && wp elementor flush-css 2>/dev/null"
```

## Key WordPress Pages

| Page | ID (prod) | Slug | Shortcode |
|------|-----------|------|-----------|
| Homepage | 4321 | `home-saltoro` | `[mws_homepage]` |
| Volleyball | 20452 | `volleyball` | `[mws_volleyball]` |
| Hockey | — | `qu-hockey-2026` | `[mws_hockey_2026]` |
| Scholarship | 20457 | `scholarship` | `[mws_scholarship]` |
| Donate | 17 | `donate` | GiveWP form 20160 |
| Past Winners | 705 | `past-winners` | — (Elementor) |
| About | 8923 | `about-us` | `[mws_about_us]` |
| Our Team | 9100 | `our-team` | `[mws_our_team]` |

## Other Services

- **Stripe**: Payment processing for volleyball + hockey registrations
- **Supabase**: Postgres DB + Edge Functions for volleyball backend
- **Resend**: Transactional email delivery (via Supabase Edge Function)
- **GiveWP**: WordPress donation plugin (Stripe checkout)

## Running One-Off DB Changes

```bash
# Flush caches
$SSH "cd /www && wp cache flush"

# Search-replace in DB
$SSH 'cd /www && wp search-replace "old" "new" --skip-columns=guid'

# Run a PHP script on the server
cat myscript.php | $SSH "cat > /www/myscript.php"
$SSH "cd /www && wp eval-file myscript.php && rm myscript.php"
```

## Batch Alt Text

If new gallery images are uploaded without alt text:

```bash
cat batch-alt-text.php | $SSH "cat > /www/batch-alt-text.php"
$SSH "cd /www && wp eval-file batch-alt-text.php && rm batch-alt-text.php"
```
