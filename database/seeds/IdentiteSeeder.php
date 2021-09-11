<?php

use App\Models\Identite;
use Illuminate\Database\Seeder;

class IdentiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Identite::create([
            'identite_name' => 'Etudiant'
        ]);

        Identite::create([
            'identite_name' => 'Enseignant'
        ]);
        //
    }
}
