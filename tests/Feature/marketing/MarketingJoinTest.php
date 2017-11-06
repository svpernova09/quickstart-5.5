<?php

use App\MarketingEmail;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class MarketingJoinTest extends TestCase
{
    use DatabaseTransactions;
    
    public function testRouteWorks()
    {
        $this->visit('/marketing/join-list')
            ->see('Join Our Marketing Email List');

        $this->assertResponseOk();
    }

    public function testSubmitEmailWorks()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('marketing/join-list')
            ->type($user->email, 'email')
            ->press('Join')
            ->seePageIs('marketing/pending')
            ->see('Please check your email for further instructions')
            ->seeInDatabase('marketing_emails', [
                'email' => $user->email,
                'active' => 0,
            ]);

        $this->assertResponseOk();
    }

    public function testVerifyEmailWorks()
    {
        $marketing_email = factory(App\MarketingEmail::class)->create();

        $this->visit('/marketing/verify-email/' . $marketing_email->hash)
            ->see('Your email is now active on our Marketing Email List');
    }
}