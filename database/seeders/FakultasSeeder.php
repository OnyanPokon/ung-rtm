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
                'prodi' => [
                    ['name' => 'Teknik Sipil', 'jenjang' => 'S1'],
                    ['name' => 'Teknik Elektro', 'jenjang' => 'S1'],
                ],
            ],
            [
                'name' => 'Fakultas Ekonomi',
                'code' => 'FE',
                'prodi' => [
                    ['name' => 'Manajemen', 'jenjang' => 'S1'],
                    ['name' => 'Akuntansi', 'jenjang' => 'S1'],
                ],
            ],
        ];

        // Create the 'Tidak Ada' Fakultas and Prodi
        $fakultasTidakAda = Fakultas::create([
            'name' => 'Tidak Ada',
            'code' => '0',
        ]);

        $prodiTidakAda = Prodi::create([
            'name' => 'Tidak Ada',
            'code' => '0',
            'fakultas_id' => $fakultasTidakAda->id,
        ]);

        // Retrieve roles
        $prodiRole = Role::where('slug', 'prodi')->first();
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
                'prodi_id' => $prodiTidakAda->id,
            ]);

            foreach ($fakultas['prodi'] as $prodi) {
                $newProdi = Prodi::create([
                    'name' => $prodi['jenjang'] . '-' . $prodi['name'],
                    'code' => Str::slug($prodi['jenjang'] . '-' . $prodi['name']),
                    'fakultas_id' => $newFakultas->id,
                ]);

                // Create a user with Prodi role
                User::create([
                    'name' => $prodi['jenjang'] . '-' . $prodi['name'],
                    'email' => strtolower($prodi['jenjang'] . '-' . $prodi['name']) . '@gmail.com',
                    'password' => bcrypt($prodi['jenjang'] . '-' . $prodi['name']),
                    'role_id' => $prodiRole->id,
                    'fakultas_id' => $fakultasTidakAda->id,
                    'prodi_id' => $newProdi->id,
                ]);
            }
        }
    }
}
