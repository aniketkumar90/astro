<?php
// footer.php — AstroJyoti Footer
?>

<!-- ===== GLOBAL FLOATING WHATSAPP BUTTON ===== -->
<a href="https://wa.me/919999999999"
   target="_blank"
   rel="noopener noreferrer"
   id="whatsapp-fab"
   class="group"
   style="
     position: fixed;
     bottom: 28px;
     right: 24px;
     z-index: 9999;
     width: 56px;
     height: 56px;
     background: #25D366;
     border-radius: 50%;
     display: flex;
     align-items: center;
     justify-content: center;
     box-shadow: 0 8px 25px rgba(37,211,102,0.45), 0 2px 8px rgba(0,0,0,0.20);
     text-decoration: none;
     transition: transform 0.2s ease, box-shadow 0.2s ease;
   "
   onmouseover="this.style.transform='scale(1.12)'; this.style.boxShadow='0 12px 32px rgba(37,211,102,0.55), 0 4px 12px rgba(0,0,0,0.25)';"
   onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 8px 25px rgba(37,211,102,0.45), 0 2px 8px rgba(0,0,0,0.20)';"
   aria-label="Chat on WhatsApp"
>
    <!-- Pulse ring animation -->
    <span style="
        position: absolute;
        inset: 0;
        border-radius: 50%;
        background: rgba(37,211,102,0.4);
        animation: whatsapp-pulse 2s ease-out infinite;
    "></span>

    <!-- WhatsApp icon -->
    <i class="fab fa-whatsapp" style="color: #fff; font-size: 1.6rem; position: relative; z-index: 1;"></i>

    <!-- Tooltip label -->
    <span style="
        position: absolute;
        right: calc(100% + 12px);
        top: 50%;
        transform: translateY(-50%);
        background: #fff;
        color: #1A0A0A;
        font-size: 12px;
        font-weight: 600;
        font-family: 'Inter', sans-serif;
        padding: 6px 14px;
        border-radius: 20px;
        white-space: nowrap;
        box-shadow: 0 4px 14px rgba(0,0,0,0.15);
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.2s ease;
    " class="wa-tooltip">Chat on WhatsApp</span>
</a>

<style>
@keyframes whatsapp-pulse {
    0%   { transform: scale(1);   opacity: 0.7; }
    70%  { transform: scale(1.6); opacity: 0;   }
    100% { transform: scale(1.6); opacity: 0;   }
}
#whatsapp-fab:hover .wa-tooltip { opacity: 1 !important; }
</style>
<footer class="bg-maroon text-white">
    <!-- Main Footer Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">

            <!-- Column 1: Logo + Description -->
            <div class="sm:col-span-2 lg:col-span-1">
                <a href="/astro/index.php" class="flex items-center gap-2.5 mb-5 group w-fit">
                    <div class="w-9 h-9 rounded-full bg-gold/20 border border-gold/30 flex items-center justify-center">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="4" fill="#D4A017"/>
                            <path d="M12 2V4M12 20V22M2 12H4M20 12H22M4.93 4.93L6.34 6.34M17.66 17.66L19.07 19.07M4.93 19.07L6.34 17.66M17.66 6.34L19.07 4.93" stroke="#D4A017" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div>
                        <div class="font-playfair text-lg font-bold text-white">AstroJyoti</div>
                        <div class="text-gold/70 text-xs tracking-widest uppercase leading-none">Vedic Wisdom</div>
                    </div>
                </a>
                <p class="text-white/50 text-sm font-inter leading-relaxed mb-6">
                    A space for honest, unhurried guidance through the language of Vedic astrology. For those who seek clarity, not certainty.
                </p>
                <!-- Social Links -->
                <div class="flex gap-3">
                    <a href="#" class="w-9 h-9 rounded-full bg-white/10 hover:bg-gold/30 flex items-center justify-center transition-colors" aria-label="Instagram">
                        <i class="fab fa-instagram text-sm"></i>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-full bg-white/10 hover:bg-gold/30 flex items-center justify-center transition-colors" aria-label="Facebook">
                        <i class="fab fa-facebook-f text-sm"></i>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-full bg-white/10 hover:bg-gold/30 flex items-center justify-center transition-colors" aria-label="YouTube">
                        <i class="fab fa-youtube text-sm"></i>
                    </a>
                    <a href="https://wa.me/919999999999" class="w-9 h-9 rounded-full bg-white/10 hover:bg-[#25D366]/50 flex items-center justify-center transition-colors" aria-label="WhatsApp">
                        <i class="fab fa-whatsapp text-sm"></i>
                    </a>
                </div>
            </div>

            <!-- Column 2: Explore -->
            <div>
                <h3 class="text-gold text-xs font-semibold tracking-[0.2em] uppercase font-inter mb-5">Explore</h3>
                <ul class="flex flex-col gap-3">
                    <li><a href="/astro/index.php" class="text-white/60 text-sm font-inter hover:text-white transition-colors">Home</a></li>
                    <li><a href="/astro/pages/about.php" class="text-white/60 text-sm font-inter hover:text-white transition-colors">About Us</a></li>
                    <li><a href="/astro/pages/services.php" class="text-white/60 text-sm font-inter hover:text-white transition-colors">Services</a></li>
                    <li><a href="/astro/pages/horoscope.php" class="text-white/60 text-sm font-inter hover:text-white transition-colors">Horoscope</a></li>
                    <li><a href="/astro/pages/blogs.php" class="text-white/60 text-sm font-inter hover:text-white transition-colors">Journal / Blog</a></li>
                    <li><a href="/astro/pages/contact.php" class="text-white/60 text-sm font-inter hover:text-white transition-colors">Contact</a></li>
                </ul>
            </div>

            <!-- Column 3: Guidance -->
            <div>
                <h3 class="text-gold text-xs font-semibold tracking-[0.2em] uppercase font-inter mb-5">Guidance</h3>
                <ul class="flex flex-col gap-3">
                    <li><a href="/astro/pages/services.php?service=palm-reading" class="text-white/60 text-sm font-inter hover:text-white transition-colors">Palm Reading</a></li>
                    <li><a href="/astro/pages/services.php?service=kundli-analysis" class="text-white/60 text-sm font-inter hover:text-white transition-colors">Kundli Analysis</a></li>
                    <li><a href="/astro/pages/services.php?service=gemstone-consultation" class="text-white/60 text-sm font-inter hover:text-white transition-colors">Gemstone Consultation</a></li>
                    <li><a href="/astro/pages/services.php?service=pooja-remedies" class="text-white/60 text-sm font-inter hover:text-white transition-colors">Pooja &amp; Remedies</a></li>
                    <li><a href="/astro/pages/services.php?service=marriage-matching" class="text-white/60 text-sm font-inter hover:text-white transition-colors">Marriage Matching</a></li>
                </ul>
            </div>

            <!-- Column 4: First Step -->
            <div>
                <h3 class="text-gold text-xs font-semibold tracking-[0.2em] uppercase font-inter mb-5">A Thoughtful First Step</h3>
                <p class="text-white/50 text-sm font-inter leading-relaxed mb-5">
                    You can reach out through WhatsApp, fill out the consultation form, or simply drop a message. No question is too small to begin with.
                </p>
                <div class="flex flex-col gap-3">
                    <a href="/astro/pages/contact.php" class="inline-flex items-center gap-2 bg-gold hover:bg-gold/90 text-white font-semibold text-sm px-5 py-2.5 rounded-full transition-colors w-fit group">
                        Book a consultation
                        <svg class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <div class="flex items-center gap-2 text-white/50 text-sm font-inter">
                        <i class="fas fa-phone text-gold text-xs"></i>
                        <span>+91 99999 99999</span>
                    </div>
                    <div class="flex items-center gap-2 text-white/50 text-sm font-inter">
                        <i class="fas fa-envelope text-gold text-xs"></i>
                        <span>hello@astrojyoti.in</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Copyright Bar -->
    <div class="border-t border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-3">
                <p class="text-white/35 text-xs font-inter">
                    &copy; <?= date('Y') ?> AstroJyoti. All rights reserved.
                </p>
                <div class="flex items-center gap-5">
                    <a href="#" class="text-white/35 text-xs font-inter hover:text-white/60 transition-colors">Privacy Policy</a>
                    <a href="#" class="text-white/35 text-xs font-inter hover:text-white/60 transition-colors">Terms of Service</a>
                    <a href="#" class="text-white/35 text-xs font-inter hover:text-white/60 transition-colors">Disclaimer</a>
                </div>
            </div>
        </div>
    </div>
</footer>

