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
        <img fetchpriority="high" src="C:\Users\ranje\.gemini\antigravity\brain\01efbde6-c06f-437f-bf0e-0596396852ca\projects_hero_1790771589193.jpg" class="lux-hero-img" alt="Projects Hero">
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
            <div class="portfolio-filter-bar" style="margin-bottom: 50px; text-align: center; overflow-x: auto; white-space: nowrap; padding-bottom: 10px; -webkit-overflow-scrolling: touch;">
                <a href="projects.php?category=All" class="filter-tab <?= $categoryFilter === 'All' ? 'active' : '' ?>" style="display: inline-block; padding: 10px 20px; margin: 0 5px; text-decoration: none; color: <?= $categoryFilter === 'All' ? '#fff' : 'var(--lux-text)' ?>; background: <?= $categoryFilter === 'All' ? 'var(--lux-gold)' : 'transparent' ?>; border-radius: 30px; font-weight: 500; font-size: 15px; border: 1px solid <?= $categoryFilter === 'All' ? 'var(--lux-gold)' : '#eaeaea' ?>; transition: all 0.3s;">All</a>
                <a href="projects.php?category=Residential" class="filter-tab <?= $categoryFilter === 'Residential' ? 'active' : '' ?>" style="display: inline-block; padding: 10px 20px; margin: 0 5px; text-decoration: none; color: <?= $categoryFilter === 'Residential' ? '#fff' : 'var(--lux-text)' ?>; background: <?= $categoryFilter === 'Residential' ? 'var(--lux-gold)' : 'transparent' ?>; border-radius: 30px; font-weight: 500; font-size: 15px; border: 1px solid <?= $categoryFilter === 'Residential' ? 'var(--lux-gold)' : '#eaeaea' ?>; transition: all 0.3s;">Residential</a>
                <a href="projects.php?category=Commercial" class="filter-tab <?= $categoryFilter === 'Commercial' ? 'active' : '' ?>" style="display: inline-block; padding: 10px 20px; margin: 0 5px; text-decoration: none; color: <?= $categoryFilter === 'Commercial' ? '#fff' : 'var(--lux-text)' ?>; background: <?= $categoryFilter === 'Commercial' ? 'var(--lux-gold)' : 'transparent' ?>; border-radius: 30px; font-weight: 500; font-size: 15px; border: 1px solid <?= $categoryFilter === 'Commercial' ? 'var(--lux-gold)' : '#eaeaea' ?>; transition: all 0.3s;">Commercial</a>
                <a href="projects.php?category=Interior Design" class="filter-tab <?= $categoryFilter === 'Interior Design' ? 'active' : '' ?>" style="display: inline-block; padding: 10px 20px; margin: 0 5px; text-decoration: none; color: <?= $categoryFilter === 'Interior Design' ? '#fff' : 'var(--lux-text)' ?>; background: <?= $categoryFilter === 'Interior Design' ? 'var(--lux-gold)' : 'transparent' ?>; border-radius: 30px; font-weight: 500; font-size: 15px; border: 1px solid <?= $categoryFilter === 'Interior Design' ? 'var(--lux-gold)' : '#eaeaea' ?>; transition: all 0.3s;">Interior Design</a>
                <a href="projects.php?category=Turnkey" class="filter-tab <?= $categoryFilter === 'Turnkey' ? 'active' : '' ?>" style="display: inline-block; padding: 10px 20px; margin: 0 5px; text-decoration: none; color: <?= $categoryFilter === 'Turnkey' ? '#fff' : 'var(--lux-text)' ?>; background: <?= $categoryFilter === 'Turnkey' ? 'var(--lux-gold)' : 'transparent' ?>; border-radius: 30px; font-weight: 500; font-size: 15px; border: 1px solid <?= $categoryFilter === 'Turnkey' ? 'var(--lux-gold)' : '#eaeaea' ?>; transition: all 0.3s;">Turnkey</a>
                <a href="projects.php?category=Wooden %26 Modular" class="filter-tab <?= $categoryFilter === 'Wooden & Modular' ? 'active' : '' ?>" style="display: inline-block; padding: 10px 20px; margin: 0 5px; text-decoration: none; color: <?= $categoryFilter === 'Wooden & Modular' ? '#fff' : 'var(--lux-text)' ?>; background: <?= $categoryFilter === 'Wooden & Modular' ? 'var(--lux-gold)' : 'transparent' ?>; border-radius: 30px; font-weight: 500; font-size: 15px; border: 1px solid <?= $categoryFilter === 'Wooden & Modular' ? 'var(--lux-gold)' : '#eaeaea' ?>; transition: all 0.3s;">Wooden & Modular</a>
                <a href="projects.php?category=Civil Construction" class="filter-tab <?= $categoryFilter === 'Civil Construction' ? 'active' : '' ?>" style="display: inline-block; padding: 10px 20px; margin: 0 5px; text-decoration: none; color: <?= $categoryFilter === 'Civil Construction' ? '#fff' : 'var(--lux-text)' ?>; background: <?= $categoryFilter === 'Civil Construction' ? 'var(--lux-gold)' : 'transparent' ?>; border-radius: 30px; font-weight: 500; font-size: 15px; border: 1px solid <?= $categoryFilter === 'Civil Construction' ? 'var(--lux-gold)' : '#eaeaea' ?>; transition: all 0.3s;">Civil Construction</a>
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
                        <a href="project-detail.php?id=<?= $p['id'] ?>" class="lux-cat-card" style="position: relative; overflow: hidden; border-radius: 12px; background: #fff; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: transform 0.4s ease, box-shadow 0.4s ease;">
                            <div class="lux-cat-img-wrap" style="aspect-ratio: 4/3; margin-bottom: 0;">
                                <img loading="lazy" src="<?= htmlspecialchars($p['featured_image']) ?>" alt="<?= htmlspecialchars($p['title']) ?>" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s ease;">
                                <div style="position:absolute; top:20px; left:20px; background:rgba(255,255,255,0.9); color:#000; padding:6px 14px; border-radius:30px; font-size:12px; font-weight:600; text-transform:uppercase; letter-spacing:1px; z-index:2;">
                                    <?= htmlspecialchars($p['category']) ?>
                                </div>
                                <div style="position:absolute; inset:0; background: linear-gradient(to top, rgba(0,0,0,0.8), transparent); opacity: 0.6; z-index: 1;"></div>
                                
                                <div style="position:absolute; bottom:24px; left:24px; right:24px; z-index:2; color:#fff;">
                                    <h3 style="font-size: 24px; font-weight: 400; margin-bottom: 8px; font-family: var(--font-display);"><?= htmlspecialchars($p['title']) ?></h3>
                                    <span style="font-size: 14px; font-weight: 500; display: inline-flex; align-items: center; gap: 6px; color: var(--lux-gold);">
                                        View Project <i data-lucide="arrow-right" style="width:14px;height:14px;"></i>
                                    </span>
                                </div>
                            </div>
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
                        <img loading="lazy" src="<?= htmlspecialchars($d['image_url']) ?>" alt="<?= htmlspecialchars($d['title']) ?>">
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
        <img loading="lazy" src="C:\Users\ranje\.gemini\antigravity\brain\01efbde6-c06f-437f-bf0e-0596396852ca\projects_hero_1790771589193.jpg" class="lux-promo-img" alt="CTA">
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

