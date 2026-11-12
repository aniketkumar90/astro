<?php
// pages/blogs.php
require_once __DIR__ . '/../config/database.php';

$db = getDB();
$blogs = [];

// If a specific blog slug is requested
$slug = isset($_GET['slug']) ? trim($_GET['slug']) : '';
$selectedBlog = null;

if ($slug) {
    $stmt = $db->prepare("SELECT * FROM blogs WHERE slug = ?");
    $stmt->bind_param("s", $slug);
    $stmt->execute();
    $r = $stmt->get_result();
    if ($r) $selectedBlog = $r->fetch_assoc();
    $stmt->close();
} else {
    $result = $db->query("SELECT * FROM blogs ORDER BY created_at DESC");
    if ($result) { while ($row = $result->fetch_assoc()) $blogs[] = $row; }
}
$db->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $selectedBlog ? htmlspecialchars($selectedBlog['title']).' — ' : '' ?>Journal — AstroJyoti</title>
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
                <span class="text-gold/80 text-xs font-semibold tracking-[0.2em] uppercase font-inter">The AstroJyoti Journal</span>
                <div class="h-px w-8 bg-gold/50"></div>
            </div>
            <h1 class="font-playfair text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-4">
                <?php if ($selectedBlog): ?>
                    <span class="text-gold italic"><?= htmlspecialchars($selectedBlog['title']) ?></span>
                <?php else: ?>
                    Thoughtful notes on<br><span class="text-gold italic">the stars and life</span>
                <?php endif; ?>
            </h1>
        </div>
    </section>

    <?php if ($selectedBlog): ?>
    <!-- Single Blog Post -->
    <article class="py-16 lg:py-24">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="/astro/pages/blogs.php" class="inline-flex items-center gap-2 text-maroon/70 hover:text-maroon text-sm font-inter mb-8 transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                Back to journal
            </a>

            <div class="flex items-center gap-3 mb-6">
                <span class="bg-maroon text-white text-xs font-semibold px-3 py-1 rounded-full font-inter"><?= htmlspecialchars($selectedBlog['category']) ?></span>
                <span class="text-dark/40 text-xs font-inter"><?= date('d M Y', strtotime($selectedBlog['created_at'])) ?></span>
                <span class="text-dark/40 text-xs font-inter">· <?= $selectedBlog['read_time'] ?> min read</span>
            </div>

            <div class="rounded-2xl overflow-hidden aspect-video mb-10 border border-border shadow-lg">
                <img src="/astro/<?= htmlspecialchars($selectedBlog['image']) ?>" alt="<?= htmlspecialchars($selectedBlog['title']) ?>" class="w-full h-full object-cover"
                    onerror="this.onerror=null; this.parentElement.style.background='linear-gradient(135deg, #FAF0E6, #E8DDD0)'; this.style.display='none';">
            </div>

            <div class="prose prose-lg max-w-none">
                <p class="text-dark/70 font-inter text-lg leading-loose mb-6"><?= htmlspecialchars($selectedBlog['excerpt']) ?></p>
                <p class="text-dark/60 font-inter text-base leading-loose mb-4">
                    In Vedic astrology, every placement tells a story — not a fixed one, but a potential one. The chart is a map, not a verdict. What we do with the terrain is always, ultimately, our choice.
                </p>
                <p class="text-dark/60 font-inter text-base leading-loose mb-4">
                    Understanding the nuances of your chart — the conjunctions, the aspects, the dispositors — takes time and genuine study. But even a basic awareness of the key players in your chart can offer significant insight.
                </p>
                <p class="text-dark/60 font-inter text-base leading-loose">
                    If this reading has sparked something for you, the next step is a personal consultation. Bring your birth details, your questions, and your curiosity. We will find our way in together.
                </p>
            </div>

            <div class="mt-10 pt-8 border-t border-border">
                <p class="text-dark/50 font-inter text-sm mb-4">Want to explore your own chart in depth?</p>
                <a href="/astro/pages/contact.php" class="inline-flex items-center gap-2 bg-gold hover:bg-gold/90 text-white font-semibold px-6 py-3 rounded-full text-sm shadow-md transition-colors group">
                    Book a consultation
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </article>

    <?php else: ?>
    <!-- Blog Listing -->
    <section class="py-16 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <?php if (!empty($blogs)): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($blogs as $blog): ?>
                <article class="group flex flex-col bg-white border border-border rounded-2xl overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="relative h-48 overflow-hidden bg-cream">
                        <img src="/astro/<?= htmlspecialchars($blog['image']) ?>" alt="<?= htmlspecialchars($blog['title']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            onerror="this.onerror=null; this.parentElement.style.background='linear-gradient(135deg, #FAF0E6, #E8DDD0)'; this.style.display='none';">
                        <div class="absolute top-3 left-3">
                            <span class="bg-maroon text-white text-xs font-semibold px-3 py-1 rounded-full font-inter"><?= htmlspecialchars($blog['category']) ?></span>
                        </div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="font-playfair text-lg font-bold text-dark mb-3 leading-tight group-hover:text-maroon transition-colors"><?= htmlspecialchars($blog['title']) ?></h3>
                        <p class="text-dark/60 text-sm font-inter leading-relaxed mb-5 flex-grow"><?= htmlspecialchars(substr($blog['excerpt'], 0, 140)) ?>...</p>
                        <div class="flex items-center justify-between pt-4 border-t border-border mb-4">
                            <div class="flex items-center gap-2 text-dark/40 text-xs font-inter">
                                <i class="far fa-calendar text-xs"></i>
                                <span><?= date('d M Y', strtotime($blog['created_at'])) ?></span>
                            </div>
                            <div class="flex items-center gap-1 text-dark/40 text-xs font-inter">
                                <i class="far fa-clock text-xs"></i>
                                <span><?= $blog['read_time'] ?> min</span>
                            </div>
                        </div>
                        <a href="/astro/pages/blogs.php?slug=<?= urlencode($blog['slug']) ?>" class="inline-flex items-center gap-1.5 text-maroon text-sm font-semibold group/link">
                            <span class="border-b border-maroon/30 group-hover/link:border-maroon pb-0.5 transition-colors">Read more</span>
                            <svg class="w-3.5 h-3.5 group-hover/link:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
            <div class="text-center py-20">
                <p class="text-dark/40 font-inter">No blog posts yet. Check back soon.</p>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php include __DIR__ . '/../components/cta.php'; ?>
    <?php include __DIR__ . '/../components/footer.php'; ?>
</body>
</html>

