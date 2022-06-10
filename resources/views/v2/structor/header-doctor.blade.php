<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>

    <link rel="stylesheet" href="/public/v2/css/bootstrap.min.css">
    <link href="/../public/v3/fontawesome-free-6.0.0-beta2-web/css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="/public/v2/css/style.css?v=0.1.194<?php //echo time(); ?>">
    <link rel="stylesheet" href="/public/v2/css/magnific-popup.css">
    <link rel="stylesheet" href="/public/patient/style.css?v=0.1.194<?php //echo time(); ?>">

    <link rel="stylesheet" href="/public/new-ui/css/style.min.css">

    

    <link rel="stylesheet" href="../../public/v3/assets/style/common.css?v=0.1.200" type="text/css">
    <link rel="stylesheet" href="../../public/v3/assets/style/style.css?v=0.1.200" type="text/css">
    <link rel="stylesheet" href="../../public/v3/assets/style/bun.css?v=0.1.200" type="text/css">

    <link rel="preload" href="/public/fonts/ProximaNova-Bold.woff" as="font" type="font/woff" crossOrigin="anonymous"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" media="all">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap" rel="stylesheet">

    <!----------------------->
    <script src="/public/v2/js/jquery.min.js"></script>
    <script src="/public/v2/js/img_box.js"></script>
    <script src="/public/v2/js/jquery-ui.min.js"></script>
    <script src="/public/v2/js/eModal.min.js"></script>
    <script src="/public/v2/js/jquery.magnific-popup.min.js"></script>

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
        })
    </script>
</head>
<?php
$clinic_url = '/danhsach-phongkham';
$doctor_url = '/danh-sach-bac-si';
if( Session::get('user')!=null ){
    $user = Session::get('user');
    // var_dump(App\Users::TYPE_DOCTOR);
    // var_dump(App\Users::TYPE_CLINIC);
    // var_dump($user->refer_type);
    // var_dump($user->refer_id);
    $doctor_name = Session::get('user')->fullname;
    if($user->refer_type == App\Users::TYPE_DOCTOR){
        $doctor_url = '/danh-sach-bac-si-chi-tiet/'.$user->refer_id;
    }
    if($user->refer_type == App\Users::TYPE_CLINIC){
        $clinic_url = '/phongkham-chitiet/'.$user->refer_id;
    }
    if($user->user_type_id == App\Users::TYPE_DOCTOR){
        $doctor_name = $user->doctor->doctor_name;
    }
    if($user->user_type_id == App\Users::TYPE_CLINIC){
        $doctor_name = $user->clinic->clinic_name;
    }

}
?>
<body class="home logged-in-doctor">
<header>
    <nav class="container">
        <div class="row">
            <div class="col-sm-4 text-center text-sm-left">
                <div class="logo" style="float: left;margin-top: 22px;">
                    <a href="/">
                        <span style="width: 50px;height: 50px;float: left;background: url('/chatapi/get-avatar/room_{{$user->user_id}}') no-repeat;background-size: cover;border-radius: 50%;margin-top: 10px;" alt=""></span>
                        <span class="logo-username">{{$doctor_name}} </span>
                    </a>
                </div>
                <div class="search-holder" style="    float: left;    max-width: 145px;    margin-top: 32px;">
                    <div class="group-search">
                        <div class="input">
                            <form id="search-query" method="get" action="/tim-kiem" name="global-search">
                                <input name="q" type="text" placeholder="Tìm kiếm...">
                                <a href="javascript:{}" onclick="document.getElementById('search-query').submit();"
                                   class="search-go"><i class="fas fa-search"></i></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 text-sm-right">
                <div class="list-menu">
                    <ul>
                        <li class="btn-menu-notify"><a href="/taikhoan/hoidap"><img src="/public/patient/images/logo-questions.png" /><span class="menu-name">Hỏi đáp</span><span class="menu-notify">1+</span></a></li>
                        <li><a href="/taikhoan/benhnhan"><img src="/public/patient/images/benh-nhan-old.png" /><span class="menu-name">Bệnh nhân của tôi</span></a></li>
                        <li><a href="/taikhoan/vietbai"><img src="/public/patient/images/gui-bai-viet.png" /><span class="menu-name">Bài viết</span></a></li>
                        <li><a href="/taikhoan/lamsang"><img src="/public/patient/images/chia-se-lam-sang.png" /><span class="menu-name">Lâm sàng</span></a></li>
                    
                        <li class="btn-menu-notify"><a class="btn-menu-chat" href="javascript:void(0);"><img src="/public/patient/images/logo-message.png" /><span class="menu-name">Chat</span><span class="menu-notify">1+</span></a></li>
                        <li class="btn-menu-notify"><a href="/taikhoan/thongbao"><img src="/public/patient/images/logo-notification.png" /><span class="menu-name">Thông báo</span><span class="menu-notify">2+</span></a></li>
                        <li>
                            <a class="bi-option-menu" href="javascript:void(0);">
                                <i class="fas fa-caret-down"></i>
                                <span class="menu-name" style="display: block;margin-top: 5px;">Thêm</span>
                            </a>
                            <ul>
                                <li><a href="/taikhoan">Thông tin tài khoản</a></li>
                                <li><a href="/taikhoan/thongbao">Thêm thông báo</a></li>
                                @if(Session::get('user')->user_type_id==3)
                                <li><a href="/taikhoan/sua-thong-tin-csyt/">Sửa thông tin Cơ sở y tế</a></li>
                                <li><a href="/taikhoan/tuyendung/">Đăng tuyển dụng</a></li>
                                @endif
                                <li><a href="/taikhoan/henlichkham">Danh sách đặt lịch khám</a></li>
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
