<?= view('admin/partials/header') ?>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
  #adminPickerMap { height: 340px; border-radius: 8px; border: 1px solid #dee2e6; }
  .pin-badge { display: inline-block; width: 12px; height: 12px; border-radius: 50%; background: #1b5e20; border: 2px solid #fff; box-shadow: 0 0 4px rgba(0,0,0,.4); }
</style>

<div class="page-header">
    <div>
        <h2>Map Pin Markers</h2>
        <ol class="breadcrumb" style="font-size:12px;">
            <li class="breadcrumb-item"><a href="<?= site_url('admin') ?>" style="color:#999;">Dashboard</a></li>
            <li class="breadcrumb-item active" style="color:#999;">Map Markers</li>
        </ol>
    </div>
    <a href="<?= site_url('admin/cms/footprints') ?>" class="btn btn-outline-cms">
        <i class="bi bi-flag me-2"></i>Footprints Settings
    </a>
</div>

<div class="row g-4">

    <!-- FORM -->
    <div class="col-lg-5">
        <div class="panel-card">
            <div class="card-header">
                <i class="bi <?= $editItem ? 'bi-pencil-square' : 'bi-plus-circle' ?> text-success me-2"></i>
                <?= $editItem ? 'Edit Marker #' . $editItem['id'] : 'Add New Marker' ?>
            </div>
            <div class="card-body">
                <p class="text-muted small mb-3">
                    <i class="bi bi-cursor-fill text-success"></i>
                    Click anywhere on the map below to auto-fill Latitude &amp; Longitude.
                </p>

                <form method="post" action="<?= $editItem
                    ? site_url('admin/map-markers/save/' . $editItem['id'])
                    : site_url('admin/map-markers/save') ?>">

                    <div class="mb-3">
                        <label class="form-label">City / Place Name</label>
                        <input type="text" name="name" class="form-control"
                               value="<?= esc((string) ($editItem['name'] ?? '')) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">State</label>
                        <input type="text" name="state" class="form-control"
                               value="<?= esc((string) ($editItem['state'] ?? '')) ?>" required>
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col">
                            <label class="form-label">Latitude</label>
                            <input type="text" name="lat" id="latInput" class="form-control"
                                   value="<?= esc((string) ($editItem['lat'] ?? '')) ?>" required
                                   placeholder="e.g. 28.6129">
                        </div>
                        <div class="col">
                            <label class="form-label">Longitude</label>
                            <input type="text" name="lng" id="lngInput" class="form-control"
                                   value="<?= esc((string) ($editItem['lng'] ?? '')) ?>" required
                                   placeholder="e.g. 77.2295">
                        </div>
                    </div>

                    <!-- Picker Map -->
                    <div id="adminPickerMap" class="mb-3"></div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1"
                               <?= (!empty($editItem['is_active']) || !$editItem) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="is_active">Active (visible on map)</label>
                    </div>

                    <div class="d-flex gap-2 mt-3">
                        <button class="btn btn-primary-cms" type="submit">
                            <i class="bi bi-check-lg me-2"></i><?= $editItem ? 'Update' : 'Save' ?>
                        </button>
                        <?php if ($editItem): ?>
                            <a class="btn btn-outline-cms" href="<?= site_url('admin/map-markers') ?>">Cancel</a>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- TABLE -->
    <div class="col-lg-7">
        <div class="panel-card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <span><i class="bi bi-table me-2 text-success"></i>All Markers</span>
                <span class="badge bg-success rounded-pill"><?= count($locations) ?></span>
            </div>
            <div class="card-body p-0">

                <!-- Preview map showing all existing pins -->
                <div id="adminPreviewMap" style="height:200px;border-radius:8px;border:1px solid #dee2e6;margin-bottom:1rem;"></div>

                <div class="table-responsive">
                    <table class="table admin-table mb-0">
                        <thead class="">
                            <tr>
                                <th class="ps-3">#</th>
                                <th>Name</th>
                                <th>State</th>
                                <th>Lat</th>
                                <th>Lng</th>
                                <th>Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($locations as $loc): ?>
                            <tr>
                                <td class="ps-3 text-muted" style="font-size:12px;">#<?= esc((string) $loc['id']) ?></td>
                                <td><?= esc($loc['name']) ?></td>
                                <td><?= esc($loc['state']) ?></td>
                                <td><?= esc((string) $loc['lat']) ?></td>
                                <td><?= esc((string) $loc['lng']) ?></td>
                                <td>
                                    <?php if ($loc['is_active']): ?>
                                        <span class="badge bg-success">Yes</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">No</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a class="btn btn-sm" style="background:#e8f5e9;color:#1b5e20;border-radius:7px;font-size:12px;font-weight:600;"
                                       href="<?= site_url('admin/map-markers?edit=' . $loc['id']) ?>">
                                       <i class="bi bi-pencil"></i>
                                    </a>
                                    <a class="btn btn-sm ms-1" style="background:#fdecea;color:#b71c1c;border-radius:7px;font-size:12px;font-weight:600;"
                                       onclick="return confirm('Delete this marker?')"
                                       href="<?= site_url('admin/map-markers/delete/' . $loc['id']) ?>">
                                       <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
(function () {
    // --- Picker map (left panel, for adding/editing) ---
    const initLat = parseFloat(document.getElementById('latInput').value) || 22.5;
    const initLng = parseFloat(document.getElementById('lngInput').value) || 79.0;

    const pickerMap = L.map('adminPickerMap', { zoomControl: true }).setView([initLat, initLng], 5);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors',
        maxZoom: 18
    }).addTo(pickerMap);

    let pickerMarker = null;

    if (document.getElementById('latInput').value && document.getElementById('lngInput').value) {
        pickerMarker = L.marker([initLat, initLng], { draggable: true }).addTo(pickerMap);
        pickerMarker.on('dragend', function (e) {
            const latlng = e.target.getLatLng();
            document.getElementById('latInput').value = latlng.lat.toFixed(7);
            document.getElementById('lngInput').value = latlng.lng.toFixed(7);
        });
    }

    pickerMap.on('click', function (e) {
        document.getElementById('latInput').value = e.latlng.lat.toFixed(7);
        document.getElementById('lngInput').value = e.latlng.lng.toFixed(7);
        if (pickerMarker) {
            pickerMarker.setLatLng(e.latlng);
        } else {
            pickerMarker = L.marker(e.latlng, { draggable: true }).addTo(pickerMap);
            pickerMarker.on('dragend', function (ev) {
                const ll = ev.target.getLatLng();
                document.getElementById('latInput').value = ll.lat.toFixed(7);
                document.getElementById('lngInput').value = ll.lng.toFixed(7);
            });
        }
    });

    // --- Preview map (right panel, shows all saved pins) ---
    const previewMap = L.map('adminPreviewMap', {
        zoomControl: false, attributionControl: false,
        dragging: false, scrollWheelZoom: false, doubleClickZoom: false
    }).setView([22.5, 79.0], 4);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { maxZoom: 18 }).addTo(previewMap);

    fetch('<?= site_url('api/map-locations') ?>')
        .then(function (r) { return r.json(); })
        .then(function (locs) {
            locs.forEach(function (loc) {
                L.circleMarker([loc.lat, loc.lng], {
                    radius: 7, color: '#1b5e20', fillColor: '#4caf50', fillOpacity: 0.85, weight: 2
                }).addTo(previewMap)
                  .bindTooltip('<strong>' + loc.name + '</strong><br>' + loc.state, { direction: 'top' });
            });
        });
})();
</script>

<?= view('admin/partials/footer') ?>
