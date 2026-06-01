<!DOCTYPE html>
<html>
<head>
    <title>Course Enrollment</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
<section class="relative overflow-hidden bg-gradient-to-r from-blue-600 via-indigo-700 to-purple-700 dark:from-gray-800 dark:via-gray-900 dark:to-black">

    <div class="relative max-w-7xl mx-auto px-6 py-20 text-center">

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
<section class="max-w-7xl mx-auto px-6 py-16">

    <div class="grid lg:grid-cols-2 gap-10">

        <!-- Course Details -->
        <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-xl overflow-hidden border border-gray-200 dark:border-gray-700">

            <img src="{{ asset($course['image']) }}"
                alt="{{ $course['title'] }}"
                class="w-full h-80 object-cover">

            <div class="p-8">

                <span class="bg-blue-600 text-white text-sm px-4 py-2 rounded-full">
                    {{ $course['category'] }}
                </span>

                <h1 class="text-4xl font-bold mt-6 text-gray-800 dark:text-white">
                    {{ $course['title'] }}
                </h1>

                <p class="mt-5 text-gray-600 dark:text-gray-300 leading-7">
                    {{ $course['description'] }}
                </p>

                <div class="border-t border-gray-200 dark:border-gray-700 my-8"></div>

                <div class="space-y-4">

                    <div class="flex justify-between">
                        <span class="text-gray-500 dark:text-gray-400">
                            Duration
                        </span>

                        <span class="font-semibold text-gray-800 dark:text-white">
                            {{ $course['duration'] }}
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500 dark:text-gray-400">
                            Students
                        </span>

                        <span class="font-semibold text-gray-800 dark:text-white">
                            {{ $course['students'] }}+
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500 dark:text-gray-400">
                            Rating
                        </span>

                        <span class="text-yellow-500">
                            ⭐⭐⭐⭐⭐
                        </span>
                    </div>

                </div>
            </div>
        </div>

        <!-- Enrollment Form -->
        <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-xl border border-gray-200 dark:border-gray-700 p-8">

            <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">
                Enrollment Form
            </h2>

            <p class="text-gray-600 dark:text-gray-300 mb-8">
                Complete the form below to enroll in this course.
            </p>

            <form action="{{ route('courses.storeEnrollment') }}"
                method="POST"
                class="space-y-6">

                @csrf

                <input type="hidden"
                    name="course"
                    value="{{ $course['title'] }}">

                <div>
                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-300">
                        Full Name
                    </label>

                    <input type="text"
                        name="name"
                        required
                        class="w-full rounded-2xl border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white px-4 py-4 focus:ring-2 focus:ring-blue-500 outline-none">
                </div>

                <div>
                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-300">
                        Email Address
                    </label>

                    <input type="email"
                        name="email"
                        required
                        class="w-full rounded-2xl border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white px-4 py-4 focus:ring-2 focus:ring-blue-500 outline-none">
                </div>

                <div>
                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-300">
                        Mobile Number
                    </label>

                    <input type="text"
                        name="phone"
                        required
                        class="w-full rounded-2xl border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white px-4 py-4 focus:ring-2 focus:ring-blue-500 outline-none">
                </div>

                <div>
                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-300">
                        Why do you want to join this course?
                    </label>

                    <textarea
                        rows="4"
                        class="w-full rounded-2xl border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white px-4 py-4 focus:ring-2 focus:ring-blue-500 outline-none"></textarea>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 rounded-2xl font-semibold shadow-lg transition">
                    Confirm Enrollment
                </button>

                <a href="{{ route('courses.index') }}"
                    class="block text-center w-full border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-white py-4 rounded-2xl hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                    Back to Courses
                </a>

            </form>

        </div>

    </div>

</section>

</body>
</html>