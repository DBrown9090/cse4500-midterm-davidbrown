<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\hwcategory;

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
        // \App\Models\User::factory(10)->create();
        foreach($hwcatdata as $hwc){
          hwcategory::create($hwc);
        }
    }
}
