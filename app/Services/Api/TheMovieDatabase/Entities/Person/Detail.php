<?php

namespace App\Services\Api\TheMovieDatabase\Entities\Person;

use Carbon\Carbon;

class Detail
{
    public int $id;

    public ?string $name;

    public ?string $profile_path;

    public ?string $biography;

    public ?string $birthday;

    public ?string $deathday;

    public ?string $place_of_birth;

    public array $combined_credits;

    public function __construct(mixed $json)
    {
        $this->id = data_get($json, 'id');
        $this->name = data_get($json, 'name');
        $this->profile_path = data_get($json, 'profile_path') === null ? 'https://placehold.co/300x450?text=No+image' : 'https://media.themoviedb.org/t/p/original'.data_get($json, 'profile_path');
        $this->biography = data_get($json, 'biography');
        $this->birthday = Carbon::parse(data_get($json, 'birthday'))->format('d/m/Y');
        $this->deathday = data_get($json, 'deathday') != null ? Carbon::parse(data_get($json, 'deathday'))->format('d/m/Y') : '';
        $this->place_of_birth = data_get($json, 'place_of_birth');
        $this->combined_credits = data_get($json, 'combined_credits.cast');
    }
}
