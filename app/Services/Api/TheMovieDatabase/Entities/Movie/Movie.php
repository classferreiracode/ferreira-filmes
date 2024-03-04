<?php

namespace App\Services\Api\TheMovieDatabase\Entities\Movie;

class Movie
{
    public int $id;

    public ?string $imdb_id;

    public ?string $title;

    public ?string $release_date;

    public ?float $vote_average;

    public ?string $overview;

    public ?array $genres;

    public ?string $backdrop_path;

    public ?string $poster_path;

    public ?string $runtime;

    public ?array $credits;

    public ?array $videos;

    public ?array $recommendations;

    public ?array $similar;

    public ?array $keywords;

    public ?array $production_companies;

    public function __construct($data)
    {
        $this->id = data_get($data, 'id');
        $this->imdb_id = data_get($data, 'imdb_id');
        $this->title = data_get($data, 'title');
        $this->release_date = substr(data_get($data, 'release_date'), 0, 4);
        $this->vote_average = data_get($data, 'vote_average');
        $this->overview = data_get($data, 'overview');
        $this->genres = collect(data_get($data, 'genres'))->pluck('name')->toArray();
        $this->backdrop_path = 'https://image.tmdb.org/t/p/original'.data_get($data, 'backdrop_path');
        $this->poster_path = 'https://image.tmdb.org/t/p/w300_and_h450_bestv2'.data_get($data, 'poster_path');
        $this->runtime = data_get($data, 'runtime').' min';
        $this->credits = data_get($data, 'credits');
        $this->videos = data_get($data, 'videos');
        $this->recommendations = data_get($data, 'recommendations');
        $this->similar = data_get($data, 'similar');
        $this->keywords = data_get($data, 'keywords');
        $this->production_companies = data_get($data, 'production_companies');
    }
}
