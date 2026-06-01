<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses Page</title>

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

<body class="bg-gray-100 dark:bg-gray-900 min-h-screen flex flex-col transition-all duration-300">

    <nav class="sticky top-0 z-50 bg-blue-600 dark:bg-gray-800 shadow-lg">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <!-- Left -->
            <div class="flex items-center gap-6">
                <a href="{{ route('lang.switch', 'en') }}">English</a> |
                <a href="{{ route('lang.switch', 'hi') }}">Hindi</a>
                <h1 class="text-2xl font-bold text-white tracking-wide">
                    Student Portal
                </h1>
                <h1>{{ __('messages.welcome') }}</h1>

                <div class="hidden md:flex items-center gap-4 text-sm">
                    <a href="{{ route('student.dashboard') }}" class="text-white hover:text-blue-200 transition">
                        Dashboard
                    </a>

                    <!-- Courses -->
                    <a href="{{ route('courses.index') }}" class="px-4 py-2 rounded-xl text-sm font-semibold bg-blue-600 text-white shadow-lg">
                        Courses
                    </a>

                    <a href="{{ route('professors.index') }}" class="text-white hover:text-blue-200 transition">
                        Professors
                    </a>
                    <a href="{{ route('about.index') }}" class="text-white hover:text-blue-200 transition">
                        About Us
                    </a>
                </div>
            </div>

            <!-- Right -->
            <div class="flex items-center gap-3">

                <!-- Theme -->
                <button onclick="toggleTheme()" class="bg-white/20 hover:bg-white/30 text-white px-4 py-2 rounded-xl transition duration-300">
                    🌙
                </button>

                <!-- Logout -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit" class="bg-blue-800 dark:bg-red-600 hover:bg-blue-900 dark:hover:bg-red-700 text-white px-4 py-2 rounded-xl transition duration-300">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <section class="relative overflow-hidden bg-gradient-to-r from-blue-600 via-indigo-700 to-purple-700 dark:from-gray-800 dark:via-gray-900 dark:to-black">

        <!-- Overlay -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 h-40 w-40 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 h-56 w-56 bg-pink-300 rounded-full blur-3xl"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-6 py-24 text-center">

            <span class="bg-white/20 text-white text-sm px-5 py-2 rounded-full uppercase tracking-widest font-semibold">
                Professional Learning Platform
            </span>

            <h1 class="mt-8 text-5xl md:text-6xl font-extrabold text-white leading-tight">
                Explore Professional Courses
            </h1>

            <p class="mt-6 text-lg md:text-xl text-blue-100 dark:text-gray-300 max-w-3xl mx-auto leading-8">
                Discover industry-focused courses in Artificial Intelligence,
                Engineering, Web Development, Cyber Security, Business,
                Cloud Computing and modern technologies.
            </p>

            <!-- Buttons -->
            <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">

                <a href="#courses" class="bg-white text-blue-700 hover:bg-gray-100 px-8 py-3 rounded-2xl font-semibold transition duration-300 shadow-lg">
                    Browse Courses
                </a>

                <a href="{{ route('student.dashboard') }}" class="border border-white/30 text-white hover:bg-white/10 px-8 py-3 rounded-2xl font-semibold transition duration-300">
                    Back to Dashboard
                </a>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 py-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Card -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
                <h3 class="text-4xl font-bold text-blue-600">
                    50+
                </h3>

                <p class="mt-3 text-gray-600 dark:text-gray-300">
                    Professional Courses Available
                </p>

            </div>

            <!-- Card -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">

                <h3 class="text-4xl font-bold text-green-600">
                    10K+
                </h3>

                <p class="mt-3 text-gray-600 dark:text-gray-300">
                    Active Students Learning
                </p>

            </div>

            <!-- Card -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">

                <h3 class="text-4xl font-bold text-purple-600">
                    98%
                </h3>

                <p class="mt-3 text-gray-600 dark:text-gray-300">
                    Placement Success Rate
                </p>
            </div>
        </div>
    </section>

    <section id="courses" class="max-w-7xl mx-auto px-6 py-10 flex-1">

        <!-- Heading -->
        <div class="text-center mb-14">
            <h2 class="text-4xl font-bold text-gray-800 dark:text-white">
                Trending Courses
            </h2>
            <p class="mt-4 text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                Upgrade your skills with premium technology and management courses.
            </p>
        </div>

        <!-- Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
            @foreach($courses as $course)
            <div class="group bg-white dark:bg-gray-800 rounded-3xl shadow-xl overflow-hidden border border-gray-200 dark:border-gray-700 hover:-translate-y-2 hover:shadow-2xl transition duration-500">

                <!-- Image -->
                <div class="relative h-60 overflow-hidden">
                    <img src="{{ asset($course->image) }}" alt="Course" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">

                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>

                    <!-- Category -->
                    <div class="absolute top-4 left-4">

                        <span class="bg-blue-600 text-white text-xs px-4 py-2 rounded-full font-semibold shadow-md">
                            {{ $course->category }}
                        </span>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-7">

                    <!-- Title -->
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                        {{ $course->title }}
                    </h2>

                    <!-- Description -->
                    <p class="mt-4 text-sm text-gray-600 dark:text-gray-300 leading-7">
                        {{ $course->description }}
                    </p>

                    <!-- Divider -->
                    <div class="border-t border-gray-200 dark:border-gray-700 my-6"></div>

                    <!-- Details -->
                    <div class="space-y-4">

                        <!-- Duration -->
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                Duration
                            </span>
                            <span class="text-sm font-bold text-gray-800 dark:text-white">
                                {{ $course->duration }}
                            </span>
                        </div>

                        <!-- Students -->
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                Students Enrolled
                            </span>
                            <span class="text-sm font-bold text-gray-800 dark:text-white">
                                {{ $course->students }}+
                            </span>
                        </div>

                        <!-- Rating -->
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                Rating
                            </span>
                            <span class="text-yellow-500">
                                ⭐⭐⭐⭐⭐
                            </span>
                        </div>
                    </div>

                    <!-- Button -->
                    <a href="{{ route('courses.enroll', $course->id) }}" class="block text-center mt-8 w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-2xl font-semibold transition duration-300 shadow-md">
                    Enroll Now
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- footer -->
    <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 mt-auto">
        <div class="max-w-7xl mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- About -->
                <div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-5">
                        Student Portal
                    </h3>

                    <p class="text-sm leading-7 text-gray-600 dark:text-gray-300">
                        Modern education platform built using Laravel and Tailwind CSS.
                        Explore trending professional courses and future-ready technologies.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-5">
                        Quick Links
                    </h3>
                    <ul class="space-y-4 text-sm">
                        <li>
                            <a href="{{ route('student.dashboard') }}" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition">
                                Dashboard
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('courses.index') }}" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition">
                                Courses
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('professors.index') }}" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition">
                                Professors
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about.index') }}" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition">
                                About Us
                            </a>
                        </li>   
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-5">
                        Contact
                    </h3>
                    <div class="space-y-4 text-sm text-gray-600 dark:text-gray-300">
                        <p>📧 support@studentportal.com</p>
                        <p>📞 +91 98765 43210</p>
                        <p>📍 Bhavnagar, Gujarat, India</p>
                    </div>
                </div>
            </div>

            <!-- Bottom -->
            <div class="border-t border-gray-200 dark:border-gray-700 mt-10 pt-6 flex flex-col md:flex-row items-center justify-between gap-4">

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    © {{ date('Y') }} Student Portal. All rights reserved.
                </p>

                <!-- Social -->
                <div class="flex items-center gap-4 text-xl">

                    <a href="#" class="hover:scale-110 transition duration-300">
                        🌐
                    </a>

                    <a href="#" class="hover:scale-110 transition duration-300">
                        📸
                    </a>

                    <a href="#" class="hover:scale-110 transition duration-300">
                        🐦
                    </a>

                    <a href="#" class="hover:scale-110 transition duration-300">
                        💼
                    </a>
                </div>
            </div>
        </div>
    </footer>

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