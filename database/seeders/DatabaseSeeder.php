<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\hwcategory;
use App\Models\employee;
use App\Models\manufacturer;
use App\Models\purchase;
use App\Models\species;
use App\Models\animal;
use App\Models\hardware;
use App\Models\unit;
use App\Models\note;

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
          ['Name'=>'David Brown', 'Email'=>'davidbrown@thisemail.com', 'Phone'=>'0123456789'],
          ['Name'=>'Another Person', 'Email'=>'another@theiremail.com', 'Phone'=>'1234567890'],
          ['Name'=>'This Guy', 'Email'=>'thisguy@geewhizmail.com', 'Phone'=>'0001231234'],
        ];

        $mandata = [
          ['Name'=>'Dell','SalesInfo'=>"sales@dell.com\r\n1-800-buy-dell",'SupportInfo'=>"support@dell.com\r\n1-800-ded-dell"],
          ['Name'=>'HP','SalesInfo'=>"hp@hp.com\r\n1-800-hp-sales",'SupportInfo'=>"support@hp.com\r\n1-800-broke-hp"],
          ['Name'=>'Samsung','SalesInfo'=>"sales@samsung.com\r\n1-800-samsung",'SupportInfo'=>"support@samsung.com\r\n1-800-support"],
        ];

        $purchasedata = [
          ['Invoice'=>"1122345", 'Price'=>"12500.36", 'PurchaseDate'=>"2022-03-15"],
          ['Invoice'=>"1234123", 'Price'=>"97500.11", 'PurchaseDate'=>"2021-01-03"],
        ];

        $hardwaredata = [
          ['Name'=>'Dell #1','manufacturer_id'=>1,'hwcategory_id'=>2,'CPU'=>'Intel I7-6600U','RAM'=>'16GB','Storage'=>'1TB SSD'],
          ['Name'=>'Dell #2','manufacturer_id'=>1,'hwcategory_id'=>1,'CPU'=>'Ryzen 7 5800','RAM'=>'16GB','Storage'=>'1TB SSD + 1TB HDD'],
          ['Name'=>'HP Pavilion 15t','manufacturer_id'=>2,'hwcategory_id'=>2,'CPU'=>'Intel I7-1195G7','RAM'=>'16GB','Storage'=>'512GB SSD'],
          ['Name'=>'HP Elite G8 Tablet PC','manufacturer_id'=>2,'hwcategory_id'=>3,'CPU'=>'Intel I7-1135G7','RAM'=>'8GB','Storage'=>'1TB SSD'],
          ['Name'=>'Samsung Galaxy S22','manufacturer_id'=>3,'hwcategory_id'=>4,'CPU'=>'Qualcomm SM8450 Snapdragon 8 G1','RAM'=>'8GB','Storage'=>'128GB Internal'],
        ];

        $notesdata = [
          ['unit_id'=>1, 'Service'=>'Malware cleaning', 'Software'=>'malwarebytes', 'Notes'=>"Cleaned up the computer. Locked down the company router."],
          ['unit_id'=>1, 'Service'=>'OS Update', 'Software'=>'windows', 'Notes'=>"Updated the computer during off hours. No issues"],
          ['unit_id'=>1, 'Service'=>'Replaced RAM', 'Software'=>'N/A', 'Notes'=>"One stick of ram died. Replaced with unit# 1234. memtestx86 overnight. No issues"],
          ['unit_id'=>2, 'Service'=>'OS Update', 'Software'=>'windows', 'Notes'=>"Updated the computer during off hours. No issues"],
          ['unit_id'=>3, 'Service'=>'Attempted OS Update', 'Software'=>'windows', 'Notes'=>"Updated the computer during off hours. Everything broke. Reverted."],
        ];

        $unitdata = [
          ['Name'=> 'First PC', 'hardware_id'=>1, 'employee_id'=>1, 'purchase_id'=>1],
          ['Name'=> '', 'hardware_id'=>2, 'employee_id'=>2, 'purchase_id'=>1],
          ['Name'=> 'no special name', 'hardware_id'=>3, 'employee_id'=>3, 'purchase_id'=>2],
          ['Name'=> 'another piece of hardware', 'hardware_id'=>5, 'employee_id'=>1, 'purchase_id'=>2],
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

        foreach($purchasedata as $p)
        {
          purchase::create($p);
        }

        foreach($hardwaredata as $h)
        {
          hardware::create($h);
        }

        foreach($unitdata as $u)
        {
          unit::create($u);
        }

        foreach($notesdata as $n)
        {
          note::create($n);
        }
    }
}
