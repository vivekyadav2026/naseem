<?php
$pageTitle = 'Our Services | Muskan Interiors';
$pageDesc = 'Explore our comprehensive architecture, interior design, civil construction, and turnkey solutions in Patna.';
require_once __DIR__ . '/includes/header.php';
?>

    <!-- 1. CINEMATIC HERO -->
    <header class="lux-hero lux-hero-sm">
        <img src="images/muskan/after_luxury.jpg" alt="Muskan Interiors Services" class="lux-hero-img">
        <div class="lux-hero-overlay" style="background: linear-gradient(to top, rgba(9,11,14,0.95) 0%, rgba(9,11,14,0.3) 100%);"></div>
        <div class="lux-hero-content">
            <div class="lux-breadcrumb">
                <a href="index.php">Home</a> / Services
            </div>
            <h1 class="lux-hero-title">Our Expertise</h1>
            <p class="lux-hero-subtitle" style="max-width: 600px;">
                Comprehensive architectural and interior solutions. We design, engineer, and build complete spaces of enduring quality.
            </p>
        </div>
    </header>

    <!-- 2. SERVICE LISTING GRID -->
    <section style="padding:120px 0; background:var(--lux-gray);">
        <div class="container" style="max-width:1400px; margin:0 auto; padding:0 20px;">
            
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(400px, 1fr)); gap:40px;">
                
                <!-- Interior -->
                <a href="interior-design.php" style="display:block; text-decoration:none; position:relative; height:500px; overflow:hidden; border-radius:4px; group">
                    <img src="images/muskan/category_living_room_1790770578337.jpg" style="width:100%; height:100%; object-fit:cover; transition:transform 0.8s ease;" class="hover-zoom" alt="Interior Design">
                    <div style="position:absolute; inset:0; background:linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.2) 50%, rgba(0,0,0,0) 100%); display:flex; flex-direction:column; justify-content:flex-end; padding:40px;">
                        <h3 style="font-family:var(--font-display); font-size:2.5rem; color:#fff; margin-bottom:10px;">Interior Design</h3>
                        <p style="color:#ddd; font-size:16px; margin-bottom:20px;">Bespoke living spaces, false ceilings, and architectural lighting.</p>
                        <span style="color:var(--lux-gold); font-size:14px; text-transform:uppercase; letter-spacing:2px;">Explore Service →</span>
                    </div>
                </a>

                <!-- Turnkey -->
                <a href="turnkey-projects.php" style="display:block; text-decoration:none; position:relative; height:500px; overflow:hidden; border-radius:4px; group">
                    <img src="images/muskan/hero_cinematic_interior_1790770500514.jpg" style="width:100%; height:100%; object-fit:cover; transition:transform 0.8s ease;" class="hover-zoom" alt="Turnkey Projects">
                    <div style="position:absolute; inset:0; background:linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.2) 50%, rgba(0,0,0,0) 100%); display:flex; flex-direction:column; justify-content:flex-end; padding:40px;">
                        <h3 style="font-family:var(--font-display); font-size:2.5rem; color:#fff; margin-bottom:10px;">Turnkey Projects</h3>
                        <p style="color:#ddd; font-size:16px; margin-bottom:20px;">End-to-end execution. One contract. Zero stress.</p>
                        <span style="color:var(--lux-gold); font-size:14px; text-transform:uppercase; letter-spacing:2px;">Explore Service →</span>
                    </div>
                </a>

                <!-- Wooden Work -->
                <a href="wooden-work.php" style="display:block; text-decoration:none; position:relative; height:500px; overflow:hidden; border-radius:4px; group">
                    <img src="images/muskan/category_modular_kitchen_1790770566074.jpg" style="width:100%; height:100%; object-fit:cover; transition:transform 0.8s ease;" class="hover-zoom" alt="Wooden Work">
                    <div style="position:absolute; inset:0; background:linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.2) 50%, rgba(0,0,0,0) 100%); display:flex; flex-direction:column; justify-content:flex-end; padding:40px;">
                        <h3 style="font-family:var(--font-display); font-size:2.5rem; color:#fff; margin-bottom:10px;">Modular Joinery</h3>
                        <p style="color:#ddd; font-size:16px; margin-bottom:20px;">Precision-crafted kitchens, wardrobes, and custom cabinetry.</p>
                        <span style="color:var(--lux-gold); font-size:14px; text-transform:uppercase; letter-spacing:2px;">Explore Service →</span>
                    </div>
                </a>

                <!-- Civil -->
                <a href="construction.php" style="display:block; text-decoration:none; position:relative; height:500px; overflow:hidden; border-radius:4px; group">
                    <img src="images/muskan/construction_site.jpg" style="width:100%; height:100%; object-fit:cover; transition:transform 0.8s ease;" class="hover-zoom" alt="Civil Construction">
                    <div style="position:absolute; inset:0; background:linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.2) 50%, rgba(0,0,0,0) 100%); display:flex; flex-direction:column; justify-content:flex-end; padding:40px;">
                        <h3 style="font-family:var(--font-display); font-size:2.5rem; color:#fff; margin-bottom:10px;">Civil Construction</h3>
                        <p style="color:#ddd; font-size:16px; margin-bottom:20px;">Structural engineering, waterproofing, and complete build execution.</p>
                        <span style="color:var(--lux-gold); font-size:14px; text-transform:uppercase; letter-spacing:2px;">Explore Service →</span>
                    </div>
                </a>
                
                <!-- Exterior -->
                <a href="exterior-design.php" style="display:block; text-decoration:none; position:relative; height:500px; overflow:hidden; border-radius:4px; group">
                    <img src="images/muskan/exterior_facade.jpg" style="width:100%; height:100%; object-fit:cover; transition:transform 0.8s ease;" class="hover-zoom" alt="Exterior Design">
                    <div style="position:absolute; inset:0; background:linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.2) 50%, rgba(0,0,0,0) 100%); display:flex; flex-direction:column; justify-content:flex-end; padding:40px;">
                        <h3 style="font-family:var(--font-display); font-size:2.5rem; color:#fff; margin-bottom:10px;">Exterior Elevation</h3>
                        <p style="color:#ddd; font-size:16px; margin-bottom:20px;">Striking modern facades designed for permanence.</p>
                        <span style="color:var(--lux-gold); font-size:14px; text-transform:uppercase; letter-spacing:2px;">Explore Service →</span>
                    </div>
                </a>

            </div>
        </div>
    </section>

    <!-- 3. CTA -->
    <section class="lux-promo" style="height:40vh; min-height:300px;">
        <img src="images/muskan/split_section_image_1790770626120.jpg" alt="Space" class="lux-promo-img">
        <div class="lux-promo-overlay" style="background:rgba(9,11,14,0.7);"></div>
        <div class="lux-promo-content">
            <h2 class="lux-promo-title" style="font-size:clamp(2rem, 4vw, 3rem);">Not sure where to start?</h2>
            <div class="lux-btn-group">
                <a href="contact.php" class="lux-btn lux-btn-primary">Talk to an Architect</a>
            </div>
        </div>
    </section>

    <style>
        .hover-zoom {
            transform: scale(1);
        }
        a:hover .hover-zoom {
            transform: scale(1.05) !important;
        }
        @media (max-width: 768px) {
            .hover-zoom { height: 100% !important; }
        }
    </style>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
