<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints;

use App\Services\Api\TheMovieDatabase\Entities\Movie;

class Details extends BaseEndpoint
{
    private int $movieId;

    public function fromMovie(int|Movie $movie)
    {
        $this->movieId = $movie instanceof Movie ? $movie->id : $movie;
        return $this;
    }

    public function get(): mixed
    {
        $return = $this->service
            ->api
            ->get('/movie/' . $this->movieId . '?language=pt-BR')
            ->json();

        return $return;
    }
}
