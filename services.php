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
                        <a href="quote.php" class="btn btn-gold">
                            <i data-lucide="calculator" style="width:15px;height:15px;"></i> Instant Cost Estimate
                        </a>
                        <a href="contact.php" class="btn btn-outline" style="color:#fff; border-color:rgba(255,255,255,0.25);">
                            <i data-lucide="phone" style="width:15px;height:15px;"></i> Book Consultation
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

    <!-- SERVICES DIRECTORY -->
    <section class="section" style="background:var(--bg);">
        <div class="container">
            
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(320px, 1fr)); gap:32px;">
                
                <!-- 1. Interior Design -->
                <div class="service-card" style="display:flex; flex-direction:column;">
                    <div class="service-icon"><i data-lucide="layout"></i></div>
                    <h3>01. Interior Design</h3>
                    <p style="flex:1;">Comprehensive residential and commercial interiors including false ceilings, magnetic profile lighting, living lounges, wallpapers, CNC jalis, and acoustic panelling.</p>
                    <div style="border-top:1px solid var(--border); padding-top:16px; margin-top:20px;">
                        <a href="interior-design.php" class="service-link">
                            Explore 14 Sub-Services <i data-lucide="arrow-right" style="width:14px;height:14px;"></i>
                        </a>
                    </div>
                </div>

                <!-- 2. Exterior Design -->
                <div class="service-card" style="display:flex; flex-direction:column;">
                    <div class="service-icon"><i data-lucide="building"></i></div>
                    <h3>02. Exterior Design & Elevation</h3>
                    <p style="flex:1;">Modern 3D architectural facade elevations, weather-proof HPL/WPC wooden louvers, natural travertine stone cladding, boundary gates, and landscape illumination.</p>
                    <div style="border-top:1px solid var(--border); padding-top:16px; margin-top:20px;">
                        <a href="exterior-design.php" class="service-link">
                            Explore 11 Sub-Services <i data-lucide="arrow-right" style="width:14px;height:14px;"></i>
                        </a>
                    </div>
                </div>

                <!-- 3. Civil Construction -->
                <div class="service-card" style="display:flex; flex-direction:column;">
                    <div class="service-icon"><i data-lucide="hammer"></i></div>
                    <h3>03. Civil Construction</h3>
                    <p style="flex:1;">Structural RCC foundations, brickwork, beam-column framing, MEP electrical/plumbing conduits, waterproofing, and structural remodeling under senior civil engineers.</p>
                    <div style="border-top:1px solid var(--border); padding-top:16px; margin-top:20px;">
                        <a href="construction.php" class="service-link">
                            Explore 13 Sub-Services <i data-lucide="arrow-right" style="width:14px;height:14px;"></i>
                        </a>
                    </div>
                </div>

                <!-- 4. Wooden Work -->
                <div class="service-card" style="display:flex; flex-direction:column;">
                    <div class="service-icon"><i data-lucide="box"></i></div>
                    <h3>04. Wooden Work & Modular</h3>
                    <p style="flex:1;">Gurjan 710 waterproof BWP marine ply modular kitchens, smoked glass walk-in wardrobes, PU polish veneer TV consoles, vanity units, and customized furniture.</p>
                    <div style="border-top:1px solid var(--border); padding-top:16px; margin-top:20px;">
                        <a href="wooden-work.php" class="service-link">
                            Explore 13 Sub-Services <i data-lucide="arrow-right" style="width:14px;height:14px;"></i>
                        </a>
                    </div>
                </div>

                <!-- 5. Turnkey Projects -->
                <div class="service-card" style="display:flex; flex-direction:column; border-color:var(--gold); background:#FAF7F0;">
                    <div class="service-icon" style="background:#0F141C; color:var(--gold);"><i data-lucide="key"></i></div>
                    <h3>05. Turnkey Complete Solution</h3>
                    <p style="flex:1;">End-to-end design and build under a single contract. Guaranteed 45-60 day delivery, dedicated on-site manager, price-lock BOQ, and zero coordination headaches.</p>
                    <div style="border-top:1px solid var(--border); padding-top:16px; margin-top:20px;">
                        <a href="turnkey-projects.php" class="service-link">
                            Explore Turnkey Scope <i data-lucide="arrow-right" style="width:14px;height:14px;"></i>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- CTA SECTION -->
    <section style="padding:80px 0; background:#0F141C; color:#fff; text-align:center;">
        <div class="container">
            <h2 class="section-title" style="color:#fff;">Need a Tailored Architectural Solution?</h2>
            <p class="section-desc" style="color:#94A3B8; margin-bottom:28px;">Book a free on-site consultation or calculate your instant turnkey quotation.</p>
            <div style="display:flex; justify-content:center; gap:16px; flex-wrap:wrap;">
                <a href="contact.php" class="btn btn-gold">Book Free Site Consultation</a>
                <a href="quote.php" class="btn btn-outline" style="color:#fff; border-color:#334155;">Calculate Turnkey Estimate</a>
            </div>
        </div>
    </section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
