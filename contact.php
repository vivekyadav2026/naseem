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

    <!-- PAGE HERO BANNER -->
    <header class="page-banner banner-contact">
        <div class="container">
            <div class="page-banner-layout">
                <div>
                    <div class="breadcrumbs">
                        <a href="index.php"><i data-lucide="home" style="width:13px;height:13px;"></i> Home</a> <span>/</span> <span>Contact Studio</span>
                    </div>
                    <div class="section-tag dark">Connect With Our Design Lead</div>
                    <h1>Let's Build Your <span class="gold-gradient">Dream Space.</span></h1>
                    <p>
                        Schedule an in-person design consultation or book a free on-site dimensional audit with our architectural engineering team in Patna.
                    </p>
                    <div class="banner-feature-pills">
                        <div class="banner-pill"><i data-lucide="clock"></i> 2-Hour Response Time</div>
                        <div class="banner-pill"><i data-lucide="map-pin"></i> Exhibition Road, Patna</div>
                        <div class="banner-pill"><i data-lucide="calendar"></i> Zero Obligation Site Visit</div>
                    </div>
                    <div class="banner-cta-group">
                        <a href="tel:+919876543210" class="btn btn-gold">
                            <i data-lucide="phone-call" style="width:15px;height:15px;"></i> Call +91 98765 43210
                        </a>
                        <a href="https://wa.me/919876543210" target="_blank" class="btn btn-outline" style="color:#fff; border-color:rgba(255,255,255,0.25);">
                            <i data-lucide="message-circle" style="width:15px;height:15px;"></i> WhatsApp Architect
                        </a>
                    </div>
                </div>

                <div>
                    <div class="banner-stat-glass">
                        <div class="banner-stat-glass-title">
                            <i data-lucide="clock" style="width:14px;height:14px;"></i> Studio Service SLA
                        </div>
                        <div class="banner-stat-grid">
                            <div class="banner-stat-item">
                                <div class="banner-stat-num">2<span>Hrs</span></div>
                                <div class="banner-stat-label">Fast Callback SLA</div>
                            </div>
                            <div class="banner-stat-item">
                                <div class="banner-stat-num">24<span>Hrs</span></div>
                                <div class="banner-stat-label">Site Measurement</div>
                            </div>
                            <div class="banner-stat-item">
                                <div class="banner-stat-num">100<span>%</span></div>
                                <div class="banner-stat-label">Free First 3D Audit</div>
                            </div>
                            <div class="banner-stat-item">
                                <div class="banner-stat-num">Patna</div>
                                <div class="banner-stat-label">& All Bihar Districts</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- CONTACT MAIN SECTION -->
    <section class="section" style="background:var(--bg);">
        <div class="container">
            
            <div style="display:grid; grid-template-columns:1fr 1.3fr; gap:48px; align-items:start;">
                
                <!-- CONTACT INFO -->
                <div>
                    <div style="background:#0F141C; color:#fff; padding:40px; border-radius:12px; border:1px solid #242D3D;">
                        <span style="font-family:'IBM Plex Mono',monospace; font-size:12px; color:var(--gold); letter-spacing:0.1em; text-transform:uppercase;">Direct Studio Desk</span>
                        <h3 style="font-size:24px; margin:10px 0 24px; font-weight:700; color:#fff;">Muskan Interiors Studio</h3>
                        <p style="color:#94A3B8; font-size:14px; margin-bottom:32px; line-height:1.6;">
                            Our senior architects and project leads are available 6 days a week to review your architectural drawings and floor plans.
                        </p>

                        <div style="display:flex; gap:18px; margin-bottom:26px; align-items:flex-start;">
                            <div style="width:44px; height:44px; background:#171E28; border:1px solid #2A3649; border-radius:8px; display:flex; align-items:center; justify-content:center; color:var(--gold); flex-shrink:0;">
                                <i data-lucide="map-pin" style="width:20px;height:20px;"></i>
                            </div>
                            <div>
                                <h4 style="font-size:15px; margin-bottom:4px; color:#fff; font-weight:600;">Studio & Experience Centre</h4>
                                <p style="font-size:13.5px; color:#94A3B8;"><?= SITE_ADDRESS ?></p>
                            </div>
                        </div>

                        <div style="display:flex; gap:18px; margin-bottom:26px; align-items:flex-start;">
                            <div style="width:44px; height:44px; background:#171E28; border:1px solid #2A3649; border-radius:8px; display:flex; align-items:center; justify-content:center; color:var(--gold); flex-shrink:0;">
                                <i data-lucide="phone-call" style="width:20px;height:20px;"></i>
                            </div>
                            <div>
                                <h4 style="font-size:15px; margin-bottom:4px; color:#fff; font-weight:600;">Call Our Engineers</h4>
                                <p style="font-size:13.5px; color:#94A3B8;"><a href="tel:<?= SITE_PHONE_1 ?>" style="color:var(--gold); text-decoration:none; font-family:'IBM Plex Mono',monospace;"><?= SITE_PHONE_1 ?></a></p>
                                <p style="font-size:13.5px; color:#94A3B8;"><a href="tel:<?= SITE_PHONE_2 ?>" style="color:var(--gold); text-decoration:none; font-family:'IBM Plex Mono',monospace;"><?= SITE_PHONE_2 ?></a></p>
                            </div>
                        </div>

                        <div style="display:flex; gap:18px; margin-bottom:26px; align-items:flex-start;">
                            <div style="width:44px; height:44px; background:#171E28; border:1px solid #2A3649; border-radius:8px; display:flex; align-items:center; justify-content:center; color:var(--gold); flex-shrink:0;">
                                <i data-lucide="mail" style="width:20px;height:20px;"></i>
                            </div>
                            <div>
                                <h4 style="font-size:15px; margin-bottom:4px; color:#fff; font-weight:600;">Official Inquiries</h4>
                                <p style="font-size:13.5px; color:#94A3B8;"><a href="mailto:<?= SITE_EMAIL ?>" style="color:#94A3B8; text-decoration:none;"><?= SITE_EMAIL ?></a></p>
                            </div>
                        </div>

                        <div style="display:flex; gap:18px; margin-bottom:26px; align-items:flex-start;">
                            <div style="width:44px; height:44px; background:#171E28; border:1px solid #2A3649; border-radius:8px; display:flex; align-items:center; justify-content:center; color:var(--gold); flex-shrink:0;">
                                <i data-lucide="clock" style="width:20px;height:20px;"></i>
                            </div>
                            <div>
                                <h4 style="font-size:15px; margin-bottom:4px; color:#fff; font-weight:600;">Studio Hours</h4>
                                <p style="font-size:13.5px; color:#94A3B8;">Mon – Sat: 9:30 AM – 7:30 PM<br>Sunday: By Prior Appointment</p>
                            </div>
                        </div>

                        <div style="margin-top:32px; padding-top:20px; border-top:1px solid #242D3D; display:flex; gap:12px;">
                            <a href="https://wa.me/919876543210?text=Hello%20Muskan%20Interiors,%20I%20want%20to%20consult%20for%20my%20property." target="_blank" class="btn btn-gold btn-sm" style="flex:1; justify-content:center;">
                                <i data-lucide="message-circle" style="width:16px;height:16px;"></i> WhatsApp Studio
                            </a>
                        </div>
                    </div>
                </div>

                <!-- CONTACT FORM -->
                <div>
                    <div style="background:#fff; border:1px solid var(--border); border-radius:12px; padding:40px; box-shadow:0 10px 30px rgba(0,0,0,0.03);">
                        <div style="margin-bottom:24px;">
                            <span style="font-family:'IBM Plex Mono',monospace; font-size:12px; color:var(--gold); font-weight:600; text-transform:uppercase;">Quick Response Guarantee</span>
                            <h3 style="font-size:24px; margin-top:4px; font-weight:700; color:#0F141C;">Book Free Site Consultation</h3>
                            <p style="color:#64748B; font-size:14px;">Fill out this form and our senior architect will call you within 2 hours.</p>
                        </div>

                        <?php if (!empty($successMsg)): ?>
                            <div style="background:rgba(16,185,129,0.12); border:1px solid rgba(16,185,129,0.3); color:#047857; padding:16px 20px; border-radius:8px; margin-bottom:24px; font-size:14px; display:flex; align-items:center; gap:10px;">
                                <i data-lucide="check-circle" style="width:20px;height:20px;flex-shrink:0;"></i>
                                <span><?= $successMsg ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($errorMsg)): ?>
                            <div style="background:rgba(239,68,68,0.12); border:1px solid rgba(239,68,68,0.3); color:#DC2626; padding:16px 20px; border-radius:8px; margin-bottom:24px; font-size:14px; display:flex; align-items:center; gap:10px;">
                                <i data-lucide="alert-circle" style="width:20px;height:20px;flex-shrink:0;"></i>
                                <span><?= htmlspecialchars($errorMsg) ?></span>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="">
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
                                <div class="form-group">
                                    <label class="form-label">Full Name *</label>
                                    <input type="text" name="name" class="form-control" placeholder="e.g. Rahul Sharma" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Phone Number *</label>
                                    <input type="tel" name="phone" class="form-control" placeholder="e.g. +91 98765 43210" required>
                                </div>
                            </div>

                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
                                <div class="form-group">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" name="email" class="form-control" placeholder="e.g. rahul@example.com">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">City / Location *</label>
                                    <input type="text" name="city" class="form-control" placeholder="e.g. Patna, Bihar" value="Patna, Bihar" required>
                                </div>
                            </div>

                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
                                <div class="form-group">
                                    <label class="form-label">Project Type *</label>
                                    <select name="service" class="form-control" required>
                                        <option value="Turnkey Project (Complete Solution)">Turnkey Project (Complete Solution)</option>
                                        <option value="Interior Design">Interior Design</option>
                                        <option value="Exterior Design & Elevation">Exterior Design & Elevation</option>
                                        <option value="Construction & Civil Build">Construction & Civil Build</option>
                                        <option value="Wooden Work & Modular Joinery">Wooden Work & Modular Joinery</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Property Type</label>
                                    <select name="property_type" class="form-control">
                                        <option value="Home / Independent House">Home / Independent House</option>
                                        <option value="Villa / Bungalow">Villa / Bungalow</option>
                                        <option value="Apartment / Flat">Apartment / Flat</option>
                                        <option value="Office / Corporate Workspace">Office / Corporate Workspace</option>
                                        <option value="Commercial / Showroom / Cafe">Commercial / Showroom / Cafe</option>
                                    </select>
                                </div>
                            </div>

                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
                                <div class="form-group">
                                    <label class="form-label">Approx. Budget</label>
                                    <select name="budget" class="form-control">
                                        <option value="₹10 Lakhs - ₹25 Lakhs" selected>₹10 Lakhs - ₹25 Lakhs</option>
                                        <option value="₹25 Lakhs - ₹50 Lakhs">₹25 Lakhs - ₹50 Lakhs</option>
                                        <option value="₹50 Lakhs - ₹1 Crore">₹50 Lakhs - ₹1 Crore</option>
                                        <option value="Above ₹1 Crore">Above ₹1 Crore</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Carpet Area (Optional)</label>
                                    <input type="text" name="area" class="form-control" placeholder="e.g. 1,650 sq ft">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Project Details</label>
                                <textarea name="message" class="form-control" rows="3" placeholder="Tell us about your space, requirements, timeline, or special ideas..."></textarea>
                            </div>

                            <button type="submit" class="btn btn-gold" style="width:100%; justify-content:center; padding:15px; font-size:15px;">
                                Submit Enquiry <i data-lucide="send" style="width:16px;height:16px;"></i>
                            </button>
                        </form>
                    </div>
                </div>

            </div>

            <!-- EMBEDDED MAP -->
            <div style="margin-top:60px; border-radius:12px; overflow:hidden; border:1px solid var(--border); height:360px; background:#171E28;">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14392.213795100416!2d85.1375645!3d25.6133989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ed585cb79c5337%3A0x6b77ecb2e9d29bbf!2sGandhi%20Maidan%2C%20Patna%2C%20Bihar!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin" 
                    width="100%" 
                    height="100%" 
                    style="border:0; filter: contrast(1.1) grayscale(0.2);" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>

        </div>
    </section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
