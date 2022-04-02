<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            
            [
                'id'    => 258,
                'title' => 'menu_dashboard_create',
            ],
            [
                'id'    => 259,
                'title' => 'menu_dashboard_edit',
            ],
            [
                'id'    => 260,
                'title' => 'menu_dashboard_show',
            ],
            [
                'id'    => 261,
                'title' => 'menu_dashboard_delete',
            ],
            [
                'id'    => 262,
                'title' => 'menu_dashboard_access',
            ],
            
        ];

        Permission::insert($permissions);
    }
}