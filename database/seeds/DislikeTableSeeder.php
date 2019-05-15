<?php

use App\Dislike;
use Illuminate\Database\Seeder;

class DislikeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\User::all();
        for ($i = 1; $i <= 3; $i++) {
            $users->each(function ($user) {
                $answer = App\Answer::inRandomOrder()->first();
                $unlike = factory(Dislike::class)->make();
                $unlike->user()->associate($user);
                $unlike->answer()->associate($answer);
                $unlike->save();
            });
        }
    }
}
