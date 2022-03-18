<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\hwcategory;
use App\Models\employee;
use App\Models\manufacturer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $hwcatdata = [
          ['Name'=>'Desktop'],
          ['Name'=>'Laptop'],
          ['Name'=>'Tablet'],
          ['Name'=>'SmartPhone'],
        ];

        $empdata = [
          ['Name'=>'David Brown', 'email'=>'davidbrown@thisemail.com', 'phone'=>'0123456789'],
          ['Name'=>'Another Person', 'email'=>'another@theiremail.com', 'phone'=>'1234567890'],
          ['Name'=>'This Guy', 'email'=>'thisguy@geewhizmail.com', 'phone'=>'0001231234'],
        ];

        $mandata = [
          ['Name'=>'Dell','SalesInfo'=>"sales@dell.com\n1-800-buy-dell",'SupportInfo'=>"support@dell.com\n1-800-ded-dell"],
          ['Name'=>'HP','SalesInfo'=>'hp@hp.com\n1-800-hp-sales','SupportInfo'=>'support@hp.com\n1-800-broke-hp'],
        ];

        // \App\Models\User::factory(10)->create();

        foreach($hwcatdata as $hwc){
          hwcategory::create($hwc);
        }

        foreach($empdata as $e)
        {
          employee::create($e);
        }

        foreach($mandata as $m)
        {
          manufacturer::create($m);
        }

    }
}
