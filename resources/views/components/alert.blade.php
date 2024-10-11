@props(['dismisable' => false, 'size' => 'w-max', 'header' => '', 'message' => '', 'icon' => ''])
<div role="alert" class="rounded-lg p-6 {{ $size }} flex gap-3 items-center bg-{{ $slot }}-100 text-{{ $slot }}-600 shadow-lg hover:shadow-xl hover:shadow-{{ $slot }}-300 shadow-{{ $slot }}-200 border border-{{ $slot }}-300 transition-shadow duration-300">
    <div>
        @if ($header)
        <div class="flex items-center gap-3 mb-2">
            {!! $icon !!}
            <h2 class="sm:text-2xl text-xl font-semibold tracking-tight">{{ $header }}</h2>
        </div>
        @endif
        @if ($message)
            <p class="sm:text-base text-sm text-{{ $slot }}-500">
                {!! $message !!}
            </p>
        @endif
    </div>
    @if ($dismisable)
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-{{ $slot }}-100 text-{{ $slot }}-500 rounded-lg focus:ring-2 focus:ring-{{ $slot }}-400 p-1.5 hover:bg-{{ $slot }}-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-{{ $slot }}-400 dark:hover:bg-gray-700" data-dismiss-target="#successAlert" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button> 
    @endif
</div>
