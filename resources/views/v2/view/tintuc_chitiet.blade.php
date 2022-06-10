@extends('v2/structor/main',[
'title'=> (($baiviet->seo_title != null && $baiviet->seo_title != '' ) ? $baiviet->seo_title : $baiviet->article_title ),
'meta_keywords' => $baiviet->meta_keyword,
'meta_description' => $baiviet->meta_description,
'description' =>$baiviet->meta_description, 
'url' => '/'.$baiviet->article_url.'-'.$baiviet->article_id.'.html',
'image' => (strpos($baiviet->image,'http')===false) ? '/public/images/'.$baiviet->image : $baiviet->image,
'meta_author' => (isset($nguoi_viet_bai) && $nguoi_viet_bai != null) ? $nguoi_viet_bai->doctor_name : 'Tdoctor'
])
@section('content')

<style type="text/css">
    .box-banner-chuyen-muc {
    max-height: 320px;
    overflow: hidden;
}

.box-banner-chuyen-muc img {
    width: 100%;
}
.box-left-dat-cau-hoi-danh-muc {
    width: 70%;
    float: left;
}

.box-dat-cau-hoi-danhmuc {
    /*width: 30%;
    float: right;*/
    margin-bottom: 15px;
}
iframe {
    max-width: 100%;
}
.box-dat-cau-hoi-danhmuc {
    padding-left: 10px;
}
</style>

<style type="text/css">
#chat a{
    text-transform: none;
    font-weight: 700;
    padding: 5px 10px;
    background: #e84f5e;
    color: #fff!important;
    border-radius: 15px;
    box-shadow: 0px 1px 2px 1px #6c757d;
    border: 0 none;
}
#chat a:hover {
    margin-left: 5px;
}
li.row.row-list-doctors {
    text-align: center;
    border: 1px solid #eee;
    margin: 0;
    margin-bottom: 10px;
}

li.row.row-list-doctors #avatar {
    float: none;
    width: 100%;
}

li.row.row-list-doctors .content-doctor {
    width: 100%;
}
.row-list-doctors .desc {
    width: 100%;
}
li.row.row-list-doctors #avatar {
    height: auto;
    padding-bottom: 0;
    padding-top: 10px;
}

li.row.row-list-doctors #avatar a {
    display: inline-block;
}

@media screen and (max-width:  767px){
li.row.row-list-doctors {
    display: block;
    overflow: hidden;
    padding: 0 15px;
}

}
</style>
<script type="text/javascript">

    jQuery(document).ready(function($){
        $('.goi-cho-bac-si.click-to-start-chat').click(function(){
            console.log('chat voi ho tro vien de goi cho bs');
            _that_gbs = $(this);
            setTimeout(function(){
                $('.chat-box.active textarea').val('Tôi muốn gọi cho '+ _that_gbs.attr('data-doctor'));
                $('.chat-box.active .btn-send-chat-message').click();
            }, 300);
        })
    })
</script>

<div class="container">
    <div id="top">
        @if($Current_catalog && $Current_catalog->url_banner)
            <div class="box-banner-chuyen-muc">
                <a href="javascript:void(0);">
                    <img src="{{$Current_catalog->url_banner}}" alt="Khám bệnh online với bác sĩ Tdoctor.vn" />
                </a>
            </div>@endif
            
            <div class="link" style="display: none;">
                <div class="nav">
                    <ul>
                        <li><a href="/">Trang chủ</a></li>
                        <li>&nbsp;>&nbsp;</li>
                        <li><a href="">Tin tức</a></li>
                        <li>&nbsp;>&nbsp;</li>
                        <li><a href="">Chi tiết tin tức</a></li>
                    </ul> 
                    
                </div>
                
                  <div >
                    <h5 ></h5>
                  </div>
          
                
            </div> 
    </div><!-- #top -->
    <?php

if(!Session::get('user')==null){
    //room_464103899
    //room_454103455
    $chat_html = '<a data-doctor="89237" href="javascript:void(0);" class="goi-cho-bac-si btn btn-ok btn-rounded click-to-start-chat" data-my-name="'.Session::get('user')->fullname.'" data-client-name="Hỗ trợ viên" data-chat-to="room_464103899" data-chat-room="room_464103899_'.Session::get('user')->user_id.'"><i class="fas fa-phone"></i> 
        Gọi cho doctor_name
    </a>';
}else{
    $chat_html = '<a data-doctor="89237" href="javascript:void(0);" class="goi-cho-bac-si btn btn-ok btn-rounded btn-login-to-chat" data-url="/frameLogin"><i class="fas fa-phone"></i> 
        Gọi cho doctor_name
    </a>';
}

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

function bi_button_goi_cho_bac_si_name($doctor_id, $doctor_name, $chat_html){
    $chat_html = str_replace('89237', $doctor_id, $chat_html);
    $chat_html = str_replace('doctor_name', $doctor_name, $chat_html);
    return $chat_html;
}

?>

    <br>
    
    <div class="nav-ctbv">   
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
    <div class="contns "> 

        <div class="detail-header">
            <h1>{{ $baiviet->article_title }}</h1>
        </div> 
        <div class="detail-body cms">
            <?php \Carbon\Carbon::setLocale('vi') ?>
            @if(Session::get('user'))
                @if ($baiviet->created_by == Session::get('user')->user_id || $baiviet->created_by == 0 ||  Session::get('user')->user_type_id == 0)
                    <div style="float:right;font-size: 18px;font-weight: bold; font-style: italic;"><a href="/taikhoan/vietbai?article_id={{$baiviet->article_id}}">Sửa nội dung</a></div>
                    <div style="clear:both;"></div>
                @endif
            @endif

            <p style="float: right;margin-bottom: 12px;margin-right: 16px;" class="date">{!! \Carbon\Carbon::parse(($baiviet['created_at']))->toDateTimeString() !!}</p>
            <div style="clear: both"></div>
            <div class="social-cta">
                <a href="/{{$baiviet->article_url}}-{{$baiviet->article_id}}.html" class="image-title image img"  @if(!empty($baiviet->image)) style="margin-left: 0px;
                        width: 100%;
                        display: block;
                        background-size: contain;
                        background-repeat: no-repeat;
                        background-position: center;
                        margin: auto;
                        background-image: url('@if(strpos($baiviet->image,'http')===false)/public/images/@endif{{$baiviet->image}}');" @endif title="{!! $baiviet['article_title']!!}"></a>

                <div class="fb-send" data-href="/{{$baiviet->article_url}}-{{$baiviet->article_id}}.html"></div>
                <div class="fb-share-button" data-href="/{{$baiviet->article_url}}-{{$baiviet->article_id}}.html" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="">Chia sẻ</a></div>
{{--                <div class="fb-like" data-href="/{{$baiviet->article_url}}-{{$baiviet->article_id}}.html" data-layout="button" data-action="like" data-size="small" data-show-faces="true" data-share="fasle"></div>--}}
            </div>
            <div class="streamfield">
                <div style="font-style: italic; font-weight: bold;">
                    {{ $baiviet->article_summary }}
                </div>
                <br/>
                {!!  $baiviet->article_content !!}
            </div>
            @if (false && $baiviet->writer)
                <div style="float:right;font-size: 18px;font-weight: bold; font-style: italic;">Người viết: {{$baiviet->writer}}</div>
            @endif
                <div style="clear:both;"></div>
            @if(Session::get('user'))
                @if ($baiviet->created_by == Session::get('user')->user_id || $baiviet->created_by == 0 ||  Session::get('user')->user_type_id == 0)
                    <div style="float:right;font-size: 18px;font-weight: bold; font-style: italic;"><a href="/taikhoan/vietbai?article_id={{$baiviet->article_id}}">Sửa nội dung</a></div>
                    <div style="clear:both;"></div>
                @endif
            @endif

        </div>
         @if(isset($lienquan) && $lienquan != '')  
        <section class="sectt">
            <h3>Bài viết liên quan</h3>
            <div class="posts-list">
                <ul>
                    @foreach($lienquan as $l)
                        <?php $tieude=to_slug($l['article_title']);?>
                    @if($l['article_id'] != $baiviet['article_id'])
                        <li>
                            <a href="/{{$l->article_url}}-{{$l['article_id']}}.html" class="image">
                                    <img src="@if(!empty($l->image)) @if(strpos($l->image,'http')===false) /public/images/{{$l->image}} @else {{$l->image}} @endif @endif" alt="{{$l['article_title']}}" title="{{$l['article_title']}}">
                            </a>
                            <a href="/{{$l->article_url}}-{{$l['article_id']}}.html" title="">{{$l['article_title']}}</a>
                        </li>
            
                    @endif
                    @endforeach         
                </ul>
            </div>
        </section>
    @endif

    <section class="supplementary" id="comment-wrapper">
        <h3>Bình luận ({{$comment->count()}})</h3>
        @if(session('thongbao'))
            {{session('thongbao')}}
        @endif
        <div id="list-comment">
            @foreach($comment as $c)
                <article>
                    <div class="answer user-answer">
                        <div class="answer-top">
                            <div class="post-meta-data">
                                <span class="user">
                                   <?php $art = App\Users::find($c['user_id']); ?>
                                       {{$art['fullname']}}

                                        
                                </span>

                                <span class="time">
                                    Hỏi lúc: {{$c['created_at']}}
                                </span>
                            </div>
                        </div>
                        <div class="answer-top">
                            <?php substr("{{$c['created_at']}}", 0, 1); ?>
                                  <div class="image " style="background: #E497B8;">
                                        
                                            <span>
                                              <?php 
                                              $ten = $art['fullname'];
                                              echo substr($ten, 0, 1); ?>
                                            </span>
                                        
                            
                            </div>
                            <div class="body">

                                <div class="inner-boby">
                                    <div class="post-body-content">
                                     {{$c['content']}}
                                    </div>

                                   
                                </div>

                         
                            </div>
                        </div>
                    </div> 
                </article>
                 @endforeach
        </div>
         @if(Session::get('user')!=null) 
            <div id="post-reply-form">
                <form name="new-post" class="post-new" action="/comment_article/{{$baiviet->article_url}}-{{$baiviet['article_id']}}" method="post">
                    <h4>Nhập nội dung bình luận dưới đây</h4>
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="post-new-top">  
                        </div>
                    <textarea class="form-control resize-textarea" name="body"></textarea>
                   <br>
                    <button type="submit" class="btn btn-primary">Gửi</button>
                </form>
            </div>
        @else
            <textarea style="margin: 10px 0px;" placeholder="Nhập bình luận..." class="form-control resize-textarea btn-comment" name="body"></textarea>
            <script>
                $('.btn-comment').click(function (e) {
                    // eModal.iframe('https://tdoctor.vn/frameLogin?v=<?php echo time(); ?>', 'Bạn phải đăng ký để hệ thống xử lý')
                });
            </script>
        @endif
    </div>

    <aside class="asleft">
        @if($Current_catalog && $Current_catalog->boxcauhoi_tieu_de != null)
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
                    <img src="{{$Current_catalog->boxcauhoi_hinhanh}}" alt="Hỏi bác sĩ" style="
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
            <?php
            // var_dump($nguoi_viet_bai);
            $dr = $nguoi_viet_bai;
            ?>
            @if($nguoi_viet_bai)
             <li class="row row-list-doctors">

                <div id="avatar">
                    <div style="text-align: center; font-weight: bold;color: #E84F5E;">TDOCTOR: {{$dr->doctor_id}}</div>
                    <a href="/danh-sach-bac-si-chi-tiet/{{$dr->doctor_url}}-{{$dr->doctor_id}}/{{$dr->doctorspeciality->speciality->specialty_url or null}}" style="background-image: url(
                        <?php
                            if (strlen(strstr("$dr->profile_image", "https://dwbxi9io9o7ce.cloudfront.net")) > 0) {
                                echo "$dr->profile_image";
                            }
                            else{
                                echo "/public/images/doctor/$dr->profile_image";
                            }
                         ?>);"></a>
                </div><!--Avatar-->
                
                <div class="content content-doctor">
                    <div class="name">
                        <a href="/danh-sach-bac-si-chi-tiet/{{$dr->doctor_url}}-{{$dr->doctor_id}}/{{$dr->doctorspeciality->speciality->specialty_url or null}}">{{$dr->doctor_name}}</a>
                    </div><!--Name-->
                    <div class="desc">
                        @if(!empty($dr->doctor_description)|| $dr->doctor_description!='')
                            {{$dr->doctor_description}}
                        @if(strlen($dr->doctor_description)>200 && strpos($dr->doctor_description, ' ', 200)!="")
                        {!!substr( $dr->doctor_description, 0, strpos($dr->doctor_description, ' ', 200) )!!}
                        
                            <a class="readmore" style="color: #2fa4e7;" href="/danh-sach-bac-si-chi-tiet/{{$dr->doctor_url}}-{{$dr->doctor_id}}/{{$dr->doctorspeciality->speciality->specialty_url or null}}">Xem tiếp <i style="color: #2fa4e7;" class="fa fa-angle-double-right"></i></a>
                        @endif
                        @endif
                    </div><!--Description-->
             
                    <div>
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                             <b >Địa chỉ: </b>
                             <a style=" color: #2fa4e7;" href="/danh-sach-bac-si-chi-tiet/?q={{$dr->doctor_address}}&key=city">
                            @if(strtolower(request()->input('q')) == strtolower($dr->doctor_address))
                                    <b >{{$dr->doctor_address}}</b>
                                @else 
                                    {{$dr->doctor_address}}
                                @endif
                            </a>
                        
                    </div><!--Address-->
              
                    <div>   

                        <p><i class="fa fa-hospital-o"></i><b> Nơi công tác:</b> {!!$dr->doctor_clinic!!}</p>
                    </div><!--Clinic-->
                 
                    <div id="chat">
                        
                        <?php echo bi_button_goi_cho_bac_si_name($dr->doctor_name .' '. $dr->doctor_id, $dr->doctor_name, $chat_html); ?>
                        @if(false)
                        <a  href="/goto/{{$dr->doctor_id}}-2" class="bt button secondary" title="Gọi {{$dr->doctor_name}}">
                        Gọi {{$dr->doctor_name}}</a><br>
                        @endif
                        
                    </div><!--Chat-->
                    
                    <div >
                        <p style="font-weight: bold; float: left; margin-right: 10px;" ><b>Giờ làm việc: </b>{{$dr->doctor_timework}}</p>

                        <p style="font-weight: bold; color: #E84F5E;" >
                        <?php
                            if($dr->doctor_fullinfo == NULL || $dr->doctor_fullinfo == ''){
                            if($dr->price != null)
                            {
                                echo $dr->price;
                            }
                            else
                            {
                                echo 1000;
                            }
                            }
                        ?>
                        Vnđ/Phút</p>
                    </div><!--Time work-->
                </div>
                @if(false)
                <ins class="adsbygoogle"
                     style="display:inline-block;width: 250px; text-align:center;"
                     data-ad-layout="in-article"
                     data-ad-format="fluid"
                     data-ad-layout-key="-fz-1v+m-c0+<?php echo time(); ?>"
                     data-ad-client="ca-pub-7940791875056931"
                     data-ad-slot="9472089080"></ins>
                <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                @endif
            </li>
            @endif
            <section class="top-list">
                <h3>Bài đăng gần đây</h3>
                    <ul class="recent-list">       
                        @foreach($noibat as $n)
                            <?php $tieude=to_slug($n['article_title']);?>
                            <li>
                                <a class="image" href="/{{$n->article_url}}-{{$n['article_id']}}.html" @if(!empty($n->image)) style="background-image: url('@if(strpos($n->image,'http')===false) /public/images/{{$n->image}} @else {{$n->image}}') @endif" @endif title="">
                                </a>
                                <div class="body">
                                    <h4>
                                        <a href="/{{$n->article_url}}-{{$n['article_id']}}.html" title="">
                                           {{$n['article_title']}}
                                        </a>
                                    </h4>
                                   
                                </div>
                            </li>
                        @endforeach 
                    </ul>
                    <div class="clearfix"></div>
                    <!-- Cột đứng bên phải https://tdoctor.vn/baiviet/mot-ky-thuat-giup-tong-xuat-dam-ky-thuat-tho-theo-chu-ky-chu-dong-xin-share-giup-290 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7940791875056931"
     data-ad-slot="3826679033"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
<!-- 2 https://tdoctor.vn/baiviet/mot-ky-thuat-giup-tong-xuat-dam-ky-thuat-tho-theo-chu-ky-chu-dong-xin-share-giup-290 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7940791875056931"
     data-ad-slot="9480021466"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                    <ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-7940791875056931"
     data-ad-slot="8260748062"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
            </section>
    </aside>
</div><!--Container-->
@endsection
