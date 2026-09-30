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

    

    <!-- 1. CINEMATIC HERO -->
    <header class="lux-hero">
        <img fetchpriority="high" src="images/muskan/hero_cinematic_interior_1790770500514.jpg" alt="Luxury Living Interior" class="lux-hero-img">
        <div class="lux-hero-overlay"></div>
        <div class="lux-hero-content">
            <h1 class="lux-hero-title">Designed for Your Lifestyle</h1>
            <p class="lux-hero-subtitle">
                Complete Interior, Exterior, Construction & Wooden Work Solutions — Designed Around Your Vision. From raw civil foundations to luxury handcrafted interiors.
            </p>
            <div class="lux-btn-group">
                <a href="projects.php" class="lux-btn lux-btn-primary">Explore Designs</a>
                <a href="contact.php" class="lux-btn lux-btn-outline">Book Consultation</a>
            </div>
        </div>
    </header>

    <!-- 2. SPLIT SECTION 1 (Image Left) -->
    <section class="lux-split">
        <div class="lux-split-img">
            <img loading="lazy" src="images/muskan/editorial_living_room_1790770534963.jpg" alt="Our Design Philosophy">
        </div>
        <div class="lux-split-content">
            <div class="lux-split-label">Our Philosophy</div>
            <h2 class="lux-split-title">Spaces that breathe elegance and functionality.</h2>
            <p class="lux-split-desc">
                We believe that true luxury lies in the details. Our institutional material standards ensure every corner of your home is not just visually stunning, but engineered to last. We handle every detail from structural civil work to bespoke cabinetry under one single contract.
            </p>
            <div>
                <a href="about.php" class="lux-btn lux-btn-outline" style="color:var(--lux-dark); border-color:var(--lux-dark);">Discover Our Process</a>
            </div>
        </div>
    </section>

    <!-- 3. SPLIT SECTION 2 (Image Right) -->
    <section class="lux-split reverse">
        <div class="lux-split-img">
            <img loading="lazy" src="images/muskan/split_section_image_1790770626120.jpg" alt="Precision and Craft">
        </div>
        <div class="lux-split-content">
            <div class="lux-split-label">Uncompromising Craft</div>
            <h2 class="lux-split-title">Institutional Material Standards.</h2>
            <p class="lux-split-desc">
                We use exclusively certified, marine-grade, and branded materials to ensure zero degradation over decades. From Gurjan BWP IS:710 Marine Ply to Italian PU Satin finishes and German engineering mechanisms.
            </p>
            <div>
                <a href="services.php" class="lux-btn lux-btn-outline" style="color:var(--lux-dark); border-color:var(--lux-dark);">View Materials</a>
            </div>
        </div>
    </section>

    <!-- 4. CATEGORY EXPLORER -->
    <section class="lux-category-section">
        <div style="text-align:center; margin-bottom:80px;">
            <div class="lux-split-label">Discover</div>
            <h2 class="lux-split-title" style="font-size:3rem;">Curated Environments</h2>
        </div>
        
        <div class="lux-cat-grid">
            <a href="wooden-work.php" class="lux-cat-card">
                <div class="lux-cat-img-wrap">
                    <img loading="lazy" src="images/muskan/category_modular_kitchen_1790770566074.jpg" alt="Modular Kitchens">
                </div>
                <h3 class="lux-cat-title">Modular Kitchens <i data-lucide="arrow-right"></i></h3>
            </a>
            <a href="interior-design.php" class="lux-cat-card">
                <div class="lux-cat-img-wrap">
                    <img loading="lazy" src="images/muskan/category_living_room_1790770578337.jpg" alt="Living Rooms">
                </div>
                <h3 class="lux-cat-title">Living Rooms <i data-lucide="arrow-right"></i></h3>
            </a>
            <a href="wooden-work.php" class="lux-cat-card">
                <div class="lux-cat-img-wrap">
                    <img loading="lazy" src="images/muskan/category_wardrobe_1790770591392.jpg" alt="Wardrobes">
                </div>
                <h3 class="lux-cat-title">Wardrobes <i data-lucide="arrow-right"></i></h3>
            </a>
        </div>
    </section>

    <!-- 5. PROMOTIONAL BANNER -->
    <section class="lux-promo">
        <img loading="lazy" src="images/muskan/promo_kitchen_luxury_1790770518348.jpg" alt="Luxury Kitchen Design" class="lux-promo-img">
        <div class="lux-promo-overlay"></div>
        <div class="lux-promo-content">
            <div class="lux-split-label" style="color:#fff;">Bespoke Kitchens</div>
            <h2 class="lux-promo-title">Design Your Dream Kitchen</h2>
            <p style="font-size:1.2rem; margin-bottom:40px; color:rgba(255,255,255,0.8);">Premium modular kitchens designed around you.</p>
            <a href="contact.php" class="lux-btn lux-btn-primary">Start Your Design</a>
        </div>
    </section>

    <!-- 6. PREMIUM PROJECT SHOWCASE -->
    <section class="lux-project-section">
        <div style="text-align:center; margin-bottom:60px;">
            <div class="lux-split-label" style="color:#fff;">Featured Work</div>
            <h2 class="lux-split-title" style="color:#fff;">Contemporary 3BHK — Patna</h2>
        </div>
        
        <div class="lux-project-featured">
            <div class="lux-project-img-wrapper">
                <img loading="lazy" src="images/muskan/project_contemporary_3bhk_1790770609717.jpg" alt="Contemporary 3BHK">
            </div>
            <div class="lux-project-info">
                <div class="lux-split-label" style="margin-bottom:15px; color:#000;">Turnkey Interior</div>
                <h3 style="font-size:2rem; margin-bottom:20px;">Modern Elegance in Every Detail</h3>
                <p style="color:#666; line-height:1.7; margin-bottom:30px;">
                    A complete transformation of a raw space into a sophisticated modern apartment. Featuring seamless open-plan living and dining areas, premium wooden work, and bespoke lighting solutions.
                </p>
                <div style="display:flex; justify-content:space-between; border-top:1px solid #eee; padding-top:20px; margin-bottom:30px;">
                    <div>
                        <div style="font-size:12px; color:#999; text-transform:uppercase;">Area</div>
                        <strong>1800 Sq. Ft.</strong>
                    </div>
                    <div>
                        <div style="font-size:12px; color:#999; text-transform:uppercase;">Timeline</div>
                        <strong>60 Days</strong>
                    </div>
                </div>
                <a href="projects.php" class="lux-btn lux-btn-outline" style="color:#000; border-color:#000; width:100%; justify-content:center;">View Full Project</a>
            </div>
        </div>
    </section>

    <!-- 7. EDITORIAL GALLERY -->
    <section class="lux-gallery-section">
        <div style="text-align:center; margin-bottom:80px;">
            <div class="lux-split-label">Inspiration</div>
            <h2 class="lux-split-title">The Art of Living</h2>
        </div>

        <div class="lux-gallery-grid">
            <a href="#" class="lux-gallery-item large">
                <img loading="lazy" src="images/muskan/hero_cinematic_interior_1790770500514.jpg" alt="Gallery">
                <div class="lux-gallery-overlay">
                    <h3>Living Spaces</h3>
                </div>
            </a>
            <a href="#" class="lux-gallery-item tall">
                <img loading="lazy" src="images/muskan/editorial_bedroom_detail_1790770550172.jpg" alt="Gallery">
                <div class="lux-gallery-overlay">
                    <h3>Bedroom Details</h3>
                </div>
            </a>
            <a href="#" class="lux-gallery-item wide">
                <img loading="lazy" src="images/muskan/split_section_image_1790770626120.jpg" alt="Gallery">
                <div class="lux-gallery-overlay">
                    <h3>Dining Experience</h3>
                </div>
            </a>
            <a href="#" class="lux-gallery-item wide">
                <img loading="lazy" src="images/muskan/category_living_room_1790770578337.jpg" alt="Gallery">
                <div class="lux-gallery-overlay">
                    <h3>Architectural Lighting</h3>
                </div>
            </a>
        </div>
    </section>

    <!-- FINAL CTA BANNER -->
    <section style="padding:100px 0; background:var(--lux-dark); color:#fff; text-align:center;">
        <div class="container">
            <h2 class="lux-split-title" style="color:#fff; margin-bottom:30px;">Ready to Transform Your Space?</h2>
            <p style="color:#94A3B8; margin-bottom:40px; font-size:1.2rem; max-width:600px; margin-left:auto; margin-right:auto;">
                Schedule your free site measurement and 3D architectural consultation today.
            </p>
            <div class="lux-btn-group">
                <a href="contact.php" class="lux-btn lux-btn-primary">
                    Book Free Consultation
                </a>
                <a href="<?= SITE_WHATSAPP_LINK ?>" target="_blank" rel="noopener noreferrer" class="lux-btn lux-btn-outline" style="color:#25D366; border-color:rgba(37,211,102,0.5);">
                    WhatsApp Instant Chat
                </a>
            </div>
        </div>
    </section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>


