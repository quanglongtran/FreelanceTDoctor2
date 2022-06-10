@extends('v2/structor/main',['title'=> 'Chi tiết tuyển dụng - '.$recruitment->title])
@section('content')
    <div class="container">
        <div class="contt">
            <div id="top">
                <div class="link">
                    <div class="nav">
                        <ul>
                            <li><a href="/">Trang chủ</a></li>
                            <li>&nbsp;>&nbsp;</li>
                            <li><a href="/danh-sach-tuyen-dung">Tuyển dụng</a></li>
                        </ul>

                    </div>
                </div>
            </div><!-- #top -->
            <div class="list">
                <div id="content">
                    <h3 style="font-size: 22px;">{{$recruitment->title}}</h3>
                    <div style="padding: 10px;">
                        {!! $recruitment->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
