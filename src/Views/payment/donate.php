<!-- src/Views/payment/donate.php -->
<div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50">
    <div class="max-w-lg w-full space-y-8 glass-card p-10 rounded-2xl shadow-xl" data-aos="zoom-in">
        <div class="text-center">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-green-100 mb-6">
                <i class="fa-solid fa-hand-holding-heart text-green-600 text-4xl"></i>
            </div>
            <h2 class="text-3xl font-extrabold text-gray-900">Make a Donation</h2>
            <p class="mt-2 text-gray-600">
                Support medical research and community events. Secure payment via M-Pesa.
            </p>
        </div>

        <form id="donationForm" class="mt-8 space-y-6">
            <div id="responseMessage" class="hidden rounded-md p-4 mb-4"></div>

            <div class="rounded-md shadow-sm -space-y-px">
                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">M-Pesa Phone Number</label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-solid fa-phone text-gray-400"></i>
                        </div>
                        <input type="text" name="phone" id="phone" class="focus:ring-green-500 focus:border-green-500 block w-full pl-10 py-3 sm:text-sm border-gray-300 rounded-md" placeholder="07XX XXX XXX" required>
                    </div>
                </div>
                <div>
                    <label for="amount" class="block text-sm font-medium text-gray-700 mb-1">Amount (KES)</label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">KES</span>
                        </div>
                        <input type="number" name="amount" id="amount" class="focus:ring-green-500 focus:border-green-500 block w-full pl-12 py-3 sm:text-sm border-gray-300 rounded-md" placeholder="1000" required>
                    </div>
                </div>
            </div>

            <div class="flex gap-2 mb-4">
                <button type="button" onclick="setAmount(500)" class="flex-1 py-2 px-4 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">500</button>
                <button type="button" onclick="setAmount(1000)" class="flex-1 py-2 px-4 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">1000</button>
                <button type="button" onclick="setAmount(5000)" class="flex-1 py-2 px-4 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">5000</button>
            </div>

            <button type="submit" id="submitBtn" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition shadow-lg hover:shadow-xl">
                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                    <i class="fa-solid fa-lock text-green-500 group-hover:text-green-400"></i>
                </span>
                Pay with M-Pesa
            </button>

            <p class="text-xs text-center text-gray-500 mt-4">
                <i class="fa-solid fa-shield-halved mr-1"></i> Secured by Safaricom Daraja API
            </p>
        </form>
    </div>
</div>

<script>
    function setAmount(val) {
        document.getElementById('amount').value = val;
    }

    document.getElementById('donationForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        const btn = document.getElementById('submitBtn');
        const msgDiv = document.getElementById('responseMessage');
        const originalText = btn.innerHTML;

        // Loading state
        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin mr-2"></i> Processing...';
        msgDiv.classList.add('hidden');

        const formData = new FormData(this);

        try {
            const response = await fetch('/donate/process', {
                method: 'POST',
                body: formData
            });
            const data = await response.json();

            msgDiv.classList.remove('hidden');
            if (data.success) {
                msgDiv.className = 'bg-green-100 text-green-700 p-4 rounded-md mb-4';
                msgDiv.innerHTML = '<i class="fa-solid fa-check-circle mr-2"></i> ' + data.message;
            } else {
                msgDiv.className = 'bg-red-100 text-red-700 p-4 rounded-md mb-4';
                msgDiv.innerHTML = '<i class="fa-solid fa-circle-exclamation mr-2"></i> ' + data.message;
            }
        } catch (error) {
            msgDiv.classList.remove('hidden');
            msgDiv.className = 'bg-red-100 text-red-700 p-4 rounded-md mb-4';
            msgDiv.innerHTML = 'An error occurred. Please try again.';
        } finally {
            btn.disabled = false;
            btn.innerHTML = originalText;
        }
    });
</script>
