<?php
// Railway DB import script — run once after deploy, then delete
$host = 'centerbeam.proxy.rlwy.net';
$port = 40883;
$user = 'root';
$pass = 'jDuIhiQVqULFGBLkgUgmJBZWuPSgElLW';
$db   = 'railway';

$conn = new mysqli($host, $user, $pass, $db, $port);
if ($conn->connect_error) {
    die("<b>Connection failed:</b> " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");

$sql = <<<'SQL'
CREATE TABLE IF NOT EXISTS `services` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL,
  `name_hindi` VARCHAR(150) NOT NULL,
  `description` TEXT NOT NULL,
  `image` VARCHAR(255) NOT NULL DEFAULT 'assets/service-default.jpg',
  `slug` VARCHAR(150) NOT NULL UNIQUE,
  `sort_order` TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT IGNORE INTO `services` (`name`, `name_hindi`, `description`, `image`, `slug`, `sort_order`) VALUES
('Palm Reading', 'हस्तरेखा विश्लेषण', 'Your hands carry the story of your life — the lines, mounts, and shapes that speak of your nature, your journey, and what may yet unfold.', 'assets/WhatsApp Image 2026-11-06 at 2.39.56 PM.jpeg', 'palm-reading', 1),
('Kundli Analysis', 'कुंडली विश्लेषण', 'A birth chart holds the entire sky at the moment you arrived. We read it not as fate, but as a conversation between you and the cosmos.', 'assets/WhatsApp Image 2026-11-06 1at 2.39.56 PM.jpeg', 'kundli-analysis', 2),
('Gemstone Consultation', 'रत्न परामर्श', 'Certain stones carry energy that complements your chart. We guide you thoughtfully — only recommending what truly aligns with your planetary positions.', 'assets/WhatsApp Image 2026-11-06 2at 2.39.56 PM.jpeg', 'gemstone-consultation', 3),
('Pooja & Remedies', 'पूजा और उपाय', 'Sometimes, specific planetary influences need gentle correction. These sacred rituals and remedies are offered with care and deep understanding.', 'assets/WhatsApp Image 2026-11-06 3at 2.39.56 PM.jpeg', 'pooja-remedies', 4),
('Marriage Matching', 'विवाह मिलान', 'Compatibility is more than coincidence. Kundli matching for marriage is approached with sensitivity — looking at harmony, not just numbers.', 'assets/WhatsApp Image 2026-11-06 at 2.39.56 PM.jpeg', 'marriage-matching', 5);

CREATE TABLE IF NOT EXISTS `blogs` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `category` VARCHAR(100) NOT NULL,
  `excerpt` TEXT NOT NULL,
  `image` VARCHAR(255) NOT NULL DEFAULT 'assets/blog-default.jpg',
  `slug` VARCHAR(255) NOT NULL UNIQUE,
  `read_time` TINYINT UNSIGNED NOT NULL DEFAULT 5,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT IGNORE INTO `blogs` (`title`, `category`, `excerpt`, `image`, `slug`, `read_time`, `created_at`) VALUES
('What Your Rising Sign Actually Means in Vedic Astrology', 'Vedic Astrology', 'Most people know their sun sign, but in Vedic astrology, the ascendant — your rising sign — holds the key to understanding your outer self, your body, and the lens through which you see the world.', 'assets/WhatsApp Image 2026-11-06 at 2.39.56 PM.jpeg', 'rising-sign-vedic-astrology', 6, '2026-10-15 10:00:00'),
('Saturn''s Return: A Season of Reckoning or Renewal?', 'Planetary Transits', 'Every 29 years, Saturn returns to the position it held at your birth. It is not punishment — it is a reckoning, an invitation to grow into the life you were always meant to live.', 'assets/WhatsApp Image 2026-11-06 1at 2.39.56 PM.jpeg', 'saturns-return', 8, '2026-10-22 10:00:00'),
('The Quiet Language of the Moon in Your Chart', 'Kundli Insights', 'In Vedic astrology, the Moon is not just your emotional self — it is your mind, your instincts, and the way you feel most at home in the world. Understanding your Moon sign is understanding your inner life.', 'assets/WhatsApp Image 2026-11-06 2at 2.39.56 PM.jpeg', 'moon-in-your-chart', 5, '2026-10-29 10:00:00');

CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL,
  `location` VARCHAR(150) NOT NULL,
  `rating` TINYINT UNSIGNED NOT NULL DEFAULT 5,
  `review` TEXT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT IGNORE INTO `testimonials` (`name`, `location`, `rating`, `review`) VALUES
('Priya Sharma', 'Mumbai, Maharashtra', 5, 'I came to AstroJyoti at a point in my life when nothing seemed to make sense. The session was not what I expected — it was not predictions or vague promises. It was a genuine conversation that helped me understand my own patterns and find a direction I could actually trust. I left feeling lighter than I had in years.'),
('Arjun Mehta', 'Bangalore, Karnataka', 5, 'What struck me most was how grounded the whole experience felt. There was no drama, no fear-mongering — just a thoughtful reading of my chart and honest guidance about the choices ahead. It felt like talking to someone who truly understood both astrology and people. I''ve recommended this to everyone I know.');

CREATE TABLE IF NOT EXISTS `faqs` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` VARCHAR(500) NOT NULL,
  `answer` TEXT NOT NULL,
  `sort_order` TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT IGNORE INTO `faqs` (`question`, `answer`, `sort_order`) VALUES
('What should I bring to a consultation?', 'Your exact date, time, and place of birth — these are essential for creating an accurate birth chart. If you do not have your exact birth time, do not worry. We can still work with what you have, and there are techniques in Vedic astrology to help narrow it down. Beyond that, just come with an open mind and the questions that have been sitting with you.', 1),
('Is this a religious service or a spiritual one?', 'Vedic astrology has roots in ancient Indian tradition, and while it carries a spiritual dimension, a consultation here is not a religious ceremony. It is closer to a thoughtful conversation — one that uses the language of planets and time to help you understand your own life more clearly.', 2),
('How long does a consultation take?', 'A standard consultation is typically 60 to 90 minutes. This gives us enough time to go through your chart meaningfully without rushing.', 3),
('Can I book a consultation online or by phone?', 'Yes, consultations are available both in person and remotely — over video call or phone, depending on what is comfortable for you.', 4);

CREATE TABLE IF NOT EXISTS `horoscopes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `sign` VARCHAR(50) NOT NULL,
  `sign_hindi` VARCHAR(50) NOT NULL,
  `symbol` VARCHAR(10) NOT NULL,
  `sign_order` TINYINT UNSIGNED NOT NULL DEFAULT 0,
  `daily_reading` TEXT NOT NULL,
  `weekly_reading` TEXT NOT NULL,
  `monthly_reading` TEXT NOT NULL,
  `yearly_reading` TEXT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT IGNORE INTO `horoscopes` (`sign`, `sign_hindi`, `symbol`, `sign_order`, `daily_reading`, `weekly_reading`, `monthly_reading`, `yearly_reading`) VALUES
('Aries', 'मेष', '♈', 1, 'Today calls for patience over impulse. A conversation you have been avoiding may surface.', 'This week brings an opportunity to reassess a relationship or partnership.', 'March brings movement after a period of stillness. Career matters accelerate.', 'This year marks a turning point in your professional life.'),
('Taurus', 'वृष', '♉', 2, 'Stability is your strength today, but do not let comfort become avoidance.', 'Venus graces your week with warmth. Social connections feel easy and meaningful.', 'Your domestic life takes centre stage this month.', 'A year of consolidation and slow but real growth.'),
('Gemini', 'मिथुन', '♊', 3, 'Your mind is sharp today — use it for tasks that require focus rather than scattered energy.', 'Communication is your gift this week — and your challenge.', 'Your intellectual life is rich this month.', 'Mercury''s influence makes this a year of important conversations.'),
('Cancer', 'कर्क', '♋', 4, 'Your intuition is particularly strong today — trust what you feel.', 'The Moon''s movement through your chart brings emotional depth this week.', 'Emotions run deep this month, and that is not a problem — it is a gift.', 'A year of emotional maturity and meaningful homecoming.'),
('Leo', 'सिंह', '♌', 5, 'Your natural warmth draws people to you today — let it.', 'The Sun illuminates your week with vitality and visibility.', 'Recognition arrives this month — for work you have done quietly and well.', 'A landmark year for personal and professional identity.'),
('Virgo', 'कन्या', '♍', 6, 'Details matter today, but do not let perfectionism slow you to a halt.', 'Mercury sharpens your mind and your eye for detail this week.', 'Service, healing, and practical matters define this month.', 'A year of meaningful work and quiet achievement.'),
('Libra', 'तुला', '♎', 7, 'Balance is your nature, but today asks you to make a decision.', 'Venus softens your week with grace and social ease.', 'Relationships are the heartbeat of this month.', 'A year defined by relationships — the ones you choose, the ones you deepen.'),
('Scorpio', 'वृश्चिक', '♏', 8, 'Something beneath the surface asks to be acknowledged today.', 'Intensity characterises your week — in work, in relationships, in your inner life.', 'Deep change moves through your life this month.', 'A year of profound transformation.'),
('Sagittarius', 'धनु', '♐', 9, 'Your expansive spirit is an asset today, but focus it.', 'Jupiter''s optimism fuels your week.', 'Expansion in every direction this month — ideas, connections, horizons.', 'Jupiter blesses a year of genuine growth.'),
('Capricorn', 'मकर', '♑', 10, 'Ambition serves you today, but remember that rest is also productive.', 'Saturn steadies your week with structure and purpose.', 'Career is the centrepiece of this month — and you are ready for it.', 'A year of significant professional achievement.'),
('Aquarius', 'कुम्भ', '♒', 11, 'Your unique perspective is needed today — do not dilute it.', 'Innovation and community define your week.', 'Your social world is vibrant and purposeful this month.', 'A landmark year for personal freedom and authentic expression.'),
('Pisces', 'मीन', '♓', 12, 'Your sensitivity is a superpower today — trust what you feel and what you dream.', 'Neptune deepens your week with intuition, creativity, and compassion.', 'Creativity and spirituality are your guides this month.', 'A year of spiritual depth and creative flourishing.');
SQL;

// Split and run each statement
$statements = array_filter(array_map('trim', explode(';', $sql)));
$success = 0; $errors = [];
foreach ($statements as $stmt) {
    if (!empty($stmt)) {
        if (!$conn->query($stmt)) {
            $errors[] = $conn->error . " — Query: " . substr($stmt, 0, 80);
        } else {
            $success++;
        }
    }
}
$conn->close();
echo "<h2 style='font-family:sans-serif;color:green'>✅ Import Complete!</h2>";
echo "<p style='font-family:sans-serif'>$success statements executed successfully.</p>";
if ($errors) {
    echo "<h3 style='color:red'>Errors:</h3><ul>";
    foreach ($errors as $e) echo "<li style='font-family:monospace;font-size:12px'>$e</li>";
    echo "</ul>";
}
echo "<p style='font-family:sans-serif;color:#666'>Delete this file after import: <code>database/import_railway.php</code></p>";
?>
