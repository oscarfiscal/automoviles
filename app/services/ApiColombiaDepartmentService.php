<?php

namespace App\services;

use Illuminate\Support\Facades\Http;

class ApiColombiaDepartmentService
{
    /**
     * Create a new class instance.
     */

    public function getDepartments(): array
    {
        try {
            $url = env("API_DEPARTAMENT" );
            $response = Http::get($url);
            return $response->json();
        } catch (\Exception $e) {
            throw new \Exception("Error al obtener los departamentos: " . $e->getMessage());
        }
    }
}
