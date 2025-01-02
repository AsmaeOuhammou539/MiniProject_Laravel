<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Électronique', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mode', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bijoux', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Maison', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jouets', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Livres', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Immobilier', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Véhicules', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sports', 'created_at' => now(), 'updated_at' => now()],
      
        ]);
    }
}
