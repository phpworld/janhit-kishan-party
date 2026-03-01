<?= view('admin/partials/header') ?>

<!-- CKEditor 5 -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<style>
    .ck-editor__editable_inline { min-height: 340px; border-radius: 0 0 8px 8px !important; }
    .ck.ck-toolbar { border-radius: 8px 8px 0 0 !important; }
    .seo-score-bar { height: 6px; border-radius: 3px; background:#e9ecef; overflow:hidden; margin-top:6px; }
    .seo-score-fill { height:100%; border-radius:3px; background:#43a047; transition:width .3s; }
    .char-counter { font-size:11px; color:#999; text-align:right; margin-top:3px; }
    .char-counter.warn  { color:#f57c00; }
    .char-counter.over  { color:#c62828; }
    .featured-img-preview {
        width:100%; height:160px; border-radius:10px;
        object-fit:cover; border:2px dashed #e2e6ea;
        display:none; margin-bottom:10px;
    }
    .featured-img-preview.has-img { display:block; border-style:solid; }
    .featured-placeholder {
        width:100%; height:120px; border:2px dashed #e2e6ea; border-radius:10px;
        display:flex; align-items:center; justify-content:center;
        flex-direction:column; color:#bbb; font-size:13px; cursor:pointer;
        transition:border-color .2s;
    }
    .featured-placeholder:hover { border-color:#43a047; color:#43a047; }
    .tab-nav { display:flex; gap:4px; margin-bottom:20px; border-bottom:none; }
    .tab-btn {
        padding:8px 18px; border-radius:8px; font-size:13px; font-weight:600;
        border:none; background:#f0f2f5; color:#666; cursor:pointer; transition:all .18s;
    }
    .tab-btn.active { background:#1b5e20; color:#fff; }
    .tab-pane { display:none; }
    .tab-pane.active { display:block; }
</style>

<div class="page-header">
    <div>
        <h2><?= $page ? 'Edit Page' : 'Create New Page' ?></h2>
        <ol class="breadcrumb" style="font-size:12px;">
            <li class="breadcrumb-item"><a href="<?= site_url('admin') ?>" style="color:#999;">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= site_url('admin/pages') ?>" style="color:#999;">Pages</a></li>
            <li class="breadcrumb-item active" style="color:#999;"><?= $page ? esc($page['title']) : 'New Page' ?></li>
        </ol>
    </div>
    <a href="<?= site_url('admin/pages') ?>" class="btn btn-outline-cms">
        <i class="bi bi-arrow-left me-2"></i>Back to Pages
    </a>
</div>

<form method="post" action="<?= $page ? site_url('admin/pages/save/' . $page['id']) : site_url('admin/pages/save') ?>"
      enctype="multipart/form-data" id="pageForm">

<div class="row g-4">

    <!-- ── LEFT COLUMN: Title + Content + SEO ── -->
    <div class="col-lg-8">

        <!-- Tab Nav -->
        <div class="tab-nav">
            <button type="button" class="tab-btn active" data-tab="content">
                <i class="bi bi-file-text me-1"></i>Content
            </button>
            <button type="button" class="tab-btn" data-tab="seo">
                <i class="bi bi-search me-1"></i>SEO Options
            </button>
        </div>

        <!-- CONTENT TAB -->
        <div id="tab-content" class="tab-pane active">
            <div class="panel-card mb-4">
                <div class="card-header">
                    <i class="bi bi-type me-2 text-success"></i>Page Title
                </div>
                <div class="card-body">
                    <input type="text" name="title" id="pageTitle" class="form-control"
                           placeholder="Enter page title…"
                           value="<?= esc((string) ($page['title'] ?? '')) ?>"
                           required
                           style="font-size:17px;font-weight:600;border-radius:10px;padding:12px 16px;">
                </div>
            </div>

            <div class="panel-card">
                <div class="card-header">
                    <i class="bi bi-body-text me-2 text-success"></i>Page Content
                </div>
                <div class="card-body">
                    <textarea name="content" id="pageContent"><?= ($page['content'] ?? '') ?></textarea>
                </div>
            </div>
        </div>

        <!-- SEO TAB -->
        <div id="tab-seo" class="tab-pane">
            <!-- Google Preview -->
            <div class="panel-card mb-4">
                <div class="card-header">
                    <i class="bi bi-google me-2 text-success"></i>Search Engine Preview
                </div>
                <div class="card-body">
                    <div style="background:#fff;border:1px solid #e8eaed;border-radius:10px;padding:16px 20px;font-family:Arial,sans-serif;">
                        <div id="seoPreviewTitle" style="color:#1a0dab;font-size:18px;font-weight:400;line-height:1.3;margin-bottom:3px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                            <?= esc((string) ($page['meta_title'] ?? $page['title'] ?? 'Page Title')) ?>
                        </div>
                        <div id="seoPreviewSlug" style="color:#006621;font-size:13px;margin-bottom:5px;">
                            <?= rtrim(base_url(), '/') ?>/<span id="seoPreviewSlugText"><?= esc((string) ($page['slug'] ?? 'page-slug')) ?></span>
                        </div>
                        <div id="seoPreviewDesc" style="color:#545454;font-size:13px;line-height:1.5;">
                            <?= esc(mb_substr((string) ($page['meta_description'] ?? 'Your meta description will appear here. Write a compelling summary to improve click-through rates.'), 0, 160)) ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-card">
                <div class="card-header">
                    <i class="bi bi-tags me-2 text-success"></i>SEO Fields
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <label class="form-label">Meta Title <span style="color:#999;font-weight:400;">(Recommended: 50–60 chars)</span></label>
                        <input type="text" name="meta_title" id="metaTitle" class="form-control"
                               maxlength="100"
                               placeholder="Leave blank to use page title"
                               value="<?= esc((string) ($page['meta_title'] ?? '')) ?>">
                        <div id="metaTitleCount" class="char-counter">0 / 60</div>
                        <div class="seo-score-bar"><div id="metaTitleBar" class="seo-score-fill" style="width:0%"></div></div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Meta Keywords <span style="color:#999;font-weight:400;">(comma separated)</span></label>
                        <input type="text" name="meta_keywords" id="metaKeywords" class="form-control"
                               placeholder="e.g. kisan, party, india, jkp"
                               value="<?= esc((string) ($page['meta_keywords'] ?? '')) ?>">
                        <div style="font-size:11.5px;color:#aaa;margin-top:4px;">
                            <i class="bi bi-info-circle me-1"></i>Keywords have minimal SEO impact but help with content organization.
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Meta Description <span style="color:#999;font-weight:400;">(Recommended: 150–160 chars)</span></label>
                        <textarea name="meta_description" id="metaDesc" class="form-control" rows="3"
                                  maxlength="320"
                                  placeholder="Write a brief description of this page for search engines…"><?= esc((string) ($page['meta_description'] ?? '')) ?></textarea>
                        <div id="metaDescCount" class="char-counter">0 / 160</div>
                        <div class="seo-score-bar"><div id="metaDescBar" class="seo-score-fill" style="width:0%"></div></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- ── RIGHT COLUMN: Sidebar panels ── -->
    <div class="col-lg-4">

        <!-- Publish -->
        <div class="panel-card mb-4">
            <div class="card-header">
                <i class="bi bi-send me-2 text-success"></i>Publish
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="draft"     <?= (($page['status'] ?? 'draft') === 'draft')     ? 'selected' : '' ?>>
                            Draft
                        </option>
                        <option value="published" <?= (($page['status'] ?? '') === 'published') ? 'selected' : '' ?>>
                            Published
                        </option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">URL Slug</label>
                    <div class="input-group">
                        <span class="input-group-text" style="background:#f0f2f5;border-color:#e2e6ea;font-size:12px;color:#999;">/</span>
                        <input type="text" name="slug" id="pageSlug" class="form-control"
                               placeholder="page-url-slug"
                               value="<?= esc((string) ($page['slug'] ?? '')) ?>" required>
                    </div>
                    <div style="font-size:11px;color:#aaa;margin-top:4px;">
                        <i class="bi bi-magic me-1"></i>Auto-generated from title. Customise if needed.
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary-cms">
                        <i class="bi bi-check-lg me-2"></i><?= $page ? 'Update Page' : 'Publish Page' ?>
                    </button>
                    <?php if ($page && $page['status'] === 'published'): ?>
                    <a href="<?= site_url('page/' . $page['slug']) ?>" target="_blank"
                       class="btn btn-outline-cms">
                        <i class="bi bi-eye me-2"></i>View Page
                    </a>
                    <?php endif; ?>
                    <?php if ($page): ?>
                    <a href="<?= site_url('admin/pages/delete/' . $page['id']) ?>"
                       onclick="return confirm('Delete this page permanently?')"
                       class="btn btn-sm" style="color:#c62828;font-size:13px;text-align:center;padding:8px;">
                        <i class="bi bi-trash me-1"></i>Delete Page
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Featured Image -->
        <div class="panel-card mb-4">
            <div class="card-header">
                <i class="bi bi-image me-2 text-success"></i>Featured Image
            </div>
            <div class="card-body">
                <img id="featuredPreview"
                     src="<?= !empty($page['featured_image']) ? base_url($page['featured_image']) : '' ?>"
                     alt="Featured Image" class="featured-img-preview <?= !empty($page['featured_image']) ? 'has-img' : '' ?>">

                <?php if (empty($page['featured_image'])): ?>
                <div class="featured-placeholder" onclick="document.getElementById('featuredImageFile').click()">
                    <i class="bi bi-cloud-upload" style="font-size:28px;margin-bottom:8px;"></i>
                    <span>Click to upload image</span>
                    <span style="font-size:11px;margin-top:3px;color:#ccc;">JPG, PNG, WEBP</span>
                </div>
                <?php endif; ?>

                <input type="file" name="featured_image_file" id="featuredImageFile"
                       accept="image/*" class="d-none">

                <?php if (!empty($page['featured_image'])): ?>
                    <input type="hidden" name="featured_image" value="<?= esc($page['featured_image']) ?>">
                    <div class="d-flex gap-2 mt-2">
                        <button type="button" class="btn btn-sm btn-outline-cms w-100"
                                onclick="document.getElementById('featuredImageFile').click()">
                            <i class="bi bi-arrow-repeat me-1"></i>Replace
                        </button>
                        <button type="button" id="removeImageBtn" class="btn btn-sm w-100"
                                style="background:#fdecea;color:#b71c1c;border-radius:7px;font-size:13px;font-weight:600;">
                            <i class="bi bi-x"></i> Remove
                        </button>
                    </div>
                <?php else: ?>
                    <button type="button" class="btn btn-sm btn-outline-cms w-100 mt-2"
                            onclick="document.getElementById('featuredImageFile').click()">
                        <i class="bi bi-upload me-1"></i>Select Image
                    </button>
                <?php endif; ?>
            </div>
        </div>

        <!-- SEO Quick Score -->
        <div class="panel-card">
            <div class="card-header">
                <i class="bi bi-bar-chart me-2 text-success"></i>SEO Quick Check
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush" id="seoChecklist" style="border-radius:0 0 14px 14px;font-size:13px;">
                    <li class="list-group-item d-flex align-items-center gap-2 py-2 px-3" id="chk-title">
                        <i class="bi bi-circle text-warning"></i> Page Title set
                    </li>
                    <li class="list-group-item d-flex align-items-center gap-2 py-2 px-3" id="chk-slug">
                        <i class="bi bi-circle text-warning"></i> URL Slug set
                    </li>
                    <li class="list-group-item d-flex align-items-center gap-2 py-2 px-3" id="chk-metaTitle">
                        <i class="bi bi-circle text-warning"></i> Meta Title set
                    </li>
                    <li class="list-group-item d-flex align-items-center gap-2 py-2 px-3" id="chk-metaDesc">
                        <i class="bi bi-circle text-warning"></i> Meta Description set
                    </li>
                    <li class="list-group-item d-flex align-items-center gap-2 py-2 px-3" id="chk-keywords">
                        <i class="bi bi-circle text-warning"></i> Meta Keywords set
                    </li>
                    <li class="list-group-item d-flex align-items-center gap-2 py-2 px-3" id="chk-image">
                        <i class="bi bi-circle text-warning"></i> Featured Image set
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>

</form>

<script>
// ── Tab switching ──
document.querySelectorAll('.tab-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
        document.querySelectorAll('.tab-pane').forEach(p => p.classList.remove('active'));
        btn.classList.add('active');
        document.getElementById('tab-' + btn.dataset.tab).classList.add('active');
    });
});

// ── CKEditor ──
ClassicEditor.create(document.querySelector('#pageContent'), {
    toolbar: ['heading','|','bold','italic','underline','strikethrough','|',
              'link','bulletedList','numberedList','|',
              'blockQuote','insertTable','|','undo','redo'],
}).catch(function(err) { console.error(err); });

// ── Slug generator ──
function slugify(str) {
    return str.toLowerCase()
        .replace(/[^a-z0-9\s-]/g, '')
        .trim()
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-');
}

var titleInput = document.getElementById('pageTitle');
var slugInput  = document.getElementById('pageSlug');
var slugManual = <?= !empty($page) ? 'true' : 'false' ?>;

titleInput.addEventListener('input', function() {
    if (!slugManual) {
        slugInput.value = slugify(this.value);
        updateSeoPreview();
    }
    updateSeoChecklist();
});

slugInput.addEventListener('input', function() {
    slugManual = true;
    this.value = slugify(this.value);
    updateSeoPreview();
    updateSeoChecklist();
});

// ── SEO Preview ──
var metaTitleInput = document.getElementById('metaTitle');
var metaDescInput  = document.getElementById('metaDesc');
var metaKwInput    = document.getElementById('metaKeywords');

function updateSeoPreview() {
    var title = metaTitleInput.value || titleInput.value || 'Page Title';
    var slug  = slugInput.value || 'page-slug';
    var desc  = metaDescInput.value || 'Your meta description will appear here.';

    document.getElementById('seoPreviewTitle').textContent = title;
    document.getElementById('seoPreviewSlugText').textContent = slug;
    document.getElementById('seoPreviewDesc').textContent = desc.substring(0, 160);
}

// ── Character counters ──
function updateCounter(inputEl, countEl, barEl, ideal) {
    var len = inputEl.value.length;
    countEl.textContent = len + ' / ' + ideal;
    countEl.className = 'char-counter' + (len > ideal ? ' over' : (len > ideal * 0.85 ? ' warn' : ''));
    barEl.style.width = Math.min(100, (len / ideal) * 100) + '%';
    barEl.style.background = len > ideal ? '#c62828' : (len > ideal * 0.7 ? '#43a047' : '#ff9800');
}

metaTitleInput.addEventListener('input', function() {
    updateSeoPreview();
    updateCounter(this, document.getElementById('metaTitleCount'), document.getElementById('metaTitleBar'), 60);
    updateSeoChecklist();
});

metaDescInput.addEventListener('input', function() {
    updateSeoPreview();
    updateCounter(this, document.getElementById('metaDescCount'), document.getElementById('metaDescBar'), 160);
    updateSeoChecklist();
});

metaKwInput.addEventListener('input', updateSeoChecklist);

// ── Featured image preview ──
var featPreview = document.getElementById('featuredPreview');
document.getElementById('featuredImageFile').addEventListener('change', function() {
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            featPreview.src = e.target.result;
            featPreview.style.display = 'block';
            featPreview.classList.add('has-img');
        };
        reader.readAsDataURL(this.files[0]);
        updateSeoChecklist();
    }
});

var removeBtn = document.getElementById('removeImageBtn');
if (removeBtn) {
    removeBtn.addEventListener('click', function() {
        featPreview.src = '';
        featPreview.classList.remove('has-img');
        featPreview.style.display = 'none';
        document.getElementById('featuredImageFile').value = '';
        // flag removal
        var inp = document.querySelector('input[name="featured_image"]');
        if (inp) inp.value = '';
        updateSeoChecklist();
    });
}

// ── SEO Checklist ──
function tick(id, ok) {
    var el = document.getElementById(id);
    if (!el) return;
    var icon = el.querySelector('i');
    if (ok) {
        icon.className = 'bi bi-check-circle-fill text-success';
    } else {
        icon.className = 'bi bi-circle text-warning';
    }
}

function updateSeoChecklist() {
    tick('chk-title', titleInput.value.trim().length > 2);
    tick('chk-slug',  slugInput.value.trim().length > 0);
    tick('chk-metaTitle', metaTitleInput.value.trim().length >= 10);
    tick('chk-metaDesc', metaDescInput.value.trim().length >= 50);
    tick('chk-keywords', metaKwInput.value.trim().length > 0);
    var img = featPreview.src && featPreview.classList.contains('has-img');
    tick('chk-image', img);
}

// ── Init on load ──
(function init() {
    updateCounter(metaTitleInput, document.getElementById('metaTitleCount'), document.getElementById('metaTitleBar'), 60);
    updateCounter(metaDescInput,  document.getElementById('metaDescCount'),  document.getElementById('metaDescBar'),  160);
    updateSeoPreview();
    updateSeoChecklist();
})();
</script>

<?= view('admin/partials/footer') ?>
