<?= view('admin/partials/header') ?>

<div class="page-header">
    <div>
        <h2>Global Settings</h2>
        <ol class="breadcrumb" style="font-size:12px;">
            <li class="breadcrumb-item"><a href="<?= site_url('admin') ?>" style="color:#999;">Dashboard</a></li>
            <li class="breadcrumb-item active" style="color:#999;">Settings → Global</li>
        </ol>
    </div>
</div>

<?= view('admin/settings/partials/settings_tabs', ['active' => 'global']) ?>

<form method="post" action="<?= site_url('admin/settings/global') ?>">
<div class="row g-4">

    <!-- Site Identity -->
    <div class="col-lg-8">
        <div class="panel-card mb-4">
            <div class="card-header"><i class="bi bi-globe2 me-2 text-success"></i>Site Identity</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Site Name</label>
                    <input type="text" name="site_name" class="form-control" value="<?= esc($s['site_name'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tagline / Slogan</label>
                    <input type="text" name="site_tagline" class="form-control" value="<?= esc($s['site_tagline'] ?? '') ?>">
                </div>
                <div class="mb-0">
                    <label class="form-label">Default Meta Description</label>
                    <textarea name="site_meta_desc" class="form-control" rows="3"><?= esc($s['site_meta_desc'] ?? '') ?></textarea>
                </div>
            </div>
        </div>

        <div class="panel-card mb-4">
            <div class="card-header"><i class="bi bi-megaphone me-2 text-success"></i>Ticker / Breaking News Bar</div>
            <div class="card-body">
                <label class="form-label">Ticker Text <span style="color:#aaa;font-weight:400;">(use • to separate items)</span></label>
                <textarea name="ticker_text" class="form-control" rows="3"><?= esc($s['ticker_text'] ?? '') ?></textarea>
                <div style="font-size:11.5px;color:#aaa;margin-top:5px;"><i class="bi bi-info-circle me-1"></i>Leave empty to hide the ticker bar.</div>
            </div>
        </div>

        <div class="panel-card mb-4">
            <div class="card-header"><i class="bi bi-layout-sidebar me-2 text-success"></i>Left Sidebar</div>
            <div class="card-body">
                <label class="form-label">Left Sidebar HTML Content</label>
                <textarea name="left_sidebar_html" class="form-control" rows="10" style="font-family:monospace;font-size:13px;"><?= esc($s['left_sidebar_html'] ?? '') ?></textarea>
                <div style="font-size:11.5px;color:#aaa;margin-top:5px;"><i class="bi bi-info-circle me-1"></i>Raw HTML block rendered in left sidebar on inner pages. Leave empty to hide.</div>
            </div>
        </div>

        <div class="panel-card">
            <div class="card-header"><i class="bi bi-layout-sidebar-reverse me-2 text-success"></i>Right Sidebar</div>
            <div class="card-body">
                <label class="form-label">Right Sidebar HTML Content</label>
                <textarea name="right_sidebar_html" class="form-control" rows="10" style="font-family:monospace;font-size:13px;"><?= esc($s['right_sidebar_html'] ?? '') ?></textarea>
                <div style="font-size:11.5px;color:#aaa;margin-top:5px;"><i class="bi bi-info-circle me-1"></i>Raw HTML block rendered in right sidebar on inner pages. Leave empty to hide.</div>
            </div>
        </div>
    </div>

    <!-- Right panel -->
    <div class="col-lg-4">
        <div class="panel-card mb-4">
            <div class="card-header"><i class="bi bi-eye me-2 text-success"></i>Sidebar Preview</div>
            <div class="card-body">
                <div style="font-size:12px;color:#aaa;margin-bottom:12px;">Sidebars appear on inner pages (Contact, CMS Pages) if content is entered above.</div>
                <div style="background:#f8f9fa;border-radius:10px;padding:14px;font-size:12px;color:#666;">
                    <div style="display:flex;gap:8px;align-items:stretch;min-height:80px;">
                        <div style="flex:0 0 70px;background:#e8f5e9;border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:10px;color:#1b5e20;font-weight:600;text-align:center;">LEFT<br>SIDEBAR</div>
                        <div style="flex:1;background:#f0f2f5;border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:10px;color:#999;">MAIN CONTENT</div>
                        <div style="flex:0 0 70px;background:#e3f2fd;border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:10px;color:#1565c0;font-weight:600;text-align:center;">RIGHT<br>SIDEBAR</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel-card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary-cms w-100">
                    <i class="bi bi-check-lg me-2"></i>Save Global Settings
                </button>
            </div>
        </div>
    </div>

</div>
</form>

<?= view('admin/partials/footer') ?>
