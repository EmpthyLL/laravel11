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
<body>
    <main class="mx-auto flex min-h-screen w-full items-center justify-center bg-gray-900 text-white">
        <!-- Register Form -->
        <form id="formRegister" action="{{ url('/register') }}" method="POST" class="flex flex-col items-center justify-center gap-5 w-full" onsubmit="submitForm(event)">
            <h1 class="font-semibold text-5xl sm:text-6xl text-center">Come Join Us!</h1>
            <section class="flex bg-slate-800 rounded-xl p-6 w-full flex-col space-y-6 px-4 sm:px-8 sm:w-[24rem] c4:w-[20rem]">
                <div class="text-center text-2xl font-medium sm:text-3xl">Register</div>
                @csrf

                <div>
                    <div class="w-full transform border-b-2 bg-transparent text-base duration-300 focus-within:border-indigo-500" >
                        <input 
                            type="text" 
                            name="username" 
                            value="{{ old('username') }}"
                            class="w-full border-none bg-transparent outline-none focus:outline-none rounded-t 
                            {{ $errors->has('username') ? 'bg-red-500 placeholder:text-red-800 placeholder:italic' : 'bg-slate-700 placeholder:text-slate-400' }}" 
                            placeholder="Username" 
                        />
                    </div>
                    @error('username') 
                    <div  class="text-red-500 italic text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <div>
                <div class="w-full transform border-b-2 bg-transparent text-base duration-300 focus-within:border-indigo-500">
                    <input type="email" 
                    name="email" 
                    value="{{ old('email') }}"
                    class="w-full border-none bg-transparent outline-none rounded-t focus:outline-none 
                    {{ $errors->has('email') ? 'bg-red-500 placeholder:text-red-800 placeholder:italic' : 'bg-slate-700 placeholder:text-slate-400' }}" 
                        placeholder="Email" 
                    />
                </div>
                @error('email') 
                <div class="text-red-500 italic text-xs mt-1">{{ $message }}</div>
                @enderror
                </div>

                <div>
                <div class="w-full transform border-b-2 bg-transparent text-base duration-300 focus-within:border-indigo-500">
                    <input type="text" 
                    name="fullname" 
                    value="{{ old('fullname') }}"
                    class="w-full border-none bg-transparent outline-none rounded-t focus:outline-none 
                    {{ $errors->has('fullname') ? 'bg-red-500 placeholder:text-red-800 placeholder:italic' : 'bg-slate-700 placeholder:text-slate-400' }}" 
                        placeholder='Full Name (Optional)'
                    />
                </div>
                {{-- @error('fullname') 
                <div class="text-amber-500  italic text-xs mt-1">
                    Not feeling it? Just type <span class="font-semibold">"-"</span> and we'll call it even!
                </div>
                @enderror --}}
                </div>

                <div>
                <div class="w-full transform border-b-2 bg-transparent text-base duration-300 focus-within:border-indigo-500">
                    <input type="password" name="password" id="pass" oninput="validatePasswords()" class="w-full border-none bg-transparent outline-none rounded-t focus:outline-none 
                    {{ $errors->has('password') ? 'bg-red-500 placeholder:text-red-800 placeholder:italic' : 'bg-slate-700 placeholder:text-slate-400' }}" 
                        placeholder='Password'
                    />
                </div>
                @error('password') 
                <div class="text-red-500 italic text-xs mt-1">{{ $message }}</div>
                @enderror
                </div>
                
                <div>
                <div class="w-full transform border-b-2 bg-transparent text-base duration-300 focus-within:border-indigo-500">
                    <input type="password" name="confirm" id="conpass" oninput="validatePasswords()" class="w-full rounded-t border-none bg-transparent outline-none  focus:outline-none 
                    {{ $errors->has('confirm') ? 'bg-red-500 placeholder:text-red-800 placeholder:italic' : 'bg-slate-700 placeholder:text-slate-400' }}" 
                        placeholder='Confirm Password' />
                </div>
                @error('confirm') 
                <div class="text-red-500 italic text-xs mt-1">{{ $message }}</div>
                @enderror
                </div>

                <div class="flex flex-col w-full gap-2">
                <div id="error" class="text-red-600 hidden italic">Oops, passwords don't match!</div>

                <button type="submit" class="w-full rounded-lg bg-indigo-600 py-2 text-lg font-semibold tracking-wide duration-300 transform hover:bg-indigo-500 hover:scale-105">
                    REGISTER
                </button>
                </div>

                <p class="text-center text-sm sm:text-base">
                    Already joined?
                    <a href="{{ url('/login') }}" class="font-medium text-indigo-500 underline-offset-4 hover:underline">Login</a>
                </p>
            </section>
        </form>
    </main>
</body>
</html>

<script>
    function validatePasswords() {
        const password = document.getElementById("pass").value;
        const confirmPassword = document.getElementById("conpass").value;
        const errorMessage = document.getElementById("error");

        if (password && confirmPassword) {
            if (password !== confirmPassword) {
                errorMessage.classList.remove('hidden');
            } else {
                errorMessage.classList.add('hidden');
            }
        } else {
            errorMessage.classList.add('hidden');
        }
    }

    function submitForm(e) {
        const password = document.getElementById("pass").value;
        const confirmPassword = document.getElementById("conpass").value;
        const errorMessage = document.getElementById("error");

        if (password !== confirmPassword) {
            errorMessage.classList.remove('hidden');
            e.preventDefault();  
        } else {
            errorMessage.classList.add('hidden');
        }
    }
</script>
