<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us – <?= esc($s['site_name'] ?? 'Janhit Kisan Party') ?></title>
    <?php if (!empty($s['site_meta_desc'])): ?>
    <meta name="description" content="<?= esc($s['site_meta_desc']) ?>">
    <?php endif; ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/contact.css') ?>">
    <style>
        * { font-family: 'Montserrat', sans-serif; }

        /* ── Layout with sidebars ── */
        .page-with-sidebars { display: flex; width: 100%; align-items: flex-start; }
        .sidebar-left, .sidebar-right {
            flex: 0 0 240px; max-width: 240px;
            padding: 28px 16px;
            position: sticky; top: 64px; height: fit-content;
        }
        .sidebar-left  { background: #f5f7f5; border-right: 1px solid #e8ede8; }
        .sidebar-right { background: #f5f7f5; border-left:  1px solid #e8ede8; }
        .page-center   { flex: 1; min-width: 0; }
        @media (max-width: 1100px) {
            .sidebar-left, .sidebar-right { flex: 0 0 180px; max-width: 180px; }
        }
        @media (max-width: 900px) {
            .sidebar-left, .sidebar-right { display: none; }
        }

        .sidebar-widget {
            background: #fff;
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 16px;
            box-shadow: 0 2px 10px rgba(0,0,0,.05);
            border-left: 3px solid #1b5e20;
        }
        .sidebar-widget h6 {
            font-size: 11px; font-weight: 800; letter-spacing: 2px;
            text-transform: uppercase; color: #1b5e20; margin-bottom: 10px;
        }
        .sidebar-quick-link {
            display: flex; align-items: center; gap: 8px;
            padding: 7px 10px; border-radius: 7px; text-decoration: none;
            font-size: 12px; font-weight: 600; color: #333; margin-bottom: 4px;
            background: #f5f7f5; transition: all .15s;
        }
        .sidebar-quick-link:hover   { background: #e8f5e9; color: #1b5e20; }
        .sidebar-quick-link i { font-size: 13px; color: #1b5e20; }

        /* floating chat button */
        .float-chat {
            position: fixed; bottom: 28px; right: 28px; z-index: 999;
            width: 58px; height: 58px; border-radius: 50%;
            background: #25d366; box-shadow: 0 6px 20px rgba(37,211,102,.5);
            display: flex; align-items: center; justify-content: center;
            text-decoration: none; color: #fff; font-size: 27px;
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0%, 100% { box-shadow: 0 6px 20px rgba(37,211,102,.5); }
            50%       { box-shadow: 0 6px 30px rgba(37,211,102,.85); }
        }
    </style>
</head>
<body>

<?php if (!empty($s['ticker_text'])): ?>
<div class="ticker">
    <span><?= esc($s['ticker_text']) ?></span>
</div>
<?php endif; ?>

<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-expand-lg navbar-dark p-3 shadow-sm bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold text-success" href="<?= site_url('/') ?>">
            <?= esc($s['site_name'] ?? 'Janhit Kisan Party') ?>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav fw-semibold">
                <?php foreach ($nav as $link): ?>
                <li class="nav-item">
                    <a class="nav-link <?= (str_contains(current_url(), $link['url']) ? 'active' : '') ?>" href="<?= esc($link['url']) ?>">
                        <?= esc($link['label']) ?>
                    </a>
                </li>
                <?php endforeach; ?>
                <li class="nav-item">
                    <a class="nav-link active" href="<?= site_url('contact') ?>">Contact</a>
                </li>
            </ul>
        </div>
        <?php if (!empty($s['whatsapp_number'])): ?>
        <a href="https://wa.me/<?= preg_replace('/\D/', '', $s['whatsapp_number']) ?>"
           target="_blank" class="btn btn-sm btn-outline-success ms-3">
            <i class="bi bi-whatsapp me-1"></i>WhatsApp
        </a>
        <?php endif; ?>
    </div>
</nav>

<!-- ===== HERO BANNER ===== -->
<section class="contact-hero">
    <div class="contact-hero-overlay"></div>
    <div class="container position-relative text-white text-center">
        <p class="contact-hero-tag">GET IN TOUCH</p>
        <h1 class="contact-hero-title">Contact Us</h1>
        <p class="contact-hero-sub">We'd love to hear from you. Reach out to us for any queries, support or to join the movement.</p>
        <nav aria-label="breadcrumb" class="d-flex justify-content-center mt-3">
            <ol class="breadcrumb contact-breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?= site_url('/') ?>">Home</a></li>
                <li class="breadcrumb-item active">Contact Us</li>
            </ol>
        </nav>
    </div>
</section>

<!-- ===== INFO CARDS ===== -->
<section class="contact-info-section">
    <div class="container">
        <div class="row g-4 justify-content-center">

            <div class="col-lg-3 col-md-6">
                <div class="contact-card">
                    <div class="contact-card-icon"><i class="bi bi-geo-alt-fill"></i></div>
                    <h5>Our Address</h5>
                    <p><?= esc($s['address_line1'] ?? '') ?><br><?= esc($s['address_line2'] ?? '') ?></p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="contact-card">
                    <div class="contact-card-icon"><i class="bi bi-telephone-fill"></i></div>
                    <h5>Phone</h5>
                    <p>
                        <?php if (!empty($s['phone1'])): ?>
                            <a href="tel:<?= esc($s['phone1']) ?>" style="color:inherit;text-decoration:none;"><?= esc($s['phone1']) ?></a>
                        <?php endif; ?>
                        <?php if (!empty($s['phone2'])): ?><br>
                            <a href="tel:<?= esc($s['phone2']) ?>" style="color:inherit;text-decoration:none;"><?= esc($s['phone2']) ?></a>
                        <?php endif; ?>
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="contact-card">
                    <div class="contact-card-icon"><i class="bi bi-envelope-fill"></i></div>
                    <h5>Email</h5>
                    <p>
                        <?php if (!empty($s['email1'])): ?>
                            <a href="mailto:<?= esc($s['email1']) ?>" style="color:inherit;text-decoration:none;"><?= esc($s['email1']) ?></a>
                        <?php endif; ?>
                        <?php if (!empty($s['email2'])): ?><br>
                            <a href="mailto:<?= esc($s['email2']) ?>" style="color:inherit;text-decoration:none;"><?= esc($s['email2']) ?></a>
                        <?php endif; ?>
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="contact-card">
                    <div class="contact-card-icon"><i class="bi bi-clock-fill"></i></div>
                    <h5>Working Hours</h5>
                    <p><?= esc($s['working_hours'] ?? 'Mon – Sat: 9:00 AM – 6:00 PM') ?><br>Sunday: Closed</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ===== FORM + SIDE PANEL (with optional sidebars) ===== -->
<section class="contact-main-section" id="contact-form">
    <div class="page-with-sidebars">

        <!-- LEFT SIDEBAR -->
        <?php if (!empty($s['left_sidebar_html'])): ?>
        <aside class="sidebar-left d-none d-xl-block">
            <div class="sidebar-widget">
                <h6><i class="bi bi-layout-sidebar me-1"></i>Quick Links</h6>
                <a href="<?= site_url('/') ?>"         class="sidebar-quick-link"><i class="bi bi-house-fill"></i> Home</a>
                <a href="<?= site_url('contact') ?>"   class="sidebar-quick-link"><i class="bi bi-envelope-fill"></i> Contact</a>
            </div>
            <?= $s['left_sidebar_html'] ?>
        </aside>
        <?php endif; ?>

        <!-- MAIN CONTENT -->
        <div class="page-center">
            <div class="container">
                <div class="row g-5 align-items-start">

                    <!-- FORM -->
                    <div class="col-lg-7">
                        <div class="contact-form-wrapper">
                            <span class="contact-label">SEND A MESSAGE</span>
                            <h2 class="contact-form-title">How Can We Help You?</h2>
                            <p class="contact-form-sub">Fill in the form below and our team will get back to you within 24 hours.</p>

                            <?php if (session()->getFlashdata('contact_success')): ?>
                            <div class="contact-success" style="display:flex;">
                                <i class="bi bi-check-circle-fill"></i>
                                <h5>Message Sent Successfully!</h5>
                                <p>Thank you for reaching out. We'll get back to you shortly.</p>
                            </div>
                            <?php else: ?>

                            <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger mb-3" style="border-radius:10px;font-size:13.5px;">
                                <i class="bi bi-exclamation-triangle me-2"></i><?= esc(session()->getFlashdata('error')) ?>
                            </div>
                            <?php endif; ?>

                            <form class="contact-form mt-4" method="post" action="<?= site_url('contact/submit') ?>">
                                <?= csrf_field() ?>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="name" id="fullName"
                                                   placeholder="Full Name" value="<?= esc(old('name')) ?>" required>
                                            <label for="fullName"><i class="bi bi-person me-1"></i> Full Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" name="email" id="email"
                                                   placeholder="Email Address" value="<?= esc(old('email')) ?>" required>
                                            <label for="email"><i class="bi bi-envelope me-1"></i> Email Address</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="tel" class="form-control" name="phone" id="phone"
                                                   placeholder="Phone Number" value="<?= esc(old('phone')) ?>">
                                            <label for="phone"><i class="bi bi-phone me-1"></i> Phone Number</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <select class="form-select" name="subject" id="subject">
                                                <option value="" disabled selected>Select Subject</option>
                                                <option>General Enquiry</option>
                                                <option>Membership</option>
                                                <option>Volunteering</option>
                                                <option>Media / Press</option>
                                                <option>Donation</option>
                                                <option>Other</option>
                                            </select>
                                            <label for="subject"><i class="bi bi-tag me-1"></i> Subject</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" name="message" id="message"
                                                      placeholder="Your Message" style="height:150px;" required><?= esc(old('message')) ?></textarea>
                                            <label for="message"><i class="bi bi-chat-dots me-1"></i> Your Message</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn-contact-submit">
                                            <i class="bi bi-send-fill me-2"></i>Send Message
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- SOCIAL SIDE PANEL -->
                    <div class="col-lg-5">
                        <div class="contact-side-panel">
                            <span class="contact-label">CONNECT WITH US</span>
                            <h3 class="mt-2 mb-4">Follow Our Movement</h3>

                            <div class="social-contact-links">
                                <?php if (!empty($s['facebook_url'])): ?>
                                <a href="<?= esc($s['facebook_url']) ?>" target="_blank" class="social-contact-btn facebook">
                                    <i class="bi bi-facebook"></i>
                                    <div><span>Facebook</span><small><?= esc($s['facebook_handle'] ?? '') ?></small></div>
                                </a>
                                <?php endif; ?>

                                <?php if (!empty($s['twitter_url'])): ?>
                                <a href="<?= esc($s['twitter_url']) ?>" target="_blank" class="social-contact-btn twitter">
                                    <i class="bi bi-twitter-x"></i>
                                    <div><span>Twitter / X</span><small><?= esc($s['twitter_handle'] ?? '') ?></small></div>
                                </a>
                                <?php endif; ?>

                                <?php if (!empty($s['youtube_url'])): ?>
                                <a href="<?= esc($s['youtube_url']) ?>" target="_blank" class="social-contact-btn youtube">
                                    <i class="bi bi-youtube"></i>
                                    <div><span>YouTube</span><small><?= esc($s['youtube_handle'] ?? '') ?></small></div>
                                </a>
                                <?php endif; ?>

                                <?php if (!empty($s['whatsapp_number'])): ?>
                                <a href="https://wa.me/<?= preg_replace('/\D/', '', $s['whatsapp_number']) ?>"
                                   target="_blank" class="social-contact-btn whatsapp">
                                    <i class="bi bi-whatsapp"></i>
                                    <div>
                                        <span><?= esc($s['whatsapp_label'] ?? 'WhatsApp Helpline') ?></span>
                                        <small><?= esc($s['whatsapp_number']) ?></small>
                                    </div>
                                </a>
                                <?php endif; ?>

                                <?php if (!empty($s['instagram_url'])): ?>
                                <a href="<?= esc($s['instagram_url']) ?>" target="_blank" class="social-contact-btn instagram">
                                    <i class="bi bi-instagram"></i>
                                    <div><span>Instagram</span><small><?= esc($s['instagram_handle'] ?? '') ?></small></div>
                                </a>
                                <?php endif; ?>
                            </div>

                            <!-- Direct contact buttons -->
                            <div class="quick-actions mt-4">
                                <h6 class="text-uppercase fw-bold mb-3" style="color:#f9a825;letter-spacing:1px;font-size:11px;">Direct Contact</h6>
                                <?php if (!empty($s['phone1'])): ?>
                                <a href="tel:<?= esc($s['phone1']) ?>" class="quick-action-btn">
                                    <i class="bi bi-telephone-fill"></i> <?= esc($s['phone1']) ?>
                                </a>
                                <?php endif; ?>
                                <?php if (!empty($s['email1'])): ?>
                                <a href="mailto:<?= esc($s['email1']) ?>" class="quick-action-btn">
                                    <i class="bi bi-envelope-fill"></i> <?= esc($s['email1']) ?>
                                </a>
                                <?php endif; ?>
                                <?php if (!empty($s['whatsapp_group_url'])): ?>
                                <a href="<?= esc($s['whatsapp_group_url']) ?>" target="_blank" class="quick-action-btn">
                                    <i class="bi bi-people-fill"></i> Join WhatsApp Group
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- RIGHT SIDEBAR -->
        <?php if (!empty($s['right_sidebar_html'])): ?>
        <aside class="sidebar-right d-none d-xl-block">
            <div class="sidebar-widget">
                <h6><i class="bi bi-info-circle me-1"></i>Information</h6>
                <div style="font-size:12px;line-height:1.7;color:#555;">
                    <div class="mb-2"><i class="bi bi-geo-alt-fill text-success me-1"></i><?= esc($s['address_line1'] ?? '') ?></div>
                    <div class="mb-2"><i class="bi bi-telephone-fill text-success me-1"></i><?= esc($s['phone1'] ?? '') ?></div>
                    <div><i class="bi bi-envelope-fill text-success me-1"></i><?= esc($s['email1'] ?? '') ?></div>
                </div>
            </div>
            <?= $s['right_sidebar_html'] ?>
        </aside>
        <?php endif; ?>

    </div>
</section>

<!-- ===== MAP SECTION ===== -->
<?php if (!empty($s['map_embed_url'])): ?>
<section class="contact-map-section">
    <div class="container-fluid px-0">
        <iframe
            src="<?= esc($s['map_embed_url']) ?>"
            width="100%" height="420"
            style="border:0;display:block;"
            allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</section>
<?php endif; ?>

<!-- ===== FOOTER (matching original) ===== -->
<footer class="site-footer">
    <div class="container">
        <h2 class="text-white fw-bold mb-5">SITE NAVIGATOR</h2>
        <div class="row">
            <div class="col-md-3">
                <h4>The Party</h4>
                <ul>
                    <li><a href="#">About the Party</a></li>
                    <li><a href="#">Our Philosophy</a></li>
                    <li><a href="#">Constitution</a></li>
                    <li><a href="#">Manifesto 2026</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4>Leadership</h4>
                <ul>
                    <li><a href="#">National Leaders</a></li>
                    <li><a href="#">State Leadership</a></li>
                    <li><a href="#">Party Presidents</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4>Media Resources</h4>
                <ul>
                    <li><a href="#">Press Releases</a></li>
                    <li><a href="#">Photo Gallery</a></li>
                    <li><a href="#">Video Gallery</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4>Contact Us</h4>
                <p style="color:rgba(255,255,255,.6);font-size:13px;line-height:1.8;">
                    <?= esc($s['address_line1'] ?? '') ?><br>
                    <?= esc($s['address_line2'] ?? '') ?><br>
                    <a href="tel:<?= esc($s['phone1'] ?? '') ?>" style="color:rgba(255,255,255,.7);"><?= esc($s['phone1'] ?? '') ?></a><br>
                    <a href="mailto:<?= esc($s['email1'] ?? '') ?>" style="color:rgba(255,255,255,.7);"><?= esc($s['email1'] ?? '') ?></a>
                </p>
            </div>
        </div>
        <div class="footer-bottom">
            <div>
                <a href="#">Privacy Policy</a>
                <a href="#">Disclaimer</a>
                <a href="<?= site_url('contact') ?>">Contact Us</a>
            </div>
            <div class="social-icons">
                <span>Connect with us:</span>
                <?php if (!empty($s['facebook_url'])): ?>
                <a href="<?= esc($s['facebook_url']) ?>" target="_blank"><i class="bi bi-facebook"></i></a>
                <?php endif; ?>
                <?php if (!empty($s['twitter_url'])): ?>
                <a href="<?= esc($s['twitter_url']) ?>" target="_blank"><i class="bi bi-twitter-x"></i></a>
                <?php endif; ?>
                <?php if (!empty($s['youtube_url'])): ?>
                <a href="<?= esc($s['youtube_url']) ?>" target="_blank"><i class="bi bi-youtube"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <p>© <?= date('Y') ?> <?= esc($s['site_name'] ?? 'Janhit Kisan Party') ?>. All Rights Reserved.</p>
</footer>

<!-- WhatsApp float button -->
<?php if (!empty($s['whatsapp_number'])): ?>
<a href="https://wa.me/<?= preg_replace('/\D/', '', $s['whatsapp_number']) ?>"
   target="_blank" class="float-chat" title="Chat on WhatsApp">
    <i class="bi bi-whatsapp"></i>
</a>
<?php endif; ?>

<!-- Social Share Bar (if enabled) -->
<?php if (!empty($s['share_facebook']) || !empty($s['share_twitter']) || !empty($s['share_whatsapp'])): ?>
<div style="position:fixed;bottom:28px;left:28px;z-index:999;display:flex;flex-direction:column;gap:8px;">
    <?php if (!empty($s['share_facebook'])): ?>
    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(current_url()) ?>"
       target="_blank" title="Share on Facebook"
       style="width:42px;height:42px;border-radius:50%;background:#1877f2;color:#fff;display:flex;align-items:center;justify-content:center;font-size:18px;text-decoration:none;box-shadow:0 3px 12px rgba(24,119,242,.4);">
       <i class="bi bi-facebook"></i>
    </a>
    <?php endif; ?>
    <?php if (!empty($s['share_twitter'])): ?>
    <a href="https://twitter.com/intent/tweet?url=<?= urlencode(current_url()) ?>"
       target="_blank" title="Share on Twitter"
       style="width:42px;height:42px;border-radius:50%;background:#111;color:#fff;display:flex;align-items:center;justify-content:center;font-size:18px;text-decoration:none;box-shadow:0 3px 12px rgba(0,0,0,.3);">
       <i class="bi bi-twitter-x"></i>
    </a>
    <?php endif; ?>
    <?php if (!empty($s['share_whatsapp'])): ?>
    <a href="https://api.whatsapp.com/send?text=<?= urlencode(current_url()) ?>"
       target="_blank" title="Share on WhatsApp"
       style="width:42px;height:42px;border-radius:50%;background:#25d366;color:#fff;display:flex;align-items:center;justify-content:center;font-size:18px;text-decoration:none;box-shadow:0 3px 12px rgba(37,211,102,.4);">
       <i class="bi bi-whatsapp"></i>
    </a>
    <?php endif; ?>
</div>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
