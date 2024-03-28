<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints;

use App\Services\Api\TheMovieDatabase\Entities\Search as OnSearch;
use Illuminate\Support\Collection;

class Search extends BaseEndpoint
{
    private string $query;
    private string $type;

    public function fromSearch(string|OnSearch $query): self
    {
        $this->query = $query instanceof OnSearch ? $query->id : $query;

        return $this;
    }

    public function fromType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function get(): Collection
    {
        return $this->transform(
            $this->service
                ->api
                ->get('search/'.$this->type.'?query='.$this->query.'&language=pt-BR')
                ->json('results'),
            OnSearch::class
        );
    }
}
