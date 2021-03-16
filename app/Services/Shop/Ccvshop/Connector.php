<?php


namespace App\Services\Shop\Ccvshop;

use Illuminate\Support\Facades\Http;
use Auth;

class Connector
{
    private string $versionUri;
    private string $method;
    private string $timestamp;
    private string $domain;


    public function __construct()
    {
        $this->versionUri = config('services.ccvshop.versionUri');
        $this->timestamp = date('c');
    }


    public function setMethod(string $type) : self
    {
        $this->method = $type;
        return $this;
    }

    public function setDomain(string $domain) : self
    {
        $this->domain = $domain;
        return $this;
    }

    protected function get(string $parameter, ?string $query = null)
    {
        $this->setMethod('GET');
        $this->setDomain($this->getUserDetail('domain'));

        $hash = $this->getHash($parameter, $query);

        return Http::withHeaders(
            [
                'x-date' => $this->timestamp,
                'x-hash' => $hash,
                'x-public' => $this->getUserDetail()
            ]
        )->get($this->domain . $this->versionUri . $parameter . $query);
    }

    protected function post(string $parameter, Array $data)
    {
        $this->setMethod('POST');
        $this->setDomain($this->getUserDetail('domain'));

        $hash = $this->getHash($parameter);

        return Http::withHeaders(
            [
                'x-date' => $this->timestamp,
                'x-hash' => $hash,
                'x-public' => $this->getUserDetail()
            ]
        )->post($this->domain . $this->versionUri . $parameter, $data);
    }


    private function getUserDetail($key = 'public_key')
    {
        return Auth::user()->company->$key;
    }

    private function getHash(string $parameter, ?string $query = null){
        $uri = $this->versionUri . $parameter . $query;
        return hash_hmac('sha512', $this->getUserDetail()."|$this->method|".$uri."|".null."|".$this->timestamp, $this->getUserDetail('private_key'));
    }

}
