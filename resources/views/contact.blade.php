<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 grid">
        <div class="border border-sky-200 shadow-blue-100 hover:shadow-blue-200 transition-shadow shadow-lg hover:shadow-xl p-4 rounded-lg gap-4 max-w-[500px] c3:flex bg-blue-100 items-center">
          <img src="{{ asset('img/photo_10.jpg') }}" class="rounded-full c3:w-[200px] p-1 border-2 border-sky-200 shadow-lg bg-sky-100" alt="Profile Picture">
          <div class="flex flex-col items-center mt-4 c3:block">
              <h2 class="c3:text-2xl text-3xl font-bold tracking-tight text-gray-900">Sarah Marc</h2>
              <h3 class="c3:text-xl text-2xl tracking-tight text-gray-400">{{ $contact['email'] }}</h3>
              <h3 class="c3:text-xl text-2xl mt-3 tracking-tight text-gray-600">{{ $contact['phone'] }}</h3>
              <span class="flex gap-2">
                  <a style="color:black" target="blank" href="https://www.instagram.com/"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg></a>
                  <a style="color:black" target="blank" href="https://x.com/"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-twitter"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/></svg></a>
                  <a style="color:black" target="blank" href="https://www.youtube.com/"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-youtube"><path d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17"/><path d="m10 15 5-3-5-3z"/></svg></a>
                  <a style="color:black" target="blank" href="https://twitch.tv/"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-twitch"><path d="M21 2H3v16h5v4l4-4h5l4-4V2zm-10 9V7m5 4V7"/></svg></a>
              </span>
          </div>
        </div>
    </div>
  </main>
</x-layout>