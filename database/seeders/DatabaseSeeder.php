<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /* User::factory(15)->create(); */
        $this->call([RoleSeeder::class]);

        User::create([
            "name" => "Carmen Ocotan",
            "email" => "admin@admin.com",
            "password" => Hash::make('admin'),
        ])->assignRole('admin');

        User::create([
            "name" => "Rebeca Mejia",
            "email" => "maestro@maestro.com",
            "password" => Hash::make('maestro'),    
        ])->assignRole('maestro');

        User::create([
            "name" => "Abish Ramos",
            "email" => "alumno@alumno.com",
            "password" => Hash::make('alumno'),   
        ])->assignRole('alumno');


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
