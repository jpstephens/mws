<?php
/**
 * Event Gallery Page - WordPress Shortcode Template
 * Rendered via [mws_gallery] shortcode in alone-child theme
 *
 * Receives $gallery_year (string|null) from shortcode handler.
 * Queries WP media library attachments grouped by year.
 */

// Build image data from WordPress media library
$years = array(2025, 2024, 2023);
$all_images = array();
foreach ($years as $y) {
    $args = array(
        'post_type'      => 'attachment',
        'post_mime_type' => 'image',
        'posts_per_page' => -1,
        'post_status'    => 'inherit',
        'date_query'     => array(
            array('year' => $y),
        ),
        'orderby' => 'date',
        'order'   => 'DESC',
    );
    $imgs = get_posts($args);
    foreach ($imgs as $img) {
        $all_images[] = array(
            'id'    => $img->ID,
            'year'  => $y,
            'url'   => wp_get_attachment_url($img->ID),
            'thumb' => wp_get_attachment_image_url($img->ID, 'medium_large'),
            'alt'   => get_post_meta($img->ID, '_wp_attachment_image_alt', true) ?: $img->post_title,
        );
    }
}

// Determine the pre-selected year from shortcode attribute
$active_year = (!empty($gallery_year) && in_array((int) $gallery_year, $years, true))
    ? (int) $gallery_year
    : 0; // 0 = "All"
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    /* Hide WordPress page title bar */
    .page-titlebar { display: none !important; }

    /* ==========================================
       CSS VARIABLES & RESET
       ========================================== */
    #mws-gallery {
        font-family: 'Poppins', sans-serif;
        line-height: 1.6;
        color: #444;
        -webkit-font-smoothing: antialiased;
    }

    #mws-gallery *,
    #mws-gallery *::before,
    #mws-gallery *::after {
        box-sizing: border-box;
    }

    #mws-gallery {
        --gold: #cda33b;
        --gold-hover: #b8930e;
        --gold-text: #8a6d1b;
        --navy: #232842;
        --white: #ffffff;
        --light-bg: #f8f8f8;
        --text: #444;
        --heading: #111;
        --transition: 0.15s ease;
    }

    /* ==========================================
       HERO BANNER
       ========================================== */
    #mws-gallery .gal-hero {
        background: var(--navy);
        padding: 180px 20px 60px;
        text-align: center;
        color: var(--white);
    }

    #mws-gallery .gal-hero h1 {
        font-size: 46px;
        font-weight: 700;
        margin: 0 0 12px;
        color: var(--white);
    }

    #mws-gallery .gal-hero p {
        font-size: 18px;
        max-width: 600px;
        margin: 0 auto;
        opacity: 0.85;
        line-height: 1.7;
    }

    @media (max-width: 768px) {
        #mws-gallery .gal-hero {
            padding: 160px 16px 40px;
        }
        #mws-gallery .gal-hero h1 {
            font-size: 32px;
        }
        #mws-gallery .gal-hero p {
            font-size: 16px;
        }
    }

    /* ==========================================
       YEAR FILTER TABS
       ========================================== */
    #mws-gallery .gal-filters {
        max-width: 1200px;
        margin: 0 auto;
        padding: 32px 20px 0;
    }

    #mws-gallery .gal-filter-row {
        display: flex;
        gap: 10px;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
        padding-bottom: 4px;
    }

    #mws-gallery .gal-filter-row::-webkit-scrollbar {
        display: none;
    }

    #mws-gallery .gal-filter-btn {
        flex-shrink: 0;
        padding: 10px 24px;
        border: 2px solid var(--navy);
        border-radius: 50px;
        background: var(--white);
        color: var(--navy);
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: background var(--transition), color var(--transition), border-color var(--transition);
        white-space: nowrap;
    }

    #mws-gallery .gal-filter-btn:hover {
        background: var(--light-bg);
    }

    #mws-gallery .gal-filter-btn.active {
        background: var(--gold);
        border-color: var(--gold);
        color: var(--white);
    }

    #mws-gallery .gal-filter-btn.active:hover {
        background: var(--gold-hover);
        border-color: var(--gold-hover);
    }

    /* ==========================================
       IMAGE GRID
       ========================================== */
    #mws-gallery .gal-grid-wrap {
        max-width: 1200px;
        margin: 0 auto;
        padding: 24px 20px 60px;
    }

    #mws-gallery .gal-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
    }

    @media (max-width: 768px) {
        #mws-gallery .gal-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 480px) {
        #mws-gallery .gal-grid {
            grid-template-columns: 1fr;
        }
    }

    #mws-gallery .gal-item {
        position: relative;
        border-radius: 12px;
        overflow: hidden;
        cursor: pointer;
        transition: transform var(--transition), box-shadow var(--transition);
    }

    #mws-gallery .gal-item:hover {
        transform: scale(1.02);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }

    #mws-gallery .gal-item.hidden {
        display: none;
    }

    #mws-gallery .gal-item img {
        display: block;
        width: 100%;
        height: 280px;
        object-fit: cover;
        border-radius: 12px;
        transition: opacity var(--transition);
    }

    /* Share button overlay */
    #mws-gallery .gal-share-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.9);
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity var(--transition), background var(--transition);
        z-index: 2;
    }

    #mws-gallery .gal-item:hover .gal-share-btn {
        opacity: 1;
    }

    #mws-gallery .gal-share-btn:hover {
        background: var(--white);
    }

    #mws-gallery .gal-share-btn svg {
        width: 18px;
        height: 18px;
        fill: var(--navy);
    }

    /* Year badge on each image */
    #mws-gallery .gal-year-badge {
        position: absolute;
        bottom: 10px;
        left: 10px;
        background: rgba(35, 40, 66, 0.8);
        color: var(--white);
        font-size: 12px;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 20px;
        z-index: 2;
    }

    /* ==========================================
       LOAD MORE BUTTON
       ========================================== */
    #mws-gallery .gal-load-more-wrap {
        text-align: center;
        padding: 16px 0 0;
    }

    #mws-gallery .gal-load-more {
        display: inline-block;
        padding: 14px 40px;
        border: none;
        border-radius: 50px;
        background: var(--gold);
        color: var(--white);
        font-family: 'Poppins', sans-serif;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: background var(--transition), transform var(--transition);
    }

    #mws-gallery .gal-load-more:hover {
        background: var(--gold-hover);
        transform: translateY(-1px);
    }

    #mws-gallery .gal-load-more.hidden {
        display: none;
    }

    /* Empty state */
    #mws-gallery .gal-empty {
        text-align: center;
        padding: 60px 20px;
        color: #999;
        font-size: 16px;
        display: none;
    }

    #mws-gallery .gal-empty.visible {
        display: block;
    }

    /* ==========================================
       LIGHTBOX
       ========================================== */
    #mws-gallery .gal-lightbox {
        display: none;
        position: fixed;
        inset: 0;
        z-index: 999999;
        background: rgba(0, 0, 0, 0.92);
        align-items: center;
        justify-content: center;
    }

    #mws-gallery .gal-lightbox.open {
        display: flex;
    }

    #mws-gallery .gal-lightbox img {
        max-width: 90vw;
        max-height: 85vh;
        object-fit: contain;
        border-radius: 8px;
        user-select: none;
    }

    #mws-gallery .gal-lb-close {
        position: absolute;
        top: 20px;
        right: 24px;
        width: 44px;
        height: 44px;
        border: none;
        background: rgba(255, 255, 255, 0.12);
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background var(--transition);
        z-index: 3;
    }

    #mws-gallery .gal-lb-close:hover {
        background: rgba(255, 255, 255, 0.25);
    }

    #mws-gallery .gal-lb-close svg {
        width: 22px;
        height: 22px;
        stroke: var(--white);
        stroke-width: 2.5;
        fill: none;
    }

    #mws-gallery .gal-lb-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 48px;
        height: 48px;
        border: none;
        background: rgba(255, 255, 255, 0.12);
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background var(--transition);
        z-index: 3;
    }

    #mws-gallery .gal-lb-nav:hover {
        background: rgba(255, 255, 255, 0.25);
    }

    #mws-gallery .gal-lb-prev {
        left: 20px;
    }

    #mws-gallery .gal-lb-next {
        right: 20px;
    }

    #mws-gallery .gal-lb-nav svg {
        width: 22px;
        height: 22px;
        stroke: var(--white);
        stroke-width: 2.5;
        fill: none;
    }

    #mws-gallery .gal-lb-counter {
        position: absolute;
        bottom: 24px;
        left: 50%;
        transform: translateX(-50%);
        color: rgba(255, 255, 255, 0.7);
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        font-weight: 500;
        z-index: 3;
    }

    #mws-gallery .gal-lb-share {
        position: absolute;
        top: 20px;
        right: 80px;
        width: 44px;
        height: 44px;
        border: none;
        background: rgba(255, 255, 255, 0.12);
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background var(--transition);
        z-index: 3;
    }

    #mws-gallery .gal-lb-share:hover {
        background: rgba(255, 255, 255, 0.25);
    }

    #mws-gallery .gal-lb-share svg {
        width: 20px;
        height: 20px;
        fill: var(--white);
    }

    /* Toast notification */
    #mws-gallery .gal-toast {
        position: fixed;
        bottom: 32px;
        left: 50%;
        transform: translateX(-50%) translateY(80px);
        background: var(--navy);
        color: var(--white);
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        font-weight: 500;
        padding: 12px 24px;
        border-radius: 8px;
        z-index: 1000000;
        opacity: 0;
        transition: opacity 0.25s ease, transform 0.25s ease;
        pointer-events: none;
    }

    #mws-gallery .gal-toast.show {
        opacity: 1;
        transform: translateX(-50%) translateY(0);
    }
</style>

<div id="mws-gallery">

    <!-- Hero Banner -->
    <div class="gal-hero">
        <h1>Event Gallery</h1>
        <p>Relive the memories from our events, fundraisers, and community gatherings throughout the years.</p>
    </div>

    <!-- Year Filter Tabs -->
    <div class="gal-filters">
        <div class="gal-filter-row">
            <button class="gal-filter-btn <?php echo ($active_year === 0) ? 'active' : ''; ?>" data-year="all">All</button>
            <?php foreach ($years as $y) : ?>
                <button class="gal-filter-btn <?php echo ($active_year === $y) ? 'active' : ''; ?>" data-year="<?php echo esc_attr($y); ?>"><?php echo esc_html($y); ?></button>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Image Grid -->
    <div class="gal-grid-wrap">
        <div class="gal-grid">
            <?php foreach ($all_images as $index => $image) : ?>
                <div class="gal-item<?php echo ($index >= 12) ? ' hidden' : ''; ?>"
                     data-year="<?php echo esc_attr($image['year']); ?>"
                     data-index="<?php echo esc_attr($index); ?>"
                     data-url="<?php echo esc_url($image['url']); ?>"
                     data-alt="<?php echo esc_attr($image['alt']); ?>">
                    <img src="<?php echo esc_url($image['thumb']); ?>"
                         alt="<?php echo esc_attr($image['alt']); ?>"
                         loading="lazy"
                         width="600"
                         height="280">
                    <span class="gal-year-badge"><?php echo esc_html($image['year']); ?></span>
                    <button class="gal-share-btn" title="Share this photo" data-share-url="<?php echo esc_url($image['url']); ?>">
                        <svg viewBox="0 0 24 24"><path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11A2.99 2.99 0 0 0 18 8a3 3 0 1 0-3-3c0 .24.04.47.09.7L8.04 9.81A2.99 2.99 0 0 0 6 9a3 3 0 1 0 0 6c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65a2.92 2.92 0 0 0 2.92 2.92A2.92 2.92 0 0 0 21 18.92 2.92 2.92 0 0 0 18 16.08z"/></svg>
                    </button>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Empty state -->
        <div class="gal-empty">No photos found for this year.</div>

        <!-- Load More -->
        <div class="gal-load-more-wrap">
            <button class="gal-load-more <?php echo (count($all_images) <= 12) ? 'hidden' : ''; ?>">Load More Photos</button>
        </div>
    </div>

    <!-- Lightbox Overlay -->
    <div class="gal-lightbox" role="dialog" aria-modal="true" aria-label="Photo lightbox">
        <button class="gal-lb-close" title="Close (Esc)">
            <svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
        </button>
        <button class="gal-lb-nav gal-lb-prev" title="Previous photo">
            <svg viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
        </button>
        <img src="" alt="">
        <button class="gal-lb-nav gal-lb-next" title="Next photo">
            <svg viewBox="0 0 24 24"><polyline points="9 6 15 12 9 18"/></svg>
        </button>
        <button class="gal-lb-share" title="Share this photo">
            <svg viewBox="0 0 24 24"><path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11A2.99 2.99 0 0 0 18 8a3 3 0 1 0-3-3c0 .24.04.47.09.7L8.04 9.81A2.99 2.99 0 0 0 6 9a3 3 0 1 0 0 6c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65a2.92 2.92 0 0 0 2.92 2.92A2.92 2.92 0 0 0 21 18.92 2.92 2.92 0 0 0 18 16.08z"/></svg>
        </button>
        <div class="gal-lb-counter"></div>
    </div>

    <!-- Toast notification -->
    <div class="gal-toast"></div>

</div><!-- #mws-gallery -->

<script>
(function() {
    'use strict';

    var root       = document.getElementById('mws-gallery');
    if (!root) return;

    var grid       = root.querySelector('.gal-grid');
    var items      = Array.prototype.slice.call(grid.querySelectorAll('.gal-item'));
    var filterBtns = Array.prototype.slice.call(root.querySelectorAll('.gal-filter-btn'));
    var loadMore   = root.querySelector('.gal-load-more');
    var emptyMsg   = root.querySelector('.gal-empty');

    // Lightbox elements
    var lightbox   = root.querySelector('.gal-lightbox');
    var lbImg      = lightbox.querySelector('img');
    var lbClose    = lightbox.querySelector('.gal-lb-close');
    var lbPrev     = lightbox.querySelector('.gal-lb-prev');
    var lbNext     = lightbox.querySelector('.gal-lb-next');
    var lbShare    = lightbox.querySelector('.gal-lb-share');
    var lbCounter  = lightbox.querySelector('.gal-lb-counter');
    var toast      = root.querySelector('.gal-toast');

    var BATCH         = 12;
    var activeYear    = '<?php echo ($active_year === 0) ? 'all' : esc_js($active_year); ?>';
    var visibleCount  = 0;
    var currentLbIdx  = -1;
    var visibleItems  = [];
    var toastTimer    = null;

    /* ------------------------------------------
       UTILITY: Show toast message
       ------------------------------------------ */
    function showToast(msg) {
        toast.textContent = msg;
        toast.classList.add('show');
        clearTimeout(toastTimer);
        toastTimer = setTimeout(function() {
            toast.classList.remove('show');
        }, 2200);
    }

    /* ------------------------------------------
       SHARE (Web Share API or clipboard)
       ------------------------------------------ */
    function shareUrl(url, title) {
        if (navigator.share) {
            navigator.share({
                title: title || 'Event Gallery Photo',
                url: url
            }).catch(function() {});
        } else if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(url).then(function() {
                showToast('Link copied to clipboard');
            }).catch(function() {
                fallbackCopy(url);
            });
        } else {
            fallbackCopy(url);
        }
    }

    function fallbackCopy(text) {
        var ta = document.createElement('textarea');
        ta.value = text;
        ta.style.position = 'fixed';
        ta.style.opacity = '0';
        document.body.appendChild(ta);
        ta.select();
        try {
            document.execCommand('copy');
            showToast('Link copied to clipboard');
        } catch (e) {
            showToast('Could not copy link');
        }
        document.body.removeChild(ta);
    }

    /* ------------------------------------------
       FILTER BY YEAR
       ------------------------------------------ */
    function applyFilter(year) {
        activeYear = year;
        visibleCount = 0;

        // Update active button
        filterBtns.forEach(function(btn) {
            btn.classList.toggle('active', btn.getAttribute('data-year') === String(year));
        });

        // Filter items
        items.forEach(function(item) {
            var itemYear = item.getAttribute('data-year');
            var match = (year === 'all' || String(itemYear) === String(year));
            if (match) {
                visibleCount++;
                item.classList.toggle('hidden', visibleCount > BATCH);
            } else {
                item.classList.add('hidden');
            }
        });

        updateVisibleItems();
        updateLoadMore();
        updateEmpty();
    }

    function getFilteredItems() {
        return items.filter(function(item) {
            if (activeYear === 'all') return true;
            return item.getAttribute('data-year') === String(activeYear);
        });
    }

    function updateVisibleItems() {
        visibleItems = items.filter(function(item) {
            return !item.classList.contains('hidden');
        });
    }

    function updateLoadMore() {
        var filtered = getFilteredItems();
        var shownCount = filtered.filter(function(item) {
            return !item.classList.contains('hidden');
        }).length;
        if (shownCount >= filtered.length) {
            loadMore.classList.add('hidden');
        } else {
            loadMore.classList.remove('hidden');
        }
    }

    function updateEmpty() {
        var filtered = getFilteredItems();
        emptyMsg.classList.toggle('visible', filtered.length === 0);
    }

    /* ------------------------------------------
       LOAD MORE
       ------------------------------------------ */
    function handleLoadMore() {
        var filtered = getFilteredItems();
        var shown = 0;
        var revealed = 0;

        filtered.forEach(function(item) {
            if (!item.classList.contains('hidden')) {
                shown++;
            }
        });

        filtered.forEach(function(item) {
            if (item.classList.contains('hidden') && revealed < BATCH) {
                item.classList.remove('hidden');
                revealed++;
            }
        });

        visibleCount = shown + revealed;
        updateVisibleItems();
        updateLoadMore();
    }

    /* ------------------------------------------
       LIGHTBOX
       ------------------------------------------ */
    function openLightbox(idx) {
        updateVisibleItems();
        if (idx < 0 || idx >= visibleItems.length) return;

        currentLbIdx = idx;
        var item = visibleItems[currentLbIdx];
        var fullUrl = item.getAttribute('data-url');
        var altText = item.getAttribute('data-alt');

        lbImg.src = fullUrl;
        lbImg.alt = altText;
        lbCounter.textContent = (currentLbIdx + 1) + ' / ' + visibleItems.length;
        lightbox.classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        lightbox.classList.remove('open');
        lbImg.src = '';
        currentLbIdx = -1;
        document.body.style.overflow = '';
    }

    function navigateLightbox(dir) {
        if (visibleItems.length === 0) return;
        var next = currentLbIdx + dir;
        if (next < 0) next = visibleItems.length - 1;
        if (next >= visibleItems.length) next = 0;
        openLightbox(next);
    }

    /* ------------------------------------------
       EVENT LISTENERS
       ------------------------------------------ */

    // Filter buttons
    filterBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            applyFilter(btn.getAttribute('data-year'));
        });
    });

    // Load More
    loadMore.addEventListener('click', handleLoadMore);

    // Grid item clicks (open lightbox)
    grid.addEventListener('click', function(e) {
        // If click is on a share button, handle share instead
        var shareBtn = e.target.closest('.gal-share-btn');
        if (shareBtn) {
            e.stopPropagation();
            shareUrl(shareBtn.getAttribute('data-share-url'), 'Event Gallery Photo');
            return;
        }

        var item = e.target.closest('.gal-item');
        if (!item) return;

        updateVisibleItems();
        var idx = visibleItems.indexOf(item);
        if (idx !== -1) {
            openLightbox(idx);
        }
    });

    // Lightbox close
    lbClose.addEventListener('click', closeLightbox);

    // Lightbox navigation
    lbPrev.addEventListener('click', function(e) {
        e.stopPropagation();
        navigateLightbox(-1);
    });
    lbNext.addEventListener('click', function(e) {
        e.stopPropagation();
        navigateLightbox(1);
    });

    // Lightbox share
    lbShare.addEventListener('click', function(e) {
        e.stopPropagation();
        if (currentLbIdx >= 0 && currentLbIdx < visibleItems.length) {
            shareUrl(visibleItems[currentLbIdx].getAttribute('data-url'), 'Event Gallery Photo');
        }
    });

    // Click backdrop to close
    lightbox.addEventListener('click', function(e) {
        if (e.target === lightbox) {
            closeLightbox();
        }
    });

    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (!lightbox.classList.contains('open')) return;

        switch (e.key) {
            case 'Escape':
                closeLightbox();
                break;
            case 'ArrowLeft':
                navigateLightbox(-1);
                break;
            case 'ArrowRight':
                navigateLightbox(1);
                break;
        }
    });

    /* ------------------------------------------
       INITIALISE
       ------------------------------------------ */
    applyFilter(activeYear);

})();
</script>
