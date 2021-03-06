<div class="container">
    <div class="row">
    <div class="global-thread-create-cta">
    	<a href="/hoi-bac-si/dat-cau-hoi/" class="button">
    		<i class="fa fa-question-circle" aria-hidden="true"></i>
    		<strong>Hỏi bác sĩ</strong>
    		<span>miễn phí</span>
    	</a>
    </div>
           <!-- footer starts -->
            <footer class="footer">
                <div class="footer-top">
                    <div class="container">
                        <div class="row">
                         <!--   <div class="col-md-3 article footer-widget1">
                                <h3>Bài viết Mới Nhất</h3>
                                <ul class="popular-posts">   
                                    @if(isset($news_new) && count($news_new) > 0)
                                    @foreach($news_new as $key => $art)  
                                        <li>
                                             <a href="{!! url('bai-viet/'.$art->article_id)!!}">
                                                <img src="{!!url('public/images/'.$art->image)!!}"  alt="{{$art->image}}"/>
                                            </a>
                                            
                                            <h4><a href="{!! url('bai-viet/'.$art->article_id)!!}">{!!$art->article_title!!} </a></h4>

                                            <span>
                                                <i class="fa fa-calendar"></i>
                                                {{date('d/m/Y', strtotime($art->created_at))}}
                                            </span>
                                        </li>                                        
                                        @endforeach
                                    @endif 
                                </ul>
                            </div> -->

                            <div class="col-md-3 footer-widget2">
                                <h3>Thông tin liên hệ</h3>
                                <span>Địa chỉ: 195B Nguyễn Chí Thanh - Phường 12 - Quận 5 - Hồ Chí Minh</span>
                                <br>
                                <span>Address: USA 30590 Cochise Circle suit 204 murrieta ,ca 92563</span>
                                <br>
                                <span>Email: tdoctor@gmail.com</span>
                                <br>
                                <span>Hotline: {{$hl->content}}<br>Skype : netbotvn</span>
                                <div class="footer-socials">
                                    <h4>Kết nối với chúng tôi</h4>
                                    <div id="fb-root">  </div>
                                        <script>(function(d, s, id) {
                                        var js, fjs = d.getElementsByTagName(s)[0];
                                        if (d.getElementById(id)) return;
                                        js = d.createElement(s); js.id = id;
                                        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
                                        fjs.parentNode.insertBefore(js, fjs);
                                        }(document, 'script', 'facebook-jssdk'));</script>
                                    <div class="fb-page" data-href="https://www.facebook.com/B%C3%A1c-S%C4%A9-Vi%E1%BB%87t-971050299703719/" data-tabs="timeline" data-width="340" data-height="246" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Bacsyviet-1580363511992683/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Bacsyviet-1580363511992683/">Bacsyviet</a></blockquote>
                                    </div>                           
                                </div>
                            </div>

                        <!--    <div class="col-md-3 footer-widget1">
                                <h3>Khuyến mãi nổi bật</h3>
                                <ul class="popular-posts">
                                @if($deals)
                                 <?php $i = 0;?>
                                    @foreach($deals as $deal)
                                       @if($i<5)
                                      <li>
                                            <a href="/khuyen-mai/{{\App\Deals::strtoUrl($deal->deal_title)}}-{{$deal->deal_id}}">
                                                <img src="/public/images/{!!$deal['image']!!}"  alt="#"/>
                                            </a>
                                            <h4><a href="/khuyen-mai/{{\App\Deals::strtoUrl($deal->deal_title)}}-{{$deal->deal_id}}">{!!$deal['deal_title']!!} </a></h4>  
                            
                                            <span class="footer_price">
                                                {!!number_format($deal['price'],0)!!} ₫                                        
                                            </span>
                                            <span class="footer_price_old">
                                                {!!number_format($deal['old_price'],0)!!} ₫
                                            </span>  
                                           
                                            <?php \Carbon\Carbon::setLocale('vi') ?>
                                            <br/>
                                            <span>
                                                <i class="fa fa-calendar"></i>
                                                {{date('d/m/Y', strtotime($deal['created_at']))}}
                                            </span>
                                        </li>
                                        @endif
                                        <?php $i+=1;?>
                                    @endforeach
                                @endif
                                </ul>
                            </div> -->
                            <div class="col-md-3 footer-widget2">
                                <h3>Tài khoản</h3>
                                <ul style="list-style: none;">
                                    <li>
                                        <a href="/dang-ky/" rel="nofollow" style="color: white;">Đăng ký</a>
                                    </li>
                                    <!-- <li>
                                        <a href="/dang-ky/professional" style="color: white;" rel="nofollow">Đăng ký bác sĩ</a>
                                    </li>
                                    <li>
                                        <a href="/dang-ky/place" style="color: white;" rel="nofollow">Đăng ký phòng khám</a>
                                    </li> -->
                                    <li>
                                        <a href="/dang-nhap/" style="color: white;" rel="nofollow">Đăng nhập</a>
                                    </li>
                                    <li>
                                        <a href="/quen-mat-khau/" style="color: white;" rel="nofollow">Khôi phục mật khẩu</a>
                                    </li>
                                </ul>
                                
                                <div class="footer-socials">
                                    <h4>TDoctor</h4>
                                    <ul style="list-style: none;">
                                        <li>
                                            <a href="/ve-chung-toi" style="color: white;" title="Về chúng tôi" rel="nofollow">Về chúng tôi</a>
                                        </li>
                                        <li>
                                            <a href="/tuyen-dung" style="color: white;" title="Tuyển dụng" rel="nofollow">Tuyển dụng</a>
                                        </li>
                                        <li>
                                            <a href="/lien-he" style="color: white;" title="Liên hệ" rel="nofollow">Liên hệ</a>
                                        </li>
                                        <li>
                                            <a href="/quy-trinh-giai-quyet-tranh-chap" style="color: white;" title="Quy trình giải quyết tranh chấp" rel="nofollow">Quy trình giải quyết tranh chấp</a>
                                        </li>
                                        <li>
                                            <a href="/chinh-sach-bao-mat-thong-tin-khach-hang/" style="color: white;" title="Chính sách bảo mật thông tin khách hàng" rel="nofollow">Chính sách bảo mật thông tin</a>
                                        </li>
                                    </ul>                          
                                </div>

                                <div  class="footer-socials">
                                    <h4>Đã có trên IOS và Android</h4>
                                    <div class="row" style="margin-top: 10%;">
                                        <div class="col-md-6">
                                            <a href="https://itunes.apple.com/us/app/do-ba/id1357424530?ls=1&mt=8">
                                                <img style="width: 100%; height: 50px;" src="{!!url('public/images/download/ios.png')!!}">
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="https://play.google.com/store/apps/details?id=com.app.khambenh.bacsiviet">
                                                <img style="width: 100%; height: 50px;" src="{!!url('public/images/download/android.png')!!}">
                                            </a>
                                        </div>
                                    </div>  
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="back-top">
                    <a class="back-top"><i class="fa fa-angle-up" id="bttop"></i></a>
                </div>
                <div class="footer-bottom text-center">
                   <div class="disclaimer">                
    				<p>
    					Website được sở hữu và quản lý bởi: <strong>VIETNAM ONLINE DOCTOR COMPANY LIMITED</strong>.
    				</p>
    				<p>Giấy chứng nhận đăng ký kinh doanh số <strong class="registration-number">0314883204</strong> do Sở Kế hoạch và Đầu tư TP Hồ Chí Minh cấp ngày 08/02/2018.</p>
    				<p>Các thông tin trên web site này chỉ mang tính chất tham khảo. Chúng tôi không chịu trách nhiệm nào do việc áp dụng các thông tin trên web site này gây ra.</p>
    			</div>
                </div>
               
            </footer>
        </div>
    </div>
    </main>
    <!-- main page ends -->
	
    <!-- Jquery and javascript files -->
    <script type="text/javascript" src="/public/js/vilib.js"></script>
    <!-- <script type="text/javascript" src="/public/js/jquery-2.1.1.js"></script> -->
    <!-- date picker js -->
    <script type="text/javascript" src="/public/js/datepicker.js"></script>
    <!-- bootstrap 3.3.6 js -->
    <script type="text/javascript" src="/public/js/bootstrap.min.js"></script>
    <!-- owl carousel js-->
    <script type="text/javascript" src="/public/js/owl.carousel.js"></script>
    <!-- smooth scroll js -->
    <script type="text/javascript" src="/public/js/smoothscroll.js"></script>
    <!-- preloader js -->
    <script type="text/javascript" src="/public/js/jquery.introLoader.pack.min.js"></script> 
    <!-- custom scripts -->
    <script type="text/javascript" src="/public/js/script.js"></script>
    <script type="text/javascript" src="/public/js/back-to-top.js"></script>

     <script>
         $(document).ready(function () {
             var url = window.location.href;
             console.log(url);
             if(
                 url != "http://tdoctor.vn/#" &&
                 url != "https://tdoctor.vn/#" &&
                 url != "http://tdoctor.vn/" &&
                 url != "https://tdoctor.vn/") {
                 $('html, body').animate({
                     scrollTop: $(".container").offset().top
                 }, 1000);
             }
         });
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.tdoctor.vn/public/js/analytics.js','ga');

  ga('create', 'UA-97538710-1', 'auto');
  ga('send', 'pageview');

</script>

</body>

</html>

