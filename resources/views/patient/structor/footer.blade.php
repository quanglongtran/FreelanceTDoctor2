<?php
$class_hide_footer = '';
$currentUser = Session::get('user');
if($currentUser!=null){
    if($currentUser->user_type_id == 1 || $currentUser->user_type_id == 2){
        $class_hide_footer = 'bi-hidden-real';
        ?>
        <footer class="footer-doctor">
            <p>© Copyright by <a href="https://tdoctor.vn">Tdoctor.vn</a> <a class="bi-hidden-real" href="tel:+84393167234">+84393167234</a></p>
        </footer>
        <?php
    }
}
?>
<footer class="{{$class_hide_footer}}">
    @if(Session::get('user')==null)
        <script>
            $('.btn-req-login').click(function (e) {
                eModal.iframe('https://tdoctor.vn/frameLogin', 'Nhập thông tin người bệnh')
            });
        </script>
    @endif
    <div style="z-index: 1000;
    border: none;
    visibility: visible;
    bottom: 0px;
    right: 60px;
    position: fixed;
    width: 70px;
    height: 70px;
    top: auto;"><a class="hidden" href="tel:+84393167234"><img style="width: 60px; height: 60px;" src="/public/v2/img/img_call_footer.jpg"/></a> </div>
    @if(Session::get('user')==null)
    <div class="zalo-chat-widget" data-oaid="2761788273568594682" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="350" data-height="420"></div>
    <script src="https://sp.zalo.me/plugins/sdk.js"></script>
    @endif

    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
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
        }(document, 'script', 'facebook-jssdk'));</script>

    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat"
         attribution="setup_tool"
         page_id="110080264479093"
         logged_in_greeting="Hi! TDoctor giúp gì cho bạn???"
         logged_out_greeting="Hi! TDoctor giúp gì cho bạn???">
    </div>

    <div class="inner">
        <div class="group-footer clr">
            <div class="span span6 m alone">
                <h3 class="small-cat" key="linq" class="langtr">Link nhanh</h3>
                <ul class="bottom-nav">
                    <li><a key="home" class="langtr fs1" href="/">Trang chủ</a></li>
                    <li><a key="askd" class="langtr fs1" href="/hoibacsi">Hỏi bác sĩ</a></li>
                    <li><a key="ques" class="langtr fs1" href="/hoibacsi/datcauhoi">Đặt câu hỏi</a></li>
                    <li><a key="prom" class="langtr fs1" href="/khuyenmai">Khuyến mãi</a></li>
                </ul>
            </div>
            <div class="span span4 m alone">
                <h3 class="small-cat">TDOCTOR</h3>
                <ul class="bottom-nav">
                    <li><a key="aboutus" class="langtr fs1" href="/vechungtoi">Về chúng tôi</a></li>
                    <li><a key="contact" class="langtr fs1" href="/lienhe">Liên hệ</a></li>
                    <li><a key="qtri" class="langtr fs1" href="/quytrinh-giaiquyet-tranhchap">Quy trình giải quyết tranh chấp</a></li>
                    <li><a key="baomat" class="langtr fs1" href="/chinhsach-baomat-thongtin-khachhang">Chính sách bảo mật thông tin</a></li>
                    <li><a key="dangkybacsi" class="langtr fs1" href="/dang-ky-bac-si">Đăng ký bác sĩ</a></li>
                    <li><a key="dangkybacsi" class="langtr fs1" href="{{route('clinic.register.get')}}">Đăng ký phòng khám</a></li>
                </ul>
            </div>
            <style>
                footer .bottom-nav:not(.follow) > li > .group-icon-contact {
                    opacity: unset;
                }

                .icon-contact li a img {
                    float: left;
                }

                .icon-contact li a div {
                    margin: 4px 0px;
                    margin-left: 35px;
                }
            </style>
            <div class="span span6 m alone">
                <h3 class="small-cat">Liên hệ</h3>
                <ul class="bottom-nav icon-contact">
                    <li>
                        <a class="group-icon-contact" href="https://www.facebook.com/tdoctoronline/">
                            <img src="/public/v2/img/facebook.png" width="30"/>
                            <div>Facebook</div>
                        </a>
                    </li>
                    <li>
                        <a class="group-icon-contact" href="https://twitter.com/TDoctor2">
                            <img src="/public/v2/img/twitter.png" width="30"/>
                            <div>Twitter</div>
                        </a>
                    </li>
                    <li>
                        <a class="group-icon-contact" href="https://www.linkedin.com/in/tdoctor">
                            <img src="/public/v2/img/linkedin.png" width="30"/>
                            <div>Linkedin</div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="span span6 m alone">
                <h3 class="small-cat">&nbsp;</h3>
                <ul class="bottom-nav icon-contact">
                    <li>
                        <a class="group-icon-contact" href="https://www.youtube.com/channel/UCz-hO1nOgtvaB7c22CLS_xA">
                            <img src="/public/v2/img/youtube.png" width="30"/>
                            <div>Youtube</div>
                        </a>
                    </li>
                    <li>
                        <a class="group-icon-contact" href="https://www.instagram.com/tdoctorcom/">
                            <img src="/public/v2/img/instagram.png" width="30"/>
                            <div>Instagram</div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="span span4 m alone">
                <h3 key="infcnt"  class="small-cat langtr">ĐỊA CHỈ LIÊN HỆ</h3>
                <p><strong key="addr" class="langtr" >Trụ sở chính:</strong> P.1108, tòa nhà Gold Tower, 275 Nguyễn Trãi, Thanh Xuân, Hà Nội</br>
                    <strong>Chi nhánh:</strong> Phòng 6.28, tòa nhà Everich Infinity, 290 An Dương Vương, phường 4, quận 5, Hồ Chí Minh</br>
                    <strong>Email:</strong> tdoctorvn@gmail.com</br>
                    <strong>Nơi đăng ký:</strong> 7F Huỳnh Tấn Phát, Thị trấn Nhà Bè, Huyện Nhà Bè, Hồ Chí Minh</br>
                    <strong>Hotline:</strong> +84 393 167 234</br>
                    <strong>Skype:</strong> netbotvn</p>
            </div>
        </div>
    </div>
    <div class="clr bottom-footer">
        {{--<p class="copyright center">&copy; 2019 TDoctor - <span class="small-size">Designed by <a href="#">_prizce</a></span></p>--}}
        <p key="abweb1"  class="copyright center langtr fs1" >Website được sở hữu và quản lý bởi: Công ty cổ phần giải pháp TDoctor.</p>
            <p key="abweb2" class="copyright center langtr fs1" >
            Giấy chứng nhận đăng ký kinh doanh số 0316725186 do Sở Kế hoạch và Đầu tư TP Hồ Chí Minh cấp ngày
            01/03/2021.</p>
            <p  key="abweb3"  class="copyright center langtr fs1">
            Các thông tin trên web site này chỉ mang tính chất tham khảo. Chúng tôi không chịu trách nhiệm nào do việc
            áp dụng các thông tin trên web site này gây ra.</p>
    </div>
    <div class="global-thread-create-cta">
        @if(!Session::get('user')==null)
        <a href="javascript:void(0);" class="btn btn-ok btn-rounded click-to-start-chat" data-my-name="{{Session::get('user')->fullname}}" data-client-name="Hỗ trợ viên" data-chat-to="room_464103899" data-chat-room="room_464103899_{{Session::get('user')->user_id}}">
            Chat với hỗ trợ viên
        </a>
        @else
        <a href="javascript:void(0);" class="btn btn-ok btn-rounded btn-login-to-chat" data-url="/frameLogin">
            Chat với hỗ trợ viên
        </a>
        @endif
    </div>
</footer>
<style type="text/css">
.section-body-benhan {
    width: 100%;
    overflow-x: auto;
}
#them_benh_an_Modal textarea{
    height: auto;
}
tbody.danh-sach-show-benh-an * {
    white-space: normal;
}
.loadersmall {
    border: 2px solid #f3f3f3;
    -webkit-animation: spin 1s linear infinite;
    animation: spin 1s linear infinite;
    border-top: 2px solid #555;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    display: inline-block;
    vertical-align: -3px;
    display: none;
}
.active > .loadersmall {
    display: inline-block;
}
@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
    .btn-benh-an {
    padding: 5px 10px;
    font-weight: 300;
    text-transform: none;
    margin: 0 5px;
    background: #e84f5e;
}
.box-show-loading {
    background: #21252940;
    position: fixed;
    left: 0;
    top: 0;
    bottom: 200%;
    right: 0;
    /*display: none;*/
}
.box-show-loading.active {
    display: block;
    bottom: 0;
    z-index: 999999999;
}

.box-show-loading .loadersmall-bar {
    height: 5px;
    width: 1px;
    background: #f13144;
    display: block;
    top: -5px;
    position: relative;
    transition: width 0s;
}
.box-show-loading.active .loadersmall-bar {
    transition: width 2s;
    width: 100%;
    top: 0;
}

a.btn.btn-ok.btn-rounded.click-to-start-chat-small {
    padding: 3px 10px;
    font-size: 10px;
}
</style>

<!-- Modal show bệnh án-->
<div id="thong_tin_dat_kham_Modal-global" class="modal fade modal-lg" role="dialog" style="margin:auto;">
  <div class="modal-dialog" style="max-width: 100%;">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="display: block;">
        <button type="button" class="close" data-dismiss="modal" style="display: inline-block;">&times;</button>
         <h3 class="modal-title">Thanh toán ngay để được xếp lịch <strong></strong></h3>       
      </div>
      <div class="modal-body">
        <div class="section-body-benhan section-thong-tin-thanh-toan">
            <p>
            + Bạn hãy thanh toán 200k phí khám bệnh với bác sĩ của <strong>Tdoctor.vn</strong> bằng cách chuyển khoản vào:<br/>
                    Ngân hàng TMCP Ngoại thương Việt Nam <strong>Vietcombank (Chi nhánh TP.HCM)</strong><br/>
                    Tên tài khoản: <strong>Công ty cổ phần giải pháp TDoctor</strong><br/>
                    Số tài khoản: <strong>1019594158</strong><br/>
                    với nội dung chuyển khoản: <strong>tdoctor-datkham</strong> <br/>
                    + Hệ thống sẽ xác nhận đặt khám ngay khi nhận được chuyển khoản thành công.<br/>
                    + Cần bất cứ hỗ trợ nào khác hãy liên hệ @if(!Session::get('user')==null)
                <a href="javascript:void(0);" class="btn btn-ok btn-rounded click-to-start-chat click-to-start-chat-small" data-my-name="{{Session::get('user')->fullname}}" data-client-name="Hỗ trợ viên" data-chat-to="room_464103899" data-chat-room="room_464103899_{{Session::get('user')->user_id}}">
                    Hỗ trợ kết nối
                </a>
                @else
                <a href="javascript:void(0);" class="btn btn-ok btn-rounded btn-login-to-chat click-to-start-chat-small" data-url="/frameLogin">
                    Hỗ trợ kết nối
                </a>
                @endif
                <br/>
                 hoặc Hotline/Zalo: <strong>0393167234 / 0792438397 / 0905699983</strong>
               </p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-warning" data-dismiss="modal">Đóng cửa sổ</button>
      </div>
    </div>
  </div>
</div>

<div class="box-show-loading">
    <span class="loadersmall-bar"></span>
</div>
<script type="text/javascript">    
    jQuery(document).ready(function($){
        if(window.location.href.includes('?showpopup=1')){
            $('#thong_tin_dat_kham_Modal-global').modal({
                backdrop: 'static',
                keyboard: false
            });
        }
        $(document).on('click', '.chat-body .content-chat a', function(event){
            if($(this).attr('href').includes('?showpopup=1')){
                event.preventDefault();
                $('#thong_tin_dat_kham_Modal-global').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            }
        })
    })
</script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
        </script>
    <!-- slick slider js -->
    <script type="text/javascript">
        $(document).ready(function () {
            @if(Session::get('user')==null)
            $('.form__comment').click(function(){
                $('.btn-req-login').trigger('click');
            })

            @endif

            $('.youtube-link').click(function(event){
                event.preventDefault();
                $("#video").attr('src',$(this).attr('href') + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" );
                $('#myModal-youtube').modal();
            })
            $('.click-submit-form').click(function(){
                $(this).closest('form').trigger('submit');
            })
            $('.form-question form').click(function(){
                window.location.href = $(this).attr('action');
            })
            $('.slider__doctor').slick({
                infinite: false,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            infinite: true,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    // {
                    //     breakpoint: 480,
                    //     settings: {
                    //         slidesToShow: 1,
                    //         slidesToScroll: 1
                    //     }
                    // }

                ]
            });
        });
    </script>

    <script src="../../public/v3/assets/js/main.js"></script>
    
<script type="text/javascript">
    function bi_readCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }
    $(document).ready(function()  {
        var bi_auto_click = bi_readCookie('bi_auto_click');
        // alert(bi_auto_click);
        if(bi_auto_click && bi_auto_click != 'no'){
            if($('.click-to-start-chat[data-auto-click-to="'+bi_auto_click+'"]').length){
                document.cookie = "bi_auto_click=no";
                bi_auto_show_chat_box_after_login(bi_auto_click);                
            }
        }

        $('.goi-cho-bac-si.click-to-start-chat').click(function(){
            console.log('chat voi ho tro vien de goi cho bs');
            _that_gbs = $(this);
            setTimeout(function(){
                $('.chat-box.active textarea').val('Tôi muốn gọi cho '+ _that_gbs.attr('data-doctor'));
                $('.chat-box.active .btn-send-chat-message').click();
            }, 300);
        })

        $('.post-new').submit(function(){
            $('.box-show-loading').addClass('active');
            setTimeout(function(){
                $('.box-show-loading').removeClass('active');
            }, 5000);
        })
        $('.image-popup-vertical-fit').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            mainClass: 'mfp-img-mobile',
            image: {
                verticalFit: true,
                cursor: 'mfp-zoom-out-cur'
            }

        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function()  {
        $('.image-popup-vertical-fit').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            mainClass: 'mfp-img-mobile',
            image: {
                verticalFit: true,
                cursor: 'mfp-zoom-out-cur'
            }

        });
    });
</script>
@if(false)
<script src="/public/v2/js/owl.carousel.min.js"></script>
<script src="/public/v2/js/main.js"></script>
<script src="/public/v2/js/parallax.min.js"></script>
<script src="/public/v2/js/aos.js"></script>
<script src="/public/v2/js/stats.js"></script>
<script src="/public/v2/js/popper.min.js"></script>
<script src="/public/v2/js/bootstrap.min.js"></script>
<script src="/public/new-ui/js/app.min.js"></script>
<script>
    AOS.init();
</script>
@endif
</body>
</html>
