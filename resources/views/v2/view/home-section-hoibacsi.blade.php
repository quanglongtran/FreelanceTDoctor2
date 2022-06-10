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
">{{$configs[4]->content}}</h2>
	<div class="box-hoibacsi-section">
		<img src="{{$configs[5]->content}}" alt="hoi bac si" style="
		    float: left;
		    margin-right: 10px;
		    max-width: 85px;
		">
		<div class="box-hoibaci-section-right">
		    <!-- <a href="https://tdoctor.vn/bacsi65976"><h3>Bác sĩ, Thạc sĩ Nguyễn Hồng Vân Khánh</h3></a>
		    <p>Phó khoa Tiêu Hoá</p>
			<p>Bệnh viện Nhi Đồng 2 HCM
		    </p> -->
		    {!!\App\Helpers\UploadFileHelper::correctPath($configs[6]->content)!!}
		</div>
	    <div style="clear: both;"></div>
	</div>
	<div class="text-center">
    	<a class="btn btn-primary" href="{{$configs[7]->content}}" style="
    margin-bottom: 6px;
    margin-top: 8px;
">Hỏi bác sĩ</a>
    </div><div class="text-center">
    	{!!\App\Helpers\UploadFileHelper::correctPath($configs[8]->content)!!}
    </div>
</div>