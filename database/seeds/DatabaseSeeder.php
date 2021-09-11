<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(MaternelSeeder::class);
        $this->call(IdentiteSeeder::class);
        $this->call(MatiereSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(BulletinSeeder::class);
        $this->call(TypeSeeder::class);
    }
}

