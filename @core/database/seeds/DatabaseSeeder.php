<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $permissions = [

            'banner-index',
            'banner-create',
            'banner-edit',
            'banner-delete',
        ];
        foreach ($permissions as $permission){
            \Spatie\Permission\Models\Permission::where(['name' => $permission])->delete();
            \Spatie\Permission\Models\Permission::create(['name' => $permission,'guard_name' => 'admin']);
        }
    }
}
