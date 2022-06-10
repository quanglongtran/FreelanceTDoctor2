@extends('v2/structor/main',['title'=> 'Bác sĩ trực tuyến', 'meta_keywords' => 'tdoctor, bác sĩ trực tuyến, bác sĩ online, khám bệnh từ xa, dịch vụ khám chữa bệnh từ xa, tư vấn bác sĩ, khám bệnh online, bệnh viện trực tuyến, khám chữa bệnh trực tuyến'])
@section('content')
<?php $isLoginTag = true;?>
    <!-- Add the latest firebase dependecies from CDN -->
    <!-- <script src="https://www.gstatic.com/firebasejs/7.19.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.19.0/firebase-auth.js"></script> -->
    @if(false)
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0&appId=130864624263329&autoLogAppEvents=1" nonce="e9jKGPcG"></script>
    <script>
        $(document).ready(function (){
            FB.init({
                appId: '130864624263329',
                cookie: true, // enable cookies to allow the server to access
                status: true, // check login status
                xfbml: true, // parse social plugins on this page
                version: 'v2.8'
            });

            function getInfo() {
                FB.api('/me', 'GET', {fields: 'name,id'}, function(response) {
                    $('.ip-login-fb-id').val(response.id);
                    $('.ip-login-fb-fullname').val(response.name);
                    $('.frm-login-fb').submit()
                });
            }

            $('.btn-login-with-facebook').on('click', function (event) {
                FB.getLoginStatus(function(response) {
                    if (response.status === "connected") {
                        getInfo();
                    }
                    else {
                        FB.login(function(response){
                            console.log(response);
                            getInfo();
                        });
                    }
                })
            })
        })

    </script>
    @endif
    <style type="text/css">
        .newest-question img {
    max-height: 152px;
    filter: blur(1.5px);
    -webkit-filter: blur(1.5px);
}
#home-questions .question-box .question-card img{   
    filter: blur(1.5px);
    -webkit-filter: blur(1.5px); 
}
.newest-question img[src="/public/images/ask-doctor.png?v=1"], #home-questions .question-box .question-card img[src="/public/images/ask-doctor.png?v=1"] {
    filter: none;
}
a.youtube-layzy-load {
    max-height: 255px;
    display: inline-block;
    overflow: hidden;
}
.youtube-layzy-load img{
    margin-top: -78px;
    min-height: 250px;
}
    </style>
    <section id="register" style="margin-top: -70px;">
        <div class="inner clr">
            <div class="span span2 alone @if(Session::get('user') != null) h-center @endif">
                <div class="middle-item">
                    <div style="margin-top: 14px;">
                        <style> 
                            .parent-center {
                                margin-top: 32px;cursor: pointer;text-align: center;background-color: #E84F5E;color: #ffffff;height: 75px;position: relative;
                            }
                            .content-center {
                                width: 80%; font-size: x-large;top: 50%;-ms-transform: translateY(-50%);margin: 0;position: absolute;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);color: #FFF;
                            }
                        </style>
                        <div style="padding: 10px;border: 2px solid #E84F5E;border-radius: 5px;">
                            <div class="parent-center btn-online-examination" style="margin: 16px 8px">
                                <span class="content-center">
                                    DỊCH VỤ TẠI NHÀ
                                </span>
                            </div>
                            <div class="parent-center btn-find-doctor" style="margin: 16px 8px">
                                <span class="content-center">
                                    Tìm kiếm bác sĩ
                                </span>
                            </div>
                            <div class="parent-center btn-qa" style="margin: 16px 8px">
                                <span class="content-center">
                                    Tham gia hỏi đáp miễn phí
                                </span>
                            </div>
                        </div>
                        <script>
                            $('.btn-qa').click(function (e) {
                                window.location.href = '/hoibacsi/datcauhoi';
                            })
                            $('.btn-find-doctor').click(function (e) {
                                window.location.href = '/danh-sach-bac-si';
                            })
                            $('.btn-online-examination').click(function (e) {
                                window.location.href = '/dich-vu-tai-nha/';
                            })
                        </script>
                        {{--                        <img lazy loading="lazy" class="center" data-src="public/v2/img/home_two_mobiles_en.png" alt="">--}}
                        <div class="block-register show-mobile" style="margin-top: 10px;">
                            <div class="group-labels clr">
                                <label class="btn-req-login register-tab @if($errors->has('errorReg') || session('successReg')) active @else <?php $isLoginTag = true;?> @endif"><span>Đăng ký</span></label>
                                <label class="btn-req-login-login login-tab @if($errors->has('errorlogin') || $isLoginTag) active @endif"><span>Đăng nhập</span></label>
                            </div>
                        </div>
                        <div style="padding: 10px;border: 2px solid #E84F5E;border-radius: 5px; margin-top: 40px">
                            <div class="apps clr middle-item">
                                <a target="_blank" href="https://apps.apple.com/us/app/tdoctor/id1443310734"><img lazy loading="lazy"
                                            data-src="public/v2/img/appstore.svg" alt=""></a>
                                <a target="_blank" href="https://play.google.com/store/apps/details?id=com.app.khambenh.bacsiviet"><img lazy loading="lazy"
                                            data-src="public/v2/img/playstore.svg" alt=""></a>
                            </div>
                            <p class="text-center" style="font-size: 18px">App TDOCTOR dành cho bệnh nhân</p>

                            <div class="apps clr middle-item">
                                <a target="_blank" href="https://apps.apple.com/vn/app/tdoctor-for-doctor/id1555758280"><img lazy loading="lazy"
                                            data-src="public/v2/img/appstore.svg" alt=""></a>
                                <a target="_blank" href="https://play.google.com/store/apps/details?id=com.app.khambenh.doctor"><img lazy loading="lazy"
                                            data-src="public/v2/img/playstore.svg" alt=""></a>
                            </div>
                            <p class="text-center" style="font-size: 18px">App TDOCTOR dành cho bác sĩ</p>
                        </div>
                    </div>
                </div>
            </div>
            @if(Session::get('user') == null)
                <?php $isLoginTag = false;?>
                <div class="span span2 alone pp white-bg rounded" style="padding: 0;padding-top: 10px;">
                    <div class="block-register">
                        <div class="group-labels clr  hidden-mobile">
                            <label class="btn-req-login register-tab @if($errors->has('errorReg') || session('successReg')) active @else <?php $isLoginTag = true;?> @endif"><span>Đăng ký</span></label>
                            <label class="btn-req-login-login login-tab @if($errors->has('errorlogin') || $isLoginTag) active @endif"><span>Đăng nhập</span></label>
                        </div>
                        @if(false)
                        <div class="tab-register @if($errors->has('errorReg') || session('successReg')) active @endif">
                            @if($errors->has('errorReg'))
                                <div class="alert alert-danger">
                                    {{$errors->first('errorReg')}}
                                </div>
                            @endif
                            @if (session('successReg'))
                                <div class="alert alert-success">
                                    {{session('successReg')}}
                                </div>
                            @endif
                            <form class="frm-submit-register" action="/v2/dang-ky" method="post" enctype="miltipart/form-data">
                                <div hidden class="group-input text">
                                    <h3>GOTO</h3>
                                    <div>
                                        <input class="goto" type="text" name="goto" placeholder="">
                                    </div>
                                </div>
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                                <div class="group-input">
                                    <h3>HỌ VÀ TÊN</h3>
                                    <div>
                                        <input type="text" name="name" id="name" placeholder="Họ và tên">
                                    </div>
                                </div>
                                <div class="group-input">
                                    <h3>ĐIỆN THOẠI</h3>
                                    <div>
                                        <input type="text" name="mobile_phone" id="phone" placeholder="Số điện thoại">
                                    </div>
                                </div>
                                <div class="group-input">
                                    <h3>Email</h3>
                                    <div>
                                        <input type="text" name="email_info" id="email_info" placeholder="sample@gmail.com">
                                    </div>
                                </div>
                                <div class="group-input">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <h3>GIỚI TÍNH</h3>
                                            <select name="gender" class="form-control test" required="" id="gender"
                                                    type="text">
                                                <option value="3">Khác</option>
                                                <option value="1">Nam</option>
                                                <option value="2">Nữ</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <h3>LOẠI TÀI KHOẢN</h3>
                                            <select class="form-control test" name="type" required="">
                                                <option value="user" selected="selected">Bệnh nhân</option>
                                                <option value="professional">Bác sĩ</option>
                                                <option value="place">Quản lý cơ sở y tế</option>
                                                <option value="drugstore">Nhà thuốc</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="group-input text">
                                    <h3>Tên đăng nhập</h3>
                                    <div>
                                        <input type="text" name="email" id="user" placeholder="Tên đăng nhập">
                                    </div>
                                </div>
                                <div class="group-input text">
                                    <h3>Mật khẩu</h3>
                                    <div>
                                        <input type="password" name="password"
                                               placeholder="Mật khẩu cần có ít nhất 5 ký tự">
                                    </div>
                                </div>
                                <div id="ip-confirm-phone-number" class="group-input text" style="display: none">
                                    <h3>Mã xác nhận từ số điện thoại</h3>
                                    <div>
                                        <input type="text" id="code" placeholder="Mã xác nhận" />
                                    </div>
                                </div>
                                <div id="recaptcha-container"></div>
                                <br>
                                <div class="fcenter">
                                    <button id="sign-in-button" onclick="submitPhoneNumberAuth()" type="button" class="btn btn-ok btn-signin btn-rounded" value="">ĐĂNG KÝ</button>
                                    <button id="confirm-code" onclick="submitPhoneNumberAuthCode()" type="button" class="btn btn-ok btn-rounded" style="display: none" value="">XÁC NHẬN ĐĂNG KÝ</button>
                                </div>

                            </form>
                        </div>
                        <div class="tab-login @if($errors->has('errorlogin') || $isLoginTag) active @endif">
                            <form method="post" action="/v2/dang-nhap" name="login">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <input type="hidden" name="next" value="{{Request::get('next')}}"/>
                                <div class="group-input">
                                    <h3>Tên đăng nhập</h3>
                                    <div>
                                        <input name="email" required="" type="text" placeholder="Tên đăng nhập">
                                    </div>
                                </div>
                                <div class="group-input">
                                    <h3>Mật khẩu</h3>
                                    <div>
                                        <input name="password" required="" type="password" placeholder="Mật khẩu">
                                    </div>
                                </div>
                                <div hidden class="group-input text">
                                    <h3>GOTO</h3>
                                    <div>
                                        <input class="goto" type="text" name="goto" placeholder="">
                                    </div>
                                </div>
                                {{--<div class="req"><span>Quên mật khẩu?</span> <a href="#" class="alink">Tạo lại mật khẩu</a></div>--}}
                                <div class="req">
                                    @if($errors->has('errorlogin'))
                                        <div class="form-row">
                                            <div class="alert alert-danger">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-hidden="true">
                                                    &times;
                                                </button>
                                                <p style="color: #E84F5E;">{{$errors->first('errorlogin')}} </p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="fcenter">
                                    <button type="submit" class="btn btn-ok btn-rounded" value="">Đăng nhập</button>
                                </div>
                                <div class="fcenter">
                                    <img lazy loading="lazy" class="btn-login-with-facebook" data-src="/public/v2/img/login-with-facebook.PNG" alt="" style="cursor: pointer; margin-top: 12px;">
                                </div>
                            </form>
                            <form class="frm-login-fb" method="post" action="/loginface" name="loginface">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <input type="hidden" name="next" value="{{Request::get('next')}}"/>
                                <input class="ip-login-fb-id" name="id_facebook" required="" type="hidden" value="">
                                <input class="ip-login-fb-fullname" name="fullname" required="" type="hidden" value="">
                                <div hidden class="group-input text">
                                    <h3>GOTO</h3>
                                    <div>
                                        <input class="goto" type="text" name="goto" placeholder="">
                                    </div>
                                </div>
                            </form>


                            <script>
                                function getQueryParams(qs) {
                                    qs = qs.split('+').join(' ');

                                    var params = {},
                                        tokens,
                                        re = /[?&]?([^=]+)=([^&]*)/g;

                                    while (tokens = re.exec(qs)) {
                                        params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
                                    }

                                    return params;
                                }
                                var query = getQueryParams(document.location.search);
                                if (query.goto !== undefined) {
                                    $(".goto").val(query.goto);
                                }
                            </script>
                        </div>
                        @endif
                        <a target="_blank" href="{{$configs[3]->content}}?controls=0" class="youtube-layzy-load">
                            <img lazy loading="lazy" data-src="https://img.youtube.com/vi/RVXhz_dJKnY/sddefault.jpg" alt="Giới thiệu về Tdoctor">
                        </a>
                        <!-- <iframe style="max-width: 100%;" width="620" height="255" src="{{$configs[3]->content}}?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->

<?php
// var_dump($configs[1]->content);
// foreach($configs as $conf_index => $conf){
// // var_dump($conf);exit;
// }
function getUserIpAddr(){ if(!empty($_SERVER['HTTP_CLIENT_IP'])){ $ip = $_SERVER['HTTP_CLIENT_IP']; }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){ $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; }else{ $ip = $_SERVER['REMOTE_ADDR']; } return $ip; }

?>
        <!-- Trang chủ -->
<div class="trang-chu-qc containexr <?php echo getUserIpAddr(); ?>" style="">
    <div class="row">
<div class="col-sm-5">
<!-- Trang chủ -->
<ins class="adsbygoogle"
     style="display:inline-block;width:250px;height:250px"
     data-ad-client="ca-pub-7940791875056931"
     data-ad-slot="7428928413"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                    </div>
                    <div class="col-sm-7">
<?php
if(true || '14.190.119.67' == getUserIpAddr()){
?>
@include('v2.view.home-section-hoibacsi')
<?php
}
?>
                    </div>
                    </div>
                    </div>

                </div>
                </div>
            @endif
        </div>

        <div id="stuffs">
            <div id="home-questions" class="inner">
                <?php
                    $index = 0;
                    $newstquestion = $topQuestions->first();
                    $topQuestionUrl = '/hoibacsi/' . $newstquestion->question_url . '-' . $newstquestion->question_id;
                ?>
                <div class="newest-question">
                    <div class="question-card">
                        <a href="{{$topQuestionUrl}}">
                            <img lazy loading="lazy" alt="{{$newstquestion->question_title}}" data="{{$newstquestion->getThumbnailImage()}}" onerror="this.onerror=null; this.src='/public/images/ask-doctor.png?v=1'"
                            data-src="{{$newstquestion->getThumbnailImage()}}"/>
                        </a>
                        <div class="question-detail">
                            @if (!empty($newstquestion->question_content))
                                <a href="{{$topQuestionUrl}}">{{\App\Helpers\StringHelper::cut($newstquestion->question_content, 80)}}</a>
                            @else
                                <a href="{{$topQuestionUrl}}">{{\App\Helpers\StringHelper::cut($newstquestion->question_title, 80)}}</a>
                            @endif
                        </div>
                    </div>
                    <div class="question-card" style="margin-top: 6px;border: 0 none;padding: 0;">
                        <ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-7940791875056931"
     data-ad-slot="4794477471"></ins>
     <script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                    </div>
                </div>
                <div class="question-box">
                    @foreach($topQuestions as $question)
                        <?php
                            $index++;
                        ?>
                        @if ($index > 1)
                        <?php
                            $index++;
                            $questionUrl = '/hoibacsi/' . $question->question_url . '-' . $question->question_id;
                        ?>
                            <div class="question-item question-card">
                                <a href="{{$questionUrl}}">
                                    <img lazy loading="lazy" alt="{{$question->question_title}}" onerror="this.onerror=null; this.src='/public/images/ask-doctor.png?v=1'"
                                         data-src="{{$question->getThumbnailImage()}}"/>
                                </a>
                                <div class="question-detail">
                                    @if (!empty($question->question_content))
                                        <a href="{{$questionUrl}}">{{\App\Helpers\StringHelper::cut($question->question_content, 80)}}</a>
                                    @else
                                        <a href="{{$questionUrl}}">{{\App\Helpers\StringHelper::cut($question->question_title, 80)}}</a>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="inner" style="clear: both">
                <a style="float: right!important; margin-right: 20px;" href="/hoibacsi" title="Xem tất cả câu hỏi">Xem tất cả &gt;</a>
            </div>
            <div id="home-news" style="clear: both; margin-top: 50px;" class="inner">
                <div class="home-news-slider com-slider1 owl-carousel owl-theme">
                @foreach($topNews as $news)
                    <?php
                        $newsUrl = '/' . $news->article_url. '-' . $news->article_id.'.html';
                    ?>
                    <div class="item" data-aos="fade-in">
                        <div class="news-image">
                            @if ($news->image)
                                <a href="{{$newsUrl}}"><img lazy loading="lazy" alt="{{ $news->article_title }}" data-src="../public/images/{{$news->image}}"/></a>
                            @else
                                <a href="{{$newsUrl}}"><img lazy loading="lazy" alt="{{ $news->article_title }}" data-src="../public/images/noimage.png"/></a>
                            @endif
                        </div>
                        <div class="news-title">
                            <a href="{{$newsUrl}}">{{ $news->article_title }}</a>
                        </div>
                        <div class="news-summary">
                            <a href="{{$newsUrl}}">{{ \App\Helpers\StringHelper::cut($news->article_summary, 80)}}</a>
                        </div>
                    </div>
                @endforeach
                </div>
                <div class="inner" style="clear: both">
                    <a style="float: right!important; margin-right: 40px;" href="/baiviet" title="Xem tất cả tin tức">Xem tất cả &gt;</a>
                </div>
            </div>

            <div id="home-recruitment" style="clear: both; margin-top: 50px;" class="inner">
                <div class="home-recruitment-slider com-slider1 owl-carousel owl-theme">
                    @foreach($topRecruitments as $recruitment)
                        <?php
                            $clinic = $recruitment->clinic;
                        ?>
                        <div class="item" data-aos="fade-in">
                            <div class="clinic-image">
                                @if ($clinic != null && $clinic->profile_image)
                                    <a href="{{$recruitment->getUrl()}}"><img lazy loading="lazy" alt="{{ $recruitment->title }}" data-src="../public/images/health_facilities/{{$clinic->profile_image}}"/></a>
                                @else
                                    <a href="{{$recruitment->getUrl()}}"><img lazy loading="lazy" alt="{{ $recruitment->title }}" data-src="https://tdoctor.vn/public/v2/img/tuyen-dung.jpeg"/></a>
                                @endif
                            </div>
                            <div class="recruitment-title">
                                <a href="{{$recruitment->getUrl()}}">{{ $recruitment->title }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="inner" style="clear: both">
                    <a style="float: right!important; margin-right: 40px;" href="/danh-sach-tuyen-dung" title="Xem tất cả tuyển dụng">Xem tất cả &gt;</a>
                </div>
            </div>

            <div class="inner" style="clear: both; margin-top: 100px;">
                <div class="com-slider owl-carousel owl-theme">
                    <div class="item" data-aos="fade-in">
                        <figure><img lazy loading="lazy" data-src="public/v2/img/slider-5.jpg" alt="1. Chat text trực tiếp với bác sĩ giỏi trên App trên điện thoại mọi lúc mọi nơi">
                            <figcaption>
                                <p>1. Chat text trực tiếp với bác sĩ giỏi trên App trên điện thoại mọi lúc mọi nơi</p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="item" data-aos="fade-in">
                        <figure><img lazy loading="lazy" data-src="public/v2/img/slider-6.jpg" alt="2. Chat Audio nói chuyện trực tiếp với bác sĩ mọi lúc mọi nơi">
                            <figcaption>
                                <p>2. Chat Audio nói chuyện trực tiếp với bác sĩ mọi lúc mọi nơi</p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="item" data-aos="fade-up">
                        <figure><img lazy loading="lazy" data-src="public/v2/img/slider-1.jpg" alt="3. Chức năng tra cứu thuốc, tra cứu các dược chất trong danh mục hơn {{$countMedicine}} loại
                                    thuốc">
                            <figcaption>
                                <p>3. Chức năng tra cứu thuốc, tra cứu các dược chất trong danh mục hơn {{$countMedicine}} loại
                                    thuốc</p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="item" data-aos="fade-up">
                        <figure><img lazy loading="lazy" data-src="public/v2/img/slider-3.jpg" alt="4. Danh mục hơn {{$countDoctor}} các bác sĩ giởi trên toàn quốc trên hệ thống">
                            <figcaption>
                                <p>4. Danh mục hơn {{$countDoctor}} các bác sĩ giởi trên toàn quốc trên hệ thống</p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="item" data-aos="fade-down">
                        <figure><img lazy loading="lazy" data-src="public/v2/img/slider-4.jpg" alt="5. Gởi câu hởi trực tiếp trên web">
                            <figcaption>
                                <p>5. Gởi câu hởi trực tiếp trên web</p>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="counters">
        <div class="inner">
            <div class="has-bg clr row">
                <div class="span col-sm-2 m alone text-center">
                    <h5 class="counter ctr1" data-count="{{$countClinic}}">{{$countClinic}}</h5>
                    <em>Phòng khám</em></div>
                <div class="span  col-sm-2 m alone text-center">
                    <h5 class="counter ctr2" data-count="{{$countDoctor}}">{{$countDoctor}}</h5>
                    <em>Bác sĩ</em></div>
                <div class="span  col-sm-2 m alone text-center">
                    <h5 class="counter ctr3" data-count="{{$countDrugstore}}">{{$countDrugstore}}</h5>
                    <em>Nhà thuốc</em></div>
                <div class="span  col-sm-2 m alone text-center">
                    <h5 class="counter ctr4" data-count="{{$countUser}}">{{$countUser}}</h5>
                    <em>Bệnh nhân</em></div>
                <div class="span  col-sm-2 m alone text-center">
                    <h5 class="counter ctr4" data-count="{{$countQuestion}}">{{$countQuestion}}</h5>
                    <em>Câu hỏi</em></div>
                <div class="span  col-sm-2 m alone text-center">
                    <h5 class="counter ctr4" data-count="{{$countAnswer}}">{{$countAnswer}}</h5>
                    <em>Câu trả lời</em></div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function () {
            setHeightEqualWidth();
            function setHeightEqualWidth() {
                let widthImage = $('.img-slider-home').width();
                let height = widthImage*1.2;
                $('.img-slider-home').css("height", height + "px");
            }
            $(window).resize(function() {
                setHeightEqualWidth();
            });
        });

        // Paste the config your copied earlier
        // var firebaseConfig = {
        //     apiKey: "AIzaSyCCm2WsuEV3dSvFRu4SSARcTVAeh6Uk_ko",
        //     authDomain: "medix-link.firebaseapp.com",
        //     databaseURL: "https://medix-link.firebaseio.com",
        //     projectId: "medix-link",
        //     storageBucket: "medix-link.appspot.com",
        //     messagingSenderId: "917263872826",
        //     appId: "1:917263872826:web:2d36474ec51fccef34d603"
        // };

        // firebase.initializeApp(firebaseConfig);

        // // IF you want to hide the recaptcha, use 'invisible' the size
        // window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier(
        //     "sign-in-button",
        //     {
        //         size: "invisible",
        //         callback: function(response) {
        //             submitPhoneNumberAuth();
        //         }
        //     }
        // );

        // This function runs when the 'sign-in-button' is clicked
        // Takes the value from the 'phoneNumber' input and sends SMS to that phone number
        // function submitPhoneNumberAuth() {
        //     var phoneNumber = document.getElementById("phone").value;
        //     if (phoneNumber == "0967783497" || phoneNumber == "0967 783 497" || phoneNumber == "+84967783497")
        //     {
        //         $('.frm-submit-register').submit();
        //         return;
        //     }
        //     if (phoneNumber.charAt(0) === '0')
        //     {
        //         phoneNumber = phoneNumber.substring(1);
        //         phoneNumber = "+84" + phoneNumber;
        //     }
        //     var appVerifier = window.recaptchaVerifier;
        //     firebase
        //         .auth()
        //         .signInWithPhoneNumber(phoneNumber, appVerifier)
        //         .then(function(confirmationResult) {
        //             window.confirmationResult = confirmationResult;
        //             $('#ip-confirm-phone-number').show();
        //             $('#confirm-code').show();
        //             $('#sign-in-button').hide();
        //         })
        //         .catch(function(error) {
        //             if (error.code === "auth/too-many-requests") {
        //                 alert("Quá nhiều lần xác nhận số điện thoại. Vui lòng đăng ký lại sau.");
        //             }

        //             $('#ip-confirm-phone-number').show();
        //             $('#confirm-code').show();
        //             $('#sign-in-button').hide();
        //         });
        // }

        // This function runs when the 'confirm-code' button is clicked
        // Takes the value from the 'code' input and submits the code to verify the phone number
        // Return a user object if the authentication was successful, and auth is complete
        // function submitPhoneNumberAuthCode() {
        //     var code = document.getElementById("code").value;
        //     confirmationResult
        //         .confirm(code)
        //         .then(function(result) {
        //             $('.frm-submit-register').submit();
        //         })
        //         .catch(function(error) {
        //             if (error.code === "auth/invalid-verification-code") {
        //                 alert("Mã xác nhận không đúng vui lòng kiểm tra lại");
        //             }
        //         });
        // }

        // firebase.auth().signOut();
    </script>
    <section id="specialists">
        <div class="inner">
            <h2 class="cat-title"><span class="title">Bác sĩ nổi bật</span></h2>
            <em style="max-width:unset;">Danh sách bác sĩ tương tác nhiều trên hệ thống</em>
            <div class="content" style="width: 100%;">
                <div class="dr-slider owl-carousel owl-theme">
                    @if(isset($doctors))
                        @foreach($doctors as $doctor)
                            <div class="item" data-aos="fade-up">
                                <figure class="hover hover-zoom"><img lazy loading="lazy" class="img-slider-home" style="width: 100%;" data-src="
                @if($doctor->profile_image == '')
                                            https://n6-img-fp.akamaized.net/free-vector/doctor-character-background_1270-84.jpg?size=338&ext=jpg
                @else
                                    {{url('public/images/doctor/'.$doctor->profile_image)}}"
                                                                      alt="{{$doctor->doctor_name}}"
                                                                      @endif title="{{$doctor->doctor_name}}">
                                    <figcaption>
                                        <span style="color: #E84F5E"> <a style="font-size: 18px;font-weight: bold;" href="/danh-sach-bac-si-chi-tiet/{{$doctor->doctor_id}}">{{$doctor->doctor_name}}</a></span><em style="color: #E84F5E">
                                            <a href="/danh-sach-bac-si-chi-tiet/{{$doctor->doctor_id}}">{{$doctor->doctorspeciality->speciality->speciality_name}}</a>
                                        </em>
                                    </figcaption>
                                </figure>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

    </section>
@endsection
