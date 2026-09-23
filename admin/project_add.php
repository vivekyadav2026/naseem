<?php
$pageTitle = 'Upload Project & Work';
require_once __DIR__ . '/includes/admin_header.php';
require_once __DIR__ . '/../includes/upload_helper.php';

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $category = trim($_POST['category'] ?? 'Interior Design');
    $client_name = trim($_POST['client_name'] ?? 'Private Client');
    $location = trim($_POST['location'] ?? 'Patna, Bihar');
    $budget = trim($_POST['budget'] ?? '');
    $area = trim($_POST['area'] ?? '');
    $timeline = trim($_POST['timeline'] ?? '45 Days');
    $short_desc = trim($_POST['short_desc'] ?? '');
    $full_desc = trim($_POST['full_desc'] ?? '');
    $status = trim($_POST['status'] ?? 'Completed');
    $featured = isset($_POST['featured']) ? 1 : 0;

    if (empty($title)) {
        $error = 'Project Title is required.';
    } else {
        // Upload Featured Thumbnail
        $featured_img_path = UploadHelper::uploadImage('featured_image', 'projects');
        if (is_array($featured_img_path) && isset($featured_img_path['error'])) {
            $error = $featured_img_path['error'];
        } elseif (!$featured_img_path) {
            $featured_img_path = 'images/muskan/hero_villa.jpg'; // fallback
        }

        // Upload 4-Stage Visual Journey Images
        $stage_before = UploadHelper::uploadImage('stage_before', 'projects');
        if (is_array($stage_before)) $stage_before = 'images/muskan/before_raw.jpg';
        elseif (!$stage_before) $stage_before = 'images/muskan/before_raw.jpg';

        $stage_design = UploadHelper::uploadImage('stage_design', 'projects');
        if (is_array($stage_design)) $stage_design = 'images/muskan/3d_render.jpg';
        elseif (!$stage_design) $stage_design = 'images/muskan/3d_render.jpg';

        $stage_execution = UploadHelper::uploadImage('stage_execution', 'projects');
        if (is_array($stage_execution)) $stage_execution = 'images/muskan/real_execution.jpg';
        elseif (!$stage_execution) $stage_execution = 'images/muskan/real_execution.jpg';

        $stage_final = UploadHelper::uploadImage('stage_final', 'projects');
        if (is_array($stage_final)) $stage_final = 'images/muskan/after_luxury.jpg';
        elseif (!$stage_final) $stage_final = 'images/muskan/after_luxury.jpg';

        // Additional gallery images
        $galleryImages = UploadHelper::uploadMultipleImages('gallery_images', 'projects');
        if (empty($galleryImages)) {
            $galleryImages = [$featured_img_path, $stage_final];
        }

        if (empty($error)) {
            $projectId = 'PRJ-' . time();
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));

            $projectData = [
                'id' => $projectId,
                'title' => $title,
                'slug' => $slug,
                'category' => $category,
                'client_name' => $client_name,
                'location' => $location,
                'budget' => $budget,
                'area' => $area,
                'timeline' => $timeline,
                'short_desc' => $short_desc,
                'full_desc' => $full_desc,
                'featured_image' => $featured_img_path,
                'stage_before_img' => $stage_before,
                'stage_design_img' => $stage_design,
                'stage_execution_img' => $stage_execution,
                'stage_final_img' => $stage_final,
                'gallery_images' => $galleryImages,
                'status' => $status,
                'featured' => $featured,
                'created_at' => date('Y-m-d H:i:s')
            ];

            $savedId = $dm->saveProject($projectData);
            if ($savedId) {
                $success = 'Project "' . htmlspecialchars($title) . '" has been published successfully!';
            } else {
                $error = 'Failed to save project. Please check permissions.';
            }
        }
    }
}
?>

<div style="max-width:1080px; margin:0 auto;">
    
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px;">
        <div>
            <span style="font-family:'IBM Plex Mono',monospace; font-size:12px; color:var(--gold); text-transform:uppercase;">Publish Work</span>
            <h2 style="font-size:22px; font-weight:700; color:#fff;">Upload New Architectural & Interior Project</h2>
        </div>
        <a href="projects.php" class="btn-outline">
            <i data-lucide="arrow-left" style="width:14px;height:14px;"></i> Back to Projects
        </a>
    </div>

    <?php if (!empty($success)): ?>
        <div style="background:rgba(16,185,129,0.12); border:1px solid rgba(16,185,129,0.3); color:#34D399; padding:16px 20px; border-radius:8px; margin-bottom:24px; display:flex; justify-content:space-between; align-items:center;">
            <div style="display:flex; align-items:center; gap:10px;">
                <i data-lucide="check-circle" style="width:20px;height:20px;"></i>
                <span><?= $success ?></span>
            </div>
            <div style="display:flex; gap:10px;">
                <a href="projects.php" class="btn-outline btn-sm" style="color:#34D399; border-color:rgba(16,185,129,0.4);">View in Table</a>
                <a href="../projects.php" target="_blank" class="btn-gold btn-sm">View on Live Site</a>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
        <div style="background:rgba(239,68,68,0.12); border:1px solid rgba(239,68,68,0.3); color:#F87171; padding:16px 20px; border-radius:8px; margin-bottom:24px; display:flex; align-items:center; gap:10px;">
            <i data-lucide="alert-circle" style="width:20px;height:20px;"></i>
            <span><?= htmlspecialchars($error) ?></span>
        </div>
    <?php endif; ?>

    <form method="POST" action="" enctype="multipart/form-data" class="admin-card">
        
        <!-- SECTION 1: CORE SPECIFICATIONS -->
        <div class="form-section-title">
            <i data-lucide="info" style="width:18px;height:18px;"></i> 1. Basic Project Information
        </div>

        <div class="form-grid-2">
            <div class="form-group">
                <label class="form-label">Project Title *</label>
                <input type="text" name="title" class="form-control" placeholder="e.g. The Imperial Glass Villa & Penthouse" required>
            </div>
            <div class="form-group">
                <label class="form-label">Discipline / Category *</label>
                <select name="category" class="form-control" required>
                    <option value="Turnkey Projects">Turnkey Projects (Complete Build & Interior)</option>
                    <option value="Interior Design" selected>Interior Design (Residential & Commercial)</option>
                    <option value="Exterior Design">Exterior Design & Facade Elevation</option>
                    <option value="Wooden Work">Wooden Work & Bespoke Modular Joinery</option>
                    <option value="Construction">Civil Construction & Structural Remodeling</option>
                </select>
            </div>
        </div>

        <div class="form-grid-3">
            <div class="form-group">
                <label class="form-label">Client Name / Org</label>
                <input type="text" name="client_name" class="form-control" placeholder="e.g. Dr. R. K. Singhania" value="Private Client">
            </div>
            <div class="form-group">
                <label class="form-label">Location / City</label>
                <input type="text" name="location" class="form-control" placeholder="e.g. Boring Road, Patna" value="Patna, Bihar">
            </div>
            <div class="form-group">
                <label class="form-label">Execution Duration</label>
                <input type="text" name="timeline" class="form-control" placeholder="e.g. 45 Days Turnkey" value="45 Days">
            </div>
        </div>

        <div class="form-grid-2">
            <div class="form-group">
                <label class="form-label">Approximate Project Budget</label>
                <input type="text" name="budget" class="form-control" placeholder="e.g. ₹28,50,000" value="₹25,00,000">
            </div>
            <div class="form-group">
                <label class="form-label">Carpet Area (Sq. Ft)</label>
                <input type="text" name="area" class="form-control" placeholder="e.g. 2,400 sq.ft" value="1,850 sq.ft">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Short Summary (1-2 lines for project cards)</label>
            <input type="text" name="short_desc" class="form-control" placeholder="e.g. Complete turnkey villa with acoustic slatted fluted teak panels and modular kitchen.">
        </div>

        <div class="form-group">
            <label class="form-label">Detailed Architectural Description & Scope</label>
            <textarea name="full_desc" class="form-control" rows="4" placeholder="Detail the civil works, material specs (Gurjan ply, Italian marble, Hafele hardware), lighting schemes, and structural challenges..."></textarea>
        </div>

        <!-- SECTION 2: PRIMARY MEDIA -->
        <div class="form-section-title">
            <i data-lucide="image" style="width:18px;height:18px;"></i> 2. Primary Featured Thumbnail Image
        </div>

        <div class="form-group">
            <label class="form-label">Featured Image (Display on Project Listings & Homepage)</label>
            <div class="upload-dropzone" onclick="document.getElementById('featuredInput').click()">
                <i data-lucide="upload-cloud" style="width:36px;height:36px;color:var(--gold);margin-bottom:8px;"></i>
                <p style="font-size:14px; color:#fff; font-weight:600;">Click to select or drop primary project image</p>
                <span style="font-size:12px; color:var(--text-dim);">Supports JPG, PNG, WEBP up to 15MB</span>
                <input type="file" id="featuredInput" name="featured_image" accept="image/*" style="display:none;" onchange="previewImage(this, 'featuredPreview')">
                <img id="featuredPreview" class="upload-preview-box" alt="Preview">
            </div>
        </div>

        <!-- SECTION 3: 4-STAGE VISUAL JOURNEY -->
        <div class="form-section-title">
            <i data-lucide="git-commit" style="width:18px;height:18px;"></i> 3. 4-Stage Visual Journey (Before & After Storytelling)
        </div>
        <p style="font-size:13px; color:var(--text-muted); margin-bottom:16px;">
            Upload images for each stage of this project to create an interactive visual transformation journey on the public website.
        </p>

        <div class="form-grid-4">
            <!-- STAGE 1 -->
            <div class="form-group">
                <label class="form-label">Stage 01: Raw Site (Before)</label>
                <div class="upload-dropzone" style="padding:16px;" onclick="document.getElementById('stg1Input').click()">
                    <i data-lucide="camera" style="width:24px;height:24px;color:#94A3B8;margin-bottom:6px;"></i>
                    <div style="font-size:12px; color:#fff;">Upload Raw / Before</div>
                    <input type="file" id="stg1Input" name="stage_before" accept="image/*" style="display:none;" onchange="previewImage(this, 'stg1Preview')">
                    <img id="stg1Preview" class="upload-preview-box" style="height:100px;" alt="Stage 1 Preview">
                </div>
            </div>

            <!-- STAGE 2 -->
            <div class="form-group">
                <label class="form-label">Stage 02: 3D CAD Render</label>
                <div class="upload-dropzone" style="padding:16px;" onclick="document.getElementById('stg2Input').click()">
                    <i data-lucide="box" style="width:24px;height:24px;color:var(--gold);margin-bottom:6px;"></i>
                    <div style="font-size:12px; color:#fff;">Upload 3D Design</div>
                    <input type="file" id="stg2Input" name="stage_design" accept="image/*" style="display:none;" onchange="previewImage(this, 'stg2Preview')">
                    <img id="stg2Preview" class="upload-preview-box" style="height:100px;" alt="Stage 2 Preview">
                </div>
            </div>

            <!-- STAGE 3 -->
            <div class="form-group">
                <label class="form-label">Stage 03: Civil / Execution</label>
                <div class="upload-dropzone" style="padding:16px;" onclick="document.getElementById('stg3Input').click()">
                    <i data-lucide="hammer" style="width:24px;height:24px;color:#F59E0B;margin-bottom:6px;"></i>
                    <div style="font-size:12px; color:#fff;">Upload Execution Site</div>
                    <input type="file" id="stg3Input" name="stage_execution" accept="image/*" style="display:none;" onchange="previewImage(this, 'stg3Preview')">
                    <img id="stg3Preview" class="upload-preview-box" style="height:100px;" alt="Stage 3 Preview">
                </div>
            </div>

            <!-- STAGE 4 -->
            <div class="form-group">
                <label class="form-label">Stage 04: Final Result (After)</label>
                <div class="upload-dropzone" style="padding:16px;" onclick="document.getElementById('stg4Input').click()">
                    <i data-lucide="sparkles" style="width:24px;height:24px;color:#10B981;margin-bottom:6px;"></i>
                    <div style="font-size:12px; color:#fff;">Upload Final Space</div>
                    <input type="file" id="stg4Input" name="stage_final" accept="image/*" style="display:none;" onchange="previewImage(this, 'stg4Preview')">
                    <img id="stg4Preview" class="upload-preview-box" style="height:100px;" alt="Stage 4 Preview">
                </div>
            </div>
        </div>

        <!-- SECTION 4: GALLERY & PUBLISH SETTINGS -->
        <div class="form-section-title">
            <i data-lucide="sliders" style="width:18px;height:18px;"></i> 4. Additional Gallery & Publishing Options
        </div>

        <div class="form-grid-2">
            <div class="form-group">
                <label class="form-label">Upload Additional Gallery Images (Optional)</label>
                <input type="file" name="gallery_images[]" multiple accept="image/*" class="form-control">
                <span style="font-size:11px; color:var(--text-dim);">Hold CTRL to select multiple angle shots</span>
            </div>

            <div class="form-group">
                <label class="form-label">Project Status</label>
                <select name="status" class="form-control">
                    <option value="Completed" selected>Completed & Handed Over</option>
                    <option value="Under Execution">Under Execution / Ongoing</option>
                    <option value="Upcoming">Upcoming Project</option>
                </select>
            </div>
        </div>

        <div style="margin:20px 0 30px; display:flex; align-items:center; gap:10px;">
            <input type="checkbox" name="featured" id="featuredCheck" value="1" checked style="width:18px;height:18px;accent-color:var(--gold);cursor:pointer;">
            <label for="featuredCheck" style="font-size:14px; color:#fff; cursor:pointer; font-weight:500;">
                ★ Feature this project prominently on the Home Page & Showcase Banner
            </label>
        </div>

        <div style="display:flex; justify-content:flex-end; gap:16px; border-top:1px solid var(--border-color); padding-top:24px;">
            <a href="projects.php" class="btn-outline">Cancel</a>
            <button type="submit" class="btn-gold" style="padding:12px 28px; font-size:14px;">
                <i data-lucide="check" style="width:16px;height:16px;"></i> Publish Project & Work
            </button>
        </div>

    </form>
</div>

<?php require_once __DIR__ . '/includes/admin_footer.php'; ?>
