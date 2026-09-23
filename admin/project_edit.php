<?php
$pageTitle = 'Edit Project';
require_once __DIR__ . '/includes/admin_header.php';
require_once __DIR__ . '/../includes/upload_helper.php';

$id = $_GET['id'] ?? '';
$project = $dm->getProjectById($id);

if (!$project) {
    echo "<div class='admin-card'><p>Project not found.</p><a href='projects.php' class='btn-gold'>Back to Projects</a></div>";
    require_once __DIR__ . '/includes/admin_footer.php';
    exit;
}

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $category = trim($_POST['category'] ?? $project['category']);
    $client_name = trim($_POST['client_name'] ?? $project['client_name']);
    $location = trim($_POST['location'] ?? $project['location']);
    $budget = trim($_POST['budget'] ?? $project['budget']);
    $area = trim($_POST['area'] ?? $project['area']);
    $timeline = trim($_POST['timeline'] ?? $project['timeline']);
    $short_desc = trim($_POST['short_desc'] ?? $project['short_desc']);
    $full_desc = trim($_POST['full_desc'] ?? $project['full_desc']);
    $status = trim($_POST['status'] ?? $project['status']);
    $featured = isset($_POST['featured']) ? 1 : 0;

    if (empty($title)) {
        $error = 'Project Title is required.';
    } else {
        // Handle Featured Image Upload or Keep Existing
        $featured_img_path = UploadHelper::uploadImage('featured_image', 'projects');
        if (is_array($featured_img_path) && isset($featured_img_path['error'])) {
            $error = $featured_img_path['error'];
        } elseif (!$featured_img_path) {
            $featured_img_path = $project['featured_image'];
        }

        // Handle 4-Stage Images
        $stage_before = UploadHelper::uploadImage('stage_before', 'projects');
        if (!$stage_before || is_array($stage_before)) $stage_before = $project['stage_before_img'];

        $stage_design = UploadHelper::uploadImage('stage_design', 'projects');
        if (!$stage_design || is_array($stage_design)) $stage_design = $project['stage_design_img'];

        $stage_execution = UploadHelper::uploadImage('stage_execution', 'projects');
        if (!$stage_execution || is_array($stage_execution)) $stage_execution = $project['stage_execution_img'];

        $stage_final = UploadHelper::uploadImage('stage_final', 'projects');
        if (!$stage_final || is_array($stage_final)) $stage_final = $project['stage_final_img'];

        // Gallery
        $newGallery = UploadHelper::uploadMultipleImages('gallery_images', 'projects');
        $existingGallery = is_array($project['gallery_images'] ?? null) ? $project['gallery_images'] : json_decode($project['gallery_images'] ?? '[]', true);
        if (!empty($newGallery)) {
            $galleryImages = array_merge($existingGallery, $newGallery);
        } else {
            $galleryImages = $existingGallery;
        }

        if (empty($error)) {
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));

            $projectData = [
                'id' => $project['id'],
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
                'created_at' => $project['created_at'] ?? date('Y-m-d H:i:s')
            ];

            $dm->saveProject($projectData);
            $success = 'Project updated successfully!';
            $project = $dm->getProjectById($id);
        }
    }
}
?>

<div style="max-width:1080px; margin:0 auto;">
    
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px;">
        <div>
            <span style="font-family:'IBM Plex Mono',monospace; font-size:12px; color:var(--gold); text-transform:uppercase;">Modify Work</span>
            <h2 style="font-size:22px; font-weight:700; color:#fff;">Edit Project: <?= htmlspecialchars($project['title']) ?></h2>
        </div>
        <div style="display:flex; gap:10px;">
            <a href="../project-detail.php?id=<?= $project['id'] ?>" target="_blank" class="btn-outline">
                <i data-lucide="external-link" style="width:14px;height:14px;"></i> View Live
            </a>
            <a href="projects.php" class="btn-outline">
                <i data-lucide="arrow-left" style="width:14px;height:14px;"></i> Back to Projects
            </a>
        </div>
    </div>

    <?php if (!empty($success)): ?>
        <div style="background:rgba(16,185,129,0.12); border:1px solid rgba(16,185,129,0.3); color:#34D399; padding:16px 20px; border-radius:8px; margin-bottom:24px; display:flex; align-items:center; gap:10px;">
            <i data-lucide="check-circle" style="width:20px;height:20px;"></i>
            <span><?= $success ?></span>
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
                <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($project['title']) ?>" required>
            </div>
            <div class="form-group">
                <label class="form-label">Discipline / Category *</label>
                <select name="category" class="form-control" required>
                    <option value="Turnkey Projects" <?= $project['category'] === 'Turnkey Projects' ? 'selected' : '' ?>>Turnkey Projects (Complete Build & Interior)</option>
                    <option value="Interior Design" <?= $project['category'] === 'Interior Design' ? 'selected' : '' ?>>Interior Design (Residential & Commercial)</option>
                    <option value="Exterior Design" <?= $project['category'] === 'Exterior Design' ? 'selected' : '' ?>>Exterior Design & Facade Elevation</option>
                    <option value="Wooden Work" <?= $project['category'] === 'Wooden Work' ? 'selected' : '' ?>>Wooden Work & Bespoke Modular Joinery</option>
                    <option value="Construction" <?= $project['category'] === 'Construction' ? 'selected' : '' ?>>Civil Construction & Structural Remodeling</option>
                </select>
            </div>
        </div>

        <div class="form-grid-3">
            <div class="form-group">
                <label class="form-label">Client Name / Org</label>
                <input type="text" name="client_name" class="form-control" value="<?= htmlspecialchars($project['client_name'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Location / City</label>
                <input type="text" name="location" class="form-control" value="<?= htmlspecialchars($project['location'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Execution Duration</label>
                <input type="text" name="timeline" class="form-control" value="<?= htmlspecialchars($project['timeline'] ?? '') ?>">
            </div>
        </div>

        <div class="form-grid-2">
            <div class="form-group">
                <label class="form-label">Approximate Project Budget</label>
                <input type="text" name="budget" class="form-control" value="<?= htmlspecialchars($project['budget'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Carpet Area (Sq. Ft)</label>
                <input type="text" name="area" class="form-control" value="<?= htmlspecialchars($project['area'] ?? '') ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Short Summary (1-2 lines for project cards)</label>
            <input type="text" name="short_desc" class="form-control" value="<?= htmlspecialchars($project['short_desc'] ?? '') ?>">
        </div>

        <div class="form-group">
            <label class="form-label">Detailed Architectural Description & Scope</label>
            <textarea name="full_desc" class="form-control" rows="4"><?= htmlspecialchars($project['full_desc'] ?? '') ?></textarea>
        </div>

        <!-- SECTION 2: PRIMARY MEDIA -->
        <div class="form-section-title">
            <i data-lucide="image" style="width:18px;height:18px;"></i> 2. Primary Featured Thumbnail Image
        </div>

        <div class="form-group">
            <div style="display:flex; gap:20px; align-items:center;">
                <?php if (!empty($project['featured_image'])): ?>
                    <img src="../<?= htmlspecialchars($project['featured_image']) ?>" alt="" style="width:120px; height:90px; object-fit:cover; border-radius:8px; border:1px solid var(--border-color);">
                <?php endif; ?>
                <div style="flex:1;">
                    <label class="form-label">Replace Featured Image (Leave blank to keep existing)</label>
                    <input type="file" name="featured_image" accept="image/*" class="form-control">
                </div>
            </div>
        </div>

        <!-- SECTION 3: 4-STAGE VISUAL JOURNEY -->
        <div class="form-section-title">
            <i data-lucide="git-commit" style="width:18px;height:18px;"></i> 3. 4-Stage Visual Journey
        </div>

        <div class="form-grid-4">
            <!-- STAGE 1 -->
            <div class="form-group">
                <label class="form-label">Stage 01: Raw Site</label>
                <?php if (!empty($project['stage_before_img'])): ?>
                    <img src="../<?= htmlspecialchars($project['stage_before_img']) ?>" alt="" style="width:100%; height:70px; object-fit:cover; border-radius:6px; margin-bottom:8px; border:1px solid var(--border-color);">
                <?php endif; ?>
                <input type="file" name="stage_before" accept="image/*" class="form-control" style="padding:6px; font-size:12px;">
            </div>

            <!-- STAGE 2 -->
            <div class="form-group">
                <label class="form-label">Stage 02: 3D Render</label>
                <?php if (!empty($project['stage_design_img'])): ?>
                    <img src="../<?= htmlspecialchars($project['stage_design_img']) ?>" alt="" style="width:100%; height:70px; object-fit:cover; border-radius:6px; margin-bottom:8px; border:1px solid var(--border-color);">
                <?php endif; ?>
                <input type="file" name="stage_design" accept="image/*" class="form-control" style="padding:6px; font-size:12px;">
            </div>

            <!-- STAGE 3 -->
            <div class="form-group">
                <label class="form-label">Stage 03: Execution Site</label>
                <?php if (!empty($project['stage_execution_img'])): ?>
                    <img src="../<?= htmlspecialchars($project['stage_execution_img']) ?>" alt="" style="width:100%; height:70px; object-fit:cover; border-radius:6px; margin-bottom:8px; border:1px solid var(--border-color);">
                <?php endif; ?>
                <input type="file" name="stage_execution" accept="image/*" class="form-control" style="padding:6px; font-size:12px;">
            </div>

            <!-- STAGE 4 -->
            <div class="form-group">
                <label class="form-label">Stage 04: Final Handover</label>
                <?php if (!empty($project['stage_final_img'])): ?>
                    <img src="../<?= htmlspecialchars($project['stage_final_img']) ?>" alt="" style="width:100%; height:70px; object-fit:cover; border-radius:6px; margin-bottom:8px; border:1px solid var(--border-color);">
                <?php endif; ?>
                <input type="file" name="stage_final" accept="image/*" class="form-control" style="padding:6px; font-size:12px;">
            </div>
        </div>

        <div class="form-grid-2" style="margin-top:20px;">
            <div class="form-group">
                <label class="form-label">Project Status</label>
                <select name="status" class="form-control">
                    <option value="Completed" <?= ($project['status'] ?? '') === 'Completed' ? 'selected' : '' ?>>Completed & Handed Over</option>
                    <option value="Under Execution" <?= ($project['status'] ?? '') === 'Under Execution' ? 'selected' : '' ?>>Under Execution / Ongoing</option>
                    <option value="Upcoming" <?= ($project['status'] ?? '') === 'Upcoming' ? 'selected' : '' ?>>Upcoming Project</option>
                </select>
            </div>

            <div style="display:flex; align-items:center; gap:10px; padding-top:24px;">
                <input type="checkbox" name="featured" id="featuredCheck" value="1" <?= !empty($project['featured']) ? 'checked' : '' ?> style="width:18px;height:18px;accent-color:var(--gold);cursor:pointer;">
                <label for="featuredCheck" style="font-size:14px; color:#fff; cursor:pointer; font-weight:500;">
                    ★ Featured on Homepage Showcase
                </label>
            </div>
        </div>

        <div style="display:flex; justify-content:flex-end; gap:16px; border-top:1px solid var(--border-color); padding-top:24px; margin-top:20px;">
            <a href="projects.php" class="btn-outline">Cancel</a>
            <button type="submit" class="btn-gold" style="padding:12px 28px; font-size:14px;">
                <i data-lucide="check" style="width:16px;height:16px;"></i> Save Changes
            </button>
        </div>

    </form>
</div>

<?php require_once __DIR__ . '/includes/admin_footer.php'; ?>
