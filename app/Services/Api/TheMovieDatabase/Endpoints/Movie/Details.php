<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints\Movie;

use App\Services\Api\TheMovieDatabase\Endpoints\BaseEndpoint;
use App\Services\Api\TheMovieDatabase\Entities\Movie\Movie;

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
            ->get('/movie/'.$this->movieId.'?append_to_response=credits,videos,images,recommendations,similar,keywords&language=pt-BR&api_key='.env('TMDB_API_KEY'))
            ->json();

        return $this->transform($json, Movie::class)[0];
    }
}
