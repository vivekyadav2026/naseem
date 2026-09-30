<?php
$pageTitle = 'Contact Us — Book Free Site Consultation | Muskan Interiors';
$pageDesc = 'Get in touch with Muskan Interiors in Patna for interior design, 3D CAD elevations, civil construction, and modular woodwork.';
require_once __DIR__ . '/includes/header.php';

$successMsg = '';
$errorMsg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $email = trim($_POST['email'] ?? 'Not Provided');
    $city = trim($_POST['city'] ?? 'Patna, Bihar');
    $service = trim($_POST['service'] ?? 'General Consultation');
    $property = trim($_POST['property_type'] ?? 'N/A');
    $area = trim($_POST['area'] ?? 'N/A');
    $budget = trim($_POST['budget'] ?? 'N/A');
    $message = trim($_POST['message'] ?? '');

    if (!empty($name) && !empty($phone)) {
        $leadId = 'ENQ-' . time() . '-' . rand(100, 999);
        $enquiryData = [
            'id' => $leadId,
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'city' => $city,
            'service' => $service,
            'property_type' => $property,
            'area' => $area,
            'budget' => $budget,
            'message' => $message,
            'status' => 'New',
            'source' => 'Contact Page Form',
            'notes' => '',
            'created_at' => date('Y-m-d H:i:s')
        ];

        $dm->saveEnquiry($enquiryData);
        $successMsg = 'Thank you, ' . htmlspecialchars($name) . '! Your consultation request has been received. Our senior architect will contact you within 2 hours. Lead Reference ID: ' . $leadId;
    } else {
        $errorMsg = 'Please provide both your name and phone number.';
    }
}
?>

    <!-- 1. CINEMATIC HERO (CONTACT) -->
    <header class="lux-hero lux-hero-sm">
        <img fetchpriority="high" src="images/muskan/contact_hero_1790771405051.jpg" alt="Luxury Home Office" class="lux-hero-img">
        <div class="lux-hero-overlay" style="background: linear-gradient(to top, rgba(9,11,14,0.95) 0%, rgba(9,11,14,0.5) 100%);"></div>
        <div class="lux-hero-content">
            <div class="lux-breadcrumb">
                <a href="index.php">Home</a> / Contact Studio
            </div>
            <h1 class="lux-hero-title">Let's Create Your Dream Space</h1>
            <p class="lux-hero-subtitle" style="max-width: 600px;">
                Schedule an in-person design consultation or book a free on-site dimensional audit with our architectural engineering team.
            </p>
        </div>
    </header>

    <!-- 2. CONTACT LAYOUT -->
    <section style="padding:100px 0; background:var(--lux-gray);">
        <div class="container" style="max-width:1400px; padding:0 20px; margin:0 auto;">
            
            <div style="display:grid; grid-template-columns: 1fr 1.5fr; gap:60px;">
                
                <!-- CONTACT INFO PANEL -->
                <div style="background:var(--lux-dark); color:#fff; padding:60px; height:100%;">
                    <div class="lux-split-label" style="color:var(--lux-gold);">Direct Studio Desk</div>
                    <h3 style="font-family:var(--font-display); font-size:2.5rem; margin-bottom:20px; color:#fff;">Muskan Interiors</h3>
                    <p style="color:#94A3B8; font-size:15px; margin-bottom:40px; line-height:1.6;">
                        Our senior architects and project leads are available 6 days a week to review your architectural drawings and floor plans.
                    </p>

                    <div style="margin-bottom:30px;">
                        <h4 style="font-size:16px; margin-bottom:8px; color:var(--lux-gold); font-family:var(--font-display);">Studio & Experience Centre</h4>
                        <p style="font-size:14px; color:#ccc; line-height:1.6;"><?= SITE_ADDRESS ?></p>
                    </div>

                    <div style="margin-bottom:30px;">
                        <h4 style="font-size:16px; margin-bottom:8px; color:var(--lux-gold); font-family:var(--font-display);">Call Our Engineers</h4>
                        <p style="font-size:14px; color:#ccc; line-height:1.6;">
                            <a href="tel:<?= SITE_PHONE_1 ?>" style="color:#fff; text-decoration:none;"><?= SITE_PHONE_1 ?></a><br>
                            <a href="tel:<?= SITE_PHONE_2 ?>" style="color:#fff; text-decoration:none;"><?= SITE_PHONE_2 ?></a>
                        </p>
                    </div>

                    <div style="margin-bottom:30px;">
                        <h4 style="font-size:16px; margin-bottom:8px; color:var(--lux-gold); font-family:var(--font-display);">Official Inquiries</h4>
                        <p style="font-size:14px; color:#ccc; line-height:1.6;">
                            <a href="mailto:<?= SITE_EMAIL ?>" style="color:#fff; text-decoration:none;"><?= SITE_EMAIL ?></a>
                        </p>
                    </div>

                    <div style="margin-bottom:40px;">
                        <h4 style="font-size:16px; margin-bottom:8px; color:var(--lux-gold); font-family:var(--font-display);">Studio Hours</h4>
                        <p style="font-size:14px; color:#ccc; line-height:1.6;">Mon – Sat: 9:30 AM – 7:30 PM<br>Sunday: By Prior Appointment</p>
                    </div>
                    
                    <a href="<?= SITE_WHATSAPP_LINK ?>" target="_blank" rel="noopener noreferrer" class="lux-btn lux-btn-outline" style="border-color:#25D366; color:#25D366; width:100%; justify-content:center;">
                        <i data-lucide="message-circle" style="width:18px;height:18px;"></i> WhatsApp Studio Desk
                    </a>
                </div>

                <!-- CONTACT FORM -->
                <div style="background:#fff; padding:60px; box-shadow:0 30px 60px rgba(0,0,0,0.05);">
                    <div style="margin-bottom:40px;">
                        <div class="lux-split-label">Quick Response Guarantee</div>
                        <h3 style="font-family:var(--font-display); font-size:2rem; color:var(--lux-dark); margin-bottom:10px;">Book Free Consultation</h3>
                        <p style="color:#666;">Fill out this form and our senior architect will call you within 2 hours.</p>
                    </div>

                    <?php if (!empty($successMsg)): ?>
                        <div style="background:rgba(16,185,129,0.1); border-left:4px solid #10b981; color:#047857; padding:20px; margin-bottom:30px; font-size:14px;">
                            <strong>Success:</strong> <?= $successMsg ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($errorMsg)): ?>
                        <div style="background:rgba(239,68,68,0.1); border-left:4px solid #ef4444; color:#b91c1c; padding:20px; margin-bottom:30px; font-size:14px;">
                            <strong>Error:</strong> <?= htmlspecialchars($errorMsg) ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="">
                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
                            <div class="lux-form-group">
                                <label style="display:block; font-size:12px; text-transform:uppercase; letter-spacing:1px; margin-bottom:8px; color:#666;">Full Name *</label>
                                <input type="text" name="name" class="lux-input" placeholder="e.g. Rahul Sharma" required>
                            </div>
                            <div class="lux-form-group">
                                <label style="display:block; font-size:12px; text-transform:uppercase; letter-spacing:1px; margin-bottom:8px; color:#666;">Phone Number *</label>
                                <input type="tel" name="phone" class="lux-input" placeholder="e.g. +91 98765 43210" required>
                            </div>
                            <div class="lux-form-group">
                                <label style="display:block; font-size:12px; text-transform:uppercase; letter-spacing:1px; margin-bottom:8px; color:#666;">Email Address</label>
                                <input type="email" name="email" class="lux-input" placeholder="e.g. rahul@example.com">
                            </div>
                            <div class="lux-form-group">
                                <label style="display:block; font-size:12px; text-transform:uppercase; letter-spacing:1px; margin-bottom:8px; color:#666;">City / Location *</label>
                                <input type="text" name="city" class="lux-input" placeholder="e.g. Patna, Bihar" value="Patna, Bihar" required>
                            </div>
                            <div class="lux-form-group">
                                <label style="display:block; font-size:12px; text-transform:uppercase; letter-spacing:1px; margin-bottom:8px; color:#666;">Project Type *</label>
                                <select name="service" class="lux-input" required>
                                    <option value="Turnkey Project (Complete Solution)">Turnkey Project (Complete Solution)</option>
                                    <option value="Interior Design">Interior Design</option>
                                    <option value="Exterior Design & Elevation">Exterior Design & Elevation</option>
                                    <option value="Construction & Civil Build">Construction & Civil Build</option>
                                    <option value="Wooden Work & Modular Joinery">Wooden Work & Modular Joinery</option>
                                </select>
                            </div>
                            <div class="lux-form-group">
                                <label style="display:block; font-size:12px; text-transform:uppercase; letter-spacing:1px; margin-bottom:8px; color:#666;">Property Type</label>
                                <select name="property_type" class="lux-input">
                                    <option value="Home / Independent House">Home / Independent House</option>
                                    <option value="Villa / Bungalow">Villa / Bungalow</option>
                                    <option value="Apartment / Flat">Apartment / Flat</option>
                                    <option value="Office / Corporate Workspace">Office / Corporate Workspace</option>
                                    <option value="Commercial / Showroom / Cafe">Commercial / Showroom / Cafe</option>
                                </select>
                            </div>
                        </div>

                        <div class="lux-form-group" style="margin-top:20px;">
                            <label style="display:block; font-size:12px; text-transform:uppercase; letter-spacing:1px; margin-bottom:8px; color:#666;">Project Details</label>
                            <textarea name="message" class="lux-input" rows="4" placeholder="Tell us about your space, requirements, timeline, or special ideas..."></textarea>
                        </div>

                        <button type="submit" class="lux-btn lux-btn-primary" style="background:var(--lux-dark); color:#fff; width:100%; justify-content:center; border:none; margin-top:10px;">
                            Submit Enquiry <i data-lucide="send" style="width:16px;height:16px;"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- EMBEDDED MAP -->
            <div style="margin-top:80px; height:400px; background:#e0e0e0;">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14392.213795100416!2d85.1375645!3d25.6133989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ed585cb79c5337%3A0x6b77ecb2e9d29bbf!2sGandhi%20Maidan%2C%20Patna%2C%20Bihar!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin" 
                    width="100%" 
                    height="100%" 
                    style="border:0; filter: grayscale(100%) contrast(1.2);" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>

        </div>
    </section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

