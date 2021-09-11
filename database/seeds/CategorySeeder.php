<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
           'category_name' => 'Maternelle'
        ]);

        Category::create([
            'category_name' => 'Primaire'
         ]);

         Category::create([
            'category_name' => 'Collège'
         ]);

         Category::create([
            'category_name' => 'Lycée'
         ]);

         Category::create([
            'category_name' => 'Numéric'
         ]);
        //
    }
}
