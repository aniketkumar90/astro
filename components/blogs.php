<?php
// blogs.php — Blog Section
require_once __DIR__ . '/../config/database.php';

$db = getDB();
$result = $db->query("SELECT * FROM blogs ORDER BY created_at DESC LIMIT 3");
$blogs = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $blogs[] = $row;
    }
}
$db->close();
?>

<section class="bg-white py-20 lg:py-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header -->
        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-12">
            <div class="max-w-xl">
                <div class="flex items-center gap-3 mb-4">
                    <div class="h-px w-8 bg-gold"></div>
                    <span class="text-gold text-xs font-semibold tracking-[0.2em] uppercase font-inter">The AstroJyoti Journal</span>
                </div>
                <h2 class="font-playfair text-3xl sm:text-4xl lg:text-5xl font-bold text-dark leading-tight">
                    Thoughtful notes on<br>
                    <span class="text-maroon italic">the stars and life</span>
                </h2>
            </div>
            <a href="/astro/pages/blogs.php" class="inline-flex items-center gap-2 text-maroon font-semibold text-sm group self-start sm:self-auto sm:mb-2">
                <span class="border-b border-maroon/30 group-hover:border-maroon pb-0.5 transition-colors whitespace-nowrap">Read the journal</span>
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

        <!-- Blog Cards -->
        <?php if (!empty($blogs)): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($blogs as $blog): ?>
            <article class="group flex flex-col bg-white border border-border rounded-2xl overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <!-- Image -->
                <div class="relative h-48 overflow-hidden bg-cream">
                    <img
                        src="/astro/<?= htmlspecialchars($blog['image']) ?>"
                        alt="<?= htmlspecialchars($blog['title']) ?>"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        onerror="this.onerror=null; this.parentElement.style.background='linear-gradient(135deg, #FAF0E6, #E8DDD0)'; this.style.display='none';"
                    >
                    <!-- Category Badge -->
                    <div class="absolute top-3 left-3">
                        <span class="bg-maroon text-white text-xs font-semibold px-3 py-1 rounded-full font-inter">
                            <?= htmlspecialchars($blog['category']) ?>
                        </span>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="font-playfair text-lg font-bold text-dark mb-3 leading-tight group-hover:text-maroon transition-colors">
                        <?= htmlspecialchars($blog['title']) ?>
                    </h3>
                    <p class="text-dark/60 text-sm font-inter leading-relaxed mb-5 flex-grow">
                        <?= htmlspecialchars(substr($blog['excerpt'], 0, 140)) ?>...
                    </p>

                    <!-- Footer -->
                    <div class="flex items-center justify-between pt-4 border-t border-border">
                        <div class="flex items-center gap-2 text-dark/40 text-xs font-inter">
                            <i class="far fa-calendar text-xs"></i>
                            <span><?= date('d M Y', strtotime($blog['created_at'])) ?></span>
                        </div>
                        <div class="flex items-center gap-1 text-dark/40 text-xs font-inter">
                            <i class="far fa-clock text-xs"></i>
                            <span><?= $blog['read_time'] ?> min read</span>
                        </div>
                    </div>

                    <a href="/astro/pages/blogs.php?slug=<?= urlencode($blog['slug']) ?>" class="inline-flex items-center gap-1.5 text-maroon text-sm font-semibold mt-4 group/link">
                        <span class="border-b border-maroon/30 group-hover/link:border-maroon pb-0.5 transition-colors">Read more</span>
                        <svg class="w-3.5 h-3.5 group-hover/link:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <div class="text-center py-12">
            <p class="text-dark/50 font-inter">Blog posts will appear here once the database is set up.</p>
        </div>
        <?php endif; ?>

    </div>
</section>

