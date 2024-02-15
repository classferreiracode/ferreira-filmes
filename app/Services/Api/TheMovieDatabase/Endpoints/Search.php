<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints;

use App\Services\Api\TheMovieDatabase\Entities\Search as OnSearch;

class Search extends BaseEndpoint
{

    private string $query;

    public function fromSearch(string|OnSearch $query)
    {
        $this->query = $query instanceof OnSearch ? $query->id : $query;
        return $this;
    }
    public function get()
    {
        return $this->transform(
            $this->service
                ->api
                ->get('search/movie?query=' . $this->query . '&language=pt-BR&include_adult=false')
                ->json('results'),
            OnSearch::class
        );
    }
}
