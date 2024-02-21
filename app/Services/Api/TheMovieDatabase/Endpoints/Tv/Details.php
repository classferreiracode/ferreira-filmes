<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints\Tv;

use App\Services\Api\TheMovieDatabase\Endpoints\BaseEndpoint;
use App\Services\Api\TheMovieDatabase\Entities\Tv\Serie;

class Details extends BaseEndpoint
{
    private int $serieId;
    public function fromSerie(int|Serie $serie)
    {
        $this->serieId = $serie instanceof Serie ? $serie->id : $serie;
        return $this;
    }
    public function get()
    {
        $json[] = $this->service
            ->api
            ->get('/tv/' . $this->serieId . '?append_to_response=credits,external_ids,images,recommendations,similar,keywords&language=pt-BR')
            ->json();

        return $this->transform($json, Serie::class)[0];
    }
}
