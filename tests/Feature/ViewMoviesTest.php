<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Tests\TestCase;

class ViewMoviesTest extends TestCase
{
    public function testMainPage()
    {
        Http::fake([
            'https://api.themoviedb.org/3/movie/popular' => $this->fakePopularMovies(),
            'https://api.themoviedb.org/3/movie/now_playing' => $this->fakeNowPlayingMovies(),
            'https://api.themoviedb.org/3/genre/movie/list' => $this->fakeGenres(),
        ]);
        $response = $this->get(route('movies.index'));

        $response->assertSuccessful();
        $response->assertSee('Popular Movies');
        $response->assertSee('Fake Movie');
        $response->assertSee('Fake Genre');
        $response->assertSee('Now Playing');
        $response->assertSee('Fake Now Playing Movie');
    }

    public function testShowMovie()
    {
        Http::fake([
            'https://api.themoviedb.org/3/movie/*' => $this->fakeShowMovie()
        ]);

        $response = $this->get(route('movie.show', 12345));
        $response->assertSuccessful();
        $response->assertSee('Fake Movie');
        $response->assertSee('Fake Genre');
        $response->assertSee('Franco Piscopo');
    }

    public function fakePopularMovies()
    {
        return Http::response([
            'results' => [
                [
                    "adult" => false,
                    "backdrop_path" => "/fm6KqXpk3M2HVveHwCrBSSBaO0V.jpg",
                    "genre_ids" => [
                        11,
                    ],
                    "id" => 872585,
                    "original_language" => "en",
                    "original_title" => "Fake Movie",
                    "overview" => "The story of J. Robert Oppenheimer's role in the development of the atomic bomb during World War II.",
                    "popularity" => 2590.24,
                    "poster_path" => "/8Gxv8gSFCU0XGDykEGv7zR1n2ua.jpg",
                    "release_date" => "2023-07-19",
                    "title" => "Fake Movie",
                    "video" => false,
                    "vote_average" => 8.197,
                    "vote_count" => 4634
                ]
            ]
        ], 200);
    }

    public function fakeNowPlayingMovies()
    {
        return Http::response([
            'results' => [
                [
                    "adult" => false,
                    "backdrop_path" => "/fm6KqXpk3M2HVveHwCrBSSBaO0V.jpg",
                    "genre_ids" => [
                        11,
                    ],
                    "id" => 872585,
                    "original_language" => "en",
                    "original_title" => "Fake Now Playing Movie",
                    "overview" => "The story of J. Robert Oppenheimer's role in the development of the atomic bomb during World War II.",
                    "popularity" => 2590.24,
                    "poster_path" => "/8Gxv8gSFCU0XGDykEGv7zR1n2ua.jpg",
                    "release_date" => "2023-07-19",
                    "title" => "Fake Now Playing Movie",
                    "video" => false,
                    "vote_average" => 8.197,
                    "vote_count" => 4634
                ]
            ]
        ], 200);
    }

    public function fakeShowMovie()
    {
        return Http::response([
            "adult" => false,
            "backdrop_path" => "/drfl2eWipiibW3u3Ybx9HQ8VgIn.jpg",
            "belongs_to_collection" => null,
            "budget" => 0,
            "genres" => [
                ['id' => 11],
                ['name' => 'Fake Genre']
            ],
            "homepage" => "",
            "id" => 841742,
            "imdb_id" => "tt10916810",
            "original_language" => "fr",
            "original_title" => "Fake Movie",
            "overview" => "Felix and Martha, the two offspring of legendary serial murderer The Skinner of Mons, grapple with the grotesque legacy bequeathed to them. While Martha works a",
            "popularity" => 703.837,
            "poster_path" => "/eAx5QKnboZpysIg1XBfjhbSgOPF.jpg",
            "production_companies" => [
                [
                    "id" => 78939,
                    "logo_path" => "/zfHyxKXDRK2xQsBAIk2gkYyXPhd.png",
                    "name" => "Les Films du Carré",
                    "origin_country" => "BE"
                ]
            ],
            "production_countries" => [
                [
                    "iso_3166_1" => "BE",
                    "name" => "Belgium"
                ]
            ],
            "release_date" => "2023-09-08",
            "revenue" => 0,
            "runtime" => 100,
            "spoken_languages" => [
                [
                    "english_name" => "French",
                    "iso_639_1" => "fr",
                    "name" => "Français"
                ]
            ],
            "status" => "Released",
            "tagline" => "",
            "title" => "Fake Movie",
            "video" => false,
            "vote_average" => 6.2,
            "vote_count" => 13,
            "credits" => [
                'cast' => [
                    [
                        "adult" => false,
                        "gender" => 0,
                        "id" => 3127137,
                        "known_for_department" => "Acting",
                        "name" => "Eline Schumacher",
                        "original_name" => "Eline Schumacher",
                        "popularity" => 1.134,
                        "profile_path" => "/p3GlJMp704D9occGYUDmBBYmZkm.jpg",
                        "cast_id" => 4,
                        "character" => "",
                        "credit_id" => "60ca6b4e773941006db27733",
                        "order" => 0
                    ]
                ],
                'crew' => [
                    [
                        "adult" => false,
                        "gender" => 0,
                        "id" => 126616,
                        "known_for_department" => "Sound",
                        "name" => "Franco Piscopo",
                        "original_name" => "Franco Piscopo",
                        "popularity" => 0.6,
                        "profile_path" => null,
                        "credit_id" => "655964a822931a00ac657d7e",
                        "department" => "Sound",
                        "job" => "Sound Mixer"
                    ]
                ]
            ],
            "videos" => [
                'results' => [
                    [
                        "iso_639_1" => "en",
                        "iso_3166_1" => "US",
                        "name" => "Megalomaniac | Official Trailer | Horror Brains",
                        "key" => "NNd2Zcp1NNA",
                        "site" => "YouTube",
                        "size" => 1080,
                        "type" => "Trailer",
                        "official" => false,
                        "published_at" => "2022-07-27T07:48:10.000Z",
                        "id" => "62e0ee06a44d0907dc16f669"
                    ]
                ]
            ],
            'images' => [
                'backdrops' => [
                    [
                        "aspect_ratio" => 1.778,
                        "height" => 2160,
                        "iso_639_1" => "fr",
                        "file_path" => "/agJTpYOjSSG9uZe5xVZHL8nE6nj.jpg",
                        "vote_average" => 0.0,
                        "vote_count" => 0,
                        "width" => 3840
                    ]
                ]
            ]
        ], 200);
    }

    public function fakeGenres()
    {
        return Http::response([
            'genres' => [
                [
                    "id" => 11,
                    "name" => "Fake Genre"
                ]
            ]
        ], 200);
    }
}
