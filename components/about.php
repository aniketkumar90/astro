<?php
// about.php — About Section
?>
<section class="bg-cream py-20 lg:py-28 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">

            <!-- Left — Image with decorative elements -->
            <div class="relative flex justify-center lg:justify-start">
                <div class="relative">
                    <!-- Background shape -->
                    <div class="absolute -inset-3 bg-maroon/5 rounded-3xl rotate-2"></div>

                    <!-- Main image -->
                    <div class="relative w-80 h-96 sm:w-96 sm:h-[480px] rounded-2xl overflow-hidden border border-border shadow-xl">
                        <img
                            src="/astro/assets/WhatsApp Image 2026-11-06 1at 2.39.56 PM.jpeg"
                            alt="Your Astrologer"
                            class="w-full h-full object-cover object-top"
                            onerror="this.onerror=null; this.src=''; this.parentElement.style.background='linear-gradient(135deg, #FAF0E6, #E8DDD0)'; this.style.display='none';"
                        >
                    </div>

                    <!-- Experience badge (floating) -->
                    <div class="absolute -bottom-5 -right-5 bg-maroon text-white rounded-2xl shadow-xl px-5 py-4 border border-gold/20">
                        <div class="font-playfair font-bold text-3xl text-gold leading-none">24+</div>
                        <div class="text-white/70 text-xs font-inter mt-1">Years of<br>Vedic Practice</div>
                    </div>

                    <!-- Decorative gold dot -->
                    <div class="absolute -top-3 -left-3 w-6 h-6 rounded-full bg-gold shadow-md"></div>
                    <div class="absolute top-1/4 -left-6 w-3 h-3 rounded-full bg-gold/40"></div>
                </div>
            </div>

            <!-- Right — Content -->
            <div class="flex flex-col justify-center">
                <!-- Label -->
                <div class="flex items-center gap-3 mb-5">
                    <div class="h-px w-8 bg-gold"></div>
                    <span class="text-gold text-xs font-semibold tracking-[0.2em] uppercase font-inter">About the Astrologer</span>
                </div>

                <!-- Heading -->
                <h2 class="font-playfair text-3xl sm:text-4xl lg:text-5xl font-bold text-dark leading-tight mb-6">
                    Ancient insight.<br>
                    <span class="text-maroon italic">A conversation</span><br>
                    that feels like yours.
                </h2>

                <!-- Body Text -->
                <p class="text-dark/65 font-inter text-base leading-relaxed mb-6">
                    With over two decades of deep study in Vedic astrology, palmistry, and Jyotish, the guidance offered here is rooted in tradition but offered in a way that feels personal. Every consultation begins not with charts, but with listening.
                </p>
                <p class="text-dark/65 font-inter text-base leading-relaxed mb-8">
                    The goal is not to tell you what will happen — it is to help you understand the landscape you are moving through, so you can make choices with greater clarity and calm.
                </p>

                <!-- Skill Tags -->
                <div class="flex flex-wrap gap-2.5 mb-8">
                    <span class="inline-flex items-center gap-1.5 bg-maroon/8 text-maroon text-xs font-semibold px-3.5 py-1.5 rounded-full border border-maroon/15 font-inter">
                        <i class="fas fa-star-and-crescent text-gold text-xs"></i>
                        Vedic Astrology
                    </span>
                    <span class="inline-flex items-center gap-1.5 bg-maroon/8 text-maroon text-xs font-semibold px-3.5 py-1.5 rounded-full border border-maroon/15 font-inter">
                        <i class="fas fa-scroll text-gold text-xs"></i>
                        Kundli Analysis
                    </span>
                    <span class="inline-flex items-center gap-1.5 bg-maroon/8 text-maroon text-xs font-semibold px-3.5 py-1.5 rounded-full border border-maroon/15 font-inter">
                        <i class="fas fa-hand-paper text-gold text-xs"></i>
                        Palmistry
                    </span>
                    <span class="inline-flex items-center gap-1.5 bg-maroon/8 text-maroon text-xs font-semibold px-3.5 py-1.5 rounded-full border border-maroon/15 font-inter">
                        <i class="fas fa-gem text-gold text-xs"></i>
                        Gem Guidance
                    </span>
                    <span class="inline-flex items-center gap-1.5 bg-gold/10 text-gold text-xs font-semibold px-3.5 py-1.5 rounded-full border border-gold/20 font-inter">
                        <i class="fas fa-heart text-gold text-xs"></i>
                        Marriage Matching
                    </span>
                </div>

                <!-- CTA Link -->
                <a href="/astro/pages/about.php" class="inline-flex items-center gap-2 text-maroon font-semibold text-sm group self-start">
                    <span class="border-b border-maroon/30 group-hover:border-maroon pb-0.5 transition-colors">Meet your astrologer</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

