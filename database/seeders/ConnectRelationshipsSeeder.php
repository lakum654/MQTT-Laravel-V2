<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class ConnectRelationshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Get Available Permissions.
         */
        $permissions = config('roles.models.permission')::all();

        /**
         * Attach Permissions to Roles.
         */
        $roleAdmin = config('roles.models.role')::where('name', '=', 'Super Admin')->first();
        $admin = User::where('role_id',1)->first();
        foreach ($permissions as $permission) {
            $roleAdmin->attachPermission($permission);
            $admin->attachPermission($permission);
            $admin->roles()->sync([$roleAdmin->id]);
        }
    }
}
