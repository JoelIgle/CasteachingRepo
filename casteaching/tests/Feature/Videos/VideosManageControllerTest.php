<?php

namespace Tests\Feature\Videos;

use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

/**
 * @covers \App\Http\Controllers\VideosManageController
 */
class VideosManageControllerTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function user_with_permissions_can_manage_videos()
    {
        $this->loginAsVideoManager();

        $videos = create_sample_videos();

        $response = $this->get('/manage/videos');

        $response->assertStatus(200);
        $response->assertViewIs('videos.manage.index');
        $response->assertViewHas('videos',function ($v) use ($videos){
            return count($videos) === count($v) && get_class($v) === Collection::class && get_class($videos[0]) === Video::class;
        });
        foreach ($videos as $video){
            $response->assertSee($video->id);
            $response->assertSee($video->title);
        }
    }

    /** @test */
    public function regular_users_can_manage_videos()
    {
        $this->loginAsRegularUser();

        $response = $this->get('/manage/videos');

        $response->assertstatus(403);
    }

    /** @test */
    public function guest_users_can_manage_videos()
    {
        $response = $this->get('/manage/videos');

        $response->assertRedirect(route('login'));
    }

    public function superadmins_can_manage_videos()
    {
        $this->loginAsSuperAdmin();
        $response = $this->get('/manage/videos');

        $response->assertStatus(200);
        $response->assertViewIs('videos.manage.index');
    }

    private function loginAsVideoManager()
    {
        $user = User::create([
            'name' => 'VideoManager',
            'email' => 'videosmanager@casteaching.com',
            'password' => Hash::make('12345678')
        ]);

        Permission::create(['name' => 'videos_manage_index']);

        $user->givePermissionTo('videos_manage_index');

        Auth::login($user);
    }

    private function loginAsSuperAdmin()
    {
        Auth::login(create_superadmin_user());
    }
    private function loginAsRegularUser()
    {
        Auth::login(create_regular_user());
    }
}
