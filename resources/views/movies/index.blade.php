@extends('layouts.main')

@section('content')
<div class="">
  <div class="container mx-auto px-4 pt-16">
    <!-- Start Popular Movies -->
    <div class="popular-movies border-b border-gray-800 pb-16">
      <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Movies</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
        @foreach ($popularMovies as $movie)
        <x-movie-card :movie='$movie' />
        @endforeach
      </div>
    </div>
    <!-- End Popular Movies -->

    <!-- Start Now Playing Movies -->
    <div class="popular-movies mt-8">
      <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Now Playing</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
        @foreach ($nowPlayingMovies as $movie)
        <x-movie-card :movie='$movie' />
        @endforeach
      </div>
    </div>
    <!-- End Now Playing Movies -->
  </div>
</div>
@endsection