<?php


namespace App\Services\Shop\Ccvshop;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Http;

class Connector
{
    private string $publicKey;
    private string $privateKey;
    private string $versionUri;
    private string $domain;
    private string $method;
    private string $timestamp;


    public function __construct()
    {
        $this->publicKey = config('services.ccvshop.public_key');
        $this->privateKey = config('services.ccvshop.secret_key');
        $this->versionUri = config('services.ccvshop.versionUri');
        $this->method = 'GET';
        $this->timestamp = date('c');
    }


    protected function get(string $parameter, ?string $query = null)
    {
        $url = $this->versionUri . $parameter . $query;

        $hash = hash_hmac('sha512', "$this->publicKey|GET|$url||$this->timestamp", $this->privateKey);
        return Http::withHeaders(
            [
                'x-date' => $this->timestamp,
                'x-hash' => $hash,
                'x-public' => $this->publicKey
            ]
        )->get($this->getDomain(\Auth::user()) . $this->versionUri . $parameter . $query);
    }

    private function getDomain(Authenticatable $user)
    {
        return $user->company->domain;
    }

}
