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
        $this->visit('/widgets')
            ->see('Widgets Index');

        $this->assertResponseOk();
    }

    public function testWidgetsNavigation()
    {
        $this->visit('/')
            ->click('Widgets')
            ->seePageIs('/widgets');
    }

    public function testWidgetsViewHasData()
    {
        $this->visit('/widgets')
            ->seePageIs('/widgets');

        $this->assertViewHas('widgets');
    }

    public function testDataExists()
    {
        $widget = factory(App\Widget::class, 1)->create();

        $this->visit('/widgets')
            ->see($widget[0]->name);
    }
}
