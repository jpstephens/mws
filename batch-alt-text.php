<?php
/**
 * Batch update alt text for gallery images by year.
 * Run via: wp eval-file batch-alt-text.php
 */
global $wpdb;

$years = [2022, 2023, 2024, 2025];
$total = 0;

foreach ($years as $year) {
    // Find images in this year's uploads folder that have no alt text
    $ids = $wpdb->get_col($wpdb->prepare(
        "SELECT p.ID FROM {$wpdb->posts} p
         LEFT JOIN {$wpdb->postmeta} pm ON p.ID = pm.post_id AND pm.meta_key = '_wp_attachment_image_alt'
         WHERE p.post_type = 'attachment'
         AND p.post_mime_type LIKE 'image/%%'
         AND p.guid LIKE %s
         AND (pm.meta_value IS NULL OR pm.meta_value = '')",
        '%/uploads/' . $year . '/%'
    ));

    $alt = "Photo from the {$year} Michael Williams Memorial Golf Outing";
    $count = 0;
    foreach ($ids as $id) {
        update_post_meta($id, '_wp_attachment_image_alt', $alt);
        $count++;
    }
    $total += $count;
    WP_CLI::log("{$year}: updated {$count} images");
}

// Also handle any remaining images without alt text (other upload years)
$remaining = $wpdb->get_col(
    "SELECT p.ID FROM {$wpdb->posts} p
     LEFT JOIN {$wpdb->postmeta} pm ON p.ID = pm.post_id AND pm.meta_key = '_wp_attachment_image_alt'
     WHERE p.post_type = 'attachment'
     AND p.post_mime_type LIKE 'image/%'
     AND (pm.meta_value IS NULL OR pm.meta_value = '')"
);

$count = 0;
foreach ($remaining as $id) {
    $filename = basename(get_attached_file($id));
    $alt = 'Michael Williams Memorial Scholarship';
    // Try to guess context from filename
    if (stripos($filename, 'golf') !== false || stripos($filename, 'compressed') !== false) {
        $alt = 'Photo from the Michael Williams Memorial Golf Outing';
    } elseif (stripos($filename, 'team') !== false) {
        $alt = 'Michael Williams Memorial Scholarship team member';
    }
    update_post_meta($id, '_wp_attachment_image_alt', $alt);
    $count++;
}
$total += $count;
WP_CLI::log("Other: updated {$count} images");
WP_CLI::success("Total: {$total} images updated with alt text");
