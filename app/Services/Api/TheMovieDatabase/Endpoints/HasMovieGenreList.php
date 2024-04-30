<?php
namespace App\Services\Api\TheMovieDatabase\Endpoints;

use App\Services\Api\TheMovieDatabase\Endpoints\Movie\MovieGenreList;


trait HasMovieGenreList
{
    public function movieGenreList()
    {
        return new MovieGenreList();
    }
}
