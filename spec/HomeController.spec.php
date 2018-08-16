<?php
use App\Http\Controllers\HomeController;

describe('HomeController', function() {
    describe('index', function() {
        it('returns the welcome view', function() {
            $instance = new HomeController();
            allow($instance)
                ->toReceive('index')
                ->andReturn('App Name - Home');
            expect($instance->index())
                ->toContain('App Name - Home');
        });
    });
});