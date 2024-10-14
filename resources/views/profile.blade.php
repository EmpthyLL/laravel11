<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex flex-col lg:flex-row gap-6">
      <!-- Profile Card -->
      <div class="border relative border-lime-200 shadow-lime-100 hover:shadow-lime-200 transition-shadow shadow-lg hover:shadow-xl p-6 rounded-lg bg-lime-100 flex flex-col items-center gap-6 h-max">
          <img src="{{ asset('img/img_' . (($user->id - 1) % 25 + 1) . '.jpg') }}" class="rounded-full w-[150px] p-1 border-2 border-lime-200 shadow-lg bg-lime-100" alt="Profile Picture">
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
        <div class="text-center">
          <h2 class="text-3xl font-bold tracking-tight text-emerald-900">{{ $user->fullname }}</h2>
          <h3 class="text-2xl tracking-tight text-emerald-400">{{ $user->email }}</h3>
          <h3 class="text-2xl tracking-tight text-emerald-400 flex justify-center gap-4">
            <span>Comments:</span><span class="font-bold">{{ count($user->comments) }}</span>
          </h3>
        </div>
      </div>

      <!-- Comments Section -->
      <div class="w-full lg:w-2/3 flex flex-col gap-6">
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
    </div>
  </main>
</x-layout>


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
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
          Save changes
        </button>
      </div>
    </div>
  </div>
</div>
