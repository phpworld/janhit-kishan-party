<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($page['meta_title'] ?: $page['title']) ?> | JKP</title>
    <?php if ($page['meta_description']): ?>
        <meta name="description" content="<?= esc($page['meta_description']) ?>">
    <?php endif; ?>
    <?php if ($page['meta_keywords']): ?>
        <meta name="keywords" content="<?= esc($page['meta_keywords']) ?>">
    <?php endif; ?>
    <link rel="canonical" href="<?= current_url() ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background: #f8f9fa;
            color: #333;
        }

        /* ── NAVBAR ── */
        .top-navbar {
            background: #0f1923;
            padding: 14px 0;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 12px rgba(0, 0, 0, .25);
        }

        .top-navbar .brand {
            font-size: 20px;
            font-weight: 700;
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .top-navbar .brand .badge-logo {
            background: #1b5e20;
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
            padding: 3px 9px;
            border-radius: 5px;
        }

        .nav-links a {
            color: rgba(255, 255, 255, .75);
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            padding: 6px 14px;
            border-radius: 7px;
            transition: all .15s;
        }

        .nav-links a:hover {
            background: rgba(255, 255, 255, .08);
            color: #fff;
        }

        /* ── HERO BANNER ── */
        .page-banner {
            background: linear-gradient(135deg, #0f1923 0%, #1b3a2d 100%);
            padding: 56px 0 44px;
            position: relative;
            overflow: hidden;
        }

        .page-banner::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.02'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .page-banner h1 {
            color: #fff;
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 10px;
            position: relative;
        }

        .page-banner .breadcrumb-bar {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: rgba(255, 255, 255, .5);
            position: relative;
        }

        .page-banner .breadcrumb-bar a {
            color: rgba(255, 255, 255, .6);
            text-decoration: none;
        }

        .page-banner .breadcrumb-bar a:hover {
            color: #fff;
        }

        /* ── CONTENT CARD ── */
        .content-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 2px 20px rgba(0, 0, 0, .06);
            padding: 40px 48px;
            line-height: 1.85;
            font-size: 15.5px;
            color: #333;
        }

        .content-card h2,
        .content-card h3 {
            color: #0f1923;
            font-weight: 700;
            margin-top: 1.4em;
        }

        .content-card p {
            margin-bottom: 1.1em;
        }

        .content-card ul,
        .content-card ol {
            padding-left: 1.6em;
            margin-bottom: 1em;
        }

        .content-card li {
            margin-bottom: .4em;
        }

        .content-card a {
            color: #1b5e20;
        }

        .content-card blockquote {
            border-left: 4px solid #43a047;
            background: #f1f8e9;
            padding: 14px 20px;
            border-radius: 0 10px 10px 0;
            margin: 1.5em 0;
            font-style: italic;
            color: #555;
        }

        .content-card table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 1em;
            font-size: 14px;
        }

        .content-card table th {
            background: #f0f2f5;
            padding: 8px 14px;
            font-weight: 600;
        }

        .content-card table td {
            padding: 8px 14px;
            border-top: 1px solid #f0f2f5;
        }

        /* ── PDF SECTION ── */
        .pdf-section {
            margin-top: 36px;
            border-top: 2px dashed #e8f5e9;
            padding-top: 28px;
        }

        .pdf-section-title {
            font-size: 13px;
            font-weight: 700;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 14px;
        }

        .pdf-toolbar {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 16px;
        }

        .pdf-download-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #1b5e20;
            color: #fff;
            text-decoration: none;
            font-size: 13.5px;
            font-weight: 600;
            padding: 10px 22px;
            border-radius: 10px;
            transition: background .18s;
        }

        .pdf-download-btn:hover {
            background: #2e7d32;
            color: #fff;
        }

        .pdf-view-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #e8f5e9;
            color: #1b5e20;
            text-decoration: none;
            font-size: 13.5px;
            font-weight: 600;
            padding: 10px 22px;
            border-radius: 10px;
            border: 2px solid #c8e6c9;
            transition: all .18s;
        }

        .pdf-view-btn:hover {
            background: #c8e6c9;
            color: #1b5e20;
        }

        .pdf-viewer-wrap {
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(0, 0, 0, .07);
            margin-top: 12px;
        }

        .pdf-viewer-wrap iframe {
            width: 100%;
            height: 680px;
            border: none;
            display: block;
        }

        .pdf-viewer-wrap .pdf-no-support {
            padding: 32px;
            text-align: center;
            color: #888;
            font-size: 14px;
        }

        @media (max-width: 600px) {
            .pdf-viewer-wrap iframe {
                height: 420px;
            }
        }

        /* ── FEATURED IMAGE ── */
        .featured-img-wrap {
            margin: -40px -48px 32px;
            border-radius: 16px 16px 0 0;
            overflow: hidden;
        }

        .featured-img-wrap img {
            width: 100%;
            max-height: 380px;
            object-fit: cover;
        }

        /* ── META INFO BAR ── */
        .meta-bar {
            display: flex;
            align-items: center;
            gap: 16px;
            font-size: 12.5px;
            color: #aaa;
            padding-bottom: 20px;
            margin-bottom: 24px;
            border-bottom: 1px solid #f0f2f5;
        }

        .meta-bar i {
            color: #43a047;
        }

        /* ── FOOTER ── */
        .site-footer {
            background: #0f1923;
            color: rgba(255, 255, 255, .4);
            text-align: center;
            padding: 22px;
            font-size: 12.5px;
        }

        .site-footer a {
            color: rgba(255, 255, 255, .5);
            text-decoration: none;
        }

        .site-footer a:hover {
            color: #fff;
        }

        @media (max-width: 600px) {
            .content-card {
                padding: 24px 18px;
            }

            .featured-img-wrap {
                margin: -24px -18px 20px;
            }

            .page-banner h1 {
                font-size: 26px;
            }
        }

        /* ── LAYOUT WRAPPERS ── */
        .layout-site-width {
            max-width: 860px;
            margin: 0 auto;
            padding: 44px 20px 60px;
        }

        .layout-full-width {
            padding: 44px 24px 60px;
        }

        .layout-with-sidebar {
            padding: 44px 0 60px;
        }

        /* ── SIDEBAR ── */
        .sidebar-card {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 2px 16px rgba(0, 0, 0, .06);
            padding: 24px 20px;
            font-size: 14px;
            color: #333;
            line-height: 1.7;
            position: sticky;
            top: 80px;
        }

        .sidebar-card .sidebar-widget {
            margin-bottom: 28px;
        }

        .sidebar-card .sidebar-widget:last-child {
            margin-bottom: 0;
        }

        .sidebar-card .widget-title {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #1b5e20;
            border-bottom: 2px solid #e8f5e9;
            padding-bottom: 8px;
            margin-bottom: 12px;
        }

        .sidebar-empty {
            background: #f8f9fa;
            border: 2px dashed #e2e6ea;
            border-radius: 14px;
            padding: 32px 18px;
            text-align: center;
            color: #bbb;
            font-size: 13px;
        }

        @media (max-width: 991px) {
            .sidebar-card {
                position: static;
                margin-bottom: 20px;
            }

            .layout-with-sidebar {
                padding: 28px 16px 44px;
            }
        }
    </style>
</head>

<body>

    <!-- ── NAVBAR ── -->
    <nav class="top-navbar">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="<?= site_url('/') ?>" class="brand">
                <span class="badge-logo">JKP</span>
                <span style="font-size:15px;font-weight:600;">Janhit Kisan Party</span>
            </a>
            <div class="nav-links d-flex gap-1">
                <?php foreach ($navigation as $nav): ?>
                    <a href="<?= esc($nav['url']) ?>"><?= esc($nav['label']) ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </nav>

    <!-- ── BANNER ── -->
    <div class="page-banner">
        <div class="container">
            <h1><?= esc($page['title']) ?></h1>
            <div class="breadcrumb-bar">
                <a href="<?= site_url('/') ?>"><i class="bi bi-house-fill me-1"></i>Home</a>
                <i class="bi bi-chevron-right" style="font-size:10px;"></i>
                <span><?= esc($page['title']) ?></span>
            </div>
        </div>
    </div>

    <!-- ── CONTENT ── -->
    <?php
    $layout          = $page['page_layout'] ?? 'site-width';
    $hasSidebars     = in_array($layout, ['left-sidebar', 'right-sidebar', 'both-sidebars']);
    $needsLeftSide   = in_array($layout, ['left-sidebar',  'both-sidebars']);
    $needsRightSide  = in_array($layout, ['right-sidebar', 'both-sidebars']);

    // Resolve sidebar content
    $leftSidebarHtml  = '';
    $rightSidebarHtml = '';
    if ($needsLeftSide) {
        $leftSidebarHtml = ($page['sidebar_left_source'] ?? 'default') === 'custom'
            ? ($page['sidebar_left_content']  ?? '')
            : ($defaultSidebarLeft ?? '');
    }
    if ($needsRightSide) {
        $rightSidebarHtml = ($page['sidebar_right_source'] ?? 'default') === 'custom'
            ? ($page['sidebar_right_content'] ?? '')
            : ($defaultSidebarRight ?? '');
    }

    // Column widths
    $contentCols = 'col-12';
    if ($layout === 'left-sidebar'  || $layout === 'right-sidebar')  $contentCols = 'col-lg-9';
    if ($layout === 'both-sidebars') $contentCols = 'col-lg-6';
    ?>

    <?php if ($layout === 'full-width'): ?>
        <div class="layout-full-width">
            <div class="container-fluid">
            <?php elseif ($hasSidebars): ?>
                <div class="layout-with-sidebar">
                    <div class="container">
                        <div class="row g-4 align-items-start">
                            <?php if ($needsLeftSide): ?>
                                <div class="col-lg-3">
                                    <div class="sidebar-card">
                                        <?php if ($leftSidebarHtml): ?>
                                            <?= $leftSidebarHtml ?>
                                        <?php else: ?>
                                            <div class="sidebar-empty">
                                                <i class="bi bi-layout-sidebar" style="font-size:28px;display:block;margin-bottom:8px;opacity:.35;"></i>
                                                Left sidebar content not set.<br>
                                                <a href="<?= site_url('admin/pages/edit/' . $page['id']) ?>" style="font-size:12px;color:#1b5e20;">Configure in Admin</a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="layout-site-width">
                                <div>
                                <?php endif; ?>

                                <!-- MAIN CONTENT COLUMN -->
                                <div class="<?= $hasSidebars ? $contentCols : '' ?>">
                                    <div class="content-card">

                                        <?php if (!empty($page['featured_image'])): ?>
                                            <div class="featured-img-wrap">
                                                <img src="<?= base_url($page['featured_image']) ?>" alt="<?= esc($page['title']) ?>">
                                            </div>
                                        <?php endif; ?>

                                        <div class="meta-bar">
                                            <span><i class="bi bi-calendar3 me-1"></i><?= date('d F Y', strtotime($page['updated_at'] ?: $page['created_at'])) ?></span>
                                            <span style="background:#e8f5e9;color:#1b5e20;font-size:11px;font-weight:700;padding:2px 9px;border-radius:20px;">
                                                <i class="bi bi-circle-fill me-1" style="font-size:7px;"></i>Published
                                            </span>
                                        </div>

                                        <?= $page['content'] ?>

                                        <?php if (!empty($page['pdf_file'])): ?>
                                            <?php
                                            $pdfUrl     = base_url($page['pdf_file']);
                                            $pdfLabel   = !empty($page['pdf_label']) ? $page['pdf_label'] : 'View / Download PDF';
                                            $pdfDisplay = $page['pdf_display'] ?? 'both';
                                            $showInline   = in_array($pdfDisplay, ['inline', 'both']);
                                            $showDownload = in_array($pdfDisplay, ['download', 'both']);
                                            ?>
                                            <div class="pdf-section">
                                                <div class="pdf-section-title"><i class="bi bi-file-earmark-pdf-fill text-danger me-2"></i>Document Attachment</div>

                                                <?php if ($showDownload || $showInline): ?>
                                                    <div class="pdf-toolbar">
                                                        <?php if ($showDownload): ?>
                                                            <a href="<?= esc($pdfUrl) ?>" download class="pdf-download-btn">
                                                                <i class="bi bi-download"></i><?= esc($pdfLabel) ?>
                                                            </a>
                                                        <?php endif; ?>
                                                        <?php if ($showInline && $showDownload): ?>
                                                            <a href="<?= esc($pdfUrl) ?>" target="_blank" class="pdf-view-btn">
                                                                <i class="bi bi-box-arrow-up-right"></i>Open in New Tab
                                                            </a>
                                                        <?php elseif ($showInline): ?>
                                                            <a href="<?= esc($pdfUrl) ?>" target="_blank" class="pdf-view-btn">
                                                                <i class="bi bi-box-arrow-up-right"></i>Open PDF
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if ($showInline): ?>
                                                    <div class="pdf-viewer-wrap">
                                                        <iframe src="<?= esc($pdfUrl) ?>#toolbar=1&navpanes=0&scrollbar=1"
                                                            title="<?= esc($pdfLabel) ?>"
                                                            loading="lazy">
                                                            <div class="pdf-no-support">
                                                                Your browser does not support embedded PDFs.
                                                                <a href="<?= esc($pdfUrl) ?>" class="pdf-download-btn ms-2" download>
                                                                    <i class="bi bi-download"></i> Download PDF
                                                                </a>
                                                            </div>
                                                        </iframe>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>

                                    </div><!-- /.content-card -->
                                </div><!-- /.content col -->

                                <?php if ($needsRightSide): ?>
                                    <div class="col-lg-3">
                                        <div class="sidebar-card">
                                            <?php if ($rightSidebarHtml): ?>
                                                <?= $rightSidebarHtml ?>
                                            <?php else: ?>
                                                <div class="sidebar-empty">
                                                    <i class="bi bi-layout-sidebar-reverse" style="font-size:28px;display:block;margin-bottom:8px;opacity:.35;"></i>
                                                    Right sidebar content not set.<br>
                                                    <a href="<?= site_url('admin/pages/edit/' . $page['id']) ?>" style="font-size:12px;color:#1b5e20;">Configure in Admin</a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if ($hasSidebars): ?>
                                </div><!-- /.row --><?php endif; ?>
                            </div><!-- /.container or inner div -->
                        </div><!-- /.layout-* -->

                        <!-- ── FOOTER ── -->
                        <footer class="site-footer">
                            <span>&copy; <?= date('Y') ?> Janhit Kisan Party. All rights reserved.</span>
                            &nbsp;|&nbsp;
                            <a href="<?= site_url('/') ?>">Home</a>
                            &nbsp;|&nbsp;
                            <a href="<?= site_url('admin') ?>">Admin</a>
                        </footer>

                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>