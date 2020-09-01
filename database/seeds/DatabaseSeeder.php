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
        factory(\App\User::class,10)->create()->each(function ($user){
           $user->ads()->saveMany(factory(\App\Ad::class,20)->make(['user_id' => $user->id]));
        });
    }
}
