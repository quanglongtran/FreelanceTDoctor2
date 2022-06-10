<?php
if(!function_exists('in_ra_danh_sach_cau_hoi_audit')){
function in_ra_danh_sach_cau_hoi_audit($id){
	if($id == 1 || $id == 2 || $id == 9 || $id == 10 || $id == 11){
		if($id == 1){ ?>
		<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="0">Chưa bao giờ</label></div>
		<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="1">Hàng tháng hoặc ít hơn</label></div>
		<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="2">2 – 4 lần một tháng</label></div>
		<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="3">2 – 3 lần một tuần</label></div>
		<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="4">Ít nhất 4 lần một tuần</label></div>
	   <?php }
	   if($id == 2){ ?>
		<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="0">0 – 2</label></div>
		<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="1">3 hoặc 4</label></div>
		<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="2">5 hoặc 6</label></div>
		<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="3">7 – 9</label></div>
		<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="4">10 hoặc hơn</label></div>
	   <?php }
	   if($id == 9){ ?>
		<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="0">Không</label></div>
		<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="2">Có, nhưng không phải vào năm ngoái</label></div>
		<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="4">Có, vào năm ngoái</label></div>
	   <?php }
	   if($id == 10){ ?>
		<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="0">Không</label></div>
		<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="2">Có, nhưng không phải vào năm ngoái</label></div>
		<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="4">Có, vào năm ngoái</label></div>
	   <?php }
	   if($id == 11){ ?>
		<div class="answer answer-no-point"><label><input class="answer-no-point" type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="0">Nam</label></div>
		<div class="answer answer-no-point"><label><input class="answer-no-point" type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="1">Nữ</label></div>
	   <?php }
   }else{ ?>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="0">Chưa bao giờ</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="1">Chưa tới mỗi tháng một lần</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="2">Hàng tháng</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="3">Hàng tuần</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="4">Hàng ngày hoặc gần như hàng ngày</label></div>
   <?php
   }
}
function short_code_audit(){
	ob_start();
?>
<style type="text/css">.question .title {
    font-size: inherit;
    margin: 0;
    padding: 0;
    color: #ff0000;
    font-weight: 600;
    margin: 15px 0;
}.ket-qua-danh-gia h3 {
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
	$('.wpt_test_form-audit').submit(function(event){
		event.preventDefault();
		var total_point = 0;
		$('.wpt_test_form-audit .answer input:checked').each(function(){
			if(!$(this).hasClass('answer-no-point')){
				total_point = total_point + parseInt($(this).val());
			}
		});
		$('.diem-so-audit-value').text('Điểm số AUDIT: '+total_point);
		// alert(total_point);
		$('.ket-qua-audit').show();
		if($('.answer-no-point input:checked').val() == 0){
			if(total_point < 4){
				$('.ket-qua-audit .muc-do-1').show();
			}
			if(total_point >= 5 && total_point <= 14){
				$('.ket-qua-audit .muc-do-2').show();
			}
			if(total_point >= 15 && total_point <= 19){
				$('.ket-qua-audit .muc-do-3').show();
			}
			if(total_point >= 20){
				$('.ket-qua-audit .muc-do-4').show();
			}
		}else{
			if(total_point < 3){
				$('.ket-qua-audit .muc-do-1').show();
			}
			if(total_point >= 4 && total_point <= 12){
				$('.ket-qua-audit .muc-do-2').show();
			}
			if(total_point >= 13 && total_point <= 19){
				$('.ket-qua-audit .muc-do-3').show();
			}
			if(total_point >= 20){
				$('.ket-qua-audit .muc-do-4').show();
			}
		}

	});
})
</script>

<div class="wpt_test fill_form">
<div class="content">	
<h4 style="text-align: justify;"><strong>Bảng câu hỏi kiểm tra tình trạng uống rượu (AUDIT).</strong></h4>
<p style="text-align: justify;"><strong>Bạn hãy chọn câu trả lời đúng nhất với tình trạng của mình.</strong></p>
<p style="text-align: justify;"><strong>Lưu ý: 1 ly tương đương với 12 oz <span style="color: #ff0000;">(khoảng 350 ml) bia</span>, tương đương với 5 oz <span style="color: #ff0000;">(khoảng 150 ml) rượu vang</span>, tương đương với 1.5 oz <span style="color: #ff0000;">(khoảng 45 ml) rượu mạnh.&nbsp;</span></strong></p>
</div>
<div class="content">
<form method="post" class="wpt_test_form wpt_test_form-audit">
<?php 
$danh_sach_audit = array(
'Bạn uống đồ uống có cồn thường xuyên như thế nào?',
'Trong một ngày bình thường, khi uống rượu, bạn uống bao nhiêu ly đồ uống có cồn?',
'Bạn uống ít nhất bốn ly trong một dịp thường xuyên như thế nào?',
'Trong năm vừa qua, bạn thấy mình không thể ngừng uống rượu một khi đã bắt đầu thường xuyên như thế nào?',
'Trong năm vừa qua, bạn không thực hiện được các nhiệm vụ bình thường của mình do uống rượu thường xuyên như thế nào?',
'Trong năm vừa qua, bạn cần một ly đầu tiên vào buổi sáng để khởi động ngày mới sau một buổi uống nhiều rượu bia thường xuyên như thế nào?',
'Trong năm vừa qua, bạn cảm thấy ân hận hoặc ăn năn sau khi uống rượu bia thường xuyên như thế nào?',
'Trong năm vừa qua, bạn không thể nhớ được chuyện gì xảy vào đêm hôm trước do uống rượu bia thường xuyên như thế nào?',
'Bạn hoặc ai khác có bị thương tích do bạn uống rượu bia không?',
'Họ hàng thân thích, bạn bè, bác sĩ, hoặc nhân viên chăm sóc sức khỏe khác có lo ngại về việc bạn uống rượu bia hoặc gợi ý bạn nên giảm bớt rượu bia không?',
'Giới tính của bạn là',
);
foreach($danh_sach_audit as $audit_key => $audit){
?>
<div class="question">
   <div class="title"><span class="number"><?php echo ($audit_key+1); ?>.</span><span class="title"> <?php echo $audit; ?></span></div>
   <?php echo in_ra_danh_sach_cau_hoi_audit($audit_key+1); ?>
</div>
<?php } ?>
<p><input type="submit" class="button btn btn-primary" value="Xem kết quả"></p>
<p><input type="hidden" name="passer_action" value="process-form"></p></form>
</div>
</div>
<div class="ket-qua-danh-gia ket-qua-audit" style="display:none;">
	<h3 class="diem-so-audit-value">Điểm số AUDIT: </h3>
	<h3> 
		<span class="muc-do-1" style="display:none;">Uống bia rượu ở mức độ nguy cơ thấp</span>
		<span class="muc-do-2" style="display:none;">Uống bia rượu ở mức độ có nguy cơ</span>
		<span class="muc-do-3" style="display:none;">Uống bia rượu ở mức độ gây hại</span>
		<span class="muc-do-4" style="display:none;">Uống bia rượu ở mức độ gây hại</span>
		<span class="muc-do-5" style="display:none;">Uống bia rượu ở mức độ phụ thuộc/nghiện</span>
	</h3>
	<p>* Chú ý: Trắc nghiệm này chỉ có ý nghĩa tầm soát. Chẩn đoán xác định nên được thực hiện bởi bác sĩ chuyên khoa, sau khi đã hỏi bệnh và thăm khám, bao gồm việc đánh giá mức độ suy giảm chức năng của bệnh nhân.</p>
	<p>
Đối với nam giới:<br/>
– 0-4: Uống bia rượu ở mức độ nguy cơ thấp.<br/>
– 5-14: Uống bia rượu ở mức độ có nguy cơ.<br/>
– 15-19: Uống bia rượu ở mức độ gây hại.<br/>
– 20+: Uống bia rượu ở mức độ phụ thuộc/nghiện.<br/>
Đối với nữ giới:<br/>
– 0-3: Uống bia rượu ở mức độ nguy cơ thấp.<br/>
– 4-12: Uống bia rượu ở mức độ có nguy cơ.<br/>
– 13-19: Uống bia rượu ở mức độ gây hại.<br/>
– 20+: Uống bia rượu ở mức độ phụ thuộc/nghiện.
	</p>
</div>
<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
 }}