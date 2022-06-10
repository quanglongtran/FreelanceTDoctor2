@extends('v2/structor/mainv3',[
'title'=> (($baiviet->seo_title != null && $baiviet->seo_title != '' ) ? $baiviet->seo_title : $baiviet->article_title ),
'meta_keywords' => $baiviet->meta_keyword,
'meta_description' => $baiviet->meta_description,
'description' =>$baiviet->meta_description, 
'url' => 'https://tdoctor.vn/'.$baiviet->article_url.'-'.$baiviet->article_id.'.html',
'image' => (strpos($baiviet->image,'http')===false) ? 'https://tdoctor.vn/public/images/'.$baiviet->image : $baiviet->image,
'meta_author' => (isset($nguoi_viet_bai) && $nguoi_viet_bai != null) ? $nguoi_viet_bai->doctor_name : 'Tdoctor'
])
@section('content')
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


function get_content_and_filter_shortcode($content){
    $list_shortcodes = array(
        'content_short_code_bmi',
        'content_short_code_phq9',
        'content_short_code_rosenberg',
    );


    $content = str_replace('[content_short_code_bmi]', short_code_bmi(), $content);
    $content = str_replace('[content_short_code_phq9]', short_code_phq9(), $content);
    $content = str_replace('[content_short_code_rosenberg]', short_code_rosenberg(), $content);
    $content = str_replace('[content_short_code_mchatr]', short_code_mchatr(), $content);
    $content = str_replace('[content_short_code_audit]', short_code_audit(), $content);
    $content = str_replace('[content_short_code_phq15]', short_code_phq15(), $content);
    $content = str_replace('[content_short_code_epds]', short_code_epds(), $content);
    $content = str_replace('[content_short_code_tabs]', short_code_tabs(), $content);
    $content = str_replace('[content_short_code_apgar]', short_code_apgar(), $content);
    $content = str_replace('[content_short_code_huyet_ap]', short_code_huyet_ap(), $content);
    $content = str_replace('[content_short_code_medical_calculators]', short_code_medical_calculators(), $content);
    $content = str_replace('[ideal_chest_measurement]', ideal_chest_measurement(), $content);
    $content = str_replace('[safepulse_chartresult]', safepulse_chartresult(), $content);
    $content = str_replace('[protein_catabolic_rate]', protein_catabolic_rate(), $content);
    $content = str_replace('[clinical_cal_tac]', clinical_cal_tac(), $content);
    $content = str_replace('[adhd_vanderbilt]', adhd_vanderbilt(), $content);
    $content = str_replace('[iron_intake_calculator]', iron_intake_calculator(), $content);
    $content = str_replace('[body_fat_calculator]', body_fat_calculator(), $content);
    $content = str_replace('[bloodsugar_hba1c_convertor]', bloodsugar_hba1c_convertor(), $content);
    $content = str_replace('[pregnancy_calorie_intake_calculator]', pregnancy_calorie_intake_calculator(), $content);
    $content = str_replace('[selfie_addiction_calculator]', selfie_addiction_calculator(), $content);
    $content = str_replace('[life_stressor]', life_stressor(), $content);
    $content = str_replace('[daily_water_requirement]', daily_water_requirement(), $content);
    $content = str_replace('[daily_vitamin_requirement_chart]', daily_vitamin_requirement_chart(), $content);
    $content = str_replace('[test_your_happiness_score]', test_your_happiness_score(), $content);
    $content = str_replace('[calculators_calorie]', calculators_calorie(), $content);
    $content = str_replace('[daily_calorie_requirement_for_age_lifestyle]', daily_calorie_requirement_for_age_lifestyle(), $content);
    $content = str_replace('[happiness_test]', happiness_test(), $content);
    $content = str_replace('[fat_content]', fat_content(), $content);
    $content = str_replace('[shortcode_12]', shortcode_12(), $content);
    $content = str_replace('[shortcode_13]', shortcode_13(), $content);
    $content = str_replace('[shortcode_14]', shortcode_14(), $content);
    $content = str_replace('[shortcode_17]', shortcode_17(), $content);
    $content = str_replace('[shortcode_19]', shortcode_19(), $content);
    $content = str_replace('[shortcode_115]', shortcode_115(), $content);
    $content = str_replace('[shortcode_117]', shortcode_117(), $content);
    $content = str_replace('[shortcode_118]', shortcode_118(), $content);
    $content = str_replace('[shortcode_119]', shortcode_119(), $content);
    $content = str_replace('[shortcode_15]', shortcode_15(), $content);
    $content = str_replace('[shortcode_18]', shortcode_18(), $content);
    $content = str_replace('[shortcode_20]', shortcode_20(), $content);
    $content = str_replace('[shortcode_112]', shortcode_112(), $content);
    $content = str_replace('[shortcode_113]', shortcode_113(), $content);
    $content = str_replace('[shortcode_120]', shortcode_120(), $content);
    $content = str_replace('[shortcode_23]', shortcode_23(), $content);
    $content = str_replace('[shortcode_25]', shortcode_25(), $content);
    // for($i=14;$i<200; $i++){
    //     if(function_exists('shortcode_'.$i)){
    //         $content = str_replace('[fat_content]', fat_content(), $content);
    //     }
    // }
    return $content;
}

?>
@include('v2.view.shortcodes.shortcode_style')


@include('v2.view.shortcodes.short_code_phq9')
@include('v2.view.shortcodes.short_code_bmi')
@include('v2.view.shortcodes.short_code_rosenberg')
@include('v2.view.shortcodes.short_code_mchatr')
@include('v2.view.shortcodes.short_code_audit')
@include('v2.view.shortcodes.short_code_phq15')
@include('v2.view.shortcodes.short_code_epds')
@include('v2.view.shortcodes.short_code_tabs')
@include('v2.view.shortcodes.short_code_apgar')
@include('v2.view.shortcodes.short_code_huyet_ap')
@include('v2.view.shortcodes.short_code_medical_calculators')
@include('v2.view.shortcodes.ideal_chest_measurement')
@include('v2.view.shortcodes.safepulse_chartresult')
@include('v2.view.shortcodes.protein_catabolic_rate')
@include('v2.view.shortcodes.clinical_cal_tac')
@include('v2.view.shortcodes.adhd_vanderbilt')
@include('v2.view.shortcodes.iron_intake_calculator')
@include('v2.view.shortcodes.body_fat_calculator')
@include('v2.view.shortcodes.bloodsugar_hba1c_convertor')
@include('v2.view.shortcodes.pregnancy_calorie_intake_calculator')
@include('v2.view.shortcodes.selfie_addiction_calculator')
@include('v2.view.shortcodes.life_stressor')
@include('v2.view.shortcodes.daily_water_requirement')
@include('v2.view.shortcodes.daily_vitamin_requirement_chart')
@include('v2.view.shortcodes.test_your_happiness_score')
@include('v2.view.shortcodes.calculators_calorie')
@include('v2.view.shortcodes.daily_calorie_requirement_for_age_lifestyle')
@include('v2.view.shortcodes.happiness_test')
@include('v2.view.shortcodes.fat_content')
@for($i=10;$i<200; $i++)
<?php // include(resource_path('views').'/v2/view/shortcodes/shortcode_'.$i.'.blade.php'); ?>
@if(file_exists(resource_path('views').'/v2/view/shortcodes/shortcode_'.$i.'.blade.php'))

@include('v2.view.shortcodes.shortcode_'.$i)


@endif

@endfor

<!-- begin main -->
<main>
        <div class="top-banner">
            <div class="container">
                <div class="banner__inner">
                @if(false)
                    <!-- <img src="../../public/v3/assets/image/banner.jpg" alt="Khám bệnh online với bác sĩ Tdoctor.vn"> -->
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7940791875056931"
     crossorigin="anonymous"></script>
<!-- Banner v3 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7940791875056931"
     data-ad-slot="3751122378"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
<script type="text/javascript">
    
    function share_fb(url) {
  window.open('https://www.facebook.com/sharer/sharer.php?u='+url,'facebook-share-dialog',"width=626, height=436")
  // https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u=https%3A%2F%2Fvnexpress.net%2Fcuoc-doi-gan-voi-ngoi-chua-thon-que-cua-duc-phap-chu-4375650.html&display=popup&ref=plugin&src=share_button
}
$('#answer-example-share-button').on('click', () => {
  if (navigator.share) {
    navigator.share({
        title: 'Web Share API Draft',
        text: 'Take a look at this spec!',
        url: 'https://wicg.github.io/web-share/#share-method',
      })
      .then(() => console.log('Successful share'))
      .catch((error) => console.log('Error sharing', error));
  } else {
    console.log('Share not supported on this browser, do it the old way.');
  }
});
</script>@endif
                </div>
            </div>
        </div>

        <div class="detail-page">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-9">
                        <section class="content d-flex">
                            <div class="social__list">
                                <a class="item" onclick="share_fb('https://tdoctor.vn/{{$baiviet->article_url.'-'.$baiviet->article_id}}.html');return false;" rel="nofollow" share_url="http://www.facebook.com/share.php?u=https://tdoctor.vn/{{$baiviet->article_url.'-'.$baiviet->article_id}}.html" target="_blank" href="http://www.facebook.com/share.php?u=https://tdoctor.vn/{{$baiviet->article_url.'-'.$baiviet->article_id}}.html">
                                    <img src="../../public/v3/assets/image/fb.png" alt="Facebook">
                                </a>
                                <a class="item" target="_blank" href="https://www.youtube.com/channel/UCm3h1QVkgGg6xvyEHElMx7Q/videos">
                                    <img src="../../public/v3/assets/image/ytb.png" alt="Youtube">
                                </a>
                                <a class="item" href="#comment-section-top">
                                    <img src="../../public/v3/assets/image/cm.png" alt="Bình luận">
                                </a>
                            </div>
                            <div class="content__inner">
                            	@if($Current_catalog)
                                <h4 class="category"> {{$Current_catalog->name}}</h4>
                                @endif
                                @if(Session::get('user'))
                                    @if ($baiviet->created_by == Session::get('user')->user_id || $baiviet->created_by == 0 ||  Session::get('user')->user_type_id == 0)
                                        <div style="float:right;font-size: 18px;font-weight: bold; font-style: italic;"><a href="/taikhoan/vietbai?article_id={{$baiviet->article_id}}">Sửa nội dung</a></div>
                                        <div style="clear:both;"></div>
                                    @endif
                                @endif
                                <h1 class="blog__title">{{$baiviet->article_title}}</h1>
                                <div class="blog__date">
                                    <span>{!! \Carbon\Carbon::parse(($baiviet->created_at))->toDateTimeString() !!}</span>
                                </div>
                                <p class="blog__desc">{!! get_content_and_filter_shortcode( $baiviet->article_summary ) !!}</p>
                                <div class="blog__img">
                                    <img src="@if(strpos($baiviet->image,'http')===false)/public/images/@endif{{$baiviet->image}}" alt="{{$baiviet->article_title}}">
                                    <span class="blog__img-desc">
                                        {{$baiviet->article_title}}
                                    </span>
                                </div>
                                {!! get_content_and_filter_shortcode($baiviet->article_content) !!}

                                <!-- <h4 id="comment-section-top">Tdoctor</h4> -->


                                <?php
            // var_dump($nguoi_viet_bai);
            $dr = $nguoi_viet_bai;
            ?>
            @if($nguoi_viet_bai)
             <li class="row row-list-doctors" style="
    background: #f2f8ff;
    border-radius: 12px;
    margin: 10px 0;
    padding: 10px;
    margin-bottom: 0;
    padding-bottom: 0;
">

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
                        <b>Địa chỉ: </b>
                        <a style=" color: #2fa4e7;" href="/danh-sach-bac-si?q={{$dr->doctor_address}}&key=city">
                            @if(strtolower(request()->input('q')) == strtolower($dr->doctor_address))
                            <b >{{$dr->doctor_address}}</b>
                            @else 
                                {{$dr->doctor_address}}
                            @endif
                        </a>                        
                    </div><!--Address-->              
                    <div>
                        <b> Nơi công tác:</b> {!!$dr->doctor_clinic!!}
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


                                <div id="comment-section-top" class="comment">
                                    <p class="total__comment">{{$comment->count()}} bình luận</p>
                                </div>

                                <form class="form__comment post-new" name="new-post" action="/comment_article/{{$baiviet->article_url}}-{{$baiviet['article_id']}}" method="post">
                                	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                    <div class="custom__input">
                                        <input required="required" name="body" class="form-control" type="text" placeholder="Ý kiến của bạn">
                                        <img class="click-submit-form" src="../../public/v3/assets/image/icon-send.png" alt="Gửi ý kiến bình luận"/>
                                    </div>
                                </form>
                                <div class="comment__list">
                            	 	@foreach($comment as $c)
                                    <div class="comment__item">
                                        <div class="comment__avata">
                                            <img src="../../public/v3/assets/image/avata-comment.png" alt="{{$c['content']}}">
                                        </div>
                                        <div class="comment__desc">
                                            <h4>
                                                <span><?php $art = App\Users::find($c['user_id']); ?>
                                       {{$art['fullname']}}</span>
                                                <p>{{$c['content']}}
                                                </p>
                                            </h4>
                                            <p class="comment__date">Hỏi lúc: {{$c['created_at']}}</p>
                                        </div>
                                        <p class="only-sp">
                                            {{$c['content']}}
                                        </p>
                                    </div>
                                    @endforeach

                                </div>
                                @if($Current_catalog)
                                <a href="../../chuyenmuc/{{$Current_catalog->name_url}}-{{$Current_catalog->id}}" class="load-more__cm load-more-ct">
                                    Xem thêm
                                </a>
                                @else
                                <a href="../baiviet" class="load-more__cm load-more-ct">
                                    Xem thêm
                                </a>
                                @endif
                                <!-- <button class="load-more__cm load-more-ct">Xem thêm</button> -->
                                <div class="vote d-flex">
                                    <div class="vote__block is__active">
                                        <img src="../../public/v3/assets/image/Icon awesome-heart.png" alt="Rất hữu ích">
                                        <span>Rất hữu ích</span>
                                    </div>
                                    <div class="vote__block ">
                                        <img src="../../public/v3/assets/image/like.png" alt="Hữu ích">
                                        <span>Hữu ích</span>
                                    </div>
                                    <div class="vote__block ">
                                        <img src="../../public/v3/assets/image/Icon material-tag-faces.png" alt="Bình thường">
                                        <span>Bình thường</span>
                                    </div>
                                </div>
                                <div class="vote__status">
                                    <h4>Nếu có bất cứ thắc mắc nào về vấn đề sức khỏe </h4>
                                    <p>hãy liên hệ với <span>Tdoctor</span> thông qua cách thức đặt câu hỏi trực tuyến Tại <span><a href="https://tdoctor.vn/hoibacsi"> đây</a></span>. <br>
                                    Hoặc mời bạn liên hệ qua Hotline/ Zalo: <span>0 393 167 234 /0792438397 / 0905699983</span> hay có thể tìm bác sĩ <span><a href="../../danh-sach-bac-si">tại đây</a></span><br>

                                    Trân trọng.
                                    </p>

                                    <!-- <h4>Đánh giá của bạn đã được ghi nhận</h4>
                                    <p>Chúng tôi sẽ nỗ lực để nội dung ngày càng tốt hơn. <br>
                                        Có bất kì thắc mắc nào, mời bạn liên hệ qua Hotline: <span>+84 393 167
                                            234</span><br>
                                        Trân trọng.
                                    </p> -->
                                </div>


<style type="text/css">
/*update search_box*/
.section_search_cate {
    background: #f6f6f6;
    border-radius: 10px;
    padding: 15px 0 10px
}
.section_search_cate .input-search-box {
    background: #fff;
    margin: 10px 0;
    width: 100%;
}
.title_box_search_cate {
    color: #ea222d;
    font-size: 18px;
    font-weight: bold;
    padding: 0 10px;
    border-left: 4px solid #ea222d;
    line-height: 16px;
}
.tag_section_search_cate a {
    color: #666;
    font-size: 11px;
    background: #dddddd;
    padding: 3px 5px;
    border-radius: 3px;
    display: inline-block;
    margin-right: 5px;
    margin-bottom: 5px
}
.tag_section_search_cate a:hover {
    background: #ea222d;
    color: #fff
}
.box_section_search_cate {
    padding: 10px 15px 0
}
.tag_section_search_cate {
    text-align: center;
    height: 55px;
    overflow: hidden;
}
.tag_section_search_cate.open {
    height: auto;
}
#view_more_tag_search {
    font-size: 12px;
    font-weight: bold;
    text-transform: uppercase
}
#view_more_tag_search:hover {
    color: #ea222d
}
.section_search_cate .input-group-append {
    cursor: pointer
}
.ads_sticky{
    position: sticky; 
    top: 50px
}
</style>
<script type="text/javascript">
jQuery(document).ready(function($){
    $('#view_more_tag_search').click(function(event){
        event.preventDefault();
        if($('#show_tag_search').hasClass('open')){
            $(this).text('XEM THÊM');
        }else{
            $(this).text('RÚT GỌN');
        }
        $('#show_tag_search').toggleClass('open');
    })
})
</script>                       @if(isset($article_tags) && $article_tags)
                                <div class="tag-box mt-3">
                                    @foreach($article_tags as $tags)
                                    <!-- <a href="javascript:;" class="text-info ml-0 mr-2 ">#{{$tags}}</a> -->
                                    <a href="../../tags/{{\App\Helpers\StringHelper::to_slug($tags)}}/" class="text-info ml-0 mr-2 ">#{{$tags}}</a>
                                    @endforeach
                                </div>
                                @endif
                                <div class="section_search_cate mt-3">
                                    <div class="title_box_search_cate">Tìm kiếm câu tư vấn</div>
                                    <div class="box_section_search_cate">
                                        <form class="form-inline d-lg-block" action="../../danh-sach-bac-si">
                                            <div class="input-group input-search-box">
                                                <input type="text" id="search-tu-van" name="q" class="form-control" placeholder="Tìm kiếm câu tư vấn...">
                                                <div class="input-group-append"> <button class="input-group-text"> <i class="fa fa-search text-primary"></i> </button> </div>
                                            </div>
                                        </form>
                                        <div class="tag_section_search_cate" id="show_tag_search">
                                            <?php 
                                            // $specs = App\Speciality::all();

                                            $specs = array(
                                                array('Nhi Khoa','../../chuyenkhoa/nhi-1'),
                                                array('Sản phụ khoa','../../chuyenkhoa/san-phu-2'),
                                                array('Nam khoa','../../chuyenkhoa/nam-khoa-9'),
                                                array('Ngoại Khoa','../../chuyenkhoa/ngoai-tim-mach-69'),
                                                array('Nội Khoa','../../chuyenkhoa/nhi-ung-bướu-51'),
                                                array('Tim mạch','../../chuyenkhoa/tim-mach-19'),
                                                array('Hô hấp','../../chuyenkhoa/ho-hap-14'),
                                                array('Tiêu hoá','../../chuyenkhoa/tieu-hoa-gan-mat-4'),
                                                array('Răng hàm mặt','../../chuyenkhoa/rang-ham-mat-13'),
                                                array('Tai Mũi Họng','../../chuyenkhoa/tai-mui-hong-6'),
                                                array('Mắt','../../chuyenkhoa/nhan-khoa-8'),
                                                array('Ung Bướu','../../chuyenkhoa/ung-buoi-10'),
                                                array('Da Liễu','../../chuyenkhoa/da-lieu-3'),
                                                array('Dị Ứng','../../chuyenkhoa/di-ung-mien-dich-27'),
                                                array('Nội Tiết','../../chuyenkhoa/nhi-ung-bướu-51'),
                                                array('Tiết Liệu','../../chuyenkhoa/than-tiet-nieu-20'),
                                                array('Dinh Dưỡng','../../chuyenkhoa/dinh-duong-15'),
                                                array('Tâm lý & Thần kinh','../../chuyenkhoa/tam-than-18'),
                                                array('Cơ xương khớp','../../chuyenkhoa/co-xuong-khop-7'),
                                                array('Phục Hồi Chức Năng','../../chuyenkhoa/vat-li-tri-lieu-phuc-hoi-chuc-nang-29'),
                                                array('Truyền Nhiễm','../../chuyenkhoa/truyen-nhiem-11'),
                                                array('Y học cổ truyền','../../chuyenkhoa/y-hoc-co-truyền-31'),
                                                array('Phẫu thuật thẩm mỹ','../../chuyenkhoa/phau-thuat-tham-my-43'),
                                            );
                                            ?>                            
                                            @foreach($specs as $index => $sp)
                                                <a itempropx="item" href="{{$sp[1]}}">{{$sp[0]}}</a>
                                            @endforeach
                                        </div>
                                        <div class="text-center "><a href="javascript:;" id="view_more_tag_search">XEM THÊM</a></div>
                                    </div>
                                </div>


                                <div class="">
                                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7940791875056931"
     crossorigin="anonymous"></script>
<!-- Chi tiết bài viết v3 cuối bài viết -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7940791875056931"
     data-ad-slot="4017650020"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                                </div>

                                <section class="new-related">
                                    <h3>Tin liên quan</h3>
                                    @foreach($lienquan as $l)

				                    @if($l['article_id'] != $baiviet['article_id'])
                                    <div class="new-related__item">
                                        <a href="/{{$l->article_url}}-{{$l['article_id']}}.html" class="img__new">
                                            <img src="@if(!empty($l->image)) @if(strpos($l->image,'http')===false) /public/images/{{$l->image}} @else {{$l->image}} @endif @endif" alt="{{$l['article_title']}}" title="{{$l['article_title']}}">
                                        </a>
                                        <div class="new__content">
                                            <h4 class="new__title">
                                                <a href="/{{$l->article_url}}-{{$l['article_id']}}.html">{{$l['article_title']}}</a>
                                            </h4>
                                            <p>{{\App\Helpers\StringHelper::cut($l['article_summary'], 180)}} </p>
                                            <div class="date__cate">
                                                <p><?php echo date("d/m/Y H:i", strtotime($l->created_at)); ?> 
                                                {{\App\Helpers\StringHelper::bi_get_category_by_catalog_id($l->catalog_id, 'cate')}}                                                    
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    @if($Current_catalog)
                                    <a href="../../chuyenmuc/{{$Current_catalog->name_url}}-{{$Current_catalog->id}}" class="related-new__more load-more-ct">
                                        Xem thêm
                                    </a>
                                    @else
                                    <a href="../baiviet" class="related-new__more load-more-ct">
                                        Xem thêm
                                    </a>
                                    @endif
                                </section>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-3">
                        <aside>
                            <div class="aside-banner">
                                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7940791875056931"
     crossorigin="anonymous"></script>
<!-- Chuyen khoa V3 1 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7940791875056931"
     data-ad-slot="6557185479"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                            </div>
                            @if($Current_catalog && $Current_catalog->boxcauhoi_tieu_de != null)
                            <div class="form-question">
                            	<div class="bac-si-tu-van">
							        <img src="{{$Current_catalog->boxcauhoi_hinhanh}}" alt="Tư vấn">
							    </div>
                                <h3>{{$Current_catalog->boxcauhoi_tieu_de}}</h3>
                                <p>{!!\App\Helpers\UploadFileHelper::correctPath($Current_catalog->boxcauhoi_mo_ta)!!}
                                </p>
                                <form action="">
                                    <div class="form__control">
                                        <input type="text" placeholder="Họ và tên" class="form-control">
                                        <input type="number" placeholder="SĐT" class="form-control">
                                    </div>
                                    <div class="form__control">
                                        <textarea class="form-control" name="" id="" cols="30" rows="10"
                                            placeholder="Nhập nội dung câu hỏi">
                                        </textarea>
                                    </div>
                                    <button type="submit" class="btn btn-ct">Gửi câu hỏi</button>
                                </form>
                                <ol class="question-related">
                                    <?php $art = App\Article::Where('catalog_id',$Current_catalog->id)->orderBy('created_at','DESC')->take(2)->get();
                                    foreach ($art as $index => $ar){ 
                                    echo '<li><a href="/'.$ar->article_url.'-'.$ar->article_id.'.html">'.$ar['article_title'].'</a></li>';
                                    } ?>
                                </ol>
                            </div>
                            @endif
                            <div class="aside-banner02">
                                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7940791875056931"
     crossorigin="anonymous"></script>
<!-- Chuyen khoa v3 2 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7940791875056931"
     data-ad-slot="8991777127"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                            </div>
                            
                            @include('v2.view.tintuc_chitiet_tuvan')

                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </main>
<!-- end main -->
@endsection
