<?= view('admin/partials/header') ?>

<div class="page-header">
    <div>
        <h2>Social Media</h2>
        <ol class="breadcrumb" style="font-size:12px;">
            <li class="breadcrumb-item"><a href="<?= site_url('admin') ?>" style="color:#999;">Dashboard</a></li>
            <li class="breadcrumb-item active" style="color:#999;">Settings → Social Media</li>
        </ol>
    </div>
</div>

<?= view('admin/settings/partials/settings_tabs', ['active' => 'social']) ?>

<form method="post" action="<?= site_url('admin/settings/social') ?>">
<div class="row g-4">
    <div class="col-lg-8">

        <!-- Social Platform Handles -->
        <div class="panel-card mb-4">
            <div class="card-header"><i class="bi bi-share me-2 text-success"></i>Social Media Profiles</div>
            <div class="card-body">

                <?php
                $platforms = [
                    ['key' => 'facebook',  'label' => 'Facebook',    'icon' => 'bi-facebook',   'color' => '#1877f2', 'bg' => '#e7f0fd', 'url_ph' => 'https://facebook.com/YourPage', 'handle_ph' => '/YourPage'],
                    ['key' => 'twitter',   'label' => 'Twitter / X', 'icon' => 'bi-twitter-x',  'color' => '#000',    'bg' => '#f0f2f5', 'url_ph' => 'https://twitter.com/handle',   'handle_ph' => '@handle'],
                    ['key' => 'instagram', 'label' => 'Instagram',   'icon' => 'bi-instagram',  'color' => '#e1306c', 'bg' => '#fdecea', 'url_ph' => 'https://instagram.com/handle',  'handle_ph' => '@handle'],
                    ['key' => 'youtube',   'label' => 'YouTube',     'icon' => 'bi-youtube',    'color' => '#ff0000', 'bg' => '#ffeaea', 'url_ph' => 'https://youtube.com/@channel', 'handle_ph' => 'Channel Name'],
                ];
                foreach ($platforms as $p):
                ?>
                <div class="mb-4 pb-4" style="border-bottom:1px solid #f0f2f5;">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <div style="width:34px;height:34px;border-radius:9px;background:<?= $p['bg'] ?>;display:flex;align-items:center;justify-content:center;font-size:17px;color:<?= $p['color'] ?>;">
                            <i class="bi <?= $p['icon'] ?>"></i>
                        </div>
                        <span style="font-weight:600;font-size:14px;"><?= $p['label'] ?></span>
                    </div>
                    <div class="row g-2">
                        <div class="col-md-7">
                            <label class="form-label" style="font-size:12px;">Profile URL</label>
                            <input type="url" name="<?= $p['key'] ?>_url" class="form-control"
                                   placeholder="<?= $p['url_ph'] ?>"
                                   value="<?= esc($s[$p['key'] . '_url'] ?? '') ?>">
                        </div>
                        <div class="col-md-5">
                            <label class="form-label" style="font-size:12px;">Display Handle</label>
                            <input type="text" name="<?= $p['key'] ?>_handle" class="form-control"
                                   placeholder="<?= $p['handle_ph'] ?>"
                                   value="<?= esc($s[$p['key'] . '_handle'] ?? '') ?>">
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

                <div class="mb-0">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <div style="width:34px;height:34px;border-radius:9px;background:#dcf8c6;display:flex;align-items:center;justify-content:center;font-size:17px;color:#1b5e20;">
                            <i class="bi bi-whatsapp"></i>
                        </div>
                        <span style="font-weight:600;font-size:14px;">WhatsApp Group</span>
                    </div>
                    <label class="form-label" style="font-size:12px;">WhatsApp Group Invite URL</label>
                    <input type="url" name="whatsapp_group_url" class="form-control"
                           placeholder="https://chat.whatsapp.com/xxxxx"
                           value="<?= esc($s['whatsapp_group_url'] ?? '') ?>">
                </div>
            </div>
        </div>

        <!-- Social Sharing -->
        <div class="panel-card">
            <div class="card-header"><i class="bi bi-box-arrow-up me-2 text-success"></i>Social Share Buttons</div>
            <div class="card-body">
                <p style="font-size:13px;color:#888;">Enable share buttons on CMS pages and articles:</p>
                <div class="d-flex flex-column gap-3">
                    <div class="form-check d-flex align-items-center gap-3" style="padding-left:0;">
                        <div style="width:34px;height:34px;border-radius:9px;background:#e7f0fd;display:flex;align-items:center;justify-content:center;font-size:17px;color:#1877f2;flex-shrink:0;">
                            <i class="bi bi-facebook"></i>
                        </div>
                        <div style="flex:1;">
                            <div style="font-weight:600;font-size:13.5px;">Share on Facebook</div>
                            <div style="font-size:11.5px;color:#aaa;">Adds Facebook share button to pages</div>
                        </div>
                        <div class="form-check form-switch mb-0">
                            <input class="form-check-input" type="checkbox" name="share_facebook" id="sf_fb" value="1" <?= !empty($s['share_facebook']) ? 'checked' : '' ?> style="width:40px;height:22px;">
                        </div>
                    </div>
                    <div class="form-check d-flex align-items-center gap-3" style="padding-left:0;">
                        <div style="width:34px;height:34px;border-radius:9px;background:#f0f2f5;display:flex;align-items:center;justify-content:center;font-size:17px;color:#000;flex-shrink:0;">
                            <i class="bi bi-twitter-x"></i>
                        </div>
                        <div style="flex:1;">
                            <div style="font-weight:600;font-size:13.5px;">Share on Twitter / X</div>
                            <div style="font-size:11.5px;color:#aaa;">Adds Twitter share button to pages</div>
                        </div>
                        <div class="form-check form-switch mb-0">
                            <input class="form-check-input" type="checkbox" name="share_twitter" id="sf_tw" value="1" <?= !empty($s['share_twitter']) ? 'checked' : '' ?> style="width:40px;height:22px;">
                        </div>
                    </div>
                    <div class="form-check d-flex align-items-center gap-3" style="padding-left:0;">
                        <div style="width:34px;height:34px;border-radius:9px;background:#dcf8c6;display:flex;align-items:center;justify-content:center;font-size:17px;color:#1b5e20;flex-shrink:0;">
                            <i class="bi bi-whatsapp"></i>
                        </div>
                        <div style="flex:1;">
                            <div style="font-weight:600;font-size:13.5px;">Share on WhatsApp</div>
                            <div style="font-size:11.5px;color:#aaa;">Adds WhatsApp share button to pages</div>
                        </div>
                        <div class="form-check form-switch mb-0">
                            <input class="form-check-input" type="checkbox" name="share_whatsapp" id="sf_wa" value="1" <?= !empty($s['share_whatsapp']) ? 'checked' : '' ?> style="width:40px;height:22px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-4">
        <!-- Preview -->
        <div class="panel-card mb-4">
            <div class="card-header"><i class="bi bi-eye me-2 text-success"></i>Social Links Preview</div>
            <div class="card-body">
                <?php
                $prevPlatforms = [
                    ['icon' => 'bi-facebook',  'color' => '#1877f2', 'bg' => '#e7f0fd', 'url_key' => 'facebook_url',  'handle_key' => 'facebook_handle',  'label' => 'Facebook'],
                    ['icon' => 'bi-twitter-x', 'color' => '#000',    'bg' => '#f0f2f5', 'url_key' => 'twitter_url',   'handle_key' => 'twitter_handle',   'label' => 'Twitter / X'],
                    ['icon' => 'bi-instagram', 'color' => '#e1306c', 'bg' => '#fdecea', 'url_key' => 'instagram_url', 'handle_key' => 'instagram_handle',  'label' => 'Instagram'],
                    ['icon' => 'bi-youtube',   'color' => '#ff0000', 'bg' => '#ffeaea', 'url_key' => 'youtube_url',   'handle_key' => 'youtube_handle',    'label' => 'YouTube'],
                    ['icon' => 'bi-whatsapp',  'color' => '#1b5e20', 'bg' => '#dcf8c6', 'url_key' => 'whatsapp_group_url', 'handle_key' => null, 'label' => 'WhatsApp Group'],
                ];
                foreach ($prevPlatforms as $p):
                    $handle = $p['handle_key'] ? ($s[$p['handle_key']] ?? '') : ($s['whatsapp_group_url'] ?? '');
                    $url    = $s[$p['url_key']] ?? '#';
                ?>
                <a href="<?= esc($url) ?>" target="_blank" class="d-flex align-items-center gap-2 p-2 rounded mb-2 text-decoration-none"
                   style="background:<?= $p['bg'] ?>;border-radius:8px !important;">
                    <i class="bi <?= $p['icon'] ?>" style="color:<?= $p['color'] ?>;font-size:18px;"></i>
                    <div>
                        <div style="font-size:13px;font-weight:600;color:#333;"><?= $p['label'] ?></div>
                        <div style="font-size:11px;color:#888;"><?= esc($handle ?: 'Not set') ?></div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="panel-card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary-cms w-100">
                    <i class="bi bi-check-lg me-2"></i>Save Social Settings
                </button>
            </div>
        </div>
    </div>

</div>
</form>

<?= view('admin/partials/footer') ?>
