<?php
$activePage = 'contact';
$pageTitle  = 'Contact Us — AstroJyoti';
$pageDesc   = 'Book a Vedic astrology consultation with AstroJyoti. Available in-person and online.';

$formSuccess = false;
$formError   = '';
$formData    = ['name'=>'','email'=>'','phone'=>'','sign'=>'','service'=>'','message'=>''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../config/database.php';
    $name    = trim($_POST['name']    ?? '');
    $email   = trim($_POST['email']   ?? '');
    $phone   = trim($_POST['phone']   ?? '');
    $sign    = trim($_POST['sign']    ?? '');
    $service = trim($_POST['service'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $formData = compact('name','email','phone','sign','service','message');
    if (empty($name)||empty($email)||empty($message)) {
        $formError = 'Please fill in your name, email, and message.';
    } elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $formError = 'Please enter a valid email address.';
    } else {
        $formSuccess = true;
        $formData = ['name'=>'','email'=>'','phone'=>'','sign'=>'','service'=>'','message'=>''];
    }
}

$zodiacSigns = ['Aries','Taurus','Gemini','Cancer','Leo','Virgo','Libra','Scorpio','Sagittarius','Capricorn','Aquarius','Pisces'];
$serviceOptions = ['Palm Reading','Kundli Analysis','Horoscope Reading','Love & Relationship','Career Guidance','General Consultation'];

require_once __DIR__ . '/../components/header.php';
?>

<style>
    body { background:#fdf5e8; }
    .contact-wrap { max-width:1240px; margin:0 auto; padding:0 24px; }
    .contact-grid { display:grid; grid-template-columns:1fr 1.4fr; gap:40px; align-items:start; margin:60px auto; }
    @media(max-width:900px){ .contact-grid { grid-template-columns:1fr; } }

    /* Info card */
    .info-card {
        background:linear-gradient(160deg,#1e0d3e,#150828);
        border:1px solid rgba(212,160,23,0.2);
        border-radius:20px; padding:36px 28px;
        box-shadow:0 8px 40px rgba(74,0,128,0.25);
    }
    .info-card h2 { font-family:'Cinzel',serif; font-size:1.4rem; font-weight:700; color:#D4A017; margin-bottom:6px; }
    .info-card p  { color:rgba(255,255,255,0.55); font-size:0.9rem; line-height:1.75; margin-bottom:28px; }
    .info-item { display:flex; align-items:flex-start; gap:14px; margin-bottom:20px; }
    .info-icon {
        width:44px; height:44px; border-radius:50%; flex-shrink:0;
        background:rgba(212,160,23,0.1); border:1px solid rgba(212,160,23,0.3);
        display:flex; align-items:center; justify-content:center;
    }
    .info-icon i { color:#D4A017; font-size:1rem; }
    .info-label { font-family:'Cinzel',serif; font-size:0.78rem; color:rgba(212,160,23,0.7); letter-spacing:0.08em; margin-bottom:3px; }
    .info-val   { color:rgba(255,255,255,0.8); font-size:0.9rem; }

    /* Why consult box */
    .why-box {
        background:rgba(212,160,23,0.07); border:1px solid rgba(212,160,23,0.2);
        border-radius:14px; padding:20px; margin-top:28px;
    }
    .why-box h3 { font-family:'Cinzel',serif; font-size:0.85rem; color:#D4A017; margin-bottom:12px; letter-spacing:0.06em; }
    .why-item { display:flex; align-items:center; gap:10px; margin-bottom:10px; color:rgba(255,255,255,0.7); font-size:0.85rem; }
    .why-item i { color:#D4A017; font-size:0.8rem; width:14px; }

    /* Form card */
    .form-card {
        background:#fff;
        border:1.5px solid rgba(212,160,23,0.18);
        border-radius:20px; padding:40px 36px;
        box-shadow:0 8px 40px rgba(74,0,128,0.1);
    }
    @media(max-width:580px){ .form-card { padding:28px 20px; } }
    .form-card h2 { font-family:'Cinzel',serif; font-size:1.4rem; font-weight:700; color:#2d0060; margin-bottom:6px; }
    .form-card p  { color:rgba(45,0,96,0.5); font-size:0.88rem; margin-bottom:28px; }
    .form-group   { margin-bottom:18px; }
    .form-group label { display:block; font-family:'Cinzel',serif; font-size:0.75rem; letter-spacing:0.08em; color:#4a0080; margin-bottom:7px; font-weight:600; }
    .form-group input,
    .form-group select,
    .form-group textarea {
        width:100%; padding:12px 16px;
        background:#fdf5e8; border:1.5px solid rgba(74,0,128,0.18);
        border-radius:10px; font-family:'Inter',sans-serif; font-size:0.9rem; color:#1a0a2e;
        outline:none; transition:border-color 0.2s;
    }
    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus { border-color:#D4A017; background:#fff; }
    .form-group textarea { resize:vertical; min-height:120px; }
    .form-row { display:grid; grid-template-columns:1fr 1fr; gap:16px; }
    @media(max-width:580px){ .form-row { grid-template-columns:1fr; } }
    .form-submit {
        width:100%; padding:14px; border-radius:50px; border:none; cursor:pointer;
        background:linear-gradient(135deg,#D4A017,#a07010); color:#fff;
        font-family:'Cinzel',serif; font-size:0.9rem; font-weight:700;
        display:flex; align-items:center; justify-content:center; gap:9px;
        box-shadow:0 4px 20px rgba(212,160,23,0.4); transition:all 0.3s;
    }
    .form-submit:hover { background:linear-gradient(135deg,#f0c040,#D4A017); box-shadow:0 6px 28px rgba(212,160,23,0.55); }
    .alert-success { background:rgba(37,211,102,0.1); border:1px solid rgba(37,211,102,0.4); color:#15803d; border-radius:10px; padding:14px 18px; margin-bottom:20px; display:flex; align-items:center; gap:10px; font-size:0.88rem; }
    .alert-error   { background:rgba(239,68,68,0.08); border:1px solid rgba(239,68,68,0.3); color:#dc2626; border-radius:10px; padding:14px 18px; margin-bottom:20px; display:flex; align-items:center; gap:10px; font-size:0.88rem; }
</style>

<!-- Page Hero -->
<div class="page-hero">
    <div class="container">
        <h1 class="page-hero-title">Book a <span>Consultation</span></h1>
        <div class="page-hero-breadcrumb">
            <a href="/astro/">Home</a> <span style="margin:0 8px;">›</span> Contact
        </div>
    </div>
</div>

<!-- Contact Grid -->
<div class="contact-wrap">
    <div class="contact-grid">

        <!-- Left: Info -->
        <div class="info-card">
            <h2>Get In Touch</h2>
            <p>Schedule a personalized consultation with our expert Vedic astrologer. We're here to guide you.</p>

            <?php foreach([
                ['fa-phone',    'Phone',    '+91 99999 99999'],
                ['fa-envelope', 'Email',    'hello@astrojyoti.in'],
                ['fa-clock',    'Hours',    'Mon–Sat, 9AM–7PM IST'],
                ['fa-map-marker-alt','Location','India (Online & In-person)'],
            ] as [$ic,$lbl,$val]): ?>
            <div class="info-item">
                <div class="info-icon"><i class="fas <?= $ic ?>"></i></div>
                <div>
                    <div class="info-label"><?= $lbl ?></div>
                    <div class="info-val"><?= $val ?></div>
                </div>
            </div>
            <?php endforeach; ?>

            <div class="why-box">
                <h3>WHY CONSULT WITH US?</h3>
                <?php foreach(['15+ Years of Vedic Astrology Experience','100% Accurate & Personalized Readings','Strict Privacy & Confidentiality','Available Online & In-Person','Instant WhatsApp Support'] as $w): ?>
                <div class="why-item"><i class="fas fa-check-circle"></i><?= $w ?></div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Right: Form -->
        <div class="form-card">
            <h2>Book Your Session</h2>
            <p>Fill in the details below and we'll get back to you within 24 hours.</p>

            <?php if($formSuccess): ?>
            <div class="alert-success"><i class="fas fa-check-circle"></i> Thank you! We'll contact you within 24 hours to confirm your session.</div>
            <?php elseif($formError): ?>
            <div class="alert-error"><i class="fas fa-exclamation-circle"></i><?= htmlspecialchars($formError) ?></div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="form-row">
                    <div class="form-group">
                        <label>FULL NAME *</label>
                        <input type="text" name="name" placeholder="Your full name" value="<?= htmlspecialchars($formData['name']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label>EMAIL ADDRESS *</label>
                        <input type="email" name="email" placeholder="your@email.com" value="<?= htmlspecialchars($formData['email']) ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>PHONE NUMBER</label>
                        <input type="tel" name="phone" placeholder="+91 00000 00000" value="<?= htmlspecialchars($formData['phone']) ?>">
                    </div>
                    <div class="form-group">
                        <label>ZODIAC SIGN</label>
                        <select name="sign">
                            <option value="">Select your sign</option>
                            <?php foreach($zodiacSigns as $s): ?>
                            <option value="<?= $s ?>" <?= $formData['sign']===$s?'selected':'' ?>><?= $s ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>SERVICE REQUIRED</label>
                    <select name="service">
                        <option value="">Select a service</option>
                        <?php foreach($serviceOptions as $so): ?>
                        <option value="<?= $so ?>" <?= $formData['service']===$so?'selected':'' ?>><?= $so ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>YOUR MESSAGE *</label>
                    <textarea name="message" placeholder="Tell us about your questions or concerns..."><?= htmlspecialchars($formData['message']) ?></textarea>
                </div>
                <button type="submit" class="form-submit">
                    <i class="fas fa-calendar-alt"></i> Book My Consultation →
                </button>
            </form>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../components/footer_shared.php'; ?>
