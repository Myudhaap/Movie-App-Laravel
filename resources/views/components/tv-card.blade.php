<div class="mt-4 flex flex-col gap-2">
    <a href="{{route('tv.show', $tv['id'])}}">
        <img src="{{$tv['poster_path']}}" alt="tv poster" class="hover:opacity-75 transition ease-in-out duration-150">
    </a>
    <div class="mt-auto">
        <a href="{{route('tv.show', $tv['id'])}}" class="text-lg mt-2 hover:text-gray-300">{{$tv['name']}}</a>
        <div class="flex items-center text-gray-400 text-sm mt-1">
            <i class="fa-solid fa-star text-orange-500 fill-current w-4"></i>
            <span class="ml-1">star</span>
            <span class="ml-1">{{$tv['vote_average']}}</span>
            <span class="mx-2">|</span>
            <span>{{$tv['first_air_date']}}</span>
        </div>
        <div class="text-gray-400 text-sm">
            {{$tv['genre_ids']}}
        </div>
    </div>
</div>