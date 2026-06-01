<!DOCTYPE html>
<html>
<head>
    <title>Course Enrollment</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwind dark mode config -->
    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>

    <!-- Theme loader (RUNS BEFORE PAGE LOAD) -->
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
</head>

<body class="bg-gray-100 dark:bg-gray-900 min-h-screen transition-all duration-300">

<!-- HEADER -->
<section class="relative overflow-hidden bg-gradient-to-r from-blue-600 via-indigo-700 to-purple-700 dark:from-gray-800 dark:via-gray-900 dark:to-black">

    <div class="relative max-w-7xl mx-auto px-6 py-20 text-center">

        <!-- DARK MODE TOGGLE BUTTON -->
        <button onclick="toggleTheme()"
            class="absolute top-5 right-5 bg-white/20 hover:bg-white/30 text-white px-4 py-2 rounded-xl transition">
            🌙 
        </button>

        <span class="bg-white/20 text-white px-5 py-2 rounded-full text-sm uppercase tracking-widest">
            Enrollment Portal
        </span>

        <h1 class="mt-6 text-5xl font-extrabold text-white">
            Enroll in {{ $course['title'] }}
        </h1>

        <p class="mt-4 text-blue-100 max-w-3xl mx-auto">
            Take the next step in your career and join thousands of students learning professional skills.
        </p>

    </div>
</section>

<!-- CONTENT -->
<section class="max-w-7xl mx-auto px-6 py-16">

    <div class="grid lg:grid-cols-2 gap-10">

        <!-- COURSE CARD -->
        <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-xl overflow-hidden border border-gray-200 dark:border-gray-700">

            <img src="{{ asset($course['image']) }}"
                class="w-full h-80 object-cover">

            <div class="p-8">

                <span class="bg-blue-600 text-white text-sm px-4 py-2 rounded-full">
                    {{ $course['category'] }}
                </span>

                <h1 class="text-4xl font-bold mt-6 text-gray-800 dark:text-white">
                    {{ $course['title'] }}
                </h1>

                <p class="mt-5 text-gray-600 dark:text-gray-300">
                    {{ $course['description'] }}
                </p>

            </div>
        </div>

        <!-- FORM -->
        <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-xl border border-gray-200 dark:border-gray-700 p-8">

            <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">
                Enrollment Form
            </h2>

            <form action="{{ route('courses.storeEnrollment') }}" method="POST" class="space-y-6">
                @csrf

                <input type="hidden" name="course_id" value="{{ $course['id'] }}">

                <input type="text" name="name" placeholder="Full Name"
                    class="w-full rounded-xl p-3 border dark:bg-gray-700 dark:text-white" required>

                <input type="email" name="email" placeholder="Email"
                    class="w-full rounded-xl p-3 border dark:bg-gray-700 dark:text-white" required>

                <input type="text" name="phone" placeholder="Phone"
                    class="w-full rounded-xl p-3 border dark:bg-gray-700 dark:text-white" required>

                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl">
                    Confirm Enrollment
                </button>
                <a href="{{ route('courses.index') }}" class="block text-center text-gray-600 dark:text-gray-300 hover:underline">
                    Back to Courses
                </a>
            </form>

        </div>

    </div>

</section>

<!-- DARK MODE SCRIPT -->
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