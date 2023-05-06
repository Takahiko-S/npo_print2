<?php
use App\Models\Namiseihon;
use App\Models\HyoshiNami;
use App\Models\Color;
use App\Models\Honbun;
?>
<x-user-page-base>
<x-slot name="title">中綴じ製本お見積もり</x-slot>
<x-slot name="css"></x-slot>
<x-slot name="main">
<div class="container">
    <div class="row pt-3">
        <div class="col-12">
        	<h1 class="text-center text-primary">中綴じ製本お見積もり</h1>
        </div>
    </div>
</div>
<div class="row pt-3">
	<div class="col-8 mx-auto">
		<table class="table table-striped">
			<tr>
				<th>印刷製本タイプ</th>
				<td>中綴じ製本</td>
			</tr>
			<?php 
			$type=Namiseihon::find($request->size);
			?>
			<tr>
				<th>仕上がりサイズ</th>	<td>{{$type->type}}</td>
			</tr>
			<tr>
				<th>表紙</th><td>{{$request->hyoshi}}</td>
			</tr>
@if($request->hyoshi == "あり")
				<?php 
			$h_id = explode("-",$request->hyoshi_paper);
			$youshi = HyoshiNami::find($h_id[0]);
			?>
						
			<tr>
				<th>表紙用紙</th><td>{{$youshi->type." ".$youshi->name." ".$youshi->kinryo}}</td>
			</tr>
	@if($request->has('hyoshi_color'))<!-- $request 表紙カラーがないとき -->
				<?php 
				$h_color=Color::find($request->hyoshi_color);
	
			?>
			
			<tr>
				<th>表紙用紙カラー</th><td>{{$h_color->color}}</td>
			</tr>
		@endif<!-- $request 表紙カラーがないとき -->
			<?php 
			if($request->hyoshi_print_color == 1){
			    $hyoushi_print_color="フルカラー";
			}else{
			    $hyoushi_print_color="黒一色";
			}
			?>
		
			<tr>
				<th>表紙印刷カラー</th><td>{{$hyoushi_print_color}}</td>
			</tr>
			<tr>
				<th>表２表３印刷</th><td>{{$request->h2h3}}</td>
			</tr>
		@if($request->h2h3 == "あり")
				<?php if($request->h2h3_color == 1){
			     $h2h3_print_color="フルカラー";
			}else{
			    $h2h3_print_color="黒一色";
			}
			?>
			<tr>
				<th>表２表３印刷カラー</th><td>{{$h2h3_print_color}}</td>
			</tr>
	@endif
@endif
			
			<?php 
			$honbun = Honbun::find($request->honbun_paper);
			?>
			
			<tr>
				<th>本文用紙</th><td>{{$honbun->type." ".$honbun->name." ".$honbun->kinryo}}</td>
			</tr>
			<tr>
				<th>本文ページ数</th><td>{{$request->honbun_page}}</td>
			</tr>
			<?php 
			if($request->honbun_print_color == 1){
			 $honbun_print_color="フルカラー";
			}else{
			    $honbun_print_color="黒一色";
			}
			?>

			<tr>
				<th>本文印刷色</th><td>{{$honbun_print_color}}</td>
			</tr>
			<tr>
				<th>綴じ方向</th><td>{{$request->toji}}</td>
			</tr>

			<tr>
				<th>印刷部数</th><td>{{$request->busu}}</td>
			</tr>
			<?php 
			if($request->nouki == "特急"){
			    $p_nouki ="特急 ４営業日 （50%UP）";
			}elseif($request->nouki == "ゆっくり"){
			    $p_nouki ="ゆっくり 15営業日 (15%OFF)";
			}else{
			    $p_nouki="通常 ８営業日";
			}
			?>

			
			<tr>
				<th>納期</th>	<td>{{$request->nouki}}</td>
			</tr>
		</table>
		<p class="text-right">
			印刷製本金額 :<span class="fs-3"> {{number_format($seihon_gokei)}}円</span>
		</p>
		<p class="text-right">
			配送料金 :<span class="fs-5"> {{number_format($deliv_fee)}}円</span>
		</p>
		<p class="text-right">
			消費税 :<span class="fs-5"> {{number_format($tax)}}円</span>
		</p>
		<hr>
		<p class="text-right">お見積もり合計 :<span class="fs-5"> {{number_format($sougoukei)}}円</span></p>
	</div>
</div>

</x-slot>
<x-slot name="script">
<script>

</script>
</x-slot>
</x-user-page-base>
