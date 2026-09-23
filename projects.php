<?php
$pageTitle = 'Our Projects Portfolio — Turnkey Architecture & Interior Works';
$pageDesc = 'Explore our delivered turnkey architectural villas, luxury apartments, modular kitchens, and commercial fitouts in Patna.';
require_once __DIR__ . '/includes/header.php';

$categoryFilter = $_GET['category'] ?? 'All';
$projects = $dm->getProjects($categoryFilter);
$designs = $dm->getDesigns();
?>

    <!-- PAGE HERO BANNER -->
    <header class="page-banner banner-projects">
        <div class="container">
            <div class="page-banner-layout">
                <div>
                    <div class="breadcrumbs">
                        <a href="index.php"><i data-lucide="home" style="width:13px;height:13px;"></i> Home</a> <span>/</span> <span>Projects Portfolio</span>
                    </div>
                    <div class="section-tag dark">Delivered Excellence & Case Studies</div>
                    <h1>Our Works & <span class="gold-gradient">Visual Journeys.</span></h1>
                    <p>
                        Browse through our portfolio of luxury residential villas, contemporary apartments, commercial headquarters, and bespoke modular woodwork executed across Bihar.
                    </p>
                    <div class="banner-feature-pills">
                        <div class="banner-pill"><i data-lucide="layers"></i> 4-Stage Visual Transformations</div>
                        <div class="banner-pill"><i data-lucide="check-circle"></i> 100+ Completed Spaces</div>
                        <div class="banner-pill"><i data-lucide="map-pin"></i> Patna & Bihar Locations</div>
                    </div>
                    <div class="banner-cta-group">
                        <a href="contact.php" class="btn btn-gold">
                            <i data-lucide="phone" style="width:15px;height:15px;"></i> Contact Studio
                        </a>
                        <a href="<?= SITE_WHATSAPP_LINK ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline" style="color:#25D366; border-color:rgba(37,211,102,0.5); background:rgba(37,211,102,0.08);">
                            <i data-lucide="message-circle" style="width:15px;height:15px;"></i> WhatsApp Studio
                        </a>
                    </div>
                </div>

                <div>
                    <div class="banner-stat-glass">
                        <div class="banner-stat-glass-title">
                            <i data-lucide="folder-kanban" style="width:14px;height:14px;"></i> Portfolio Metrics
                        </div>
                        <div class="banner-stat-grid">
                            <div class="banner-stat-item">
                                <div class="banner-stat-num"><?= $stats['total_projects'] ?><span>+</span></div>
                                <div class="banner-stat-label">Published Projects</div>
                            </div>
                            <div class="banner-stat-item">
                                <div class="banner-stat-num">100<span>%</span></div>
                                <div class="banner-stat-label">On-Time Delivery</div>
                            </div>
                            <div class="banner-stat-item">
                                <div class="banner-stat-num">4-Stage</div>
                                <div class="banner-stat-label">Photo Audits</div>
                            </div>
                            <div class="banner-stat-item">
                                <div class="banner-stat-num">50<span>+</span></div>
                                <div class="banner-stat-label">Happy Clients</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- PORTFOLIO SECTION -->
    <section class="section" style="background:var(--bg);">
        <div class="container">
            
            <!-- CATEGORY FILTER TABS -->
            <div class="portfolio-filter-bar">
                <a href="projects.php?category=All" class="filter-tab <?= $categoryFilter === 'All' ? 'active' : '' ?>">All Projects (<?= $stats['total_projects'] ?>)</a>
                <a href="projects.php?category=Turnkey Projects" class="filter-tab <?= $categoryFilter === 'Turnkey Projects' ? 'active' : '' ?>">Turnkey Builds</a>
                <a href="projects.php?category=Interior Design" class="filter-tab <?= $categoryFilter === 'Interior Design' ? 'active' : '' ?>">Interior Design</a>
                <a href="projects.php?category=Exterior Design" class="filter-tab <?= $categoryFilter === 'Exterior Design' ? 'active' : '' ?>">Exterior Elevation</a>
                <a href="projects.php?category=Wooden Work" class="filter-tab <?= $categoryFilter === 'Wooden Work' ? 'active' : '' ?>">Wooden & Modular</a>
                <a href="projects.php?category=Construction" class="filter-tab <?= $categoryFilter === 'Construction' ? 'active' : '' ?>">Civil Construction</a>
            </div>

            <!-- PROJECTS GRID -->
            <?php if (empty($projects)): ?>
                <div style="text-align:center; padding:60px 20px; background:#fff; border-radius:12px; border:1px solid var(--border);">
                    <i data-lucide="folder" style="width:48px;height:48px;color:#94A3B8;margin-bottom:12px;"></i>
                    <h3 style="font-size:20px; color:#0F141C;">No projects currently listed in this category</h3>
                    <p style="color:#64748B; margin-bottom:20px;">Upload new projects anytime using the Admin Portal.</p>
                    <a href="projects.php?category=All" class="btn btn-gold btn-sm">View All Disciplines</a>
                </div>
            <?php else: ?>
                <div class="projects-grid">
                    <?php foreach ($projects as $p): ?>
                        <div class="project-card" style="background:#fff; border:1px solid var(--border); border-radius:12px; overflow:hidden; display:flex; flex-direction:column; transition:var(--transition);" onmouseenter="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.08)'" onmouseleave="this.style.transform='none'; this.style.boxShadow='none'">
                            <div style="height:240px; position:relative; overflow:hidden;">
                                <img src="<?= htmlspecialchars($p['featured_image']) ?>" alt="<?= htmlspecialchars($p['title']) ?>" style="width:100%; height:100%; object-fit:cover;">
                                <div style="position:absolute; top:12px; left:12px; background:rgba(9,13,20,0.85); backdrop-filter:blur(4px); color:var(--gold); padding:5px 12px; border-radius:4px; font-size:11px; font-family:'IBM Plex Mono',monospace; font-weight:600; border:1px solid rgba(197,154,63,0.3);">
                                    <?= htmlspecialchars($p['category']) ?>
                                </div>
                            </div>
                            <div style="padding:24px; flex:1; display:flex; flex-direction:column;">
                                <h3 style="font-size:19px; font-weight:700; margin-bottom:8px; line-height:1.3; color:#0F141C;"><?= htmlspecialchars($p['title']) ?></h3>
                                <p style="font-size:13.5px; color:#64748B; line-height:1.6; margin-bottom:20px; flex:1;">
                                    <?= htmlspecialchars(substr($p['short_desc'], 0, 115)) ?>...
                                </p>

                                <div style="display:flex; justify-content:space-between; align-items:center; border-top:1px solid var(--border); padding-top:16px;">
                                    <div>
                                        <div style="font-size:11px; color:#94A3B8; text-transform:uppercase; font-family:'IBM Plex Mono',monospace;">Budget / Area</div>
                                        <div style="font-size:14px; font-weight:700; color:var(--gold); font-family:'IBM Plex Mono',monospace;"><?= htmlspecialchars($p['budget']) ?> &bull; <?= htmlspecialchars($p['area']) ?></div>
                                    </div>
                                    <a href="project-detail.php?id=<?= $p['id'] ?>" class="btn btn-gold btn-sm" style="padding:9px 16px;">
                                        View 4 Stages <i data-lucide="arrow-right" style="width:14px;height:14px;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </div>
    </section>

    <!-- 3D DESIGNS GALLERY STRIP -->
    <?php if (!empty($designs)): ?>
        <section class="section" style="background:#0F141C; color:#fff; border-top:1px solid #1F293D;">
            <div class="container">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:32px; flex-wrap:wrap; gap:16px;">
                    <div>
                        <div class="section-tag gold">3D CAD Concepts & Showcase</div>
                        <h2 class="section-title" style="color:#fff;">Latest 3D Renderings & Concepts</h2>
                    </div>
                    <a href="contact.php" class="btn btn-gold btn-sm">Request Custom 3D Design</a>
                </div>

                <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:20px;">
                    <?php foreach ($designs as $d): ?>
                        <div style="background:#171E28; border:1px solid #2A3649; border-radius:10px; overflow:hidden;">
                            <div style="height:180px; position:relative; overflow:hidden;">
                                <img src="<?= htmlspecialchars($d['image_url']) ?>" alt="<?= htmlspecialchars($d['title']) ?>" style="width:100%; height:100%; object-fit:cover;">
                            </div>
                            <div style="padding:16px;">
                                <span style="font-family:'IBM Plex Mono',monospace; font-size:11px; color:var(--gold); font-weight:600; text-transform:uppercase;"><?= htmlspecialchars($d['category']) ?></span>
                                <h4 style="font-size:15px; font-weight:700; color:#fff; margin:4px 0 6px;"><?= htmlspecialchars($d['title']) ?></h4>
                                <p style="font-size:12px; color:#94A3B8;"><?= htmlspecialchars(substr($d['description'], 0, 75)) ?>...</p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- CTA SECTION -->
    <section style="padding:80px 0; background:#FAF9F5; text-align:center; border-top:1px solid var(--border);">
        <div class="container">
            <h2 class="section-title">Want a Bespoke Design For Your Floor Plan?</h2>
            <p class="section-desc" style="margin-bottom:28px;">Our chief architect will prepare a tailored 3D CAD visualization and itemized BOQ estimate.</p>
            <div style="display:flex; justify-content:center; gap:16px; flex-wrap:wrap;">
                <a href="contact.php" class="btn btn-gold">Book Free Site Consultation</a>
                <a href="<?= SITE_WHATSAPP_LINK ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline" style="color:#25D366; border-color:#25D366; background:rgba(37,211,102,0.06);">
                    <i data-lucide="message-circle" style="width:16px;height:16px;"></i> WhatsApp Instant Chat
                </a>
            </div>
        </div>
    </section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
