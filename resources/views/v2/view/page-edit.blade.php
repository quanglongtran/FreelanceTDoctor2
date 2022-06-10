@extends('v2/view/taikhoan',['title'=> 'Sửa trang '.$page->title])
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
            external_filemanager_path:"../public/responsive_filemanager/filemanager/",
            filemanager_title:"Responsive Filemanager" ,
            external_plugins: { "filemanager" : "{{asset('public/responsive_filemanager/filemanager/plugin.min.js')}}"}
        });
    </script>

<div class="content-tk-home">
<div class="cnt-tk-add-csyt">
    @if(isset($msg))
    <h1 class="h1-tk-addcsyt" style="color: #e84f5e;">{{$msg}}</h1>
    @endif
    <form class="form-horizontal" action=" " method="post"  id="contact_form" enctype="multipart/form-data">
        <div class="form-group">
            <label class=" control-label">Tiêu đề trang</label>  
            <div class=" inputGroupContainer">
                <div class="">
                    <input  name="title" value="{{$page->title}}" placeholder="Tiêu đề trang" class="form-control"  type="text">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class=" control-label">Nội dung</label> 
        </div>
        <!-- Text input-->
        <div class="form-group">
            <!-- <label class=" control-label">Nội dung trang</label>   -->
            <div class="form-controlx">
                <textarea name="noi_dung" id="content" class="form-control ckeditor"  type="text">
                    {{$page->noi_dung}}
                </textarea>
            </div>
        </div>

        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <input type="hidden" name="id" value="{{$page->id}}">
        <!-- Button -->
        <div class="form-group">
            
            <div class="but-ad-tkcsyt">
                <button type="submit" class="btn btn-warning" >Cập nhật <span class="glyphicon glyphicon-send"></span></button>
            </div>
        </div>

    </form>
</div>
</div>
@endsection
