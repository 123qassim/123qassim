<!-- src/Views/admin/index.php -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Admin Panel</h1>
        <span class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">Administrator</span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
        <!-- Card -->
        <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-blue-500">
            <p class="text-sm text-gray-500 mb-1">Total Users</p>
            <h3 class="text-3xl font-bold text-gray-900"><?= $totalUsers ?></h3>
        </div>
        <!-- Card -->
        <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-green-500">
            <p class="text-sm text-gray-500 mb-1">Total Revenue (KES)</p>
            <h3 class="text-3xl font-bold text-gray-900"><?= number_format($totalRevenue, 2) ?></h3>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Users List -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-xl font-bold text-gray-900 mb-6">Recent Users</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php foreach($users as $u): ?>
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-900"><?= htmlspecialchars($u['name']) ?></td>
                                <td class="px-4 py-2 text-sm text-gray-500"><?= htmlspecialchars($u['email']) ?></td>
                                <td class="px-4 py-2 text-sm text-gray-500"><?= htmlspecialchars($u['role']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Transactions List -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-xl font-bold text-gray-900 mb-6">Recent Transactions</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">User</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php foreach($transactions as $t): ?>
                            <tr>
                                <td class="px-4 py-2 text-sm text-gray-900"><?= htmlspecialchars($t['name'] ?? 'Unknown') ?></td>
                                <td class="px-4 py-2 text-sm text-gray-900"><?= number_format($t['amount']) ?></td>
                                <td class="px-4 py-2 text-sm">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                        <?= $t['status'] == 'COMPLETED' ? 'bg-green-100 text-green-800' :
                                            ($t['status'] == 'FAILED' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') ?>">
                                        <?= $t['status'] ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
