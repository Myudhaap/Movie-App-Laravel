<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movie App</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.2/dist/cdn.min.js"></script>
  @vite('resources/css/app.css')
  @livewireStyles

</head>

<body class="font-sans bg-gray-900 text-white pb-12">
  <nav class="border border-gray-800">
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">
      <ul class="flex flex-col md:flex-row items-center">
        <li><a href="{{route('movies.index')}}" class="font-bold text-2xl">Mayutama<span class="font-light">.Movie</span></a></li>
        <li class="md:ml-16 mt-3 md:mt-0">
          <a href="{{route('movies.index')}}" class="hover:text-gray-300">Movies</a>
        </li>
        <li class="md:ml-6 mt-3 md:mt-0">
          <a href="{{route('tv.index')}}" class="hover:text-gray-300">TV Shows</a>
        </li>
        <li class="md:ml-6 mt-3 md:mt-0">
          <a href="{{route('actors.index')}}" class="hover:text-gray-300">Actors</a>
        </li>
      </ul>
      <div class="flex flex-col md:flex-row items-center">
        <livewire:search-dropdown>
          <div class="md:ml-4 mt-3 md:mt-0">
            <a href="">
              <img src="https://placehold.co/400" alt="avatar" class="rounded-full w-8 aspect-square">
            </a>
          </div>
      </div>
    </div>
  </nav>
  @yield('content')
  @livewireScripts
  @yield('scripts')
</body>

</html>