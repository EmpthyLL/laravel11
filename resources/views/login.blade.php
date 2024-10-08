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
    <form action="{{ url('/login') }}" method="POST" class="flex flex-col items-center justify-center gap-5 w-full">
        <h1
        class="font-semibold text-5xl sm:text-6xl text-center"
        >
        Welcome Back!
        </h1>
        @if (session()->has('registered'))
            <div id="successAlert"  role="alert" class="rounded-lg p-6 w-max flex gap-3 items-center bg-emerald-100 text-emerald-600 shadow hover:shadow-emerald-300 shadow-emerald-200 border border-emerald-300 transition-shadow duration-300">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-badge-check"><path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"/><path d="m9 12 2 2 4-4"/></svg>
                        <h2 class="sm:text-3xl text-2xl font-semibold tracking-tight">Welcome Aboard!</h2>
                    </div>
                    <p class="sm:text-base text-sm text-emerald-500">
                        "<b>Woohoo!</b> You're officially part of the club!"
                    </p>
                </div>
            </div>
        @endif
        @if (session()->has('invalidCred'))
            <div id="successAlert"  role="alert" class="rounded-lg p-6 w-max flex gap-3 items-center bg-rose-100 text-rose-600 shadow hover:shadow-rose-300 shadow-rose-200 border border-rose-300 transition-shadow duration-300">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-badge-check"><path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"/><path d="m9 12 2 2 4-4"/></svg>
                        <h2 class="sm:text-3xl text-2xl font-semibold tracking-tight">Login Failed!</h2>
                    </div>
                    <p class="sm:text-base text-sm text-rose-500">
                        "<b>Oh no!</b> You are not allowed to enter!"
                    </p>
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-rose-100 text-rose-500 rounded-lg focus:ring-2 focus:ring-rose-400 p-1.5 hover:bg-rose-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-rose-400 dark:hover:bg-gray-700" data-dismiss-target="#successAlert" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        @endif
        <section
        class="flex bg-gray-900 rounded-xl p-6 w-full flex-col space-y-6 px-4 sm:px-8 sm:w-[24rem] c4:w-[20rem]"
        >
        <!-- Login Header -->
        <div class="text-center text-2xl font-medium sm:text-3xl">Log In</div>
        @csrf

        <!-- Username / Email Field -->
        <div>
            <div class="w-full transform border-b-2 bg-transparent text-base duration-300 focus-within:border-indigo-500" >
                <input 
                    type="text" 
                    name="identity" 
                    value="{{ old('identity') }}"
                    class="w-full border-none bg-transparent outline-none focus:outline-none rounded-t
                    {{ $errors->has('identity') ? 'bg-red-500 placeholder:text-red-800 placeholder:italic' : 'bg-slate-700 placeholder:text-slate-400' }}" 
                    placeholder="Username or Email" 
                />
            </div>
            @error('identity') 
            <div  class="text-red-500 italic text-xs mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password Field -->
        <div>
            <div class="w-full transform border-b-2 bg-transparent text-base duration-300 focus-within:border-indigo-500">
                <input type="password" name="password" id="pass" oninput="validatePasswords()" class="w-full rounded-t  border-none bg-transparent outline-none  focus:outline-none 
                {{ $errors->has('password') ? 'bg-red-500 placeholder:text-red-800 placeholder:italic' : 'bg-slate-700 placeholder:text-slate-400' }}" 
                    placeholder='Password'
                />
            </div>
            @error('password') 
            <div class="text-red-500 italic text-xs mt-1">{{ $message }}</div>
            @enderror
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
<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</html>
    