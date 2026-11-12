-- AstroJyoti Database Schema and Sample Data
-- Run this in phpMyAdmin or MySQL CLI




-- --------------------------------------------------------
-- Table: services
-- --------------------------------------------------------
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

INSERT INTO `services` (`name`, `name_hindi`, `description`, `image`, `slug`, `sort_order`) VALUES
('Palm Reading', 'à¤¹à¤¸à¥à¤¤à¤°à¥‡à¤–à¤¾ à¤µà¤¿à¤¶à¥à¤²à¥‡à¤·à¤£', 'Your hands carry the story of your life â€” the lines, mounts, and shapes that speak of your nature, your journey, and what may yet unfold.', 'assets/WhatsApp Image 2026-11-06 at 2.39.56 PM.jpeg', 'palm-reading', 1),
('Kundli Analysis', 'à¤•à¥à¤‚à¤¡à¤²à¥€ à¤µà¤¿à¤¶à¥à¤²à¥‡à¤·à¤£', 'A birth chart holds the entire sky at the moment you arrived. We read it not as fate, but as a conversation between you and the cosmos.', 'assets/WhatsApp Image 2026-11-06 1at 2.39.56 PM.jpeg', 'kundli-analysis', 2),
('Gemstone Consultation', 'à¤°à¤¤à¥à¤¨ à¤ªà¤°à¤¾à¤®à¤°à¥à¤¶', 'Certain stones carry energy that complements your chart. We guide you thoughtfully â€” only recommending what truly aligns with your planetary positions.', 'assets/WhatsApp Image 2026-11-06 2at 2.39.56 PM.jpeg', 'gemstone-consultation', 3),
('Pooja & Remedies', 'à¤ªà¥‚à¤œà¤¾ à¤”à¤° à¤‰à¤ªà¤¾à¤¯', 'Sometimes, specific planetary influences need gentle correction. These sacred rituals and remedies are offered with care and deep understanding.', 'assets/WhatsApp Image 2026-11-06 3at 2.39.56 PM.jpeg', 'pooja-remedies', 4),
('Marriage Matching', 'à¤µà¤¿à¤µà¤¾à¤¹ à¤®à¤¿à¤²à¤¾à¤¨', 'Compatibility is more than coincidence. Kundli matching for marriage is approached with sensitivity â€” looking at harmony, not just numbers.', 'assets/WhatsApp Image 2026-11-06 at 2.39.56 PM.jpeg', 'marriage-matching', 5);

-- --------------------------------------------------------
-- Table: blogs
-- --------------------------------------------------------
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

INSERT INTO `blogs` (`title`, `category`, `excerpt`, `image`, `slug`, `read_time`, `created_at`) VALUES
('What Your Rising Sign Actually Means in Vedic Astrology', 'Vedic Astrology', 'Most people know their sun sign, but in Vedic astrology, the ascendant â€” your rising sign â€” holds the key to understanding your outer self, your body, and the lens through which you see the world.', 'assets/WhatsApp Image 2026-11-06 at 2.39.56 PM.jpeg', 'rising-sign-vedic-astrology', 6, '2026-10-15 10:00:00'),
('Saturn''s Return: A Season of Reckoning or Renewal?', 'Planetary Transits', 'Every 29 years, Saturn returns to the position it held at your birth. It is not punishment â€” it is a reckoning, an invitation to grow into the life you were always meant to live.', 'assets/WhatsApp Image 2026-11-06 1at 2.39.56 PM.jpeg', 'saturns-return', 8, '2026-10-22 10:00:00'),
('The Quiet Language of the Moon in Your Chart', 'Kundli Insights', 'In Vedic astrology, the Moon is not just your emotional self â€” it is your mind, your instincts, and the way you feel most at home in the world. Understanding your Moon sign is understanding your inner life.', 'assets/WhatsApp Image 2026-11-06 2at 2.39.56 PM.jpeg', 'moon-in-your-chart', 5, '2026-10-29 10:00:00');

-- --------------------------------------------------------
-- Table: testimonials
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL,
  `location` VARCHAR(150) NOT NULL,
  `rating` TINYINT UNSIGNED NOT NULL DEFAULT 5,
  `review` TEXT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `testimonials` (`name`, `location`, `rating`, `review`) VALUES
('Priya Sharma', 'Mumbai, Maharashtra', 5, 'I came to AstroJyoti at a point in my life when nothing seemed to make sense. The session was not what I expected â€” it was not predictions or vague promises. It was a genuine conversation that helped me understand my own patterns and find a direction I could actually trust. I left feeling lighter than I had in years.'),
('Arjun Mehta', 'Bangalore, Karnataka', 5, 'What struck me most was how grounded the whole experience felt. There was no drama, no fear-mongering â€” just a thoughtful reading of my chart and honest guidance about the choices ahead. It felt like talking to someone who truly understood both astrology and people. I''ve recommended this to everyone I know.'),
('Sunita Patel', 'Ahmedabad, Gujarat', 5, 'The kundli analysis was incredibly detailed and accurate. I was skeptical at first, but the insights I received about my career and relationships were spot on. The remedies suggested were practical and meaningful. Truly a life-changing experience.'),
('Rahul Verma', 'Delhi, NCR', 5, 'I consulted for marriage matching and the experience was exceptional. Very thorough, compassionate, and deeply knowledgeable. The guidance helped both families feel confident in our decision. Forever grateful.');

-- --------------------------------------------------------
-- Table: faqs
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` VARCHAR(500) NOT NULL,
  `answer` TEXT NOT NULL,
  `sort_order` TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `faqs` (`question`, `answer`, `sort_order`) VALUES
('What should I bring to a consultation?', 'Your exact date, time, and place of birth â€” these are essential for creating an accurate birth chart. If you do not have your exact birth time, do not worry. We can still work with what you have, and there are techniques in Vedic astrology to help narrow it down. Beyond that, just come with an open mind and the questions that have been sitting with you.', 1),
('Is this a religious service or a spiritual one?', 'Vedic astrology has roots in ancient Indian tradition, and while it carries a spiritual dimension, a consultation here is not a religious ceremony. It is closer to a thoughtful conversation â€” one that uses the language of planets and time to help you understand your own life more clearly. You do not need to hold any particular belief to find value in it.', 2),
('How long does a consultation take?', 'A standard consultation is typically 60 to 90 minutes. This gives us enough time to go through your chart meaningfully without rushing. If you are coming for a specific question â€” career, marriage, a major decision â€” we focus there. If you want a broader overview of your chart, we begin from the beginning and go as far as feels useful.', 3),
('Can I book a consultation online or by phone?', 'Yes, consultations are available both in person and remotely â€” over video call or phone, depending on what is comfortable for you. Many people find that online sessions work just as well as being present in the same room. You will find the booking details in the form below or by reaching out directly through WhatsApp.', 4),
('What languages are consultations offered in?', 'Consultations are available in Hindi and English. If you are more comfortable in one language over the other, simply mention it when booking and we will accommodate accordingly.', 5);

-- --------------------------------------------------------
-- Table: horoscopes
-- --------------------------------------------------------
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

INSERT INTO `horoscopes` (`sign`, `sign_hindi`, `symbol`, `sign_order`, `daily_reading`, `weekly_reading`, `monthly_reading`, `yearly_reading`) VALUES
('Aries', 'à¤®à¥‡à¤·', 'â™ˆ', 1, 'Today calls for patience over impulse. A conversation you have been avoiding may surface â€” approach it with clarity rather than defensiveness. Your energy is high; direct it toward something that actually matters.', 'This week brings an opportunity to reassess a relationship or partnership. Mars energises your chart, making you bold â€” but choose your battles wisely. Midweek favours financial decisions. The weekend asks for rest and reflection.', 'March brings movement after a period of stillness. Career matters accelerate, and a long-delayed recognition may finally arrive. Be mindful of spending in the second half of the month. Relationships deepen meaningfully if you show up with presence.', 'This year marks a turning point in your professional life. Saturn''s influence asks you to build slowly and deliberately. Relationships formed this year carry lasting significance. Health needs consistent attention â€” do not postpone self-care.'),
('Taurus', 'à¤µà¥ƒà¤·', 'â™‰', 2, 'Stability is your strength today, but do not let comfort become avoidance. A financial matter asks for your attention â€” address it calmly. Someone close to you may need your steady presence more than your advice.', 'Venus graces your week with warmth. Social connections feel easy and meaningful. A creative project gains momentum midweek. Avoid making large financial commitments before Thursday â€” wait until clarity arrives on its own.', 'Your domestic life takes centre stage this month. Decisions around home, family, or property feel weighty â€” take your time. Professionally, a quiet month precedes a breakthrough. Love is tender but requires honesty to deepen.', 'A year of consolidation and slow but real growth. What you plant this year â€” in relationships, in work, in health â€” will bear fruit in the years ahead. Travel broadens your perspective mid-year. A long-held dream moves closer to reality.'),
('Gemini', 'à¤®à¤¿à¤¥à¥à¤¨', 'â™Š', 3, 'Your mind is sharp today â€” use it for tasks that require focus rather than scattered energy. A message or conversation may shift your perspective on a situation you thought was settled. Stay curious, not anxious.', 'Communication is your gift this week â€” and your challenge. What you say carries more weight than usual. A sibling, neighbour, or colleague plays a meaningful role. Short journeys or local connections bring unexpected insight.', 'Your intellectual life is rich this month. Learning, writing, and meaningful conversations feed your spirit. Career clarity comes unexpectedly â€” be open to a direction you had not fully considered. Guard your mental energy.', 'Mercury''s influence makes this a year of important conversations, decisions, and connections. Travel â€” both literal and metaphorical â€” expands your world. A relationship that was stuck finds new ground. Your voice matters this year.'),
('Cancer', 'à¤•à¤°à¥à¤•', 'â™‹', 4, 'Your intuition is particularly strong today â€” trust what you feel without second-guessing it into silence. Home and family matters deserve your attention. Take a moment to nourish yourself before giving to others.', 'The Moon''s movement through your chart brings emotional depth this week. What you feel is information, not weakness. A financial matter resolves itself by Friday. Family conversations, though complex, move toward understanding.', 'Emotions run deep this month, and that is not a problem â€” it is a gift. Career matters benefit from your emotional intelligence. A new connection or deepening relationship brings genuine comfort. Trust your instincts in all things.', 'A year of emotional maturity and meaningful homecoming. Career steadily improves, particularly after mid-year. Your home life transforms â€” by choice or circumstance â€” in ways that ultimately serve you. Love is profound if you let yourself be seen.'),
('Leo', 'à¤¸à¤¿à¤‚à¤¹', 'â™Œ', 5, 'Your natural warmth draws people to you today â€” let it. A leadership moment arrives; step into it without over-thinking. Creative energy is high. Take time for something that brings you genuine joy, not just applause.', 'The Sun illuminates your week with vitality and visibility. A project or idea you have been nurturing steps into the light. Relationships are warm and generous. Watch for a tendency to overcommit â€” enthusiasm has limits.', 'Recognition arrives this month â€” for work you have done quietly and well. Your social life is rich and meaningful. Romance feels genuine rather than performative. Financially, a decision made now has long-term implications; think carefully.', 'A landmark year for personal and professional identity. You step more fully into who you are. Career advancements are real and earned. A relationship deepens into something enduring. Health flourishes when you balance activity with rest.'),
('Virgo', 'à¤•à¤¨à¥à¤¯à¤¾', 'â™', 6, 'Details matter today, but do not let perfectionism slow you to a halt. A health matter deserves your practical attention â€” small adjustments, consistently made, create real change. Be kind to yourself in your inner dialogue.', 'Mercury sharpens your mind and your eye for detail this week. A work matter that felt stuck begins to move. Financial planning benefits from your analytical strength. A conversation with someone you trust brings surprising clarity.', 'Service, healing, and practical matters define this month. Work is productive and satisfying. A health routine established now will serve you for months ahead. Relationships feel grounded and real â€” less drama, more depth.', 'A year of meaningful work and quiet achievement. Your contribution to something larger than yourself becomes clear. Health improves as you listen more carefully to your body. A partnership â€” personal or professional â€” becomes a cornerstone.'),
('Libra', 'à¤¤à¥à¤²à¤¾', 'â™Ž', 7, 'Balance is your nature, but today asks you to make a decision rather than weigh indefinitely. A relationship needs your honest voice, not just your diplomacy. Beauty and harmony restore you â€” make time for what lifts you.', 'Venus softens your week with grace and social ease. Partnership matters feel harmonious and warm. A creative or aesthetic project advances beautifully. Midweek brings a decision point â€” trust your values, not just your desire to please.', 'Relationships are the heartbeat of this month. A partnership strengthens; a difficult dynamic finds resolution if you speak honestly. Career takes a backseat but does not stall. Love, in all its forms, is your teacher this month.', 'A year defined by relationships â€” the ones you choose, the ones you deepen, and the ones you must release. Personal growth comes through honest connection. Career finds its stride in the second half. Beauty and creativity flourish.'),
('Scorpio', 'à¤µà¥ƒà¤¶à¥à¤šà¤¿à¤•', 'â™', 8, 'Something beneath the surface asks to be acknowledged today. Trust the depth of your perception â€” you are sensing something real. A private matter deserves your full attention. Release what has served its purpose.', 'Intensity characterises your week â€” in work, in relationships, in your inner life. A transformation is underway, even if it is invisible to others. Financial matters benefit from careful attention. Do not share everything you are thinking; some things need time to ripen.', 'Deep change moves through your life this month. What is ending is making room for something more true. Career matters require patience â€” the breakthrough is real, but its timing is its own. Trust the process you cannot fully see.', 'A year of profound transformation. Pluto and Mars shape a year that asks you to shed old skins and step into greater authenticity. Career undergoes significant change â€” not all of it comfortable, but all of it purposeful. Relationships that endure this year are keepers.'),
('Sagittarius', 'à¤§à¤¨à¥', 'â™', 9, 'Your expansive spirit is an asset today, but focus it. A journey â€” literal or intellectual â€” calls to you. A belief you have held for a long time may be ready for updating. Speak your truth, but listen first.', 'Jupiter''s optimism fuels your week. Travel, learning, and philosophical conversations feed your soul. A professional opportunity arrives through an unexpected channel â€” stay open. The weekend favours adventure, even if only in your own neighbourhood.', 'Expansion in every direction this month â€” ideas, connections, horizons. A career opportunity asks you to stretch beyond your current boundaries. Travel is likely and meaningful. A relationship deepens through shared adventure or honest conversation.', 'Jupiter blesses a year of genuine growth. Education, travel, publishing, and philosophy all call to you. Career advances through courage and honesty. A relationship becomes a true partnership of minds and souls. Your faith in life is renewed.'),
('Capricorn', 'à¤®à¤•à¤°', 'â™‘', 10, 'Ambition serves you today, but remember that rest is also productive. A professional matter rewards persistence. Take a moment to acknowledge how far you have come before focusing on how far you have to go.', 'Saturn steadies your week with structure and purpose. Work is demanding but rewarding. A long-term project shows real progress. Family responsibilities require your attention midweek. Financial discipline now creates meaningful freedom later.', 'Career is the centrepiece of this month â€” and you are ready for it. Recognition comes for sustained effort. A decision about your professional path carries long-term weight; make it from your values, not your fears. Health needs consistent care.', 'A year of significant professional achievement. Saturn rewards your discipline and consistency with real advancement. A personal relationship matures into something deeply sustaining. Health improves through structure and routine. What you build this year lasts.'),
('Aquarius', 'à¤•à¥à¤®à¥à¤­', 'â™’', 11, 'Your unique perspective is needed today â€” do not dilute it for the sake of fitting in. Community and friendship offer unexpected support. A humanitarian impulse leads you toward something meaningful. Stay curious about the future.', 'Innovation and community define your week. A group effort gains momentum. A friendship reveals its depth in a moment of genuine need. Technology or innovation plays a role in a career development. The weekend favours connection over solitude.', 'Your social world is vibrant and purposeful this month. A group project or community endeavour moves forward meaningfully. Career benefits from your originality â€” do not hide your most unconventional ideas. A friendship becomes something more.', 'A landmark year for personal freedom and authentic expression. Uranus shakes loose what no longer serves. Career takes an unexpected and ultimately better direction. Community and friendship provide profound support. Your vision for the future becomes clearer.'),
('Pisces', 'à¤®à¥€à¤¨', 'â™“', 12, 'Your sensitivity is a superpower today â€” trust what you feel and what you dream. A creative or spiritual practice restores you. Be gentle with yourself and with others. Something you have been hoping for quietly moves closer.', 'Neptune deepens your week with intuition, creativity, and compassion. A spiritual or creative project gains momentum. Dreams carry meaningful messages â€” pay attention to them. A relationship benefits from tenderness and honesty. Avoid overcommitting your energy.', 'Creativity and spirituality are your guides this month. A project of deep personal meaning finds its form. Career matters benefit from imagination more than strategy. A romantic or emotional connection deepens in ways that feel quietly miraculous.', 'A year of spiritual depth and creative flourishing. Neptune invites you to dissolve old boundaries and expand your compassion. Career finds meaning in service and creativity. Love is profound and healing. Trust the quiet knowing that guides you.');


