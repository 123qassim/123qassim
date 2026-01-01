<!-- src/Views/home.php -->
<div class="relative min-h-screen flex items-center justify-center hero-bg">
    <div class="absolute inset-0 bg-gradient-to-r from-medical-900/90 to-medical-800/80"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 tracking-tight leading-tight">
            Advancing Healthcare <br> Through <span class="text-accent-500">Innovation</span>
        </h1>
        <p class="text-xl text-gray-200 mb-10 max-w-2xl mx-auto font-light">
            Join the leading community of medical professionals. Connect, learn, and research with cutting-edge tools and AI assistance.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/register" class="px-8 py-4 bg-accent-500 text-white rounded-full font-semibold text-lg hover:bg-accent-600 transition shadow-lg hover:shadow-accent-500/50 transform hover:-translate-y-1">
                Join Community
            </a>
            <a href="/events" class="px-8 py-4 bg-white/10 backdrop-blur-md border border-white/30 text-white rounded-full font-semibold text-lg hover:bg-white/20 transition">
                Explore Events
            </a>
        </div>
    </div>

    <!-- Floating Cards Animation (Decorative) -->
    <div class="absolute bottom-10 left-10 hidden lg:block animate-bounce duration-[3000ms]">
        <div class="bg-white/90 backdrop-blur p-4 rounded-xl shadow-xl max-w-xs transform -rotate-3">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                    <i class="fa-solid fa-check"></i>
                </div>
                <div>
                    <p class="font-bold text-gray-800">Research Verified</p>
                    <p class="text-xs text-gray-500">Latest medical data</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Why Choose MUMBSO?</h2>
            <div class="w-20 h-1 bg-medical-500 mx-auto rounded-full"></div>
            <p class="mt-4 text-gray-600 max-w-2xl mx-auto">We provide an ecosystem for growth, utilizing technology to bridge gaps in medical knowledge and practice.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="group p-8 rounded-2xl bg-gray-50 hover:bg-white hover:shadow-2xl transition-all duration-300 border border-gray-100" data-aos="fade-up" data-aos-delay="100">
                <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center text-blue-600 text-2xl mb-6 group-hover:scale-110 transition">
                    <i class="fa-solid fa-calendar-check"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Professional Events</h3>
                <p class="text-gray-600 mb-4">Access exclusive seminars, webinars, and conferences tailored for medical practitioners.</p>
                <a href="/events" class="text-blue-600 font-semibold group-hover:translate-x-2 transition inline-flex items-center">
                    Learn More <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Card 2 -->
            <div class="group p-8 rounded-2xl bg-gray-50 hover:bg-white hover:shadow-2xl transition-all duration-300 border border-gray-100" data-aos="fade-up" data-aos-delay="200">
                <div class="w-14 h-14 bg-purple-100 rounded-2xl flex items-center justify-center text-purple-600 text-2xl mb-6 group-hover:scale-110 transition">
                    <i class="fa-solid fa-microscope"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Research Hub</h3>
                <p class="text-gray-600 mb-4">Collaborate on research papers and access a vast library of medical publications.</p>
                <a href="/research" class="text-purple-600 font-semibold group-hover:translate-x-2 transition inline-flex items-center">
                    Browse Papers <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Card 3 -->
            <div class="group p-8 rounded-2xl bg-gray-50 hover:bg-white hover:shadow-2xl transition-all duration-300 border border-gray-100" data-aos="fade-up" data-aos-delay="300">
                <div class="w-14 h-14 bg-teal-100 rounded-2xl flex items-center justify-center text-teal-600 text-2xl mb-6 group-hover:scale-110 transition">
                    <i class="fa-solid fa-robot"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">AI Assistant</h3>
                <p class="text-gray-600 mb-4">Get instant answers to medical queries and assistance with our advanced AI bot.</p>
                <a href="/ai" class="text-teal-600 font-semibold group-hover:translate-x-2 transition inline-flex items-center">
                    Try AI <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Stats/Interactive Section -->
<section class="py-20 bg-medical-900 relative overflow-hidden">
    <!-- Decorative Circles -->
    <div class="absolute top-0 left-0 w-64 h-64 bg-medical-800 rounded-full opacity-50 -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-accent-500 rounded-full opacity-10 translate-x-1/3 translate-y-1/3"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <img src="https://images.unsplash.com/photo-1551076805-e1869033e561?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Medical Team" class="rounded-2xl shadow-2xl border-4 border-white/10">
            </div>
            <div class="text-white" data-aos="fade-left">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Connecting Minds, <br>Saving Lives</h2>
                <p class="text-medical-100 mb-8 text-lg">
                    Our platform is designed to streamline the workflow of medical institutions and professionals. From seamless payments to instant information retrieval.
                </p>

                <div class="grid grid-cols-2 gap-6">
                    <div class="p-4 bg-white/10 rounded-lg backdrop-blur">
                        <div class="text-3xl font-bold text-accent-500 mb-1">500+</div>
                        <div class="text-sm text-gray-300">Active Members</div>
                    </div>
                    <div class="p-4 bg-white/10 rounded-lg backdrop-blur">
                        <div class="text-3xl font-bold text-accent-500 mb-1">50+</div>
                        <div class="text-sm text-gray-300">Events Hosted</div>
                    </div>
                    <div class="p-4 bg-white/10 rounded-lg backdrop-blur">
                        <div class="text-3xl font-bold text-accent-500 mb-1">24/7</div>
                        <div class="text-sm text-gray-300">AI Support</div>
                    </div>
                    <div class="p-4 bg-white/10 rounded-lg backdrop-blur">
                        <div class="text-3xl font-bold text-accent-500 mb-1">100%</div>
                        <div class="text-sm text-gray-300">Secure Data</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Ready to Transform Your Medical Journey?</h2>
        <p class="text-gray-600 text-lg mb-10">Join Mumbso Connect today and be part of the future of healthcare networking.</p>
        <a href="/register" class="inline-block px-10 py-4 bg-medical-600 text-white rounded-full font-bold text-lg hover:bg-medical-700 transition shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
            Get Started Now
        </a>
    </div>
</section>
