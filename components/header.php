<?php
/**
 * Shared navbar — purple/gold cosmic theme
 * Include: require_once __DIR__ . '/../components/navbar.php';
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if(!isset($pageTitle)) $pageTitle = 'AstroJyoti — Vedic Astrology & Palm Reading'; ?>
    <?php if(!isset($pageDesc))  $pageDesc  = 'Expert Vedic Astrology, Palm Reading & Kundli Analysis. Trusted by 50,000+ clients.'; ?>
    <meta name="description" content="<?= htmlspecialchars($pageDesc) ?>">
    <title><?= htmlspecialchars($pageTitle) ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700;900&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous"/>

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body { font-family: 'Inter', sans-serif; background: #fdf5e8; color: #1a0a2e; }

        /* ══ GLOBAL VARS ══ */
        :root {
            --gold:    #D4A017;
            --gold-lt: #f0c040;
            --gold-dk: #a07010;
            --purple:  #2d0060;
            --purple-lt: #4a0080;
            --purple-dk: #0d001a;
            --bg-dark: #0d001a;
            --bg-card: #1e0d3e;
            --cream:   #fdf5e8;
        }

        /* ══ NAVBAR ══ */
        .navbar {
            background: #fff;
            border-bottom: 1px solid #ede0c8;
            position: sticky; top: 0; z-index: 1000;
            box-shadow: 0 1px 8px rgba(0,0,0,0.06);
        }
        .navbar-inner {
            max-width: 1240px; margin: 0 auto; padding: 0 24px;
            display: flex; align-items: center; justify-content: space-between; height: 68px;
        }
        .logo-wrap { display: flex; align-items: center; gap: 10px; text-decoration: none; }
        .logo-icon  {
            width: 48px; height: 48px; border-radius: 50%;
            background: linear-gradient(135deg, #e8b820, #c89010);
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 2px 12px rgba(212,160,23,0.45); flex-shrink: 0;
        }
        .logo-name { font-family:'Cinzel',serif; font-size:1.1rem; font-weight:700; color:#c89010; letter-spacing:0.03em; line-height:1.1; }
        .logo-sub  { font-family:'Playfair Display',serif; font-size:9.5px; font-style:italic; color:#a07010; letter-spacing:0.06em; }
        .nav-links { display:flex; align-items:center; gap:24px; }
        .nav-links a { font-size:0.875rem; font-weight:500; color:#333; text-decoration:none; transition:color 0.2s; white-space:nowrap; }
        .nav-links a:hover { color:#c89010; }
        .nav-links a.active {
            background:#D4A017; color:#fff !important;
            padding:6px 18px; border-radius:50px; font-weight:600;
        }
        .btn-nav-book {
            font-family:'Cinzel',serif; font-size:0.78rem; font-weight:600;
            color:#c89010; border:1.5px solid #c89010; background:transparent;
            padding:9px 18px; border-radius:50px; text-decoration:none;
            display:inline-flex; align-items:center; gap:7px; white-space:nowrap;
            transition:all 0.25s;
        }
        .btn-nav-book:hover { background:rgba(212,160,23,0.08); }
        .mob-toggle { display:none; background:none; border:none; color:#c89010; font-size:1.4rem; cursor:pointer; padding:4px; }
        .mob-menu   { display:none; flex-direction:column; gap:10px; padding:14px 24px 18px; background:#fff; border-top:1px solid #ede0c8; }
        .mob-menu a { color:#333; font-size:0.95rem; text-decoration:none; padding:4px 0; font-weight:500; }
        .mob-menu a.active { color:#c89010; font-weight:700; }
        @media(max-width:1024px){
            .nav-links { display:none; }
            .btn-nav-book { display:none; }
            .mob-toggle { display:block; }
        }

        /* ══ GLOBAL BUTTONS ══ */
        .btn-gold {
            font-family:'Cinzel',serif; font-size:0.82rem; font-weight:600;
            background:linear-gradient(135deg,#D4A017,#a07010); color:#fff;
            padding:12px 26px; border-radius:50px; text-decoration:none;
            display:inline-flex; align-items:center; gap:8px;
            border:none; cursor:pointer; transition:all 0.3s;
            box-shadow:0 4px 16px rgba(212,160,23,0.35);
        }
        .btn-gold:hover { background:linear-gradient(135deg,#f0c040,#D4A017); box-shadow:0 6px 24px rgba(212,160,23,0.5); }
        .btn-outline-gold {
            font-family:'Cinzel',serif; font-size:0.82rem; font-weight:600;
            color:#D4A017; border:1.5px solid #D4A017; background:transparent;
            padding:11px 24px; border-radius:50px; text-decoration:none;
            display:inline-flex; align-items:center; gap:8px; transition:all 0.25s;
        }
        .btn-outline-gold:hover { background:rgba(212,160,23,0.1); }

        /* ══ SECTION HEADER SHARED ══ */
        .section-label {
            display:inline-flex; align-items:center; gap:8px;
            background:linear-gradient(135deg,#4a0080,#2d0060);
            color:#D4A017; font-family:'Cinzel',serif; font-size:0.76rem; font-weight:600;
            letter-spacing:0.1em; padding:7px 20px; border-radius:50px; margin-bottom:14px;
        }
        .section-title-dark  { font-family:'Cinzel',serif; font-size:clamp(1.5rem,2.5vw,2rem); font-weight:700; color:#2d0060; margin-bottom:8px; }
        .section-title-light { font-family:'Cinzel',serif; font-size:clamp(1.5rem,2.5vw,2rem); font-weight:700; color:#D4A017;  margin-bottom:8px; }
        .section-sub-dark    { color:rgba(45,0,96,0.55); font-size:0.9rem; }
        .section-sub-light   { color:rgba(255,255,255,0.5); font-size:0.9rem; }
        .gold-line { width:60px; height:3px; background:linear-gradient(90deg,#D4A017,#f0c040); border-radius:2px; margin:14px auto 0; }
        .om-divider {
            display:flex; align-items:center; justify-content:center; gap:14px; margin-bottom:10px;
        }
        .om-divider .dline { height:1px; width:80px; background:linear-gradient(to right,transparent,#D4A017); }
        .om-divider .dline.r { background:linear-gradient(to left,transparent,#D4A017); }
        .om-sym { color:#D4A017; font-size:1.5rem; font-family:serif; }

        /* ══ PAGE HERO BANNER (inner pages) ══ */
        .page-hero {
            background:linear-gradient(135deg,#0d001a 0%,#1a0035 40%,#2d0060 70%,#1a0035 100%);
            padding:60px 0 50px; text-align:center; position:relative; overflow:hidden;
        }
        .page-hero::before {
            content:''; position:absolute; inset:0;
            background-image:
                radial-gradient(1px 1px at 15% 20%, rgba(255,255,255,0.6) 0%, transparent 100%),
                radial-gradient(1px 1px at 40% 10%, rgba(255,255,255,0.5) 0%, transparent 100%),
                radial-gradient(1.5px 1.5px at 65% 25%, rgba(255,255,255,0.7) 0%, transparent 100%),
                radial-gradient(1px 1px at 85% 15%, rgba(255,255,255,0.5) 0%, transparent 100%),
                radial-gradient(1px 1px at 25% 70%, rgba(255,255,255,0.4) 0%, transparent 100%),
                radial-gradient(1px 1px at 75% 65%, rgba(255,255,255,0.4) 0%, transparent 100%);
            pointer-events:none;
        }
        .page-hero-title { font-family:'Cinzel',serif; font-size:clamp(1.8rem,4vw,3rem); font-weight:700; color:#fff; margin-bottom:10px; position:relative; }
        .page-hero-title span { color:#D4A017; }
        .page-hero-breadcrumb { color:rgba(255,255,255,0.5); font-size:0.85rem; position:relative; }
        .page-hero-breadcrumb a { color:rgba(212,160,23,0.7); text-decoration:none; }
        .page-hero-breadcrumb a:hover { color:#D4A017; }

        /* ══ WHATSAPP FAB ══ */
        @keyframes wpPulse { 0%{transform:scale(1);opacity:.75;} 70%{transform:scale(1.65);opacity:0;} 100%{transform:scale(1.65);opacity:0;} }
        #wp-fab { position:fixed; bottom:28px; right:24px; z-index:9999; width:58px; height:58px; background:#25D366; border-radius:50%; display:flex; align-items:center; justify-content:center; box-shadow:0 6px 24px rgba(37,211,102,0.5); text-decoration:none; transition:transform 0.25s; }
        #wp-fab:hover { transform:scale(1.1); }
        #wp-fab .pr { position:absolute; inset:0; border-radius:50%; background:rgba(37,211,102,0.4); animation:wpPulse 2s ease-out infinite; }
        #wp-fab i { color:#fff; font-size:1.75rem; position:relative; z-index:1; }
        #scroll-top { position:fixed; bottom:28px; left:24px; z-index:9999; width:44px; height:44px; background:rgba(45,0,96,0.5); border:1px solid rgba(212,160,23,0.4); border-radius:50%; color:#D4A017; font-size:1rem; cursor:pointer; opacity:0; transition:all 0.3s; display:flex; align-items:center; justify-content:center; }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="navbar-inner">
        <a href="/astro/" class="logo-wrap">
            <div class="logo-icon">
                <svg viewBox="0 0 50 50" width="40" height="40" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="25" cy="25" r="22" fill="none" stroke="rgba(255,255,255,0.3)" stroke-width="1.2"/>
                    <circle cx="25" cy="25" r="8" fill="rgba(255,255,255,0.95)"/>
                    <line x1="25" y1="2"  x2="25" y2="10" stroke="#fff" stroke-width="2.5" stroke-linecap="round"/>
                    <line x1="25" y1="40" x2="25" y2="48" stroke="#fff" stroke-width="2.5" stroke-linecap="round"/>
                    <line x1="2"  y1="25" x2="10" y2="25" stroke="#fff" stroke-width="2.5" stroke-linecap="round"/>
                    <line x1="40" y1="25" x2="48" y2="25" stroke="#fff" stroke-width="2.5" stroke-linecap="round"/>
                    <line x1="8.4"  y1="8.4"  x2="13.5" y2="13.5" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/>
                    <line x1="36.5" y1="36.5" x2="41.6" y2="41.6" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/>
                    <line x1="41.6" y1="8.4"  x2="36.5" y2="13.5" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/>
                    <line x1="13.5" y1="36.5" x2="8.4"  y2="41.6" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/>
                    <text x="25" y="30" text-anchor="middle" fill="#c89010" font-size="12" font-family="serif" font-weight="bold">ॐ</text>
                </svg>
            </div>
            <div>
                <div class="logo-name">AstroJyoti</div>
                <div class="logo-sub">Discover Your Destiny</div>
            </div>
        </a>

        <div class="nav-links">
            <a href="/astro/" <?= (!isset($activePage)||$activePage==='home')   ? 'class="active"' : '' ?>>Home</a>
            <a href="/astro/pages/about.php"     <?= (isset($activePage)&&$activePage==='about')    ? 'class="active"' : '' ?>>About</a>
            <a href="/astro/pages/services.php"  <?= (isset($activePage)&&$activePage==='services') ? 'class="active"' : '' ?>>Services <i class="fas fa-caret-down" style="font-size:10px;"></i></a>
            <a href="/astro/pages/horoscope.php" <?= (isset($activePage)&&$activePage==='horoscope')? 'class="active"' : '' ?>>Horoscope</a>
            <a href="/astro/pages/blogs.php"     <?= (isset($activePage)&&$activePage==='blogs')    ? 'class="active"' : '' ?>>Blog</a>
            <a href="/astro/pages/contact.php"   <?= (isset($activePage)&&$activePage==='contact')  ? 'class="active"' : '' ?>>Contact</a>
        </div>

        <a href="/astro/pages/contact.php" class="btn-nav-book">
            <i class="fas fa-calendar-alt" style="font-size:11px;"></i> Book Appointment →
        </a>

        <button class="mob-toggle" id="mobToggle" aria-label="Menu">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    <div class="mob-menu" id="mobMenu">
        <a href="/astro/"                    <?= (!isset($activePage)||$activePage==='home')    ? 'class="active"' : '' ?>>Home</a>
        <a href="/astro/pages/about.php"     <?= (isset($activePage)&&$activePage==='about')    ? 'class="active"' : '' ?>>About</a>
        <a href="/astro/pages/services.php"  <?= (isset($activePage)&&$activePage==='services') ? 'class="active"' : '' ?>>Services</a>
        <a href="/astro/pages/horoscope.php" <?= (isset($activePage)&&$activePage==='horoscope')? 'class="active"' : '' ?>>Horoscope</a>
        <a href="/astro/pages/blogs.php"     <?= (isset($activePage)&&$activePage==='blogs')    ? 'class="active"' : '' ?>>Blog</a>
        <a href="/astro/pages/contact.php"   <?= (isset($activePage)&&$activePage==='contact')  ? 'class="active"' : '' ?>>Contact</a>
        <a href="/astro/pages/contact.php" class="btn-gold" style="justify-content:center;margin-top:6px;">
            <i class="fas fa-calendar-alt"></i> Book Now →
        </a>
    </div>
</nav>
<script>
document.getElementById('mobToggle').addEventListener('click',function(){
    var m=document.getElementById('mobMenu');
    m.style.display = m.style.display==='flex' ? 'none' : 'flex';
});
</script>
