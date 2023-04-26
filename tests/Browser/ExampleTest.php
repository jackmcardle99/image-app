<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    use DatabaseMigrations;
    //use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');
    }


    /**
     * A basic browser test example.
     */
    public function testBasicExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });
    }

//    public function test_using_login_as_to_see_new_post_button(){
//        $this->browse(function (Browser $browser){
//           $browser->loginAs(User::find(1))
//            ->visit('/posts')
//            ->assertSee('Post');
//        });
//    }

    public function test_using_login_as_to_see_misnamed_post_button(){
        $this->browse(function (Browser $browser){
            $browser->loginAs(User::find(1))
                ->visit('/posts')
                ->assertDontSee('Old Post');
        });
    }
}
