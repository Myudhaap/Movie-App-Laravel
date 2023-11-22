<?php

namespace App\Http\Controllers;

use App\ViewModels\TvsViewModel;
use App\ViewModels\TvViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TvController extends Controller
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
        $popularTv = Http::withToken(config('services.tmdb.token'))
            ->get($this->apiUri . 'tv/popular')->json();

        $onAiringTv = Http::withToken(config('services.tmdb.token'))
            ->get($this->apiUri . 'tv/airing_today')->json();

        $genresTv = Http::withToken(config('services.tmdb.token'))
            ->get($this->apiUri . 'genre/tv/list')->json()['genres'];

        $viewModel = new TvsViewModel($popularTv, $onAiringTv, $genresTv);

        return view('tv.index', $viewModel);
    }

    public function indexPopularTvs(Request $request)
    {
        $page = empty($request->query('page')) ? 1 : $request->query('page');
        $popularTv = Http::withToken(config('services.tmdb.token'))
            ->get($this->apiUri . 'tv/popular?page=' . $page)->json();

        $genresTv = Http::withToken(config('services.tmdb.token'))
            ->get($this->apiUri . 'genre/tv/list')->json()['genres'];

        $viewModel = new TvsViewModel($popularTv, null, $genresTv);

        return view('tv.popular-tv', $viewModel);
    }

    public function indexOnAiringTvs(Request $request)
    {
        $page = empty($request->query('page')) ? 1 : $request->query('page');
        $onAiringTv = Http::withToken(config('services.tmdb.token'))
            ->get($this->apiUri . 'tv/airing_today?page=' . $page)->json();

        $genresTv = Http::withToken(config('services.tmdb.token'))
            ->get($this->apiUri . 'genre/tv/list')->json()['genres'];

        $viewModel = new TvsViewModel(null, $onAiringTv, $genresTv);

        return view('tv.on-airing-tv', $viewModel);
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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tv = Http::withToken(config('services.tmdb.token'))
            ->get($this->apiUri . 'tv/' . $id . '?append_to_response=credits,videos,images')->json();

        $viewModel = new TvViewModel($tv);
        return view('tv.show', $viewModel);
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
