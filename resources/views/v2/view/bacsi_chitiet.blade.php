<?php
function checkRemoteFile($url)
{
    return true;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    // don't download content
    curl_setopt($ch, CURLOPT_NOBODY, 1);
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($ch);
    curl_close($ch);
    if ($result !== FALSE) {
        return true;
    } else {
        return false;
    }
}
function get_current_profile_image($doctor, $is_echo = true){
    if (strlen(strstr("$doctor->profile_image", "https://dwbxi9io9o7ce.cloudfront.net")) > 0) {
        $profile_image = "$doctor->profile_image";
    } else {
        $profile_image = "/public/images/doctor/$doctor->profile_image";
    }
    if($is_echo){
        echo $profile_image;
    }
    return $profile_image;
}
?>
@extends('v2/structor/main',['title'=> 'Bác sĩ chi tiết - '.$doctor->doctor_name, 'description' => $doctor->doctor_description])
@section('content')
    <style>
        * {
            box-sizing: border-box
        }

        /* Style tab links */
        .tablink {
            font-weight: bold;
            background-color: #FFF;
            color: #4080ff;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            font-size: 12px;
            width: 20%;
        }

        .patient-item {
            border-top: 1px solid grey;
            padding-top: 15px;
        }

        .patient-item  label {
            font-weight: bold;
        }
        .tablink:hover {
            background-color: #ECEFF1;
        }

        .tablink:focus {
            outline: none;
        }

        /* Style the tab content (and add height:100% for full page content) */
        .tabcontent {
            color: #424242;
            display: none;
            padding: 0px 0;
            padding-top: 0;
            padding-bottom: 12px;
        }

        .tabcontent div {
            margin-bottom: 12px;
            color: #424242;
        }

        .tabcontent div img {
            margin: 0 auto;
        }

        .tabcontent div ul li {
            color: #424242;
        }

        .tabcontent h3 {
            font-weight: bold;
        }
    </style>
    <style>
        .pre-img-views {
            margin: auto;
            padding: 0px;
        }

        .pre-img-views .img-group {
            background-color: #dedede;
        }

        .pre-img-views .img-group .img-item {
            float: left;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            margin: 0;
        }

        .pre-img-views .img-group .img-item-more {
            opacity: 0.7;
            position: relative;
            cursor: pointer;
        }

        .pre-img-views .img-group .img-item-more .item-more {
            text-align: center;
            font-size: 100px;
            margin: 0;
            position: absolute;
            width: 100%;
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .pre-img-views .img-group .img-item img {
            display: block;
            position: absolute;
            left: 50%;
            top: 50%;

            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .pre-img-views .img-group .img-item .scale-height {
            height: auto;
            width: 100%;
        }

        .pre-img-views .img-group .img-item .scale-width {
            height: 100%;
            width: auto;
        }

        #previewImageCarousel .item img {
            margin: auto;
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
    </style>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".btn-scroll-top").on('click', function (event) {
                let data_id = $(this).attr("data-id");
                let scrolltop = $(data_id).offset().top - 90;
                $(window).scrollTop(scrolltop);
            });
        });
    </script>

    <div class="container">
        <div class="row" id="top">
            <div class="link bi-background col-sm-12">
                <div class="nav">
                    <ul>
{{--                        <li><a href="/">Trang chủ</a></li>--}}
                        {{--<li>&nbsp;>&nbsp;</li>--}}
                        {{--<li><a href="">{{$doctor->doctor_name}}</a></li>--}}
                    </ul>

                </div>
                <h1 style="margin-bottom: 0;color: #e84f5e;font-size: 30px;">
                    {{$doctor->doctor_name}}
                    <span class="verified-badge-new">
                        <i class="far fa-check-circle"></i><em>Chính thức</em>
                    </span>
                </h1>
            </div>
        </div><!-- #top -->
        <div class="row">
        <div id="asidex" class="col-sm-12 col-lg-4 text-center">
            <div style="font-size: 1.5em;text-align: center; font-weight: bold;color: #E84F5E;padding-top: 35px;">
                TDOCTOR: {{$doctor->doctor_id}}
                <?php
                $is_current_user_page = false;
                $refer_id = 0;
                $currentUser = Session::get('user');
                if($currentUser){
                    if ( $currentUser && $currentUser->isDoctor() ) {
                        $refer_id = $doctor->user_id;
                    }
                    if($currentUser->user_id == $refer_id){
                        $is_current_user_page = true;
                    }
                } ?>
            </div>
            <div class="" style="">
                <a href="#" class="avatar-doctor" style=" margin: 0 auto; background-image: url('<?php
                get_current_profile_image($doctor);
//                 if (strlen(strstr("$doctor->profile_image", "https://dwbxi9io9o7ce.cloudfront.net")) > 0) {
//                     echo "$doctor->profile_image";
//                 } else {
//                     echo "/public/images/doctor/$doctor->profile_image";
//                 }

                ?>')"></a>
            </div>
            <?php
            $numberQA = 0; 
            foreach ($doctor->activity as $at) {
                $numberQA++;
            }
            ?>
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
            </style>
            <div>
                <div class="star-rating">
                    <div class="back-stars">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>

                        <div class="front-stars" style="width: {{($ratingAvg / 5) * 100}}%;">
                            <i class="fa fa-star" aria-hidden="true" style="color: #FFBC0B;"></i>
                            <i class="fa fa-star" aria-hidden="true" style="color: #FFBC0B;"></i>
                            <i class="fa fa-star" aria-hidden="true" style="color: #FFBC0B;"></i>
                            <i class="fa fa-star" aria-hidden="true" style="color: #FFBC0B;"></i>
                            <i class="fa fa-star" aria-hidden="true" style="color: #FFBC0B;"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <span>Số nhận xét: {{count($comment)}}</span>
            </div>
            <div>
                <span>Số câu trả lời: {{$so_cau_tra_loi}}</span>
            </div>
                <div class="call-to-action">
                    <?php
                    $chat_to_id = $doctor->user_id; 
                    if($doctor->supporter_id != 0){
                        $chat_to_id = $doctor->supporter_id;
                    }
                    ?>
                    @if(true || Session::get('user')==null) 
                    <a href="/hoibacsi/datcauhoi?ref_type=2&ref_code={{$doctor->doctor_id}}&speciality_id={{$speciality_id}}" class="dk"> Hỏi miễn phí</a>
                    <a href="/henlichkham?u={{$doctor->user_id}}&ref_type=2&ref_code={{$doctor->doctor_id}}&speciality_id={{$speciality_id}}" class="dk"> Đặt khám riêng tư</a>
                    @else
                    <a href="/hoibacsi/datcauhoi" class="dk"> Hỏi miễn phí</a>
                    <a href="/dat-lich-hen?u={{$doctor->user_id}}&doctor_id={{$doctor->doctor_id}}&speciality_id={{$speciality_id}}" class="dk"> Đặt khám riêng tư</a>
                    @endif
                    <br/>
                    <br/>
                    @if(!Session::get('user')==null)
                    <a href="javascript:void(0);" class="btn-chat-vs-bs btn-rounded btn-ok click-to-start-chat" data-my-name="{{Session::get('user')->fullname}}" data-client-name="{{$doctor->doctor_name}}" data-chat-to="room_{{$chat_to_id}}" data-chat-room="room_{{$chat_to_id}}_{{Session::get('user')->user_id}}"><i class="fa fa-" aria-hidden="true"></i> Chat với {{$doctor->doctor_name}}</a>
                    @else
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal-tai-app" class="btn-chat-vs-bs btn-rounded btn-ok btn-login-to-chatx" data-url="/frameLogin?v={{time()}}&rt=2&rc={{$doctor->doctor_id}}"><i class="fa fa-" aria-hidden="true"></i> Chat với {{$doctor->doctor_name}}</a>
                    @endif
                </div>
            <div class="achat hidden">
                <a id="chatdt" href="/chat" style="font-size: 1.5em;">Chat
                    Với {{$doctor->doctor_name}}</a>
            </div>
            <br/>
            @if(!Session::get('user')==null)
            <a href="javascript:void(0);" class="dk click-to-start-chat" data-my-name="{{Session::get('user')->fullname}}" data-client-name="Hỗ trợ viên" data-chat-to="room_464103899" data-chat-room="room_464103899_{{Session::get('user')->user_id}}">
                <span style=" font-weight: bold; color: #fff; font-size: 1.5em;">Chat ngay với hỗ trợ viên</span>
            </a>
            @else
            <a href="javascript:void(0);" class="dk btn-login-to-chat" data-url="/frameLogin?v={{time()}}&rt=2&rc={{$doctor->doctor_id}}">
                <span style=" font-weight: bold; color: #fff; font-size: 1.5em;"> Chat ngay với hỗ trợ viên</span>
            </a>
            @endif
            @if(false)
            <div style="margin-top: 12px; color: red; text-align: left;"><a style="font-size: 1em; font-weight: bold"
                                                                            href="#">Hot line / Zalo hỗ trợ kết nối với
                    <br> <span style=" font-weight: bold; color: red; font-size: 1.5em;">{{$doctor->doctor_name}}</span></a>
            </div>
            <div style="color: red; text-align: left;">
                <a style="font-size: 1em; font-weight: bold" href="#">
                    <span style=" font-weight: bold; color: red; font-size: 1.5em;">                        
                        Liên hệ: @if($doctor_user != null && $doctor_user->show_phone == 1)
                            0{{$doctor_user->phone}}@else 0393 167 234 @endif
                        
                        </span>
                    </a>
            </div>
            @endif

            <div class="apps clr middle-item">
                <a href="https://itunes.apple.com/us/app/tdoctor/id1443310734?ls=1&amp;mt=8"><img
                            src="/public/v2/img/appstore.svg" alt="Tải app Tdoctor cho bệnh nhân"></a>
                <a href="https://play.google.com/store/apps/details?id=com.app.khambenh.bacsiviet"><img
                            src="/public/v2/img/playstore.svg" alt="Tải app Tdoctor cho bệnh nhân"></a>
                
            </div>
            <div class="qr-code" style="text-align: center">
                <img class="layzy-load" style="text-align: center; display:inline-block;" src="https://chart.googleapis.com/chart?chs=350x350&cht=qr&choe=UTF-8&chl={{route('goto', $doctor->doctor_id.'-2')}}" alt="QrCode {{$doctor->doctor_name}}" />
            </div>
        </div><!--Aside-->
        <div class="col-sm-12 col-lg-8" style="padding-right: 0">
            <div>
                <ul class="clinic-tab-wrapper">
                    <li class="tablink" onclick="openPage('notify_div_id', this, '#ECEFF1')">THÔNG BÁO</li>
                    <li class="tablink" onclick="openPage('clinical_achievements_div_id', this, '#ECEFF1')">LÂM SÀNG
                    </li>
                    <li class="tablink" onclick="openPage('about_div_id', this, '#ECEFF1')" id="defaultOpen">THÔNG TIN
                    </li>
                    <li class="tablink" onclick="openPage('question_anwser_div_id', this, '#ECEFF1')">HỎI ĐÁP</li>
                    <?php if(false && $is_current_user_page){ ?>
                    <li class="tablink" onclick="openPage('patient_div_id', this, '#ECEFF1')">BỆNH NHÂN</li>
                    <?php } ?>
                </ul>
                <div id="notify_div_id" class="tabcontent">
                    @if(isset($notify))
                        <div class="ck1">{{$notify->title}}</div>
                        @if (checkRemoteFile("https://tdoctor.vn/public/images/notifys/notifys_".$notify->notify_id))
                            <div style="width: 50%; float: left"><img alt="Đã chứng thực" style="cursor: pointer" onclick="img_box(this)"
                                                                      src="/public/images/notifys/notifys_{{$notify->notify_id}}"/>
                            </div>
                        @endif
                        <div style="clear: both"></div>
                        <div class="ck1">{!! $notify->content !!}</div>
                    @else
                        <div class="ck1">Không có thông báo nào từ bác sĩ</div>
                    @endif
                </div>
                <script>
                    async function previewImage(
                        selector = null,
                        imageUrls = null,
                        maxNumberRow = 2,
                        maxNumberCellOfRow = 2,
                        heightCellImage = 360,
                        widthPreview = '100%',
                        onClickIndex = null,
                        OnClickLoadMore = null) {

                        // Check null params
                        if ((selector === null)
                            || (imageUrls === null)) {
                            return false;
                        }
                        $('.carousel-control-prev').click(function () {
                            $('#previewImageCarousel').carousel('prev');
                        });

                        $('.carousel-control-next').click(function () {
                            $('#previewImageCarousel').carousel('next');
                        });

                        $(selector).on('click', '.pre-img-views .img-group .img-item', function (event) {
                            var idxTargetImage = $(this).attr('idxurl');
                            let previewIndicatorsElement = $('#previewImageCarousel').find('.carousel-indicators');
                            $(previewIndicatorsElement).html('');
                            let previewInnerElement = $('#previewImageCarousel').find('.carousel-inner');
                            $(previewInnerElement).html('');

                            for (var idxImageUrl = 0; idxImageUrl < imageUrls.length; idxImageUrl++) {
                                let imageUrl = imageUrls[idxImageUrl];
                                var htmlActive = 'active'
                                if (idxImageUrl == idxTargetImage) {
                                    $(previewIndicatorsElement).append('<li data-target="#previewImageCarousel" data-slide-to="' + idxImageUrl + '" class="active"></li>')
                                    $(previewInnerElement).append('<div class="carousel-item active"><img height="640" src="' + imageUrl + '" alt="Image ' + idxImageUrl + '"></div>');
                                } else {
                                    $(previewIndicatorsElement).append('<li data-target="#previewImageCarousel" data-slide-to="' + idxImageUrl + '"></li>')
                                    $(previewInnerElement).append('<div class="carousel-item"><img src="' + imageUrl + '" alt="Image ' + idxImageUrl + '"></div>');
                                }
                            }

                            $('#modalPreviewImage').modal('show');
                            return false;
                        })

                        // Image Preview Class
                        let preClass = 'pre-img-views';
                        // Set image preview class
                        let htmlImagePreviewClass = '<div class="' + preClass + '"></div>';
                        $(selector).html(htmlImagePreviewClass);
                        // Object seletor group
                        var preClassElement = $(selector).find("." + preClass);
                        // Set css
                        $(preClassElement).css('width', widthPreview);

                        // Group class name
                        let classGroupName = 'img-group';

                        // Set content html group
                        let htmlGroup = '<div class="' + classGroupName + '"></div>';
                        $(preClassElement).html(htmlGroup);

                        let htmlClearBoth = '<div style="margin:0px; clear: both;"></div>';

                        // Object seletor group
                        var groupElement = $(preClassElement).children().last();
                        for (var idxImageUrl = 0; idxImageUrl < imageUrls.length; idxImageUrl++) {
                            let lastIndexPreview = maxNumberRow * maxNumberCellOfRow;
                            let imageUrl = imageUrls[idxImageUrl];

                            if (idxImageUrl + 1 > lastIndexPreview) {
                                let htmlLoadMore = '<div class="item-more">+' + (imageUrls.length - lastIndexPreview) + '</div>';
                                let imgItemElement = $(groupElement).children().last();
                                $(imgItemElement).addClass('img-item-more');
                                $(imgItemElement).append(htmlLoadMore)
                                break;
                            }

                            let htmlImgItem = '<div class="img-item" idxUrl=' + idxImageUrl + '></div>'
                            $(groupElement).append(htmlImgItem);
                            let imgItemElement = $(groupElement).children().last();

                            var styleImgItem = {
                                width: '100%',
                                height: heightCellImage - 40
                            }
                            styleImgItem.width = 'calc(100% / ' + maxNumberCellOfRow + ')';
                            $(imgItemElement).css(styleImgItem);

                            let htmlImg = '<img alt="' + imageUrl + '" src="' + imageUrl + '"/>';
                            $(imgItemElement).html(htmlImg);
                            let imgElement = $(imgItemElement).children().last();

                            // Scale
                            var cellWidth = $('.tabcontent').width() - 40;
                            let cellHeight = $(imgItemElement).height() - 40;

                            let sizeImage = await getImageSize(imageUrl);
                            if (sizeImage == null) {
                                continue;
                            }
                            if ((cellWidth * sizeImage.height) / sizeImage.width > cellHeight) {
                                $(imgElement).addClass('scale-height');
                            } else {
                                $(imgElement).addClass('scale-width');
                            }
                        }
                        $(groupElement).append(htmlClearBoth);
                    }

                    function getImageSize(url) {
                        return new Promise((resolve, reject) => {
                            const img = new Image();
                            img.src = url;
                            img.onload = function () {
                                resolve({width: img.width, height: img.height});
                            };
                            img.onerror = function () {
                                reject(null);
                            };
                        });
                    }
                </script>
                <div id="clinical_achievements_div_id" class="tabcontent">
                    @if(isset($clinicalAchievements))
                        @foreach($clinicalAchievements as $idxClinicalAchievement => $clinicalAchievement)
                            <div class="ck1">{{$clinicalAchievement->title}}</div>
                            <div class="">{{$clinicalAchievement->created_at}}</div>

                            <div class="preview-image-clinical-achievement-{{$idxClinicalAchievement}}"></div>
                            <script>
                                $(document).ready(function () {
                                    var imageUrl_{{$idxClinicalAchievement}} = {!! json_encode($clinicalAchievement->images) !!};
                                    var imageUrls = [];
                                    for (var idxImage = 0; idxImage < imageUrl_{{$idxClinicalAchievement}}.length; idxImage++) {
                                        imageUrls.push("https://tdoctor.vn/public/images/clinical_achievements/" + imageUrl_{{$idxClinicalAchievement}}[idxImage].name);
                                    }
                                    previewImage('.preview-image-clinical-achievement-{{$idxClinicalAchievement}}', imageUrls);
                                })
                            </script>
                            {{--                            @foreach($clinicalAchievement->images as $image)--}}
                            {{--                                @if (checkRemoteFile("https://tdoctor.vn/public/images/clinical_achievements/".$image->name))--}}
                            {{--                                    <div style="width: 50%; float: left">--}}
                            {{--                                        <div style="height: 2px; background-color: #90A4AE"></div>--}}
                            {{--                                        <img alt="{{$image->name}}" style="cursor: pointer;" onclick="img_box(this)" src="/public/images/clinical_achievements/{{$image->name}}"/>--}}
                            {{--                                    </div>--}}
                            {{--                                @endif--}}
                            {{--                            @endforeach--}}
                            {{--                            <div style="clear: both"></div>--}}
                            <div class="ck1">{!!$clinicalAchievement->content!!}</div>
                        @endforeach
                    @else
                        <div class="ck1">Bác sĩ chưa cập nhật thành tích lâm sàng</div>
                    @endif
                </div>

                <div id="about_div_id" class="tabcontent">
                    @if($doctor->doctor_fullinfo == NULL || $doctor->doctor_fullinfo == '')
                    <div class="ck1">{{$doctor->doctor_description}}</div>
                    <h3>Chuyên khoa</h3>
                    <div class="ck1">
                        @if($doctor->specialities!=null)                            
                            <ul>
                                @foreach($doctor->specialities as $spec)
                                @if(true)
                                @if(!is_object($spec->speciality))
                                <li>
                                    <a style="" href="/danh-sach/bac-si/?specialities={{$spec->speciality['specialty_url']}}">{{$spec->speciality['speciality_name']}}</a>
                                </li>
                                @else
                                <li>
                                    <a style="" href="/danh-sach/bac-si/?specialities={{$spec->speciality->specialty_url}}">{{$spec->speciality->speciality_name}}</a>
                                </li>
                                @endif
                                @endif
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <h3>Dịch vụ</h3>
                    <div class="ck1">
                        @if($doctor->services!=null)
                            @foreach($doctor->services as $ser)
                                <ul>
                                    <li><a style=""
                                           href="/danh-sach/bac-si/?services={{$ser->service}}">{{$ser->service['service_name']}}</a>
                                    </li>
                                </ul>
                            @endforeach
                        @endif
                    </div>
                    <h3>Nơi công tác</h3>
                    <div class="ck1">{!!$doctor->doctor_clinic!!}</div>
                    <h3>Kinh nghiệm</h3>
                    <div class="ck1">{!!$doctor->experience!!}</div>
                    <h3>Quá trình đào tạo</h3>
                    <div class="ck1">{!!$doctor->training!!}</div>
                    <h3>Giá tư vấn</h3>
                    <div class="ck1">
                        @if($doctor->price!=null)
                            {{number_format($doctor->price, 0, '', ',') }}
                        @else
                            1000
                        @endif
                        Vnđ/Phút
                    </div>


                    @else                        
                        {!!\App\Helpers\UploadFileHelper::correctPath($doctor->doctor_fullinfo)!!}
                    @endif

                </div>

                <div id="question_anwser_div_id" class="tabcontent">
                    <h3></h3>
                    <div class="ck1">
                        <?php
                        \Carbon\Carbon::setLocale('vi')
                        ?>
                        <div>
                            <div>
                                @include('v2.view.danhsach_cauhoi')
                                @if(count($questions) == 0)
                                    <div class="ck1">Bạn hãy là người đầu tiên hỏi bác sĩ!</div>
                                @endif
                                <?php $qss = $doctor->questions();
                                // var_dump($questions);
                                if(false){
                                ?>

                                @if(count($qss) == 0)
                                    <div class="ck1">Bạn hãy là người đầu tiên hỏi bác sĩ!</div>
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
                                            @if (checkRemoteFile("https://tdoctor.vn/public/images/".$qs->question_id))
                                                <div><img alt="{{$qs->question_content}}" src="/public/images/{{$qs->question_id}}"/></div>
                                            @endif
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
                <?php if(false && $is_current_user_page){ ?>
                <div id="patient_div_id" class="tabcontent">
                    <h3></h3>
                    <div class="ck1">
                        <?php
                            $patients = \App\Users::where('refer_id', $doctor->doctor_id)->get();
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
            <?php } ?>
            </div>

            <div class="subsection" id="nhan-xet">
                <h2 id="nhan-xet"><i class="fa fa-comment"></i> Nhận xét về {{$doctor->doctor_name}}</h2>
                <div class="comment-form" style="float: left">
                    <form method="POST" action="/comment_doctor/{{$doctor->doctor_id}}">
                        <input name="_token" value="{{csrf_token()}}" type="hidden">
                        <p style="font-size: 15px;">
                            Bạn đã sử dụng dịch vụ của {{$doctor->doctor_name}}? Hãy chia sẻ cảm nhận của bạn với
                            cộng đồng.
                        </p>
                        <p style="font-size: 15px;">
                            Nếu bạn có câu hỏi về sức khỏe và chuyên môn, vui lòng chuyển sang trang <a
                                    style="color:#2B96CC" href="../../hoibacsi">Hỏi Bác sĩ</a> để được tư vấn
                            miễn phí.
                        </p>

                        <div class="form-row">
                            <div class="form-field">
                                <label style="font-weight: bold;">
                                    Bình luận:
                                </label>
                                <div class="form-field-input">
                                    @if(Session::get('user'))
                                    <textarea class="btn-req-loginxx" name="comment" placeholder="Đánh giá của bạn..."
                                              required=""></textarea>
                                              @else
                                    <textarea class="btn-req-login" name="comment" placeholder="Đánh giá của bạn..."
                                              required=""></textarea>
                                              @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-row indented">
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
                        </div>
                        <div class="form-row">
                            <ul class="comments">
                                @if(isset($comment))
                                    @foreach($comment as $c)
                                        <li class="comment ">

                                            <?php $user = App\Users::find($c['user_id']); ?>


                                            <div class="comment-body">
                                                <h4>
                                    <span>

                                           {{$user['fullname']}}

                                    </span>
                                                    @if($c->feedback_ > 0)
                                                        <span class="star-ratings" data-score="{{$c->feedback_ * 2}}0">
                                    <span class="front" style="width: 100%;"></span></span>
                                                    @endif
                                                </h4>


                                                <div class="comment-content">
                                                    <p>{{$c->content}}.</p>
                                                </div>


                                                <p class="date">{{$c['created_at']}}</p>
                                                <!--
                                                <div class="comment-actions">

                                                        <a class=" open-reply-comment " name="place-comment" data-comment-id="90" data-place-id="32209" data-email="xadoaxongtusat4@gmail.com" href="/dang-ky/?type=place&amp;place_name=Phòng khám Sản phụ khoa - Bác sĩ Đỗ Thị Ngọc Lan&amp;place_add=26 ngõ 30&amp;source=register_place&amp;next=/phong-kham-san-phu-khoa-bac-si-do-thi-ngoc-lan-32209/san-phu-khoa">
                                                            Trả lời
                                                        </a>


                                                    <strong>
                                                        Nhận xét này có hữu ích với bạn không?
                                                        <span class="options">
                                                            <a href="#" class="comment-voting useful" data-comment-id="90" data-comment-type="place" title="Có">
                                                                <i class="fa fa-check fa-fw" aria-hidden="true"></i>
                                                                <i class="fa fa-spinner fa-pulse fa-fw loader"></i>
                                                                <span>12</span>
                                                            </a>
                                                            <a href="#" class="comment-voting not-useful" data-comment-id="90" data-comment-type="place" title="Không">
                                                                <i class="fa fa-times fa-fw" aria-hidden="true"></i>
                                                                <i class="fa fa-spinner fa-pulse fa-fw loader"></i>
                                                                <span>3</span>
                                                            </a>
                                                        </span>
                                                    </strong>
                                                </div>
                                                 -->
                                            </div>
                                        </li>
                                    @endforeach
                                @endif


                            </ul>
                        </div>
                        <div class="button-row">
                            <input name="professional" value="{{$doctor->doctor_id}}" type="hidden">
                            {{--                            <button type="submit" class="btn btn-primary">Gửi đánh giá</button>--}}
                            @if(Session::get('user')!=null)
                                <button type="submit" class="btn btn-primary">Gửi</button>
                            @endif
                        </div>
                    </form>
                    <div class="form-success">
                        <h4><i></i>
                            @if(session('thongbao'))
                                {{session('thongbao')}}
                            @endif</h4>

                    </div>
                    <div class="row">

                                    <ins class="adsbygoogle col-sm-12"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-7940791875056931"
     data-ad-slot="4579156371"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                                </div>

                </div>

            </div>
        </div>
        </div>


    </div>

    {{--    <!-- Modal -->--}}
    {{--    <div class="modal fade" id="modalPreviewImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
    {{--        <div class="modal-dialog modal-dialog-centered" role="document">--}}
    {{--            <div class="modal-content">--}}
    {{--                <div class="modal-header">--}}
    {{--                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>--}}
    {{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
    {{--                        <span aria-hidden="true">&times;</span>--}}
    {{--                    </button>--}}
    {{--                </div>--}}
    {{--                <div class="modal-body">--}}
    {{--                    ...--}}
    {{--                </div>--}}
    {{--                <div class="modal-footer">--}}
    {{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
    {{--                    <button type="button" class="btn btn-primary">Save changes</button>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <div id="modalPreviewImage" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">

            <div class="modal-content">
                <button style="position: absolute;right: 0px;display: block;z-index: 1;" type="button" class="close"
                        data-dismiss="modal" aria-label="Close">
                    <span style="font-size: 40px;float: right;color: white;padding: 0px 10px;" aria-hidden="true">&times;</span>
                </button>
                <div id="previewImageCarousel" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                    </div>

                    <!-- Left and right controls -->
                    <div class="carousel-control-prev" href="#previewImageCarousel" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </div>
                    <div class="carousel-control-next" href="#previewImageCarousel" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
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
        <h4 class="modal-title">Bạn tải App này để chat và gọi trực tiếp với {{$doctor->doctor_name}} nha</h4>
      </div>
      <div class="modal-body">
        <h4 class="modal-title"style="
            font-size: 22px;
            text-align: center;
        ">Bạn tải App này để chat và gọi trực tiếp với {{$doctor->doctor_name}} nha</h4>
        <!-- <p>Bạn tải App này để chat và gọi trực tiếp với bác sĩ {{$doctor->doctor_name}} nha</p> -->
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

    <script>
        function openPage(pageName, elmnt, color) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.backgroundColor = "";
            }
            document.getElementById(pageName).style.display = "block";
            // document.getElementById(pageName).style.backgroundColor = color;
            elmnt.style.backgroundColor = color;
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>
@endsection
