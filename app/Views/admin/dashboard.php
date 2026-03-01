<?= view('admin/partials/header') ?>

<div class="page-header">
    <div>
        <h2>Dashboard</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" style="font-size:12px;color:#999;">Home &rsaquo; Dashboard</li>
            </ol>
        </nav>
    </div>
    <a href="<?= site_url('/') ?>" target="_blank" class="btn btn-outline-cms">
        <i class="bi bi-globe2 me-2"></i>View Website
    </a>
</div>

<!-- STAT CARDS -->
<div class="row g-3 mb-4">

    <div class="col-sm-6 col-lg-4">
        <a href="<?= site_url('admin/cms/home-sliders') ?>" class="text-decoration-none">
        <div class="panel-card p-4 d-flex align-items-center gap-3">
            <div style="width:52px;height:52px;border-radius:14px;background:#e8f5e9;display:flex;align-items:center;justify-content:center;font-size:24px;color:#1b5e20;flex-shrink:0;">
                <i class="bi bi-play-circle-fill"></i>
            </div>
            <div>
                <div style="font-size:26px;font-weight:700;color:#1a1a2e;line-height:1;"><?= $stats['sliders'] ?></div>
                <div style="font-size:13px;color:#888;margin-top:4px;">Hero Slides</div>
            </div>
        </div></a>
    </div>

    <div class="col-sm-6 col-lg-4">
        <a href="<?= site_url('admin/cms/presidents') ?>" class="text-decoration-none">
        <div class="panel-card p-4 d-flex align-items-center gap-3">
            <div style="width:52px;height:52px;border-radius:14px;background:#e3f2fd;display:flex;align-items:center;justify-content:center;font-size:24px;color:#1565c0;flex-shrink:0;">
                <i class="bi bi-person-badge-fill"></i>
            </div>
            <div>
                <div style="font-size:26px;font-weight:700;color:#1a1a2e;line-height:1;"><?= $stats['presidents'] ?></div>
                <div style="font-size:13px;color:#888;margin-top:4px;">Party Presidents</div>
            </div>
        </div></a>
    </div>

    <div class="col-sm-6 col-lg-4">
        <a href="<?= site_url('admin/cms/inspirations') ?>" class="text-decoration-none">
        <div class="panel-card p-4 d-flex align-items-center gap-3">
            <div style="width:52px;height:52px;border-radius:14px;background:#fff8e1;display:flex;align-items:center;justify-content:center;font-size:24px;color:#f57f17;flex-shrink:0;">
                <i class="bi bi-lightbulb-fill"></i>
            </div>
            <div>
                <div style="font-size:26px;font-weight:700;color:#1a1a2e;line-height:1;"><?= $stats['inspirations'] ?></div>
                <div style="font-size:13px;color:#888;margin-top:4px;">Inspiration Slides</div>
            </div>
        </div></a>
    </div>

    <div class="col-sm-6 col-lg-4">
        <a href="<?= site_url('admin/cms/press-gallery') ?>" class="text-decoration-none">
        <div class="panel-card p-4 d-flex align-items-center gap-3">
            <div style="width:52px;height:52px;border-radius:14px;background:#fce4ec;display:flex;align-items:center;justify-content:center;font-size:24px;color:#880e4f;flex-shrink:0;">
                <i class="bi bi-images"></i>
            </div>
            <div>
                <div style="font-size:26px;font-weight:700;color:#1a1a2e;line-height:1;"><?= $stats['gallery'] ?></div>
                <div style="font-size:13px;color:#888;margin-top:4px;">Gallery Items</div>
            </div>
        </div></a>
    </div>

    <div class="col-sm-6 col-lg-4">
        <a href="<?= site_url('admin/cms/navigation') ?>" class="text-decoration-none">
        <div class="panel-card p-4 d-flex align-items-center gap-3">
            <div style="width:52px;height:52px;border-radius:14px;background:#f3e5f5;display:flex;align-items:center;justify-content:center;font-size:24px;color:#6a1b9a;flex-shrink:0;">
                <i class="bi bi-list-ul"></i>
            </div>
            <div>
                <div style="font-size:26px;font-weight:700;color:#1a1a2e;line-height:1;"><?= $stats['navigation'] ?></div>
                <div style="font-size:13px;color:#888;margin-top:4px;">Nav Menu Links</div>
            </div>
        </div></a>
    </div>

    <div class="col-sm-6 col-lg-4">
        <a href="<?= site_url('admin/map-markers') ?>" class="text-decoration-none">
        <div class="panel-card p-4 d-flex align-items-center gap-3">
            <div style="width:52px;height:52px;border-radius:14px;background:#e0f7fa;display:flex;align-items:center;justify-content:center;font-size:24px;color:#00695c;flex-shrink:0;">
                <i class="bi bi-geo-alt-fill"></i>
            </div>
            <div>
                <div style="font-size:26px;font-weight:700;color:#1a1a2e;line-height:1;"><?= $stats['markers'] ?></div>
                <div style="font-size:13px;color:#888;margin-top:4px;">Map Markers</div>
            </div>
        </div></a>
    </div>

    <div class="col-sm-6 col-lg-4">
        <a href="<?= site_url('admin/pages') ?>" class="text-decoration-none">
        <div class="panel-card p-4 d-flex align-items-center gap-3">
            <div style="width:52px;height:52px;border-radius:14px;background:#e8eaf6;display:flex;align-items:center;justify-content:center;font-size:24px;color:#283593;flex-shrink:0;">
                <i class="bi bi-file-earmark-text-fill"></i>
            </div>
            <div>
                <div style="font-size:26px;font-weight:700;color:#1a1a2e;line-height:1;"><?= $stats['pages'] ?></div>
                <div style="font-size:13px;color:#888;margin-top:4px;">CMS Pages</div>
            </div>
        </div></a>
    </div>

    <div class="col-sm-6 col-lg-4">
        <a href="<?= site_url('admin/settings/submissions') ?>" class="text-decoration-none">
        <div class="panel-card p-4 d-flex align-items-center gap-3">
            <div style="width:52px;height:52px;border-radius:14px;background:#fff8e1;display:flex;align-items:center;justify-content:center;font-size:24px;color:#f57f17;flex-shrink:0;">
                <i class="bi bi-inbox-fill"></i>
            </div>
            <div>
                <div style="font-size:26px;font-weight:700;color:#1a1a2e;line-height:1;">
                    <?= $stats['inbox'] ?>
                    <?php if ($stats['inbox'] > 0): ?>
                    <span style="font-size:13px;font-weight:600;color:#f57f17;margin-left:4px;">new</span>
                    <?php endif; ?>
                </div>
                <div style="font-size:13px;color:#888;margin-top:4px;">Inbox Messages</div>
            </div>
        </div></a>
    </div>

</div>

<!-- QUICK ACTIONS -->
<div class="panel-card mb-4">
    <div class="card-header d-flex align-items-center gap-2">
        <i class="bi bi-lightning-fill text-warning"></i> Quick Actions
    </div>
    <div class="card-body">
        <div class="row g-3">
            <?php
            $sections = [
                ['url' => 'admin/cms/navigation',  'icon' => 'bi-list-ul',         'color' => '#6a1b9a', 'bg' => '#f3e5f5', 'label' => 'Main Navigation'],
                ['url' => 'admin/cms/home-sliders','icon' => 'bi-play-circle',      'color' => '#1b5e20', 'bg' => '#e8f5e9', 'label' => 'Hero Slider'],
                ['url' => 'admin/cms/presidents',  'icon' => 'bi-person-badge',     'color' => '#1565c0', 'bg' => '#e3f2fd', 'label' => 'Party Presidents'],
                ['url' => 'admin/cms/footprints',  'icon' => 'bi-flag',             'color' => '#bf360c', 'bg' => '#fbe9e7', 'label' => 'Our Footprints'],
                ['url' => 'admin/map-markers',     'icon' => 'bi-geo-alt',          'color' => '#00695c', 'bg' => '#e0f7fa', 'label' => 'Map Markers'],
                ['url' => 'admin/cms/inspirations','icon' => 'bi-lightbulb',        'color' => '#f57f17', 'bg' => '#fff8e1', 'label' => 'Inspiration Slider'],
                ['url' => 'admin/cms/press-gallery','icon'=> 'bi-images',           'color' => '#880e4f', 'bg' => '#fce4ec', 'label' => 'Press Gallery'],
                ['url' => 'admin/pages',            'icon'=> 'bi-file-earmark-text','color' => '#283593', 'bg' => '#e8eaf6', 'label' => 'CMS Pages'],
                ['url' => 'contact',                 'icon'=> 'bi-envelope-fill',    'color' => '#bf360c', 'bg' => '#fbe9e7', 'label' => 'Contact Page'],
                ['url' => 'admin/settings/global',   'icon'=> 'bi-globe2',           'color' => '#00695c', 'bg' => '#e0f7fa', 'label' => 'Global Settings'],
                ['url' => 'admin/settings/social',   'icon'=> 'bi-share',            'color' => '#6a1b9a', 'bg' => '#f3e5f5', 'label' => 'Social Media'],
                ['url' => 'admin/settings/submissions','icon'=>'bi-inbox',            'color' => '#f57f17', 'bg' => '#fff8e1', 'label' => 'View Inbox'],
            ];
            foreach ($sections as $s): ?>
            <div class="col-6 col-md-4 col-lg-3">
                <a href="<?= site_url($s['url']) ?>" class="text-decoration-none">
                    <div class="d-flex align-items-center gap-3 p-3 rounded-3"
                         style="border:1.5px solid <?= $s['bg'] ?>;background:<?= $s['bg'] ?>;transition:box-shadow .15s;"
                         onmouseover="this.style.boxShadow='0 4px 16px rgba(0,0,0,.1)'" onmouseout="this.style.boxShadow='none'">
                        <i class="bi <?= $s['icon'] ?>" style="font-size:20px;color:<?= $s['color'] ?>;"></i>
                        <span style="font-size:13px;font-weight:600;color:#333;"><?= $s['label'] ?></span>
                        <i class="bi bi-arrow-right ms-auto" style="font-size:12px;color:#aaa;"></i>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- INFO FOOTER -->
<div class="d-flex align-items-center justify-content-between" style="font-size:12px;color:#aaa;">
    <span><i class="bi bi-info-circle me-1"></i>JKP CMS v1.0 &mdash; CodeIgniter 4</span>
    <span><?= date('l, d F Y') ?></span>
</div>

<?= view('admin/partials/footer') ?>
