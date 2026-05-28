<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professor Details</title>

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

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>

</head>

<body class="bg-gray-100 dark:bg-gray-950 min-h-screen transition duration-300">

    <!-- Navbar -->
    <nav class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800 shadow-sm">

        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

            <div>
                <h1 class="text-2xl font-extrabold text-blue-600 dark:text-blue-400">
                    Student Portal
                </h1>
            </div>

            <div class="flex items-center gap-3">

                <!-- Theme Button -->
                <button
                    onclick="toggleTheme()"
                    class="h-11 w-11 rounded-xl bg-gray-100 dark:bg-gray-800 hover:scale-105 transition flex items-center justify-center text-lg"
                >
                    🌙
                </button>

                <!-- Back -->
                <a
                    href="{{ route('professors.index') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl font-semibold shadow-md transition"
                >
                    Back
                </a>

            </div>

        </div>

    </nav>

    <!-- Main -->
    <section class="max-w-7xl mx-auto px-6 py-16">

        <div class="bg-white dark:bg-gray-900 rounded-3xl shadow-2xl overflow-hidden border border-gray-200 dark:border-gray-800">

            <div class="grid grid-cols-1 lg:grid-cols-2">

                <!-- Left Image Section -->
                <div class="relative bg-gray-200 dark:bg-gray-800 min-h-[500px]">

                    <img
                        src="{{ asset($professor['image']) }}"
                        alt="Professor"
                        class="w-full h-full object-cover object-top"
                    >

                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

                    <!-- Bottom Content -->
                    <div class="absolute bottom-8 left-8">

                        <span class="bg-blue-600 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                            {{ $professor['department'] }}
                        </span>

                        <h1 class="mt-4 text-4xl md:text-5xl font-extrabold text-white leading-tight">
                            {{ $professor['name'] }}
                        </h1>

                    </div>

                </div>

                <!-- Right Content -->
                <div class="p-8 lg:p-12">

                    <!-- Heading -->
                    <div>

                        <p class="text-blue-600 dark:text-blue-400 font-semibold uppercase tracking-wide">
                            Professor Information
                        </p>

                        <h2 class="mt-2 text-3xl font-extrabold text-gray-900 dark:text-white">
                            Professional Details
                        </h2>

                    </div>

                    <!-- Info Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mt-10">

                        <!-- Subject -->
                        <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-5 border border-gray-200 dark:border-gray-700">

                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Subject
                            </p>

                            <h3 class="mt-2 text-lg font-bold text-gray-800 dark:text-white">
                                {{ $professor['subject'] }}
                            </h3>

                        </div>

                        <!-- Experience -->
                        <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-5 border border-gray-200 dark:border-gray-700">

                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Experience
                            </p>

                            <h3 class="mt-2 text-lg font-bold text-gray-800 dark:text-white">
                                {{ $professor['experience'] }}
                            </h3>

                        </div>

                        <!-- Qualification -->
                        <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-5 border border-gray-200 dark:border-gray-700">

                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Qualification
                            </p>

                            <h3 class="mt-2 text-lg font-bold text-gray-800 dark:text-white">
                                {{ $professor['qualification'] }}
                            </h3>

                        </div>

                        <!-- Phone -->
                        <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-5 border border-gray-200 dark:border-gray-700">

                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Phone
                            </p>

                            <h3 class="mt-2 text-lg font-bold text-gray-800 dark:text-white">
                                {{ $professor['phone'] }}
                            </h3>

                        </div>

                    </div>

                    <!-- Email -->
                    <div class="mt-6 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-2xl p-5">

                        <p class="text-sm text-blue-600 dark:text-blue-400 font-semibold">
                            Official Email
                        </p>

                        <h3 class="mt-2 text-lg font-bold text-blue-700 dark:text-blue-300 break-all">
                            {{ $professor['email'] }}
                        </h3>

                    </div>

                    <!-- About -->
                    <div class="mt-10">

                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            About Professor
                        </h2>

                        <p class="text-gray-600 dark:text-gray-400 leading-8 text-[15px]">
                            {{ $professor['about'] }}
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Theme Script -->
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