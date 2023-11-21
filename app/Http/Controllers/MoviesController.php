<?php

namespace App\Http\Controllers;

use App\ViewModels\MoviesViewModel;
use App\ViewModels\MovieViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    private $apiUri;

    public function __construct()
    {
        $this->apiUri = "https://api.themoviedb.org/3/";
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $popularMovies = Http::withToken(config('services.tmdb.token'))
            ->get($this->apiUri . 'movie/popular')->json()['results'];

        $nowPlayingMovies = Http::withToken(
            config('services.tmdb.token')
        )
            ->get($this->apiUri . 'movie/now_playing')->json()['results'];

        $genres = Http::withToken(config('services.tmdb.token'))
            ->get($this->apiUri . 'genre/movie/list')->json()['genres'];

        // dump($nowPlayingMovies);
        $viewModel = new MoviesViewModel(
            $popularMovies,
            $nowPlayingMovies,
            $genres
        );

        return view('movies.index', $viewModel);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    // /movie/{movie_id}
    public function show(string $id)
    {
        $movie = Http::withToken(config('services.tmdb.token'))
            ->get($this->apiUri . 'movie/' . $id . '?append_to_response=credits,videos,images')->json();
        // dd($movie);

        $viewModel = new MovieViewModel($movie);

        return view('movies.show', $viewModel);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
