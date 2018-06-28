<?php

use App\Student;

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
        // $this->call(UsersTableSeeder::class);

        DB::table('sexes')->insert([
            ['sex' => 'Male'],
            ['sex' => 'Female']
        ]);

        factory(Student::class, 5)->create();
    }
}
