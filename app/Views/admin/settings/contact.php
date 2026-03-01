<?= view('admin/partials/header') ?>

<div class="page-header">
    <div>
        <h2>Contact Information</h2>
        <ol class="breadcrumb" style="font-size:12px;">
            <li class="breadcrumb-item"><a href="<?= site_url('admin') ?>" style="color:#999;">Dashboard</a></li>
            <li class="breadcrumb-item active" style="color:#999;">Settings → Contact</li>
        </ol>
    </div>
</div>

<?= view('admin/settings/partials/settings_tabs', ['active' => 'contact']) ?>

<form method="post" action="<?= site_url('admin/settings/contact') ?>">
<div class="row g-4">
    <div class="col-lg-8">

        <!-- Address -->
        <div class="panel-card mb-4">
            <div class="card-header"><i class="bi bi-geo-alt me-2 text-success"></i>Office Address</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Address Line 1</label>
                    <input type="text" name="address_line1" class="form-control" value="<?= esc($s['address_line1'] ?? '') ?>">
                </div>
                <div class="mb-0">
                    <label class="form-label">Address Line 2</label>
                    <input type="text" name="address_line2" class="form-control" value="<?= esc($s['address_line2'] ?? '') ?>">
                </div>
            </div>
        </div>

        <!-- Phone & Email -->
        <div class="panel-card mb-4">
            <div class="card-header"><i class="bi bi-telephone me-2 text-success"></i>Phone &amp; Email</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Phone Number 1</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background:#f0f2f5;border-color:#e2e6ea;"><i class="bi bi-telephone-fill text-success"></i></span>
                            <input type="text" name="phone1" class="form-control" value="<?= esc($s['phone1'] ?? '') ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Phone Number 2 <span style="color:#aaa;font-weight:400;">(optional)</span></label>
                        <div class="input-group">
                            <span class="input-group-text" style="background:#f0f2f5;border-color:#e2e6ea;"><i class="bi bi-telephone-fill text-success"></i></span>
                            <input type="text" name="phone2" class="form-control" value="<?= esc($s['phone2'] ?? '') ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email Address 1</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background:#f0f2f5;border-color:#e2e6ea;"><i class="bi bi-envelope-fill text-success"></i></span>
                            <input type="email" name="email1" class="form-control" value="<?= esc($s['email1'] ?? '') ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email Address 2 <span style="color:#aaa;font-weight:400;">(optional)</span></label>
                        <div class="input-group">
                            <span class="input-group-text" style="background:#f0f2f5;border-color:#e2e6ea;"><i class="bi bi-envelope-fill text-success"></i></span>
                            <input type="email" name="email2" class="form-control" value="<?= esc($s['email2'] ?? '') ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- WhatsApp -->
        <div class="panel-card mb-4">
            <div class="card-header"><i class="bi bi-whatsapp me-2 text-success"></i>WhatsApp</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">WhatsApp Number <span style="color:#aaa;font-weight:400;">(with country code)</span></label>
                        <div class="input-group">
                            <span class="input-group-text" style="background:#dcf8c6;border-color:#e2e6ea;color:#1b5e20;"><i class="bi bi-whatsapp"></i></span>
                            <input type="text" name="whatsapp_number" class="form-control" placeholder="+919876543210" value="<?= esc($s['whatsapp_number'] ?? '') ?>">
                        </div>
                        <div style="font-size:11px;color:#aaa;margin-top:4px;">No spaces or dashes. Used for click-to-chat links.</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">WhatsApp Button Label</label>
                        <input type="text" name="whatsapp_label" class="form-control" placeholder="WhatsApp Helpline" value="<?= esc($s['whatsapp_label'] ?? '') ?>">
                    </div>
                </div>
            </div>
        </div>

        <!-- Working Hours & Map -->
        <div class="panel-card">
            <div class="card-header"><i class="bi bi-clock me-2 text-success"></i>Working Hours &amp; Map</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Working Hours</label>
                    <input type="text" name="working_hours" class="form-control" value="<?= esc($s['working_hours'] ?? '') ?>">
                </div>
                <div class="mb-0">
                    <label class="form-label">Google Maps Embed URL</label>
                    <textarea name="map_embed_url" class="form-control" rows="4" style="font-family:monospace;font-size:12px;"><?= esc($s['map_embed_url'] ?? '') ?></textarea>
                    <div style="font-size:11px;color:#aaa;margin-top:4px;"><i class="bi bi-info-circle me-1"></i>From Google Maps → Share → Embed map → copy only the <code>src="..."</code> URL.</div>
                </div>
            </div>
        </div>

    </div>

    <!-- Right Panel -->
    <div class="col-lg-4">
        <!-- Quick Info Preview -->
        <div class="panel-card mb-4">
            <div class="card-header"><i class="bi bi-card-text me-2 text-success"></i>Contact Card Preview</div>
            <div class="card-body" style="font-size:13px;">
                <div class="d-flex align-items-start gap-2 mb-3">
                    <i class="bi bi-geo-alt-fill text-success mt-1"></i>
                    <span id="prev_addr"><?= esc(($s['address_line1'] ?? '') . ' ' . ($s['address_line2'] ?? '')) ?></span>
                </div>
                <div class="d-flex align-items-center gap-2 mb-2">
                    <i class="bi bi-telephone-fill text-success"></i>
                    <span id="prev_phone"><?= esc($s['phone1'] ?? '') ?></span>
                </div>
                <div class="d-flex align-items-center gap-2 mb-2">
                    <i class="bi bi-envelope-fill text-success"></i>
                    <span id="prev_email"><?= esc($s['email1'] ?? '') ?></span>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-whatsapp text-success"></i>
                    <span id="prev_wa"><?= esc($s['whatsapp_number'] ?? '') ?></span>
                </div>
            </div>
        </div>

        <div class="panel-card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary-cms w-100">
                    <i class="bi bi-check-lg me-2"></i>Save Contact Info
                </button>
                <a href="<?= site_url('contact') ?>" target="_blank" class="btn btn-outline-cms w-100 mt-2">
                    <i class="bi bi-eye me-2"></i>View Contact Page
                </a>
            </div>
        </div>
    </div>

</div>
</form>

<?= view('admin/partials/footer') ?>
