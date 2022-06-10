@extends('v2/view/taikhoan',['title'=> 'Danh mục tin tức'])
@section('taikhoan_content')

<div class="content-tk-home" style="width: 100%;">
			
	<section class="sec-acc-home" style="margin-bottom: 20px;">
		<div class="section-header">
			<h2 style="margin-top: 15px;"><i class="fa fa-fw fa-list" aria-hidden="true"></i>
				Danh sách đặt lịch
			</h2>
		</div>
		<div class="section-body">
			<table class="table">
				<thead class="thead-light">
				<tr>
					<th scope="col"><strong>ID</strong></th>
					<th scope="col"><strong>Tiêu đề</strong></th>
					<th scope="col"><strong>Url</strong></th>
					<th scope="col"><strong>Hành động</strong></th>
				</tr>
				</thead>
				<tbody>
				@if(isset($Catalog))
					@foreach($Catalog as $item)
						<tr>
							<td scope="row">{{$item->id}}</td>							
							<td scope="row"><a target="_blank" href="/chuyenmuc/{{$item->name_url}}-{{$item->id}}">{{$item->name}}</a></td>							
							<td scope="row">{{$item->name_url}}</td>							
							<td scope="row"><a class="btn btn-primary" href="/taikhoan/sua-danh-muc?id={{$item->id}}">Sửa</a></td>							
						</tr>
					@endforeach
				@endif
				</tbody>
			</table>
			@if($Catalog != null)
			<div class="pagination" style="float: right">
				<span >
					{!! $Catalog->appends(request()->input())->links(); !!}
				</span>
			</div>
			@endif

			<div style="clear: both;"></div>

		</div>

	</section>

</div>

@endsection