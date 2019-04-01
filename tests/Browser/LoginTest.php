<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use App\Models\Sentinel\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase {
  /**
   * @group login
   */
  public function testExample(){
    $user = User::find(1);
    $this->browse(function (Browser $browser) use($user){
      $browser->maximize();
      $browser->visit('/');
      $browser->visit('/login')
      ->type('email', $user->email)
      ->type('password', 'moncos214')
      ->press('Login')
      ->assertSee('Prepaid');
    });
  }
}
