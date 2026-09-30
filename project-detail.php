<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/db.php';

$dm = DataManager::getInstance();
$id = $_GET['id'] ?? '';
$slug = $_GET['slug'] ?? '';

$project = null;
if (!empty($id)) {
    $project = $dm->getProjectById($id);
} elseif (!empty($slug)) {
    $project = $dm->getProjectBySlug($slug);
}

if (!$project) {
    // Default to first project
    $all = $dm->getProjects();
    $project = !empty($all) ? $all[0] : null;
}

if (!$project) {
    header('Location: projects.php');
    exit;
}

$pageTitle = $project['title'] . ' — Visual Journey Case Study';
$pageDesc = $project['short_desc'];
require_once __DIR__ . '/includes/header.php';

$gallery = is_array($project['gallery_images'] ?? null) ? $project['gallery_images'] : json_decode($project['gallery_images'] ?? '[]', true);
?>

    <!-- PROJECT HEADER BANNER -->
    <header class="lux-hero">
        <img src="<?= htmlspecialchars($project['featured_image']) ?>" class="lux-hero-img" alt="Project Hero">
        <div class="lux-hero-overlay"></div>
        <div class="lux-hero-content">
            <div class="lux-breadcrumb">
                <a href="index.php"><i data-lucide="home" style="width:13px;height:13px;"></i> Home</a> <span>/</span> <a href="projects.php">Projects</a> <span>/</span> <span><?= htmlspecialchars($project['title']) ?></span>
            </div>
            <h1 class="lux-hero-title"><?= htmlspecialchars($project['title']) ?></h1>
            <p class="lux-hero-subtitle"><?= htmlspecialchars($project['short_desc']) ?></p>
            
            <div class="lux-btn-group">
                <a href="contact.php" class="lux-btn lux-btn-primary">
                    <i data-lucide="phone" style="width:15px;height:15px;"></i> Contact Studio
                </a>
                <a href="<?= SITE_WHATSAPP_LINK ?>" target="_blank" rel="noopener noreferrer" class="lux-btn lux-btn-outline">
                    <i data-lucide="message-circle" style="width:15px;height:15px;"></i> WhatsApp Enquiry
                </a>
            </div>
        </div>
    </header>

    <!-- PROJECT SHOWCASE / INFO -->
    <section class="lux-project-section">
        <div class="lux-project-featured">
            <div class="lux-project-info">
                <div class="lux-split-label">Project Details</div>
                <h3 style="font-size: 28px; margin-bottom: 20px; font-weight: 300;">Scope & Execution</h3>
                <p style="color: #666; margin-bottom: 20px;">
                    <strong>Client:</strong> <?= htmlspecialchars($project['client_name'] ?? 'Private Client') ?><br>
                    <strong>Location:</strong> <?= htmlspecialchars($project['location'] ?? 'Patna, Bihar') ?><br>
                    <strong>Area:</strong> <?= htmlspecialchars($project['area'] ?? 'N/A') ?><br>
                    <strong>Budget:</strong> <?= htmlspecialchars($project['budget'] ?? 'N/A') ?><br>
                    <strong>Timeline:</strong> <?= htmlspecialchars($project['timeline'] ?? '45 Days') ?>
                </p>
                <p style="color: #666; line-height: 1.6;">
                    <?= nl2br(htmlspecialchars($project['full_desc'])) ?>
                </p>
            </div>
            <div class="lux-project-img-wrapper">
                <img src="<?= htmlspecialchars(!empty($project['stage_final_img']) ? $project['stage_final_img'] : 'images/muskan/after_luxury.jpg') ?>" alt="Project Final">
            </div>
        </div>
    </section>

    <!-- 4-STAGE VISUAL TRANSFORMATION TIMELINE -->
    <section class="lux-category-section" style="background:var(--lux-gray);">
        <div class="container" style="text-align: center; margin-bottom: 60px;">
            <div class="lux-split-label">Complete Visual Timeline</div>
            <h2 class="lux-split-title">The 4-Stage Transformation Journey</h2>
        </div>

        <div class="lux-split">
            <div class="lux-split-content">
                <div class="lux-split-label">STAGE 01</div>
                <h3 class="lux-split-title" style="font-size: 2rem;">Initial Site Condition & Dimensional Audit</h3>
                <p class="lux-split-desc">
                    Laser measurement audit, structural column check, load-bearing assessments, and MEP electrical/plumbing conduit mapping. Identification of dampness, wall relocations, and ceiling heights.
                </p>
            </div>
            <div class="lux-split-img">
                <img src="<?= htmlspecialchars(!empty($project['stage_before_img']) ? $project['stage_before_img'] : 'images/muskan/before_raw.jpg') ?>" alt="Stage 1 Raw Site">
            </div>
        </div>

        <div class="lux-split reverse">
            <div class="lux-split-content">
                <div class="lux-split-label">STAGE 02</div>
                <h3 class="lux-split-title" style="font-size: 2rem;">2D Space Layout & 3D Photoreal CAD Render</h3>
                <p class="lux-split-desc">
                    Architectural space optimization and 4K photorealistic rendering. Client approved every texture, warm 3000K profile lighting cove, veneer finish, and modular kitchen hardware before site initiation.
                </p>
            </div>
            <div class="lux-split-img">
                <img src="<?= htmlspecialchars(!empty($project['stage_design_img']) ? $project['stage_design_img'] : 'images/muskan/3d_render.jpg') ?>" alt="Stage 2 3D Render">
            </div>
        </div>

        <div class="lux-split">
            <div class="lux-split-content">
                <div class="lux-split-label">STAGE 03</div>
                <h3 class="lux-split-title" style="font-size: 2rem;">Civil, MEP & Precision Carpentry Execution</h3>
                <p class="lux-split-desc">
                    Execution under senior civil supervision. Concealed electrical wiring, gypsum false ceiling grids, BWP 710 marine ply carcass construction, plumbing lines, and Italian marble laying.
                </p>
            </div>
            <div class="lux-split-img">
                <img src="<?= htmlspecialchars(!empty($project['stage_execution_img']) ? $project['stage_execution_img'] : 'images/muskan/real_execution.jpg') ?>" alt="Stage 3 Civil Execution">
            </div>
        </div>

        <div class="lux-split reverse">
            <div class="lux-split-content">
                <div class="lux-split-label">STAGE 04</div>
                <h3 class="lux-split-title" style="font-size: 2rem;">Final Luxury Result & 100-Point Quality Audit</h3>
                <p class="lux-split-desc">
                    High-gloss PU polishing, soft-close hardware testing, magnetic track lighting tuning, industrial deep cleaning, and ceremonial key handover with comprehensive warranty documents.
                </p>
            </div>
            <div class="lux-split-img">
                <img src="<?= htmlspecialchars(!empty($project['stage_final_img']) ? $project['stage_final_img'] : 'images/muskan/after_luxury.jpg') ?>" alt="Stage 4 Final Result">
            </div>
        </div>
    </section>

    <!-- FULL SCOPE & GALLERY -->
    <section class="lux-gallery-section" style="background:#fff;">
        <div class="container" style="text-align: center; margin-bottom: 60px;">
            <div class="lux-split-label">Visual Archive</div>
            <h2 class="lux-split-title">Project Gallery</h2>
        </div>
        
        <?php 
        $embedVideo = !empty($project['youtube_url']) ? getYoutubeEmbedUrl($project['youtube_url']) : '';
        if (!empty($embedVideo)): 
        ?>
            <div class="container" style="margin-bottom: 60px;">
                <div style="position:relative; padding-bottom:56.25%; height:0; overflow:hidden; border-radius:12px; background:#000;">
                    <iframe src="<?= htmlspecialchars($embedVideo) ?>" title="Project Video Walkthrough" style="position:absolute; top:0; left:0; width:100%; height:100%; border:0;" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!empty($gallery)): ?>
            <div class="lux-gallery-grid">
                <?php foreach ($gallery as $index => $gImg): 
                    $class = 'tall';
                    if ($index % 4 == 0) $class = 'large';
                    elseif ($index % 4 == 1) $class = 'wide';
                ?>
                    <a href="#" class="lux-gallery-item <?= $class ?>">
                        <img src="<?= htmlspecialchars($gImg) ?>" alt="Gallery Image">
                        <div class="lux-gallery-overlay"></div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>

    <!-- CONSULTATION FORM -->
    <section class="lux-promo" style="height: auto; padding: 100px 0;">
        <img src="<?= htmlspecialchars($project['featured_image']) ?>" class="lux-promo-img" alt="CTA">
        <div class="lux-promo-overlay" style="background: rgba(0,0,0,0.8);"></div>
        <div class="lux-promo-content" style="max-width: 600px; margin: 0 auto; background: #fff; padding: 40px; border-radius: 8px; color: var(--lux-text);">
            <div class="lux-split-label" style="text-align: center;">Want a Similar Space?</div>
            <h3 class="lux-split-title" style="text-align: center; font-size: 2rem;">Start Your Turnkey Project</h3>
            <form id="projectSideForm" onsubmit="handleGeneralFormSubmit(event, 'projectSideForm')">
                <input type="hidden" name="source" value="Project Detail: <?= htmlspecialchars($project['title']) ?>">
                <input type="hidden" name="service" value="<?= htmlspecialchars($project['category']) ?>">
                <div class="lux-form-group">
                    <input type="text" name="name" class="lux-input" placeholder="Your Name" required>
                </div>
                <div class="lux-form-group">
                    <input type="tel" name="phone" class="lux-input" placeholder="Mobile Number" required>
                </div>
                <div class="lux-form-group">
                    <input type="text" name="area" class="lux-input" placeholder="Carpet Area (e.g. 1800 sq ft)">
                </div>
                <button type="submit" class="lux-btn lux-btn-primary" style="width: 100%; justify-content: center; background: var(--lux-gold); color: #fff; border: none;">
                    Book Free Consultation
                </button>
            </form>
        </div>
    </section>

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
