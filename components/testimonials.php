<?php
// testimonials.php — Testimonials Section
require_once __DIR__ . '/../config/database.php';

$db = getDB();
$result = $db->query("SELECT * FROM testimonials ORDER BY id ASC LIMIT 4");
$testimonials = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $testimonials[] = $row;
    }
}
$db->close();
?>

<section class="bg-cream py-20 lg:py-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header -->
        <div class="text-center max-w-2xl mx-auto mb-14">
            <div class="flex items-center justify-center gap-3 mb-4">
                <div class="h-px w-8 bg-gold"></div>
                <span class="text-gold text-xs font-semibold tracking-[0.2em] uppercase font-inter">Kind Words, Shared with Permission</span>
                <div class="h-px w-8 bg-gold"></div>
            </div>
            <h2 class="font-playfair text-3xl sm:text-4xl lg:text-5xl font-bold text-dark leading-tight">
                A little more clarity,<br>
                <span class="text-maroon italic">a little more calm</span>
            </h2>
        </div>

        <!-- Testimonial Cards -->
        <?php if (!empty($testimonials)): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl mx-auto">
            <?php foreach ($testimonials as $t): ?>
            <div class="bg-white border border-border rounded-2xl p-6 lg:p-8 shadow-sm hover:shadow-md transition-shadow relative">
                <!-- Quote icon -->
                <div class="absolute top-6 right-6 text-gold/20">
                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                    </svg>
                </div>

                <!-- Stars -->
                <div class="flex gap-1 mb-4">
                    <?php for ($i = 0; $i < $t['rating']; $i++): ?>
                    <svg class="w-4 h-4 text-gold fill-gold" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <?php endfor; ?>
                </div>

                <!-- Review text -->
                <blockquote class="text-dark/70 font-inter text-sm leading-relaxed mb-6 italic">
                    "<?= htmlspecialchars($t['review']) ?>"
                </blockquote>

                <!-- Author -->
                <div class="flex items-center gap-3 pt-4 border-t border-border">
                    <div class="w-10 h-10 rounded-full bg-maroon/10 flex items-center justify-center">
                        <span class="font-playfair font-bold text-maroon"><?= strtoupper(substr($t['name'], 0, 1)) ?></span>
                    </div>
                    <div>
                        <div class="font-semibold text-dark text-sm font-inter"><?= htmlspecialchars($t['name']) ?></div>
                        <div class="text-dark/40 text-xs font-inter flex items-center gap-1 mt-0.5">
                            <i class="fas fa-map-marker-alt text-gold text-xs"></i>
                            <?= htmlspecialchars($t['location']) ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <div class="text-center py-12">
            <p class="text-dark/50 font-inter">Testimonials will appear here once the database is set up.</p>
        </div>
        <?php endif; ?>

        <!-- Trust note -->
        <div class="text-center mt-10">
            <p class="text-dark/40 text-xs font-inter">All testimonials are shared with the kind permission of our clients. Names and locations are used as given.</p>
        </div>

    </div>
</section>

