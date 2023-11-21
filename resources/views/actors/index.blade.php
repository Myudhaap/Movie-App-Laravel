@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 pt-16">
  <!-- Start Popular Actors -->
  <div class="popular-actors">
    <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Actors</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
      @foreach ($popularActors as $actor)
      <x-actor-card :actor=$actor />
      @endforeach
    </div>
  </div>
  <!-- End Popular Actors -->

  <!-- <div class="flex justify-between mt-16">
    @if ($previousPage)
    <a href="/actors/page/{{$previousPage}}">Previous</a>
    @else
    <div></div>
    @endif

    @if ($nextPage)
    <a href="/actors/page/{{$nextPage}}">Next</a>
    @else
    <div></div>
    @endif
  </div> -->

  <div class="page-load-status">
    <div class="flex justify-center mt-8">
      <div class="infinite-scroll-request h-8 border-t-2 border-white animate-spin rounded-full aspect-square">&nbsp;</div>
    </div>
    <p class="infinite-scroll-last">End of content</p>
    <p class="infinite-scroll-error">Error</p>
  </div>
</div>
@endsection

@section('scripts')
<script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>

<script>
  let elem = document.querySelector('.grid');
  let infScroll = new InfiniteScroll(elem, {
    // options
    path: './actors/page/@{{#}}',
    append: '.actor',
    // history: false,
    status: '.page-load-status'
  });
</script>

@endsection