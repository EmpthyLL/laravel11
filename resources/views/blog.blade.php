<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <a href="{{ url('/blog') }}" class="flex justify-end  mb-3 pr-8 text-lg text-blue-600 hover:underline items-center gap-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-arrow-out-up-right"><path d="M21 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6"/><path d="m21 3-9 9"/><path d="M15 3h6v6"/></svg><span>See more blogs</span></a>
            <div class="bg-gray-100 shadow-lg pb-4">
                <div class="flex rounded-lg   py-8 px-10 flex-col c2:flex-row items-start gap-6">
                    <div class="text-justify c1:min-w-[530px] c2:min-w-[300px]">
                        {!! Str::replace("\n", "<br>", $blog['body']) !!}
                    </div>
                    <img src="{{ asset('img/photo_' . (($blog['blog_id'] - 1) % 24 + 12) . '.jpg') }}"  
                        alt="Picture" 
                        class="rounded-lg w-full c2:max-w-[400px] h-auto object-cover">
                </div>
                <div class="p-2">
                    <div class="flex mt-5 bg-white items-center py-3 px-5 rounded-lg border-2 justify-between gap-3">
                        <span class="text-gray-400 flex justify-start flex-grow text-xl">
                            Leave your comment...
                        </span>
                        <span class="flex gap-3 bg-slate-200 p-1 rounded-lg">
                            <span><svg class="text-gray-400 bg-yellow-200 rounded-full" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-smile-plus"><path d="M22 11v1a10 10 0 1 1-9-10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" x2="9.01" y1="9" y2="9"/><line x1="15" x2="15.01" y1="9" y2="9"/><path d="M16 5h6"/><path d="M19 2v6"/></svg></span>
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
