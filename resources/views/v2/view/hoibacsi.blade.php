@extends('v2/structor/main',['title'=> 'Hỏi đáp bác sĩ miễn phí', 'meta_keywords' => 'hỏi bác sĩ, bác sĩ trả lời, câu hỏi sức khỏe, bác sĩ tư vấn, mục hỏi đáp sức khỏe, mục tư vấn sức khỏe, mục tư vấn bác sĩ, hỏi đáp bác sĩ, hỏi bác sĩ sản(da liễu, vv)'])
@section('content')
    <script type="text/javascript">
        $(document).ready(function () {
            checkResize();
            $(window).resize(function (e) {
                checkResize();
            });

            function checkResize() {
                let width = $(document).width();
                if (width > 768) {
                    $('.sechbs2').off('click');
                    $('.sechbs2').find('.ud').show();
                }
                else {
                    $('.sechbs2').on('click', function () {
                        let data_isshow = $(this).attr('data-isshow');
                        if (data_isshow == 0) {
                            $(this).find('#up').show();
                            $(this).find('#down').hide();
                            $(this).find('.ud').show();
                            $(this).attr('data-isshow', '1');
                        }
                        else {
                            $(this).find('#up').hide();
                            $(this).find('#down').show();
                            $(this).find('.ud').hide();
                            $(this).attr('data-isshow', '0');
                        }
                    });
                }
            }
            $('.xemthem-button').click(function(){
                $(this).closest('.box-content-to-show-more').addClass('active')  
            })
        });
    </script>
    <style type="text/css">
#forum-landing-bottom article {
    margin: 0;
    border-radius: 0;
    border: none;
    border-bottom: 1px solid #eee;
}
.post-meta-dt1 a {
    font-size: 18px;
}
.body1.row {
    margin-left: 0;
}
</style>
    <div class="container">
        <div id="top">

            <div class="link">
{{--                <div class="nav">--}}
{{--                    <ul>--}}
{{--                        <li><a href="/">Trang chủ</a></li>--}}
{{--                        <li>&nbsp;>&nbsp;</li>--}}
{{--                        <li><a href="/hoibacsi">Hỏi bác sĩ</a></li>--}}
{{--                    </ul>--}}

{{--                </div>--}}
{{--                <h1 style="font-size: 18px">Chuyên mục Hỏi bác sĩ</h1>--}}

{{--                <div style="height: 40px; margin-top: 12px">--}}
{{--                    <a style="right:unset" class="buthbs" href="https://tdoctor.vn/henlichkham" title="Đặt lịch hẹn bác sĩ">--}}
{{--                        <i class="fa fa-calendar" aria-hidden="true"></i> Đặt lịch hẹn bác sĩ--}}
{{--                    </a>--}}
{{--                </div>--}}

                <div style="height: 40px">
                    <a style="right:unset" class="buthbs" href="/hoibacsi/datcauhoi" title="Đặt câu hỏi cho bác sĩ, hoàn toàn miễn phí">
                        <i class="fa fa-commenting" aria-hidden="true"></i> Đặt câu hỏi miễn phí
                    </a>
                </div>

                <div class="form-info">
                    <select name="specialities" id="speciality_id" required="" style="border: 1px solid #ced4da;padding: 10px;border-radius: 5px;">
                        <option value="tat-ca-chuyen-khoa">Chọn chuyên khoa</option>
                        @if(isset($speciality))
                            @foreach($speciality as $sp)
                                <!-- <option @if($speciality_id == $sp->speciality_id) selected @endif value="{{$sp->speciality_id}}">{{$sp->speciality_name}}</option> -->
                                <option @if($speciality_id == $sp->speciality_id) selected @endif value="{{$sp->specialty_url}}">{{$sp->speciality_name}}</option>
                            @endforeach
                        @endif
                    </select>
                    <select id="province_name" required="" style="border: 1px solid #ced4da;padding: 10px;border-radius: 5px;" name="province" id="province">
                        <?php $province = App\Province::all();
                        $select = request()->input('province');?>
                        <option value="ca-nuoc">Cả nước</option>

                        @foreach($province as $pr)
                            <option @if($province_name == $pr->name) selected @endif value="{{$pr->name}}">{{$pr->name}}</option>
                        @endforeach

                    </select>
                    <script>
                        function onChangeProvinceAndSpec() {
                            var province_name = $('#province_name').val();
                            var speciality_id = $('#speciality_id').val();
                            // window.location = 'hoibacsi?speciality_id=' + speciality_id + "&province_name=" + province_name;
                            window.location = '/hoibacsi/' + speciality_id + "/" + province_name;
                        }

                        $('#speciality_id').on('change', function (e) {
                            onChangeProvinceAndSpec();
                        });

                        $('#province_name').on('change', function (e) {
                            onChangeProvinceAndSpec();
                        });
                    </script>
                </div>
            </div>
        </div><!-- #top -->
        <br>
        <div class="hbsv-cnt">
            <div class="hbsv-cntl fix-no-border" style="border: none;margin-top: -40px;">
                <div id="forum-landing-bottom">
                    <div class="header">
                        <h3 style="font-weight: bold;">Các câu hỏi mới nhất</h3>
                    </div>
                    <?php
                    $questions = $question;
                    ?>
                    @include('v2.view.danhsach_cauhoi')
                    @if(false)
                    @foreach($question as $qs)
                        <article>
                            <div class="question">
                                <h3 style="padding: 0;">
                                    <a href="/hoibacsi/{{$qs->question_url}}-{{$qs->question_id}}">{{$qs->question_title}}</a>
                                    <a href="/hoibacsi/{{$qs->question_url}}-{{$qs->question_id}}" title="" style="float: right; color: #E84F5Ew">Trả lời</a>
                                </h3>

                                <div class="post-meta-data">
                                    <div>
                                        <span class="user" style="/* float: left; */font-weight: 900;display: inline-block;">
                                            <?php $user = App\Users::where('user_id', $qs->user_id)->first(); ?>
                                            @if(isset($user) )
                                                @if(!Session::get('user')==null && $qs->user_id != null)
                                                <a href="javascript:void(0);" class="user click-to-start-chat" data-my-name="{{Session::get('user')->fullname}}" data-client-name="{{$qs->fullname}}" data-chat-to="room_{{$qs->user_id}}" data-chat-room="room_{{$qs->user_id}}_{{Session::get('user')->user_id}}">
                                                @else
                                                <a href="javascript:void(0);" class="user btn-login-to-chat" data-url="/frameLogin?v={{time()}}">
                                                @endif
                                                @if($user->fullname!=null)
                                                    {{$user->fullname}}
                                                @endif
                                                </a>
                                            @else
                                                Giấu tên
                                            @endif

                                        </span>
                                        <span>&ensp;
                                        @if(isset($qs->address))
                                            @if($qs->address != '')
                                                ({{$qs->address}})
                                            @endif
                                        @endif
                                        </span>
                                    </div>
                                <span class="time">
                                    {{date("d-m-Y H:i:s ", strtotime($qs->created_at))}}
                                </span>

                                    <?php $chuyenkhoa = App\Speciality::find($qs->speciality_id) ?>
                                    @if(isset($chuyenkhoa) && $chuyenkhoa)
                                        <span class="ckhbsx">
                                     Chuyên khoa:
                                    <a href="/chuyenkhoa/{{$chuyenkhoa->speciality_id}}" title="">
                                    {{$chuyenkhoa->speciality_name}}
                                    </a>
                                </span>
                                    @else
                                    @endif
                                </div>

                                <div class="body">
                                    <?php bi_get_content_readmore($qs->question_content); ?>
                                    {{--<div class="thank-count">--}}
                                    {{--<i class="fa fa-heart" style="color: #ff749c" aria-hidden="true"></i>--}}
                                    {{--<span>1</span>--}}
                                    {{--người cám ơn bài viết--}}
                                    {{--</div>--}}

                                </div>
                            </div>
                            <?php 
                            $traloi_array = App\Answer::where('question_id', $qs['question_id'])->get();
                            // var_dump($traloi);
                            if($traloi_array && count($traloi_array)){
                                ?>
                            <div class="answer">                          
                                <span>Được trả lời bởi</span>
                            </div>
                            <?php
                                foreach($traloi_array as $traloi){
                            ?>
                            @if(isset($traloi) && $traloi )
                                <div class="answer">
                                    <ul>
                                        @if($traloi->user!== null)
                                            @if($traloi->user->doctor!==null)
                                                <li>
                                                    <span class="image "
                                                          @if(!empty($traloi->user->doctor->profile_image)) style="background-image: url(/public/images/doctor/@if(strpos($traloi->user->doctor->profile_image,'http')===false)/@endif{{$traloi->user->doctor->profile_image}});" @endif></span>
                                                    <h4>
                                                        <a href="/danh-sach-bac-si-chi-tiet/{{$traloi->user->doctor->doctor_url}}-{{$traloi->user->doctor->doctor_id}}">
                                                            {{$traloi->user->doctor->doctor_name}}
                                                        </a>
                                                    </h4>
                                                    <p style="margin-top: -5px;">
                                                    @if(strlen($traloi->user->doctor->doctor_description)>200 && strpos($traloi->user->doctor->doctor_description, ' ', 200)!="")
                                                    
                                                        {!!substr( $traloi->user->doctor->doctor_description, 0, strpos($traloi->user->doctor->doctor_description, ' ', 200) )!!}
                                                    @else
                                                        {{$traloi->user->doctor->doctor_description}}
                                                    @endif
                                                    </p>
                                                </li>
                                            @else
                                                <li>
                                                    <span class="image " style="background-image: url('/chatapi/get-avatar/room_{{$traloi->user->user_id}}');"></span>
                                                    <h4>
                                                        @if(!Session::get('user')==null && $traloi->user->user_id != null)
                                                        <a href="javascript:void(0);" class="user click-to-start-chat" data-my-name="{{Session::get('user')->fullname}}" data-client-name="{{$traloi->user->fullname}}" data-chat-to="room_{{$traloi->user->user_id}}" data-chat-room="room_{{$traloi->user->user_id}}_{{Session::get('user')->user_id}}">
                                                        @else
                                                        <a href="javascript:void(0);" class="user btn-login-to-chat" data-url="/frameLogin?v={{time()}}">
                                                        @endif
                                                        @if($traloi->user->fullname!=null)
                                                            {{$traloi->user->fullname}}
                                                        @endif
                                                        </a>
                                                    </h4>
                                                </li>
                                            @endif
                                        @endif
                                    </ul>
                                    <?php bi_get_content_readmore($traloi->answer_content); ?>
                                </div>
                            @endif
                        <?php } } ?>
                        </article>
                    @endforeach
                    @endif
                    <div style="" class="view-more">
                        <div class="pagination">
                        {!!$question->appends(request()->query())->links()!!}

                    </div>
                    </div>
                    <ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-7940791875056931"
     data-ad-slot="2657901744"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                </div>
            </div><!--.-->
            <aside class="hbsv-cntr">
                <section class="sec-hbsv1">

                    <h3>Hỏi bác sĩ</h3>


                    <div class="collapsible-target" style="max-height: none;">

                        <p style="font-size: 18px">Chuyên mục Hỏi Bác sĩ mang đến cho người đọc dữ liệu hàng nghìn câu hỏi-đáp về sức khỏe đã được trả lời bởi các bác sĩ và chuyên gia uy tín. Bạn cũng có thể gửi câu hỏi mới để nhận được tư vấn trực tiếp của bác sĩ ngay tại đây, hoàn toàn miễn phí.</p>

                    </div>

                    <div class="collapse-trigger" style="display: none;">
                        <span class="trigger-expand"><i class="fa fa-chevron-down"></i></span>
                        <span class="trigger-collapse"><i class="fa fa-chevron-up"></i></span>
                    </div>
                </section>


                <section class="sec-hbsv2" data-isshow="0">
                    <h3>Câu hỏi theo chuyên khoa<i id="down" class="fa fa-chevron-down"></i>
                        <i id="up" class="fa fa-chevron-up"></i></h3>
                    <?php $speciality = App\Speciality::all();?>
                    <div class="dropct-hbsv">
                        @foreach($speciality as $spec)
                            <dt>
                                <a href="/chuyenkhoa/{{$spec->specialty_url}}-{{$spec->speciality_id}}" class="" title="{{$spec->specialty_url}}">
                                    <h5>{{$spec->speciality_name}}</h5>
                                    <span class="thread-count "></span>
                                </a>
                            </dt>

                        @endforeach
                    </div>


                </section>
                @if($speciality_id == 10)
                <div data="{{$speciality_id}}" class="banner-chuyen-khoa-ung-thu" style="margin: 10px 0;">
                    <a target="_blank" href="https://senoferum.vn/"><img src="/public/images/banner-bac-si-ung-thu.jpg"></a>
                </div>
                @endif
                <ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7940791875056931"
     data-ad-slot="1772921830"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>

            </aside>
        </div>
    </div>
@if(false)
    <div class="qc-hoibacsi hidden-mobile">
<!-- Bên trái https://tdoctor.vn/hoibacsi -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7940791875056931"
     data-ad-slot="6372951325"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
    </div>

    <div class="qc-hoibacsi right hidden-mobile">
<!-- Bên phải https://tdoctor.vn/hoibacsi -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7940791875056931"
     data-ad-slot="1598017235"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
    </div>
    @endif
@endsection