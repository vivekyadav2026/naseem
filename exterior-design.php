<?php
$pageTitle = 'Exterior Design & Elevation | Muskan Interiors';
$pageDesc = 'Premium exterior elevation and facade design in Patna. We specialize in modern villa facades, commercial elevations, and structural aesthetic modifications.';
require_once __DIR__ . '/includes/header.php';
?>

    <!-- 1. CINEMATIC HERO -->
    <header class="lux-hero lux-hero-sm">
        <img src="images/muskan/exterior_facade.jpg" alt="Exterior Facade Design" class="lux-hero-img">
        <div class="lux-hero-overlay" style="background: linear-gradient(to top, rgba(9,11,14,0.95) 0%, rgba(9,11,14,0.3) 100%);"></div>
        <div class="lux-hero-content">
            <div class="lux-breadcrumb">
                <a href="index.php">Home</a> / <a href="services.php">Services</a> / Exterior Design
            </div>
            <h1 class="lux-hero-title">Architectural Elevations</h1>
            <p class="lux-hero-subtitle" style="max-width: 600px;">
                Striking modern facades designed for permanence. We transform ordinary structures into architectural landmarks.
            </p>
            <div class="lux-btn-group">
                <a href="contact.php" class="lux-btn lux-btn-primary">Get Free Consultation</a>
            </div>
        </div>
    </header>

    <!-- 2. SERVICE INTRO (SPLIT REVERSE) -->
    <section class="lux-split reverse">
        <div class="lux-split-img">
            <img src="images/muskan/modern_elevation.jpg" alt="Modern Elevation">
        </div>
        <div class="lux-split-content">
            <div class="lux-split-label">Structural Aesthetics</div>
            <h2 class="lux-split-title">Facades That Make a Statement</h2>
            <p class="lux-split-desc">
                Your building's exterior is its first impression. We specialize in modern villa facades, commercial elevations, and structural aesthetic modifications that endure the elements while looking spectacular.
            </p>
            <p class="lux-split-desc">
                Using weather-resistant materials like HPL (High-Pressure Laminates), ACP (Aluminium Composite Panels), CNC-cut screens, and natural stone cladding, we engineer exteriors that are as durable as they are beautiful.
            </p>
        </div>
    </section>

    <!-- 3. WHAT'S INCLUDED (LARGE IMAGE OVERLAY) -->
    <section style="position:relative; padding:120px 0; background:var(--lux-dark); color:#fff; overflow:hidden;">
        <img src="images/muskan/hero_villa.jpg" style="position:absolute; inset:0; width:100%; height:100%; object-fit:cover; opacity:0.3; filter:grayscale(100%);" alt="Villa Background">
        <div class="container" style="position:relative; z-index:2; max-width:1400px; margin:0 auto; padding:0 20px;">
            <div class="lux-split-label" style="color:#fff;">Exterior Services</div>
            <h2 class="lux-split-title" style="color:#fff; margin-bottom:60px;">Our Capabilities</h2>
            
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:40px;">
                <div style="background:rgba(255,255,255,0.05); backdrop-filter:blur(10px); padding:40px; border:1px solid rgba(255,255,255,0.1);">
                    <h4 style="font-family:var(--font-display); font-size:1.5rem; margin-bottom:15px; color:var(--lux-gold);">Villa Elevations</h4>
                    <p style="color:#ddd; line-height:1.6;">Bespoke residential facades featuring modern geometric styling, wooden HPL accents, and integrated exterior lighting.</p>
                </div>
                <div style="background:rgba(255,255,255,0.05); backdrop-filter:blur(10px); padding:40px; border:1px solid rgba(255,255,255,0.1);">
                    <h4 style="font-family:var(--font-display); font-size:1.5rem; margin-bottom:15px; color:var(--lux-gold);">Commercial Facades</h4>
                    <p style="color:#ddd; line-height:1.6;">High-performance structural glazing, ACP cladding, and large-format branding elements for retail and office spaces.</p>
                </div>
                <div style="background:rgba(255,255,255,0.05); backdrop-filter:blur(10px); padding:40px; border:1px solid rgba(255,255,255,0.1);">
                    <h4 style="font-family:var(--font-display); font-size:1.5rem; margin-bottom:15px; color:var(--lux-gold);">Exterior Lighting</h4>
                    <p style="color:#ddd; line-height:1.6;">Architectural floodlighting, profile LEDs, and automated facade illumination to bring the structure to life at night.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. MATERIAL SHOWCASE -->
    <section class="lux-split">
        <div class="lux-split-content">
            <div class="lux-split-label">Material Engineering</div>
            <h2 class="lux-split-title">Built for the Elements</h2>
            <div style="display:flex; flex-direction:column; gap:20px;">
                <div style="display:flex; gap:15px; align-items:flex-start;">
                    <i data-lucide="check-circle" style="color:var(--lux-gold); flex-shrink:0; margin-top:3px;"></i>
                    <div>
                        <h4 style="font-family:var(--font-display); font-size:1.2rem; margin-bottom:5px;">HPL & WPC Cladding</h4>
                        <p style="color:#666; font-size:14px;">Weather-proof wooden aesthetics that never rot or fade.</p>
                    </div>
                </div>
                <div style="display:flex; gap:15px; align-items:flex-start;">
                    <i data-lucide="check-circle" style="color:var(--lux-gold); flex-shrink:0; margin-top:3px;"></i>
                    <div>
                        <h4 style="font-family:var(--font-display); font-size:1.2rem; margin-bottom:5px;">Natural Stone Cladding</h4>
                        <p style="color:#666; font-size:14px;">Granite, sandstone, and slate for premium, monolithic textures.</p>
                    </div>
                </div>
                <div style="display:flex; gap:15px; align-items:flex-start;">
                    <i data-lucide="check-circle" style="color:var(--lux-gold); flex-shrink:0; margin-top:3px;"></i>
                    <div>
                        <h4 style="font-family:var(--font-display); font-size:1.2rem; margin-bottom:5px;">Toughened Glass Balconies</h4>
                        <p style="color:#666; font-size:14px;">Frameless glass railings with SS 304 architectural hardware.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="lux-split-img">
            <img src="images/muskan/exterior_facade.jpg" alt="Material Excellence">
        </div>
    </section>

    <!-- 5. FAQ ACCORDION -->
    <section style="padding:100px 0; background:var(--lux-gray);">
        <div class="container" style="max-width:800px; margin:0 auto; padding:0 20px;">
            <div class="lux-split-label" style="text-align:center;">Common Questions</div>
            <h2 class="lux-split-title" style="text-align:center; margin-bottom:60px;">Exterior FAQ</h2>
            
            <div style="margin-bottom:20px; background:#fff; padding:30px; border-radius:4px; box-shadow:0 10px 30px rgba(0,0,0,0.02);">
                <h4 style="font-family:var(--font-display); font-size:1.2rem; margin-bottom:10px; color:var(--lux-dark);">Can you modify an existing old building's facade?</h4>
                <p style="color:#666; line-height:1.6;">Yes, we specialize in structural retrofitting and elevation redesign. We can wrap an old structure in modern framing and cladding to completely transform its appearance without demolishing the core building.</p>
            </div>
            <div style="margin-bottom:20px; background:#fff; padding:30px; border-radius:4px; box-shadow:0 10px 30px rgba(0,0,0,0.02);">
                <h4 style="font-family:var(--font-display); font-size:1.2rem; margin-bottom:10px; color:var(--lux-dark);">Are the exterior materials waterproof?</h4>
                <p style="color:#666; line-height:1.6;">Absolutely. All materials we specify for elevations, such as HPL (High-Pressure Laminate) and exterior-grade paints, are fully weather-resistant, UV-protected, and designed for heavy monsoons.</p>
            </div>
        </div>
    </section>

    <!-- 6. LEAD GENERATION CTA -->
    <section class="lux-promo" style="height:50vh; min-height:400px;">
        <img src="images/muskan/modern_elevation.jpg" alt="Exterior Space" class="lux-promo-img">
        <div class="lux-promo-overlay" style="background:rgba(9,11,14,0.7);"></div>
        <div class="lux-promo-content">
            <h2 class="lux-promo-title" style="font-size:clamp(2rem, 4vw, 3.5rem);">Redefine Your Architecture</h2>
            <p style="font-size:1.2rem; margin-bottom:40px; color:rgba(255,255,255,0.8);">Talk to our design team today and start your journey.</p>
            <a href="contact.php" class="lux-btn lux-btn-primary">Book a Free Consultation</a>
        </div>
    </section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
