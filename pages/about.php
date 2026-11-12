<?php
// pages/about.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="About AstroJyoti - Meet your Vedic astrologer with 24+ years of experience in Jyotish, palmistry and spiritual guidance.">
    <title>About Us — AstroJyoti</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: { maroon: '#4A0E1A', 'maroon-dark': '#3D0A14', gold: '#D4A017', cream: '#FAF7F2', 'cream-dark': '#F5F0E8', dark: '#1A0A0A', border: '#E8DDD0' },
                    fontFamily: { playfair: ['"Playfair Display"', 'Georgia', 'serif'], inter: ['Inter', 'sans-serif'], sans: ['Inter', 'sans-serif'] }
                }
            }
        }
    </script>
    <style>* { box-sizing: border-box; } html { scroll-behavior: smooth; } body { font-family: 'Inter', sans-serif; color: #1A0A0A; } .fill-gold { fill: #D4A017; }</style>
</head>
<body class="bg-cream">
    <?php include __DIR__ . '/../components/navbar.php'; ?>

    <!-- Page Hero -->
    <section class="bg-maroon py-20 relative overflow-hidden">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle, rgba(212,160,23,0.08) 1px, transparent 1px); background-size: 50px 50px;"></div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="flex items-center justify-center gap-3 mb-4">
                <div class="h-px w-8 bg-gold/50"></div>
                <span class="text-gold/80 text-xs font-semibold tracking-[0.2em] uppercase font-inter">The Astrologer</span>
                <div class="h-px w-8 bg-gold/50"></div>
            </div>
            <h1 class="font-playfair text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-4">
                About <span class="text-gold italic">AstroJyoti</span>
            </h1>
            <p class="text-white/60 font-inter text-lg max-w-2xl mx-auto">
                Where ancient wisdom meets a genuinely personal conversation.
            </p>
        </div>
    </section>

    <!-- Main About Content -->
    <section class="py-20 lg:py-28">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-start">

                <!-- Image Column -->
                <div class="relative">
                    <div class="absolute -inset-3 bg-maroon/5 rounded-3xl rotate-1"></div>
                    <div class="relative rounded-2xl overflow-hidden border border-border shadow-xl aspect-[4/5]">
                        <img
                            src="/astro/assets/WhatsApp Image 2026-11-06 2at 2.39.56 PM.jpeg"
                            alt="Your Astrologer"
                            class="w-full h-full object-cover object-top"
                            onerror="this.onerror=null; this.parentElement.style.background='linear-gradient(135deg, #FAF0E6, #E8DDD0)'; this.style.display='none';"
                        >
                    </div>
                    <div class="absolute -bottom-5 -right-5 bg-maroon text-white rounded-2xl shadow-xl px-5 py-4 border border-gold/20">
                        <div class="font-playfair font-bold text-3xl text-gold leading-none">24+</div>
                        <div class="text-white/70 text-xs font-inter mt-1">Years of<br>Vedic Practice</div>
                    </div>
                </div>

                <!-- Content Column -->
                <div class="pt-4">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="h-px w-8 bg-gold"></div>
                        <span class="text-gold text-xs font-semibold tracking-[0.2em] uppercase font-inter">The Practitioner</span>
                    </div>
                    <h2 class="font-playfair text-3xl sm:text-4xl font-bold text-dark leading-tight mb-6">
                        Pt. Rajesh Sharma<br>
                        <span class="text-maroon/70 text-2xl italic font-normal">Jyotish Acharya</span>
                    </h2>
                    <div class="space-y-4 text-dark/65 font-inter text-base leading-relaxed mb-8">
                        <p>
                            Born into a family with a deep connection to Vedic tradition, Pt. Rajesh Sharma began his formal study of Jyotish at the age of fourteen under the guidance of his grandfather — a respected astrologer in the traditional lineage. What began as a family inheritance grew, over decades, into a living practice.
                        </p>
                        <p>
                            Over the past 24 years, he has offered guidance to hundreds of individuals at crossroads — career transitions, marriage decisions, health concerns, and moments of simply not knowing which direction to take. Each consultation is treated not as a reading, but as a conversation.
                        </p>
                        <p>
                            His approach is rooted in the classical Parashari system of Vedic astrology, complemented by his expertise in palmistry and planetary remedies. He does not make predictions without context. He does not offer false comfort. He speaks honestly, and listens before he speaks.
                        </p>
                        <p>
                            Consultations are available in Hindi and English, in person and online.
                        </p>
                    </div>

                    <!-- Expertise Tags -->
                    <div class="flex flex-wrap gap-2.5 mb-8">
                        <?php $tags = ['Parashari Jyotish', 'Kundli Analysis', 'Palmistry', 'Gemstone Guidance', 'Marriage Matching', 'Pooja & Remedies', 'Career Guidance', 'Planetary Transits']; ?>
                        <?php foreach ($tags as $tag): ?>
                        <span class="bg-maroon/8 text-maroon text-xs font-semibold px-3.5 py-1.5 rounded-full border border-maroon/15 font-inter"><?= htmlspecialchars($tag) ?></span>
                        <?php endforeach; ?>
                    </div>

                    <a href="/astro/pages/contact.php" class="inline-flex items-center gap-2 bg-gold hover:bg-gold/90 text-white font-semibold px-6 py-3 rounded-full text-sm shadow-md transition-colors group">
                        Book a consultation
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Philosophy Section -->
    <section class="bg-maroon py-16 lg:py-24">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="flex items-center justify-center gap-3 mb-6">
                <div class="h-px w-8 bg-gold/50"></div>
                <span class="text-gold/80 text-xs font-semibold tracking-[0.2em] uppercase font-inter">The Philosophy</span>
                <div class="h-px w-8 bg-gold/50"></div>
            </div>
            <blockquote class="font-playfair text-2xl sm:text-3xl lg:text-4xl font-bold text-white italic leading-relaxed mb-6">
                "Astrology does not take away your choices. It simply offers you a better map."
            </blockquote>
            <p class="text-white/50 font-inter text-sm">— Pt. Rajesh Sharma</p>
        </div>
    </section>

    <!-- Values Section -->
    <section class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <div class="flex items-center justify-center gap-3 mb-4">
                    <div class="h-px w-8 bg-gold"></div>
                    <span class="text-gold text-xs font-semibold tracking-[0.2em] uppercase font-inter">How We Work</span>
                    <div class="h-px w-8 bg-gold"></div>
                </div>
                <h2 class="font-playfair text-3xl sm:text-4xl font-bold text-dark">The values that guide every consultation</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php
                $values = [
                    ['icon' => 'fa-ear-listen', 'title' => 'Listening First', 'desc' => 'Every session begins with understanding where you are, not jumping into the chart. Your context shapes the reading.'],
                    ['icon' => 'fa-shield-halved', 'title' => 'Honest Guidance', 'desc' => 'No false comfort. No fear-mongering. The truth is shared with care, but it is shared.'],
                    ['icon' => 'fa-lock', 'title' => 'Complete Confidence', 'desc' => 'What you share in a session stays there. There is no judgment, and no information is ever disclosed.'],
                    ['icon' => 'fa-clock', 'title' => 'Unhurried Pace', 'desc' => 'Consultations are not rushed. Sixty to ninety minutes is set aside, with the possibility of going further if needed.'],
                    ['icon' => 'fa-language', 'title' => 'Your Language', 'desc' => 'Sessions are available in Hindi and English. We meet you where you are most comfortable.'],
                    ['icon' => 'fa-globe', 'title' => 'Available Everywhere', 'desc' => 'In-person or online — the depth of the conversation does not change based on how you connect.'],
                ];
                ?>
                <?php foreach ($values as $v): ?>
                <div class="bg-cream border border-border rounded-2xl p-6 hover:shadow-md transition-shadow">
                    <div class="w-10 h-10 rounded-full bg-maroon/10 flex items-center justify-center mb-4">
                        <i class="fas <?= $v['icon'] ?> text-gold text-sm"></i>
                    </div>
                    <h3 class="font-playfair font-bold text-dark text-lg mb-2"><?= htmlspecialchars($v['title']) ?></h3>
                    <p class="text-dark/60 font-inter text-sm leading-relaxed"><?= htmlspecialchars($v['desc']) ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php include __DIR__ . '/../components/cta.php'; ?>
    <?php include __DIR__ . '/../components/footer.php'; ?>
</body>
</html>

