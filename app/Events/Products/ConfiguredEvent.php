<?php

namespace App\Events\Products;

use App\Http\Requests\Store\ConfigurationValidator;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ConfiguredEvent
{
    use Dispatchable, SerializesModels;

    public array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

}
