<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // \CodeProject\Entities\Project::truncate();
        // \CodeProject\Entities\User::truncate();
        // \CodeProject\Entities\Client::truncate();

        $this->call(UserTableSeeder::class);
        $this->call(ClienteTableSeeder::class);
        $this->call(ProjectTableSeeder::class);
        $this->call(ProjectNoteTableSeeder::class);



    }
}
