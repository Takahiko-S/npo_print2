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
                <h3>表紙上製本</h3>
                
                <button class="btn btn-primary" id="new_bt">新規登録</button>
                
				
			<form method="post" action="{{route('s_hyosi')}}">
          @csrf
         <input type="hidden" id="d_id" name="d_id" value="{{$id}}"><!-- レコードのID値 -->
         

    		<div class="row col-12">
    			<div class="mb-3 col-md-3">
    				<label for="d_type" class="form-label">種類</label>
    				<input type="text" class="form-control" id="d_type" name="d_type" value="{{$e_hyousis->type}}">
    			</div>

    				<div class="mb-3 col-md-3">
    				<label for="d_name" class="form-label">用紙名</label>
    			<input type="text" class="form-control" id="d_name" name="d_name" value="{{$e_hyousis->name}}">
    			</div>
    				<div class="mb-3 col-md-6">
    				<label for="d_maker" class="form-label">メーカー</label>
    				<input type="text" class="form-control" id="d_maker" name="d_maker" value="{{$e_hyousis->maker}}">
    			</div>
    				<div class="mb-3 col-md-6">
    				<label for="d_youto" class="form-label">用途</label>
    				<input type="text" class="form-control" id="d_youto" name="d_youto" value="{{$e_hyousis->youto}}">
    			</div>
    				<div class="mb-3 col-md-2">
    				<label for="d_kinryo" class="form-label">斤量</label>
    				<input type="text" class="form-control" id="d_kinryo" name="d_kinryo" value="{{$e_hyousis->kinryo}}">
    			</div>
    				<div class="mb-3 col-md-2">
    				<label for="d_kirotanka" class="form-label">キロ単価</label>
    				<input type="text" class="form-control" id="d_kirotanka" name="d_kirotanka" value="{{$e_hyousis->kirotanka}}">
    			</div>
    				<div class="mb-3 col-md-2">
    				<label for="d_a3wide" class="form-label">A3ワイド単価</label>
    				<input type="text" class="form-control" id="d_a3wide" name="d_a3wide" value="{{$e_hyousis->a3wide}}">
    			</div>
    				<div class="mb-3 col-md-6">
    				<label for="d_tokucho" class="form-label">特徴</label>
    				<input type="text" class="form-control" id="d_tokucho" name="d_tokucho" value="{{$e_hyousis->tokucho}}">
    			</div>
    			<div class="mb-3 col-md-6">
    				<label for="d_sonota" class="form-label">その他</label>
    				<input type="text" class="form-control" id="d_sonota" name="d_sonota" value="{{$e_hyousis->sonota}}">
    			</div>
    			<div class="mb-3 col-md-6">
    				<label for="d_biko" class="form-label">備考</label>
    			<input type="text" class="form-control" id="d_biko" name="d_biko" value="{{$e_hyousis->biko}}">
    			</div>
    			<div class="mb-3 col-md-6">
    				<label for="d_flag" class="form-label">有効フラグ</label>
    				<input type="number" class="form-control" id="d_flag" name="d_flag" min="0" max="1" value="{{$e_hyousis->u_flag}}"><!-- 0か1しか入らない -->
    			</div>
    		<div class="text-center">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
            <button type="submit" class="btn btn-primary">変更を保存</button>
          </div>
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
				<input type="text" class="form-control" id="n_type" name="n_type">
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