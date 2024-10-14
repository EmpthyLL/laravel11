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
          <button aria-haspopup="dialog" aria-expanded="false" aria-controls="AddBlogs" data-hs-overlay="#AddBlogs" type="button" class="w-max py-3 ml-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-cyan-500 text-white hover:bg-cyan-600 focus:outline-none focus:bg-cyan-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-white dark:text-neutral-800">
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
                    
                    <div class="flex items-center justify-between gap-4 mt-2">
                        <div class="flex">
                            <div class="text-justify mt-2 overflow-hidden text-ellipsis max-h-[160px] max-w-[380px] BodyWithTags">
                                {!! limitHtml($blog['body'], 275) !!} 
                                <span class="inline text-blue-600 hover:underline">Read more</span>
                            </div>
                        </div>
                        <div class="ml-4 w-[170px] h-[170px] flex items-center justify-center overflow-hidden rounded-lg flex-shrink-0">
                            <img src="{{ $blog->thumbnail ? asset("storage/$blog->thumbnail") : asset('img/photo_' . (($blog['blog_id'] - 1) % 24 + 12) . '.jpg') }}" alt="Picture" class="w-full h-full object-cover">
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
                          <option value="{{ $categ->id }}">{{ $categ->name }}</option>
                          @endforeach
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
</script>

<script>
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
</script>
