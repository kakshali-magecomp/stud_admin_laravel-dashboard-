<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professors Page</title>

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

<body class="bg-gray-100 dark:bg-gray-950 min-h-screen flex flex-col transition duration-300">

    <nav class="sticky top-0 z-50 bg-white/90 dark:bg-gray-900/90 backdrop-blur border-b border-gray-200 dark:border-gray-800 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-8">
                <div>
                    <h1 class="text-2xl font-extrabold text-blue-600 dark:text-blue-400 tracking-wide">
                        Student Portal
                    </h1>
                </div>

                <div class="hidden md:flex items-center gap-3">

                    <a href="{{ route('student.dashboard') }}" class="px-4 py-2 rounded-xl text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        Dashboard
                    </a>

                    <a href="{{ route('courses.index') }}" class="px-4 py-2 rounded-xl text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        Courses
                    </a>

                    <a href="{{ route('professors.index') }}" class="px-4 py-2 rounded-xl text-sm font-semibold bg-blue-600 text-white shadow-lg">
                        Professors
                    </a>
                </div>
            </div>

            <!-- Right -->
            <div class="flex items-center gap-3">

                <button onclick="toggleTheme()" class="h-11 w-11 rounded-xl bg-gray-100 dark:bg-gray-800 hover:scale-105 transition flex items-center justify-center text-lg">
                    🌙
                </button>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl font-semibold shadow-md transition">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <section class="relative overflow-hidden">

        <!-- Background -->
        <div class="absolute inset-0 bg-gradient-to-r from-blue-700 via-indigo-700 to-slate-800"></div>
        <div class="absolute inset-0 bg-black/30"></div>
        <div class="absolute top-0 left-0 w-72 h-72 bg-blue-400/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-72 h-72 bg-indigo-500/30 rounded-full blur-3xl"></div>

        <!-- Content -->
        <div class="relative max-w-7xl mx-auto px-6 py-24 text-center">
            <span class="inline-block bg-white/10 backdrop-blur px-5 py-2 rounded-full text-sm font-semibold text-blue-100 border border-white/20">
                PROFESSIONAL FACULTY TEAM
            </span>

            <h1 class="mt-6 text-5xl md:text-6xl font-extrabold text-white leading-tight">
                Meet Our Expert
                <span class="text-blue-300">
                    Professors
                </span>
            </h1>

            <p class="mt-6 max-w-3xl mx-auto text-lg md:text-xl text-blue-100 leading-8">
                Learn from highly experienced professors, researchers,
                innovators and industry experts guiding students toward
                future-ready careers.
            </p>

        </div>

    </section>

    <section class="max-w-7xl mx-auto px-6 py-20">

        <!-- Heading -->
        <div class="text-center mb-16">
            <h2 class="text-4xl font-extrabold text-gray-900 dark:text-white">
                Our Faculty Members
            </h2>

            <p class="mt-4 text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                Dedicated educators committed to academic excellence,
                innovation and mentorship.
            </p>

        </div>

        <!-- Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-10">
            @foreach($professors as $professor)
            <!-- Card -->
            <div class="group bg-white dark:bg-gray-900 rounded-3xl overflow-hidden border border-gray-200 dark:border-gray-800 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition duration-500">
                <!-- Image -->
                <div class="relative overflow-hidden">
                    <img src="{{ asset($professor['image']) }}" alt="Professor" class="w-full h-80 object-cover group-hover:scale-110 transition duration-700">

                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>

                    <!-- Department -->
                    <div class="absolute top-5 left-5">
                        <span class="bg-blue-600 text-white text-xs px-4 py-2 rounded-full font-semibold shadow-lg">
                            {{ $professor['department'] }}
                        </span>
                    </div>

                    <!-- Name -->
                    <div class="absolute bottom-5 left-5">
                        <h2 class="text-2xl font-bold text-white">
                            {{ $professor['name'] }}
                        </h2>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-7">

                    <!-- Description -->
                    <p class="text-sm text-gray-600 dark:text-gray-400 leading-7">
                        {{ $professor['description'] }}
                    </p>

                    <!-- Divider -->
                    <div class="border-t border-gray-200 dark:border-gray-800 my-6"></div>

                    <!-- Details -->
                    <div class="space-y-4">

                        <!-- Experience -->
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                Experience
                            </span>
                            <span class="text-sm font-bold text-gray-800 dark:text-white">
                                {{ $professor['experience'] }}
                            </span>
                        </div>

                        <!-- Subject -->
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                Subject
                            </span>
                            <span class="text-sm font-bold text-gray-800 dark:text-white">
                                {{ $professor['subject'] }}
                            </span>
                        </div>

                        <!-- Email -->
                        <div class="flex items-center justify-between gap-4">
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                Email
                            </span>
                            <span class="text-sm font-bold text-blue-600 dark:text-blue-400 break-all text-right">
                                {{ $professor['email'] }}
                            </span>
                        </div>
                    </div>

                    <!-- Button -->
                    <a href="{{ route('professors.show', $professor['id']) }}" class="mt-8 w-full inline-flex items-center justify-center bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white py-3.5 rounded-2xl font-bold shadow-lg transition duration-300">
                        View Full Profile
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    
    <footer class="mt-auto bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800">
        <div class="max-w-7xl mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

                <!-- About -->
                <div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                        Student Portal
                    </h3>
                    <p class="mt-4 text-sm leading-7 text-gray-600 dark:text-gray-400">
                        Modern student management platform built using
                        Laravel and Tailwind CSS with responsive UI,
                        dark mode and professional design.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                        Quick Links
                    </h3>
                    <ul class="mt-4 space-y-3 text-sm">
                        <li>
                            <a href="{{ route('student.dashboard') }}" class="text-gray-600 dark:text-gray-400 hover:text-blue-600 transition">
                                Dashboard
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('courses.index') }}" class="text-gray-600 dark:text-gray-400 hover:text-blue-600 transition">
                                Courses
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('professors.index') }}" class="text-gray-600 dark:text-gray-400 hover:text-blue-600 transition">
                                Professors
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Contact -->
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

            <!-- Bottom -->
            <div class="mt-10 pt-6 border-t border-gray-200 dark:border-gray-800 flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-sm text-gray-500 dark:text-gray-500">
                    © {{ date('Y') }} Student Portal. All rights reserved.
                </p>

                <!-- Social -->
                <div class="flex items-center gap-4 text-xl">

                    <a href="#" class="hover:scale-110 transition">
                        🌐
                    </a>

                    <a href="#" class="hover:scale-110 transition">
                        📸
                    </a>

                    <a href="#" class="hover:scale-110 transition">
                        🐦
                    </a>

                    <a href="#" class="hover:scale-110 transition">
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