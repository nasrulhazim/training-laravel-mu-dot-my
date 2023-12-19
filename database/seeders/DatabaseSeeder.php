<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->prepare();

        $this->call(DummySeeder::class);
    }

    private function prepare()
    {
        $superadmin = Role::updateOrCreate([
            'name' => 'Superadmin',
        ]);

        $permissions = [
            'view-all-users',
            'view-user',
            'create-user',
            'update-user',
            'delete-user',
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate([
                'name' => $permission,
            ]);
            $superadmin->givePermissionTo($permission);
        }

        $user = Role::updateOrCreate([
            'name' => 'User',
        ]);

        $superuser = User::updateOrCreate([
            'email' => 'super@app.com',
        ],[
            'name' => 'superadmin',
            'password' => Hash::make('password'),
        ]);

        $superuser->assignRole($superadmin);
    }
}
