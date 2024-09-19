<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <a href="{{ url('/blog') }}" class="lg:hidden flex justify-start  mb-3 pl-8 text-lg text-blue-600 hover:underline items-center gap-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-arrow-out-up-left"><path d="M13 3h6a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-6"/><path d="m3 3 9 9"/><path d="M3 9V3h6"/></svg><span>See more blogs</span></a>
            <div class="flex bg-gray-100 py-8 px-10 rounded-lg shadow-lg flex-col c2:flex-row items-start c1:items-center gap-6">
                <div class="text-justify c1:min-w-[530px] c2:min-w-[300px]">
                    {!! Str::replace("\n", "<br>", $blog['body']) !!}
                </div>
                <img src="{{ asset('img/mikir ' . ($blog['id'] + 11 > 35 ? ($blog['id'] + 11) % 35 : $blog['id'] + 11) . '.jpg') }}"  
                    alt="Picture" 
                    class="rounded-lg w-full c2:max-w-[400px] h-auto object-cover">
            </div>
            <a href="{{ url('/blog') }}" class="lg:flex hidden justify-start mt-3 pl-8 text-lg text-blue-600 hover:underline items-center gap-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-arrow-out-up-left"><path d="M13 3h6a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-6"/><path d="m3 3 9 9"/><path d="M3 9V3h6"/></svg><span>See more blogs</span></a>
        </div>
    </main>
</x-layout>
