<?= view('admin/partials/header') ?>

<div class="page-header">
    <div>
        <h2>Change Password</h2>
        <ol class="breadcrumb" style="font-size:12px;">
            <li class="breadcrumb-item"><a href="<?= site_url('admin') ?>" style="color:#999;">Dashboard</a></li>
            <li class="breadcrumb-item active" style="color:#999;">Settings → Password</li>
        </ol>
    </div>
</div>

<?= view('admin/settings/partials/settings_tabs', ['active' => 'password']) ?>

<div class="row justify-content-center">
    <div class="col-lg-5">
        <div class="panel-card">
            <div class="card-header"><i class="bi bi-shield-lock me-2 text-success"></i>Update Admin Password</div>
            <div class="card-body">
                <form method="post" action="<?= site_url('admin/settings/password') ?>">
                    <div class="mb-3">
                        <label class="form-label">Current Password</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background:#f0f2f5;border-color:#e2e6ea;"><i class="bi bi-lock-fill text-success"></i></span>
                            <input type="password" name="current_password" class="form-control" placeholder="Enter current password" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">New Password <span style="color:#aaa;font-weight:400;">(min 6 characters)</span></label>
                        <div class="input-group">
                            <span class="input-group-text" style="background:#f0f2f5;border-color:#e2e6ea;"><i class="bi bi-key-fill text-success"></i></span>
                            <input type="password" name="new_password" id="newPwd" class="form-control" placeholder="New password" required minlength="6">
                        </div>
                        <!-- Strength bar -->
                        <div style="height:4px;border-radius:2px;background:#f0f2f5;margin-top:8px;overflow:hidden;">
                            <div id="pwdStrengthBar" style="height:100%;width:0%;border-radius:2px;transition:width .3s,background .3s;"></div>
                        </div>
                        <div id="pwdStrengthLabel" style="font-size:11px;margin-top:3px;color:#aaa;"></div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Confirm New Password</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background:#f0f2f5;border-color:#e2e6ea;"><i class="bi bi-key-fill text-success"></i></span>
                            <input type="password" name="confirm_password" id="confirmPwd" class="form-control" placeholder="Repeat new password" required>
                        </div>
                        <div id="pwdMatchMsg" style="font-size:11.5px;margin-top:4px;"></div>
                    </div>
                    <button type="submit" class="btn btn-primary-cms w-100">
                        <i class="bi bi-shield-check me-2"></i>Update Password
                    </button>
                </form>
            </div>
        </div>

        <!-- Tips -->
        <div class="panel-card mt-4">
            <div class="card-header"><i class="bi bi-lightbulb me-2 text-warning"></i>Password Tips</div>
            <div class="card-body" style="font-size:13px;color:#666;">
                <ul style="margin:0;padding-left:1.4em;line-height:2;">
                    <li>Use at least 8 characters</li>
                    <li>Mix uppercase, lowercase, numbers and symbols</li>
                    <li>Avoid using the same password elsewhere</li>
                    <li>Don't share your admin credentials</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
var newPwd     = document.getElementById('newPwd');
var confirmPwd = document.getElementById('confirmPwd');
var bar        = document.getElementById('pwdStrengthBar');
var label      = document.getElementById('pwdStrengthLabel');
var matchMsg   = document.getElementById('pwdMatchMsg');

newPwd.addEventListener('input', function() {
    var v = this.value;
    var score = 0;
    if (v.length >= 6)  score++;
    if (v.length >= 10) score++;
    if (/[A-Z]/.test(v) && /[a-z]/.test(v)) score++;
    if (/[0-9]/.test(v)) score++;
    if (/[^A-Za-z0-9]/.test(v)) score++;
    var levels = ['', 'Weak', 'Fair', 'Good', 'Strong', 'Very Strong'];
    var colors = ['', '#c62828', '#f57c00', '#f9a825', '#43a047', '#1b5e20'];
    bar.style.width   = (score * 20) + '%';
    bar.style.background = colors[score] || '#e0e0e0';
    label.textContent = levels[score] || '';
    label.style.color = colors[score] || '#aaa';
    checkMatch();
});

confirmPwd.addEventListener('input', checkMatch);

function checkMatch() {
    if (!confirmPwd.value) { matchMsg.textContent = ''; return; }
    if (newPwd.value === confirmPwd.value) {
        matchMsg.textContent = '✓ Passwords match';
        matchMsg.style.color = '#1b5e20';
    } else {
        matchMsg.textContent = '✗ Passwords do not match';
        matchMsg.style.color = '#c62828';
    }
}
</script>

<?= view('admin/partials/footer') ?>
