@extends('v2/view/taikhoan',['title'=> 'Bài viết'])
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
 init_instance_callback: "insert_contents",
});

function insert_contents(inst){
    @if($baiviet)

        var content = {!! json_encode($baiviet->article_content) !!};
        inst.setContent(content);
    @endif
}

var slug = function(str) {
    str = str.replace(/^\s+|\s+$/g, ''); // trim
    str = str.toLowerCase();

    // remove accents, swap ñ for n, etc
    var from = "ÁÄÂÀÃÅČÇĆĎÉĚËÈÊẼĔȆĞÍÌÎÏİŇÑÓÖÒÔÕØŘŔŠŞŤÚŮÜÙÛÝŸŽáäâàãåčçćďéěëèêẽĕȇğíìîïıňñóöòôõøðřŕšşťúůüùûýÿžþÞĐđßÆa·/_,:;";
    var to   = "AAAAAACCCDEEEEEEEEGIIIIINNOOOOOORRSSTUUUUUYYZaaaaaacccdeeeeeeeegiiiiinnooooooorrsstuuuuuyyzbBDdBAa------";
    for (var i=0, l=from.length ; i<l ; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
    .replace(/\s+/g, '-') // collapse whitespace and replace by -
    .replace(/-+/g, '-'); // collapse dashes
    str = str.replace('/', '-');
    return str;
};
jQuery(document).ready(function(){
    $('#tieude').on('change, input', function(){
        $('#article_url').val(slug($(this).val()) );
    })
})
</script>
<div class="content-tk-home">
	<h1 class="h1-tk-add-bv">Thêm bài viết</h1>
	<div class="cnt-tk-add-bv">
    <form class=" form-horizontal" action=" " method="post"  id="contact_form" enctype="multipart/form-data">
        <input hidden name="article_id" type="text" value="@if($baiviet) {{$baiviet->article_id}}@endif">

        <div class="form-group">
            <label class=" control-label">Tiêu đề bài viết:</label>
            <div class=" inputGroupContainer">          
                <input id="tieude" name="tieude" placeholder="Tiêu đề" class="form-control" type="text" value="@if($baiviet){{$baiviet->article_title}}@endif">
            </div>
        </div> 

        <div class="form-group">
            <label class=" control-label">Url bài viết:</label>
            <div class=" inputGroupContainer">          
                <input id="article_url" name="article_url" placeholder="Url bài viết" class="form-control" type="text" value="@if($baiviet){{$baiviet->article_url}}@endif">
            </div>
        </div>      

      <div class="form-group">
        <label class=" control-label" >Tóm tắt</label>
        <div class=" inputGroupContainer">
            <textarea name="tomtat" placeholder="Tóm tắt" class="form-control" rows="4">@if($baiviet){{$baiviet->article_summary}}@endif</textarea>
        </div>
      </div>
      <div class="form-group">
        <label class=" control-label" >Hình ảnh:</label> 
        <div class=" inputGroupContainer">         
            <input name="hinhanh" placeholder="" class="form-control"  type="file">          
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class=" control-label">Nội dung</label>  
        <div class=" inputGroupContainer">   
            <textarea name="noidung" id="content" placeholder="Nội dung bài viết" class="form-control ckeditor" type="text"></textarea>
        </div>
      </div>
      <div class="form-group"> 
        <label class=" control-label">Chuyên mục</label>
        <div class=" selectContainer">   
            <select name="chuyenmuc" class="form-control selectpicker" >
              @if(isset($catalogs))
              @foreach($catalogs as $catalog)
              <option @if($baiviet && $baiviet->catalog_id == $catalog->id){{'selected="selected" '}}@endif value="{{$catalog->id}}" >{{$catalog->name}}</option>
              @endforeach
              @endif
            </select>          
        </div>
      </div>
      <div class="form-group"> 
        <label class=" control-label">Nổi bật</label>
        <div class=" selectContainer">   
            <select name="popular" class="form-control selectpicker" >
              <option @if($baiviet && $baiviet->popular == 0){{'selected="selected" '}}@endif value="0" >Không</option>
              <option @if($baiviet && $baiviet->popular == 1){{'selected="selected" '}}@endif value="1" >Có</option>
            </select>          
        </div>
      </div>

      <div class="form-group">
        <label class=" control-label">Tiêu đề SEO:</label>
        <div class=" inputGroupContainer">          
            <input  name="seo_title" placeholder="Tiêu đề SEO" class="form-control" type="text" value="@if($baiviet){{$baiviet->seo_title}}@endif">
        </div>
      </div> 

      <div class="form-group">
        <label class=" control-label" >Meta keyword</label>
        <div class=" inputGroupContainer">
            <textarea name="meta_keyword" placeholder="Meta keyword" class="form-control" rows="4">@if($baiviet){{$baiviet->meta_keyword}}@endif</textarea>
        </div>
      </div>

      <div class="form-group">
        <label class=" control-label" >Meta description</label>
        <div class=" inputGroupContainer">
            <textarea name="meta_description" placeholder="Meta description" class="form-control" rows="4">@if($baiviet){{$baiviet->meta_description}}@endif</textarea>
        </div>
      </div>

      <div class="form-group">
        <label class=" control-label" >Tags (vd: #nhai 1 bên hàm #mặt lệch)</label>
        <div class=" inputGroupContainer">
            <input name="tags" class="form-control" type="text" placeholder="#nhai 1 bên hàm #mặt lệch" value="@if($baiviet){{$baiviet->tags}}@endif">
        </div>
      </div>

      <!-- Text input-->

      <div class="form-group">
        <label class=" control-label">Người viết: </label>  
        <div class=" inputGroupContainer">  
            <input name="nguoiviet" placeholder="" class="form-control" type="text" value="@if($baiviet){{$baiviet->writer}}@else{{session()->get('user')->fullname}}@endif">
        </div>
      </div>

      
      <div class="form-group">
        <label class=" control-label">Nguồn</label>  
        <div class=" inputGroupContainer">    
            <input name="nguon" placeholder="Nguồn bài viết" class="form-control" type="text" value="@if($baiviet){{$baiviet->source}}@endif">
        </div>
      </div>


        <div class="form-group">
            <label>
                <strong>Thời gian hiển thị</strong>
            </label>

            <input name="shows_at" type="datetime-local" value="@if($baiviet){{$baiviet->shows_at}}@endif">
        </div>


        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
      <!-- Button -->
      <div class="form-group">        
       
        <div class="but-bvx">
          <button type="submit" class="btn btn-warning" >Gửi <span class="glyphicon glyphicon-send"></span></button>
        </div>
      </div>

    </form>

    <div class="row">
        <div class="col-12 col-lg-12 news-related-home chuyen-muc-tin-tuc-vuong">
            <div class="news-related">
                <h2>Danh sách bài viết của bạn</h2>
                <?php 
                $specs = App\Article::where('created_by', Session::get('user')->user_id)->orderBy('article_id', 'DESC')->limit(100)->get(); 
                foreach($specs as $news){
                     $newsUrl = '/' . $news->article_url. '-' . $news->article_id.'.html';
                ?>
                <div class="new-related__item row mb-1">
                    <div class="imgx col-sm-2">
                        <!-- <a href="{{$newsUrl}}"><img src="public/v3/assets/image/gettyimages-160158630-2@2x.jpg" alt=""></a> -->
                        @if ($news->image)
                            <a class="img__new" href="{{$newsUrl}}"><img lazy loading="lazy" alt="{{ $news->article_title }}" data-src="../public/images/{{$news->image}}" src="../public/images/{{$news->image}}"/></a>
                        @else
                            <a class="img__new" href="{{$newsUrl}}"><img lazy loading="lazy" alt="{{ $news->article_title }}" data-src="../public/images/noimage.png" src="../public/images/noimage.png"/></a>
                        @endif
                    </div>
                    <div class="new-item__desc col-sm-10">
                        <a class="tieu-de-bv" href="{{$newsUrl}}">{{ $news->article_title }}</a><br/>
                        {{\App\Helpers\StringHelper::bi_get_category_by_catalog_id($news->catalog_id)}}
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
