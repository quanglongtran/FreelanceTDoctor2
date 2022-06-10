@extends('v2/structor/mainv3',['title'=> 'Bác sĩ trực tuyến', 'meta_keywords' => 'tdoctor, bác sĩ trực tuyến, bác sĩ online, khám bệnh từ xa, dịch vụ khám chữa bệnh từ xa, tư vấn bác sĩ, khám bệnh online, bệnh viện trực tuyến, khám chữa bệnh trực tuyến', 'body_class' => 'home-page', 'input_search_class' => 'page-hoidap'])
@section('content')
<!-- begin main -->
<main>
        <div class="top-banner d-none">
            <div class="container">
                <div class="banner__inner">
                    <!-- <img src="../public/v3/assets/images/banner-home.png" alt="Khám bệnh online với bác sĩ Tdoctor.vn"> -->
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7940791875056931"
     crossorigin="anonymous"></script>
<!-- Banner v3 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7940791875056931"
     data-ad-slot="3751122378"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                </div>
            </div>
        </div>
        <div class="hoi-dap-bs pt-5">
            <a href="../../danh-sach-bac-si/" class="only-sp header__block">
                <img src="../../public/v3/assets/image/Icon ionic-md-home.png" alt="Tìm bác sĩ chuyên khoa">
                <span>Tìm bác sĩ chuyên khoa</span>
            </a>           
            <a href="../../henlichkham" class="only-sp header__block ">
                <img src="../../public/v3/assets/image/check.png" alt="Đặt khám online">
                <span>Đặt khám online</span>
            </a>
            <section class="container">
                
                <div class="row d-nonex">
                    <div class="col-sm-12">
                        <img class="banner-image" src="../../public/v3/assets/image/banner.jpg" alt="Tdoctor.vn" />
                        @if(false)
                        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7940791875056931"
     crossorigin="anonymous"></script>
<!-- Banner v3 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7940791875056931"
     data-ad-slot="3751122378"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 pt-3 pb-3">
                        <h1>Hỏi đáp trực tiếp với bác sĩ uy tín</h1>
                        <a href="../../hoibacsi/datcauhoi" class="btn-dat-cau-hoi-mien-phi header__block block--bg only-sp">
                            <img src="../../public/v3/assets/image/comm.png" alt="Đặt câu hỏi miễn phí">
                            <span>Đặt câu hỏi miễn phí</span>
                        </a>
                    </div>
                </div>  
                <div class="row danh-sach-chuyen-khoa-mobile">
                    <div class="col-sm-12 only-sp">
                        <ul class="only-sp menu-sp__scroll">
                            <?php
                            $specs = App\Speciality::limit(25)->get();
                            foreach($specs as $chuyenkhoa){
                            ?>
                            <li><a href="../chuyenkhoa/{{$chuyenkhoa->specialty_url}}-{{$chuyenkhoa->speciality_id}}">{{$chuyenkhoa->speciality_name}}</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>                  
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-12x">             
                        <div class="row card-columnsx danh-sach-cau-hoi-moi" itemscope itemtype="https://schema.org/FAQPage">
                            <?php
                            $index = 0;
                            ?>
                            <div class="col-md-6 mb-3">
                                @foreach($topQuestions as $question)
                                    @if ($index < 3)
                                    <?php
                                        $index++;
                                        $questionUrl = '/hoibacsi/' . $question->question_url . '-' . $question->question_id;
                                    ?>
                                    <div class="box-cau-hoi-trang-chu" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <a href="{{$questionUrl}}"><img class="mb-3" onerror="this.onerror=null; this.src='/public/images/ask-doctor.png?v=1'" alt="{{$question->question_title}}" src="{{$question->getThumbnailImage()}}"></a>
                                    @if (!empty($question->question_content))
                                        <a href="{{$questionUrl}}" itemprop="name">{{\App\Helpers\StringHelper::cut($question->question_content, 80)}}</a>
                                    @else
                                        <a href="{{$questionUrl}}" itemprop="name">{{\App\Helpers\StringHelper::cut($question->question_title, 80)}}</a>
                                    @endif
                                    @if(count($question->answers)>0)
                                    <?php $index_cau_tl = 0; ?>
                                    @foreach($question->answers as $ans)
                                    @if($ans->answer_type!="customer" && $ans->user->doctor!=null)
                                    <?php $index_cau_tl++ ; if($index_cau_tl == 1){ ?>
                                    <hr class="d-nonex">
                                    <div class="d-nonex thong-tin-bac-si" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                        <a class="avatar-bac-si" href="@if($ans->user->doctor!=null || $ans->user->clinic!=null)@if($ans->user->doctor!=null)/danh-sach/bac-si/@else/co-so-y-te/@endif{{App\Deals::strtoUrl($ans->user->doctor!=null?$ans->user->doctor->doctor_name: $ans->user->clinic->clinic_name)}}-{{$ans->user->doctor!=null?$ans->user->doctor->doctor_id: $ans->user->clinic->clinic_id}}@endif">
                                            <img alt="{{$ans->user->fullname}}" 
                                            src="/public/images/doctor/<?php
                                            if(!empty($ans->user->doctor->profile_image) || !empty($ans->user->clinic->profile_image)){
                                                if($ans->user->doctor!=null){
                                                    if(strpos($ans->user->doctor->profile_image,'http')===false){
                                                        echo $ans->user->doctor->profile_image;
                                                    }
                                                }else{
                                                    if(strpos($ans->user->clinic->profile_image,'http')===false){
                                                        echo $ans->user->clinic->profile_image;
                                                    }
                                                }
                                            }
                                        ?>" /></a>
                                        <div class="box-ben-phai-thong-tin-bs" itemprop="text">
                                            <span>Đã trả lời bởi:</span>
                                            <h4>
                                                <a href="@if($ans->user->doctor!=null || $ans->user->clinic!=null)@if($ans->user->doctor!=null)/danh-sach/bac-si/@else/co-so-y-te/@endif{{App\Deals::strtoUrl($ans->user->doctor!=null?$ans->user->doctor->doctor_name: $ans->user->clinic->clinic_name)}}-{{$ans->user->doctor!=null?$ans->user->doctor->doctor_id: $ans->user->clinic->clinic_id}}@endif">
                                                
                                                 @if($ans->user->doctor!=null || $ans->user->clinic!=null)
                                                 
                                                 {{$ans->user->doctor!=null?''.$ans->user->doctor->doctor_name:$ans->user->clinic->clinic_name}}
                                                 @else
                                                 {{$ans->user->fullname}}
                                                 @endif
                                            </a></h4>
                                            <div class="star-rating">
                                                <div class="back-stars">

                                                    <div class="front-stars" style="width: 100%;">
                                                        <i class="fa fa-star" aria-hidden="true" style="color: #FFBC0B;"></i>
                                                        <i class="fa fa-star" aria-hidden="true" style="color: #FFBC0B;"></i>
                                                        <i class="fa fa-star" aria-hidden="true" style="color: #FFBC0B;"></i>
                                                        <i class="fa fa-star" aria-hidden="true" style="color: #FFBC0B;"></i>
                                                        <i class="fa fa-star" aria-hidden="true" style="color: #FFBC0B;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    @endif
                                    @endforeach     
                                    @endif

                                    </div>
                                    @endif
                                @endforeach
                            </div>
                            <?php
                            $index = 0;
                            ?>
                            <div class="col-md-6 mb-3">
                                @foreach($topQuestions as $question)
                                    <?php
                                        $index++;
                                    ?>
                                    @if ($index > 3 && $index <=6)
                                    <?php
                                        $questionUrl = '/hoibacsi/' . $question->question_url . '-' . $question->question_id;
                                    ?>
                                    <div class="box-cau-hoi-trang-chu" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <a href="{{$questionUrl}}"><img class="mb-3" onerror="this.onerror=null; this.src='/public/images/ask-doctor.png?v=1'" alt="{{$question->question_title}}" src="{{$question->getThumbnailImage()}}"></a>
                                    @if (!empty($question->question_content))
                                        <a href="{{$questionUrl}}" itemprop="name">{{\App\Helpers\StringHelper::cut($question->question_content, 80)}}</a>
                                    @else
                                        <a href="{{$questionUrl}}" itemprop="name">{{\App\Helpers\StringHelper::cut($question->question_title, 80)}}</a>
                                    @endif

                                    <?php $index_cau_tl = 0; ?>
                                    @if(count($question->answers)>0)
                                    @foreach($question->answers as $ans)
                                    @if($ans->answer_type!="customer" && $ans->user->doctor!=null)
                                    <?php $index_cau_tl++ ; if($index_cau_tl == 1){ ?>
                                    <hr class="d-nonex">
                                    <div class="d-nonex thong-tin-bac-si" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                        <a class="avatar-bac-si" href="@if($ans->user->doctor!=null || $ans->user->clinic!=null)@if($ans->user->doctor!=null)/danh-sach/bac-si/@else/co-so-y-te/@endif{{App\Deals::strtoUrl($ans->user->doctor!=null?$ans->user->doctor->doctor_name: $ans->user->clinic->clinic_name)}}-{{$ans->user->doctor!=null?$ans->user->doctor->doctor_id: $ans->user->clinic->clinic_id}}@endif">
                                            <img alt="{{$ans->user->fullname}}" 
                                            src="/public/images/doctor/<?php
                                            if(!empty($ans->user->doctor->profile_image) || !empty($ans->user->clinic->profile_image)){
                                                if($ans->user->doctor!=null){
                                                    if(strpos($ans->user->doctor->profile_image,'http')===false){
                                                        echo $ans->user->doctor->profile_image;
                                                    }
                                                }else{
                                                    if(strpos($ans->user->clinic->profile_image,'http')===false){
                                                        echo $ans->user->clinic->profile_image;
                                                    }
                                                }
                                            }
                                        ?>" /></a>
                                        <div class="box-ben-phai-thong-tin-bs" itemprop="text">
                                            <span>Đã trả lời bởi:</span>
                                            <h4>
                                                <a href="@if($ans->user->doctor!=null || $ans->user->clinic!=null)@if($ans->user->doctor!=null)/danh-sach/bac-si/@else/co-so-y-te/@endif{{App\Deals::strtoUrl($ans->user->doctor!=null?$ans->user->doctor->doctor_name: $ans->user->clinic->clinic_name)}}-{{$ans->user->doctor!=null?$ans->user->doctor->doctor_id: $ans->user->clinic->clinic_id}}@endif">
                                                
                                                @if($ans->user->doctor!=null || $ans->user->clinic!=null)                                                 
                                                {{$ans->user->doctor!=null?''.$ans->user->doctor->doctor_name:$ans->user->clinic->clinic_name}}
                                                @else
                                                {{$ans->user->fullname}}
                                                @endif
                                            </a></h4>
                                            <div class="star-rating">
                                                <div class="back-stars">

                                                    <div class="front-stars" style="width: 100%;">
                                                        <i class="fa fa-star" aria-hidden="true" style="color: #FFBC0B;"></i>
                                                        <i class="fa fa-star" aria-hidden="true" style="color: #FFBC0B;"></i>
                                                        <i class="fa fa-star" aria-hidden="true" style="color: #FFBC0B;"></i>
                                                        <i class="fa fa-star" aria-hidden="true" style="color: #FFBC0B;"></i>
                                                        <i class="fa fa-star" aria-hidden="true" style="color: #FFBC0B;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>  
                                    @endif
                                    @endforeach
                                    @endif

                                    </div>
                                    @endif
                                @endforeach
                            </div>

                        </div>
                        </div>
                        <div class="bottom-danh-sach-cau-hoi-home">
                            <a href="../../hoibacsi/datcauhoi" class="btn-dat-cau-hoi-mien-phi header__block block--bg">
                                <span>Đặt câu hỏi miễn phí</span>
                            </a>
                            <a href="../../hoibacsi" class="header__block block--bgx block-no-border btn-xem-tat-ca-cau-hoi">
                                <span>Xem tất cả câu hỏi ›</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 danh-sach-chuyen-muc" itemscope itemtype="https://schema.org/ItemList">
                        <h4 itemprop="name">Hơn <span>1000 Bác sĩ</span> đang sẵn sàng giúp đỡ bạn</h4>
                        <ul>
                            <?php 
                            // $specs = App\Speciality::all();

                            $specs = array(
                                array('Nhi Khoa','../../chuyenkhoa/nhi-1'),
                                array('Sản phụ khoa','../../chuyenkhoa/san-phu-2'),
                                array('Nam khoa','../../chuyenkhoa/nam-khoa-9'),
                                array('Ngoại Khoa','../../chuyenkhoa/ngoai-tim-mach-69'),
                                array('Nội Khoa','../../chuyenkhoa/nhi-ung-bướu-51'),
                                array('Tim mạch','../../chuyenkhoa/tim-mach-19'),
                                array('Hô hấp','../../chuyenkhoa/ho-hap-14'),
                                array('Tiêu hoá','../../chuyenkhoa/tieu-hoa-gan-mat-4'),
                                array('Răng hàm mặt','../../chuyenkhoa/rang-ham-mat-13'),
                                array('Tai Mũi Họng','../../chuyenkhoa/tai-mui-hong-6'),
                                array('Mắt','../../chuyenkhoa/nhan-khoa-8'),
                                array('Ung Bướu','../../chuyenkhoa/ung-buoi-10'),
                                array('Da Liễu','../../chuyenkhoa/da-lieu-3'),
                                array('Dị Ứng','../../chuyenkhoa/di-ung-mien-dich-27'),
                                array('Nội Tiết','../../chuyenkhoa/nhi-ung-bướu-51'),
                                array('Tiết Liệu','../../chuyenkhoa/than-tiet-nieu-20'),
                                array('Dinh Dưỡng','../../chuyenkhoa/dinh-duong-15'),
                                array('Tâm lý & Thần kinh','../../chuyenkhoa/tam-than-18'),
                                array('Cơ xương khớp','../../chuyenkhoa/co-xuong-khop-7'),
                                array('Phục Hồi Chức Năng','../../chuyenkhoa/vat-li-tri-lieu-phuc-hoi-chuc-nang-29'),
                                array('Truyền Nhiễm','../../chuyenkhoa/truyen-nhiem-11'),
                                array('Y học cổ truyền','../../chuyenkhoa/y-hoc-co-truyền-31'),
                                array('Phẫu thuật thẩm mỹ','../../chuyenkhoa/phau-thuat-tham-my-43'),
                            );
                            ?>                            
                            @foreach($specs as $index => $sp)
                            <li class="chuyen-khoa-{{($index+1)}}" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <meta itemprop="position" content="{{$index}}" />
                                <link itemprop="url" href="{{$sp[1]}}">
                                <a itempropx="item" href="{{$sp[1]}}">
                                    <img src="public/v3/assets/image/chuyen-khoa/bs{{($index+1)}}.png" alt="{{$sp[0]}}">
                                    <span itemprop="name">{{$sp[0]}}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                
            </section>
        </div>

        <div class="detail-page">
            <div class="container">

                <div class="row">
                    <div class="col-12 col-lg-3 danh-sach-bac-si-tu-van">
                        @include('v2.view.homev3_tuvan')
                        
                    </div>
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-12 col-lg-4 news-related-home chuyen-muc-tin-tuc-vuong">
                                <div class="news-related">
                                    <h3>Câu hỏi thường gặp</h3>
                                    <?php 
                                    $specs = App\Article::where('catalog_id', 27)->orderBy('article_id', 'DESC')->limit(3)->get(); 
                                    foreach($specs as $news){
                                         $newsUrl = '/' . $news->article_url. '-' . $news->article_id.'.html';
                                    ?>
                                    <div class="new-related__item">
                                        <div class="img">
                                            @if ($news->image)
                                                <a class="img__new" href="{{$newsUrl}}"><img lazy loading="lazy" alt="{{ $news->article_title }}" src="../public/images/{{$news->image}}"/></a>
                                            @else
                                                <a class="img__new" href="{{$newsUrl}}"><img lazy loading="lazy" alt="{{ $news->article_title }}" src="../public/images/no_image.png"/></a>
                                            @endif
                                        </div>
                                        <div class="new-item__desc">
                                            <a class="tieu-de-bv" href="{{$newsUrl}}">{{\App\Helpers\StringHelper::bi_get_title_article($news->article_title)}}</a><br/>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <a href="../../chuyenmuc/cauhoithuonggap-27" class="doctor__item-more">
                                        <span>Xem thêm</span>
                                        <img src="public/v3/assets/image/loadmore-red.png" alt="Xem thêm Câu hỏi thường gặp">
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4 news-related-home chuyen-muc-tin-tuc-vuong">
                                <div class="news-related">
                                    <h3>Khám bệnh online</h3>
                                    <?php 
                                    $specs = App\Article::where('catalog_id', 26)->orderBy('article_id', 'DESC')->limit(3)->get(); 
                                    foreach($specs as $news){
                                         $newsUrl = '/' . $news->article_url. '-' . $news->article_id.'.html';
                                    ?>
                                    <div class="new-related__item">
                                        <div class="img">
                                            @if ($news->image)
                                                <a class="img__new" href="{{$newsUrl}}"><img lazy loading="lazy" alt="{{ $news->article_title }}" src="../public/images/{{$news->image}}"/></a>
                                            @else
                                                <a class="img__new" href="{{$newsUrl}}"><img lazy loading="lazy" alt="{{ $news->article_title }}" src="../public/images/no_image.png"/></a>
                                            @endif
                                        </div>
                                        <div class="new-item__desc">
                                            <a class="tieu-de-bv" href="{{$newsUrl}}">{{\App\Helpers\StringHelper::bi_get_title_article($news->article_title)}}</a><br/>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <a href="../../chuyenmuc/cauhoithuonggap-26" class="doctor__item-more">
                                        <span>Xem thêm</span>
                                        <img src="public/v3/assets/image/loadmore-red.png" alt="Xem thêm Khám bệnh online">
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4 news-related-home chuyen-muc-tin-tuc-vuong">
                                <div class="news-related">
                                    <h3>Chuyên mục dinh dưỡng</h3>
                                    <?php 
                                    $specs = App\Article::where('catalog_id', 3)->orderBy('article_id', 'DESC')->limit(3)->get(); 
                                    foreach($specs as $news){
                                         $newsUrl = '/' . $news->article_url. '-' . $news->article_id.'.html';
                                    ?>
                                    <div class="new-related__item">
                                        <div class="img">
                                            @if ($news->image)
                                                <a class="img__new" href="{{$newsUrl}}"><img lazy loading="lazy" alt="{{ $news->article_title }}" src="../public/images/{{$news->image}}"/></a>
                                            @else
                                                <a class="img__new" href="{{$newsUrl}}"><img lazy loading="lazy" alt="{{ $news->article_title }}" src="../public/images/no_image.png"/></a>
                                            @endif
                                        </div>
                                        <div class="new-item__desc">
                                            <a class="tieu-de-bv" href="{{$newsUrl}}">{{\App\Helpers\StringHelper::bi_get_title_article($news->article_title)}}</a><br/>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <a href="../../chuyenmuc/phong-chua-benh-3" class="doctor__item-more">
                                        <span>Xem thêm</span>
                                        <img src="public/v3/assets/image/loadmore-red.png" alt="Xem thêm Chuyên mục dinh dưỡng">
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="row tin-tuc-trang-chu">
                            <div class="col-sm-12 new-related">                           
                                <h3>Tin tức</h3>
                                <?php 
                                $index_tintuc = 0;
                                // $specs = App\Article::where('catalog_id', 1)->orderBy('article_id', 'DESC')->limit(1)->get(); 
                                $specs = App\Article::where('catalog_id', '>', 0)->orderBy('article_id', 'DESC')->limit(5)->get(); 
                                foreach($specs as $news){
                                    $index_tintuc++;
                                    if($index_tintuc == 1){
                                     $newsUrl = '/' . $news->article_url. '-' . $news->article_id.'.html';                                    
                                ?>
                                <div class="new__first">
                                    @if ($news->image)
                                        <a href="{{$newsUrl}}"><img lazy loading="lazy" alt="{{ $news->article_title }}" src="../public/images/{{$news->image}}"/></a>
                                    @else
                                        <a href="{{$newsUrl}}"><img lazy loading="lazy" alt="{{ $news->article_title }}" src="../public/images/no_image.png"/></a>
                                    @endif
                                    <h4><a href="{{$newsUrl}}">{{\App\Helpers\StringHelper::bi_get_title_article($news->article_title)}}</a></h4>
                                </div>
                                <?php }} ?>
                                <div class="new__list">
                                    <?php 
                                    $index_tintuc = 0;
                                    // $specs = App\Article::where('catalog_id', 1)->orderBy('article_id', 'DESC')->limit(5)->get(); 
                                    foreach($specs as $news){
                                        $index_tintuc++;
                                        if($index_tintuc > 1){
                                         $newsUrl = '/' . $news->article_url. '-' . $news->article_id.'.html';
                                        
                                    ?>
                                    <article class="new__item new__item-trang-chu">
                                        @if ($news->image)
                                            <a href="{{$newsUrl}}"><img lazy loading="lazy" alt="{{ $news->article_title }}" src="../public/images/{{$news->image}}"/></a>
                                        @else
                                            <a href="{{$newsUrl}}"><img lazy loading="lazy" alt="{{ $news->article_title }}" src="../public/images/no_image.png"/></a>
                                        @endif
                                        <h4><a href="{{$newsUrl}}">{{\App\Helpers\StringHelper::bi_get_title_article($news->article_title)}}</a></h4>
                                    </article>
                                    <?php }} ?>
                                </div>
                                <a href="../../chuyenmuc/khambenhonline-26" class="doctor__item-more no-full">
                                    <span>Xem thêm</span>
                                    <img src="public/v3/assets/image/loadmore-red.png" alt="Xem thêm Tin tức">
                                </a>

                            </div>
                        </div>
                        <div class="row tin-tuc-trang-chu">
                            <section class="new-related">
                                    <h3>Nổi bật</h3>
                                    <?php 
                                    $index_tintuc = 0;
                                    $specs = App\Article::where('popular', 1)->orderBy('article_id', 'DESC')->limit(6)->get(); 
                                    foreach($specs as $news){
                                        $index_tintuc++;
                                        if(true || $index_tintuc >= 5){
                                         $newsUrl = '/' . $news->article_url. '-' . $news->article_id.'.html';                                    
                                    ?>
                                    <div class="new-related__item">
                                        @if ($news->image)
                                            <a class="img__new" href="{{$newsUrl}}"><img lazy loading="lazy" alt="{{ $news->article_title }}" src="../public/images/{{$news->image}}"/></a>
                                        @else
                                            <a class="img__new" href="{{$newsUrl}}"><img lazy loading="lazy" alt="{{ $news->article_title }}" src="../public/images/no_image.png"/></a>
                                        @endif
                                        <div class="new__content">
                                            <h4 class="new__title">
                                                <a href="{{$newsUrl}}">{{\App\Helpers\StringHelper::bi_get_title_article($news->article_title)}}</a>
                                            </h4>
                                            <p>{{\App\Helpers\StringHelper::cut($news->article_summary, 180)}}
                                            </p>
                                            <div class="date__cate">
                                                <p><?php echo date("d/m/Y H:i", strtotime($news->created_at)); ?> 
                                                    {{\App\Helpers\StringHelper::bi_get_category_by_catalog_id($news->catalog_id, 'cate')}}
                                                    </p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }} ?>

                                    <a href="../../chuyenmuc/phongchuabenh-1" class="doctor__item-more no-full">
                                        <span>Xem thêm</span>
                                        <img src="public/v3/assets/image/loadmore-red.png" alt="Xem thêm Nổi bật">
                                    </a>
                            </section>
                        </div>


                        <div class="row">
                            <section class="new-related box-bac-si-noi-bat col-12 col-sm-8">
                                    <h3>Bác sĩ nổi bật</h3>
                                    <div class="row danh-sach-chuyen-khoa-mobile" itemscopex itemtypex="https://schema.org/ItemList">
                                        <div class="col-sm-12 only-sp">
                                            <h3 class="d-none" itemprop="name">Danh sách bác sĩ chuyên khoa</h3>
                                            <ul class="only-sp menu-sp__scroll">
                                                <?php
                                                $specs = App\Speciality::limit(25)->get();
                                                foreach($specs as $index => $chuyenkhoa){
                                                ?>
                                                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                                    <meta itemprop="position" content="{{$index}}" />
                                                    <meta itemprop="name" content="{{$chuyenkhoa->speciality_name}}" />
                                                    <link itemprop="url" href="../danh-sach-bac-si/ca-nuoc/{{$chuyenkhoa->specialty_url}}">
                                                    <a href="../danh-sach-bac-si/ca-nuoc/{{$chuyenkhoa->specialty_url}}">{{$chuyenkhoa->speciality_name}}</a>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div itemscopex itemtypex="https://schema.org/ItemList">
                                        <h3 class="d-none" itemprop="name">Bác sĩ nổi bật</h3>
                                        <div class="new-related__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                            <a class="img__new">
                                                <img src="https://tdoctor.vn/public/images/doctor/drnguyenvanman-min.jpeg" alt="Bác sĩ CK2 Nguyễn Văn Mận">
                                            </a>
                                            <div class="new__content">
                                                <meta itemprop="position" content="1" />
                                                <meta itemprop="name" content="Bác sĩ CK2 Nguyễn Văn Mận" />
                                                <link itemprop="url" href="../danh-sach-bac-si-chi-tiet/66297">
                                                <h4 class="new__title">
                                                    <a itempropx="item" href="../danh-sach-bac-si-chi-tiet/66297">Bác sĩ CK2 Nguyễn Văn Mận
                                                    </a>
                                                </h4>
                                                <p>
                                                    Nơi công tác: Bệnh viện Hữu nghị Việt nam - Cuba Đồng Hới - Quảng Bình<br/>
    Chuyên khoa: Ngoại thần kinh<br/>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="new-related__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                            <a class="img__new">
                                                <img src="https://tdoctor.vn/public/images/doctor/drnguyenquocdung.jpg" alt="Thạc Sĩ, Bác sĩ CK2 Nguyễn Quốc Dũng">
                                            </a>
                                            <div class="new__content">
                                                <meta itemprop="position" content="2" />
                                                <meta itemprop="name" content="Thạc Sĩ, Bác sĩ CK2 Nguyễn Quốc Dũng" />
                                                <link itemprop="url" href="../danh-sach-bac-si-chi-tiet/66295">
                                                <h4 class="new__title">
                                                    <a itempropx="item" href="../danh-sach-bac-si-chi-tiet/66295">Thạc Sĩ, Bác sĩ CK2 Nguyễn Quốc Dũng
                                                    </a>
                                                </h4>
                                                <p>
                                                    Nơi công tác: Bệnh viện K Trung Ương<br/>
    Chuyên khoa: Ung Bướu, Ung Thư, Tai Mũi Họng<br/>
    Phẫu thuật viên khoa ngoại Đầu - Cổ tại Bệnh viện K Trung Ương
                                                </p>
                                            </div>
                                        </div>
                                        <div class="new-related__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                            <a class="img__new">
                                                <img src="https://tdoctor.vn/public/images/doctor/drdovanchien-min.jpeg" alt="Bác sĩ, Tiến sĩ Đỗ Văn Chiến">
                                            </a>
                                            <div class="new__content">
                                                <meta itemprop="position" content="3" />
                                                <meta itemprop="name" content="Bác sĩ, Tiến sĩ Đỗ Văn Chiến" />
                                                <link itemprop="url" href="../danh-sach-bac-si-chi-tiet/66294">
                                                <h4 class="new__title">
                                                    <a itempropx="item" href="../danh-sach-bac-si-chi-tiet/66294">Bác sĩ, Tiến sĩ Đỗ Văn Chiến
                                                    </a>
                                                </h4>
                                                <p>
    Chuyên khoa: Tim Mạch<br/>
    Nơi công tác : Bệnh viện trung ương quân đội 108 <br/>
    Tiến sỹ y khoa, phó trưởng khoa Nội tim mạch tại bệnh viện trung ương quân đội 108. Chuyên nghành sâu: tim mạch can thiệp, siêu âm tim-mạch, suy tim
                                                </p>
                                            </div>
                                        </div>
                                        <div class="new-related__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                            <a class="img__new">
                                                <img src="https://tdoctor.vn/public/images/doctor/drhoangthuthuy-min.jpeg" alt="Bác sĩ, Tiến sĩ Hoàng Thu Thủy">
                                            </a>
                                            <div class="new__content">
                                                <meta itemprop="position" content="4" />
                                                <meta itemprop="name" content="Bác sĩ, Tiến sĩ Hoàng Thu Thủy" />
                                                <link itemprop="url" href="../danh-sach-bac-si-chi-tiet/66290">
                                                <h4 class="new__title">
                                                    <a itempropx="item" href="../danh-sach-bac-si-chi-tiet/66290">Bác sĩ, Tiến sĩ Hoàng Thu Thủy
                                                    </a>
                                                </h4>
                                                <p>
    Chuyên khoa: Ung Bướu, Ung Thư, 
    Mắt, Nhãn Khoa<br/>
    Hoàng Thu Thủy, tốt nghiệp BSĐK trường ĐHYHN năm 2003. <br/>
    Nơi công tác hiện tại: BV Mắt Sài Gòn Hà Nội 1 Ngoài giờ: <br/>
    Trung tâm chẩn đoán ung thư sớm DECA care Các dịch vụ khám và điều trị: liên quan đến chăm sóc giảm nhẹ, điều trị tác dụng phụ của thuốc và các phương pháp điều trị ung thư tiệt căn, tư vấn lâm lý, dinh dưỡng lâm sàng, chăm sóc tâm linh...
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="../danh-sach-bac-si" class="doctor__item-more no-full">
                                        <span>Xem thêm</span>
                                        <img src="public/v3/assets/image/loadmore-red.png" alt="Xem thêm danh sách Bác sĩ Tdoctor.vn">
                                    </a>
                                </section>
                                <div class="col-12 col-sm-4 new-related danh-sach-bac-si-chuyen-khoa">
                                    <div class="danh-sach-bac-si-chuyen-khoa-container">
                                        <h3>Danh sách bác sĩ chuyên khoa</h3>
                                        <ul>
                                            <?php
                                            $specs = App\Speciality::limit(25)->get();
                                            foreach($specs as $chuyenkhoa){
                                                // var_dump($chuyenkhoa);
                                            ?>
                                            <li><a href="../danh-sach-bac-si/ca-nuoc/{{$chuyenkhoa->specialty_url}}">{{$chuyenkhoa->speciality_name}}</a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                        </div>

                        <div class="row tin-tuc-trang-chu video-trang-chu">
                            <div class="col-sm-12 new-related">                            
                                <h3>Video</h3>
                                <?php
                                $videos_home = DB::table('videos_home')->orderBy('stt', 'DESC')->limit(5)->get();
                                foreach($videos_home as $key => $video){ if($key == 0){?>
                                <div class="new__first">
                                    <a class="youtube-link" href="{{$video->video_id}}">
                                        <img src="https://i.ytimg.com/vi/{{$video->video_id}}/hqdefault.jpg?sqp=-oaymwEcCNACELwBSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&rs=AOn4CLAYNajCFK-1gB9Q6bpSMYh7y-iZoQ" alt="{{$video->tieu_de}}">
                                        <i class="far fa-play-circle"></i>
                                    </a>
                                    <h4><a class="youtube-link" href="{{$video->video_id}}">{{$video->tieu_de}}</a></h4>
                                </div>
                                <?php } } ?>
                                <div class="new__list">
                                    <?php foreach($videos_home as $key => $video){ if($key!=0){?>
                                    <article class="new__item new__item-trang-chu">
                                        <a class="youtube-link" href="{{$video->video_id}}">
                                            <img src="https://i.ytimg.com/vi/{{$video->video_id}}/hqdefault.jpg?sqp=-oaymwEcCNACELwBSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&rs=AOn4CLAYNajCFK-1gB9Q6bpSMYh7y-iZoQ" alt="{{$video->tieu_de}}">
                                            <i class="far fa-play-circle"></i>
                                        </a>
                                        <h4><a class="youtube-link" href="{{$video->video_id}}">{{$video->tieu_de}}</a></h4>
                                    </article>
                                    <?php } } ?>

                                </div>
                                <a href="https://www.youtube.com/channel/UCm3h1QVkgGg6xvyEHElMx7Q/videos" class="doctor__item-more no-full">
                                    <span>Xem thêm</span>
                                    <img src="public/v3/assets/image/loadmore-red.png" alt="Xem thêm Video bổ ích tại Kênh Tdoctor.vn">
                                </a>

                            </div>
                        </div>


                        <div class="row">
                            <section class="new-related box-bac-si-noi-bat phan-hoi-tu-benh-nhan col-12 col-sm-8">
                                    <h3>Phản hồi từ bệnh nhân</h3>
                                    <div class="new-related__item">
                                        <a class="img__new">
                                            <img src="public/v3/assets/image/phan-hoi-tu-benh-nhan1.png"
                                                alt="Đánh giá từ bệnh nhân Duy Nguyễn Nhất">
                                        </a>
                                        <div class="new__content">
                                            <h4 class="new__title">
                                                <a href="javascript:void(0)">Duy Nguyễn Nhất
                                                </a>
                                                <div class="star-rating">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            </h4>
                                            <p>
                                                Rất tuyệt vời, đặc biệt trong mùa dịch đi lại khó khăn. Chúc doctor ngày càng phát triển và mở rộng phạm vi ra nhiều tỉnh hơn, nhất là vùng Đồng bằng sông Cửu Long
                                            </p>
                                        </div>
                                    </div>
                                    <div class="new-related__item">
                                        <a class="img__new">
                                            <img src="public/v3/assets/image/phan-hoi-tu-benh-nhan2.png"
                                                alt="Đánh giá từ bệnh nhân Vũ Quốc Bình">
                                        </a>
                                        <div class="new__content">
                                            <h4 class="new__title">
                                                <a href="javascript:void(0)">Quoc Binh Vu
                                                </a>
                                                <div class="star-rating">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            </h4>
                                            <p>
                                                Ứng dụng rất hay. Giúp mọi người hạn chế bệnh gì cũng phải đến bệnh viện khám. Đỡ mất thời gian, công sức và tiền bạc vì nhiều khi vô gặp bs cũng chỉ cần hỏi vài câu và cho thuốc
                                            </p>
                                        </div>
                                    </div>
                                    <div class="new-related__item">
                                        <a class="img__new">
                                            <img src="public/v3/assets/image/phan-hoi-tu-benh-nhan3.png"
                                                alt="Đánh giá từ bệnh nhân Nguyễn Ngọc Minh">
                                        </a>
                                        <div class="new__content">
                                            <h4 class="new__title">
                                                <a href="javascript:void(0)">Nguyễn Ngọc Minh 
                                                </a>
                                                <div class="star-rating">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            </h4>
                                            <p>
                                                Em bị ung thư mà đã khám ở bệnh viện tuyến tỉnh rồi mà cần tư vấn bác sĩ tuyến trung ương mà chưa đi bệnh viện được. thấy bác sĩ tuyến trung ương trong hệ thống tdoctor mà Mới đầu không tin là sẽ được chat và gọi khám trực tiếp bác sĩ thật. khi gọi mới biết đúng chuẩn luôn. bác sĩ bên tdoctor rất nhiệt tình. rất tiện cho trường hợp khám online và tư vấn thêm.
                                            </p>
                                        </div>
                                    </div>
                                </section>
                                <div class="col-12 col-sm-4 new-related danh-sach-bac-si-chuyen-khoax">                                    
                                    <!-- <img src="public/v3/assets/image/phan-hoi-tu-benh-nhan.png" alt=""> -->
                                    <div class="rowx doctor">
                                        <div class="slider__ds_phan_hoi">
                                            <?php for($i=1; $i<=23; $i++){ ?>
                                            <div class="item">
                                                <a class="image-popup-vertical-fit" href="public/images/phanhoi/{{$i}}.jpg">
                                                    <img src="public/images/phanhoi/{{$i}}.jpg" alt="Hình ảnh đánh giá {{$i}}">
                                                </a>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>                   

                </div>
            </div>
        </div>

        <div class="box-htv9">
            <a class="youtube-link" href="RVXhz_dJKnY">
                <img style="width: 2520px;margin: auto;" src="https://img.youtube.com/vi/RVXhz_dJKnY/maxresdefault.jpg" alt="Video HTV9 về Tdoctor.vn Hệ thống khám bệnh trực tuyến">
            </a>
        </div>
        <div class="thong-ke-he-thong">
            <div class="container">
                <div class="has-bg clr row">
                    <div class="span col-4 col-sm-2 m alone text-center">
                    <h5 class="counter ctr1" data-count="{{$countClinic}}">{{$countClinic}}</h5>
                    <em>Phòng khám</em></div>
                <div class="span col-4 col-sm-2 m alone text-center">
                    <h5 class="counter ctr2" data-count="{{$countDoctor}}">{{$countDoctor}}</h5>
                    <em>Bác sĩ</em></div>
                <div class="span col-4 col-sm-2 m alone text-center">
                    <h5 class="counter ctr3" data-count="{{$countDrugstore}}">{{$countDrugstore}}</h5>
                    <em>Nhà thuốc</em></div>
                <div class="span col-4 col-sm-2 m alone text-center">
                    <h5 class="counter ctr4" data-count="{{$countUser}}">{{$countUser}}</h5>
                    <em>Bệnh nhân</em></div>
                <div class="span col-4 col-sm-2 m alone text-center">
                    <h5 class="counter ctr4" data-count="{{$countQuestion}}">{{$countQuestion}}</h5>
                    <em>Câu hỏi</em></div>
                <div class="span col-4 col-sm-2 m alone text-center">
                    <h5 class="counter ctr4" data-count="{{$countAnswer}}">{{$countAnswer}}</h5>
                    <em>Câu trả lời</em></div>
                </div>
            </div>
        </div>
        <div class="gioi-thieu-app">
            <div class="container">
                <div class="">                    
                    <div class="row">
                        <div class="block__header d-flex align-items-center justify-content-between">
                            <h3 class="block__title">
                                Theo dõi sức khoẻ
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container container-slider">
                <div class="">                    
                    <div class="row doctor">
                        <div class="slider__doctor">
                            <?php for($i=1; $i<=10; $i++){ ?>
                            <div class="item">
                                <a href="">
                                    <img src="public/v3/assets/image/gt{{$i}}.png" alt="Theo dõi sức khoẻ {{$i}}">
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
            <div class="container container-slider">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="vote__status">
                            <h4>App Tdoctor dành cho bệnh nhân</h4>
                            <p>
                            <div class="row">
                                <div class="col-6 col-sm-6">
                                    <a target="_blank" href="https://apps.apple.com/us/app/tdoctor/id1443310734"><img loading="lazy" data-src="public/v2/img/appstore.svg" alt="App Tdoctor cho bệnh nhân trên AppleStore" src="public/v2/img/appstore.svg"></a>
                                </div>
                                <div class="col-6 col-sm-6">
                                    <a target="_blank" href="https://play.google.com/store/apps/details?id=com.app.khambenh.bacsiviet"><img loading="lazy" data-src="public/v2/img/playstore.svg" alt="App Tdoctor cho bệnh nhân trên CHPlay" src="public/v2/img/playstore.svg"></a>
                                </div>
                            </div>
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="vote__status">
                            <h4>App Tdoctor dành cho Bác sĩ</h4>
                            <p>
                            <div class="row">
                                <div class="col-6 col-sm-6">
                                    <a target="_blank" href="https://apps.apple.com/vn/app/tdoctor-for-doctor/id1555758280"><img loading="lazy" data-src="public/v2/img/appstore.svg" alt="App Tdoctor cho bác sĩ trên AppleStore" src="public/v2/img/appstore.svg"></a>
                                </div>
                                <div class="col-6 col-sm-6">
                                    <a target="_blank" href="https://play.google.com/store/apps/details?id=com.app.khambenh.doctor"><img loading="lazy" data-src="public/v2/img/playstore.svg" alt="App Tdoctor cho bác sĩ trên CHPlay" src="public/v2/img/playstore.svg"></a>
                                </div>
                            </div>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('v2.view.homev3_tuvan_mobile1')
        <div class="chuyen-muc-tin-tuc chuyen-muc-tin-tuc-vuong">
            <div class="container container-slider new-related">               
                <div class="row">
                    <?php
                    $Catalog = App\Catalog::whereNotIn('id', [3,26,27])->get();
                    ?>
                    <?php $checked_index = 0; ?>
                    @foreach ($Catalog as $parent_index => $item)
                    @if($item['parent_id']==0)
                    <?php $checked_index ++; if($checked_index <= 60){ ?>
                    <?php
                    $art = App\Article::Where('catalog_id',$item['id'])
                    ->where(function($query) {
                        $query->whereNull('shows_at')
                            ->orWhere('shows_at', '<=', date('Y-m-d H:i:s'));
                    })
                    ->orderBy('created_at','DESC')->take(3)->get();
                    if(count($art)){
                    ?>
                    <div class="col-md-4 col-sm-6">
                        <a href="../../chuyenmuc/{{$item['name_url']}}-{{$item['id']}}"><h3>{{$item['name']}}</h3></a>                                           
                        @foreach ($art as $index => $ar)
                        <div class="new-related__item">
                            <a href="/{{$ar->article_url}}-{{$ar->article_id}}.html" class="img__new">
                                <img src="@if($ar->image == '') ../public/images/default_baiviet.jpg @else {!! asset('public/images/'.$ar->image) !!} @endif" alt="{{$ar['article_title']}}" title="{{$ar['article_title']}}">
                            </a>
                            <div class="new__content">
                                <h4 class="new__title">
                                    <a href="/{{$ar->article_url}}-{{$ar->article_id}}.html">{{\App\Helpers\StringHelper::bi_get_title_article($ar['article_title'])}}</a>
                                </h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <?php } } ?>
                    @endif
                    @endforeach

                    @if(false)
                    <?php $checked_index = 0; ?>
                    @foreach ($Catalog as $parent_index => $item)
                    @if(false && $item['parent_id']>0 )
                    <?php if($checked_index == 0){ $checked_index++; ?>
                    <div class="col-md-4 col-sm-6">
                        <a href=""><h3>{{$item['name']}}</h3></a>
                        <?php
                        $art = App\Article::Where('catalog_id',$item['id'])
                        ->where(function($query) {
                            $query->whereNull('shows_at')
                                ->orWhere('shows_at', '<=', date('Y-m-d H:i:s'));
                        })
                        ->orderBy('created_at','DESC')->take(3)->get(); ?>                    
                        @foreach ($art as $index => $ar)
                        <div class="new-related__item">
                            <a href="/{{$ar->article_url}}-{{$ar->article_id}}.html" class="img__new">
                                <img src="@if($ar->image == '') ../public/images/default_baiviet.jpg @else {!! asset('public/images/'.$ar->image) !!} @endif" alt="{{$ar['article_title']}}" title="{{$ar['article_title']}}">
                            </a>
                            <div class="new__content">
                                <h4 class="new__title">
                                    <a href="/{{$ar->article_url}}-{{$ar->article_id}}.html">{{\App\Helpers\StringHelper::bi_get_title_article($ar['article_title'])}}</a>
                                </h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <?php } ?>
                    @endif
                    @endforeach

                    @endif

                </div>
            </div>
        </div>
        @include('v2.view.homev3_tuvan_mobile2')
        <div class="box-don-vi-lien-ket">
            <div class="container new-related" style="margin-bottom: -42px;">
                <div class="row d-flex flex-wrap align-items-center">
                    <div class="col-3 col-md-1">
                        <a target="_blank" href="https://www.facebook.com/senoferum/">
                            <img src="../../public/v3/images/nhan1.jpeg" alt="Senoferum">
                        </a>
                    </div>
                    <div class="col-3 col-md-1">
                        <a target="_blank" href="https://tdoctor.vn/phongkham-chitiet/khoa-can-thiep-tim-mach---benh-vien-quan-y-103-339/kham-benh">
                            <img src="https://tdoctor.vn/public/images/health_facilities/686171391khoatimach103.jpg" alt="Bệnh viện Quân Y 103">
                        </a>
                    </div>
                    <div class="col-3 col-md-1">
                        <a target="_blank" href="https://tdoctor.vn/phongkham-chitiet/benh-vien-quan-y-105---don-vi-can-thiep-tim-mach-342/kham-benh">
                            <img src="https://tdoctor.vn/public/images/health_facilities/874774981cardiology-prevention-970-444-20180312092308.png" alt="Bệnh viện quân y 105">
                        </a>
                    </div>
                    <div class="col-3 col-md-1">
                        <a target="_blank" href="https://tdoctor.vn/phongkham-chitiet/trung-tam-chan-doan-hinh-anh-va-can-thiep-dien-quang-343/kham-benh">
                            <img src="https://tdoctor.vn/public/images/health_facilities/274245724logochuandoanhinhanhdhyhn.png" alt="Trung tâm chuẩn đoán hình ảnh và can thiệp điện quang">
                        </a>
                    </div>
                    <div class="col-3 col-md-1">
                        <a target="_blank" href="https://tdoctor.vn/phongkham-chitiet/khoa-ho-hap-benh-vien-dai-hoc-y-ha-noi-344/kham-benh">
                            <img src="https://tdoctor.vn/public/images/health_facilities/966099572logodhyhn.png" alt="Khoa hô hấp bệnh viện đại học y hà nội">
                        </a>
                    </div>
                    <div class="col-3 col-md-1">
                        <a target="_blank" href="https://tdoctor.vn/phongkham-chitiet/phong-kham-nhi-tung-anh-350/kham-benh">
                            <img src="https://tdoctor.vn/public/images/health_facilities/91903225pknhitunganh.jpg" alt="Phòng khám nhi Tùng Anh">
                        </a>
                    </div>
                    <div class="col-3 col-md-1">
                        <a target="_blank" href="https://cody.com.vn/">
                            <img src="https://w.ladicdn.com/s550x400/60194f03c1b48f0011078965/logo-cody-1-png-20210301150303.png" alt="Cody.com.vn">
                        </a>
                    </div>
                </div>
            </div>
        </div>


    </main>
    <!-- end main -->
@endsection