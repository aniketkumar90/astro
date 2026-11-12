<?php
/**
 * helpers.php — URL helper for local vs production
 * On XAMPP local: base path is /astro
 * On Railway/production: base path is /
 */

// Auto-detect environment
if (!defined('BASE_URL')) {
    $isLocal = ($_SERVER['HTTP_HOST'] ?? '') === 'localhost'
            || str_starts_with($_SERVER['HTTP_HOST'] ?? '', '127.')
            || str_starts_with($_SERVER['HTTP_HOST'] ?? '', '192.168.');

    define('BASE_URL', $isLocal ? '/astro' : '');
}

/**
 * url($path) — returns correct absolute URL
 * Usage: url('/pages/contact.php') → '/astro/pages/contact.php' (local)
 *                                  → '/pages/contact.php'        (production)
 */
function url(string $path): string {
    return BASE_URL . '/' . ltrim($path, '/');
}

/**
 * asset($path) — returns correct asset URL
 * Usage: asset('assets/logo.png') → '/astro/assets/logo.png' (local)
 */
function asset(string $path): string {
    return BASE_URL . '/' . ltrim($path, '/');
}
?>
