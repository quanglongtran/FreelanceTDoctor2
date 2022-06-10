@extends('v2/structor/main',['title'=> 'Chuyên mục '.$Current_catalog["name"], 'body_class' => 'page-chuyen-muc'])
@section('content')
<?php
function to_slug($str) { 
    $str = trim(mb_strtolower($str));
    $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
    $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
    $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
    $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
    $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
    $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
    $str = preg_replace('/(đ)/', 'd', $str);
    $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
    $str = preg_replace('/([\s]+)/', '-', $str);
    return $str;
}
// var_dump($Current_catalog);
?>
<style type="text/css">
    .box-banner-chuyen-muc {
    max-height: 350px;
    overflow: hidden;
}

.box-banner-chuyen-muc img {
    width: 100%;
}
.box-left-dat-cau-hoi-danh-muc .nd1 .imgvm {
    max-height: 250px;
    overflow: hidden;
}
@if($Current_catalog->boxcauhoi_tieu_de != null)
.box-left-dat-cau-hoi-danh-muc {
    width: 70%;
    float: left;
}

.box-dat-cau-hoi-danhmuc {
    width: 30%;
    float: right;
    padding-left: 12px;
}
@endif

.btn-show-edit {
    padding: 0;
    margin: 0;
    margin-left: 10px;
    text-transform: none;
}
.nd1 .imgvm img {
    float: none;
    width: 100%;
}

.nd1 .nd1cm1, .nd2 ul li .nd2cm2 {
    padding: 0;
}
.nd1 .nd1cm1-new, .nd2 ul li .nd2cm2-new {
    width: 100%;
}

.nd1cm2 {
    display: none;
}

.nd1cm1 a, .nd2cm2 h4 a {
    text-transform: none;
    color: #333;
    font-size: 18px;
}
ul.first-3-items li {
    display: inline-block;
    width: 33%;
    padding-right: 15px;
    vertical-align: top;
}
.first-3-items h4 a {
    text-transform: none;
    font-size: 14px;
    font-weight: 400;
    margin-top: 10px;
    display: inline-block;
}

.nd2 ul.first-3-items li img {
    margin: 0;
    padding: 0;
    width: 100%;
    float: none;
    max-height: 158px;
}
.only-show-mobile{
    display: none;
}
.top-list ul li a.image {
    overflow: hidden;
}
.top-list ul li .body {
    width: calc(100% - 75px);
}
@media screen and (max-width:  767px){
.only-show-mobile{
    display: block;
}
    .box-dat-cau-hoi-danhmuc, .box-left-dat-cau-hoi-danh-muc {
        width: 100%;
        float: none;
        margin-bottom: 10px;
    }
    ul.first-3-items li {
        width: 31%;
    }
}
</style>
<div class="main-A">
	 <div id="top">
            <div class="box-banner-chuyen-muc">
                <a href="javascript:void(0);">
                    <img src="{{$Current_catalog->url_banner}}" alt="" />
                </a>
            </div>
            
            <div class="link">
                <div class="nav">
                    @if($Current_catalog->boxcauhoi_tieu_de == null || (Session::get('user') && Session::get('user')->user_type_id == 0))
                    <ul>
                        <li><a href="/">Trang chủ</a></li>
                        <li>&nbsp;>&nbsp;</li>
                        <li><a href="">Chuyên mục {{$Current_catalog["name"]}}</a></li>
                       @if(Session::get('user') && Session::get('user')->user_type_id == 0 )
                        <li><a class="btn btn-primary btn-show-edit" target="_blank" href="/taikhoan/sua-danh-muc?id={{$Current_catalog['id']}}">Sửa</a></li>
                       @endif 
                    </ul>  
            @endif                   
                </div>                
                  <div >
                    <h5 ></h5>
                  </div>
            </div> 
    </div><!-- #top -->
    @if($Current_catalog->boxcauhoi_tieu_de != null)
        <div class="box-dat-cau-hoi-danhmuc only-show-mobile">
            <div class="section-home-hoibacsi" style="
                background: #e84f5e;
                border-radius: 14px;
                padding: 12px;
                margin-right: 8px;
                color: #fff;
            ">
                <h2 style="
                font-size: 16px;
                color: #fff;
                text-transform: uppercase;
                text-align: center;
                margin-top: 15px;
                margin-bottom: 20px;
            ">{{$Current_catalog->boxcauhoi_tieu_de}}</h2>
                <div class="box-hoibacsi-section">
                    <img src="{{$Current_catalog->boxcauhoi_hinhanh}}" alt="hoi bac si" style="
                        float: left;
                        margin-right: 10px;
                        max-width: 85px;
                    ">
                    <div class="box-hoibaci-section-right">
                        <!-- <a href="https://tdoctor.vn/bacsi65976"><h3>Bác sĩ, Thạc sĩ Nguyễn Hồng Vân Khánh</h3></a>
                        <p>Phó khoa Tiêu Hoá</p>
                        <p>Bệnh viện Nhi Đồng 2 HCM
                        </p> -->
                        {!!\App\Helpers\UploadFileHelper::correctPath($Current_catalog->boxcauhoi_mo_ta)!!}
                    </div>
                    <div style="clear: both;"></div>
                </div>
                <div class="text-center">
                    <a class="btn btn-primary" href="{{$Current_catalog->boxcauhoi_url_dat_kham}}" style="
                margin-bottom: 6px;
                margin-top: 8px;
            ">Hỏi bác sĩ</a>
                </div><div class="text-center">
                    {!!\App\Helpers\UploadFileHelper::correctPath($Current_catalog->boxcauhoi_url_tai_tro)!!}
                </div>
            </div>
        </div>
        @endif
    <div class="nav-ctbv" style="display: none;">   
        @foreach($Catalogs as $catalog)
        @if($catalog['parent_id']==0)
            <div class="dropd-f">
                <span class=" ">
                    <a href="/chuyenmuc/{{$catalog['name_url']}}-{{$catalog['id']}}" title="Phòng &amp; Chữa Bệnh">
                        {!! $catalog["name"]!!}
                    </a>
                </span>
                <?php $cates = App\Catalog::where('parent_id',$catalog['id'])->get(); ?>
                <?php $cate_paren = App\Catalog::where('parent_id',0)->first(); ?>
                <div class="dropd-c">
                     @foreach ($cates as $cate)
                    <a class="" href="/chuyenmuc/{{$cate['name_url']}}-{{$cate['id']}}">{{$cate['name']}}</a>
                      @endforeach
                </div>
            </div>
        @endif
        @endforeach
    </div><!--nav-->
    <div class="contcm" style="
    width: 100%;
    clear: both;
    padding: 0;
">
        <div class="box-left-dat-cau-hoi-danh-muc"> 
        @if(isset($baiviet_new['article_title']) )         
                <div class="nd1">
                    <div class="imgvm"><a href="/baiviet/{{$baiviet_new->article_url}}-{{$baiviet_new['article_id']}}">
                            <img src="{!!asset('public/images/'.$baiviet_new->image)!!}" alt="{{$baiviet_new['article_title']}}" onerror="this.onerror=null; this.src='/public/images/logo-new.png'"></a>
                    </div>
                    <div class="nd1cm1 nd1cm1-new">
                        <h2>
                            <a href="/baiviet/{{$baiviet_new->article_url}}-{{$baiviet_new['article_id']}}">{{$baiviet_new['article_title']}}</a>
                        </h2>
                        <div class="nd1cm2 nd1cm2-new">
                          {{$baiviet_new['article_summary']}}
                        </div>
                    </div>
                </div>
                <div class="nd2">
                    <ul class="first-3-items"><?php $i = 0; ?>
                        @foreach($baiviet as $b)
                            @if($baiviet_new['article_id'] != $b['article_id'])
                            <?php $i++; ?>
                            @if($i <= 3)
                                <li><a href="/baiviet/{{$b->article_url}}-{{$b['article_id']}}">
                                 <img src="{!!asset('public/images/'.$b->image)!!}" alt=" {{$b['article_title']}}" onerror="this.onerror=null; this.src='/public/images/logo-new.png'"></a>
                    
                                <div class="nd2cm2 nd2cm2-new">
                                    <h4>
                                        <a href="/baiviet/{{$b->article_url}}-{{$b['article_id']}}"> {{$b['article_title']}}</a>           
                                    </h4>                                           
                                </div>
                                </li>
                            @endif
                            @endif
                        @endforeach
                    </ul>
                    <ul><?php $i = 0; ?>
                        @foreach($baiviet as $b)
                            @if($baiviet_new['article_id'] != $b['article_id'])
                            <?php $i++; ?>
                            @if($i > 3)
                                <li><a href="/baiviet/{{$b->article_url}}-{{$b['article_id']}}">
                                 <img src="{!!asset('public/images/'.$b->image)!!}" alt=" {{$b['article_title']}}" onerror="this.onerror=null; this.src='/public/images/logo-new.png'"></a>
                    
                                <div class="nd2cm2">
                                    <h4>
                                        <a href="/baiviet/{{$b->article_url}}-{{$b['article_id']}}"> {{$b['article_title']}}</a>           
                                    </h4>
                                              {{$b['article_summary']}}
                                           
                                </div>
                                </li>
                            @endif
                            @endif
                        @endforeach
                    </ul>
                </div>
            

            	
                <div style="padding: 30px 0 0 33.3%;" class="pagination">
                    
                    <span class="step-links">
                       {!! $baiviet->links(); !!}
                        
                    </span>
                </div>
            @else
            <h3> Không có bài viết </h3>
            
            @endif
        </div>
        @if($Current_catalog->boxcauhoi_tieu_de != null)
        <div class="box-dat-cau-hoi-danhmuc">
            <div class="section-home-hoibacsi" style="
                background: #e84f5e;
                border-radius: 14px;
                padding: 12px;
                margin-right: 8px;
                color: #fff;
            ">
                <h2 style="
                font-size: 16px;
                color: #fff;
                text-transform: uppercase;
                text-align: center;
                margin-top: 15px;
                margin-bottom: 20px;
            ">{{$Current_catalog->boxcauhoi_tieu_de}}</h2>
                <div class="box-hoibacsi-section">
                    <img src="{{$Current_catalog->boxcauhoi_hinhanh}}" alt="hoi bac si" style="
                        float: left;
                        margin-right: 10px;
                        max-width: 85px;
                    ">
                    <div class="box-hoibaci-section-right">
                        <!-- <a href="https://tdoctor.vn/bacsi65976"><h3>Bác sĩ, Thạc sĩ Nguyễn Hồng Vân Khánh</h3></a>
                        <p>Phó khoa Tiêu Hoá</p>
                        <p>Bệnh viện Nhi Đồng 2 HCM
                        </p> -->
                        {!!\App\Helpers\UploadFileHelper::correctPath($Current_catalog->boxcauhoi_mo_ta)!!}
                    </div>
                    <div style="clear: both;"></div>
                </div>
                <div class="text-center">
                    <a class="btn btn-primary" href="{{$Current_catalog->boxcauhoi_url_dat_kham}}" style="
                margin-bottom: 6px;
                margin-top: 8px;
            ">Hỏi bác sĩ</a>
                </div><div class="text-center">
                    {!!\App\Helpers\UploadFileHelper::correctPath($Current_catalog->boxcauhoi_url_tai_tro)!!}
                </div>
            </div>
@if(Session::get('user') && Session::get('user')->user_type_id == 0 )
<?php
            // var_dump($hoidap);

?>

@endif
            <?php
            // var_dump($hoidap);
            if(isset($hoidap) && $hoidap != null ){
            ?>
            <section class="top-list" style="height: auto !important;     margin-top: 25px;">
                <h3>Hỏi đáp liên quan</h3>
                <div class="danh-sach-cau-hoi-lien-quan">
                    <ul class="recent-list">
                        @if(isset($hoidap) && $hoidap)
                        @foreach($hoidap as $question)
                            <?php
                                $questionUrl = '/hoibacsi/' . $question->question_url . '-' . $question->question_id;
                            ?>
                            <li>                                
                                <a class="image" href="{{$questionUrl}}">
                                    <img alt="{{$question->question_title}}" onerror="this.onerror=null; this.src='/public/images/ask-doctor.png?v=1'"
                                         src="{{$question->getImage()}}"/>
                                </a>
                                <div class="body question-item question-card">
                                    <div class="question-detail">
                                        @if (!empty($question->question_content))
                                            <a href="{{$questionUrl}}">{{\App\Helpers\StringHelper::cut($question->question_content, 80)}}</a>
                                        @else
                                            <a href="{{$questionUrl}}">{{\App\Helpers\StringHelper::cut($question->question_title, 80)}}</a>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @endforeach     
                        @endif    
                        
                    </ul>
                </div>
            </section>
            <?php } ?>

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7940791875056931"
     crossorigin="anonymous"></script>
<!-- https://tdoctor.vn/chuyenmuc/phong-chua-benh-1 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7940791875056931"
     data-ad-slot="6422680493"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>

        </div>
        @endif
    </div>
    <!-- <div class="global-thread-create-cta">
        <a href="/hoi-bac-si/dat-cau-hoi/" class="button">
            <i class="fa fa-question-circle" aria-hidden="true"></i>
            <strong>Hỏi bác sĩ</strong>
            <span>miễn phí</span>
        </a>
    </div> -->
</div>
@endsection