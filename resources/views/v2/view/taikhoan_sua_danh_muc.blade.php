@extends('v2/view/taikhoan',['title'=> 'Sửa danh mục tin tức'])
@section('taikhoan_content')
@if(false){
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
			external_filemanager_path:"../public/responsive_filemanager/filemanager/",
			filemanager_title:"Responsive Filemanager" ,
			external_plugins: { "filemanager" : "{{asset('public/responsive_filemanager/filemanager/plugin.min.js')}}"}
		});
	</script>
@endif
<div class="content-tk-home">
<div class="cnt-tk-add-csyt">
	<h1 class="h1-tk-addcsyt">Sửa danh mục tin tức <a target="_blank" href="/chuyenmuc/{{$Catalog->name_url}}-{{$Catalog->id}}">Xem danh mục</a></h1>
	<form class=" form-horizontal" action="/sua-danh-muc" method="post"  id="contact_form" enctype="multipart/form-data">
		<div class="form-group">
			<label class=" control-label">Tên danh mục</label> 
			<div class=" inputGroupContainer">
				<div class="">
					<input  name="name" value="{{$Catalog->name}}" placeholder="Tên danh mục" class="form-control"  type="text">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class=" control-label">Url Banner </label>  
			<div class=" inputGroupContainer">
				<div class="">
					<input  name="url_banner" value="{{$Catalog->url_banner}}" placeholder="Url Banner" class="form-control"  type="text">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class=" control-label">Url Banner Mobile</label>  
			<div class=" inputGroupContainer">
				<div class="">
					<input  name="url_banner_mobile" value="{{$Catalog->url_banner_mobile}}" placeholder="Url Banner" class="form-control"  type="text">
				</div>
			</div>
		</div>
		<input type="hidden" name="id" value="{{$Catalog->id}}">
		<h2>Phần đặt câu hỏi bác sĩ</h2>
		<div class="form-group">
			<label class=" control-label">Url Hình ảnh bác sĩ </label>  
			<div class=" inputGroupContainer">
				<div class="">
					<input  name="boxcauhoi_hinhanh" value="{{$Catalog->boxcauhoi_hinhanh}}" placeholder="Url Hình ảnh bác sĩ" class="form-control"  type="text">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class=" control-label">Tiêu đề đặt câu hỏi </label>  
			<div class=" inputGroupContainer">
				<div class="">
					<input  name="boxcauhoi_tieu_de" value="{{$Catalog->boxcauhoi_tieu_de}}" placeholder="Tiêu đề đặt câu hỏi" class="form-control"  type="text">
				</div>
			</div>
		</div>

		<div class="form-group">
			<label class=" control-label">Mô tả phần đặt câu hỏi</label>
			<div class="form-controlx">
				<textarea name="boxcauhoi_mo_ta" id="content" class="form-control ckeditor"  type="text" style="width: 100%;">{{$Catalog->boxcauhoi_mo_ta}}</textarea>
			</div>
		</div>
		<div class="form-group">
			<label class=" control-label">URL đặt khám </label>  
			<div class=" inputGroupContainer">
				<div class="">
					<input  name="boxcauhoi_url_dat_kham" value="{{$Catalog->boxcauhoi_url_dat_kham}}" placeholder="URL đặt khám" class="form-control"  type="text">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class=" control-label">URL tài trợ </label>  
			<div class=" inputGroupContainer">
				<div class="">
					<textarea name="boxcauhoi_url_tai_tro" id="boxcauhoi_url_tai_tro" class="form-control ckeditor"  type="text" style="width: 100%;">{{$Catalog->boxcauhoi_url_tai_tro}}</textarea>
				</div>
			</div>
		</div>

		<input type="hidden" name="_token" value="{{csrf_token()}}"/>
		<!-- Button -->
		<div class="form-group">			
			<div class="but-ad-tkcsyt">
				<button type="submit" class="btn btn-warning" >Lưu lại <span class="glyphicon glyphicon-send"></span></button>
			</div>
		</div>

	</form>
</div>
</div>
@endsection
