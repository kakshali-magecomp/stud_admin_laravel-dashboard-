<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Dark Mode -->
    <script>
        if (
            localStorage.theme === 'dark' ||
            (!('theme' in localStorage) &&
            window.matchMedia('(prefers-color-scheme: dark)').matches)
        ) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>

</head>

<body class="bg-gray-100 dark:bg-gray-900 min-h-screen flex items-center justify-center px-4 transition duration-300">

    <!-- Login Card -->
    <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-8">

        <!-- Heading -->
        <div class="text-center mb-8">

            <h1 class="text-3xl font-bold text-gray-800 dark:text-white">
                Welcome Back
            </h1>

            <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
                Login to your student account
            </p>

        </div>

        <!-- Errors -->
        @if ($errors->any())

            <div class="mb-5 bg-red-100 dark:bg-red-900/30 border border-red-200 dark:border-red-800 text-red-700 dark:text-red-300 p-4 rounded-xl text-sm">
                <ul class="space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('login.store') }}" method="POST">
            @csrf

            <!-- Email -->
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Email Address
                </label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Enter your email"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Password
                </label>

                <input type="password" name="password" required placeholder="Enter your password"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Login Button -->
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold transition">
                Login
            </button>
        </form>

        <!-- Register -->
        <div class="mt-6 text-center text-sm text-gray-600 dark:text-gray-400">
            Don’t have an account?
            <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 font-medium">
                Register
            </a>
        </div>

        <!-- Theme Toggle -->
        <div class="mt-6 text-center">
            <button onclick="toggleTheme()" class="text-sm text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition">
                Toggle Theme 🌙
            </button>
        </div>
    </div>

    <script>
        function toggleTheme() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.theme = 'light';
            } else {
                document.documentElement.classList.add('dark');
                localStorage.theme = 'dark';
            }
        }
    </script>
</body>
</html>