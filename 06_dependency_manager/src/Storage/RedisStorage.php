<?php

namespace Storage;

use Concept\Distinguishable;

class SessionStorage implements Storage
{

    public $client;

    public function __construct()
    {
        $client = new Predis\Client();
    }

    public function store(Distinguishable $distinguishable)
    {
       $this->client->set( $distinguishable->key(), serialize($distinguishable));
    }

    public function loadAll(): array
    {
        $result =[];
        $result= $this->client->keys('*');
        foreach ( $result as $keys) {
            $value  = $this->get($keys);
            $result[] = unserialize($value);
        }
            //wylistowac klucze i dla kazdego klucza zrobic geta
    }
}