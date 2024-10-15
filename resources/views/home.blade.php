<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="p-6 rounded-lg flex flex-col gap-6 bg-gray-50 shadow-lg">
            <!-- Hero Section -->
            <div class="text-center flex border border-cyan-200 flex-col bg-gradient-to-r from-sky-200 to-sky-50 p-4 rounded-lg shadow-md">
                <h1 class="font-semibold text-2xl text-teal-500">Freelance Photographer and Digital Artist based in Solo, Indonesia</h1>
                <h1 class="font-medium text-lg text-teal-400 mt-2">Winning multiple awards in various photography and digital art competitions</h1>
                <div class="mt-5">
                    <a href="{{ url('/contact') }}" class="py-3 px-6 inline-flex items-center gap-x-2 text-lg font-medium rounded-lg border border-transparent bg-gradient-to-r from-pink-500 to-pink-600 text-white hover:from-pink-600 hover:to-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-send"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                        Send Commission
                    </a>
                </div>
            </div>

            <!-- Portfolio Section -->
            <div class="bg-white p-5 rounded-lg border flex flex-col gap-5 shadow-md">
                <h1 class="font-bold text-3xl text-gray-800">My Works</h1>
                <div class="md:columns-4 columns-2 gap-4">
                  @for ($i = 1; $i <= 5; $i++)
                    @php
                      $num = 1;
                    @endphp
                    <div class="pb-4">
                      <a href="img/pic_{{ $i }}.jpg" class="rounded-lg hover:opacity-80 overflow-hidden block">
                        <img src="img/pic_{{ $i }}.jpg" class="w-full h-auto rounded-lg">
                      </a>
                    </div>
                  @endfor
                </div>
                <a class="flex justify-end items-center gap-2 text-lg text-blue-600 hover:underline hover:text-blue-700 transition-all" href="{{ url('/portfolio') }}">
                  <span>See more works</span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
            </div>

            <!-- Footer Buttons -->
            <div class="flex gap-4 justify-center items-center bg-white shadow-md border rounded-lg p-5">
              <a href="{{ url('about') }}" class="py-3 px-6 inline-flex items-center gap-x-2 text-lg font-medium rounded-lg border border-transparent bg-gradient-to-r from-green-500 to-green-600 text-white hover:from-green-600 hover:to-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                More About Me
              </a>
              <a href="{{ url('blog') }}" class="py-3 px-6 inline-flex items-center gap-x-2 text-lg font-medium rounded-lg border border-transparent bg-gradient-to-r from-cyan-500 to-cyan-600 text-white hover:from-cyan-600 hover:to-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle"><circle cx="12" cy="12" r="10"/><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8A8.5 8.5 0 0 1 3 12a8.5 8.5 0 0 1 14.8-6.8A8.38 8.38 0 0 1 21 11.5z"/></svg>
                Sharing Your Story
              </a>
            </div>
        </div>
    </div>
  </main>
</x-layout>
