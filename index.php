<?php
// index.php — AstroJyoti Main Page
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="AstroJyoti - Vedic Astrology consultation with 24+ years of experience. Expert guidance in Kundli analysis, palm reading, gemstone consultation, and more.">
    <title>AstroJyoti — Vedic Astrology Consultation</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        maroon: '#4A0E1A',
                        'maroon-dark': '#3D0A14',
                        gold: '#D4A017',
                        'gold-light': '#E8BC3A',
                        cream: '#FAF7F2',
                        'cream-dark': '#F5F0E8',
                        dark: '#1A0A0A',
                        border: '#E8DDD0',
                    },
                    fontFamily: {
                        playfair: ['"Playfair Display"', 'Georgia', 'serif'],
                        inter: ['Inter', 'sans-serif'],
                        sans: ['Inter', 'sans-serif'],
                    },
                    fill: {
                        gold: '#D4A017',
                    }
                }
            }
        }
    </script>

    <style>
        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { font-family: 'Inter', sans-serif; color: #1A0A0A; background-color: #FAF7F2; }
        .fill-gold { fill: #D4A017; }
    </style>
</head>
<body>
    <?php include __DIR__ . '/components/navbar.php'; ?>
    <?php include __DIR__ . '/components/hero.php'; ?>
    <?php include __DIR__ . '/components/stats.php'; ?>
    <?php include __DIR__ . '/components/about.php'; ?>
    <?php include __DIR__ . '/components/services.php'; ?>
    <?php include __DIR__ . '/components/horoscope.php'; ?>
    <?php include __DIR__ . '/components/blogs.php'; ?>
    <?php include __DIR__ . '/components/cta.php'; ?>
    <?php include __DIR__ . '/components/testimonials.php'; ?>
    <?php include __DIR__ . '/components/faq.php'; ?>
    <?php include __DIR__ . '/components/footer.php'; ?>

    <!-- Scroll to top button -->
    <button
        id="scroll-top"
        onclick="window.scrollTo({top:0,behavior:'smooth'})"
        class="fixed bottom-6 right-6 w-11 h-11 bg-maroon hover:bg-maroon/90 text-white rounded-full shadow-lg flex items-center justify-center opacity-0 pointer-events-none transition-all duration-300 z-40"
        aria-label="Scroll to top"
    >
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
        </svg>
    </button>

    <script>
        // Scroll to top button visibility
        const scrollBtn = document.getElementById('scroll-top');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 400) {
                scrollBtn.classList.remove('opacity-0', 'pointer-events-none');
                scrollBtn.classList.add('opacity-100');
            } else {
                scrollBtn.classList.add('opacity-0', 'pointer-events-none');
                scrollBtn.classList.remove('opacity-100');
            }
        });
    </script>
</body>
</html>

