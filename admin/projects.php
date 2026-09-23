<?php
$pageTitle = 'Project Portfolio Manager';
require_once __DIR__ . '/includes/admin_header.php';

$categoryFilter = $_GET['category'] ?? 'All';
$projects = $dm->getProjects($categoryFilter);
?>

<div class="admin-card" style="margin-bottom:24px;">
    <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:16px;">
        <div style="display:flex; align-items:center; gap:12px; flex-wrap:wrap;">
            <span style="font-size:13px; font-weight:600; color:var(--text-muted);">Filter by Discipline:</span>
            <div style="display:flex; gap:8px; flex-wrap:wrap;">
                <a href="projects.php?category=All" class="btn-outline btn-sm <?= $categoryFilter === 'All' ? 'active' : '' ?>" style="<?= $categoryFilter === 'All' ? 'background:var(--gold); color:#090D14; border-color:var(--gold);' : '' ?>">All (<?= $stats['total_projects'] ?>)</a>
                <a href="projects.php?category=Turnkey Projects" class="btn-outline btn-sm <?= $categoryFilter === 'Turnkey Projects' ? 'active' : '' ?>" style="<?= $categoryFilter === 'Turnkey Projects' ? 'background:var(--gold); color:#090D14; border-color:var(--gold);' : '' ?>">Turnkey</a>
                <a href="projects.php?category=Interior Design" class="btn-outline btn-sm <?= $categoryFilter === 'Interior Design' ? 'active' : '' ?>" style="<?= $categoryFilter === 'Interior Design' ? 'background:var(--gold); color:#090D14; border-color:var(--gold);' : '' ?>">Interior</a>
                <a href="projects.php?category=Exterior Design" class="btn-outline btn-sm <?= $categoryFilter === 'Exterior Design' ? 'active' : '' ?>" style="<?= $categoryFilter === 'Exterior Design' ? 'background:var(--gold); color:#090D14; border-color:var(--gold);' : '' ?>">Exterior</a>
                <a href="projects.php?category=Wooden Work" class="btn-outline btn-sm <?= $categoryFilter === 'Wooden Work' ? 'active' : '' ?>" style="<?= $categoryFilter === 'Wooden Work' ? 'background:var(--gold); color:#090D14; border-color:var(--gold);' : '' ?>">Wooden Work</a>
                <a href="projects.php?category=Construction" class="btn-outline btn-sm <?= $categoryFilter === 'Construction' ? 'active' : '' ?>" style="<?= $categoryFilter === 'Construction' ? 'background:var(--gold); color:#090D14; border-color:var(--gold);' : '' ?>">Construction</a>
            </div>
        </div>

        <div>
            <a href="project_add.php" class="btn-gold">
                <i data-lucide="plus-circle" style="width:16px;height:16px;"></i> Upload New Project
            </a>
        </div>
    </div>
</div>

<div class="admin-card">
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th style="width:70px;">Media</th>
                    <th>Project Title & Slug</th>
                    <th>Category</th>
                    <th>Client / City</th>
                    <th>Budget / Area</th>
                    <th>Visual Journey</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($projects)): ?>
                    <tr>
                        <td colspan="8" style="text-align:center; padding:40px; color:var(--text-muted);">
                            No projects found in this category. Click <strong>Upload New Project</strong> to publish your first work.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($projects as $p): ?>
                        <tr>
                            <td>
                                <img src="../<?= htmlspecialchars($p['featured_image']) ?>" alt="" style="width:54px; height:54px; object-fit:cover; border-radius:6px; border:1px solid var(--border-color);">
                            </td>
                            <td>
                                <div style="font-weight:700; color:#fff; font-size:14px; margin-bottom:2px;">
                                    <?= htmlspecialchars($p['title']) ?>
                                    <?php if (!empty($p['featured'])): ?>
                                        <span style="font-size:10px; background:rgba(197,154,63,0.2); color:var(--gold); padding:2px 6px; border-radius:4px; margin-left:6px; font-family:'IBM Plex Mono',monospace; border:1px solid rgba(197,154,63,0.4);">★ FEATURED</span>
                                    <?php endif; ?>
                                </div>
                                <div style="font-size:11px; color:var(--text-dim); font-family:'IBM Plex Mono',monospace;">ID: <?= htmlspecialchars($p['id']) ?> &bull; <?= htmlspecialchars($p['slug']) ?></div>
                            </td>
                            <td>
                                <span style="font-size:12px; font-family:'IBM Plex Mono',monospace; color:var(--gold); background:#1A2332; padding:3px 8px; border-radius:4px; border:1px solid #243044;">
                                    <?= htmlspecialchars($p['category']) ?>
                                </span>
                            </td>
                            <td>
                                <div style="color:#fff; font-weight:500;"><?= htmlspecialchars($p['client_name'] ?? 'Private') ?></div>
                                <div style="font-size:11px; color:var(--text-dim);"><?= htmlspecialchars($p['location'] ?? 'Patna') ?></div>
                            </td>
                            <td>
                                <div style="font-family:'IBM Plex Mono',monospace; font-weight:600; color:#34D399; font-size:13px;"><?= htmlspecialchars($p['budget'] ?? 'N/A') ?></div>
                                <div style="font-size:11px; color:var(--text-dim);"><?= htmlspecialchars($p['area'] ?? '') ?></div>
                            </td>
                            <td>
                                <div style="display:flex; gap:4px;" title="4-Stage Visual Journey Loaded">
                                    <span style="width:8px; height:8px; border-radius:50%; background:<?= !empty($p['stage_before_img']) ? '#10B981' : '#64748B' ?>;" title="Stage 1: Before"></span>
                                    <span style="width:8px; height:8px; border-radius:50%; background:<?= !empty($p['stage_design_img']) ? '#10B981' : '#64748B' ?>;" title="Stage 2: 3D Render"></span>
                                    <span style="width:8px; height:8px; border-radius:50%; background:<?= !empty($p['stage_execution_img']) ? '#10B981' : '#64748B' ?>;" title="Stage 3: Execution"></span>
                                    <span style="width:8px; height:8px; border-radius:50%; background:<?= !empty($p['stage_final_img']) ? '#10B981' : '#64748B' ?>;" title="Stage 4: Final Handover"></span>
                                </div>
                            </td>
                            <td>
                                <span class="status-badge completed"><?= htmlspecialchars($p['status'] ?? 'Completed') ?></span>
                            </td>
                            <td style="text-align:right;">
                                <div style="display:inline-flex; gap:6px;">
                                    <a href="../project-detail.php?id=<?= $p['id'] ?>" target="_blank" class="btn-outline" style="padding:6px 10px; font-size:12px;" title="View Live Page">
                                        <i data-lucide="eye" style="width:14px;height:14px;"></i>
                                    </a>
                                    <a href="project_edit.php?id=<?= $p['id'] ?>" class="btn-outline" style="padding:6px 10px; font-size:12px; color:var(--gold); border-color:rgba(197,154,63,0.3);" title="Edit Project">
                                        <i data-lucide="edit" style="width:14px;height:14px;"></i>
                                    </a>
                                    <a href="delete_item.php?type=project&id=<?= $p['id'] ?>" onclick="return confirm('Are you sure you want to permanently delete this project?')" class="btn-outline" style="padding:6px 10px; font-size:12px; color:var(--danger); border-color:rgba(239,68,68,0.3);" title="Delete Project">
                                        <i data-lucide="trash-2" style="width:14px;height:14px;"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once __DIR__ . '/includes/admin_footer.php'; ?>
