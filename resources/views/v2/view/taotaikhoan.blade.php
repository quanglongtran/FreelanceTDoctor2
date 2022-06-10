@extends('v2/structor/main',['title'=> 'Tạo tài khoản'])
@section('content')
    <!-- Add the latest firebase dependecies from CDN -->
    <script src="https://www.gstatic.com/firebasejs/7.19.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.19.0/firebase-auth.js"></script>
    <section id="register" style="margin-top: -70px;">
        <div class="inner clr">
            <div class="span span2 alone @if(Session::get('user') != null) h-center @endif">
                <div class="middle-item">
                    <div><img class="center" src="public/v2/img/home_two_mobiles_en.png" alt="">
                        <p class="text-center">Một bác sĩ luôn ở bên bạn mọi lúc mọi nơi</p>
                        <div class="apps clr middle-item">
                            <a href="https://itunes.apple.com/us/app/tdoctor/id1443310734?ls=1&amp;mt=8"><img
                                        src="public/v2/img/appstore.svg" alt=""></a>
                            <a href="https://play.google.com/store/apps/details?id=com.app.khambenh.bacsiviet"><img
                                        src="public/v2/img/playstore.svg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
            @if(Session::get('user') == null)
                <?php $isLoginTag = false;?>
                <div class="span span2 alone pp white-bg rounded">
                    <div class="block-register">
                        <div class="group-labels clr">
                            <label class="register-tab active"><h1>Đăng ký</h1></label>
                        </div>
                        <div class="tab-register active">
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
                            <form class="frm-submit-registerx frm-submit-register-1" action="/tao-tai-khoan" method="post" enctype="miltipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                                <div class="group-input">
                                    <h3>HỌ VÀ TÊN</h3>
                                    <div>
                                        <input type="text" name="name" id="name" placeholder="Họ và tên">
                                    </div>
                                </div>
                                <div class="group-input">
                                    <h3>SỐ ĐIỆN THOẠI</h3>
                                    <div>
                                        <input type="text" name="mobile_phone" id="phone-1" placeholder="Số điện thoại">
                                    </div>
                                </div>
                                <!-- <div class="group-input text">
                                    <h3>Tên đăng nhập</h3>
                                    <div>
                                        <input type="text" name="email" id="user" placeholder="Tên đăng nhập">
                                    </div>
                                </div> -->
                                <div class="group-input text">
                                    <h3>MẬT KHẨU</h3>
                                    <div>
                                        <input type="password" name="password"
                                               placeholder="Mật khẩu cần có ít nhất 5 ký tự">
                                    </div>
                                </div>
                                <div class="group-input text" style="display: none">
                                    <h3>MÃ GIỚI THIỆU</h3>
                                    <div>
                                        <input type="text" name="ngt" value="{{$collaborator}}" placeholder="Mã người giới thiệu">
                                    </div>
                                </div>

                                <div class="group-input" style="display: none">
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <h3>GIỚI TÍNH</h3>
                                            <select name="gender" class="form-control test" required="" id="gender"
                                                    type="text">
                                                <option value="3">Khác</option>
                                                <option value="1">Nam</option>
                                                <option value="2">Nữ</option>
                                            </select>
                                        </div>
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
                                    <button id="sign-in-button" onclick="submitPhoneNumberAuth()" type="button" class="btn btn-ok btn-rounded" value="">TẠO TÀI KHOẢN</button>
                                    <button id="confirm-code" onclick="submitPhoneNumberAuthCode()" type="button" class="btn btn-ok btn-rounded" style="display: none" value="">XÁC NHẬN ĐĂNG KÝ</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
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
        var firebaseConfig = {
            apiKey: "AIzaSyCCm2WsuEV3dSvFRu4SSARcTVAeh6Uk_ko",
            authDomain: "medix-link.firebaseapp.com",
            databaseURL: "https://medix-link.firebaseio.com",
            projectId: "medix-link",
            storageBucket: "medix-link.appspot.com",
            messagingSenderId: "917263872826",
            appId: "1:917263872826:web:2d36474ec51fccef34d603"
        };

        firebase.initializeApp(firebaseConfig);
        

        // IF you want to hide the recaptcha, use 'invisible' the size
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier(
            "sign-in-button",
            {
                size: "invisible",
                callback: function(response) {
                    submitPhoneNumberAuth();
                }
            }
        );

        // This function runs when the 'sign-in-button' is clicked
        // Takes the value from the 'phoneNumber' input and sends SMS to that phone number
        function submitPhoneNumberAuth() {
            var phoneNumber = document.getElementById("phone-1").value;
            if (phoneNumber.charAt(0) === '0')
            {
                phoneNumber = phoneNumber.substring(1);
                phoneNumber = "+84" + phoneNumber;
                console.log(phoneNumber);
            }
            var appVerifier = window.recaptchaVerifier;
            firebase
                .auth()
                .signInWithPhoneNumber(phoneNumber, appVerifier)
                .then(function(confirmationResult) {
                    window.confirmationResult = confirmationResult;
                    $('#ip-confirm-phone-number').show();
                    $('#confirm-code').show();
                    $('#sign-in-button').hide();
                })
                .catch(function(error) {
                    if (error.code === "auth/too-many-requests") {
                        $('#ip-confirm-phone-number').hide();
                        $('#confirm-code').hide();
                        $('#sign-in-button').show();
                        alert("Quá nhiều lần xác nhận số điện thoại. Vui lòng đăng ký lại sau.");
                    }else{
                        $('#ip-confirm-phone-number').show();
                        $('#confirm-code').show();
                        $('#sign-in-button').hide();
                    }
                });
        }

        // This function runs when the 'confirm-code' button is clicked
        // Takes the value from the 'code' input and submits the code to verify the phone number
        // Return a user object if the authentication was successful, and auth is complete
        function submitPhoneNumberAuthCode() {
            var code = document.getElementById("code").value;
            confirmationResult
                .confirm(code)
                .then(function(result) {
                    $('.frm-submit-register-1').submit();
                })
                .catch(function(error) {
                    if (error.code === "auth/invalid-verification-code") {
                        alert("Mã xác nhận không đúng vui lòng kiểm tra lại");
                    }
                });
        }

    

        function submitPhoneNumberAuthx(){
            $('.frm-submit-register-1').trigger('submit');
        }

        $('.frm-submit-register-1').submit(function(event){
            if(false){
            event.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            
            $.ajax({
               type: "POST",
               url: url,
               data: form.serialize(), // serializes the form's elements.
               success: function(data)
               {
                   console.log(data); // show response from the php script.
                   alert(data.detail); // show response from the php script.
                   if(data.success == true){
                        var data_submit = $('#ajax_login_Modal').attr('data-submit');
                        if(data_submit && data_submit != ''){
                            $(data_submit).removeClass('require-login').trigger('submit');
                        }else{
                            window.location.reload();
                        }
                   }
               },
               error: function(data){
                    alert('Có lỗi xảy ra, vui lòng thử lại!');
               }
            });

        }
        })

        firebase.auth().signOut();
    </script>
@endsection