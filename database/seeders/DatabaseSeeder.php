<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoryType;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $categories = array([
            "name"=>"Web Design",
        ],[
            "name"=>"Html",
        ],[
            "name"=>"Javascript",
        ],[
            "name"=>"CSS",
        ],[
            "name"=>"Tutorials",
        ],[
            "name"=>"Freebies",
        ],);

        CategoryType::insert($categories);


        $default_user = [
            "name"=>"Ramon Jr Infante",
            "email"=>"infanteramon28@gmail.com",
        ];
        User::create($default_user);
    }
}
