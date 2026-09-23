<?php
$pageTitle = '3D Designs & Work Showcase';
require_once __DIR__ . '/includes/admin_header.php';
require_once __DIR__ . '/../includes/upload_helper.php';

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $category = trim($_POST['category'] ?? 'Interior Design');
    $tags = trim($_POST['tags'] ?? '');
    $description = trim($_POST['description'] ?? '');

    if (empty($title)) {
        $error = 'Design title is required.';
    } else {
        $imagePath = UploadHelper::uploadImage('design_image', 'designs');
        if (is_array($imagePath) && isset($imagePath['error'])) {
            $error = $imagePath['error'];
        } elseif (!$imagePath) {
            $error = 'Please select a design render / image file to upload.';
        } else {
            $designData = [
                'id' => 'DSG-' . time(),
                'title' => $title,
                'category' => $category,
                'tags' => $tags,
                'image_url' => $imagePath,
                'description' => $description,
                'created_at' => date('Y-m-d H:i:s')
            ];

            $dm->saveDesign($designData);
            $success = 'Design render "' . htmlspecialchars($title) . '" uploaded successfully!';
        }
    }
}

$categoryFilter = $_GET['category'] ?? 'All';
$designs = $dm->getDesigns($categoryFilter);
?>

<div style="display:grid; grid-template-columns:1.1fr 1.9fr; gap:28px; align-items:start;">
    
    <!-- UPLOAD FORM COLUMN -->
    <div class="admin-card">
        <div style="margin-bottom:20px;">
            <span style="font-family:'IBM Plex Mono',monospace; font-size:12px; color:var(--gold); text-transform:uppercase; font-weight:600;">Work Showcase</span>
            <h3 style="font-size:18px; font-weight:700; color:#fff; margin-top:2px;">Upload 3D Design / Render</h3>
            <p style="font-size:13px; color:var(--text-muted);">Publish concept CADs, elevation models & woodwork renders.</p>
        </div>

        <?php if (!empty($success)): ?>
            <div style="background:rgba(16,185,129,0.12); border:1px solid rgba(16,185,129,0.3); color:#34D399; padding:12px 16px; border-radius:8px; font-size:13px; margin-bottom:20px; display:flex; align-items:center; gap:8px;">
                <i data-lucide="check-circle" style="width:16px;height:16px;"></i>
                <span><?= $success ?></span>
            </div>
        <?php endif; ?>

        <?php if (!empty($error)): ?>
            <div style="background:rgba(239,68,68,0.12); border:1px solid rgba(239,68,68,0.3); color:#F87171; padding:12px 16px; border-radius:8px; font-size:13px; margin-bottom:20px; display:flex; align-items:center; gap:8px;">
                <i data-lucide="alert-circle" style="width:16px;height:16px;"></i>
                <span><?= htmlspecialchars($error) ?></span>
            </div>
        <?php endif; ?>

        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label class="form-label">Design Title *</label>
                <input type="text" name="title" class="form-control" placeholder="e.g. Master Bedroom Smoked Glass Wardrobe" required>
            </div>

            <div class="form-group">
                <label class="form-label">Category</label>
                <select name="category" class="form-control" required>
                    <option value="Interior Design">Interior Design (Living, Kitchen, Bedroom)</option>
                    <option value="Exterior Design">Exterior Design & Elevation Facade</option>
                    <option value="Wooden Work">Wooden Work & Modular Joinery</option>
                    <option value="Turnkey Projects">Turnkey 3D Architectural Blueprint</option>
                    <option value="Construction">Civil & Structural Concept</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Tags (Comma Separated)</label>
                <input type="text" name="tags" class="form-control" placeholder="e.g. Wardrobe, Smoked Glass, LED Profile, Teak">
            </div>

            <div class="form-group">
                <label class="form-label">Select 3D Render Image *</label>
                <div class="upload-dropzone" onclick="document.getElementById('designImgInput').click()">
                    <i data-lucide="image-plus" style="width:32px;height:32px;color:var(--gold);margin-bottom:6px;"></i>
                    <p style="font-size:13px; color:#fff; font-weight:600;">Choose Design Image / Render</p>
                    <span style="font-size:11px; color:var(--text-dim);">JPG, PNG, WEBP (Max 15MB)</span>
                    <input type="file" id="designImgInput" name="design_image" accept="image/*" style="display:none;" onchange="previewImage(this, 'designPreview')" required>
                    <img id="designPreview" class="upload-preview-box" style="height:120px;" alt="Preview">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Design Description / Specs</label>
                <textarea name="description" class="form-control" rows="3" placeholder="Explain the lighting warmth, material finishes, or client brief for this design..."></textarea>
            </div>

            <button type="submit" class="btn-gold" style="width:100%; justify-content:center; padding:13px; font-size:14px;">
                <i data-lucide="upload" style="width:16px;height:16px;"></i> Upload Design to Gallery
            </button>
        </form>
    </div>

    <!-- GALLERY GRID COLUMN -->
    <div>
        <div class="admin-card" style="margin-bottom:20px;">
            <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px;">
                <div style="font-size:14px; font-weight:700; color:#fff;">
                    Uploaded Designs Gallery <span style="color:var(--gold); font-family:'IBM Plex Mono',monospace;">(<?= count($designs) ?>)</span>
                </div>
                <div style="display:flex; gap:6px; flex-wrap:wrap;">
                    <a href="designs.php?category=All" class="btn-outline btn-sm <?= $categoryFilter === 'All' ? 'active' : '' ?>" style="<?= $categoryFilter === 'All' ? 'background:var(--gold); color:#090D14; border-color:var(--gold);' : '' ?>">All</a>
                    <a href="designs.php?category=Interior Design" class="btn-outline btn-sm <?= $categoryFilter === 'Interior Design' ? 'active' : '' ?>" style="<?= $categoryFilter === 'Interior Design' ? 'background:var(--gold); color:#090D14; border-color:var(--gold);' : '' ?>">Interior</a>
                    <a href="designs.php?category=Exterior Design" class="btn-outline btn-sm <?= $categoryFilter === 'Exterior Design' ? 'active' : '' ?>" style="<?= $categoryFilter === 'Exterior Design' ? 'background:var(--gold); color:#090D14; border-color:var(--gold);' : '' ?>">Exterior</a>
                    <a href="designs.php?category=Wooden Work" class="btn-outline btn-sm <?= $categoryFilter === 'Wooden Work' ? 'active' : '' ?>" style="<?= $categoryFilter === 'Wooden Work' ? 'background:var(--gold); color:#090D14; border-color:var(--gold);' : '' ?>">Woodwork</a>
                </div>
            </div>
        </div>

        <?php if (empty($designs)): ?>
            <div class="admin-card" style="text-align:center; padding:40px; color:var(--text-muted);">
                <i data-lucide="image" style="width:48px;height:48px;color:#334155;margin-bottom:12px;"></i>
                <p>No designs found in this category. Upload your 3D renders using the form on the left.</p>
            </div>
        <?php else: ?>
            <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(240px, 1fr)); gap:18px;">
                <?php foreach ($designs as $d): ?>
                    <div style="background:var(--card-bg); border:1px solid var(--border-color); border-radius:10px; overflow:hidden; display:flex; flex-direction:column; transition:transform 0.2s;" onmouseenter="this.style.borderColor='var(--gold)'" onmouseleave="this.style.borderColor='var(--border-color)'">
                        <div style="height:150px; position:relative; overflow:hidden;">
                            <img src="../<?= htmlspecialchars($d['image_url']) ?>" alt="" style="width:100%; height:100%; object-fit:cover;">
                            <div style="position:absolute; top:8px; left:8px; background:rgba(9,13,20,0.85); backdrop-filter:blur(4px); padding:3px 8px; border-radius:4px; font-size:10px; font-family:'IBM Plex Mono',monospace; color:var(--gold); border:1px solid rgba(197,154,63,0.3);">
                                <?= htmlspecialchars($d['category']) ?>
                            </div>
                        </div>
                        <div style="padding:14px; flex:1; display:flex; flex-direction:column;">
                            <h4 style="font-size:14px; font-weight:700; color:#fff; margin-bottom:4px; line-height:1.3;"><?= htmlspecialchars($d['title']) ?></h4>
                            <?php if (!empty($d['tags'])): ?>
                                <div style="font-size:11px; color:var(--text-dim); margin-bottom:8px; font-family:'IBM Plex Mono',monospace;">
                                    🏷️ <?= htmlspecialchars($d['tags']) ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($d['description'])): ?>
                                <p style="font-size:12px; color:var(--text-muted); line-height:1.4; margin-bottom:12px; flex:1;"><?= htmlspecialchars(substr($d['description'], 0, 75)) ?>...</p>
                            <?php endif; ?>

                            <div style="display:flex; justify-content:space-between; align-items:center; border-top:1px solid var(--border-color); padding-top:10px; margin-top:auto;">
                                <span style="font-size:10px; color:var(--text-dim); font-family:'IBM Plex Mono',monospace;"><?= htmlspecialchars($d['id']) ?></span>
                                <div style="display:flex; gap:6px;">
                                    <a href="../<?= htmlspecialchars($d['image_url']) ?>" target="_blank" class="btn-outline" style="padding:4px 8px; font-size:11px;" title="View Full High-Res Image">
                                        <i data-lucide="maximize-2" style="width:12px;height:12px;"></i>
                                    </a>
                                    <a href="delete_item.php?type=design&id=<?= $d['id'] ?>" onclick="return confirm('Delete this design render?')" class="btn-outline" style="padding:4px 8px; font-size:11px; color:var(--danger); border-color:rgba(239,68,68,0.3);" title="Delete Design">
                                        <i data-lucide="trash-2" style="width:12px;height:12px;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

</div>

<?php require_once __DIR__ . '/includes/admin_footer.php'; ?>
