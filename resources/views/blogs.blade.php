<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <main>
    <div class="border p-2 mx-4 bg-slate-300 rounded-md shadow-md flex flex-col gap-3">
      <h3 class="font-bold text-2xl text-gray-700">Categories</h3>
      <div class="p-2 bg-white flex flex-wrap rounded-md gap-4">
          <a href="{{ url('/blog'). (request('key') ? '?key='.request('key') : '' )}}" class="rounded {{ !request()->has('category') ? 'bg-slate-600 text-white' : 'hover:bg-blue-200' }} py-1 px-3">All</a>
          @foreach ($categories as $categ)
              <a 
                href="{{ url('/blog?category='.$categ->slug. (request('key') ? '&key='.request('key') : '')) }}" 
                class="rounded {{ request()->query('category') == $categ->slug ? 'bg-slate-600 text-white' : 'hover:bg-blue-200' }} py-1 px-3 capitalize">
                  {{ $categ->name }}
              </a>
          @endforeach
      </div>
    </div>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <form id="searchForm" class="w-2/3">
        <div class="items-center mb-3 space-y-4 sm:flex sm:space-y-0">
          <div class="relative w-full">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
              <svg class="text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search">
                <circle cx="11" cy="11" r="8"/>
                <path d="m21 21-4.3-4.3"/>
              </svg>
            </div>
            @if (request('category'))
              <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            <input
              class="block p-3 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
              placeholder="Type here to find desirable blogs..."
              name="key"
              type="search"
              value="{{ request('key') }}"
              autocomplete="off"
              id="search"
              oninput="submitSearch()"
            />
          </div>
        </div>
      </form>
        @if (count($blogs) === 0)
          <div class="rounded-lg p-6 w-max bg-rose-100 text-rose-600 shadow-lg hover:shadow-xl hover:shadow-rose-300 shadow-rose-200 border border-rose-300 transition-shadow duration-300">
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
        {{ $blogs->links() }}
          <div class="grid md:grid-cols-2 mt-4 mb-4 grid-cols-1 gap-4">
            @foreach ($blogs as $blog)
            <a href="{{ url('blog/'.$blog['blog_id']) }}" class="block">
              <article class="rounded-lg min-h-[290px] hover:shadow-lg p-4 shadow-md bg-gray-100">
                <h2 class="text-2xl flex items-center justify-between gap-4 font-bold tracking-tight text-gray-900">
                  <span class="truncate min-w-0 max-w-full flex-grow">{{ $blog['title'] }}</span>
                
                  <span class="flex items-center gap-6 flex-shrink-0 pr-4">
                    <span class="flex items-center gap-2 text-gray-600">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle-more">
                        <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/>
                        <path d="M8 12h.01"/>
                        <path d="M12 12h.01"/>
                        <path d="M16 12h.01"/>
                      </svg>
                      <span class="text-gray-400 text-base">{{ count($blog->comments) }}</span>
                    </span>
                
                    <span class="flex items-center gap-1 text-gray-600">
                      <svg class="text-gray-600" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-smile-plus">
                        <path d="M22 11v1a10 10 0 1 1-9-10"/>
                        <path d="M8 14s1.5 2 4 2 4-2 4-2"/>
                        <line x1="9" x2="9.01" y1="9" y2="9"/>
                        <line x1="15" x2="15.01" y1="9" y2="9"/>
                        <path d="M16 5h6"/>
                        <path d="M19 2v6"/>
                      </svg>
                    </span>
                
                    <span class="text-lg font-light text-gray-400">
                      {{ $blog['created_at'] == $blog['updated_at'] ? $blog['created_at']->diffForHumans() : $blog['updated_at']->diffForHumans()." (Edit)" }}
                    </span>
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
                      <img src="{{ asset('img/photo_' . (($blog['blog_id'] - 1) % 24 + 12) . '.jpg') }}" alt="Picture" class="rounded-lg">
                    </div>
                  </div>
              </article>
            </a>
            @endforeach
          </div>
        {{ $blogs->links() }}
        @endif
      </div>
    </div>
  </main>
</x-layout> 


<script>
  document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search');
    
    // If the input has a value, focus on it and move the cursor to the end
  if (searchInput.value) {
      searchInput.focus();
      // Move cursor to the end of the input field
      searchInput.setSelectionRange(searchInput.value.length, searchInput.value.length);
    }
  });

  // Submit the form when user types in the input
  function submitSearch() {
    const form = document.getElementById('searchForm');
    form.submit();
  }
</script>