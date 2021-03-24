<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Person;

class HelloTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use DatabaseMigrations;
    
    public function testHello()
    {
        // ダミーで利用するデータ
        factory(User::class)->create([
            'name' => 'AAA',
            'mail' => 'BBB@CCC.com',
            'password' => 'ABCABC',
        ]);
        factory(User::class,10)->create();

        $this->assertDatabaseHas('users', [
            'name' => 'AAA',
            'mail' => 'BBB@CCC.com',
            'password' => 'ABCABC',
        ]);

        // ダミーで利用するデータ
        factory(Person::class)->create([
            'name' => 'XXX',
            'mail' => 'YYY@ZZZ.com',
            'age' => 123,
        ]);
        factory(Person::class, 10)->create();

        $this->assertDatabaseHas('people', [
            'name' => 'XXX',
            'mail' => 'YYY@ZZZ.com',
            'age' => 123,
        ]);
    }
}
