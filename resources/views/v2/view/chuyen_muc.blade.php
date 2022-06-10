@extends('v2/structor/main',['title'=> 'Chuyên mục '.$Current_catalog["name"], 'body_class' => 'page-chuyen-muc'])
@section('content')
@if(true || $Current_catalog->boxcauhoi_tieu_de != null)
@include('v2.view.chuyen_muc_newv3')
@else
<?php
// var_dump($Current_catalog);
?>
<style type="text/css">
    .box-banner-chuyen-muc {
    max-height: 350px;
    overflow: hidden;
}

.box-banner-chuyen-muc img {
    width: 100%;
}
.box-left-dat-cau-hoi-danh-muc .nd1 .imgvm {
    max-height: 250px;
    overflow: hidden;
}
@if($Current_catalog->boxcauhoi_tieu_de != null)
.box-left-dat-cau-hoi-danh-muc {
    width: 70%;
    float: left;
}

.box-dat-cau-hoi-danhmuc {
    width: 30%;
    float: right;
}
@endif

.btn-show-edit {
    padding: 0;
    margin: 0;
    margin-left: 10px;
    text-transform: none;
}
</style>
<div class="main-A">
	 <div id="top">
            <div class="box-banner-chuyen-muc">
                <a href="javascript:void(0);">
                    <img src="{{$Current_catalog->url_banner}}" alt="Khám bệnh online với bác sĩ Tdoctor.vn" />
                </a>
            </div>
            
            <div class="link">
                <div class="nav">
                    @if($Current_catalog->boxcauhoi_tieu_de == null || (Session::get('user') && Session::get('user')->user_type_id == 0))
                    <ul>
                        <li><a href="/">Trang chủ</a></li>
                        <li>&nbsp;>&nbsp;</li>
                        <li><a href="">Chuyên mục {{$Current_catalog["name"]}}</a></li>
                       @if(Session::get('user') && Session::get('user')->user_type_id == 0 )
                        <li><a class="btn btn-primary btn-show-edit" target="_blank" href="/taikhoan/sua-danh-muc?id={{$Current_catalog['id']}}">Sửa</a></li>
                       @endif 
                    </ul>  
            @endif                   
                </div>                
                  <div >
                    <h5 ></h5>
                  </div>
            </div> 
    </div><!-- #top -->
    <div class="nav-ctbv" style="display: none;">   
        @foreach($Catalogs as $catalog)
        @if($catalog['parent_id']==0)
            <div class="dropd-f">
                <span class=" ">
                    <a href="/chuyenmuc/{{$catalog['name_url']}}-{{$catalog['id']}}" title="Phòng &amp; Chữa Bệnh">
                        {!! $catalog["name"]!!}
                    </a>
                </span>
                <?php $cates = App\Catalog::where('parent_id',$catalog['id'])->get(); ?>
                <?php $cate_paren = App\Catalog::where('parent_id',0)->first(); ?>
                <div class="dropd-c">
                     @foreach ($cates as $cate)
                    <a class="" href="/chuyenmuc/{{$cate['name_url']}}-{{$cate['id']}}">{{$cate['name']}}</a>
                      @endforeach
                </div>
            </div>
        @endif
        @endforeach
    </div><!--nav-->
    <div class="contcm" style="
    width: 100%;
    clear: both;
    padding: 0;
">
        <div class="box-left-dat-cau-hoi-danh-muc"> 
        @if(isset($baiviet_new['article_title']) )         
                <div class="nd1">
                    <div class="imgvm">
                            <img src="{!!asset('public/images/'.$baiviet_new->image)!!}" alt="{{$baiviet_new['article_title']}}">
                    </div>
                    <div class="nd1cm1">
                        <h2>
                            <a href="/{{$baiviet_new->article_url}}-{{$baiviet_new['article_id']}}.html">{{$baiviet_new['article_title']}}</a>
                        </h2>
                        <div class="nd1cm2">
                          {{$baiviet_new['article_summary']}}
                        </div>
                    </div>
                </div>
                <div class="nd2">
                    <ul>
                    	@foreach($baiviet as $b)
			                @if($baiviet_new['article_id'] != $b['article_id'])
				                <li>
				                 <img src="{!!asset('public/images/'.$b->image)!!}" alt="{{$b['article_title']}}">
				    
				                <div class="nd2cm2">
					                <h4>
					                    <a href="/{{$b->article_url}}-{{$b['article_id']}}.html"> {{$b['article_title']}}</a>           
					                </h4>
					                    
					                          {{$b['article_summary']}}
					                       
				                </div>
				                </li>
			                @endif
		                @endforeach
                    </ul>
                </div>
            

            	
                <div style="padding: 30px 0 0 33.3%;" class="pagination">
                    
                    <span class="step-links">
                       {!! $baiviet->links(); !!}
                        
                    </span>
                </div>
            @else
            <h3> Không có bài viết </h3>
            
            @endif
        </div>
        @if($Current_catalog->boxcauhoi_tieu_de != null)
        <div class="box-dat-cau-hoi-danhmuc">
            <div class="section-home-hoibacsi" style="
                background: #e84f5e;
                border-radius: 14px;
                padding: 12px;
                margin-right: 8px;
                color: #fff;
            ">
                <h2 style="
                font-size: 16px;
                color: #fff;
                text-transform: uppercase;
                text-align: center;
                margin-top: 15px;
                margin-bottom: 20px;
            ">{{$Current_catalog->boxcauhoi_tieu_de}}</h2>
                <div class="box-hoibacsi-section">
                    <img src="{{$Current_catalog->boxcauhoi_hinhanh}}" alt="hoi bac si" style="
                        float: left;
                        margin-right: 10px;
                        max-width: 85px;
                    ">
                    <div class="box-hoibaci-section-right">
                        <!-- <a href="https://tdoctor.vn/bacsi65976"><h3>Bác sĩ, Thạc sĩ Nguyễn Hồng Vân Khánh</h3></a>
                        <p>Phó khoa Tiêu Hoá</p>
                        <p>Bệnh viện Nhi Đồng 2 HCM
                        </p> -->
                        {!!\App\Helpers\UploadFileHelper::correctPath($Current_catalog->boxcauhoi_mo_ta)!!}
                    </div>
                    <div style="clear: both;"></div>
                </div>
                <div class="text-center">
                    <a class="btn btn-primary" href="{{$Current_catalog->boxcauhoi_url_dat_kham}}" style="
                margin-bottom: 6px;
                margin-top: 8px;
            ">Hỏi bác sĩ</a>
                </div><div class="text-center">
                    {!!\App\Helpers\UploadFileHelper::correctPath($Current_catalog->boxcauhoi_url_tai_tro)!!}
                </div>
            </div>
        </div>
        @endif
    </div>
    <!-- <div class="global-thread-create-cta">
        <a href="/hoi-bac-si/dat-cau-hoi/" class="button">
            <i class="fa fa-question-circle" aria-hidden="true"></i>
            <strong>Hỏi bác sĩ</strong>
            <span>miễn phí</span>
        </a>
    </div> -->
</div>
@endif
@endsection