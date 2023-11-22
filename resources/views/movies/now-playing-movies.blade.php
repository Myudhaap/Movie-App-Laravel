@extends('layouts.main')

@section('content')
<div class="">
  <div class="container mx-auto px-4 pt-16">
    <!-- Start Popular Movies -->
    <div class="popular-movies border-b border-gray-800 pb-16">
      <div class="flex justify-between">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Now Playing Movies</h2>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
        @foreach ($nowPlayingMovies as $movie)
        <x-movie-card :movie='$movie' />
        @endforeach
      </div>

      <x-pagination-view :pagination='$pagination' :doted=3 />
    </div>
    <!-- End Popular Movies -->
  </div>
</div>
@endsection