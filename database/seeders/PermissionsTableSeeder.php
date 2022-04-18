<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'member_create',
            ],
            [
                'id'    => 20,
                'title' => 'member_edit',
            ],
            [
                'id'    => 21,
                'title' => 'member_show',
            ],
            [
                'id'    => 22,
                'title' => 'member_delete',
            ],
            [
                'id'    => 23,
                'title' => 'member_access',
            ],
            [
                'id'    => 24,
                'title' => 'members_management_access',
            ],
            [
                'id'    => 25,
                'title' => 'family_create',
            ],
            [
                'id'    => 26,
                'title' => 'family_edit',
            ],
            [
                'id'    => 27,
                'title' => 'family_show',
            ],
            [
                'id'    => 28,
                'title' => 'family_delete',
            ],
            [
                'id'    => 29,
                'title' => 'family_access',
            ],
            [
                'id'    => 30,
                'title' => 'mandaat_create',
            ],
            [
                'id'    => 31,
                'title' => 'mandaat_edit',
            ],
            [
                'id'    => 32,
                'title' => 'mandaat_show',
            ],
            [
                'id'    => 33,
                'title' => 'mandaat_delete',
            ],
            [
                'id'    => 34,
                'title' => 'mandaat_access',
            ],
            [
                'id'    => 35,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}