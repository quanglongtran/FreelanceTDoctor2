@extends('v2/view/en/en_main',['title'=> 'Ask Doctors'])
@section('en_content')
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
    </script>
    <div class="container">
        <div id="top">

            <div class="link">
                <div class="nav">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>&nbsp;>&nbsp;</li>
                        <li><a href="/en/hoibacsi">Ask Doctor</a></li>
                    </ul>

                </div>
                <h1 style="font-size: 18px">Category Ask a doctor</h1>

                <a class="buthbs" href="/en/hoibacsi/datcauhoi/" title="Ask your doctor questions, it's free">
                    <i class="fa fa-commenting" aria-hidden="true"></i> Ask questions for free
                </a>

            </div>
        </div><!-- #top -->
        <br><br><br>
        <div class="hbsv-cnt">
            <div class="hbsv-cntl">
                <div id="forum-landing-bottom">
                    <div class="header">
                        <h3 style="font-weight: bold;">The latest answers</h3>
                    </div>
                    @foreach($question as $qs)
                        <article>
                            <div class="question">
                                <h3 style="padding: 0;">
                                    <a href="/en/hoibacsi/{{$qs->question_url}}-{{$qs->question_id}}">{{$qs->question_title}}</a>
                                    <a href="/en/hoibacsi/{{$qs->question_url}}-{{$qs->question_id}}" title="" style="float: right;">Trả lời</a>
                                </h3>

                                <div class="post-meta-data">
                                    <div>
                                        <span class="user" style="float: left">
                                            <?php $user = App\Users::where('user_id', $qs->user_id)->first(); ?>

                                            @if(isset($user) )
                                                {{-- && count($user) >0 --}}
                                                {{$user->fullname}}
                                            @else
                                                Anonymous
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
                                        <span class="ckhbs">
                                    Specialist:
                                    <a href="/en/hoibacsi/danhsach/?speciality=san-phu" title="">
                                    {{$chuyenkhoa->speciality_name}}
                                    </a>
                                </span>
                                    @else
                                    @endif
                                </div>

                                <div class="body">
                                    <p>{{$qs->question_content}}</p>
                                    {{--<div class="thank-count">--}}
                                    {{--<i class="fa fa-heart" style="color: #ff749c" aria-hidden="true"></i>--}}
                                    {{--<span>1</span>--}}
                                    {{--người cám ơn bài viết--}}
                                    {{--</div>--}}

                                </div>
                            </div>
                            <?php $traloi = App\Answer::where('question_id', $qs['question_id'])->first(); ?>
                            @if(isset($traloi) && $traloi )
                                <div class="answer">
                                    <span>Answered by</span>
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

                                                    @if(strlen($traloi->user->doctor->doctor_description)>200 && strpos($traloi->user->doctor->doctor_description, ' ', 200)!="")

                                                        <span>{!!substr( $traloi->user->doctor->doctor_description, 0, strpos($traloi->user->doctor->doctor_description, ' ', 200) )!!}</span>
                                                    @else
                                                        {{$traloi->user->doctor->doctor_description}}
                                                    @endif
                                                </li>
                                            @endif
                                        @endif
                                    </ul>
                                </div>
                            @endif
                        </article>
                    @endforeach
                    <div style="padding-left: 25%;" class="view-more">

                        {!!$question->links()!!}

                    </div>
                </div>
            </div><!--.-->
            <aside class="hbsv-cntr">
                <section class="sec-hbsv1">

                    <h3>Ask doctor</h3>


                    <div class="collapsible-target" style="max-height: none;">

                        <p>Category Ask the doctor gives the reader data on thousands of health questions and answers that have been answered by reputable doctors and experts. You can also submit new questions to receive a doctor's direct consultation right here, completely free.</p>

                    </div>

                    <div class="collapse-trigger" style="display: none;">
                        <span class="trigger-expand"><i class="fa fa-chevron-down"></i></span>
                        <span class="trigger-collapse"><i class="fa fa-chevron-up"></i></span>
                    </div>
                </section>


                <section class="sec-hbsv2" data-isshow="0">
                    <h3>Specialized question<i id="down" class="fa fa-chevron-down"></i>
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