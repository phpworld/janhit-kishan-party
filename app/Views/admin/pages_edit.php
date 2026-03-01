<?= view('admin/partials/header') ?>

<!-- CKEditor 5 -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<style>
    .ck-editor__editable_inline {
        min-height: 340px;
        border-radius: 0 0 8px 8px !important;
    }

    .ck.ck-toolbar {
        border-radius: 8px 8px 0 0 !important;
    }

    .seo-score-bar {
        height: 6px;
        border-radius: 3px;
        background: #e9ecef;
        overflow: hidden;
        margin-top: 6px;
    }

    .seo-score-fill {
        height: 100%;
        border-radius: 3px;
        background: #43a047;
        transition: width .3s;
    }

    .char-counter {
        font-size: 11px;
        color: #999;
        text-align: right;
        margin-top: 3px;
    }

    .char-counter.warn {
        color: #f57c00;
    }

    .char-counter.over {
        color: #c62828;
    }

    .featured-img-preview {
        width: 100%;
        height: 160px;
        border-radius: 10px;
        object-fit: cover;
        border: 2px dashed #e2e6ea;
        display: none;
        margin-bottom: 10px;
    }

    .featured-img-preview.has-img {
        display: block;
        border-style: solid;
    }

    .featured-placeholder {
        width: 100%;
        height: 120px;
        border: 2px dashed #e2e6ea;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        color: #bbb;
        font-size: 13px;
        cursor: pointer;
        transition: border-color .2s;
    }

    .featured-placeholder:hover {
        border-color: #43a047;
        color: #43a047;
    }

    .tab-nav {
        display: flex;
        gap: 4px;
        margin-bottom: 20px;
        border-bottom: none;
    }

    .tab-btn {
        padding: 8px 18px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        border: none;
        background: #f0f2f5;
        color: #666;
        cursor: pointer;
        transition: all .18s;
    }

    .tab-btn.active {
        background: #1b5e20;
        color: #fff;
    }

    .tab-pane {
        display: none;
    }

    .tab-pane.active {
        display: block;
    }

    /* ── Layout Picker ── */
    .layout-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
    }

    .layout-option {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
        padding: 12px 8px;
        border-radius: 10px;
        cursor: pointer;
        border: 2px solid #e2e6ea;
        background: #fff;
        transition: all .18s;
        font-size: 12px;
        font-weight: 600;
        color: #555;
        user-select: none;
    }

    .layout-option input[type=radio] {
        display: none;
    }

    .layout-option:hover {
        border-color: #43a047;
        color: #1b5e20;
    }

    .layout-option.selected {
        border-color: #1b5e20;
        background: #e8f5e9;
        color: #1b5e20;
    }

    .lv {
        width: 54px;
        height: 34px;
        border-radius: 5px;
        overflow: hidden;
        display: flex;
        gap: 3px;
        padding: 4px;
        background: #dde;
    }

    .lv-content {
        background: #43a047;
        border-radius: 3px;
        flex: 1;
    }

    .lv-sidebar {
        background: #a5d6a7;
        border-radius: 3px;
        width: 12px;
        flex-shrink: 0;
    }

    .lv-gap {
        width: 3px;
    }

    /* ── Sidebar Source Toggle ── */
    .sidebar-source-btns {
        display: flex;
        gap: 8px;
        margin-bottom: 14px;
    }

    .src-btn {
        flex: 1;
        padding: 9px;
        border-radius: 9px;
        font-size: 12.5px;
        font-weight: 600;
        border: 2px solid #e2e6ea;
        background: #fff;
        cursor: pointer;
        text-align: center;
        color: #666;
        transition: all .18s;
    }

    .src-btn.active {
        border-color: #1b5e20;
        background: #e8f5e9;
        color: #1b5e20;
    }

    .sidebar-custom-area {
        display: none;
    }

    .sidebar-custom-area.visible {
        display: block;
    }

    .sidebar-default-note {
        display: none;
    }

    .sidebar-default-note.visible {
        display: flex;
    }

    /* ── PDF Panel ── */
    .pdf-drop-zone {
        border: 2px dashed #e2e6ea;
        border-radius: 10px;
        padding: 28px 16px;
        text-align: center;
        color: #bbb;
        font-size: 13px;
        cursor: pointer;
        transition: border-color .2s, color .2s;
        position: relative;
    }

    .pdf-drop-zone:hover {
        border-color: #1b5e20;
        color: #1b5e20;
    }

    .pdf-drop-zone input[type=file] {
        position: absolute;
        inset: 0;
        opacity: 0;
        cursor: pointer;
        width: 100%;
    }

    .pdf-display-opts {
        display: flex;
        gap: 8px;
        margin-top: 12px;
    }

    .pdf-disp-btn {
        flex: 1;
        padding: 8px 6px;
        font-size: 12px;
        font-weight: 600;
        border: 2px solid #e2e6ea;
        border-radius: 9px;
        background: #fff;
        color: #666;
        cursor: pointer;
        text-align: center;
        transition: all .18s;
    }

    .pdf-disp-btn.active {
        border-color: #1b5e20;
        background: #e8f5e9;
        color: #1b5e20;
    }

    .pdf-existing {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #f0f8f1;
        border: 1px solid #c8e6c9;
        border-radius: 10px;
        padding: 10px 14px;
        margin-bottom: 12px;
    }

    .pdf-existing i {
        color: #e53935;
        font-size: 22px;
        flex-shrink: 0;
    }

    .pdf-existing-name {
        font-size: 12.5px;
        font-weight: 600;
        color: #1b5e20;
        word-break: break-all;
    }

    .pdf-existing-meta {
        font-size: 11px;
        color: #999;
        margin-top: 2px;
    }
</style>

<div class="page-header">
    <div>
        <h2><?= $page ? 'Edit Page' : 'Create New Page' ?></h2>
        <ol class="breadcrumb" style="font-size:12px;">
            <li class="breadcrumb-item"><a href="<?= site_url('admin') ?>" style="color:#999;">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= site_url('admin/pages') ?>" style="color:#999;">Pages</a></li>
            <li class="breadcrumb-item active" style="color:#999;"><?= $page ? esc($page['title']) : 'New Page' ?></li>
        </ol>
    </div>
    <a href="<?= site_url('admin/pages') ?>" class="btn btn-outline-cms">
        <i class="bi bi-arrow-left me-2"></i>Back to Pages
    </a>
</div>

<form method="post" action="<?= $page ? site_url('admin/pages/save/' . $page['id']) : site_url('admin/pages/save') ?>"
    enctype="multipart/form-data" id="pageForm">

    <div class="row g-4">

        <!-- ── LEFT COLUMN: Title + Content + SEO ── -->
        <div class="col-lg-8">

            <!-- Tab Nav -->
            <div class="tab-nav">
                <button type="button" class="tab-btn active" data-tab="content">
                    <i class="bi bi-file-text me-1"></i>Content
                </button>
                <button type="button" class="tab-btn" data-tab="seo">
                    <i class="bi bi-search me-1"></i>SEO Options
                </button>
                <button type="button" class="tab-btn" data-tab="layout">
                    <i class="bi bi-layout-split me-1"></i>Layout &amp; Sidebar
                </button>
            </div>

            <!-- CONTENT TAB -->
            <div id="tab-content" class="tab-pane active">
                <div class="panel-card mb-4">
                    <div class="card-header">
                        <i class="bi bi-type me-2 text-success"></i>Page Title
                    </div>
                    <div class="card-body">
                        <input type="text" name="title" id="pageTitle" class="form-control"
                            placeholder="Enter page title…"
                            value="<?= esc((string) ($page['title'] ?? '')) ?>"
                            required
                            style="font-size:17px;font-weight:600;border-radius:10px;padding:12px 16px;">
                    </div>
                </div>

                <div class="panel-card">
                    <div class="card-header">
                        <i class="bi bi-body-text me-2 text-success"></i>Page Content
                    </div>
                    <div class="card-body">
                        <textarea name="content" id="pageContent"><?= ($page['content'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>

            <!-- SEO TAB -->
            <div id="tab-seo" class="tab-pane">
                <!-- Google Preview -->
                <div class="panel-card mb-4">
                    <div class="card-header">
                        <i class="bi bi-google me-2 text-success"></i>Search Engine Preview
                    </div>
                    <div class="card-body">
                        <div style="background:#fff;border:1px solid #e8eaed;border-radius:10px;padding:16px 20px;font-family:Arial,sans-serif;">
                            <div id="seoPreviewTitle" style="color:#1a0dab;font-size:18px;font-weight:400;line-height:1.3;margin-bottom:3px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                                <?= esc((string) ($page['meta_title'] ?? $page['title'] ?? 'Page Title')) ?>
                            </div>
                            <div id="seoPreviewSlug" style="color:#006621;font-size:13px;margin-bottom:5px;">
                                <?= rtrim(base_url(), '/') ?>/<span id="seoPreviewSlugText"><?= esc((string) ($page['slug'] ?? 'page-slug')) ?></span>
                            </div>
                            <div id="seoPreviewDesc" style="color:#545454;font-size:13px;line-height:1.5;">
                                <?= esc(mb_substr((string) ($page['meta_description'] ?? 'Your meta description will appear here. Write a compelling summary to improve click-through rates.'), 0, 160)) ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel-card">
                    <div class="card-header">
                        <i class="bi bi-tags me-2 text-success"></i>SEO Fields
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <label class="form-label">Meta Title <span style="color:#999;font-weight:400;">(Recommended: 50–60 chars)</span></label>
                            <input type="text" name="meta_title" id="metaTitle" class="form-control"
                                maxlength="100"
                                placeholder="Leave blank to use page title"
                                value="<?= esc((string) ($page['meta_title'] ?? '')) ?>">
                            <div id="metaTitleCount" class="char-counter">0 / 60</div>
                            <div class="seo-score-bar">
                                <div id="metaTitleBar" class="seo-score-fill" style="width:0%"></div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Meta Keywords <span style="color:#999;font-weight:400;">(comma separated)</span></label>
                            <input type="text" name="meta_keywords" id="metaKeywords" class="form-control"
                                placeholder="e.g. kisan, party, india, jkp"
                                value="<?= esc((string) ($page['meta_keywords'] ?? '')) ?>">
                            <div style="font-size:11.5px;color:#aaa;margin-top:4px;">
                                <i class="bi bi-info-circle me-1"></i>Keywords have minimal SEO impact but help with content organization.
                            </div>
                        </div>

                        <div class="mb-2">
                            <label class="form-label">Meta Description <span style="color:#999;font-weight:400;">(Recommended: 150–160 chars)</span></label>
                            <textarea name="meta_description" id="metaDesc" class="form-control" rows="3"
                                maxlength="320"
                                placeholder="Write a brief description of this page for search engines…"><?= esc((string) ($page['meta_description'] ?? '')) ?></textarea>
                            <div id="metaDescCount" class="char-counter">0 / 160</div>
                            <div class="seo-score-bar">
                                <div id="metaDescBar" class="seo-score-fill" style="width:0%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- LAYOUT & SIDEBAR TAB -->
            <div id="tab-layout" class="tab-pane">

                <!-- Layout Selector -->
                <div class="panel-card mb-4">
                    <div class="card-header">
                        <i class="bi bi-layout-split me-2 text-success"></i>Page Layout
                    </div>
                    <div class="card-body">
                        <p class="text-muted" style="font-size:12.5px;margin-bottom:16px;">
                            Choose how the content area of this page is structured.
                        </p>
                        <?php
                        $curLayout = $page['page_layout'] ?? 'site-width';
                        $layouts = [
                            'full-width'    => ['label' => 'Full Width',         'lv' => '<div class="lv"><div class="lv-content"></div></div>'],
                            'site-width'    => ['label' => 'Site Width',         'lv' => '<div class="lv" style="padding:4px 10px;"><div class="lv-content"></div></div>'],
                            'left-sidebar'  => ['label' => 'Left Sidebar',       'lv' => '<div class="lv"><div class="lv-sidebar"></div><div class="lv-content"></div></div>'],
                            'right-sidebar' => ['label' => 'Right Sidebar',      'lv' => '<div class="lv"><div class="lv-content"></div><div class="lv-sidebar"></div></div>'],
                            'both-sidebars' => ['label' => 'Both Sidebars',      'lv' => '<div class="lv"><div class="lv-sidebar"></div><div class="lv-content"></div><div class="lv-sidebar"></div></div>'],
                        ];
                        ?>
                        <div class="layout-grid">
                            <?php foreach ($layouts as $val => $opt): ?>
                                <label class="layout-option <?= $curLayout === $val ? 'selected' : '' ?>" onclick="selectLayout('<?= $val ?>')">
                                    <input type="radio" name="page_layout" value="<?= $val ?>" <?= $curLayout === $val ? 'checked' : '' ?>>
                                    <?= $opt['lv'] ?>
                                    <span><?= $opt['label'] ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Left Sidebar Config -->
                <div id="leftSidebarPanel" class="panel-card mb-4" style="display:none;">
                    <div class="card-header">
                        <i class="bi bi-layout-sidebar me-2 text-success"></i>Left Sidebar Content
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="sidebar_left_source" id="sidebarLeftSource"
                            value="<?= esc($page['sidebar_left_source'] ?? 'default') ?>">
                        <div class="sidebar-source-btns">
                            <div class="src-btn <?= ($page['sidebar_left_source'] ?? 'default') === 'default' ? 'active' : '' ?>"
                                onclick="setSidebarSource('left','default')">
                                <i class="bi bi-gear me-1"></i>From Settings
                            </div>
                            <div class="src-btn <?= ($page['sidebar_left_source'] ?? 'default') === 'custom' ? 'active' : '' ?>"
                                onclick="setSidebarSource('left','custom')">
                                <i class="bi bi-pencil-square me-1"></i>Custom Content
                            </div>
                        </div>
                        <div id="leftSidebarDefaultNote" class="sidebar-default-note <?= ($page['sidebar_left_source'] ?? 'default') === 'default' ? 'visible' : '' ?>"
                            style="background:#f0f8f1;border:1px solid #c8e6c9;border-radius:9px;padding:12px 14px;font-size:12.5px;color:#2e7d32;align-items:flex-start;gap:8px;">
                            <i class="bi bi-info-circle mt-1" style="flex-shrink:0;"></i>
                            <span>The <strong>default sidebar</strong> from <a href="<?= site_url('admin/settings') ?>" style="color:#1b5e20;">Site Settings</a> will be displayed here. Choose <em>Custom Content</em> to override it for this page only.</span>
                        </div>
                        <div id="leftSidebarCustomArea" class="sidebar-custom-area <?= ($page['sidebar_left_source'] ?? 'default') === 'custom' ? 'visible' : '' ?>">
                            <label class="form-label">Sidebar HTML / Content</label>
                            <textarea name="sidebar_left_content" id="sidebarLeftContent"
                                class="form-control" rows="10"
                                placeholder="Enter custom HTML or content for the left sidebar…"
                                style="font-family:monospace;font-size:13px;border-radius:10px;"><?= esc((string)($page['sidebar_left_content'] ?? '')) ?></textarea>
                            <div style="font-size:11.5px;color:#aaa;margin-top:5px;">
                                <i class="bi bi-code-slash me-1"></i>You can use HTML, shortcodes, or plain text.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Sidebar Config -->
                <div id="rightSidebarPanel" class="panel-card mb-4" style="display:none;">
                    <div class="card-header">
                        <i class="bi bi-layout-sidebar-reverse me-2 text-success"></i>Right Sidebar Content
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="sidebar_right_source" id="sidebarRightSource"
                            value="<?= esc($page['sidebar_right_source'] ?? 'default') ?>">
                        <div class="sidebar-source-btns">
                            <div class="src-btn <?= ($page['sidebar_right_source'] ?? 'default') === 'default' ? 'active' : '' ?>"
                                onclick="setSidebarSource('right','default')">
                                <i class="bi bi-gear me-1"></i>From Settings
                            </div>
                            <div class="src-btn <?= ($page['sidebar_right_source'] ?? 'default') === 'custom' ? 'active' : '' ?>"
                                onclick="setSidebarSource('right','custom')">
                                <i class="bi bi-pencil-square me-1"></i>Custom Content
                            </div>
                        </div>
                        <div id="rightSidebarDefaultNote" class="sidebar-default-note <?= ($page['sidebar_right_source'] ?? 'default') === 'default' ? 'visible' : '' ?>"
                            style="background:#f0f8f1;border:1px solid #c8e6c9;border-radius:9px;padding:12px 14px;font-size:12.5px;color:#2e7d32;align-items:flex-start;gap:8px;">
                            <i class="bi bi-info-circle mt-1" style="flex-shrink:0;"></i>
                            <span>The <strong>default sidebar</strong> from <a href="<?= site_url('admin/settings') ?>" style="color:#1b5e20;">Site Settings</a> will be displayed here. Choose <em>Custom Content</em> to override it for this page only.</span>
                        </div>
                        <div id="rightSidebarCustomArea" class="sidebar-custom-area <?= ($page['sidebar_right_source'] ?? 'default') === 'custom' ? 'visible' : '' ?>">
                            <label class="form-label">Sidebar HTML / Content</label>
                            <textarea name="sidebar_right_content" id="sidebarRightContent"
                                class="form-control" rows="10"
                                placeholder="Enter custom HTML or content for the right sidebar…"
                                style="font-family:monospace;font-size:13px;border-radius:10px;"><?= esc((string)($page['sidebar_right_content'] ?? '')) ?></textarea>
                            <div style="font-size:11.5px;color:#aaa;margin-top:5px;">
                                <i class="bi bi-code-slash me-1"></i>You can use HTML, shortcodes, or plain text.
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- ── RIGHT COLUMN: Sidebar panels ── -->
        <div class="col-lg-4">

            <!-- Publish -->
            <div class="panel-card mb-4">
                <div class="card-header">
                    <i class="bi bi-send me-2 text-success"></i>Publish
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="draft" <?= (($page['status'] ?? 'draft') === 'draft')     ? 'selected' : '' ?>>
                                Draft
                            </option>
                            <option value="published" <?= (($page['status'] ?? '') === 'published') ? 'selected' : '' ?>>
                                Published
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">URL Slug</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background:#f0f2f5;border-color:#e2e6ea;font-size:12px;color:#999;">/</span>
                            <input type="text" name="slug" id="pageSlug" class="form-control"
                                placeholder="page-url-slug"
                                value="<?= esc((string) ($page['slug'] ?? '')) ?>" required>
                        </div>
                        <div style="font-size:11px;color:#aaa;margin-top:4px;">
                            <i class="bi bi-magic me-1"></i>Auto-generated from title. Customise if needed.
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary-cms">
                            <i class="bi bi-check-lg me-2"></i><?= $page ? 'Update Page' : 'Publish Page' ?>
                        </button>
                        <?php if ($page && $page['status'] === 'published'): ?>
                            <a href="<?= site_url('page/' . $page['slug']) ?>" target="_blank"
                                class="btn btn-outline-cms">
                                <i class="bi bi-eye me-2"></i>View Page
                            </a>
                        <?php endif; ?>
                        <?php if ($page): ?>
                            <a href="<?= site_url('admin/pages/delete/' . $page['id']) ?>"
                                onclick="return confirm('Delete this page permanently?')"
                                class="btn btn-sm" style="color:#c62828;font-size:13px;text-align:center;padding:8px;">
                                <i class="bi bi-trash me-1"></i>Delete Page
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Featured Image -->
            <div class="panel-card mb-4">
                <div class="card-header">
                    <i class="bi bi-image me-2 text-success"></i>Featured Image
                </div>
                <div class="card-body">
                    <img id="featuredPreview"
                        src="<?= !empty($page['featured_image']) ? base_url($page['featured_image']) : '' ?>"
                        alt="Featured Image" class="featured-img-preview <?= !empty($page['featured_image']) ? 'has-img' : '' ?>">

                    <?php if (empty($page['featured_image'])): ?>
                        <div class="featured-placeholder" onclick="document.getElementById('featuredImageFile').click()">
                            <i class="bi bi-cloud-upload" style="font-size:28px;margin-bottom:8px;"></i>
                            <span>Click to upload image</span>
                            <span style="font-size:11px;margin-top:3px;color:#ccc;">JPG, PNG, WEBP</span>
                        </div>
                    <?php endif; ?>

                    <input type="file" name="featured_image_file" id="featuredImageFile"
                        accept="image/*" class="d-none">

                    <?php if (!empty($page['featured_image'])): ?>
                        <input type="hidden" name="featured_image" value="<?= esc($page['featured_image']) ?>">
                        <div class="d-flex gap-2 mt-2">
                            <button type="button" class="btn btn-sm btn-outline-cms w-100"
                                onclick="document.getElementById('featuredImageFile').click()">
                                <i class="bi bi-arrow-repeat me-1"></i>Replace
                            </button>
                            <button type="button" id="removeImageBtn" class="btn btn-sm w-100"
                                style="background:#fdecea;color:#b71c1c;border-radius:7px;font-size:13px;font-weight:600;">
                                <i class="bi bi-x"></i> Remove
                            </button>
                        </div>
                    <?php else: ?>
                        <button type="button" class="btn btn-sm btn-outline-cms w-100 mt-2"
                            onclick="document.getElementById('featuredImageFile').click()">
                            <i class="bi bi-upload me-1"></i>Select Image
                        </button>
                    <?php endif; ?>
                </div>
            </div>

            <!-- PDF Attachments -->
            <div class="panel-card mb-4">
                <div class="card-header">
                    <i class="bi bi-file-earmark-pdf me-2 text-danger"></i>PDF Attachment
                </div>
                <div class="card-body">

                    <?php if (!empty($page['pdf_file'])): ?>
                        <!-- Existing PDF -->
                        <div class="pdf-existing" id="pdfExistingRow">
                            <i class="bi bi-file-earmark-pdf-fill"></i>
                            <div>
                                <div class="pdf-existing-name"><?= esc(basename($page['pdf_file'])) ?></div>
                                <div class="pdf-existing-meta">Current PDF &bull; <a href="<?= base_url($page['pdf_file']) ?>" target="_blank" style="color:#1b5e20;font-size:11px;">Preview</a></div>
                            </div>
                        </div>
                        <input type="hidden" name="pdf_file" id="pdfFileHidden" value="<?= esc($page['pdf_file']) ?>">
                        <input type="hidden" name="remove_pdf" id="removePdfFlag" value="0">
                        <div class="d-flex gap-2 mb-3">
                            <button type="button" class="btn btn-sm btn-outline-cms w-100"
                                onclick="document.getElementById('pdfFileUpload').click()">
                                <i class="bi bi-arrow-repeat me-1"></i>Replace
                            </button>
                            <button type="button" class="btn btn-sm w-100" id="removePdfBtn"
                                data-page-id="<?= (int)($page['id'] ?? 0) ?>"
                                style="background:#fdecea;color:#b71c1c;border-radius:7px;font-size:13px;font-weight:600;">
                                <i class="bi bi-x"></i> Remove
                            </button>
                        </div>
                    <?php endif; ?>

                    <!-- Drop zone (hidden when PDF already exists, shown after removal or when no PDF) -->
                    <div class="pdf-drop-zone <?= !empty($page['pdf_file']) ? 'd-none' : '' ?>" id="pdfDropZone"
                        onclick="document.getElementById('pdfFileUpload').click()">
                        <i class="bi bi-filetype-pdf" style="font-size:32px;display:block;margin-bottom:8px;"></i>
                        <span>Click to upload a PDF</span><br>
                        <span style="font-size:11px;color:#ccc;">PDF files only &bull; Max 20 MB</span>
                    </div>

                    <!-- Shared hidden file input -->
                    <input type="file" name="pdf_file_upload" id="pdfFileUpload"
                        accept="application/pdf" class="d-none">

                    <!-- PDF name after new selection -->
                    <div id="pdfNewName" style="display:none;background:#f0f8f1;border:1px solid #c8e6c9;border-radius:9px;padding:9px 12px;font-size:12.5px;font-weight:600;color:#1b5e20;margin-top:8px;word-break:break-all;">
                        <i class="bi bi-file-earmark-pdf-fill text-danger me-1"></i>
                        <span id="pdfNewNameText"></span>
                        <button type="button" onclick="clearNewPdf()" style="float:right;background:none;border:none;color:#c62828;cursor:pointer;font-size:15px;line-height:1;">&times;</button>
                    </div>

                    <!-- Label -->
                    <div class="mt-3">
                        <label class="form-label" style="font-size:12.5px;">Button / Link Label</label>
                        <input type="text" name="pdf_label" class="form-control"
                            value="<?= esc((string)($page['pdf_label'] ?? 'View / Download PDF')) ?>"
                            placeholder="e.g. Download Brochure"
                            style="font-size:13px;border-radius:9px;">
                        <div style="font-size:11px;color:#aaa;margin-top:4px;">Shown as the PDF button text on the front end.</div>
                    </div>

                    <!-- Display Mode -->
                    <div class="mt-3">
                        <label class="form-label" style="font-size:12.5px;">Frontend Display Mode</label>
                        <?php
                        $curPdfDisplay = $page['pdf_display'] ?? 'both';
                        $pdfDisplayOpts = [
                            'inline'   => ['icon' => 'bi-eye', 'label' => 'Inline Viewer'],
                            'download' => ['icon' => 'bi-download', 'label' => 'Download Only'],
                            'both'     => ['icon' => 'bi-layout-text-window', 'label' => 'Viewer + Download'],
                        ];
                        ?>
                        <input type="hidden" name="pdf_display" id="pdfDisplayInput" value="<?= esc($curPdfDisplay) ?>">
                        <div class="pdf-display-opts">
                            <?php foreach ($pdfDisplayOpts as $val => $opt): ?>
                                <div class="pdf-disp-btn <?= $curPdfDisplay === $val ? 'active' : '' ?>"
                                    onclick="setPdfDisplay('<?= $val ?>')" title="<?= $opt['label'] ?>">
                                    <i class="bi <?= $opt['icon'] ?> d-block mb-1" style="font-size:16px;"></i>
                                    <?= $opt['label'] ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div style="font-size:11px;color:#aaa;margin-top:5px;">
                            <i class="bi bi-info-circle me-1"></i>
                            <em>Inline Viewer</em> embeds the PDF; <em>Download Only</em> shows just a button; <em>Viewer + Download</em> does both.
                        </div>
                    </div>

                </div>
            </div>

            <!-- SEO Quick Score -->
            <div class="panel-card">
                <div class="card-header">
                    <i class="bi bi-bar-chart me-2 text-success"></i>SEO Quick Check
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush" id="seoChecklist" style="border-radius:0 0 14px 14px;font-size:13px;">
                        <li class="list-group-item d-flex align-items-center gap-2 py-2 px-3" id="chk-title">
                            <i class="bi bi-circle text-warning"></i> Page Title set
                        </li>
                        <li class="list-group-item d-flex align-items-center gap-2 py-2 px-3" id="chk-slug">
                            <i class="bi bi-circle text-warning"></i> URL Slug set
                        </li>
                        <li class="list-group-item d-flex align-items-center gap-2 py-2 px-3" id="chk-metaTitle">
                            <i class="bi bi-circle text-warning"></i> Meta Title set
                        </li>
                        <li class="list-group-item d-flex align-items-center gap-2 py-2 px-3" id="chk-metaDesc">
                            <i class="bi bi-circle text-warning"></i> Meta Description set
                        </li>
                        <li class="list-group-item d-flex align-items-center gap-2 py-2 px-3" id="chk-keywords">
                            <i class="bi bi-circle text-warning"></i> Meta Keywords set
                        </li>
                        <li class="list-group-item d-flex align-items-center gap-2 py-2 px-3" id="chk-image">
                            <i class="bi bi-circle text-warning"></i> Featured Image set
                        </li>
                        <li class="list-group-item d-flex align-items-center gap-2 py-2 px-3" id="chk-pdf">
                            <i class="bi bi-circle text-muted" style="opacity:.5;"></i> PDF Attachment
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

</form>

<script>
    // ── Tab switching ──
    document.querySelectorAll('.tab-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.tab-pane').forEach(p => p.classList.remove('active'));
            btn.classList.add('active');
            document.getElementById('tab-' + btn.dataset.tab).classList.add('active');
        });
    });

    // ── Layout Picker ──
    var SIDEBAR_LAYOUTS = ['left-sidebar', 'right-sidebar', 'both-sidebars'];

    function selectLayout(val) {
        // update radio
        document.querySelectorAll('input[name="page_layout"]').forEach(function(r) {
            r.checked = (r.value === val);
        });
        // update visual selection
        document.querySelectorAll('.layout-option').forEach(function(el) {
            el.classList.toggle('selected', el.querySelector('input').value === val);
        });
        // show/hide sidebar panels
        var showLeft = (val === 'left-sidebar' || val === 'both-sidebars');
        var showRight = (val === 'right-sidebar' || val === 'both-sidebars');
        document.getElementById('leftSidebarPanel').style.display = showLeft ? '' : 'none';
        document.getElementById('rightSidebarPanel').style.display = showRight ? '' : 'none';
    }

    // init on load
    (function initLayout() {
        var checked = document.querySelector('input[name="page_layout"]:checked');
        if (checked) selectLayout(checked.value);
    })();

    // ── Sidebar Source Toggle ──
    function setSidebarSource(side, source) {
        document.getElementById('sidebar' + capitalize(side) + 'Source').value = source;

        var btns = document.querySelectorAll('#' + side + 'SidebarPanel .src-btn');
        btns.forEach(function(btn) {
            btn.classList.toggle('active', btn.textContent.trim().toLowerCase().indexOf(source === 'default' ? 'settings' : 'custom') !== -1);
        });

        var customArea = document.getElementById(side + 'SidebarCustomArea');
        var defaultNote = document.getElementById(side + 'SidebarDefaultNote');
        if (source === 'custom') {
            customArea.classList.add('visible');
            defaultNote.classList.remove('visible');
        } else {
            customArea.classList.remove('visible');
            defaultNote.classList.add('visible');
        }
    }

    function capitalize(str) {
        return str.charAt(0).toUpperCase() + str.slice(1);
    }

    // ── PDF Panel ──
    function setPdfDisplay(val) {
        document.getElementById('pdfDisplayInput').value = val;
        document.querySelectorAll('.pdf-disp-btn').forEach(function(btn) {
            btn.classList.toggle('active', btn.getAttribute('onclick').indexOf("'" + val + "'") !== -1);
        });
    }

    var pdfFileUpload = document.getElementById('pdfFileUpload');
    var pdfNewName = document.getElementById('pdfNewName');
    var pdfNewNameText = document.getElementById('pdfNewNameText');
    var pdfDropZone = document.getElementById('pdfDropZone');

    pdfFileUpload.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            var name = this.files[0].name;
            if (pdfNewName) {
                pdfNewNameText.textContent = name;
                pdfNewName.style.display = 'block';
            }
            if (pdfDropZone) pdfDropZone.style.display = 'none';
            // reset remove flag
            document.getElementById('removePdfFlag').value = '0';
            updateSeoChecklist();
        }
    });

    function clearNewPdf() {
        pdfFileUpload.value = '';
        if (pdfNewName) pdfNewName.style.display = 'none';
        if (pdfDropZone) pdfDropZone.style.display = '';
        updateSeoChecklist();
    }

    var removePdfBtn = document.getElementById('removePdfBtn');
    if (removePdfBtn) {
        removePdfBtn.addEventListener('click', function() {
            if (!confirm('Remove this PDF? The file will be permanently deleted.')) return;

            var btn = this;
            var pageId = btn.dataset.pageId;
            btn.disabled = true;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Removing…';

            fetch('<?= site_url('admin/pages/pdf-delete') ?>/' + pageId, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(function(r) {
                    return r.json();
                })
                .then(function(data) {
                    if (data.ok) {
                        // Remove existing-PDF UI elements
                        var row = document.getElementById('pdfExistingRow');
                        if (row) row.remove();
                        var btnRow = btn.closest('.d-flex');
                        if (btnRow) btnRow.remove();
                        var flagInput = document.getElementById('removePdfFlag');
                        if (flagInput) flagInput.remove();
                        var hiddenPdf = document.getElementById('pdfFileHidden');
                        if (hiddenPdf) hiddenPdf.remove();
                        // Show drop-zone so a new PDF can be uploaded
                        var dz = document.getElementById('pdfDropZone');
                        if (dz) dz.classList.remove('d-none');
                        updateSeoChecklist();
                    } else {
                        btn.disabled = false;
                        btn.innerHTML = '<i class="bi bi-x"></i> Remove';
                        alert('Error: ' + (data.error || 'Could not remove PDF.'));
                    }
                })
                .catch(function() {
                    btn.disabled = false;
                    btn.innerHTML = '<i class="bi bi-x"></i> Remove';
                    alert('Network error. Please try again.');
                });
        });
    }

    // ── CKEditor ──
    ClassicEditor.create(document.querySelector('#pageContent'), {
        toolbar: ['heading', '|', 'bold', 'italic', 'underline', 'strikethrough', '|',
            'link', 'bulletedList', 'numberedList', '|',
            'blockQuote', 'insertTable', '|', 'undo', 'redo'
        ],
    }).catch(function(err) {
        console.error(err);
    });

    // ── Slug generator ──
    function slugify(str) {
        return str.toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '')
            .trim()
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');
    }

    var titleInput = document.getElementById('pageTitle');
    var slugInput = document.getElementById('pageSlug');
    var slugManual = <?= !empty($page) ? 'true' : 'false' ?>;

    titleInput.addEventListener('input', function() {
        if (!slugManual) {
            slugInput.value = slugify(this.value);
            updateSeoPreview();
        }
        updateSeoChecklist();
    });

    slugInput.addEventListener('input', function() {
        slugManual = true;
        this.value = slugify(this.value);
        updateSeoPreview();
        updateSeoChecklist();
    });

    // ── SEO Preview ──
    var metaTitleInput = document.getElementById('metaTitle');
    var metaDescInput = document.getElementById('metaDesc');
    var metaKwInput = document.getElementById('metaKeywords');

    function updateSeoPreview() {
        var title = metaTitleInput.value || titleInput.value || 'Page Title';
        var slug = slugInput.value || 'page-slug';
        var desc = metaDescInput.value || 'Your meta description will appear here.';

        document.getElementById('seoPreviewTitle').textContent = title;
        document.getElementById('seoPreviewSlugText').textContent = slug;
        document.getElementById('seoPreviewDesc').textContent = desc.substring(0, 160);
    }

    // ── Character counters ──
    function updateCounter(inputEl, countEl, barEl, ideal) {
        var len = inputEl.value.length;
        countEl.textContent = len + ' / ' + ideal;
        countEl.className = 'char-counter' + (len > ideal ? ' over' : (len > ideal * 0.85 ? ' warn' : ''));
        barEl.style.width = Math.min(100, (len / ideal) * 100) + '%';
        barEl.style.background = len > ideal ? '#c62828' : (len > ideal * 0.7 ? '#43a047' : '#ff9800');
    }

    metaTitleInput.addEventListener('input', function() {
        updateSeoPreview();
        updateCounter(this, document.getElementById('metaTitleCount'), document.getElementById('metaTitleBar'), 60);
        updateSeoChecklist();
    });

    metaDescInput.addEventListener('input', function() {
        updateSeoPreview();
        updateCounter(this, document.getElementById('metaDescCount'), document.getElementById('metaDescBar'), 160);
        updateSeoChecklist();
    });

    metaKwInput.addEventListener('input', updateSeoChecklist);

    // ── Featured image preview ──
    var featPreview = document.getElementById('featuredPreview');
    document.getElementById('featuredImageFile').addEventListener('change', function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                featPreview.src = e.target.result;
                featPreview.style.display = 'block';
                featPreview.classList.add('has-img');
            };
            reader.readAsDataURL(this.files[0]);
            updateSeoChecklist();
        }
    });

    var removeBtn = document.getElementById('removeImageBtn');
    if (removeBtn) {
        removeBtn.addEventListener('click', function() {
            featPreview.src = '';
            featPreview.classList.remove('has-img');
            featPreview.style.display = 'none';
            document.getElementById('featuredImageFile').value = '';
            // flag removal
            var inp = document.querySelector('input[name="featured_image"]');
            if (inp) inp.value = '';
            updateSeoChecklist();
        });
    }

    // ── SEO Checklist ──
    function tick(id, ok) {
        var el = document.getElementById(id);
        if (!el) return;
        var icon = el.querySelector('i');
        if (ok) {
            icon.className = 'bi bi-check-circle-fill text-success';
        } else {
            icon.className = 'bi bi-circle text-warning';
        }
    }

    function updateSeoChecklist() {
        tick('chk-title', titleInput.value.trim().length > 2);
        tick('chk-slug', slugInput.value.trim().length > 0);
        tick('chk-metaTitle', metaTitleInput.value.trim().length >= 10);
        tick('chk-metaDesc', metaDescInput.value.trim().length >= 50);
        tick('chk-keywords', metaKwInput.value.trim().length > 0);
        var img = featPreview.src && featPreview.classList.contains('has-img');
        tick('chk-image', img);
        // PDF (optional - green if present, grey if not)
        var hasPdfNew = pdfFileUpload && pdfFileUpload.files && pdfFileUpload.files.length > 0;
        var hasPdfExisting = (document.getElementById('removePdfFlag') &&
                document.getElementById('removePdfFlag').value !== '1' &&
                document.getElementById('pdfFileHidden')) ?
            !!document.getElementById('pdfFileHidden').value : false;
        var pdfEl = document.getElementById('chk-pdf');
        if (pdfEl) {
            var pdfIcon = pdfEl.querySelector('i');
            if (hasPdfNew || hasPdfExisting) {
                pdfIcon.className = 'bi bi-check-circle-fill text-success';
            } else {
                pdfIcon.className = 'bi bi-circle text-muted';
                pdfIcon.style.opacity = '.45';
            }
        }
    }

    // ── Init on load ──
    (function init() {
        updateCounter(metaTitleInput, document.getElementById('metaTitleCount'), document.getElementById('metaTitleBar'), 60);
        updateCounter(metaDescInput, document.getElementById('metaDescCount'), document.getElementById('metaDescBar'), 160);
        updateSeoPreview();
        updateSeoChecklist();
    })();
</script>

<?= view('admin/partials/footer') ?>