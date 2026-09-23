<?php
$pageTitle = 'About Us — More Than Interiors. We Build Complete Spaces.';
$pageDesc = 'Discover the legacy of Muskan Interiors — 10+ years, 100+ turnkey projects delivered, 8-point edge, and architectural mastery across Patna and Bihar.';
require_once __DIR__ . '/includes/header.php';
?>

    <!-- PAGE HERO BANNER -->
    <header class="page-banner banner-about">
        <div class="container">
            <div class="page-banner-layout">
                <div>
                    <div class="breadcrumbs">
                        <a href="index.php"><i data-lucide="home" style="width:13px;height:13px;"></i> Home</a> <span>/</span> <span>About Us</span>
                    </div>
                    <div class="section-tag dark">Architectural Legacy & Craft</div>
                    <h1>More Than Interiors.<br><span class="gold-gradient">We Build Complete Spaces.</span></h1>
                    <p>
                        A premier turnkey architecture, civil engineering, and bespoke wooden joinery studio dedicated to transforming spaces into enduring luxury environments.
                    </p>
                    <div class="banner-feature-pills">
                        <div class="banner-pill"><i data-lucide="award"></i> 10+ Years Heritage</div>
                        <div class="banner-pill"><i data-lucide="shield-check"></i> 100+ Turnkey Projects</div>
                        <div class="banner-pill"><i data-lucide="check-circle-2"></i> 10-Year Hardware Warranty</div>
                    </div>
                    <div class="banner-cta-group">
                        <a href="contact.php" class="btn btn-gold">
                            <i data-lucide="calendar" style="width:15px;height:15px;"></i> Book Site Visit
                        </a>
                        <a href="<?= SITE_WHATSAPP_LINK ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline" style="color:#25D366; border-color:rgba(37,211,102,0.5); background:rgba(37,211,102,0.08);">
                            <i data-lucide="message-circle" style="width:15px;height:15px;"></i> WhatsApp Studio
                        </a>
                    </div>
                </div>

                <div>
                    <div class="banner-stat-glass">
                        <div class="banner-stat-glass-title">
                            <i data-lucide="award" style="width:14px;height:14px;"></i> Proven Track Record
                        </div>
                        <div class="banner-stat-grid">
                            <div class="banner-stat-item">
                                <div class="banner-stat-num">100<span>+</span></div>
                                <div class="banner-stat-label">Projects Completed</div>
                            </div>
                            <div class="banner-stat-item">
                                <div class="banner-stat-num">10<span>+</span></div>
                                <div class="banner-stat-label">Years of Mastery</div>
                            </div>
                            <div class="banner-stat-item">
                                <div class="banner-stat-num">50<span>+</span></div>
                                <div class="banner-stat-label">Elite Clients</div>
                            </div>
                            <div class="banner-stat-item">
                                <div class="banner-stat-num">100<span>%</span></div>
                                <div class="banner-stat-label">On-Time Handover</div>
                            </div>
                        </div>
                    </div>
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
                    <div class="label">Years of Heritage</div>
                </div>
                <div class="stat-box">
                    <div class="num">50<span>+</span></div>
                    <div class="label">Satisfied Clients</div>
                </div>
                <div class="stat-box">
                    <div class="num">100<span>%</span></div>
                    <div class="label">Quality Assurance</div>
                </div>
            </div>
        </div>
    </section>

    <!-- COMPANY STORY SECTION -->
    <section class="section" style="background:#fff;">
        <div class="container">
            <div style="display:grid; grid-template-columns:1.2fr 1fr; gap:48px; align-items:center;">
                <div>
                    <div class="section-tag">Our Legacy & Philosophy</div>
                    <h2 class="section-title">Built On Precision, Integrity & Passion</h2>
                    <p style="font-size:15px; color:#475569; line-height:1.8; margin-bottom:18px;">
                        At <strong>Muskan Interiors</strong>, we believe exceptional design is not merely decorative; it is deeply architectural, functional, and permanent. For over a decade, we have eliminated the fragmentation of hiring separate architects, civil contractors, carpenters, and electricians.
                    </p>
                    <p style="font-size:15px; color:#475569; line-height:1.8; margin-bottom:24px;">
                        From modern architectural elevations and structural civil modifications to high-gloss PU modular woodwork and German-fitted kitchens, we manage every single millimeter with unyielding rigor.
                    </p>
                    
                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                        <div style="background:#FAF9F5; padding:16px; border-radius:8px; border-left:3px solid var(--gold);">
                            <h4 style="font-size:15px; font-weight:700; color:#0F141C; margin-bottom:4px;">Our Mission</h4>
                            <p style="font-size:13px; color:#64748B;">To deliver stress-free, institutional-grade turnkey spaces that enhance human living.</p>
                        </div>
                        <div style="background:#FAF9F5; padding:16px; border-radius:8px; border-left:3px solid var(--gold);">
                            <h4 style="font-size:15px; font-weight:700; color:#0F141C; margin-bottom:4px;">Our Vision</h4>
                            <p style="font-size:13px; color:#64748B;">To set the benchmark for luxury design, precision carpentry, and transparent pricing in Eastern India.</p>
                        </div>
                    </div>
                </div>

                <div style="height:420px; border-radius:12px; overflow:hidden; border:1px solid var(--border);">
                    <img src="images/muskan/hero_villa.jpg" alt="Villa Architecture" style="width:100%; height:100%; object-fit:cover;">
                </div>
            </div>
        </div>
    </section>

    <!-- 8 REASONS WHY CHOOSE US -->
    <section class="section" style="background:#FAF9F5; border-top:1px solid var(--border);">
        <div class="container">
            <div class="section-header text-center" style="max-width:760px; margin:0 auto 50px;">
                <div class="section-tag">The 8-Point Edge</div>
                <h2 class="section-title">Why Homeowners & Businesses Choose Us</h2>
                <p class="section-desc">We combine creative architectural brilliance with ruthless civil engineering execution.</p>
            </div>

            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:24px;">
                <div class="service-card" style="padding:28px;">
                    <div class="service-icon"><i data-lucide="layers"></i></div>
                    <h4>1. Complete Solution</h4>
                    <p style="font-size:13px; color:#64748B;">Architecture, civil, interiors, and woodwork under one unified roof.</p>
                </div>
                <div class="service-card" style="padding:28px;">
                    <div class="service-icon"><i data-lucide="eye"></i></div>
                    <h4>2. Photoreal 3D Previews</h4>
                    <p style="font-size:13px; color:#64748B;">See every lighting angle and texture before civil execution begins.</p>
                </div>
                <div class="service-card" style="padding:28px;">
                    <div class="service-icon"><i data-lucide="shield-check"></i></div>
                    <h4>3. Premium Materials</h4>
                    <p style="font-size:13px; color:#64748B;">Gurjan BWP 710 ply, Hafele soft-close fittings, Asian Paints Royale.</p>
                </div>
                <div class="service-card" style="padding:28px;">
                    <div class="service-icon"><i data-lucide="clock"></i></div>
                    <h4>4. 45-60 Day Handover</h4>
                    <p style="font-size:13px; color:#64748B;">Strict milestone schedules with guaranteed on-time completion.</p>
                </div>
                <div class="service-card" style="padding:28px;">
                    <div class="service-icon"><i data-lucide="file-text"></i></div>
                    <h4>5. Transparent BOQ</h4>
                    <p style="font-size:13px; color:#64748B;">Itemized price-lock bill with zero surprise hidden escalations.</p>
                </div>
                <div class="service-card" style="padding:28px;">
                    <div class="service-icon"><i data-lucide="award"></i></div>
                    <h4>6. 10+ Years Heritage</h4>
                    <p style="font-size:13px; color:#64748B;">A decade of proven architectural projects across Bihar.</p>
                </div>
                <div class="service-card" style="padding:28px;">
                    <div class="service-icon"><i data-lucide="user-check"></i></div>
                    <h4>7. Dedicated Site Lead</h4>
                    <p style="font-size:13px; color:#64748B;">Senior engineer supervising your space daily with photo logs.</p>
                </div>
                <div class="service-card" style="padding:28px;">
                    <div class="service-icon"><i data-lucide="check-circle-2"></i></div>
                    <h4>8. 10-Year Warranty</h4>
                    <p style="font-size:13px; color:#64748B;">Written hardware warranty packs and dedicated after-sales care.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section style="padding:80px 0; background:#0F141C; color:#fff; text-align:center;">
        <div class="container">
            <h2 class="section-title" style="color:#fff;">Ready to Build Your Space with Muskan Interiors?</h2>
            <p class="section-desc" style="color:#94A3B8; margin-bottom:28px;">Let's discuss your floor plan, 3D visualization, and turnkey execution.</p>
            <div style="display:flex; justify-content:center; gap:16px; flex-wrap:wrap;">
                <a href="contact.php" class="btn btn-gold">Book Free Site Consultation</a>
                <a href="<?= SITE_WHATSAPP_LINK ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline" style="color:#25D366; border-color:#25D366; background:rgba(37,211,102,0.08);">
                    <i data-lucide="message-circle" style="width:16px;height:16px;"></i> WhatsApp Instant Chat
                </a>
                <a href="projects.php" class="btn btn-outline" style="color:#fff; border-color:#334155;">Explore Our Portfolio</a>
            </div>
        </div>
    </section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
