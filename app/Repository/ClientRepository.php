<?php

namespace App\Repository;

use App\Models\Client;

class ClientRepository
{
    /**
     * Create a new class instance.
     */
    public function getRandomClient()
    {
        $randomClient = Client::inRandomOrder()->first();
        return $randomClient;
    }
}
