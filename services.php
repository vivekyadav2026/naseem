<?php
$pageTitle = 'Services Overview — Muskan Interiors';
$pageDesc = 'Comprehensive interior design, exterior elevation, civil construction, wooden work and turnkey project services in Patna.';
require_once __DIR__ . '/includes/header.php';
?>

    <!-- PAGE HERO BANNER -->
    <header class="page-banner banner-services">
        <div class="container">
            <div class="page-banner-layout">
                <div>
                    <div class="breadcrumbs">
                        <a href="index.php"><i data-lucide="home" style="width:13px;height:13px;"></i> Home</a> <span>/</span> <span>Services Directory</span>
                    </div>
                    <div class="section-tag dark">End-to-End Capabilities</div>
                    <h1>Our Architectural & <span class="gold-gradient">Interior Disciplines.</span></h1>
                    <p>
                        From raw civil structure to photorealistic 3D visualization and bespoke modular woodwork, we provide complete, hassle-free solutions under one single roof.
                    </p>
                    <div class="banner-feature-pills">
                        <div class="banner-pill"><i data-lucide="layout"></i> 14 Interior Services</div>
                        <div class="banner-pill"><i data-lucide="building"></i> 11 Exterior Services</div>
                        <div class="banner-pill"><i data-lucide="hammer"></i> 13 Civil Services</div>
                        <div class="banner-pill"><i data-lucide="box"></i> 13 Woodwork Services</div>
                    </div>
                    <div class="banner-cta-group">
                        <a href="contact.php" class="btn btn-gold">
                            <i data-lucide="phone" style="width:15px;height:15px;"></i> Contact Studio
                        </a>
                        <a href="<?= SITE_WHATSAPP_LINK ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline" style="color:#25D366; border-color:rgba(37,211,102,0.5); background:rgba(37,211,102,0.08);">
                            <i data-lucide="message-circle" style="width:15px;height:15px;"></i> WhatsApp Chat
                        </a>
                    </div>
                </div>

                <div>
                    <div class="banner-stat-glass">
                        <div class="banner-stat-glass-title">
                            <i data-lucide="layers" style="width:14px;height:14px;"></i> Core Service Modules
                        </div>
                        <div class="banner-stat-grid">
                            <div class="banner-stat-item">
                                <div class="banner-stat-num">14</div>
                                <div class="banner-stat-label">Interior Disciplines</div>
                            </div>
                            <div class="banner-stat-item">
                                <div class="banner-stat-num">11</div>
                                <div class="banner-stat-label">Exterior Elevations</div>
                            </div>
                            <div class="banner-stat-item">
                                <div class="banner-stat-num">13</div>
                                <div class="banner-stat-label">Civil Services</div>
                            </div>
                            <div class="banner-stat-item">
                                <div class="banner-stat-num">13</div>
                                <div class="banner-stat-label">Modular Woodworks</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- SERVICES DIRECTORY WITH PHOTOGRAPHIC SHOWCASE -->
    <section class="section" style="background:var(--bg);">
        <div class="container">
            
            <div class="services-grid">
                
                <!-- 1. Interior Design -->
                <div class="service-card" style="display:flex; flex-direction:column; padding:0; overflow:hidden; border-radius:12px;">
                    <div style="height:220px; position:relative; overflow:hidden;">
                        <img src="images/muskan/interior_living.jpg" alt="Interior Design" style="width:100%; height:100%; object-fit:cover; transition:transform 0.4s ease;" onmouseenter="this.style.transform='scale(1.05)'" onmouseleave="this.style.transform='scale(1)'">
                        <div style="position:absolute; top:12px; left:12px; background:rgba(9,13,20,0.85); backdrop-filter:blur(6px); color:var(--gold); padding:4px 12px; border-radius:4px; font-size:11px; font-family:'IBM Plex Mono',monospace; font-weight:700; border:1px solid rgba(197,154,63,0.3);">
                            14 SUB-SERVICES
                        </div>
                    </div>
                    <div style="padding:28px; display:flex; flex-direction:column; flex:1;">
                        <div class="service-icon" style="margin-top:-48px; position:relative; z-index:2; box-shadow:0 8px 20px rgba(0,0,0,0.15);"><i data-lucide="layout"></i></div>
                        <h3 style="margin-top:12px;">01. Interior Design & Styling</h3>
                        <p style="flex:1; font-size:13.5px; color:var(--text-muted); line-height:1.6; margin-bottom:16px;">
                            Living rooms, multi-level false ceilings, 48V magnetic track lighting, acoustic panelling, wallpapers, Italian marble polish, and 4K 3D visualization.
                        </p>
                        <div style="border-top:1px solid var(--border); padding-top:16px; margin-top:auto;">
                            <a href="interior-design.php" class="service-link">
                                Explore All 14 Sub-Services <i data-lucide="arrow-right" style="width:14px;height:14px;"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 2. Exterior Design -->
                <div class="service-card" style="display:flex; flex-direction:column; padding:0; overflow:hidden; border-radius:12px;">
                    <div style="height:220px; position:relative; overflow:hidden;">
                        <img src="images/muskan/exterior_facade.jpg" alt="Exterior Design & Facade" style="width:100%; height:100%; object-fit:cover; transition:transform 0.4s ease;" onmouseenter="this.style.transform='scale(1.05)'" onmouseleave="this.style.transform='scale(1)'">
                        <div style="position:absolute; top:12px; left:12px; background:rgba(9,13,20,0.85); backdrop-filter:blur(6px); color:var(--gold); padding:4px 12px; border-radius:4px; font-size:11px; font-family:'IBM Plex Mono',monospace; font-weight:700; border:1px solid rgba(197,154,63,0.3);">
                            11 SUB-SERVICES
                        </div>
                    </div>
                    <div style="padding:28px; display:flex; flex-direction:column; flex:1;">
                        <div class="service-icon" style="margin-top:-48px; position:relative; z-index:2; box-shadow:0 8px 20px rgba(0,0,0,0.15);"><i data-lucide="building"></i></div>
                        <h3 style="margin-top:12px;">02. Exterior Design & Elevation</h3>
                        <p style="flex:1; font-size:13.5px; color:var(--text-muted); line-height:1.6; margin-bottom:16px;">
                            Modern 3D villa elevations, weather-proof HPL/WPC wooden louvers, natural travertine stone cladding, boundary gates, and exterior facade floodlighting.
                        </p>
                        <div style="border-top:1px solid var(--border); padding-top:16px; margin-top:auto;">
                            <a href="exterior-design.php" class="service-link">
                                Explore All 11 Sub-Services <i data-lucide="arrow-right" style="width:14px;height:14px;"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 3. Civil Construction -->
                <div class="service-card" style="display:flex; flex-direction:column; padding:0; overflow:hidden; border-radius:12px;">
                    <div style="height:220px; position:relative; overflow:hidden;">
                        <img src="images/muskan/construction_site.jpg" alt="Civil Construction" style="width:100%; height:100%; object-fit:cover; transition:transform 0.4s ease;" onmouseenter="this.style.transform='scale(1.05)'" onmouseleave="this.style.transform='scale(1)'">
                        <div style="position:absolute; top:12px; left:12px; background:rgba(9,13,20,0.85); backdrop-filter:blur(6px); color:var(--gold); padding:4px 12px; border-radius:4px; font-size:11px; font-family:'IBM Plex Mono',monospace; font-weight:700; border:1px solid rgba(197,154,63,0.3);">
                            13 SUB-SERVICES
                        </div>
                    </div>
                    <div style="padding:28px; display:flex; flex-direction:column; flex:1;">
                        <div class="service-icon" style="margin-top:-48px; position:relative; z-index:2; box-shadow:0 8px 20px rgba(0,0,0,0.15);"><i data-lucide="hammer"></i></div>
                        <h3 style="margin-top:12px;">03. Civil Construction & Build</h3>
                        <p style="flex:1; font-size:13.5px; color:var(--text-muted); line-height:1.6; margin-bottom:16px;">
                            RCC foundation casting, Fe550 steel framing, brick masonry, MEP electrical/plumbing conduits, waterproofing, and structural remodeling.
                        </p>
                        <div style="border-top:1px solid var(--border); padding-top:16px; margin-top:auto;">
                            <a href="construction.php" class="service-link">
                                Explore All 13 Sub-Services <i data-lucide="arrow-right" style="width:14px;height:14px;"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 4. Wooden Work -->
                <div class="service-card" style="display:flex; flex-direction:column; padding:0; overflow:hidden; border-radius:12px;">
                    <div style="height:220px; position:relative; overflow:hidden;">
                        <img src="images/muskan/wooden_wardrobe.jpg" alt="Wooden Work & Modular Joinery" style="width:100%; height:100%; object-fit:cover; transition:transform 0.4s ease;" onmouseenter="this.style.transform='scale(1.05)'" onmouseleave="this.style.transform='scale(1)'">
                        <div style="position:absolute; top:12px; left:12px; background:rgba(9,13,20,0.85); backdrop-filter:blur(6px); color:var(--gold); padding:4px 12px; border-radius:4px; font-size:11px; font-family:'IBM Plex Mono',monospace; font-weight:700; border:1px solid rgba(197,154,63,0.3);">
                            13 SUB-SERVICES
                        </div>
                    </div>
                    <div style="padding:28px; display:flex; flex-direction:column; flex:1;">
                        <div class="service-icon" style="margin-top:-48px; position:relative; z-index:2; box-shadow:0 8px 20px rgba(0,0,0,0.15);"><i data-lucide="box"></i></div>
                        <h3 style="margin-top:12px;">04. Wooden Work & Modular</h3>
                        <p style="flex:1; font-size:13.5px; color:var(--text-muted); line-height:1.6; margin-bottom:16px;">
                            Gurjan 710 waterproof BWP marine ply modular kitchens, smoked glass walk-in wardrobes, PU polish veneer TV consoles, vanity units, and customized furniture.
                        </p>
                        <div style="border-top:1px solid var(--border); padding-top:16px; margin-top:auto;">
                            <a href="wooden-work.php" class="service-link">
                                Explore All 13 Sub-Services <i data-lucide="arrow-right" style="width:14px;height:14px;"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 5. Turnkey Projects -->
                <div class="service-card" style="display:flex; flex-direction:column; padding:0; overflow:hidden; border-radius:12px; border-color:var(--gold); background:#FAF7F0;">
                    <div style="height:220px; position:relative; overflow:hidden;">
                        <img src="images/muskan/hero_villa.jpg" alt="Turnkey Complete Solutions" style="width:100%; height:100%; object-fit:cover; transition:transform 0.4s ease;" onmouseenter="this.style.transform='scale(1.05)'" onmouseleave="this.style.transform='scale(1)'">
                        <div style="position:absolute; top:12px; left:12px; background:#0F141C; color:var(--gold); padding:4px 12px; border-radius:4px; font-size:11px; font-family:'IBM Plex Mono',monospace; font-weight:700; border:1px solid var(--gold);">
                            ALL-IN-ONE SOLUTION
                        </div>
                    </div>
                    <div style="padding:28px; display:flex; flex-direction:column; flex:1;">
                        <div class="service-icon" style="margin-top:-48px; position:relative; z-index:2; background:#0F141C; color:var(--gold); box-shadow:0 8px 20px rgba(0,0,0,0.25); border:1px solid var(--gold);"><i data-lucide="key"></i></div>
                        <h3 style="margin-top:12px;">05. Turnkey Complete Solution</h3>
                        <p style="flex:1; font-size:13.5px; color:var(--text-muted); line-height:1.6; margin-bottom:16px;">
                            Single contract, dedicated on-site manager, guaranteed 45-60 day key handover, price-lock BOQ assurance, and zero coordination headaches.
                        </p>
                        <div style="border-top:1px solid rgba(197,154,63,0.3); padding-top:16px; margin-top:auto;">
                            <a href="turnkey-projects.php" class="service-link" style="color:var(--gold-dark); font-weight:700;">
                                Explore Turnkey Scope <i data-lucide="arrow-right" style="width:14px;height:14px;"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- VIDEO TOUR / YOUTUBE WALKTHROUGH SHOWCASE -->
    <section class="section" style="background:#0F141C; color:#fff; border-top:1px solid #1F293D;">
        <div class="container">
            <div class="section-header text-center" style="max-width:760px; margin:0 auto 40px;">
                <div class="section-tag gold"><i data-lucide="video" style="width:14px;height:14px;display:inline;"></i> Video Tour Showcase</div>
                <h2 class="section-title" style="color:#fff;">Watch Our Live Site Walkthroughs</h2>
                <p class="section-desc" style="color:#94A3B8;">Experience our finished spaces and live civil execution through full-length video walkthrough tours.</p>
            </div>

            <div style="max-width:960px; margin:0 auto; background:#171E28; border:1px solid #2A3649; border-radius:16px; padding:24px; box-shadow:0 20px 50px rgba(0,0,0,0.5);">
                <div style="position:relative; padding-bottom:56.25%; height:0; overflow:hidden; border-radius:10px; background:#000;">
                    <iframe 
                        src="https://www.youtube.com/embed/7WT1c7Q_tG8" 
                        title="Muskan Interiors Project Walkthrough" 
                        style="position:absolute; top:0; left:0; width:100%; height:100%; border:0;" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                        allowfullscreen>
                    </iframe>
                </div>
                <div style="margin-top:20px; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:16px;">
                    <div>
                        <h4 style="color:#fff; font-size:18px; margin-bottom:4px;">Imperial Glass Villa — Live Video Tour</h4>
                        <p style="color:#94A3B8; font-size:13px; margin:0;">Boring Road, Patna &bull; 3,600 sq ft Turnkey Build</p>
                    </div>
                    <a href="projects.php" class="btn btn-gold btn-sm">
                        View All Projects <i data-lucide="arrow-right" style="width:14px;height:14px;"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section style="padding:80px 0; background:#FAF9F5; text-align:center; border-top:1px solid var(--border);">
        <div class="container">
            <h2 class="section-title">Need a Tailored Architectural Solution?</h2>
            <p class="section-desc" style="margin-bottom:28px;">Book a free on-site consultation or calculate your instant turnkey quotation.</p>
            <div style="display:flex; justify-content:center; gap:16px; flex-wrap:wrap;">
                <a href="contact.php" class="btn btn-gold">Book Free Site Consultation</a>
                <a href="<?= SITE_WHATSAPP_LINK ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline" style="color:#25D366; border-color:#25D366; background:rgba(37,211,102,0.06);">
                    <i data-lucide="message-circle" style="width:16px;height:16px;"></i> WhatsApp Instant Chat
                </a>
            </div>
        </div>
    </section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
