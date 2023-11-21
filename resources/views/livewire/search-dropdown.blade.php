<div class="relative mt-3 md:mt-0" x-data="{isOpen: true}" @click.away="isOpen = false">
    <input wire:model.live.debounce.500ms="search" type="text" class="bg-gray-800 rounded-full w-64 p-4 pl-8 py-1 focus:outline-gray-900 text-sm" placeholder="Search" x-ref="search" @keydown.window="
    if(event.keyCode === 191){
        event.preventDefault();
        $refs.search.focus();
    }" @focus="isOpen = true" @keydown.escape.window="isOpen = false" @keydown.shift.tab="isOpen = false" @keydown="isOpen = true">
    <div class="absolute top-0">
        <i class="fa-solid fa-search text-gray-300 fill-current w-4 mt-2 ml-2"></i>
    </div>
    <div wire:loading class="absolute top-0 h-1/2 aspect-square rounded-full mt-2 right-2 animate-spin border-t-2 border-white"></div>

    @if (strlen($search) >= 2)
    <div class="z-50 absolute bg-gray-800  text-sm rounded w-64 mt-4" x-show.transition.opacity="isOpen">
        @if ($searchResults->count() > 0)
        <ul>
            @foreach ($searchResults as $result)
            <li class="border-b border-gray-700">
                <a href="{{route('movie.show',$result['id'])}}" class=" hover:bg-gray-700 px-3 py-3 flex items-center gap-2" @if($loop->last)@keydown.tab="isOpen = false" @endif>
                    @if ($result['poster_path'])
                    <img src="https://image.tmdb.org/t/p/w92{{$result['poster_path']}}" class="w-8" alt="poster">
                    @else
                    <img src="https://placehold.co/200" alt="poster" class="w-8">
                    @endif
                    <span>{{$result['title']}}</span>
                </a>
            </li>
            @endforeach
        </ul>
        @else
        <div class="p-3">No resulrs for "{{$search}}"</div>
        @endif
    </div>
    @endif
</div>