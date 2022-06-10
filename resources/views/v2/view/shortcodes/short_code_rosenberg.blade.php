<?php
if(!function_exists('in_ra_danh_sach_cau_hoi_rosenberg')){
function in_ra_danh_sach_cau_hoi_rosenberg($id){
?>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="0">Hoàn toàn đồng ý</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="1">Đồng ý</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="2">Không đồng ý</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="3">Hoàn toàn không đồng ý</label></div>
   <?php
}
function short_code_rosenberg(){
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
	$('.wpt_test_form-rosenberg').submit(function(event){
		event.preventDefault();
		var total_point = 0;
		$('.wpt_test_form-rosenberg .answer input:checked').each(function(){
			total_point = total_point + parseInt($(this).val());
		});
		$('.diem-so-rosenberg-value').text('Điểm số Rosenberg: '+total_point);
		// alert(total_point);
		$('.ket-qua-rosenberg').show();
		if(total_point < 15){
			$('.ket-qua-rosenberg .muc-do-1').show();
		}
		if(total_point >= 15 && total_point < 25){
			$('.ket-qua-rosenberg .muc-do-2').show();
		}
		if(total_point >= 25){
			$('.ket-qua-rosenberg .muc-do-3').show();
		}
	});
})
</script>

<div class="wpt_test fill_form">
<div class="content">	
<h4 style="text-align: justify;"><strong>Hãy chọn câu trả lời đúng nhất với cảm nhận của bạn.</strong></h4>
</div>
<div class="content">
<form method="post" class="wpt_test_form wpt_test_form-rosenberg">
<?php 
$danh_sach_rosenberg = array(
'Nhìn chung, tôi hài lòng với bản thân',
'Đôi khi tôi nghĩ rằng mình không tốt chút nào',
'Tôi cảm thấy rằng tôi có một số phẩm chất tốt',
'Tôi có thể làm tốt mọi thứ như hầu hết mọi người',
'Tôi không cảm thấy mình có nhiều điều để tự hào',
'Tôi chắc chắn đôi khi cảm thấy vô dụng',
'Tôi cảm thấy mình là một người có giá trị',
'Tôi ước mình có thể tôn trọng bản thân mình hơn',
'Nhìn chung, tôi có xu hướng nghĩ rằng mình là một kẻ thất bại',
'Tôi có một thái độ tích cực đối với bản thân',
);
foreach($danh_sach_rosenberg as $rosenberg_key => $rosenberg){
?>
<div class="question">
   <div class="title"><span class="number"><?php echo ($rosenberg_key+1); ?>.</span><span class="title"> <?php echo $rosenberg; ?></span></div>
   <?php echo in_ra_danh_sach_cau_hoi_rosenberg($rosenberg_key+1); ?>
</div>
<?php } ?>
<p><input type="submit" class="button btn btn-primary" value="Xem kết quả"></p>
<p><input type="hidden" name="passer_action" value="process-form"></p></form>
</div>
</div>
<div class="ket-qua-danh-gia ket-qua-rosenberg" style="display:none;">
	<h3 class="diem-so-rosenberg-value">Điểm số Rosenberg: </h3>
	<h3>Kết quả: 
		<span class="muc-do-1" style="display:none;">Điểm tổng thể dưới 15 cho thấy bạn có lòng tự trọng thấp</span>
		<span class="muc-do-2" style="display:none;">Điểm tổng thể từ 15 đến 25 cho thấy bạn có lòng tự trọng vừa phải</span>
		<span class="muc-do-3" style="display:none;">Điểm tổng thể từ 25 trở lên cho thấy lòng tự trọng cao</span>
	</h3>
	<p>* Chú ý: Trắc nghiệm này chỉ có ý nghĩa tầm soát. Chẩn đoán xác định nên được thực hiện bởi bác sĩ chuyên khoa, sau khi đã hỏi bệnh và thăm khám, bao gồm việc đánh giá mức độ suy giảm chức năng của bệnh nhân.</p>
</div>
<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
 }}