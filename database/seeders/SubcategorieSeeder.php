<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subcategories')->insert([
            // Électronique
            ['category_id' => 1, 'name' => 'Téléphones', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'name' => 'Ordinateurs', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'name' => 'Tablettes', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'name' => 'Accessoires', 'created_at' => now(), 'updated_at' => now()],
            
            // mode
            ['category_id' => 2, 'name' => 'Femme', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'name' => 'Homme', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'name' => 'Bébé', 'created_at' => now(), 'updated_at' => now()],
        
            // Bijoux
            ['category_id' => 3, 'name' => 'Femme', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'name' => 'Homme', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'name' => 'Enfant', 'created_at' => now(), 'updated_at' => now()],
            
            // Maison
            ['category_id' => 4, 'name' => 'Meubles', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'name' => 'Électroménager', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'name' => 'Décoration', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'name' => 'Jardin', 'created_at' => now(), 'updated_at' => now()],
            
            // Jouets
            ['category_id' => 5, 'name' => 'Jeux de société', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 5, 'name' => 'Poupées', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 5, 'name' => 'Jeux vidéo', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 5, 'name' => 'Figurines', 'created_at' => now(), 'updated_at' => now()],
            
            // Livres
            ['category_id' => 6, 'name' => 'Romans', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 6, 'name' => 'Bandes dessinées', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 6, 'name' => 'Manuels scolaires', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 6, 'name' => 'Livres pour enfants', 'created_at' => now(), 'updated_at' => now()],
            
            // Immobilier
            ['category_id' => 7, 'name' => 'Appartements', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 7, 'name' => 'Maisons', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 7, 'name' => 'Terrains', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 7, 'name' => 'Bureaux', 'created_at' => now(), 'updated_at' => now()],
            
            // Véhicules
            ['category_id' => 8, 'name' => 'Voitures', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 8, 'name' => 'Motos', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 8, 'name' => 'Vélos', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 8, 'name' => 'Accessoires automobiles', 'created_at' => now(), 'updated_at' => now()],
            
            // Sports
            ['category_id' => 9, 'name' => 'Équipement de fitness', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 9, 'name' => 'Matériel de camping', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 9, 'name' => 'Sports collectifs', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 9, 'name' => 'Accessoires de sport', 'created_at' => now(), 'updated_at' => now()],
        ]);
        
    }
}
