<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Honbun;

class HonbunTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = file(storage_path('data/honbun.csv'));
        // dd($data);
        for($i=1;$i<count($data);$i++){
            $str = $data[$i];
            $str = str_replace("\r","",$str);//str_replaceは検索文字列/置換文字列/処理対象文字列
            $str = str_replace("\n","",$str);
            $col =explode(",",$str);//explode(区切り文字/処理対象文字列)3つ目に最大文字数も設定できる
               
            $table = new Honbun();
            $table -> type =$col[0];
            $table -> name =$col[1];
            $table -> maker =$col[2];
            $table -> youto =$col[3];
            $table -> kinryo =$col[4];
            $table -> a3wide =$col[6];
            $table->save();
        }
    }
}
