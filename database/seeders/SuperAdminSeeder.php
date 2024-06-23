<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating  Admin User
        $admin= User::create([
            'name' => 'Javed Ur Rehman',
            'email' => 'javed@allphptricks.com',
            'password' => Hash::make('javed1234'),
            'roles_name'=>'Admin',
        ]);
        $admin->assignRole('Admin');

        // Creating employee User
        $employee = User::create([
            'name' => 'Syed Ahsan Kamal',
            'email' => 'ahsan@allphptricks.com',
            'password' => Hash::make('ahsan1234'),
            'roles_name'=>'Employee',
        ]);
        $employee->assignRole('Employee');

        // Creating customer User
        $customer = User::create([
            'name' => 'Abdul Muqeet',
            'email' => 'muqeet@allphptricks.com',
            'password' => Hash::make('muqeet1234'),
            'roles_name'=>'Customer',

        ]);
        $customer->assignRole('Customer');


    }
}
