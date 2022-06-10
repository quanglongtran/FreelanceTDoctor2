@extends('v2/structor/main',['title'=> 'Đăng ký bác sĩ'])
@section('content')
    <style>
        pre {
            white-space: pre-wrap;       /* Since CSS 2.1 */
            white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
            white-space: -pre-wrap;      /* Opera 4-6 */
            white-space: -o-pre-wrap;    /* Opera 7 */
            word-wrap: break-word;       /* Internet Explorer 5.5+ */
        }
    </style>
    <link rel="stylesheet" href="/public/register_doctor/register_doctor_01.css">
    <link rel="stylesheet" href="/public/register_doctor/register_doctor_02.css">
    <main id="main-content" class="main-content" style="min-height: 63px;">
        <div class="bac-si-page">
            <div class="bac-si-page__header">
                <div class="container">
                    <div class="row">
                        <div class="offset-xl-1 col-xl-5">
                            <h1>
                                TDOCTOR CẦN NHỮNG
                                BÁC SĨ TẬN TÂM NHƯ BẠN
                            </h1>

                            <a href="javascript:void(0)" class="button button-standard btnScrollRegister" data-effect="scroll"
                               data-target="#doctor_register_area" data-offset="-100">Tham gia cộng tác</a>
                            <script>
                                $(document).ready(function (e) {
                                    $('.btnScrollRegister').on('click', function (e) {
                                        $('html, body').animate({
                                            scrollTop: $(".bac-si-page__registry").offset().top
                                        }, 500);
                                    })
                                })
                            </script>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bac-si-page__philosophy">
                <div class="container">
                    <h2>Làm trọn tâm đức ngành y</h2>
                    <p>Cùng TDoctor giúp đỡ hàng triệu người</p>

                    <div class="row">
                        <div class="offset-xl-2 col-xl-3">
                            <div class="philosophy__item">
                                <img class="philosophy__image lazy" alt="Giải đáp vấn đề sức khỏe"
                                     src="/public/register_doctor/philosophy_image_1.png" style="">
                                <h3 class="philosophy__title">Giải đáp vấn đề sức khỏe</h3>
                                <p class="philosophy__content">
                                    Với việc hàng ngàn người dùng với những vấn đề sức khỏe nhưng không được giải đáp, các Y
                                    Bác Sĩ sẽ giúp đưa ra những lời khuyên sức khỏe thông qua việc trả lời câu hỏi hoặc tư
                                    vấn trực tiếp qua tin nhắn, gọi thoại.
                                </p>
                            </div>
                        </div>

                        <div class="offset-xl-2 col-xl-3">
                            <div class="philosophy__item">
                                <img class="philosophy__image lazy" alt="Chia sẻ kiến thức y khoa"
                                     src="/public/register_doctor/philosophy_image_2.png" style="">
                                <h3 class="philosophy__title">Chia sẻ kiến thức y khoa</h3>
                                <p class="philosophy__content">
                                    TDoctor tin rằng những hiểu biết về y khoa của các Y Bác Sĩ là vô cùng quý giá. Việc
                                    chia sẻ những kiến thức này sẽ giúp nâng cao nhận thức của cộng đồng người Việt; và giúp
                                    họ chăm sóc sức khỏe bản thân, gia đình tốt hơn.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bac-si-page__benefit">
                <div class="container">
                    <h2>TDoctor đảm bảo những quyền lợi cho Bác Sĩ</h2>

                    <div class="row">
                        <div class="col-xl-5">
                            <div class="benefit__item">
                                <img class="benefit__image lazy" alt="Tư vấn sức khỏe tiện lợi"
                                     src="/public/register_doctor/benefit_image_1.png" style="">

                                <div class="benefit__info">
                                    <h3 class="benefit__title">Tư vấn sức khỏe tiện lợi</h3>
                                    <p class="benefit__content">
                                        Khác với việc tư vấn tại phòng khám, Bác Sĩ có thể giải đáp thắc mắc cho nhiều người
                                        dùng cùng một lúc, cũng như có thể tư vấn trực tiếp cho người bệnh ở mọi nơi mà
                                        không cần di chuyển.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="offset-xl-1 col-xl-5">
                            <div class="benefit__item">
                                <img class="benefit__image lazy" alt="Linh động về thời gian"
                                     src="/public/register_doctor/benefit_image_2.png" style="">

                                <div class="benefit__info">
                                    <h3 class="benefit__title">Linh động về thời gian</h3>
                                    <p class="benefit__content">
                                        TDoctor không bắt buộc Bác Sĩ phải làm việc theo bất cứ thời gian cố định nào. Bác
                                        Sĩ có thể lựa chọn thời gian phù hợp với mình nhất trong ngày để tham gia giải đáp
                                        thắc mắc của người dùng.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-5">
                            <div class="benefit__item">
                                <img class="benefit__image lazy" alt="Phát triển kĩ năng &amp; kinh nghiệm"
                                     src="/public/register_doctor/benefit_image_3.png" style="">

                                <div class="benefit__info">
                                    <h3 class="benefit__title">Phát triển kĩ năng &amp; kinh nghiệm</h3>
                                    <p class="benefit__content">
                                        Việc tham gia giải đáp thắc mắc về sức khỏe sẽ giúp nâng cao tay nghề cho các Bác
                                        Sĩ; cũng như giúp các Bác Sĩ tiếp nhận thêm nhiều kiến thức khi chia sẻ cùng các
                                        đồng nghiệp khác tại TDoctor.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="offset-xl-1 col-xl-5">
                            <div class="benefit__item">
                                <img class="benefit__image lazy" alt="Nâng cao uy tín &amp; thu nhập"
                                     src="/public/register_doctor/benefit_image_4.png" style="">

                                <div class="benefit__info">
                                    <h3 class="benefit__title">Nâng cao uy tín &amp; thu nhập</h3>
                                    <p class="benefit__content">
                                        Với hệ thống đánh giá Bác Sĩ, việc giúp đỡ ngày càng nhiều người sẽ giúp Bác sĩ nâng
                                        cao sự tín nhiệm từ người dùng cũng như gia tăng nguồn thu nhập từ việc tư vấn sức
                                        khỏe trực tiếp.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bac-si-page__doctor">
                <div class="container">
                    <h2>Bác sĩ tham gia cùng TDoctor</h2>
                    <p>Hiện đã có <strong>{{$numberDoctor}}</strong> Bác sĩ</p>

                    <div class="row">
                        <div class="offset-xl-1 col-xl-10">
                            <div class="doctor__list owl-carousel owl-loaded owl-drag" id="doctor_carousel">
                                <div class="owl-stage-outer">
                                    <div class="owl-stage"
                                         style="transform: translate3d(0px, 0px, 0px); transition: all 0.25s ease 0s; width: 1004px;">
                                        @foreach($doctors as $doctor)
                                        <div class="owl-item active" style="width: 200.666px;"><a class="doctor__item">
                                                <img class="doctor__avatar lazy" alt="Bác sĩ"
                                                     src="{{url('public/images/doctor/'.$doctor->profile_image)}}" style="">

                                                <p class="doctor__name">
                                                    {{$doctor->doctor_name}}
                                                </p>

{{--                                                <ul class="doctor__specialities">--}}
{{--                                                    <li>Chuyên khoa nội</li>--}}
{{--                                                </ul>--}}
                                            </a></div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="bac-si-page__registry">
                <div class="container">
                    <h2>Tạo hồ sơ Bác Sĩ miễn phí với 3 bước</h2>
                    <p>Hiện đã có <strong>{{$numberDoctor}}</strong> Bác sĩ</p>

                    <div class="row">
                        <div class="offset-xl-1 col-xl-4">
                            <div class="registry__content-left">
                                <ul class="registry__processes-list">
                                    <li class="registry__processes-item">
                                        <img class="registry__processes-image lazy"
                                             alt="Tạo hồ sơ Bác sĩ mới bằng mẫu đăng ký"
                                             src="/public/register_doctor/registry_step_1.png" style="">
                                        <div class="registry__processes-info">
                                            <h3 class="registry__processes-title">Bước 1</h3>
                                            <p class="registry__processes-content">
                                                Tạo hồ sơ Bác sĩ mới bằng mẫu đăng ký
                                            </p>
                                        </div>
                                    </li>

                                    <li class="registry__processes-item">
                                        <img class="registry__processes-image lazy"
                                             alt="Bổ sung đầy đủ thông tin cần thiết cho hồ sơ Bác sĩ"
                                             src="/public/register_doctor/registry_step_2.png" style="">
                                        <div class="registry__processes-info">
                                            <h3 class="registry__processes-title">Bước 2</h3>
                                            <p class="registry__processes-content">
                                                Bổ sung đầy đủ thông tin cần thiết cho hồ sơ Bác sĩ
                                            </p>
                                        </div>
                                    </li>

                                    <li class="registry__processes-item">
                                        <img class="registry__processes-image lazy"
                                             alt="TDoctor xác thực hồ sơ và Bác sĩ bắt đầu giúp đỡ mọi người"
                                             src="/public/register_doctor/registry_step_3.png" style="">
                                        <div class="registry__processes-info">
                                            <h3 class="registry__processes-title">Bước 3</h3>
                                            <p class="registry__processes-content">
                                                TDoctor xác thực hồ sơ và Bác sĩ bắt đầu giúp đỡ mọi người
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="offset-xl-2 col-xl-4 bi-scroll-to-when-done" id="doctor_register_area">
                            <div class="registry__content-right">
                                <h3>Tạo hồ sơ bác sĩ</h3>
                                @if($errors->has('errorReg'))
                                    <div class="alert alert-danger bi-need-scroll-to-alert">
                                        {{$errors->first('errorReg')}}
                                        <script type="text/javascript">
                                            var div = document.createElement('div');
                                            div.innerHTML = "{{$errors->first('errorReg')}}";
                                            var decoded = div.firstChild.nodeValue;
                                            alert(decoded);
                                        </script>
                                    </div>
                                @endif
                                @if (session('successReg'))
                                    <div class="alert alert-success bi-need-to-go-home">
                                        Đăng ký thành công. bên tdoctor.vn sẽ tiến hành xử lý. Hotline: 0393167234
                                        <script type="text/javascript">                                            
                                            alert("Đăng ký thành công. bên tdoctor.vn sẽ tiến hành xử lý. Hotline: 0393167234");
                                        </script>
                                    </div>
                                @endif
                                <form action="/v2/dang-ky" method="post" class="form-horizontal ajax-form-registry form-registry formClazz" id="form_registry" novalidate="novalidate">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                    <div class="form-group">
                                        <label class="label-control">Họ và tên</label>
                                        <input class="form-control nameClazz" required="required" placeholder="Nhập họ và tên..." name="name">
                                    </div>

                                    <div class="form-group">
                                        <label class="label-control">Số điện thoại</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">+84</span>
                                            </div>
                                            <input type="text" class="form-control phoneClazz" required="required" placeholder="Nhập số điện thoại..."
                                                   name="mobile_phone">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="label-control">Email</label>
                                        <input class="form-control emailClazz" required="required" placeholder="Nhập địa chỉ email..." name="email">
                                    </div>

                                    <div class="form-group">
                                        <label class="label-control">Mật khẩu</label>
                                        <input class="form-control passClazz" type="password" required="required" placeholder="Nhập mật khẩu..." name="password">
                                    </div>

                                    <div class="form-group hidden">
                                        <label class="label-control">Chuyên khoa</label>
                                        <select class="form-control specialityClazz" name="speciality" required>
                                            <option value="0" selected="" disabled="" hidden="">Chọn chuyên khoa</option>
                                            @foreach($specialitys as $speciality)
                                                <option value="{{$speciality->speciality_id}}">{{$speciality->speciality_name}}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" value="3" name="gender" />
                                        <input type="hidden" value="professional" name="type" />
                                        <input type="hidden" value="" name="ngt" />
                                        <input type="hidden" value="/dang-ky-bac-si" name="goto" />
                                    </div>

                                    <div class="form-group">
                                        <pre style="height: 240px; overflow-y: scroll">
ĐIỀU KHOẢN SỬ DỤNG DỊCH VỤ CỦA TDOCTOR

1. GIỚI THIỆU

1.1   Chào mừng bạn đến với Trang TDoctor qua giao diện website: Tdoctor.vn hoặc ứng dụng di động (“TDoctor”). TDOCTOR là Trang thông tin điện tử của Công ty cổ phần Công nghệ Bác sĩ Việt nhằm tạo ra một nền tảng trung gian để kết nối Người có nhu cầu Khám – Chữa bệnh với mạng lưới các Bác sĩ, Bệnh viện và Cơ sở khám bệnh – chữa bệnh có uy tín, chất lượng cao một cách dễ dàng và thuận tiện với một chi phí thấp nhất.

           Trước khi sử dụng dịch vụ trên TDoctor, xin Quý khách vui lòng đọc kỹ các Điều Khoản Dịch Vụ dưới đây để hiểu rõ quyền lợi và nghĩa vụ hợp pháp của mình đối với Công ty CP Công nghệ bác sĩ Việt và các Bác sĩ, Bệnh viện, Cơ sở khám - chữa bệnh, Nhà thuốc liên kết gọi chung là “Chúng tôi”. “Dịch vụ” chúng tôi cung cấp hoặc sẵn có bao gồm (a) TDoctor, (b) các dịch vụ được cung cấp bởi TDoctor và bởi phần mềm dành cho khách hàng của TDoctor và (c) tất cả các thông tin, đường dẫn, tính năng, dữ liệu, văn bản, hình ảnh, biểu đồ, âm nhạc, âm thanh, video (bao gồm cả các đoạn video được đăng tải trực tiếp theo thời gian thực (livestream)), tin nhắn, tags, nội dung, chương trình, phần mềm, ứng dụng dịch vụ (bao gồm bất kỳ ứng dụng dịch vụ di động nào) hoặc các tài liệu khác có sẵn trên TDoctor hoặc các dịch vụ liên quan khác “gọi chung là Nội dung”. Bất kỳ tính năng mới nào được bổ sung hoặc mở rộng đối với Dịch vụ đều thuộc phạm vi điều chỉnh của Điều Khoản Dịch Vụ này. Điều Khoản Dịch Vụ này điều chỉnh việc bạn sử dụng Dịch vụ cung cấp bởi TDoctor.

1.2 Dịch vụ bao gồm dịch vụ sàn giao dịch trực tuyến kết nối Người có nhu cầu khám-chữa bệnh với các Bác sĩ, Bệnh viện hoặc Cơ sở khám - chữa bệnh, Nhà thuốc “đều gọi chung là Người Sử Dụng”; kết nối giữa các Bác sĩ, Bệnh viện, Cơ sở khám chữa bệnh và Nhà thuốc với nhau nhằm mang đến cơ hội được khám – chữa bệnh, tiếp cận với các dịch vụ y tế có chất lượng cao, có uy tín với phương thức nhanh chóng, chính xác, tiện lợi với một chi phí thấp nhất. Hợp đồng cung cấp sản phẩm hoặc dịch vụ khám – chữa bệnh thực sự là trực tiếp giữa Người có nhu cầu khám – chữa bệnh và Bác sĩ, Bệnh viện, Cơ sở khám - chữa bệnh hoặc Nhà thuốc. Các Bên liên quan đến giao dịch đó sẽ tự chịu mọi trách nhiệm đối với hợp đồng/ thỏa thuận mà mình đã giao kết, việc đăng tin quảng bá dịch vụ, bảo hành/ cam kết chất lượng dịch vụ hoặc sản phẩm và tương tự do các Bác sĩ, Bệnh viện, Cơ sở khám – chữa bệnh hoặc Nhà thuốc tự thực hiện và tự chịu trách nhiệm về các thông tin mà mình đăng tải cũng như sản phẩm/ dịch vụ mà mình thực hiện. TDoctor không can thiệp hoặc liên quan gì đến giao dịch giữa các bên Người Sử Dụng với nhau. TDoctor có thể hoặc không sàng lọc trước Người Sử Dụng hoặc Nội dung hay thông tin cung cấp bởi Người Sử Dụng. TDoctor bảo lưu quyền loại bỏ bất cứ Nội dung hoặc thông tin nào trên TDoctor theo Mục 5.4 bên dưới. TDoctor không cam kết hoặc bảo đảm cho việc các Người Sử Dụng sẽ thực tế hoàn thành giao dịch.

1.3 Trước khi trở thành Người Sử Dụng của TDoctor, bạn cần đọc và chấp nhận mọi điều khoản và điều kiện được quy định trong và dẫn chiếu đến Điều Khoản Dịch Vụ này hoặc Chính Sách Bảo Mật được dẫn chiếu theo đây.

1.4 TDoctor bảo lưu quyền thay đổi, chỉnh sửa, tạm ngưng hoặc chấm dứt tất cả hoặc bất kỳ phần nào của TDoctor hoặc Dịch vụ vào bất cứ thời điểm nào theo qui định pháp luật.

1.5  TDoctor bảo lưu quyền từ chối yêu cầu mở Tài khoản hoặc các truy cập của bạn tới TDoctor hoặc Dịch Vụ theo quy định pháp luật và Điều khoản dịch vụ.

           Bằng việc sử dụng dịch vụ tại TDoctor hay tạo tài khoản tại TDoctor, bạn đã hoàn toàn chấp nhận và đồng ý với những Điều khoản sử dụng dịch vụ này cũng như các chính sách bổ sung (nếu có) được dẫn chiếu theo đây.

           Nếu bạn không đồng ý với các điều khoản dịch vụ này, xin vui lòng không sử dụng dịch vụ hoặc truy cập/ tạo tài khoản tại TDoctor. Trường hợp bạn là người chưa thành niên hoặc bị giới hạn về năng lực hành vi dân sự thì trước khi bạn sử dụng dịch vụ, bạn cần được sự chấp thuận/đồng ý từ cha, mẹ hoặc người giám hộ hợp pháp. Trong trường hợp này, cha, mẹ hoặc người giám hộ hợp pháp của bạn cần hỗ trợ để bạn hiểu rõ hoặc thay mặt/ đại diện bạn chấp nhận những điều khoản trong thỏa thuận dịch vụ này.

2.  QUYỀN RIÊNG TƯ

2.1  TDoctor coi trọng việc bảo mật thông tin của bạn. Để bảo vệ quyền lợi người dùng, TDoctor cung cấp Chính sách bảo mật tại TDoctor.vn. Vui lòng tham khảo Chính sách bảo mật để biết cách thức TDoctor thu thập và sử dụng thông tin liên quan đến Tài Khoản và/hoặc việc sử dụng Dịch vụ của Người Sử Dụng (“Thông tin Người Sử Dụng”). Điều Khoản Dịch vụ này có liên quan mật thiết với Chính sách bảo mật bằng cách sử dụng Dịch vụ hoặc cung cấp thông tin trên TDoctor.

a. Đồng ý để TDoctor thu thập, sử dụng, công bố và/hoặc xử lý các Nội dung, dữ liệu cá nhân của bạn và thông tin Người Sử Dụng như được quy định trong Chính sách bảo mật;

b.  Đồng ý và công nhận rằng các thông tin được cung cấp trên Trang TDoctor sẽ thuộc sở hữu chung của bạn và TDoctor;

c.  Sẽ không trực tiếp hay gián tiếp, tiết lộ các thông tin Người Sử Dụng cho bất kỳ bên thứ ba nào, hoặc bằng bất kỳ phương thức nào cho phép bất kỳ bên thứ ba nào được truy cập hoặc sử dụng thông tin Người dùng của bạn.

2.2  Trường hợp Người Sử Dụng sở hữu dữ liệu cá nhân của Người Sử Dụng khác thông qua việc sử dụng Dịch vụ theo đây đồng ý rằng, mình sẽ (i) tuân thủ mọi qui định pháp luật về bảo vệ an toàn thông tin cá nhân liên quan đến những thông tin đó; (ii) cho phép Người Sử Dụng là chủ sở hữu của các thông thông tin cá nhân mà Bên Nhận thông tin thu thập được (“Bên tiết lộ thông tin”) được phép xóa bỏ thông tin của mình được thu thập từ cơ sở dữ liệu của Bên nhận thông tin; và (iii) cho phép Bên tiết lộ thông tin rà soát những thông tin đã được thu thập về họ bởi Bên nhận thông tin, phù hợp với hoặc theo yêu cầu của các qui định pháp luật hiện hành.

 3. GIỚI HẠN TRÁCH NHIỆM

        TDoctor trao cho Người Sử Dụng quyền phù hợp để truy cập và sử dụng các Dịch vụ theo các điều khoản và điều kiện được quy định trong Điều khoản dịch vụ này. Tất cả các Nội dung, thương hiệu, nhãn hiệu dịch vụ, tên thương mại, biểu tượng và tài sản sở hữu trí tuệ khác độc quyền (“Tài Sản Sở Hữu Trí Tuệ”) hiển thị trên Trang TDoctor đều thuộc sở hữu của TDoctor và bên sở hữu thứ ba, nếu có. Không một bên nào truy cập vào TDoctor được cấp quyền hoặc cấp phép trực tiếp hoặc gián tiếp để sử dụng hoặc sao chép bất kỳ Tài sản SHTT nào, cũng như không một bên nào truy cập vào TDoctor được phép truy đòi bất kỳ quyền, quyền sở hữu hoặc lợi ích nào liên quan đến Tài Sản Sở Hữu Trí Tuệ. Bằng cách sử dụng hoặc truy cập Dịch vụ, bạn đồng ý tuân thủ các quy định pháp luật liên quan đến bản quyền, thương hiệu, nhãn hiệu dịch vụ hoặc bất cứ quy định pháp luật nào khác bảo vệ Dịch vụ, Trang TDoctor và Nội dung của Trang TDoctor. Bạn đồng ý không được sao chép, phát tán, tái bản, chuyển giao, công bố công khai, thực hiện công khai, sửa đổi, phỏng tác, cho thuê, bán, hoặc tạo ra các sản phẩm phái sinh của bất cứ phần nào thuộc Dịch vụ, Trang TDoctor và Nội dung của Trang TDoctor. Bạn không được nhân bản hoặc chỉnh sửa bất kỳ phần nào hoặc toàn bộ nội dung của Trang TDoctor trên bất kỳ máy chủ hoặc như là một phần của bất kỳ website nào khác mà chưa nhận được sự chấp thuận bằng văn bản của TDOCTOR. 

4.  TÀI KHOẢN VÀ BẢO MẬT

4.1  Một vài tính năng của Dịch vụ chúng tôi yêu cầu phải đăng ký một Tài khoản bằng cách lựa chọn một tên người sử dụng không trùng lặp (“Tên đăng nhập”) và mật khẩu đồng thời cung cấp một số thông tin cá nhân nhất định. Bạn có thể sử dụng Tài khoản của mình để truy cập vào các website hoặc dịch vụ khác mà TDoctor cho phép, có mối liên hệ hoặc đang hợp tác.TDoctor không kiểm tra và không chịu trách nhiệm đối với bất kỳ nội dung, tính năng năng, bảo mật, dịch vụ, chính sách riêng tư, hoặc cách thực hiện khác của các website hay dịch vụ đó…Trường hợp bạn sử dụng Tài khoản của mình để truy cập vào các website hoặc dịch vụ khác mà TDoctor cho phép, có mối liên hệ hoặc đang hợp tác, các điều khoản dịch vụ của những website hoặc dịch vụ đó, bao gồm các chính sách bảo mật tương ứng vẫn được áp dụng khi bạn sử dụng các website hoặc dịch vụ đó ngay cả khi những điều khoản dịch vụ này khác với Điều khoản dịch vụ hoặc Chính sách bảo mật của TDoctor.

4.2 Bạn đồng ý (a) giữ bí mật mật khẩu và chỉ sử dụng Tên đăng nhập và mật khẩu khi đăng nhập, (b) đảm bảo bạn sẽ đăng xuất khỏi tài khoản của mình sau mỗi lần đăng nhập trên TDoctor, (c) thông báo ngay lập tức với TDoctor nếu phát hiện bất kỳ việc sử dụng trái phép nào đối với Tài khoản, Tên đăng nhập hoặc mật khẩu của bạn. Bạn phải chịu trách nhiệm với hoạt động dưới Tên đăng nhập và Tài khoản của mình, bao gồm tổn thất hoặc thiệt hại phát sinh từ việc sử dụng trái phép liên quan đến mật khẩu hoặc từ việc không tuân thủ Điều khoản này của Người Sử Dụng.

5.3 Bạn đồng ý rằng TDoctor có toàn quyền xóa Tài khoản và Tên đăng nhập của Người Sử Dụng ngay lập tức, gỡ bỏ hoặc hủy từ Trang TDoctor bất kỳ Nội dung nào liên quan đến Tài khoản và Tên đăng nhập của Người Sử Dụng mà không cần thông báo hay chịu trách nhiệm với Người Sử Dụng hay bên thứ ba nào khác. Căn cứ để thực hiện các hành động này có thể bao gồm (a) Tài khoản và Tên đăng nhập không hoạt động trong thời gian dài, (b) vi phạm điều khoản hoặc tinh thần của các Điều khoản dịch vụ này, (c) có hành vi bất hợp pháp, lừa đảo, quấy rối, xâm phạm, đe dọa hoặc lạm dụng, (d) có nhiều tài khoản người dùng khác nhau, (e) lạm dụng mã giảm giá hoặc tài trợ hoặc quyền lợi khuyến mại (bao gồm việc bán mã giảm giá cho các bên thứ ba cũng như lạm dụng mã giảm giá ở TDoctor), (f) có hành vi gây hại tới những Người Sử Dụng khác, các bên thứ ba hoặc các lợi ích kinh tế của TDoctor. Việc sử dụng Tài khoản cho các mục đích bất hợp pháp, lừa đảo, quấy rối, xâm phạm, đe dọa hoặc lạm dụng có thể được gửi cho cơ quan nhà nước có thẩm quyền theo quy định pháp luật.

4.4 Người Sử Dụng có thể yêu cầu xóa tài khoản bằng cách thông báo bằng văn bản đến TDoctor. Tuy nhiên, Người Sử Dụng vẫn phải chịu trách nhiệm và nghĩa vụ đối với bất kỳ giao dịch nào chưa hoàn thành (phát sinh trước hoặc sau khi tài khoản bị xóa). Người sử dụng chịu trách nhiệm đối với yêu cầu xóa tài khoản của mình.

5.  ĐIỀU KHOẢN SỬ DỤNG

5.1  Quyền được phép sử dụng sẽ bị chấm dứt theo Điều khoản dịch vụ này hoặc trường hợp Người Sử Dụng vi phạm bất cứ điều khoản hoặc điều kiện nào được quy định tại Điều khoản dịch vụ này. Trong trường hợp đó, TDoctor có thể chấm dứt việc sử dụng của Người Sử Dụng mà không cần thông báo.

5.2  Người Sử Dụng không được phép:

(a) Tải lên, đăng, truyền tải hoặc bằng cách khác công khai bất cứ Nội dung nào trái pháp luật, có hại, đe dọa, lạm dụng, quấy rối, gây hoang mang, lo lắng, xuyên tạc, phỉ báng, xúc phạm, khiêu dâm, bôi nhọ, xâm phạm quyền riêng tư của người khác, gây căm phẫn hoặc bất kỳ nội dung không đúng đắn nào;

(b) Vi phạm pháp luật, quyền lợi của bên thứ ba;

(c) Sử dụng Dịch vụ hoặc đăng tải Nội dung để mạo danh bất kỳ cá nhân hoặc tổ chức nào, hoặc bằng cách nào khác để xuyên tạc nhằm xâm hại các quyền và lợi ích hợp pháp của cá nhân hoặc tổ chức khác;

(d) Giả mạo các tiêu đề hoặc bằng cách khác ngụy tạo các định dạng nhằm che giấu nguồn gốc của bất kỳ Nội dung bất hợp pháp nào được tryền tải thông qua Dịch vụ;

(e) Gỡ bỏ bất kỳ thông báo độc quyền nào từ Trang TDoctor;

(f) Gây ra hoặc ủy quyền cho người khác sửa đổi, cấu thành các sản phẩm phái sinh hoặc chuyển thể của Dich vụ mà không được sự cho phép rõ ràng của TDoctor;

(g) Sử dụng Dịch vụ phục vụ lợi ích của bất kỳ bên thứ ba nào hoặc bất kỳ hành vi nào không được chấp nhận theo Điều khoản dịch vụ này;

(h) Sử dụng Dịch vụ hoặc đăng tải Nội dung cho mục đích gian lận, sai trái, gây hiểu nhầm hoặc gây nhầm lẫn;

(i) Mở và vận hành nhiều tài khoản người dùng khác nhau liên quan đến bất kỳ hành vi nào vi phạm điều khoản hoặc tinh thần của Điều khoản dịch vụ này;

 (j) Chỉnh sửa giá của bất kỳ sản phẩm, dịch vụ nào hoặc can thiệp vào danh mục sản phẩm hay dịch vụ cung cấp của Người Sử Dụng khác.

(k)  Thực hiện bất kỳ hành động nào làm sai lệch hệ thống đánh giá hoặc tiếp nhận phản hồi của TDoctor;

(l) Cố gắng chuyển đổi mã chương trình, đảo ngược kỹ thuật, tháo gỡ hoặc xâm nhập (hack) Dịch vụ; hoặc phá bỏ hoặc vượt qua bất kỳ công nghệ mã hóa hoặc biện pháp bảo mật nào được TDoctor áp dụng đối với các Dịch vụ và/hoặc các dữ liệu được truyền tải, xử lý hoặc lưu trữ bởi TDoctor;

(m) Khai thác hoặc thu thập bất kỳ thông tin nào liên quan đến Tài khoản của Người sử dụng khác, bao gồm bất kỳ thông tin hoặc dữ liệu cá nhân nào;

(n) Tải lên, gửi thư điện tử, đăng, chuyển tải hoặc bằng cách khác công khai bất kỳ Nội dung nào dẫn đến trường hợp vi phạm các quyền về sở hữu trí tuệ, sáng chế, thương hiệu, bí quyết kinh doanh, bản quyền hoặc bất cứ đặc quyền nào của bất cứ bên nào;

(o) Tải lên, gửi thư điện tử, đăng, chuyển tải hoặc bằng cách khác công khai bất kỳ quảng cáo, các tài liệu khuyến mại không được phép hoặc không hợp pháp, hoặc bất kỳ hình thức lôi kéo không được phép nào khác;

(p) Tải lên, gửi thư điện tử, đăng, chuyển tải hoặc bằng cách khác công khai bất cứ tài liệu chứa các loại vi-rút, worm, trojan hoặc bất kỳ các mã, tập tin hoặc chương trình máy tính được thiết kế để gây hại cho cộng đồng…

 (q)  Can thiệp, điều khiển hoặc làm gián đoạn Dịch vụ hoặc máy chủ hoặc hệ thống được liên kết với Dịch vụ hoặc tới việc sử dụng và trải nghiệm Dịch vụ của Người Sử Dụng khác;

 (r) Sử dụng Dịch vụ để xâm hại tới quyền riêng tư của người khác hoặc để “lén theo dõi” hoặc bằng cách khác quấy rối người khác;

(s) Xâm phạm các quyền của TDoctor, bao gồm bất kỳ quyền Sở hữu trí tuệ và gây nhầm lẫn cho các quyền đó;

(t) Sử dụng Dịch vụ để thu thập hoặc lưu trữ dữ liệu cá nhân của Người Sử Dụng

         khác liên quan đến các hành vi và hoạt động bị cấm như đề cập ở trên;

5.3 Người Sử Dụng hiểu rằng các Nội dung, dù được đăng công khai hoặc truyền tải riêng tư, là hoàn toàn thuộc trách nhiệm của người đã tạo ra Nội dung đó.  Điều đó nghĩa là TDoctor không phải chịu trách nhiệm bất kỳ nào trong mọi trường hợp đối với những Nội dung mà bạn tải lên, đăng, gửi thư điện tử, chuyển tải hoặc bằng cách nào khác công khai trên TDoctor. Người Sử Dụng hiểu rằng bằng cách sử dụng Trang TDoctor, bạn có thể gặp phải Nội dung mà bạn cho là phản cảm, không đúng đắn hoặc chưa phù hợp. TDoctor sẽ không chịu trách nhiệm đối với Nội dung, bao gồm lỗi hoặc thiếu sót liên quan đến Nội dung, hoặc tổn thất hoặc thiệt hại xuất phát từ việc sử dụng, hoặc dựa trên Nội dung được đăng tải, gửi thư, chuyển tải hoặc bằng cách khác công bố trên Trang TDoctor.

5.4  Người Sử Dụng thừa nhận rằng TDoctor và các bên được chỉ định của mình có toàn quyền (nhưng không có nghĩa vụ) sàng lọc, từ chối, xóa, dừng, tạm dừng, gỡ bỏ hoặc dời bất kỳ Nội dung có sẵn trên Trang TDoctor, bao gồm bất kỳ Nội dung hoặc thông tin nào bạn đã đăng. TDoctor có quyền gỡ bỏ Nội dung (i) xâm phạm đến Điều khoản dịch vụ; (ii) trong trường hợp TDoctor nhận được khiếu nại hơp lệ theo quy định pháp luật từ Người Sử Dụng khác; (iii) trong trường hợp TDoctor nhận được thông báo hợp lệ về vi phạm quyền Sở hữu trí tuệ hoặc yêu cầu pháp lý cho việc gỡ bỏ; hoặc (iv) những nguyên nhân khác theo quy định pháp luật. TDoctor có quyền chặn các liên lạc (bao gồm việc cập nhật trạng thái, đăng tin, truyền tin và/hoặc trao đổi) về hoặc liên quan đến Dịch vụ như nỗ lực của chúng tôi nhằm bảo vệ Dịch vụ hoặc Người Sử Dụng của TDoctor, hoặc bằng cách khác thi hành các điều khoản trong Điều khoản dịch vụ này. Người Sử Dụng đồng ý rằng mình phải tự đánh giá và chịu mọi rủi ro liên quan đến việc sử dụng bất kỳ Nội dung nào, bao gồm bất kỳ việc dựa vào tính chính xác, đầy đủ, hoặc độ hữu dụng của Nội dung đó.

5.5 Người Sử Dụng chấp thuận và đồng ý rằng TDoctor có thể truy cập, duy trì và tiết lộ thông tin Tài khoản của Người Sử Dụng trong trường hợp pháp luật có yêu cầu hoặc theo lệnh của tòa án, Công an hoặc cơ quan nhà nước có thẩm quyền yêu cầu theo quy định pháp luật: (a) tuân thủ các thủ tục pháp luật; (b) thực thi Điều khoản dịch vụ; (c) phản hồi các khiếu nại về việc Nội dung xâm phạm đến quyền lợi của bên thứ ba; (d) phản hồi các yêu cầu của Người Sử Dụng liên quan đến chăm sóc khách hàng; (e) bảo vệ các quyền, tài sản hoặc an toàn của TDoctor, Người Sử Dụng và/hoặc cộng đồng.

 6. VI PHẠM ĐIỀU KHOẢN DỊCH VỤ

6.1  Việc vi phạm chính sách này có thể dẫn tới một số hành động, bao gồm bất kỳ hoặc tất cả các hành động sau:

-  Xóa danh mục sản phẩm/ dịch vụ;

-  Giới hạn quyền sử dụng Tài khoản;

-  Đình chỉ và chấm dứt Tài khoản;

-  Thu hồi tiền/tài sản có được do hành vi gian lận, và các chi phí có liên quan..;

- Các cáo buộc hình sự;

- Áp dụng biện pháp dân sự, bao gồm khiếu nại bồi thường thiệt hại và/hoặc áp dụng biện pháp khẩn cấp tạm thời;

6.2  Nếu bạn phát hiện Người Sử Dụng trên Trang TDoctor của chúng tôi có hành vi vi

            phạm Điều khoản dịch vụ, vui lòng liên hệ TDoctor.



7. BÁO CÁO HÀNH VI CÓ KHẢ NĂNG XÂM PHẠM QUYỀN SỞ HỮU TRÍ TUỆ

7.1  Người Sử Dụng là các cá nhân hoặc tổ chức độc lập và họ không có bất kỳ mối liên kết nào với TDoctor dưới bất kỳ hình thức nào. TDoctor cũng không phải là đại lý hay đại diện của Người Sử Dụng và không nắm giữ và/hoặc sở hữu bất kỳ hàng hóa hoặc dịch vụ nào được chào bán/ quảng bá trên TDoctor.

7.2 Nếu bạn là chủ sở hữu quyền sở hữu trí tuệ (SHTT) hoặc là đại diện được ủy quyền của Chủ sở hữu quyền SHTT và bạn tin rằng các quyền của bản thân hoặc của thân chủ có khả năng bị xâm phạm, vui lòng báo thông báo bằng văn bản tới TDoctor và cung cấp cho chúng tôi các tài liệu chứng minh các quyền hợp pháp của mình để được hỗ trợ việc giải quyết khiếu nại, giải quyết theo quy định của pháp luật.

 8. TRÁCH NHIỆM CỦA NGƯỜI CUNG CẤP DỊCH VỤ KHÁM – CHỮA BỆNH.

8.1  Người cung cấp dịch vụ Khám – Chữa bệnh (các Bác sĩ, Bệnh viện, Cơ sở khám – chữa bệnh, Nhà thuốc) phải cam kết đảm bảo đáp ứng đầy đủ các điều kiện, tiêu chuẩn theo quy định của pháp luật về hành nghề hoặc cung cấp dịch vụ Khám – Chữa bệnh; đảm bảo đầy đủ điều kiện và tiêu chuẩn để có thể thực hiện các hoạt động y tế từ xa theo quy định; quản lý và đảm bảo độ chính xác, hợp pháp và đầy đủ của các thông tin liên quan đến giá cả và chi tiết dịch vụ, không được phép đăng tải các thông tin không chính xác hoặc gây nhầm lẫn, nhiễu loạn thông tin.

8.2  Giá sản phẩm/dịch vụ được Người cung cấp toàn quyền quyết định, trừ các sản phẩm/  dịch vụ khám – chữa bệnh được ấn định giá bởi cơ quan Nhà nước có thẩm quyền. Giá sản phẩm/ dịch vụ phải bao gồm các loại thuế, phí, v.v. Người mua hoặc sử dụng dịch vụ khám – chữa bệnh sẽ không phải thanh toán thêm hoặc riêng bất kỳ khoản tiền nào khác. Nếu thông tin giá hàng hóa hoặc dịch vụ niêm yết không thể hiện rõ giá đó đã bao gồm hay chưa bao gồm những chi phí liên quan đến thuế, phí…và các chi phí phát sinh khác thì giá này được hiểu là đã bao gồm mọi chi phí liên quan nói trên.

8.3 Trong giới hạn pháp luật cho phép, Người cung cấp dịch vụ đồng ý rằng TDoctor có thể thực hiện các hoạt động khuyến mãi để hỗ trợ các giao dịch giữa Người cung cấp dịch vụ khám – chữa bệnh và Người Sử Dụng dịch vụ thông qua việc giảm, chiết khấu hoặc hoàn lại phí hoặc thông qua những cách khác thì giá cuối cùng Người Sử Dụng dịch vụ cần thanh toán thực tế là giá đã áp dụng những điều chỉnh trên.

8.4  Để thúc đẩy việc mua các sản phẩm / dịch vụ Người cung cấp dịch vụ đăng trên Trang TDoctor, TDoctor có thể đăng những sản phẩm đó (theo mức giá đã điều chỉnh) lên các website của bên thứ ba (chẳng hạn các cổng thông tin và cổng so sánh giá) và những website khác (nội địa hoặc quốc tế) được vận hành bởi hoặc hợp tác với TDoctor.

8.5  Người cung cấp dịch vụ/ sản phẩm chịu trách nhiệm cung cấp hóa đơn cho Người mua hoặc Người Sử Dụng dịch vụ theo quy định pháp luật.

8.6  Người cung cấp dịch vụ/ sản phẩm thừa nhận và đồng ý rằng Người cung cấp dịch vụ/ sản phẩm chịu trách nhiệm kê khai, nộp các loại thuế, phí, lệ phí và bất kỳ loại phí nào theo quy định pháp luật đối với sản phẩm/dịch vụ được cung cấp. TDoctor không cung cấp dịch vụ tư vấn, kê khai hoặc nộp hộ các khoản thuế, phí, lệ phí và các chi phí khác theo quy định đối với vấn đề này.

8.7  Người cung cấp sản phẩm/ dịch vụ thừa nhận và đồng ý rằng bất kỳ sự vi phạm nào của Người cung cấp sản phẩm/ dịch vụ đối với các chính sách của TDoctor sẽ dẫn đến các biện pháp đề cập tại Mục 6.1.

9.  TRANH CHẤP

9.1   Trường hợp phát sinh vấn đề liên quan đến giao dịch, Người cung cấp sản phẩm / dịch vụ khám – chữa bệnh và Người Sử Dụng dịch vụ đồng ý đầu tiên sẽ đối thoại với nhau để cố gắng giải quyết tranh chấp đó bằng thương lượng và hòa giải, TDoctor sẽ cố gắng một cách hợp lý để thu xếp hoặc hỗ trợ để các bên giải quyết tranh chấp. Nếu vấn đề không được giải quyết bằng thương lượng và hòa giải, Người Sử Dụng có thể khiếu nại lên cơ quan có thẩm quyền để giải quyết tranh chấp phát sinh đối với giao dịch đó theo quy định pháp luật.

9.2  Mỗi Người cung cấp  sản phẩm/ dịch vụ và Người Sử Dụng dịch vụ cam kết và đồng ý rằng mình sẽ không tiến hành các thủ tục tố tụng hoặc bằng cách khác để khiếu nại đối với TDoctor (trừ trường hợp TDoctor là Người cung cấp sản phẩm/dịch vụ khám – chữa bệnh liên quan đến khiếu nại đó) liên quan đến bất kỳ giao dịch nào được thực hiện trên Trang TDoctor hoặc bất kỳ tranh chấp nào liên quan đến giao dịch đó.

9.3  Người Sử Dụng được áp dụng Chính sách đảm bảo của TDoctor có thể gửi yêu cầu bằng văn bản tới TDoctor để được hỗ trợ giải quyết tranh chấp phát sinh từ giao dịch. TDoctor sẽ thực hiện những bước cần thiết để hỗ trợ Người Sử Dụng giải quyết những tranh chấp này.  

10.  PHẢN HỒI

10.1 TDoctor luôn đón nhận những thông tin và phản hồi trung thực và mang tính xây dựng từ phía Người Sử Dụng nhằm giúp TDoctor cải thiện chất lượng Dịch vụ. Quy trình phản hồi của TDoctor gồm:

(ii) Phản hồi cần được thực hiện bằng văn bản qua email hoặc sử dụng mẫu phản hồi có sẵn trên ứng dụng.

(iii) Tất cả các phản hồi ẩn danh đều không được chấp nhận.

(iv) Người Sử Dụng liên quan đến phản hồi sẽ được thông báo đầy đủ và được tạo cơ hội cải thiện tình hình.

(v) Những phản hồi không rõ ràng và mang tính phỉ báng sẽ không được chấp nhận

 11. LOẠI TRỪ TRÁCH NHIỆM

11.1 TDoctor là một nền tảng điện tử trung gian được hình thành dựa trên sự kết nối giữa Người cung cấp dịch vụ / sản phẩm (các Bác sĩ, Bệnh viện, Cơ sở khám – chữa bệnh, các Nhà thuốc) với người có nhu cầu Khám – Chữa bệnh (Người Sử Dụng). Do vậy, TDoctor không đảm bảo hoặc khẳng định nào về bất kỳ nội dung nào được thể hiện, ngụ ý hoặc bắt buộc đối với dịch vụ/ sản phẩm, bao gồm việc đảm bảo về chất lượng, việc thực hiện giao dịch, không vi phạm, hay sự phù hợp cho một mục đích cụ thể, cũng như không có bất kỳ đảm bảo nào được tạo ra trong quá trình giao dịch, thực hiện, mua bán hoặc sử dụng sản phẩm/ dịch vụ sau này.

11.2  Người Sử Dụng đồng ý thừa nhận rằng mọi rủi ro phát sinh ngoài việc sử dụng hoặc vận hành của Trang TDoctor và / hoặc dịch vụ TDoctor sẽ thuộc về Người Sử Dụng trong giới hạn tối đa pháp luật cho phép.

11.3 TDoctor không kiểm soát và không đảm bảo hoặc chấp nhận trách nhiệm đối với: (a) việc phù hợp mục đích, sự tồn tại, chất lượng, độ an toàn hoặc tính pháp lý của các sản phẩm / dịch vụ có sẵn hoặc đăng tải trên trang TDoctor; (b) khả năng người cung cấp cung cấp các sản phẩm / dịch vụ hoặc khả năng của người mua/ sử dụng dịch vụ và thanh toán cho các sản phẩm/ dịch vụ đó. Nếu có tranh chấp liên quan đến một hoặc nhiều Người Sử Dụng, những Người Sử Dụng này đồng ý tự giải quyết tranh chấp trực tiếp với nhau và miễn trừ TDoctor khỏi các khiếu nại, yêu cầu và bồi thường mọi tổn thất phát sinh hoặc liên quan đến tranh chấp đó.

12. CAM KẾT CỦA CÁC BÊN THAM GIA NỀN TẢNG TDOCTOR

12.1 Các bên cam kết khi gửi / đăng tải bất kỳ Nội dung nào cho Trang TDoctor, bạn khẳng định và bảo đảm rằng bạn đã có đầy đủ tất cả các quyền và/hoặc các chấp thuận cần thiết. Bạn cũng thừa nhận và đồng ý rằng bạn là người phải chịu trách nhiệm duy nhất đối với bất cứ nội dung gì bạn đăng tải hoặc tạo sẵn trên hoặc qua Trang TDoctor, bao gồm trách nhiệm về độ chính xác, độ tin cậy, tính nguyên bản, rõ ràng các quyền, tính tuân thủ pháp luật và các giới hạn pháp lý liên quan đến bất kỳ Nội dung đóng góp. Người Sử Dụng theo đây cũng đồng ý cấp quyền cho TDoctor và các bên kế thừa của TDoctor, một cách liên tục, không hủy ngang, mang tính toàn cầu, không độc quyền, không tiền bản quyền, có thể cấp quyền lại và có thể chuyển giao, quyền sử dụng, sao chép, phân phối, tái bản, chuyển giao, thay đổi, chỉnh sửa, tạo các sản phẩm phái sinh từ, thể hiện công khai, và thực hiện Nội dung đóng góp đó, thông qua hoặc liên quan đến Dịch vụ dưới bất kỳ phương tiện truyền thông nào và thông qua bất kỳ kênh truyền thông nào, bao gồm cho mục đích khuyến mãi hoặc phân phối lại một phần Dịch vụ (hoặc các sản phẩm phái sinh của Dịch vụ). Quyền mà bạn trao cho chúng tôi chỉ chấm dứt khi bạn hoặc TDoctor loại bỏ Nội dung đóng góp ra khỏi nền tảng TDoctor. Bạn hiểu rằng sự đóng góp của bạn có thể được chuyển giao sang nhiều hệ thống khác nhau và được thay đổi để phù hợp và đáp ứng các yêu cầu về kỹ thuật.

12.2  Bất kỳ Nội dung, tài liệu, thông tin hoặc ý tưởng nào của Người Sử Dụng đăng tải hoặc thông qua Dịch vụ, hoặc bằng cách khác chuyển giao cho TDoctor dưới bất kỳ hình thức nào, sẽ không được bảo mật bởi TDoctor và có thể được phổ biến hoặc sử dụng bởi TDoctor hoặc công ty liên kết của TDoctor mà không phải trả phí hoặc chịu trách nhiệm với Người Sử Dụng, để phục vụ bất kỳ mục đích nào, bao gồm việc phát triển, sản suất và quảng bá sản phẩm/dịch vụ. Khi thực hiện gửi Nội dung đến TDoctor, bạn thừa nhận và đồng ý rằng TDoctor và/hoặc các bên thứ ba có thể độc lập phát triển các phần mềm, ứng dụng, giao diện, sản phẩm và chỉnh sửa và/hoặc nâng cấp các phần mềm, ứng dụng, giao diện, sản phẩm mà chúng đồng nhất hoặc tương tự với các ý tưởng được nêu trong Nội dung được gửi của bạn về chức năng, mã hoặc các đặc tính khác. Điều khoản này không áp dụng đối với các thông tin cá nhân là đối tượng của chính sách bảo mật của TDoctor trừ khi bạn công khai những thông tin đó trên hoặc thông qua Dịch vụ.

12.3. Người Sử Dụng khẳng định và đảm bảo rằng: Người Sử Dụng sở hữu đầy đủ năng

          lực hành vi dân sự (đối với trường hợp vị thành niên thì đã có sự đồng ý hợp lệ từ

          cha mẹ hoặc người giám hộ hợp pháp), quyền và khả năng hợp pháp để giao kết các

          Điều khoản dịch vụ này và để tuân thủ các điều khoản theo đó. Người Sử Dụng chỉ

          sử dụng Dịch vụ cho các mục đích hợp pháp và theo quy định của các Điều khoản

          dịch vụ này cũng như tất cả các luật, quy tắc, quy chuẩn, chỉ thị, hướng dẫn, chính

          sách và quy định áp dụng.



 13. BỒI THƯỜNG

Bạn đồng ý bồi thường, bảo vệ và không gây hại cho TDoctor, công ty con, công ty liên kết hoặc đối tác và nhân viên của TDoctor (gọi chung là “Bên được bồi thường”) liên quan đến khiếu nại, hành động, thủ tục tố tụng, và các vụ kiện cũng như nghĩa vụ, tổn thất, thanh toán, khoản phạt, tiền phạt, chi phí và phí tổn có liên quan (bao gồm chi phí giải quyết tranh chấp) do Bên được bồi thường gánh chịu, phát sinh từ: (a) giao dịch được thực hiện trên Trang TDoctor, hoặc tranh chấp liên quan đến giao dịch đó (trừ trường hợp TDoctor là Người trực tiếp cung cấp sản phẩm/dịch vụ khám – chữa bệnh đối với giao dịch liên quan đến khiếu nại), (b) Chính sách đảm bảo của TDoctor, (c) việc tổ chức, hoạt động, quản trị và/hoặc điều hành các Dịch vụ được thực hiện bởi hoặc đại diện cho TDoctor, (d) vi phạm hoặc không tuân thủ bất kỳ điều khoản nào trong các Điều khoản dịch vụ này hoặc bất kỳ chính sách hoặc hướng dẫn nào được tham chiếu theo đây, (e) việc bạn sử dụng hoặc sử dụng không đúng Dịch vụ, hoặc (f) vi phạm của bạn đối với bất kỳ luật hoặc bất kỳ các quyền của bên thứ ba nào, hoặc (g) bất kỳ Nội dung nào được đăng tải bởi Người Sử Dụng.



 14. LUẬT ÁP DỤNG

Các Điều khoản dịch vụ này sẽ được điều chỉnh bởi và diễn giải theo pháp luật Việt Nam.  Bất kỳ tranh chấp, tranh cãi, khiếu nại hoặc sự bất đồng dưới bất cứ hình thức nào phát sinh từ hoặc liên quan đến các Điều khoản dịch vụ này hoặc liên quan đến TDoctor hoặc bất kỳ Bên được bồi thường nào thuộc đối tượng của các Điều khoản dịch vụ này sẽ được giải quyết bằng Trung Tâm Trọng Tài Quốc Tế Việt Nam (VIAC). Ngôn ngữ phán xử của trọng tài là Tiếng Việt.

 15.  QUY ĐỊNH CHUNG

15.1 TDoctor có quyền chỉnh sửa các Điều khoản dịch vụ này vào bất cứ thời điểm nào thông qua việc đăng tải các Điều khoản dịch vụ được chỉnh sửa lên Trang TDoctor. Việc Người dùng tiếp tục sử dụng Trang TDoctor sau khi việc thay đổi được đăng tải sẽ đương nhiên được hiểu rằng Người Sử Dụng chấp nhận các Điều khoản dịch vụ được chỉnh sửa.

15.2 Người Sử Dụng không được phép chuyển giao, cấp lại quyền hoặc chuyển nhượng bất kỳ các quyền hoặc nghĩa vụ được cấp cho Người Sử Dụng theo đây.

15.3  Không một quy định nào trong các Điều khoản dịch vụ này sẽ cấu thành quan hệ đối tác, liên doanh hoặc quan hệ đại lý – chủ sở hữu giữa bạn và TDoctor.

15.4 Các Điều khoản dịch vụ này hoàn toàn phục vụ cho lợi ích của TDoctor và Người Sử Dụng mà không vì lợi ích của bất kỳ cá nhân hay tổ chức nào khác, trừ các công ty liên kết và các công ty con của TDoctor.

15.5 Các điều khoản được quy định trong Điều khoản dịch vụ này và bất kỳ các thỏa thuận và chính sách được bao gồm hoặc được dẫn chiếu trong các Điều khoản dịch vụ này cấu thành nên sự thỏa thuận và cách hiểu tổng thể của các bên đối với Dịch vụ và Trang TDoctor. Với việc các bên giao kết thỏa thuận được tạo thành theo các Điều khoản dịch vụ này, các bên không dựa vào bất kỳ tuyên bố, khẳng định, đảm bảo, cách hiểu, cam kết, lời hứa hoặc cam đoan nào của bất kỳ người nào trừ những điều được nêu rõ trong các Điều khoản dịch vụ này.  

15.6  Nếu bạn có bất kỳ câu hỏi hay thắc mắc nào liên quan đến Điều khoản dịch vụ hoặc các vấn đề phát sinh liên quan đến Điều khoản dịch vụ trên Trang TDoctor, vui lòng liên hệ TDoctor. 

TÔI ĐÃ ĐỌC CÁC ĐIỀU KHOẢN DỊCH VỤ NÀY VÀ ĐỒNG Ý VỚI TẤT CẢ CÁC ĐIỀU KHOẢN NHƯ TRÊN CŨNG NHƯ BẤT KỲ ĐIỀU KHOẢN NÀO ĐƯỢC CHỈNH SỬA SAU NÀY.  BẰNG CÁCH BẤM NÚT “ĐĂNG KÝ” HOẶC “ĐĂNG KÝ QUA FACEBOOK” KHI ĐĂNG KÝ SỬ DỤNG TRANG TDOCTOR, TÔI HIỂU RẰNG TÔI ĐANG TẠO CHỮ KÝ ĐIỆN TỬ VÀ NÓ CÓ GIÁ TRỊ VÀ HIỆU LỰC TƯƠNG TỰ NHƯ CHỮ KÝ TÔI KÝ BẰNG TAY.


                                        </pre>
                                    </div>
                                    <div class="form-check">
                                        <input style="display: block" type="checkbox" class="form-check-input acceptClazz" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Tôi chấp nhận với <a style="font-size: 1rem; color: var(--color-4)" href="javascript:void(0)"> các điều khoản </a> trên</label>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="button button-standard w-100 btn-req">Gửi yêu cầu</button>
                                    </div>
                                    
                                </form>
                                <script>
                                         // $.scrollTo($('#doctor_register_area'), 1000);
                                        if($('.bi-need-scroll-to-alert').length){
                                            $('html, body').animate({
                                                scrollTop: $("#doctor_register_area").offset().top
                                            }, 2000);
                                        }
                                        if($('.bi-need-to-go-home').length){
                                            window.location.href = '/home';
                                        }
                                        $('.btn-req').click(function (event) {
                                            let accept = $('.acceptClazz').prop("checked");
                                            console.log(accept);
                                            if (accept == false) {
                                                alert("Vui lòng chấp nhận điều khoản trước khi đăng ký");
                                                return
                                            }

                                            let name = $('.nameClazz').val()
                                            if (name == "") {
                                                alert("Vui lòng nhập tên");
                                                return
                                            }
                                            let email = $('.emailClazz').val()
                                            if (email == "") {
                                                alert("Vui lòng nhập email");
                                                return
                                            }
                                            let phone = $('.phoneClazz').val()
                                            if (phone == "") {
                                                alert("Vui lòng nhập số điện thoại");
                                                return
                                            }
                                            let password = $('.passClazz').val()
                                            if (password == "") {
                                                alert("Vui lòng nhập mật khẩu");
                                                return
                                            }
                                            $(this).closest('form').trigger('submit')
                                            // let speciality = $('.specialityClazz').val()
                                            // if (speciality == 0) {
                                            //     alert("Vui lòng chọn chuyên khoa");
                                            //     return
                                            // }
                                            // $.ajax({
                                            //     type: 'POST',
                                            //     url: '/dang-ky-bac-si',
                                            //     data: {
                                            //         name : name,
                                            //         email : email,
                                            //         phone : phone,
                                            //         // speciality : speciality
                                            //     },
                                            //     cache: false,
                                            //     success: function(output) {
                                            //         alert("Đã đăng ký thành công");
                                            //         location.reload();
                                            //     }
                                            // });
                                        })
                                    </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection