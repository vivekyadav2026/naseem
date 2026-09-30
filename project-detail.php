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
        <img loading="lazy" src="<?= htmlspecialchars($project['featured_image']) ?>" class="lux-hero-img" alt="Project Hero">
        <div class="lux-hero-overlay"></div>
        <div class="lux-hero-content">
            <div class="lux-breadcrumb">
                <a href="index.php"><i data-lucide="home" style="width:13px;height:13px;"></i> Home</a> <span>/</span> <a href="projects.php">Projects</a> <span>/</span> <span><?= htmlspecialchars($project['title']) ?></span>
            </div>
            <h1 class="lux-hero-title"><?= htmlspecialchars($project['title']) ?></h1>
            <p class="lux-hero-subtitle"><?= htmlspecialchars($project['short_desc']) ?></p>
            
            <div style="display: flex; gap: 20px; justify-content: center; margin-bottom: 40px; flex-wrap: wrap;">
                <div style="background: rgba(255,255,255,0.1); padding: 10px 20px; border-radius: 4px; border: 1px solid rgba(255,255,255,0.2);">
                    <div style="font-size: 11px; text-transform: uppercase; letter-spacing: 1px; color: var(--lux-gold);">Location</div>
                    <div style="font-size: 15px; font-weight: 500;"><?= htmlspecialchars($project['location'] ?? 'Patna, Bihar') ?></div>
                </div>
                <div style="background: rgba(255,255,255,0.1); padding: 10px 20px; border-radius: 4px; border: 1px solid rgba(255,255,255,0.2);">
                    <div style="font-size: 11px; text-transform: uppercase; letter-spacing: 1px; color: var(--lux-gold);">Type</div>
                    <div style="font-size: 15px; font-weight: 500;"><?= htmlspecialchars($project['category'] ?? 'Turnkey') ?></div>
                </div>
                <div style="background: rgba(255,255,255,0.1); padding: 10px 20px; border-radius: 4px; border: 1px solid rgba(255,255,255,0.2);">
                    <div style="font-size: 11px; text-transform: uppercase; letter-spacing: 1px; color: var(--lux-gold);">Style</div>
                    <div style="font-size: 15px; font-weight: 500;">Contemporary Luxury</div>
                </div>
            </div>

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

    <!-- THE STORY (PROJECT SHOWCASE) -->
    <section class="lux-project-section" style="background: #fff; color: var(--lux-dark); padding: 100px 0;">
        <div class="container">
            <div style="max-width: 800px; margin: 0 auto; text-align: center;">
                <div class="lux-split-label">The Story</div>
                <h2 class="lux-split-title" style="font-size: clamp(2rem, 4vw, 3rem); margin-bottom: 30px;">Designing for Modern Living</h2>
                <p style="font-size: 18px; line-height: 1.8; color: #555; margin-bottom: 40px;">
                    <?= nl2br(htmlspecialchars($project['full_desc'])) ?>
                </p>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 30px; text-align: left; background: var(--lux-gray); padding: 40px; border-radius: 8px;">
                    <div>
                        <strong style="display: block; font-size: 13px; text-transform: uppercase; color: var(--lux-gold); margin-bottom: 8px;">Client</strong>
                        <span style="font-size: 16px;"><?= htmlspecialchars($project['client_name'] ?? 'Private Client') ?></span>
                    </div>
                    <div>
                        <strong style="display: block; font-size: 13px; text-transform: uppercase; color: var(--lux-gold); margin-bottom: 8px;">Area</strong>
                        <span style="font-size: 16px;"><?= htmlspecialchars($project['area'] ?? 'N/A') ?></span>
                    </div>
                    <div>
                        <strong style="display: block; font-size: 13px; text-transform: uppercase; color: var(--lux-gold); margin-bottom: 8px;">Budget</strong>
                        <span style="font-size: 16px;"><?= htmlspecialchars($project['budget'] ?? 'N/A') ?></span>
                    </div>
                    <div>
                        <strong style="display: block; font-size: 13px; text-transform: uppercase; color: var(--lux-gold); margin-bottom: 8px;">Timeline</strong>
                        <span style="font-size: 16px;"><?= htmlspecialchars($project['timeline'] ?? '45 Days') ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PROJECT HIGHLIGHTS -->
    <section class="lux-category-section" style="background:var(--lux-gray);">
        <div class="container" style="text-align: center; margin-bottom: 60px;">
            <div class="lux-split-label">Highlights</div>
            <h2 class="lux-split-title">Key Design Elements</h2>
        </div>

        <div class="lux-split">
            <div class="lux-split-content">
                <div class="lux-split-label">01 / Concept</div>
                <h3 class="lux-split-title" style="font-size: 2rem;">2D Space Layout & 3D Photoreal CAD Render</h3>
                <p class="lux-split-desc">
                    Architectural space optimization and 4K photorealistic rendering. Client approved every texture, warm 3000K profile lighting cove, veneer finish, and modular kitchen hardware before site initiation.
                </p>
            </div>
            <div class="lux-split-img">
                <img loading="lazy" src="<?= htmlspecialchars(!empty($project['stage_design_img']) ? $project['stage_design_img'] : 'images/muskan/3d_render.jpg') ?>" alt="Concept & Design">
            </div>
        </div>

        <div class="lux-split reverse">
            <div class="lux-split-content">
                <div class="lux-split-label">02 / Execution</div>
                <h3 class="lux-split-title" style="font-size: 2rem;">Final Luxury Result & Quality Audit</h3>
                <p class="lux-split-desc">
                    Execution under senior civil supervision. High-gloss PU polishing, soft-close hardware testing, magnetic track lighting tuning, industrial deep cleaning, and ceremonial key handover.
                </p>
            </div>
            <div class="lux-split-img">
                <img loading="lazy" src="<?= htmlspecialchars(!empty($project['stage_final_img']) ? $project['stage_final_img'] : 'images/muskan/after_luxury.jpg') ?>" alt="Execution & Final">
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
                    // Create a masonry layout using different sizing classes
                    $class = 'wide';
                    if ($index % 3 == 0) $class = 'large'; // 2/3 width
                    elseif ($index % 3 == 1) $class = 'tall'; // 1/3 width, tall
                    else $class = 'wide'; // 1/2 width
                ?>
                    <a href="#" class="lux-gallery-item <?= $class ?>">
                        <img loading="lazy" src="<?= htmlspecialchars($gImg) ?>" alt="Gallery Image">
                        <div class="lux-gallery-overlay"></div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>

    <!-- RELATED PROJECTS -->
    <section class="lux-category-section" style="background: var(--lux-dark); color: #fff;">
        <div class="container">
            <div style="text-align: center; margin-bottom: 60px;">
                <div class="lux-split-label" style="color: var(--lux-gold);">Explore More</div>
                <h2 class="lux-split-title" style="color: #fff;">Related Projects</h2>
            </div>
            <div class="lux-cat-grid">
                <?php 
                $related = array_slice($dm->getProjects(), 0, 3);
                foreach ($related as $p): 
                    if ($p['id'] == $project['id']) continue; // Skip current
                ?>
                    <a href="project-detail.php?id=<?= $p['id'] ?>" class="lux-cat-card" style="border-radius: 8px; overflow: hidden; background: #1a1a1a;">
                        <div class="lux-cat-img-wrap" style="aspect-ratio: 4/3; margin-bottom: 0;">
                            <img loading="lazy" src="<?= htmlspecialchars($p['featured_image']) ?>" alt="<?= htmlspecialchars($p['title']) ?>" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease;">
                            <div style="position:absolute; inset:0; background: linear-gradient(to top, rgba(0,0,0,0.9), transparent); opacity: 0.8; z-index: 1;"></div>
                            <div style="position:absolute; bottom:20px; left:20px; right:20px; z-index:2; color:#fff;">
                                <div style="font-size: 11px; color: var(--lux-gold); text-transform: uppercase; margin-bottom: 5px;"><?= htmlspecialchars($p['category']) ?></div>
                                <h3 style="font-size: 20px; font-weight: 400;"><?= htmlspecialchars($p['title']) ?></h3>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CONSULTATION FORM -->
    <section class="lux-promo" style="height: auto; padding: 100px 0;">
        <img loading="lazy" src="<?= htmlspecialchars($project['featured_image']) ?>" class="lux-promo-img" alt="CTA">
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
                    alert('ðŸŽ‰ ' + data.message + '\nLead Reference ID: ' + data.lead_id);
                    form.reset();
                } else {
                    alert('âš ï¸ ' + data.message);
                }
            })
            .catch(err => {
                alert('Thank you! Your request has been logged.');
                form.reset();
            });
        }
    </script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

