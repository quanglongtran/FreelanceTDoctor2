@extends('v2/view/taikhoan',['title'=> 'Bệnh án của tôi'])
@section('taikhoan_content')

<div class="content-tk-home">
			
	<section class="sec-acc-home" style="margin-bottom: 20px;">
		<div class="section-header">
			<h2 style="margin-top: 15px;"><i class="fa fa-fw fa-list" aria-hidden="true"></i>
				Bệnh án của tôi
			</h2>
		</div>
		<div class="section-body-benhan">
			<table class="table">
				<thead class="thead-light">
				<tr>
                    <th scope="col"><strong>Bác sĩ</strong></th>
					<th scope="col"><strong>Triệu chứng</strong></th>
                    <th scope="col"><strong>Kết luận</strong></th>
                    <th scope="col"><strong>Toa thuốc</strong></th>
                    <th scope="col"><strong>Ngày tái khám</strong></th>
                    <th scope="col"><strong>Ghi chú</strong></th>
                    <th scope="col"><strong>Ngày Tạo</strong></th>
				</tr>
				</thead>
				<tbody>

				@if(isset($dataQuery))
					@foreach($dataQuery as $item)
						<tr>
							<td scope="row">
							<?php
								$ten_bs_kham = "";
								if(isset($item->doctor) && $item->doctor){
									$ten_bs_kham = $item->doctor->doctor_name;									
								}
								if(isset($item->clinic) && $item->clinic){
									$ten_bs_kham = $item->clinic->clinic_name;
								}
								?><a data-toggle="tooltip" title="Nhấn vào để trò chuyện" class="click-to-start-chat" href="javascript:void(0);" data-my-name="{{Session::get('user')->fullname}}" data-client-name="{{$ten_bs_kham}}" data-chat-to="room_{{$item->create_id}}" data-chat-room="room_{{Session::get('user')->user_id}}_{{$item->create_id}}"><strong>{{$ten_bs_kham}}</strong></a><?php
							?>
							</td>
							<td scope="row">{{$item->trieu_chung}}</td>
							<td scope="row">{{$item->ket_luan}}</td>
							<td scope="row">{{$item->toa_thuoc}}</td>
							<td scope="row">{{$item->ngay_tai_kham}}</td>
							<td scope="row">{{$item->ghi_chu}}</td>
							<td scope="row">{{$item->created_at}}</td>
						</tr>
					@endforeach
				@endif
				</tbody>
			</table>
			@if($dataQuery != null)
			<div class="pagination" style="float: right">
				<span >
					{!! $dataQuery->appends(request()->input())->links(); !!}
				</span>
			</div>
			@endif

			<div style="clear: both;"></div>

		</div>

	</section>

</div>

@endsection