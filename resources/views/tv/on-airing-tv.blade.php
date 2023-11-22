@extends('layouts.main')

@section('content')
<div class="">
  <div class="container mx-auto px-4 pt-16">

    <!-- Start Now Playing Tv -->
    <div class="popular-movies mt-8">
      <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">On Airing Today</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
        @foreach ($onAiringTv as $tv)
        <x-tv-card :tv='$tv' />
        @endforeach
      </div>
      <x-pagination-view :pagination='$pagination' :doted=3 />
    </div>
    <!-- End Now Playing Tv -->
  </div>
</div>
@endsection