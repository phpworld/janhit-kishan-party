<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kisan Janta Party</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
<?php
$imageUrl = static function (?string $path): string {
    if (! $path) {
        return base_url('assets/img/placeholder.jpg');
    }

    if (preg_match('/^https?:\/\//i', $path)) {
        return $path;
    }

    return base_url(ltrim($path, '/'));
};
?>

<div class="ticker">
    <span>Breaking: Farmer Welfare Bill Passed • National Agriculture Summit 2026 • Membership Drive Open Now • Rural Development Vision 2030</span>
</div>

<nav class="navbar navbar-expand-lg navbar-dark p-3 shadow-sm bg-dark">
  <div class="container">
    <a class="navbar-brand fw-bold text-success" href="#">Janhit Kisan Party</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav fw-semibold">
        <?php foreach ($navigation as $item): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= esc($item['url']) ?>"><?= esc($item['label']) ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
    <a class="btn btn-sm btn-outline-success ms-3" href="<?= site_url('admin/login') ?>">Admin Login</a>
  </div>
</nav>

<section class="hero-slider" id="home">
  <div class="swiper heroSwiper">
    <div class="swiper-wrapper">
      <?php foreach ($sliders as $slide): ?>
      <div class="swiper-slide hero hero-slide <?= ($slide['layout'] ?? 'right') === 'left' ? 'hero-alt' : '' ?>">
        <div class="container hero-content">
          <div class="row align-items-center g-0 h-100">
            <?php if (($slide['layout'] ?? 'right') === 'left'): ?>
              <div class="col-lg-6 col-12 text-center order-1 order-lg-1 hero-left">
                <div class="hero-media hero-media-bleed-left">
                  <img src="<?= esc($imageUrl($slide['image'] ?? null)) ?>" alt="Slide image" class="hero-image">
                </div>
              </div>
              <div class="col-lg-6 col-12 text-lg-start text-center order-2 order-lg-2 hero-text">
                <h1 class="typing"><?= esc($slide['headline']) ?></h1>
                <p><?= esc((string) ($slide['subheadline'] ?? '')) ?></p>
              </div>
            <?php else: ?>
              <div class="col-lg-6 col-12 text-lg-start text-center order-2 order-lg-1 hero-text">
                <h1 class="typing"><?= esc($slide['headline']) ?></h1>
                <p><?= esc((string) ($slide['subheadline'] ?? '')) ?></p>
              </div>
              <div class="col-lg-6 col-12 text-center order-1 order-lg-2 hero-right">
                <div class="hero-media hero-media-bleed">
                  <img src="<?= esc($imageUrl($slide['image'] ?? null)) ?>" alt="Slide image" class="hero-image">
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="swiper-pagination hero-pagination"></div>
  </div>
</section>

<section class="leaders-carousel-section reveal" id="leaders">
  <div class="swiper leadersSwiper">
    <div class="swiper-wrapper">
      <?php foreach ($presidents as $president): ?>
      <div class="swiper-slide leader-slide">
        <div class="leader-content">
          <h3><?= esc($president['name']) ?></h3>
          <p><?= esc($president['tenure']) ?></p>
        </div>
        <div class="leader-image">
          <img src="<?= esc($imageUrl($president['image'] ?? null)) ?>" alt="<?= esc($president['name']) ?>">
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
  <div class="leaders-bottom-text">PARTY PRESIDENTS</div>
</section>

<section class="footprints-section reveal" id="footprints">
  <div class="footprints-overlay"></div>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-4 col-12 text-white">
        <h1 class="footprints-title"><?= esc($footprint['title'] ?? 'OUR FOOTPRINTS') ?></h1>
        <h3 class="footprints-subtitle"><?= esc($footprint['subtitle'] ?? '') ?></h3>
        <div class="footprint-stats mt-5">
          <div class="me-5">
            <h5>LOK SABHA</h5>
            <h2><?= esc($footprint['lok_sabha'] ?? '0/0') ?></h2>
          </div>
          <div>
            <h5>RAJYA SABHA</h5>
            <h2><?= esc($footprint['rajya_sabha'] ?? '0/0') ?></h2>
          </div>
        </div>
      </div>
      <div class="col-md-8 col-12 mt-4 mt-md-0" style="padding:0;">
        <div id="indiaMap"></div>
      </div>
    </div>
  </div>
</section>

<section class="inspiration-section" id="inspiration">
  <div class="swiper inspirationSwiper">
    <div class="swiper-wrapper">
      <div class="slide-counter"><span id="currentSlide">1</span> / <span id="totalSlides"><?= count($inspirations) ?></span></div>
      <?php foreach ($inspirations as $slide): ?>
      <div class="swiper-slide inspiration-slide">
        <div class="row g-0 h-100 align-items-center">
          <div class="col-lg-6 inspiration-image-col">
            <img src="<?= esc($imageUrl($slide['image'] ?? null)) ?>" alt="<?= esc($slide['name']) ?>" class="inspiration-image">
          </div>
          <div class="col-lg-6 inspiration-content-col">
            <div class="inspiration-content animate-text">
              <h1><?= esc($slide['title']) ?></h1>
              <h3><?= esc($slide['name']) ?></h3>
              <p><?= esc((string) ($slide['description'] ?? '')) ?></p>
              <a href="#" class="btn-inspire" data-bs-toggle="modal" data-bs-target="#readMoreModal"><?= esc($slide['button_text'] ?? 'Read More') ?></a>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="swiper-pagination"></div>
  </div>
</section>

<div class="modal fade" id="readMoreModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content p-4">
      <h4>About Our Inspiration</h4>
      <p>This section represents the guiding vision and legacy of leaders who shaped the movement.</p>
      <button class="btn btn-success mt-3" data-bs-dismiss="modal">Close</button>
    </div>
  </div>
</div>

<section class="press-premium-section reveal" id="media">
  <div class="container">
    <div class="press-header text-center">
      <h2>Media Gallery</h2>
      <p class="text-white-50">Latest updates and highlights from our party</p>
    </div>
    <div class="premium-gallery mt-5">
      <?php foreach ($pressGallery as $item): ?>
      <div class="gallery-box <?= esc($item['box_type']) ?>">
        <img src="<?= esc($imageUrl($item['image'] ?? null)) ?>" alt="<?= esc($item['title']) ?>">
        <div class="gallery-overlay">
          <h4><?= esc($item['title']) ?></h4>
          <p><?= esc((string) ($item['subtitle'] ?? '')) ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<footer id="footer">
<footer class="site-footer">
<div class="container">
<h2 class="text-white fw-bold mb-5">SITE NAVIGATOR</h2>

<div class="row">

<!-- COLUMN 1 -->
<div class="col-md-3">
<h4>The Party</h4>
<ul>
<li><a href="#">About the Party</a></li>
<li><a href="#">Our Philosophy</a></li>
<li><a href="#">History of the Party</a></li>
<li><a href="#">Constitution</a></li>
<li><a href="#">Manifesto 2026</a></li>
</ul>

<h4 class="mt-4">KJP in Parliament</h4>
<ul>
<li><a href="#">Lok Sabha Members</a></li>
<li><a href="#">Rajya Sabha Members</a></li>
<li><a href="#">Union Council</a></li>
</ul>
</div>

<!-- COLUMN 2 -->
<div class="col-md-3">
<h4>Leadership</h4>
<ul>
<li><a href="#">Founders</a></li>
<li><a href="#">National Leaders</a></li>
<li><a href="#">State Leadership</a></li>
<li><a href="#">Party Presidents</a></li>
</ul>

<h4 class="mt-4">Morcha</h4>
<ul>
<li><a href="#">Kisan Morcha</a></li>
<li><a href="#">Mahila Morcha</a></li>
<li><a href="#">Yuva Morcha</a></li>
</ul>
</div>

<!-- COLUMN 3 -->
<div class="col-md-3">
<h4>Media Resources</h4>
<ul>
<li><a href="#">Press Releases</a></li>
<li><a href="#">Speeches</a></li>
<li><a href="#">Photo Gallery</a></li>
<li><a href="#">Video Gallery</a></li>
</ul>

<a href="#" class="footer-btn btn-green">Infographics</a>
<a href="#" class="footer-btn btn-purple">My KJP</a>
<a href="#" class="footer-btn btn-orange">Join Party</a>
<a href="#" class="footer-btn btn-blue">Make Donation</a>
</div>

<!-- COLUMN 4 -->
<div class="col-md-3">
<h4>Organisation</h4>
<ul>
<li><a href="#">National Office Bearers</a></li>
<li><a href="#">Committees</a></li>
<li><a href="#">State Presidents</a></li>
<li><a href="#">Departments</a></li>
</ul>

<h4 class="mt-4">Contact Us</h4>
<a href="#" class="footer-btn btn-green">Live Updates</a>
<a href="#" class="footer-btn btn-orange">Campaigns</a>
<a href="#" class="footer-btn btn-blue">Election Corner</a>
</div>

</div>

<!-- BOTTOM BAR -->
<div class="footer-bottom">
<div>
<a href="#">Privacy Policy</a>
<a href="#">Disclaimer</a>
<a href="#">Contact Us</a>
</div>

<div class="social-icons">
<span>Connect with us:</span>
<i class="bi bi-facebook"></i>
<i class="bi bi-twitter"></i>
<i class="bi bi-youtube"></i>
</div>
</div>

</div>
<p>© 2026 Kisan Janta Party. All Rights Reserved.</p>
</footer>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="<?= base_url('assets/js/script.js') ?>"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof L === 'undefined') return;

    const map = window._indiaMap = L.map('indiaMap', {
        dragging: false,
        touchZoom: false,
        scrollWheelZoom: false,
        doubleClickZoom: false,
        boxZoom: false,
        keyboard: false,
        zoomControl: false,
        attributionControl: false
    }).setView([22.5, 79.0], 5);

    function renderMap(geoData) {
        const geojsonLayer = L.geoJSON(geoData, {
            style: {
                color: '#1b5e20',
                weight: 1.5,
                fillColor: '#ffffff',
                fillOpacity: 0.6
            }
        }).addTo(map);

        map.fitBounds(geojsonLayer.getBounds(), { padding: [20, 20] });
        setTimeout(function() { map.invalidateSize(); }, 500);

        fetch('<?= site_url('api/map-locations') ?>')
            .then(function(r) { return r.json(); })
            .then(function(locations) {
                locations.forEach(function(location) {
                    var pinIcon = L.divIcon({
                        className: '',
                        html: '<div class="map-pin"><span class="map-pin-dot"></span></div>',
                        iconSize: [24, 36],
                        iconAnchor: [12, 36],
                        popupAnchor: [0, -38]
                    });
                    var marker = L.marker([location.lat, location.lng], { icon: pinIcon }).addTo(map);
                    marker.bindPopup('<div style="text-align:center;padding:6px 10px;"><strong style="color:#1b5e20;font-size:14px;display:block;margin-bottom:2px;">' + location.name + '</strong><span style="color:#555;font-size:12px;">' + location.state + '</span></div>');
                });
            })
            .catch(function(err) { console.warn('Map markers fetch failed:', err); });
    }

    fetch('<?= base_url('assets/js/india_states.geojson') ?>')
        .then(function(r) {
            if (!r.ok) throw new Error('HTTP ' + r.status);
            return r.json();
        })
        .then(function(data) { renderMap(data); })
        .catch(function(err) { console.error('Failed to load india_states.geojson:', err); });
});
</script>
</body>
</html>
