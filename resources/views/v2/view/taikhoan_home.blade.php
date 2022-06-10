@extends('v2/view/taikhoan',['title'=> 'Tài khoản'])
@section('taikhoan_content')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=zqhlsxyi05sm8f2ny1v2885j01lexcls4suys6n7yvxo2ugh"></script>

<script>tinymce.init({
 selector: 'textarea#content',
 height: 300,
 theme: 'modern',
 plugins: [
 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
 'searchreplace wordcount visualblocks visualchars code fullscreen',
 'insertdatetime media nonbreaking save table contextmenu directionality',
 'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
 ],
 toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | forecolor | backcolor',
 image_advtab: true,
 templates: [
 { title: 'Test template 1', content: 'Test 1' },
 { title: 'Test template 2', content: 'Test 2' }
 ],
 content_css: [
   '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
   '//www.tinymce.com/css/codepen.min.css'
 ],
external_filemanager_path:"../public/responsive_filemanager/filemanager/",
filemanager_title:"Responsive Filemanager" ,
external_plugins: { "filemanager" : "{{asset('public/responsive_filemanager/filemanager/plugin.min.js')}}"},
});
</script>
<div class="content-tk-home">
	<style type="text/css">
		.form-field label {
    min-width: 138px;
    text-align: left!important;
}
	</style>	
	<section class="sec-acc-home">
		<div class="section-header">
			<h2><i class="fa fa-fw fa-user" aria-hidden="true"></i> Tài khoản</h2>
		</div>

		<div class="section-body">
			
			<div class="row"></div>
			@if($errors->has('errorMs'))
				<div class="form-group">
		            <div class="alert alert-danger">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                {{$errors->first('errorMs')}}
		            </div>
		        </div>
	        @endif
			@if($errors->has('successMs'))
				<div class="form-group">
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						{{$errors->first('successMs')}}
					</div>
				</div>
			@endif
			
			@if (session('success'))
	            <div class="alert alert-success">
		            {{session('success')}}
		        </div>
		    @endif

			<div class="row"></div>

			<div class="form-group">
				<div class="form-field">
					<label>
						Họ và tên:
					</label>
					<div class="form-field-text">
						{{Session::get('user')->fullname}}
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="form-field">
					<label>
						User:
					</label>
					<div class="form-field-text">
						{{Session::get('user')->email}}
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="form-field">
					<label>
						Số điện thoại:
					</label>
					<div class="form-field-text">
						{{Session::get('user')->phone}}
					</div>
				</div>
			</div>
		<div class="row"></div>

			<form method="post" action="/taikhoan/doimatkhau" name="signup">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="form-group">
					<div class="form-field">
						<label>
							Mật khẩu hiện tại:
						</label>
						<div class="form-field-input">
							<input class="form-control" name="password" required="" type="password">
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<div class="form-field">
						<label>
							Mật khẩu mới:
						</label>
						<div class="form-field-input">
							<input class="form-control" name="new_password" pattern=".{5,}" title="Mật khẩu phải có ít nhất 5 kí tự" placeholder="Mật khẩu phải có ít nhất 5 ký tự" required="" type="password">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="form-field">
						<label>
							Nhập lại:
						</label>
						<div class="form-field-input">
							<input class="form-control" name="new_password_confirm" placeholder="Nhập lại mật khẩu mới" required="" type="password">
						</div>
					</div>
				</div>

				<div class="button-row">
					<button class="btn btn-primary" type="submit">Cập nhật</button>
				</div>
			</form>

			<form class="form-cap-nhat-vitri" method="post" action="/taikhoan/doimatkhau" name="signup">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="form-group left form-field">
					<label>
						Chọn Tỉnh/Thành phố
					</label>
					<select required style="width: 100%" name="province" id="province" onchange="province_change()">
						<?php $province = App\Province::all();
						$select = request()->input('province');?>
						<option value="">Tỉnh/Thành phố</option>

						@foreach($province as $pr)
							<option value="{{$pr->id}}">{{$pr->name}}</option>
						@endforeach

					</select>
				</div>
				<div class="form-group right form-field">
					<label>
						Chọn Quận/huyện
					</label>
					<select required="" style="width: 100%" name="district" id="district">
						<option value="">Quận/huyện</option>
					</select>
				</div>

				<div class="button-row">
					<button class="btn btn-primary btn-cap-nhat-vitri" type="submit">Cập nhật</button>
				</div>
			</form>

			@if(Session::get('user')->user_type_id == 2 )
			<?php
$user = Session::get('user');
if($user->user_type_id == 2){
	$doctor = App\Doctor::find($user->doctor->doctor_id);
}
                if($doctor != null){
                	// var_dump($doctor);
                }

			?>
			<form class="form-cap-nhat-mo-ta" method="post" action="/taikhoan/doimatkhau" name="signup">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="form-group right form-field" style="
    margin-bottom: -40px;
">
					<label>
						Sửa thông tin
					</label>
				</div>
					<div class="row"></div>
				<div class="form-group">
			        <label class=" control-label"></label>  
			        <div class=" inputGroupContainer">   
			            <textarea name="noidung" id="content" placeholder="Mô tả bác sĩ" class="form-control ckeditor" type="text"><?php echo $doctor->doctor_fullinfo; ?></textarea>
			        </div>
		      	</div>

				<div class="button-row">
					<button class="btn btn-primary btn-cap-nhat-vitri" type="submit">Sửa thông tin</button>
				</div>
			</form>
			@endif

			<div class="form-success">
				<script type="text/html" id="change-success-template">
					<h4><i class="fa fa-check-square-o"></i> Đổi mật khẩu thành công!</h4>
					<p>Thông tin tài khoản:</p>
					<p>
						<strong>Họ và tên:</strong> <%= name %>
					</p>
					<p>
						<strong>Email:</strong> <%= email %>
					</p>
					<p>
						<strong>Điện thoại:</strong> <%= mobile_phone %>
					</p>
					<p>
						<a href="/taikhoan/doimatkhau/" class="button">OK <i class="fa fa-check" aria-hidden="true"></i></a>
					</p>
				</script>
			</div>
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
				$('.form-cap-nhat-vitri').submit(function(event){
					if($('#district').val() == ''){
						event.preventDefault();
						alert('Vui lòng chọn Thông tin địa phương của bạn trước!');
					}else{

					}
				})
			</script>

		</div>
	</section>

</div>

@endsection