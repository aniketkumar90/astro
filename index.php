<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AstroJyoti — Vedic Astrology & Palm Reading</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700;900&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous"/>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body { font-family: 'Inter', sans-serif; background: #fff; color: #1a0a2e; }

        /* ══ UTILS ══ */
        .container { max-width: 1240px; margin: 0 auto; padding: 0 24px; }
        .text-gold  { color: #D4A017; }
        .text-purple { color: #4a0080; }

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
        .nav-links a { font-size:0.875rem; font-weight:500; color:#333; text-decoration:none; transition:color 0.2s; }
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

        /* ══ HERO — BANNER BG ══ */
        .hero {
            position: relative;
            min-height: 88vh;
            overflow: hidden;
            background: #08000f;
        }
        .hero-bg-img {
            position: absolute; inset: 0;
            background: url('/astro/assets/banner-hero.jpg') center center / cover no-repeat;
            transform: scaleX(-1); /* flip so palm is on right, text readable left */
        }
        /* Dark gradient overlay — heavy on left for text, fades right */
        .hero-overlay {
            position: absolute; inset: 0;
            background:
                linear-gradient(90deg, rgba(5,0,20,0.88) 0%, rgba(5,0,20,0.75) 40%, rgba(5,0,20,0.35) 65%, rgba(5,0,20,0.1) 100%),
                linear-gradient(180deg, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.0) 40%, rgba(0,0,0,0.5) 100%);
        }
        .hero-content {
            position: relative; z-index: 10;
            max-width: 1240px; margin: 0 auto; padding: 0 24px;
            display: flex; align-items: center; min-height: 88vh;
        }
        .hero-left { max-width: 580px; }

        /* Badge */
        .hero-badge {
            display: inline-flex; align-items: center; gap: 10px; margin-bottom: 20px;
        }
        .hero-badge .hline { height: 1px; width: 36px; background: #D4A017; }
        .hero-badge span { font-family:'Cinzel',serif; font-size:0.7rem; letter-spacing:0.18em; color:#D4A017; font-weight:600; text-transform:uppercase; }

        /* Heading */
        .hero-h1 { font-family:'Cinzel',serif; font-weight:700; line-height:1.08; margin-bottom:16px; }
        .hero-h1 .l1 { font-size:clamp(2rem,4vw,3.2rem); color:#fff; display:block; }
        .hero-h1 .l2 { font-size:clamp(2.4rem,5.5vw,4.4rem); color:#D4A017; font-style:italic; display:block; line-height:1.0; }
        .hero-h1 .l3 { font-size:clamp(1.6rem,3.5vw,2.8rem); color:#fff; display:block; }
        .hero-sub  { color:rgba(255,255,255,0.72); font-size:0.98rem; line-height:1.75; max-width:420px; margin-bottom:28px; }

        /* Buttons */
        .hero-btns { display:flex; flex-wrap:wrap; gap:14px; margin-bottom:30px; }
        .btn-gold {
            font-family:'Cinzel',serif; font-size:0.82rem; font-weight:600;
            background:linear-gradient(135deg,#D4A017,#a07010);
            color:#fff; padding:13px 26px; border-radius:50px;
            text-decoration:none; display:inline-flex; align-items:center; gap:8px;
            border:none; cursor:pointer; transition:all 0.3s;
            box-shadow:0 4px 16px rgba(212,160,23,0.4);
        }
        .btn-gold:hover { background:linear-gradient(135deg,#f0c040,#D4A017); box-shadow:0 6px 24px rgba(212,160,23,0.55); }
        .btn-watch-hero {
            font-family:'Cinzel',serif; font-size:0.82rem; font-weight:600;
            background:rgba(0,0,0,0.5); color:#fff; padding:13px 24px; border-radius:50px;
            border:1.5px solid rgba(255,255,255,0.5);
            display:inline-flex; align-items:center; gap:10px; cursor:pointer; transition:all 0.3s;
        }
        .btn-watch-hero:hover { border-color:#fff; background:rgba(0,0,0,0.65); }
        .play-circ {
            width:30px; height:30px; border-radius:50%;
            background:rgba(255,255,255,0.18);
            display:flex; align-items:center; justify-content:center; flex-shrink:0;
        }

        /* Trust */
        .trust-row { display:flex; align-items:center; gap:14px; flex-wrap:wrap; }
        .avatars { display:flex; }
        .av-circ {
            width:36px; height:36px; border-radius:50%;
            border:2px solid rgba(212,160,23,0.6);
            background:linear-gradient(135deg,#2d1057,#4a1a8a);
            display:flex; align-items:center; justify-content:center;
            font-size:11px; font-weight:700; color:#D4A017;
            margin-left:-10px; position:relative;
        }
        .avatars .av-circ:first-child { margin-left:0; }
        .trust-txt { font-size:12.5px; color:rgba(255,255,255,0.7); }
        .stars-sm { display:flex; gap:2px; margin-bottom:3px; }
        .stars-sm i { color:#D4A017; font-size:11px; }

        /* ══ SERVICES — LIGHT CREAM ══ */
        .services-sec { background:#fdf5e8; padding:68px 0; }
        .srv-label {
            display:inline-flex; align-items:center; gap:8px;
            background:linear-gradient(135deg,#4a0080,#2d0060);
            color:#D4A017; font-family:'Cinzel',serif; font-size:0.78rem; font-weight:600;
            letter-spacing:0.1em; padding:8px 20px; border-radius:50px; margin-bottom:14px;
        }
        .srv-label i { color:#D4A017; font-size:0.85rem; }
        .srv-sec-title { font-family:'Cinzel',serif; font-size:clamp(1.5rem,2.5vw,2rem); font-weight:700; color:#2d0060; margin-bottom:8px; }
        .srv-sec-sub   { color:rgba(45,0,96,0.6); font-size:0.9rem; }
        .srv-grid-light { display:grid; grid-template-columns:repeat(5,1fr); gap:16px; margin-top:40px; }
        @media(max-width:1024px){ .srv-grid-light { grid-template-columns:repeat(3,1fr); } }
        @media(max-width:640px){  .srv-grid-light { grid-template-columns:1fr; } }
        .srv-card-light {
            background:#fff; border-radius:16px;
            border:1.5px solid rgba(212,160,23,0.18);
            padding:28px 18px 22px; text-align:center;
            box-shadow:0 4px 20px rgba(74,0,128,0.07);
            text-decoration:none; display:block;
            transition:all 0.3s;
        }
        .srv-card-light:hover { transform:translateY(-6px); box-shadow:0 12px 36px rgba(74,0,128,0.15); border-color:rgba(212,160,23,0.5); }
        .srv-icon-circle {
            width:58px; height:58px; border-radius:50%; margin:0 auto 14px;
            background:linear-gradient(135deg,rgba(74,0,128,0.12),rgba(45,0,96,0.08));
            border:1.5px solid rgba(74,0,128,0.2);
            display:flex; align-items:center; justify-content:center;
        }
        .srv-icon-circle i { color:#4a0080; font-size:1.4rem; }
        .srv-card-title { font-family:'Cinzel',serif; font-size:0.88rem; font-weight:700; color:#2d0060; margin-bottom:7px; }
        .srv-card-desc  { color:rgba(45,0,96,0.55); font-size:11.5px; line-height:1.6; margin-bottom:14px; }
        .srv-card-link  {
            width:30px; height:30px; border-radius:50%; border:1.5px solid #4a0080;
            display:flex; align-items:center; justify-content:center; margin:0 auto;
            color:#4a0080; font-size:12px; transition:all 0.25s;
        }
        .srv-card-light:hover .srv-card-link { background:#4a0080; color:#fff; }

        /* ══ ABOUT — DARK PURPLE ══ */
        .about-sec { background:linear-gradient(135deg,#2d0050,#1a0035,#2d0050); padding:72px 0; }
        .about-grid { display:grid; grid-template-columns:1.1fr 1.2fr 0.9fr; gap:40px; align-items:center; }
        @media(max-width:900px){ .about-grid { grid-template-columns:1fr; } }

        /* About image with play overlay */
        .about-img-box { position:relative; border-radius:18px; overflow:hidden; box-shadow:0 0 50px rgba(212,160,23,0.2); }
        .about-img-box img { width:100%; aspect-ratio:4/3; object-fit:cover; display:block; }
        .play-overlay {
            position:absolute; inset:0; background:rgba(20,0,50,0.4);
            display:flex; align-items:center; justify-content:center;
        }
        .play-btn {
            width:60px; height:60px; border-radius:50%;
            background:rgba(212,160,23,0.9);
            display:flex; align-items:center; justify-content:center;
            box-shadow:0 0 30px rgba(212,160,23,0.5);
            transition:all 0.3s; cursor:pointer;
        }
        .play-btn:hover { background:#D4A017; transform:scale(1.1); }
        .play-btn i { color:#fff; font-size:1.2rem; margin-left:4px; }

        /* About text */
        .about-lotus { font-size:1.6rem; margin-bottom:4px; }
        .about-label { font-family:'Cinzel',serif; font-size:0.85rem; font-weight:600; color:#D4A017; letter-spacing:0.1em; margin-bottom:10px; }
        .about-heading { font-family:'Playfair Display',serif; font-size:clamp(1.5rem,2.5vw,2.1rem); font-style:italic; color:#D4A017; font-weight:700; line-height:1.2; margin-bottom:16px; }
        .about-para { color:rgba(255,255,255,0.65); font-size:0.9rem; line-height:1.85; margin-bottom:22px; }
        .btn-about {
            font-family:'Cinzel',serif; font-size:0.8rem; font-weight:600;
            color:#D4A017; border:1.5px solid #D4A017; background:transparent;
            padding:11px 24px; border-radius:50px; text-decoration:none;
            display:inline-flex; align-items:center; gap:8px; transition:all 0.25s;
        }
        .btn-about:hover { background:rgba(212,160,23,0.1); }

        /* About trust badges */
        .about-badges { display:flex; flex-direction:column; gap:14px; }
        .about-badge {
            display:flex; align-items:center; gap:12px;
            background:rgba(255,255,255,0.05);
            border:1px solid rgba(212,160,23,0.2);
            border-radius:12px; padding:12px 16px;
        }
        .badge-icon {
            width:40px; height:40px; border-radius:50%; flex-shrink:0;
            background:rgba(212,160,23,0.12); border:1px solid rgba(212,160,23,0.3);
            display:flex; align-items:center; justify-content:center;
        }
        .badge-icon i { color:#D4A017; font-size:1rem; }
        .badge-text { color:rgba(255,255,255,0.85); font-size:0.88rem; font-weight:500; }

        /* ══ WHY CHOOSE — LIGHT ══ */
        .why-sec { background:#fdf5e8; padding:68px 0; }
        .why-title  { font-family:'Cinzel',serif; font-size:clamp(1.5rem,2.5vw,2rem); font-weight:700; color:#2d0060; margin-bottom:8px; }
        .why-sub    { color:rgba(45,0,96,0.55); font-size:0.9rem; }
        .why-line   { width:60px; height:3px; background:linear-gradient(90deg,#D4A017,#f0c040); border-radius:2px; margin:14px auto 0; }
        .why-grid   { display:grid; grid-template-columns:repeat(4,1fr); gap:20px; margin-top:44px; }
        @media(max-width:900px){ .why-grid { grid-template-columns:repeat(2,1fr); } }
        @media(max-width:580px){ .why-grid { grid-template-columns:1fr; } }
        .why-card {
            background:#fff; border-radius:16px; padding:28px 20px; text-align:center;
            border:1.5px solid rgba(212,160,23,0.15);
            box-shadow:0 4px 20px rgba(74,0,128,0.07);
            transition:all 0.3s;
        }
        .why-card:hover { transform:translateY(-5px); box-shadow:0 10px 32px rgba(74,0,128,0.14); }
        .why-icon {
            width:60px; height:60px; border-radius:50%; margin:0 auto 16px;
            display:flex; align-items:center; justify-content:center;
        }
        .why-icon i { font-size:1.6rem; }
        .why-card-title { font-family:'Cinzel',serif; font-size:0.9rem; font-weight:700; color:#2d0060; margin-bottom:6px; }
        .why-card-desc  { color:rgba(45,0,96,0.55); font-size:12px; line-height:1.65; }

        /* ══ TESTIMONIALS — LIGHT ══ */
        .testi-sec { background:#fdf5e8; padding:68px 0; }
        .testi-sec-title { font-family:'Cinzel',serif; font-size:clamp(1.5rem,2.5vw,2rem); font-weight:700; color:#2d0060; margin-bottom:6px; }
        .testi-sec-sub   { color:rgba(45,0,96,0.55); font-size:0.9rem; }
        .testi-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:20px; margin-top:44px; }
        @media(max-width:900px){ .testi-grid { grid-template-columns:1fr; } }
        .testi-card-light {
            background:#fff; border-radius:18px; padding:30px 24px;
            border:1.5px solid rgba(212,160,23,0.15);
            box-shadow:0 4px 20px rgba(74,0,128,0.07);
            text-align:center; transition:all 0.3s; position:relative;
        }
        .testi-card-light.featured {
            background:linear-gradient(160deg,#2d0060,#4a0080);
            border-color:rgba(212,160,23,0.4);
            box-shadow:0 8px 40px rgba(74,0,128,0.35);
        }
        .testi-card-light:hover { transform:translateY(-4px); }
        .testi-av {
            width:70px; height:70px; border-radius:50%; margin:0 auto 16px;
            border:3px solid #D4A017;
            background:linear-gradient(135deg,#2d1057,#4a1a8a);
            display:flex; align-items:center; justify-content:center;
            font-size:1.5rem; font-weight:700; color:#D4A017;
            overflow:hidden;
        }
        .testi-av.featured-av { border-color:#D4A017; }
        .testi-quote-light { font-size:0.875rem; line-height:1.75; font-style:italic; margin-bottom:14px; }
        .testi-card-light:not(.featured) .testi-quote-light { color:rgba(45,0,96,0.7); }
        .testi-card-light.featured .testi-quote-light { color:rgba(255,255,255,0.8); }
        .testi-name-light { font-family:'Cinzel',serif; font-weight:700; font-size:0.85rem; }
        .testi-card-light:not(.featured) .testi-name-light { color:#2d0060; }
        .testi-card-light.featured .testi-name-light { color:#D4A017; }
        .testi-stars-light { display:flex; gap:3px; justify-content:center; margin-top:10px; }
        .testi-stars-light i { color:#D4A017; font-size:13px; }
        .testi-dots { display:flex; gap:8px; justify-content:center; margin-top:28px; }
        .testi-dots span { width:10px; height:10px; border-radius:50%; background:rgba(74,0,128,0.25); transition:all 0.3s; cursor:pointer; }
        .testi-dots span.active { background:#D4A017; width:28px; border-radius:5px; }

        /* ══ CTA BANNER ══ */
        .cta-sec {
            position:relative; overflow:hidden; padding:60px 20px;
            background:linear-gradient(135deg,#0d001a 0%,#1a0035 35%,#2d0060 60%,#1a0035 80%,#0d001a 100%);
            border-top:1px solid rgba(212,160,23,0.2);
        }
        /* Lotus decorations */
        .cta-lotus-l { position:absolute; left:16px; top:50%; transform:translateY(-50%); font-size:7rem; opacity:0.25; pointer-events:none; filter:hue-rotate(30deg); }
        .cta-lotus-r { position:absolute; right:16px; top:50%; transform:translateY(-50%) scaleX(-1); font-size:7rem; opacity:0.25; pointer-events:none; filter:hue-rotate(30deg); }
        /* Temple silhouette glow */
        .cta-glow-top { position:absolute; top:0; left:50%; transform:translateX(-50%); width:700px; height:200px; background:radial-gradient(ellipse,rgba(150,60,255,0.28) 0%,transparent 70%); pointer-events:none; }
        .cta-glow-bot { position:absolute; bottom:0; left:50%; transform:translateX(-50%); width:800px; height:150px; background:radial-gradient(ellipse,rgba(212,160,23,0.15) 0%,transparent 70%); pointer-events:none; }
        /* Gold border lines */
        .cta-border-t { position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg,transparent,#D4A017,transparent); }
        .cta-border-b { position:absolute; bottom:0; left:0; right:0; height:2px; background:linear-gradient(90deg,transparent,#D4A017,transparent); }
        .cta-inner { position:relative; z-index:5; max-width:900px; margin:0 auto; display:flex; align-items:center; justify-content:space-between; gap:30px; flex-wrap:wrap; }
        .cta-text h2 { font-family:'Cinzel',serif; font-size:clamp(1.4rem,3vw,2.2rem); font-weight:700; color:#fff; margin-bottom:8px; }
        .cta-text p  { color:rgba(255,255,255,0.65); font-size:0.9rem; }
        .btn-cta-big {
            font-family:'Cinzel',serif; font-size:0.85rem; font-weight:700;
            background:linear-gradient(135deg,#D4A017,#a07010); color:#fff;
            padding:15px 32px; border-radius:50px; text-decoration:none;
            display:inline-flex; align-items:center; gap:9px; white-space:nowrap;
            box-shadow:0 6px 24px rgba(212,160,23,0.45); transition:all 0.3s;
        }
        .btn-cta-big:hover { background:linear-gradient(135deg,#f0c040,#D4A017); box-shadow:0 8px 32px rgba(212,160,23,0.6); }

        /* ══ FOOTER — DARK ══ */
        .footer { background:linear-gradient(165deg,#0d001a,#1a0030,#0d001a); padding:50px 0 0; border-top:2px solid rgba(212,160,23,0.2); }
        .footer-grid { display:grid; grid-template-columns:1.5fr 1fr 1fr 1.3fr; gap:36px; padding-bottom:40px; }
        @media(max-width:900px){ .footer-grid { grid-template-columns:repeat(2,1fr); } }
        @media(max-width:580px){ .footer-grid { grid-template-columns:1fr; } }
        /* Gold corner accents */
        .footer-top-accent { border-top:1px solid rgba(212,160,23,0.15); padding:0; }
        .footer-name { font-family:'Cinzel',serif; font-size:1.1rem; font-weight:700; color:#D4A017; margin-bottom:4px; }
        .footer-tagline { font-family:'Playfair Display',serif; font-size:9.5px; font-style:italic; color:rgba(212,160,23,0.6); margin-bottom:12px; letter-spacing:0.06em; }
        .footer-desc { color:rgba(255,255,255,0.4); font-size:0.85rem; line-height:1.85; }
        .footer-heading { font-family:'Cinzel',serif; font-size:11px; letter-spacing:0.14em; text-transform:uppercase; color:#D4A017; margin-bottom:16px; }
        .footer-link { display:block; color:rgba(255,255,255,0.4); font-size:0.875rem; margin-bottom:8px; text-decoration:none; transition:color 0.2s; }
        .footer-link:hover { color:#D4A017; }
        .social-icons { display:flex; gap:10px; margin-top:16px; }
        .soc-btn {
            width:36px; height:36px; border-radius:50%;
            background:rgba(255,255,255,0.05); border:1px solid rgba(212,160,23,0.2);
            display:flex; align-items:center; justify-content:center;
            color:rgba(255,255,255,0.5); font-size:14px; text-decoration:none; transition:all 0.2s;
        }
        .soc-btn:hover { border-color:#D4A017; color:#D4A017; }
        /* Email subscribe */
        .subscribe-wrap { display:flex; margin-top:14px; border-radius:50px; overflow:hidden; border:1.5px solid rgba(212,160,23,0.3); }
        .subscribe-wrap input {
            flex:1; background:rgba(255,255,255,0.05); border:none; outline:none;
            padding:11px 16px; color:#fff; font-size:0.85rem;
        }
        .subscribe-wrap input::placeholder { color:rgba(255,255,255,0.3); }
        .subscribe-wrap button {
            background:linear-gradient(135deg,#D4A017,#a07010); border:none;
            padding:11px 16px; cursor:pointer; color:#fff; font-size:1rem; transition:all 0.2s;
        }
        .subscribe-wrap button:hover { background:linear-gradient(135deg,#f0c040,#D4A017); }
        /* Footer links bar */
        .footer-links-bar {
            display:flex; flex-wrap:wrap; gap:16px; justify-content:center;
            border-top:1px solid rgba(212,160,23,0.08);
            padding:14px 0; margin-bottom:0;
        }
        .footer-links-bar a { color:rgba(255,255,255,0.35); font-size:12.5px; text-decoration:none; transition:color 0.2s; }
        .footer-links-bar a:hover { color:#D4A017; }
        .footer-links-bar .sep { color:rgba(212,160,23,0.3); }
        /* Bottom copyright */
        .footer-bar {
            border-top:1px solid rgba(212,160,23,0.08); padding:16px 0;
            display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:10px;
        }
        .footer-copy { color:rgba(255,255,255,0.28); font-size:12px; }
        .footer-tagline-bottom { color:rgba(212,160,23,0.5); font-size:12px; font-style:italic; }
        /* Gold border bottom decoration */
        .gold-border-line { height:3px; background:linear-gradient(90deg,transparent,#D4A017,#f0c040,#D4A017,transparent); }

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

<!-- ══════════════ NAVBAR ══════════════ -->
<nav class="navbar">
    <div class="navbar-inner">
        <!-- Logo -->
        <a href="/" class="logo-wrap">
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

        <!-- Desktop nav -->
        <div class="nav-links">
            <a href="/" class="active">Home</a>
            <a href="/astro/pages/about.php">About</a>
            <a href="/astro/pages/services.php">Services <i class="fas fa-caret-down" style="font-size:10px;"></i></a>
            <a href="#gallery">Gallery</a>
            <a href="#testimonials">Testimonials</a>
            <a href="/astro/pages/blogs.php">Blog</a>
            <a href="/astro/pages/contact.php">Contact</a>
        </div>
        <a href="/astro/pages/contact.php" class="btn-nav-book">
            <i class="fas fa-calendar-alt" style="font-size:11px;"></i> Book Appointment →
        </a>
        <button class="mob-toggle" id="mobToggle"><i class="fas fa-bars"></i></button>
    </div>
    <div class="mob-menu" id="mobMenu">
        <a href="/" class="active">Home</a>
        <a href="/astro/pages/about.php">About</a>
        <a href="/astro/pages/services.php">Services</a>
        <a href="#testimonials">Testimonials</a>
        <a href="/astro/pages/blogs.php">Blog</a>
        <a href="/astro/pages/contact.php">Contact</a>
        <a href="/astro/pages/contact.php" class="btn-gold" style="justify-content:center;margin-top:6px;">
            <i class="fas fa-calendar-alt"></i> Book Appointment →
        </a>
    </div>
</nav>
<script>
document.getElementById('mobToggle').addEventListener('click',function(){
    var m=document.getElementById('mobMenu');
    m.style.display = m.style.display==='flex' ? 'none' : 'flex';
});
</script>

<!-- ══════════════ HERO — BANNER BG ══════════════ -->
<section class="hero">
    <div class="hero-bg-img"></div>
    <div class="hero-overlay"></div>

    <div class="hero-content">
        <div class="hero-left">

            <!-- Badge -->
            <div class="hero-badge">
                <div class="hline"></div>
                <span>Ancient Wisdom &bull; Modern Guidance</span>
                <div class="hline"></div>
            </div>

            <!-- H1 -->
            <h1 class="hero-h1">
                <span class="l1">Get Expert</span>
                <span class="l2">Palm Reading &amp;</span>
                <span class="l3">Astrology Guidance</span>
            </h1>

            <p class="hero-sub">
                Discover the secrets of your life through the ancient wisdom of astrology and palmistry.
            </p>

            <!-- Buttons -->
            <div class="hero-btns">
                <a href="/astro/pages/contact.php" class="btn-gold">
                    <i class="fas fa-calendar-alt"></i> Book Appointment →
                </a>
                <button class="btn-watch-hero">
                    <span class="play-circ"><i class="fas fa-play" style="font-size:10px;margin-left:2px;"></i></span>
                    Watch Video
                </button>
            </div>

            <!-- Trust row -->
            <div class="trust-row">
                <div class="avatars">
                    <?php
                    $avc = ['#2d1057','#3d1575','#4a1a8a','#1a0a35','#5a2a9a'];
                    $avl = ['P','S','A','R','M'];
                    foreach($avl as $i=>$l): ?>
                    <div class="av-circ" style="background:<?= $avc[$i] ?>;z-index:<?= 5-$i ?>;"><?= $l ?></div>
                    <?php endforeach; ?>
                </div>
                <div>
                    <div class="stars-sm">
                        <?php for($i=0;$i<5;$i++): ?><i class="fas fa-star"></i><?php endfor; ?>
                    </div>
                    <div class="trust-txt">Trusted by 50,000+ Happy Clients</div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ══════════════ SERVICES — LIGHT CREAM ══════════════ -->
<section class="services-sec">
    <div class="container" style="text-align:center;">
        <div class="srv-label">
            <i class="fas fa-star"></i> Our Services
        </div>
        <h2 class="srv-sec-title">Choose from our specialized astrology and palmistry services</h2>
    </div>

    <div class="container">
        <div class="srv-grid-light">
            <?php
            $services = [
                ['fa-hand-paper',  'Palm Reading',       'Know your potential, strengths & challenges',    'palm-reading'],
                ['fa-scroll',       'Kundli Analysis',    'Understand your birth chart in detail',          'kundli-analysis'],
                ['fa-yin-yang',     'Horoscope Reading',  'Get insights about your future',                 'kundli-analysis'],
                ['fa-heart',        'Love & Relationship','Find harmony in your relationships',             'marriage-matching'],
                ['fa-briefcase',    'Career Guidance',    'Choose the right path for your career',         'kundli-analysis'],
            ];
            foreach($services as [$icon,$title,$desc,$slug]): ?>
            <a href="/astro/pages/services.php?service=<?= $slug ?>" class="srv-card-light">
                <div class="srv-icon-circle">
                    <i class="fas <?= $icon ?>"></i>
                </div>
                <div class="srv-card-title"><?= $title ?></div>
                <div class="srv-card-desc"><?= $desc ?></div>
                <div class="srv-card-link"><i class="fas fa-arrow-right"></i></div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ══════════════ ABOUT — DARK PURPLE ══════════════ -->
<section class="about-sec">
    <div class="container">
        <div class="about-grid">

            <!-- Col 1: Image with play button -->
            <div class="about-img-box">
                <img src="/astro/assets/WhatsApp Image 2026-11-06 2at 2.39.56 PM.jpeg"
                     alt="About AstroJyoti"
                     onerror="this.closest('.about-img-box').style.minHeight='280px';this.closest('.about-img-box').style.background='linear-gradient(135deg,#1a0a35,#2d1057)';this.style.display='none';">
                <div class="play-overlay">
                    <div class="play-btn"><i class="fas fa-play"></i></div>
                </div>
            </div>

            <!-- Col 2: Text -->
            <div>
                <div class="about-lotus">🪷</div>
                <div class="about-label">About AstroJyoti</div>
                <h2 class="about-heading">Ancient Wisdom...<br>Modern Guidance...</h2>
                <p class="about-para">
                    At AstroJyoti, we bring the powerful knowledge of Vedic astrology and palmistry to help you make better decisions in life. Our expert astrologer provides accurate and personalized readings to guide you towards happiness, success and peace.
                </p>
                <a href="/astro/pages/about.php" class="btn-about">Know More About Us →</a>
            </div>

            <!-- Col 3: Trust badges -->
            <div class="about-badges">
                <?php
                $badges = [
                    ['fa-shield-alt','100% Accurate Readings'],
                    ['fa-lock',      'Complete Privacy'],
                    ['fa-star',      'Trusted by Thousands'],
                    ['fa-headset',   'Personalized Guidance'],
                ];
                foreach($badges as [$ic,$lbl]): ?>
                <div class="about-badge">
                    <div class="badge-icon"><i class="fas <?= $ic ?>"></i></div>
                    <span class="badge-text"><?= $lbl ?></span>
                </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</section>

<!-- ══════════════ WHY CHOOSE — LIGHT ══════════════ -->
<section class="why-sec">
    <div class="container" style="text-align:center;">
        <h2 class="why-title">Why Choose AstroJyoti?</h2>
        <p class="why-sub">Your trusted partner for a brighter future</p>
        <div class="why-line"></div>

        <div class="why-grid">
            <?php
            $why = [
                ['fa-shield-alt', 'linear-gradient(135deg,rgba(74,0,128,0.12),rgba(45,0,96,0.08))', '#4a0080', '100% Confidential & Secure',      'Your data and consultations are always private.'],
                ['fa-bolt',       'linear-gradient(135deg,rgba(212,160,23,0.12),rgba(160,112,16,0.08))', '#c89010', 'Instant Guidance & Support',       'Get answers anytime, anywhere.'],
                ['fa-user-tie',   'linear-gradient(135deg,rgba(74,0,128,0.12),rgba(45,0,96,0.08))', '#4a0080', 'Expert Astrologer with 15+ Yrs Exp.','Seasoned expert in Vedic astrology.'],
                ['fa-heart',      'linear-gradient(135deg,rgba(212,160,23,0.12),rgba(160,112,16,0.08))', '#c89010', 'Positive Results & Happy Clients',  'Thousands of success stories.'],
            ];
            foreach($why as [$ic,$bg,$clr,$title,$desc]): ?>
            <div class="why-card">
                <div class="why-icon" style="background:<?= $bg ?>;">
                    <i class="fas <?= $ic ?>" style="color:<?= $clr ?>;"></i>
                </div>
                <div class="why-card-title"><?= $title ?></div>
                <div class="why-card-desc"><?= $desc ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ══════════════ TESTIMONIALS ══════════════ -->
<?php
require_once __DIR__ . '/config/database.php';
$db  = getDB();
$res = $db->query("SELECT * FROM testimonials ORDER BY id ASC LIMIT 3");
$testimonials = [];
if ($res) while ($row = $res->fetch_assoc()) $testimonials[] = $row;
if (empty($testimonials)) {
    $testimonials = [
        ['name'=>'Priya Sharma', 'location'=>'Mumbai',    'rating'=>5, 'review'=>'AstroJyoti really helped me with my career confusion. The palm reading was so accurate!'],
        ['name'=>'Rahul Verma',  'location'=>'Delhi',     'rating'=>5, 'review'=>'Very professional and insightful experience. Highly recommended!'],
        ['name'=>'Neha Singh',   'location'=>'Bangalore', 'rating'=>5, 'review'=>'Amazing guidance and positive energy. My life has changed for the better.'],
    ];
}
?>
<section class="testi-sec" id="testimonials">
    <div class="container" style="text-align:center;">
        <h2 class="testi-sec-title">What Our Clients Say</h2>
        <p class="testi-sec-sub">Real People. Real Experiences.</p>
        <div class="why-line"></div>

        <div class="testi-grid">
            <?php foreach($testimonials as $idx => $t): $featured = ($idx === 1); ?>
            <div class="testi-card-light <?= $featured ? 'featured' : '' ?>">
                <div class="testi-av <?= $featured ? 'featured-av' : '' ?>">
                    <?= strtoupper(substr($t['name'],0,1)) ?>
                </div>
                <p class="testi-quote-light">
                    "<?= htmlspecialchars(mb_substr($t['review'],0,140)) ?><?= mb_strlen($t['review'])>140?'...':'' ?>"
                </p>
                <div class="testi-name-light">— <?= htmlspecialchars($t['name']) ?></div>
                <div class="testi-stars-light">
                    <?php for($i=0;$i<intval($t['rating']??5);$i++): ?>
                    <i class="fas fa-star"></i>
                    <?php endfor; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Dots indicator -->
        <div class="testi-dots">
            <span class="active"></span>
            <span></span>
            <span></span>
        </div>

        <?php $db->close(); ?>
    </div>
</section>

<!-- ══════════════ CTA BANNER ══════════════ -->
<section class="cta-sec">
    <div class="cta-border-t"></div>
    <div class="cta-border-b"></div>
    <div class="cta-lotus-l">🪷</div>
    <div class="cta-lotus-r">🪷</div>
    <div class="cta-glow-top"></div>
    <div class="cta-glow-bot"></div>

    <div class="container">
        <div class="cta-inner">
            <div class="cta-text">
                <h2>Ready to Discover Your Destiny?</h2>
                <p>Book your personal astrology or palm reading session today!</p>
            </div>
            <a href="/astro/pages/contact.php" class="btn-cta-big">
                <i class="fas fa-calendar-alt"></i> Book Appointment Now →
            </a>
        </div>
    </div>
</section>

<!-- ══════════════ FOOTER ══════════════ -->
<div class="gold-border-line"></div>
<footer class="footer">
    <div class="container">
        <div class="footer-grid">

            <!-- Brand -->
            <div>
                <div style="display:flex;align-items:center;gap:10px;margin-bottom:4px;">
                    <div style="width:38px;height:38px;background:linear-gradient(135deg,#e8b820,#c89010);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <span style="color:#fff;font-family:serif;font-size:1rem;font-weight:700;">ॐ</span>
                    </div>
                    <div>
                        <div class="footer-name">AstroJyoti</div>
                        <div class="footer-tagline">Discover Your Destiny</div>
                    </div>
                </div>
                <p class="footer-desc" style="margin-top:12px;">Ancient Vedic wisdom for the modern soul. Personalized guidance for life's most important questions.</p>
            </div>

            <!-- Quick Links -->
            <div>
                <div class="footer-heading">Quick Links</div>
                <?php foreach(['Home'=>'/','About'=>'/astro/pages/about.php','Services'=>'/astro/pages/services.php','Gallery'=>'#gallery','Testimonials'=>'#testimonials','Contact'=>'/astro/pages/contact.php'] as $lbl=>$href): ?>
                <a href="<?= $href ?>" class="footer-link"><?= $lbl ?></a>
                <?php endforeach; ?>
            </div>

            <!-- Follow Us -->
            <div>
                <div class="footer-heading">Follow Us</div>
                <p style="color:rgba(255,255,255,0.4);font-size:0.85rem;margin-bottom:4px;">Stay connected for daily astrology updates</p>
                <div class="social-icons">
                    <?php foreach([
                        ['fab fa-facebook-f','#1877F2'],
                        ['fab fa-youtube',   '#FF0000'],
                        ['fab fa-instagram', '#E4405F'],
                        ['fab fa-whatsapp',  '#25D366'],
                        ['fab fa-twitter',   '#1DA1F2'],
                    ] as [$ic,$col]): ?>
                    <a href="#" class="soc-btn" onmouseover="this.style.borderColor='<?= $col ?>';this.style.color='<?= $col ?>';" onmouseout="this.style.borderColor='rgba(212,160,23,0.2)';this.style.color='rgba(255,255,255,0.5)';">
                        <i class="<?= $ic ?>"></i>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Subscribe -->
            <div>
                <div class="footer-heading">Subscribe for Updates</div>
                <p style="color:rgba(255,255,255,0.4);font-size:0.85rem;margin-bottom:14px;">Get daily horoscope & astrology tips</p>
                <div class="subscribe-wrap">
                    <input type="email" placeholder="Enter your email address">
                    <button type="button" title="Subscribe"><i class="fas fa-paper-plane"></i></button>
                </div>
            </div>

        </div>

        <!-- Quick links bar -->
        <div class="footer-links-bar">
            <?php $flinks = ['Home'=>'/','About'=>'/astro/pages/about.php','Services'=>'/astro/pages/services.php','Gallery'=>'#','Testimonials'=>'#testimonials','Contact'=>'/astro/pages/contact.php']; ?>
            <?php $i=0; foreach($flinks as $l=>$h): ?>
            <?php if($i>0): ?><span class="sep">|</span><?php endif; ?>
            <a href="<?= $h ?>"><?= $l ?></a>
            <?php $i++; endforeach; ?>
        </div>

        <!-- Bottom bar -->
        <div class="footer-bar">
            <span class="footer-copy">© <?= date('Y') ?> AstroJyoti. All Rights Reserved.</span>
            <span class="footer-tagline-bottom">✦ Empowering Lives Through Astrology ✦</span>
        </div>
    </div>
</footer>
<div class="gold-border-line"></div>

<!-- ══ WHATSAPP FAB ══ -->
<a href="https://wa.me/919999999999" target="_blank" id="wp-fab" aria-label="WhatsApp">
    <span class="pr"></span>
    <i class="fab fa-whatsapp"></i>
</a>
<button id="scroll-top" onclick="window.scrollTo({top:0,behavior:'smooth'})" aria-label="Top">
    <i class="fas fa-chevron-up"></i>
</button>
<script>
window.addEventListener('scroll',function(){
    var b=document.getElementById('scroll-top');
    var s=window.scrollY>400;
    b.style.opacity=s?'1':'0';
    b.style.pointerEvents=s?'auto':'none';
});
</script>

</body>
</html>
