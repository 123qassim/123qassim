<!-- src/Views/dashboard/index.php -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-gray-900" data-aos="fade-right">Dashboard</h1>
        <div class="flex items-center gap-2" data-aos="fade-left">
            <span class="text-gray-600">Welcome,</span>
            <span class="font-bold text-medical-600"><?= htmlspecialchars($_SESSION['user_name']) ?></span>
            <div class="h-10 w-10 bg-medical-100 rounded-full flex items-center justify-center text-medical-600 font-bold ml-2">
                <?= strtoupper(substr($_SESSION['user_name'], 0, 1)) ?>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-medical-500" data-aos="fade-up" data-aos-delay="100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Total Donations</p>
                    <h3 class="text-2xl font-bold text-gray-900"><?= $stats['donations'] ?></h3>
                </div>
                <div class="w-12 h-12 bg-medical-50 rounded-lg flex items-center justify-center text-medical-500 text-xl">
                    <i class="fa-solid fa-hand-holding-dollar"></i>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-purple-500" data-aos="fade-up" data-aos-delay="200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Events Attended</p>
                    <h3 class="text-2xl font-bold text-gray-900"><?= $stats['events_attended'] ?></h3>
                </div>
                <div class="w-12 h-12 bg-purple-50 rounded-lg flex items-center justify-center text-purple-500 text-xl">
                    <i class="fa-solid fa-calendar-check"></i>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-teal-500" data-aos="fade-up" data-aos-delay="300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Research Papers</p>
                    <h3 class="text-2xl font-bold text-gray-900"><?= $stats['research_papers'] ?></h3>
                </div>
                <div class="w-12 h-12 bg-teal-50 rounded-lg flex items-center justify-center text-teal-500 text-xl">
                    <i class="fa-solid fa-book-medical"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Recent Activity / Transactions -->
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white rounded-xl shadow-md p-6" data-aos="fade-up">
                <h3 class="text-xl font-bold text-gray-900 mb-6">Recent Transactions</h3>
                <?php if(empty($transactions)): ?>
                    <p class="text-gray-500 text-center py-8">No transactions found.</p>
                <?php else: ?>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Receipt</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php foreach($transactions as $t): ?>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= date('M d, Y', strtotime($t['created_at'])) ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">KES <?= number_format($t['amount'], 2) ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                                <?= $t['status'] == 'COMPLETED' ? 'bg-green-100 text-green-800' :
                                                   ($t['status'] == 'FAILED' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') ?>">
                                                <?= $t['status'] ?>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $t['mpesa_receipt_number'] ?? '-' ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>

             <!-- Quick Actions -->
             <div class="bg-gradient-to-r from-medical-600 to-medical-800 rounded-xl shadow-md p-8 text-white" data-aos="fade-up">
                <h3 class="text-2xl font-bold mb-4">Support Our Cause</h3>
                <p class="mb-6 opacity-90">Your contribution helps us continue our research and organize medical events.</p>
                <a href="/donate" class="inline-block bg-white text-medical-700 px-6 py-3 rounded-full font-bold shadow-lg hover:bg-gray-100 transition">Donate Now</a>
             </div>
        </div>

        <!-- Sidebar / AI -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-md p-6 h-full flex flex-col" data-aos="fade-left">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-teal-100 rounded-full flex items-center justify-center text-teal-600">
                        <i class="fa-solid fa-robot"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">AI Assistant</h3>
                </div>
                <div class="flex-grow bg-gray-50 rounded-lg p-4 mb-4 border border-gray-100 text-center flex flex-col items-center justify-center text-gray-500">
                    <i class="fa-regular fa-comments text-4xl mb-2 opacity-50"></i>
                    <p>Ask me anything about medical procedures or latest research.</p>
                </div>
                <a href="/ai" class="w-full block text-center bg-teal-600 text-white px-4 py-3 rounded-lg hover:bg-teal-700 transition">Start Chat</a>
            </div>
        </div>
    </div>
</div>
