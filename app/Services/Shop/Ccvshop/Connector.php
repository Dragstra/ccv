<?php


namespace App\Services\Shop\Ccvshop;

use Illuminate\Support\Facades\Http;
use Auth;

class Connector
{
    private string $versionUri;
    private string $method;
    private string $timestamp;


    public function __construct()
    {
        $this->versionUri = config('services.ccvshop.versionUri');
        $this->method = 'GET';
        $this->timestamp = date('c');
    }


    protected function get(string $parameter, ?string $query = null)
    {
        $hash = $this->getHash($parameter, $query);

        return Http::withHeaders(
            [
                'x-date' => $this->timestamp,
                'x-hash' => $hash,
                'x-public' => $this->getUserDetail()
            ]
        )->get($this->getUserDetail('domain') . $this->versionUri . $parameter . $query);
    }


    private function getUserDetail($key = 'public_key')
    {
        return Auth::user()->company->$key;
    }

    private function getHash(string $parameter, ?string $query = null){
        $url = $this->versionUri . $parameter . $query;
        return hash_hmac('sha512', $this->getUserDetail()."|GET|".$url."||".$this->timestamp , $this->getUserDetail('private_key'));
    }

}
