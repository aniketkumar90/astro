<?php
// pages/horoscope.php
require_once __DIR__ . '/../config/database.php';

$db = getDB();
$signs = [];
$result = $db->query("SELECT * FROM horoscopes ORDER BY sign_order ASC");
if ($result) { while ($row = $result->fetch_assoc()) $signs[] = $row; }

// If a specific sign is selected
$selectedSign = null;
$signParam = isset($_GET['sign']) ? trim($_GET['sign']) : '';
$periodParam = isset($_GET['period']) ? trim($_GET['period']) : 'daily';
$validPeriods = ['daily', 'weekly', 'monthly', 'yearly'];
if (!in_array($periodParam, $validPeriods)) $periodParam = 'daily';

if ($signParam) {
    $stmt = $db->prepare("SELECT * FROM horoscopes WHERE sign = ?");
    $stmt->bind_param("s", $signParam);
    $stmt->execute();
    $r = $stmt->get_result();
    if ($r) $selectedSign = $r->fetch_assoc();
    $stmt->close();
}
$db->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horoscope — AstroJyoti</title>
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
                <span class="text-gold/80 text-xs font-semibold tracking-[0.2em] uppercase font-inter">Your Celestial Body</span>
                <div class="h-px w-8 bg-gold/50"></div>
            </div>
            <h1 class="font-playfair text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-4">
                Daily <span class="text-gold italic">Horoscope</span>
            </h1>
            <p class="text-white/60 font-inter text-lg max-w-2xl mx-auto">
                A little perspective from the stars. Choose your sign and a timeframe.
            </p>
        </div>
    </section>

    <!-- Full Horoscope Page -->
    <section class="py-16 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Period Tabs -->
            <div class="flex justify-center mb-10">
                <div class="inline-flex bg-white border border-border rounded-full p-1 gap-1 shadow-sm">
                    <?php foreach (['daily' => 'Daily', 'weekly' => 'Weekly', 'monthly' => 'Monthly', 'yearly' => 'Yearly'] as $key => $label): ?>
                    <a href="?<?= $signParam ? 'sign='.urlencode($signParam).'&' : '' ?>period=<?= $key ?>"
                       class="px-5 py-2 rounded-full text-sm font-semibold transition-all duration-200 font-inter <?= $periodParam === $key ? 'bg-maroon text-white shadow-md' : 'text-dark/60 hover:text-maroon' ?>">
                        <?= $label ?>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php if ($selectedSign): ?>
            <!-- Single Sign Reading -->
            <div class="max-w-3xl mx-auto">
                <a href="/astro/pages/horoscope.php?period=<?= $periodParam ?>" class="inline-flex items-center gap-2 text-maroon/70 hover:text-maroon text-sm font-inter mb-8 transition-colors">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                    All signs
                </a>
                <div class="bg-white border border-border rounded-2xl p-8 lg:p-10 shadow-sm">
                    <div class="flex items-center gap-6 mb-8">
                        <div class="text-6xl"><?= $selectedSign['symbol'] ?></div>
                        <div>
                            <div class="font-playfair text-3xl font-bold text-dark"><?= htmlspecialchars($selectedSign['sign']) ?></div>
                            <div class="text-gold font-inter text-lg mt-1"><?= htmlspecialchars($selectedSign['sign_hindi']) ?></div>
                            <span class="inline-block mt-2 bg-maroon/10 text-maroon text-xs font-semibold px-3 py-1 rounded-full font-inter"><?= ucfirst($periodParam) ?> Reading</span>
                        </div>
                    </div>
                    <div class="border-t border-border pt-6">
                        <p class="text-dark/70 font-inter text-base leading-loose">
                            <?= htmlspecialchars($selectedSign[$periodParam . '_reading']) ?>
                        </p>
                    </div>
                    <div class="mt-8 pt-6 border-t border-border">
                        <p class="text-dark/50 text-sm font-inter mb-4">Want a personalised reading based on your complete birth chart?</p>
                        <a href="/astro/pages/contact.php" class="inline-flex items-center gap-2 bg-gold hover:bg-gold/90 text-white font-semibold px-6 py-3 rounded-full text-sm shadow-md transition-colors group">
                            Book a consultation
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <?php else: ?>
            <!-- All Signs Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3">
                <?php foreach ($signs as $sign): ?>
                <a href="?sign=<?= urlencode($sign['sign']) ?>&period=<?= $periodParam ?>"
                   class="group flex flex-col items-center gap-2 p-4 bg-white border border-border rounded-2xl hover:border-gold hover:bg-gold/5 hover:shadow-md transition-all duration-200 text-center">
                    <span class="text-3xl group-hover:scale-110 transition-transform duration-200"><?= $sign['symbol'] ?></span>
                    <div>
                        <div class="font-playfair font-bold text-dark text-sm group-hover:text-maroon transition-colors"><?= htmlspecialchars($sign['sign']) ?></div>
                        <div class="text-gold text-xs font-inter mt-0.5"><?= htmlspecialchars($sign['sign_hindi']) ?></div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>

            <!-- Info Card -->
            <div class="mt-12 bg-maroon/5 border border-maroon/15 rounded-2xl p-6 lg:p-8 max-w-3xl mx-auto">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-full bg-maroon/10 flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-info text-gold text-sm"></i>
                    </div>
                    <div>
                        <h3 class="font-playfair font-bold text-dark text-lg mb-2">A note on horoscopes</h3>
                        <p class="text-dark/60 font-inter text-sm leading-relaxed">
                            These readings are based on general planetary positions for each sign. For a personalised reading that accounts for your exact birth chart, rising sign, and current transits, a one-on-one consultation will offer much more depth and accuracy.
                        </p>
                        <a href="/astro/pages/contact.php" class="inline-flex items-center gap-1.5 text-maroon text-sm font-semibold mt-3">
                            Book a personal reading →
                        </a>
                    </div>
                </div>
            </div>
            <?php endif; ?>

        </div>
    </section>

    <?php include __DIR__ . '/../components/footer.php'; ?>
</body>
</html>

