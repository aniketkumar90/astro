<?php
// cta.php — Call to Action Section
?>
<section class="bg-maroon py-20 lg:py-24 relative overflow-hidden">
    <!-- Decorative background elements -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 right-0 w-96 h-96 rounded-full border border-gold translate-x-1/3 -translate-y-1/3"></div>
        <div class="absolute bottom-0 left-0 w-72 h-72 rounded-full border border-gold -translate-x-1/3 translate-y-1/3"></div>
    </div>
    <div class="absolute inset-0" style="background-image: radial-gradient(circle, rgba(212,160,23,0.08) 1px, transparent 1px); background-size: 50px 50px;"></div>

    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <!-- Label -->
        <div class="flex items-center justify-center gap-3 mb-6">
            <div class="h-px w-8 bg-gold/50"></div>
            <span class="text-gold/80 text-xs font-semibold tracking-[0.25em] uppercase font-inter">Your Next Step</span>
            <div class="h-px w-8 bg-gold/50"></div>
        </div>

        <!-- Heading -->
        <h2 class="font-playfair text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight mb-6">
            Make room for a more<br>
            <span class="text-gold italic">thoughtful conversation.</span>
        </h2>

        <!-- Subtext -->
        <p class="text-white/60 font-inter text-base lg:text-lg leading-relaxed mb-10 max-w-2xl mx-auto">
            Whether you have a specific question or simply feel that the moment is right — a consultation begins with listening. There is no pressure, no prediction without context, and no judgment.
        </p>

        <!-- CTA Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="/astro/pages/contact.php" class="inline-flex items-center gap-2.5 bg-gold hover:bg-gold/90 text-white font-bold px-8 py-4 rounded-full shadow-xl hover:shadow-2xl transition-all duration-200 group text-sm tracking-wide">
                Book a consultation
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
            <a href="https://wa.me/919999999999" target="_blank" class="inline-flex items-center gap-2.5 bg-white/10 hover:bg-white/20 text-white font-semibold px-7 py-4 rounded-full border border-white/20 transition-all duration-200 text-sm">
                <i class="fab fa-whatsapp text-[#25D366] text-lg"></i>
                Chat on WhatsApp
            </a>
        </div>

        <!-- Trust note -->
        <p class="text-white/40 text-xs font-inter mt-8">
            Consultations available in Hindi &amp; English &nbsp;·&nbsp; In-person &amp; Online
        </p>
    </div>
</section>

