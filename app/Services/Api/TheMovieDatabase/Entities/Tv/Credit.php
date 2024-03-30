<?php

namespace App\Services\Api\TheMovieDatabase\Entities\Tv;

class Credit
{
    public $id;

    public $cast;

    public $crew;

    public function __construct($json)
    {
        $this->id = data_get($json, 'id');
        $this->cast = data_get($json, 'cast');
        $this->crew = data_get($json, 'crew');
    }
}
