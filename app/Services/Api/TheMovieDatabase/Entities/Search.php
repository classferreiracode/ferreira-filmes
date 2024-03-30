<?php

namespace App\Services\Api\TheMovieDatabase\Entities;

class Search
{
    public int $id;

    public ?string $name;
    public ?string $year;

    public ?string $image;

    public ?string $media_type;

    public function __construct($data)
    {
        $this->id = data_get($data, 'id');
        $this->name = data_get($data, 'name') == '' ? data_get($data, 'title') : data_get($data, 'name');
        $this->year = date('Y', strtotime(data_get($data, 'release_date')));
        $this->image = 'https://image.tmdb.org/t/p/original'.data_get($data, 'poster_path');
        $this->media_type = data_get($data, 'media_type');
    }
}
