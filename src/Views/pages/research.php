<!-- src/Views/pages/research.php -->
<div class="py-12 bg-white min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-center mb-12" data-aos="fade-down">
            <div>
                <h1 class="text-4xl font-bold text-gray-900">Research Hub</h1>
                <p class="mt-2 text-gray-600">Access the latest medical studies and publications.</p>
            </div>
            <div class="mt-4 md:mt-0">
                <div class="relative">
                    <input type="text" placeholder="Search papers..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-medical-500 w-64">
                    <i class="fa-solid fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <?php foreach($papers as $index => $paper): ?>
                <div class="bg-gray-50 border border-gray-100 p-6 rounded-xl hover:shadow-md transition" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                    <div class="flex flex-col md:flex-row md:items-start justify-between gap-4">
                        <div>
                            <span class="inline-block bg-purple-100 text-purple-700 text-xs px-2 py-1 rounded-full mb-2">New</span>
                            <h3 class="text-xl font-bold text-gray-900 hover:text-medical-600 transition cursor-pointer">
                                <?= $paper['title'] ?>
                            </h3>
                            <p class="text-sm text-gray-500 mb-3">By <span class="font-medium text-gray-700"><?= $paper['author'] ?></span></p>
                            <p class="text-gray-600 leading-relaxed">
                                <?= $paper['abstract'] ?>
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="<?= $paper['link'] ?>" class="inline-flex items-center text-medical-600 font-semibold hover:text-medical-800">
                                Read Full Paper <i class="fa-solid fa-external-link-alt ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-12 text-center">
            <button class="bg-gray-100 text-gray-600 px-6 py-2 rounded-full hover:bg-gray-200 transition">Load More</button>
        </div>
    </div>
</div>
