<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use Database\Seeders\Hyousi_joTableSeeder;
use App\Models\hyousi_jo;
use App\Models\namiseihon;
use App\Models\hyousi_nami;
use App\Models\Honbun;

class PageController extends Controller
{
    public function colorSet(Request $request){
        $colors =Color::all();
        
        return view('contents.color_set',compact('colors'));
    }
    //カラー変更
    //findはデフォルトでidを探してくれるから他のとこみたいにcolorとかbikoみたいに指定する必要はない
    //解説colors テーブルから d_id と同じ値の id を持つ Color データを取得します。
    //取得した Color データの color 属性に、d_color の値を設定します。
    public function saveColor(Request $request){
        // dd($request->all());
   
        $color =Color::find($request->d_id);
        $color->color = $request->d_color;
        $color->biko = $request->d_biko;
        $color->u_flag = $request->d_flag;
        $color->save();
        
        return redirect(route('color_set'));
    }
    public function saveColorNew(Request $request){
        // dd($request->all());
        $color =new color();
        $color->color = $request->n_color;
        $color->biko = $request->n_biko;
        $color->u_flag = $request->n_flag;
        $color->save();
        
        return redirect(route('color_set'));
    }
    
    //ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    //表紙上
    public function hyosiJo(){
        $hyosijos =hyousi_jo::all();
        
        
        return view('admin.hyousijo',compact('hyosijos'));
    }
    
    public function s_Hyosi(Request $request){
        // dd($request->all());
        $hyosijo =hyousi_jo::find($request->d_id);
        $hyosijo->type = $request->d_type;
        $hyosijo->biko = $request->d_biko;
        $hyosijo->name = $request->d_name;
        $hyosijo->maker = $request->d_maker;
        $hyosijo->youto = $request->d_youto;
        $hyosijo->kinryo = $request->d_kinryo;
        $hyosijo->kirotanka = $request->d_kirotanka;
        $hyosijo->a3wide = $request->d_a3wide;
        $hyosijo->tokucho = $request->d_tokucho;
        $hyosijo->sonota = $request->d_sonota;
        $hyosijo->save();
        
        return redirect(route('hyosijo'));
    }
    public function n_Hyosi(Request $request){
        // dd($request->all());
        $hyosijo =new hyousi_jo();
        $hyosijo->type = $request->n_type;
        $hyosijo->biko = $request->n_biko;
        $hyosijo->name = $request->n_name;
        $hyosijo->maker = $request->n_maker;
        $hyosijo->youto = $request->n_youto;
        $hyosijo->kinryo = $request->n_kinryo;
        $hyosijo->kirotanka = $request->n_kirotanka;
        $hyosijo->a3wide = $request->n_a3wide;
        $hyosijo->tokucho = $request->n_tokucho;
        $hyosijo->sonota = $request->n_sonota;
        $hyosijo->save();
        
        return redirect(route('hyosijo'));
    }
    public function e_Hyosi(Request $request){
        $id = $request->input('id'); 
        
        $e_hyousis =hyousi_jo::find($id);
        //dd($e_hyousis);
        
        return view('edit.e_hyousijo',compact('e_hyousis','id'));
               

    }
    public function n_Hyosijo(Request $request){

        return view('new.n_hyousijo');
        
        
        
    }
//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
//中綴じ
    public function naka(){
        $sizes = namiseihon::all();
        $hyosis = hyousi_nami::all();
        $colors = Color::all();
        $honbuns = Honbun::all();
        return view('contents.naka',compact('sizes','hyosis','colors','honbuns'));
    }
    
    public function nakaMitsumori(Request $request){
        // dd($request->all());
        $size = namiseihon::find($request->size);
        
        //基本料金
        $p_kihon = 2000 + ($request->honbun_page * 0.1) * $request->busu;
        //dd($p_kihon);
        //表紙用紙代
        if($request->hyoshi == "あり"){
            $h_data = explode("-", $request->hyoshi_paper);
            $hyoshi =hyousi_nami::find($h_data[0]);
            $p_hyoshi = $hyoshi->a3wide * 1 *$request->busu * $size->honbun;
            
            //表紙印刷代
            if($request->hyoshi_print_color == "1"){
                $p_hyoshi_print = 2000 + (15 * $request->busu * $size->honbun);//計算式を作るときは実数を使って作って変数に置き換える
            }else{
                $p_hyoshi_print = 2000 + (2.5 * $request->busu * $size->honbun);
            }
            //表２表３印刷代
            if($request->h2h3 == "あり"){
                if($request->h2h3_color == "1"){
                    $p_h2h3 = 2000 + (15 * $request->busu * $size->honbun);//計算式を作るときは実数を使って作って変数に置き換える
                }else{
                    $p_h2h3 = 2000 + (2.5 * $request->busu * $size->honbun);
                }
            }else{
                $p_h2h3 = 0;
            }
            
        }else{
            $p_hyoshi = 0;
            $p_h2h3 = 0;
            $p_hyoshi_print = 0;
            
        }
        //dd($p_hyoshi);
        //本文用紙代
        $honbun = Honbun::find($request->honbun_paper);
        $p_honbun = $honbun->a3wide * ($request->honbun_page / 2) * ($request->busu * $size ->honbun / 2);
        //dd($p_honbun);
        
        //本文印刷代
        if($request->honbun_print_color == "1"){
            $p_honbun_print = 6000 +(15 * $request->honbun_page / 2) * ($request->busu * $size ->honbun);
        }else{
            $p_honbun_print = 4000 +(2.5 * $request->honbun_page / 2) * ($request->busu * $size ->honbun);
        }
        //納期係数
        if($request->nouki == '特急'){
            $p_nouki = 1.5;
        }elseif($request->nouki =='ゆっくり'){
            $p_nouki = 0.85;
        }else{
            $p_nouki = 1;
        }
        
        
        
        $seihon_gokei = floor(($p_kihon + $p_hyoshi + $p_honbun + $p_hyoshi_print + $p_h2h3 + $p_honbun_print)* $p_nouki);
        
        /*    dd("seihon_gokei=>".$seihon_gokei,"p_kihon=>".$p_kihon,"p_hyoshi=>".$p_hyoshi,"p_honbun=>".$p_honbun,
         "p_hyoshi_print=>".$p_hyoshi_print,"p_h2h3=>".$p_h2h3,"p_honbun_print=>".$p_honbun_print); */
        
        $deliv_base = $request->honbun_page / 2 * $request->busu* $size->honbun/2;
        //dd($deliv_base);
        $deliv_fee =ceil($deliv_base/500)*500;//ceil＝切り上げ
        //dd($deliv_base,$deliv_fee);
        $tax = ($seihon_gokei +$deliv_fee)*0.1;
        $sougoukei = $seihon_gokei + $deliv_fee + $tax;
        return view('contents.mitumori_naka',compact('request','seihon_gokei','deliv_fee','tax','sougoukei'));
        
    }
    
}
