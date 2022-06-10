<?php
if(!function_exists('in_ra_danh_sach_cau_hoi_tabs')){
function in_ra_danh_sach_cau_hoi_tabs($id){
?>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="0">Không bao giờ</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="1">Chỉ một chút</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="2">Đôi khi</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="3">Vừa phải</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="4">Khá nhiều</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="5">Rất nhiều</label></div>
   <?php
}
function short_code_tabs(){
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
	$('.wpt_test_form-tabs').submit(function(event){
		event.preventDefault();
		var total_point = 0;
		$('.wpt_test_form-tabs .answer input:checked').each(function(){
			total_point = total_point + parseInt($(this).val());
		});
		$('.diem-so-tabs-value').text('Điểm số TABS: '+total_point);
		// alert(total_point);
		$('.ket-qua-tabs').show();
		$('.muc-do-result').hide();
		if(total_point <= 9){
			$('.ket-qua-tabs .muc-do-1').show();
		}
		if(total_point >= 10 && total_point <= 17){
			$('.ket-qua-tabs .muc-do-2').show();
		}
		if(total_point >= 18 && total_point <= 21){
			$('.ket-qua-tabs .muc-do-3').show();
		}
		if(total_point >= 22 && total_point <= 35){
			$('.ket-qua-tabs .muc-do-4').show();
		}
		if(total_point >= 36 && total_point <= 53){
			$('.ket-qua-tabs .muc-do-5').show();
		}
		if(total_point >= 54){
			$('.ket-qua-tabs .muc-do-6').show();
		}
	});
})
</script>

<div class="wpt_test fill_form">
<div class="content">	
<h4 style="text-align: justify;"><strong>Bài kiểm tra sàng lọc quang phổ lưỡng cực ba trục (TABS).</strong></h4>
</div>
<div class="content">
<form method="post" class="wpt_test_form wpt_test_form-tabs">
<?php 
$danh_sach_tabs = array(
'Đầu óc tôi chưa bao giờ sắc bén hơn',
'Tôi cần ngủ ít hơn bình thường',
'Tôi có quá nhiều kế hoạch và ý tưởng mới đến nỗi tôi khó có thể làm việc được',
'Tôi cảm thấy áp lực khi nói chuyện',
'Tôi đã đặc biệt hạnh phúc',
'Tôi đã hoạt động tích cực hơn bình thường',
'Tôi nói quá nhanh khiến mọi người không theo kịp tôi',
'Tôi có nhiều ý tưởng mới hơn khả năng của tôi',
'Tôi đã cáu kỉnh',
'Nghĩ những câu chuyện cười với tôi thật đơn giản',
'Tôi đã cảm thấy « cuộc sống như một bữa tiệc »',
'Tôi đã tràn đầy năng lượng',
'Tôi đã suy nghĩ về tình dục',
'Tôi đã cảm thấy đặc biệt vui tươi',
'Tôi có những kế hoạch đặc biệt cho thế giới',
'Tôi đã tiêu quá nhiều tiền',
'Sự chú ý của tôi cứ chuyển từ ý tưởng này sang ý tưởng khác',
'Tôi cảm thấy thật khó để đi chậm lại và ở yên một chỗ',
);
foreach($danh_sach_tabs as $tabs_key => $tabs){
?>
<div class="question">
   <div class="title"><span class="number"><?php echo ($tabs_key+1); ?>.</span><span class="title"> <?php echo $tabs; ?></span></div>
   <?php echo in_ra_danh_sach_cau_hoi_tabs($tabs_key+1); ?>
</div>
<?php } ?>
<p><input type="submit" class="button btn btn-primary" value="Xem kết quả"></p>
<p><input type="hidden" name="passer_action" value="process-form"></p></form>
</div>
</div>
<div class="ket-qua-danh-gia ket-qua-tabs" style="display:none;">
	<h3 class="diem-so-tabs-value">Điểm số TABS: </h3>
	<h3>Kết quả: 
		<span class="muc-do-result muc-do-1" style="display:none;">Không có khả năng Mania</span>
		<span class="muc-do-result muc-do-2" style="display:none;">Có thể Mãn nhãn nhẹ hoặc Hypomanic</span>
		<span class="muc-do-result muc-do-3" style="display:none;">Borderline Mania</span>
		<span class="muc-do-result muc-do-4" style="display:none;">Mania nhẹ-Trung bình</span>
		<span class="muc-do-result muc-do-5" style="display:none;">Mania trung bình-nặng</span>
		<span class="muc-do-result muc-do-6" style="display:none;">Nghiêm trọng Manic</span>
	</h3>
	<p>
		Con số càng cao chứng tỏ hưng cảm càng nặng. Nếu bạn làm lại bài kiểm tra hàng tuần hoặc hàng tháng, những thay đổi từ 5 điểm trở lên giữa các bài kiểm tra là đáng kể
	</p>
	<p>* Chú ý: Trắc nghiệm này chỉ có ý nghĩa tầm soát. Chẩn đoán xác định nên được thực hiện bởi bác sĩ chuyên khoa, sau khi đã hỏi bệnh và thăm khám, bao gồm việc đánh giá mức độ suy giảm chức năng của bệnh nhân.</p>
</div>
<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
 }}