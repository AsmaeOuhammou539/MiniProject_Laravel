<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            // Téléphones (subcategory_id: 1)
            ['user_id' => 1, 'category_id' => 1, 'sub_category_id' => 1, 'name' => 'iPhone 13 Pro', 'description' => 'iPhone 13 Pro 128GB, écran Super Retina XDR', 'price' => 4000.99, 'phone_number' => '0612345678', 'ville' => 'Casablanca', 'image_url' => 'https://i.pinimg.com/736x/a3/c7/6f/a3c76f7a3b1146d8d09bd120339bae37.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'category_id' => 1, 'sub_category_id' => 1, 'name' => 'Samsung Galaxy S21', 'description' => 'Samsung Galaxy S21 5G 128GB, écran Dynamic AMOLED', 'price' => 2000.99, 'phone_number' => '0623456789', 'ville' => 'Rabat', 'image_url' => 'https://i.pinimg.com/736x/b1/4a/67/b14a670e729185cb46ed6605f404f753.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'category_id' => 1, 'sub_category_id' => 1, 'name' => 'Xiaomi Redmi Note 10', 'description' => 'Xiaomi Redmi Note 10 128GB, écran AMOLED', 'price' => 900.99, 'phone_number' => '0634567890', 'ville' => 'Marrakech', 'image_url' => 'https://i.pinimg.com/736x/19/bc/db/19bcdbf64ed580a4f66dc8788e0726e8.jpg', 'created_at' => now(), 'updated_at' => now()],
            
            // Ordinateurs (subcategory_id: 2)
            ['user_id' => 1, 'category_id' => 1, 'sub_category_id' => 2, 'name' => 'MacBook Pro M1', 'description' => 'MacBook Pro 13" avec chip M1, 8GB RAM, 256GB SSD', 'price' => 4299.99, 'phone_number' => '0645678901', 'ville' => 'Casablanca', 'image_url' => 'https://i.pinimg.com/736x/51/1a/74/511a7467333910972ea81166ff40b95d.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'category_id' => 1, 'sub_category_id' => 2, 'name' => 'Dell XPS 15', 'description' => 'Dell XPS 15 FHD, i7, 16GB RAM, 512GB SSD', 'price' => 2400.99, 'phone_number' => '0656789012', 'ville' => 'Rabat', 'image_url' => 'https://i.pinimg.com/736x/96/b8/19/96b819a2057454cd507198c2a60557e3.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'category_id' => 1, 'sub_category_id' => 2, 'name' => 'HP Pavilion', 'description' => 'HP Pavilion 15, i5, 8GB RAM, 256GB SSD', 'price' => 2000.99, 'phone_number' => '0667890123', 'ville' => 'Tanger', 'image_url' => 'https://i.pinimg.com/736x/86/08/19/8608198e7b46b9e933ca7e0d6d0811fd.jpg', 'created_at' => now(), 'updated_at' => now()],
            
            // Tablettes (subcategory_id: 3)
            ['user_id' => 1, 'category_id' => 1, 'sub_category_id' => 3, 'name' => 'iPad Air', 'description' => 'iPad Air 64GB, écran Retina', 'price' => 1000.99, 'phone_number' => '0678901234', 'ville' => 'Casablanca', 'image_url' => 'https://i.pinimg.com/736x/51/1a/74/511a7467333910972ea81166ff40b95d.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'category_id' => 1, 'sub_category_id' => 3, 'name' => 'Samsung Galaxy Tab', 'description' => 'Tablette Samsung Galaxy Tab S7, 128GB', 'price' => 1000.99, 'phone_number' => '0689012345', 'ville' => 'Rabat', 'image_url' => 'https://i.pinimg.com/736x/a1/81/c9/a181c9d8d881bb268b6d4c983d7efd1a.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'category_id' => 1, 'sub_category_id' => 3, 'name' => 'Huawei MatePad', 'description' => 'Huawei MatePad 10.4, 64GB', 'price' => 1100.99, 'phone_number' => '0690123456', 'ville' => 'Marrakech', 'image_url' => 'https://i.pinimg.com/736x/3c/33/a3/3c33a3588d66570bdd624bb0c9de8bb1.jpg', 'created_at' => now(), 'updated_at' => now()],
            
            // Accessoires numériques (subcategory_id: 4)
            ['user_id' => 1, 'category_id' => 1, 'sub_category_id' => 4, 'name' => 'Casque Bluetooth', 'description' => 'Casque sans fil avec réduction de bruit', 'price' => 99.99, 'phone_number' => '0611223344', 'ville' => 'Casablanca', 'image_url' => 'https://i.pinimg.com/474x/3e/b1/2e/3eb12eb3df19f57a73d764272486f453.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'category_id' => 1, 'sub_category_id' => 4, 'name' => 'Souris gaming', 'description' => 'Souris gaming RGB 16000DPI', 'price' => 59.99, 'phone_number' => '0622334455', 'ville' => 'Rabat', 'image_url' => 'https://i.pinimg.com/474x/84/bd/02/84bd026cd4d212f4e05c42eabe99b9b8.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'category_id' => 1, 'sub_category_id' => 4, 'name' => 'Chargeur rapide', 'description' => 'Chargeur rapide 65W USB-C', 'price' => 29.99, 'phone_number' => '0633445566', 'ville' => 'Agadir', 'image_url' => 'https://i.pinimg.com/474x/8d/e2/02/8de20219a25b863402c786e666e8a93d.jpg', 'created_at' => now(), 'updated_at' => now()],
            
            
        ]);
    }
}