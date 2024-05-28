<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create role admin
        $admin=Role::create(['name' => 'Admin']);
        //create role Employee
        $employee = Role::create(['name' => 'Employee']);
        //create role Customer
        $customer = Role::create(['name' => 'Customer']);

        $employee->givePermissionTo([
            'show-orders-services',
            'handel-order-service',
        ]);

        $customer->givePermissionTo([
            'show-services',
            'show-details-service',
            'order-service',
            'send-message'
        ]);
    }
}
