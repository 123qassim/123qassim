<!-- src/Views/pages/events.php -->
<div class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h1 class="text-4xl font-bold text-gray-900">Upcoming Medical Events</h1>
            <p class="mt-4 text-gray-600">Conferences, webinars, and workshops to keep you updated.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach($events as $index => $event): ?>
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:-translate-y-2 transition duration-300" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                    <div class="h-48 overflow-hidden relative">
                        <img src="<?= $event['image'] ?>" alt="<?= $event['title'] ?>" class="w-full h-full object-cover">
                        <div class="absolute top-0 right-0 bg-medical-600 text-white px-3 py-1 m-2 rounded text-sm font-bold">
                            <?= date('M d', strtotime($event['date'])) ?>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2"><?= $event['title'] ?></h3>
                        <div class="flex items-center text-gray-500 text-sm mb-4">
                            <i class="fa-solid fa-location-dot mr-2"></i> <?= $event['location'] ?>
                        </div>
                        <p class="text-gray-600 mb-6 text-sm">
                            <?= $event['description'] ?>
                        </p>
                        <a href="#" class="block w-full text-center border-2 border-medical-600 text-medical-600 py-2 rounded-lg font-semibold hover:bg-medical-600 hover:text-white transition">Register Now</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
