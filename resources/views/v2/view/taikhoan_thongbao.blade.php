@extends('v2/view/taikhoan',['title'=> 'Thông báo'])
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

function insert_contents(inst){

}
</script>
<div class="content-tk-home">
	<h1 class="h1-tk-add-bv">Thêm thông báo</h1>
	<div class="cnt-tk-add-bv">
    <form class=" form-horizontal" action=" " method="post"  id="contact_form" enctype="multipart/form-data">
        <div class="form-group">
        <label class=" control-label">Tiêu đề:</label>
        <div class=" inputGroupContainer">          
            <input  name="tieude" placeholder="Tiêu đề" class="form-control" type="text">
        </div>
      </div>      

      <!-- Text input-->
      <div class="form-group">
        <label class=" control-label">Nội dung</label>  
        <div class=" inputGroupContainer">   
            <textarea name="noidung" id="content" placeholder="Nội dung lâm sàng" class="form-control ckeditor" type="text"></textarea>
        </div>
      </div>

        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
      <!-- Button -->
      <div class="form-group">        
       
        <div class="but-bvx">
          <button type="submit" class="btn btn-warning" >Gửi <span class="glyphicon glyphicon-send"></span></button>
        </div>
      </div>

    </form>
  </div>
</div>
@endsection
