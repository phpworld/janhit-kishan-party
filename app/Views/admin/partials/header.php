<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JKP Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 260px;
            --topbar-height: 64px;
            --primary: #1b5e20;
            --primary-light: #2e7d32;
            --primary-dark: #144d19;
            --accent: #43a047;
            --sidebar-bg: #0f1923;
            --sidebar-hover: rgba(255,255,255,.06);
            --sidebar-active: rgba(67,160,71,.15);
            --sidebar-active-border: #43a047;
        }
        * { font-family: 'Inter', sans-serif; }
        body { background: #f0f2f5; margin: 0; }

        /* ── SIDEBAR ── */
        #sidebar {
            position: fixed; top: 0; left: 0;
            width: var(--sidebar-width); height: 100vh;
            background: var(--sidebar-bg);
            display: flex; flex-direction: column;
            z-index: 1050; transition: transform .25s ease;
            overflow-y: auto;
        }
        .sidebar-logo {
            padding: 22px 20px 18px;
            border-bottom: 1px solid rgba(255,255,255,.06);
        }
        .sidebar-logo .logo-badge {
            background: var(--primary);
            color: #fff; font-weight: 700; font-size: 11px;
            letter-spacing: 2px; padding: 3px 10px;
            border-radius: 4px; display: inline-block; margin-bottom: 6px;
        }
        .sidebar-logo h5 { color:#fff; margin:0; font-size:18px; font-weight:700; }
        .sidebar-logo small { color:rgba(255,255,255,.4); font-size:11px; }
        .sidebar-section {
            color: rgba(255,255,255,.3); font-size: 10px;
            font-weight: 600; letter-spacing: 1.5px;
            padding: 18px 20px 6px; text-transform: uppercase;
        }
        .sidebar-nav { padding: 0 10px 10px; flex:1; }
        .sidebar-link {
            display: flex; align-items: center; gap: 10px;
            padding: 9px 12px; border-radius: 8px;
            color: rgba(255,255,255,.65); text-decoration: none;
            font-size: 13.5px; font-weight: 500;
            transition: all .18s ease; margin-bottom: 2px;
            border-left: 3px solid transparent;
        }
        .sidebar-link i { font-size: 16px; width: 20px; text-align:center; }
        .sidebar-link:hover { background: var(--sidebar-hover); color: #fff; }
        .sidebar-link.active {
            background: var(--sidebar-active); color: #fff;
            border-left-color: var(--sidebar-active-border);
        }
        .sidebar-link .badge-count {
            margin-left:auto; background:rgba(255,255,255,.1);
            color:rgba(255,255,255,.7); font-size:10px;
            padding:2px 7px; border-radius:20px; font-weight:600;
        }
        .sidebar-footer {
            padding: 14px 20px;
            border-top: 1px solid rgba(255,255,255,.06);
            font-size: 12px; color: rgba(255,255,255,.3);
        }

        /* ── TOPBAR ── */
        #topbar {
            position: fixed; top: 0;
            left: var(--sidebar-width); right: 0;
            height: var(--topbar-height);
            background: #fff;
            border-bottom: 1px solid #e9ecef;
            display: flex; align-items: center;
            padding: 0 28px; z-index: 1040;
            box-shadow: 0 1px 4px rgba(0,0,0,.04);
        }
        .topbar-title { font-size: 17px; font-weight: 600; color: #1a1a2e; }
        .topbar-actions { margin-left:auto; display:flex; align-items:center; gap:12px; }
        .topbar-user {
            display:flex; align-items:center; gap:10px;
            font-size:13px; color:#444;
        }
        .topbar-avatar {
            width:36px; height:36px; border-radius:50%;
            background: var(--primary); color:#fff;
            display:flex; align-items:center; justify-content:center;
            font-weight:700; font-size:14px;
        }
        .topbar-btn {
            border:none; background:none;
            width:36px; height:36px; border-radius:8px;
            display:flex; align-items:center; justify-content:center;
            color:#666; font-size:17px; cursor:pointer;
            transition: background .15s;
        }
        .topbar-btn:hover { background:#f0f2f5; color:#1a1a2e; }

        /* ── MAIN ── */
        #main-content {
            margin-left: var(--sidebar-width);
            margin-top: var(--topbar-height);
            padding: 28px;
            min-height: calc(100vh - var(--topbar-height));
        }

        /* ── ALERTS ── */
        .alert { border:none; border-radius:10px; font-size:14px; }
        .alert-success { background:#e8f5e9; color:#1b5e20; }
        .alert-danger   { background:#fdecea; color:#b71c1c; }

        /* ── CARDS ── */
        .panel-card {
            background:#fff; border-radius:14px;
            border:none; box-shadow:0 1px 8px rgba(0,0,0,.06);
        }
        .panel-card .card-header {
            background:none; border-bottom:1px solid #f0f2f5;
            padding:16px 20px; font-weight:600; font-size:15px;
            border-radius:14px 14px 0 0 !important;
        }
        .panel-card .card-body { padding:20px; }

        /* ── TABLES ── */
        .admin-table { font-size:13.5px; }
        .admin-table thead th {
            background:#f8f9fa; font-weight:600;
            color:#555; border-top:none; font-size:12px;
            text-transform:uppercase; letter-spacing:.6px;
        }
        .admin-table td { vertical-align:middle; }

        /* ── FORM ── */
        .form-label { font-size:13px; font-weight:600; color:#444; margin-bottom:5px; }
        .form-control, .form-select {
            border-radius:8px; font-size:13.5px;
            border-color:#e2e6ea;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(67,160,71,.15);
        }
        .btn-primary-cms {
            background: var(--primary); border:none; color:#fff;
            border-radius:8px; padding:8px 22px; font-size:14px;
            font-weight:600; transition: background .18s;
        }
        .btn-primary-cms:hover { background: var(--primary-light); color:#fff; }
        .btn-outline-cms {
            border:1.5px solid var(--primary); color:var(--primary);
            border-radius:8px; padding:8px 22px; font-size:14px;
            font-weight:600; background:none; transition:all .18s;
        }
        .btn-outline-cms:hover { background:var(--primary); color:#fff; }

        /* ── PAGE HEADER ── */
        .page-header {
            display:flex; align-items:center; justify-content:space-between;
            margin-bottom:24px;
        }
        .page-header h2 {
            font-size:22px; font-weight:700; color:#1a1a2e; margin:0;
        }
        .page-header .breadcrumb {
            font-size:12px; margin:0; background:none; padding:0;
        }

        /* ── RESPONSIVE ── */
        @media (max-width:768px) {
            #sidebar { transform: translateX(-100%); }
            #sidebar.open { transform: translateX(0); }
            #topbar, #main-content { left:0; margin-left:0; }
        }
    </style>
</head>
<body>

<?php
$currentUrl = current_url();
$isActive   = fn($path) => (str_contains($currentUrl, $path) ? 'active' : '');
?>

<!-- ══ SIDEBAR ══ -->
<aside id="sidebar">
    <div class="sidebar-logo">
        <div class="logo-badge">JKP</div>
        <h5>Janhit Kisan Party</h5>
        <small>Content Management System</small>
    </div>

    <nav class="sidebar-nav">
        <div class="sidebar-section">Main</div>
        <a href="<?= site_url('admin') ?>" class="sidebar-link <?= (rtrim($currentUrl,'/')==rtrim(site_url('admin'),'/') ? 'active' : '') ?>">
            <i class="bi bi-grid-fill"></i> Dashboard
        </a>
        <a href="<?= site_url('/') ?>" class="sidebar-link" target="_blank">
            <i class="bi bi-box-arrow-up-right"></i> View Website
        </a>

        <div class="sidebar-section">Homepage Sections</div>
        <a href="<?= site_url('admin/cms/navigation') ?>" class="sidebar-link <?= $isActive('cms/navigation') ?>">
            <i class="bi bi-list-ul"></i> Main Navigation
        </a>
        <a href="<?= site_url('admin/cms/home-sliders') ?>" class="sidebar-link <?= $isActive('home-sliders') ?>">
            <i class="bi bi-play-circle"></i> Hero Slider
        </a>
        <a href="<?= site_url('admin/cms/presidents') ?>" class="sidebar-link <?= $isActive('presidents') ?>">
            <i class="bi bi-person-badge"></i> Party Presidents
        </a>
        <a href="<?= site_url('admin/cms/footprints') ?>" class="sidebar-link <?= $isActive('footprints') ?>">
            <i class="bi bi-flag"></i> Our Footprints
        </a>
        <a href="<?= site_url('admin/map-markers') ?>" class="sidebar-link <?= $isActive('map-markers') ?>">
            <i class="bi bi-geo-alt"></i> Map Markers
        </a>
        <a href="<?= site_url('admin/cms/inspirations') ?>" class="sidebar-link <?= $isActive('inspirations') ?>">
            <i class="bi bi-lightbulb"></i> Inspiration Slider
        </a>
        <a href="<?= site_url('admin/cms/press-gallery') ?>" class="sidebar-link <?= $isActive('press-gallery') ?>">
            <i class="bi bi-images"></i> Press Gallery
        </a>

        <div class="sidebar-section">Website Pages</div>
        <a href="<?= site_url('admin/pages') ?>" class="sidebar-link <?= $isActive('admin/pages') ?>">
            <i class="bi bi-file-earmark-text"></i> CMS Pages
        </a>

        <div class="sidebar-section">Settings</div>
        <a href="<?= site_url('admin/settings/global') ?>" class="sidebar-link <?= $isActive('settings/global') ?>">
            <i class="bi bi-globe2"></i> Global Settings
        </a>
        <a href="<?= site_url('admin/settings/contact') ?>" class="sidebar-link <?= $isActive('settings/contact') ?>">
            <i class="bi bi-geo-alt"></i> Contact Info
        </a>
        <a href="<?= site_url('admin/settings/social') ?>" class="sidebar-link <?= $isActive('settings/social') ?>">
            <i class="bi bi-share"></i> Social Media
        </a>
        <a href="<?= site_url('admin/settings/submissions') ?>" class="sidebar-link <?= $isActive('settings/submissions') ?>">
            <i class="bi bi-inbox"></i> Inbox
        </a>
        <a href="<?= site_url('admin/settings/password') ?>" class="sidebar-link <?= $isActive('settings/password') ?>">
            <i class="bi bi-shield-lock"></i> Change Password
        </a>
    </nav>

    <div class="sidebar-footer">
        &copy; 2026 JKP &mdash; v1.0
    </div>
</aside>

<!-- ══ TOPBAR ══ -->
<header id="topbar">
    <span class="topbar-title">CMS Admin Panel</span>
    <div class="topbar-actions">
        <a href="<?= site_url('/') ?>" target="_blank" class="topbar-btn" title="View Site">
            <i class="bi bi-globe2"></i>
        </a>
        <div class="topbar-user">
            <div class="topbar-avatar"><?= strtoupper(substr((string) session('adminName'), 0, 1)) ?></div>
            <div>
                <div style="font-weight:600;font-size:13px;line-height:1.2"><?= esc((string) session('adminName')) ?></div>
                <div style="font-size:11px;color:#999;">Administrator</div>
            </div>
            <a href="<?= site_url('admin/logout') ?>" class="topbar-btn ms-1" title="Logout">
                <i class="bi bi-box-arrow-right"></i>
            </a>
        </div>
    </div>
</header>

<!-- ══ MAIN CONTENT ══ -->
<main id="main-content">
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success d-flex align-items-center gap-2 mb-4">
            <i class="bi bi-check-circle-fill"></i>
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger d-flex align-items-center gap-2 mb-4">
            <i class="bi bi-exclamation-triangle-fill"></i>
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

