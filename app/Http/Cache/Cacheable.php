<?php


namespace App\Http\Cache;


use App\Http\Cache\Interfaces\CacheInterface;
use Illuminate\Support\Facades\Cache;

class Cacheable implements CacheInterface
{
    private $user;

     public function __construct()
     {
         $this->user = auth()->user();
     }

    public function getOrSet($key, $data)
    {
        if(!Cache::get($this->user . $key)){
            Cache::add($this->user . $key, $data, 3600);
            print('No cache');
        }
        return Cache::get($this->user . $key);
    }

    public function remove($key) : bool
    {
        return Cache::forget($this->user . $key);
    }
}
