<?php

namespace App\Services\Api\TheMovieDatabase\Entities;

use Illuminate\Support\Facades\Http;

class Movie
{
    public int $id;
    public ?string $imdb_id;
    public string $title;
    public string $release_date;
    public float $vote_average;
    public string $overview;
    public ?array $genres;
    public ?string $backdrop_path;
    public ?string $poster_path;
    public ?array $videos;

    public function __construct(array $data)
    {
        $this->id               = data_get($data, 'id');
        $this->imdb_id          = data_get($data, 'imdb_id');
        $this->title            = data_get($data, 'title');
        $this->release_date     = substr(data_get($data, 'release_date'), 0, 4);
        $this->vote_average     = data_get($data, 'vote_average');
        $this->overview         = data_get($data, 'overview');
        $this->genres           = collect(data_get($data, 'genres'))->pluck('name')->toArray();
        $this->backdrop_path    = 'https://image.tmdb.org/t/p/original' . data_get($data, 'backdrop_path');
        $this->poster_path      = 'https://image.tmdb.org/t/p/w300_and_h450_bestv2' . data_get($data, 'poster_path');
        $this->videos           = $this->setVideos($this->id);
    }

    public function setVideos($id)
    {
        $json = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('TMDB_API_TOKEN'),
            'accept' => 'application/json',
        ])->baseUrl('https://api.themoviedb.org/3')
            ->get('/movie/' . $id . '/videos?language=pt-BR')
            ->json();

        $json = data_get($json, 'results');

        return $json;
    }
}
