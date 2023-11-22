<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
    public $popularMovies;
    public $nowPlayingMovies;
    public $genres;

    public function __construct($popularMovies, $nowPlayingMovies, $genres)
    {
        $this->popularMovies = $popularMovies;
        $this->nowPlayingMovies = $nowPlayingMovies;
        $this->genres = $genres;
    }

    public function popularMovies()
    {
        return empty($this->popularMovies['results']) ? '' : $this->formatMovies($this->popularMovies['results']);
    }

    public function nowPlayingMovies()
    {
        return empty($this->nowPlayingMovies['results']) ? '' : $this->formatMovies($this->nowPlayingMovies['results']);
    }

    public function genres()
    {
        return collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }

    public function pagination()
    {
        return collect(empty($this->popularMovies) ? $this->nowPlayingMovies : $this->popularMovies)->merge([
            'total_pages' => 500
        ])->only([
            'page', 'total_pages'
        ]);
    }

    private function formatMovies($movies)
    {
        return collect($movies)->map(function ($movie) {
            $genresFormatted = collect($movie['genre_ids'])->mapWithKeys(function ($value) {
                return [$value => $this->genres()->get($value)];
            })->implode(', ');
            return  collect($movie)->merge([
                'poster_path' => "https://image.tmdb.org/t/p/w500" . $movie['poster_path'],
                'vote_average' => $movie['vote_average'] * 10 . "%",
                'release_date' => Carbon::parse($movie['release_date'])->format('M d, Y'),
                'genre_ids' => $genresFormatted
            ]);
        });
    }
}
