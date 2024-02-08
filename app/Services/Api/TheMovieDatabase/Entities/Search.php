<?php

namespace App\Services\Api\TheMovieDatabase\Entities;

class Search
{
    public $id;
    public $name;
    public $year;
    public $image;

    public function __construct($data)
    {
        $this->id = data_get($data, 'id');
        $this->name = data_get($data, 'title');
        $this->year = date('Y', strtotime(data_get($data, 'release_date')));
        $this->image = 'https://image.tmdb.org/t/p/original/' . data_get($data, 'poster_path');
    }
}
