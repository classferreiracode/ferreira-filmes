<?php
namespace App\Services\Api\TheMovieDatabase\Endpoints\Tv;

use App\Services\Api\TheMovieDatabase\Endpoints\BaseEndpoint;
use App\Services\Api\TheMovieDatabase\Entities\Tv\Credit;

class Credits extends BaseEndpoint
{
    private int $serieId;

    public function fromSerie(int|Credit $serie)
    {
        $this->serieId = $serie instanceof Credit ? $serie->id : $serie;
        return $this;
    }

    public function get()
    {
        $json[] = $this->service
            ->api
            ->get('/tv/' . $this->serieId . '/credits?language=pt-BR')
            ->json();

        return $this->transform($json, Credit::class)[0];
    }

}
