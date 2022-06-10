@extends('main',['title'=> 'Liên hệ với chúng tôi'])
@section('content')
<div id="main">
	<div class="position" id="list-cms">
        <div class="content">
            <ul class="cms-breadcrumb homepage-breadcrumb">
                <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                    <a href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a> \
                </li>
                <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                    <a href="#" itemprop="url"><span itemprop="title">Liên hệ với chúng tôi</span></a>
                </li>
            </ul>

            <div class="top-new">
                
                    <h2 style="text-align: center;">Mọi chi tiết xin liên hệ</h2>
                    <h4 style="text-align: center;"><strong>Công Ty TNHH Bác Sĩ Trực Tuyến Việt Nam</strong></h4>
                    <h4 style="text-align: center;"><strong>Địa chỉ: 195B Nguyễn Chí Thanh - Phường 12 - Quận 5 - Hồ Chí Minh</strong></h4>
                    <h4 style="text-align: center;"><strong>Address: USA 30590 Cochise Circle suit 204 murrieta ,ca 92563</strong></h4>
                    <h4 style="text-align: center;"><strong>Email:  tdoctor@gmail.com</strong></h4>
                    <h4 style="text-align: center;"><strong>Hotline:  {{$hl->content}}</strong></h4>
            </div>
        </div>
    </div>
			
</div>
@endsection