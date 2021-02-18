<?php

namespace App\Http\Controllers\Auth;

use App\Services\CoC\Interfaces\ChamberOfCommerceInterface;

class ChamberOfCommerceController
{

    private ChamberOfCommerceInterface $chamber_of_commerce;

    public function __construct(ChamberOfCommerceInterface $chamberOfCommerce)
    {
        $this->chamber_of_commerce = $chamberOfCommerce;
    }

    public function searchCompanies(string $query) : array
    {
        return $this->chamber_of_commerce->searchForCompany($query);
    }
}
