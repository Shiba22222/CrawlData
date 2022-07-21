<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class CreateSupperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'=>'Huskadian',
            'email'=>'giakinh451@gmail.com',
            'password'=>bcrypt('123456'),
        ]);
        //$role = Role::create(['name' => 'Admin']);
        $role = Role::findByName('Admin');
        //$permissions = Permission::pluck('id','id')->all();
        //$role->syncPermissions($permissions);
        $permissions = DB::table('permissions')->where('name','LIKE',"all")->pluck('id','id')->all();
        $role->givePermissionTo($permissions);
        $user->assignRole([$role->id]);
    }
}
