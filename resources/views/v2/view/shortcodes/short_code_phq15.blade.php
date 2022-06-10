<?php
if(!function_exists('in_ra_danh_sach_cau_hoi_phq15')){
function in_ra_danh_sach_cau_hoi_phq15($id){
?>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="0">Hoàn toàn không lo lắng</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="1">Lo lắng chút ít</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="2">Lo lắng nhiều</label></div>
   <?php
}
function short_code_phq15(){
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
	$('.wpt_test_form-phq15').submit(function(event){
		event.preventDefault();
		var total_point = 0;
		$('.wpt_test_form-phq15 .answer input:checked').each(function(){
			total_point = total_point + parseInt($(this).val());
		});
		$('.diem-so-phq15-value').text('Điểm số PHQ-15: '+total_point);
		// alert(total_point);
		$('.ket-qua-phq15').show();
		if(total_point <= 4){
			$('.ket-qua-phq15 .muc-do-1').show();
		}
		if(total_point >= 5 && total_point <= 9){
			$('.ket-qua-phq15 .muc-do-2').show();
		}
		if(total_point >= 10 && total_point <= 14){
			$('.ket-qua-phq15 .muc-do-3').show();
		}
		if(total_point >= 15 && total_point <= 19){
			$('.ket-qua-phq15 .muc-do-4').show();
		}
		if(total_point >= 20){
			$('.ket-qua-phq15 .muc-do-5').show();
		}
	});
})
</script>

<div class="wpt_test fill_form">
<div class="content">	
<h4 style="text-align: justify;"><strong>Thang đánh giá rối loạn triệu chứng cơ thể PHQ-15.</strong></h4>
<p><strong>Hãy cho chúng tôi biết, trong vòng <span style="color: #ff0000;">4 tuần</span> vừa qua, bạn lo lắng như thế nào đối với những vấn đề được liệt kê dưới đây?</strong></p>
</div>
<div class="content">
<form method="post" class="wpt_test_form wpt_test_form-phq15">
<?php 
$danh_sach_phq15 = array(
'Đau dạ dày',
'Đau lưng',
'Đau chân, tay hoặc các khớp (ví dụ khớp gối, khớp hông)',
'Đau bụng hoặc các vấn đề khác trong chu kỳ kinh nguyệt (đối với nữ) [Nam giới chọn vào ô “Hoàn toàn không lo lắng”]',
'Đau đầu',
'Đau ngực hoặc tức ngực',
'Hoa mắt, chóng mặt',
'Những cơn ngất hoặc choáng váng',
'Cảm giác tim đập nhanh hoặc mạnh',
'Khó thở',
'Đau hoặc khó khăn khi giao hợp',
'Táo bón hoặc tiêu chảy',
'Buồn nôn, ợ hơi hoặc khó tiêu',
'Cảm thấy mệt mỏi hoặc ít năng lượng',
'Khó ngủ',
);
foreach($danh_sach_phq15 as $phq15_key => $phq15){
?>
<div class="question">
   <div class="title"><span class="number"><?php echo ($phq15_key+1); ?>.</span><span class="title"> <?php echo $phq15; ?></span></div>
   <?php echo in_ra_danh_sach_cau_hoi_phq15($phq15_key+1); ?>
</div>
<?php } ?>
<p><input type="submit" class="button btn btn-primary" value="Xem kết quả"></p>
<p><input type="hidden" name="passer_action" value="process-form"></p></form>
</div>
</div>
<div class="ket-qua-danh-gia ket-qua-phq15" style="display:none;">
	<h3 class="diem-so-phq15-value">Điểm số PHQ-15: </h3>
	<h3>Kết quả: 
		<span class="muc-do-1" style="display:none;">Bạn không bị rối loạn triệu chứng cơ thể</span>
		<span class="muc-do-2" style="display:none;">Rối loạn triệu chứng cơ thể mức độ nhẹ</span>
		<span class="muc-do-3" style="display:none;">Rối loạn triệu chứng cơ thể mức độ vừa</span>
		<span class="muc-do-4" style="display:none;">Rối loạn triệu chứng cơ thể mức độ vừa phải</span>
		<span class="muc-do-5" style="display:none;">Rối loạn triệu chứng cơ thể mức độ nặng</span>
	</h3>
	<p>* Chú ý: Trắc nghiệm này chỉ có ý nghĩa tầm soát. Chẩn đoán xác định nên được thực hiện bởi bác sĩ chuyên khoa, sau khi đã hỏi bệnh và thăm khám, bao gồm việc đánh giá mức độ suy giảm chức năng của bệnh nhân.</p>
</div>
<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
 }}