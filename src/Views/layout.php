<!-- src/Views/layout.php -->
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'MUMBSO Connect' ?></title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        medical: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            900: '#0c4a6e',
                        },
                        accent: {
                            500: '#14b8a6', // Teal
                        }
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        .hero-bg {
            background: linear-gradient(rgba(12, 74, 110, 0.8), rgba(12, 74, 110, 0.8)), url('https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');
            background-size: cover;
            background-position: center;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body class="font-sans text-gray-800 bg-gray-50">

    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-white/90 backdrop-blur-md shadow-sm transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex-shrink-0 flex items-center gap-2">
                    <i class="fa-solid fa-heart-pulse text-medical-600 text-3xl animate-pulse"></i>
                    <span class="font-bold text-2xl text-gray-900">MUMBSO<span class="text-medical-600">Connect</span></span>
                </div>
                <div class="hidden md:flex space-x-8 items-center">
                    <a href="/" class="text-gray-700 hover:text-medical-600 font-medium transition">Home</a>
                    <a href="/events" class="text-gray-700 hover:text-medical-600 font-medium transition">Events</a>
                    <a href="/research" class="text-gray-700 hover:text-medical-600 font-medium transition">Research</a>
                    <a href="/ai" class="text-gray-700 hover:text-medical-600 font-medium transition">AI Assistant</a>
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <a href="/dashboard" class="text-gray-700 hover:text-medical-600 font-medium transition">Dashboard</a>
                        <a href="/logout" class="px-5 py-2 rounded-full border border-medical-600 text-medical-600 hover:bg-medical-600 hover:text-white transition">Logout</a>
                    <?php else: ?>
                        <a href="/login" class="text-gray-700 hover:text-medical-600 font-medium transition">Login</a>
                        <a href="/register" class="px-5 py-2 rounded-full bg-medical-600 text-white hover:bg-medical-700 shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5">Get Started</a>
                    <?php endif; ?>
                </div>
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button class="text-gray-700 hover:text-medical-600 focus:outline-none">
                        <i class="fa-solid fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-20 min-h-screen">
        <?php require $viewPath; ?>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <div>
                    <div class="flex items-center gap-2 mb-6">
                        <i class="fa-solid fa-heart-pulse text-medical-500 text-2xl"></i>
                        <span class="font-bold text-xl">MUMBSO Connect</span>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Empowering healthcare professionals through innovation, research, and community connection.
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-6 text-medical-500">Quick Links</h3>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li><a href="/" class="hover:text-white transition">Home</a></li>
                        <li><a href="/events" class="hover:text-white transition">Events</a></li>
                        <li><a href="/research" class="hover:text-white transition">Research</a></li>
                        <li><a href="/donate" class="hover:text-white transition">Donate</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-6 text-medical-500">Contact</h3>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li><i class="fa-solid fa-envelope mr-2"></i> info@mumbso.org</li>
                        <li><i class="fa-solid fa-phone mr-2"></i> +254 700 000000</li>
                        <li><i class="fa-solid fa-location-dot mr-2"></i> Nairobi, Kenya</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-6 text-medical-500">Newsletter</h3>
                    <form class="flex flex-col gap-3">
                        <input type="email" placeholder="Your email" class="bg-gray-800 text-white px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-medical-500">
                        <button class="bg-medical-600 text-white px-4 py-2 rounded hover:bg-medical-700 transition">Subscribe</button>
                    </form>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-500 text-sm">
                &copy; <?= date('Y') ?> MUMBSO Connect. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
        });
    </script>
</body>
</html>
