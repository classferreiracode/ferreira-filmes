<?php
namespace App\Services\Api\TheMovieDatabase\Entities\Movie;

class Credit
{
    public int $id;
    public ?array $cast;
    public ?array $crew;

    public function __construct(array $data)
    {
        $this->id = data_get($data, 'id');
        $this->cast = data_get($data, 'cast');
        $this->crew = data_get($data, 'crew');
    }
}
