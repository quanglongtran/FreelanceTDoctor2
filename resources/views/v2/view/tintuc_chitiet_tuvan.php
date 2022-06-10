<div class="form-question" style="">
    <div class="bac-si-tu-van">
        <img src="https://tdoctor.vn/public/images/doctor/5352735drnguyenhongvankhanh.jpg" alt="Tư vấn">
    </div>
    <h3>TƯ VẤN CÁC BỆNH TIÊU HOÁ Ở TRẺ</h3>
    <p>Bác sĩ, Thạc sĩ Nguyễn Hồng Vân Khánh<br>
Phó khoa gan mật tuỵ - ghép gan<br>
Bệnh viện Nhi Đồng 2 HCM
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
        <?php $art = App\Article::Where('catalog_id',4)->orderBy('created_at','DESC')->take(2)->get();
        foreach ($art as $index => $ar){ 
        echo '<li><a href="/'.$ar->article_url.'-'.$ar->article_id.'.html">'.$ar['article_title'].'</a></li>';
        } ?>
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
<!------------------------>

<div class="form-question" style="">
    <div class="bac-si-tu-van">
        <img src="https://tdoctor.vn/public/images/doctor/drhoanganhtien.jpg" alt="Tư vấn">
    </div>
    <h3>HỖ TRỢ BỆNH NHÂN TIM MẠCH</h3>
    <p>PGS.TS.BS.Hoàng Anh Tiến<br>
Phó Giám đốc Trung tâm Tim mạch, Phó Trưởng Khoa Nội Tim mạch<br>

BỆNH VIỆN TRƯỜNG ĐẠI HỌC Y DƯỢC HUẾ
    </p>
    <form action="../hoibacsi/datcauhoi?ref_type=2&ref_code=88909&speciality_id=19">
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
         <?php $art = App\Article::Where('catalog_id',19)->orderBy('created_at','DESC')->take(2)->get();
        foreach ($art as $index => $ar){ 
        echo '<li><a href="/'.$ar->article_url.'-'.$ar->article_id.'.html">'.$ar['article_title'].'</a></li>';
        } ?>
    </ol>
</div>
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
<!------------------------>