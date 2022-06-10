<div class="col-sm-12 chi-hien-thi-mobile">
<div class="form-question" style="">
    <div class="bac-si-tu-van">
        <img src="https://tdoctor.vn/public/images/doctor/5352735drnguyenhongvankhanh.jpg" alt="Bác sĩ, Thạc sĩ Nguyễn Hồng Vân Khánh">
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
        <?php $art = App\Article::Where('catalog_id',4)->orderBy('created_at','DESC')->take(2)->get(); ?>
        @foreach ($art as $index => $ar)
        <li><a href="/{{$ar->article_url}}-{{$ar->article_id}}.html">{{$ar['article_title']}}</a></li>
        @endforeach
    </ol>
</div>
</div>
