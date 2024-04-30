<?php
namespace App\Services\Api\TheMovieDatabase\Endpoints\Movie;

use App\Services\Api\TheMovieDatabase\Endpoints\BaseEndpoint;
use App\Services\Api\TheMovieDatabase\Entities\Movie\GenreList;

class MovieGenreList extends BaseEndpoint
{
    public function get()
    {
        return $this->transform(
            $this->service
                ->api
                ->get('/genre/movie/list?language=pt-BR')
                ->json('genres'),
            GenreList::class
        );
    }
}
