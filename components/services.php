<?php
// services.php — Services Section
require_once __DIR__ . '/../config/database.php';

$db = getDB();
$result = $db->query("SELECT * FROM services ORDER BY sort_order ASC");
$services = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $services[] = $row;
    }
}
$db->close();

// Split into two rows: 3 + 2
$row1 = array_slice($services, 0, 3);
$row2 = array_slice($services, 3);
?>

<section class="bg-cream py-20 lg:py-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header -->
        <div class="max-w-2xl mb-14">
            <div class="flex items-center gap-3 mb-4">
                <div class="h-px w-8 bg-gold"></div>
                <span class="text-gold text-xs font-semibold tracking-[0.2em] uppercase font-inter">Where Shall We Begin?</span>
            </div>
            <h2 class="font-playfair text-3xl sm:text-4xl lg:text-5xl font-bold text-dark leading-tight mb-4">
                Guidance for the questions<br>
                <span class="text-maroon italic">on your mind</span>
            </h2>
            <p class="text-dark/60 font-inter text-base leading-relaxed">
                Each service is offered with care and intention. Choose what resonates, or reach out and we will guide you to what fits best.
            </p>
        </div>

        <?php if (empty($services)): ?>
        <!-- Fallback static content if DB not set up -->
        <div class="text-center py-12">
            <p class="text-dark/50 font-inter">Services will appear here once the database is set up.</p>
            <a href="/astro/pages/contact.php" class="inline-flex items-center gap-2 mt-4 bg-gold text-white px-6 py-2.5 rounded-full text-sm font-semibold">Book a consultation</a>
        </div>
        <?php else: ?>

        <!-- First Row: 3 cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            <?php foreach ($row1 as $service): ?>
            <article class="bg-white rounded-2xl overflow-hidden border border-border shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group flex flex-col">
                <!-- Service Image -->
                <div class="relative h-52 overflow-hidden bg-cream">
                    <img
                        src="/astro/<?= htmlspecialchars($service['image']) ?>"
                        alt="<?= htmlspecialchars($service['name']) ?>"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        onerror="this.onerror=null; this.parentElement.style.background='linear-gradient(135deg, #FAF0E6, #E8DDD0)'; this.style.display='none';"
                    >
                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-maroon/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>

                <!-- Card Content -->
                <div class="p-6 flex flex-col flex-grow">
                    <div class="mb-3">
                        <h3 class="font-playfair text-xl font-bold text-dark mb-1 group-hover:text-maroon transition-colors">
                            <?= htmlspecialchars($service['name']) ?>
                        </h3>
                        <p class="text-gold text-sm font-inter font-medium"><?= htmlspecialchars($service['name_hindi']) ?></p>
                    </div>
                    <p class="text-dark/60 text-sm font-inter leading-relaxed mb-5 flex-grow">
                        <?= htmlspecialchars($service['description']) ?>
                    </p>
                    <a href="/astro/pages/services.php?service=<?= urlencode($service['slug']) ?>" class="inline-flex items-center gap-1.5 text-maroon text-sm font-semibold group/link self-start mt-auto">
                        <span class="border-b border-maroon/30 group-hover/link:border-maroon pb-0.5 transition-colors">Explore the service</span>
                        <svg class="w-3.5 h-3.5 group-hover/link:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>

        <!-- Second Row: 2 cards (centered) -->
        <?php if (!empty($row2)): ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 lg:max-w-2xl lg:mx-auto">
            <?php foreach ($row2 as $service): ?>
            <article class="bg-white rounded-2xl overflow-hidden border border-border shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group flex flex-col">
                <div class="relative h-52 overflow-hidden bg-cream">
                    <img
                        src="/astro/<?= htmlspecialchars($service['image']) ?>"
                        alt="<?= htmlspecialchars($service['name']) ?>"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        onerror="this.onerror=null; this.parentElement.style.background='linear-gradient(135deg, #FAF0E6, #E8DDD0)'; this.style.display='none';"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-maroon/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <div class="mb-3">
                        <h3 class="font-playfair text-xl font-bold text-dark mb-1 group-hover:text-maroon transition-colors">
                            <?= htmlspecialchars($service['name']) ?>
                        </h3>
                        <p class="text-gold text-sm font-inter font-medium"><?= htmlspecialchars($service['name_hindi']) ?></p>
                    </div>
                    <p class="text-dark/60 text-sm font-inter leading-relaxed mb-5 flex-grow">
                        <?= htmlspecialchars($service['description']) ?>
                    </p>
                    <a href="/astro/pages/services.php?service=<?= urlencode($service['slug']) ?>" class="inline-flex items-center gap-1.5 text-maroon text-sm font-semibold group/link self-start mt-auto">
                        <span class="border-b border-maroon/30 group-hover/link:border-maroon pb-0.5 transition-colors">Explore the service</span>
                        <svg class="w-3.5 h-3.5 group-hover/link:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php endif; ?>

        <!-- Bottom CTA -->
        <div class="mt-12 text-center">
            <p class="text-dark/50 text-sm font-inter mb-4">Not sure which service is right for you?</p>
            <a href="/astro/pages/contact.php" class="inline-flex items-center gap-2 border border-maroon text-maroon hover:bg-maroon hover:text-white font-semibold px-6 py-2.5 rounded-full text-sm transition-all duration-200">
                Let's talk first
            </a>
        </div>

    </div>
</section>

