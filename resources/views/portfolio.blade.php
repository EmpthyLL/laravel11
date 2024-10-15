<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <div class="md:columns-3 lg:columns-4 columns-2">
        @for ($i = 1; $i <= 9; $i++)
          @php
            $num = 1;
          @endphp
          <div class="pb-4">
            <a href="img/{{ $num ? "photo_" : "pic_"}}{{ $i }}.jpg" class="rounded-lg hover:opacity-80 overflow-hidden">
              <img src="img/{{ $num ? "photo_" : "pic_"}}{{ $i }}.jpg">
            </a>
          </div>
          <div class="pb-4">
            <a href="img/{{ ($num ? 0 : 1) ? "photo_" : "pic_"}}{{ $i }}.jpg" class="rounded-lg overflow-hidden">
              <img src="img/{{ ($num ? 0 : 1) ? "photo_" : "pic_"}}{{ $i }}.jpg">
            </a>
          </div>
        @endfor
        <div class="pb-4">
          <a href="img/pic_10.jpg" class="rounded-lg overflow-hidden">
            <img src="img/pic_10.jpg">
          </a>
        </div>
        <div class="pb-4">
          <a href="img/pic_11.jpg" class="rounded-lg overflow-hidden">
            <img src="img/pic_11.jpg">
          </a>
        </div>
        <div class="pb-4">
          <a href="img/pic_12.jpg" class="rounded-lg overflow-hidden">
            <img src="img/pic_12.jpg">
          </a>
        </div>
      </div>
    </div>
  </main>
</x-layout>