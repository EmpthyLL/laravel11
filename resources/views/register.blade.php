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
    class="mx-auto flex min-h-screen w-full items-center justify-center bg-gray-900 text-white"
    >
    <!-- Register Form -->
    <form  action="/register" method="POST" class="flex flex-col items-center justify-center gap-5 w-full">
        <h1
        class="font-semibold text-5xl sm:text-6xl text-center"
        >
        Come Join Us!
        </h1>
        <section
        class="flex bg-slate-800 rounded-xl p-6 w-full flex-col space-y-6 px-4 sm:px-8 sm:w-[24rem] c4:w-[20rem]"
        >
            <div class="text-center text-2xl font-medium sm:text-3xl">Register</div>

            <div
            class="w-full transform border-b-2 bg-transparent text-base duration-300 focus-within:border-indigo-500"
            >
            <input
                type="text"
                placeholder="Username"
                name="username"
                required
                class="w-full border-none bg-transparent outline-none placeholder:italic focus:outline-none"
            />
            </div>

            <div
            class="w-full transform border-b-2 bg-transparent text-base duration-300 focus-within:border-indigo-500"
            >
            <input
                type="email"
                placeholder="Email"
                name="username"
                required
                class="w-full border-none bg-transparent outline-none placeholder:italic focus:outline-none"
            />
            </div>

            <div
            class="w-full transform border-b-2 bg-transparent text-base duration-300 focus-within:border-indigo-500"
            >
            <input
                type="text"
                placeholder="Full Name (Optional)"
                name="fullname"
                class="w-full border-none bg-transparent outline-none placeholder:italic focus:outline-none"
            />
            </div>

            <div
            class="w-full transform border-b-2 bg-transparent text-base duration-300 focus-within:border-indigo-500"
            >
            <input
                type="password"
                placeholder="Password"
                name="password"
                required
                class="w-full border-none bg-transparent outline-none placeholder:italic focus:outline-none"
            />
            </div>

            <button
            class="transform rounded-sm bg-indigo-600 py-2 font-semibold duration-300 hover:bg-indigo-400"
            >
            REGISTER
            </button>

            <p class="text-center text-sm sm:text-base">
            Already join?
            <a
                href="{{ url('/login') }}"
                class="font-medium text-indigo-500 underline-offset-4 hover:underline"
                >Login</a
            >
            </p>
        </section>
    </form>
    </main>
</body>
</html>
    