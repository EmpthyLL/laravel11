<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-2">
        <?php for($i = 1; $i <= 8; $i++):?>
          <img src="img/mikir {{ $i }}.jpg" class="shadow-md rounded-lg border border-gray-400 p-1" alt="">
        <?php endfor?>
        <img src="img/mikir 15.jpg" class="shadow-md border-2 border-gray-400 p-1 rounded-lg"  alt="">
      </div>
    </div>
  </main>
</x-layout>