<?php

namespace Tests\Models;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class UserTest extends TestCase
{
    use RefreshDatabase;

    private User $user1;
    private User $user2;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user1 = User::factory()->create();
        $this->user2 = User::factory()->create();
    }

    /** @test */
    public function a_user_can_follow_another_user(): void
    {
        $this->user1->follow($this->user2);

        $this->assertTrue($this->user1->isFollowing($this->user2));
    }

    /** @test */
    public function a_user_can_unfollow_another_user(): void
    {
        $this->user1->follow($this->user2);
        $this->user1->unfollow($this->user2);

        $this->assertFalse($this->user1->isFollowing($this->user2));
    }

    /** @test */
    public function a_user_is_following_another_user(): void
    {
        $this->user1->follow($this->user2);

        $this->assertTrue($this->user1->isFollowing($this->user2));
        $this->assertTrue($this->user2->isFollowedBy($this->user1));
    }

    /** @test */
    public function a_user_does_not_follow_a_user_because_they_are_followed(): void
    {
        $this->user1->follow($this->user2);

        $this->assertFalse($this->user2->isFollowing($this->user1));
        $this->assertFalse($this->user1->isFollowedBy($this->user2));
    }

    /** @test */
    public function it_can_count_a_users_followers(): void
    {
        $this->user1->follow($this->user2);

        $user3 = User::factory()->create();
        $user4 = User::factory()->create();

        $this->user1->follow($user3);
        $this->user1->follow($user4);

        $this->assertEquals(3, $this->user1->followings->count());
    }


}
