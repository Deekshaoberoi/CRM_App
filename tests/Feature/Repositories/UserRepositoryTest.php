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

    public function test_get_user_by_id(): void
    {
        $user = User::factory()->create();

        $this->assertEquals(User::class, get_class($this->user->getUserById($user->id)));
    }

    public function test_store_user(): void
    {
        $user = User::factory()->make();
        $userData = new UserData($user->except('id')->toArray());

        $this->user->storeUser($userData);

        $this->assertDatabaseHas((new User)->getTable(), [
            'name' => $user->name,
            'email' => $user->email,
            'position' => $user->position,
            'phone' => $user->phone,
        ]);
    }

    public function test_update_user(): void
    {
        $user = User::factory()->create();
        $user->position = 'developer';
        $userData = new UserData($user->toArray()); // Create UserData object

        $this->user->updateUser($userData, $user);

        $this->assertDatabaseHas((new User)->getTable(), [
            'id' => $user->id,
            'position' => 'developer',
            'phone' => $user->phone,
        ]);
    }

    public function test_delete_user(): void
    {
        $user = User::factory()->create();

        $result = $this->user->deleteUser($user);

        $this->assertTrue($result);
    }
}
