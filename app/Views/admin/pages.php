<?= view('admin/partials/header') ?>

<div class="page-header">
    <div>
        <h2>CMS Pages</h2>
        <ol class="breadcrumb" style="font-size:12px;">
            <li class="breadcrumb-item"><a href="<?= site_url('admin') ?>" style="color:#999;">Dashboard</a></li>
            <li class="breadcrumb-item active" style="color:#999;">Pages</li>
        </ol>
    </div>
    <a href="<?= site_url('admin/pages/create') ?>" class="btn btn-primary-cms">
        <i class="bi bi-plus-lg me-2"></i>New Page
    </a>
</div>

<div class="panel-card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <span><i class="bi bi-file-earmark-text me-2 text-success"></i>All Pages</span>
        <span class="badge bg-success rounded-pill"><?= count($pages) ?></span>
    </div>
    <div class="card-body p-0">
        <?php if (empty($pages)): ?>
            <div class="text-center py-5 text-muted">
                <i class="bi bi-file-earmark-plus" style="font-size:48px;opacity:.3;"></i>
                <p class="mt-3 mb-0">No pages yet. <a href="<?= site_url('admin/pages/create') ?>">Create your first page</a>.</p>
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table admin-table mb-0">
                    <thead>
                        <tr>
                            <th class="ps-3" style="width:40px;">#</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Last Updated</th>
                            <th style="width:145px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pages as $page): ?>
                            <tr>
                                <td class="ps-3 text-muted" style="font-size:12px;">#<?= $page['id'] ?></td>
                                <td>
                                    <div style="font-weight:600;color:#1a1a2e;font-size:13.5px;"><?= esc($page['title']) ?></div>
                                    <?php if ($page['meta_description']): ?>
                                        <div class="text-muted" style="font-size:11.5px;margin-top:2px;">
                                            <?= esc(mb_substr($page['meta_description'], 0, 80)) ?><?= strlen($page['meta_description']) > 80 ? '…' : '' ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($page['pdf_file'])): ?>
                                        <div style="margin-top:4px;">
                                            <a href="<?= base_url($page['pdf_file']) ?>" target="_blank"
                                                style="font-size:11px;font-weight:600;color:#c62828;text-decoration:none;">
                                                <i class="bi bi-file-earmark-pdf-fill me-1"></i>PDF attached
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <code style="font-size:12px;background:#f0f2f5;padding:2px 7px;border-radius:5px;color:#1b5e20;">
                                        /<?= esc($page['slug']) ?>
                                    </code>
                                </td>
                                <td>
                                    <?php if ($page['status'] === 'published'): ?>
                                        <span style="background:#e8f5e9;color:#1b5e20;font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px;">
                                            <i class="bi bi-circle-fill me-1" style="font-size:7px;"></i>Published
                                        </span>
                                    <?php else: ?>
                                        <span style="background:#f0f2f5;color:#888;font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px;">
                                            <i class="bi bi-circle me-1" style="font-size:7px;"></i>Draft
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td style="font-size:12px;color:#999;"><?= $page['updated_at'] ? date('d M Y, h:i A', strtotime($page['updated_at'])) : '—' ?></td>
                                <td>
                                    <?php if ($page['status'] === 'published'): ?>
                                        <a class="btn btn-sm" style="background:#e3f2fd;color:#1565c0;border-radius:7px;font-size:12px;font-weight:600;"
                                            href="<?= site_url('page/' . $page['slug']) ?>" target="_blank" title="View Page">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    <?php endif; ?>
                                    <a class="btn btn-sm <?= $page['status'] === 'published' ? 'ms-1' : '' ?>" style="background:#e8f5e9;color:#1b5e20;border-radius:7px;font-size:12px;font-weight:600;"
                                        href="<?= site_url('admin/pages/edit/' . $page['id']) ?>" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a class="btn btn-sm ms-1" style="background:#fdecea;color:#b71c1c;border-radius:7px;font-size:12px;font-weight:600;"
                                        href="<?= site_url('admin/pages/delete/' . $page['id']) ?>"
                                        onclick="return confirm('Delete page &laquo;<?= esc($page['title']) ?>&raquo;? This cannot be undone.')"
                                        title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= view('admin/partials/footer') ?>