<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <main>
    <div  class="max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <img src="img/mikir 10.jpg" width="300px" class="shadow-lg mb-1 rounded-full p-2 border-2">
      <p>Hi! My name is {{ $name }} and I'm an {{ $job }}.</p>
    </div>
  </main>
</x-layout>