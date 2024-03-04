<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints\Person;

use App\Services\Api\TheMovieDatabase\Endpoints\BaseEndpoint;
use App\Services\Api\TheMovieDatabase\Entities\Person\Detail;

class Details extends BaseEndpoint
{
    private int $personId;

    public function fromPerson(int|Detail $person)
    {
        $this->personId = $person instanceof Detail ? $person->id : $person;

        return $this;
    }

    public function get(): mixed
    {
        $json[] = $this->service
            ->api
            ->get('/person/'.$this->personId.'?append_to_response=combined_credits,images&language=pt-BR')
            ->json();

        return $this->transform($json, Detail::class)[0];
    }
}
