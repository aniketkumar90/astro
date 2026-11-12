<?php
// horoscope.php — Horoscope Section
require_once __DIR__ . '/../config/database.php';

$db = getDB();
$result = $db->query("SELECT * FROM horoscopes ORDER BY sign_order ASC");
$signs = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $signs[] = $row;
    }
}
$db->close();
?>

<section class="bg-white py-20 lg:py-28" id="horoscope">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header -->
        <div class="text-center max-w-2xl mx-auto mb-12">
            <div class="flex items-center justify-center gap-3 mb-4">
                <div class="h-px w-8 bg-gold"></div>
                <span class="text-gold text-xs font-semibold tracking-[0.2em] uppercase font-inter">Your Celestial Body</span>
                <div class="h-px w-8 bg-gold"></div>
            </div>
            <h2 class="font-playfair text-3xl sm:text-4xl lg:text-5xl font-bold text-dark leading-tight mb-4">
                A little perspective<br>
                <span class="text-maroon italic">for today</span>
            </h2>
            <p class="text-dark/60 font-inter text-base leading-relaxed">
                Select your sign and choose a timeframe to receive a thoughtful celestial perspective.
            </p>
        </div>

        <!-- Period Tabs -->
        <div class="flex justify-center mb-10">
            <div class="inline-flex bg-cream border border-border rounded-full p-1 gap-1">
                <?php foreach (['daily' => 'Daily', 'weekly' => 'Weekly', 'monthly' => 'Monthly', 'yearly' => 'Yearly'] as $key => $label): ?>
                <button
                    onclick="switchTab('<?= $key ?>')"
                    id="tab-<?= $key ?>"
                    class="horoscope-tab px-5 py-2 rounded-full text-sm font-semibold transition-all duration-200 font-inter <?= $key === 'daily' ? 'bg-maroon text-white shadow-md' : 'text-dark/60 hover:text-maroon' ?>"
                >
                    <?= $label ?>
                </button>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Zodiac Grid -->
        <?php if (!empty($signs)): ?>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3">
            <?php foreach ($signs as $sign): ?>
            <button
                onclick="showReading(<?= $sign['id'] ?>)"
                class="zodiac-card group flex flex-col items-center gap-2 p-4 bg-cream border border-border rounded-2xl hover:border-gold hover:bg-gold/5 hover:shadow-md transition-all duration-200 text-center"
                data-sign-id="<?= $sign['id'] ?>"
            >
                <span class="text-3xl group-hover:scale-110 transition-transform duration-200"><?= $sign['symbol'] ?></span>
                <div>
                    <div class="font-playfair font-bold text-dark text-sm group-hover:text-maroon transition-colors"><?= htmlspecialchars($sign['sign']) ?></div>
                    <div class="text-gold text-xs font-inter mt-0.5"><?= htmlspecialchars($sign['sign_hindi']) ?></div>
                </div>
            </button>
            <?php endforeach; ?>
        </div>

        <!-- Reading Modal / Expandable -->
        <div id="horoscope-reading" class="hidden mt-8 bg-cream border border-border rounded-2xl p-6 lg:p-8 relative">
            <button onclick="closeReading()" class="absolute top-4 right-4 w-8 h-8 rounded-full bg-white border border-border flex items-center justify-center text-dark/40 hover:text-dark transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            <div class="flex items-start gap-6">
                <div class="text-5xl" id="reading-symbol">♈</div>
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-3">
                        <h3 class="font-playfair text-2xl font-bold text-dark" id="reading-sign">Aries</h3>
                        <span class="text-gold font-inter text-sm" id="reading-hindi">मेष</span>
                        <span class="bg-maroon/10 text-maroon text-xs font-semibold px-3 py-1 rounded-full font-inter" id="reading-period">Daily</span>
                    </div>
                    <p class="text-dark/70 font-inter leading-relaxed" id="reading-text"></p>
                    <div class="mt-4 pt-4 border-t border-border">
                        <a href="/astro/pages/horoscope.php" class="inline-flex items-center gap-1.5 text-maroon text-sm font-semibold">
                            View full horoscope →
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hidden data storage -->
        <script>
        const horoscopeData = {
            <?php foreach ($signs as $sign): ?>
            <?= $sign['id'] ?>: {
                sign: "<?= addslashes($sign['sign']) ?>",
                sign_hindi: "<?= addslashes($sign['sign_hindi']) ?>",
                symbol: "<?= $sign['symbol'] ?>",
                daily: "<?= addslashes($sign['daily_reading']) ?>",
                weekly: "<?= addslashes($sign['weekly_reading']) ?>",
                monthly: "<?= addslashes($sign['monthly_reading']) ?>",
                yearly: "<?= addslashes($sign['yearly_reading']) ?>"
            },
            <?php endforeach; ?>
        };

        let currentTab = 'daily';
        let currentSignId = null;

        function switchTab(tab) {
            currentTab = tab;
            // Update tab styles
            document.querySelectorAll('.horoscope-tab').forEach(t => {
                t.classList.remove('bg-maroon', 'text-white', 'shadow-md');
                t.classList.add('text-dark/60');
            });
            const activeTab = document.getElementById('tab-' + tab);
            activeTab.classList.add('bg-maroon', 'text-white', 'shadow-md');
            activeTab.classList.remove('text-dark/60');

            if (currentSignId) showReading(currentSignId);
        }

        function showReading(signId) {
            currentSignId = signId;
            const data = horoscopeData[signId];
            if (!data) return;

            document.getElementById('reading-symbol').textContent = data.symbol;
            document.getElementById('reading-sign').textContent = data.sign;
            document.getElementById('reading-hindi').textContent = data.sign_hindi;
            document.getElementById('reading-text').textContent = data[currentTab];
            document.getElementById('reading-period').textContent = currentTab.charAt(0).toUpperCase() + currentTab.slice(1);

            // Highlight selected card
            document.querySelectorAll('.zodiac-card').forEach(c => {
                c.classList.remove('border-gold', 'bg-gold/10', 'shadow-md');
            });
            document.querySelector(`[data-sign-id="${signId}"]`).classList.add('border-gold', 'bg-gold/10', 'shadow-md');

            const reading = document.getElementById('horoscope-reading');
            reading.classList.remove('hidden');
            reading.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }

        function closeReading() {
            document.getElementById('horoscope-reading').classList.add('hidden');
            document.querySelectorAll('.zodiac-card').forEach(c => {
                c.classList.remove('border-gold', 'bg-gold/10', 'shadow-md');
            });
            currentSignId = null;
        }
        </script>

        <?php else: ?>
        <div class="text-center py-12">
            <p class="text-dark/50 font-inter">Horoscope data will appear here once the database is set up.</p>
        </div>
        <?php endif; ?>

        <!-- Link to full page -->
        <div class="text-center mt-10">
            <a href="/astro/pages/horoscope.php" class="inline-flex items-center gap-2 text-maroon font-semibold text-sm group">
                <span class="border-b border-maroon/30 group-hover:border-maroon pb-0.5 transition-colors">Explore all horoscopes</span>
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

    </div>
</section>

