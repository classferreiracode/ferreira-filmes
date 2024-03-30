<?php

namespace App\Services\Api\ViaCep;

use App\Services\Api\ViaCep\Endpoints\HasCep;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class ViaCepService
{
    use HasCep;

    public PendingRequest $api;

    public function __construct()
    {
        $this->api = Http::baseUrl('http://viacep.com.br/ws/');
    }
}
