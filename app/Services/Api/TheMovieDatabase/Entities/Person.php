<?php

namespace App\Services\Api\TheMovieDatabase\Entities;

class Person
{
    public $id;
    public $name;
    public $profile_path;

    public function __construct(mixed $json)
    {
        $this->id = data_get($json, 'id');
        $this->name = data_get($json, 'name');
        $this->profile_path = 'https://media.themoviedb.org/t/p/w300_and_h300_face' . data_get($json, 'profile_path');
    }
}
