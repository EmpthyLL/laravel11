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
            <x-alert classAdd="hover:shadow-emerald-300" message="<b>Woohoo!</b> You're officially part of the club!" header="Welcome Aboard!" icon='
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-badge-check"><path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"/><path d="m9 12 2 2 4-4"/></svg>'>emerald</x-alert>
        @endif
        @if (session()->has('invalidCred'))
            <x-alert  classAdd="hover:shadow-rose-300" :dismisable="true" message="<b>Oh no!</b> You are not allowed to enter!" header="Login Failed!" icon='
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-badge-x"><path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"/><line x1="15" x2="9" y1="9" y2="15"/><line x1="9" x2="15" y1="9" y2="15"/></svg>'>rose</x-alert>
        @endif
        <section
        class="flex bg-gray-900 rounded-xl p-6 w-full flex-col space-y-6 px-4 sm:px-8 sm:w-[24rem] c4:w-[20rem]"
        >
        <!-- Login Header -->
        <div class="text-center text-2xl font-medium sm:text-3xl">Log In</div>
        @csrf

        <!-- Username / Email Field -->
        <div>
            <div class="w-full transform border-b-2 text-base duration-300 focus-within:border-indigo-500" >
                <input 
                    type="text" 
                    name="identity" 
                    value="{{ old('identity') }}"
                    class="w-full border-none outline-none focus:outline-none rounded-t
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
            <div class="w-full transform border-b-2 text-base duration-300 focus-within:border-indigo-500">
                <input type="password" name="password" id="pass" oninput="validatePasswords()" class="w-full rounded-t  border-none outline-none  focus:outline-none 
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
</html>
    