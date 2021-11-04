<?php

use App\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = new Company();
        $company->name = ['en' => 'Demo', 'ar' => 'تجربة'];
        $company->user_id = 1;
        $company->save();
        
    }
}
