<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Atasan;
use App\Models\Kendaraan;
use Illuminate\Database\Seeder;

use function PHPSTORM_META\map;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Admin
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        // Atasan 
        Atasan::create([
            'name' => 'fajar',
            'jabatan' => 'HRD',
            'email' => 'fajar@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);
        Atasan::create([
            'name' => 'fabian',
            'jabatan' => 'CEO',
            'email' => 'fabian@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        Kendaraan::create([
            'mobil' => 'pajero',
            'image' => 'images/M4lWJWW4qfksXm2ponl5x0mbkLJ6lU9QrRek87aV.jpg',
            'konsumsi_bbm' => 3,
            'jadwal_service' => '2023-02-25',
            'jumlah' => 6
        ]);
        Kendaraan::create([
            'mobil' => 'avanza gen z',
            'image' => 'images/v7wneXLFlGuaSkr6X8YRZ8shpwoZhIFc7uYww3r6.jpg',
            'konsumsi_bbm' => 5,
            'jadwal_service' => '2023-02-25',
            'jumlah' => 7
        ]);
    }
}
