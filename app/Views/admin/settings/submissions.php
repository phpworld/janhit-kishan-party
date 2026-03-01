<?= view('admin/partials/header') ?>

<div class="page-header">
    <div>
        <h2>Contact Submissions</h2>
        <ol class="breadcrumb" style="font-size:12px;">
            <li class="breadcrumb-item"><a href="<?= site_url('admin') ?>" style="color:#999;">Dashboard</a></li>
            <li class="breadcrumb-item active" style="color:#999;">Settings → Inbox</li>
        </ol>
    </div>
</div>

<?= view('admin/settings/partials/settings_tabs', ['active' => 'submissions']) ?>

<div class="panel-card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <span><i class="bi bi-inbox me-2 text-success"></i>All Messages</span>
        <span class="badge bg-success rounded-pill"><?= count($items) ?></span>
    </div>
    <div class="card-body p-0">
        <?php if (empty($items)): ?>
            <div class="text-center py-5 text-muted">
                <i class="bi bi-envelope-open" style="font-size:48px;opacity:.3;"></i>
                <p class="mt-3 mb-0">No messages yet.</p>
            </div>
        <?php else: ?>
        <div class="table-responsive">
            <table class="table admin-table mb-0">
                <thead>
                    <tr>
                        <th class="ps-3" style="width:40px;">#</th>
                        <th>From</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th style="width:80px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $item): ?>
                    <tr>
                        <td class="ps-3 text-muted" style="font-size:12px;">#<?= $item['id'] ?></td>
                        <td>
                            <div style="font-weight:600;font-size:13.5px;"><?= esc($item['name']) ?></div>
                            <div style="font-size:11.5px;color:#888;"><i class="bi bi-envelope me-1"></i><?= esc($item['email']) ?></div>
                            <?php if ($item['phone']): ?>
                            <div style="font-size:11.5px;color:#888;"><i class="bi bi-telephone me-1"></i><?= esc($item['phone']) ?></div>
                            <?php endif; ?>
                        </td>
                        <td style="font-size:13px;"><?= esc($item['subject'] ?: '—') ?></td>
                        <td>
                            <div style="font-size:13px;max-width:320px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="<?= esc($item['message']) ?>">
                                <?= esc($item['message']) ?>
                            </div>
                        </td>
                        <td style="font-size:12px;color:#999;white-space:nowrap;">
                            <?= $item['created_at'] ? date('d M Y', strtotime($item['created_at'])) : '—' ?><br>
                            <span style="color:#bbb;"><?= $item['created_at'] ? date('h:i A', strtotime($item['created_at'])) : '' ?></span>
                        </td>
                        <td>
                            <a class="btn btn-sm ms-1" style="background:#fdecea;color:#b71c1c;border-radius:7px;font-size:12px;font-weight:600;"
                               href="<?= site_url('admin/settings/submissions/delete/' . $item['id']) ?>"
                               onclick="return confirm('Delete this message?')">
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
