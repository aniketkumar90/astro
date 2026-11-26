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
/* ════════════════════════════════════════
   RESET & BASE
════════════════════════════════════════ */
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}
html{scroll-behavior:smooth;}
body{font-family:'Inter',sans-serif;background:#fdf5e8;color:#1a0a2e;overflow-x:hidden;}
img{display:block;max-width:100%;}
a{text-decoration:none;}
.container{max-width:1200px;margin:0 auto;padding:0 24px;}

/* ════════════════════════════════════════
   ① NAVBAR — WHITE
════════════════════════════════════════ */
.navbar{
    background: transparent;
    border-bottom: 1px solid rgba(212,160,23,0.15);
    position: absolute;
    top: 0; left: 0; right: 0;
    z-index: 1000;
    transition: background 0.4s, box-shadow 0.4s;
}
/* Scrolled state — becomes solid white */
.navbar.scrolled{
    background: rgba(255,255,255,0.97);
    border-bottom: 1px solid #ede5d0;
    box-shadow: 0 2px 16px rgba(0,0,0,0.1);
    position: fixed;
}
.navbar.scrolled .nav-links a      { color:#2a2a2a; }
.navbar.scrolled .nav-links a:hover{ color:#c89010; }
.navbar.scrolled .logo-name        { color:#c89010; }
.navbar.scrolled .logo-tag         { color:#a07010; }
.navbar.scrolled .mob-btn          { color:#c89010; }
.navbar.scrolled .nav-btn          { color:#c89010; border-color:#c89010; }
.navbar.scrolled .mob-nav          { background:#fff; }
.nav-inner{
    max-width:1200px;margin:0 auto;padding:0 24px;
    display:flex;align-items:center;justify-content:space-between;height:70px;
}
/* Logo */
.logo{display:flex;align-items:center;gap:10px;text-decoration:none;}
.logo-sun{
    width:50px;height:50px;border-radius:50%;flex-shrink:0;
    background:linear-gradient(135deg,#f0c040,#c89010);
    display:flex;align-items:center;justify-content:center;
    box-shadow:0 2px 14px rgba(212,160,23,0.5);
}
/* Transparent state — white/gold text on dark banner */
.logo-name{font-family:'Cinzel',serif;font-size:1.12rem;font-weight:700;color:#D4A017;letter-spacing:0.03em;line-height:1.1;}
.logo-tag {font-family:'Playfair Display',serif;font-size:9.5px;font-style:italic;color:rgba(212,160,23,0.75);letter-spacing:0.07em;}
/* Nav links — white on dark hero */
.nav-links{display:flex;align-items:center;gap:22px;}
.nav-links a{font-size:0.875rem;font-weight:500;color:rgba(255,255,255,0.88);transition:color 0.2s;}
.nav-links a:hover{color:#D4A017;}
.nav-links a.active{
    background:#D4A017;color:#fff!important;
    padding:7px 20px;border-radius:50px;font-weight:600;
}
.nav-links .has-arrow{display:flex;align-items:center;gap:4px;}
/* Book btn — gold outline, white text */
.nav-btn{
    font-family:'Cinzel',serif;font-size:0.78rem;font-weight:600;
    color:#D4A017;border:1.5px solid #D4A017;background:transparent;
    padding:9px 18px;border-radius:50px;white-space:nowrap;
    display:inline-flex;align-items:center;gap:7px;transition:all 0.25s;
}
.nav-btn:hover{background:rgba(212,160,23,0.15);}
/* Mobile */
.mob-btn{display:none;background:none;border:none;color:#D4A017;font-size:1.4rem;cursor:pointer;}
.mob-nav{
    display:none;flex-direction:column;gap:10px;padding:14px 24px 18px;
    background:rgba(10,0,25,0.96);border-top:1px solid rgba(212,160,23,0.2);
}
.mob-nav a{color:rgba(255,255,255,0.85);font-size:0.95rem;padding:4px 0;font-weight:500;}
.mob-nav a:hover{color:#D4A017;}
.mob-nav a.active{color:#D4A017;font-weight:700;}
@media(max-width:1024px){
    .nav-links,.nav-btn{display:none;}
    .mob-btn{display:block;}
}

/* ════════════════════════════════════════
   ② HERO — BANNER BACKGROUND
════════════════════════════════════════ */
.hero{
    position:relative;
    min-height:100vh; /* full viewport since navbar is now absolute over it */
    overflow:visible;
    background:#0d0010;
}
/* Banner image — natural orientation, palm on right */
.hero-bg{
    position:absolute;inset:0;
    background:url('/astro/assets/banner-hero.jpg') center center/cover no-repeat;
    /* NO mirror — image is correct as-is */
}
/* Gradient overlay: left-heavy for text readability */
.hero-ov{
    position:absolute;inset:0;
    background:
        linear-gradient(90deg,
            rgba(6,0,16,0.90) 0%,
            rgba(6,0,16,0.75) 35%,
            rgba(6,0,16,0.35) 58%,
            rgba(6,0,16,0.05) 76%,
            transparent 100%),
        linear-gradient(180deg,
            rgba(0,0,0,0.20) 0%,
            transparent 25%,
            transparent 65%,
            rgba(0,0,0,0.30) 100%);
}
/* ── WAVE bottom transition into cream services ── */
.hero-wave{
    position:absolute;
    bottom:-2px; left:0; right:0;
    z-index:20;
    line-height:0;
}
.hero-wave svg{ display:block; width:100%; height:80px; }
.hero-wrap{
    position:relative;z-index:10;
    max-width:1200px;margin:0 auto;padding:0 24px;
    display:flex;align-items:center;min-height:100vh;
    padding-top:70px;    /* navbar height */
    padding-bottom:90px; /* wave height */
}
.hero-content{max-width:560px;}
/* Badge */
.h-badge{display:inline-flex;align-items:center;gap:10px;margin-bottom:22px;}
.h-badge .hl{height:1px;width:36px;background:#D4A017;}
.h-badge span{font-family:'Cinzel',serif;font-size:0.7rem;letter-spacing:0.17em;color:#D4A017;font-weight:600;text-transform:uppercase;}
/* H1 */
.hero h1{font-family:'Cinzel',serif;font-weight:700;line-height:1.08;margin-bottom:16px;}
.hero h1 .w{font-size:clamp(2rem,4vw,3.3rem);color:#fff;display:block;}
.hero h1 .g{font-size:clamp(2.5rem,5.5vw,4.3rem);color:#D4A017;font-style:italic;display:block;line-height:1.0;}
/* Sub */
.hero-sub{color:rgba(255,255,255,0.68);font-size:0.98rem;line-height:1.75;max-width:420px;margin-bottom:28px;}
/* Buttons */
.hero-btns{display:flex;flex-wrap:wrap;gap:14px;margin-bottom:30px;}
.btn-gold{
    font-family:'Cinzel',serif;font-size:0.82rem;font-weight:600;
    background:linear-gradient(135deg,#D4A017,#a07010);
    color:#fff;padding:13px 26px;border-radius:50px;
    display:inline-flex;align-items:center;gap:8px;border:none;cursor:pointer;
    box-shadow:0 4px 18px rgba(212,160,23,0.45);transition:all 0.3s;
}
.btn-gold:hover{background:linear-gradient(135deg,#f0c040,#D4A017);box-shadow:0 6px 26px rgba(212,160,23,0.6);}
.btn-watch{
    font-family:'Cinzel',serif;font-size:0.82rem;font-weight:600;
    background:rgba(0,0,0,0.5);color:#fff;padding:13px 24px;border-radius:50px;
    border:1.5px solid rgba(255,255,255,0.5);
    display:inline-flex;align-items:center;gap:10px;cursor:pointer;transition:all 0.3s;
}
.btn-watch:hover{border-color:#fff;background:rgba(0,0,0,0.7);}
.play-c{
    width:30px;height:30px;border-radius:50%;background:rgba(255,255,255,0.18);
    display:flex;align-items:center;justify-content:center;flex-shrink:0;
}
/* Trust row */
.trust-row{display:flex;align-items:center;gap:14px;flex-wrap:wrap;}
.avs{display:flex;}
.av{
    width:36px;height:36px;border-radius:50%;
    border:2px solid rgba(212,160,23,0.55);
    background:linear-gradient(135deg,#2d1057,#4a1a8a);
    display:flex;align-items:center;justify-content:center;
    font-size:11px;font-weight:700;color:#D4A017;
    margin-left:-10px;position:relative;
}
.avs .av:first-child{margin-left:0;}
.av img{width:100%;height:100%;object-fit:cover;border-radius:50%;}
.trust-txt{font-size:12.5px;color:rgba(255,255,255,0.7);}
.s5{display:flex;gap:2px;margin-bottom:3px;}
.s5 i{color:#D4A017;font-size:11.5px;}

/* ════════════════════════════════════════
   ③ SERVICES — LIGHT CREAM
════════════════════════════════════════ */
.srv-sec{background:#faebd7;padding:20px 0 68px;}
/* gold divider lines */
.divider-line{display:flex;align-items:center;justify-content:center;gap:0;margin-bottom:6px;}
.divider-line .dl{height:1px;flex:1;max-width:100px;background:linear-gradient(to right,transparent,#c8a04a);}
.divider-line .dl.r{background:linear-gradient(to left,transparent,#c8a04a);}
.divider-line .dot{width:6px;height:6px;border-radius:50%;background:#c8a04a;margin:0 8px;}

.srv-pill{
    display:inline-flex;align-items:center;gap:8px;
    background:linear-gradient(135deg,#4a0080,#2d0060);
    color:#D4A017;font-family:'Cinzel',serif;font-size:0.78rem;font-weight:600;
    letter-spacing:0.1em;padding:8px 22px;border-radius:50px;margin-bottom:12px;
}
.srv-pill i{font-size:0.75rem;}
.sec-title-dark{font-family:'Cinzel',serif;font-size:clamp(0.9rem,2vw,1.1rem);font-weight:600;color:#3d0060;margin-bottom:4px;}
.sec-sub-dark{color:rgba(60,0,100,0.55);font-size:0.88rem;}

.srv-cards{display:grid;grid-template-columns:repeat(5,1fr);gap:14px;margin-top:36px;}
@media(max-width:1024px){.srv-cards{grid-template-columns:repeat(3,1fr);}}
@media(max-width:600px){.srv-cards{grid-template-columns:1fr;}}
.srv-card{
    background:#fff;border-radius:16px;padding:26px 16px 20px;text-align:center;
    border:1.5px solid rgba(212,160,23,0.15);
    box-shadow:0 4px 20px rgba(74,0,128,0.07);
    transition:all 0.3s;
}
.srv-card:hover{transform:translateY(-6px);box-shadow:0 12px 36px rgba(74,0,128,0.15);border-color:rgba(212,160,23,0.4);}
.srv-ic{
    width:58px;height:58px;border-radius:50%;margin:0 auto 14px;
    background:linear-gradient(135deg,rgba(74,0,128,0.1),rgba(45,0,96,0.06));
    border:1.5px solid rgba(74,0,128,0.18);
    display:flex;align-items:center;justify-content:center;
}
.srv-ic i{color:#4a0080;font-size:1.4rem;}
.srv-t{font-family:'Cinzel',serif;font-size:0.85rem;font-weight:700;color:#2d0060;margin-bottom:7px;}
.srv-d{color:rgba(45,0,96,0.5);font-size:11px;line-height:1.6;margin-bottom:14px;}
.srv-arr{
    width:28px;height:28px;border-radius:50%;border:1.5px solid #4a0080;
    display:flex;align-items:center;justify-content:center;margin:0 auto;
    color:#4a0080;font-size:11px;transition:all 0.25s;
}
.srv-card:hover .srv-arr{background:#4a0080;color:#fff;}

/* ════════════════════════════════════════
   ④ ABOUT — DARK PURPLE
════════════════════════════════════════ */
.about-sec{
    background:linear-gradient(140deg,#2a0048 0%,#1c0036 40%,#2a0050 70%,#1c0036 100%);
    padding:72px 0;
}
.about-g{display:grid;grid-template-columns:1.05fr 1.2fr 0.95fr;gap:38px;align-items:center;}
@media(max-width:900px){.about-g{grid-template-columns:1fr;}}

/* About image */
.about-img-box{
    border-radius:18px;overflow:hidden;position:relative;
    box-shadow:0 0 60px rgba(212,160,23,0.18);
    border:1px solid rgba(212,160,23,0.25);
}
.about-img-box img{width:100%;aspect-ratio:4/3;object-fit:cover;}
.play-ov{
    position:absolute;inset:0;background:rgba(15,0,40,0.38);
    display:flex;align-items:center;justify-content:center;
}
.play-btn{
    width:58px;height:58px;border-radius:50%;background:rgba(212,160,23,0.88);
    display:flex;align-items:center;justify-content:center;
    box-shadow:0 0 28px rgba(212,160,23,0.55);transition:all 0.3s;cursor:pointer;
}
.play-btn:hover{background:#D4A017;transform:scale(1.1);}
.play-btn i{color:#fff;font-size:1.2rem;margin-left:4px;}

/* About text */
.about-lotus{font-size:1.5rem;margin-bottom:5px;}
.about-label{font-family:'Cinzel',serif;font-size:0.82rem;font-weight:600;color:#D4A017;letter-spacing:0.08em;margin-bottom:10px;}
.about-h2{font-family:'Playfair Display',serif;font-size:clamp(1.5rem,2.5vw,2.1rem);font-style:italic;color:#D4A017;font-weight:700;line-height:1.2;margin-bottom:16px;}
.about-p{color:rgba(255,255,255,0.62);font-size:0.88rem;line-height:1.85;margin-bottom:22px;}
.btn-outline-gold{
    font-family:'Cinzel',serif;font-size:0.8rem;font-weight:600;
    color:#D4A017;border:1.5px solid #D4A017;background:transparent;
    padding:11px 24px;border-radius:50px;
    display:inline-flex;align-items:center;gap:8px;transition:all 0.25s;
}
.btn-outline-gold:hover{background:rgba(212,160,23,0.1);}

/* About badges */
.about-badges{display:flex;flex-direction:column;gap:14px;}
.a-badge{
    display:flex;align-items:center;gap:12px;
    background:rgba(255,255,255,0.045);
    border:1px solid rgba(212,160,23,0.18);
    border-radius:12px;padding:12px 16px;
}
.a-badge-ic{
    width:40px;height:40px;border-radius:50%;flex-shrink:0;
    display:flex;align-items:center;justify-content:center;
}
.a-badge-txt{color:rgba(255,255,255,0.85);font-size:0.87rem;font-weight:500;}

/* ════════════════════════════════════════
   ⑤ WHY CHOOSE — CREAM
════════════════════════════════════════ */
.why-sec{background:#faebd7;padding:64px 0;}
/* horizontal divider with text */
.h-divider{display:flex;align-items:center;gap:14px;justify-content:center;margin-bottom:8px;}
.h-divider .hl{height:1px;width:80px;background:linear-gradient(to right,transparent,#c8a04a);}
.h-divider .hl.r{background:linear-gradient(to left,transparent,#c8a04a);}
.h-divider span{font-family:'Cinzel',serif;font-size:clamp(1.2rem,2.5vw,1.7rem);font-weight:700;color:#2d0060;white-space:nowrap;}
.why-sub{color:rgba(45,0,96,0.55);font-size:0.88rem;text-align:center;margin-bottom:40px;}

.why-cards{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;}
@media(max-width:900px){.why-cards{grid-template-columns:repeat(2,1fr);}}
@media(max-width:580px){.why-cards{grid-template-columns:1fr;}}
.why-card{
    background:#fff;border-radius:16px;padding:26px 20px;
    border:1.5px solid rgba(212,160,23,0.14);
    box-shadow:0 4px 18px rgba(74,0,128,0.07);
    display:flex;align-items:center;gap:16px;
    transition:all 0.3s;
}
.why-card:hover{transform:translateY(-4px);box-shadow:0 10px 30px rgba(74,0,128,0.14);}
.why-ic{
    width:52px;height:52px;border-radius:50%;flex-shrink:0;
    display:flex;align-items:center;justify-content:center;
}
.why-ic i{font-size:1.4rem;}
.why-title{font-family:'Cinzel',serif;font-size:0.82rem;font-weight:700;color:#2d0060;line-height:1.3;}

/* ════════════════════════════════════════
   ⑥ TESTIMONIALS — CREAM
════════════════════════════════════════ */
.testi-sec{background:#faebd7;padding:64px 0;}
.testi-g{
    display:grid;grid-template-columns:1fr 1.1fr 1fr;gap:18px;
    margin-top:40px;align-items:center;
}
@media(max-width:900px){.testi-g{grid-template-columns:1fr;}}
.testi-nav{display:flex;align-items:center;justify-content:space-between;position:relative;}
.testi-arrow{
    width:40px;height:40px;border-radius:50%;background:#fff;
    border:1.5px solid rgba(74,0,128,0.2);color:#4a0080;
    display:flex;align-items:center;justify-content:center;font-size:0.9rem;
    cursor:pointer;transition:all 0.25s;flex-shrink:0;
    box-shadow:0 2px 10px rgba(74,0,128,0.1);
}
.testi-arrow:hover{background:#4a0080;color:#fff;border-color:#4a0080;}

/* Testi cards */
.tc{
    background:#fff;border-radius:18px;padding:28px 22px;
    border:1.5px solid rgba(212,160,23,0.14);
    box-shadow:0 4px 20px rgba(74,0,128,0.07);
    text-align:center;position:relative;
}
.tc.featured{
    background:linear-gradient(160deg,#2d0060,#4a0080);
    border-color:rgba(212,160,23,0.35);
    box-shadow:0 8px 40px rgba(74,0,128,0.35);
    transform:scale(1.03);
}
.tc-av{
    width:72px;height:72px;border-radius:50%;margin:0 auto 14px;
    border:3px solid #D4A017;overflow:hidden;
    background:linear-gradient(135deg,#2d1057,#4a1a8a);
    display:flex;align-items:center;justify-content:center;
    font-size:1.6rem;font-weight:700;color:#D4A017;
}
.tc.featured .tc-av{box-shadow:0 0 20px rgba(212,160,23,0.4);}
.tc-quote{font-size:0.86rem;line-height:1.75;font-style:italic;margin-bottom:12px;}
.tc:not(.featured) .tc-quote{color:rgba(45,0,96,0.65);}
.tc.featured      .tc-quote{color:rgba(255,255,255,0.8);}
.tc-name{font-family:'Cinzel',serif;font-weight:700;font-size:0.85rem;}
.tc:not(.featured) .tc-name{color:#2d0060;}
.tc.featured      .tc-name{color:#D4A017;}
.tc-stars{display:flex;gap:3px;justify-content:center;margin-top:10px;}
.tc-stars i{color:#D4A017;font-size:13px;}
/* Dots */
.testi-dots{display:flex;gap:8px;justify-content:center;margin-top:26px;}
.testi-dots span{width:10px;height:10px;border-radius:50%;background:rgba(74,0,128,0.22);cursor:pointer;transition:all 0.3s;}
.testi-dots span.on{background:#D4A017;width:28px;border-radius:5px;}

/* ════════════════════════════════════════
   ⑦ CTA BANNER — DARK TEMPLE SCENE
════════════════════════════════════════ */
.cta-sec{
    position:relative;overflow:hidden;
    background:linear-gradient(135deg,#0d001a 0%,#1a0030 25%,#2d0055 50%,#1a0030 75%,#0d001a 100%);
    border-top:2px solid rgba(212,160,23,0.25);
    border-bottom:2px solid rgba(212,160,23,0.25);
    padding:50px 0;
}
/* Gold border lines top/bottom */
.cta-sec::before,.cta-sec::after{
    content:'';position:absolute;left:0;right:0;height:1px;
    background:linear-gradient(90deg,transparent,#D4A017 20%,#f0c040 50%,#D4A017 80%,transparent);
}
.cta-sec::before{top:0;}
.cta-sec::after{bottom:0;}
/* Glow blobs */
.cta-glow-l{position:absolute;left:-60px;top:50%;transform:translateY(-50%);width:400px;height:400px;background:radial-gradient(circle,rgba(140,50,255,0.2) 0%,transparent 65%);pointer-events:none;}
.cta-glow-r{position:absolute;right:-60px;top:50%;transform:translateY(-50%);width:400px;height:400px;background:radial-gradient(circle,rgba(212,160,23,0.15) 0%,transparent 65%);pointer-events:none;}
/* Lotus left */
.cta-deco-l{
    position:absolute;left:30px;top:50%;transform:translateY(-50%);
    font-size:5.5rem;opacity:0.22;pointer-events:none;
    filter:hue-rotate(290deg) saturate(1.5);
}
/* Lotus right */
.cta-deco-r{
    position:absolute;right:30px;top:50%;transform:translateY(-50%) scaleX(-1);
    font-size:5.5rem;opacity:0.22;pointer-events:none;
    filter:hue-rotate(290deg) saturate(1.5);
}
/* Diya glow */
.cta-diya{position:absolute;left:120px;bottom:0;font-size:3.5rem;opacity:0.4;filter:drop-shadow(0 0 20px rgba(255,160,0,0.6));pointer-events:none;}
/* Temple silhouette */
.cta-temple{
    position:absolute;bottom:0;left:50%;transform:translateX(-50%);
    width:300px;height:80px;opacity:0.12;
    background:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 300 80'%3E%3Cpath d='M140 80V30l10-20 10 20V80M120 80V45l20-30 20 30V80M90 80V55l30-30 30 30V80M60 80h180' stroke='%23D4A017' stroke-width='2' fill='none'/%3E%3C/svg%3E") center bottom/contain no-repeat;
}
.cta-wrap{
    position:relative;z-index:5;
    max-width:1100px;margin:0 auto;padding:0 24px;
    display:flex;align-items:center;justify-content:space-between;gap:30px;flex-wrap:wrap;
}
.cta-text h2{font-family:'Cinzel',serif;font-size:clamp(1.4rem,3vw,2.1rem);font-weight:700;color:#fff;margin-bottom:8px;}
.cta-text p {color:rgba(255,255,255,0.6);font-size:0.9rem;}
.btn-cta{
    font-family:'Cinzel',serif;font-size:0.85rem;font-weight:700;
    background:linear-gradient(135deg,#D4A017,#a07010);color:#fff;
    padding:14px 30px;border-radius:50px;white-space:nowrap;
    display:inline-flex;align-items:center;gap:9px;
    box-shadow:0 6px 24px rgba(212,160,23,0.45);transition:all 0.3s;
}
.btn-cta:hover{background:linear-gradient(135deg,#f0c040,#D4A017);box-shadow:0 8px 32px rgba(212,160,23,0.6);}

/* ════════════════════════════════════════
   GOLD RULE
════════════════════════════════════════ */
.gold-rule{height:3px;background:linear-gradient(90deg,transparent,#D4A017,#f0c040,#D4A017,transparent);}

/* ════════════════════════════════════════
   ⑧ FOOTER — DARK PURPLE
════════════════════════════════════════ */
.footer{
    background:linear-gradient(160deg,#0d001a,#160028,#0d001a);
    padding:52px 0 0;
    position:relative;
    border-top:1px solid rgba(212,160,23,0.2);
}
/* Gold corner decorations */
.footer::before{
    content:'';position:absolute;top:0;left:0;width:120px;height:120px;
    border-top:2px solid rgba(212,160,23,0.4);border-left:2px solid rgba(212,160,23,0.4);
    pointer-events:none;
}
.footer::after{
    content:'';position:absolute;top:0;right:0;width:120px;height:120px;
    border-top:2px solid rgba(212,160,23,0.4);border-right:2px solid rgba(212,160,23,0.4);
    pointer-events:none;
}
.footer-grid{display:grid;grid-template-columns:1.5fr 1fr 1fr 1.3fr;gap:36px;padding-bottom:36px;}
@media(max-width:900px){.footer-grid{grid-template-columns:repeat(2,1fr);}}
@media(max-width:560px){.footer-grid{grid-template-columns:1fr;}}
.footer-logo-row{display:flex;align-items:center;gap:10px;margin-bottom:12px;}
.f-logo-ic{
    width:42px;height:42px;border-radius:50%;flex-shrink:0;
    background:linear-gradient(135deg,#f0c040,#c89010);
    display:flex;align-items:center;justify-content:center;
}
.f-logo-ic span{color:#fff;font-family:serif;font-size:1.1rem;font-weight:700;}
.f-brand{font-family:'Cinzel',serif;font-size:1.05rem;font-weight:700;color:#D4A017;}
.f-brand-tag{font-family:'Playfair Display',serif;font-size:9px;font-style:italic;color:rgba(212,160,23,0.6);letter-spacing:0.06em;}
.f-desc{color:rgba(255,255,255,0.38);font-size:0.84rem;line-height:1.85;margin-bottom:4px;}
.f-head{font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.14em;text-transform:uppercase;color:#D4A017;margin-bottom:16px;}
.f-link{display:block;color:rgba(255,255,255,0.4);font-size:0.875rem;margin-bottom:9px;transition:color 0.2s;}
.f-link:hover{color:#D4A017;}
/* Social icons row */
.socials{display:flex;gap:10px;margin-top:4px;}
.soc{
    width:36px;height:36px;border-radius:50%;background:rgba(255,255,255,0.05);
    border:1px solid rgba(212,160,23,0.18);display:flex;align-items:center;
    justify-content:center;color:rgba(255,255,255,0.45);font-size:14px;transition:all 0.2s;
}
.soc:hover{border-color:currentColor;}
/* Subscribe */
.sub-wrap{
    display:flex;border-radius:50px;overflow:hidden;
    border:1.5px solid rgba(212,160,23,0.3);margin-top:14px;
}
.sub-wrap input{
    flex:1;background:rgba(255,255,255,0.05);border:none;outline:none;
    padding:11px 14px;color:#fff;font-size:0.82rem;
}
.sub-wrap input::placeholder{color:rgba(255,255,255,0.3);}
.sub-wrap button{
    background:linear-gradient(135deg,#D4A017,#a07010);border:none;
    padding:11px 16px;cursor:pointer;color:#fff;font-size:0.95rem;transition:all 0.2s;
}
.sub-wrap button:hover{background:linear-gradient(135deg,#f0c040,#D4A017);}
/* Footer quick links bar */
.f-links-bar{
    border-top:1px solid rgba(212,160,23,0.08);
    padding:12px 0;display:flex;flex-wrap:wrap;gap:6px 0;justify-content:center;
}
.f-links-bar a{color:rgba(255,255,255,0.35);font-size:12.5px;transition:color 0.2s;}
.f-links-bar a:hover{color:#D4A017;}
.f-links-bar .sep{color:rgba(212,160,23,0.3);padding:0 10px;font-size:12px;}
/* Footer bottom bar */
.f-bar{
    border-top:1px solid rgba(212,160,23,0.08);padding:16px 0;
    display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:10px;
    position:relative;
}
/* Bottom corner decorations */
.f-bar::before{
    content:'';position:absolute;bottom:0;left:0;width:80px;height:80px;
    border-bottom:2px solid rgba(212,160,23,0.3);border-left:2px solid rgba(212,160,23,0.3);
}
.f-bar::after{
    content:'';position:absolute;bottom:0;right:0;width:80px;height:80px;
    border-bottom:2px solid rgba(212,160,23,0.3);border-right:2px solid rgba(212,160,23,0.3);
}
.f-copy{color:rgba(255,255,255,0.28);font-size:12px;}
.f-motto{color:rgba(212,160,23,0.5);font-size:12px;font-style:italic;}

/* ════════════════════════════════════════
   WHATSAPP FAB
════════════════════════════════════════ */
@keyframes wpP{0%{transform:scale(1);opacity:.75;}70%{transform:scale(1.65);opacity:0;}100%{transform:scale(1.65);opacity:0;}}
#wp-fab{position:fixed;bottom:28px;right:24px;z-index:9999;width:58px;height:58px;background:#25D366;border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:0 6px 24px rgba(37,211,102,0.5);text-decoration:none;transition:transform 0.25s;}
#wp-fab:hover{transform:scale(1.1);}
#wp-fab .pr{position:absolute;inset:0;border-radius:50%;background:rgba(37,211,102,0.4);animation:wpP 2s ease-out infinite;}
#wp-fab i{color:#fff;font-size:1.75rem;position:relative;z-index:1;}
#stb{position:fixed;bottom:28px;left:24px;z-index:9999;width:44px;height:44px;background:rgba(45,0,96,0.5);border:1px solid rgba(212,160,23,0.4);border-radius:50%;color:#D4A017;font-size:1rem;cursor:pointer;opacity:0;transition:all 0.3s;display:flex;align-items:center;justify-content:center;}
</style>
</head>
<body>

<!-- ══════════════════════════════════════
     ① NAVBAR
══════════════════════════════════════ -->
<nav class="navbar">
    <div class="nav-inner">
        <!-- Logo -->
        <a href="/" class="logo">
            <div class="logo-sun">
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
                <div class="logo-tag">Discover Your Destiny</div>
            </div>
        </a>

        <!-- Desktop nav -->
        <div class="nav-links">
            <a href="/" class="active">Home</a>
            <a href="/astro/pages/about.php">About</a>
            <a href="/astro/pages/services.php" class="has-arrow">Services <i class="fas fa-caret-down" style="font-size:10px;"></i></a>
            <a href="#gallery">Gallery</a>
            <a href="#testimonials">Testimonials</a>
            <a href="/astro/pages/blogs.php">Blog</a>
            <a href="/astro/pages/contact.php">Contact</a>
        </div>
        <a href="/astro/pages/contact.php" class="nav-btn">
            <i class="fas fa-calendar-alt" style="font-size:11px;"></i> Book Appointment →
        </a>
        <button class="mob-btn" id="mobBtn" aria-label="Menu"><i class="fas fa-bars"></i></button>
    </div>
    <div class="mob-nav" id="mobNav">
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
<script>document.getElementById('mobBtn').addEventListener('click',function(){var m=document.getElementById('mobNav');m.style.display=m.style.display==='flex'?'none':'flex';});
// Navbar scroll: transparent → solid white
window.addEventListener('scroll',function(){
    var nav=document.querySelector('.navbar');
    if(window.scrollY>60){
        nav.classList.add('scrolled');
    } else {
        nav.classList.remove('scrolled');
    }
});
</script>

<!-- ══════════════════════════════════════
     ② HERO — BANNER IMAGE BACKGROUND
══════════════════════════════════════ -->
<section class="hero">
    <div class="hero-bg"></div>
    <div class="hero-ov"></div>
    <div class="hero-wrap">
        <div class="hero-content">

            <!-- Badge -->
            <div class="h-badge">
                <div class="hl"></div>
                <span>Ancient Wisdom &bull; Modern Guidance</span>
                <div class="hl"></div>
            </div>

            <!-- H1 -->
            <h1>
                <span class="w">Get Expert</span>
                <span class="g">Palm Reading &amp;</span>
                <span class="w">Astrology Guidance</span>
            </h1>

            <p class="hero-sub">Discover the secrets of your life through the ancient wisdom of astrology and palmistry.</p>

            <!-- Buttons -->
            <div class="hero-btns">
                <a href="/astro/pages/contact.php" class="btn-gold">
                    <i class="fas fa-calendar-alt"></i> Book Appointment →
                </a>
                <button class="btn-watch">
                    <span class="play-c"><i class="fas fa-play" style="font-size:10px;margin-left:2px;"></i></span>
                    Watch Video
                </button>
            </div>

            <!-- Trust -->
            <div class="trust-row">
                <div class="avs">
                    <?php
                    // Try using real asset photos; fallback to initials
                    $avatarData=[
                        ['img'=>'/astro/assets/WhatsApp Image 2026-11-06 1at 2.39.56 PM.jpeg','init'=>'P','bg'=>'#2d1057'],
                        ['img'=>'/astro/assets/WhatsApp Image 2026-11-06 2at 2.39.56 PM.jpeg','init'=>'S','bg'=>'#3d1575'],
                        ['img'=>'/astro/assets/WhatsApp Image 2026-11-06 3at 2.39.56 PM.jpeg','init'=>'A','bg'=>'#4a1a8a'],
                        ['img'=>'','init'=>'R','bg'=>'#1a0a35'],
                        ['img'=>'','init'=>'M','bg'=>'#5a2a9a'],
                    ];
                    foreach($avatarData as $i=>$av): ?>
                    <div class="av" style="background:<?= $av['bg'] ?>;z-index:<?= 5-$i ?>;">
                        <?php if(!empty($av['img'])): ?>
                        <img src="<?= $av['img'] ?>" alt="client"
                             style="width:100%;height:100%;object-fit:cover;border-radius:50%;"
                             onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                        <span style="display:none;font-size:11px;font-weight:700;color:#D4A017;"><?= $av['init'] ?></span>
                        <?php else: ?>
                        <span style="font-size:11px;font-weight:700;color:#D4A017;"><?= $av['init'] ?></span>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div>
                    <div class="s5"><?php for($i=0;$i<5;$i++): ?><i class="fas fa-star"></i><?php endfor; ?></div>
                    <div class="trust-txt">Trusted by 50,000+ Happy Clients</div>
                </div>
            </div>

        </div>
    </div>

    <!-- ── BOTTOM WAVE TRANSITION ── -->
    <div class="hero-wave">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 80" preserveAspectRatio="none">
            <path d="M0,80 L0,40 Q180,0 360,30 Q540,60 720,20 Q900,-10 1080,30 Q1260,60 1440,15 L1440,80 Z" fill="#faebd7"/>
        </svg>
    </div>
</section>

<!-- ══════════════════════════════════════
     ③ SERVICES — LIGHT CREAM
══════════════════════════════════════ -->
<section class="srv-sec" style="margin-top:-2px;">
    <div class="container" style="text-align:center;">
        <!-- Pill + divider matching reference exactly -->
        <div style="display:flex;align-items:center;justify-content:center;gap:0;margin-bottom:14px;max-width:600px;margin-left:auto;margin-right:auto;">
            <!-- Left gold line -->
            <div style="flex:1;height:1px;background:linear-gradient(to right,transparent,#c8a04a);max-width:120px;"></div>
            <div style="width:8px;height:8px;border-radius:50%;background:#c8a04a;margin:0 4px;flex-shrink:0;"></div>
            <!-- Services Pill -->
            <div class="srv-pill"><i class="fas fa-star"></i>&nbsp;Our Services</div>
            <!-- Right gold dot + line -->
            <div style="width:8px;height:8px;border-radius:50%;background:#c8a04a;margin:0 4px;flex-shrink:0;"></div>
            <div style="flex:1;height:1px;background:linear-gradient(to left,transparent,#c8a04a);max-width:120px;"></div>
        </div>
        <div class="sec-title-dark" style="font-size:0.95rem;color:rgba(45,0,96,0.6);font-family:'Inter',sans-serif;font-weight:400;">Choose from our specialized astrology and palmistry services</div>
    </div>

    <div class="container">
        <div class="srv-cards">
            <?php
            $services=[
                ['fa-hand-paper', 'Palm Reading',       'Know your potential, strengths & challenges',   'palm-reading'],
                ['fa-scroll',      'Kundli Analysis',    'Understand your birth chart in detail',         'kundli-analysis'],
                ['fa-yin-yang',    'Horoscope Reading',  'Get insights about your future',                'kundli-analysis'],
                ['fa-heart',       'Love & Relationship','Find harmony in your relationships',            'marriage-matching'],
                ['fa-briefcase',   'Career Guidance',    'Choose the right path for your career',        'kundli-analysis'],
            ];
            foreach($services as [$ic,$t,$d,$sl]): ?>
            <a href="/astro/pages/services.php?service=<?= $sl ?>" class="srv-card">
                <div class="srv-ic"><i class="fas <?= $ic ?>"></i></div>
                <div class="srv-t"><?= $t ?></div>
                <div class="srv-d"><?= $d ?></div>
                <div class="srv-arr"><i class="fas fa-arrow-right"></i></div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════
     ④ ABOUT — DARK PURPLE
══════════════════════════════════════ -->
<section class="about-sec">
    <div class="container">
        <div class="about-g">

            <!-- Image with play -->
            <div class="about-img-box">
                <img src="/astro/assets/WhatsApp Image 2026-11-06 2at 2.39.56 PM.jpeg"
                     alt="AstroJyoti Consultation"
                     onerror="this.closest('.about-img-box').style.minHeight='280px';this.closest('.about-img-box').style.background='linear-gradient(135deg,#1a0a35,#2d1057)';this.style.display='none';">
                <div class="play-ov">
                    <div class="play-btn"><i class="fas fa-play"></i></div>
                </div>
            </div>

            <!-- Text -->
            <div>
                <div class="about-lotus">🪷</div>
                <div class="about-label">About AstroJyoti</div>
                <h2 class="about-h2">Ancient Wisdom...<br>Modern Guidance...</h2>
                <p class="about-p">At AstroJyoti, we bring the powerful knowledge of Vedic astrology and palmistry to help you make better decisions in life. Our expert astrologer provides accurate and personalized readings to guide you towards happiness, success and peace.</p>
                <a href="/astro/pages/about.php" class="btn-outline-gold">Know More About Us →</a>
            </div>

            <!-- Badges -->
            <div class="about-badges">
                <?php
                $badges=[
                    ['fa-shield-alt','#4a0080','rgba(74,0,128,0.12)','100% Accurate Readings'],
                    ['fa-lock',      '#4a0080','rgba(74,0,128,0.12)','Complete Privacy'],
                    ['fa-star',      '#D4A017','rgba(212,160,23,0.12)','Trusted by Thousands'],
                    ['fa-headset',   '#4a0080','rgba(74,0,128,0.12)','Personalized Guidance'],
                ];
                foreach($badges as [$ic,$col,$bg,$lbl]): ?>
                <div class="a-badge">
                    <div class="a-badge-ic" style="background:<?= $bg ?>;border:1px solid rgba(<?= $col==='#D4A017'?'212,160,23':'74,0,128' ?>,0.3);">
                        <i class="fas <?= $ic ?>" style="color:<?= $col ?>;font-size:1rem;"></i>
                    </div>
                    <span class="a-badge-txt"><?= $lbl ?></span>
                </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</section>

<!-- ══════════════════════════════════════
     ⑤ WHY CHOOSE — CREAM
══════════════════════════════════════ -->
<section class="why-sec">
    <div class="container" style="text-align:center;">
        <div class="h-divider">
            <div class="hl"></div>
            <span>Why Choose AstroJyoti?</span>
            <div class="hl r"></div>
        </div>
        <div class="why-sub">Your trusted partner for a brighter future</div>

        <div class="why-cards">
            <?php
            $why=[
                ['fa-shield-alt','#4a0080','rgba(74,0,128,0.1)' ,'100% Confidential & Secure'],
                ['fa-bolt',      '#D4A017','rgba(212,160,23,0.1)','Instant Guidance & Support'],
                ['fa-user-tie',  '#D4A017','rgba(212,160,23,0.1)','Expert Astrologer with 15+ Yrs Exp.'],
                ['fa-heart',     '#4a0080','rgba(74,0,128,0.1)' ,'Positive Results & Happy Clients'],
            ];
            foreach($why as [$ic,$col,$bg,$t]): ?>
            <div class="why-card">
                <div class="why-ic" style="background:<?= $bg ?>;border:1.5px solid <?= $col==='#D4A017'?'rgba(212,160,23,0.3)':'rgba(74,0,128,0.2)' ?>;">
                    <i class="fas <?= $ic ?>" style="color:<?= $col ?>;"></i>
                </div>
                <div class="why-title"><?= $t ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════
     ⑥ TESTIMONIALS — CREAM
══════════════════════════════════════ -->
<?php
require_once __DIR__ . '/config/database.php';
$db  = getDB();
$res = $db->query("SELECT * FROM testimonials ORDER BY id ASC LIMIT 3");
$tts = [];
if($res) while($r=$res->fetch_assoc()) $tts[]=$r;
if(empty($tts)) {
    $tts=[
        ['name'=>'Priya Sharma','location'=>'Mumbai',    'rating'=>5,'review'=>'AstroJyoti really helped me with my career confusion. The palm reading was so accurate!'],
        ['name'=>'Rahul Verma', 'location'=>'Delhi',     'rating'=>5,'review'=>'Very professional and insightful experience. Highly recommended!'],
        ['name'=>'Neha Singh',  'location'=>'Bangalore', 'rating'=>5,'review'=>'Amazing guidance and positive energy. My life has changed for the better.'],
    ];
}
$db->close();
?>
<section class="testi-sec" id="testimonials">
    <div class="container" style="text-align:center;">
        <div class="h-divider">
            <div class="hl"></div>
            <span>What Our Clients Say</span>
            <div class="hl r"></div>
        </div>
        <div class="why-sub" style="margin-bottom:0;">Real People. Real Experiences.</div>
    </div>

    <div class="container" style="position:relative;">
        <!-- Arrow left -->
        <button class="testi-arrow" style="position:absolute;left:-4px;top:50%;transform:translateY(-50%);z-index:5;" onclick="shiftTesti(-1)">
            <i class="fas fa-chevron-left"></i>
        </button>

        <div class="testi-g" id="testiGrid">
            <?php foreach($tts as $i=>$t): ?>
            <div class="tc <?= $i===1?'featured':'' ?>">
                <div class="tc-av <?= $i===1?'featured-av':'' ?>">
                    <?= strtoupper(substr($t['name'],0,1)) ?>
                </div>
                <p class="tc-quote">"<?= htmlspecialchars(mb_substr($t['review'],0,130)) ?><?= mb_strlen($t['review'])>130?'...':'' ?>"</p>
                <div class="tc-name">— <?= htmlspecialchars($t['name']) ?></div>
                <div class="tc-stars">
                    <?php for($s=0;$s<intval($t['rating']??5);$s++): ?>
                    <i class="fas fa-star"></i>
                    <?php endfor; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Arrow right -->
        <button class="testi-arrow" style="position:absolute;right:-4px;top:50%;transform:translateY(-50%);z-index:5;" onclick="shiftTesti(1)">
            <i class="fas fa-chevron-right"></i>
        </button>

        <!-- Dots -->
        <div class="testi-dots">
            <span class="on" onclick="setTesti(0)"></span>
            <span onclick="setTesti(1)"></span>
            <span onclick="setTesti(2)"></span>
        </div>
    </div>
</section>
<script>
// Simple testi dot highlight
function setTesti(i){
    document.querySelectorAll('.testi-dots span').forEach(function(s,j){s.classList.toggle('on',j===i);});
}
function shiftTesti(dir){
    var dots=document.querySelectorAll('.testi-dots span');
    var cur=0;
    dots.forEach(function(s,j){if(s.classList.contains('on'))cur=j;});
    var next=(cur+dir+dots.length)%dots.length;
    setTesti(next);
}
</script>

<!-- ══════════════════════════════════════
     ⑦ CTA BANNER — DARK TEMPLE
══════════════════════════════════════ -->
<section class="cta-sec">
    <div class="cta-glow-l"></div>
    <div class="cta-glow-r"></div>
    <div class="cta-deco-l">🪷</div>
    <div class="cta-deco-r">🪷</div>
    <div class="cta-diya">🪔</div>
    <div class="cta-temple"></div>

    <div class="cta-wrap">
        <div class="cta-text">
            <h2>Ready to Discover Your Destiny?</h2>
            <p>Book your personal astrology or palm reading session today!</p>
        </div>
        <a href="/astro/pages/contact.php" class="btn-cta">
            <i class="fas fa-calendar-alt"></i> Book Appointment Now →
        </a>
    </div>
</section>

<!-- ══════════════════════════════════════
     GOLD RULE
══════════════════════════════════════ -->
<div class="gold-rule"></div>

<!-- ══════════════════════════════════════
     ⑧ FOOTER — DARK PURPLE
══════════════════════════════════════ -->
<footer class="footer">
    <div class="container">
        <div class="footer-grid">

            <!-- Brand -->
            <div>
                <div class="footer-logo-row">
                    <div class="f-logo-ic"><span>ॐ</span></div>
                    <div>
                        <div class="f-brand">AstroJyoti</div>
                        <div class="f-brand-tag">Discover Your Destiny</div>
                    </div>
                </div>
                <p class="f-desc">Ancient Vedic wisdom, personalized for your journey. Find clarity, purpose and peace.</p>
            </div>

            <!-- Quick Links -->
            <div>
                <div class="f-head">Quick Links</div>
                <?php foreach(['Home'=>'/','About'=>'/astro/pages/about.php','Services'=>'/astro/pages/services.php','Gallery'=>'#','Testimonials'=>'#testimonials','Contact'=>'/astro/pages/contact.php'] as $l=>$h): ?>
                <a href="<?= $h ?>" class="f-link"><?= $l ?></a>
                <?php endforeach; ?>
            </div>

            <!-- Follow Us -->
            <div>
                <div class="f-head">Follow Us</div>
                <p style="color:rgba(255,255,255,0.38);font-size:0.83rem;margin-bottom:14px;">Stay connected for daily updates</p>
                <div class="socials">
                    <?php
                    $socs=[['fab fa-facebook-f','#1877F2'],['fab fa-youtube','#FF0000'],['fab fa-instagram','#E4405F'],['fab fa-whatsapp','#25D366'],['fab fa-twitter','#1DA1F2']];
                    foreach($socs as [$ic,$col]): ?>
                    <a href="#" class="soc" style="color:rgba(255,255,255,0.45);" onmouseover="this.style.borderColor='<?= $col ?>';this.style.color='<?= $col ?>';" onmouseout="this.style.borderColor='rgba(212,160,23,0.18)';this.style.color='rgba(255,255,255,0.45)';"><i class="<?= $ic ?>"></i></a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Subscribe -->
            <div>
                <div class="f-head">Subscribe for Updates</div>
                <p style="color:rgba(255,255,255,0.38);font-size:0.83rem;margin-bottom:4px;">Get daily horoscope & astrology tips</p>
                <div class="sub-wrap">
                    <input type="email" placeholder="Enter your email address">
                    <button type="button" title="Subscribe"><i class="fas fa-paper-plane"></i></button>
                </div>
            </div>

        </div>

        <!-- Quick links row -->
        <div class="f-links-bar">
            <?php
            $fl=['Home'=>'/','About'=>'/astro/pages/about.php','Services'=>'/astro/pages/services.php','Gallery'=>'#','Testimonials'=>'#testimonials','Contact'=>'/astro/pages/contact.php'];
            $fi=0;
            foreach($fl as $l=>$h):
                if($fi>0) echo '<span class="sep">|</span>';
            ?>
            <a href="<?= $h ?>"><?= $l ?></a>
            <?php $fi++; endforeach; ?>
        </div>

        <!-- Bottom -->
        <div class="f-bar">
            <span class="f-copy">© <?= date('Y') ?> AstroJyoti. All Rights Reserved.</span>
            <span class="f-motto">✦ Empowering Lives Through Astrology ✦</span>
        </div>
    </div>
</footer>
<div class="gold-rule"></div>

<!-- WhatsApp FAB -->
<a href="https://wa.me/919999999999" target="_blank" id="wp-fab" aria-label="WhatsApp">
    <span class="pr"></span>
    <i class="fab fa-whatsapp"></i>
</a>
<button id="stb" onclick="window.scrollTo({top:0,behavior:'smooth'})" aria-label="Top">
    <i class="fas fa-chevron-up"></i>
</button>
<script>
window.addEventListener('scroll',function(){
    var b=document.getElementById('stb');
    var s=window.scrollY>400;
    b.style.opacity=s?'1':'0';
    b.style.pointerEvents=s?'auto':'none';
});
</script>

</body>
</html>
