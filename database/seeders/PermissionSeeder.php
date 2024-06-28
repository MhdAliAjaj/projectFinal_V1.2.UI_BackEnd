<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $admin = ['create-user',
            'edit-user',
            'delete-user',

            'create-customer',
            'edit-customer',
            'delete-customer',

            'create-category',
            'edit-category',
            'delete-category',

            'create-service',
            'edit-service',
            'delete-service',
            'show-services',  //admin & customer
            'show-report-order'];

        $employee = [
            'show-orders-services',
            'handel-order-service',
            'send-message'
        ];
        $customer = [
            'show-services',
            'show-details-service',
            'order-service',
            'send-message'];

        $permissions = [

            //permission for admin
            'create-user',
            'edit-user',
            'delete-user',

            'create-customer',
            'edit-customer',
            'delete-customer',

            'create-category',
            'edit-category',
            'delete-category',

            'create-service',
            'edit-service',
            'delete-service',
            'show-services', //for customer
            'show-details-service', //for customer اظهار تفاصيل خدمة

            'show-report-order', //for admin   تقرير عن الطلبات

            'order-service', //for customer   "طلب خدمة
            'send-message', //for customer   التواصل مع الشركة من اجل نموذج اتصال

            'show-orders-services', //for employee   عرض طلبات الخدمات المقدمة
            'handel-order-service', //for employee   معالجة الطلب
        ];

        // Looping and Inserting Array's Permissions into Permission Table
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
