<?php

namespace App\Services\Api\TheMovieDatabase\Entities;

class Popular
{
    public int $id;
    public string $title;
    public string $original_title;
    public string $release_date;
    public string $poster_path;
    public string $backdrop_path;
    public string $overview;
    public float $vote_average;

    public function __construct(mixed $json)
    {
        $this->id = data_get($json, 'id');
        $this->title = data_get($json, 'title');
        $this->original_title = data_get($json, 'original_title');
        $this->release_date = data_get($json, 'release_date');
        $this->poster_path = 'https://media.themoviedb.org/t/p/w300_and_h450_bestv2' . data_get($json, 'poster_path');
        $this->backdrop_path = 'https://media.themoviedb.org/t/p/original' . data_get($json, 'backdrop_path');
        $this->overview = data_get($json, 'overview');
        $this->vote_average = data_get($json, 'vote_average');
    }
}
