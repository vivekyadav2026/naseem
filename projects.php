<?php
$pageTitle = 'Our Projects Portfolio — Turnkey Architecture & Interior Works';
$pageDesc = 'Explore our delivered turnkey architectural villas, luxury apartments, modular kitchens, and commercial fitouts in Patna.';
require_once __DIR__ . '/includes/header.php';

$categoryFilter = $_GET['category'] ?? 'All';
$projects = $dm->getProjects($categoryFilter);
$designs = $dm->getDesigns();
?>

    <!-- PAGE HERO BANNER -->
    <header class="lux-hero lux-hero-sm">
        <img src="C:\Users\ranje\.gemini\antigravity\brain\01efbde6-c06f-437f-bf0e-0596396852ca\projects_hero_1790771589193.jpg" class="lux-hero-img" alt="Projects Hero">
        <div class="lux-hero-overlay"></div>
        <div class="lux-hero-content">
            <div class="lux-breadcrumb">
                <a href="index.php"><i data-lucide="home" style="width:13px;height:13px;"></i> Home</a> <span>/</span> <span>Projects Portfolio</span>
            </div>
            <h1 class="lux-hero-title">Our Works & Visual Journeys</h1>
            <p class="lux-hero-subtitle">
                Browse through our portfolio of luxury residential villas, contemporary apartments, commercial headquarters, and bespoke modular woodwork executed across Bihar.
            </p>
            <div class="lux-btn-group">
                <a href="contact.php" class="lux-btn lux-btn-primary">
                    <i data-lucide="phone" style="width:15px;height:15px;"></i> Contact Studio
                </a>
                <a href="<?= SITE_WHATSAPP_LINK ?>" target="_blank" rel="noopener noreferrer" class="lux-btn lux-btn-outline">
                    <i data-lucide="message-circle" style="width:15px;height:15px;"></i> WhatsApp Studio
                </a>
            </div>
        </div>
    </header>

    <!-- PORTFOLIO SECTION -->
    <section class="lux-category-section">
        <div class="container">
            
            <!-- CATEGORY FILTER TABS -->
            <div class="portfolio-filter-bar" style="margin-bottom: 40px; text-align: center;">
                <a href="projects.php?category=All" class="filter-tab <?= $categoryFilter === 'All' ? 'active' : '' ?>" style="margin: 0 10px; text-decoration: none; color: var(--lux-text);">All Projects</a>
                <a href="projects.php?category=Turnkey Projects" class="filter-tab <?= $categoryFilter === 'Turnkey Projects' ? 'active' : '' ?>" style="margin: 0 10px; text-decoration: none; color: var(--lux-text);">Turnkey Builds</a>
                <a href="projects.php?category=Interior Design" class="filter-tab <?= $categoryFilter === 'Interior Design' ? 'active' : '' ?>" style="margin: 0 10px; text-decoration: none; color: var(--lux-text);">Interior Design</a>
                <a href="projects.php?category=Exterior Design" class="filter-tab <?= $categoryFilter === 'Exterior Design' ? 'active' : '' ?>" style="margin: 0 10px; text-decoration: none; color: var(--lux-text);">Exterior Elevation</a>
                <a href="projects.php?category=Wooden Work" class="filter-tab <?= $categoryFilter === 'Wooden Work' ? 'active' : '' ?>" style="margin: 0 10px; text-decoration: none; color: var(--lux-text);">Wooden & Modular</a>
                <a href="projects.php?category=Construction" class="filter-tab <?= $categoryFilter === 'Construction' ? 'active' : '' ?>" style="margin: 0 10px; text-decoration: none; color: var(--lux-text);">Civil Construction</a>
            </div>

            <!-- PROJECTS GRID -->
            <?php if (empty($projects)): ?>
                <div style="text-align:center; padding:60px 20px; background:#fff; border-radius:12px; border:1px solid var(--border);">
                    <i data-lucide="folder" style="width:48px;height:48px;color:#94A3B8;margin-bottom:12px;"></i>
                    <h3 style="font-size:20px; color:var(--lux-dark);">No projects currently listed in this category</h3>
                    <p style="color:#64748B; margin-bottom:20px;">Upload new projects anytime using the Admin Portal.</p>
                    <a href="projects.php?category=All" class="lux-btn lux-btn-primary">View All Disciplines</a>
                </div>
            <?php else: ?>
                <div class="lux-cat-grid">
                    <?php foreach ($projects as $p): ?>
                        <a href="project-detail.php?id=<?= $p['id'] ?>" class="lux-cat-card">
                            <div class="lux-cat-img-wrap">
                                <img src="<?= htmlspecialchars($p['featured_image']) ?>" alt="<?= htmlspecialchars($p['title']) ?>">
                                <div style="position:absolute; top:12px; left:12px; background:rgba(9,13,20,0.85); backdrop-filter:blur(4px); color:var(--lux-gold); padding:5px 12px; border-radius:4px; font-size:11px; font-weight:600;">
                                    <?= htmlspecialchars($p['category']) ?>
                                </div>
                            </div>
                            <div class="lux-cat-title">
                                <?= htmlspecialchars($p['title']) ?>
                            </div>
                            <p style="font-size:13.5px; color:#64748B; line-height:1.6;">
                                <?= htmlspecialchars(substr($p['short_desc'], 0, 115)) ?>...
                            </p>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </div>
    </section>

    <!-- 3D DESIGNS GALLERY STRIP -->
    <?php if (!empty($designs)): ?>
        <section class="lux-gallery-section">
            <div class="container" style="text-align:center; margin-bottom: 40px;">
                <div class="lux-split-label">3D CAD Concepts & Showcase</div>
                <h2 class="lux-split-title">Latest 3D Renderings</h2>
            </div>

            <div class="lux-gallery-grid">
                <?php foreach ($designs as $index => $d): 
                    $class = 'wide';
                    if ($index % 3 == 0) $class = 'large';
                    elseif ($index % 3 == 1) $class = 'tall';
                ?>
                    <a href="#" class="lux-gallery-item <?= $class ?>">
                        <img src="<?= htmlspecialchars($d['image_url']) ?>" alt="<?= htmlspecialchars($d['title']) ?>">
                        <div class="lux-gallery-overlay">
                            <div>
                                <span style="font-size:11px; color:var(--lux-gold); font-weight:600; text-transform:uppercase;"><?= htmlspecialchars($d['category']) ?></span>
                                <h3><?= htmlspecialchars($d['title']) ?></h3>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>

    <!-- CTA SECTION -->
    <section class="lux-promo">
        <img src="C:\Users\ranje\.gemini\antigravity\brain\01efbde6-c06f-437f-bf0e-0596396852ca\projects_hero_1790771589193.jpg" class="lux-promo-img" alt="CTA">
        <div class="lux-promo-overlay"></div>
        <div class="lux-promo-content">
            <h2 class="lux-promo-title">Want a Bespoke Design For Your Floor Plan?</h2>
            <p style="margin-bottom:30px; font-size:18px;">Our chief architect will prepare a tailored 3D CAD visualization and itemized BOQ estimate.</p>
            <div class="lux-btn-group">
                <a href="contact.php" class="lux-btn lux-btn-primary">Book Free Site Consultation</a>
                <a href="<?= SITE_WHATSAPP_LINK ?>" target="_blank" rel="noopener noreferrer" class="lux-btn lux-btn-outline">
                    <i data-lucide="message-circle" style="width:16px;height:16px;"></i> WhatsApp Instant Chat
                </a>
            </div>
        </div>
    </section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
