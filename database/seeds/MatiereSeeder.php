<?php

use App\Models\Matiere;
use Illuminate\Database\Seeder;

class MatiereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Matiere::create([
           'matiere_name' => 'Mathématique'
        ]);

        Matiere::create([
            'matiere_name' => 'Français'
         ]);

         Matiere::create([
            'matiere_name' => 'Histoire-Geo'
         ]);

         Matiere::create([
            'matiere_name' => 'Physique'
         ]);

         Matiere::create([
            'matiere_name' => 'Anglais'
         ]);

         Matiere::create([
            'matiere_name' => 'Arabes'
         ]);

         Matiere::create([
            'matiere_name' => 'EPS'
         ]);

        //
    }
}
