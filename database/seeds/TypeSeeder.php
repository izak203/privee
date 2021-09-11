<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create(['type_name' => 'Note Devoir']);
        Type::create(['type_name' => 'Note Exercice']);
        Type::create(['type_name' => 'Moyenne générale']);
        //
    }
}
