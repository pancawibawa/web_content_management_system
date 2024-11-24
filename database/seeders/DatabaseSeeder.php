<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'admin@example.com',
        //     'password'=>'password'
        // ]);


        Kategori::create([
            'kategori'=>'Alat Olahraga'
        ]);

        Kategori::create([
            'kategori'=>'Alat Musik'
        ]);



    }
}
