@extends('v2/structor/main',['title'=> 'Danh sách tuyển dụng'])
@section('content')
<div class="container">
    <div class="list">
        <div id="content">
            <div class="dt" id="recruitment-container">
                <ul>
                    @if(!empty($recruitments))
                        @foreach($recruitments as $recruitment)
                            <?php
                                $cl = $recruitment->clinic;
                                $clinic_id = $recruitment->clinic_id;
                            ?>
                            <li>
                                <div id="avatar">
                                    @if($clinic_id > 0)
                                    <a href="{{$recruitment->getUrl()}}"
                                       style="background-image: url({{url('public/images/health_facilities/'.$cl->profile_image)}});">
                                    </a>
                                    @else
                                    <a href="{{$recruitment->getUrl()}}"
                                       style="background-image: url('https://tdoctor.vn/public/v2/img/tuyen-dung.jpeg')">
                                    </a>
                                    @endif
                                </div><!--Avatar-->
                                <div class="content ct">
                                    <div class="name">
                                        <h2>
                                            <a href="{{$recruitment->getUrl()}}">{{$recruitment->title}}</a>
                                        </h2>
                                    </div><!--Name-->
                                    <div class="clinic-name">
                                        <h2>@if($clinic_id > 0)
                                            <a href="/phongkham-chitiet/{{$cl->clinic_url}}-{{$cl->clinic_id}}/kham-benh">{{$cl->clinic_name}}</a>
                                            @else

                                            @endif
                                        </h2>
                                    </div>
                                    <div>@if($clinic_id > 0)
                                        <p><i class="fa fa-map-marker"></i>  {{$cl->clinic_address}}</p>
                                        @endif
                                    </div><!--Address-->
                                </div>
                            </li>
                        @endforeach
                    @else
                        <h3>Chưa có tin tuyển dụng nào</h3>
                    @endif
                </ul>
            </div>
            <div class="pagination" style="">
                <span>{!! $recruitments->appends(request()->input())->links(); !!}</span>
            </div>
        </div>
    </div>
</div>
@endsection
