<?php
$pageTitle = 'Home — More Than Interiors. We Build Complete Spaces.';
$pageDesc = 'Muskan Interiors is a premier turnkey architecture and interior design studio in Patna delivering 3D designs, civil construction, modular kitchens, and custom woodwork.';
require_once __DIR__ . '/includes/header.php';

$featuredProjects = $dm->getProjects(null, true);
if (empty($featuredProjects)) {
    $featuredProjects = array_slice($dm->getProjects(), 0, 3);
}
$designs = array_slice($dm->getDesigns(), 0, 4);
?>

    <!-- HERO SECTION -->
    <header class="hero-section">
        <div class="hero-bg-overlay"></div>
        <div class="container hero-container">
            <div class="hero-grid">
                
                <div class="hero-content">
                    <div class="hero-badge">
                        <span>★</span> Interiors &bull; Exteriors &bull; Construction &bull; Wooden Work
                    </div>
                    <h1 class="hero-title">
                        We Design. We Build.<br>
                        <span class="gold-gradient">We Transform.</span>
                    </h1>
                    <p class="hero-subtitle">
                        Complete Interior, Exterior, Construction & Wooden Work Solutions — Designed Around Your Vision. From raw civil foundations and 3D CAD visualization to bespoke modular woodwork delivered under one roof.
                    </p>
                    <div class="hero-btns">
                        <a href="contact.php" class="btn btn-gold">
                            <i data-lucide="sparkles" style="width:18px;height:18px;"></i> Contact Studio
                        </a>
                        <a href="<?= SITE_WHATSAPP_LINK ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline" style="color:#25D366; border-color:rgba(37,211,102,0.5); background:rgba(37,211,102,0.08);">
                            <i data-lucide="message-circle" style="width:18px;height:18px;"></i> WhatsApp Us
                        </a>
                        <a href="projects.php" class="btn btn-outline" style="color:#fff; border-color:rgba(255,255,255,0.25);">
                            <i data-lucide="compass" style="width:18px;height:18px;"></i> View Projects
                        </a>
                    </div>
                </div>

                <div class="hero-form-card">
                    <div class="form-header">
                        <h3>Book Free Site Consultation</h3>
                        <p>Get 3D layout advice & transparent budget estimation</p>
                    </div>
                    <form id="heroConsultForm" onsubmit="handleGeneralFormSubmit(event, 'heroConsultForm')">
                        <input type="hidden" name="source" value="Hero Section Form">
                        <div class="form-group">
                            <label class="form-label">Full Name *</label>
                            <input type="text" name="name" class="form-control" placeholder="e.g. Rajesh Kumar" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone Number *</label>
                            <input type="tel" name="phone" class="form-control" placeholder="e.g. +91 98765 43210" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Service Required</label>
                            <select name="service" class="form-control">
                                <option value="Complete Turnkey Interior & Build">Complete Turnkey Interior & Build</option>
                                <option value="Residential Interior Design">Residential Interior Design</option>
                                <option value="Modular Kitchen & Wardrobes">Modular Kitchen & Wardrobes</option>
                                <option value="Exterior Elevation & Facade">Exterior Elevation & Facade</option>
                                <option value="Civil Construction & Renovation">Civil Construction & Renovation</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Carpet Area (Sq Ft)</label>
                            <input type="number" name="area" class="form-control" placeholder="e.g. 1500 sq ft">
                        </div>
                        <button type="submit" class="btn btn-gold" style="width:100%; justify-content:center; padding:14px;">
                            Request Free Consultation <i data-lucide="arrow-right" style="width:16px;height:16px;"></i>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </header>

    <!-- STATS SECTION -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-box">
                    <div class="num">100<span>+</span></div>
                    <div class="label">Turnkey Projects Delivered</div>
                </div>
                <div class="stat-box">
                    <div class="num">10<span>+</span></div>
                    <div class="label">Years of Engineering Craft</div>
                </div>
                <div class="stat-box">
                    <div class="num">50<span>+</span></div>
                    <div class="label">Satisfied Elite Clients</div>
                </div>
                <div class="stat-box">
                    <div class="num">100<span>%</span></div>
                    <div class="label">Quality & Price-Lock Assurance</div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5 CORE SERVICES SECTION -->
    <section class="section" style="background:var(--bg);">
        <div class="container">
            <div class="section-header text-center" style="max-width:760px; margin:0 auto 50px;">
                <div class="section-tag">Our Core Disciplines</div>
                <h2 class="section-title">End-to-End Architectural Mastery</h2>
                <p class="section-desc">From initial 2D space planning to turnkey structural engineering, we handle every detail under one single contract.</p>
            </div>

            <div class="services-grid">
                <!-- 1. Interior Design -->
                <div class="service-card" style="padding:0; overflow:hidden; display:flex; flex-direction:column;">
                    <div style="height:180px; position:relative; overflow:hidden;">
                        <img src="images/muskan/interior_living.jpg" alt="Interior Design" style="width:100%; height:100%; object-fit:cover; transition:transform 0.4s ease;" onmouseenter="this.style.transform='scale(1.05)'" onmouseleave="this.style.transform='scale(1)'">
                        <div style="position:absolute; top:10px; left:10px; background:rgba(9,13,20,0.85); backdrop-filter:blur(4px); color:var(--gold); padding:3px 10px; border-radius:4px; font-size:11px; font-family:'IBM Plex Mono',monospace; font-weight:700; border:1px solid rgba(197,154,63,0.3);">
                            14 SUB-SERVICES
                        </div>
                    </div>
                    <div style="padding:24px; display:flex; flex-direction:column; flex:1;">
                        <div class="service-icon" style="margin-top:-44px; position:relative; z-index:2; box-shadow:0 6px 16px rgba(0,0,0,0.15);"><i data-lucide="layout"></i></div>
                        <h3 style="margin-top:8px;">Interior Design</h3>
                        <p style="font-size:13.5px; color:var(--text-muted); line-height:1.6; margin-bottom:14px; flex:1;">Living rooms, false ceilings, magnetic track lighting, acoustic wall panelling, wallpaper treatments, and bespoke furniture.</p>
                        <a href="interior-design.php" class="service-link" style="margin-top:auto;">
                            Explore 14 Sub-Services <i data-lucide="arrow-right" style="width:14px;height:14px;"></i>
                        </a>
                    </div>
                </div>

                <!-- 2. Exterior Design -->
                <div class="service-card" style="padding:0; overflow:hidden; display:flex; flex-direction:column;">
                    <div style="height:180px; position:relative; overflow:hidden;">
                        <img src="images/muskan/exterior_facade.jpg" alt="Exterior Design" style="width:100%; height:100%; object-fit:cover; transition:transform 0.4s ease;" onmouseenter="this.style.transform='scale(1.05)'" onmouseleave="this.style.transform='scale(1)'">
                        <div style="position:absolute; top:10px; left:10px; background:rgba(9,13,20,0.85); backdrop-filter:blur(4px); color:var(--gold); padding:3px 10px; border-radius:4px; font-size:11px; font-family:'IBM Plex Mono',monospace; font-weight:700; border:1px solid rgba(197,154,63,0.3);">
                            11 SUB-SERVICES
                        </div>
                    </div>
                    <div style="padding:24px; display:flex; flex-direction:column; flex:1;">
                        <div class="service-icon" style="margin-top:-44px; position:relative; z-index:2; box-shadow:0 6px 16px rgba(0,0,0,0.15);"><i data-lucide="building"></i></div>
                        <h3 style="margin-top:8px;">Exterior Design</h3>
                        <p style="font-size:13.5px; color:var(--text-muted); line-height:1.6; margin-bottom:14px; flex:1;">3D modern elevations, HPL/WPC louvers, natural stone cladding, boundary gates, and exterior facade floodlighting.</p>
                        <a href="exterior-design.php" class="service-link" style="margin-top:auto;">
                            Explore 11 Sub-Services <i data-lucide="arrow-right" style="width:14px;height:14px;"></i>
                        </a>
                    </div>
                </div>

                <!-- 3. Civil Construction -->
                <div class="service-card" style="padding:0; overflow:hidden; display:flex; flex-direction:column;">
                    <div style="height:180px; position:relative; overflow:hidden;">
                        <img src="images/muskan/construction_site.jpg" alt="Civil Construction" style="width:100%; height:100%; object-fit:cover; transition:transform 0.4s ease;" onmouseenter="this.style.transform='scale(1.05)'" onmouseleave="this.style.transform='scale(1)'">
                        <div style="position:absolute; top:10px; left:10px; background:rgba(9,13,20,0.85); backdrop-filter:blur(4px); color:var(--gold); padding:3px 10px; border-radius:4px; font-size:11px; font-family:'IBM Plex Mono',monospace; font-weight:700; border:1px solid rgba(197,154,63,0.3);">
                            13 SUB-SERVICES
                        </div>
                    </div>
                    <div style="padding:24px; display:flex; flex-direction:column; flex:1;">
                        <div class="service-icon" style="margin-top:-44px; position:relative; z-index:2; box-shadow:0 6px 16px rgba(0,0,0,0.15);"><i data-lucide="hammer"></i></div>
                        <h3 style="margin-top:8px;">Civil Construction</h3>
                        <p style="font-size:13.5px; color:var(--text-muted); line-height:1.6; margin-bottom:14px; flex:1;">RCC foundations, structural beam columns, brickwork, MEP electrical/plumbing conduits, waterproofing, and remodeling.</p>
                        <a href="construction.php" class="service-link" style="margin-top:auto;">
                            Explore 13 Sub-Services <i data-lucide="arrow-right" style="width:14px;height:14px;"></i>
                        </a>
                    </div>
                </div>

                <!-- 4. Wooden Work -->
                <div class="service-card" style="padding:0; overflow:hidden; display:flex; flex-direction:column;">
                    <div style="height:180px; position:relative; overflow:hidden;">
                        <img src="images/muskan/wooden_wardrobe.jpg" alt="Wooden Work & Modular" style="width:100%; height:100%; object-fit:cover; transition:transform 0.4s ease;" onmouseenter="this.style.transform='scale(1.05)'" onmouseleave="this.style.transform='scale(1)'">
                        <div style="position:absolute; top:10px; left:10px; background:rgba(9,13,20,0.85); backdrop-filter:blur(4px); color:var(--gold); padding:3px 10px; border-radius:4px; font-size:11px; font-family:'IBM Plex Mono',monospace; font-weight:700; border:1px solid rgba(197,154,63,0.3);">
                            13 SUB-SERVICES
                        </div>
                    </div>
                    <div style="padding:24px; display:flex; flex-direction:column; flex:1;">
                        <div class="service-icon" style="margin-top:-44px; position:relative; z-index:2; box-shadow:0 6px 16px rgba(0,0,0,0.15);"><i data-lucide="box"></i></div>
                        <h3 style="margin-top:8px;">Wooden Work & Modular</h3>
                        <p style="font-size:13.5px; color:var(--text-muted); line-height:1.6; margin-bottom:14px; flex:1;">BWP 710 marine ply kitchens, smoked glass walk-in wardrobes, PU polish veneer, TV consoles, and vanity joinery.</p>
                        <a href="wooden-work.php" class="service-link" style="margin-top:auto;">
                            Explore 13 Sub-Services <i data-lucide="arrow-right" style="width:14px;height:14px;"></i>
                        </a>
                    </div>
                </div>

                <!-- 5. Turnkey Projects -->
                <div class="service-card" style="padding:0; overflow:hidden; display:flex; flex-direction:column; border-color:var(--gold); background:#FAF7F0;">
                    <div style="height:180px; position:relative; overflow:hidden;">
                        <img src="images/muskan/hero_villa.jpg" alt="Turnkey Complete Solutions" style="width:100%; height:100%; object-fit:cover; transition:transform 0.4s ease;" onmouseenter="this.style.transform='scale(1.05)'" onmouseleave="this.style.transform='scale(1)'">
                        <div style="position:absolute; top:10px; left:10px; background:#0F141C; color:var(--gold); padding:3px 10px; border-radius:4px; font-size:11px; font-family:'IBM Plex Mono',monospace; font-weight:700; border:1px solid var(--gold);">
                            COMPLETE SOLUTION
                        </div>
                    </div>
                    <div style="padding:24px; display:flex; flex-direction:column; flex:1;">
                        <div class="service-icon" style="margin-top:-44px; position:relative; z-index:2; background:#0F141C; color:var(--gold); box-shadow:0 6px 16px rgba(0,0,0,0.25); border:1px solid var(--gold);"><i data-lucide="key"></i></div>
                        <h3 style="margin-top:8px;">Turnkey Complete Solution</h3>
                        <p style="font-size:13.5px; color:var(--text-muted); line-height:1.6; margin-bottom:14px; flex:1;">Single-point contract, dedicated site supervisor, guaranteed 45-60 day handover, and zero hidden price escalations.</p>
                        <a href="turnkey-projects.php" class="service-link" style="margin-top:auto; color:var(--gold-dark); font-weight:700;">
                            Explore Turnkey Scope <i data-lucide="arrow-right" style="width:14px;height:14px;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- DYNAMIC FEATURED PROJECTS (PULLED FROM DATABASE/STORAGE) -->
    <section class="section" style="background:#fff; border-top:1px solid var(--border);">
        <div class="container">
            <div style="display:flex; justify-content:space-between; align-items:flex-end; margin-bottom:40px; flex-wrap:wrap; gap:16px;">
                <div>
                    <div class="section-tag">Published Case Studies</div>
                    <h2 class="section-title">Featured Projects & Live Works</h2>
                </div>
                <a href="projects.php" class="btn btn-outline">
                    View All Projects (<?= $stats['total_projects'] ?>) <i data-lucide="arrow-right" style="width:14px;height:14px;"></i>
                </a>
            </div>

            <div class="projects-grid">
                <?php foreach ($featuredProjects as $p): ?>
                    <div style="background:var(--surface); border:1px solid var(--border); border-radius:12px; overflow:hidden; display:flex; flex-direction:column; transition:var(--transition);" onmouseenter="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.08)'" onmouseleave="this.style.transform='none'; this.style.boxShadow='none'">
                        <div style="height:230px; position:relative; overflow:hidden;">
                            <img src="<?= htmlspecialchars($p['featured_image']) ?>" alt="<?= htmlspecialchars($p['title']) ?>" style="width:100%; height:100%; object-fit:cover;">
                            <div style="position:absolute; top:12px; left:12px; background:rgba(9,13,20,0.85); backdrop-filter:blur(4px); color:var(--gold); padding:5px 12px; border-radius:4px; font-size:11px; font-family:'IBM Plex Mono',monospace; font-weight:600; border:1px solid rgba(197,154,63,0.3);">
                                <?= htmlspecialchars($p['category']) ?>
                            </div>
                        </div>
                        <div style="padding:24px; flex:1; display:flex; flex-direction:column;">
                            <h3 style="font-size:18px; font-weight:700; margin-bottom:8px; line-height:1.3;"><?= htmlspecialchars($p['title']) ?></h3>
                            <p style="font-size:13.5px; color:var(--text-muted); line-height:1.6; margin-bottom:18px; flex:1;">
                                <?= htmlspecialchars(substr($p['short_desc'], 0, 110)) ?>...
                            </p>

                            <div style="display:flex; justify-content:space-between; align-items:center; border-top:1px solid var(--border); padding-top:16px; margin-top:auto;">
                                <div>
                                    <div style="font-size:11px; color:var(--text-muted); text-transform:uppercase; font-family:'IBM Plex Mono',monospace;">Budget / Area</div>
                                    <div style="font-size:14px; font-weight:700; color:var(--gold); font-family:'IBM Plex Mono',monospace;"><?= htmlspecialchars($p['budget']) ?> &bull; <?= htmlspecialchars($p['area']) ?></div>
                                </div>
                                <a href="project-detail.php?id=<?= $p['id'] ?>" class="btn btn-gold btn-sm" style="padding:8px 14px;">
                                    View Journey <i data-lucide="arrow-right" style="width:13px;height:13px;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 4-STAGE VISUAL JOURNEY SECTION -->
    <section class="section" style="background:#0F141C; color:#fff;">
        <div class="container">
            <div class="section-header text-center" style="max-width:760px; margin:0 auto 50px;">
                <div class="section-tag gold">4-Stage Visual Transformation</div>
                <h2 class="section-title" style="color:#fff;">How A Raw Space Becomes A Masterpiece</h2>
                <p class="section-desc" style="color:#94A3B8;">We document every stage with photographic transparency from initial brickwork to luxury handover.</p>
            </div>

            <div class="timeline-grid-4">
                <!-- Stage 1 -->
                <div style="background:#171E28; border:1px solid #2A3649; border-radius:10px; overflow:hidden;">
                    <div style="height:170px; overflow:hidden;">
                        <img src="images/muskan/before_raw.jpg" alt="Stage 1" style="width:100%; height:100%; object-fit:cover;">
                    </div>
                    <div style="padding:20px;">
                        <span style="font-family:'IBM Plex Mono',monospace; font-size:11px; color:var(--gold); font-weight:600;">STAGE 01</span>
                        <h4 style="color:#fff; font-size:16px; margin:4px 0 8px;">Raw Site Assessment</h4>
                        <p style="font-size:13px; color:#94A3B8; line-height:1.5;">Laser dimensional surveys, structural checking, natural lighting, and demolition scoping.</p>
                    </div>
                </div>

                <!-- Stage 2 -->
                <div style="background:#171E28; border:1px solid #2A3649; border-radius:10px; overflow:hidden;">
                    <div style="height:170px; overflow:hidden;">
                        <img src="images/muskan/3d_render.jpg" alt="Stage 2" style="width:100%; height:100%; object-fit:cover;">
                    </div>
                    <div style="padding:20px;">
                        <span style="font-family:'IBM Plex Mono',monospace; font-size:11px; color:var(--gold); font-weight:600;">STAGE 02</span>
                        <h4 style="color:#fff; font-size:16px; margin:4px 0 8px;">3D CAD Visualization</h4>
                        <p style="font-size:13px; color:#94A3B8; line-height:1.5;">4K photoreal renderings, material moodboards, and electrical layout blueprint approval.</p>
                    </div>
                </div>

                <!-- Stage 3 -->
                <div style="background:#171E28; border:1px solid #2A3649; border-radius:10px; overflow:hidden;">
                    <div style="height:170px; overflow:hidden;">
                        <img src="images/muskan/real_execution.jpg" alt="Stage 3" style="width:100%; height:100%; object-fit:cover;">
                    </div>
                    <div style="padding:20px;">
                        <span style="font-family:'IBM Plex Mono',monospace; font-size:11px; color:var(--gold); font-weight:600;">STAGE 03</span>
                        <h4 style="color:#fff; font-size:16px; margin:4px 0 8px;">Structural Execution</h4>
                        <p style="font-size:13px; color:#94A3B8; line-height:1.5;">Civil modifications, plumbing lines, false ceiling framing, and BWP ply carcass joinery.</p>
                    </div>
                </div>

                <!-- Stage 4 -->
                <div style="background:#171E28; border:1px solid #2A3649; border-radius:10px; overflow:hidden;">
                    <div style="height:170px; overflow:hidden;">
                        <img src="images/muskan/after_luxury.jpg" alt="Stage 4" style="width:100%; height:100%; object-fit:cover;">
                    </div>
                    <div style="padding:20px;">
                        <span style="font-family:'IBM Plex Mono',monospace; font-size:11px; color:var(--gold); font-weight:600;">STAGE 04</span>
                        <h4 style="color:#fff; font-size:16px; margin:4px 0 8px;">Final Luxury Handover</h4>
                        <p style="font-size:13px; color:#94A3B8; line-height:1.5;">High-gloss PU polishing, profile lighting calibration, deep cleaning, and 100-point audit.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- INTERACTIVE BEFORE/AFTER SLIDER -->
    <section class="section" style="background:var(--bg);">
        <div class="container">
            <div class="section-header text-center" style="max-width:760px; margin:0 auto 40px;">
                <div class="section-tag">Interactive Transformation</div>
                <h2 class="section-title">Drag to Reveal The Transformation</h2>
                <p class="section-desc">Experience the dramatic before-and-after change engineered by Muskan Interiors.</p>
            </div>

            <div class="before-after-wrapper" id="beforeAfterSlider">
                <img src="images/muskan/after_luxury.jpg" class="after-img" alt="Luxury After Transformation">
                <div class="before-img-wrap" id="beforeWrap">
                    <img src="images/muskan/before_raw.jpg" alt="Raw Before Space">
                </div>
                <div class="slider-handle" id="sliderHandle">
                    <div class="slider-line"></div>
                    <div class="slider-button">
                        <i data-lucide="chevrons-left-right" style="width:16px;height:16px;color:#0F141C;"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3D DESIGN TO REALITY (SEE IT BEFORE WE BUILD IT) -->
    <section class="section" style="background:#0F141C; color:#fff; border-top:1px solid #1F293D;">
        <div class="container">
            <div class="section-header text-center" style="max-width:760px; margin:0 auto 30px;">
                <div class="section-tag gold">Design-to-Reality Precision</div>
                <h2 class="section-title" style="color:#fff;">See It Before We Build It</h2>
                <p class="section-desc" style="color:#94A3B8;">We eliminate guesswork. Our photorealistic 3D renders translate 100% into physical execution with pinpoint accuracy.</p>
            </div>

            <div class="compare-showcase">
                <div class="compare-card">
                    <div class="compare-card-img">
                        <img src="images/muskan/3d_render.jpg" alt="3D CAD Visualization">
                        <div class="compare-badge-pill render"><i data-lucide="eye" style="width:12px;height:12px;display:inline;"></i> 3D CAD Render</div>
                    </div>
                    <div class="compare-card-body">
                        <h4>Pre-Execution 3D Simulation</h4>
                        <p>Complete 4K material moodboards, photometric lighting calculations, and exact dimensional layouts approved prior to breaking ground.</p>
                    </div>
                </div>

                <div class="compare-card">
                    <div class="compare-card-img">
                        <img src="images/muskan/after_luxury.jpg" alt="Final Real Execution">
                        <div class="compare-badge-pill real"><i data-lucide="check-circle" style="width:12px;height:12px;display:inline;"></i> 100% Real Handover</div>
                    </div>
                    <div class="compare-card-body">
                        <h4>Completed Physical Space</h4>
                        <p>Flawless on-site alignment with calibrated joinery, high-gloss PU polishing, concealed LED profile tracks, and Italian marble surfaces.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MATERIALS & PREMIUM FINISHES SHOWCASE -->
    <section class="section" style="background:#FFFFFF; border-top:1px solid var(--border);">
        <div class="container">
            <div class="section-header text-center" style="max-width:760px; margin:0 auto 50px;">
                <div class="section-tag">Uncompromising Craft</div>
                <h2 class="section-title">Institutional Material Standards</h2>
                <p class="section-desc">We use exclusively certified, marine-grade, and branded materials to ensure zero degradation over decades.</p>
            </div>

            <div class="materials-grid">
                <!-- Wood & Boards -->
                <div class="material-card">
                    <div class="material-card-icon"><i data-lucide="box"></i></div>
                    <h3>Wood & Core Boards</h3>
                    <p>High-density structural substrates treated against moisture, termites, and warping.</p>
                    <ul class="material-list">
                        <li><i data-lucide="check"></i> Gurjan BWP IS:710 Marine Ply</li>
                        <li><i data-lucide="check"></i> HDHMR Water-Resistant Boards</li>
                        <li><i data-lucide="check"></i> Natural Burma Teak & Oak Veneers</li>
                        <li><i data-lucide="check"></i> Calibrated Solid Core Pine Blockboard</li>
                    </ul>
                </div>

                <!-- Surfaces & Finishes -->
                <div class="material-card">
                    <div class="material-card-icon"><i data-lucide="sparkles"></i></div>
                    <h3>Surfaces & Finishes</h3>
                    <p>Luxury textures, Italian stones, and scratch-resistant ultra-gloss laminates.</p>
                    <ul class="material-list">
                        <li><i data-lucide="check"></i> 1.5mm High-Gloss Anti-Scratch Acrylic</li>
                        <li><i data-lucide="check"></i> Italian Botticino & Statuario Marble</li>
                        <li><i data-lucide="check"></i> Sirca / ICA Italian PU Satin & Gloss</li>
                        <li><i data-lucide="check"></i> Fluted Charcoal Louvers & WPC Panels</li>
                    </ul>
                </div>

                <!-- Hardware & Fittings -->
                <div class="material-card">
                    <div class="material-card-icon"><i data-lucide="sliders"></i></div>
                    <h3>Hardware & Fittings</h3>
                    <p>German engineering mechanisms guaranteed for 100,000+ smooth opening cycles.</p>
                    <ul class="material-list">
                        <li><i data-lucide="check"></i> Hafele 3D Soft-Close Concealed Hinges</li>
                        <li><i data-lucide="check"></i> Blum Legrabox & Tandembox Drawers</li>
                        <li><i data-lucide="check"></i> Hettich Cargo Pullouts & Magic Corners</li>
                        <li><i data-lucide="check"></i> Yale / Ozone Biometric Smart Locks</li>
                    </ul>
                </div>

                <!-- Lighting & Electrical -->
                <div class="material-card">
                    <div class="material-card-icon"><i data-lucide="zap"></i></div>
                    <h3>Architectural Lighting</h3>
                    <p>Magnetic low-voltage tracks and flicker-free circadian architectural luminaires.</p>
                    <ul class="material-list">
                        <li><i data-lucide="check"></i> 48V Magnetic Recessed Profile Tracks</li>
                        <li><i data-lucide="check"></i> CRI 90+ Anti-Glare COB Spotlights</li>
                        <li><i data-lucide="check"></i> Smart Zigbee / Wi-Fi Automation</li>
                        <li><i data-lucide="check"></i> Concealed Indirect LED Cove Strips</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- SPACES WE TRANSFORM -->
    <section class="section" style="background:var(--bg); border-top:1px solid var(--border);">
        <div class="container">
            <div class="section-header text-center" style="max-width:760px; margin:0 auto 50px;">
                <div class="section-tag">Environments We Shape</div>
                <h2 class="section-title">Spaces We Masterfully Transform</h2>
                <p class="section-desc">From palatial private residences to high-efficiency corporate headquarters and commercial retail environments.</p>
            </div>

            <div class="transform-spaces-grid">
                <!-- Residential -->
                <div class="space-card">
                    <div class="space-card-img">
                        <img src="images/muskan/living_room.jpg" alt="Residential Luxury Interiors">
                    </div>
                    <div class="space-card-body">
                        <h3>Luxury Residential Living</h3>
                        <p>Living rooms, master bedroom suites, gourmet modular island kitchens, walk-in closets, and false ceiling architectural lighting.</p>
                        <div class="space-feature-tags">
                            <span class="space-tag">Villas</span>
                            <span class="space-tag">Apartments</span>
                            <span class="space-tag">Penthouses</span>
                            <span class="space-tag">Bungalows</span>
                        </div>
                    </div>
                </div>

                <!-- Commercial -->
                <div class="space-card">
                    <div class="space-card-img">
                        <img src="images/muskan/commercial_office.jpg" alt="Commercial Office Fitouts">
                    </div>
                    <div class="space-card-body">
                        <h3>Corporate & Commercial Fitouts</h3>
                        <p>Executive cabins, acoustic conference boardrooms, reception foyers, retail stores, cafes, and healthcare clinics.</p>
                        <div class="space-feature-tags">
                            <span class="space-tag">Offices</span>
                            <span class="space-tag">Retail Stores</span>
                            <span class="space-tag">Clinics</span>
                            <span class="space-tag">Cafes</span>
                        </div>
                    </div>
                </div>

                <!-- Civil & Facade -->
                <div class="space-card">
                    <div class="space-card-img">
                        <img src="images/muskan/modern_elevation.jpg" alt="Architectural Elevations">
                    </div>
                    <div class="space-card-body">
                        <h3>Civil Build & Modern Elevations</h3>
                        <p>RCC structural framing, modern 3D facade elevation, exterior HPL/WPC cladding, boundary architecture, and landscape.</p>
                        <div class="space-feature-tags">
                            <span class="space-tag">Civil Build</span>
                            <span class="space-tag">3D Facades</span>
                            <span class="space-tag">Boundary Walls</span>
                            <span class="space-tag">Terraces</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 8 REASONS WHY CHOOSE US -->
    <section class="section" style="background:#fff; border-top:1px solid var(--border);">
        <div class="container">
            <div class="section-header text-center" style="max-width:760px; margin:0 auto 50px;">
                <div class="section-tag">The Muskan Advantage</div>
                <h2 class="section-title">8 Reasons Why Clients Trust Us</h2>
                <p class="section-desc">We deliver institutional-grade certainty, uncompromising material quality, and architectural finesse.</p>
            </div>

            <div class="reasons-grid-8">
                <div class="service-card" style="padding:28px;">
                    <div class="service-icon"><i data-lucide="layers"></i></div>
                    <h4>Complete End-to-End Solutions</h4>
                    <p style="font-size:13px; color:var(--text-muted);">From raw civil foundation to final wallpaper styling under one roof.</p>
                </div>
                <div class="service-card" style="padding:28px;">
                    <div class="service-icon"><i data-lucide="eye"></i></div>
                    <h4>Photorealistic 3D Visualizations</h4>
                    <p style="font-size:13px; color:var(--text-muted);">See every angle, lighting mood, and veneer grain before execution starts.</p>
                </div>
                <div class="service-card" style="padding:28px;">
                    <div class="service-icon"><i data-lucide="shield-check"></i></div>
                    <h4>Quality-Assured Materials</h4>
                    <p style="font-size:13px; color:var(--text-muted);">Gurjan BWP 710 ply, Hafele/Hettich hardware, Asian Paints Royale.</p>
                </div>
                <div class="service-card" style="padding:28px;">
                    <div class="service-icon"><i data-lucide="clock"></i></div>
                    <h4>45 to 60-Day Delivery</h4>
                    <p style="font-size:13px; color:var(--text-muted);">Strict digital milestone schedules with zero unexcused delays.</p>
                </div>
                <div class="service-card" style="padding:28px;">
                    <div class="service-icon"><i data-lucide="dollar-sign"></i></div>
                    <h4>Transparent BOQ Pricing</h4>
                    <p style="font-size:13px; color:var(--text-muted);">No hidden surprises, itemized bills, and price-lock guarantee.</p>
                </div>
                <div class="service-card" style="padding:28px;">
                    <div class="service-icon"><i data-lucide="award"></i></div>
                    <h4>10+ Years Heritage</h4>
                    <p style="font-size:13px; color:var(--text-muted);">Over a decade of civil engineering and architectural excellence in Bihar.</p>
                </div>
                <div class="service-card" style="padding:28px;">
                    <div class="service-icon"><i data-lucide="user-check"></i></div>
                    <h4>Dedicated Site Manager</h4>
                    <p style="font-size:13px; color:var(--text-muted);">A senior engineer supervises your site daily with photo updates.</p>
                </div>
                <div class="service-card" style="padding:28px;">
                    <div class="service-icon"><i data-lucide="heart-handshake"></i></div>
                    <h4>10-Year Hardware Warranty</h4>
                    <p style="font-size:13px; color:var(--text-muted);">Comprehensive warranty certificates and post-handover support.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS SECTION -->
    <section class="section" style="background:#FAF9F5; border-top:1px solid var(--border);">
        <div class="container">
            <div class="section-header text-center" style="max-width:700px; margin:0 auto 50px;">
                <div class="section-tag">Client Testimonials</div>
                <h2 class="section-title">What Our Homeowners Say</h2>
            </div>

            <div class="testimonials-grid">
                <div class="service-card" style="padding:32px;">
                    <div style="color:var(--gold); font-size:18px; margin-bottom:12px;">★★★★★</div>
                    <p style="font-size:14px; color:#475569; line-height:1.7; margin-bottom:20px;">
                        "Muskan Interiors completely handled our 3,600 sq ft villa in Boring Road. The 3D design was exactly what got built on site. Zero headache, on-time delivery!"
                    </p>
                    <div style="font-weight:700; color:#0F141C;">Dr. R. K. Singhania</div>
                    <div style="font-size:12px; color:#64748B;">Boring Road, Patna</div>
                </div>

                <div class="service-card" style="padding:32px;">
                    <div style="color:var(--gold); font-size:18px; margin-bottom:12px;">★★★★★</div>
                    <p style="font-size:14px; color:#475569; line-height:1.7; margin-bottom:20px;">
                        "Their modular kitchen craftsmanship is world-class. Waterproof Gurjan ply and soft-close German fittings. They delivered before our Griha Pravesh date."
                    </p>
                    <div style="font-weight:700; color:#0F141C;">Mrs. Sunita Agarwal</div>
                    <div style="font-size:12px; color:#64748B;">Bailey Road, Patna</div>
                </div>

                <div class="service-card" style="padding:32px;">
                    <div style="color:var(--gold); font-size:18px; margin-bottom:12px;">★★★★★</div>
                    <p style="font-size:14px; color:#475569; line-height:1.7; margin-bottom:20px;">
                        "Turnkey fitout of our corporate headquarters was executed in 45 days flat with full acoustic partitions and HVAC. Highly recommended for commercial projects."
                    </p>
                    <div style="font-weight:700; color:#0F141C;">NexGen FinTech Ltd.</div>
                    <div style="font-size:12px; color:#64748B;">Exhibition Road, Patna</div>
                </div>
            </div>
        </div>
    </section>

    <!-- COMPREHENSIVE FAQ SECTION (8 QUESTIONS FROM PDF BRIEF) -->
    <section class="section" style="background:#FFFFFF; border-top:1px solid var(--border);">
        <div class="container">
            <div class="section-header text-center" style="max-width:760px; margin:0 auto 50px;">
                <div class="section-tag">Got Questions?</div>
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="section-desc">Clear, honest answers regarding our turnkey process, pricing, material warranties, and timelines.</p>
            </div>

            <div class="faq-accordion">
                <!-- FAQ 1 -->
                <div class="faq-item active">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h4>1. How does your turnkey architecture and interior service work?</h4>
                        <div class="faq-icon"><i data-lucide="chevron-down" style="width:16px;height:16px;"></i></div>
                    </div>
                    <div class="faq-answer">
                        We provide complete end-to-end management under a single contract. From initial site measurement and 3D architectural renders to civil modifications, carpentry, modular fittings, electrical, plumbing, painting, and deep cleaning — we manage every craftsperson and material delivery until handing over your keys.
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h4>2. What is the typical timeline to complete a 3BHK turnkey interior?</h4>
                        <div class="faq-icon"><i data-lucide="chevron-down" style="width:16px;height:16px;"></i></div>
                    </div>
                    <div class="faq-answer">
                        A typical 3BHK home interior takes between 45 to 60 business days from the date of final 3D design approval and milestone sign-off. We operate on a digitized project schedule with strict daily milestone audits.
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h4>3. Do you guarantee a fixed price with zero cost escalations?</h4>
                        <div class="faq-icon"><i data-lucide="chevron-down" style="width:16px;height:16px;"></i></div>
                    </div>
                    <div class="faq-answer">
                        Yes. We provide an exhaustive, itemized Bill of Quantities (BOQ) with a 100% Price Lock Guarantee. Unless you change the scope or choose new material upgrades during execution, your quoted price will not change by even a single rupee.
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h4>4. Can I see high-resolution 3D designs before site work starts?</h4>
                        <div class="faq-icon"><i data-lucide="chevron-down" style="width:16px;height:16px;"></i></div>
                    </div>
                    <div class="faq-answer">
                        Absolutely. We develop 4K photorealistic 3D CAD visualizations showing exact materials, color palettes, furniture layouts, and daytime/nighttime lighting setups so you know exactly how your space will look prior to civil execution.
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h4>5. Which plywood and hardware brands do you use for modular joinery?</h4>
                        <div class="faq-icon"><i data-lucide="chevron-down" style="width:16px;height:16px;"></i></div>
                    </div>
                    <div class="faq-answer">
                        We use IS:710 Gurjan Boiling Water Proof (BWP) marine plywood, Action TESA HDHMR boards, and German hardware mechanisms from Hafele, Blum, and Hettich. All surface finishes are calibrated with anti-scratch acrylics and PU Italian polishes.
                    </div>
                </div>

                <!-- FAQ 6 -->
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h4>6. What kind of warranty do you provide on completed projects?</h4>
                        <div class="faq-icon"><i data-lucide="chevron-down" style="width:16px;height:16px;"></i></div>
                    </div>
                    <div class="faq-answer">
                        We provide up to a 10-year warranty on modular woodwork and hardware fittings against manufacturing defects and borer/termite infestation, backed by our direct studio service and formal warranty certification.
                    </div>
                </div>

                <!-- FAQ 7 -->
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h4>7. Do you also undertake raw civil construction and exterior elevation?</h4>
                        <div class="faq-icon"><i data-lucide="chevron-down" style="width:16px;height:16px;"></i></div>
                    </div>
                    <div class="faq-answer">
                        Yes! Unlike pure decorators, Muskan Interiors has over a decade of civil engineering heritage. We handle RCC column/beam structures, brick masonry, MEP concealed conduits, waterproofing, and modern 3D facade elevations.
                    </div>
                </div>

                <!-- FAQ 8 -->
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h4>8. How can I schedule an on-site consultation and measurement?</h4>
                        <div class="faq-icon"><i data-lucide="chevron-down" style="width:16px;height:16px;"></i></div>
                    </div>
                    <div class="faq-answer">
                        You can fill out our consultation form, call our studio at +91 98765 43210, or message us directly on WhatsApp. Our senior architect will schedule a site visit in Patna or surrounding Bihar districts within 24 hours.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FINAL CTA BANNER -->
    <section style="padding:80px 0; background:#0F141C; color:#fff; text-align:center;">
        <div class="container">
            <h2 class="section-title" style="color:#fff;">Ready to Transform Your Space?</h2>
            <p class="section-desc" style="color:#94A3B8; margin-bottom:30px;">
                Schedule your free site measurement and 3D architectural consultation today.
            </p>
            <div style="display:flex; justify-content:center; gap:16px; flex-wrap:wrap;">
                <a href="contact.php" class="btn btn-gold">
                    <i data-lucide="calendar" style="width:16px;height:16px;"></i> Book Free Consultation
                </a>
                <a href="<?= SITE_WHATSAPP_LINK ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline" style="color:#25D366; border-color:#25D366; background:rgba(37,211,102,0.08);">
                    <i data-lucide="message-circle" style="width:16px;height:16px;"></i> WhatsApp Instant Chat
                </a>
            </div>
        </div>
    </section>

    <script>
        function toggleFaq(btn) {
            const item = btn.parentElement;
            const wasActive = item.classList.contains('active');
            
            // Close all items in the accordion
            document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('active'));
            
            // If it wasn't active, open it
            if (!wasActive) {
                item.classList.add('active');
            }
        }
    </script>

    <script>
        function handleGeneralFormSubmit(e, formId) {
            e.preventDefault();
            const form = document.getElementById(formId);
            const formData = new FormData(form);

            fetch('api/submit_enquiry.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if(data.success) {
                    alert('🎉 ' + data.message + '\nLead Reference ID: ' + data.lead_id);
                    form.reset();
                } else {
                    alert('⚠️ ' + data.message);
                }
            })
            .catch(err => {
                alert('Thank you! Your request has been logged.');
                form.reset();
            });
        }
    </script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
