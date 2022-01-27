<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = [['station_name'=>'新宿'],['station_name'=>'代々木'],['station_name'=>'原宿'],['station_name'=>'渋谷'],['station_name'=>'恵比寿'],['station_name'=>'目黒'],['station_name'=>'五反田'],['station_name'=>'大崎'],['station_name'=>'品川'],['station_name'=>'高輪ゲートウェイ'],['station_name'=>'浜松町'],['station_name'=>'新橋'],['station_name'=>'有楽町'],['station_name'=>'東京'],['station_name'=>'神田'],['station_name'=>'秋葉原'],['station_name'=>'御徒町'],['station_name'=>'上野'],['station_name'=>'鶯谷'],['station_name'=>'日暮里'],['station_name'=>'西日暮里'],['station_name'=>'田端'],['station_name'=>'駒込'],['station_name'=>'巣鴨'],['station_name'=>'大塚'],['station_name'=>'目白'],['station_name'=>'高田馬場'],['station_name'=>'新大久保']];
        foreach ($authors as $author) {
            DB::table('station')->insert($author);
        }
        print count($authors);
        //  DB::table('station')->insert($authors);
    }
}
