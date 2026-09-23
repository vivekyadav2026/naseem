<?php
/**
 * Muskan Interiors - Global Configuration
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Site Details
define('SITE_NAME', 'Muskan Interiors');
define('SITE_TAGLINE', 'More Than Interiors. We Build Complete Spaces.');
define('SITE_PHONE_1', '+91 98765 43210');
define('SITE_PHONE_2', '+91 91234 56789');
define('SITE_WHATSAPP', '919876543210');
define('SITE_WHATSAPP_LINK', 'https://wa.me/919876543210?text=Hello%20Muskan%20Interiors%2C%20I%20would%20like%20to%20enquire%20about%20my%20interior%20%26%20construction%20project.');
define('SITE_EMAIL', 'contact@muskaninteriors.com');
define('SITE_ADDRESS', 'Exhibition Road, Near Gandhi Maidan, Patna, Bihar — 800001');

// Directory Paths
define('BASE_PATH', dirname(__DIR__));
define('UPLOADS_PATH', BASE_PATH . '/uploads');
define('PROJECTS_UPLOAD_PATH', UPLOADS_PATH . '/projects');
define('DESIGNS_UPLOAD_PATH', UPLOADS_PATH . '/designs');
define('DATA_PATH', BASE_PATH . '/data');

// Ensure directories exist
$directories = [
    UPLOADS_PATH,
    PROJECTS_UPLOAD_PATH,
    DESIGNS_UPLOAD_PATH,
    DATA_PATH
];

foreach ($directories as $dir) {
    if (!file_exists($dir)) {
        @mkdir($dir, 0777, true);
    }
}

// Helpers
function sanitize_input($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

function format_inr($number) {
    return '₹' . number_format((float)$number, 0, '.', ',');
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'min',
        's' => 'sec',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function getYoutubeEmbedUrl($url) {
    if (empty($url)) return '';
    $cleanUrl = trim($url);
    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/|youtube\.com/shorts/)([^"&?/ ]{11})%i', $cleanUrl, $match)) {
        return 'https://www.youtube.com/embed/' . $match[1];
    }
    return '';
}

