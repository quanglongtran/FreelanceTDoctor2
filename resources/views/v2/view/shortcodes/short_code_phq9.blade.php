<?php
if(!function_exists('in_ra_danh_sach_cau_hoi')){
function in_ra_danh_sach_cau_hoi($id){
?>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="0">Không lần nào cả</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="1">Một vài ngày</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="2">Nhiều hơn phân nữa số thời gian</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="3">Gần như mỗi ngày</label></div>
   <?php
}
function short_code_phq9(){
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
	$('.wpt_test_form-phq9').submit(function(event){
		event.preventDefault();
		var total_point = 0;
		$('.wpt_test_form-phq9 .answer input:checked').each(function(){
			total_point = total_point + parseInt($(this).val());
		});
		$('.diem-so-phq9-value').text('Điểm số PHQ-9: '+total_point);
		// alert(total_point);
		$('.ket-qua-phq9').show();
		if(total_point < 5){
			$('.ket-qua-phq9 .muc-do-1').show();
		}
		if(total_point >= 5 && total_point < 10){
			$('.ket-qua-phq9 .muc-do-2').show();
		}
		if(total_point >= 10 && total_point < 15){
			$('.ket-qua-phq9 .muc-do-3').show();
		}
		if(total_point >= 15 && total_point < 20){
			$('.ket-qua-phq9 .muc-do-4').show();
		}
		if(total_point >= 20){
			$('.ket-qua-phq9 .muc-do-5').show();
		}
	});
})
</script>

<div class="wpt_test fill_form">
<div class="content">
<h4 style="text-align: justify;"><strong>Hãy cho chúng tôi biết, trong vòng <span style="color: #ff0000;">2 tuần</span> vừa qua, có bao nhiêu lần bạn bị lo lắng buồn phiền vì những vấn đề được liệt kê dưới đây?</strong></h4>
</div>
<div class="content">
<form method="post" class="wpt_test_form wpt_test_form-phq9">
<div class="question">
   <div class="title"><span class="number">1.</span><span class="title">Ít hứng thú hoặc là không có niềm vui thích làm việc gì </span></div>
   <?php echo in_ra_danh_sach_cau_hoi(1); ?>
</div>
<div class="question">
<div class="title"><span class="number">2.</span><span class="title">Cảm thấy chán nản kiệt sức, trầm cảm, hoặc tuyệt vọng </span></div>
	<?php echo in_ra_danh_sach_cau_hoi(2); ?>
</div>
<div class="question">
<div class="title"><span class="number">3.</span><span class="title">Khó ngủ, ngủ không lâu hoặc ngủ quá nhiều </span></div>
	<?php echo in_ra_danh_sach_cau_hoi(3); ?>

</div>
<div class="question">
<div class="title"><span class="number">4.</span><span class="title">Cảm thấy mệt mỏi hoặc kém năng lực họat động </span></div>
	<?php echo in_ra_danh_sach_cau_hoi(4); ?>

</div>
<div class="question">
<div class="title"><span class="number">5.</span><span class="title">Ăn kém ngon hoặc ăn quá nhiều </span></div>
	<?php echo in_ra_danh_sach_cau_hoi(5); ?>

</div>
<div class="question">
<div class="title"><span class="number">6.</span><span class="title">Cảm thấy mình tệ, cho rằng mình là người thất bại hoặc đã làm cho chính mình hay gia đình thất vọng </span></div>
	<?php echo in_ra_danh_sach_cau_hoi(6); ?>

</div>
<div class="question">
<div class="title"><span class="number">7.</span><span class="title">Khó tập trung làm việc gì, ví dụ như là đọc báo hay xem tivi </span></div>
	<?php echo in_ra_danh_sach_cau_hoi(7); ?>

</div>
<div class="question">
<div class="title"><span class="number">8.</span><span class="title">Đi đứng hoặc nói năng chậm chạp đến nổi mọi người lưu ý. Hoặc ngược lại quá bồn chồn, đứng ngồi không yên cho nên bạn đã đi quanh quẩn nhiều hơn bình thường </span></div>
	<?php echo in_ra_danh_sach_cau_hoi(8); ?>

</div>
<div class="question">
<div class="title"><span class="number">9.</span><span class="title">Có ý nghĩ làm điều gì đó gây đau đớn cho bản thân hoặc nghĩ rằng thà mình chết đi cho rồi </span></div>
	<?php echo in_ra_danh_sach_cau_hoi(9); ?>

</div>
<p><input type="submit" class="button btn btn-primary" value="Xem kết quả"></p>
<p><input type="hidden" name="passer_action" value="process-form"></p></form>
</div>
</div>
<div class="ket-qua-danh-gia ket-qua-phq9" style="display:none;">
	<h3 class="diem-so-phq9-value">Điểm số PHQ-9: </h3>
	<h3>Mức độ trầm cảm: 
		<span class="muc-do-1" style="display:none;">Bình thường</span>
		<span class="muc-do-2" style="display:none;">Trầm cảm mức tối thiểu</span>
		<span class="muc-do-3" style="display:none;">Trầm cảm mức nhẹ</span>
		<span class="muc-do-4" style="display:none;">Trầm cảm mức trung bình</span>
		<span class="muc-do-5" style="display:none;">Trầm cảm mức nặng</span>
	</h3>
	<p>* Chú ý: Trắc nghiệm này chỉ có ý nghĩa tầm soát. Chẩn đoán xác định nên được thực hiện bởi bác sĩ chuyên khoa, sau khi đã hỏi bệnh và thăm khám, bao gồm việc đánh giá mức độ suy giảm chức năng của bệnh nhân.</p>
</div>
<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
 }}