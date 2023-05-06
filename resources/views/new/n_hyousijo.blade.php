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
                <h1 class="text-primary mb-5">表紙上製本</h1>
                             				
			<form method="post" action="{{route('n_hyosi')}}">
          @csrf
       
				<div class="row col-12">
					<div class="mb-3 col-md-3">
						<label for="n_type" class="form-label">種類</label> <input
							type="text" class="form-control" id="n_type" name="n_type">
					</div>
					<div class="mb-3 col-md-3">
						<label for="n_name" class="form-label">用紙名</label> <input
							type="text" class="form-control" id="n_name" name="n_name">
					</div>
					<div class="mb-3 col-md-6">
						<label for="n_maker" class="form-label">メーカー</label> <input
							type="text" class="form-control" id="n_maker" name="n_maker">
					</div>
					<div class="mb-3col-md-6">
						<label for="n_youto" class="form-label">用途</label> <input
							type="text" class="form-control" id="n_youto" name="n_youto">
					</div>
					<div class="mb-3 col-md-2">
						<label for="n_kinryo" class="form-label">斤量</label> <input
							type="text" class="form-control" id="n_kinryo" name="n_kinryo">
					</div>
					<div class="mb-3 col-md-2">
						<label for="n_kirotanka" class="form-label">キロ単価</label> <input
							type="text" class="form-control" id="n_kirotanka" name="n_kirotanka">
					</div>
					<div class="mb-3 col-md-2">
						<label for="n_a3wide " class="form-label">A3ワイド単価</label> <input
							type="text" class="form-control" id="n_a3wide" name="n_a3wide">
					</div>
					<div class="mb-3 col-md-6">
						<label for="n_tokucho" class="form-label">特徴</label> <input
							type="text" class="form-control" id="n_tokucho" name=n_tokucho">
					</div>
					<div class="mb-3 col-md-6">
						<label for="n_sonota" class="form-label">その他</label> <input
							type="text" class="form-control" id="n_sonota" name="n_sonota">
					</div>
					<div class="mb-3 col-md-6">
						<label for="n_biko" class="form-label">備考</label> <input
							type="text" class="form-control" id="n_biko" name="n_biko"
							required>
					</div>
					<div class="mb-3 col-md-6">
						<label for="n_flag" class="form-label">有効フラグ</label> <input
							type="number" class="form-control" id="n_flag" name="n_flag"
							min="0" max="1" required>
						<!-- 0か1しか入らない -->
					</div>
					<div class="text-center">
						<button type="button" class="btn btn-secondary"
							data-bs-dismiss="modal">キャンセル</button>
						<button type="submit" class="btn btn-primary">新規登録</button>
					</div>
				</div>
			</form>
    		</div>

        </div>
    </div>
  </x-slot>
 
<x-slot name="script">
<script>

</script>
 </x-slot>
</x-app-layout>