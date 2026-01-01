<!-- src/Views/auth/register.php -->
<div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50">
    <div class="max-w-md w-full space-y-8 glass-card p-10 rounded-2xl shadow-xl" data-aos="fade-up">
        <div class="text-center">
            <i class="fa-solid fa-user-plus text-medical-600 text-5xl mb-4"></i>
            <h2 class="mt-2 text-3xl font-extrabold text-gray-900">Create Account</h2>
            <p class="mt-2 text-sm text-gray-600">
                Already have an account? <a href="/login" class="font-medium text-medical-600 hover:text-medical-500">Sign in</a>
            </p>
        </div>

        <?php if(isset($_SESSION['error'])): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline"><?= htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?></span>
            </div>
        <?php endif; ?>

        <form class="mt-8 space-y-6" action="/register" method="POST">
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="name" class="sr-only">Full Name</label>
                    <input id="name" name="name" type="text" autocomplete="name" required class="appearance-none rounded-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-medical-500 focus:border-medical-500 focus:z-10 sm:text-sm" placeholder="Full Name">
                </div>
                <div>
                    <label for="email-address" class="sr-only">Email address</label>
                    <input id="email-address" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-medical-500 focus:border-medical-500 focus:z-10 sm:text-sm" placeholder="Email address">
                </div>
                <div>
                    <label for="phone" class="sr-only">Phone Number</label>
                    <input id="phone" name="phone" type="tel" autocomplete="tel" class="appearance-none rounded-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-medical-500 focus:border-medical-500 focus:z-10 sm:text-sm" placeholder="Phone Number (e.g., 2547...)" required>
                </div>
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" autocomplete="new-password" required class="appearance-none rounded-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-medical-500 focus:border-medical-500 focus:z-10 sm:text-sm" placeholder="Password">
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-medical-600 hover:bg-medical-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-medical-500 transition shadow-lg hover:shadow-xl">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <i class="fa-solid fa-user-plus text-medical-500 group-hover:text-medical-400"></i>
                    </span>
                    Register
                </button>
            </div>
        </form>
    </div>
</div>
