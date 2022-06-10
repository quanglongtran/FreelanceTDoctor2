@extends('v2/structor/main',['title'=> 'Hẹn lịch khám', 'meta_keywords' => 'đặt lịch khám bênh online, hẹn giờ khám bệnh online, hẹn lịch bác sĩ tư vấn, lịch hẹn khám bệnh với bác sĩ, đặt lịch khám bệnh trực tuyến'])
@section('content')
<?php
$class_click_to_login = '';
if(true && !Session::has('user')){
	$class_click_to_login = ' btn-req-login';
}
?>
<div class="container {{$class_click_to_login}}">
	
	<div id="thread-create">
		<h1>Đặt lịch hẹn khám phòng khám {{$clinic_kham->clinic_name}}</h1>
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
<div id="danh_sach_benh_an_Modal" class="modal fade modal-lg" role="dialog" style="margin:auto;">
  <div class="modal-dialog" style="max-width: 100%;">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="display: block;">
        <button type="button" class="close" data-dismiss="modal" style="display: inline-block;">&times;</button>
         <h3 class="modal-title">Bạn đã đặt chỗ thành công và đang được xếp lịch <strong></strong></h3>       
      </div>
      <div class="modal-body" style="display: none;">
        <div class="section-body-benhan section-thong-tin-thanh-toan">
            <h3>Bạn đã đặt chỗ thành công và đang được phòng khám xếp lịch </h3>
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
		$('#danh_sach_benh_an_Modal').modal({
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
			@endif
			@if(true)

			<div class="form-group left">
				<label>
					<strong>Tên của bạn</strong>
					<span>*</span>
				</label>
				<input required="" name="name" placeholder="Nhập vào tên bệnh nhân." @if(Session::get('user')!=null) value="{{Session::get('user')->fullname}}" @endif type="text">
			</div>
			<div class="form-group right">
				<label>
					<strong>Giới tính:</strong>
					<span>*</span>
				</label>
				<select name="gender" id="gender" required>
					<option value="1">Nam</option>
					<option value="2">Nữ</option>
					<option value="3">Khác</option>
				</select>
			</div>
			<div style="clear: both"></div>

			<div class="form-group left">
				<label>
					<strong>Ngày sinh</strong>
					<span>*</span>
				</label>
				<input required="" name="age" placeholder="Nhập tuổi hoặc tháng (với trẻ em)" type="date">
			</div>

			<div class="form-group right">
				<label>
					<strong>Cân nặng</strong>
					<span>*</span>
				</label>
				<input required="" name="weight" placeholder="Nhập cân nặng bệnh nhân" type="text">
			</div>
			<div style="clear: both"></div>
			
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
			<div class="row"></div>
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