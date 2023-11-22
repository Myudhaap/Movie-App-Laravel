<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TvsViewModel extends ViewModel
{
    public $popularTv;
    public $onAiringTv;
    public $genresTv;

    public function __construct($popularTv, $onAiringTv, $genresTv)
    {
        $this->popularTv = $popularTv;
        $this->onAiringTv = $onAiringTv;
        $this->genresTv = $genresTv;
    }

    public function popularTv()
    {
        return empty($this->popularTv) ? '' : $this->formatTv($this->popularTv);
    }

    public function onAiringTv()
    {
        return empty($this->onAiringTv) ? '' : $this->formatTv($this->onAiringTv);
    }

    public function pagination()
    {
        return collect(empty($this->popularTv) ? $this->onAiringTv : $this->popularTv)->merge([
            'total_pages' => 500
        ])->only([
            'page', 'total_pages'
        ]);
    }

    private function formatTv($tvs)
    {
        return collect($tvs['results'])->map(function ($tv) {
            $genresFormatted = collect($tv['genre_ids'])->mapWithKeys(function ($value) {
                return [$value => $this->genres()->get($value)];
            })->flatten()->implode(', ');

            return collect($tv)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/' . $tv['poster_path'],
                'vote_average' => $tv['vote_average'] * 10 . '%',
                'genre_ids' => $genresFormatted,
                'first_air_date' => Carbon::parse($tv['first_air_date'])->format('M d, Y')
            ]);
        });
    }

    private function genres()
    {
        return collect($this->genresTv)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }
}
