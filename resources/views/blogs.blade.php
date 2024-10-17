@php
    function limitHtml($html, $limit) {
    $length = 0;
    $result = '';
    $isInsideTag = false;

    // Use regex to find the tags and text
    preg_match_all('/<[^>]+>|[^<]+/', $html, $matches);

    foreach ($matches[0] as $part) {
        // Check if it's a tag
        if (strpos($part, '<') === 0) {
            $result .= $part; // Append the tag directly
            $isInsideTag = true; // We are inside a tag
        } else {
            // It's a text part
            if ($length + strlen($part) > $limit) {
                // If adding this part exceeds the limit, truncate it
                $remaining = $limit - $length;
                $result .= substr($part, 0, $remaining);
                break; // Stop processing further
            }

            $result .= $part; // Append the text part
            $length += strlen($part); // Update the total length
        }
    }

    return $result;
  }
@endphp

<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <main>
    <div class="border p-2 mx-4 relative bg-slate-300 rounded-md shadow-md flex flex-col gap-3">
      <h3 class="font-bold text-2xl text-gray-700">Categories</h3>
      <div class="absolute top-[-15px] right-[-15px]">
        @can("superadmin")
        <div class="hs-dropdown relative inline-flex">
            <button id="hs-dropdown-default" type="button" class="hs-dropdown-toggle py-2 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-full border border-gray-200 bg-white text-gray-800 shadow-lg hover:bg-gray-50 focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis-vertical">
                    <circle cx="12" cy="12" r="1"/>
                    <circle cx="12" cy="5" r="1"/>
                    <circle cx="12" cy="19" r="1"/>
                </svg>
            </button>

            <!-- Dropdown Menu with the pen button -->
            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-max w-max bg-white border border-black shadow-md rounded-lg mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-default">
                <div class="p-1 space-y-0.5">
                    <!-- Pen button inside the dropdown -->
                    <button aria-haspopup="dialog" aria-expanded="false" aria-controls="AddCategory" data-hs-overlay="#AddCategory" class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 w-full dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700">
                            <svg xmlns="http://www.w3.org/2000/svg"  class="w-6 h-6"  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-plus"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
                        <span>
                        Add Category
                        </span>
                    </button>
                    <button aria-haspopup="dialog" aria-expanded="false" aria-controls="EditCategory" data-hs-overlay="#EditCategory" class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 w-full dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                        </svg>
                        <span>
                        Edit Category
                        </span>
                    </button>
                    <button aria-haspopup="dialog" aria-expanded="false" aria-controls="DeleteCategory" data-hs-overlay="#DeleteCategory" class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 w-full dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                      <span>
                          Delete Category
                      </span>
                  </button>
                </div>
            </div>
        </div>
        @endcan
    </div>
    <div class="p-2 bg-white flex flex-wrap rounded-md gap-4">
          <a href="{{ url('/blog'). (request('key') ? '?key='.request('key') : '' )}}" class="rounded {{ !request()->has('category') ? 'bg-slate-600 text-white' : 'hover:bg-blue-200' }} py-1 px-3">All</a>
          @foreach ($categories as $categ)
            @if ($categ->id !== 6)
              <a 
                href="{{ url('/blog?category='.$categ->slug. (request('key') ? '&key='.request('key') : '')) }}" 
                class="rounded {{ request()->query('category') == $categ->slug ? 'bg-slate-600 text-white' : 'hover:bg-blue-200' }} py-1 px-3 capitalize">
                  {{ $categ->name }}
              </a>
            @endif
          @endforeach
            <a 
              href="{{ url('/blog?category='.$categories[5]->slug. (request('key') ? '&key='.request('key') : '')) }}" 
              class="rounded {{ request()->query('category') == $categ->slug ? 'bg-slate-600 text-white' : 'hover:bg-blue-200' }} py-1 px-3 capitalize">
                {{ $categories[5]->name }}
            </a>
      </div>
    </div>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    @if (session()->has('post'))
      <x-alert  classAdd="hover:shadow-green-300"  size="" message="<b>Woohoo!</b> Thank you for sharing your story!" header="Blog has been posted!" icon='
      <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-badge-check"><path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"/><path d="m9 12 2 2 4-4"/></svg>'>green</x-alert>
    @endif
    @if (session()->has('save'))
      <x-alert  classAdd="hover:shadow-yellow-300"  size="" message="<b>Let go!</b> You are making a huge progress!" header="Blog has been save!" icon='
      <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pocket"><path d="M4 3h16a2 2 0 0 1 2 2v6a10 10 0 0 1-10 10A10 10 0 0 1 2 11V5a2 2 0 0 1 2-2z"/><polyline points="8 10 12 14 16 10"/></svg>'>yellow</x-alert>
    @endif
    @if (session()->has('delete'))
      <x-alert  classAdd="hover:shadow-pink-300"  size="" message="<b>Poof!</b> Now, it's gone for good!" header="Blog has been deleted!" icon='
      <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-x"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>'>pink</x-alert>
    @endif
    @if (session()->has('edit'))
      <x-alert  classAdd="hover:shadow-fuchsia-300"  size="" message="<b>Cering!</b> Let's see what has changed!" header="Blog has been edited!" icon='
      <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-pen-line"><rect width="8" height="4" x="8" y="2" rx="1"/><path d="M8 4H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-.5"/><path d="M16 4h2a2 2 0 0 1 1.73 1"/><path d="M8 18h1"/><path d="M21.378 12.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"/></svg>'>fuchsia</x-alert>
    @endif
    @if (session()->has('addcate'))
      <x-alert  classAdd="hover:shadow-emerald-300"  size="" message="<b>Good Job!</b> {{ $addcate }} categories has been created!" header="Categories has been added!" icon='
      <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-pen-line"><rect width="8" height="4" x="8" y="2" rx="1"/><path d="M8 4H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-.5"/><path d="M16 4h2a2 2 0 0 1 1.73 1"/><path d="M8 18h1"/><path d="M21.378 12.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"/></svg>'>emerald</x-alert>
    @endif
    <form id="searchForm" class="w-full mt-4 sm:w-10/1 2 lg:w-8/12">
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
            class="block p-3 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-gray-500 focus:border-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-white dark:focus:border-white"
            placeholder="Type here to find desirable blogs..."
            name="key"
            type="search"
            value="{{ request('key') }}"
            autocomplete="off"
            id="search"
            oninput="submitSearch()"
          />
          @can("writer")
          <button aria-haspopup="dialog" aria-expanded="false" aria-controls="AddBlogs" data-hs-overlay="#AddBlogs" type="button" class="w-max py-3 ml-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-cyan-500 text-white hover:bg-cyan-600 focus:outline-none focus:bg-cyan-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-white dark:text-neutral-800">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus">
              <path d="M5 12h14"/>
              <path d="M12 5v14"/>
            </svg>
            <span class="w-max">Add Blogs</span>
          </button>
          @endcan
        </div>
      </div>
    </form>
        @if (count($blogs) === 0)
        <x-alert  classAdd="hover:shadow-rose-300"  size="sm:w-2/3 lg:w-1/2" message="The Blog page will be updated soon. Stay tuned for new content!" header="No blog is posted yet!" icon='
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-badge-info">
              <path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"/>
              <line x1="12" x2="12" y1="16" y2="12"/>
              <line x1="12" x2="12.01" y1="8" y2="8"/>
            </svg>'>rose</x-alert>
        @else 
        {{ $blogs->links() }}
          <div class="grid md:grid-cols-2 mt-4 mb-4 grid-cols-1 gap-4">
            @foreach ($blogs as $blog)
            <article class="rounded-lg h-max">
                <a href="{{ url('blog/'.$blog['blog_id']) }}" class="block bg-gradient-to-r from-blue-100 via-indigo-100 to-blue-200 shadow-md p-4 hover:shadow-lg hover:bg-teal-50 border-teal-300 hover:border-violet-300 hover:from-fuchsia-100 hover:via-violet-100 hover:to-violet-200 border hover:border transition-colors rounded-b-none rounded-lg">
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
                  
                  <div class="flex items-center justify-between gap-4 mt-2">
                      <div class="flex">
                          <div class="text-justify mt-2 overflow-hidden text-ellipsis max-h-[170px] max-w-[380px] BodyWithTags">
                              {!! limitHtml($blog['body'], 275) !!} 
                              <span class="inline text-blue-600 hover:underline">Read more</span>
                          </div>
                      </div>
                      <div class="ml-4 w-[170px] h-[170px] flex items-center justify-center overflow-hidden rounded-lg flex-shrink-0">
                          <img src="{{ $blog->thumbnail ? asset("storage/$blog->thumbnail") : asset('img/photo_' . (($blog['blog_id'] - 1) % 24 + 12) . '.jpg') }}" alt="Picture" class="w-full h-full object-cover">
                      </div>
                  </div>
                </a>

                <a href="{{ url('/profile/'.$blog->author->username) }}" class="flex bg-gradient-to-r rounded-t-none from-blue-300 via-purple-300 to-indigo-400 rounded-md p-4 shadow-md items-center gap-4 transition duration-300 ease-in-out hover:shadow-lg shadow-cyan-400 hover:shadow-teal-400">
                  <!-- Author's Profile Image -->
                  <img src="{{ $blog->author->profile_img ? asset('storage/' . $blog->author->profile_img) : asset('img/img_' . (($blog->author->id - 1) % 25 + 1) . '.jpg') }}" 
                      alt="{{ $blog->author->name }}" 
                      class="rounded-full w-[60px] h-[60px] p-1 border-2 border-teal-400 shadow-lg bg-teal-50 object-cover transition duration-300 ease-in-out hover:shadow-xl">
                  
                  <!-- Author's Info -->
                  <div class="flex flex-col">
                      <!-- Username with hover effect -->
                      <span class="text-lg font-semibold text-yellow-200 drop-shadow-lg hover:text-yellow-100 hover:underline transition duration-200 ease-in-out">
                          {{ $blog->author->username }}
                      </span>
                      <!-- Fullname -->
                      <p class="text-sm drop-shadow-lg text-indigo-100 hover:text-indigo-200 transition duration-200">
                          {{ $blog->author->fullname }}
                      </p>
                  </div>
              </a>
            </article>
            @endforeach
          </div>
        {{ $blogs->links() }}
        @endif
      </div>
    </div>
  </main>
</x-layout> 

@can("superadmin")
<div id="AddCategory" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="AddCategory-label">
  <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 m-3 flex items-center lg:mx-auto min-h-[calc(100%-3.5rem)]">
    <div class="w-full mx-[200px] flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70 transition-all duration-500 ease-in-out"
      style="transition: width 0.5s ease-in-out;">
      <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
        <h3 id="AddCategory-label" class="font-bold text-gray-800 text-4xl dark:text-white">
          Add Category
        </h3>
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#AddCategory">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6 6 18"></path>
            <path d="m6 6 12 12"></path>
          </svg>
        </button>
      </div>
      
      <div class="p-4 min-h-[50vh] overflow-y-auto">
        <div class="flex-col mb-[20%] flex gap-4">
          <div id="categoryList" class="flex flex-wrap gap-3">
            @foreach ($categories as $categ)
              @if ($categ->id !== 6)
                <button class="border rounded-lg p-2 hover:shadow-lg bg-slate-100 shadow-md">
                  {{ $categ->name }}
                </button>
              @endif
            @endforeach
            <div id="random" class="border rounded-lg p-2 hover:shadow-lg bg-slate-100 shadow-md">
              {{ $categories[5]->name }}
            </div>
          </div>
          <div>
            <label for="title" class="block text-xl font-medium mb-2 dark:text-white">What's the category name?</label>
            <div class="flex w-1/2">
              <input type="text" name="category" id="createInput" class="py-3 px-4 block w-full border-gray-200 rounded-l-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400" placeholder="Enter category name" autofocus>
              <button id="addList" type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-r-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none shrink-0 whitespace-nowrap">
                Add List
              </button>
            </div>
            <div class="text-red-500 italic hidden mt-1" id="createError">Please tell us the category name!</div>
          </div>
        </div>
        <form action="{{ url('/category/admin') }}" enctype="multipart/form-data" method="POST" class="flex flex-col gap-4">
          @csrf
          <div id="createForms"></div>
          <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
            <button button-label="Close" data-hs-overlay="#AddCategory" type="button" name="save" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 hover:bg-gray-50 focus:outline-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700">Close</button>
            <button type="submit" id="addButton" name="post" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:bg-blue-400" disabled>Upload Categories</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div id="EditCategory" class="hs-overlay hidden size-full fixed top-0 start-0 z-[60] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="EditCategory-label">
  <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 m-3 flex items-center lg:mx-auto min-h-[calc(100%-3.5rem)]">
    <div class="w-full mx-[200px] flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70 transition-all duration-500 ease-in-out"
      style="transition: width 0.5s ease-in-out;">
      <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
        <h3 id="EditCategory-label" class="font-bold text-gray-800 text-4xl dark:text-white">
          Edit Category
        </h3>
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#EditCategory">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6 6 18"></path>
            <path d="m6 6 12 12"></path>
          </svg>
        </button>
      </div>
      
      <div class="p-4 min-h-[50vh] overflow-y-auto">
        <label for="title" class="block text-xl font-medium mb-2 dark:text-white">Which category to change?</label>
        <div class="flex-col mb-[20%] flex gap-4">
          <div class="flex flex-wrap gap-3">
            @foreach ($categories as $categ)
              @if ($categ->id !== 6)
                <!-- Add click event to each category div -->
                <button class="border rounded-lg p-2 category-btn hover:shadow-lg bg-slate-100 shadow-md category-option" 
                     onclick="selectCategory({{ $categ->id }}, '{{ $categ->name }}', event, 'update')">
                  {{ $categ->name }}
                </button>
              @endif
            @endforeach
          </div>

          <div>
            <label for="title" class="block text-xl font-medium mb-2 dark:text-white">What do you wanna change it to?</label>
            <div class="flex w-1/2">
              <input type="text" name="category" id="editInput" class="py-3 px-4 block w-full border-gray-200 rounded-l-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400" placeholder="Enter category name" autofocus>
              <button id="editList" type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-r-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none shrink-0 whitespace-nowrap disabled:bg-blue-400" disabled>
                Edit List
              </button>
            </div>
            <div class="text-red-500 italic hidden mt-1" id="editError">Please tell us the category name!</div>
          </div>
        </div>

        <form id="cateForm" action="{{ url('/category/admin') }}" method="POST" class="flex flex-col gap-4">
          @method("put")
          <input type="hidden" name="id" id="editId">
          <input type="hidden" name="name" id="editName">
          <input type="hidden" name="slug" id="editSlug">
          @csrf
          <div id="editForms"></div>
          <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
            <button aria-label="Close" data-hs-overlay="#EditCategory" type="button" name="save" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 hover:bg-gray-50 focus:outline-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700">Close</button>
            <button aria-haspopup="dialog" aria-expanded="false" aria-controls="ConfirmDialog" data-hs-overlay="#ConfirmDialog" data-hs-overlay-options='{
                    "isClosePrev": false
                    }'  onclick="modalShow()" type="button" id="editButton" name="post" class="py-2 px-3 disabled:bg-blue-400 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700" disabled>Update Categories</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div id="DeleteCategory" class="hs-overlay hidden size-full fixed top-0 start-0 z-[60] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="EditCategory-label">
  <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 m-3 flex items-center lg:mx-auto min-h-[calc(100%-3.5rem)]">
    <div class="w-full mx-[200px] flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70 transition-all duration-500 ease-in-out"
      style="transition: width 0.5s ease-in-out;">
      <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
        <h3 id="EditCategory-label" class="font-bold text-gray-800 text-4xl dark:text-white">
          Delete Category
        </h3>
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#EditCategory">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6 6 18"></path>
            <path d="m6 6 12 12"></path>
          </svg>
        </button>
      </div>
      
      <div class="p-4 min-h-[50vh] overflow-y-auto">
        <label for="title" class="block text-xl font-medium mb-2 dark:text-white">Which category to change?</label>
        <div class="flex-col mb-[20%] flex gap-4">
          <div class="flex flex-wrap gap-3">
            @foreach ($categories as $categ)
              @if ($categ->id !== 6)
                <!-- Add click event to each category div -->
                <button class="border rounded-lg p-2 category-btn hover:shadow-lg bg-slate-100 shadow-md category-option" 
                     onclick="selectCategory({{ $categ->id }}, '{{ $categ->name }}', event, 'delete')">
                  {{ $categ->name }}
                </button>
              @endif
            @endforeach
          </div>
        </div>

        <form id="delForm" action="{{ url('/category/admin') }}" method="POST" class="flex flex-col gap-4">
          @method("delete")
          @csrf
          <input type="hidden" name="id" id="deleteId">
          <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
            <button aria-label="Close" data-hs-overlay="#EditCategory" type="button" name="save" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 hover:bg-gray-50 focus:outline-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700">Close</button>
            <button aria-haspopup="dialog" aria-expanded="false" aria-controls="DeleteDialog" data-hs-overlay="#DeleteDialog" data-hs-overlay-options='{
                    "isClosePrev": false
                    }'  onclick="modalShow()" type="button" id="deleteButton" name="post" class="py-2 px-3 disabled:bg-rose-400 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-rose-600 text-white hover:bg-rose-700 focus:outline-none focus:bg-rose-700" disabled>Remove Categories</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div id="DeleteDialog" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="DeleteDialog-label">
  <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
    <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
      <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
        <h3 id="DeleteDialog-label" class="font-bold text-gray-800 text-3xl dark:text-white">
          Are You Sure?
        </h3>
            <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#DeleteDialog">
            <span class="sr-only">Close</span>
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 6 6 18"></path>
                <path d="m6 6 12 12"></path>
            </svg>
            </button>
      </div>
      <div class="p-4 overflow-y-auto flex items-center gap-5">
        <div class="w-max">
        <svg class="text-red-500" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
        </div>
        <p class="mt-1 text-gray-800 dark:text-neutral-400">
            <b>Whoa!</b> This action is irreversible. Once you delete this post, it's gone forever. Are you absolutely, positively sure you want to proceed?
        </p>
      </div>
      <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
            <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#DeleteDialog">
            Cancel
            </button>
            <button onclick="submitDel()" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
            Delete Post
            </button>
      </div>
    </div>
  </div>
</div>
<div id="ConfirmDialog" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none [--overlay-backdrop:static]" role="dialog" tabindex="-1" aria-labelledby="ConfirmDialog-label">
  <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
    <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
      <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
        <h3 id="ConfirmDialog-label" class="font-bold text-gray-800 text-3xl dark:text-white">
          Are You Sure?
        </h3>
            <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#ConfirmDialog">
            <span class="sr-only">Close</span>
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 6 6 18"></path>
                <path d="m6 6 12 12"></path>
            </svg>
            </button>
      </div>
      <div class="p-4 overflow-y-auto flex items-center gap-5">
        <div class="w-max">
        <svg class="text-fuchsia-500" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
        </div>
        <p class="mt-1 text-gray-800 dark:text-neutral-400">
            <b>Whoa!</b> This action will publish all the edits and will be view by other people. Are you absolutely, positively sure you want to proceed?
        </p>
      </div>
      <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
            <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#ConfirmDialog">
            Cancel
            </button>
            <button onclick="submitEdits()" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-fuchsia-600 text-white hover:bg-fuchsia-700 focus:outline-none focus:bg-fuchsia-700 disabled:opacity-50 disabled:pointer-events-none">
            Yes, I'm sure
            </button>
      </div>
    </div>
  </div>
</div>
@endcan

@can("writer")
<div id="AddBlogs" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="AddBlogs-label">
  <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 m-3 flex items-center lg:mx-auto min-h-[calc(100%-3.5rem)]">
    <div class="w-full mx-5 flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70 transition-all duration-500 ease-in-out"
      style="transition: width 0.5s ease-in-out;">
      <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
        <h3 id="AddBlogs-label" class="font-bold text-gray-800 text-4xl dark:text-white">
          Post A Blog
        </h3>
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#AddBlogs">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6 6 18"></path>
            <path d="m6 6 12 12"></path>
          </svg>
        </button>
      </div>
      
      <div class="p-4 min-h-[70vh] overflow-y-auto">
          <form id="blogForm" action="{{ url('/blog') }}" enctype="multipart/form-data" method="POST" class="flex flex-col gap-4">
              @csrf
              <div class="grid c2:grid-cols-2 grid-cols-1 gap-2">
                  <div>
                      <label for="category" class="block text-xl font-medium mb-2 dark:text-white">What do you wanna write today?</label>
                      <select id="category" name="category_id" data-hs-select='{
                        "placeholder": "Select option...",
                        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                        "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                        "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                      }' class="hidden">
                          <option selected disabled>Categories</option>
                          @foreach ($categories as $categ)
                          @if ($categ->id !== 6)
                          <option value="{{ $categ->id }}">{{ $categ->name }}</option>
                          @endif
                          @endforeach
                          <option value="{{ $categories[5]->id }}">{{ $categories[5]->name }}</option>
                      </select>
                      <div class="text-red-500 italic hidden mt-1" id="catError">Please tell us what did you write!</div>
                  </div>
                  <div>
                      <label for="title" class="block text-xl font-medium mb-2 dark:text-white">Pick a title for the blog</label>
                      <input type="text" name="title" id="title" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400" placeholder="Enter blog title">
                      <div class="text-red-500 italic hidden mt-1" id="titleError">Please tell us what is the title!</div>
                  </div>
              </div>
              <div>
                  <label for="body" class="block text-xl font-medium mb-2 dark:text-white">Start to share your story!</label>
                  <input id="body" type="hidden" name="body">
                  <trix-editor input="body" class="trix-Body growable-editor min-h-[35vh]"></trix-editor>
                  <div class="text-red-500 italic hidden mt-1" id="contentError">Please tell us your story!</div>
              </div>
              <div class="c2:w-4/5 w-full">
                <label for="file_input" class="block text-xl font-medium mb-2 dark:text-white">
                  Got a cool thumbnail? If not, we’ll choose a cool image for you!
                </label>
                <input onchange="uploadFile(event)"  name="thumbnail"  class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" 
                      id="file_input" type="file" accept="image/*">
                <div class="text-red-500 italic hidden mt-1" id="thumbError">The file size is too big. Maximum is 5MB!</div>
                <img id="image_preview" src="" alt="Thumbnail Preview" class="mt-4 hidden lg:w-2/3 w-full rounded-lg" />
              </div>
              <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                  <button aria-label="Close" data-hs-overlay="#AddBlogs" type="submit" name="save" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 hover:bg-gray-50 focus:outline-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700">Close</button>
                  <button onclick="onPost(event)" type="submit" id="postButton" name="post" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Post Blog</button>
              </div>
          </form>
        </div>
      </div>
    </div>
</div>
@endcan

<script>
  function uploadFile(event) {
    const file = event.target.files[0]; 
    const maxSize = 5 * 1024 * 1024;

    if (file && file.size > maxSize) {
      event.target.value = "";
      document.getElementById('thumbError').classList.remove('hidden');
      return
    }

    const imgElement = document.getElementById('image_preview'); 
    if (file) {
      const reader = new FileReader(); 
      reader.onload = function(e) {
        imgElement.src = e.target.result; 
        imgElement.classList.remove('hidden'); 
      };
      reader.readAsDataURL(file); 
    } else {
      imgElement.classList.add('hidden'); 
      imgElement.src = ""; 
    }
  };
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
  function onPost(e){
      let isValid = true;

      const blogForm = document.getElementById('blogForm');

      // Get form elements
      const category = document.querySelector('select[name="category_id"]');
      const title = document.querySelector('input[name="title"]');
      const body = document.querySelector('input[name="body"]');

      // Get error elements
      const catError = document.getElementById('catError');
      const titleError = document.getElementById('titleError');
      const contentError = document.getElementById('contentError');

      // Validate category
      if (category.value === "Categories" || category.value === "") {
          catError.classList.remove('hidden');
          isValid = false;
      } else {
          catError.classList.add('hidden');
      }

      // Validate title
      if (title.value.trim() === "") {
          titleError.classList.remove('hidden');
          isValid = false;
      } else {
          titleError.classList.add('hidden');
      }

      // Validate body
      if (body.value.trim() === "") {
          contentError.classList.remove('hidden');
          isValid = false;
      } else {
          contentError.classList.add('hidden');
      }

      // Submit the form if valid
      if (!isValid) {
          e.preventDefault();  
      }
  };
  function submitEdits(){
      const cateForm = document.getElementById('cateForm');
      cateForm.submit()
  }
  function submitDel(){
      const delForm = document.getElementById('delForm');
      delForm.submit()
  }
  function modalShow(){
    const confirmDialog = document.querySelector('#ConfirmDialog');
    confirmDialog.classList.add('hidden');
    confirmDialog.classList.remove('open');
    confirmDialog.classList.remove('opened');
    confirmDialog.setAttribute('aria-overlay', 'false');
  }
  const addButton = document.getElementById('addList');
  const editButton = document.getElementById('editList');
  const createInput = document.getElementById('createInput');
  const editInput = document.getElementById('editInput');
  const createError = document.getElementById('createError');
  const editError = document.getElementById('editError');
  const categoryList = document.getElementById('categoryList');
  const random = document.getElementById('random');
  const createForms = document.getElementById('createForms');
  createInput.addEventListener('input', function(){
    if(createInput.value !== ''){
      createError.classList.add('hidden');
    }
  })
  editInput.addEventListener('change', function() {
      const categoryName = editInput.value.trim(); // Trim the input value to avoid spaces

      if (categoryName !== '') {
          editError.classList.add('hidden'); // Hide the error message if the input is valid
          editButton.removeAttribute('disabled'); // Enable the button
      } else {
          editError.classList.remove('hidden'); // Show error message if the input is empty
          editButton.setAttribute('disabled', true); // Disable the button if the input is empty
      }
  });

let originalCategoryName;
function selectCategory(id, name, e, action) {
      // Remove the selected styles from all buttons
      const categoryBtn = document.querySelectorAll('.category-btn');
      categoryBtn.forEach(category => {
          category.classList.remove('bg-slate-500', 'text-white');
          category.classList.add('bg-slate-100', 'text-black');
      });

      // Add the selected styles to the clicked button
      e.target.classList.remove('bg-slate-100', 'text-black');
      e.target.classList.add('bg-slate-500', 'text-white');
    // Update the input fields
    if(action=='update'){
      editInput.value = name;
      document.getElementById('editId').value = id;


      // Manually trigger the change event
      const event = new Event('change');
      editInput.dispatchEvent(event);

      originalCategoryName = name
      document.getElementById('editButton').removeAttribute('disabled');
    }
    if(action=='delete'){
      document.getElementById('deleteId').value = id;
      document.getElementById('deleteButton').removeAttribute('disabled');
    }
}

  async function generateSlug(name) {
      try {
          const baseUrl = "{{ url('') }}";
          const fullUrl = `${baseUrl}/category/admin/checkSlug?name=${encodeURIComponent(name)}`;
          const response = await fetch(fullUrl);
          
          if (!response.ok) {
              throw new Error(`Error: ${response.status} - ${response.statusText}`);
          }
          
          const data = await response.json();
          return data.slug;
      } catch (error) {
          console.error('Error generating slug:', error);
          return '';
      }
  }
  let count = 0

document.addEventListener("DOMContentLoaded", function() { 
    // Store the counts for slugs
    const slugCount = {};
    const slugMappings = {};

    addButton.addEventListener('click', async function() {
    const categoryName = createInput.value.trim();

    if (!categoryName) {
        createError.classList.remove('hidden');
        return;
    }
    createError.classList.add('hidden');

    // Generate the initial slug for the category
    let baseSlug = await generateSlug(categoryName);

    // Initialize slug tracking if not present
    if (!slugCount[categoryName]) {
        slugCount[categoryName] = 0; // Initialize count
        slugMappings[categoryName] = []; // Store the slugs
    }

    // Increment the slug count and create a new slug if necessary
    slugCount[categoryName] += 1;
    let categorySlug = baseSlug;

    if (slugCount[categoryName] > 1) {
        categorySlug = `${baseSlug}-${slugCount[categoryName]}`; // Create unique slug for duplicates
    }

    // Store the slug in the mappings
    slugMappings[categoryName].push(categorySlug);

    const newCategory = document.createElement('div');
    newCategory.className = 'border rounded-lg p-2 hover:shadow-lg bg-slate-400 text-white shadow-md flex items-center justify-between';
    newCategory.innerText = categoryName;

    // Create the remove button (X button)
    const removeButton = document.createElement('button');
    removeButton.className = 'ml-2 bg-slate-400 flex items-center justify-center text-gray-300 hover:text-gray-600 h-5 w-5 p-1 rounded-full hover:bg-slate-300 focus:outline-none';
    removeButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>';
    removeButton.setAttribute('aria-label', `Remove ${categoryName}`); // Accessibility improvement

    newCategory.appendChild(removeButton);

    // Event listener for removing the category
    removeButton.addEventListener('click', function() {
        // Get the last (i.e., highest-numbered) slug for this category
        const lastSlug = slugMappings[categoryName].pop(); // Remove the last entry

        // Remove the hidden inputs associated with the highest-numbered slug
        const nameInput = document.getElementById(`name_${lastSlug}`);
        const slugInput = document.getElementById(`slug_${lastSlug}`);
        if (nameInput) createForms.removeChild(nameInput);
        if (slugInput) createForms.removeChild(slugInput);

        // Decrease the slug count
        slugCount[categoryName]--;

        // If no more slugs for this category exist, delete the mappings and reset the count
        if (slugMappings[categoryName].length === 0) {
            delete slugMappings[categoryName];
            delete slugCount[categoryName];
        }

        // Remove the category from the list
        categoryList.removeChild(newCategory);

        // Update the count
        count--;

        // Re-index the hidden input names and slugs
        reindexInputs();

        // Toggle the add button state based on the count
        toggleAddButtonState();
    });

    // Append the new category to the category list
    categoryList.insertBefore(newCategory, random);

    // Increment the count and update button state
    count++;
    toggleAddButtonState();

    // Create hidden inputs for the new category
    const nameInput = document.createElement('input');
    nameInput.type = 'hidden';
    nameInput.name = `name_${count}`; // Update name to use current count
    nameInput.id = `name_${categorySlug}`;
    nameInput.value = categoryName;

    const slugInput = document.createElement('input');
    slugInput.type = 'hidden';
    slugInput.name = `slug_${count}`; // Update slug to use current count
    slugInput.id = `slug_${categorySlug}`;
    slugInput.value = categorySlug;

    // Append the hidden inputs to the form
    createForms.appendChild(nameInput);
    createForms.appendChild(slugInput);

    // Clear the input
    createInput.value = '';
    createInput.focus();
});

function reindexInputs() {
    // Re-index hidden input names and slugs after an item is removed
    const nameInputs = document.querySelectorAll('input[name^="name_"]');
    const slugInputs = document.querySelectorAll('input[name^="slug_"]');
    
    nameInputs.forEach((input, index) => {
        const newIndex = index + 1; // Adjust for 1-based indexing
        input.name = `name_${newIndex}`;
    });
    
    slugInputs.forEach((input, index) => {
        const newIndex = index + 1; // Adjust for 1-based indexing
        input.name = `slug_${newIndex}`;
    });
}

function toggleAddButtonState() {
  const addButton = document.getElementById('addButton')
    if (count > 0) {
        addButton.removeAttribute('disabled');
    } else {
        addButton.setAttribute('disabled', true);
    }
}


  editButton.addEventListener('click', async function() {
    const categoryName = editInput.value.trim(); 

    if (!categoryName) {
        editError.classList.remove('hidden'); 
        return;
    }
    editError.classList.add('hidden');

    // Generate the initial slug for the category only if the name has changed
    if (categoryName !== originalCategoryName) {
        let baseSlug = await generateSlug(categoryName);
        document.querySelector('#editSlug').value = baseSlug; 
    }

    // Always update the name input
    document.querySelector('#editName').value = categoryName;
  });
});

</script>

{{-- <script>
  function limitHtml($html, $limit) {
    $length = 0;
    $result = '';
    $isInsideTag = false;

    // Use regex to find the tags and text
    preg_match_all('/<[^>]+>|[^<]+/', $html, $matches);

    foreach ($matches[0] as $part) {
        // Check if it's a tag
        if (strpos($part, '<') === 0) {
            $result .= $part; // Append the tag directly
            $isInsideTag = true; // We are inside a tag
        } else {
            // It's a text part
            if ($length + strlen($part) > $limit) {
                // If adding this part exceeds the limit, truncate it
                $remaining = $limit - $length;
                $result .= substr($part, 0, $remaining);
                break; // Stop processing further
            }

            $result .= $part; // Append the text part
            $length += strlen($part); // Update the total length
        }
    }

    return $result;
  }
</script> --}}