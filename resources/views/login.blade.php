<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body><!-- page -->
    <main
    class="mx-auto flex min-h-screen w-full items-center justify-center bg-slate-800 text-white"
    >
    <!-- Login Form -->
    <form action="/login" method="POST" class="flex flex-col items-center justify-center gap-5 w-full">
        <h1
        class="font-semibold text-5xl sm:text-6xl text-center"
        >
        Welcome Back!
        </h1>
        <section
        class="flex bg-gray-900 rounded-xl p-6 w-full flex-col space-y-6 px-4 sm:px-8 sm:w-[24rem] c4:w-[20rem]"
        >
        <!-- Login Header -->
        <div class="text-center text-2xl font-medium sm:text-3xl">Log In</div>

        <!-- Username / Email Field -->
        <div
            class="w-full transform border-b-2 bg-transparent text-base duration-300 focus-within:border-indigo-500"
        >
            <input
            type="text"
            placeholder="Email or Username"
            name="identity"
            required
            class="w-full border-none bg-transparent text-gray-200 outline-none placeholder:italic placeholder-gray-400 focus:outline-none focus:text-indigo-200"
            />
        </div>

        <!-- Password Field -->
        <div
            class="w-full transform border-b-2 bg-transparent text-base duration-300 focus-within:border-indigo-500"
        >
            <input
            type="password"
            placeholder="Password"
            name="password"
            required
            class="w-full border-none bg-transparent text-gray-200 outline-none placeholder:italic placeholder-gray-400 focus:outline-none focus:text-indigo-200"
            />
        </div>

        <!-- Login Button -->
        <button
            class="w-full rounded-lg bg-indigo-600 py-2 text-lg font-semibold tracking-wide duration-300 transform hover:bg-indigo-500 hover:scale-105"
        >
            LOG IN
        </button>

        <!-- Forgot Password Link -->
        <a
            href="#"
            class="transform text-center text-sm font-semibold text-gray-500 duration-300 hover:text-gray-300"
            >FORGOT PASSWORD?</a
        >

        <!-- Sign-up Link -->
        <p class="text-center text-sm sm:text-base">
            No account?
            <a
            href="{{ url('/register') }}"
            class="font-medium text-indigo-500 underline-offset-4 hover:underline"
            >Create One</a
            >
        </p>
        </section>
    </form>
    </main>
</body>
</html>
    