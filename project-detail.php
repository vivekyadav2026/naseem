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
    <header class="page-banner banner-detail" style="background-image: url('<?= htmlspecialchars($project['featured_image']) ?>');">
        <div class="container">
            <div class="page-banner-layout">
                <div>
                    <div class="breadcrumbs">
                        <a href="index.php"><i data-lucide="home" style="width:13px;height:13px;"></i> Home</a> <span>/</span> <a href="projects.php">Projects</a> <span>/</span> <span><?= htmlspecialchars($project['title']) ?></span>
                    </div>
                    <div class="section-tag dark"><?= htmlspecialchars($project['category']) ?> &bull; Case Study</div>
                    <h1><?= htmlspecialchars($project['title']) ?></h1>
                    <p><?= htmlspecialchars($project['short_desc']) ?></p>
                    <div class="banner-feature-pills">
                        <div class="banner-pill"><i data-lucide="map-pin"></i> <?= htmlspecialchars($project['location'] ?? 'Patna') ?></div>
                        <div class="banner-pill"><i data-lucide="maximize"></i> <?= htmlspecialchars($project['area'] ?? 'N/A') ?></div>
                        <div class="banner-pill"><i data-lucide="clock"></i> <?= htmlspecialchars($project['timeline'] ?? '45 Days') ?></div>
                        <div class="banner-pill"><i data-lucide="check-circle-2"></i> <?= htmlspecialchars($project['status'] ?? 'Completed') ?></div>
                    </div>
                    <div class="banner-cta-group">
                        <a href="quote.php" class="btn btn-gold">
                            <i data-lucide="calculator" style="width:15px;height:15px;"></i> Get Similar Space Estimate
                        </a>
                        <a href="contact.php" class="btn btn-outline" style="color:#fff; border-color:rgba(255,255,255,0.25);">
                            <i data-lucide="calendar" style="width:15px;height:15px;"></i> Book Site Consultation
                        </a>
                    </div>
                </div>

                <div>
                    <div class="banner-stat-glass">
                        <div class="banner-stat-glass-title">
                            <i data-lucide="sparkles" style="width:14px;height:14px;"></i> Project Details
                        </div>
                        <div class="banner-stat-grid">
                            <div class="banner-stat-item">
                                <div class="banner-stat-num" style="font-size:16px;"><?= htmlspecialchars($project['budget'] ?? 'On Request') ?></div>
                                <div class="banner-stat-label">Project Budget</div>
                            </div>
                            <div class="banner-stat-item">
                                <div class="banner-stat-num" style="font-size:16px;"><?= htmlspecialchars($project['area'] ?? 'N/A') ?></div>
                                <div class="banner-stat-label">Covered Area</div>
                            </div>
                            <div class="banner-stat-item">
                                <div class="banner-stat-num" style="font-size:16px;"><?= htmlspecialchars($project['timeline'] ?? '45 Days') ?></div>
                                <div class="banner-stat-label">Execution Time</div>
                            </div>
                            <div class="banner-stat-item">
                                <div class="banner-stat-num" style="font-size:16px;"><?= htmlspecialchars($project['client_name'] ?? 'Private') ?></div>
                                <div class="banner-stat-label">Client</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- PROJECT METRIC STRIP -->
    <section style="background:#0F141C; color:#fff; padding:32px 0; border-bottom:1px solid #1F293D;">
        <div class="container">
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(180px, 1fr)); gap:24px;">
                <div>
                    <span style="font-size:11px; color:#94A3B8; text-transform:uppercase; font-family:'IBM Plex Mono',monospace;">Client Name</span>
                    <h4 style="font-size:16px; color:#fff; font-weight:700; margin-top:4px;"><?= htmlspecialchars($project['client_name'] ?? 'Private Client') ?></h4>
                </div>
                <div>
                    <span style="font-size:11px; color:#94A3B8; text-transform:uppercase; font-family:'IBM Plex Mono',monospace;">Project Location</span>
                    <h4 style="font-size:16px; color:#fff; font-weight:700; margin-top:4px;"><?= htmlspecialchars($project['location'] ?? 'Patna, Bihar') ?></h4>
                </div>
                <div>
                    <span style="font-size:11px; color:#94A3B8; text-transform:uppercase; font-family:'IBM Plex Mono',monospace;">Carpet Area</span>
                    <h4 style="font-size:16px; color:#fff; font-weight:700; margin-top:4px;"><?= htmlspecialchars($project['area'] ?? 'N/A') ?></h4>
                </div>
                <div>
                    <span style="font-size:11px; color:#94A3B8; text-transform:uppercase; font-family:'IBM Plex Mono',monospace;">Project Budget</span>
                    <h4 style="font-size:16px; color:var(--gold); font-weight:700; font-family:'IBM Plex Mono',monospace; margin-top:4px;"><?= htmlspecialchars($project['budget'] ?? 'N/A') ?></h4>
                </div>
                <div>
                    <span style="font-size:11px; color:#94A3B8; text-transform:uppercase; font-family:'IBM Plex Mono',monospace;">Execution Duration</span>
                    <h4 style="font-size:16px; color:#fff; font-weight:700; margin-top:4px;"><?= htmlspecialchars($project['timeline'] ?? '45 Days') ?></h4>
                </div>
            </div>
        </div>
    </section>

    <!-- 4-STAGE VISUAL TRANSFORMATION TIMELINE -->
    <section class="section" style="background:var(--bg);">
        <div class="container">
            <div class="section-header text-center" style="max-width:760px; margin:0 auto 60px;">
                <div class="section-tag">Complete Visual Timeline</div>
                <h2 class="section-title">The 4-Stage Transformation Journey</h2>
                <p class="section-desc">Experience how this project transitioned from raw civil structure to photorealistic 3D CAD, precision joinery, and final luxury handover.</p>
            </div>

            <!-- STAGE 1 -->
            <div style="background:#fff; border:1px solid var(--border); border-radius:12px; overflow:hidden; margin-bottom:40px; display:grid; grid-template-columns:1fr 1.2fr; gap:36px; align-items:center;">
                <div style="height:320px; overflow:hidden;">
                    <img src="<?= htmlspecialchars(!empty($project['stage_before_img']) ? $project['stage_before_img'] : 'images/muskan/before_raw.jpg') ?>" alt="Stage 1 Raw Site" style="width:100%; height:100%; object-fit:cover;">
                </div>
                <div style="padding:32px 32px 32px 0;">
                    <span style="font-family:'IBM Plex Mono',monospace; font-size:12px; color:var(--gold); font-weight:700; letter-spacing:0.1em; text-transform:uppercase;">STAGE 01</span>
                    <h3 style="font-size:24px; font-weight:700; margin:6px 0 14px; color:#0F141C;">Initial Site Condition & Dimensional Audit</h3>
                    <p style="color:#64748B; font-size:14.5px; line-height:1.7; margin-bottom:16px;">
                        Laser measurement audit, structural column check, load-bearing assessments, and MEP electrical/plumbing conduit mapping. Identification of dampness, wall relocations, and ceiling heights.
                    </p>
                    <div style="display:flex; gap:14px; flex-wrap:wrap; font-size:13px; color:#475569;">
                        <span><i data-lucide="check" style="width:14px;height:14px;color:var(--gold);display:inline;"></i> Laser Dimensional Scan</span>
                        <span><i data-lucide="check" style="width:14px;height:14px;color:var(--gold);display:inline;"></i> Structural Integrity Check</span>
                    </div>
                </div>
            </div>

            <!-- STAGE 2 -->
            <div style="background:#fff; border:1px solid var(--border); border-radius:12px; overflow:hidden; margin-bottom:40px; display:grid; grid-template-columns:1.2fr 1fr; gap:36px; align-items:center;">
                <div style="padding:32px 0 32px 32px;">
                    <span style="font-family:'IBM Plex Mono',monospace; font-size:12px; color:var(--gold); font-weight:700; letter-spacing:0.1em; text-transform:uppercase;">STAGE 02</span>
                    <h3 style="font-size:24px; font-weight:700; margin:6px 0 14px; color:#0F141C;">2D Space Layout & 3D Photoreal CAD Render</h3>
                    <p style="color:#64748B; font-size:14.5px; line-height:1.7; margin-bottom:16px;">
                        Architectural space optimization and 4K photorealistic rendering. Client approved every texture, warm 3000K profile lighting cove, veneer finish, and modular kitchen hardware before site initiation.
                    </p>
                    <div style="display:flex; gap:14px; flex-wrap:wrap; font-size:13px; color:#475569;">
                        <span><i data-lucide="check" style="width:14px;height:14px;color:var(--gold);display:inline;"></i> 4K 3D Photoreal Walkthrough</span>
                        <span><i data-lucide="check" style="width:14px;height:14px;color:var(--gold);display:inline;"></i> Material Board Approval</span>
                    </div>
                </div>
                <div style="height:320px; overflow:hidden;">
                    <img src="<?= htmlspecialchars(!empty($project['stage_design_img']) ? $project['stage_design_img'] : 'images/muskan/3d_render.jpg') ?>" alt="Stage 2 3D Render" style="width:100%; height:100%; object-fit:cover;">
                </div>
            </div>

            <!-- STAGE 3 -->
            <div style="background:#fff; border:1px solid var(--border); border-radius:12px; overflow:hidden; margin-bottom:40px; display:grid; grid-template-columns:1fr 1.2fr; gap:36px; align-items:center;">
                <div style="height:320px; overflow:hidden;">
                    <img src="<?= htmlspecialchars(!empty($project['stage_execution_img']) ? $project['stage_execution_img'] : 'images/muskan/real_execution.jpg') ?>" alt="Stage 3 Civil Execution" style="width:100%; height:100%; object-fit:cover;">
                </div>
                <div style="padding:32px 32px 32px 0;">
                    <span style="font-family:'IBM Plex Mono',monospace; font-size:12px; color:var(--gold); font-weight:700; letter-spacing:0.1em; text-transform:uppercase;">STAGE 03</span>
                    <h3 style="font-size:24px; font-weight:700; margin:6px 0 14px; color:#0F141C;">Civil, MEP & Precision Carpentry Execution</h3>
                    <p style="color:#64748B; font-size:14.5px; line-height:1.7; margin-bottom:16px;">
                        Execution under senior civil supervision. Concealed electrical wiring, gypsum false ceiling grids, BWP 710 marine ply carcass construction, plumbing lines, and Italian marble laying.
                    </p>
                    <div style="display:flex; gap:14px; flex-wrap:wrap; font-size:13px; color:#475569;">
                        <span><i data-lucide="check" style="width:14px;height:14px;color:var(--gold);display:inline;"></i> Gurjan 710 Plywood Joinery</span>
                        <span><i data-lucide="check" style="width:14px;height:14px;color:var(--gold);display:inline;"></i> Daily Supervisor Audits</span>
                    </div>
                </div>
            </div>

            <!-- STAGE 4 -->
            <div style="background:#fff; border:1px solid var(--border); border-radius:12px; overflow:hidden; margin-bottom:40px; display:grid; grid-template-columns:1.2fr 1fr; gap:36px; align-items:center;">
                <div style="padding:32px 0 32px 32px;">
                    <span style="font-family:'IBM Plex Mono',monospace; font-size:12px; color:var(--gold); font-weight:700; letter-spacing:0.1em; text-transform:uppercase;">STAGE 04</span>
                    <h3 style="font-size:24px; font-weight:700; margin:6px 0 14px; color:#0F141C;">Final Luxury Result & 100-Point Quality Audit</h3>
                    <p style="color:#64748B; font-size:14.5px; line-height:1.7; margin-bottom:16px;">
                        High-gloss PU polishing, soft-close hardware testing, magnetic track lighting tuning, industrial deep cleaning, and ceremonial key handover with comprehensive warranty documents.
                    </p>
                    <div style="display:flex; gap:14px; flex-wrap:wrap; font-size:13px; color:#475569;">
                        <span><i data-lucide="check" style="width:14px;height:14px;color:var(--gold);display:inline;"></i> 100-Point Handover Audit</span>
                        <span><i data-lucide="check" style="width:14px;height:14px;color:var(--gold);display:inline;"></i> 10-Year Hardware Warranty</span>
                    </div>
                </div>
                <div style="height:320px; overflow:hidden;">
                    <img src="<?= htmlspecialchars(!empty($project['stage_final_img']) ? $project['stage_final_img'] : 'images/muskan/after_luxury.jpg') ?>" alt="Stage 4 Final Result" style="width:100%; height:100%; object-fit:cover;">
                </div>
            </div>

        </div>
    </section>

    <!-- FULL SCOPE & GALLERY -->
    <section class="section" style="background:#fff; border-top:1px solid var(--border);">
        <div class="container">
            <div style="display:grid; grid-template-columns:1.6fr 1fr; gap:48px;">
                
                <div>
                    <h3 style="font-size:22px; font-weight:700; color:#0F141C; margin-bottom:16px;">Architectural Scope & Engineering Overview</h3>
                    <div style="font-size:15px; color:#475569; line-height:1.8; margin-bottom:30px;">
                        <?= nl2br(htmlspecialchars($project['full_desc'])) ?>
                    </div>

                    <?php if (!empty($gallery)): ?>
                        <h4 style="font-size:18px; font-weight:700; color:#0F141C; margin-bottom:16px;">Project Photo Gallery</h4>
                        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:16px;">
                            <?php foreach ($gallery as $gImg): ?>
                                <div style="height:150px; border-radius:8px; overflow:hidden; border:1px solid var(--border);">
                                    <img src="<?= htmlspecialchars($gImg) ?>" alt="" style="width:100%; height:100%; object-fit:cover;">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- CONSULTATION SIDEBAR BOX -->
                <div>
                    <div style="background:#0F141C; color:#fff; border-radius:12px; padding:32px; border:1px solid #242D3D; position:sticky; top:100px;">
                        <span style="font-family:'IBM Plex Mono',monospace; font-size:11px; color:var(--gold); text-transform:uppercase;">Want a Similar Space?</span>
                        <h3 style="font-size:22px; font-weight:700; margin:8px 0 14px; color:#fff;">Start Your Turnkey Project</h3>
                        <p style="font-size:13px; color:#94A3B8; line-height:1.6; margin-bottom:24px;">
                            Speak with our senior design architect and receive a complimentary 3D spatial layout & BOQ estimate.
                        </p>

                        <form id="projectSideForm" onsubmit="handleGeneralFormSubmit(event, 'projectSideForm')">
                            <input type="hidden" name="source" value="Project Detail: <?= htmlspecialchars($project['title']) ?>">
                            <input type="hidden" name="service" value="<?= htmlspecialchars($project['category']) ?>">
                            <div class="form-group" style="margin-bottom:12px;">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required style="background:#171E28; color:#fff; border-color:#2A3649; font-size:13px;">
                            </div>
                            <div class="form-group" style="margin-bottom:12px;">
                                <input type="tel" name="phone" class="form-control" placeholder="Mobile Number" required style="background:#171E28; color:#fff; border-color:#2A3649; font-size:13px;">
                            </div>
                            <div class="form-group" style="margin-bottom:16px;">
                                <input type="text" name="area" class="form-control" placeholder="Carpet Area (e.g. 1800 sq ft)" style="background:#171E28; color:#fff; border-color:#2A3649; font-size:13px;">
                            </div>
                            <button type="submit" class="btn btn-gold" style="width:100%; justify-content:center; padding:12px;">
                                Book Free Consultation <i data-lucide="arrow-right" style="width:14px;height:14px;"></i>
                            </button>
                        </form>

                        <div style="margin-top:20px; text-align:center;">
                            <a href="tel:<?= SITE_PHONE_1 ?>" style="color:#94A3B8; font-size:13px; text-decoration:none; display:inline-flex; align-items:center; gap:6px;">
                                <i data-lucide="phone" style="width:14px;height:14px;color:var(--gold);"></i> <?= SITE_PHONE_1 ?>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
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
