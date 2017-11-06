<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UsersTest extends TestCase
{
    use DatabaseTransactions;

    public function testUsersRoute()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/users')
            ->see('Users Index');

        $this->assertResponseOk();
    }

    public function testUsersNavigation()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/')
            ->click('Users')
            ->seePageIs('/users');
    }

    public function testUsersViewHasData()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/users')
            ->seePageIs('/users');

        $this->assertViewHas('users');
    }

    public function testDataExists()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/users')
            ->see($user->name);
    }
}
