<?php $csyt = $cs->clinic_name;?>
@extends('v2/structor/main',['title'=> 'Chi tiết cơ sở y tế - '.$cs['clinic_name']])
@section('content')
<style>
.star-rating {
    display: flex;
    align-items: center;
    font-size: 3em;
    justify-content: center;
    margin-top: 8px;
    margin-bottom: 8px;
}

.back-stars {
    display: flex;
    color: #bb5252;
    position: relative;
    text-shadow: 4px 4px 10px #843a3a;
}

.front-stars {
    display: flex;
    color: #FFBC0B;
    overflow: hidden;
    position: absolute;
    text-shadow: 2px 2px 5px #d29b09;
    top: 0;
    transition: all .5s
}
                
.verified-badge-new {
   background: #4080ff;
    border-radius: 20px;
    padding: 4px 5px;
    cursor: pointer;
    vertical-align: middle;
    color: #fff;
    font-size: 7px;
    padding-bottom: 2px;
    line-height: 8px;
    display: inline-block;
    padding-bottom: 5px;
}
span.verified-badge-new em, span.verified-badge-new i {
    font-size: 10px;
}
.link.bi-background{
    margin-bottom: 0;
}
.call-to-action a {
    white-space: normal;
}

ul.clinic-tab-wrapper {
    margin-bottom: 25px;
}
.clinic-tab-content-inner li {list-style: inherit;}
.clinic-tab-content-inner .ck img{
    width: auto;
}

.clinic-tab-content .ck ul li {
    width: 100%;
    flex: none;
    margin-left: 32px;
}
</style>
    <div class="container">
        <div class="row" id="top">
            <div class="link bi-background col-sm-12">
                <h1 style="margin-bottom: 0;color: #e84f5e;font-size: 30px;">
                    {{$cs['clinic_name']}}
                    <span class="verified-badge-new">
                        <i class="far fa-check-circle"></i><em>Chính thức</em>
                    </span>
                </h1>
            </div>
        </div><!-- #top -->
        <div class="row">
        <div id="asidex" class="col-sm-12 col-lg-4 text-center">
            <div class="clinic-id" style="padding-top: 20px">
                TCLINIC: {{$cs['clinic_id']}}
                <?php
            $is_current_user_page = false;
            $refer_id = 0;
            $currentUser = Session::get('user');
            if($currentUser){
                if ( $currentUser && $currentUser->isDoctor() ) {
                    $refer_id = $cs->doctor_id;
                }
                if ( $currentUser && $currentUser->isClinic() ) {            
                    $refer_id = $cs->user_id;
                }
                if($currentUser->user_id == $refer_id){
                    $is_current_user_page = true;
                }
            }
            ?>
            </div>
            <div class="ava" style="">
                <a class="avatar-doctor"
                   style="background-image: url('{{url('public/images/health_facilities/'.$cs->profile_image)}}')"></a>
            </div>


            <div>
                <div class="star-rating">
                    <div class="back-stars">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>

                        <div class="front-stars" style="width: {{($danhgia / 5) * 100}}%;">
                            <i class="fa fa-star" aria-hidden="true" style="color: #FFBC0B;"></i>
                            <i class="fa fa-star" aria-hidden="true" style="color: #FFBC0B;"></i>
                            <i class="fa fa-star" aria-hidden="true" style="color: #FFBC0B;"></i>
                            <i class="fa fa-star" aria-hidden="true" style="color: #FFBC0B;"></i>
                            <i class="fa fa-star" aria-hidden="true" style="color: #FFBC0B;"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div style="margin-top: 20px">
                <p>Số nhận xét: {{$totalRating}}</p>
                <p>Số câu trả lời: {{is_array($questions) ? count($questions) : $questions->count()}}</p>
            </div>

{{--            <p><strong>{{round(($sum/$danhgia),1)}}</strong>( {{$danhgia}} đánh giá )</p>--}}
            <div class="call-to-action">
                @if(true || Session::get('user')==null)
                <a href="/hoibacsi/datcauhoi?u={{$cs['user_id']}}&ref_type=3&ref_code={{$cs['clinic_id']}}&speciality_id={{$speciality_id}}" class="dk"> Hỏi miễn phí</a>
                <a href="/henlichkham-csyt?u={{$cs['user_id']}}&ref_type=3&ref_code={{$cs['clinic_id']}}&speciality_id={{$speciality_id}}" class="dk"> Đặt khám riêng tư</a>
                @else
                <a href="/hoibacsi/datcauhoi" class="dk"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Hỏi miễn phí</a>
                <a href="/dat-lich-hen?clinic_id={{$cs['clinic_id']}}&speciality_id={{$speciality_id}}" class="dk"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Đặt lịch hẹn</a>
                @endif
                <br/>
                <br/>
                <?php
                $chat_to_id = $cs->user_id;
                if($cs->supporter_id != 0){
                    $chat_to_id = $cs->supporter_id;
                }
                ?>
                @if(!Session::get('user')==null)
                <a href="javascript:void(0);" class="btn-chat-vs-bs btn-rounded btn-ok click-to-start-chat" data-my-name="{{Session::get('user')->fullname}}" data-client-name="{{$cs['clinic_name']}}" data-chat-to="room_{{$chat_to_id}}" data-chat-room="room_{{$chat_to_id}}_{{Session::get('user')->user_id}}"><i class="fa fa-" aria-hidden="true"></i> Chat với {{$cs['clinic_name']}}</a>
                @else
                <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal-tai-app" class="btn-chat-vs-bs btn-rounded btn-ok btn-login-to-chatx" data-url="/frameLogin?v={{time()}}&rt=3&rc={{$cs['clinic_id']}}"><i class="fa fa-" aria-hidden="true"></i> Chat với {{$cs['clinic_name']}}</a>
                @endif
            </div>

            <div class="achat">
                <a id="chatdt" href="tel:{{$cs['clinic_phone']}}" style="font-size: 1.5em;">Hotline: {{$cs['clinic_phone']}}</a>
            </div>

            <div style="margin-top: 12px; color: red; text-align: left;"><a style="font-size: 1em; font-weight: bold" href="#">
                Địa chỉ: {{$cs['clinic_address']}}
            </div>

            <div class="apps clr middle-item">
                <a href="https://itunes.apple.com/us/app/tdoctor/id1443310734?ls=1&amp;mt=8"><img
                            src="/public/v2/img/appstore.svg" alt="Tải app Tdoctor cho bệnh nhân"></a>
                <a href="https://play.google.com/store/apps/details?id=com.app.khambenh.bacsiviet"><img
                            src="/public/v2/img/playstore.svg" alt="Tải app Tdoctor cho bệnh nhân"></a>
            </div>
            <div class="qr-code" style="text-align: center">
                <img class="layzy-load" style="text-align: center; display:inline-block;" src="https://chart.googleapis.com/chart?chs=350x350&cht=qr&choe=UTF-8&chl={{route('goto', $cs['clinic_id'].'-3')}}" alt="qrcode {{$cs['clinic_name']}}" />
            </div>
            <div class="row">
            <ins class="adsbygoogle col-sm-12"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-7940791875056931"
     data-ad-slot="3876750115"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
        </div><!--Aside-->

       <div class="col-sm-12 col-lg-8" style="padding-right: 0">

            <div class="clinic-content-wrapper">
                <div class="contribution c1">
                    <ul class="clinic-tab-wrapper">
                        <li>
                            <a class="" data-target="clinic-notification" title="">
                                Thông báo
                            </a>
                        </li>
                        <li>
                            <a class="" data-target="clinic-clinical" title="Lâm sàng">
                                Lâm sàng
                            </a>
                        </li>
                        <li>
                            <a data-target="clinic-about" class="active">Thông tin</a>
                        </li>                        
                        <li>
                            <a data-target="clinic-faq">Hỏi đáp</a>
                        </li>
                        @if(false && $is_current_user_page)
                        <li>
                            <a data-target="clinic-patients">Bệnh nhân</a>
                        </li>
                        @endif
                    </ul>
                </div><!--Contribution-->

                <div class="subsection clinic-tab-content active" id="clinic-about">
                    <div class="clinic-tab-content-inner">
                        <div class="ck">
                            <div style="text-align:justify; font-size: 15px;padding-bottom: 10px;">
                                {!!(str_replace('../public/images/', '//tdoctor.vn/public/images/', $cs['clinic_desc']))!!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="subsection clinic-tab-content" id="clinic-notification">
                    <div class="ck">
                        <div style="text-align:justify; font-size: 15px;padding-bottom: 10px;">
                            {!!\App\Helpers\UploadFileHelper::correctPath($cs['clinic_notification'])!!}
                        </div>
                    </div>
                </div>

                <div class="subsection clinic-tab-content" id="clinic-clinical">
                    <div class="ck">
                        <div style="text-align:justify; font-size: 15px;padding-bottom: 10px;">
                            {!!\App\Helpers\UploadFileHelper::correctPath($cs['clinic_clinical'])!!}
                        </div>
                    </div>
                </div>
                <div class="subsection clinic-tab-content" id="clinic-faq">
                    <h3></h3>
                    <div class="ck1">
                        <?php
                        \Carbon\Carbon::setLocale('vi')
                        ?>
                        <div>
                            <div>
                                @include('v2.view.danhsach_cauhoi')
                                @if(count($questions) == 0)
                                    <div class="ck1">Bạn hãy là người đầu tiên hỏi phòng khám!</div>
                                @endif
                                <?php $qss = $questions; if(false){ ?>
                                @if(count($qss) == 0)
                                    <div class="ck1">Bạn hãy là người đầu tiên hỏi phòng khám!</div>
                                @else
                                    <ul>
                                        @foreach($qss as $qs)
                                            <li style="list-style-type:disclosure-closed">
                                                <h3>
                                                    <a style="font-size: 1rem; font-weight: bold; overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp: 2;display: -webkit-box;-webkit-box-orient: vertical;"
                                                       href="/hoibacsi/{{$qs->question_id}}/">
                                                        {{$qs->question_content}}
                                                    </a>
                                                </h3>
{{--                                                @if (checkRemoteFile("https://tdoctor.vn/public/images/".$qs->question_id))--}}
{{--                                                    <div><img alt="Câu hỏi" src="/public/images/{{$qs->question_id}}"/></div>--}}
{{--                                                @endif--}}
                                            </li>
                                            {{--                                        @foreach($qs->answers as $anwser)--}}
                                            {{--                                            <p style="font-weight: unset; font-size: 14px; margin-bottom: 12px">--}}
                                            {{--                                                @if($anwser->answer_content!=null)--}}
                                            {{--                                                    @if(strlen($anwser->answer_content)>100 && strpos($anwser->answer_content, ' ', 100)!="")--}}
                                            {{--                                                        {!!" - " . substr( $anwser->answer_content, 0, strpos($anwser->answer_content, ' ', 100) )!!}--}}
                                            {{--                                                    @else--}}
                                            {{--                                                        {!!" - " . $anwser->answer_content!!}--}}
                                            {{--                                                    @endif--}}
                                            {{--                                                @endif--}}
                                            {{--                                            </p>--}}
                                            {{--                                        @endforeach--}}
                                        @endforeach
                                    </ul>
                                @endif
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                @if(false && $is_current_user_page)
                <div class="subsection clinic-tab-content" id="clinic-patients">
                    <h3></h3>
                    <div class="ck1">
                        <?php
                        $patients = \App\Users::where('refer_id', $cs->clinic_id)->get();
                        ?>
                        @if (count($patients) === 0)
                            <h3>
                                Chưa có bệnh nhân nào
                            </h3>
                        @else
                            @foreach($patients as $patient)
                                <div class="patient-item">
                                    <div class="name">
                                        <label>Họ và tên:</label> {{$patient->fullname}}
                                    </div>
                                    <div class="email">
                                        <label>Email:</label> {{$patient->email}}
                                    </div>
                                    <div class="phone">
                                        <label>Số điện thoại:</label> {{$patient->phone}}
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                @endif
            </div>

            <div class="subsection">
                <h2 id="nhan-xet"><i class="fa fa-comment"></i> Nhận xét về {{$cs->clinic_name}}</h2>
                <div class="comment-form" style="float: left">
                    <form method="POST" action="/commentclinic/{{$cs->clinic_id}}">
                        {{csrf_field()}}
                        <p style="font-size: 15px">
                            Bạn đã sử dụng dịch vụ của phòng khám {{$cs->clinic_name}}? Hãy chia sẻ cảm nhận của bạn với
                            cộng đồng.
                        </p>
                        <p style="font-size: 15px">
                            Nếu bạn có câu hỏi về sức khỏe và chuyên môn, vui lòng chuyển sang trang <a
                                    style="color:#2B96CC" href="../../hoibacsi">Hỏi Bác sĩ</a> để được tư vấn
                            miễn phí.
                        </p>
                        <fieldset class="rating"><h1>Đánh Giá:</h1>
                            <div class="form-field">
                                <div class="form-field-input1">
                                    <input class="val-rating" hidden name="ip-rating" value="4"/>
                                    <span index="1" class="fa fa-star btn-item-rating checked"></span>
                                    <span index="2" class="fa fa-star btn-item-rating checked"></span>
                                    <span index="3" class="fa fa-star btn-item-rating checked"></span>
                                    <span index="4" class="fa fa-star btn-item-rating checked"></span>
                                    <span index="5" class="fa fa-star btn-item-rating checked"></span>
                                </div>
                                <style>
                                    .btn-item-rating {
                                        cursor: pointer;
                                    }

                                    .checked {
                                        color: orange;
                                    }
                                </style>
                                <script>
							        $('.btn-item-rating').click(function () {
								        var listItemRatingBar = $('.btn-item-rating');
								        for (var i = 0; i < listItemRatingBar.length; i++) {
									        var btnItemRating = listItemRatingBar[i];
									        $(btnItemRating).removeClass('checked');
								        }
								        var index = $(this).attr('index');
								        $('.val-rating').val(index);
								        for (var iCheck = 0; iCheck < index; iCheck++) {
									        var btnItemRating = listItemRatingBar[iCheck];
									        $(btnItemRating).addClass('checked');
								        }
							        });
                                </script>
                            </div>
                        </fieldset>
                        <div class="form-row form-row-comment">
                            <div class="form-field">
                                <label style="font-weight: bold;">
                                    Bình luận:
                                </label>
                                <div class="form-field-input">
                                    <textarea name="comment" class="btn-req-login" placeholder="Đánh giá của bạn..." required=""></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="button-row">
                            <input name="professional" value="{{$cs->clinic_id}}" type="hidden">
                            @if(Session::get('user')!=null)
                                <button type=" submit" class="btn btn-primary">Gửi</button>
                            @else
                                <a href="/dang-nhap?next={{Request::url()}}">Đăng nhập để nhận
                                    xét</a>
                            @endif
                        </div>
                    </form>
                    <div class="form-success">
                        <h4><i></i>
                            @if(session('thongbao'))
                                {{session('thongbao')}}
                            @endif</h4>
                    </div>
                </div>
            </div>
        </div>
        </div>
          <!-- Modal -->
    <div id="myModal-tai-app" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Bạn tải App này để chat và gọi trực tiếp với {{$cs['clinic_name']}} nha</h4>
          </div>
          <div class="modal-body">
            <h4 class="modal-title"style="
                font-size: 22px;
                text-align: center;
            ">Bạn tải App này để chat và gọi trực tiếp với {{$cs['clinic_name']}} nha</h4>
            <!-- <p>Bạn tải App này để chat và gọi trực tiếp với bác sĩ {{$cs['clinic_name']}} nha</p> -->
            <div class="apps clr middle-item">
                <a href="https://itunes.apple.com/us/app/tdoctor/id1443310734?ls=1&amp;mt=8"><img
                            src="/public/v2/img/appstore.svg" alt="Tải app Tdoctor cho bệnh nhân"></a>
                <a href="https://play.google.com/store/apps/details?id=com.app.khambenh.bacsiviet"><img
                            src="/public/v2/img/playstore.svg" alt="Tải app Tdoctor cho bệnh nhân"></a>
                
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
          </div>
        </div>

      </div>
    </div>
<?php if(false){ ?>


        <script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBsKqsk1nQqW2cSSPCJ8Ud_PzCB0XhZvAE'></script>

        <?php

        $vitri = "";
        if ($cs['clinic_address'] != "") {
            $vitri = $cs['clinic_address'];
        } else {
            $vitri = "Hồ Chí Minh";
        }

        function get_infor_from_address($address = null)
        {

            // $prepAddr = str_replace(' ', '+', stripUnicode($address));
            $prepAddr = str_replace(' ', '+', $address);

            $geocode = file_get_contents('https://maps.google.com/maps/api/geocode/json?key=AIzaSyBsKqsk1nQqW2cSSPCJ8Ud_PzCB0XhZvAE&address=' . $prepAddr . '&sensor=false');

            $output = json_decode($geocode);

            return $output;
        }

        // Loại bỏ dấu tiếng Việt để cho kết quả chính xác hơn
        function stripUnicode($str)
        {
            if (!$str) return false;
            $unicode = array(
                'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
                'd' => 'đ|Đ',
                'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
                'i' => 'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
                'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
                'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
                'y' => 'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ'
            );
            foreach ($unicode as $nonUnicode => $uni) $str = preg_replace("/($uni)/i", $nonUnicode, $str);
            return $str;
        }

        if(false){
        $address = get_infor_from_address($vitri);

        if ($address->status == "ZERO_RESULTS") {
            $vt = $cs['clinic_address'];
            $place = explode(",", $vt);
//            $vitri = "Hà Nội";
            $address = get_infor_from_address($vitri);
        }
        }

        // Thắng mod 20181106 1000 start
        // Fix bug lấy không có vị trí mà đi lấy item thứ 0 trong list empty
        // Mặc định lấy vị trí công ty nếu không lấy được
        $haveLat = isset($address->results[0]) ? $address->results[0] : false;
        $haveLong = isset($address->results[0]) ? $address->results[0] : false;
        $lat = 10.758363;
        $long = 106.662145;
        if ($haveLat && $haveLong) {
            $lat = $address->results[0]->geometry->location->lat;
            $long = $address->results[0]->geometry->location->lng;
        }
        // Thắng mod 20181106 1000 end
        ?>

        <script type='text/javascript'>
			var latitude = "<?php echo $lat; ?>";
			var longitude = "<?php echo $long; ?>";
			var address = "<?php echo $vitri; ?>";

			function initialize() {
				var myLatLng = new google.maps.LatLng(latitude, longitude);

				var mapProp = {
					zoom: 15,
					center: myLatLng,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var map = new google.maps.Map(document.getElementById('map_canvas'), mapProp);

				var marker = new google.maps.Marker({
					position: myLatLng,
					map: map,
					optimized: false,
					title: address
				});
			}


        </script>

        <body class="map-wrapper" onload='initialize()'>
            <div id='map_canvas' style="width:100%; height:300px;"></div>
        </body>
    <?php } ?>

<div class="row" style="clear: both;"></div>
<div class="row">
<div class="col-sm-12 google-map-for_clinic">
<?php
if(isset($cs['map']) && !empty($cs['map'])){
    echo $cs['map'];
}
?>
    </div>
</div>
<style type="text/css">
.col-sm-12.google-map-for_clinic iframe {
    width: 100%;
}
</style>
    </div>
<script type="text/javascript">
    jQuery(document).ready(function($){
        $('.clinic-tab-wrapper li a').click(function(event){
            event.preventDefault();
            $('.clinic-tab-wrapper li a').removeClass('active');
            $(this).addClass('active');
            data_target = $(this).attr('data-target');
            $('.clinic-tab-content').removeClass('active');
            $('#'+data_target).addClass('active');
        })
    })
</script>

@endsection
