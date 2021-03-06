
@extends('v2/structor/main',['title'=> 'Thuốc '.$thuoc['description'], 'description' => $thuoc['guide'] ])
@section('content')
<script type="text/javascript">

  $(document).ready(function(){

    /** 
    * 1.
    * Code xử lý màn hình thay đổi màn hình trên web <=> mobile
    */
    checkSizeRes();

    $(window).resize(function(event) {
        let width = $(document).width();    
        checkSizeRes();
    });

    function checkSizeRes() {
      let width = $(document).width();    
      if(width > 639)
      {
          $('.sec').off('click');
          $('.sec').find('.medic2').show();
      }
      else
      {          
        $('.sec').on('click',function(){           
          let data_isshow = $(this).attr('data-isshow');
          if (data_isshow == 0) {
            $(this).find('#show').hide();
            $(this).find('#hide').show();
            $(this).find('.medic2').show();
            $(this).attr('data-isshow', '1');
          }
          else
          {
             $(this).find('#show').show();
             $(this).find('#hide').hide();
             $(this).find('.medic2').hide();      
             $(this).attr('data-isshow', '0');
          }
        });
      }
    }
    /** 
    * 1. end   
    */
    // 2.code href scroll to id
    $(".btn-scroll-to").on('click', function(event) {   
      let data_id = $(this).attr("data-id");  
      let scrollTo = $(data_id).offset().top - 90;
      $(window).scrollTop(scrollTo);      
    });
    //
  });

 


   
  
</script>
<div class="container">
    <div id="top">
            
            <div class="link">
                <div class="nav">
                    <ul>
                        <li><a href="/">Trang chủ</a></li>
                        <li>&nbsp;>&nbsp;</li>
                        <li><a href="">Thuốc</a></li>
                    </ul> 
                    
                </div>
                
                  <div >
                    <h1 >{!!$thuoc['description']!!}</h1>
                  </div>
          
                
            </div> 
    </div><!-- #top -->
    
    <div id="aside-medic">
                
                <a href="#show-all" class="active"><i class="fa fa-list-ul fa-fw" aria-hidden="true"></i> Hiển thị tất cả</a>

                @if($thuoc['guide']!='')
                    <a class="btn-scroll-to" data-id="#huong-dan-su-dung"><i class="fa fa-file-text fa-fw" aria-hidden="true"></i> Hướng dẫn sử dụng</a>
                     @else
                @endif 
                @if($thuoc['info_drugs']!='')         
                    <a class="btn-scroll-to" data-id="#thong-tin-duoc-chat" class="hide-other-trigger"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i> Thông tin dược chất</a>
                @else
                @endif 
                @if($thuoc['contraindication_medicine']!='')  
                    <a class="btn-scroll-to" data-id="#chong-chi-dinh" class="hide-other-trigger"><i class="fa fa-times fa-fw" aria-hidden="true"></i> Chống chỉ định</a>
                           @else
                @endif  
                @if($thuoc['side_effect_medicine']!='')
                    <a class="btn-scroll-to" data-id="#tac-dung-phu" class="hide-other-trigger"><i class="fa fa-meh-o fa-fw" aria-hidden="true"></i> Tác dụng phụ</a>
                                  @else
                @endif  
                @if($thuoc['careful_medicine']!='')
                    <a class="btn-scroll-to" data-id="#luu-y" class="hide-other-trigger"><i class="fa fa-sticky-note fa-fw" aria-hidden="true"></i> Lưu ý</a>
                                   @else
                @endif 
                @if($thuoc['overdose_medicine']!='')
                    <a class="btn-scroll-to" data-id="#qua-lieu" class="hide-other-trigger"><i class="fa fa-frown-o fa-fw" aria-hidden="true"></i> Quá liều</a>
                                   @else
                @endif 
               @if($thuoc['preservation_medicine']!='')
                    <a class="btn-scroll-to" data-id="#bao-quan" class="hide-other-trigger"><i class="fa fa-medkit fa-fw" aria-hidden="true"></i> Bảo quản</a>
                                   @else
                @endif 
                @if($thuoc['interactive_medicine']!='')
                              <a class="btn-scroll-to" data-id="#tuong-tac" class="hide-other-trigger"><i class="fa fa-magic fa-fw" aria-hidden="true"></i> Tương tác</a>
                                             @else
                @endif 
            
    </div><!--Aside-->
   <div class="content">
       @if($thuoc->image!==null)
        <section class="sec">
            <h2 id="hinh-anh-thuoc" class="header collapse-trigger"><i class="fa fa-picture-o" aria-hidden="true"></i> <span>Hình ảnh thuốc</span><i id="show" class="fa fa-angle-right" aria-hidden="true"></i><i id="hide" class="fa fa-angle-down" aria-hidden="true"></i></h2>
            <div class="item medic2" style="clear:both">
                <img src="{{$thuoc->image}}" alt="" data-style="background-image: url(https://dwbxi9io9o7ce.cloudfront.net/images/14_11_2016_02_26_42_635132.jpeg);" class="image full-sized-image-trigger" style="width: 150px;">
            </div>           
                                       
        </section>
        @endif
      <section class="sec" data-isshow="0">
          <h2>
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
              <span>Tóm tắt thuốc</span>
              <i id="show" class="fa fa-angle-right" aria-hidden="true"></i><i id="hide" class="fa fa-angle-down" aria-hidden="true"></i>
          </h2>
          <div class="body">
                <div class="medic2">
                    <h4>Số đăng ký: </h4>
                    {{$thuoc['registered_number']}}
                </div>
                <div class="medic2">
                    <h4>Đóng gói: </h4>
                    {{$thuoc['packing']}}
                </div>
                <div class="medic2">
                    <h4>Tiêu chuẩn: </h4>
                    {{$thuoc['standard']}}
                </div>
                <div class="medic2">
                    <h4>Tuổi thọ: </h4>
                   {{$thuoc['duration']}}
                </div>
              @if(!empty($thuoc->production_company))
                <div class="medic2">
                    <h4>Công ty sản xuất: </h4>
                    {{$thuoc['production_company']}}
                </div>
              @endif
                <div class="medic2">
                    <h4>Quốc gia sản xuất: </h4>
                    {{$thuoc['production_country']}}
                </div>
                <div class="medic2">
                    <h4>Công ty đăng ký: </h4>
                    {{$thuoc['register_company']}}
                </div>
                <div class="medic2">
                    <h4>Quốc gia đăng ký: </h4>
                    {{$thuoc['register_company']}}
                </div>
                <div class="medic2">
                    <h4>Loại thuốc: </h4>
                   {{$thuoc['type_medicine']}}
                </div>
          </div>
      </section>
       @if($thuoc->guide!="")
          <section class="sec" data-isshow="0">
              <h2 id="huong-dan-su-dung" class="header collapse-trigger"><i class="fa fa-file-text fa-fw" aria-hidden="true"></i> <span>Hướng dẫn sử dụng</span><i id="show" class="fa fa-angle-right" aria-hidden="true"></i><i id="hide" class="fa fa-angle-down" aria-hidden="true"></i></h2>

              <div class="medic2">
                  {!!$thuoc['guide']!!}
              </div>
          </section>           
        @endif
        <section class="sec" data-isshow="0">
              <h2 id="thong-tin-duoc-chat" class="header collapse-trigger">
                  <i class="fa fa-pencil fa-fw " aria-hidden="true"></i> <span>Thông tin về dược chất <a href=""></a><i id="show" class="fa fa-angle-right" aria-hidden="true"></i><i id="hide" class="fa fa-angle-down" aria-hidden="true"></i></span>
              </h2>

              <div class="medic2">
                 
                {!!$thuoc['info_drugs']!!}
              </div>
          </section>
      
          <section class="sec" data-isshow="0">
              <h2 id="chong-chi-dinh" class="header collapse-trigger"><i class="fa fa-times fa-fw" aria-hidden="true"></i> <span>Chống chỉ định</span><i id="show" class="fa fa-angle-right" aria-hidden="true"></i><i id="hide" class="fa fa-angle-down" aria-hidden="true"></i></h2>

              <div class="medic2" >
                 {!!$thuoc['contraindication_medicine']!!}

              </div>
          </section>
      
          <section class="sec" data-isshow="0">
              <h2 id="tac-dung-phu" class="header collapse-trigger"><i class="fa fa-meh-o fa-fw" aria-hidden="true"></i> <span>Tác dụng phụ</span><i id="show" class="fa fa-angle-right" aria-hidden="true"></i><i id="hide" class="fa fa-angle-down" aria-hidden="true"></i></h2>

              <div class="medic2" >
                  {!!$thuoc['side_effect_medicine']!!}

              </div>
          </section>
      
          <section class="sec" data-isshow="0">
              <h2 id="luu-y" class="header collapse-trigger"><i class="fa fa-sticky-note fa-fw" aria-hidden="true"></i> <span>Lưu ý</span><i id="show" class="fa fa-angle-right" aria-hidden="true"></i><i id="hide" class="fa fa-angle-down" aria-hidden="true"></i></h2>

              <div class="medic2" >
                  <h4>1. Thận trọng:</h4>

                   {!!$thuoc['careful_medicine']!!}
              </div>
          </section>
      
         <section class="sec" data-isshow="0">
              <h2 id="qua-lieu" class="header collapse-trigger"><i class="fa fa-frown-o fa-fw" aria-hidden="true"></i> <span>Quá liều</span><i id="show" class="fa fa-angle-right" aria-hidden="true"></i><i id="hide" class="fa fa-angle-down" aria-hidden="true"></i></h2>

              <div class="medic2" >
                  {!!$thuoc['overdose_medicine']!!}

              </div>
          </section>
      
          <section class="sec" data-isshow="0">
              <h2 id="bao-quan" class="header collapse-trigger"><i class="fa fa-medkit fa-fw" aria-hidden="true"></i> <span>Bảo quản</span><i id="show" class="fa fa-angle-right" aria-hidden="true"></i><i id="hide" class="fa fa-angle-down" aria-hidden="true"></i></h2>

              <div class="medic2" >
                   {!!$thuoc['preservation_medicine']!!}

              </div>
          </section>

          <section class="sec" data-isshow="0">
              <h2 id="tuong-tac" class="header collapse-trigger"><i class="fa fa-magic fa-fw" aria-hidden="true"></i> <span>Tương tác</span><i id="show" class="fa fa-angle-right" aria-hidden="true"></i><i id="hide" class="fa fa-angle-down" aria-hidden="true"></i></h2>

              <div class="medic2" >
                   {!!$thuoc['interactive_medicine']!!}

              </div>
          </section>
     
   </div>

</div>
@endsection