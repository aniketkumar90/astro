<?php
// hero.php — AstroJyoti Hero Section
// Design: Full-bleed background image with dark maroon gradient overlay, text on left
?>
<section class="relative overflow-hidden" style="min-height: 85vh;">

    <!-- BACKGROUND: Full-bleed astrologer photo -->
    <div class="absolute inset-0 z-0">
        <img
            src="/astro/assets/WhatsApp Image 2026-11-06 2at 2.39.56 PM.jpeg"
            alt=""
            class="w-full h-full object-cover"
            style="object-position: 65% center;"
        >
        <!-- Left-to-right gradient: opaque maroon left, fades right so astrologer shows through -->
        <div class="absolute inset-0"
             style="background: linear-gradient(to right, rgba(74,14,26,0.98) 0%, rgba(74,14,26,0.93) 30%, rgba(74,14,26,0.70) 55%, rgba(74,14,26,0.25) 100%);"></div>
        <!-- TOP solid block — fully hides any UI element in the top of the image -->
        <div class="absolute top-0 left-0 right-0"
             style="height: 22%; background: linear-gradient(to bottom, rgba(74,14,26,1) 0%, rgba(74,14,26,0) 100%);"></div>
        <!-- Bottom fade to cream -->
        <div class="absolute bottom-0 left-0 right-0 h-32"
             style="background: linear-gradient(to top, #FAF7F2 0%, transparent 100%);"></div>
        <!-- Dot pattern -->
        <div class="absolute inset-0 opacity-10"
             style="background-image: radial-gradient(circle, #D4A017 1px, transparent 1px); background-size: 55px 55px;"></div>
    </div>

    <!-- CONTENT (z-10 so it's above background) -->
    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 flex items-center" style="min-height: 85vh;">
        <div class="max-w-xl lg:max-w-2xl py-20 lg:py-24">

            <!-- Badge -->
            <div class="inline-flex items-center gap-2 mb-7">
                <!-- Asterisk / sun icon -->
                <svg class="w-3.5 h-3.5 text-gold flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l1.5 4.5L18 5l-3 3.5 4.5 1.5-4.5 1.5L18 15l-4.5-1.5L12 18l-1.5-4.5L6 15l3-3.5L4.5 10 9 8.5 6 5l4.5 1.5L12 2z"/>
                </svg>
                <span class="text-gold text-[11px] font-semibold tracking-[0.22em] uppercase font-inter">
                    Vedic Wisdom &nbsp;·&nbsp; 24+ Years of Experience
                </span>
            </div>

            <!-- Main Heading -->
            <h1 class="font-playfair font-bold text-white leading-[1.05] mb-6"
                style="font-size: clamp(2.4rem, 5vw, 4.5rem);">
                Find clarity in life<br>
                through <span class="text-gold italic">Vedic</span><br>
                astrology.
            </h1>

            <!-- Sub-text -->
            <p class="text-white/65 font-inter leading-relaxed mb-10"
               style="font-size: clamp(0.95rem, 1.5vw, 1.1rem); max-width: 400px;">
                A thoughtful, personal conversation can bring fresh perspective to the choices and questions that matter.
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-wrap gap-3 items-center">
                <!-- Primary: gold outlined -->
                <a href="/astro/pages/contact.php"
                   class="inline-flex items-center gap-2.5 font-semibold text-sm px-6 py-3 rounded-full transition-all duration-200 group"
                   style="border: 1.5px solid #D4A017; color: #D4A017; background: transparent;">
                    <span style="color: inherit;">Book a consultation</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2.5" style="color: inherit;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
                <!-- Secondary: white outlined -->
                <a href="/astro/pages/services.php"
                   class="inline-flex items-center gap-2 font-semibold text-sm px-6 py-3 rounded-full transition-all duration-200 hover:bg-white/10"
                   style="border: 1.5px solid rgba(255,255,255,0.45); color: rgba(255,255,255,0.90);">
                    Explore our services
                </a>
            </div>

        </div>
    </div>



</section>

