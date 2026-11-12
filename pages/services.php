<?php
// pages/services.php
require_once __DIR__ . '/../config/database.php';

$db = getDB();
$services = [];
$result = $db->query("SELECT * FROM services ORDER BY sort_order ASC");
if ($result) { while ($row = $result->fetch_assoc()) $services[] = $row; }

// If a specific service is requested via slug
$slug = isset($_GET['service']) ? trim($_GET['service']) : '';
$selectedService = null;
if ($slug) {
    $stmt = $db->prepare("SELECT * FROM services WHERE slug = ?");
    $stmt->bind_param("s", $slug);
    $stmt->execute();
    $r = $stmt->get_result();
    if ($r) $selectedService = $r->fetch_assoc();
    $stmt->close();
}
$db->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services — AstroJyoti</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: { maroon: '#4A0E1A', gold: '#D4A017', cream: '#FAF7F2', dark: '#1A0A0A', border: '#E8DDD0' },
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
                <span class="text-gold/80 text-xs font-semibold tracking-[0.2em] uppercase font-inter">What We Offer</span>
                <div class="h-px w-8 bg-gold/50"></div>
            </div>
            <h1 class="font-playfair text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-4">
                Our <span class="text-gold italic">Services</span>
            </h1>
            <p class="text-white/60 font-inter text-lg max-w-2xl mx-auto">
                Each offering is an invitation to look inward — through the language of the cosmos.
            </p>
        </div>
    </section>

    <?php if ($selectedService): ?>
    <!-- Single Service Detail -->
    <section class="py-20 lg:py-28">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="/astro/pages/services.php" class="inline-flex items-center gap-2 text-maroon/70 hover:text-maroon text-sm font-inter mb-8 transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                Back to all services
            </a>
            <div class="grid lg:grid-cols-2 gap-12 items-start">
                <div class="rounded-2xl overflow-hidden aspect-[4/3] border border-border shadow-lg">
                    <img src="/astro/<?= htmlspecialchars($selectedService['image']) ?>" alt="<?= htmlspecialchars($selectedService['name']) ?>" class="w-full h-full object-cover"
                        onerror="this.onerror=null; this.parentElement.style.background='linear-gradient(135deg, #FAF0E6, #E8DDD0)'; this.style.display='none';">
                </div>
                <div>
                    <span class="text-gold font-inter text-sm font-medium"><?= htmlspecialchars($selectedService['name_hindi']) ?></span>
                    <h2 class="font-playfair text-3xl sm:text-4xl font-bold text-dark mt-2 mb-5"><?= htmlspecialchars($selectedService['name']) ?></h2>
                    <p class="text-dark/65 font-inter text-base leading-relaxed mb-6"><?= htmlspecialchars($selectedService['description']) ?></p>
                    <p class="text-dark/60 font-inter text-sm leading-relaxed mb-8">Every session begins with a conversation. No charts until we know where you are coming from. After the consultation, written notes are shared for reference.</p>
                    <a href="/astro/pages/contact.php" class="inline-flex items-center gap-2 bg-gold hover:bg-gold/90 text-white font-semibold px-6 py-3.5 rounded-full text-sm shadow-md transition-colors group">
                        Book this consultation
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Other Services -->
    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h3 class="font-playfair text-2xl font-bold text-dark mb-8">Other Services</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                <?php foreach ($services as $s): if ($s['id'] === $selectedService['id']) continue; ?>
                <a href="/astro/pages/services.php?service=<?= urlencode($s['slug']) ?>" class="block group border border-border rounded-xl overflow-hidden hover:shadow-md transition-shadow">
                    <div class="h-32 bg-cream overflow-hidden">
                        <img src="/astro/<?= htmlspecialchars($s['image']) ?>" alt="<?= htmlspecialchars($s['name']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                            onerror="this.onerror=null; this.parentElement.style.background='linear-gradient(135deg, #FAF0E6, #E8DDD0)'; this.style.display='none';">
                    </div>
                    <div class="p-4">
                        <div class="font-playfair font-semibold text-dark text-sm group-hover:text-maroon transition-colors"><?= htmlspecialchars($s['name']) ?></div>
                        <div class="text-gold text-xs font-inter mt-0.5"><?= htmlspecialchars($s['name_hindi']) ?></div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php else: ?>
    <!-- All Services Grid -->
    <section class="py-20 lg:py-28">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <?php
            $row1 = array_slice($services, 0, 3);
            $row2 = array_slice($services, 3);
            ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                <?php foreach ($row1 as $service): ?>
                <article class="bg-white rounded-2xl overflow-hidden border border-border shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group flex flex-col">
                    <div class="relative h-56 overflow-hidden bg-cream">
                        <img src="/astro/<?= htmlspecialchars($service['image']) ?>" alt="<?= htmlspecialchars($service['name']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            onerror="this.onerror=null; this.parentElement.style.background='linear-gradient(135deg, #FAF0E6, #E8DDD0)'; this.style.display='none';">
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="font-playfair text-xl font-bold text-dark mb-1 group-hover:text-maroon transition-colors"><?= htmlspecialchars($service['name']) ?></h3>
                        <p class="text-gold text-sm font-inter font-medium mb-3"><?= htmlspecialchars($service['name_hindi']) ?></p>
                        <p class="text-dark/60 text-sm font-inter leading-relaxed mb-5 flex-grow"><?= htmlspecialchars($service['description']) ?></p>
                        <a href="/astro/pages/services.php?service=<?= urlencode($service['slug']) ?>" class="inline-flex items-center gap-1.5 text-maroon text-sm font-semibold group/link">
                            <span class="border-b border-maroon/30 group-hover/link:border-maroon pb-0.5 transition-colors">Explore the service</span>
                            <svg class="w-3.5 h-3.5 group-hover/link:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
            <?php if (!empty($row2)): ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 lg:max-w-2xl lg:mx-auto">
                <?php foreach ($row2 as $service): ?>
                <article class="bg-white rounded-2xl overflow-hidden border border-border shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group flex flex-col">
                    <div class="relative h-56 overflow-hidden bg-cream">
                        <img src="/astro/<?= htmlspecialchars($service['image']) ?>" alt="<?= htmlspecialchars($service['name']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            onerror="this.onerror=null; this.parentElement.style.background='linear-gradient(135deg, #FAF0E6, #E8DDD0)'; this.style.display='none';">
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="font-playfair text-xl font-bold text-dark mb-1 group-hover:text-maroon transition-colors"><?= htmlspecialchars($service['name']) ?></h3>
                        <p class="text-gold text-sm font-inter font-medium mb-3"><?= htmlspecialchars($service['name_hindi']) ?></p>
                        <p class="text-dark/60 text-sm font-inter leading-relaxed mb-5 flex-grow"><?= htmlspecialchars($service['description']) ?></p>
                        <a href="/astro/pages/services.php?service=<?= urlencode($service['slug']) ?>" class="inline-flex items-center gap-1.5 text-maroon text-sm font-semibold group/link">
                            <span class="border-b border-maroon/30 group-hover/link:border-maroon pb-0.5 transition-colors">Explore the service</span>
                            <svg class="w-3.5 h-3.5 group-hover/link:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php include __DIR__ . '/../components/cta.php'; ?>
    <?php include __DIR__ . '/../components/footer.php'; ?>
</body>
</html>

