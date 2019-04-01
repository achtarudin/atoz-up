<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use App\Models\Sentinel\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PrepaidBalanceTest extends DuskTestCase {
  /**
   * @group prepaid
   */
  public function testExample(){
    $user = User::find(1);
    $prepaidData = ["081283349510", 100000];
    $this->browse(function (Browser $browser) use ($user, $prepaidData) {
      $browser->maximize();
      $browser->visit('/');
      $browser->visit('/login')
      ->type('email', $user->email)
      ->type('password', 'moncos214')
      ->press('Login')
      ->type('mobile_number', $prepaidData[0])
      ->select('value', $prepaidData[1])
      ->press('Submit')
      ->pause(10000)
      ->assertSee('Prepaid');

    });

  }
}
