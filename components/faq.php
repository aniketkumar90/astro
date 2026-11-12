<?php
// faq.php — FAQ Section
require_once __DIR__ . '/../config/database.php';

$db = getDB();
$result = $db->query("SELECT * FROM faqs ORDER BY sort_order ASC");
$faqs = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $faqs[] = $row;
    }
}
$db->close();
?>

<section class="bg-white py-20 lg:py-28" id="faq">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-start">

            <!-- Left Column: Heading -->
            <div class="lg:sticky lg:top-28">
                <div class="flex items-center gap-3 mb-5">
                    <div class="h-px w-8 bg-gold"></div>
                    <span class="text-gold text-xs font-semibold tracking-[0.2em] uppercase font-inter">Before We Meet</span>
                </div>
                <h2 class="font-playfair text-3xl sm:text-4xl lg:text-5xl font-bold text-dark leading-tight mb-6">
                    A few things you<br>
                    might be<br>
                    <span class="text-maroon italic">wondering</span>
                </h2>
                <p class="text-dark/60 font-inter text-base leading-relaxed mb-8">
                    If your question is not here, please do reach out. There is no question too small, and no concern too ordinary.
                </p>
                <a href="/astro/pages/contact.php" class="inline-flex items-center gap-2 bg-maroon text-white font-semibold px-6 py-3 rounded-full text-sm shadow-md hover:bg-maroon/90 transition-colors group">
                    Ask a question
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>

            <!-- Right Column: Accordion -->
            <div class="flex flex-col gap-3">
                <?php if (!empty($faqs)): ?>
                <?php foreach ($faqs as $index => $faq): ?>
                <div class="faq-item border border-border rounded-2xl overflow-hidden" id="faq-<?= $faq['id'] ?>">
                    <button
                        onclick="toggleFaq(<?= $faq['id'] ?>)"
                        class="w-full flex items-start justify-between gap-4 px-6 py-5 text-left hover:bg-cream transition-colors"
                        aria-expanded="<?= $index === 0 ? 'true' : 'false' ?>"
                    >
                        <span class="font-playfair font-semibold text-dark text-base leading-snug"><?= htmlspecialchars($faq['question']) ?></span>
                        <span class="faq-icon flex-shrink-0 w-6 h-6 rounded-full border border-border flex items-center justify-center transition-transform duration-200 mt-0.5">
                            <svg class="w-3 h-3 text-maroon <?= $index === 0 ? 'hidden' : '' ?>" id="plus-<?= $faq['id'] ?>" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                            </svg>
                            <svg class="w-3 h-3 text-maroon <?= $index === 0 ? '' : 'hidden' ?>" id="minus-<?= $faq['id'] ?>" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"/>
                            </svg>
                        </span>
                    </button>
                    <div class="faq-answer px-6 pb-5 <?= $index === 0 ? '' : 'hidden' ?>" id="answer-<?= $faq['id'] ?>">
                        <p class="text-dark/65 font-inter text-sm leading-relaxed">
                            <?= htmlspecialchars($faq['answer']) ?>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php else: ?>
                <div class="text-center py-12">
                    <p class="text-dark/50 font-inter">FAQs will appear here once the database is set up.</p>
                </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>

<script>
function toggleFaq(id) {
    const answer = document.getElementById('answer-' + id);
    const plus = document.getElementById('plus-' + id);
    const minus = document.getElementById('minus-' + id);

    const isHidden = answer.classList.contains('hidden');

    // Close all others
    document.querySelectorAll('.faq-answer').forEach(a => a.classList.add('hidden'));
    document.querySelectorAll('[id^="plus-"]').forEach(p => p.classList.remove('hidden'));
    document.querySelectorAll('[id^="minus-"]').forEach(m => m.classList.add('hidden'));

    if (isHidden) {
        answer.classList.remove('hidden');
        plus.classList.add('hidden');
        minus.classList.remove('hidden');
    }
}
</script>

