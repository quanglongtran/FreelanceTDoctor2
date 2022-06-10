@extends('patient/structor/main',['title'=> 'Hỏi đáp của tôi'])
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
        });

        @if($is_hoi_dap_chung)
        jQuery(document).ready(function(){
            if($('.bi-question-item-row').length == 0 && !window.location.href.includes('hoidapchung')){
                $('.btn-click-hoi-dap-chung').click();
                window.location.href = '/hoidapchung';
            }
        })
        @endif
    </script>
    <style type="text/css">
        #forum-landing-bottom article {
    margin: 0;
    border-radius: 0;
    border: 0 none;
    border-bottom: 1px solid #eee;
}
.buthbs {
    margin-right: 10px;
}
@media screen and (max-width: 767px){
    a.buthbs i {
    display: none;
}

.buthbs {
    padding: 8px;
}
}
    </style>

    <?php
// var_dump($patient);
    ?>
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
{{--                    <a style="right:unset" class="buthbs" href="/henlichkham" title="Đặt lịch hẹn bác sĩ">--}}
{{--                        <i class="fa fa-calendar" aria-hidden="true"></i> Đặt lịch hẹn bác sĩ--}}
{{--                    </a>--}}
{{--                </div>--}}

                <div style="min-height: 40px">
                    <a style="right:unset" class="buthbs" href="/hoibacsi/datcauhoi" title="Đặt câu hỏi cho bác sĩ, hoàn toàn miễn phí">
                        <i class="fa fa-commenting" aria-hidden="true"></i> Đặt câu hỏi miễn phí
                    </a>
                    @if($is_hoi_dap_chung)
                    <span style="width: 20px;"></span>
                    <a style="right:unset;" class="buthbs btn-click-hoi-dap-chung" href="/hoidapchung" title="Đặt câu hỏi cho bác sĩ, hoàn toàn miễn phí">
                        <i class="fa fa-question" aria-hidden="true"></i>Hỏi đáp chung
                    </a>
                    @endif
                </div>
                <div class="form-info">
                    <select name="specialities" id="speciality_id" required="" style="border: 1px solid #ced4da;padding: 10px;border-radius: 5px;">
                        <option value="">Chọn chuyên khoa</option>
                        @if(isset($speciality))
                            @foreach($speciality as $sp)
                                <option @if($speciality_id == $sp->speciality_id) selected @endif value="{{$sp->speciality_id}}">{{$sp->speciality_name}}</option>
                            @endforeach
                        @endif
                    </select>
                    <select id="province_name" required="" style="border: 1px solid #ced4da;padding: 10px;border-radius: 5px;" name="province" id="province">
                        <?php $province = App\Province::all();
                        $select = request()->input('province');?>
                        <option value="">Cả nước</option>

                        @foreach($province as $pr)
                            <option @if($province_name == $pr->name) selected @endif value="{{$pr->name}}">{{$pr->name}}</option>
                        @endforeach

                    </select>
                    <script>
                        <?php
                        $hoibacsi_url = 'hoibacsi';
                        if($is_hoi_dap_chung){
                            $hoibacsi_url = 'hoidapchung';
                        }
                        ?>
                        function onChangeProvinceAndSpec() {
                            var province_name = $('#province_name').val();
                            var speciality_id = $('#speciality_id').val();
                            window.location = '/<?php echo $hoibacsi_url; ?>?speciality_id=' + speciality_id + "&province_name=" + province_name;
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
            <div class="hbsv-cntl" style="width: 100%;margin-bottom: 5px;border: 0 none;margin-top: -28px;">
                <div id="forum-landing-bottom">
                    <div class="header">
                        <h3 style="font-weight: bold;padding: 0;">Câu hỏi của bạn và câu trả lời của bác sĩ sẽ được hiển thị tại đây<br/>
                            Bạn hãy ấn nút "Đặt câu hỏi miễn phí" để bắt đầu gửi câu hỏi nhé!
                        </h3>
                    </div>
                    <?php
                    $questions = $question;
                    ?>
                    @include('v2.view.danhsach_cauhoi')
                    <div style="padding-left: 25%;" class="view-more">
                        {!!$question->links()!!}
                    </div>
                </div>
            </div><!--.-->
            <aside class="hbsv-cntr" style="display: none;">
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

            </aside>
        </div>
    </div>
@endsection