<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

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

<body class="bg-gray-100 dark:bg-gray-900 min-h-screen transition duration-300">

    <!-- Navbar -->
    <nav class="bg-blue-600 dark:bg-gray-800 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-4">
                <h1 class="text-2xl font-bold">
                    Admin Portal
                </h1>
                <span class="bg-blue-700 px-3 py-1 rounded text-sm capitalize">
                    {{ $admin->role }} Panel
                </span>
            </div>

            <div class="flex items-center gap-3">
                <!-- Theme -->
                <button onclick="toggleTheme()" class="bg-white/20 hover:bg-white/30 px-4 py-2 rounded-lg transition">
                    🌙
                </button>

                <!-- Logout -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit" class="bg-blue-800 hover:bg-blue-900 px-4 py-2 rounded-lg transition">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main -->
    <main class="max-w-7xl mx-auto px-6 py-10">

        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 mb-8">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-white">
                Welcome Back, {{ $admin->name }}
            </h2>
            <p class="text-gray-500 dark:text-gray-300 mt-2">
                Administrative Dashboard Overview
            </p>
        </div>

        <!-- Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border-t-4 border-blue-600">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Total Students
                </p>
                <h3 class="text-4xl font-bold text-gray-800 dark:text-white mt-3">
                    {{ count($students) }}
                </h3>
            </div>

            <!-- Courses -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border-t-4 border-orange-500">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Total Courses
                </p>
                <h3 class="text-4xl font-bold text-gray-800 dark:text-white mt-3">
                    {{ count($courses) }}
                </h3>
            </div>

            <!-- Professors -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border-t-4 border-green-500">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Total Professors
                </p>
                <h3 class="text-4xl font-bold text-gray-800 dark:text-white mt-3">
                    {{ count($professors) }}
                </h3>
            </div>
        </div>

        <!-- Students Table -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 mb-10">
            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">
                Students Information
            </h3>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b dark:border-gray-700">
                            <th class="text-left py-3 text-gray-500 dark:text-gray-300">
                                Name
                            </th>

                            <th class="text-left py-3 text-gray-500 dark:text-gray-300">
                                Email
                            </th>

                            <th class="text-left py-3 text-gray-500 dark:text-gray-300">
                                Phone
                            </th>

                            <th class="text-left py-3 text-gray-500 dark:text-gray-300">
                                Joined
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr class="border-b dark:border-gray-700">
                            <td class="py-4 text-gray-800 dark:text-white">
                                {{ $student->name }}
                            </td>

                            <td class="py-4 text-gray-600 dark:text-gray-300">
                                {{ $student->email }}
                            </td>

                            <td class="py-4 text-gray-600 dark:text-gray-300">
                                {{ $student->phone }}
                            </td>

                            <td class="py-4 text-gray-600 dark:text-gray-300">
                                {{ $student->created_at->format('d M Y') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Courses -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 mb-10">
            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">
                Courses Information
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
                @foreach($courses as $course)
                <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-5">
                    <h4 class="text-lg font-bold text-gray-800 dark:text-white">
                        {{ $course['title'] }}
                    </h4>
                    <p class="text-sm text-gray-500 dark:text-gray-300 mt-2">
                        {{ $course['category'] }}
                    </p>
                    <p class="mt-4 text-blue-600 dark:text-blue-400 font-semibold">
                        {{ $course['students'] }} Students
                    </p>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Professors -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6">
            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">
                Professors Information
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                @foreach($professors as $professor)
                <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-5">
                    <h4 class="text-lg font-bold text-gray-800 dark:text-white">
                        {{ $professor['name'] }}
                    </h4>
                    <p class="text-sm text-gray-500 dark:text-gray-300 mt-2">
                        {{ $professor['department'] }}
                    </p>
                    <p class="mt-4 text-green-600 dark:text-green-400 font-semibold">
                        {{ $professor['experience'] }}
                    </p>
                </div>
                @endforeach
            </div>
        </div>
    </main>

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