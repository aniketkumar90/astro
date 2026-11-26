<?php
/**
 * Shared footer — purple/gold cosmic theme
 * Include: require_once __DIR__ . '/../components/footer_shared.php';
 */
?>

<!-- ══ CTA STRIP ══ -->
<section style="position:relative;overflow:hidden;padding:55px 20px;background:linear-gradient(135deg,#0d001a 0%,#1a0035 35%,#2d0060 60%,#1a0035 80%,#0d001a 100%);border-top:1px solid rgba(212,160,23,0.2);border-bottom:1px solid rgba(212,160,23,0.2);">
    <div style="position:absolute;left:16px;top:50%;transform:translateY(-50%);font-size:5rem;opacity:0.22;pointer-events:none;">🪷</div>
    <div style="position:absolute;right:16px;top:50%;transform:translateY(-50%) scaleX(-1);font-size:5rem;opacity:0.22;pointer-events:none;">🪷</div>
    <div style="position:absolute;top:0;left:50%;transform:translateX(-50%);width:600px;height:180px;background:radial-gradient(ellipse,rgba(150,60,255,0.25) 0%,transparent 70%);pointer-events:none;"></div>
    <div style="position:absolute;top:0;left:0;right:0;height:2px;background:linear-gradient(90deg,transparent,#D4A017,transparent);"></div>
    <div style="position:absolute;bottom:0;left:0;right:0;height:2px;background:linear-gradient(90deg,transparent,#D4A017,transparent);"></div>
    <div style="position:relative;z-index:5;max-width:900px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;gap:24px;flex-wrap:wrap;text-align:left;">
        <div>
            <h2 style="font-family:'Cinzel',serif;font-size:clamp(1.3rem,3vw,2rem);font-weight:700;color:#fff;margin-bottom:6px;">Ready to Discover Your Destiny?</h2>
            <p style="color:rgba(255,255,255,0.6);font-size:0.9rem;">Book your personal astrology or palm reading session today!</p>
        </div>
        <a href="/astro/pages/contact.php" style="font-family:'Cinzel',serif;font-size:0.85rem;font-weight:700;background:linear-gradient(135deg,#D4A017,#a07010);color:#fff;padding:14px 30px;border-radius:50px;text-decoration:none;display:inline-flex;align-items:center;gap:9px;white-space:nowrap;box-shadow:0 6px 24px rgba(212,160,23,0.4);transition:all 0.3s;" onmouseover="this.style.background='linear-gradient(135deg,#f0c040,#D4A017)';" onmouseout="this.style.background='linear-gradient(135deg,#D4A017,#a07010)';">
            <i class="fas fa-calendar-alt"></i> Book Appointment Now →
        </a>
    </div>
</section>

<!-- ══ GOLD LINE ══ -->
<div style="height:3px;background:linear-gradient(90deg,transparent,#D4A017,#f0c040,#D4A017,transparent);"></div>

<!-- ══ FOOTER ══ -->
<footer style="background:linear-gradient(165deg,#0d001a,#1a0030,#0d001a);padding:50px 0 0;border-top:2px solid rgba(212,160,23,0.15);">
    <div style="max-width:1240px;margin:0 auto;padding:0 24px;">
        <div style="display:grid;grid-template-columns:1.5fr 1fr 1fr 1.3fr;gap:36px;padding-bottom:40px;" class="footer-grid-inner">

            <!-- Brand -->
            <div>
                <div style="display:flex;align-items:center;gap:10px;margin-bottom:4px;">
                    <div style="width:40px;height:40px;background:linear-gradient(135deg,#e8b820,#c89010);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <span style="color:#fff;font-family:serif;font-size:1.1rem;font-weight:700;">ॐ</span>
                    </div>
                    <div>
                        <div style="font-family:'Cinzel',serif;font-size:1.05rem;font-weight:700;color:#D4A017;">AstroJyoti</div>
                        <div style="font-family:'Playfair Display',serif;font-size:9px;font-style:italic;color:rgba(212,160,23,0.6);letter-spacing:0.06em;">Discover Your Destiny</div>
                    </div>
                </div>
                <p style="color:rgba(255,255,255,0.4);font-size:0.84rem;line-height:1.85;margin-top:12px;margin-bottom:16px;">Ancient Vedic wisdom, personalized for your journey. Find clarity, purpose and peace.</p>
                <div style="display:flex;gap:10px;">
                    <?php foreach([['fab fa-facebook-f','#1877F2'],['fab fa-youtube','#FF0000'],['fab fa-instagram','#E4405F'],['fab fa-whatsapp','#25D366'],['fab fa-twitter','#1DA1F2']] as [$ic,$col]): ?>
                    <a href="#" style="width:34px;height:34px;border-radius:50%;background:rgba(255,255,255,0.04);border:1px solid rgba(212,160,23,0.18);display:flex;align-items:center;justify-content:center;color:rgba(255,255,255,0.45);font-size:13px;text-decoration:none;transition:all 0.2s;" onmouseover="this.style.borderColor='<?= $col ?>';this.style.color='<?= $col ?>';" onmouseout="this.style.borderColor='rgba(212,160,23,0.18)';this.style.color='rgba(255,255,255,0.45)';"><i class="<?= $ic ?>"></i></a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.14em;text-transform:uppercase;color:#D4A017;margin-bottom:16px;">Quick Links</div>
                <?php foreach(['Home'=>'/astro/','About'=>'/astro/pages/about.php','Services'=>'/astro/pages/services.php','Horoscope'=>'/astro/pages/horoscope.php','Blog'=>'/astro/pages/blogs.php','Contact'=>'/astro/pages/contact.php'] as $l=>$h): ?>
                <a href="<?= $h ?>" style="display:block;color:rgba(255,255,255,0.4);font-size:0.875rem;margin-bottom:9px;text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='#D4A017';" onmouseout="this.style.color='rgba(255,255,255,0.4)';"><?= $l ?></a>
                <?php endforeach; ?>
            </div>

            <!-- Follow Us -->
            <div>
                <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.14em;text-transform:uppercase;color:#D4A017;margin-bottom:16px;">Services</div>
                <?php foreach(['Palm Reading','Kundli Analysis','Horoscope Reading','Love & Relationship','Career Guidance'] as $sv): ?>
                <a href="/astro/pages/services.php" style="display:block;color:rgba(255,255,255,0.4);font-size:0.875rem;margin-bottom:9px;text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='#D4A017';" onmouseout="this.style.color='rgba(255,255,255,0.4)';"><?= $sv ?></a>
                <?php endforeach; ?>
            </div>

            <!-- Subscribe -->
            <div>
                <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.14em;text-transform:uppercase;color:#D4A017;margin-bottom:16px;">Subscribe for Updates</div>
                <div style="color:rgba(255,255,255,0.4);font-size:0.84rem;line-height:1.6;margin-bottom:14px;">
                    <div><i class="fas fa-phone" style="color:#D4A017;width:16px;"></i> &nbsp;+91 99999 99999</div>
                    <div style="margin-top:6px;"><i class="fas fa-envelope" style="color:#D4A017;width:16px;"></i> &nbsp;hello@astrojyoti.in</div>
                    <div style="margin-top:6px;"><i class="fas fa-clock" style="color:#D4A017;width:16px;"></i> &nbsp;Mon–Sat 9AM–7PM</div>
                </div>
                <div style="display:flex;border-radius:50px;overflow:hidden;border:1.5px solid rgba(212,160,23,0.3);">
                    <input type="email" placeholder="Enter your email" style="flex:1;background:rgba(255,255,255,0.05);border:none;outline:none;padding:10px 14px;color:#fff;font-size:0.82rem;">
                    <button style="background:linear-gradient(135deg,#D4A017,#a07010);border:none;padding:10px 14px;cursor:pointer;color:#fff;font-size:0.95rem;transition:all 0.2s;" onmouseover="this.style.background='linear-gradient(135deg,#f0c040,#D4A017)';" onmouseout="this.style.background='linear-gradient(135deg,#D4A017,#a07010)';"><i class="fas fa-paper-plane"></i></button>
                </div>
            </div>
        </div>

        <!-- Footer links bar -->
        <div style="border-top:1px solid rgba(212,160,23,0.08);padding:12px 0;display:flex;flex-wrap:wrap;gap:6px 16px;justify-content:center;">
            <?php $fls=['Home'=>'/astro/','About'=>'/astro/pages/about.php','Services'=>'/astro/pages/services.php','Gallery'=>'#','Testimonials'=>'#','Contact'=>'/astro/pages/contact.php']; $fi=0; foreach($fls as $l=>$h): ?>
            <?php if($fi>0): ?><span style="color:rgba(212,160,23,0.3);">|</span><?php endif; ?>
            <a href="<?= $h ?>" style="color:rgba(255,255,255,0.35);font-size:12px;text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='#D4A017';" onmouseout="this.style.color='rgba(255,255,255,0.35)';"><?= $l ?></a>
            <?php $fi++; endforeach; ?>
        </div>

        <!-- Bottom bar -->
        <div style="border-top:1px solid rgba(212,160,23,0.08);padding:16px 0;display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:10px;">
            <span style="color:rgba(255,255,255,0.28);font-size:12px;">© <?= date('Y') ?> AstroJyoti. All Rights Reserved.</span>
            <span style="color:rgba(212,160,23,0.5);font-size:12px;font-style:italic;">✦ Empowering Lives Through Astrology ✦</span>
        </div>
    </div>
</footer>
<div style="height:3px;background:linear-gradient(90deg,transparent,#D4A017,#f0c040,#D4A017,transparent);"></div>

<!-- WhatsApp FAB -->
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

<style>
@media(max-width:900px){
    .footer-grid-inner { grid-template-columns:repeat(2,1fr) !important; }
}
@media(max-width:580px){
    .footer-grid-inner { grid-template-columns:1fr !important; }
}
</style>
