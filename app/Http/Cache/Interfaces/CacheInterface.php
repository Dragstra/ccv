<?php


namespace App\Http\Cache\Interfaces;

interface CacheInterface
{
    public function getOrSet($key, $data);
    public function remove($key);
}
