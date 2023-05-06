<x-user-page-base>
<x-slot name="title"></x-slot>
<x-slot name="css"></x-slot>
<x-slot name="main">
<div class="container">
    <div class="row pt-3">
        <div class="col-12">
        	<h1 class="text-center text-primary">中綴じ製本見積り</h1>
        </div>
    </div>
</div>

<div class="container">
	<form method="post" action="./naka_mitsumori">
		@csrf
		<div class="row pt-3">
			<div class="col-md-8 mx-auto">
				<div class="mb-3">
				<h5>仕上がりサイズを選択</h5>
					<select class="form-select" name="size" id="size" required>
						<option selected value="">仕上がりサイズを選択してください</option><!--valueを入れないとrequiredが効かないでボタンを押したら飛ぶ -->
						@foreach($sizes as $size)
						<option value="{{$size->id}}">{{$size->type}}</option>
						@endforeach
					</select>
				</div>
				<div class="mb-3">
				<h5>表紙の選択</h5>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio"	name="hyoshi" id="hyoshi1" value="あり" checked>
						<label class="form-check-label" for="hyoshi">表紙あり</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio"	name="hyoshi" id="hyoshi2" value="なし"> 
						<label	class="form-check-label" for="hyoshi">表紙なし</label>
					</div>
				</div>
				<div class="mb-3">
				<h5>表紙用紙の選択</h5>
					<select class="form-select" name="hyoshi_paper" id="hyoshi_paper" required>
						<option selected value="">表紙用紙を選択してください</option><!--valueを入れないとrequiredが効かないでボタンを押したら飛ぶ -->
						@foreach($hyosis as $hyoshi)
						<option value="{{$hyoshi->id .'-' . $hyoshi->c_flag}}">{{$hyoshi->type ." ". $hyoshi->name . " " . $hyoshi->kinryo}}</option>
						@endforeach
					</select>
				</div>	
				<div class="mb-3">
				<h5>表紙カラー選択</h5>
					<select class="form-select" name="hyoshi_color" id="hyoshi_color" required disabled>
						<option selected value="">表紙用紙を選択してください</option><!--valueを入れないとrequiredが効かないでボタンを押したら飛ぶ -->
						@foreach($colors as $color)
						<option value="{{$color->id}}">{{$color->color}}</option>
						@endforeach
					</select>
				</div>	
				<div class="mb-3">
				<h5>表紙印刷カラーの選択</h5>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio"	name="hyoshi_print_color" id="hyoshi_print_color1" value="0" checked>
						<label class="form-check-label" for="hyoshi_print_color">黒一色</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio"	name="hyoshi_print_color" id="hyoshi_print_color2" value="1"> 
						<label	class="form-check-label" for="hyoshi_print_color">フルカラー</label>
					</div>
				</div>
				<div class="mb-3">
				<h5>表２表３印刷の選択</h5>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio"	name="h2h3" id="h2h3_1" value="あり" checked>
						<label class="form-check-label" for="h2h3">表２表３印刷あり</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio"	name="h2h3" id="h2h3_2" value="なし"> 
						<label	class="form-check-label" for="h2h3">表２表３印刷なし</label>
					</div>
				</div>
				<div class="mb-3">
					<h5>表２表３印刷カラーの選択</h5>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio"	name="h2h3_color" id="h2h3_color1" value="0" checked>
						<label class="form-check-label" for="h2h3_color">黒一色</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio"	name="h2h3_color" id="h2h3_color2" value="1"> 
						<label	class="form-check-label" for="h2h3_color">フルカラー</label>
					</div>
				</div>
				<div class="mb-3">
				<h5>本文用紙選択</h5>
					<select class="form-select" name="honbun_paper" id="honbun_paper" required>
						<option selected value="">本文用紙を選択してください</option><!--valueを入れないとrequiredが効かないでボタンを押したら飛ぶ -->
						@foreach($honbuns as $honbun)
						<option value="{{$honbun->id}}">{{$honbun->type ." ". $honbun->name . " " . $honbun->kinryo}}</option>
						@endforeach
					</select>
				</div>
				<div class="mb-3">
					<h5>本文ページ選択</h5>
					<select class="form-select" name="honbun_page" id="honbun_page" required>
						@for($i = 8; $i <=80; $i=$i+4)
						<option value="{{$i}}">{{$i}}</option>
						@endfor
					</select>
				</div>
				
				<div class="mb-3">
					<h5>本文印刷カラーの選択</h5>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio"	name="honbun_print_color" id="honbun_print_color1" value="0" checked>
						<label class="form-check-label" for="h2h3_color">黒一色</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio"	name="honbun_print_color" id="honbun_print_color2" value="1"> 
						<label	class="form-check-label" for="h2h3_color">フルカラー</label>
					</div>
				</div>
				
				<div class="mb-3">
					<h5>綴じ方向</h5>
					<select class="form-select" name="toji" id="toji"required>
						<option value="左綴じ">左綴じ</option>
						<option value="右綴じ">右綴じ</option>
						<option value="上綴じ">上綴じ</option>
					</select>
				</div>

				<div class="mb-3">
					<label for="部数" class="form-label">印刷部数</label>
					<input type="number" class="form-control" name="busu" id="busu" min="1" value="1">
				</div>

				<div class="mb-5">
					<h5>納期選択</h5>
					<select class="form-select" name="nouki" id="nouki" required>
						<option value="通常">通常 ８営業日</option>
						<option value="特急">特急 ４営業日 （50%UP）</option>
						<option value="ゆっくり">ゆっくり 15営業日 (15%OFF)</option>
					</select>
					
				</div>

				<div class="mb-3">
				<button type="submit" class="btn btn-primary">見積りを表示</button>
				</div>
			</div>
				
				
				
			
		</div>
	</form>
</div>





</x-slot>
<x-slot name="script">
<script>
//firefoxリロード時の対応
if($("input[name='hyoshi']:checked").val()=="なし"){
	console.log('なしの処理');
	$('#hyoshi_paper').attr('disabled',true);
	$('#hyoshi_color').attr('disabled',true);
	$('#hyoshi_print_color1').attr('disabled',true);
	$('#hyoshi_print_color2').attr('disabled',true);
	
	$('#h2h3_1').attr('disabled',true);
	$('#h2h3_2').attr('disabled',true);
	$('#h2h3_color1').attr('disabled',true);
	$('#h2h3_color2').attr('disabled',true);
	
}


$("input[name='hyoshi']").on('change',function(e) {
	var hyoshi = $("input[name='hyoshi']:checked").val();
	if(hyoshi == "あり"){
		console.log("ありの処理");
		$('#hyoshi_paper').attr('disabled',false);
		$('#hyoshi_print_color1').attr('disabled',false);
		$('#hyoshi_print_color2').attr('disabled',false);
		
		$('#h2h3_1').attr('disabled',false);
		$('#h2h3_2').attr('disabled',false);
		$('#h2h3_color1').attr('disabled',false);
		$('#h2h3_color2').attr('disabled',false);

		var s_color =$('#hyoshi_paper').val();

		var tag =s_color.split('-');
		if(tag[1] == 1){
			$('#hyoshi_color').attr('disable',false);
		}
		if($("input[name='h2h3']:checked").val() =="なし"){
			$('#h2h3_color1').attr('disabled',true);
			$('#h2h3_color2').attr('disabled',true);
			}

		
	}else{
		console.log('なしの処理');
		$('#hyoshi_paper').attr('disabled',true);
		$('#hyoshi_color').attr('disabled',true);
		$('#hyoshi_print_color1').attr('disabled',true);
		$('#hyoshi_print_color2').attr('disabled',true);
		
		$('#h2h3_1').attr('disabled',true);
		$('#h2h3_2').attr('disabled',true);
		$('#h2h3_color1').attr('disabled',true);
		$('#h2h3_color2').attr('disabled',true);

		}
});

$('#hyoshi_paper').on('change',function(e){//表紙用紙を選択したらカラーフラグの有無によって下の表紙カラーが選択できるようになる

	var flag =$(this).val().split('-');
	console.log(flag[1]);
	if(flag[1] == 1){
		$('#hyoshi_color').attr('disabled',false);
	
			}else{
			$('#hyoshi_color').attr('disabled',true);
			}
});

$("input[name='h2h3']").on('change',function(e) {
	var hyoshi = $("input[name='h2h3']:checked").val();
	if(hyoshi == "あり"){
		console.log("ありの処理");
		$('#h2h3_color1').attr('disabled',false);
		$('#h2h3_color2').attr('disabled',false);
	}else{
		console.log('なしの処理');
		$('#h2h3_color1').attr('disabled',true);
		$('#h2h3_color2').attr('disabled',true);

		}
});











</script>
</x-slot>
</x-user-page-base>
