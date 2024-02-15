<?php
namespace App\Services\Api\ViaCep;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\PendingRequest;
use App\Services\Api\ViaCep\Endpoints\HasCep;

class ViaCepService
{
    use HasCep;
    public PendingRequest $api;
    public function __construct()
    {
        $this->api = Http::baseUrl('http://viacep.com.br/ws/');
    }
}
