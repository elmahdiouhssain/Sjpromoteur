<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Societe;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class CreateSocieteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
     {
        DB::table('amicals')->insert([
            'id' => "1",
            'raison_social' => "Amicale Nassim d'habitation agadir",
            'raison_social_ar' => "ودادية النسيم للسكن اكادير",
            'details' => "وكالة التجاري وفا بنك شارع المقاومة أكادير",
            'rib' => "41 0005024000305445 010 007",
            'slug' => Str::slug("Amicale Nassim d'habitation agadir"),
            ]);

        //DB::table('amicals')->insert([
            //'id' => "3",
            //'raison_social' => "Amicale Nassim2 d'habitation agadir",
            //'raison_social_ar' => "ودادية النسيم2 للسكن اكادير",
            //'details' => "وكالة التجاري وفا بنك شارع المقاومة أكادير",
            //'rib' => "41 0005024000305445 010 007",
            //'slug' => Str::slug("Amicale Nassim2 d'habitation agadir"),
            //]);

        DB::table('amicals')->insert([
            'id' => "2",
            'raison_social' => "Amicale Timitar d'habitation agadir",
            'raison_social_ar' => 'ودادية تيميتار للسكن اكادير',
            'details' => "وكالة البنك المغربي للتجارة الخارجية شارع   كندي تالبرجت أكادير",
            'rib' => "000003200001160837",
            'slug' => Str::slug("Amicale Timitar d'habitation agadir"),
          ]);

    }

}
