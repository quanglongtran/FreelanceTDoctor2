<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>content-detail-page</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="../public/v3/fontawesome-free-6.0.0-beta2-web/css/all.css" rel="stylesheet"> <!--load all styles -->
        <!-- slick slider     -->
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

    <!-- slick slider     -->

    <link rel="stylesheet" href="public/v3/assets/style/common.css" type="text/css">
    <link rel="stylesheet" href="public/v3/assets/style/style.css" type="text/css">
    <link rel="stylesheet" href="public/v3/assets/style/bun.css" type="text/css">

    <style type="text/css">
        



    </style>

</head>

<body>
    <header>
        <!-- add more -->
        <div class="banner-header__sp">
            <img src="public/v3/assets/image/banner_topbar@2x.jpg" alt="">
        </div>
        <!-- add more -->
        <div class="top-header">
            <div class="container h-100">
                <div class="header__top d-flex align-items-lg-stretch h-100">
                    <nav class="h-100">
                        <ul class="nav__list show  d-flex h-100 align-items-center">
                            <li><a href="#">Trang chủ</a></li>
                            <li><a href="#">Tin tức</a></li>
                            <li><a href="#">Hỏi đáp miễn phí</a></li>
                            <li><a href="#">Bác sĩ</a></li>
                            <li><a href="#">Cơ sở Y tế</a></li>
                            <li><a href="#">Nhà thuốc</a></li>
                            <li><a href="#">Bệnh</a></li>
                            <li><a href="#">Thuốc</a></li>
                            <li><a href="#">Tuyển dụng</a></li>
                        </ul>
                    </nav>
                    <div class="top__header-r d-flex align-items-center">
                        <div class="login-register d-flex align-center">
                            <span class="login">Đăng nhập</span>
                            <span class="register">Đăng ký</span>
                        </div>
                        <div class="language d-flex align-items-center">
                            <img src="public/v3/assets/image/vn.png" alt="">
                            <span>Tiếng Việt</span>
                            <img src="public/v3/assets/image/Icon-down.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-header">
            <div class="container">
                <div class="header-bt d-flex">
                    <div class="logo">
                        <a href="#">
                            <img src="public/v3/assets/image/logo.png" alt="">
                        </a>
                    </div>
                    <form class="input-search  search-f-sp">
                        <input type="text" placeholder="Tìm kiếm">
                        <img class="icon-sp" src="public/v3/assets/image/icon-search.png" alt="">
                        </form>
                    <div class="header__block">
                        <img src="public/v3/assets/image/check.png" alt="">
                        <span>Đặt khám online</span>
                    </div>
                    <div class="header__block">
                        <img src="public/v3/assets/image/Icon ionic-md-home.png" alt="">
                        <span>Dịch vụ tại nhà</span>
                    </div>
                    <div class="header__block block--bg">
                        <img src="public/v3/assets/image/comm.png" alt="">
                        <span>Đặt câu hỏi miễn phí</span>
                    </div>
                    <!-- add more -->
                    <div class="burger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    
                    <ul class="menu-sp nav__list">
                        <li><a href="#">Trang chủ</a></li>
                        <li><a href="#">Tin tức</a></li>
                        <li><a href="#">Hỏi đáp miễn phí</a></li>
                        <li><a href="#">Bác sĩ</a></li>
                        <li><a href="#">Cơ sở Y tế</a></li>
                        <li><a href="#">Nhà thuốc</a></li>
                        <li><a href="#">Bệnh</a></li>
                        <li><a href="#">Thuốc</a></li>
                        <li><a href="#">Tuyển dụng</a></li>
                    </ul>
                    <!-- add more -->
                </div>
            </div>
        </div>
    </header>

    <!-- end header -->

    <main>
        <div class="hoi-dap-bs pt-5">
            <section class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <img class="banner-image" src="../public/v3/images/banner-home.png" alt="Tdoctor.vn" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 pt-3 pb-3"><h2>Hỏi đáp với bác sĩ</h2></div>
                </div>                  
                <div class="row">
                    <div class="col-sm-6">
                        <div class="col-md-12x">             
                        <div class="rowx card-columns danh-sach-cau-hoi-moi">
                            <?php for($i = 0; $i< 10; $i++){ ?>
                            <div class="col-sm-6 mb-3 box-cau-hoi-trang-chu">
                                <a href="fsfdsf"><img class="mb-3" src="https://tdoctor.vn/public/images/4963"></a>
                                <a href="dfdsf">Chào bác sĩ. Tôi năm nay 22 tuổi. Chuyện là gia đình tôi có nuôi một bé mèo và bé mèo này bị bọ chét. Khi tôi lại ghế sofa nằm chỗ con mèo nằm thì một chặp, tôi đứng lên làm việc thì có cảm giác có gì đó xẹt qua tai, nên tôi lo lắng không biết có phải bọ chét nó chui vô tai hay không?
Vì cứ lo lắng nên tai tôi giờ cứ có cảm giác nhói, một phần xưa giờ tôi hay ngoáy tai mạnh nên cũng hay bị (bữa trước mới ra chút máu).
Vậy bây giờ tôi phải làm sao để biết rõ là mình có bị bọ chét chui vào tai hay không? Có cách nào nhận biết không ạ? Tôi cảm ơn.</a>
                                <hr>
                                <div class="thong-tin-bac-si">
                                    <a class="avatar-bac-si" href="fsfds"><img src="https://tdoctor.vn/public/images/doctor/872776543drnguyenngocminh.jpg"></a>
                                    <div class="box-ben-phai-thong-tin-bs">
                                        <span>Đã trả lời bởi:</span>
                                        <h4><a href="sd">Bác sĩ Lê Ngọc Vũ</a></h4>
                                        <div class="star-rating">
                                            <div class="back-stars">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>

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
                            </div>
                        <?php } ?>

                        </div>
                        </div>
                        <div class="bottom-danh-sach-cau-hoi-home">
                            <a class="header__block block--bg">
                                <span>Đặt câu hỏi miễn phí</span>
                            </a>
                            <a class="header__block block--bgx block-no-border">
                                <span>Xem tất cả câu hỏi ›</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 danh-sach-chuyen-muc">
                        <h4>Hơn <span>1000 Bác sĩ</span> đang sẵn sàng giúp đỡ bạn</h4>
                        <ul><?php for($i = 0; $i< 20; $i++){ ?>
                            <li>
                                <a href="">
                                    <img src="public/chuyenkhoa1.png" alt="">
                                    <span>Nhi khoa</span>
                                </a>
                            </li>
                        <?php } ?>
                        </ul>
                    </div>
                </div>
                
            </section>
        </div>

        <div class="detail-page">
            <div class="container">

                <div class="row">
                    <div class="col-12 col-lg-3">
                        <?php for($i = 0; $i< 4; $i++){ ?>
                        <div class="form-question">
                            <h3>Tư vấn đột quỵ, tai biến</h3>
                            <p>GS. TS. BS Nguyễn Văn Thông
                                Chủ tịch hội đột quỵ Việt Nam
                            </p>
                            <form action="">
                                <div class="form__control">
                                    <input type="text" placeholder="Họ và tên" class="form-control">
                                    <input type="number" placeholder="SĐT" class="form-control">
                                </div>
                                <div class="form__control">
                                    <textarea class="form-control" name="" id="" cols="30" rows="10"
                                        placeholder="Nhập nội dung câu hỏi">
                                    </textarea>
                                </div>
                                <button type="submit" class="btn btn-ct">Gửi câu hỏi</button>
                            </form>
                            <ol class="question-related">
                                <li><a href="#">TPHCM: Người đàn ông bị đột quỵ ngay tại bệnh viện</a></li>
                                <li><a href="#">5 sai lầm khiến người bị đột quỵ rơi vào nguy hiểm</a></li>
                            </ol>
                        </div>
                        <div class="aside-banner mt">
                            <img src="public/v3/assets/image/banner_qc.jpg" alt="">
                        </div>
                        <?php } ?>

                    </div>
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-12 col-lg-4 news-related-home">
                                <div class="news-related">
                                    <h3>Câu hỏi thường gặp</h3>
                                    <?php for($i = 0; $i< 3; $i++){ ?>
                                    <div class="new-related__item">
                                        <div class="img">
                                            <a href=""><img src="public/v3/assets/image/gettyimages-160158630-2@2x.jpg" alt=""></a>
                                        </div>
                                        <div class="new-item__desc">
                                            <p>Trong giai đoạn dịch hiện nay, nhiều địa phương đã bắt đầu chiến dịch tiêm
                                                chủng ngừa Covid cho cộng đồng. Các đối tượng 65 tuổi trở lên cũng như các
                                                đối tượng có bệnh nền mạn tính, trong đó có bệnh nền tim mạch là các nhóm ưu
                                                tiên tiêm chủng.
                                            </p>
                                            <a href="" class="date">Covit19</a>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <button class="doctor__item-more">
                                        <span>Xem thêm</span>
                                        <img src="public/v3/assets/image/loadmore-red.png" alt="">
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4 news-related-home">
                                <div class="news-related">
                                    <h3>Khám bệnh online</h3>
                                    <?php for($i = 0; $i< 3; $i++){ ?>
                                    <div class="new-related__item">
                                        <div class="img">
                                            <a href=""><img src="public/v3/assets/image/gettyimages-160158630-2@2x.jpg" alt=""></a>
                                        </div>
                                        <div class="new-item__desc">
                                            <p>Trong giai đoạn dịch hiện nay, nhiều địa phương đã bắt đầu chiến dịch tiêm
                                                chủng ngừa Covid cho cộng đồng. Các đối tượng 65 tuổi trở lên cũng như các
                                                đối tượng có bệnh nền mạn tính, trong đó có bệnh nền tim mạch là các nhóm ưu
                                                tiên tiêm chủng.
                                            </p>
                                            <a href="" class="date">Covit19</a>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <button class="doctor__item-more">
                                        <span>Xem thêm</span>
                                        <img src="public/v3/assets/image/loadmore-red.png" alt="">
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4 news-related-home">
                                <div class="news-related">
                                    <h3>Khám bệnh online</h3>
                                    <?php for($i = 0; $i< 3; $i++){ ?>
                                    <div class="new-related__item">
                                        <div class="img">
                                            <a href=""><img src="public/v3/assets/image/gettyimages-160158630-2@2x.jpg" alt=""></a>
                                        </div>
                                        <div class="new-item__desc">
                                            <p>Trong giai đoạn dịch hiện nay, nhiều địa phương đã bắt đầu chiến dịch tiêm
                                                chủng ngừa Covid cho cộng đồng. Các đối tượng 65 tuổi trở lên cũng như các
                                                đối tượng có bệnh nền mạn tính, trong đó có bệnh nền tim mạch là các nhóm ưu
                                                tiên tiêm chủng.
                                            </p>
                                            <a href="" class="date">Covit19</a>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <button class="doctor__item-more">
                                        <span>Xem thêm</span>
                                        <img src="public/v3/assets/image/loadmore-red.png" alt="">
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="row tin-tuc-trang-chu">
                            <div class="col-sm-12 new-related">                            
                                <h3>Tin tức</h3>
                                <div class="new__first">
                                    <a href="">
                                        <img src="public/v3/assets/image/high-blood-pressure-hypertension-symptoms_thumb@2x.jpg" alt="">
                                    </a>
                                    <h4><a href="">Làm sao để người bị cao huyết áp sống khỏe giữa mùa dịch?</a></h4>
                                </div>
                                <div class="new__list">
                                    <article class="new__item new__item-trang-chu">
                                        <a href=""><img src="public/v3/assets/image/heart@2x.jpg" alt=""></a>
                                        <h4><a href="">Bệnh nhân tim mạch ăn gì để khỏe trong mùa dịch?</a></h4>
                                    </article>
                                    <article class="new__item new__item-trang-chu">
                                        <a href=""><img src="public/v3/assets/image/heart@2x.jpg" alt=""></a>
                                        <h4><a href="">Bệnh nhân tim mạch ăn gì để khỏe trong mùa dịch?</a></h4>
                                    </article>
                                    <article class="new__item new__item-trang-chu">
                                        <a href=""><img src="public/v3/assets/image/heart@2x.jpg" alt=""></a>
                                        <h4><a href="">Bệnh nhân tim mạch ăn gì để khỏe trong mùa dịch?</a></h4>
                                    </article>
                                    <article class="new__item new__item-trang-chu">
                                        <a href=""><img src="public/v3/assets/image/heart@2x.jpg" alt=""></a>
                                        <h4><a href="">Bệnh nhân tim mạch ăn gì để khỏe trong mùa dịch?</a></h4>
                                    </article>

                                </div>
                                <button class="doctor__item-more">
                                    <span>Xem thêm</span>
                                    <img src="public/v3/assets/image/loadmore-red.png" alt="">
                                </button>

                            </div>
                        </div>
                        <div class="row tin-tuc-trang-chu">
                            <section class="new-related">
                                    <h3>Tin liên quan</h3>
                                    <?php for($i = 0; $i< 6; $i++){ ?>
                                    <div class="new-related__item">
                                        <a class="img__new">
                                            <img src="public/v3/assets/image/tphcm-cam-ket-se-chon-vac-xin-phu-hop-an-toan-va-hieu-qua-cho-nguoi-dan1631017606.jpg"
                                                alt="">
                                        </a>
                                        <div class="new__content">
                                            <h4 class="new__title">
                                                <a href="">Kết hợp Y học cổ truyền và Y học hiện đại trong điều
                                                    trị "COVID
                                                    kéo dài"
                                                </a>
                                            </h4>
                                            <p>"COVID kéo dài" ảnh hưởng lớn đến chất cuộc sống của người đã khỏi
                                                COVID-19. Việc kết
                                                hợp Y học cổ truyền và Y học hiện đại trong điều trị "COVID kéo dài" là
                                                phương pháp
                                                cần thiết, mang lại hiệu quả cao cho người bệnh.
                                            </p>
                                            <div class="date__cate">
                                                <p>08/09/2021 12:07 <span class="cate">Covid-19</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>

                                    <button class="doctor__item-more no-full">
                                        <span>Xem thêm</span>
                                        <img src="public/v3/assets/image/loadmore-red.png" alt="">
                                    </button>
                            </section>
                        </div>


                        <div class="row">
                            <section class="new-related box-bac-si-noi-bat col-12 col-sm-8">
                                    <h3>Bác sĩ nổi bật</h3>
                                    <?php for($i = 0; $i< 3; $i++){ ?>
                                    <div class="new-related__item">
                                        <a class="img__new">
                                            <img src="public/v3/assets/image/tphcm-cam-ket-se-chon-vac-xin-phu-hop-an-toan-va-hieu-qua-cho-nguoi-dan1631017606.jpg"
                                                alt="">
                                        </a>
                                        <div class="new__content">
                                            <h4 class="new__title">
                                                <a href="">Tiến sĩ bác sĩ Võ Nguyên Phong
                                                </a>
                                            </h4>
                                            <p>
                                                Nơi công tác đa khoa an ninh <br/>
                                                Nơi công tác đa khoa an ninh <br/>
                                                Nơi công tác đa khoa an ninh <br/>
                                            </p>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <button class="doctor__item-more no-full">
                                        <span>Xem thêm</span>
                                        <img src="public/v3/assets/image/loadmore-red.png" alt="">
                                    </button>
                                </section>
                                <div class="col-12 col-sm-4 new-related danh-sach-bac-si-chuyen-khoa">
                                    <div class="danh-sach-bac-si-chuyen-khoa-container">
                                        <h3>Danh sách bác sĩ chuyên khoa</h3>
                                        <ul><?php for($i = 0; $i< 20; $i++){ ?>
                                            <li><a href="">Chuyên khoa Nhi</a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                        </div>

                        <div class="row tin-tuc-trang-chu video-trang-chu">
                            <div class="col-sm-12 new-related">                            
                                <h3>Video</h3>
                                <div class="new__first">
                                    <a href="">
                                        <img src="public/v3/assets/image/high-blood-pressure-hypertension-symptoms_thumb@2x.jpg" alt="">
                                    </a>
                                    <h4><a href="">Làm sao để người bị cao huyết áp sống khỏe giữa mùa dịch?</a></h4>
                                </div>
                                <div class="new__list">
                                    <article class="new__item new__item-trang-chu">
                                        <a href=""><img src="public/v3/assets/image/heart@2x.jpg" alt=""></a>
                                        <h4><a href="">Bệnh nhân tim mạch ăn gì để khỏe trong mùa dịch?</a></h4>
                                    </article>
                                    <article class="new__item new__item-trang-chu">
                                        <a href=""><img src="public/v3/assets/image/heart@2x.jpg" alt=""></a>
                                        <h4><a href="">Bệnh nhân tim mạch ăn gì để khỏe trong mùa dịch?</a></h4>
                                    </article>
                                    <article class="new__item new__item-trang-chu">
                                        <a href=""><img src="public/v3/assets/image/heart@2x.jpg" alt=""></a>
                                        <h4><a href="">Bệnh nhân tim mạch ăn gì để khỏe trong mùa dịch?</a></h4>
                                    </article>
                                    <article class="new__item new__item-trang-chu">
                                        <a href=""><img src="public/v3/assets/image/heart@2x.jpg" alt=""></a>
                                        <h4><a href="">Bệnh nhân tim mạch ăn gì để khỏe trong mùa dịch?</a></h4>
                                    </article>

                                </div>
                                <button class="doctor__item-more no-full">
                                    <span>Xem thêm</span>
                                    <img src="public/v3/assets/image/loadmore-red.png" alt="">
                                </button>

                            </div>
                        </div>


                        <div class="row">
                            <section class="new-related box-bac-si-noi-bat phan-hoi-tu-benh-nhan col-12 col-sm-8">
                                    <h3>Phản hồi từ bệnh nhân</h3>
                                    <?php for($i = 0; $i< 3; $i++){ ?>
                                    <div class="new-related__item">
                                        <a class="img__new">
                                            <img src="public/v3/assets/image/tphcm-cam-ket-se-chon-vac-xin-phu-hop-an-toan-va-hieu-qua-cho-nguoi-dan1631017606.jpg"
                                                alt="">
                                        </a>
                                        <div class="new__content">
                                            <h4 class="new__title">
                                                <a href="">Duy Nguyễn Nhất
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
                                    <?php } ?>
                                </section>
                                <div class="col-12 col-sm-4 new-related danh-sach-bac-si-chuyen-khoa">                                    
                                    <img src="public/v3/assets/image/phan-hoi-tu-benh-nhan.png" alt="">
                                </div>
                        </div>
                    </div>                   

                </div>
            </div>
        </div>

        <div class="box-htv9">
            <img src="https://img.youtube.com/vi/RVXhz_dJKnY/maxresdefault.jpg">
        </div>
        <div class="thong-ke-he-thong">
            <div class="container">
                <div class="has-bg clr row">
                    <div class="span col-sm-2 m alone text-center">
                        <h5 class="counter ctr1" data-count="200">200</h5>
                        <em>Phòng khám</em></div>
                    <div class="span  col-sm-2 m alone text-center">
                        <h5 class="counter ctr2" data-count="1296">1296</h5>
                        <em>Bác sĩ</em></div>
                    <div class="span  col-sm-2 m alone text-center">
                        <h5 class="counter ctr3" data-count="101">101</h5>
                        <em>Nhà thuốc</em></div>
                    <div class="span  col-sm-2 m alone text-center">
                        <h5 class="counter ctr4" data-count="14331">14331</h5>
                        <em>Bệnh nhân</em></div>
                    <div class="span  col-sm-2 m alone text-center">
                        <h5 class="counter ctr4" data-count="4545">4545</h5>
                        <em>Câu hỏi</em></div>
                    <div class="span  col-sm-2 m alone text-center">
                        <h5 class="counter ctr4" data-count="4433">4433</h5>
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
                                Giới thiệu App Tdoctor
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container container-slider">
                <div class="">                    
                    <div class="row doctor">
                        <div class="slider__doctor">
                            <div class="item">
                                <a href="">
                                    <img src="public/v3/assets/image/gt1-kiem-tra-nhip-tim.png" alt="">
                                </a>
                            </div>
                            <div class="item">
                                <a href="">
                                    <img src="public/v3/assets/image/gt2-huyet-ap.png" alt="">
                                </a>
                            </div>
                            <div class="item">
                                <a href="">
                                    <img src="public/v3/assets/image/gt3-duong huyet.png" alt="">
                                </a>
                            </div>
                            <div class="item">
                                <a href="">
                                    <img src="public/v3/assets/image/gt4-nhu cau nuoc.png" alt="">
                                </a>
                            </div>
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
                                <div class="col-sm-6">
                                    <a target="_blank" href="https://apps.apple.com/us/app/tdoctor/id1443310734"><img loading="lazy" data-src="public/v2/img/appstore.svg" alt="" src="public/v2/img/appstore.svg"></a>
                                </div>
                                <div class="col-sm-6">
                                    <a target="_blank" href="https://play.google.com/store/apps/details?id=com.app.khambenh.bacsiviet"><img loading="lazy" data-src="public/v2/img/playstore.svg" alt="" src="public/v2/img/playstore.svg"></a>
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
                                <div class="col-sm-6">
                                    <a target="_blank" href="https://apps.apple.com/vn/app/tdoctor-for-doctor/id1555758280"><img loading="lazy" data-src="public/v2/img/appstore.svg" alt="" src="public/v2/img/appstore.svg"></a>
                                </div>
                                <div class="col-sm-6">
                                    <a target="_blank" href="https://play.google.com/store/apps/details?id=com.app.khambenh.doctor"><img loading="lazy" data-src="public/v2/img/playstore.svg" alt="" src="public/v2/img/playstore.svg"></a>
                                </div>
                            </div>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="chuyen-muc-tin-tuc">
            <div class="container container-slider new-related">               
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <h3>Tin liên quan</h3>
                        <?php for($i = 0; $i< 3; $i++){ ?>
                        <div class="new-related__item">
                            <a class="img__new">
                                <img src="public/v3/assets/image/tphcm-cam-ket-se-chon-vac-xin-phu-hop-an-toan-va-hieu-qua-cho-nguoi-dan1631017606.jpg"
                                    alt="">
                            </a>
                            <div class="new__content">
                                <h4 class="new__title">
                                    <a href="">Kết hợp Y học cổ truyền và Y học hiện đại trong điều
                                        trị "COVID
                                        kéo dài"
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <h3>Tin liên quan</h3>
                        <?php for($i = 0; $i< 3; $i++){ ?>
                        <div class="new-related__item">
                            <a class="img__new">
                                <img src="public/v3/assets/image/tphcm-cam-ket-se-chon-vac-xin-phu-hop-an-toan-va-hieu-qua-cho-nguoi-dan1631017606.jpg"
                                    alt="">
                            </a>
                            <div class="new__content">
                                <h4 class="new__title">
                                    <a href="">Kết hợp Y học cổ truyền và Y học hiện đại trong điều
                                        trị "COVID
                                        kéo dài"
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <h3>Tin liên quan</h3>
                        <?php for($i = 0; $i< 3; $i++){ ?>
                        <div class="new-related__item">
                            <a class="img__new">
                                <img src="public/v3/assets/image/tphcm-cam-ket-se-chon-vac-xin-phu-hop-an-toan-va-hieu-qua-cho-nguoi-dan1631017606.jpg"
                                    alt="">
                            </a>
                            <div class="new__content">
                                <h4 class="new__title">
                                    <a href="">Kết hợp Y học cổ truyền và Y học hiện đại trong điều
                                        trị "COVID
                                        kéo dài"
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <h3>Tin liên quan</h3>
                        <?php for($i = 0; $i< 3; $i++){ ?>
                        <div class="new-related__item">
                            <a class="img__new">
                                <img src="public/v3/assets/image/tphcm-cam-ket-se-chon-vac-xin-phu-hop-an-toan-va-hieu-qua-cho-nguoi-dan1631017606.jpg"
                                    alt="">
                            </a>
                            <div class="new__content">
                                <h4 class="new__title">
                                    <a href="">Kết hợp Y học cổ truyền và Y học hiện đại trong điều
                                        trị "COVID
                                        kéo dài"
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <h3>Tin liên quan</h3>
                        <?php for($i = 0; $i< 3; $i++){ ?>
                        <div class="new-related__item">
                            <a class="img__new">
                                <img src="public/v3/assets/image/tphcm-cam-ket-se-chon-vac-xin-phu-hop-an-toan-va-hieu-qua-cho-nguoi-dan1631017606.jpg"
                                    alt="">
                            </a>
                            <div class="new__content">
                                <h4 class="new__title">
                                    <a href="">Kết hợp Y học cổ truyền và Y học hiện đại trong điều
                                        trị "COVID
                                        kéo dài"
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <h3>Tin liên quan</h3>
                        <?php for($i = 0; $i< 3; $i++){ ?>
                        <div class="new-related__item">
                            <a class="img__new">
                                <img src="public/v3/assets/image/tphcm-cam-ket-se-chon-vac-xin-phu-hop-an-toan-va-hieu-qua-cho-nguoi-dan1631017606.jpg"
                                    alt="">
                            </a>
                            <div class="new__content">
                                <h4 class="new__title">
                                    <a href="">Kết hợp Y học cổ truyền và Y học hiện đại trong điều
                                        trị "COVID
                                        kéo dài"
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-don-vi-lien-ket">
            <div class="container new-related">
                <img src="public/v3/assets/image/don-vi-lien-ket.png">
            </div>
        </div>


    </main>

    <!-- end main -->
    <footer>
        <div class="container">
            <div class="row row__pd">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="footer__block">
                        <h3>TDOCTOR</h3>
                        <ul class="menu__footer">
                            <li><a href="">Về chúng tôi</a></li>
                            <li><a href="">Liên hệ</a></li>
                            <li><a href="">Quy trình giải quyết tranh chấp</a></li>
                            <li><a href="">Chính sách bảo mật thông tin</a></li>
                            <li><a href="">Đăng ký bác sĩ</a></li>
                            <li><a href="">Đăng ký phòng khám</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="footer__block">
                        <h3>LIÊN HỆ</h3>
                        <ul class="social__list-f">
                            <li>
                                <a href="" class="d-flex align-items-center">
                                    <img src="public/v3/assets/image/fb.png" alt="">
                                    <span>Facebook</span>
                                </a>
                            </li>
                            <li>
                                <a href="" class="d-flex align-items-center">
                                    <img src="public/v3/assets/image/logo-twitter-11549535419aik8i3pkro@2x.png" alt="">
                                    <span>Twitter</span>
                                </a>
                            </li>
                            <li>
                                <a href="" class="d-flex align-items-center">
                                    <img src="public/v3/assets/image/in2x.png" alt="">
                                    <span>Linkedin</span>
                                </a>
                            </li>
                            <li>
                                <a href="" class="d-flex align-items-center">
                                    <img src="public/v3/assets/image/ytb-footer.png" alt="">
                                    <span>Youtube</span>
                                </a>
                            </li>
                            <li>
                                <a href="" class="d-flex align-items-center">
                                    <img src="public/v3/assets/image/unnamed@2x.png" alt="">
                                    <span>Instagram</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-6">
                    <div class="footer__block">
                        <h3>ĐỊA CHỈ</h3>
                        <ul class="address__list">
                            <li>
                                <img src="public/v3/assets/image/add.png" alt="">
                                <span>Trụ sở chính: P.1108, tòa nhà Gold Tower, 275 Nguyễn Trãi, Thanh Xuân, Hà
                                    Nội</span>
                            </li>
                            <li>
                                <img src="public/v3/assets/image/add.png" alt="">
                                <span>Chi nhánh: Phòng 6.28, tòa nhà Everich Infinity, 290 An Dương Vương, phường 4,
                                    quận 5, Hồ Chí Minh</span>
                            </li>
                            <li>
                                <img src="public/v3/assets/image/mail.png" alt="">
                                <a href="">Email: tdoctorvn@gmail.com
                                </a>
                            </li>
                            <li>
                                <img src="public/v3/assets/image/check-blue.png" alt="">
                                <a href="">Nơi đăng ký: 7F Huỳnh Tấn Phát, Thị trấn Nhà Bè, Huyện Nhà Bè, Hồ Chí Minh</a>
                            </li>
                            <li>
                                <img src="public/v3/assets/image/phone-red.png" alt="">
                                <a href="">Hotline: +84 393 167 234
                                </a>
                            </li>
                            <li>
                                <img src="public/v3/assets/image/skype.png" alt="">
                                <a href="">Skype: netbotvn</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
        </script>
    <!-- slick slider js -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('.slider__doctor').slick({
                infinite: false,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            infinite: true,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    // {
                    //     breakpoint: 480,
                    //     settings: {
                    //         slidesToShow: 1,
                    //         slidesToScroll: 1
                    //     }
                    // }

                ]
            });
        });
    </script>

    <script src="public/v3/assets/js/main.js"></script>
</body>

</html>