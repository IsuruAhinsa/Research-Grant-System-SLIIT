<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ask for db migration refresh, default is no
        if ($this->command->confirm('Do you wish to fresh migration before seeding, it will clear all old data?')) {
            // Call the php artisan migrate:fresh
            $this->command->call('migrate:fresh');
            $this->command->warn("Data cleared, starting from blank database.");
        }

        // reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        DB::table('roles')->delete();

        // create roles
        $superAdministrator = Role::create(['name' => 'Super Administrator']);
        Role::create(['name' => 'Administrator']);
        Role::create(['name' => 'Generic User']);
        Role::create(['name' => 'Dean']);
        Role::create(['name' => 'Principal Investigator']);
        Role::create(['name' => 'Reviewer']);

        $this->command->info('Default Roles added.');

        // create super admin
        $this->createSuperAdministrator($superAdministrator);

        // assign permissions
        $this->assignPermissions();
    }

    protected function assignPermissions()
    {
        for ($i = 0; $i < count(self::defaultPermissions()); $i++) {
            $permissionGroup = self::defaultPermissions()[$i]['group_name'];
            for ($j = 0; $j < count(self::defaultPermissions()[$i]['permissions']); $j++) {
                Permission::create([
                    'name' => self::defaultPermissions()[$i]['permissions'][$j],
                    'group_name' => $permissionGroup,
                ]);
            }
        }
    }

    private function createSuperAdministrator($superAdministrator)
    {
        $user = User::where('email', 'superadministrator@sliit.lk')->first();

        if ($user === null) {

            $user = User::create([
                'first_name' => "Super",
                'last_name' => "Administrator",
                'email' => "superadministrator@sliit.lk",
                'password' => Hash::make('password'),
            ]);

            $user->assignRole($superAdministrator);

            $this->command->info('Here is your super administrator details to login:');
            $this->command->warn($user->email);
            $this->command->warn('Password is "password"');

        }
    }

    public static function defaultPermissions(): array
    {
        return [
            [
                'group_name' => 'User',
                'permissions' => [
                    'users.create',
                    'users.view',
                    'users.edit',
                    'users.delete',
                ],
            ],

            [
                'group_name' => 'Role',
                'permissions' => [
                    'roles.create',
                    'roles.view',
                    'roles.edit',
                    'roles.delete',
                ],
            ],

            [
                'group_name' => 'Profile',
                'permissions' => [
                    'profile.view',
                    'profile.edit',
                ],
            ],

            [
                'group_name' => 'Download',
                'permissions' => [
                    'downloads.view',
                ],
            ],

            [
                'group_name' => 'Faculty',
                'permissions' => [
                    'faculties.create',
                    'faculties.view',
                    'faculties.edit',
                    'faculties.delete',
                ],
            ],

            [
                'group_name' => 'Designation',
                'permissions' => [
                    'designations.create',
                    'designations.view',
                    'designations.edit',
                    'designations.delete',
                ],
            ],

            [
                'group_name' => 'Disbursement Plan',
                'permissions' => [
                    'disbursements.create',
                ],
            ],
        ];
    }
}
