<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 
        $permissions = [
            'manage-profile' => [
                'label_name' => 'Manage Profile',
                'module' => 'account',
                'action' => 'edit',
            ],
            'manage-change-password' => [
                'label_name' => 'Manage Change Password',
                'module' => 'account',
                'action' => 'edit',
            ],
            'user-list' => [
                'label_name' => 'User List',
                'module' => 'users',
                'action' => 'list',
            ],
            'user-create' => [
                'label_name' => 'User Add',
                'module' => 'users',
                'action' => 'create',
            ],
            'user-edit' => [
                'label_name' => 'User Edit',
                'module' => 'users',
                'action' => 'edit',
            ],
            'user-delete' => [
                'label_name' => 'User Delete',
                'module' => 'users',
                'action' => 'delete',
            ],
            'role-list' => [
                'label_name' => 'Role List',
                'module' => 'roles',
                'action' => 'list',
            ],
            'role-create' => [
                'label_name' => 'Role Add',
                'module' => 'roles',
                'action' => 'create',
            ],
            'role-edit' => [
                'label_name' => 'Role Edit',
                'module' => 'roles',
                'action' => 'edit',
            ],
            'role-delete' => [
                'label_name' => 'Role Delete',
                'module' => 'roles',
                'action' => 'delete',
            ],
            'settings' => [
                'label_name' => 'Setting Page',
                'module' => 'setting',
                'action' => 'list',
            ],
            'setting-general' => [
                'label_name' => 'General Info',
                'module' => 'setting',
                'action' => 'edit',
            ],
            'setting-api_keys' => [
                'label_name' => 'Manage API Keys',
                'module' => 'setting',
                'action' => 'edit',
            ],
            'setting-configuration' => [
                'label_name' => 'Manage configuration',
                'module' => 'setting',
                'action' => 'edit',
            ],
            'setting-translation' => [
                'label_name' => 'Manage translation',
                'module' => 'setting',
                'action' => 'edit',
            ],
            'setting-email-template' => [
                'label_name' => 'Manage Email Template',
                'module' => 'setting',
                'action' => 'list',
            ],
            'setting-notifications' => [
                'label_name' => 'Manage Notifications',
                'module' => 'setting',
                'action' => 'list',
            ]
        ];

        foreach ($permissions as $key => $permission) {
             Permission::create([
                'name' => $key,
                'module' => $permission['module'],
                'action_type' => $permission['action'],
                'label_name' => $permission['label_name']
            ]);
        }
    }
}
