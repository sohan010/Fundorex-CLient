<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        // $this->call(UsersTableSeeder::class);
//        $permissions = [
//            'support-ticket-index',
//            'support-ticket-create',
//            'support-ticket-view',
//            'support-ticket-delete',
//            'support-ticket-page-settings',
//
//            'support-ticket-category-index',
//            'support-ticket-category-create',
//            'support-ticket-category-edit',
//            'support-ticket-category-delete',
//        ];
//        foreach ($permissions as $permission){
//            \Spatie\Permission\Models\Permission::where(['name' => $permission])->delete();
//            \Spatie\Permission\Models\Permission::create(['name' => $permission,'guard_name' => 'admin']);
//        }
    }
}
