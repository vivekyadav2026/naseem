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
                    <a href="<?= SITE_WHATSAPP_LINK ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline btn-sm nav-whatsapp-btn" title="Chat on WhatsApp">
                        <i data-lucide="message-circle" style="width:16px;height:16px; color:#25D366;"></i>
                        <span>WhatsApp</span>
                    </a>
                    <a href="contact.php" class="btn btn-gold btn-sm">
                        Contact Us <i data-lucide="arrow-right" style="width:14px;height:14px;"></i>
                    </a>
                    <button class="nav-toggle-btn" id="navToggleBtn" onclick="toggleMobileNav()" aria-label="Toggle Navigation Menu">
                        <i data-lucide="menu" id="navToggleIcon" style="width:24px;height:24px;"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- MOBILE NAV DRAWER -->
    <div class="mobile-nav-backdrop" id="mobileDrawerBackdrop" onclick="toggleMobileNav()"></div>
    <div class="mobile-nav-drawer" id="mobileDrawer">
        <div class="mobile-drawer-header">
            <div class="brand-logo">
                <div class="logo-symbol" style="width:34px;height:34px;font-size:16px;">M</div>
                <div class="brand-text">
                    <h2 style="font-size:15px; color:#FFFFFF;">MUSKAN</h2>
                    <span style="font-size:8.5px;">INTERIORS</span>
                </div>
            </div>
            <button class="mobile-drawer-close" onclick="toggleMobileNav()" aria-label="Close Menu">
                <i data-lucide="x" style="width:22px;height:22px;"></i>
            </button>
        </div>
        <div class="mobile-drawer-links">
            <a href="index.php" class="<?= $currentPage === 'index.php' ? 'active' : '' ?>"><i data-lucide="home" style="width:16px;height:16px;"></i> Home</a>
            <a href="about.php" class="<?= $currentPage === 'about.php' ? 'active' : '' ?>"><i data-lucide="compass" style="width:16px;height:16px;"></i> About Us</a>
            <a href="services.php" class="<?= $currentPage === 'services.php' ? 'active' : '' ?>"><i data-lucide="layers" style="width:16px;height:16px;"></i> All Services</a>
            <div class="mobile-sublinks">
                <a href="interior-design.php">Interior Design</a>
                <a href="exterior-design.php">Exterior Design</a>
                <a href="construction.php">Civil Construction</a>
                <a href="wooden-work.php">Wooden Work</a>
                <a href="turnkey-projects.php">Turnkey Projects</a>
            </div>
            <a href="projects.php" class="<?= in_array($currentPage, ['projects.php', 'project-detail.php']) ? 'active' : '' ?>"><i data-lucide="image" style="width:16px;height:16px;"></i> Projects Portfolio</a>
            <a href="process.php" class="<?= $currentPage === 'process.php' ? 'active' : '' ?>"><i data-lucide="git-commit" style="width:16px;height:16px;"></i> Our Process</a>
            <a href="contact.php" class="<?= $currentPage === 'contact.php' ? 'active' : '' ?>"><i data-lucide="mail" style="width:16px;height:16px;"></i> Contact Us</a>
        </div>
        <div class="mobile-drawer-ctas">
            <a href="<?= SITE_WHATSAPP_LINK ?>" target="_blank" rel="noopener noreferrer" class="btn-mobile-whatsapp">
                <i data-lucide="message-circle" style="width:18px;height:18px;"></i> Chat on WhatsApp
            </a>
            <a href="contact.php" class="btn-mobile-contact">
                <i data-lucide="phone-call" style="width:18px;height:18px;"></i> Contact Studio
            </a>
        </div>
    </div>
