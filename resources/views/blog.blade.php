<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <a href="{{ url('/blog') }}" class="flex justify-end  mb-3 pr-8 text-lg text-blue-600 hover:underline items-center gap-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-arrow-out-up-right"><path d="M21 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6"/><path d="m21 3-9 9"/><path d="M15 3h6v6"/></svg><span>See more blogs</span></a>
            <div class="bg-gray-100 shadow-lg pb-4 relative">
                <!-- Dropdown button positioned at the top right -->
                <div class="absolute top-[-15px] right-[-15px]">
                    <div class="hs-dropdown relative inline-flex">
                        <button id="hs-dropdown-default" type="button" class="hs-dropdown-toggle py-2 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis-vertical">
                                <circle cx="12" cy="12" r="1"/>
                                <circle cx="12" cy="5" r="1"/>
                                <circle cx="12" cy="19" r="1"/>
                            </svg>
                        </button>
            
                        <!-- Dropdown Menu with the pen button -->
                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-max w-max bg-white shadow-md rounded-lg mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-default">
                            <div class="p-1 space-y-0.5">
                                <!-- Pen button inside the dropdown -->
                                <button aria-haspopup="dialog" aria-expanded="false" aria-controls="EditPost" data-hs-overlay="#EditPost" class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 w-full dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                    </svg>
                                    Edit Post
                                </button>
                                <button aria-haspopup="dialog" aria-expanded="false" aria-controls="EditPost" data-hs-overlay="#EditPost" class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 w-full dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                    Delete Post
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Main content -->
                <div class="flex rounded-lg justify-between py-8 px-10 flex-col c2:flex-row items-start gap-6">
                    <div class="text-justify c1:min-w-[530px] BodyWithTags c2:min-w-[300px]">
                        {!! Str::replace("\n", "<br>", $blog['body']) !!}
                    </div>
                    <img src="{{ asset('img/photo_' . (($blog['blog_id'] - 1) % 24 + 12) . '.jpg') }}" alt="Picture" class="rounded-lg w-full c2:max-w-[400px] h-auto object-cover">
                </div>
            </div>
            
            <!-- Comment section -->
            <div class="p-2">
                <div class="flex mt-5 bg-white items-center py-3 px-5 rounded-lg border-2 justify-between gap-3">
                    <div class="flex-grow">
                        <div class="flex rounded-lg shadow-sm">
                            <input type="text" id="comment-input" name="comment" placeholder="Leave your comment..." class="py-3 px-4 block w-full border-gray-200 shadow-sm rounded-s-lg text-sm focus:z-10 focus:border-gray-500 focus:ring-gray-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" />
                            <button type="button" class="w-[2.875rem] h-[2.875rem] shrink-0 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-e-md border border-transparent bg-black min-w-[60px] text-white hover:bg-black focus:outline-none focus:bg-black disabled:opacity-50 disabled:pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-send-horizontal">
                                    <path d="M3.714 3.048a.498.498 0 0 0-.683.627l2.843 7.627a2 2 0 0 1 0 1.396l-2.842 7.627a.498.498 0 0 0 .682.627l18-8.5a.5.5 0 0 0 0-.904z"/>
                                    <path d="M6 12h16"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <span class="flex gap-3 bg-slate-200 p-1 rounded-lg items-center">
                        <span>
                            <svg class="text-gray-400 bg-yellow-200 rounded-full" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-smile-plus">
                                <path d="M22 11v1a10 10 0 1 1-9-10"/>
                                <path d="M8 14s1.5 2 4 2 4-2 4-2"/>
                                <line x1="9" x2="9.01" y1="9" y2="9"/>
                                <line x1="15" x2="15.01" y1="9" y2="9"/>
                                <path d="M16 5h6"/>
                                <path d="M19 2v6"/>
                            </svg>
                        </span>
                        <span class="text-2xl flex items-center font-extralight text-gray-400">
                            {{ $blog['created_at'] == $blog['updated_at'] ? $blog['created_at']->diffForHumans()." (Post)" : $blog['updated_at']->diffForHumans()." (Edit)" }}
                        </span>
                    </span>
                </div>
            </div>
            
                <div>
                    @if (count($comments) === 0)
                    <div class="flex items-center space-x-2 mt-2 p-4 mx-2 bg-gray-100 max-w-md rounded-md text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-alert-circle text-gray-500">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                        <span class="flex flex-col">
                            <span class="font-semibold text-gray-700">
                                No comments on this post!
                            </span>
                            <span class="text-gray-500">
                                Be the first to share your thoughts.
                            </span>
                        </span>
                    </div>
                    @else
                    <div class="flex flex-col gap-2">
                        @foreach ($comments as $com)
                        <div class="mx-2 border bg-white p-4 rounded-lg shadow-sm flex items-center gap-4 max-w-max">
                            <a href="{{ url('/profile/'.$com->users->username) }}"><img src="{{ asset('img/img_' . (($com->users->id - 1) % 25 + 1) . '.jpg') }}" alt="" class="rounded-full" width="70"></a>
                            <div class="flex flex-col justify-between w-full">
                                <div class="flex items-start justify-between">
                                    <a href="{{ url('/profile/'.$com->users->username) }}"><span class="font-semibold hover:underline text-gray-800">{{ $com->users->username }}</span></a>
                                    <span class="text-sm text-gray-400">
                                        {{ $com['created_at'] == $com['updated_at'] ? $com['created_at']->diffForHumans() : $com['updated_at']->diffForHumans()." (Edit)" }}
                                    </span>
                                </div>
                                <div class="text-gray-700 text-base mt-2">
                                    {{ $com['body'] }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
            {{-- <a href="{{ url('/blog') }}" class="lg:flex hidden justify-start mt-3 pl-8 text-lg text-blue-600 hover:underline items-center gap-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-arrow-out-up-left"><path d="M13 3h6a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-6"/><path d="m3 3 9 9"/><path d="M3 9V3h6"/></svg><span>See more blogs</span></a> --}}
        </div>
    </main>
</x-layout>

<div id="EditPost" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="EditPost-label">
    <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 m-3 flex items-center lg:mx-auto min-h-[calc(100%-3.5rem)]">
      <div class="w-full mx-5 flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70 transition-all duration-500 ease-in-out"
        style="transition: width 0.5s ease-in-out;">
        <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
          <h3 id="EditPost-label" class="font-bold text-gray-800 text-4xl dark:text-white">
            Post A Blog
          </h3>
          <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#EditPost">
            <span class="sr-only">Close</span>
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M18 6 6 18"></path>
              <path d="m6 6 12 12"></path>
            </svg>
          </button>
        </div>
        
        <div class="p-4 min-h-[70vh] overflow-y-auto">
            <form id="blogForm" action="{{ url('/blog/create') }}" method="POST" class="flex flex-col gap-4">
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
                        <div class="text-red-500 italic hidden mt-1" id="catError">Please tell us what you wrote!</div>
                    </div>
                    <div>
                        <label for="title" class="block text-xl font-medium mb-2 dark:text-white">Pick a title for the blog</label>
                        <input type="text" name="title" id="title" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400" placeholder="Enter blog title">
                        <div class="text-red-500 italic hidden mt-1" id="titleError">Please tell us what blog's title!</div>
                    </div>
                </div>
                <div>
                    <label for="body" class="block text-xl font-medium mb-2 dark:text-white">Start to share your story!</label>
                    <input id="body" type="hidden" name="body">
                    <trix-editor input="body" class="trix-Body growable-editor min-h-[35vh]"></trix-editor>
                    <div class="text-red-500 italic hidden mt-1" id="contentError">Please tell us your story!</div>
                </div>
                <div class="c2:w-4/5 w-full">
                    <label for="thumbnail" class="block text-xl font-medium mb-2 dark:text-white">Got a cool thumbnail? If not, we’ll choose cool image for you!</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" accept="image/*">
                    <img id="image_preview" src="" alt="Thumbnail Preview" class="mt-4 hidden max-w-full rounded-lg" />
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                    <button aria-label="Close" data-hs-overlay="#EditPost" type="button" name="save" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 hover:bg-gray-50 focus:outline-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700">Close</button>
                    <button onclick="onPost(event)" type="submit" id="postButton" name="post" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Publish Edits</button>
                </div>
            </form>
        </div>
  </div>
  <script>

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