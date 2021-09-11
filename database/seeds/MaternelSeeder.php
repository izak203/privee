<?php

use App\Models\Maternel;
use Illuminate\Database\Seeder;

class MaternelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Maternel::create([
           'maternel_name' => 'Petite Section',
           'category_id' => 1
        ]);

        Maternel::create([
            'maternel_name' => 'Moyenne Section',
            'category_id' => 1
         ]);

         Maternel::create([
            'maternel_name' => 'Grande Section',
            'category_id' => 1
         ]);

         Maternel::create([
            'maternel_name' => 'CP',
            'category_id' => 2
         ]);

         Maternel::create([
            'maternel_name' => 'CE1',
            'category_id' => 2
         ]);

         Maternel::create([
            'maternel_name' => 'CE2',
            'category_id' => 2
         ]);

         
         Maternel::create([
            'maternel_name' => 'CM1',
            'category_id' => 2
         ]);

         
         Maternel::create([
            'maternel_name' => 'CM2',
            'category_id' => 2
         ]);

         
         Maternel::create([
            'maternel_name' => 'Sixième',
            'category_id' => 3
         ]);

         
         Maternel::create([
            'maternel_name' => 'Cinqième',
            'category_id' => 3
         ]);

         
         Maternel::create([
            'maternel_name' => 'Quatrième',
            'category_id' => 3
         ]);

         Maternel::create([
            'maternel_name' => 'Troisième',
            'category_id' => 3
         ]);

         Maternel::create([
            'maternel_name' => 'Seconde',
            'category_id' => 4
         ]);

         Maternel::create([
            'maternel_name' => 'Première',
            'category_id' => 4
         ]);

         Maternel::create([
            'maternel_name' => 'Terminale',
            'category_id' => 4
         ]);

         Maternel::create([
            'maternel_name' => 'HTML5 CSS3 BOOTSTRAP',
            'category_id' => 5
         ]);

         Maternel::create([
            'maternel_name' => 'JAVASCRIPT',
            'category_id' => 5
         ]);

         Maternel::create([
            'maternel_name' => 'PHP MYSQL',
            'category_id' => 5
         ]);

         Maternel::create([
            'maternel_name' => 'POO',
            'category_id' => 5
         ]);

         Maternel::create([
            'maternel_name' => 'LARAVEL OU SYMFONY',
            'category_id' => 5
         ]);

         Maternel::create([
            'maternel_name' => 'CMS WORDPRESS OU DJOOMLA',
            'category_id' => 5
         ]);


        //

    }
}
