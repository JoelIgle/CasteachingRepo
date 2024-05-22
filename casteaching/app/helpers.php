<?php

use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

if(!function_exists('create_default_user')){
    function create_default_user()
    {
        User::create([
            'name' => Hash::make(config('casteaching.user_profe.name')),
            'email' => Hash::make(config('casteaching.user_profe.email')),
            'password' => Hash::make(config('casteaching.user_profe.password')),
        ]);
    }


}
if (!function_exists('create_default_videos')) {
    function create_default_videos()
    {
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
if (!function_exists('create_superadmin_user')) {

    function create_superadmin_user()
    {
        $user = User::create([
            'name' => 'SuperAdmin',
            'email' => 'superadmin@casteaching.com',
            'password' => Hash::make('12345678'),
        ]);
        $user->superadmin = true;
        $user->save();
        return $user;
    }
}

if (!function_exists('create_regular_user')) {

    function create_regular_user()
    {
        $user = User::create([
            'name' => 'Pepe',
            'email' => 'pepe@casteaching.com',
            'password' => Hash::make('12345678'),
        ]);

        return $user;
    }
}

    if (!function_exists('create_sample_videos')) {

        function create_sample_videos(){
            $video1 = Video::create([
                'title' => 'Video de test',
                'description' => 'Aquest video es de test',
                'url' => 'https://www.youtube.com/watch?v=1',
                'published_at' => Carbon::parse('December 1, 2020 8:00am'),
                'previous' => null,
                'next' => null,
                'series_id' => 1,
            ]);
            $video2 = Video::create([
                'title' => 'Video de test 2',
                'description' => 'Aquest video es de test 2',
                'url' => 'https://www.youtube.com/watch?v=1',
                'published_at' => Carbon::parse('December 1, 2020 8:00am'),
                'previous' => null,
                'next' => null,
                'series_id' => 1,
            ]);

            return [$video1,$video2];

        }

}
