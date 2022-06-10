@extends('v2/structor/main',[
'title'=> 'Hỏi bác sĩ - '.$question->question_title,
'description'=> $question->question_content
])
@section('content')
<script type="text/javascript">
jQuery(document).ready(function($){
    $('.btn-ajax-sua-comment').click(function(){
        var _parent_box = $(this).closest('.modal-dialog');

        if(_parent_box.find('.noi-dung-tin-nhan').val() == ''){
            alert('Vui lòng nhập nội dung!');
            _parent_box.find('.noi-dung-tin-nhan').focus();
            return ;
        }
        var _that = $(this);
        if(!$(this).hasClass('active')){
            $(this).addClass('active');
            $.ajax({
                type: 'POST',
                url: '/sua-comment',
                data: {
                    noi_dung : _parent_box.find('.noi-dung-tin-nhan').val(),
                    comment_id : _parent_box.find('.comment_id').val(),
                },
                cache: false,
                success: function(res) {
                    alert("Sửa bình luận thành công!");
                    window.location.reload();
                },
                error: function(res){
                    alert('Có lỗi xảy ra, vui lòng thử lại!');
                    _that.removeClass('active');
                }
            });
        }else{
            alert("Vui lòng chờ hệ thống xử lý yêu cầu hiện tại. Nếu chờ quá lâu bạn có thể tải lại trang để thử lại!")
        }
    })
})
</script>
<?php

function checkRemoteFile($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    // don't download content
    curl_setopt($ch, CURLOPT_NOBODY, 1);
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    curl_close($ch);
    if ($result !== FALSE) {
        return true;
    } else {
        return false;
    }
}
function bi_show_popup_edit_comment($comment_id, $comment_content){
?>

<!-- Modal gửi tin nhắn bn-->
<div id="bi_show_popup_edit_comment_Modal-{{$comment_id}}" class="modal fade modal-lg" role="dialog" style="margin:auto;">
  <div class="modal-dialog" style="max-width: 100%;">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="display: block;">
        <button type="button" class="close" data-dismiss="modal" style="display: inline-block;">&times;</button>
         <h3 class="modal-title">Chỉnh sửa câu trả lời của bạn</h3>       
      </div>
      <div class="modal-body">
        <div class="section-body-benhan">
            <div class="form-group">
                <label class="control-label">Nội dung</label>
                <div class="inputGroupContainer">
                    <textarea class="form-control noi-dung-tin-nhan" placeholder="Nhập nội dung">{{$comment_content}}</textarea>
                </div>
            </div>
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>  
            <input type="hidden" class="comment_id" name="comment_id" value="{{$comment_id}}"/>      
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary activex btn-ajax-sua-comment"><span class="loadersmall"></span> Chỉnh sửa </button>
        <button type="button" class="btn btn-primary btn-warning" data-dismiss="modal">Đóng cửa sổ</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal chuyển bệnh án-->  

<?php
}

$chat_html = '';

if(!function_exists("bi_button_goi_cho_bac_si")){ 
    if(!Session::get('user')==null){
        //room_464103899
        //room_454103455
        $chat_html = '<a data-auto-click-to="call-89237" data-doctor="89237" href="javascript:void(0);" class="goi-cho-bac-si btn btn-ok btn-rounded click-to-start-chat" data-my-name="'.Session::get('user')->fullname.'" data-client-name="Hỗ trợ viên" data-chat-to="room_464103899" data-chat-room="room_464103899_'.Session::get('user')->user_id.'">
            Gọi cho bác sĩ
        </a>';
    }else{
        $chat_html = '<a data-auto-click="call-89237" data-doctor="89237" href="javascript:void(0);" class="goi-cho-bac-si btn btn-ok btn-rounded btn-login-to-chat auto-click" data-url="/frameLogin">
            Gọi cho bác sĩ
        </a>';
    }
    
    function bi_button_goi_cho_bac_si($doctor_id, $chat_html){
        return str_replace('89237', $doctor_id, $chat_html);
    }
}
?>
    <script type="text/javascript">

        $(document).ready(function () {
            checkResize();
            $(window).resize(function (e) {
                checkResize();
            });
            function checkResize() {
                let width = $(document).width();
                if (width > 767) {
                    $('.sec-hbsv2').off('click');
                    $('.sec-hbsv2').find('.dropct-hbsv').show();

                } else {
                    $('.sec-hbsv2').on('click', function () {
                        let data_isshow = $(this).attr('data-isshow');
                        if (data_isshow == 0) {
                            $(this).find('#up').show();
                            $(this).find('#down').hide();
                            $(this).find('.dropct-hbsv').show();
                            $(this).attr('data-isshow', '1');
                        } else {
                            $(this).find('#up').hide();
                            $(this).find('#down').show();
                            $(this).find('.dropct-hbsv').hide();
                            $(this).attr('data-isshow', '0');
                        }
                    });
                }
            }

            $('.thank-hbsv').on('click', function () {
                let data_id = $(this).attr('data-id');
                if (data_id == 0) {
                    $(this).find('.unactive').hide();
                    $(this).find('.active').show();
                    $(this).attr('data-id', '1');
                } else {
                    $(this).find('.unactive').show();
                    $(this).find('.active').hide();
                    $(this).attr('data-id', '0');
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            checkResize();
            $(window).resize(function () {
                checkResize();
            });

            let ckTopList = $(".ck-top-list");
            for (let i = 0; i < ckTopList.length; i++) {
                $(ckTopList[i]).find("ul").find("li").slice(0, 6).show();
            }

            $(".ck-ud").on('click', function () {

                var a = $(".ck-ud-dropd").length;

                let data_id = $(this).attr("data-id");
                if (data_id == 0) {
                    $(this).find("#ck-up").show();
                    $(this).find("#ck-down").hide();
                    // $(".ck-ud-dropd:hidden").slice().show();
                    $(this).parents('.ck-top-list').find('ul').find('li').show();
                    $(this).attr("data-id", "1");
                } else {
                    var itemLi = $(this).parents('.ck-top-list').find('ul').find('li');
                    var lengthItem = itemLi.length;
                    console.log(lengthItem);
                    itemLi.slice(6, lengthItem).hide();

                    $(this).find("#ck-up").hide();
                    $(this).find("#ck-down").show();
                    // $(".ck-ud-dropd:visible").slice(a/12,a).hide();
                    $(this).attr("data-id", "0");
                }
            });

            //Slider
            function checkResize() {
                let width_wd = $(document).width();
                let ck_profess = $('.ck-professionals');
                var interval;
                for (let i = 0; i < ck_profess.length; i++) {
                    let doc_leng = $(ck_profess[i]).find('#doctor-content-ck').find('.item-ck').length;
                    let width = doc_leng * 200;
                    let width_doc = $(ck_profess[i]).find('#doctor-content-ck').css('width', width + 'px');


                    if (width_wd < 768) {
                        let slideht = 1;
                        let margin_left = 0;
                        let max_slide = width - (slideht * 200);
                        let ms = 0;
                        $('.next-ck').on('click', function () {
                            console.log('clicked');
                            margin_left -= 200;
                            ms = 200;
                            if (margin_left < -max_slide) {
                                margin_left = 0;
                                ms = 1000;
                            }

                            $(this).parents('.ck-professionals').find('#doctor-content-ck').css({
                                'margin-left': margin_left + 'px',
                                'transition': 'margin-left ' + ms + 'ms ease 0s'
                            });
                        });

                        $('.prev-ck').on('click', function () {
                            margin_left += 200;
                            ms = 200;
                            if (margin_left > 0) {
                                margin_left = -max_slide;
                                ms = 1000;
                            }
                            $(this).parents('.ck-professionals').find('#doctor-content-ck').css({
                                'margin-left': margin_left + 'px',
                                'transition': 'margin-left ' + ms + 'ms ease 0s'
                            });
                        });

                        function startSlider() {
                            interval = setInterval(function () {
                                ms = 200;
                                margin_left -= 200;
                                if (margin_left < -max_slide) {
                                    margin_left = 0;
                                    ms = 1000;
                                }
                                $('.clinic-autoplay #doctor-content-ck').animate({
                                    'margin-left': margin_left + 'px',
                                    'transition': ' margin-left ' + ms + 'ease 0.2s'
                                }, 1000);
                            }, 3000);
                        }
                    } else if (width_wd >= 768 && width_wd <= 1024) {
                        let slideht = 3;
                        let margin_left = 0;
                        let max_slide = width - (slideht * 200);
                        let ms = 0;
                        $('.next-ck').on('click', function () {

                            margin_left -= 200;
                            ms = 200;
                            if (margin_left < -max_slide) {
                                margin_left = 0;
                                ms = 1000;
                            }

                            $(this).parents('.ck-professionals').find('#doctor-content-ck').css({
                                'margin-left': margin_left + 'px',
                                'transition': 'margin-left ' + ms + 'ms ease 0s'
                            });
                        });

                        $('.prev-ck').on('click', function () {
                            margin_left += 200;
                            ms = 200;
                            if (margin_left > 0) {
                                margin_left = -max_slide;
                                ms = 1000;
                            }
                            $(this).parents('.ck-professionals').find('#doctor-content-ck').css({
                                'margin-left': margin_left + 'px',
                                'transition': 'margin-left ' + ms + 'ms ease 0s'
                            });
                        });

                        function startSlider() {
                            interval = setInterval(function () {
                                ms = 200;
                                margin_left -= 200;
                                if (margin_left < -max_slide) {
                                    margin_left = 0;
                                    ms = 1000;
                                }
                                $('.clinic-autoplay #doctor-content-ck').animate({
                                    'margin-left': margin_left + 'px',
                                    'transition': ' margin-left ' + ms + 'ease 0.2s'
                                }, 1000);
                            }, 3000);
                        }
                    } else {
                        let slideht = 4;
                        let margin_left = 0;
                        let max_slide = width - (slideht * 200);
                        let ms = 0;
                        $('.next-ck').on('click', function () {

                            margin_left -= 200;
                            ms = 200;
                            if (margin_left < -max_slide) {
                                margin_left = 0;
                                ms = 1000;
                            }

                            $(this).parents('.ck-professionals').find('#doctor-content-ck').css({
                                'margin-left': margin_left + 'px',
                                'transition': 'margin-left ' + ms + 'ms ease 0s'
                            });
                        });

                        $('.prev-ck').on('click', function () {
                            margin_left += 200;
                            ms = 200;
                            if (margin_left > 0) {
                                margin_left = -max_slide;
                                ms = 1000;
                            }
                            $(this).parents('.ck-professionals').find('#doctor-content-ck').css({
                                'margin-left': margin_left + 'px',
                                'transition': 'margin-left ' + ms + 'ms ease 0s'
                            });
                        });

                        function startSlider() {
                            interval = setInterval(function () {
                                ms = 200;
                                margin_left -= 200;
                                if (margin_left < -max_slide) {
                                    margin_left = 0;
                                    ms = 1000;
                                }
                                $('.clinic-autoplay #doctor-content-ck').animate({
                                    'margin-left': margin_left + 'px',
                                    'transition': ' margin-left ' + ms + 'ease 0.2s'
                                }, 1000);
                            }, 3000);
                        }
                    }
                }

                function stopSlider() {
                    clearInterval(interval);
                }

                $('.clinic-autoplay').on('mouseenter', stopSlider).on('mouseleave', startSlider);
                startSlider();
                stopSlider();

            }


        });
    </script>
    <style type="text/css">
        .user1 img {
    display: inline-block;
    width: 30px;
}
.post-meta-dt1 h3.user1 {
    padding-left: 0;
}
.goi-cho-bac-si-style,
.goi-cho-bac-si {
    background: #e84f5e;
    color: #fff!important;
    border-radius: 12px;
    font-size: 12px!important;
    padding: 0px 8px;
    text-transform: none;
    box-shadow: 0px 1px 2px 1px #6c757d;
}
    </style>
    <div class="container">
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
        <div id="top">
            <div class="link">
                <div class="nav d-none">
                    <ul>
                        <li><a href="/hoibacsi">Hỏi bác sĩ</a></li>
                    </ul>
                </div>
                <h1 style="font-size: 1rem; font-weight: bold">
                    {{$question->question_title}}
                </h1>
                @if(isset($question->address))
                    <span>Địa chỉ: {{$question->address}}</span>
                @endif
            </div>
        </div><!-- #top -->
        <br>

        <div class="hbsv-cnt">
            <div class="hbsv-cntl">
                <article>                    
                        <a class="image-popup-vertical-fit" href="{{$question->getImage('full')}}">
                            <img  style="max-width: 100%;
                max-height: 480px;
                display: block;
                margin-left: auto;
                margin-right: auto;" onerror="this.onerror=null; this.src='/public/images/no_image.png'"
                             src="{{$question->getImage('medium')}}"/>
                        </a>
                    <div class="quest">
                        <div class="post-meta-dt1">

                        <h3 class="user1"><img title="{{$question->fullname}}" src="https://tdoctor.vn/public/patient/images/benh-nhan.png" alt="{{$question->fullname}}">
                            @if(!Session::get('user')==null && $question->user_id != null)
                            <a href="javascript:void(0);" class="dkx click-to-start-chat" data-my-name="{{Session::get('user')->fullname}}" data-client-name="{{$question->fullname}}" data-chat-to="room_{{$question->user_id}}" data-chat-room="room_{{$question->user_id}}_{{Session::get('user')->user_id}}">
                            @else
                            <a href="javascript:void(0);" class="dkx btn-login-to-chat" data-url="/frameLogin?v={{time()}}">
                            @endif
                            @if($question->fullname!=null)
                                {{$question->fullname}}
                            @endif
                            </a>
                        </h3>
                        <span class="time1">
                            hỏi lúc <?php echo date("d/m/Y H:i", strtotime($question->created_at)); ?>
                        </span>
                        @if(isset($question->speciality_id) && $question->speciality_id !=0)
                        <span class="span-nd">
                        Chuyên khoa:
                        <?php $chuyenkhoa = App\Speciality::find($question->speciality_id);?>
                        @if($chuyenkhoa != null)
                            <a href="/chuyenkhoa/{{$chuyenkhoa->specialty_url}}-{{$chuyenkhoa->speciality_id}}"
                                   title="">{{$chuyenkhoa->speciality_name}}</a>
                        @endif
                        </span>
                        @endif
                        </div>
                        <div class="body1">
                            {!!nl2br( $question->question_content )!!}
                        </div>
                        <div class="social-cta">
                            <a href="/hoibacsi/{{$question->question_url}}-{{$question->question_id}}" title="{!! $question->question_title!!}"></a>
                            <div class="fb-send" data-href="/hoibacsi/{{$question->question_url}}-{{$question->question_id}}"></div>
                            <div class="fb-share-button" data-href="/hoibacsi/{{$question->question_url}}-{{$question->question_id}}" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="">Chia sẻ</a></div>
                        </dvi>
                    </div>
                </article>
                @if(count($question->answers)>0)
                    @foreach($question->answers as $ans)
                        @if($ans->user && $ans->user->user_type_id != 1)
                            <article>
                                <div class="answer" style="padding: unset;">
                                    <ul>
                                        <li>
                                            @if($ans->user != null && $ans->user->doctor != null )
                                            @if ( $ans->user->user_type_id == 2)
                                            <a href="/danh-sach-bac-si-chi-tiet/{{$ans->user->doctor->doctor_id}}"><span class="image "
                                                  style="background-image: url(/public/images/doctor/@if(strpos($ans->user->doctor->profile_image,'http')===false)/@endif{{$ans->user->doctor->profile_image}});"></span></a>
                                            @elseif ($ans->user->user_type_id == 3)
                                                <span class="image "
                                                      style="background-image: url(/public/images/health_facilities/@if(strpos($ans->user->clinic()->first()->profile_image,'http')===false)/@endif{{$ans->user->clinic()->first()->profile_image}});"></span>
                                            @else
                                                <span class="image "
                                                      style="background-image: url(/public/images/patient-default.jpg"></span>
                                            @endif
                                            <h4 style="margin: unset">
                                                @if ($ans->user->user_type_id == 2)
                                                    <a href="/danh-sach-bac-si-chi-tiet/{{$ans->user->doctor->doctor_id}}">
                                                        {{$ans->user->doctor->doctor_name}}
                                                    </a>
                                                    <?php echo bi_button_goi_cho_bac_si($ans->user->doctor->doctor_name.' '.$ans->user->doctor->doctor_id, $chat_html); ?>
                                                    @if(!Session::get('user')==null)
                                                    <a data-auto-click-to="chat-{{$ans->user->user_id}}" href="javascript:void(0);" class="goi-cho-bac-si-style btn-chat-vs-bs btn-roundedx btn-ok click-to-start-chat" data-my-name="{{Session::get('user')->fullname}}" data-client-name="{{$ans->user->doctor->doctor_name}}" data-chat-to="room_{{$ans->user->user_id}}" data-chat-room="room_{{$ans->user->user_id}}_{{Session::get('user')->user_id}}"><i class="fa fa-" aria-hidden="true"></i> Chat với bác sĩ</a>
                                                    @else
                                                    <a href="javascript:void(0);" data-auto-click="chat-{{$ans->user->user_id}}" data-toggle="modal" data-target="#myModal-tai-app" class="ml-2 goi-cho-bac-si-style btn-chat-vs-bs btn-roundedx btn-ok btn-login-to-chat auto-click">Chat với bác sĩ</a>
                                                    @endif

                                                @elseif ($ans->user->user_type_id == 3)
                                                    <a href="/danh-sach-bac-si-chi-tiet/{{$ans->user->clinic()->first()->clinic_id}}">
                                                        {{$ans->user->clinic()->first()->clinic_name}}
                                                    </a>
                                                @else
                                                    <a href="javascript:void(0)">
                                                        {{$ans->user->fullname}}
                                                    </a>
                                                @endif
                                            </h4>
                                            <br/>
                                            @if($ans->image > 0)
                                            <a class="image-popup-vertical-fit" href="/public/images/comment/{{$ans->image}}" style="
    max-height: 150px;
    overflow: hidden;
    display: inline-block;
">
                                                <img style="max-width: 100%;
                                                    display: block;
                                                    margin-left: auto;
                                                    margin-right: auto;" onerror="this.onerror=null; this.src='/public/images/no_image.png'" src="/public/images/comment/{{$ans->image}}">
                                            </a>
                                            @endif
                                            <p style="font-weight: normal; font-size: 110%">
                                                {!!nl2br( $ans->answer_content )!!}
                                            </p>                                            
                                            @if(Session::has('user') != null && Session::get('user')->user_id == $ans->user->user_id)
                                            <a style=" padding: 0; text-transform: none;" class="btn btn-primary" href="javascript:void(0);" data-toggle="modal" data-target="#bi_show_popup_edit_comment_Modal-{{$ans->answer_id}}">Sửa</a>
                                            {{bi_show_popup_edit_comment($ans->answer_id, $ans->answer_content)}}
                                            @endif

                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </article>
                        @else
                            <article>
                                <div class="u-answer">
                                    <div class="answer-t">
                                        <div class="post-meta-dt1">
                                            <div class="user1">
                                                @if($ans->user!=null)
                                                    <h3 class="user1">
                                                        <img title="{{$ans->user->fullname}}" src="https://tdoctor.vn/public/patient/images/benh-nhan.png" alt="{{$ans->user->fullname}}">
                                                        @if(!Session::get('user')==null && $ans->user->user_id != null)
                                                        <a href="javascript:void(0);" class="dkx click-to-start-chat" data-my-name="{{Session::get('user')->fullname}}" data-client-name="{{$ans->user->fullname}}" data-chat-to="room_{{$ans->user->user_id}}" data-chat-room="room_{{$ans->user->user_id}}_{{Session::get('user')->user_id}}">
                                                        @else
                                                        <a href="javascript:void(0);" class="dkx btn-login-to-chat" data-url="/frameLogin?v={{time()}}">
                                                        @endif
                                                        @if($ans->user->fullname!=null)
                                                            {{$ans->user->fullname}}
                                                        @endif
                                                        </a>
                                                    </h3>
                                                @else
                                                <h3 class="user1">
                                                    <a href="javascript:void(0);" class=" ">
                                                        Giấu tên
                                                    </a>
                                                </h3>
                                                @endif
                                            </div>
                                            <span class="time1">
                                                lúc: <?php echo date("d/m/Y H:i", strtotime($ans->created_at)); ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="body3">
                                        <div class="inner-boby">
                                            <div class="post-body-content">
                                                @if($ans->image)
                                            <a class="image-popup-vertical-fit" href="/public/images/comment/{{$ans->image}}" style="
    max-height: 150px;
    overflow: hidden;
    display: inline-block;
">
                                                <img style="max-width: 100%;
                                                    display: block;
                                                    margin-left: auto;
                                                    margin-right: auto;" onerror="this.onerror=null; this.src='/public/images/no_image.png'" src="/public/images/comment/{{$ans->image}}">
                                            </a>
                                            @endif
                                                <p> 
                                                    {!!nl2br( $ans->answer_content )!!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endif
                    @endforeach
                @endif
                @if(Session::has('user') != null)
                    <div id="post-reply-form">
                        <h3>Trả lời</h3>
                        <form name="new-post" class="post-new" action="/traloicauhoiweb" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <textarea placeholder="Nhập bình luận..." autofocusx class="form-control resize-textarea" name="answer_content" required=""
                                      style="height: 108px; margin: 12px; width: -webkit-fill-available;"></textarea>
                            <input type="file" name="file" style="margin: 12px;" placeholder="Chọn file">
                            <button style="margin-top: unset;margin-bottom: 12px;margin-right: 12px;float: right;" type="submit" class="btn btn-primary">Gửi trả lời</button>
                            <input name="question_id" value="{{$question->question_id}}" type="hidden">
                            <input name="answer_user_id" value="{{Session::get('user')->user_id}}" type="hidden">
                        </form>
                    </div>
                @else
                    <textarea placeholder="Nhập bình luận..." class="form-control resize-textarea btn-comment" name="body" required=""
                                  style="height: 108px; margin: 12px; width: -webkit-fill-available;"></textarea>
                    <script>
                        $('.btn-comment').click(function (e) {
                            // eModal.iframe('https://tdoctor.vn/frameLogin?v=<?php echo time(); ?>', 'Bạn phải đăng ký để hệ thống xử lý')
                        });
                    </script>
                @endif
                <div class="hbs-ckl" style="width: 100%;">
                @if($speciality != null)
                <section class="ck-professionals" style="height: auto;">
                    <h3>
                        Bác sĩ nổi bật chuyên khoa {{$speciality->speciality_name}}
                        <a style="font-size: 12px;" href="/danh-sach-bac-si?speciality={{$speciality->specialty_url}}" title="Xem danh sách bác sĩ">Xem tất cả</a>
                    </h3>
                    @if(isset($doctors))
                        <div class="prev-ck">
                            <span><i class="fa fa-chevron-left" id="ck-left"></i></span>
                        </div>
                        <div class="next-ck">
                            <span><i class="fa fa-chevron-right" id="ck-right"></i></span>
                        </div>
                        <div class="clinic-autoplay" style="width: calc(100% - 50px);overflow: hidden;margin-left: 25px;">
                            <div id="doctor-content-ck">
                                @foreach($doctors as $doc)
                                    <div class="item-ck">
                                        <a href="/danh-sach-bac-si-chi-tiet/{{$doc->doctor_url}}-{{$doc->doctor_id}}/kham-benh">
                                            <img src="@if($doc->profile_image!=null) @if(strpos($doc->profile_image, 'http')===false)https://tdoctor.vn/public/images/doctor/@endif{{$doc->profile_image}}@endif"
                                                 alt="{{$doc->doctor_name}}" title="medihere Blog Post"/>
                                            <h3 style="padding: 0;">{{$doc->doctor_name}}</h3>


                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </section>
                @endif
                <div>
                <!-- https://tdoctor.vn/hoibacsi/giam-tieng-e-e-nhu-the-nao-vay-bac-si-2998 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7940791875056931"
     data-ad-slot="6317111006"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
            </div>
            </div>

            </div>
            

            <aside class="hbsv-cntr">
                <section class="sec-hbsv1">
                    <h3>Hỏi bác sĩ</h3>
                    <div class="collapsible-target" style="max-height: none;">
                        <p>Chuyên mục Hỏi Bác sĩ mang đến cho người đọc dữ liệu hàng nghìn câu hỏi-đáp về sức khỏe đã
                            được trả lời bởi các bác sĩ và chuyên gia uy tín. Bạn cũng có thể gửi câu hỏi mới để nhận
                            được tư vấn trực tiếp của bác sĩ ngay tại đây, hoàn toàn miễn phí.</p>
                    </div>
                    <div class="collapse-trigger" style="display: none;">
                        <span class="trigger-expand"><i class="fa fa-chevron-down"></i></span>
                        <span class="trigger-collapse"><i class="fa fa-chevron-up"></i></span>
                    </div>
                </section>
                <section class="sec-hbsv2" data-isshow="0">
                    <h3>Câu hỏi theo chuyên khoa<i id="down" class="fa fa-chevron-down"></i>
                        <i id="up" class="fa fa-chevron-up"></i></h3>
                    <?php $speciality = App\Speciality::all();?>
                    <div class="dropct-hbsv">
                        @foreach($speciality as $spec)
                            <dt>
                                <a href="/chuyenkhoa/{{$spec->specialty_url}}-{{$spec->speciality_id}}" class=""
                                   title="{{$spec->specialty_url}}">
                                    <h5>{{$spec->speciality_name}}</h5>
                                    <span class="thread-count "></span>
                                </a>
                            </dt>
                        @endforeach
                    </div>
                </section>
            </aside>
        </div>
    </div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml            : true,
                version          : 'v10.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
@endsection
