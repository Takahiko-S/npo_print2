<x-user-page-base>
<x-slot name="title"></x-slot>
<x-slot name="css"></x-slot>
<x-slot name="main">
<div class="container">
    <div class="row pt-3 mb-5">
        <div class="col-12">
        	<h1 class="text-center text-primary">NPO印刷見積りシステムdesuyo</h1>
        </div>
    </div>
    <div class="row mb-5">
    <div class="col-md-4 mb-3">
    <p class="d-grid mb-5"><a href="{{route('naka')}}" class="btn btn-secondary">中綴じ製本見積り</a></p>
    <h3 class="mb-4">中綴じ印刷製本の特徴</h3>
	 <p class="">最低ページ数 8ページ<br>上限ページ数 80ページ</p>
    </div>
    <div class="col-md-4 mb-3">
    <p class="d-grid mb-5"><a href="{{route('pur')}}" class="btn btn-secondary">無線綴じ製本見積り</a></p>
    <h3 class="mb-4">無線綴じ印刷製本の特徴</h3>
	 <p class="">最低ページ数 16ページ<br>上限ページ数 500ページ</p>
    </div>
    <div class="col-md-4 mb-3">
    <p class="d-grid mb-5"><a href="{{route('jo')}}" class="btn btn-secondary">上製本見積り</a></p>
    <h3 class="mb-4">上製本印刷製本の特徴</h3>
	 <p class="">最低ページ数 32ページ<br>上限ページ数 500ページ</p>
    </div>
    <div class="col-md-4 mb-3">
        <p class="d-grid mb-5"><a href="{{route('jo')}}" class="btn btn-secondary">上製本見積り</a></p>
        <h3 class="mb-4">上製本印刷製本の特徴</h3>
         <p class="">最低ページ数 32ページ<br>上限ページ数 500ページ</p>
        </div>
    </div>

</div>

</x-slot>
<x-slot name="script">
<script>

</script>
</x-slot>
</x-user-page-base>
