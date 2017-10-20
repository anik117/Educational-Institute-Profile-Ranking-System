<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_visitor = Role::where('name', 'visitor')->first();
        $role_admin  = Role::where('name', 'admin')->first();
        
        $visitor = new User();
        $visitor->name = 'Visitor Name';
        $visitor->email = 'visitor@example.com';
        $visitor->password = bcrypt('secret');
        $visitor->save();
        $visitor->roles()->attach($role_visitor);

        $admin = new User();
        $admin->name = 'Admin name';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('secret');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
