<?php
$class_hide_footer = '';
$currentUser = Session::get('user');
$hotro_vien_id = '464103899';
if($currentUser!=null){
    if($currentUser->user_type_id == 2 || $currentUser->user_type_id == 3){
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
    @if(true||Session::get('user')==null)
        <script>
            if (window.addEventListener) {
                window.addEventListener("message", onMessage, false);        
            } 
            else if (window.attachEvent) {
                window.attachEvent("onmessage", onMessage, false);
            }

            function onMessage(event) {
                // Check sender origin to be trusted
                // if (event.origin !== "http://example.com") return;

                var data = event.data;

                if (typeof(window[data.func]) == "function") {
                    window[data.func].call(null, data.message);
                }
            }

            // Function to be called from iframe
            function parentFunc(message) {
                alert(message);
            }
            $('.btn-req-login').click(function (e) {
                <?php
                
                $ref_type=isset($_REQUEST['ref_type']) ? $_REQUEST['ref_type'] : '';
                $ref_code=isset($_REQUEST['ref_code']) ? $_REQUEST['ref_code'] : '';
                ?>
                // eModal.iframe({url:'/frameLogin?v=1&rt=<?php echo $ref_type; ?>&rc=<?php echo $ref_code; ?>',title: 'Nhập thông tin người bệnh', size: eModal.size.sm});
            });
            $('.btn-req-login-login').click(function (e) {
                // eModal.iframe({url:'/frameLogin?type=login&v=1',title: 'Đăng nhập vào hệ thống', size: eModal.size.sm});
            });
            $('.btn-comment').click(function (e) {
                // eModal.iframe({url:'/frameLogin?type=login&v=1',title: 'Đăng nhập vào hệ thống', size: eModal.size.sm});
            });
            $('body').on('click', '.btn-login-to-chat', function (e) {
                // eModal.iframe({url:$(this).attr('data-url'),title: 'Đăng nhập vào hệ thống', size: eModal.size.sm});
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
    
    <!-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script> -->
    <script type="text/javascript">
        

    </script>
    <div id="fb-root"></div>
    <script>
        // window.fbAsyncInit = function() {
        //     FB.init({
        //         xfbml            : true,
        //         version          : 'v10.0'
        //     });
        // };

        // (function(d, s, id) {
        //     var js, fjs = d.getElementsByTagName(s)[0];
        //     if (d.getElementById(id)) return;
        //     js = d.createElement(s); js.id = id;
        //     js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        //     fjs.parentNode.insertBefore(js, fjs);
        // }(document, 'script', 'facebook-jssdk'));
    </script>

    @if(false && Session::get('user')==null)
    <div class="zalo-chat-widget" data-oaid="2761788273568594682" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="350" data-height="420"></div>
    <script src="https://sp.zalo.me/plugins/sdk.js"></script>
    
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
    @endif
    
    <div class="inner">
        <div class="group-footer clr">
            <div class="span span6 m alone">
                <h3 class="small-cat" key="linq" class="langtr">Link nhanh</h3>
                <ul class="bottom-nav">
                    <li><a key="home" class="langtr fs1" href="/">Trang chủ</a></li>
                    <li><a key="askd" class="langtr fs1" href="/hoibacsi">Hỏi bác sĩ</a></li>
                    <li><a key="ques" class="langtr fs1" href="/hoibacsi/datcauhoi">Đặt câu hỏi</a></li>
                    <li><a key="prom" class="langtr fs1" href="/khuyenmai">Khuyến mãi</a></li>
                    <li><a key="prom" class="langtr fs1" href="/hotro">Hỗ trợ</a></li>
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
                <!-- <h3 class="small-cat">&nbsp;</h3> -->
                <ul class="bottom-nav icon-contact">
                    <li>
                        <a class="group-icon-contact" href="https://www.youtube.com/channel/UCm3h1QVkgGg6xvyEHElMx7Q/videos">
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
        <a href="javascript:void(0);" class="btn btn-ok btn-rounded click-to-start-chat" data-my-name="{{Session::get('user')->fullname}}" data-client-name="Hỗ trợ viên" data-chat-to="room_{{$hotro_vien_id}}" data-chat-room="room_{{$hotro_vien_id}}_{{Session::get('user')->user_id}}">
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

.btn-chat-vs-bs {
    /*max-width: 100%;
    display: inline-block;
    white-space: normal;
    padding: 8px 5px;
    border-radius: 5px;
    line-height: inherit;
    text-transform: inherit;*/
}

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
</style>
<div class="box-show-loading">
    <span class="loadersmall-bar"></span>
</div>
@include('v2.structor.login-section')
<script type="text/javascript">
    $(document).ready(function()  {
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
<script src="/public/v2/js/owl.carousel.min.js"></script>
<script src="/public/v2/js/main.js?v=1.0"></script>
<script src="/public/v2/js/parallax.min.js"></script>
<script src="/public/v2/js/aos.js"></script>
<script src="/public/v2/js/stats.js"></script>
<script src="/public/v2/js/popper.min.js"></script>
<script src="/public/v2/js/bootstrap.min.js"></script>
<script src="/public/new-ui/js/app.min.js"></script>
<script>
    

    

    // khi tấm ảnh gần chạm viewport (còn 100px nữa là chạm), thì load tấm ảnh ngay
    var threshold = 100;

    // tránh vấn đề về performance
    var timeout;

    function lazyload () {
        // duyệt tất cả tấm ảnh cần lazy-load
        var lazyImages = document.querySelectorAll('[lazy]');
        clearTimeout(timeout);

        timeout = setTimeout(function() {
            var scrollTop = window.pageYOffset;
            lazyImages.forEach(function(lazyImage) {
              var src = lazyImage.dataset.src;

              // khi vị trí tấm ảnh gần chạm viewport, load ngay
              if (lazyImage.offsetTop < (window.innerHeight + scrollTop + threshold)) {
                lazyImage.tagName.toLowerCase() === 'img'
                // <img>: copy data-src sang src
                  ? lazyImage.src = src

                // <div>: copy data-src sang background-image
                : lazyImage.style.backgroundImage = "url(\'" + src + "\')";

                // copy xong rồi thì bỏ attribute lazy đi
                lazyImage.removeAttribute('lazy');
              }
            });

            // tất cả tấm ảnh đã được load xong, dọn dẹp và đi thôi.
            if (lazyImages.length == 0) { 
              document.removeEventListener('scroll', lazyload);
            }
        }, 10);
    }

    

    jQuery(document).ready(function($){
        setTimeout(function(){
            lazyload();
            document.addEventListener('scroll', lazyload);
            AOS.init();
        }, 2000);        
    })

</script>
</body>
</html>
