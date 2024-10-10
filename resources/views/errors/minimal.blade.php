<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        .emoji-404 {
            position: relative;
            animation: mymove 2.5s infinite;
        }

        @keyframes mymove {
            33% { top: 0px; }
            66% { top: 20px; }
            100% { top: 0px; }
        }
    </style>
</head>
<body class="antialiased bg-slate-300 min-h-screen mb-10 flex items-center justify-center">
    <div class="text-center">
        <svg class="emoji-404 mx-auto" enable-background="new 0 0 226 249.135" height="249.135" id="Layer_1" overflow="visible" version="1.1" viewBox="0 0 226 249.135" width="226" xml:space="preserve">
            <circle cx="113" cy="113" fill="#FFE585" r="109"/>
            <line fill="none" opacity="0.29" stroke="#6E6E96" stroke-linecap="round" stroke-linejoin="round" stroke-width="8" x1="88.866" x2="136.866" y1="245.135" y2="245.135"/>
            <line fill="none" opacity="0.17" stroke="#6E6E96" stroke-linecap="round" stroke-linejoin="round" stroke-width="8" x1="154.732" x2="168.732" y1="245.135" y2="245.135"/>
            <line fill="none" opacity="0.17" stroke="#6E6E96" stroke-linecap="round" stroke-linejoin="round" stroke-width="8" x1="69.732" x2="58.732" y1="245.135" y2="245.135"/>
            <circle cx="68.732" cy="93" fill="#6E6E96" r="9"/>
            <path d="M115.568,5.947c-1.026,0-2.049,0.017-3.069,0.045c54.425,1.551,98.069,46.155,98.069,100.955c0,55.781-45.219,101-101,101c-55.781,0-101-45.219-101-101c0-8.786,1.124-17.309,3.232-25.436c-3.393,10.536-5.232,21.771-5.232,33.436c0,60.199,48.801,109,109,109s109-48.801,109-109S175.768,5.947,115.568,5.947z" enable-background="new" fill="#FF9900" opacity="0.24"/>
            <circle cx="156.398" cy="93" fill="#6E6E96" r="9"/>
            <ellipse cx="67.732" cy="140.894" enable-background="new" fill="#FF0000" opacity="0.18" rx="17.372" ry="8.106"/>
            <ellipse cx="154.88" cy="140.894" enable-background="new" fill="#FF0000" opacity="0.18" rx="17.371" ry="8.106"/>
            <path d="M13,118.5C13,61.338,59.338,15,116.5,15c55.922,0,101.477,44.353,103.427,99.797c0.044-1.261,0.073-2.525,0.073-3.797C220,50.802,171.199,2,111,2S2,50.802,2,111c0,50.111,33.818,92.318,79.876,105.06C41.743,201.814,13,163.518,13,118.5z" fill="#FFEFB5"/>
            <circle cx="113" cy="113" fill="none" r="109" stroke="#6E6E96" stroke-width="8"/>
        </svg>
        <div class="tracking-widest mt-4">
            <span class="text-gray-500 text-6xl font-semibold block">@yield('code')</span>
            <span class="text-gray-500 text-xl">@yield('message')</span>
        </div>
        <div class="mt-6">
            <a href="{{ url('/') }}" class="text-gray-500 font-mono text-xl bg-gray-200 p-3 rounded-md hover:shadow-md">Go back</a>
        </div>
    </div>
</body>
</html>
