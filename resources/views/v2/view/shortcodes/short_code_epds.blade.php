<?php
if(!function_exists('in_ra_danh_sach_cau_hoi_epds')){
function in_ra_danh_sach_cau_hoi_epds($id){
	if($id==1){ ?>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="0">Vẫn như trước</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="1">Ít hơn</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="2">Chắc chắn là ít hơn</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="3">Không bao giờ</label></div>
	<?php }
	if($id==2){ ?>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="0">Vẫn như trước</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="1">Ít hơn trước</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="2">Chắc chắn là ít hơn trước</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="3">Gần như là không có</label></div>
	<?php }	
	if($id==4){ ?>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="0">Không, không bao giờ</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="1">Hầu như không bao giờ</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="2">Có, đôi khi</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="3">Có, rất thường</label></div>
   	<?php
	}

	if($id==3 || $id==7 || $id==8 || $id ==9){ ?>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="3">Có, hầu như lúc nào cũng vậy</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="2">Có, khá thường</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="1">Không thường lắm</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="0">Không, không bao giờ</label></div>
   	<?php
	}
	if($id==5){ ?>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="3">Có, khá nhiều</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="2">Có, đôi khi</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="1">Không, không nhiều</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="0">Không, không bao giờ</label></div>
   	<?php
	}	
	if($id==6){ ?>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="3">Có, tôi hầu như không đối phó nổi</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="2">Có, đôi khi tôi không thể đối phó được hiệu quả như mọi khi</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="1">Không, tôi hầu như đã đối phó được khá hiệu quả</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="0">Không, tôi vẫn đối phó hiệu quả như mọi khi</label></div>
   	<?php
	}
	if($id==10){ ?>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="3">Có, khá thường</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="2">Thỉnh thoảng</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="1">Hầu như không bao giờ</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="0">Không bao giờ</label></div>
   	<?php
	}	
}
function short_code_epds(){
	ob_start();
?>
<style type="text/css">.question .title {
    font-size: inherit;
    margin: 0;
    padding: 0;
    color: #ff0000;
    font-weight: 600;
    margin: 15px 0;
}.ket-qua-danh-gia h3{
    color: red;
}

.question .answer {
    padding: 0;
}

.question .answer input {
    margin-right: 5px;
}</style>
<script type="text/javascript">
jQuery(document).ready(function($){
	$('.wpt_test_form-epds').submit(function(event){
		event.preventDefault();
		var total_point = 0;
		$('.wpt_test_form-epds .answer input:checked').each(function(){
			total_point = total_point + parseInt($(this).val());
		});
		$('.diem-so-epds-value').text('Điểm số Trầm cảm sau sinh Edinburgh (EPDS): '+total_point);
		// alert(total_point);
		$('.ket-qua-epds').show();
		$('.muc-do-result').hide();
		if(total_point <= 9){
			$('.ket-qua-epds .muc-do-1').show();
		}
		if(total_point >= 10 && total_point <= 12){
			$('.ket-qua-epds .muc-do-2').show();
		}
		if(total_point >= 13){
			$('.ket-qua-epds .muc-do-3').show();
		}
	});
})
</script>

<div class="wpt_test fill_form">
<div class="content">	
<h4 style="text-align: justify;"><strong>Thang đánh giá Trầm cảm sau sinh Edinburgh (EPDS).</strong></h4>
<p style="text-align: justify;"><strong>Vì bà đang mang thai hoặc vừa sinh con nên chúng tôi muốn biết bà cảm thấy thế nào. Hãy chọn câu trả lời phù hợp nhất với cảm giác của bà trong 7 ngày qua chứ không phải chỉ cảm giác của bà trong ngày hôm nay. Trong thí dụ dưới đây, “X” có nghĩa là “Tôi hầu như lúc nào cũng cảm thấy vui vẻ trong suốt tuần qua.”</strong><br>
<strong>THÍ DỤ: Tôi cảm thấy vui vẻ</strong><br>
<strong>____ Vâng, lúc nào cũng vậy</strong><br>
<strong>__X_ Vâng, hầu như lúc nào cũng vậy</strong><br>
<strong>____ Không, không thường lắm</strong><br>
<strong>____ Không, không bao giờ</strong><br>
<strong>Xin trả lời các câu hỏi sau đây theo cách trên.</strong><br>
<span style="color: #ff0000;"><strong>Trong 7 ngày qua:</strong></span></p>
</div>
<div class="content">
<form method="post" class="wpt_test_form wpt_test_form-epds">
<?php 
$danh_sach_epds = array(
'Tôi có thể cười và thấy được khía cạnh khôi hài của sự việc',
'Tôi đã hân hoan đón nhận mọi việc',
'Tôi đã tự đổ lỗi cho mình khi chuyện xảy ra không như ý',
'Tôi đã lo âu hoặc lo ngại một cách vô lý',
'Tôi đã cảm thấy sợ hãi hoặc hốt hoảng một cách vô lý',
'Mọi việc đã trở nên quá sức chịu đựng của tôi',
'Tôi đã buồn bực đến mức bị khó ngủ',
'Tôi đã cảm thấy buồn hoặc khổ sở',
'Tôi đã buồn bực đến mức phải khóc',
'Tôi đã từng nghĩ đến chuyện tự làm hại bản thân',
);
foreach($danh_sach_epds as $epds_key => $epds){
?>
<div class="question">
   <div class="title"><span class="number"><?php echo ($epds_key+1); ?>.</span><span class="title"> <?php echo $epds; ?></span></div>
   <?php echo in_ra_danh_sach_cau_hoi_epds($epds_key+1); ?>
</div>
<?php } ?>
<p><input type="submit" class="button btn btn-primary" value="Xem kết quả"></p>
<p><input type="hidden" name="passer_action" value="process-form"></p></form>
</div>
</div>
<div class="ket-qua-danh-gia ket-qua-epds" style="display:none;">
	<h3 class="diem-so-epds-value">Điểm số Trầm cảm sau sinh Edinburgh (EPDS): </h3>
	<h3>Kết quả: 
		<span class="muc-do-result muc-do-1" style="display:none;">Bình thường</span>
		<span class="muc-do-result muc-do-2" style="display:none;">Buồn sau sinh (baby blues).</span>
		<span class="muc-do-result muc-do-3" style="display:none;">Trầm cảm</span>
	</h3>
	<p>* Chú ý: Trắc nghiệm này chỉ có ý nghĩa tầm soát. Chẩn đoán xác định nên được thực hiện bởi bác sĩ chuyên khoa, sau khi đã hỏi bệnh và thăm khám, bao gồm việc đánh giá mức độ suy giảm chức năng của bệnh nhân.</p>
</div>
<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
 }}