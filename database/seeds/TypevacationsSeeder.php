<?php

use App\Typevacations;
use Illuminate\Database\Seeder;

class TypevacationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = new Typevacations();
        $type->company_id = 1;
        $type->name = ['en' => 'Sick leave', 'ar' => 'اجازة مرضية'];
        $type->min = 1;
        $type->max = 10;
        $type->save();
    }
}
