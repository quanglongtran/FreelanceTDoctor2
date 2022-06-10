@extends('v2/view/taikhoan',['title'=> 'Danh sách hẹn'])
@section('content')

<div class="container">
	<div class="">
		<style>
			.btn-balance-update{
				font-size: 1rem;
			}
		</style>
		<section class="sec-acc-home" style="margin-bottom: 20px;">
			<form action="/taikhoan/admin-recharge" method="get">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div style="float: right;">
	{{--				<input name="query" placeholder="Tìm kiếm" class="form-control" type="text"></div>--}}
			</form>
			<div class="section-header">
				<h2 style="margin-top: 15px;"><i class="fa fa-fw fa-list" aria-hidden="true"></i>
					Danh sách hẹn
				</h2>
			</div>
			<div class="section-body">
				<table class="table">
					<thead class="thead-light">
					<tr>
						<th scope="col"><strong>ID</strong></th>
						<th scope="col"><strong>Chuyên khoa</strong></th>
						<th scope="col"><strong>Bác sĩ</strong></th>
						<th scope="col"><strong>Đặt hẹn lúc</strong></th>
						<th scope="col"><strong>Người đặt hẹn</strong></th>
						<th scope="col"><strong>Phone</strong></th>
						<th scope="col"><strong>Email</strong></th>
						<th scope="col"><strong>Ngày sinh</strong></th>
						<th scope="col"><strong>Công việc</strong></th>
						<th scope="col"><strong>Nội dung</strong></th>
						<th scope="col"><strong>Gia đình</strong></th>
						<th scope="col"><strong>Giới tính</strong></th>
						<th scope="col"><strong>Nơi ở</strong></th>
						<th scope="col"><strong>Địa chỉ</strong></th>
					</tr>
					</thead>
					<tbody>

					@if(isset($makeAnAppointments))
						@foreach($makeAnAppointments as $makeAnAppointment)
							<tr>
								<td scope="row">{{$makeAnAppointment->id}}</td>
								<?php
								$speciality = \App\Speciality::where('speciality_id', $makeAnAppointment->speciality_id)->first();
								?>
								<td>{{$speciality->speciality_name}}</td>

								<?php
								$doctor = \App\Doctor::where('doctor_id', $makeAnAppointment->	doctor_id)->first();
								?>
								<td>{{$doctor->doctor_name}}</td>
								<?php
									$appointmentAt = date('YmdHi', strtotime($makeAnAppointment->appointment_at));
									$dateTime = DateTime::createFromFormat("YmdHi", $appointmentAt)
								?>
								<td>{{$dateTime->format("d-m-Y H:i")}}</td>
								<td>{{$makeAnAppointment->name}}</td>
								<?php
									$bornAt = date('Ymd', strtotime($makeAnAppointment->born));
									$dateTimeBorn = DateTime::createFromFormat("Ymd", $bornAt)
								?>
								<td>{{$dateTimeBorn->format("d-m-Y")}}</td>
								<td>{{$makeAnAppointment->phone}}</td>
								<td>{{$makeAnAppointment->email}}</td>
								<td>{{$makeAnAppointment->job}}</td>
								<td>{{$makeAnAppointment->content}}</td>
								<?php
								$ttg = "";
								if ($makeAnAppointment->ttgd == 0) {
									$ttg = "Chưakết hôn";
								}
								else {
									$ttg = "Đã kết hôn";
								}
								?>
								<td>{{$ttg}}</td>
								<?php
								$gender = "";
								if ($makeAnAppointment->gender == 0) {
									$gender = "Nữ";
								}
								else {
									$gender = "Nam";
								}
								?>
								<td>{{$gender}}</td>
								<td>{{$makeAnAppointment->stay_at}}</td>
								<td>{{$makeAnAppointment->address}}</td>
							</tr>
						@endforeach
					@endif
					</tbody>
				</table>
				<div class="pagination" style="float: right">
					<span >
						{!! $makeAnAppointments->appends(request()->input())->links(); !!}
					</span>
				</div>

				<div style="clear: both;"></div>
			</div>

		</section>

	</div>
</div>

@endsection