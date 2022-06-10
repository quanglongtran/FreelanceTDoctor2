@extends('v2/view/taikhoan',['title'=> 'Cập nhật thông tin cơ sở y tế'])
@section('taikhoan_content')
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=zqhlsxyi05sm8f2ny1v2885j01lexcls4suys6n7yvxo2ugh"></script>

	<script>tinymce.init({
			selector: 'textarea',
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
			external_filemanager_path:"../../public/responsive_filemanager/filemanager/",
			filemanager_title:"Responsive Filemanager" ,
			external_plugins: { "filemanager" : "{{asset('public/responsive_filemanager/filemanager/plugin.min.js')}}"}
		});
	</script>

<div class="content-tk-home">
<div class="cnt-tk-add-csyt">
	<h1 class="h1-tk-addcsyt">Sửa cơ sở y tế</h1>
	<form class=" form-horizontal" action=" " method="post"  id="contact_form" enctype="multipart/form-data">
		<div class="form-group">
			<label class=" control-label">Tên cơ sở y tế</label>  
			<div class=" inputGroupContainer">
				<div class="">
					<input  name="clinicname" value="{{$clinic->clinic_name}}" placeholder="tên cơ sở y tế" class="form-control"  type="text">
				</div>
			</div>
		</div>

		<!-- Text input-->

		<div class="form-group">
			<label class=" control-label" >Hình ảnh:</label> 
			<div class=" inputGroupContainer">
				<div class="">
					<input name="hinhanh" placeholder="" class="form-control"  type="file">
				</div>
			</div>
		</div>

		<!-- Text input-->
		<div class="form-group">
			<label class=" control-label">Mô tả</label>  
			<div class="form-control">
				<textarea name="description" id="content" class="form-control ckeditor"  type="text">
					{{$clinic->clinic_desc}}
				</textarea>
			</div>
		</div>

		<div class="form-group">
			<label class=" control-label">Địa chỉ</label>  
			<div class=" inputGroupContainer">
				<div class="">
					<input name="diachi" placeholder="" class="form-control" type="text" data-role="tagsinput" value="{{$clinic->clinic_address}}">
				</div>
			</div>
		</div>

		<div class="form-group">
			<label class=" control-label">Điện thoại</label>  
			<div class=" inputGroupContainer">
				<div class="">
					<input name="dienthoai" placeholder="" class="form-control" type="text" data-role="tagsinput" value=" {{$clinic->clinic_phone}}">
				</div>
			</div>
		</div> 


		<div class="form-group">
			<label class=" control-label">Giờ mở cửa</label>  
			<div class=" inputGroupContainer">
				<div class="">
					<input name="clinic_timeopen" placeholder="" class="form-control" type="text" data-role="tagsinput" value="{{$clinic->clinic_time}}">
				</div>
			</div>
		</div>  

		<!-- Text input-->

		<div class="form-group">
			<label class=" control-label">Thông báo</label>
			<div class="form-control">
				<textarea name="clinic_notification" id="content" class="form-control ckeditor"  type="text">
					{{$clinic->clinic_notification}}
				</textarea>
			</div>
		</div>

		<div class="form-group">
			<label class=" control-label">Lâm sàng</label>
			<div class="form-control">
				<textarea name="clinic_clinical" id="content" class="form-control ckeditor"  type="text">
					{{$clinic->clinic_clinical}}
				</textarea>
			</div>
		</div>



		<input type="hidden" name="_token" value="{{csrf_token()}}"/>
		<!-- Button -->
		<div class="form-group">
			
			<div class="but-ad-tkcsyt">
				<button type="submit" class="btn btn-warning" >Gửi <span class="glyphicon glyphicon-send"></span></button>
			</div>
		</div>

	</form>
</div>
</div>
@endsection
