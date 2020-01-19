<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'name' => 'Rafał',
            'surname' => 'Świstak',
            'email' => 'hehe@xd.pl',
            'password' => bcrypt('hehe'),
        ]);

        DB::table('students')->insert([
            'name' => 'Patryk',
            'surname' => 'Borsuk',
            'email' => 'borsuk@xd.pl',
            'password' => bcrypt('hehe'),
        ]);

        DB::table('students')->insert([
            'name' => 'Łukasz',
            'surname' => 'Chała',
            'email' => 'chala@xd.pl',
            'password' => bcrypt('hehe'),
        ]);
    }
}
