<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('用紙カラー設定') }}
        </h2>
    </x-slot>
<x-slot name="main">
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1 class="text-center text-primary p-3">カラー設定</h1>
		</div>
	</div>
			 <button class="btn btn-primary" id="new_bt">新規登録</button>
	<div class="row">
		<div class="col-12">
		@csrf
			<form method="post" action="save_color">
			<table class="table table-striped">
            <thead>
            <tr class="text-center">
            <th>ID</th>
            <th>表紙紙色</th>
            <th>備考</th>
            <th>使用フラグ</th>
            <th>管理</th>
            </tr>
            </thead>
            <tbody>
		@foreach($colors as $color)
            <tr class="text-center">
            <th> {{$color->id}}</th>
            <td id="color_{{$color->id}}">{{$color->color}}</td>
            <td id="biko_{{$color->id}}">{{$color->biko}}</td>
            <td id="flag_{{$color->id}}">{{$color->u_flag}}</td>
            <td id><button type="button" class="btn btn-primary edit_bt" value="{{$color->id}}">編集</button></td>
            </tr>
		@endforeach
            </tbody>
            </table>
			</form>
		</div>
	</div>
	
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" id="modal_bt" data-bs-toggle="modal" data-bs-target="#exampleModal" style="display:none">
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
			<div class="modal-body">
				<form method="post" action="{{route('save_color')}}">
					@csrf 
					<input type="hidden" id="d_id" name="d_id">
					<div class="modal-body">
					<div class="mb-3">
						<label for="d_color" class="form-label">カラー名</label> 
						<input	type="text" class="form-control" id="d_color" name="d_color">
					</div>
					<div class="mb-3">
						<label for="d_biko" class="form-label">備考</label>
						<input	type="text" class="form-control" id="d_biko" name="d_biko">
					</div>
					<div class="mb-3">
						<label for="d_flag" class="form-label">使用フラグ</label>
						<input	type="number" class="form-control" id="d_flag" name="d_flag"	max="1" min="0">
					</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary"	data-bs-dismiss="modal">キャンセル</button>
						<button type="submit" class="btn btn-primary">変更を保存</button>
					</div>
				</form>
			</div>
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
      
      <form method="post" action="{{route('new_color')}}">
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
$('#modal_new').trigger('click');
});
</script>


</x-slot>
</x-app-layout>