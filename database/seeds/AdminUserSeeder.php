<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'first_name' => 'Boco',
           'last_name' => 'DAOUD',
           'email' => 'admin@admin.com',
           'role_id' => 1,
           'numberunique' => random_int(12345678, 123456789),
           'password' => bcrypt('#Tsembehou112211')
        ]);
        //
    }
}
