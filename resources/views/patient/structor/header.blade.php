<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="/../public/v3/fontawesome-free-6.0.0-beta2-web/css/all.css" rel="stylesheet"> <!--load all styles -->
        <!-- slick slider     -->
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />


    <link rel="stylesheet" href="../../public/v2/css/style.css?v=0.1.200<?php //echo time(); ?>">
    <link rel="stylesheet" href="../../public/patient/style.css?v=0.1.200<?php //echo time(); ?>">
    <link rel="stylesheet" href="../../public/v2/css/magnific-popup.css">

    <link rel="stylesheet" href="../../public/new-ui/css/style.min.css">



    <link rel="stylesheet" href="../../public/v3/assets/style/common.css?v=0.1.200" type="text/css">
    <link rel="stylesheet" href="../../public/v3/assets/style/style.css?v=0.1.200" type="text/css">
    <link rel="stylesheet" href="../../public/v3/assets/style/bun.css?v=0.1.200" type="text/css">

    <!----------------------->
    <script src="../../public/v2/js/jquery.min.js"></script>
    <script src="../../public/v2/js/img_box.js"></script>
    <script src="../../public/v2/js/jquery-ui.min.js"></script>
    <script src="../../public/v2/js/eModal.min.js"></script>
    <script src="../../public/v2/js/jquery.magnific-popup.min.js"></script>

    <script data-ad-client="ca-pub-7940791875056931" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-4YG3X6JX7Z"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-4YG3X6JX7Z');
    </script>
	<script type="text/javascript">
        //Lấy thông tin môi trường ngôn ngữ mình set
        let envLang = localStorage.getItem('lang');
        var userLang = navigator.language || navigator.userLanguage; 
       if (envLang === null)
       {
            if (userLang.includes('en'))
            {                   
                window.location="https://tdoctor.vn/en";
            }
        }  
        localStorage.setItem('lang', ''); 
    </script>
    <script type="text/javascript">
        
        jQuery(document).ready(function($){
            $('.bi-option-menu').click(function(){
                $(this).find('i').toggleClass('fa-caret-up');
                $(this).next('ul').toggleClass('active');
            })
            $('.main-menu-hotro').click(function(){
                setTimeout(function(){
                    $('.box-show-loading').removeClass('active');
                }, 300);                
            })
        })
    </script>
</head>
<?php
$clinic_url = '/csyt-cuatoi';
$doctor_url = '/danh-sach-bac-si';
$hotro_vien_id = '464103899';
$is_show_search = true;
if( Session::get('user')!=null ){
    $user = Session::get('user');
    // var_dump(App\Users::TYPE_DOCTOR);
    // var_dump(App\Users::TYPE_CLINIC);
    // var_dump($user->refer_type);
    // var_dump($user->refer_id);
    if($user->refer_type == App\Users::TYPE_DOCTOR){
        $doctor_url = '/danh-sach-bac-si-chi-tiet/'.$user->refer_id;
        $is_show_search = false;
        $clinic_data = App\Doctor::find($user->refer_id);
        if($clinic_data != null && $clinic_data->supporter_id2 != 0){
            $hotro_vien_id = $clinic_data->supporter_id2;
        }
    }
    if($user->refer_type == App\Users::TYPE_CLINIC){
        $is_show_search = false;
        $clinic_url = '/phongkham-chitiet/'.$user->refer_id;
        $clinic_data = App\Clinic::find($user->refer_id);
        if($user->user_id == '454103383'){
            // var_dump($clinic_data);
        }
        if($clinic_data != null && $clinic_data->supporter_id2 != 0){
            $hotro_vien_id = $clinic_data->supporter_id2;
        }
    }
}
?>
<body class="home logged-in-doctor logged-in-patient">
<header>
    <nav class="container">
    <div class="row">
        <div class="col-sm-4 text-center text-sm-left">
            <div class="logo" style="float: left;margin-top: 22px;">
                <a href="/">
                    <span style="width: 50px;height: 50px;float: left;background: url('/chatapi/get-avatar/room_{{Session::get('user')->user_id}}') no-repeat;background-size: cover;border-radius: 50%;margin-top: 10px;" alt=""></span>
                    <span class="logo-username">{{Session::get('user')->fullname}} </span>
                </a>
            </div>
        </div>
        <div class="col-sm-8 text-right">
            <div class="list-menu">
                <ul>
                    <li class="btn-menu-notify"><a href="/"><img src="/public/patient/images/logo-questions.png" /><span class="menu-name">Hỏi đáp</span><span class="menu-notify">1+</span></a></li>
                    <li><a href="/bacsi-cuatoi"><img src="/public/patient/images/bs-cua-toi.png" /><span class="menu-name">Bác sĩ của tôi</span></a></li>
                    <li><a href="{{$clinic_url}}"><img src="/public/patient/images/nha-thuoc.png" /><span class="menu-name">Cở sở y tế</span></a></li>
                    <li>
                        <a href="javascript:void(0);" class="main-menu-hotro click-to-start-chat" data-my-name="{{Session::get('user')->fullname}}" data-client-name="Hỗ trợ viên" data-chat-to="room_{{$hotro_vien_id}}" data-chat-room="room_{{$hotro_vien_id}}_{{Session::get('user')->user_id}}">
                            <i class="far fa-question-circle" style=" border: 0 none; width: auto; color: #e84f5e;"></i>
                            <span class="menu-name" style="color: #e84f5e;">Hỗ trợ</span>
                        </a>
                    </li>                    
                    <li>
                        @if($is_show_search)
                        <a href="/danh-sach-bac-si?q=+">
                        @else
                        <a href="javascript:void(0);">
                        @endif
                        <img src="/public/patient/images/tim-kiem.png" /><span class="menu-name">Tìm kiếm</span></a>
                    </li>
                    <li>
                        <a href="/baiviet">
                            <i class="far fa-newspaper" style=" border: 0 none; width: auto;"></i>
                            <span class="menu-name" style="">Tin tức</span>
                        </a>
                    </li>

                    <li class="btn-menu-notify"><a class="btn-menu-chat" href="javascript:void(0);"><img src="/public/patient/images/logo-message.png" /><span class="menu-name">Chat</span><span class="menu-notify">1+</span></a></li>
                    <li class="btn-menu-notify"><a href="/"><img src="/public/patient/images/logo-notification.png" /><span class="menu-name">Thông báo</span><span class="menu-notify">2+</span></a></li>
                    <li>
                        <a class="bi-option-menu" href="javascript:void(0);">
                            <i class="fas fa-caret-down"></i>
                            <span class="menu-name" style="display: block;margin-top: 5px;">Thêm</span>
                        </a>
                        <ul>
                            <li><a href="/taikhoan">Cài đặt tài khoản</a></li>
                            <li><a href="/taikhoan/benhan">Bệnh án của tôi</a></li>
                            <li><a href="/taikhoan/henlichkham">Danh sách đặt lịch khám</a></li>
                            <!-- <li><a href="/baiviet">Tin tức</a></li> -->
                            <li><a href="/taikhoan/doimatkhau">Đổi mật khẩu</a></li>
                            <li><a href="/dang-xuat">Đăng xuất</a></li>
                        <ul>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    </nav>
    
</header>
