<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints\Movie;

use App\Services\Api\TheMovieDatabase\Endpoints\BaseEndpoint;
use App\Services\Api\TheMovieDatabase\Entities\Movie\Discover;

class Discovery extends BaseEndpoint
{
    private int $genreId;
    private int $year;
    private string $order;

    public function fromGenre(int $genreId)
    {
        $this->genreId = $genreId;
        return $this;
    }
    public function fromYear(int $year)
    {
        $this->year = $year;
        return $this;
    }
    public function fromOrder(string $order)
    {
        $this->order = $order;
        return $this;
    }
    public function get()
    {
        return $this->transform(
            $this->service
                ->api
                ->get('/discover/movie?include_adult=false&language=pt-BR&sort_by=popularity.desc&with_genres=' . $this->genreId)
                ->json('results'),
            Discover::class
        );
    }

}
