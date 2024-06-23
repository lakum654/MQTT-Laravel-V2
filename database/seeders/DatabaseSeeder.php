<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Device;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // $devices = ['Light','Fan','AC','Lamp'];
        // foreach($devices as $device) {
        //     Device::create(['name' => $device]);
        // }
        /* role permission users */
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(ConnectRelationshipsSeeder::class);

    }
}
