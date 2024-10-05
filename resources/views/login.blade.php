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
    <!-- component -->
    <form action="">
        <section class="flex w-full flex-col space-y-6 px-2 sm:px-0 sm:w-[24rem] xs:w-[20rem] 2xs:w-[16rem]">
            <div class="text-center text-2xl font-medium sm:text-3xl">Log In</div>

            <div
            class="w-full transform border-b-2 bg-transparent text-base duration-300 focus-within:border-indigo-500"
            >
            <input
                type="text"
                placeholder="Email or Username"
                class="w-full border-none bg-transparent outline-none placeholder:italic focus:outline-none"
            />
            </div>

            <div
            class="w-full transform border-b-2 bg-transparent text-base duration-300 focus-within:border-indigo-500"
            >
            <input
                type="password"
                placeholder="Password"
                class="w-full border-none bg-transparent outline-none placeholder:italic focus:outline-none"
            />
            </div>

            <button
            class="transform rounded-sm bg-indigo-600 py-2 font-semibold duration-300 hover:bg-indigo-400"
            >
            LOG IN
            </button>

            <a
            href="#"
            class="transform text-center text-sm font-semibold text-gray-500 duration-300 hover:text-gray-300"
            >FORGOT PASSWORD?</a
            >

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
    