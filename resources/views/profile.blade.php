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
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex flex-col lg:flex-row gap-6">
      <!-- Profile Card -->
      <div class="border relative border-lime-200 shadow-lime-100 hover:shadow-lime-200 transition-shadow shadow-lg hover:shadow-xl p-6 rounded-lg bg-lime-100 flex flex-col items-center gap-6 h-max">
          <img src="{{ asset('img/img_' . (($user->id - 1) % 25 + 1) . '.jpg') }}" class="rounded-full w-[150px] p-1 border-2 border-lime-200 shadow-lg bg-lime-100" alt="Profile Picture">
          @auth
            @if (auth()->user()->id === $user->id)
            <div aria-haspopup="dialog" aria-expanded="false" aria-controls="changeProfile" data-hs-overlay="#changeProfile" class="absolute top-0 right-0 m-2 text-yellow-300 bg-gradient-to-r from-yellow-100 to-yellow-200 p-2 rounded-full shadow-lg hover:shadow-none transition-shadow duration-300 ease-in-out">
              <svg xmlns="http://www.w3.org/2000/svg" 
                  class="w-6 h-6" 
                  viewBox="0 0 24 24" 
                  fill="none" 
                  stroke="currentColor" 
                  stroke-width="2" 
                  stroke-linecap="round" 
                  stroke-linejoin="round">
                <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
              </svg>
            </div>
            @endif
          @endauth
        <div class="text-center">
          <h2 class="text-3xl font-bold tracking-tight text-emerald-900">{{ $user->fullname }}</h2>
          <h3 class="text-2xl tracking-tight text-emerald-400">{{ $user->email }}</h3>
          <h3 class="text-2xl tracking-tight text-emerald-400 flex justify-center gap-4">
            <span>Comments:</span><span class="font-bold">{{ count($user->comments) }}</span>
          </h3>
        </div>
      </div>

      <div class="w-full lg:w-2/3 flex flex-col gap-6">
        <div class="border-b border-gray-200 dark:border-neutral-700">
          <nav class="flex gap-x-1" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
            <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-slate-600 hs-tab-active:text-slate-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-slate-600 focus:outline-none focus:text-slate-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-slate-500 active" id="tabs-with-icons-item-1" aria-selected="true" data-hs-tab="#tabs-with-icons-1" aria-controls="tabs-with-icons-1" role="tab">
              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <circle cx="12" cy="10" r="3"></circle>
                <path d="M7 20.662V19a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v1.662"></path>
              </svg>
              Settings
            </button>
            <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-slate-600 hs-tab-active:text-slate-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-slate-600 focus:outline-none focus:text-slate-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-slate-500" id="tabs-with-icons-item-2" aria-selected="false" data-hs-tab="#tabs-with-icons-2" aria-controls="tabs-with-icons-2" role="tab">
              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle-more"><path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/><path d="M8 12h.01"/><path d="M12 12h.01"/><path d="M16 12h.01"/></svg>
              Comments
            </button>
            <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-slate-600 hs-tab-active:text-slate-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-slate-600 focus:outline-none focus:text-slate-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-slate-500" id="tabs-with-icons-item-3" aria-selected="false" data-hs-tab="#tabs-with-icons-3" aria-controls="tabs-with-icons-3" role="tab">
              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"></path>
                <circle cx="12" cy="12" r="3"></circle>
              </svg>
              Posts
            </button>
          </nav>
        </div>
        
        <div class="mt-3">
          <div id="tabs-with-icons-1" role="tabpanel" aria-labelledby="tabs-with-icons-item-1">
            <p class="text-gray-500 dark:text-neutral-400">
              This is the <em class="font-semibold text-gray-800 dark:text-neutral-200">first</em> item's tab body.
            </p>
          </div>
          <div id="tabs-with-icons-2" class="hidden" role="tabpanel" aria-labelledby="tabs-with-icons-item-2">
            @if (count($user->comments) === 0)
        <x-alert classAdd="hover:shadow-teal-300" size="lg:w-max sm:w-2/3 lg:w-1/2" message="You haven't wrote any comments yet!" header="No comments yet!" icon='
          <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-badge-info">
                    <path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"/>
                    <line x1="12" x2="12" y1="16" y2="12"/>
                    <line x1="12" x2="12.01" y1="8" y2="8"/>
                </svg>'>teal</x-alert>
      @else
        @foreach ($user->comments as $comment)
          <div class="border bg-white p-6 rounded-lg shadow-sm">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900 mb-4">{{ $comment->blogs->title }}</h2>
            <div class="flex items-start gap-4 max-w-max border p-4 rounded-lg bg-slate-100">
              <img src="{{ asset('img/img_' . (($comment->users->id - 1) % 25 + 1) . '.jpg') }}" alt="User Profile" class="rounded-full w-[70px] h-[70px]">
              <div class="flex flex-col justify-between w-full">
                <div class="flex items-center justify-between gap-2">
                  <span class="font-semibold text-gray-800">{{ $comment->users->username }}</span>
                  <span class="text-sm text-gray-400">
                    {{ $comment['created_at'] == $comment['updated_at'] ? $comment['created_at']->diffForHumans() : $comment['updated_at']->diffForHumans()." (Edit)" }}
                  </span>
                </div>
                <div class="text-gray-700 text-base mt-2">
                  {{ $comment['body'] }}
                </div>
              </div>
            </div>
          </div>
        @endforeach
      @endif
          </div>
          <div id="tabs-with-icons-3" class="hidden" role="tabpanel" aria-labelledby="tabs-with-icons-item-3">
            @if (count($blogs) === 0)
        <x-alert  classAdd="hover:shadow-rose-300"  size="sm:w-2/3 lg:w-1/2" message="You haven't posted any story yet!" header="No blog is posted yet!" icon='
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-badge-info">
              <path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"/>
              <line x1="12" x2="12" y1="16" y2="12"/>
              <line x1="12" x2="12.01" y1="8" y2="8"/>
            </svg>'>rose</x-alert>
        @else 
          <div class="grid md:grid-cols-2 lg:grid-cols-1 mt-4 mb-4 grid-cols-1 gap-4">
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
        @endif
          </div>
        </div>
        
      </div>
      
    </div>
  </main>
</x-layout>

@auth
@if (auth()->user()->id === $user->id)   
<div id="changeProfile" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="changeProfile-label">
  <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center lg:max-w-4xl lg:w-full lg:mx-auto">
    <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
      <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
        <h3 id="changeProfile-label" class="font-bold text-gray-800 dark:text-white">
          Modal title
        </h3>
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#changeProfile">
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
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#changeProfile">
          Close
        </button>
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-slate-600 text-white hover:bg-slate-700 focus:outline-none focus:bg-slate-700 disabled:opacity-50 disabled:pointer-events-none">
          Save changes
        </button>
      </div>
    </div>
  </div>
</div>
@endif
@endauth

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