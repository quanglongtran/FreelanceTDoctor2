@extends('v2/structor/mainv3',['title'=> 'Chuyên mục '.$Current_catalog["name"], 'body_class' => 'page-chuyen-muc'])
@section('content')
<?php
function to_slug($str) {
    $str = trim(mb_strtolower($str));
    $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
    $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
    $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
    $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
    $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
    $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
    $str = preg_replace('/(đ)/', 'd', $str);
    $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
    $str = preg_replace('/([\s]+)/', '-', $str);
    return $str;
}
// var_dump($Current_catalog);
?>
<main>
        <div class="top-banner">
            <div class="container">
                @if($Current_catalog)
                <div class="banner__inner">
                    <img src="{{$Current_catalog->url_banner}}" alt="Khám bệnh online với bác sĩ Tdoctor.vn">
                </div>
                @endif
            </div>
        </div>
        <div class="content-page">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8 col-lg-9">
                        <section class="content">
                            @if($Current_catalog)
                            @if(Session::get('user') && Session::get('user')->user_type_id == 0 )
                            <a class="btn btn-primary btn-show-edit" target="_blank" href="/taikhoan/sua-danh-muc?id={{$Current_catalog['id']}}">Sửa</a>
                            @endif 
                            @if($Current_catalog->boxcauhoi_tieu_de != null)
                            <div class="only-sp doctor__list-sp">
                                <img src="{{$Current_catalog->url_banner}}" alt="{{$Current_catalog->boxcauhoi_tieu_de}}">
                            </div>
                            <div class="form-question only-sp">
                                <div class="bac-si-tu-van">
                                    <img src="{{$Current_catalog->boxcauhoi_hinhanh}}" alt="Tư vấn">
                                </div>
                                <h3>{{$Current_catalog->boxcauhoi_tieu_de}}</h3>
                                <p>{!!\App\Helpers\UploadFileHelper::correctPath($Current_catalog->boxcauhoi_mo_ta)!!}
                                </p>
                                <form action="{{$Current_catalog->boxcauhoi_url_dat_kham}}">
                                    <div class="form__control">
                                        <input type="text" placeholder="Họ và tên" class="form-control">
                                        <input type="number" placeholder="SĐT" class="form-control">
                                    </div>
                                    <div class="form__control">
                                        <textarea class="form-control" name="" id="" cols="30" rows="10" placeholder="Nhập nội dung câu hỏi"></textarea>
                                        <button type="submit" class="btn btn-ct">Gửi câu hỏi</button>
                                     </div>
                                </form>                            
                            </div>
                            @endif
                            @endif
                            <div class="news">
                                <h3 class="only-sp">Tin tức
                                </h3>
                                @if(isset($baiviet_new['article_title']) )
                                <div class="new__first">
                                    <a href="/{{$baiviet_new->article_url}}-{{$baiviet_new['article_id']}}.html">
                                        <img src="{!!asset('public/images/'.$baiviet_new->image)!!}" alt="{{$baiviet_new['article_title']}}" onerror="this.onerror=null; this.src='/public/images/logo-new.png'">
                                    </a>
                                    <h4><a href="/{{$baiviet_new->article_url}}-{{$baiviet_new['article_id']}}.html">{{$baiviet_new['article_title']}}</a></h4>
                                </div>
                                @endif
                                <div class="new__list">
                                    <?php $i = 0; ?>
                                    @foreach($baiviet as $b)
                                    @if($baiviet_new['article_id'] != $b['article_id'])
                                    <?php $i++; ?>
                                    @if($i <= 3)
                                    <article class="new__item">
                                        <a href="/baiviet/{{$b->article_url}}-{{$b['article_id']}}">
                                            <img src="{!!asset('public/images/'.$b->image)!!}" alt="{{$b['article_title']}}" onerror="this.onerror=null; this.src='/public/images/logo-new.png'">
                                        </a>
                                        <h4><a href="/baiviet/{{$b->article_url}}-{{$b['article_id']}}">{{\App\Helpers\StringHelper::bi_get_title_article($b['article_title'])}}</a></h4>
                                    </article>
                                    @endif
                                    @endif
                                    @endforeach

                                </div>
                            </div>
                            <div class="news-related">
                                <h3>Tin liên quan</h3>
                                <?php $i = 0; ?>
                                @foreach($baiviet as $b)
                                <?php $i++; ?>
                                @if($baiviet_new['article_id'] != $b['article_id'])
                                @if($i > 3)
                                <div class="new-related__item">
                                    <div class="img">
                                        <a href="/baiviet/{{$b->article_url}}-{{$b['article_id']}}">
                                        <img src="{!!asset('public/images/'.$b->image)!!}" alt="{{$b['article_title']}}" onerror="this.onerror=null; this.src='/public/images/logo-new.png'"></a>
                                    </div>
                                    <div class="new-item__desc">
                                        <h4>
                                            <a href="/baiviet/{{$b->article_url}}-{{$b['article_id']}}"> {{$b['article_title']}}</a>
                                        </h4>
                                        <p>{{$b['article_summary']}}
                                        </p>
                                        <span class="date">{!! \Carbon\Carbon::parse(($b['created_at']))->toDateTimeString() !!}</span>
                                    </div>
                                </div>
                                @endif
                                @endif
                                @endforeach

                            </div>
                            <button class="only-sp load-more-sp">
                                <span>Xem thêm</span>
                                <img src="../../public/v3/assets/image/loadmore-red.png" alt="Xem thêm bài viết">
                            </button>
                            <div class="pagination d-flex align-items-center justify-content-center">
                                {!! $baiviet->appends(request()->input())->links(); !!}                           
                            </div>
                            <!-- <div class="pagination d-flex align-items-center justify-content-center">
                                <a href="">Đầu</a>
                                <a href="">Trước</a>
                                <span class="page">1</span>
                                <span class="page is__active">2</span>
                                <span class="page">3</span>
                                <span class="page">4</span>
                                <span class="page">5</span>
                                <span class="page">...</span>
                                <span class="page">20</span>
                                <span class="page">21</span>
                                <a href="">Sau</a>
                                <a href="">Cuối</a>
                            </div> -->
                        </section>
                    </div>
                    <div class="col-12 col-md-4 col-lg-3">
                        <aside>
                            @if($Current_catalog)
                            @if( $Current_catalog->boxcauhoi_tieu_de != null )
                            <div class="form-question" style="">
                                <div class="bac-si-tu-van">
                                    <img src="{{$Current_catalog->boxcauhoi_hinhanh}}" alt="Tư vấn">
                                </div>
                                <h3>{{$Current_catalog->boxcauhoi_tieu_de}}</h3>
                                <p>{!!\App\Helpers\UploadFileHelper::correctPath($Current_catalog->boxcauhoi_mo_ta)!!}
                                </p>
                                <form action="../hoibacsi/datcauhoi?ref_type=2&ref_code=65976&speciality_id=4">
                                    <div class="form__control">
                                        <input type="text" placeholder="Họ và tên" class="form-control">
                                        <input type="number" placeholder="SĐT" class="form-control">
                                    </div>
                                    <div class="form__control">
                                        <textarea class="form-control" name="" id="" cols="30" rows="10"
                                            placeholder="Nhập nội dung câu hỏi"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-ct">Gửi câu hỏi</button>
                                </form>
                                <ol class="question-related">
                                    <?php $art = App\Article::Where('catalog_id',$Current_catalog->id)->orderBy('created_at','DESC')->take(2)->get(); ?>
                                    @foreach ($art as $index => $ar)
                                    <li><a href="/{{$ar->article_url}}-{{$ar->article_id}}.html">{{$ar['article_title']}}</a></li>
                                    @endforeach
                                </ol>
                            </div>
                            <div class="aside-banner mt">
                                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7940791875056931"
     crossorigin="anonymous"></script>
<!-- Chuyen khoa V3 1 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7940791875056931"
     data-ad-slot="6557185479"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                            </div>
                            @endif
                            @endif
                        </aside>

                            <div class="question-related">
                                <h3>Câu hỏi liên quan</h3>
                                <?php
                                // var_dump($hoidap);
                                if(isset($hoidap) && $hoidap != null ){
                                    $index_cauhoilienquan = 0;
                                ?>
                                @if(isset($hoidap) && $hoidap)
                                @foreach($hoidap as $question)
                                <?php
                                $index_cauhoilienquan++;
                                if($index_cauhoilienquan <=5){
                                    $questionUrl = '/hoibacsi/' . $question->question_url . '-' . $question->question_id;
                                
                                ?>
                                <a href="{{$questionUrl}}" class="question-related__item">
                                    <img alt="{{$question->question_title}}" onerror="this.onerror=null; this.src='/public/images/ask-doctor.png?v=1'"
                                         src="{{$question->getImage()}}"/>
                                    <p>@if (!empty($question->question_content))
                                           {{\App\Helpers\StringHelper::cut($question->question_content, 80)}}
                                        @else
                                            {{\App\Helpers\StringHelper::cut($question->question_title, 80)}}
                                        @endif</p>
                                </a>
                                <?php } ?>
                                @endforeach     
                                @endif 
                            <?php } ?>
                            </div>
                            <button class="only-sp load-more-sp">
                                <span>Xem thêm</span>
                                <img src="../../public/v3/assets/image/loadmore-red.png" alt="Xem thêm">
                            </button>
                            <div class="aside-banner mt">
                                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7940791875056931"
     crossorigin="anonymous"></script>
<!-- Chuyen khoa v3 2 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7940791875056931"
     data-ad-slot="8991777127"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection