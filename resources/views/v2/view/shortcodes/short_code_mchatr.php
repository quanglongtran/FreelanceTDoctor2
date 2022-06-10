<?php
if(!function_exists('in_ra_danh_sach_cau_hoi_mchatr')){
function in_ra_danh_sach_cau_hoi_mchatr($id){
	if($id == 2 || $id == 5 || $id == 12){
?>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="0">Có</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="1">Không</label></div>
   <?php
   }else{ ?>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="1">Có</label></div>
	<div class="answer"><label><input type="radio" required="required" aria-required="true" name="cau_hoi<?php echo $id; ?>" value="0">Không</label></div>
   <?php
   }
}
function short_code_mchatr(){
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
	$('.wpt_test_form-mchatr').submit(function(event){
		event.preventDefault();
		var total_point = 0;
		$('.wpt_test_form-mchatr .answer input:checked').each(function(){
			total_point = total_point + parseInt($(this).val());
		});
		$('.diem-so-mchatr-value').text('Điểm số M-CHAT-R: '+total_point);
		// alert(total_point);
		$('.ket-qua-mchatr').show();
		$('.ket-qua-mchatr .muc-do-1').show();

	});
})
</script>

<div class="wpt_test fill_form">
<div class="content">	
<h4 style="text-align: justify;"><strong>Bảng điểm Sàng lọc Tự kỷ cho trẻ dưới 3 tuổi M-CHAT-R.</strong></h4>
<p style="text-align: justify;"><strong>Hãy trả lời các câu hỏi sau về con bạn. Hãy nghĩ về cách cư xử <span style="color: #ff0000;">thường xuyên</span> của trẻ. Nếu bạn đã thấy trẻ có cách cư xử như vậy một vài lần, mà không phải thường xuyên thì hãy trả lời là không. Khoanh câu trả lời là có hoặc không cho tất cả các câu hỏi. Cảm ơn bạn.</strong></p>
</div>
<div class="content">
<form method="post" class="wpt_test_form wpt_test_form-mchatr">
<?php 
$danh_sach_mchatr = array(
'Nếu bạn chỉ vào một điểm trong phòng, con bạn có nhìn theo không? (VÍ DỤ, nếu bạn chỉ vào đồ chơi hay con vật, con bạn có nhìn vào đồ chơi đó hay con vật đó không?)',
'Bạn có bao giờ tự hỏi liệu con bạn có bị điếc không?',
'Con bạn có chơi trò chơi tưởng tượng hoặc giả vờ không? (VÍ DỤ, giả vờ uống nước từ một cái cốc rỗng, giả vờ nói chuyện điện thoại, hay giả vờ cho búp bê hoặc thú giả ăn?)',
'Con bạn có thích leo trèo lên đồ vật không? (VÍ DỤ, trèo lên đồ đạc trong nhà, đồ chơi ngoài trời, hoặc leo cầu thang)',
'Con bạn có làm các chuyển động ngón tay một cách bất thường đến gần mắt của bé không? (VÍ DỤ, con bạn có vẫy/ đưa qua đưa lại ngón tay gần mắt của bé)',
'Con bạn có dùng ngón tay trỏ của bé để yêu cầu việc gì đó, hoặc để muốn được giúp đỡ không? (VÍ DỤ, chỉ vào bim bim hoặc đồ chơi ngoài tầm với)',
'Con bạn có dùng một ngón tay để chỉ cho bạn thứ gì đó thú vị mà trẻ thích thú không? (VÍ DỤ, chỉ vào máy bay trên bầu trời hoặc 1 cái xe tải lớn trên đường)',
'Con bạn có thích chơi với những đứa trẻ khác không? (VÍ DỤ, con bạn có quan sát những đứa trẻ khác, cười với những trẻ này hoặc tới chơi với chúng không)',
'Con bạn có khoe bạn những đồ vật bằng cách mang hay ôm chúng đến cho bạn xem- không phải để được bạn giúp đỡ, chỉ để chia sẻ với bạn không? (VÍ DỤ, khoe với bạn 1 bông hoa, thú giả, hoặc 1 cái xe tải đồ chơi)',
'Con bạn có đáp lại khi được gọi tên không? (VÍ DỤ, con bạn có ngước tìm người gọi, nói chuyện, hay bập bẹ, hoặc ngừng việc bé đang làm khi bạn gọi tên của bé?)',
'Khi bạn cười với con bạn, con bạn có cười lại với bạn không?',
'Con bạn có cảm thấy khó chịu bởi những tiếng ồn xung quanh? (VÍ DỤ, con bạn có hét lên hay khóc khi nghe tiếng ồn của máy hút bụi, hoặc nhạc to?)',
'Con bạn của bạn có đi bộ không?',
'Con bạn có nhìn vào mắt bạn khi bạn đang nói chuyện với bé, chơi cùng bé hoặc mặc quần áo cho bé không?',
'Con bạn có bắt chước những điều bạn làm không? (VÍ DỤ, vẫy tay bye bye, vỗ tay, hoặc tạo ra những âm thanh vui vẻ khi bạn làm)',
'Nếu bạn quay đầu để nhìn gì đó, con bạn có nhìn xung quanh để xem bạn đang nhìn cái gì không?',
'Con bạn có cố gắng gây sự chú ý để bạn phải nhìn vào bé không? (VÍ DỤ, con bạn có nhìn bạn để được bạn khen ngợi, hoặc nói “nhìn” hoặc “nhìn con”?)',
'Con bạn của bạn có hiểu bạn nói gì khi bạn yêu cầu con làm không? (VÍ DỤ, Nếu bạn không chỉ tay, con bạn có hiểu “để sách lên ghế” hoặc “đưa mẹ/bố cái chăn”không?)',
'Nếu có điều gì mới lạ, con bạn có nhìn bạn để xem bạn cảm thấy thế nào về việc xảy ra không? (VÍ DỤ, nếu con bạn nghe thấy 1 âm thanh lạ hoặc thú vị, hoặc nhìn thấy đồ chơi mới, con bạn có nhìn bạn không?)',
'Con bạn có thích những hoạt động mang tính chất chuyển động không? (VÍ DỤ, được lắc lư hoặc nâng lên hạ xuống trên đầu gối của bạn không?',
);
foreach($danh_sach_mchatr as $mchatr_key => $mchatr){
?>
<div class="question">
   <div class="title"><span class="number"><?php echo ($mchatr_key+1); ?>.</span><span class="title"> <?php echo $mchatr; ?></span></div>
   <?php echo in_ra_danh_sach_cau_hoi_mchatr($mchatr_key+1); ?>
</div>
<?php } ?>
<p><input type="submit" class="button btn btn-primary" value="Xem kết quả"></p>
<p><input type="hidden" name="passer_action" value="process-form"></p></form>
</div>
</div>
<div class="ket-qua-danh-gia ket-qua-mchatr" style="display:none;">
	<h3 class="diem-so-mchatr-value">Điểm số M-CHAT-R: </h3>
	<h3> 
		<span class="muc-do-1" style="display:none;">– 0-2: Nguy cơ thấp.<br/>
– 3-7: Nguy cơ trung bình.<br/>
– 8-20: Nguy cơ cao.</span>
	</h3>
	<p>Cần đến gặp chuyên gia sức khỏe tâm thần để tiếp tục thực hiện bảng hỏi Phần Theo dõi (Giai đoạn thứ 2 của M-CHAT-R/F) để có thêm thông tin về những câu trả lời chỉ ra nguy cơ tự kỷ; hoặc để được thăm khám chi tiết; từ đó có hướng xử trí phù hợp kế tiếp</p>
	<p>* Chú ý: Trắc nghiệm này chỉ có ý nghĩa tầm soát. Chẩn đoán xác định nên được thực hiện bởi bác sĩ chuyên khoa, sau khi đã hỏi bệnh và thăm khám, bao gồm việc đánh giá mức độ suy giảm chức năng của bệnh nhân.</p>
</div>
<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
 }}