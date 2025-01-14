<?php

namespace Tests\Feature\Repositories;

use App\Models\Role;
use App\Repositories\RoleRepository;
use Tests\TestCase;

class RoleRepositoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    protected $tenancy = true;

    private RoleRepository $role;

    protected function setUp(): void
    {
        parent::setUp();

        $this->role = app(RoleRepository::class);
    }

    public function test_get_Role_by_id(): void
    {
        $role = Role::factory()->create();

        $this->assertEquals(Role::class, get_class($this->role->getRoleById($role->id)));
    }

    public function test_store_Role(): void
    {
        $role = Role::factory()->make();

        $this->role->storeRole($role->getData());

        $this->assertDatabaseHas((new Role)->getTable(), [
            'name' => $role->name,
        ]);
    }

    public function test_update_Role(): void
    {
        $role = Role::factory()->create();

        $role->name = 'admin';

        $this->role->updateRole($role->getData(), $role);

        $this->assertDatabaseHas((new Role)->getTable(), [
            'id' => $role->id,
            'name' => 'admin',
        ]);
    }

    public function test_delete_Role(): void
    {
        $role = Role::factory()->create();

        $this->role->deleteRole($role);

        $this->assertDatabaseMissing((new Role)->getTable(), [
            'id' => $role->id,
        ]);
    }
}