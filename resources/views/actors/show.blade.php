@extends('layouts.main')

@section('content')
<div class="movie-info border-b border-gray-800">
  <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
    <div class="flex-none">
      <img src="{{$actor['profile_path']}}" alt="profile image" class="w-64 md:w-96">
      <u class="flex items-center mt-4 gap-6">
        @if ($social['facebook'])
        <li class="list-none">
          <a target="_blank" href="{{$social['facebook']}}" title="Facebook"><i class="fa-brands fa-square-facebook"></i></a>
        </li>
        @endif
        @if ($social['instagram'])
        <li class="list-none">
          <a target="_blank" href="{{$social['instagram']}}" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
        </li>
        @endif
        @if ($social['twitter'])
        <li class="list-none">
          <a target="_blank" href="{{$social['twitter']}}" title="Twitter"><i class="fa-brands fa-twitter"></i></a>
        </li>
        @endif
        @if ($actor['homepage'])
        <li class="list-none">
          <a target="_blank" href="{{$actor['homepage']}}" title="Website"><i class="fa-solid fa-globe"></i></a>
        </li>
        @endif
      </u>
    </div>
    <div class="md:ml-24 sm:mt-2">
      <h2 class="text-4xl font-semibold">{{$actor['name']}}</h2>
      <div class="mt-2">
        <div class="flex flex-wrap items-center text-gray-400 text-sm">
          <i class="fa-solid fa-cake-candles text-orange-500 fill-current w-4"></i>
          <span class="ml-1">{{$actor['birthdate']}}</span>
        </div>
        <p class="text-gray-300 mt-8">{{$actor['biography']}}</p>

        <h4 class="font-semibold mt-12">Known For</h4>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
          @foreach ($knownForMovies as $movie)
          <div class="mt-4">
            <a href="{{$movie['link_to_page']}}"><img src="{{$movie['poster_path']}}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150"></a>
            <a href="{{$movie['link_to_page']}}" class="text-sm leading-normal block text-gray-400 hover:text-white mt-1">{{$movie['title']}}</a>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

<!-- start creits -->
<div class="movie-credits border-b border-gray-800">
  <div class="container mx-auto px-4 py-16">
    <h2 class="text-4xl font-semibold">Credits</h2>
    <ul class="list-disc leading-loose pl-5 mt-8">
      @foreach ($credits as $credit)
      <li>{{$credit['release_year']}} &middot; <strong>{{$credit['title']}}</strong> as {{$credit['character']}}</li>
      @endforeach
    </ul>
  </div>
</div>
<!-- end credits -->


@endsection