<?php

namespace Database\Seeders;

use Database\Factories\AuthorFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $factory = new AuthorFactory();
        $factory->count(1000)
        ->hasArticles(50)
        ->create()
            ;


    }
}
