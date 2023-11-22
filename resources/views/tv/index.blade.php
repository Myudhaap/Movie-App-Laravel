@extends('layouts.main')

@section('content')
<div class="">
  <div class="container mx-auto px-4 pt-16">
    <!-- Start Popular Tv -->
    <div class="popular-movies border-b border-gray-800 pb-16">
      <div class="flex justify-between">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Tv</h2>
        <a href="{{route('tv.popular')}}" class="text-orange-500 capitalize hover:border-b-2 hover:border-orange-500 transition-all duration-150">see more...</a>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
        @foreach ($popularTv as $tv)
        <x-tv-card :tv='$tv' />
        @endforeach
      </div>
    </div>
    <!-- End Popular Tv -->

    <!-- Start Now Playing Tv -->
    <div class="popular-movies mt-8">
      <div class="flex justify-between">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">On Airing Tv</h2>
        <a href="{{route('tv.playing')}}" class="text-orange-500 capitalize hover:border-b-2 hover:border-orange-500 transition-all duration-150">see more...</a>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
        @foreach ($onAiringTv as $tv)
        <x-tv-card :tv='$tv' />
        @endforeach
      </div>
    </div>
    <!-- End Now Playing Tv -->
  </div>
</div>
@endsection