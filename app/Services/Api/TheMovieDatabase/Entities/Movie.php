<?php

namespace App\Services\Api\TheMovieDatabase\Entities;

use Illuminate\Support\Facades\Http;

class Movie
{
    public $id;
    public $imdb_id;
    public $title;
    public $release_date;
    public $vote_average;
    public $overview;
    public $genres;
    public $backdrop_path;
    public $poster_path;

    public function __construct($data)
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
    }
}
