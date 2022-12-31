<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = Role::create(['name'=> 'admin']);
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@hopexito.com',
            'password' => bcrypt('181d12b7a9A'),
            'role_id' => 1
        ]);
        $admin->assignRole($admin_role);

        $artist_role = Role::create(['name'=> 'artist']);
        $artist = User::create([
            'name' => 'SupaTee',
            'email' => 'supatee@gmail.com',
            'password' => bcrypt('1234567890'),
            'role_id' => 2
        ]);
        $artist->assignRole($artist_role);

        $customer_role = Role::create(['name'=> 'customer']);
        $customer = User::create([
            'name' => 'Nadham',
            'email' => 'ilhamghaz@gmail.com',
            'password' => bcrypt('1234567890'),
            'role_id' => 3
        ]);
        $customer->assignRole($customer_role);

    }
}
