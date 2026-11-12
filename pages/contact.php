<?php
// pages/contact.php
// Handle form submission
$formSuccess = false;
$formError = '';
$formData = ['name' => '', 'email' => '', 'phone' => '', 'sign' => '', 'service' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../config/database.php';

    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $phone   = trim($_POST['phone'] ?? '');
    $sign    = trim($_POST['sign'] ?? '');
    $service = trim($_POST['service'] ?? '');
    $message = trim($_POST['message'] ?? '');

    $formData = compact('name', 'email', 'phone', 'sign', 'service', 'message');

    if (empty($name) || empty($email) || empty($message)) {
        $formError = 'Please fill in your name, email, and message.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $formError = 'Please enter a valid email address.';
    } else {
        // For now, we'll just show success (email sending can be added later)
        // You can add: mail(), PHPMailer, or store in DB
        $formSuccess = true;
        $formData = ['name' => '', 'email' => '', 'phone' => '', 'sign' => '', 'service' => '', 'message' => ''];
    }
}

$zodiacSigns = ['Aries', 'Taurus', 'Gemini', 'Cancer', 'Leo', 'Virgo', 'Libra', 'Scorpio', 'Sagittarius', 'Capricorn', 'Aquarius', 'Pisces'];
$serviceOptions = ['Kundli Analysis', 'Palm Reading', 'Gemstone Consultation', 'Pooja & Remedies', 'Marriage Matching', 'General Consultation'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Contact AstroJyoti - Book a Vedic astrology consultation. Available in-person and online.">
    <title>Contact &amp; Book a Consultation — AstroJyoti</title>
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
    <style>
        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { font-family: 'Inter', sans-serif; color: #1A0A0A; }
        .fill-gold { fill: #D4A017; }
        .form-input {
            @apply w-full bg-white border border-border rounded-xl px-4 py-3 text-dark text-sm font-inter focus:outline-none focus:border-gold focus:ring-2 focus:ring-gold/20 transition-all;
        }
        .form-label {
            @apply block text-dark/70 text-sm font-medium font-inter mb-2;
        }
    </style>
</head>
<body class="bg-cream">
    <?php include __DIR__ . '/../components/navbar.php'; ?>

    <!-- Page Hero -->
    <section class="bg-maroon py-20 relative overflow-hidden">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle, rgba(212,160,23,0.08) 1px, transparent 1px); background-size: 50px 50px;"></div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="flex items-center justify-center gap-3 mb-4">
                <div class="h-px w-8 bg-gold/50"></div>
                <span class="text-gold/80 text-xs font-semibold tracking-[0.2em] uppercase font-inter">Get in Touch</span>
                <div class="h-px w-8 bg-gold/50"></div>
            </div>
            <h1 class="font-playfair text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-4">
                Book a <span class="text-gold italic">Consultation</span>
            </h1>
            <p class="text-white/60 font-inter text-lg max-w-2xl mx-auto">
                Every conversation begins with listening. Fill in the form or reach out directly — there is no wrong way to start.
            </p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-16 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-5 gap-10 lg:gap-16 items-start">

                <!-- Left: Contact Info -->
                <div class="lg:col-span-2">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="h-px w-8 bg-gold"></div>
                        <span class="text-gold text-xs font-semibold tracking-[0.2em] uppercase font-inter">Reach Out</span>
                    </div>
                    <h2 class="font-playfair text-2xl sm:text-3xl font-bold text-dark mb-4">
                        A thoughtful first step
                    </h2>
                    <p class="text-dark/60 font-inter text-sm leading-relaxed mb-8">
                        You can reach out through WhatsApp, fill in the form, or drop a message. No question is too small to begin with. All consultations — in person or online — start the same way: with a conversation.
                    </p>

                    <!-- Contact Details -->
                    <div class="flex flex-col gap-5 mb-8">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-full bg-maroon/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fas fa-phone text-gold text-sm"></i>
                            </div>
                            <div>
                                <div class="text-dark font-semibold text-sm font-inter">Phone / WhatsApp</div>
                                <a href="tel:+919999999999" class="text-dark/60 text-sm font-inter hover:text-maroon transition-colors">+91 99999 99999</a>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-full bg-maroon/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fas fa-envelope text-gold text-sm"></i>
                            </div>
                            <div>
                                <div class="text-dark font-semibold text-sm font-inter">Email</div>
                                <a href="mailto:hello@astrojyoti.in" class="text-dark/60 text-sm font-inter hover:text-maroon transition-colors">hello@astrojyoti.in</a>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-full bg-maroon/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fas fa-clock text-gold text-sm"></i>
                            </div>
                            <div>
                                <div class="text-dark font-semibold text-sm font-inter">Consultation Hours</div>
                                <div class="text-dark/60 text-sm font-inter">Mon–Sat: 9:00 AM – 7:00 PM IST</div>
                                <div class="text-dark/40 text-xs font-inter mt-0.5">Sunday: By appointment only</div>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-full bg-maroon/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fas fa-globe text-gold text-sm"></i>
                            </div>
                            <div>
                                <div class="text-dark font-semibold text-sm font-inter">Available</div>
                                <div class="text-dark/60 text-sm font-inter">In-person &amp; Online (Video / Phone)</div>
                                <div class="text-dark/40 text-xs font-inter mt-0.5">Hindi &amp; English</div>
                            </div>
                        </div>
                    </div>

                    <!-- WhatsApp Quick Link -->
                    <a href="https://wa.me/919999999999?text=Hello%2C%20I%20would%20like%20to%20book%20a%20consultation." target="_blank"
                       class="flex items-center gap-3 bg-[#25D366]/10 border border-[#25D366]/30 hover:bg-[#25D366]/20 text-dark rounded-xl px-5 py-4 transition-colors group">
                        <i class="fab fa-whatsapp text-[#25D366] text-2xl"></i>
                        <div>
                            <div class="font-semibold text-sm font-inter">Chat on WhatsApp</div>
                            <div class="text-dark/50 text-xs font-inter">Quickest way to get in touch</div>
                        </div>
                        <svg class="w-4 h-4 text-dark/30 ml-auto group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>

                <!-- Right: Contact Form -->
                <div class="lg:col-span-3">
                    <div class="bg-white border border-border rounded-2xl shadow-sm p-6 lg:p-8">

                        <?php if ($formSuccess): ?>
                        <!-- Success Message -->
                        <div class="text-center py-12">
                            <div class="w-16 h-16 rounded-full bg-green-100 flex items-center justify-center mx-auto mb-5">
                                <i class="fas fa-check text-green-500 text-2xl"></i>
                            </div>
                            <h3 class="font-playfair text-2xl font-bold text-dark mb-3">Message received.</h3>
                            <p class="text-dark/60 font-inter text-sm leading-relaxed mb-6 max-w-sm mx-auto">
                                Thank you for reaching out. I will be in touch within 24 hours to confirm the details of your consultation.
                            </p>
                            <a href="/astro/index.php" class="inline-flex items-center gap-2 text-maroon font-semibold text-sm">
                                ← Return home
                            </a>
                        </div>

                        <?php else: ?>

                        <div class="mb-6">
                            <h3 class="font-playfair text-2xl font-bold text-dark mb-1">Consultation Request</h3>
                            <p class="text-dark/50 text-sm font-inter">Share a few details and we will be in touch shortly.</p>
                        </div>

                        <?php if ($formError): ?>
                        <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl px-4 py-3 mb-6 text-sm font-inter flex items-center gap-2">
                            <i class="fas fa-exclamation-circle"></i>
                            <?= htmlspecialchars($formError) ?>
                        </div>
                        <?php endif; ?>

                        <form method="POST" action="/astro/pages/contact.php" class="space-y-5" novalidate>

                            <!-- Name + Email row -->
                            <div class="grid sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="form-label" for="name">Full Name <span class="text-red-400">*</span></label>
                                    <input
                                        type="text" id="name" name="name"
                                        value="<?= htmlspecialchars($formData['name']) ?>"
                                        placeholder="Your name"
                                        required
                                        class="w-full bg-cream border border-border rounded-xl px-4 py-3 text-dark text-sm font-inter focus:outline-none focus:border-gold focus:ring-2 focus:ring-gold/20 transition-all placeholder:text-dark/30"
                                    >
                                </div>
                                <div>
                                    <label class="form-label" for="email">Email Address <span class="text-red-400">*</span></label>
                                    <input
                                        type="email" id="email" name="email"
                                        value="<?= htmlspecialchars($formData['email']) ?>"
                                        placeholder="your@email.com"
                                        required
                                        class="w-full bg-cream border border-border rounded-xl px-4 py-3 text-dark text-sm font-inter focus:outline-none focus:border-gold focus:ring-2 focus:ring-gold/20 transition-all placeholder:text-dark/30"
                                    >
                                </div>
                            </div>

                            <!-- Phone -->
                            <div>
                                <label class="form-label" for="phone">Phone / WhatsApp</label>
                                <input
                                    type="tel" id="phone" name="phone"
                                    value="<?= htmlspecialchars($formData['phone']) ?>"
                                    placeholder="+91 98765 43210"
                                    class="w-full bg-cream border border-border rounded-xl px-4 py-3 text-dark text-sm font-inter focus:outline-none focus:border-gold focus:ring-2 focus:ring-gold/20 transition-all placeholder:text-dark/30"
                                >
                            </div>

                            <!-- Sign + Service row -->
                            <div class="grid sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="form-label" for="sign">Your Zodiac Sign</label>
                                    <select id="sign" name="sign"
                                        class="w-full bg-cream border border-border rounded-xl px-4 py-3 text-dark text-sm font-inter focus:outline-none focus:border-gold focus:ring-2 focus:ring-gold/20 transition-all appearance-none cursor-pointer">
                                        <option value="">Select your sign</option>
                                        <?php foreach ($zodiacSigns as $s): ?>
                                        <option value="<?= $s ?>" <?= $formData['sign'] === $s ? 'selected' : '' ?>><?= $s ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div>
                                    <label class="form-label" for="service">Service Interested In</label>
                                    <select id="service" name="service"
                                        class="w-full bg-cream border border-border rounded-xl px-4 py-3 text-dark text-sm font-inter focus:outline-none focus:border-gold focus:ring-2 focus:ring-gold/20 transition-all appearance-none cursor-pointer">
                                        <option value="">Select a service</option>
                                        <?php foreach ($serviceOptions as $opt): ?>
                                        <option value="<?= $opt ?>" <?= $formData['service'] === $opt ? 'selected' : '' ?>><?= $opt ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Message -->
                            <div>
                                <label class="form-label" for="message">Your Message / Question <span class="text-red-400">*</span></label>
                                <textarea
                                    id="message" name="message"
                                    rows="5"
                                    placeholder="Share what is on your mind — no need to have a perfect question. Just begin."
                                    required
                                    class="w-full bg-cream border border-border rounded-xl px-4 py-3 text-dark text-sm font-inter focus:outline-none focus:border-gold focus:ring-2 focus:ring-gold/20 transition-all placeholder:text-dark/30 resize-none"
                                ><?= htmlspecialchars($formData['message']) ?></textarea>
                            </div>

                            <!-- Preferred Mode -->
                            <div>
                                <label class="form-label">Preferred Consultation Mode</label>
                                <div class="flex flex-wrap gap-3">
                                    <?php foreach (['In-person', 'Video call', 'Phone call'] as $mode): ?>
                                    <label class="flex items-center gap-2 cursor-pointer group">
                                        <input type="radio" name="mode" value="<?= $mode ?>" class="w-4 h-4 accent-maroon">
                                        <span class="text-dark/60 text-sm font-inter group-hover:text-dark transition-colors"><?= $mode ?></span>
                                    </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="pt-2">
                                <button type="submit" class="w-full flex items-center justify-center gap-2.5 bg-gold hover:bg-gold/90 text-white font-bold py-4 rounded-xl shadow-lg hover:shadow-xl transition-all duration-200 text-sm tracking-wide group">
                                    Send my request
                                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </button>
                                <p class="text-center text-dark/35 text-xs font-inter mt-3">
                                    You will hear back within 24 hours. All conversations are confidential.
                                </p>
                            </div>

                        </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- What to expect -->
    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="font-playfair text-2xl sm:text-3xl font-bold text-dark">What happens after you reach out</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">
                <?php $steps = [
                    ['num' => '01', 'title' => 'We confirm', 'desc' => 'Within 24 hours, we will respond to confirm receipt and arrange a time that works for you.'],
                    ['num' => '02', 'title' => 'You share your details', 'desc' => 'Your exact birth date, time, and place. If you don\'t have all of these, that\'s okay — we work with what is available.'],
                    ['num' => '03', 'title' => 'The conversation begins', 'desc' => 'Your session takes place at the agreed time, in person or online. No rush. No script.'],
                ]; ?>
                <?php foreach ($steps as $step): ?>
                <div class="bg-cream border border-border rounded-2xl p-6 text-center">
                    <div class="font-playfair text-3xl font-bold text-gold/50 mb-3"><?= $step['num'] ?></div>
                    <h3 class="font-playfair font-bold text-dark text-lg mb-2"><?= htmlspecialchars($step['title']) ?></h3>
                    <p class="text-dark/60 font-inter text-sm leading-relaxed"><?= htmlspecialchars($step['desc']) ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php include __DIR__ . '/../components/footer.php'; ?>
</body>
</html>

