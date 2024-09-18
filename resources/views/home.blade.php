<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-2">
        <?php for($i = 1; $i <= 9; $i++):?>
          <img src="img/mikir {{ $i }}.jpg" class="shadow-md hover:opacity-70 rounded-lg border border-gray-400 p-1" alt="">
        <?php endfor?>
      </div>
    </div>
  </main>
</x-layout>