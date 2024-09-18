<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <div class="grid md:grid-cols-2 gap-4">
          <?php for($i = 0; $i < $many; $i++ ) :?>
              <div class="border-2 rounded-lg p-4 border-gray-400">
                  <h2 class="text-2xl flex gap-2 items-center font-bold tracking-tight text-gray-900"><span>Blog {{ $i + 1}}</span><span><svg xmlns="http://www.w3.org/2000/svg" width="28" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-smile"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" x2="9.01" y1="9" y2="9"/><line x1="15" x2="15.01" y1="9" y2="9"/></svg></span></h2>
                  <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod incidunt, eius autem vitae eveniet quisquam veritatis. Debitis architecto, dicta aliquam ipsum neque consequuntur odio voluptate hic excepturi dolore labore itaque minima officiis quod quo minus quos animi soluta ipsam tenetur libero non culpa. Veritatis eius ipsa illo est, consectetur impedit.</p>
              </div>
          <?php endfor ?>
      </div>
    </div>
  </main>
</x-layout>