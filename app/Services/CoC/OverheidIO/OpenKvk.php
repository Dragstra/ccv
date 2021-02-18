<?php


namespace App\Services\CoC\OverheidIO;


use App\Services\CoC\Interfaces\ChamberOfCommerceInterface;
use Illuminate\Support\Facades\Http;

class OpenKvk implements ChamberOfCommerceInterface
{

    private string $key;

    public function __construct()
    {
        $this->key = config('services.openkvk.key');
        $this->domain = config('services.openkvk.domain');
    }

    public function searchForCompany(string $query)
    {
        return Http::withHeaders(['ovio-api-key' => $this->key])->get(
            $this->domain . 'openkvk?filters[handelsnaam]=' . $query . '&fields[]=handelsnaam'
        )->json();
    }

}
