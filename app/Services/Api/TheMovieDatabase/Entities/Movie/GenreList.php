<?php
namespace App\Services\Api\TheMovieDatabase\Entities\Movie;

class GenreList
{
    public int $id;
    public string $name;

    public function __construct(mixed $data)
    {
        $this->id = data_get($data, 'id');
        $this->name = data_get($data, 'name');
    }
}
