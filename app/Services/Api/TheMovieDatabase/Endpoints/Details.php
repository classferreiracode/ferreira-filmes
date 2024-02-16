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
        $json[] = $this->service
            ->api
            ->get('/movie/' . $this->movieId . '?append_to_response=credits,videos,images&language=pt-BR')
            ->json();

        $result = $this->transform($json, Movie::class)[0];

        return $result;
    }
}
