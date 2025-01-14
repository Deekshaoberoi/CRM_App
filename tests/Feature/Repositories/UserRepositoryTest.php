<?php

namespace Tests\Feature\Repositories;

use App\Models\User;
use App\Repositories\UserRepository;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    protected $tenancy = true;

    private UserRepository $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = app(UserRepository::class);
    }

    public function test_get_User_by_id(): void
    {
        $user = User::factory()->create();

        $this->assertEquals(User::class, get_class($this->user->getUserById($user->id)));
    }

    public function test_store_user(): void
    {
        $user = User::factory()->make();

        $this->user->storeUser($user->getData());

        $this->assertDatabaseHas((new User)->getTable(), [
            'name' => $user->name,
            'email' => $user->email,
            'position' => $user->position,
        ]);
    }

    public function test_update_user(): void
    {
        $user = User::factory()->create();

        $user->position = 'developer';

        $this->user->updateUser($user->getData(), $user);

        $this->assertDatabaseHas((new User)->getTable(), [
            'id' => $user->id,
            'position' => 'developer',
        ]);
    }

    public function test_delete_User(): void
    {
        $user = User::factory()->create();

        $result = $this->user->deleteUser($user);

        $this->assertTrue($result);
    }
}
