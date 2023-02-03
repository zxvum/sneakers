<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['img_path' => 'image 5.jpg', 'name' => 'Мужские Кроссовки Nike Blazer Mid Suede', 'price' => '12999'],
            ['img_path' => 'image 6.jpg', 'name' => 'Мужские Кроссовки Nike Air Max 270', 'price' => '12999'],
            ['img_path' => 'image 7.jpg', 'name' => 'Мужские Кроссовки Nike Blazer Mid Suede', 'price' => '8499'],
            ['img_path' => 'image 8.jpg', 'name' => 'Кроссовки Puma X Aka Boku Future Rider', 'price' => '8999'],
            ['img_path' => 'image 9.jpg', 'name' => 'Мужские Кроссовки Under Armour Curry 8', 'price' => '15199'],
            ['img_path' => 'image 10.jpg', 'name' => 'Мужские Кроссовки Nike Kyrie 7', 'price' => '11299'],
            ['img_path' => 'image 11.jpg', 'name' => 'Мужские Кроссовки Jordan Air Jordan 11', 'price' => '10799'],
            ['img_path' => 'image 12.jpg', 'name' => 'Мужские Кроссовки Nike LeBron XVIII', 'price' => '16499'],
        ];

        foreach ($data as $product) {
            Product::create([
                'img_path' => $product['img_path'],
                'name' => $product['name'],
                'price' => $product['price']
            ]);
        }
    }
}
