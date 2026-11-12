<?php
// navbar.php — AstroJyoti Navigation
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
?>
<header class="bg-cream/95 backdrop-blur-sm sticky top-0 z-50 border-b border-border shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-18 py-3">

            <!-- Logo -->
            <a href="/astro/index.php" class="flex items-center gap-2.5 group">
                <div class="w-9 h-9 rounded-full bg-maroon flex items-center justify-center shadow-md group-hover:scale-105 transition-transform">
                    <!-- Sun SVG Icon -->
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="4" fill="#D4A017"/>
                        <path d="M12 2V4M12 20V22M2 12H4M20 12H22M4.93 4.93L6.34 6.34M17.66 17.66L19.07 19.07M4.93 19.07L6.34 17.66M17.66 6.34L19.07 4.93" stroke="#D4A017" stroke-width="2" stroke-linecap="round"/>
                        <circle cx="12" cy="12" r="2.5" fill="#FAF7F2"/>
                    </svg>
                </div>
                <div>
                    <span class="font-playfair text-xl font-bold text-maroon tracking-wide">AstroJyoti</span>
                    <div class="text-xs text-gold font-medium tracking-widest uppercase leading-none">Vedic Wisdom</div>
                </div>
            </a>

            <!-- Desktop Nav -->
            <nav class="hidden lg:flex items-center gap-7">
                <a href="/astro/index.php" class="nav-link <?= $currentPage === 'index' ? 'text-maroon font-semibold' : 'text-dark/70' ?> text-sm font-medium hover:text-maroon transition-colors tracking-wide">Home</a>
                <a href="/astro/pages/about.php" class="nav-link <?= $currentPage === 'about' ? 'text-maroon font-semibold' : 'text-dark/70' ?> text-sm font-medium hover:text-maroon transition-colors tracking-wide">About Us</a>
                <a href="/astro/pages/services.php" class="nav-link <?= $currentPage === 'services' ? 'text-maroon font-semibold' : 'text-dark/70' ?> text-sm font-medium hover:text-maroon transition-colors tracking-wide">Services</a>
                <a href="/astro/pages/horoscope.php" class="nav-link <?= $currentPage === 'horoscope' ? 'text-maroon font-semibold' : 'text-dark/70' ?> text-sm font-medium hover:text-maroon transition-colors tracking-wide">Horoscope</a>
                <a href="/astro/pages/blogs.php" class="nav-link <?= $currentPage === 'blogs' ? 'text-maroon font-semibold' : 'text-dark/70' ?> text-sm font-medium hover:text-maroon transition-colors tracking-wide">Blogs</a>
                <a href="/astro/pages/contact.php" class="nav-link <?= $currentPage === 'contact' ? 'text-maroon font-semibold' : 'text-dark/70' ?> text-sm font-medium hover:text-maroon transition-colors tracking-wide">Contact</a>
            </nav>

            <!-- CTA Button -->
            <div class="hidden lg:flex items-center">
                <a href="/astro/pages/contact.php" class="inline-flex items-center gap-2 bg-gold hover:bg-gold/90 text-white text-sm font-semibold px-5 py-2.5 rounded-full shadow-md hover:shadow-lg transition-all duration-200 group">
                    Book consultation
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>

            <!-- Mobile Hamburger -->
            <button id="mobile-menu-btn" class="lg:hidden p-2 rounded-lg text-maroon hover:bg-maroon/10 transition-colors" aria-label="Toggle menu">
                <svg id="hamburger-icon" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg id="close-icon" class="w-6 h-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="lg:hidden hidden border-t border-border py-4 pb-6">
            <nav class="flex flex-col gap-1">
                <a href="/astro/index.php" class="px-3 py-2.5 text-sm font-medium text-dark/80 hover:text-maroon hover:bg-maroon/5 rounded-lg transition-colors">Home</a>
                <a href="/astro/pages/about.php" class="px-3 py-2.5 text-sm font-medium text-dark/80 hover:text-maroon hover:bg-maroon/5 rounded-lg transition-colors">About Us</a>
                <a href="/astro/pages/services.php" class="px-3 py-2.5 text-sm font-medium text-dark/80 hover:text-maroon hover:bg-maroon/5 rounded-lg transition-colors">Services</a>
                <a href="/astro/pages/horoscope.php" class="px-3 py-2.5 text-sm font-medium text-dark/80 hover:text-maroon hover:bg-maroon/5 rounded-lg transition-colors">Horoscope</a>
                <a href="/astro/pages/blogs.php" class="px-3 py-2.5 text-sm font-medium text-dark/80 hover:text-maroon hover:bg-maroon/5 rounded-lg transition-colors">Blogs</a>
                <a href="/astro/pages/contact.php" class="px-3 py-2.5 text-sm font-medium text-dark/80 hover:text-maroon hover:bg-maroon/5 rounded-lg transition-colors">Contact</a>
                <div class="pt-3 px-3">
                    <a href="/astro/pages/contact.php" class="flex items-center justify-center gap-2 bg-gold text-white text-sm font-semibold px-5 py-3 rounded-full shadow-md w-full">
                        Book consultation
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </nav>
        </div>
    </div>
</header>

<script>
    const btn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');
    const hamburger = document.getElementById('hamburger-icon');
    const closeIcon = document.getElementById('close-icon');
    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
        hamburger.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    });
</script>

