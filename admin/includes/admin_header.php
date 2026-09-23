<?php
require_once __DIR__ . '/../auth_check.php';
require_once __DIR__ . '/../../config/db.php';

$dm = DataManager::getInstance();
$stats = $dm->getAdminStats();
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'Admin Dashboard' ?> — Muskan Interiors Studio</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700&family=IBM+Plex+Mono:wght@400;500;600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        :root {
            --bg-body: #090D14;
            --bg-sidebar: #0E141E;
            --bg-header: #0E141E;
            --card-bg: #131A26;
            --card-sub: #1A2332;
            --border-color: #202B3D;
            --gold: #C59A3F;
            --gold-light: #E0BA68;
            --gold-subtle: rgba(197, 154, 63, 0.12);
            --text-main: #FFFFFF;
            --text-muted: #94A3B8;
            --text-dim: #64748B;
            --success: #10B981;
            --warning: #F59E0B;
            --danger: #EF4444;
            --info: #3B82F6;
            --sidebar-width: 270px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg-body);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            overflow-x: hidden;
        }

        /* SIDEBAR */
        .admin-sidebar {
            width: var(--sidebar-width);
            background: var(--bg-sidebar);
            border-right: 1px solid var(--border-color);
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease;
        }

        .sidebar-brand {
            padding: 24px 20px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--gold), #9A7526);
            color: #090D14;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Cinzel', serif;
            font-size: 20px;
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(197,154,63,0.3);
        }

        .brand-info h2 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 16px;
            font-weight: 700;
            letter-spacing: 0.04em;
            color: #fff;
            line-height: 1.2;
        }

        .brand-info span {
            font-size: 11px;
            color: var(--gold);
            font-family: 'IBM Plex Mono', monospace;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .sidebar-menu {
            padding: 20px 12px;
            flex: 1;
            overflow-y: auto;
            list-style: none;
        }

        .menu-label {
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--text-dim);
            padding: 12px 14px 6px;
            margin-top: 10px;
        }

        .menu-label:first-child {
            margin-top: 0;
        }

        .nav-item {
            margin-bottom: 4px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 11px 14px;
            border-radius: 8px;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 13.5px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .nav-link-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav-link i {
            width: 18px;
            height: 18px;
            transition: color 0.2s;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.04);
            color: #fff;
        }

        .nav-link.active {
            background: var(--gold-subtle);
            color: var(--gold);
            font-weight: 600;
            border-left: 3px solid var(--gold);
        }

        .nav-link.active i {
            color: var(--gold);
        }

        .badge-count {
            background: #242E40;
            color: #CBD5E1;
            font-family: 'IBM Plex Mono', monospace;
            font-size: 11px;
            padding: 2px 7px;
            border-radius: 10px;
            font-weight: 600;
        }

        .badge-count.pulse {
            background: var(--gold);
            color: #090D14;
        }

        .sidebar-footer {
            padding: 16px 20px;
            border-top: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #0B1018;
        }

        .user-chip {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #1E293B;
            border: 1px solid var(--gold);
            color: var(--gold);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
        }

        .user-meta h4 {
            font-size: 13px;
            font-weight: 600;
            color: #fff;
        }

        .user-meta span {
            font-size: 11px;
            color: var(--text-dim);
        }

        .btn-logout {
            color: var(--text-dim);
            text-decoration: none;
            padding: 6px;
            border-radius: 6px;
            transition: all 0.2s;
            display: flex;
            align-items: center;
        }

        .btn-logout:hover {
            color: var(--danger);
            background: rgba(239, 68, 68, 0.1);
        }

        /* MAIN CONTENT LAYOUT */
        .admin-main {
            margin-left: var(--sidebar-width);
            flex: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            width: calc(100% - var(--sidebar-width));
        }

        /* TOP NAVBAR */
        .admin-topbar {
            height: 70px;
            background: var(--bg-header);
            border-bottom: 1px solid var(--border-color);
            padding: 0 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 90;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .toggle-sidebar-btn {
            display: none;
            background: none;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
        }

        .page-title-wrap h1 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 20px;
            font-weight: 700;
            color: #fff;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .db-status-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.25);
            color: #34D399;
            font-family: 'IBM Plex Mono', monospace;
            font-size: 11px;
            padding: 4px 10px;
            border-radius: 20px;
        }

        .db-status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #10B981;
            box-shadow: 0 0 6px #10B981;
        }

        .btn-gold {
            background: var(--gold);
            color: #090D14;
            border: none;
            border-radius: 7px;
            padding: 9px 16px;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            transition: all 0.2s;
            cursor: pointer;
        }

        .btn-gold:hover {
            background: var(--gold-light);
            transform: translateY(-1px);
        }

        .btn-outline {
            background: transparent;
            color: #fff;
            border: 1px solid var(--border-color);
            border-radius: 7px;
            padding: 9px 16px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            transition: all 0.2s;
            cursor: pointer;
        }

        .btn-outline:hover {
            border-color: var(--gold);
            color: var(--gold);
            background: rgba(197, 154, 63, 0.05);
        }

        /* PAGE BODY CONTAINER */
        .admin-content {
            padding: 32px;
            flex: 1;
        }

        /* CARDS & GRIDS */
        .stat-cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .admin-card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 24px;
            position: relative;
            overflow: hidden;
            transition: border-color 0.2s;
        }

        .admin-card:hover {
            border-color: rgba(197, 154, 63, 0.4);
        }

        .stat-card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .stat-card-title {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .stat-card-icon {
            width: 38px;
            height: 38px;
            border-radius: 8px;
            background: var(--card-sub);
            border: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold);
        }

        .stat-card-value {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 32px;
            font-weight: 700;
            color: #fff;
            margin-bottom: 6px;
        }

        .stat-card-delta {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: 12px;
            color: #34D399;
            font-family: 'IBM Plex Mono', monospace;
        }

        /* DATA TABLE */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        .admin-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 13.5px;
        }

        .admin-table th {
            background: #0D121B;
            padding: 14px 18px;
            color: var(--text-muted);
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 1px solid var(--border-color);
        }

        .admin-table td {
            padding: 16px 18px;
            border-bottom: 1px solid var(--border-color);
            color: #CBD5E1;
            vertical-align: middle;
        }

        .admin-table tr:hover td {
            background: rgba(255, 255, 255, 0.02);
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            font-family: 'IBM Plex Mono', monospace;
        }

        .status-badge.new { background: rgba(59, 130, 246, 0.15); color: #60A5FA; border: 1px solid rgba(59, 130, 246, 0.3); }
        .status-badge.completed { background: rgba(16, 185, 129, 0.15); color: #34D399; border: 1px solid rgba(16, 185, 129, 0.3); }
        .status-badge.inprogress { background: rgba(245, 158, 11, 0.15); color: #FBBF24; border: 1px solid rgba(245, 158, 11, 0.3); }
        .status-badge.contacted { background: rgba(168, 85, 247, 0.15); color: #C084FC; border: 1px solid rgba(168, 85, 247, 0.3); }

        /* FORMS */
        .form-section-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 16px;
            font-weight: 700;
            color: var(--gold);
            margin: 28px 0 16px;
            padding-bottom: 8px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-grid-3 {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 20px;
        }

        .form-grid-4 {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 12.5px;
            font-weight: 600;
            color: #E2E8F0;
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            background: var(--card-sub);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 12px 14px;
            color: #fff;
            font-size: 14px;
            font-family: inherit;
            transition: all 0.2s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(197, 154, 63, 0.15);
        }

        /* IMAGE UPLOAD DROPZONE */
        .upload-dropzone {
            border: 2px dashed var(--border-color);
            border-radius: 10px;
            padding: 24px;
            text-align: center;
            background: var(--card-sub);
            cursor: pointer;
            transition: all 0.2s;
            position: relative;
        }

        .upload-dropzone:hover {
            border-color: var(--gold);
            background: rgba(197, 154, 63, 0.03);
        }

        .upload-preview-box {
            width: 100%;
            height: 140px;
            border-radius: 8px;
            object-fit: cover;
            margin-top: 12px;
            display: none;
            border: 1px solid var(--border-color);
        }

        /* RESPONSIVE */
        @media(max-width: 1024px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }
            .admin-sidebar.open {
                transform: translateX(0);
            }
            .admin-main {
                margin-left: 0;
                width: 100%;
            }
            .toggle-sidebar-btn {
                display: block;
            }
            .form-grid-2, .form-grid-3, .form-grid-4 {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <!-- SIDEBAR -->
    <aside class="admin-sidebar" id="adminSidebar">
        <a href="index.php" class="sidebar-brand">
            <div class="brand-icon">M</div>
            <div class="brand-info">
                <h2>MUSKAN STUDIO</h2>
                <span>BUSSINESS CRM</span>
            </div>
        </a>

        <ul class="sidebar-menu">
            <li class="menu-label">Main Navigation</li>
            <li class="nav-item">
                <a href="index.php" class="nav-link <?= $currentPage === 'index.php' ? 'active' : '' ?>">
                    <div class="nav-link-left">
                        <i data-lucide="layout-dashboard"></i>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>

            <li class="menu-label">Project Management</li>
            <li class="nav-item">
                <a href="projects.php" class="nav-link <?= $currentPage === 'projects.php' ? 'active' : '' ?>">
                    <div class="nav-link-left">
                        <i data-lucide="folder-kanban"></i>
                        <span>All Projects</span>
                    </div>
                    <span class="badge-count"><?= $stats['total_projects'] ?></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="project_add.php" class="nav-link <?= $currentPage === 'project_add.php' ? 'active' : '' ?>">
                    <div class="nav-link-left">
                        <i data-lucide="plus-circle"></i>
                        <span>Upload Project & Work</span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="designs.php" class="nav-link <?= $currentPage === 'designs.php' ? 'active' : '' ?>">
                    <div class="nav-link-left">
                        <i data-lucide="palette"></i>
                        <span>3D Designs Gallery</span>
                    </div>
                    <span class="badge-count"><?= $stats['total_designs'] ?></span>
                </a>
            </li>

            <li class="menu-label">Customer Relationship</li>
            <li class="nav-item">
                <a href="enquiries.php" class="nav-link <?= $currentPage === 'enquiries.php' ? 'active' : '' ?>">
                    <div class="nav-link-left">
                        <i data-lucide="inbox"></i>
                        <span>Leads & Enquiries</span>
                    </div>
                    <?php if ($stats['new_leads'] > 0): ?>
                        <span class="badge-count pulse"><?= $stats['new_leads'] ?> New</span>
                    <?php else: ?>
                        <span class="badge-count"><?= $stats['total_enquiries'] ?></span>
                    <?php endif; ?>
                </a>
            </li>

            <li class="menu-label">Live Platform</li>
            <li class="nav-item">
                <a href="../index.php" target="_blank" class="nav-link">
                    <div class="nav-link-left">
                        <i data-lucide="external-link"></i>
                        <span>View Public Website</span>
                    </div>
                </a>
            </li>
        </ul>

        <div class="sidebar-footer">
            <div class="user-chip">
                <div class="avatar">M</div>
                <div class="user-meta">
                    <h4><?= htmlspecialchars($_SESSION['admin_user']['name'] ?? 'Admin') ?></h4>
                    <span><?= htmlspecialchars($_SESSION['admin_user']['role'] ?? 'Super Admin') ?></span>
                </div>
            </div>
            <a href="logout.php" class="btn-logout" title="Sign Out">
                <i data-lucide="log-out" style="width:18px;height:18px;"></i>
            </a>
        </div>
    </aside>

    <!-- MAIN WRAPPER -->
    <div class="admin-main">
        
        <!-- TOPBAR -->
        <header class="admin-topbar">
            <div class="topbar-left">
                <button class="toggle-sidebar-btn" onclick="document.getElementById('adminSidebar').classList.toggle('open')">
                    <i data-lucide="menu" style="width:22px;height:22px;"></i>
                </button>
                <div class="page-title-wrap">
                    <h1><?= $pageTitle ?? 'Overview' ?></h1>
                </div>
            </div>

            <div class="topbar-right">
                <div class="db-status-pill">
                    <div class="db-status-dot"></div>
                    <span><?= $stats['is_mysql'] ? 'MySQL Database Online' : 'Flat JSON Storage Online' ?></span>
                </div>
                <a href="project_add.php" class="btn-gold">
                    <i data-lucide="plus" style="width:15px;height:15px;"></i> Upload Project
                </a>
            </div>
        </header>

        <!-- CONTENT -->
        <div class="admin-content">
