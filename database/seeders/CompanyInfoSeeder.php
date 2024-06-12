<?php

namespace Database\Seeders;

use App\Models\CompanyInfo;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanyInfoSeeder extends Seeder
{

    public function run(): void
    {
        CompanyInfo::create([
            'name' => 'Javed Ur Rehman',
            'website' => 'Syria',
            'address' => 'homs',
            'email' => 'x@gmail.com',
            'phone' => '98794494',
            'service' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Obcaecati sapiente sed magnam vitae, eos optio, recusandae nisi earum ab, culpa error minus adipisci similique asperiores quaerat quam dolor mollitia animi.',
        ]);
    }
}
