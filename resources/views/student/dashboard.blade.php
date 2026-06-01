<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>

    <!-- Dark Mode Check -->
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

<body class="bg-gray-100 dark:bg-gray-900 min-h-screen flex flex-col transition-all duration-300">

    <nav class="sticky top-0 z-50 bg-blue-600 dark:bg-gray-800 shadow-lg">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <!-- Left -->
            <div class="flex items-center gap-4">
                <h1 class="text-2xl font-bold text-white tracking-wide">
                    Student Portal
                </h1>
                <span class="hidden sm:block bg-blue-700 dark:bg-gray-700 text-white text-sm px-3 py-1 rounded-full capitalize">
                    {{ $student->role }} Panel
                </span>
            </div>

            <!-- Right -->
            <div class="flex items-center gap-3">
                <!-- Dashboard -->
                <a href="{{ route('student.dashboard') }}" class="hidden md:block bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-xl transition duration-300">
                    Dashboard
                </a>

                <!-- Courses -->
                <a href="{{ route('courses.index') }}" class="hidden md:block bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-xl transition duration-300">
                    Courses
                </a>

                <!-- Professors -->
                <a href="{{ route('professors.index') }}" class="hidden md:block bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-xl transition duration-300">
                    Professors
                </a>
                <!-- About Us -->
                <a href="{{ route('about.index') }}" class="hidden md:block bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-xl transition duration-300">
                    About Us
                </a>

                <!-- Theme Toggle -->
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

    <!-- main contain -->
    <div class="flex-1 max-w-7xl mx-auto w-full px-6 py-8 flex flex-col lg:flex-row gap-8">
        <aside class="w-full lg:w-80 shrink-0">
            <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-xl p-6 sticky top-24 border border-gray-200 dark:border-gray-700">

                <!-- Profile -->
                <div class="flex flex-col items-center text-center">

                    <!-- Avatar -->
                    <div class="h-28 w-28 rounded-full bg-blue-100 dark:bg-gray-700 text-blue-600 dark:text-white flex items-center justify-center text-5xl font-bold uppercase shadow-inner">
                        {{ substr($student->name, 0, 1) }}
                    </div>

                    <!-- Name -->
                    <h2 class="mt-5 text-2xl font-bold text-gray-800 dark:text-white">
                        {{ $student->name }}
                    </h2>

                    <!-- Badge -->
                    <span class="mt-3 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 text-xs font-semibold uppercase tracking-wide px-4 py-1 rounded-full">
                        Verified Student
                    </span>

                </div>

                <!-- Student Info -->
                <div class="mt-8 border-t border-gray-200 dark:border-gray-700 pt-6 space-y-5">
                    <div>
                        <p class="text-xs uppercase tracking-widest text-gray-400 font-bold">
                            Email Address
                        </p>

                        <p class="mt-1 text-sm text-gray-800 dark:text-gray-200 break-all">
                            {{ $student->email }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs uppercase tracking-widest text-gray-400 font-bold">
                            Phone Number
                        </p>

                        <p class="mt-1 text-sm text-gray-800 dark:text-gray-200">
                            {{ $student->phone }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs uppercase tracking-widest text-gray-400 font-bold">
                            Account Status
                        </p>

                        <div class="mt-1 flex items-center text-sm text-green-600 dark:text-green-400 font-semibold">
                            <span class="h-2.5 w-2.5 bg-green-500 rounded-full mr-2"></span>
                            Active
                        </div>
                    </div>

                </div>

                <!-- Session -->
                <div class="mt-8 border-t border-gray-200 dark:border-gray-700 pt-6 text-center">

                    <p class="text-xs uppercase tracking-widest text-gray-400 font-bold">
                        Current Session
                    </p>

                    <p class="mt-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
                        {{ now()->format('d M Y') }}
                    </p>
                </div>
            </div>
        </aside>

        <!-- main contain for right side-->
        <main class="flex-1 space-y-8">
            @foreach($colleges as $collegeData)

            <!-- Card -->
            <div class="bg-white dark:bg-gray-800 rounded-3xl overflow-hidden shadow-xl border border-gray-200 dark:border-gray-700">
                <div class="relative h-80 overflow-hidden">
                    <img src="{{ asset($collegeData['image']) }}" alt="College" class="w-full h-full object-cover hover:scale-105 transition duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent flex items-end">
                        <div class="p-8">
                            <span class="bg-orange-500 text-white text-xs uppercase tracking-widest font-semibold px-4 py-2 rounded-full">
                                Allocated Destination
                            </span>

                            <h2 class="mt-4 text-4xl font-bold text-white">
                                {{ $collegeData['name'] }}
                            </h2>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-8">

                    <!-- Top Info -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-2xl border border-gray-200 dark:border-gray-600 p-5">
                            <p class="text-xs uppercase text-gray-400 font-bold">
                                Campus
                            </p>

                            <p class="mt-2 text-sm font-semibold text-gray-800 dark:text-white">
                                {{ $collegeData['campus'] }}
                            </p>
                        </div>

                        <div class="bg-gray-50 dark:bg-gray-700 rounded-2xl border border-gray-200 dark:border-gray-600 p-5">
                            <p class="text-xs uppercase text-gray-400 font-bold">
                                Dean
                            </p>

                            <p class="mt-2 text-sm font-semibold text-gray-800 dark:text-white">
                                {{ $collegeData['dean'] }}
                            </p>
                        </div>

                        <div class="bg-gray-50 dark:bg-gray-700 rounded-2xl border border-gray-200 dark:border-gray-600 p-5">
                            <p class="text-xs uppercase text-gray-400 font-bold">
                                Library Timing
                            </p>

                            <p class="mt-2 text-sm font-semibold text-gray-800 dark:text-white">
                                {{ $collegeData['library_hours'] }}
                            </p>
                        </div>

                    </div>

                    <!-- Notice -->
                    <div class="mt-8 bg-yellow-50 dark:bg-yellow-900/20 border-l-4 border-yellow-500 rounded-r-2xl p-6">
                        <p class="text-xs uppercase tracking-widest font-bold text-yellow-700 dark:text-yellow-300">
                            Latest Notice
                        </p>

                        <p class="mt-3 text-sm leading-7 text-yellow-900 dark:text-yellow-100">
                            {{ $collegeData['notice'] }}
                        </p>

                    </div>

                    <!-- Courses & Professors -->
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-8 mt-10">

                        <!-- Courses -->
                        <div>
                            <h3 class="flex items-center text-xl font-bold text-gray-800 dark:text-white mb-5">
                                <span class="h-6 w-1.5 bg-blue-600 rounded-full mr-3"></span>
                                Core Courses
                            </h3>
                            <div class="space-y-4">

                                @foreach($collegeData['courses'] as $course)
                                <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-100 dark:border-blue-800 rounded-2xl p-4 flex items-center justify-between">
                                    <span class="text-sm font-semibold text-blue-800 dark:text-blue-200">
                                        {{ $course }}
                                    </span>
                                    <span class="bg-blue-600 text-white text-xs px-3 py-1 rounded-full">
                                        Active
                                    </span>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Professors -->
                        <div>
                            <h3 class="flex items-center text-xl font-bold text-gray-800 dark:text-white mb-5">
                                <span class="h-6 w-1.5 bg-green-600 rounded-full mr-3"></span>
                                Professors
                            </h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                                @foreach($collegeData['professors'] as $prof)
                                <div class="bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-2xl p-4 flex items-center gap-4">

                                    <img src="{{ asset($prof['img']) }}" alt="Professor" class="w-16 h-16 rounded-full object-cover border-2 border-white dark:border-gray-600 shadow-md">
                                    <div>
                                        <h4 class="text-sm font-bold text-gray-800 dark:text-white">
                                            {{ $prof['name'] }}
                                        </h4>

                                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-300">
                                            {{ $prof['dept'] }}
                                        </p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

            <!-- Pagination -->
            <div class="flex justify-center pt-4">
                {{ $colleges->links() }}
            </div>

        </main>

    </div>

    <!-- footer contain -->
    <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 mt-auto">
        <div class="max-w-7xl mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

                <!-- About -->
                <div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                        Student Portal
                    </h3>

                    <p class="text-sm leading-7 text-gray-600 dark:text-gray-300">
                        Modern student management portal created with Laravel and Tailwind CSS.
                        Manage colleges, professors, courses, and students with responsive UI.
                    </p>

                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
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
                    </ul>
                </div>

                <!-- Contact -->
                <div>

                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                        Contact Us
                    </h3>

                    <div class="space-y-3 text-sm text-gray-600 dark:text-gray-300">

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