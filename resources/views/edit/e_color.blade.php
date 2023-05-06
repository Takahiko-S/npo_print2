<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('用紙カラー設定') }}
        </h2>
    </x-slot>


<x-slot name="main">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <h3>用紙カラー登録リスト</h3>
                
                <button class="btn btn-primary" id="new_bt">新規登録</button>
                
				<div class="col-12 mt-4">
			<div class="row col-8  mx-auto">
				<div class="mb-3">
				<label for="d_color" class="form-label">カラー名</label>
				<input type="text" class="form-control" id="d_color" name="d_color">
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
      
      <form method="post" action="{{route('save_color')}}">
      @csrf
      <input type="hidden" id="d_id" name="d_id"><!-- レコードのID値 -->
		<div class="modal-body">
			<div class="mb-3">
				<label for="d_color" class="form-label">カラー名</label>
				<input type="text" class="form-control" id="d_color" name="d_color">
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
      
      <form method="post" action="{{route('save_color_new')}}">
      @csrf

		<div class="modal-body">
			<div class="mb-3">
				<label for="n_color" class="form-label">カラー名</label>
				<input type="text" class="form-control" id="n_color" name="n_color">
			</div>
			<div class="mb-3">
				<label for="n_biko" class="form-label">備考</label>
				<input type="text" class="form-control" id="n_biko" name="n_biko">
			</div>
			<div class="mb-3">
				<label for="n_flag" class="form-label">有効フラグ</label>
				<input type="number" class="form-control" id="n_flag" name="n_flag" min="0" max="1" value="1" required><!-- 0か1しか入らない -->
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
$('#d_color').val($('#color_' + data_id).html());
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