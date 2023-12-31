<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Welcome back!") }}
                </div>
            </div>
            @if($chart)
            <div class="my-5 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-3xl p-6 text-gray-900 dark:text-gray-100">
                    <a href="/playlists/{{$chart->id}}" class="my-5 block max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$chart->name}}</h3>
                        <h5 class="font-normal text-sm text-gray-700 dark:text-gray-400">Click to listen!</h5>
                    </a>
                </div>
            </div>
            @endif
            <div class="my-5 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-3xl p-6 text-gray-900 dark:text-gray-100">
                {{ __("Top Most Streamed") }} 
                </div>
                <div class="mx-4 h-full flex flex-row justify-start items-center overflow-x-scroll gap-4">
                    @foreach($popularChart as $i)
                        <div
                        class="w-[200px] my-4 block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                    
                        @if ($i->thumbnail_path)
                            <img src="{{ asset('storage/thumbnails/' . $i->thumbnail_path) }}" class="rounded-t-lg" alt="Thumbnail not uploaded">
                        @else
                            <img src="{{ asset('default_thumbnail.jpeg') }}" class="rounded-t-lg">
                        @endif
                        <div class="p-6">
                            <h5
                            class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50 truncate">
                            {{ $loop->index + 1 }}. {{ $i->title }}
                            </h5>
                            <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200 truncate">
                                {{ $i->artist->name }}, {{ $i->release_date }}
                            </p>
                            <h6 class="mt-4 mb-4 text-base text-neutral-600 dark:text-neutral-200">{{ $i->streams }} streams</h6>
                            <a href="/songs/{{ $i->id }}" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                                Listen
                            </a> 
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="my-5 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-3xl p-6 text-gray-900 dark:text-gray-100">
                    {{ __("New Releases") }} 
                </div>
                <div class="mx-4 h-full flex flex-row justify-start items-center overflow-x-scroll gap-4">
                    @foreach($newSongs as $i)
                        <div
                        class="w-[200px] my-4 block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                    
                        @if ($i->thumbnail_path)
                            <img src="{{ asset('storage/thumbnails/' . $i->thumbnail_path) }}" class="rounded-t-lg" alt="Thumbnail not uploaded">
                        @else
                            <img src="{{ asset('default_thumbnail.jpeg') }}" class="rounded-t-lg">
                        @endif
                        <div class="p-6">
                            <h5
                            class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50 truncate">
                            {{ $i->title }}
                            </h5>
                            <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200 truncate">
                                {{ $i->artist->name }}, {{ $i->release_date }}
                            </p>
                            <a href="/songs/{{ $i->id }}" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                                Listen
                            </a> 
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @if($randomPlaylist)
            <div class="my-5 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-3xl p-6 text-gray-900 dark:text-gray-100">
                    {{ $randomPlaylist->name }}
                </div>
                <div class="mx-4 h-full flex flex-row justify-start items-center overflow-x-scroll gap-4">
                    @foreach($randomPlaylist->songs as $i)
                        <div
                        class="w-[200px] my-4 block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                    
                        @if ($i->thumbnail_path)
                            <img src="{{ asset('storage/thumbnails/' . $i->thumbnail_path) }}" class=" rounded-t-lg" alt="Thumbnail not uploaded">
                        @else
                            <img src="{{ asset('default_thumbnail.jpeg') }}" class=" rounded-t-lg">
                        @endif
                        <div class="p-6">
                            <h5
                            class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50 truncate">
                            {{ $i->title }}
                            </h5>
                            <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200 truncate">
                                {{ $i->artist->name }}, {{ $i->release_date }}
                            </p>
                            <a href="/songs/{{ $i->id }}" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                                Listen
                            </a> 
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
