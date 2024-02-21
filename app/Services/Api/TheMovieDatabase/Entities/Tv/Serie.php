<?php

namespace App\Services\Api\TheMovieDatabase\Entities\Tv;

class Serie
{
    public int $id;
    public ?array $external_ids;
    public ?string $title;
    public ?string $release_date;
    public ?float $vote_average;
    public ?string $overview;
    public ?array $genres;
    public ?string $backdrop_path;
    public ?string $poster_path;
    public ?array $credits;
    public ?array $videos;
    public ?array $recommendations;
    public ?array $similar;
    public ?array $keywords;

    public function __construct(mixed $data)
    {
        $this->id               = data_get($data, 'id');
        $this->external_ids          = data_get($data, 'external_ids');
        $this->title            = data_get($data, 'name');
        $this->release_date     = substr(data_get($data, 'first_air_date'), 0, 4);
        $this->overview         = data_get($data, 'overview');
        $this->vote_average     = data_get($data, 'vote_average');
        $this->genres           = collect(data_get($data, 'genres'))->pluck('name')->toArray();
        $this->backdrop_path    = 'https://image.tmdb.org/t/p/original' . data_get($data, 'backdrop_path');
        $this->poster_path      = 'https://image.tmdb.org/t/p/w300_and_h450_bestv2' . data_get($data, 'poster_path');
        $this->credits          = data_get($data, 'credits');
        $this->videos           = data_get($data, 'videos');
        $this->recommendations  = data_get($data, 'recommendations');
        $this->similar          = data_get($data, 'similar');
        $this->keywords         = data_get($data, 'keywords');
    }
}
