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
    <form id="searchForm" class="w-full sm:w-2/3 lg:w-1/2">
      <div class="items-center mb-3 space-y-4 sm:flex sm:space-y-0">
        <div class="items-center flex relative w-full">
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
          <button aria-haspopup="dialog" aria-expanded="false" aria-controls="AddBlogs" data-hs-overlay="#AddBlogs" type="button" class="w-max py-3 ml-4 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-cyan-500 text-white hover:bg-cyan-600 focus:outline-none focus:bg-cyan-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-white dark:text-neutral-800">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus">
              <path d="M5 12h14"/>
              <path d="M12 5v14"/>
            </svg>
            <span class="w-max">Add Blogs</span>
          </button>
        </div>
      </div>
    </form>
        @if (count($blogs) === 0)
        <div class="rounded-lg p-6 w-full sm:w-2/3 lg:w-1/2 bg-rose-100 text-rose-600 shadow-lg hover:shadow-xl hover:shadow-rose-300 shadow-rose-200 border border-rose-300 transition-shadow duration-300">
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

<div id="AddBlogs" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="AddBlogs-label">
  <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center lg:max-w-4xl lg:w-full lg:mx-auto">
    <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
      <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
        <h3 id="AddBlogs-label" class="font-bold text-gray-800 dark:text-white">
          Modal title
        </h3>
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#AddBlogs">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6 6 18"></path>
            <path d="m6 6 12 12"></path>
          </svg>
        </button>
      </div>
      <div class="p-4 overflow-y-auto">
        <p class="mt-1 text-gray-800 dark:text-neutral-400">
          This is a wider card with supporting text below as a natural lead-in to additional content.
        </p>
      </div>
      <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#AddBlogs">
          Close
        </button>
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
          Save changes
        </button>
      </div>
    </div>
  </div>
</div>

<script>
  const searchInput = document.getElementById('search');
  document.addEventListener('DOMContentLoaded', function() {
    
    // If the input has a value, focus on it and move the cursor to the end
  if (searchInput.value) {
      searchInput.focus();
      // Move cursor to the end of the input field
      searchInput.setSelectionRange(searchInput.value.length, searchInput.value.length);
    }
  });

  // Submit the form when user types in the input
  function submitSearch() {
    if(searchInput.value.trim() !== '' || searchInput.value === ''){
      const form = document.getElementById('searchForm');
      form.submit();
    }
  }
</script>
