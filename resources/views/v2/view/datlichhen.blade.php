@extends('v2/structor/main',['title'=> 'Bác sĩ chi tiết'])
@section('content')
<div class="container">
	
	<div id="thread-create">
		<h3 >Đặt lịch hẹn bác sĩ</h3>

		@if($errors->has('errorMs'))
			<div class="form-row">
	            <div class="alert alert-danger">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                {{$errors->first('errorMs')}}
	            </div>
	        </div>
        @endif
		@if($errors->has('successMs'))
			<div class="form-row">
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Đã gửi lịch hẹn cho bác sĩ
				</div>
			</div>
		@endif
		<form name="new-question" class="question-new" action="{{url('dat-lich-hen')}}" method="POST">
			<input type="hidden" name="_token" value="{{csrf_token()}}"/>
			<div class="form-group reset">
				<label>
					<strong>Hẹn vào lúc</strong>
					<span>*</span>
				</label>

				<input name="appointment_at" required="" type="datetime-local"/>
			</div>
			<div class="form-group reset">
				<label>
					<strong>Bác sĩ bạn hẹn là</strong>
					<span>*</span>
				</label>

				<input hidden name="doctor_id" value="@if(isset($doctor)){{$doctor->doctor_id}} @else{{'0'}} @endif" type="text"/>
				<input name="doctor_name" disabled="true" value="@if(isset($doctor)){{$doctor->doctor_name}} @else{{'Không tìm thấy bác sĩ'}} @endif" type="text"/>
			</div>
			<div class="form-group reset">
				<label>
					<strong>Nơi hẹn</strong>
					<span>*</span>
				</label>

				<input name="address" required="" type="text"/>
			</div>

			<div class="form-group full">
				<label>
					<strong>Nội dung</strong> <span>*</span>
				</label>

				<textarea name="content" placeholder="Nội dung lịch hẹn"></textarea>
			</div>

{{--			<div class="form-group full more-info show">--}}
{{--				<label class="btn-toggle">--}}
{{--					<strong>Bạn có thể cung cấp thêm thông tin về bệnh nhân và câu hỏi để bác sĩ tư vấn cụ thể hơn</strong>--}}

{{--					<span>--}}
{{--						<i class="fa fa-plus" id="plus"></i>--}}
{{--						<i class="fa fa-minus" id="minus"></i>--}}
{{--					</span>--}}
{{--				</label>--}}
{{--			</div>		 	--}}

{{--			<div class="form-group left">--}}
{{--				<label><strong>Tên của bạn</strong></label>--}}

{{--				<input name="name" placeholder="Nhập vào tên của bạn." @if(Session::get('user')!=null) value="{{Session::get('user')->fullname}}" @endif type="text">--}}
{{--			</div>--}}

{{--			<div class="form-group right">--}}
{{--				<label>--}}
{{--					<strong>Email của bạn</strong>--}}
{{--					<span>*</span>--}}
{{--				</label>--}}

{{--				<input name="email" required="" @if(Session::get('user')!=null) value="{{Session::get('user')->email}}" @endif type="email">--}}
{{--			</div>--}}

{{--			<input name="user_id" @if(Session::get('user')!=null) value="{{Session::get('user')->user_id}}" @endif type="hidden">--}}

			<button type="submit" class="btn btn-primary">Gửi lịch hẹn bác sĩ</button>
		</form>
	</div>

</div>
@endsection