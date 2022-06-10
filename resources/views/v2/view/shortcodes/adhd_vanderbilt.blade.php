<?php
if(!function_exists('in_ra_danh_sach_cau_hoi_adhd_vanderbilt')){
function in_ra_danh_sach_cau_hoi_adhd_vanderbil($id){
?>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="0">Không bao giờ</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="1">Đôi khi</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="2">Thường xuyên</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="3">Rất thường xuyên</label></div>
   <?php
}
function adhd_vanderbilt(){
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
}
.ket-qua-adhd_vanderbilt .muc-do-result {
    display: block;
}
</style>
<script type="text/javascript">
jQuery(document).ready(function($){
	$('.wpt_test_form-adhd_vanderbilt').submit(function(event){
		event.preventDefault();
		var total_point0 = 0;
		var total_point1 = 0;
		var total_point2 = 0;
		var total_point3 = 0;
		$('.wpt_test_form-adhd_vanderbilt .answer input:checked').each(function(index, value){
			console.log(index, value);
			if(index < 9){
				total_point0 = total_point0 + parseInt($(this).val());
			}else{
				if(index < 18){
					total_point1 = total_point1 + parseInt($(this).val());
				}else{
					if(index < 28){
						total_point2 = total_point2 + parseInt($(this).val());
					}else{
						total_point3 = total_point3 + parseInt($(this).val());
					}

				}
			}
			
		});
		// $('.diem-so-adhd_vanderbilt-value').text('Điểm số ADHD Vanderbilt: '+total_point);
		// alert(total_point);
		$('.ket-qua-adhd_vanderbilt').show();
		$('.muc-do-result').hide();
		if(total_point0 >= 6){
			$('.ket-qua-adhd_vanderbilt .muc-do-2').show();
		}else{
			$('.ket-qua-adhd_vanderbilt .muc-do-1').show();
		}
		if(total_point1 >= 6){
			$('.ket-qua-adhd_vanderbilt .muc-do-4').show();
		}else{
			$('.ket-qua-adhd_vanderbilt .muc-do-3').show();
		}
		if(total_point2 >= 6){
			$('.ket-qua-adhd_vanderbilt .muc-do-6').show();
		}else{
			$('.ket-qua-adhd_vanderbilt .muc-do-5').show();
		}
		if(total_point3 >= 6){
			$('.ket-qua-adhd_vanderbilt .muc-do-8').show();
		}else{
			$('.ket-qua-adhd_vanderbilt .muc-do-7').show();
		}
	});
})
</script>

<div class="wpt_test fill_form">
<div class="content">	
<h4 style="text-align: justify;"><strong></strong></h4>
</div>
<div class="content">
<form method="post" class="wpt_test_form wpt_test_form-adhd_vanderbilt">
<?php 
$danh_sach_adhd_vanderbil = array(
'Không tập trung chú ý vào nhiệm vụ/ hoạt động',
'Khó khăn khi phải duy trì tập trung chú ý đến gì cần làm vào các nhiệm vụ/ hoạt động',
'Dường như không nghe khi được nói chuyện trực tiếp',
'Không theo hướng dẫn và không hoàn thành bài vở (Không phải do chống đối hay không)',
'Có khó khăn khi tổ chức công việc/ hoạt động',
'Né tránh, không thích, hoặc miễn cưỡng tham gia vào các công việc đòi hỏi sự nỗ lực trí tuệ',
'Mất những đồ dùng cần thiết trong công việc/hoạt động',
'Có thể dễ dàng bị phân tâm bởi các kích thích bên ngoài',
'Hay quên trong các hoạt động hàng ngày',
'Cựa quậy chân tay hoặc vặn vẹo ngồi không yên',
'Rời khỏi chỗ ngồi trong lớp học hoặc những nơi phải ngồi yên',
'Chạy hoặc leo trèo quá mức trong các tình huống cần phải ngồi yên',
'Khó khăn trong các hoạt động tĩnh hoặc trò chơi tĩnh',
'Hoặc động “luôn chân tay” hoặc hành động như thể “được gắn  động cơ”',
'Nói nhiều',
'Thốt ra câu trả lời khi người hỏi chưa hỏi xong',
'Có khó khăn khi chờ đợi đến lượt mình/ xếp hàng',
'Ngắt quãng hoặc chen ngang vào công việc/ hội thoại của người khác',
'Mất kiềm chế hoặc giận dữ',
'Không tuân theo hoặc từ chối làm theo yêu cầu hoặc quy định của người lớn',
'Cáu bẩu hoặc dễ bực bội',
'Hằn học và trả thù',
'Chửi tục, đe dọa, hoặc hăm dọa người khác',
'Đánh nhau',
'Nói dối để kiếm lợi  hoặc để trốn tránh nhiệm vụ',
'Độc ác với mọi người',
'Lấy cắp',
'Cố ý phá hoại tài sản của người khác',
'Sợ hãi, lo âu và lo lắng',
'Dễ bối rối kém tự tin',
'Sợ thử những điều mới hoặc lo sợ bị mắc lỗi',
'Cảm thấy vô dụng hoặc thấp kém',
'Tự trách bản thân, cảm thấy có lỗi',
'Cảm giác cô đơn, vô tích sự, không được yêu quý, phàn nàn không có ai yêu mình',
'Buồn rầu, sầu não hoặc trầm cảm',
);
foreach($danh_sach_adhd_vanderbil as $adhd_vanderbil_key => $adhd_vanderbilt){
?>
<div class="question">
   <div class="title"><span class="number"><?php echo ($adhd_vanderbil_key+1); ?>.</span><span class="title"> <?php echo $adhd_vanderbilt; ?></span></div>
   <?php echo in_ra_danh_sach_cau_hoi_adhd_vanderbil($adhd_vanderbil_key+1); ?>
</div>
<?php } ?>
<p><input type="submit" class="button btn btn-primary" value="Xem kết quả"></p>
<p><input type="hidden" name="passer_action" value="process-form"></p></form>
</div>
</div>
<div class="ket-qua-danh-gia ket-qua-adhd_vanderbilt" style="display:none;">
	<h3 class="diem-so-adhd_vanderbilt-value"> </h3>
	<h3>Kết quả ADHD Vanderbilt: 
		<span class="muc-do-result muc-do-1" style="display:none;">Không có dấu hiệu Thiếu tập trung chú ý</span>
		<span class="muc-do-result muc-do-2" style="display:none;">Có dấu hiệu Thiếu tập trung chú ý</span>
		<span class="muc-do-result muc-do-3" style="display:none;">Không có dấu hiệu Hiếu động thái quá</span>
		<span class="muc-do-result muc-do-4" style="display:none;">Có dấu hiệu Hiếu động thái quá</span>
		<span class="muc-do-result muc-do-5" style="display:none;">Không có dấu hiệu Thách thức chống đối</span>
		<span class="muc-do-result muc-do-6" style="display:none;">Có dấu hiệu Thách thức chống đối</span>
		<span class="muc-do-result muc-do-5" style="display:none;">Không có dấu hiệu Lo âu, trầm cảm</span>
		<span class="muc-do-result muc-do-6" style="display:none;">Có dấu hiệu Lo âu, trầm cảm</span>
	</h3>
	<p>
	</p>
	<p>* Chú ý: Trắc nghiệm này chỉ có ý nghĩa tầm soát. Chẩn đoán xác định nên được thực hiện bởi bác sĩ chuyên khoa, sau khi đã hỏi bệnh và thăm khám, bao gồm việc đánh giá mức độ suy giảm chức năng của bệnh nhân.</p>
</div>
<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
 }}