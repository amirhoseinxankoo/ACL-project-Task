<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'delete-edit',
            'label' => 'حذف و ویرایش '
        ]);

        Permission::create([
            'name' => 'change-user-status',
            'label' => 'تغییر وضعیت کاربر'
        ]);
        Permission::create([
            'name' => 'show-user-status',
            'label' => 'مشاهده وضعیت کاربر'
        ]);
    }
}
