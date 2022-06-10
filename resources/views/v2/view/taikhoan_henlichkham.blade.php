@extends('v2/view/taikhoan',['title'=> 'Lịch hẹn khám'])
@section('taikhoan_content')

<div class="content-tk-home">
			
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
					@if(Session::get('user')->user_type_id == 0 || Session::get('user')->user_type_id == 1)
					<th scope="col"><strong>Bác sĩ</strong></th>
					@endif
					@if(Session::get('user')->user_type_id != 1)
					<th scope="col"><strong>Bệnh nhân</strong></th>
					@endif
					@if(Session::get('user')->user_type_id != 2)
					<th scope="col"><strong>Ngày sinh</strong></th>
					<th scope="col"><strong>Giới tính</strong></th>
					<th scope="col"><strong>Cân nặng</strong></th>
					@endif
					<th scope="col"><strong>Địa chỉ</strong></th>
					<th scope="col"><strong>SĐT</strong></th>
					<th scope="col"><strong>Thời gian</strong></th>
					<th scope="col"><strong>Nội dung</strong></th>
				</tr>
				</thead>
				<tbody>

				@if(isset($AppointmentSchedules))
					@foreach($AppointmentSchedules as $Appointment)
						<tr>
							<td scope="row">{{$Appointment->id}}</td>
							@if(Session::get('user')->user_type_id == 0 || Session::get('user')->user_type_id == 1)
							<td scope="row">
							<?php
							if($Appointment->doctor_id && $Appointment->doctor_id > 0 && $Appointment->doctor){
								$userItem  = $Appointment->doctor;
							?>
							<a data-toggle="tooltip" title="Nhấn vào để trò chuyện" class="click-to-start-chat" href="javascript:void(0);" data-my-name="{{Session::get('user')->fullname}}" data-client-name="{{$userItem->doctor_name}}" data-chat-to="room_{{$userItem->user_id}}" data-chat-room="room_{{Session::get('user')->user_id}}_{{$userItem->user_id}}"><strong>{{$userItem->doctor_name}}</strong></a>
							<?php
							}
							if($Appointment->clinic_id && $Appointment->clinic_id > 0 && $Appointment->clinic){ 
								$userItem  = $Appointment->clinic;
								?>
								<a data-toggle="tooltip" title="Nhấn vào để trò chuyện" class="click-to-start-chat" href="javascript:void(0);" data-my-name="{{Session::get('user')->fullname}}" data-client-name="{{$userItem->clinic_name}}" data-chat-to="room_{{$userItem->user_id}}" data-chat-room="room_{{Session::get('user')->user_id}}_{{$userItem->user_id}}"><strong>{{$userItem->clinic_name}}</strong></a>
							<?php } ?>
							</td>
							@endif
							@if(Session::get('user')->user_type_id != 1)
							<td scope="row">
								<a data-toggle="tooltip" title="Nhấn vào để trò chuyện" class="click-to-start-chat" href="javascript:void(0);" data-my-name="{{Session::get('user')->fullname}}" data-client-name="{{$Appointment->name}}" data-chat-to="room_{{$Appointment->user_id}}" data-chat-room="room_{{Session::get('user')->user_id}}_{{$Appointment->user_id}}"><strong>{{$Appointment->name}}({{$Appointment->user_id}})</strong></a>
							</td>
							@endif
							@if(Session::get('user')->user_type_id != 2)
							<th scope="row">{{$Appointment->age}}</th>
							<th scope="row">
								<?php 
								if($Appointment->gender == 1){
									echo 'Nam';
								}
								if($Appointment->gender == 2){
									echo 'Nữ';
								}
								if($Appointment->gender == 3){
									echo 'Khác';
								}
								?>
							</th>
							<th scope="row">{{$Appointment->weight}}</th>
							@endif
							<td scope="row">{{$Appointment->address}}</td>
							<td scope="row">{{$Appointment->phone}}</td>
							<?php
								$appointment_at = date('Ymd', strtotime($Appointment->appointment_at));
								$appointment_at = DateTime::createFromFormat("Ymd", $appointment_at)
							?>
							<td>{{$appointment_at->format("d-m-Y H:i")}}</td>
							<td scope="row">{{$Appointment->content}}</td>
						</tr>
					@endforeach
				@endif
				</tbody>
			</table>
			@if($AppointmentSchedules != null)
			<div class="pagination" style="float: right">
				<span >
					{!! $AppointmentSchedules->appends(request()->input())->links(); !!}
				</span>
			</div>
			@endif

			<div style="clear: both;"></div>

		</div>

	</section>

</div>

@endsection