<?php
if(isset($questions_show)){
    $questions_temp = $questions_show;
}else{
    $questions_temp = $questions;
}
// Carbon::setLocale('vi');
setlocale(LC_TIME, 'vi_VI');
$chat_html = '';
if(!function_exists('bi_get_content_readmore_get_text')){
?>

<script type="text/javascript">
    $(document).ready(function () {
        $('.xemthem-button').click(function(){
            $(this).closest('.box-content-to-show-more').addClass('active')  
        })
    });
</script>
<style type="text/css">
    section#ck-question-section {
    padding: 0;
    background: transparent;
}
.row-clear {
    clear: both;
}
#forum-landing-bottom article.article-answer {
    padding-left: 45px;
}
.hbsv-cntl {
    border: 2px solid var(--main-color);
}
.btn-gui-cau-tra-loi{
    margin-top: unset;
    margin-bottom: 12px;
    margin-right: 12px;
    float: right;
    color: #fff!important;
    padding: 3px 5px;
    font-size: 12px!important;
}

.ck-professionals, .carousel-section, #ck-question-section article {
    margin: 0;
    border: 0 none;
    border-bottom: 1px solid #eee;
    border-radius: 0;
}

#ck-question-section article ul {
    margin: 0;
    padding: 0;
}
.hbsv-cntl *,
.answer span,
.answer ul li span.image {
    color: #000;
    font: 400 18px arial;
    text-rendering: optimizeSpeed;
    line-height: 160%;
}
.post-meta-dt1 a {
    font-size: 18px;
}
</style>
<style type="text/css">
    .answer + .answer + .answer {
    border-top: 1px solid #eee;
}
        .box-content-to-show-more {
    position: relative;
    color: #000;
    font: 400 15px arial;
    text-rendering: optimizeSpeed;
    line-height: 160%;
}
.box-content-to-show-more * {
    font-weight: 400;
    font-size: 18px;
}
.content-to-show-more-content-orignize {
    display: none;
}
.box-content-to-show-more .content-to-show-more-content {
    text-overflow: ellipsis;
    display: inline-block;
    overflow: hidden;
}
.doctor-description {
    font-size: 14px;
    font-weight: 300;
    color: #495057;
    padding-left: 35px;
}
.container-custom {
    clear: both;
    margin-bottom: 15px;
    overflow: hidden;
}
span.xemthem-button {
    top: 43px;
    right: 0;
    color: var(--main-color);
    text-align: right;
    background: #fff;
    padding: 5px;
    cursor: pointer;
    font-weight: 400;
    white-space: nowrap;
}
.box-content-to-show-more.active{
    max-height: inherit;
}
.box-content-to-show-more.active .content-to-show-more-content{
    display: none;
}
.box-content-to-show-more.active .content-to-show-more-content-orignize {
    display: inline-block;
}
.box-content-to-show-more.active .xemthem-button{
    display: none;
}
.answer .box-content-to-show-more {
    /*margin-top: -12px;*/
    padding-left: 35px;
}

.goi-cho-bac-si-style {
    background: #e84f5e;
    color: #fff!important;
    border-radius: 12px;
    font-size: 12px!important;
    padding: 0px 8px;
    text-transform: none;
    box-shadow: 0px 1px 2px 1px #6c757d;
}
    </style>
<?php
    function bi_get_content_readmore_get_text($string, $readmore, $length = 220){
        $string = strip_tags($string);
        if (strlen($string) > $length) {
            // truncate string
            $stringCut = substr($string, 0, $length);
            $endPoint = strrpos($stringCut, ' ');

            //if the string doesn't contain any space then it will cut without word basis.
            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
            $string .= $readmore;
        }
        return $string;
    }
    function bi_get_content_readmore($content, $length = 220, $readmore='<span class="xemthem-button">... Xem thêm</span>', $is_echo = false){
        $result = '<div class="col-sm-12 box-content-to-show-more">';
        $result .= '<div class="content-to-show-more-content-orignize">';
        $result .= $content;
        $result .= '</div>';
        $result .= '<div class="content-to-show-more-content">';
        // if($content && strlen($content) > $length){
            $result .= bi_get_content_readmore_get_text($content, $readmore, $length);
        // }
        $result .= '</div>';
        $result .= '</div>';
        if($is_echo){
            echo $result;
        }
        return $result;
    }

    
}
if(!function_exists("bi_button_goi_cho_bac_si")){
    if(!Session::get('user')==null){
        //room_464103899
        //room_454103455
        $chat_html = '<a data-auto-click-to="call-89237" data-doctor="89237" href="javascript:void(0);" class="goi-cho-bac-si goi-cho-bac-si-style btn btn-ok btn-rounded click-to-start-chat" data-my-name="'.Session::get('user')->fullname.'" data-client-name="Hỗ trợ viên" data-chat-to="room_464103899" data-chat-room="room_464103899_'.Session::get('user')->user_id.'">
            Gọi cho bác sĩ
        </a>';
    }else{
        $chat_html = '<a data-auto-click="call-89237" data-doctor="89237" href="javascript:void(0);" class="goi-cho-bac-si goi-cho-bac-si-style btn btn-ok btn-rounded btn-login-to-chat auto-click" data-url="/frameLogin">
            Gọi cho bác sĩ
        </a>';
    }
    
    function bi_button_goi_cho_bac_si($doctor_id, $chat_html){
        return str_replace('89237', $doctor_id, $chat_html);
    }
}
?>

@foreach($questions_temp as $question)
<div class="container-custom bi-question-item-row" style="">
        <div class="hbsv-cnt">
            <div class="hbsv-cntl" style=" width: 100%;margin-bottom: 5px;">
                <article>
                    <a style=" max-height: 120px; overflow: hidden; display: block; text-align: center;" class="image-popup-vertical-fit" href="/public/images/{{$question->question_id}}">
                        <img alt="Hình ảnh câu hỏi" title="Nhấn vào hình để xem rõ hơn"  style="height: auto;width: 100%;max-width: 500px;margin-left: auto;margin-right: auto;" 
                            onerror="this.onerror=null; this.src='/public/images/no_image.png';"
                            src="/public/images/{{$question->question_id}}"/>
                    </a>
                    <div class="quest">
                        <div class="post-meta-dt1">                            
                            <h4 class="question-title">                                
                                <span class="avatar"><img alt="@if($question->fullname!=null)
                                    {{$question->fullname}}                            
                                @endif" src="https://tdoctor.vn/public/patient/images/benh-nhan.png" alt="@if($question->fullname!=null)
                                    {{$question->fullname}}                            
                                @endif" /></span>
                                <a style="font-size: 22px; color:#000;" href="/hoibacsi/{{$question->question_url}}-{{$question->question_id}}"> {{$question->question_title}}</a>
                                <span class="time1">
                                  Hỏi bởi 
                                  @if(!Session::get('user')==null && $question->user_id != null)
                                <a href="javascript:void(0);" class="dkx click-to-start-chat" data-my-name="{{Session::get('user')->fullname}}" data-client-name="{{$question->fullname}}" data-chat-to="room_{{$question->user_id}}" data-chat-room="room_{{$question->user_id}}_{{Session::get('user')->user_id}}">
                                @else
                                <a href="javascript:void(0);" class="dkx btn-login-to-chat" data-url="/frameLogin?v={{time()}}">
                                @endif
                                @if($question->fullname!=null)
                                    {{$question->fullname}}
                                @endif
                                </a>
                                 lúc <?php echo date("d/m/Y H:i", strtotime($question->created_at)); ?>
                                <!--{{App\Helpers\Base::time_elapsed_string($question->created_at)}}-->
                                @if($question->address)
                                ({{$question->address}})
                                @endif
                                @if(isset($question->speciality_id) && $question->speciality_id !=0)
                                
                                Chuyên khoa:
                                <?php $chuyenkhoa = App\Speciality::find($question->speciality_id);?>
                                @if($chuyenkhoa != null)
                                    <a href="/chuyenkhoa/{{$chuyenkhoa->specialty_url}}-{{$chuyenkhoa->speciality_id}}"
                                       title="">{{$chuyenkhoa->speciality_name}}</a> 
                                @endif                           
                                @else
                                @endif
                                </span>
                            </h4>
                        </div>
                        <div class="row-clear"></div>
                        <div class="body1 row-clear">
                            <a style="font-size: 22px; color:#000;" href="/hoibacsi/{{$question->question_url}}-{{$question->question_id}}">
                                {!!nl2br(bi_get_content_readmore($question->question_content))!!}
                            </a>
                        </div>
                    </div>
                </article>
                @if(count($question->answers)>0)
                    @foreach($question->answers as $ans)
                        @if($ans->answer_type!="customer")
                            <article class="article-answer">
                                <div class="answer" style="padding: unset;">
                                    <ul>
                                        <li>
                                            <?php
                                            // var_dump($ans->user->clinic()->first());
                                            // exit;
                                            ?>
                                            @if ($ans->user != null)
                                            @if ($ans->user->user_type_id == 2)
                                            @if( $ans->user->doctor()->first() != null)
                                            <span class="image "
                                                  style="background-image: url(/public/images/doctor/@if(strpos($ans->user->doctor->profile_image,'http')===false)/@endif{{$ans->user->doctor->profile_image}});"></span>
                                                  @endif
                                            @elseif ($ans->user->user_type_id == 3)

                                            @if($ans->user->clinic()->first() != null)
                                                <span class="image "
                                                      style="background-image: url(/public/images/health_facilities/@if(strpos($ans->user->clinic()->first()->profile_image,'http')===false)/@endif{{$ans->user->clinic()->first()->profile_image}});"></span>
                                                      @endif
                                            @else
                                                <span class="image "
                                                      style="background-image: url(https://tdoctor.vn/public/patient/images/benh-nhan.png)"></span>
                                            @endif
                                            <h4 style="margin: unset">
                                                @if ($ans->user->user_type_id == 2)
                                                    @if($ans->user->doctor()->first() != null)
                                                    <a href="/danh-sach-bac-si-chi-tiet/{{$ans->user->doctor->doctor_id}}">
                                                        {{$ans->user->doctor->doctor_name}}
                                                    </a>
                                                    <?php echo bi_button_goi_cho_bac_si($ans->user->doctor->doctor_name.' '.$ans->user->doctor->doctor_id, $chat_html); ?>
                                                    @if(!Session::get('user')==null)
                                                    <a data-auto-click-to="chat-{{$ans->user->user_id}}" href="javascript:void(0);" class="goi-cho-bac-si-style btn-chat-vs-bs btn-roundedx btn-ok click-to-start-chat" data-my-name="{{Session::get('user')->fullname}}" data-client-name="{{$ans->user->doctor->doctor_name}}" data-chat-to="room_{{$ans->user->user_id}}" data-chat-room="room_{{$ans->user->user_id}}_{{Session::get('user')->user_id}}"><i class="fa fa-" aria-hidden="true"></i> Chat với bác sĩ</a>
                                                    @else
                                                    <a href="javascript:void(0);" data-auto-click="chat-{{$ans->user->user_id}}" data-toggle="modal" data-target="#myModal-tai-app" class="ml-2 goi-cho-bac-si-style btn-chat-vs-bs btn-roundedx btn-ok btn-login-to-chat auto-click">Chat với bác sĩ</a>
                                                    @endif
                                                    
                                                    <p class="doctor-description">
                                                        @if(strlen($ans->user->doctor->doctor_description)>200 && strpos($ans->user->doctor->doctor_description, ' ', 200)!="")
                                                            {!!substr( $ans->user->doctor->doctor_description, 0, strpos($ans->user->doctor->doctor_description, ' ', 200) )!!}
                                                        @else
                                                            {{$ans->user->doctor->doctor_description}}
                                                        @endif
                                                    </p>
                                                    @endif
                                                @elseif ($ans->user->user_type_id == 3)
                                                    <a href="/phongkham-chitiet/{{$ans->user->clinic()->first()->clinic_id}}">
                                                        {{$ans->user->clinic()->first()->clinic_name}}
                                                    </a>
                                                @else
                                                    <a href="javascript:void(0)">
                                                        {{$ans->user->fullname}}
                                                    </a>
                                                @endif
                                            </h4>
                                            @endif
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
                                            {!!nl2br(bi_get_content_readmore($ans->answer_content))!!}
                                        </li>
                                    </ul>
                                </div>
                            </article>
                        @else
                            <article>
                                <div class="u-answer">
                                    <div class="answer-t">
                                        <div class="post-meta-dt1">
                                            <span class="user1">
                                                @if($ans->user!=null)
                                                    {{$ans->user->fullname}}
                                                @else
                                                    Giấu tên
                                                @endif
                                            </span>
                                            <span class="time1 bi-cus-time1">
                                                Hỏi lúc: <?php echo date("d/m/Y H:i", strtotime($ans->created_at)); ?>
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
                                                {!!nl2br(bi_get_content_readmore($ans->answer_content))!!}
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
                            <textarea placeholder="Nhập bình luận của bạn..." autofocusx class="form-control resize-textarea" name="answer_content" required=""
                                      style="height: 50px; margin: 12px; width: -webkit-fill-available;margin-left: 46px;width: calc( 100% - 50px);"></textarea>

                            <input type="file" name="file" style="height: 50px; margin: 12px; width: -webkit-fill-available;margin-left: 46px;width: calc( 100% - 50px);" placeholder="Chọn file">
                            <button style="" type="submit" class="btn-gui-cau-tra-loi btn btn-primary">Gửi trả lời</button>
                            <input name="question_id" value="{{$question->question_id}}" type="hidden">
                            <input name="answer_user_id" value="{{Session::get('user')->user_id}}" type="hidden">
                        </form>
                    </div>
                @else
                    <textarea placeholder="Nhập bình luận của bạn..." class="form-control resize-textarea btn-comment" name="body" required=""
                                  style="height: 50px; margin: 12px; width: -webkit-fill-available;margin-left: 46px;width: calc( 100% - 50px);"></textarea>                    
                @endif
            </div>

        </div>
    </div>
    @endforeach