<?php
$pageTitle = 'Executive Dashboard';
require_once __DIR__ . '/includes/admin_header.php';

$projects = $dm->getProjects();
$designs = $dm->getDesigns();
$enquiries = $dm->getEnquiries();

// Compute revenue pipeline
$totalPipeline = 0;
foreach ($enquiries as $e) {
    // Extract numeric if possible
    $b = preg_replace('/[^0-9]/', '', $e['budget'] ?? '0');
    if (!empty($b)) {
        $totalPipeline += (int)$b;
    }
}
?>

<!-- STAT METRIC CARDS -->
<div class="stat-cards-grid">
    <div class="admin-card">
        <div class="stat-card-top">
            <span class="stat-card-title">Delivered Projects</span>
            <div class="stat-card-icon">
                <i data-lucide="folder-check"></i>
            </div>
        </div>
        <div class="stat-card-value"><?= count($projects) ?></div>
        <div class="stat-card-delta">
            <i data-lucide="trending-up" style="width:14px;height:14px;"></i>
            <span>+18.4% this quarter</span>
        </div>
    </div>

    <div class="admin-card">
        <div class="stat-card-top">
            <span class="stat-card-title">3D Designs & Renders</span>
            <div class="stat-card-icon">
                <i data-lucide="layers"></i>
            </div>
        </div>
        <div class="stat-card-value"><?= count($designs) ?></div>
        <div class="stat-card-delta">
            <i data-lucide="check" style="width:14px;height:14px;"></i>
            <span>All portfolios synced</span>
        </div>
    </div>

    <div class="admin-card">
        <div class="stat-card-top">
            <span class="stat-card-title">Total Enquiries</span>
            <div class="stat-card-icon">
                <i data-lucide="users"></i>
            </div>
        </div>
        <div class="stat-card-value"><?= count($enquiries) ?></div>
        <div class="stat-card-delta" style="color:var(--gold);">
            <i data-lucide="bell" style="width:14px;height:14px;"></i>
            <span><?= $stats['new_leads'] ?> Leads require action</span>
        </div>
    </div>

    <div class="admin-card">
        <div class="stat-card-top">
            <span class="stat-card-title">Active Pipeline</span>
            <div class="stat-card-icon">
                <i data-lucide="coins"></i>
            </div>
        </div>
        <div class="stat-card-value" style="color:var(--gold);">₹1.48 Cr</div>
        <div class="stat-card-delta">
            <i data-lucide="trending-up" style="width:14px;height:14px;"></i>
            <span>Estimated project value</span>
        </div>
    </div>
</div>

<!-- QUICK ACTION HERO CARD -->
<div class="admin-card" style="margin-bottom:30px; background:linear-gradient(135deg, #131A26 0%, #1A2436 100%); border-color:#2A374E;">
    <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:20px;">
        <div>
            <span style="font-family:'IBM Plex Mono',monospace; font-size:12px; color:var(--gold); text-transform:uppercase; letter-spacing:0.08em; font-weight:600;">Work Management Studio</span>
            <h2 style="font-family:'Space Grotesk',sans-serif; font-size:22px; font-weight:700; margin:4px 0 8px; color:#fff;">Upload & Showcase Your Latest Projects</h2>
            <p style="color:var(--text-muted); font-size:14px; max-width:650px;">
                Add comprehensive 4-stage visual journeys (Before Site &rarr; 3D Render &rarr; Civil Execution &rarr; Final Luxury Space) or individual design renders to publish directly to the live client portal.
            </p>
        </div>
        <div style="display:flex; gap:12px; flex-wrap:wrap;">
            <a href="project_add.php" class="btn-gold">
                <i data-lucide="plus-circle" style="width:16px;height:16px;"></i> Upload Full Project
            </a>
            <a href="designs.php" class="btn-outline">
                <i data-lucide="image-plus" style="width:16px;height:16px;"></i> Add 3D Render
            </a>
        </div>
    </div>
</div>

<!-- CHARTS & RECENT WORK SECTION -->
<div style="display:grid; grid-template-columns:1.6fr 1fr; gap:24px; margin-bottom:30px;">
    
    <!-- INQUIRY & REVENUE CHART -->
    <div class="admin-card">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
            <h3 style="font-size:16px; font-weight:700; color:#fff;">Inquiries & Growth Trend</h3>
            <span style="font-size:12px; color:var(--text-muted); font-family:'IBM Plex Mono',monospace;">Last 6 Months</span>
        </div>
        <div style="height:240px;">
            <canvas id="growthChart"></canvas>
        </div>
    </div>

    <!-- CATEGORY DISTRIBUTION -->
    <div class="admin-card">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
            <h3 style="font-size:16px; font-weight:700; color:#fff;">Services Breakdown</h3>
            <span style="font-size:12px; color:var(--gold); font-family:'IBM Plex Mono',monospace;">Delivered</span>
        </div>
        <div style="height:240px; display:flex; align-items:center; justify-content:center;">
            <canvas id="categoryChart"></canvas>
        </div>
    </div>

</div>

<!-- RECENT ENQUIRIES CRM TABLE -->
<div class="admin-card" style="margin-bottom:30px;">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <div>
            <h3 style="font-size:16px; font-weight:700; color:#fff;">Recent Inquiries & Site Bookings</h3>
            <p style="font-size:13px; color:var(--text-muted);">Incoming consultations and quote calculations from public visitors</p>
        </div>
        <a href="enquiries.php" class="btn-outline btn-sm" style="font-size:12px; padding:6px 12px;">
            View All Enquiries <i data-lucide="arrow-right" style="width:14px;height:14px;"></i>
        </a>
    </div>

    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Lead ID / Date</th>
                    <th>Client Name</th>
                    <th>Contact Info</th>
                    <th>Service Required</th>
                    <th>Property / Area</th>
                    <th>Budget</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($enquiries)): ?>
                    <tr>
                        <td colspan="8" style="text-align:center; padding:30px; color:var(--text-muted);">
                            No inquiries recorded yet. Submissions from the website will appear here in real-time.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach (array_slice($enquiries, 0, 5) as $enq): ?>
                        <tr>
                            <td>
                                <div style="font-weight:700; color:#fff; font-family:'IBM Plex Mono',monospace; font-size:12px;"><?= htmlspecialchars($enq['id']) ?></div>
                                <div style="font-size:11px; color:var(--text-dim);"><?= htmlspecialchars($enq['created_at'] ?? 'Recent') ?></div>
                            </td>
                            <td>
                                <strong style="color:#fff;"><?= htmlspecialchars($enq['name']) ?></strong>
                            </td>
                            <td>
                                <div><a href="tel:<?= htmlspecialchars($enq['phone']) ?>" style="color:var(--gold); text-decoration:none;"><?= htmlspecialchars($enq['phone']) ?></a></div>
                                <div style="font-size:11px; color:var(--text-dim);"><?= htmlspecialchars($enq['email'] ?? '') ?></div>
                            </td>
                            <td>
                                <span style="font-size:13px; color:#E2E8F0;"><?= htmlspecialchars($enq['service']) ?></span>
                            </td>
                            <td>
                                <div><?= htmlspecialchars($enq['property_type'] ?? 'N/A') ?></div>
                                <div style="font-size:11px; color:var(--text-dim);"><?= htmlspecialchars($enq['area'] ?? '') ?></div>
                            </td>
                            <td>
                                <span style="font-family:'IBM Plex Mono',monospace; font-weight:600; color:var(--gold);"><?= htmlspecialchars($enq['budget'] ?? 'N/A') ?></span>
                            </td>
                            <td>
                                <?php 
                                    $st = strtolower($enq['status'] ?? 'new');
                                    $badgeClass = 'new';
                                    if (strpos($st, 'visit') !== false) $badgeClass = 'inprogress';
                                    elseif (strpos($st, 'quotation') !== false) $badgeClass = 'contacted';
                                    elseif (strpos($st, 'won') !== false || strpos($st, 'completed') !== false) $badgeClass = 'completed';
                                ?>
                                <span class="status-badge <?= $badgeClass ?>"><?= htmlspecialchars($enq['status'] ?? 'New') ?></span>
                            </td>
                            <td>
                                <div style="display:flex; gap:8px;">
                                    <?php 
                                        $cleanPhone = preg_replace('/[^0-9]/', '', $enq['phone']);
                                        $waMsg = urlencode("Hello " . $enq['name'] . ", this is Muskan Interiors regarding your inquiry for " . $enq['service'] . ". We would love to discuss your space requirements.");
                                    ?>
                                    <a href="https://wa.me/<?= $cleanPhone ?>?text=<?= $waMsg ?>" target="_blank" class="btn-outline" style="padding:5px 9px; font-size:11px; border-color:#2A374E; color:#34D399;" title="Chat on WhatsApp">
                                        <i data-lucide="message-circle" style="width:14px;height:14px;"></i>
                                    </a>
                                    <a href="enquiries.php" class="btn-outline" style="padding:5px 9px; font-size:11px; border-color:#2A374E;" title="View in CRM">
                                        <i data-lucide="eye" style="width:14px;height:14px;"></i>
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

<!-- RECENT PROJECTS GRID -->
<div class="admin-card">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <div>
            <h3 style="font-size:16px; font-weight:700; color:#fff;">Published Projects & Case Studies</h3>
            <p style="font-size:13px; color:var(--text-muted);">Active architectural and turnkey projects live on the website</p>
        </div>
        <a href="projects.php" class="btn-outline btn-sm" style="font-size:12px; padding:6px 12px;">
            Manage All Projects <i data-lucide="arrow-right" style="width:14px;height:14px;"></i>
        </a>
    </div>

    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:20px;">
        <?php foreach (array_slice($projects, 0, 3) as $prj): ?>
            <div style="background:var(--card-sub); border:1px solid var(--border-color); border-radius:10px; overflow:hidden; display:flex; flex-direction:column;">
                <div style="height:160px; position:relative; overflow:hidden;">
                    <img src="../<?= htmlspecialchars($prj['featured_image']) ?>" alt="" style="width:100%; height:100%; object-fit:cover;">
                    <div style="position:absolute; top:10px; left:10px; background:rgba(9,13,20,0.85); backdrop-filter:blur(4px); padding:4px 8px; border-radius:4px; font-size:11px; font-family:'IBM Plex Mono',monospace; color:var(--gold); border:1px solid rgba(197,154,63,0.3);">
                        <?= htmlspecialchars($prj['category']) ?>
                    </div>
                </div>
                <div style="padding:16px; flex:1; display:flex; flex-direction:column;">
                    <h4 style="font-size:15px; font-weight:700; color:#fff; margin-bottom:6px; line-height:1.3;"><?= htmlspecialchars($prj['title']) ?></h4>
                    <p style="font-size:12px; color:var(--text-muted); margin-bottom:14px; flex:1;"><?= htmlspecialchars(substr($prj['short_desc'], 0, 85)) ?>...</p>
                    
                    <div style="display:flex; justify-content:space-between; align-items:center; border-top:1px solid var(--border-color); padding-top:12px;">
                        <span style="font-family:'IBM Plex Mono',monospace; font-size:12px; color:var(--gold); font-weight:600;"><?= htmlspecialchars($prj['budget']) ?></span>
                        <div style="display:flex; gap:8px;">
                            <a href="../project-detail.php?id=<?= $prj['id'] ?>" target="_blank" class="btn-outline" style="padding:4px 8px; font-size:11px;" title="View on Site">
                                <i data-lucide="external-link" style="width:13px;height:13px;"></i>
                            </a>
                            <a href="project_edit.php?id=<?= $prj['id'] ?>" class="btn-outline" style="padding:4px 8px; font-size:11px; color:var(--gold); border-color:rgba(197,154,63,0.4);" title="Edit Project">
                                <i data-lucide="edit" style="width:13px;height:13px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    // Initialize Dashboard Charts
    document.addEventListener('DOMContentLoaded', function() {
        // Growth Chart
        const ctxGrowth = document.getElementById('growthChart').getContext('2d');
        new Chart(ctxGrowth, {
            type: 'line',
            data: {
                labels: ['May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                datasets: [{
                    label: 'Turnkey Consultations',
                    data: [12, 19, 15, 26, 32, 45],
                    borderColor: '#C59A3F',
                    backgroundColor: 'rgba(197, 154, 63, 0.08)',
                    borderWidth: 2.5,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#C59A3F'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    x: {
                        grid: { color: '#1F293D' },
                        ticks: { color: '#94A3B8', font: { family: 'IBM Plex Mono' } }
                    },
                    y: {
                        grid: { color: '#1F293D' },
                        ticks: { color: '#94A3B8', font: { family: 'IBM Plex Mono' } }
                    }
                }
            }
        });

        // Category Chart
        const ctxCategory = document.getElementById('categoryChart').getContext('2d');
        new Chart(ctxCategory, {
            type: 'doughnut',
            data: {
                labels: ['Turnkey', 'Interior', 'Wooden Work', 'Exterior', 'Construction'],
                datasets: [{
                    data: [35, 25, 20, 12, 8],
                    backgroundColor: [
                        '#C59A3F',
                        '#3B82F6',
                        '#10B981',
                        '#F59E0B',
                        '#8B5CF6'
                    ],
                    borderColor: '#131A26',
                    borderWidth: 3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            color: '#CBD5E1',
                            font: { size: 11, family: 'Plus Jakarta Sans' },
                            boxWidth: 12
                        }
                    }
                }
            }
        });
    });
</script>

<?php require_once __DIR__ . '/includes/admin_footer.php'; ?>
