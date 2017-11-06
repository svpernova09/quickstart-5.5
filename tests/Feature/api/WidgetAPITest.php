<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class WidgetAPITest extends TestCase
{
    use WithoutMiddleware;

    public function testAPIWidgetRoute()
    {
        $this->get('/api/widgets');

        $this->assertResponseOk();
    }

    public function testAPIWidgetRouteHasStructure()
    {
        $this->get('/api/widgets')
            ->seeJsonStructure([
                [
                    'id',
                    'name',
                    'description',
                    'price',
                    'created_at',
                    'updated_at',
                ],
            ]);
    }

    public function testAPIWidgetGetRoute()
    {
        $widget = factory(App\Widget::class)->create();

        $this->get('/api/widgets/' . $widget->id)
            ->seeJsonStructure([
                'id',
                'name',
                'description',
                'price',
                'created_at',
                'updated_at',
            ]);
    }
}
