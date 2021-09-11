<?php

use App\Models\Bulletin;
use Illuminate\Database\Seeder;

class BulletinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bulletin::create(['trimestre_name' => 'Premier Titrimestre']);
        Bulletin::create(['trimestre_name' => 'Deuxième Titrimestre']);
        Bulletin::create(['trimestre_name' => 'Troisième Titrimestre']);
        //
    }
}
