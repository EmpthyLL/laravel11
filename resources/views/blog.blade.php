<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <a href="{{ url('/blog') }}" class="lg:hidden flex justify-start  mb-3 pl-8 text-lg text-blue-600 hover:underline items-center gap-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-arrow-out-up-left"><path d="M13 3h6a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-6"/><path d="m3 3 9 9"/><path d="M3 9V3h6"/></svg><span>See more blogs</span></a>
            <div class="bg-gray-100 shadow-lg">
                <div class="flex rounded-lg   py-8 px-10 flex-col c2:flex-row items-start gap-6">
                    <div class="text-justify c1:min-w-[530px] c2:min-w-[300px]">
                        {!! Str::replace("\n", "<br>", $blog['body']) !!}
                    </div>
                    <img src="{{ asset('img/mikir ' . (($blog['blog_id'] - 1) % 24 + 12) . '.jpg') }}"  
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
            </div>
            <a href="{{ url('/blog') }}" class="lg:flex hidden justify-start mt-3 pl-8 text-lg text-blue-600 hover:underline items-center gap-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-arrow-out-up-left"><path d="M13 3h6a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-6"/><path d="m3 3 9 9"/><path d="M3 9V3h6"/></svg><span>See more blogs</span></a>
        </div>
    </main>
</x-layout>
