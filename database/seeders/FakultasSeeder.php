<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use App\Models\Prodi;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fakultasData = [
            [
                'name' => 'Fakultas Teknik',
                'code' => 'FT',
               
            ],
            [
                'name' => 'Fakultas Ekonomi',
                'code' => 'FE',
                
            ],
        ];

        // Create the 'Tidak Ada' Fakultas and Prodi
        $fakultasTidakAda = Fakultas::create([
            'name' => 'Tidak Ada',
            'code' => '0',
        ]);

     
        // Retrieve roles
        $fakultasRole = Role::where('slug', 'fakultas')->first();

        foreach ($fakultasData as $fakultas) {
            $newFakultas = Fakultas::create([
                'name' => $fakultas['name'],
                'code' => $fakultas['code'],
            ]);

            // Create a user with Fakultas role
            User::create([
                'name' => $fakultas['name'],
                'email' => strtolower($fakultas['code']) . '@gmail.com',
                'password' => bcrypt($fakultas['name']),
                'role_id' => $fakultasRole->id,
                'fakultas_id' => $newFakultas->id,
            ]);

        }
    }
}
