<div class="mt-4">
    <a href="{{route('movie.show', $movie['id'])}}">
        <img src="{{$movie['poster_path']}}" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
    </a>
    <div class="mt-2">
        <a href="{{route('movie.show', $movie['id'])}}" class="text-lg mt-2 hover:text-gray-300">{{$movie['title']}}</a>
        <div class="flex items-center text-gray-400 text-sm mt-1">
            <i class="fa-solid fa-star text-orange-500 fill-current w-4"></i>
            <span class="ml-1">star</span>
            <span class="ml-1">{{$movie['vote_average']}}</span>
            <span class="mx-2">|</span>
            <span>{{$movie['release_date']}}</span>
        </div>
        <div class="text-gray-400 text-sm">
            {{$movie['genre_ids']}}
        </div>
    </div>
</div>