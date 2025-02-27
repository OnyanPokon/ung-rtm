<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AmiService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('api.base_url');
    }

    public function getAllFaculty()
    {
        $response = Http::get($this->baseUrl . 'fakultas');

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }

    public function getAllDepartement()
    {
        $response = Http::get($this->baseUrl . 'departements');

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }

    // public function getAllPeriode()
    // {
    //     $response = Http::get($this->baseUrl . 'periodes');

    //     if ($response->successful()) {
    //         return $response->json();
    //     }
    //     return null;  
    // }

    // public function getAllProdi()
    // {
    //     $response = Http::get($this->baseUrl . 'prodi');

    //     if ($response->successful()) {
    //         return $response->json();
    //     }
    //     return null;  
    // }
}
