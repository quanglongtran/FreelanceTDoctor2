@extends('v2/structor/main',['title'=> 'Hẹn lịch khám', 'meta_keywords' => 'đặt lịch khám bênh online, hẹn giờ khám bệnh online, hẹn lịch bác sĩ tư vấn, lịch hẹn khám bệnh với bác sĩ, đặt lịch khám bệnh trực tuyến'])
@section('content')
<?php
$class_click_to_login = '';
if(true && !Session::has('user')){
	$class_click_to_login = ' btn-req-login';
}
$string_chat_voi_ho_tro_vien = '';
if(!Session::get('user')==null){

// 	$string_chat_voi_ho_tro_vien = '<a href="javascript:void(0);" class="btn click-to-start-chat btn-shortcode" data-my-name="ADMIN" data-client-name="Hỗ trợ viên" data-chat-to="room_464103899" data-chat-room="room_464103899_18" style="
//     padding: 0;
//     background: transparent;
//     color: #e84f5e;
//     font-weight: 700;
//     font-size: 15px;
//     letter-spacing: 0;
// ">
//             Chat với hỗ trợ viên
//         </a>';
        $string_chat_voi_ho_tro_vien = '<a href="javascript:void(0);" class="btn btn-ok btn-rounded click-to-start-chat" data-my-name="'.Session::get('user')->fullname.'" data-client-name="Hỗ trợ viên" data-chat-to="room_464103899" data-chat-room="room_464103899_'.Session::get('user')->user_id.'" style=" padding: 0; background: transparent; color: #e84f5e; font-weight: 700; font-size: 15px; letter-spacing: 0; border: 0 none;">Hỗ trợ kết nối</a>';
}
$noi_dung_top_dat_kham = $content_page_datlichkham->noi_dung;
if(isset($doctor_kham)){
	$noi_dung_top_dat_kham = str_replace('[tenbacsi]', $doctor_kham->doctor_name, $noi_dung_top_dat_kham);
}else{
	$noi_dung_top_dat_kham = str_replace('[tenbacsi]', '', $noi_dung_top_dat_kham);
}
$noi_dung_top_dat_kham = str_replace('[hotrovien]', $string_chat_voi_ho_tro_vien, $noi_dung_top_dat_kham);
?>
<div class="container {{$class_click_to_login}}">
	
	<div id="thread-create">
		@if(false)
		@if(isset($doctor_kham))
		<h3>Đặt lịch hẹn khám gọi online trực tiếp bác sĩ {{$doctor_kham->doctor_name}} phí là 200k/ca gọi trong 15 phút</h3>
		@elseif(isset($clinic_kham))
		<h3>Đặt lịch hẹn khám gọi online trực tiếp phòng khám {{$clinic_kham->clinic_name}} phí là 200k/ca gọi trong 15 phút</h3>
		@else
		<h3>Đặt lịch hẹn khám online trực tiếp bác sĩ phí là 200k/ca gọi trong 15 phút</h3>
		@endif
		<h4 style="color: #ff749c; font-size: 18px;">Liên hệ Hotline/Zalo: 0393 167 234</h4>
		@endif
		{!!\App\Helpers\UploadFileHelper::correctPath( $noi_dung_top_dat_kham )!!}

		@if(Session::get('user')!=null && Session::get('user')->user_type_id == 0)
    <li class="admin-edit-link" style="margin-left: 10px;color: #e84f5e;"><a href="/sua-trang/{{$content_page_datlichkham->id}}">Sửa trang</a></li>
    @endif

		@if($errors->has('errorMs'))
			<div class="form-rowx">
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
					{{$errors->first('successMs')}}
				</div>
			</div>		
<!-- Modal show bệnh án-->
<div id="thong_tin_dat_kham_Modal" class="modal fade modal-lg" role="dialog" style="margin:auto;">
  <div class="modal-dialog" style="max-width: 100%;">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="display: block;">
        <button type="button" class="close" data-dismiss="modal" style="display: inline-block;">&times;</button>
         <h3 class="modal-title">Thanh toán ngay để được xếp lịch <strong></strong></h3>       
      </div>
      <div class="modal-body">
        <div class="section-body-benhan section-thong-tin-thanh-toan">
        	<p>
        	+ Bạn hãy thanh toán 200k phí khám bệnh với bác sĩ <strong>{{$doctor_kham->doctor_name}}</strong> bằng cách chuyển khoản vào:<br/>
					Ngân hàng TMCP Ngoại thương Việt Nam <strong>Vietcombank (Chi nhánh TP.HCM)</strong><br/>
					Tên tài khoản: <strong>Công ty cổ phần giải pháp TDoctor</strong><br/>
					Số tài khoản: <strong>1019594158</strong><br/>
					với nội dung chuyển khoản: <strong>tdoctor-{{$doctor_kham->doctor_id}}</strong> <br/>
					+ Hệ thống sẽ xác nhận đặt khám ngay khi nhận được chuyển khoản thành công.<br/>
					+ Cần bất cứ hỗ trợ nào khác hãy liên hệ @if(!Session::get('user')==null)
		        <a href="javascript:void(0);" class="btn btn-ok btn-rounded click-to-start-chat" data-my-name="{{Session::get('user')->fullname}}" data-client-name="Hỗ trợ viên" data-chat-to="room_464103899" data-chat-room="room_464103899_{{Session::get('user')->user_id}}">
		            Hỗ trợ kết nối
		        </a>
		        @else
		        <a href="javascript:void(0);" class="btn btn-ok btn-rounded btn-login-to-chat" data-url="/frameLogin">
		            Hỗ trợ kết nối
		        </a>
		        @endif
		         <br/>
                hoặc Hotline/Zalo: <strong>0393167234 / 0792438397 / 0905699983</strong>
		       </p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-warning" data-dismiss="modal">Đóng cửa sổ</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal show bệnh án--> 
<script type="text/javascript">
	jQuery(document).ready(function(){
		$('#thong_tin_dat_kham_Modal').modal({
	        backdrop: 'static',
	        keyboard: false
    });
  })
</script>
<style type="text/css">
.section-body-benhan h3 a {
    background: transparent;
    color: inherit;
    font-size: 110%;
    text-transform: inherit;
    margin: 0;
    padding: 0;
    font-weight: inherit;
    color: #E84F5E;
}

.section-thong-tin-thanh-toan p {
    font-size: 122%;
}
</style>

		@endif

	
		<form name="new-question" class="question-new" action="/dat-lich-hen" method="POST">
			<input type="hidden" name="_token" value="{{csrf_token()}}"/>
			@if(false)
			<div class="form-group left">
				<label>
					<strong>Chuyên khoa:</strong>
					<span>*</span>
				</label>

				<select name="specialities" id="speciality_id" onchange="speciality_change()" required>
					<option value="">Chọn khoa khám</option>
					@if(isset($specialities))
						@foreach($specialities as $sp)
							<option value="{{$sp->speciality_id}}">{{$sp->speciality_name}}</option>
						@endforeach
					@endif
				</select>
			</div>

			<div class="form-group right">
				<label style="width: 20%;">
					<strong>Bác sĩ:</strong>
					<span>*</span>
				</label>

				<select name="doctor" id="doctor_id" >
					<option>Vui lòng chọn chuyên khoa trước</option>
				</select>
			</div>

			<div class="form-group left">
				<label>
					<strong>Tên của bạn</strong>
					<span>*</span>
				</label>

				<input required="" name="name" placeholder="Nhập vào tên của bạn." @if(Session::get('user')!=null) value="{{Session::get('user')->fullname}}" @endif type="text">
			</div>
			<div class="form-group right">
				<label>
					<strong>Ngày sinh</strong>
					<span>*</span>
				</label>

				<input name="born" required="" type="date">
			</div>
			<div style="clear: both"></div>


			<div class="form-group left">
				<label>
					<strong>Số điện thoại</strong>
					<span>*</span>
				</label>

				<input required="" name="phone" placeholder="0909 000 000" type="text">
			</div>
			<div class="form-group right">
				<label>
					<strong>Email</strong>
					<span>*</span>
				</label>

				<input required="" name="email" placeholder="sample@google.com" type="email">
			</div>
			<div style="clear: both"></div>
			<div class="form-group left">
				<label>
					<strong>Nơi sinh sống</strong>
					<span>*</span>
				</label>

				<input name="stay_at" required="" placeholder="" type="text">
			</div>
			<div class="form-group right">
				<label>
					<strong>Nghề nghiệp</strong>
					<span>*</span>
				</label>

				<input name="job" required="" placeholder="" type="text">
			</div>
			@endif
			<div>
				<?php
				$doctor_id = 0;
				$clinic_id = 0;
				if(isset($_REQUEST['ref_type'])){
					if($_REQUEST['ref_type'] == 2){
						$doctor_id = isset($_REQUEST['ref_code']) ? $_REQUEST['ref_code'] : 0;
					}
					if($_REQUEST['ref_type'] == 3){
						$clinic_id = isset($_REQUEST['ref_code']) ? $_REQUEST['ref_code'] : 0;
					}
				}
				?>
				<input type="hidden" name="doctor_id" value="{{$doctor_id}}" />
				<input type="hidden" name="clinic_id" value="{{$clinic_id}}" />
			</div>
			<div class="form-group left">
				<label>
					<strong>Bạn muốn khám lúc</strong>
					<span>*</span>
				</label>

				<input name="appointment_at" required="required" type="datetime-local">
			</div>
			<div style="clear: both"></div>

			<div style="clear: both" class="">
				<p class="text-alert hidden">Cần chọn tỉnh và huyện để hệ thống tìm bác sĩ gần nhất cho bạn</p>
			</div>
			<div class="form-group left">
				<select style="width: 100%" name="province" id="province" onchange="province_change()" required>
					<?php $province = App\Province::all();
					$select = request()->input('province');?>
					<option value="">Tỉnh/Thành phố</option>

					@foreach($province as $pr)
						<option value="{{$pr->id}}">{{$pr->name}}</option>
					@endforeach

				</select>
			</div>

			<div class="form-group right">
				<select style="width: 100%" name="district" id="district" required>
					<option value="">Quận/huyện</option>
				</select>
			</div>
			<input name="user_id" @if(Session::get('user')!=null) value="{{Session::get('user')->user_id}}" @endif type="hidden">
			<div style="clear: both"></div>
			<div class="form-group full">
				<label>
					<strong>Triệu chứng</strong> <span>*</span>
				</label>
				<textarea name="content" placeholder="Chào bác sĩ, em có triệu chứng này cần bác sĩ tư vấn" required="required"></textarea>
			</div>
			@if(false)
			<div class="form-group left">
				<select style="width: 100%" name="ttgd">
					<option value="0">Chưa kết hôn</option>
					<option value="1">Đã kết hôn</option>
				</select>
			</div>
			<div class="form-group right">
				<select style="width: 100%" name="gender">
					<option value="0">Nữ</option>
					<option value="1">Nam</option>
				</select>
			</div>
			@endif
			<script type="text/javascript">
				function province_change(){
					var id=$("#province").val();
					var dataString = 'province='+id+'&_token={{csrf_token()}}';
					$.ajax({
						type: 'POST',
						url: '/api/district',
						data: dataString,
						cache: false,
						success: function(output) {
							var htmlDistrict = '';

							var districts = JSON.parse(output);
							for (var i =0; i < districts.length; i++) {
								var district = districts[i];
								htmlDistrict += '<option value="' + district.id + '">' + district.name + '</option>';
							}

							$('#district').html(htmlDistrict);
						}
					});
				}

				function speciality_change() {
					var id=$("#speciality_id").val();
					var dataString = '_token={{csrf_token()}}';
					$.ajax({
						type: 'GET',
						url: '/api/v0.1/doctor_speciality/' + id,
						data: dataString,
						cache: false,
						success: function(doctors) {
							console.log(doctors)
							var htmlDoctor = '';

							// var doctors = JSON.parse(output);
							for (var i =0; i < doctors.length; i++) {
								var doctor = doctors[i];
								htmlDoctor += '<option value="' + doctor.doctor_id + '">' + doctor.doctor_name + '</option>';
							}

							$('#doctor_id').html(htmlDoctor);
						}
					});
				}
			</script>
			<button type="submit" class="btn btn-primary">Đặt lịch khám</button>
		</form>
	</div>

</div>
@endsection