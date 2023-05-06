<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('表紙上製本') }}
        </h2>
    </x-slot>


<x-slot name="main">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <h1 class="mb-5 text-primary">表紙上製本</h1>
                
                	<a href="./n_hyousijo"><button class="btn btn-primary">新規登録</button></a>
                
			<div class="row">
				<div class="col-12 mt-4">
				
				<table class="table table-striped">
						<thead>
							<tr>
								<th>id</th>
								<th>種類</th>
								<th>用紙名</th>
								<th>メーカー</th>
								<th>用途</th>
								<th>斤量</th>
								<th>キロ単価</th>
								<th>A3ワイド単価</th>
								<th>特徴</th>
								<th>その他</th>
								<th>メモ</th>
								<th>使用フラグ</th>
								<th>管理</th>
							</tr>
						</thead>
							@foreach($hyosijos as $hyosijo)
							
							<tr>
								<th>{{$hyosijo->id}}</th>
								<td id="type_{{$hyosijo->id}}">{{$hyosijo->type}}</td>
								<td id="name_{{$hyosijo->id}}">{{$hyosijo->name}}</td>
								<td id="maker_{{$hyosijo->id}}">{{$hyosijo->maker}}</td>
								<td id="youto_{{$hyosijo->id}}">{{$hyosijo->youto}}</td>
								<td id="kinryo_{{$hyosijo->id}}">{{$hyosijo->kinryo}}</td>
								<td id="kirotanka_{{$hyosijo->id}}">{{$hyosijo->kirotanka}}</td>
								<td id="a3wide_{{$hyosijo->id}}">{{$hyosijo->a3wide}}</td>
								<td id="tokucho_{{$hyosijo->id}}">{{$hyosijo->tokucho}}</td>
								<td id="sonota_{{$hyosijo->id}}">{{$hyosijo->sonota}}</td>
								<td id="biko_{{$hyosijo->id}}">{{$hyosijo->biko}}</td>
								<td id="flag_{{$hyosijo->id}}">{{$hyosijo->u_flag}}</td>
								
								<td>
								<a href="./e_hyosi?id={{$hyosijo->id}}">
							<button class="btn btn-primary">編集</button>
								</a>
								</td>
						
							@endforeach

				</table>
				
				</div>
			</div>


		</div>
        </div>
    </div>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="modal_bt" style="display:none">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">データ編集</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <form method="post" action="{{route('s_hyosi')}}">
      @csrf
      <input type="hidden" id="d_id" name="d_id"><!-- レコードのID値 -->
		<div class="modal-body">
			<div class="mb-3">
				<label for="d_type" class="form-label">種類</label>
				<input type="text" class="form-control" id="d_type" name="d_type">
			</div>
				<div class="mb-3">
				<label for="d_name" class="form-label">用紙名</label>
				<input type="text" class="form-control" id="d_name" name="d_name">
			</div>
				<div class="mb-3">
				<label for="d_maker" class="form-label">メーカー</label>
				<input type="text" class="form-control" id="d_maker" name="d_maker">
			</div>
				<div class="mb-3">
				<label for="d_youto" class="form-label">用途</label>
				<input type="text" class="form-control" id="d_youto" name="d_youto">
			</div>
				<div class="mb-3">
				<label for="d_kinryo" class="form-label">斤量</label>
				<input type="text" class="form-control" id="d_kinryo" name="d_kinryo">
			</div>
				<div class="mb-3">
				<label for="d_kirotanka" class="form-label">キロ単価</label>
				<input type="text" class="form-control" id="d_kirotanka" name="d_kirotanka">
			</div>
				<div class="mb-3">
				<label for="d_a3wide" class="form-label">A3ワイド単価</label>
				<input type="text" class="form-control" id="d_a3wide" name="d_a3wide">
			</div>
				<div class="mb-3">
				<label for="d_tokucho" class="form-label">特徴</label>
				<input type="text" class="form-control" id="d_tokucho" name=d_tokucho">
			</div>
			<div class="mb-3">
				<label for="d_sonota" class="form-label">その他</label>
				<input type="text" class="form-control" id="d_sonota" name="d_sonota">
			</div>
			<div class="mb-3">
				<label for="d_biko" class="form-label">備考</label>
				<input type="text" class="form-control" id="d_biko" name="d_biko" required>
			</div>
			<div class="mb-3">
				<label for="d_flag" class="form-label">有効フラグ</label>
				<input type="number" class="form-control" id="d_flag" name="d_flag" min="0" max="1" required><!-- 0か1しか入らない -->
			</div>
		</div>
		<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
        <button type="submit" class="btn btn-primary">変更を保存</button>
      </div>
      </form>
    </div>
  </div>
</div>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2" id="modal_new" style="display:none">
  Launch demo modal
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabe2" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabe2">新規登録</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <form method="post" action="{{route('n_hyosi')}}">
      @csrf

		<div class="modal-body">
				<div class="mb-3">
				<label for="n_type" class="form-label">種類</label>
				<input type="text" class="form-control" id="n_type" name="n_type" >
			</div>
				<div class="mb-3">
				<label for="n_name" class="form-label">用紙名</label>
				<input type="text" class="form-control" id="n_name" name="n_name">
			</div>
				<div class="mb-3">
				<label for="n_maker" class="form-label">メーカー</label>
				<input type="text" class="form-control" id="n_maker" name="n_maker">
			</div>
				<div class="mb-3">
				<label for="n_youto" class="form-label">用途</label>
				<input type="text" class="form-control" id="n_youto" name="n_youto">
			</div>
				<div class="mb-3">
				<label for="n_kinryo" class="form-label">斤量</label>
				<input type="text" class="form-control" id="n_kinryo" name="n_kinryo">
			</div>
				<div class="mb-3">
				<label for="n_kirotanka" class="form-label">キロ単価</label>
				<input type="text" class="form-control" id="n_kirotanka" name="n_kirotanka">
			</div>
				<div class="mb-3">
				<label for="n_a3wide" class="form-label">A3ワイド単価</label>
				<input type="text" class="form-control" id="n_a3wide" name="n_a3wide">
			</div>
				<div class="mb-3">
				<label for="n_tokucho" class="form-label">特徴</label>
				<input type="text" class="form-control" id="n_tokucho" name=n_tokucho">
			</div>
			<div class="mb-3">
				<label for="n_sonota" class="form-label">その他</label>
				<input type="text" class="form-control" id="n_sonota" name="n_sonota">
			</div>
			<div class="mb-3">
				<label for="n_biko" class="form-label">備考</label>
				<input type="text" class="form-control" id="n_biko" name="n_biko" required>
			</div>
			<div class="mb-3">
				<label for="n_flag" class="form-label">有効フラグ</label>
				<input type="number" class="form-control" id="n_flag" name="n_flag" min="0" max="1" required><!-- 0か1しか入らない -->
			</div>
		</div>
		<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
        <button type="submit" class="btn btn-primary">新規登録</button>
      </div>
      </form>
    </div>
  </div>
</div>
 </x-slot>
 
<x-slot name="script">
<script>
//編集ボタンクリック
$('.edit_bt').on('click',function(e){
var data_id= $(this).attr('value');
console.log(data_id);
$('#d_id').val(data_id);
$('#d_type').val($('#type_' + data_id).html());
$('#d_name').val($('#name_' + data_id).html());
$('#d_maker').val($('#maker_' + data_id).html());
$('#d_youto').val($('#youto_' + data_id).html());
$('#d_kinryo').val($('#kinryo_' + data_id).html());
$('#d_kirotanka').val($('#kirotanka_' + data_id).html());
$('#d_tokucho').val($('#tokucho_' + data_id).html());
$('#d_sonota').val($('#sonota_' + data_id).html());
$('#d_a3wide').val($('#a3wide_' + data_id).html());
$('#d_biko').val($('#biko_' + data_id).html());
$('#d_flag').val($('#flag_' + data_id).html());
$('#modal_bt').trigger('click');<!--モーダル開く-->
});

$('#new_bt').on('click',function(e){
	console.log('新規作成');
	$('#modal_new').trigger('click');
	
});
</script>
 </x-slot>
</x-app-layout>