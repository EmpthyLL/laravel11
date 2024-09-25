<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 grid">
        <div class="border border-sky-200 shadow-blue-100 hover:shadow-blue-200 transition-shadow shadow-lg hover:shadow-xl p-4 rounded-lg gap-4 w-max c3:flex bg-blue-100 items-center">
          <img src="{{ asset('img/img_' . (($user->id - 1) % 25 + 1) . '.jpg') }}" class="rounded-full c3:w-[200px] p-1 border-2 border-sky-200 shadow-lg bg-sky-100" alt="Profile Picture">
          <div class="flex flex-col items-center mt-4 c3:block">
              <h2 class="c3:text-2xl text-3xl font-bold tracking-tight text-gray-900">{{ $user['name'] }}</h2>
              <h3 class="c3:text-xl text-2xl tracking-tight text-gray-400">{{ $user['email'] }}</h3>
        </div>
    </div>
  </main>
</x-layout> 