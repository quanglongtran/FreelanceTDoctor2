@extends('v2/structor/mainv3',[
'title'=> 'Danh sách đối tác',
'description' =>'Danh sách đối tác', 
'url' => '../../ds-doi-tac',
'meta_author' => 'Tdoctor'
])
@section('content')
<style type="text/css">
.cashback-title .in-img {
    width: 30px;
    vertical-align: -25%;
}
.cbs-img {
    width: 60px;
    height: 60px;
    padding: 0;
    overflow: hidden;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    position: relative;
}
.cbs-img img {
    position: absolute;
    -webkit-transform: translate(-50%,-50%);
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.cbs-item {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -ms-flex-flow: row nowrap;
    flex-flow: row nowrap;
    padding: 10px;
    background: #fff;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    border: 1px solid #e0e0e0;
    border-radius: 6px;
    margin-bottom: 20px;
    position: relative;
    cursor: pointer;
    -webkit-transition: .35s;
    transition: .35s;
}
.cbs-content {
    padding: 0 12px;
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
    min-width: 0;
}
.cbs-content .name {
    font-size: 14px;
    color: #06c;
    font-weight: 700;
    margin-bottom: 3px;
}
.cbs-content .sub {
    font-size: 12px;
    line-height: 16px;
    color: #9e9e9e;
}
.col-auto {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    width: auto;
    max-width: 100%;
}
.cashback-title .dash {
    height: 1px;
    width: 100%;
    background: #e0e0e0;
}

.cashback-title {
    margin-bottom: 15px;
    position: relative;
}
h3.in.mb-0 {
    line-height: 32px;
}
.sm-gutters.row>.col, .sm-gutters.row>[class*=col-] {
    padding-right: 5px;
    padding-left: 5px;
}
</style>
<!-- begin main -->
<main>
        <div class="top-banner">
            <div class="container">
                <div class="banner__inner">
                    <img src="../../public/v3/assets/image/banner.jpg" alt="Khám bệnh online với bác sĩ Tdoctor.vn">
                </div>
            </div>
        </div>

        <div class="detail-page">
            <section class="cashback-section ng-scope" ng-controller="BrandBlockCtrl">
        <div class="container">

            <div class="cashback-block ">


                <div class="cashback-title ">
                    <div class="row sm-gutters align-items-center">
                        <div class="col-auto">
                            <h3 class="in mb-0">
                                    <img class="img-fluid in-img" src="https://img.mservice.io/momo_app_v2/img/HoangLe/ic_fl_sieu_thi@3x.png" alt="Cửa hàng tiện lợi">
                                Danh sách đối tác
                            </h3>
                        </div>
                        <div class="col">
                            <div class="dash"></div>
                        </div>

                            <!-- <div class="col-auto">
                                <a href="https://momo.vn/doi-tac/cua-hang-tien-loi" class="btn btn-blue btn-sm rounded px-3">Xem thêm</a>
                            </div> -->
                    </div>
                </div>


                <div class="row md-gutters">
                    @foreach($ds_doitac as $doitac)
                    <div class="col-lg-4 col-sm-6 col-xs-6 ">
                        <a href="{{$doitac->url}}">
                            <div class="cbs-item ">
                                <div class="cbs-img">
                                    <img src="{{$doitac->hinhanh}}" class="img-fluid" alt="{{$doitac->tieude}}">
                                </div>
                                <div class="cbs-content">
                                    <h4 class="name text-truncate">
                                        {{$doitac->tieude}}
                                    </h4>
                                    <div class="sub ">
                                        {{$doitac->mota}} 
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach

                </div>


            </div>

        </div>
    </section>
        </div>
    </main>
<!-- end main -->
@endsection
