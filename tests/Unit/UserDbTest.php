<?php

namespace Tests\Unit;

use App\Contracts\UsersContracts;
use App\Http\Controllers\Client\User\UserController;
use Illuminate\Database\Eloquent\Collection;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

class UserDbTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_get_all_users(): void
    {
        $userContract = \Mockery::mock(UsersContracts::class, function (MockInterface $mock){
            $mock->shouldReceive('allUser')->andReturn(new Collection());
        });

        $users = new UserController($userContract);
        $this->assertInstanceOf(Collection::class, $users->allUser());
    }
}
