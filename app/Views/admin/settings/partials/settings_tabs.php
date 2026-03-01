<?php
// Tab nav shared across all settings pages
$tabs = [
    'global'      => ['icon' => 'bi-globe2',       'label' => 'Global Settings',  'url' => 'admin/settings/global'],
    'contact'     => ['icon' => 'bi-geo-alt',       'label' => 'Contact Info',     'url' => 'admin/settings/contact'],
    'social'      => ['icon' => 'bi-share',         'label' => 'Social Media',     'url' => 'admin/settings/social'],
    'password'    => ['icon' => 'bi-shield-lock',   'label' => 'Change Password',  'url' => 'admin/settings/password'],
    'submissions' => ['icon' => 'bi-inbox',         'label' => 'Inbox',            'url' => 'admin/settings/submissions'],
];
?>
<div style="display:flex;gap:6px;margin-bottom:24px;flex-wrap:wrap;">
    <?php foreach ($tabs as $key => $tab): ?>
    <a href="<?= site_url($tab['url']) ?>"
       style="display:flex;align-items:center;gap:7px;padding:8px 16px;border-radius:9px;font-size:13px;font-weight:600;text-decoration:none;
              <?= ($active === $key)
                  ? 'background:#1b5e20;color:#fff;'
                  : 'background:#f0f2f5;color:#555;' ?>
              transition:all .15s;"
       <?= ($active !== $key) ? 'onmouseover="this.style.background=\'#e8f5e9\';this.style.color=\'#1b5e20\';" onmouseout="this.style.background=\'#f0f2f5\';this.style.color=\'#555\';"' : '' ?>>
        <i class="bi <?= $tab['icon'] ?>"></i>
        <?= $tab['label'] ?>
    </a>
    <?php endforeach; ?>
</div>
