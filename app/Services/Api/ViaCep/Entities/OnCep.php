<?php

namespace App\Services\Api\ViaCep\Entities;

class OnCep
{
    public $cep;

    public $logradouro;

    public $complemento;

    public $bairro;

    public $localidade;

    public $uf;

    public function __construct($json)
    {
        $this->cep = data_get($json, 'cep');
        $this->logradouro = data_get($json, 'logradouro');
        $this->complemento = data_get($json, 'complemento');
        $this->bairro = data_get($json, 'bairro');
        $this->localidade = data_get($json, 'localidade');
        $this->uf = data_get($json, 'uf');
    }
}
