<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/db.php';

$dm = DataManager::getInstance();
$stats = $dm->getAdminStats();
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? htmlspecialchars($pageTitle) . ' — Muskan Interiors' : 'Muskan Interiors | More Than Interiors. We Build Complete Spaces.' ?></title>
    <meta name="description" content="<?= isset($pageDesc) ? htmlspecialchars($pageDesc) : 'Complete interior design, exterior elevation, civil construction, and bespoke wooden joinery in Patna.' ?>">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800;900&family=IBM+Plex+Mono:wght@400;500;600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="css/style.css">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar" id="navbar">
        <div class="container">
            <div class="nav-wrap">
                <a href="index.php" class="brand-logo">
                    <div class="logo-symbol">M</div>
                    <div class="brand-text">
                        <h2>MUSKAN</h2>
                        <span>INTERIORS & BUILD</span>
                    </div>
                </a>

                <ul class="nav-links">
                    <li><a href="index.php" class="nav-link <?= $currentPage === 'index.php' ? 'active' : '' ?>">Home</a></li>
                    <li><a href="about.php" class="nav-link <?= $currentPage === 'about.php' ? 'active' : '' ?>">About Us</a></li>
                    <li class="nav-dropdown-wrap">
                        <a href="services.php" class="nav-link <?= in_array($currentPage, ['services.php', 'interior-design.php', 'exterior-design.php', 'construction.php', 'wooden-work.php', 'turnkey-projects.php']) ? 'active' : '' ?>">
                            Services <i data-lucide="chevron-down" style="width:14px;height:14px;"></i>
                        </a>
                        <div class="nav-dropdown">
                            <a href="interior-design.php"><i data-lucide="layout" style="width:14px;height:14px;"></i> Interior Design</a>
                            <a href="exterior-design.php"><i data-lucide="building" style="width:14px;height:14px;"></i> Exterior Design</a>
                            <a href="construction.php"><i data-lucide="hammer" style="width:14px;height:14px;"></i> Civil Construction</a>
                            <a href="wooden-work.php"><i data-lucide="box" style="width:14px;height:14px;"></i> Wooden Work</a>
                            <a href="turnkey-projects.php"><i data-lucide="key" style="width:14px;height:14px;"></i> Turnkey Projects</a>
                        </div>
                    </li>
                    <li><a href="projects.php" class="nav-link <?= in_array($currentPage, ['projects.php', 'project-detail.php']) ? 'active' : '' ?>">Projects</a></li>
                    <li><a href="process.php" class="nav-link <?= $currentPage === 'process.php' ? 'active' : '' ?>">Process</a></li>
                    <li><a href="contact.php" class="nav-link <?= $currentPage === 'contact.php' ? 'active' : '' ?>">Contact</a></li>
                </ul>

                <div class="nav-actions">
                    <a href="quote.php" class="btn btn-gold btn-sm">
                        Get a Quote <i data-lucide="arrow-right" style="width:14px;height:14px;"></i>
                    </a>
                    <button class="nav-toggle-btn" onclick="toggleMobileNav()">
                        <i data-lucide="menu" style="width:24px;height:24px;"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- MOBILE NAV DRAWER -->
    <div class="mobile-nav-drawer" id="mobileDrawer">
        <a href="index.php" class="<?= $currentPage === 'index.php' ? 'active' : '' ?>">Home</a>
        <a href="about.php" class="<?= $currentPage === 'about.php' ? 'active' : '' ?>">About Us</a>
        <a href="services.php">All Services Overview</a>
        <a href="interior-design.php">→ Interior Design</a>
        <a href="exterior-design.php">→ Exterior Design</a>
        <a href="construction.php">→ Construction</a>
        <a href="wooden-work.php">→ Wooden Work</a>
        <a href="turnkey-projects.php">→ Turnkey Projects</a>
        <a href="projects.php" class="<?= $currentPage === 'projects.php' ? 'active' : '' ?>">Projects Portfolio</a>
        <a href="process.php" class="<?= $currentPage === 'process.php' ? 'active' : '' ?>">Our 5-Step Process</a>
        <a href="contact.php" class="<?= $currentPage === 'contact.php' ? 'active' : '' ?>">Contact Us</a>
        <a href="quote.php" style="background:var(--gold); color:#0F141C;">Get Instant Quote</a>
    </div>
