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
