<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use PDO;
use Tests\TestCase;

class ActorsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testActorsView()
    {
        Http::fake([
            'https://api.themoviedb.org/3/person/popular?page=1' => $this->fakePopularActors()
        ]);

        $response = $this->get(route('actors.index'));

        $response->assertSuccessful();
        $response->assertSee('Fake Name');
        $response->assertSee('Fake Title');
    }

    public function testActorView()
    {
        Http::fake([
            'https://api.themoviedb.org/3/person/12345' => $this->fakeActor(),
            'https://api.themoviedb.org/3/person/12345/external_ids' => $this->fakeSocial(),
            'https://api.themoviedb.org/3/person/12345/combined_credits' => $this->fakeCredits(),
        ]);

        $response = $this->get(route('actors.show', '12345'));

        $response->assertSuccessful();
        $response->assertSee('Fake Name');
        $response->assertSee('Fake Actor');
        $response->assertSee('https://facebook.com/Fake');
        $response->assertSee('https://instagram.com/Fake');
        $response->assertSee('https://twitter.com/Fake');
    }

    public function fakePopularActors()
    {
        return Http::response([
            'results' => [
                [
                    "adult" => false,
                    "gender" => 1,
                    "id" => 3194176,
                    "known_for_department" => "Acting",
                    "name" => "Fake Name",
                    "original_name" => "Fake Name",
                    "popularity" => 219.142,
                    "profile_path" => "/7vrTWF8PxQogF6o9ORZprYQoDOr.jpg",
                    "known_for" => [
                        [
                            "adult" => false,
                            "backdrop_path" => "/27bkw4o1zhjQAM4WIFQPohiph1X.jpg",
                            "id" => 931599,
                            "title" => "Fake Title",
                            "original_language" => "tl",
                            "original_title" => "Fake Title",
                            "overview" => "Take a peek at the life of an unhappy housewife who finds passionate love from her neighbor and how their affair brings them closer to fire.",
                            "poster_path" => "/9grG4PVppBWqKs2hrKMEr6j3RWS.jpg",
                            "media_type" => "movie",
                            "genre_ids" => [
                                [
                                    18
                                ]
                            ],
                            "popularity" => 25.396,
                            "release_date" => "2022-01-28",
                            "video" => false,
                            "vote_average" => 6.0,
                            "vote_count" => 27
                        ]
                    ]
                ]
            ]
        ]);
    }

    public function fakeActor()
    {
        return Http::response([
            "adult" => false,
            "also_known_as" => [
                'Fake'
            ],
            "biography" => "Fake Actor is an actress, born in Mandaluyong City, Philippines to a Korean father and a Filipino mother. She is a Viva Artists Agency talent but she has prev ▶",
            "birthday" => "2001-08-03",
            "deathday" => null,
            "gender" => 1,
            "homepage" => null,
            "id" => 3194176,
            "imdb_id" => "nm13112435",
            "known_for_department" => "Acting",
            "name" => "Fake Name",
            "place_of_birth" => "Mandaluyong City, Philippines",
            "popularity" => 219.142,
            "profile_path" => "/7vrTWF8PxQogF6o9ORZprYQoDOr.jpg",
        ]);
    }

    public function fakeSocial()
    {
        return Http::response([
            "id" => 3194176,
            "freebase_mid" => null,
            "freebase_id" => null,
            "imdb_id" => "nm13112435",
            "tvrage_id" => null,
            "wikidata_id" => null,
            "facebook_id" => "Fake",
            "instagram_id" => "Fake",
            "tiktok_id" => "Fake",
            "twitter_id" => "Fake",
            "youtube_id" => null,
        ]);
    }

    public function fakeCredits()
    {
        return Http::response([
            "adult" => false,
            "backdrop_path" => "/wHTPvnm4mgNwnpyDb7R0mCfwa9R.jpg",
            "genre_ids" => [
                18
            ],
            "id" => 873492,
            "original_language" => "tl",
            "original_title" => "Fake Credits",
            "overview" => "Alexa witnesses a simple mahjong night turned bloody when all the player's dark secrets are discovered - including Alexa's illicit affair with her stepfather.",
            "popularity" => 24.138,
            "poster_path" => "/bOWuycAHVWoAXy6gFPVoPbdtYGM.jpg",
            "release_date" => "2021-11-12",
            "title" => "Fake Credits",
            "video" => false,
            "vote_average" => 6.1,
            "vote_count" => 7,
            "character" => "Fake Character",
            "credit_id" => "613e0a899653f60043ea5e8b",
            "order" => 0,
            "media_type" => "movie"
        ]);
    }
}
