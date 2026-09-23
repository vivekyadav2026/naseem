<?php
$pageTitle = 'Leads & Enquiries CRM';
require_once __DIR__ . '/includes/admin_header.php';

// Handle Status Updates
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_status') {
    $enqId = trim($_POST['enquiry_id'] ?? '');
    $newStatus = trim($_POST['new_status'] ?? '');
    $adminNotes = trim($_POST['notes'] ?? '');

    if (!empty($enqId) && !empty($newStatus)) {
        $dm->updateEnquiryStatus($enqId, $newStatus, $adminNotes ? '[' . date('d M H:i') . ']: ' . $adminNotes : '');
        $msg = 'Lead status updated successfully!';
    }
}

// Export CSV Handler
if (isset($_GET['action']) && $_GET['action'] === 'export_csv') {
    $all = $dm->getEnquiries();
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=muskan_leads_' . date('Y-m-d') . '.csv');
    $out = fopen('php://output', 'w');
    fputcsv($out, ['Lead ID', 'Date', 'Name', 'Phone', 'Email', 'Service', 'Property', 'Area', 'Budget', 'Message', 'Status', 'Notes']);
    foreach ($all as $row) {
        fputcsv($out, [
            $row['id'] ?? '',
            $row['created_at'] ?? '',
            $row['name'] ?? '',
            $row['phone'] ?? '',
            $row['email'] ?? '',
            $row['service'] ?? '',
            $row['property_type'] ?? '',
            $row['area'] ?? '',
            $row['budget'] ?? '',
            $row['message'] ?? '',
            $row['status'] ?? '',
            $row['notes'] ?? ''
        ]);
    }
    exit;
}

$statusFilter = $_GET['status'] ?? 'All';
$enquiries = $dm->getEnquiries($statusFilter);
?>

<div class="admin-card" style="margin-bottom:24px;">
    <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:16px;">
        <div style="display:flex; align-items:center; gap:8px; flex-wrap:wrap;">
            <span style="font-size:13px; font-weight:600; color:var(--text-muted); margin-right:6px;">Status Filter:</span>
            <a href="enquiries.php?status=All" class="btn-outline btn-sm <?= $statusFilter === 'All' ? 'active' : '' ?>" style="<?= $statusFilter === 'All' ? 'background:var(--gold); color:#090D14; border-color:var(--gold);' : '' ?>">All (<?= $stats['total_enquiries'] ?>)</a>
            <a href="enquiries.php?status=New" class="btn-outline btn-sm <?= $statusFilter === 'New' ? 'active' : '' ?>" style="<?= $statusFilter === 'New' ? 'background:var(--gold); color:#090D14; border-color:var(--gold);' : '' ?>">New (<?= $stats['new_leads'] ?>)</a>
            <a href="enquiries.php?status=Site Visit Scheduled" class="btn-outline btn-sm <?= $statusFilter === 'Site Visit Scheduled' ? 'active' : '' ?>" style="<?= $statusFilter === 'Site Visit Scheduled' ? 'background:var(--gold); color:#090D14; border-color:var(--gold);' : '' ?>">Site Visits</a>
            <a href="enquiries.php?status=Quotation Sent" class="btn-outline btn-sm <?= $statusFilter === 'Quotation Sent' ? 'active' : '' ?>" style="<?= $statusFilter === 'Quotation Sent' ? 'background:var(--gold); color:#090D14; border-color:var(--gold);' : '' ?>">Quotes Sent</a>
            <a href="enquiries.php?status=Won" class="btn-outline btn-sm <?= $statusFilter === 'Won' ? 'active' : '' ?>" style="<?= $statusFilter === 'Won' ? 'background:var(--gold); color:#090D14; border-color:var(--gold);' : '' ?>">Won / Closed</a>
        </div>

        <div style="display:flex; gap:10px;">
            <a href="enquiries.php?action=export_csv" class="btn-outline" style="border-color:#2A374E;">
                <i data-lucide="download" style="width:14px;height:14px;"></i> Export to CSV
            </a>
        </div>
    </div>
</div>

<?php if (!empty($msg)): ?>
    <div style="background:rgba(16,185,129,0.12); border:1px solid rgba(16,185,129,0.3); color:#34D399; padding:12px 16px; border-radius:8px; font-size:13px; margin-bottom:20px; display:flex; align-items:center; gap:8px;">
        <i data-lucide="check-circle" style="width:16px;height:16px;"></i>
        <span><?= $msg ?></span>
    </div>
<?php endif; ?>

<div class="admin-card">
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID & Date</th>
                    <th>Prospect Details</th>
                    <th>Service & Property</th>
                    <th>Est. Budget</th>
                    <th>Message / Request</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($enquiries)): ?>
                    <tr>
                        <td colspan="7" style="text-align:center; padding:40px; color:var(--text-muted);">
                            No inquiries recorded under this status.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($enquiries as $enq): ?>
                        <tr>
                            <td>
                                <div style="font-weight:700; color:#fff; font-family:'IBM Plex Mono',monospace; font-size:12px;"><?= htmlspecialchars($enq['id']) ?></div>
                                <div style="font-size:11px; color:var(--text-dim);"><?= htmlspecialchars($enq['created_at'] ?? 'Recent') ?></div>
                                <span style="font-size:10px; color:var(--gold); background:#151E2B; padding:2px 6px; border-radius:3px; display:inline-block; margin-top:4px; font-family:'IBM Plex Mono',monospace;"><?= htmlspecialchars($enq['source'] ?? 'Web') ?></span>
                            </td>
                            <td>
                                <div style="font-weight:700; color:#fff; font-size:14px;"><?= htmlspecialchars($enq['name']) ?></div>
                                <div style="margin-top:2px;">
                                    <a href="tel:<?= htmlspecialchars($enq['phone']) ?>" style="color:var(--gold); text-decoration:none; font-family:'IBM Plex Mono',monospace; font-size:13px;">
                                        <?= htmlspecialchars($enq['phone']) ?>
                                    </a>
                                </div>
                                <div style="font-size:11px; color:var(--text-dim);"><?= htmlspecialchars($enq['email'] ?? '') ?></div>
                            </td>
                            <td>
                                <div style="color:#fff; font-weight:600; font-size:13px;"><?= htmlspecialchars($enq['service']) ?></div>
                                <div style="font-size:12px; color:var(--text-muted); margin-top:2px;">
                                    <?= htmlspecialchars($enq['property_type'] ?? 'N/A') ?> &bull; <?= htmlspecialchars($enq['area'] ?? '') ?>
                                </div>
                            </td>
                            <td>
                                <div style="font-family:'IBM Plex Mono',monospace; font-weight:700; color:#34D399; font-size:13px;"><?= htmlspecialchars($enq['budget'] ?? 'N/A') ?></div>
                            </td>
                            <td style="max-width:260px;">
                                <div style="font-size:12px; color:#CBD5E1; line-height:1.4;">
                                    <?= nl2br(htmlspecialchars($enq['message'] ?? 'Direct consultation request')) ?>
                                </div>
                                <?php if (!empty($enq['notes'])): ?>
                                    <div style="margin-top:6px; font-size:11px; color:var(--gold); background:#151D29; padding:4px 8px; border-radius:4px; border-left:2px solid var(--gold);">
                                        <strong>Internal Notes:</strong><br><?= nl2br(htmlspecialchars($enq['notes'])) ?>
                                    </div>
                                <?php endif; ?>
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
                            <td style="text-align:right;">
                                <div style="display:inline-flex; gap:6px; flex-wrap:nowrap;">
                                    <!-- WhatsApp Direct -->
                                    <?php 
                                        $cleanPhone = preg_replace('/[^0-9]/', '', $enq['phone']);
                                        $waMsg = urlencode("Hello " . $enq['name'] . ", this is Muskan Interiors. We received your request regarding " . $enq['service'] . ". When would be a good time for a call/site visit?");
                                    ?>
                                    <a href="https://wa.me/<?= $cleanPhone ?>?text=<?= $waMsg ?>" target="_blank" class="btn-outline" style="padding:6px 10px; font-size:12px; color:#34D399; border-color:rgba(16,185,129,0.4);" title="Direct WhatsApp Message">
                                        <i data-lucide="message-circle" style="width:14px;height:14px;"></i>
                                    </a>

                                    <!-- Status Update Modal Trigger -->
                                    <button type="button" onclick="openStatusModal('<?= htmlspecialchars($enq['id']) ?>', '<?= htmlspecialchars($enq['name']) ?>', '<?= htmlspecialchars($enq['status']) ?>')" class="btn-outline" style="padding:6px 10px; font-size:12px; color:var(--gold); border-color:rgba(197,154,63,0.4);" title="Update Lead Status">
                                        <i data-lucide="edit-3" style="width:14px;height:14px;"></i>
                                    </button>

                                    <!-- Delete Lead -->
                                    <a href="delete_item.php?type=enquiry&id=<?= $enq['id'] ?>" onclick="return confirm('Delete this enquiry record?')" class="btn-outline" style="padding:6px 10px; font-size:12px; color:var(--danger); border-color:rgba(239,68,68,0.4);" title="Delete Record">
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

<!-- STATUS UPDATE MODAL -->
<div id="statusModal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.7); backdrop-filter:blur(4px); z-index:9999; align-items:center; justify-content:center; padding:20px;">
    <div style="background:var(--card-bg); border:1px solid var(--border-color); border-radius:12px; max-width:480px; width:100%; padding:30px; box-shadow:0 20px 40px rgba(0,0,0,0.6);">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
            <h3 style="font-size:18px; font-weight:700; color:#fff;" id="modalClientTitle">Update Lead Status</h3>
            <button onclick="document.getElementById('statusModal').style.display='none'" style="background:none; border:none; color:var(--text-dim); cursor:pointer;">
                <i data-lucide="x" style="width:20px;height:20px;"></i>
            </button>
        </div>

        <form method="POST" action="">
            <input type="hidden" name="action" value="update_status">
            <input type="hidden" name="enquiry_id" id="modalEnqId">

            <div class="form-group">
                <label class="form-label">Update Status</label>
                <select name="new_status" id="modalStatusSelect" class="form-control" required>
                    <option value="New">New Lead</option>
                    <option value="In Discussion">In Discussion / Call Done</option>
                    <option value="Site Visit Scheduled">Site Visit Scheduled</option>
                    <option value="Quotation Sent">BOQ Quotation Sent</option>
                    <option value="Won">Deal Won / Project Started</option>
                    <option value="Closed / Dropped">Closed / Dropped</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Add Note / Next Action</label>
                <textarea name="notes" class="form-control" rows="3" placeholder="e.g. Architect visited site on Tuesday, submitted ₹35L proposal..."></textarea>
            </div>

            <div style="display:flex; justify-content:flex-end; gap:12px; margin-top:24px;">
                <button type="button" onclick="document.getElementById('statusModal').style.display='none'" class="btn-outline">Cancel</button>
                <button type="submit" class="btn-gold">Save Status</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openStatusModal(id, name, status) {
        document.getElementById('modalEnqId').value = id;
        document.getElementById('modalClientTitle').innerText = 'Update: ' + name;
        document.getElementById('modalStatusSelect').value = status;
        document.getElementById('statusModal').style.display = 'flex';
    }
</script>

<?php require_once __DIR__ . '/includes/admin_footer.php'; ?>
