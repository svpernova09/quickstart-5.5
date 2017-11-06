<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class WidgetsTest extends TestCase
{
    use DatabaseTransactions;

    public function testWidgetsRoute()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/widgets')
            ->see('Widgets Index');

        $this->assertResponseOk();
    }

    public function testWidgetsNavigation()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/')
            ->click('Widgets')
            ->seePageIs('/widgets');
    }

    public function testWidgetsViewHasData()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/widgets')
            ->seePageIs('/widgets');

        $this->assertViewHas('widgets');
    }

    public function testDataExists()
    {
        $widget = factory(App\Widget::class)->create();
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/widgets')
            ->see($widget->name);
    }
}
