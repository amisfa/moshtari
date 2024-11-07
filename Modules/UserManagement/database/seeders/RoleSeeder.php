<?php

namespace Modules\UserManagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Modules\UserManagement\Enums\Role as RoleEnum;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create(['name' => RoleEnum::ADMIN, 'guard_name' => 'api']);
        Role::create(['name' => RoleEnum::USER, 'guard_name' => 'api']);
    }
}
