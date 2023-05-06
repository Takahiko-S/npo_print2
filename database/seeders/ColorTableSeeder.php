<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = file(storage_path('data/color.csv'));
       // dd($data);
        for($i=1;$i<count($data);$i++){
            $str = $data[$i];
            $str = str_replace("\r","",$str);//str_replaceは検索文字列/置換文字列/処理対象文字列
            $str = str_replace("\n","",$str);
            
            $color = new Color();
            $color->color=$str;
           // dd($color);
            $color->save();
        }
    }
}
