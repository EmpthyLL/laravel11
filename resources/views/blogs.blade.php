<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <div class="grid md:grid-cols-2  gap-4">
        @if (count($blogs) === 0)
          <div class="rounded-lg p-6 bg-red-100 text-rose-600 shadow-md hover:shadow-lg hover:shadow-red-200 shadow-red-200 border border-rose-300 transition-shadow duration-300">
              <div class="flex items-center gap-3 mb-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-badge-info">
                      <path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"/>
                      <line x1="12" x2="12" y1="16" y2="12"/>
                      <line x1="12" x2="12.01" y1="8" y2="8"/>
                  </svg>
                  <h2 class="text-2xl font-semibold tracking-tight">No blogs posted yet!</h2>
              </div>
              <p class="text-base text-rose-500">
                  The Blog page will be updated soon. Stay tuned for new content!
              </p>
          </div>
        @else 
          @foreach ($blogs as $blog)
          <a href="{{ url('blog/'.$blog['blog_id']) }}" class="block">
            <article class="rounded-lg min-h-[290px] hover:shadow-lg p-4 shadow-md bg-gray-100">
                <h2 class="text-2xl flex gap-2 flex-wrap items-center font-bold tracking-tight text-gray-900">
                  <span class="truncate max-w-[400px] min-w-0">{{ $blog['title'] }}</span>
                  <span><svg class="text-gray-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-smile-plus"><path d="M22 11v1a10 10 0 1 1-9-10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" x2="9.01" y1="9" y2="9"/><line x1="15" x2="15.01" y1="9" y2="9"/><path d="M16 5h6"/><path d="M19 2v6"/></svg></span>
                  <span class="text-lg font-extralight flex items-center  text-gray-400">
                    {{ $blog['created_at'] == $blog['updated_at'] ? $blog['created_at']->diffForHumans() : $blog['updated_at']->diffForHumans()." (Edit)" }}
                </span>
                </h2>
                <div class="flex items-center gap-4 mt-2">
                  <div>
                    <p class="text-justify mt-2 overflow-hidden text-ellipsis max-h-[170px]">
                        {{ Str::limit($blog['body'], 275) }}
                        <span class="inline text-blue-600 hover:underline">Read more</span>
                    </p>
                  </div>
                  <div>
                    <img src="img/mikir {{ (($blog['blog_id'] - 1) % 24 + 12)}}.jpg" alt="Picture"  class="rounded-lg">
                  </div>
                </div>
            </article>
          </a>
          @endforeach
        @endif
        
      </div>
    </div>
  </main>
</x-layout> 