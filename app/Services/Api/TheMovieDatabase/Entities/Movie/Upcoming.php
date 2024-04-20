<?php

namespace App\Services\Api\TheMovieDatabase\Entities\Movie;

class Upcoming
{
        public int $id;
        public string $title;
        public string $release_date;
        public string $poster_path;
    public function __construct(mixed $data)
    {
        $this->id = data_get($data, 'id');
        $this->title = data_get($data, 'title');
        $this->release_date = substr(data_get($data, 'release_date'), 0, 4);
        $this->poster_path = data_get($data, 'poster_path') === null ? 'https://placehold.co/300x450?text=No+image' : 'https://media.themoviedb.org/t/p/w300_and_h450_bestv2'.data_get($data, 'poster_path');
    }

}
