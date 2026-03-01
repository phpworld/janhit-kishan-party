<?= view('admin/partials/header') ?>

<div class="page-header">
    <div>
        <h2>Our Footprints Section</h2>
        <ol class="breadcrumb" style="font-size:12px;">
            <li class="breadcrumb-item"><a href="<?= site_url('admin') ?>" style="color:#999;">Dashboard</a></li>
            <li class="breadcrumb-item active" style="color:#999;">Our Footprints</li>
        </ol>
    </div>
</div>

<div class="alert alert-info d-flex align-items-center gap-2" style="border-radius:10px;border:none;background:#e3f2fd;color:#1565c0;font-size:13px;">
    <i class="bi bi-geo-alt-fill fs-5"></i>
    To manage the India Map pin markers, go to
    <a href="<?= site_url('admin/map-markers') ?>" class="fw-bold ms-1">Map Pin Markers &rarr;</a>
</div>

<div class="row g-4">
    <div class="col-lg-6">
        <div class="panel-card">
            <div class="card-header"><i class="bi bi-flag-fill text-success me-2"></i>Footprints Content</div>
            <div class="card-body">
                <form method="post" action="<?= site_url('admin/cms/footprints') ?>">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control"
                            value="<?= esc((string) ($item['title'] ?? 'OUR FOOTPRINTS')) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subtitle</label>
                        <input type="text" name="subtitle" class="form-control"
                            value="<?= esc((string) ($item['subtitle'] ?? '')) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">States Governed</label>
                        <input type="number" name="states_governed" class="form-control"
                            value="<?= esc((string) ($item['states_governed'] ?? 21)) ?>" required>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col">
                            <label class="form-label">Lok Sabha</label>
                            <input type="text" name="lok_sabha" class="form-control"
                                value="<?= esc((string) ($item['lok_sabha'] ?? '240/543')) ?>" required
                                placeholder="e.g. 240/543">
                        </div>
                        <div class="col">
                            <label class="form-label">Rajya Sabha</label>
                            <input type="text" name="rajya_sabha" class="form-control"
                                value="<?= esc((string) ($item['rajya_sabha'] ?? '99/245')) ?>" required
                                placeholder="e.g. 99/245">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary-cms">
                        <i class="bi bi-check-lg me-2"></i>Save Changes
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="panel-card">
            <div class="card-header"><i class="bi bi-bar-chart-fill text-success me-2"></i>Live Preview</div>
            <div class="card-body">
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex align-items-center justify-content-between p-3 rounded-3" style="background:#e8f5e9;">
                        <span style="font-size:13px;font-weight:600;color:#1b5e20;">States Governed</span>
                        <span style="font-size:24px;font-weight:800;color:#1b5e20;"><?= esc((string)($item['states_governed'] ?? 21)) ?></span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between p-3 rounded-3" style="background:#e3f2fd;">
                        <span style="font-size:13px;font-weight:600;color:#1565c0;">Lok Sabha Seats</span>
                        <span style="font-size:20px;font-weight:800;color:#1565c0;"><?= esc((string)($item['lok_sabha'] ?? '0/0')) ?></span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between p-3 rounded-3" style="background:#fff8e1;">
                        <span style="font-size:13px;font-weight:600;color:#f57f17;">Rajya Sabha Seats</span>
                        <span style="font-size:20px;font-weight:800;color:#f57f17;"><?= esc((string)($item['rajya_sabha'] ?? '0/0')) ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('admin/partials/footer') ?>