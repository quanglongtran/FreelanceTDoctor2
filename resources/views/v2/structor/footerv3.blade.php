<style type="text/css">
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

<script type="text/javascript">    
    jQuery(document).ready(function($){
        console.log('sfjsdfsdfd sdkfjdskfsd');
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

<!-- Modal -->
<div class="modal fade" id="myModal-youtube" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">      
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>        
                <!-- 16:9 aspect ratio -->
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

    <footer>
        <div class="container">
            <div class="row row__pd">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="footer__block">
                        <h3>TDOCTOR</h3>
                        <ul class="menu__footer">
                            <li><a href="../../vechungtoi">Về chúng tôi</a></li>
                            <li><a href="../../lienhe">Liên hệ</a></li>
                            <li><a href="../../quytrinh-giaiquyet-tranhchap">Quy trình giải quyết tranh chấp</a></li>
                            <li><a href="../../chinhsach-baomat-thongtin-khachhang">Chính sách bảo mật thông tin</a></li>
                            <li><a href="../../dang-ky-bac-si">Đăng ký bác sĩ</a></li>
                            <li><a href="../../dang-ky-phong-kham">Đăng ký phòng khám</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="footer__block">
                        <h3>LIÊN HỆ</h3>
                        <ul class="social__list-f">
                            <li>
                                <a href="https://www.facebook.com/tdoctoronline/" class="d-flex align-items-center">
                                    <img src="../../public/v3/assets/image/fb.png" alt="Facebook của Tdoctor.vn">
                                    <span>Facebook</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/TDoctor2" class="d-flex align-items-center">
                                    <img src="../../public/v3/assets/image/logo-twitter-11549535419aik8i3pkro@2x.png" alt="Twitter của Tdoctor.vn">
                                    <span>Twitter</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/in/tdoctor" class="d-flex align-items-center">
                                    <img src="../../public/v3/assets/image/in2x.png" alt="Linkedin của Tdoctor.vn">
                                    <span>Linkedin</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/channel/UCm3h1QVkgGg6xvyEHElMx7Q/videos" class="d-flex align-items-center">
                                    <img src="../../public/v3/assets/image/ytb-footer.png" alt="Youtube của Tdoctor.vn">
                                    <span>Youtube</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/tdoctorcom/" class="d-flex align-items-center">
                                    <img src="../../public/v3/assets/image/unnamed@2x.png" alt="Instagram của Tdoctor.vn">
                                    <span>Instagram</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-6">
                    <div class="footer__block">
                        <h3>ĐỊA CHỈ</h3>
                        <ul class="address__list">
                            <li>
                                <img src="../../public/v3/assets/image/add.png" alt="Trụ sở của Tdoctor.vn">
                                <span>Trụ sở chính: P.1108, tòa nhà Gold Tower, 275 Nguyễn Trãi, Thanh Xuân, Hà
                                    Nội</span>
                            </li>
                            <li>
                                <img src="../../public/v3/assets/image/add.png" alt="Trụ sở 2 của Tdoctor.vn">
                                <span>Chi nhánh: Phòng 6.28, tòa nhà Everich Infinity, 290 An Dương Vương, phường 4,
                                    quận 5, Hồ Chí Minh</span>
                            </li>
                            <li>
                                <img src="../../public/v3/assets/image/mail.png" alt="Email của Tdoctor.vn">
                                <a href="maito:tdoctorvn@gmail.com">Liên hệ quảng cáo và hỗ trợ tdoctorvn@gmail.com
                                </a>
                            </li>
                            <li>
                                <img src="../../public/v3/assets/image/check-blue.png" alt="Nơi đăng ký của Tdoctor.vn">
                                <a href="">Nơi đăng ký: 7F Huỳnh Tấn Phát, Thị trấn Nhà Bè, Huyện Nhà Bè, Hồ Chí Minh</a>
                            </li>
                            <li>
                                <img src="../../public/v3/assets/image/phone-red.png" alt="Điện thoại của Tdoctor.vn">
                                <a href="">Hotline: +84 393 167 234
                                </a>
                            </li>
                            <li>
                                <img src="../../public/v3/assets/image/add.png" alt="MST của Tdoctor.vn">
                                <a href="">MST: 0316725186</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- slick slider js -->


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
    jQuery(document).ready(function($){
        $('.goi-cho-bac-si.click-to-start-chat').click(function(){
            console.log('chat voi ho tro vien de goi cho bs');
            _that_gbs = $(this);
            setTimeout(function(){
                $('.chat-box.active textarea').val('Tôi muốn gọi cho '+ _that_gbs.attr('data-doctor'));
                $('.chat-box.active .btn-send-chat-message').click();
            }, 300);
        })

        $('.image-popup-vertical-fit').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            mainClass: 'mfp-img-mobile',
            image: {
                verticalFit: true,
                cursor: 'mfp-zoom-out-cur'
            },
            // mainClass: 'mfp-with-zoom', // this class is for CSS animation below
          zoom: {
            enabled: true, // By default it's false, so don't forget to enable it

            duration: 300, // duration of the effect, in milliseconds
            easing: 'ease-in-out', // CSS transition easing function

            // The "opener" function should return the element from which popup will be zoomed in
            // and to which popup will be scaled down
            // By defailt it looks for an image tag:
            opener: function(openerElement) {
              // openerElement is the element on which popup was initialized, in this case its <a> tag
              // you don't need to add "opener" option if this code matches your needs, it's defailt one.
              return openerElement.is('img') ? openerElement : openerElement.find('img');
            }
          }
        });

    })

</script> 

    <script type="text/javascript">

        $(document).ready(function () {

            $('.xemthem-button').click(function(){
                $(this).closest('.question__full').addClass('active');
            })

            @if(Session::get('user')==null)
            $('.form__comment').submit(function(event){
                event.preventDefault();
            })
            $('.form__comment').click(function(event){
                event.preventDefault();
                $('.btn-req-login').trigger('click');
            })

            @endif

            $('.youtube-link').click(function(event){
                event.preventDefault();
                // $("#video").attr('src','https://www.youtube.com/embed/'+$(this).attr('href') + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" );
                $("#video").attr('src','https://www.youtube.com/embed/'+$(this).attr('href') + "?autoplay=1" );
                $('#myModal-youtube').modal();
            })
            $('.click-submit-form').click(function(){
                $(this).closest('form').trigger('submit');
            })
            $('.form-question form').click(function(){
                window.location.href = $(this).attr('action');
            })
            $('.slider__ds_phan_hoi').slick({
                infinite: false,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            infinite: true,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
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

    <?php
if(true || '14.190.119.67' == getUserIpAddr()){
?>
@include('v2.structor.login-section')
<?php
}
?>

</body>

</html>