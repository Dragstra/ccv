<?php

namespace App\Events\Products;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ConfiguredEvent
{
    use Dispatchable, SerializesModels;

    public array $data;
    public int $company;

    public function __construct(array $data, int $company)
    {
        $this->data = $data;
        $this->company = $company;
    }

}
