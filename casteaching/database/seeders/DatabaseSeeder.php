<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        create_default_user();
//
//        create_default_videos();


        User::create([
            'name' => Hash::make(config('casteaching.user_profe.name')),
            'email' => Hash::make(config('casteaching.user_profe.email')),
            'password' => Hash::make(config('casteaching.user_profe.password')),
        ]);

        Video::create([
            'title' => 'Video de la bd',
            'description' => 'Aquest video es de la bd',
            'url' => 'https://www.youtube.com/watch?v=1',
            'published_at' => Carbon::parse('December 1, 2020 8:00am'),
            'previous' => null,
            'next' => null,
            'series_id' => 1,
        ]);

    }
}
