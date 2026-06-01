<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | Student Portal</title>

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

<body class="bg-gray-100 dark:bg-gray-950 min-h-screen flex flex-col transition duration-300">

    <!-- Navbar -->
    <nav class="sticky top-0 z-50 bg-white/90 dark:bg-gray-900/90 backdrop-blur border-b border-gray-200 dark:border-gray-800 shadow-sm">

        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

            <div class="flex items-center gap-8">

                <h1 class="text-2xl font-extrabold text-blue-600 dark:text-blue-400">
                    Student Portal
                </h1>

                <div class="hidden md:flex items-center gap-3">

                    <a href="{{ route('student.dashboard') }}"
                       class="px-4 py-2 rounded-xl text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        Dashboard
                    </a>

                    <a href="{{ route('courses.index') }}"
                       class="px-4 py-2 rounded-xl text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        Courses
                    </a>

                    <a href="{{ route('professors.index') }}"
                       class="px-4 py-2 rounded-xl text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        Professors
                    </a>

                    <a href="{{ route('about.index') }}"
                       class="px-4 py-2 rounded-xl text-sm font-semibold bg-blue-600 text-white shadow-lg">
                        About Us
                    </a>

                </div>

            </div>

            <div class="flex items-center gap-3">

                <button onclick="toggleTheme()"
                    class="h-11 w-11 rounded-xl bg-gray-100 dark:bg-gray-800 flex items-center justify-center hover:scale-105 transition">
                    🌙
                </button>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl font-semibold shadow-md transition">
                        Logout
                    </button>
                </form>

            </div>

        </div>

    </nav>

    <!-- Hero Section -->
    <section class="relative overflow-hidden">

        <div class="absolute inset-0 bg-gradient-to-r from-blue-700 via-indigo-700 to-slate-800"></div>
        <div class="absolute inset-0 bg-black/30"></div>

        <div class="absolute top-0 left-0 w-72 h-72 bg-blue-400/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-72 h-72 bg-indigo-500/30 rounded-full blur-3xl"></div>

        <div class="relative max-w-7xl mx-auto px-6 py-24 text-center">

            <span class="inline-block bg-white/10 backdrop-blur px-5 py-2 rounded-full text-sm font-semibold text-blue-100 border border-white/20">
                ABOUT OUR PLATFORM
            </span>

            <h1 class="mt-6 text-5xl md:text-6xl font-extrabold text-white leading-tight">
                Building The Future Of
                <span class="text-blue-300">
                    Education
                </span>
            </h1>

            <p class="mt-6 max-w-3xl mx-auto text-lg md:text-xl text-blue-100 leading-8">
                Student Portal helps students connect with courses,
                professors and educational resources through a modern
                and user-friendly platform.
            </p>

        </div>

    </section>

    <!-- About Section -->
    <section class="max-w-7xl mx-auto px-6 py-20">

        <div class="text-center mb-16">

            <h2 class="text-4xl font-extrabold text-gray-900 dark:text-white">
                About Student Portal
            </h2>

            <p class="mt-6 max-w-4xl mx-auto text-lg text-gray-600 dark:text-gray-400 leading-8">
                Student Portal is a complete educational management platform
                built using Laravel and Tailwind CSS. It enables students
                to access courses, explore professor profiles, manage
                academic activities and stay connected with their institution.
            </p>

        </div>

        <div class="grid md:grid-cols-2 gap-8">

            <div class="bg-white dark:bg-gray-900 rounded-3xl p-8 shadow-lg border border-gray-200 dark:border-gray-800">

                <h3 class="text-2xl font-bold text-blue-600 mb-4">
                    Our Mission
                </h3>

                <p class="text-gray-600 dark:text-gray-400 leading-8">
                    To simplify education management by providing
                    students with easy access to academic information,
                    resources, faculty and learning opportunities.
                </p>

            </div>

            <div class="bg-white dark:bg-gray-900 rounded-3xl p-8 shadow-lg border border-gray-200 dark:border-gray-800">

                <h3 class="text-2xl font-bold text-blue-600 mb-4">
                    Our Vision
                </h3>

                <p class="text-gray-600 dark:text-gray-400 leading-8">
                    To become a trusted educational ecosystem that
                    empowers students and institutions through
                    technology, innovation and collaboration.
                </p>

            </div>

        </div>

    </section>

    <!-- Stats -->
    <section class="bg-white dark:bg-gray-900 border-y border-gray-200 dark:border-gray-800">

        <div class="max-w-7xl mx-auto px-6 py-20">

            <div class="grid grid-cols-2 md:grid-cols-4 gap-10 text-center">

                <div>
                    <h3 class="text-5xl font-extrabold text-blue-600">5000+</h3>
                    <p class="mt-3 text-gray-600 dark:text-gray-400">Students</p>
                </div>

                <div>
                    <h3 class="text-5xl font-extrabold text-blue-600">150+</h3>
                    <p class="mt-3 text-gray-600 dark:text-gray-400">Courses</p>
                </div>

                <div>
                    <h3 class="text-5xl font-extrabold text-blue-600">80+</h3>
                    <p class="mt-3 text-gray-600 dark:text-gray-400">Professors</p>
                </div>

                <div>
                    <h3 class="text-5xl font-extrabold text-blue-600">25+</h3>
                    <p class="mt-3 text-gray-600 dark:text-gray-400">Colleges</p>
                </div>

            </div>

        </div>

    </section>

    <!-- Why Choose Us -->
    <section class="max-w-7xl mx-auto px-6 py-20">

        <div class="text-center mb-16">

            <h2 class="text-4xl font-extrabold text-gray-900 dark:text-white">
                Why Choose Us
            </h2>

        </div>

        <div class="grid md:grid-cols-3 gap-8">

            <div class="bg-white dark:bg-gray-900 p-8 rounded-3xl shadow-lg border border-gray-200 dark:border-gray-800">

                <div class="text-5xl mb-5">🎓</div>

                <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                    Quality Education
                </h3>

                <p class="mt-4 text-gray-600 dark:text-gray-400">
                    Learn from experienced professors and industry experts.
                </p>

            </div>

            <div class="bg-white dark:bg-gray-900 p-8 rounded-3xl shadow-lg border border-gray-200 dark:border-gray-800">

                <div class="text-5xl mb-5">💻</div>

                <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                    Modern Technology
                </h3>

                <p class="mt-4 text-gray-600 dark:text-gray-400">
                    Built with modern web technologies for the best experience.
                </p>

            </div>

            <div class="bg-white dark:bg-gray-900 p-8 rounded-3xl shadow-lg border border-gray-200 dark:border-gray-800">

                <div class="text-5xl mb-5">🚀</div>

                <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                    Career Growth
                </h3>

                <p class="mt-4 text-gray-600 dark:text-gray-400">
                    Helping students achieve their academic and professional goals.
                </p>

            </div>

        </div>

    </section>

    <!-- Team Section -->
<section class="max-w-7xl mx-auto px-6 py-20">

    <div class="text-center mb-16">

        <h2 class="text-4xl font-extrabold text-gray-900 dark:text-white">
            Meet Our Team
        </h2>

        <p class="mt-4 text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
            The passionate people behind Student Portal.
        </p>

    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

        @foreach($teamMembers as $member)

        <div class="group bg-white dark:bg-gray-900 rounded-3xl overflow-hidden shadow-lg border border-gray-200 dark:border-gray-800 hover:-translate-y-2 hover:shadow-2xl transition duration-500">

            <div class="overflow-hidden">
                <img
                    src="{{ asset($member['image']) }}"
                    alt="{{ $member['name'] }}"
                    class="w-full h-80 object-cover group-hover:scale-110 transition duration-700"
                >
            </div>

            <div class="p-6 text-center">

                <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                    {{ $member['name'] }}
                </h3>

                <p class="text-blue-600 dark:text-blue-400 mt-2 font-semibold">
                    {{ $member['role'] }}
                </p>

                <p class="mt-4 text-sm text-gray-600 dark:text-gray-400 leading-7">
                    {{ $member['description'] }}
                </p>

                <div class="mt-5">
                    <span class="inline-block px-4 py-2 bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-300 rounded-full text-xs font-semibold">
                        {{ $member['experience'] }}
                    </span>
                </div>

            </div>

        </div>

        @endforeach

    </div>

</section>

    <!-- Footer -->
    <footer class="mt-auto bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800">

        <div class="max-w-7xl mx-auto px-6 py-12">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

                <div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                        Student Portal
                    </h3>

                    <p class="mt-4 text-sm leading-7 text-gray-600 dark:text-gray-400">
                        Modern student management platform built using Laravel
                        and Tailwind CSS with responsive design and dark mode.
                    </p>
                </div>

                <div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                        Quick Links
                    </h3>

                    <ul class="mt-4 space-y-3 text-sm">

                        <li><a href="{{ route('student.dashboard') }}" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition">Dashboard</a></li>

                        <li><a href="{{ route('courses.index') }}" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition">Courses</a></li>

                        <li><a href="{{ route('professors.index') }}" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition">Professors</a></li>

                    </ul>

                </div>

                <div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                        Contact
                    </h3>

                    <div class="mt-4 space-y-3 text-sm text-gray-600 dark:text-gray-400">
                        <p>📧 support@studentportal.com</p>
                        <p>📞 +91 98765 43210</p>
                        <p>📍 Bhavnagar, Gujarat, India</p>
                    </div>

                </div>

            </div>

            <div class="mt-10 pt-6 border-t border-gray-200 dark:border-gray-800 flex flex-col md:flex-row justify-between items-center gap-4">

                <p class="text-sm text-gray-500">
                    © {{ date('Y') }} Student Portal. All rights reserved.
                </p>

                <div class="flex gap-4 text-xl">
                    <a href="#">🌐</a>
                    <a href="#">📸</a>
                    <a href="#">🐦</a>
                    <a href="#">💼</a>
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
