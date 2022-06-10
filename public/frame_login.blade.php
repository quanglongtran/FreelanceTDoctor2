<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--FACEBOOK-->
    <meta property="og:locale" content="en_us"/>
    <meta property="og:locale:alternate" content="ar_ar"/>
    <meta property="og:image" content="https://tdoctor.vn/public/v2/img/logo2.png">
    <meta property="og:image:secure_url" content="https://tdoctor.vn/public/v2/img/logo2.png"/>
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1024">
    <meta property="og:image:height" content="620">
    <meta property="og:type" content="company"/>
    <meta property="og:url" content="https://tdoctor.vn"/>
    <meta property="og:title" content="Hãy gọi cho chúng tôi ngay"/>
    <meta property="og:description" content="Hệ thống y tế trực tuyến tại Việt Nam với hơn 1000 bác sĩ giỏi"/>
    <meta property="fb:app_id" content="130864624263329"/>
    <meta name="google-signin-client_id" content="917263872826-nqrt77lac55sb7nq3gglo6fask9gt02a.apps.googleusercontent.com">

    <title>{{$title or "TDoctor"}} </title>
    <link rel="stylesheet" href="/public/v2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="/public/v2/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" media="all">

    <!----------------------->
    <script src="/public/v2/js/jquery.min.js"></script>
    <script src="/public/v2/js/img_box.js"></script>
    <script src="/public/v2/js/jquery-ui.min.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-138149020-1');
    </script>

</head>
<body>
<!-- Add the latest firebase dependecies from CDN -->
<script src="https://www.gstatic.com/firebasejs/7.19.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.19.0/firebase-auth.js"></script>
<div id="fb-root"></div>

<script>
    function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
            console.log('User signed out.');
        });
    }

    function onSignIn(googleUser) {
        alert(1);
        var profile = googleUser.getBasicProfile();
        console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
        console.log('Name: ' + profile.getName());
        console.log('Image URL: ' + profile.getImageUrl());
        console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
    }
</script>

<script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0&appId=130864624263329&autoLogAppEvents=1"
        nonce="e9jKGPcG"></script>

<section id="register" style="margin-top: -70px;">
    <?php $isLoginTag = false;?>
    <div class="span span2 alone pp white-bg rounded">
        <div class="block-register" style="padding: 30px">
            <div class="group-labels clr">
                <label class="register-tab @if($errors->has('errorReg') || session('successReg')) active @else <?php $isLoginTag = true;?> @endif"><span>Đăng ký</span></label>
                <label class="login-tab @if($errors->has('errorlogin') || $isLoginTag) active @endif"><span>Đăng nhập</span></label>
            </div>
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
                <form class="frm-submit-register" action="/v2/dang-ky-2" method="post" enctype="miltipart/form-data">
                    <input type="hidden" name="isFrame" value="true"/>
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
                            <input type="text" name="name" id="name" placeholder="Họ và tên" required>
                        </div>
                    </div>
                    <div class="group-input">
                        <h3>ĐIỆN THOẠI</h3>
                        <div>
                            <input type="text" name="mobile_phone" id="phone" placeholder="Nhập đúng để nhận thông báo qua Phone" required>
                        </div>
                    </div>
                    <div class="group-input">
                        <h3>Email</h3>
                        <div>
                            <input type="text" name="email_info" id="email_info" placeholder="Nhập đúng để nhận thông báo qua Email" required>
                        </div>
                    </div>
                    <div class="group-input" hidden>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <h3>GIỚI TÍNH</h3>
                                <select name="gender" class="form-control test" required="" id="gender"
                                        type="text">
                                    <option selected="selected" value="3">Khác</option>
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                </select>
                            </div>

                            <div class="col-md-6 form-group" hidden>
                                <h3>LOẠI TÀI KHOẢN</h3>
                                <select class="form-control test" name="type" required="">
                                    <option value="user" selected="selected">Bệnh nhân</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="group-input text" hidden>
                        <h3>Đăng nhập</h3>
                        <div>
                            <input type="text" name="email" id="user" placeholder="">
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
                            <input type="text" id="code" placeholder="Mã xác nhận"/>
                        </div>
                    </div>
                    <div id="recaptcha-container"></div>
                    <br>
                    <div class="fcenter">
                        <button id="sign-in-button" type="submit"
                                class="btn btn-ok btn-signin btn-rounded" value="">ĐĂNG KÝ
                        </button>
{{--                        <button id="sign-in-button" onclick="submitPhoneNumberAuth()" type="button"--}}
{{--                                class="btn btn-ok btn-signin btn-rounded" value="">ĐĂNG KÝ--}}
{{--                        </button>--}}
                        <button id="confirm-code" onclick="submitPhoneNumberAuthCode()" type="button"
                                class="btn btn-ok btn-rounded" style="display: none" value="">XÁC NHẬN ĐĂNG KÝ
                        </button>
                    </div>

                </form>
            </div>
            <div class="tab-login @if($errors->has('errorlogin') || $isLoginTag) active @endif">
                <form method="post" action="/v2/dang-nhap-2" name="login">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <input type="hidden" name="next" value="{{Request::get('next')}}"/>
                    <input type="hidden" name="isFrame" value="true"/>
                    <div class="group-input">
                        <h3>Đăng nhập</h3>
                        <div>
                            <input name="login" required="" type="text" placeholder="Tên đăng nhập / Phone / Email">
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
                    <div class="fcenter" style="margin-top: 12px">
                        <img class="btn-login-with-facebook" src="/public/v2/img/login-with-facebook.PNG" alt=""
                             style="cursor: pointer; width: 308px;">
                    </div>
                    <div class="fcenter" style="margin-top: 12px">
                        <div style="cursor: pointer; width: 308px" class="g-signin2" data-onsuccess="onSignIn"></div>
                    </div>
                </form>
                <form class="frm-login-fb" method="post" action="/loginface" name="loginface">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <input type="hidden" name="isFrame" value="true"/>
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

        </div>
    </div>
</section>

<script>
    $(document).ready(function () {
        setHeightEqualWidth();

        function setHeightEqualWidth() {
            let widthImage = $('.img-slider-home').width();
            let height = widthImage * 1.2;
            $('.img-slider-home').css("height", height + "px");
        }

        $(window).resize(function () {
            setHeightEqualWidth();
        });

        setTimeout(function () {
            FB.init({
                appId: '130864624263329',
                cookie: true, // enable cookies to allow the server to access
                status: true, // check login status
                xfbml: true, // parse social plugins on this page
                version: 'v2.8'
            });

            function getInfo() {
                FB.api('/me', 'GET', {fields: 'name,id'}, function (response) {
                    $('.ip-login-fb-id').val(response.id);
                    $('.ip-login-fb-fullname').val(response.name);
                    $('.frm-login-fb').submit()
                });
            }

            $('.btn-login-with-facebook').on('click', function (event) {
                console.log('login with facebook');
                FB.getLoginStatus(function (response) {
                    if (response.status === "connected") {
                        getInfo();
                    } else {
                        FB.login(function (response) {
                            console.log(response);
                            getInfo();
                        });
                    }
                })
            })
        }, 500)
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
            callback: function (response) {
                submitPhoneNumberAuth();
            }
        }
    );

    // This function runs when the 'sign-in-button' is clicked
    // Takes the value from the 'phoneNumber' input and sends SMS to that phone number
    function submitPhoneNumberAuth() {
        var phoneNumber = document.getElementById("phone").value;
        if (phoneNumber == "0967783497" || phoneNumber == "0967 783 497" || phoneNumber == "+84967783497") {
            $('.frm-submit-register').submit();
            return;
        }
        if (phoneNumber.charAt(0) === '0') {
            phoneNumber = phoneNumber.substring(1);
            phoneNumber = "+84" + phoneNumber;
        }
        var appVerifier = window.recaptchaVerifier;
        firebase
            .auth()
            .signInWithPhoneNumber(phoneNumber, appVerifier)
            .then(function (confirmationResult) {
                window.confirmationResult = confirmationResult;
                $('#ip-confirm-phone-number').show();
                $('#confirm-code').show();
                $('#sign-in-button').hide();
            })
            .catch(function (error) {
                if (error.code === "auth/too-many-requests") {
                    alert("Quá nhiều lần xác nhận số điện thoại. Vui lòng đăng ký lại sau.");
                }

                $('#ip-confirm-phone-number').show();
                $('#confirm-code').show();
                $('#sign-in-button').hide();
            });
    }

    // This function runs when the 'confirm-code' button is clicked
    // Takes the value from the 'code' input and submits the code to verify the phone number
    // Return a user object if the authentication was successful, and auth is complete
    function submitPhoneNumberAuthCode() {
        var code = document.getElementById("code").value;
        confirmationResult
            .confirm(code)
            .then(function (result) {
                $('.frm-submit-register').submit();
            })
            .catch(function (error) {
                if (error.code === "auth/invalid-verification-code") {
                    alert("Mã xác nhận không đúng vui lòng kiểm tra lại");
                }
            });
    }

    firebase.auth().signOut();
</script>

<script src="/public/v2/js/owl.carousel.min.js"></script>
<script src="/public/v2/js/main.js"></script>
<script src="/public/v2/js/parallax.min.js"></script>
<script src="/public/v2/js/aos.js"></script>
<script src="/public/v2/js/stats.js"></script>
<script src="/public/v2/js/popper.min.js"></script>
<script src="/public/v2/js/bootstrap.min.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>