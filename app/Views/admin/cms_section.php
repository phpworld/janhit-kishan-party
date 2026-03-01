<?= view('admin/partials/header') ?>

<div class="page-header">
    <div>
        <h2><?= esc($title) ?></h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= site_url('admin') ?>" style="font-size:12px;color:#999;">Dashboard</a></li>
                <li class="breadcrumb-item active" style="font-size:12px;color:#999;"><?= esc($title) ?></li>
            </ol>
        </nav>
    </div>
    <?php if ($editItem): ?>
        <a href="<?= site_url('admin/cms/' . $sectionKey) ?>" class="btn btn-outline-cms">
            <i class="bi bi-plus-lg me-2"></i>Add New
        </a>
    <?php endif; ?>
</div>

<div class="row g-4">

    <!-- FORM PANEL -->
    <div class="col-lg-4">
        <div class="panel-card">
            <div class="card-header d-flex align-items-center gap-2">
                <i class="bi <?= $editItem ? 'bi-pencil-square' : 'bi-plus-circle' ?> text-success"></i>
                <?= $editItem ? 'Edit Record #' . $editItem['id'] : 'Add New Record' ?>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data"
                    action="<?= $editItem
                                ? site_url('admin/cms/' . $sectionKey . '/save/' . $editItem['id'])
                                : site_url('admin/cms/' . $sectionKey . '/save') ?>">

                    <?php foreach ($fields as $field): ?>
                        <?php if ($field['type'] === 'checkbox'): ?>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" role="switch"
                                    value="1" name="<?= esc($field['name']) ?>"
                                    id="<?= esc($field['name']) ?>"
                                    <?= (!empty($editItem[$field['name']]) || !$editItem) ? 'checked' : '' ?>>
                                <label class="form-check-label fw-semibold" for="<?= esc($field['name']) ?>">
                                    <?= esc($field['label']) ?>
                                </label>
                            </div>
                            <?php continue; ?>
                        <?php endif; ?>

                        <div class="mb-3">
                            <label class="form-label"><?= esc($field['label']) ?></label>
                            <?php if ($field['type'] === 'select'): ?>
                                <select class="form-select" name="<?= esc($field['name']) ?>">
                                    <?php foreach ($field['options'] as $optVal => $optLabel): ?>
                                        <option value="<?= esc($optVal) ?>"
                                            <?= (($editItem[$field['name']] ?? '') === $optVal) ? 'selected' : '' ?>>
                                            <?= esc($optLabel) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            <?php else: ?>
                                <input type="<?= esc($field['type']) ?>"
                                    class="form-control"
                                    name="<?= esc($field['name']) ?>"
                                    value="<?= esc((string) ($editItem[$field['name']] ?? '')) ?>"
                                    <?= !empty($field['required']) ? 'required' : '' ?>>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>

                    <?php if (array_filter($fields, fn($f) => $f['name'] === 'image')): ?>
                        <div class="mb-3">
                            <label class="form-label">Upload Image <span class="text-muted fw-normal">(optional)</span></label>
                            <?php if (!empty($editItem['image'])): ?>
                                <div class="mb-2">
                                    <img src="<?= base_url(esc($editItem['image'])) ?>" alt="Current"
                                        style="max-height:70px;border-radius:8px;border:1px solid #e2e6ea;">
                                </div>
                            <?php endif; ?>
                            <input type="file" class="form-control" name="image_file" accept="image/*">
                            <small class="text-muted">Overrides path field if selected.</small>
                        </div>
                    <?php endif; ?>

                    <div class="d-flex gap-2 mt-4">
                        <button class="btn btn-primary-cms" type="submit">
                            <i class="bi bi-check-lg me-2"></i><?= $editItem ? 'Update' : 'Save' ?>
                        </button>
                        <?php if ($editItem): ?>
                            <a class="btn btn-outline-cms" href="<?= site_url('admin/cms/' . $sectionKey) ?>">Cancel</a>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- TABLE PANEL -->
    <div class="col-lg-8">
        <div class="panel-card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <span><i class="bi bi-table me-2 text-success"></i>All Records</span>
                <span class="badge bg-success rounded-pill"><?= count($items) ?></span>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table admin-table mb-0">
                        <thead>
                            <tr>
                                <th class="ps-4">#</th>
                                <?php foreach ($fields as $field): ?>
                                    <th><?= esc($field['label']) ?></th>
                                <?php endforeach; ?>
                                <th class="text-end pe-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($items)): ?>
                                <tr>
                                    <td colspan="<?= count($fields) + 2 ?>" class="text-center py-4 text-muted">
                                        <i class="bi bi-inbox fs-4 d-block mb-2"></i>No records yet.
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($items as $item): ?>
                                    <tr>
                                        <td class="ps-4 text-muted" style="font-size:12px;">#<?= esc((string) $item['id']) ?></td>
                                        <?php foreach ($fields as $field): ?>
                                            <td style="max-width:160px;word-break:break-word;">
                                                <?php if ($field['name'] === 'image' && !empty($item[$field['name']])): ?>
                                                    <img src="<?= base_url(esc($item[$field['name']])) ?>"
                                                        style="height:36px;width:36px;object-fit:cover;border-radius:6px;border:1px solid #e2e6ea;">
                                                <?php elseif ($field['name'] === 'is_active'): ?>
                                                    <?php if ($item[$field['name']]): ?>
                                                        <span class="badge" style="background:#e8f5e9;color:#1b5e20;font-size:11px;">Active</span>
                                                    <?php else: ?>
                                                        <span class="badge" style="background:#f5f5f5;color:#999;font-size:11px;">Inactive</span>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <span title="<?= esc((string) ($item[$field['name']] ?? '')) ?>">
                                                        <?= esc(mb_strimwidth((string) ($item[$field['name']] ?? ''), 0, 40, '…')) ?>
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                        <?php endforeach; ?>
                                        <td class="text-end pe-4">
                                            <a class="btn btn-sm" style="background:#e8f5e9;color:#1b5e20;border-radius:7px;font-size:12px;font-weight:600;"
                                                href="<?= site_url('admin/cms/' . $sectionKey . '?edit=' . $item['id']) ?>">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a class="btn btn-sm ms-1" style="background:#fdecea;color:#b71c1c;border-radius:7px;font-size:12px;font-weight:600;"
                                                onclick="return confirm('Delete this item?')"
                                                href="<?= site_url('admin/cms/' . $sectionKey . '/delete/' . $item['id']) ?>">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<?= view('admin/partials/footer') ?>