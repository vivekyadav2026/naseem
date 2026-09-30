<?php
$pageTitle = 'Wooden Work & Modular Joinery | Muskan Interiors';
$pageDesc = 'Bespoke wooden joinery, modular kitchens, and luxury wardrobes in Patna. Factory-finished precision with 10-year warranties.';
require_once __DIR__ . '/includes/header.php';
?>

    <!-- 1. CINEMATIC HERO -->
    <header class="lux-hero lux-hero-sm">
        <img src="images/muskan/category_wardrobe_1790770591392.jpg" alt="Luxury Wardrobe" class="lux-hero-img">
        <div class="lux-hero-overlay" style="background: linear-gradient(to top, rgba(9,11,14,0.95) 0%, rgba(9,11,14,0.2) 100%);"></div>
        <div class="lux-hero-content">
            <div class="lux-breadcrumb">
                <a href="index.php">Home</a> / <a href="services.php">Services</a> / Wooden Work
            </div>
            <h1 class="lux-hero-title">Bespoke Modular Joinery</h1>
            <p class="lux-hero-subtitle" style="max-width: 600px;">
                Factory-finished modular kitchens, luxury wardrobes, and custom cabinetry built with German hardware and marine-grade ply.
            </p>
            <div class="lux-btn-group">
                <a href="contact.php" class="lux-btn lux-btn-primary">Consult Our Designers</a>
            </div>
        </div>
    </header>

    <!-- 2. INTRO (SPLIT SECTION) -->
    <section class="lux-split">
        <div class="lux-split-img">
            <img src="images/muskan/category_modular_kitchen_1790770566074.jpg" alt="Modular Kitchen">
        </div>
        <div class="lux-split-content">
            <div class="lux-split-label">Precision Craftsmanship</div>
            <h2 class="lux-split-title">The Art of Fine Woodwork</h2>
            <p class="lux-split-desc">
                We design and manufacture premium modular woodwork that blends seamless functionality with stunning aesthetics. From handleless PU-coated kitchen cabinets to walk-in wardrobes with smoked glass shutters, our joinery is built to global standards.
            </p>
            <p class="lux-split-desc">
                Forget dusty, unorganized on-site carpentry. Our modular units are cut, edge-banded, and finished in advanced facilities, ensuring a zero-defect, perfectly aligned installation in your home.
            </p>
        </div>
    </section>

    <!-- 3. SERVICES (ALTERNATING IMAGE BLOCKS) -->
    <section style="padding:120px 0; background:var(--lux-gray);">
        <div class="container" style="max-width:1400px; margin:0 auto; padding:0 20px;">
            <div style="text-align:center; margin-bottom:80px;">
                <div class="lux-split-label">Our Expertise</div>
                <h2 class="lux-split-title">Woodwork Solutions</h2>
            </div>
            
            <div style="display:flex; flex-direction:column; gap:60px;">
                <!-- Block 1 -->
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:40px; align-items:center;">
                    <div>
                        <h3 style="font-family:var(--font-display); font-size:2rem; margin-bottom:15px; color:var(--lux-dark);">Modular Kitchens</h3>
                        <p style="color:#666; line-height:1.6; margin-bottom:20px;">High-functioning culinary spaces. We use BWP 710 grade marine plywood for carcass strength, paired with tandem soft-close drawers, pull-out pantries, and scratch-resistant acrylic/PU shutters.</p>
                        <ul style="list-style:none; padding:0; margin:0; color:#444;">
                            <li style="margin-bottom:10px;">• Island & Peninsula Layouts</li>
                            <li style="margin-bottom:10px;">• Integrated Appliance Housing</li>
                            <li style="margin-bottom:10px;">• Under-cabinet Profile Lighting</li>
                        </ul>
                    </div>
                    <div style="height:400px; overflow:hidden;">
                        <img src="images/muskan/modular_kitchen.jpg" style="width:100%; height:100%; object-fit:cover;" alt="Modular Kitchen">
                    </div>
                </div>

                <!-- Block 2 -->
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:40px; align-items:center;">
                    <div style="height:400px; overflow:hidden;">
                        <img src="images/muskan/wooden_wardrobe.jpg" style="width:100%; height:100%; object-fit:cover;" alt="Wardrobes">
                    </div>
                    <div style="order: -1;"> <!-- Flex order on mobile will need adjustment, but grid keeps it clean -->
                        <h3 style="font-family:var(--font-display); font-size:2rem; margin-bottom:15px; color:var(--lux-dark);">Luxury Wardrobes</h3>
                        <p style="color:#666; line-height:1.6; margin-bottom:20px;">From sliding floor-to-ceiling wardrobes to expansive walk-in closets. We customize internal storage to perfectly accommodate your apparel, jewelry, and accessories.</p>
                        <ul style="list-style:none; padding:0; margin:0; color:#444;">
                            <li style="margin-bottom:10px;">• Tinted & Fluted Glass Shutters</li>
                            <li style="margin-bottom:10px;">• Sensor-activated Internal LEDs</li>
                            <li style="margin-bottom:10px;">• Heavy-duty Sliding Channels</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. MATERIAL & HARDWARE -->
    <section style="padding:100px 0; background:var(--lux-dark); color:#fff; text-align:center;">
        <div class="container" style="max-width:1000px; margin:0 auto; padding:0 20px;">
            <div class="lux-split-label" style="color:var(--lux-gold);">Uncompromising Quality</div>
            <h2 class="lux-split-title" style="color:#fff; margin-bottom:60px;">The Anatomy of Our Woodwork</h2>
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(250px, 1fr)); gap:30px;">
                <div style="background:rgba(255,255,255,0.05); padding:30px; border-radius:4px;">
                    <h4 style="font-family:var(--font-display); font-size:1.2rem; margin-bottom:10px; color:var(--lux-gold);">BWP 710 Plywood</h4>
                    <p style="font-size:14px; color:#ccc;">Boiling Water Proof marine-grade ply for all wet areas, ensuring zero termite or water damage.</p>
                </div>
                <div style="background:rgba(255,255,255,0.05); padding:30px; border-radius:4px;">
                    <h4 style="font-family:var(--font-display); font-size:1.2rem; margin-bottom:10px; color:var(--lux-gold);">German Hardware</h4>
                    <p style="font-size:14px; color:#ccc;">We exclusively use Hafele, Hettich, or Blum soft-close hinges and hydraulic lifters.</p>
                </div>
                <div style="background:rgba(255,255,255,0.05); padding:30px; border-radius:4px;">
                    <h4 style="font-family:var(--font-display); font-size:1.2rem; margin-bottom:10px; color:var(--lux-gold);">PU & Acrylic Finishes</h4>
                    <p style="font-size:14px; color:#ccc;">Flawless, scratch-resistant surface treatments that maintain their luster for decades.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. FAQ -->
    <section style="padding:100px 0; background:var(--lux-gray);">
        <div class="container" style="max-width:800px; margin:0 auto; padding:0 20px;">
            <div class="lux-split-label" style="text-align:center;">Common Questions</div>
            <h2 class="lux-split-title" style="text-align:center; margin-bottom:60px;">Joinery FAQ</h2>
            
            <div style="margin-bottom:20px; background:#fff; padding:30px; border-radius:4px; box-shadow:0 10px 30px rgba(0,0,0,0.02);">
                <h4 style="font-family:var(--font-display); font-size:1.2rem; margin-bottom:10px; color:var(--lux-dark);">Do you offer a warranty on kitchens and wardrobes?</h4>
                <p style="color:#666; line-height:1.6;">Yes, we provide a 10-year warranty on all structural woodwork and pass on the lifetime warranties of premium hardware brands like Hettich and Blum directly to you.</p>
            </div>
            <div style="margin-bottom:20px; background:#fff; padding:30px; border-radius:4px; box-shadow:0 10px 30px rgba(0,0,0,0.02);">
                <h4 style="font-family:var(--font-display); font-size:1.2rem; margin-bottom:10px; color:var(--lux-dark);">How is modular different from carpenter-built?</h4>
                <p style="color:#666; line-height:1.6;">Modular woodwork is factory-pressed, machine edge-banded, and precision-cut using CNC machines. This results in superior finish, faster installation, and significantly longer lifespan compared to manual on-site carpentry.</p>
            </div>
        </div>
    </section>

    <!-- 6. CTA -->
    <section class="lux-promo" style="height:50vh; min-height:400px;">
        <img src="images/muskan/promo_kitchen_luxury_1790770518348.jpg" alt="Kitchen Space" class="lux-promo-img">
        <div class="lux-promo-overlay" style="background:rgba(9,11,14,0.7);"></div>
        <div class="lux-promo-content">
            <h2 class="lux-promo-title" style="font-size:clamp(2rem, 4vw, 3.5rem);">Design Your Perfect Kitchen</h2>
            <p style="font-size:1.2rem; margin-bottom:40px; color:rgba(255,255,255,0.8);">Talk to our design team today and start your journey.</p>
            <a href="contact.php" class="lux-btn lux-btn-primary">Book a Free Consultation</a>
        </div>
    </section>

    <style>
        /* Small responsive tweak for alternating blocks */
        @media (max-width: 768px) {
            .lux-split-img { order: -1; }
        }
    </style>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
