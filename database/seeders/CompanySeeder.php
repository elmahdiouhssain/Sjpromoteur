<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('companys')->insert([
            'id' => "1",
            'raison_social' => "Sjpromoteur sarl",
            'raison_social_ar' => "xx666661",
            'details' => "0000000",
            'rib' => "0000000000001",
            'slug' => Str::slug("Sjpromoteur"),
            ]);
        DB::table('companys')->insert([
            'id' => "2",
            'raison_social' => "Idir Tradiv sarl",
            'raison_social_ar' => "xx666662",
            'details' => "0000000",
            'rib' => "0000000000002",
            'slug' => Str::slug("Idir Tradiv sarl"),
            ]);
    }
}
