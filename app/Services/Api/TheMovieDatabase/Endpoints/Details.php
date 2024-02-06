<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints;

use Illuminate\Support\Collection;
use App\Services\Api\TheMovieDatabase\Entities\Movie;
use App\Services\Api\TheMovieDatabase\TheMovieDatabaseService;

class Details
{
    private ?int $movieId;
    private TheMovieDatabaseService $service;

    public function __construct()
    {
        $this->service = new TheMovieDatabaseService();
    }

    public function fromMovie(int|Movie $movie)
    {
        $this->movieId = $movie instanceof Movie ? $movie->id : $movie;
        return $this;
    }

    public function get(): mixed
    {
        return $this->service
            ->api
            ->get('/movie/' . $this->movieId . '?language=pt-BR')
            ->json();
    }
}
