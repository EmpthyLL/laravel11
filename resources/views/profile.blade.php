<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex flex-col lg:flex-row gap-6">
      <!-- Profile Card -->
      <div class="border border-yellow-200 shadow-lime-100 hover:shadow-lime-200 transition-shadow shadow-lg hover:shadow-xl p-6 rounded-lg bg-lime-100 flex flex-col items-center gap-6 h-max">
        <img src="{{ asset('img/img_' . (($user->id - 1) % 25 + 1) . '.jpg') }}" class="rounded-full w-[150px] p-1 border-2 border-yellow-200 shadow-lg bg-yellow-100" alt="Profile Picture">
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
        <div class="rounded-lg p-6 w-max bg-teal-100 text-teal-600 shadow-lg hover:shadow-xl hover:shadow-teal-300 shadow-teal-200 border border-teal-300 transition-shadow duration-300">
            <div class="flex items-center gap-3 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-badge-info">
                    <path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"/>
                    <line x1="12" x2="12" y1="16" y2="12"/>
                    <line x1="12" x2="12.01" y1="8" y2="8"/>
                </svg>
                <h2 class="text-2xl font-semibold tracking-tight">No comments yet!</h2>
            </div>
            <p class="text-base text-teal-500">
                You haven't wrote any comments yet!
            </p>
        </div>
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
