<?php
if(!function_exists('short_code_huyet_ap')){

function short_code_huyet_ap(){
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
table input[type="radio"] {
    vertical-align: middle;
    margin-right: 5px;
}
.table-tinh-toan {
    background: #E6F4FE;
}
.muc-do-result{
    color: red;
}
td#tbleft2 input {
    max-width: 90px;
}
td#tbleft1 input {
    max-width: 90px;
}
</style>
<script type="text/javascript">
function numeralsOnly(){}
function checkgenderbs(){}
jQuery(document).ready(function($){

	$('.wpt_test_form-huyet_ap').submit(function(event){
		event.preventDefault();
        age =  parseInt($('.wpt_test_form-huyet_ap input[name="age"]').val());
        systolic =  parseInt($('.wpt_test_form-huyet_ap input[name="systolic"]').val());
		diastolic =  parseInt($('.wpt_test_form-huyet_ap input[name="diastolic"]').val());

		$('.diem-so-huyet_ap-value').text('Huyết áp: '+systolic + '/' + diastolic);
		// alert(total_point);
		$('.ket-qua-huyet_ap').show();

        $('.muc-do-result').hide();
        $('.ket-qua-huyet_ap .muc-do-1').show();
        var muc_do_huyet_ap = 1;
        var muc_do_huyet_ap1 = 1;
		
        if(systolic < 120){
            muc_do_huyet_ap = 1;
        }
        if(diastolic < 80){
            muc_do_huyet_ap1 = 1;
        }

        if(systolic < 130){
            muc_do_huyet_ap = 2;
        }
        if(diastolic < 85){
            muc_do_huyet_ap1 = 2;
        }

        if(systolic >= 130 && systolic <= 139){
            muc_do_huyet_ap = 3;
        }
        if(diastolic >= 85 && diastolic <= 89){
            muc_do_huyet_ap1 = 3;
        }

        if(systolic >= 140 && systolic <= 159){
            muc_do_huyet_ap = 4;
        }
        if(diastolic >= 90 && diastolic <= 99){
            muc_do_huyet_ap1 = 4;
        }

        if(systolic >= 160 && systolic <= 179){
            muc_do_huyet_ap = 5;
        }
        if(diastolic >= 100 && diastolic <= 109){
            muc_do_huyet_ap1 = 5;
        }

        if(systolic >= 180){
            muc_do_huyet_ap = 6;
        }
        if(diastolic >= 110){
            muc_do_huyet_ap1 = 6;
        }

        if(muc_do_huyet_ap < muc_do_huyet_ap1){
            muc_do_huyet_ap = muc_do_huyet_ap1;
        }

        if(systolic >= 140 && diastolic < 90){
            $('.muc-do-result').hide();
            $('.ket-qua-huyet_ap .muc-do-7').show();
        }else{
            $('.muc-do-result').hide();
            $('.ket-qua-huyet_ap .muc-do-'+muc_do_huyet_ap).show();
        }

        if(age >= 14 && diastolic <= 19){
            // $('.muc-do-result').hide();
            // $('.ket-qua-huyet_ap .muc-do-7').show();
        }


	});
})
</script>

<div class="wpt_test fill_form">
<div class="content">	
<h4 style="text-align: justify;"><strong>Chỉ số Huyết Áp</strong></h4>

</div>
<div class="content">

<div class="calculator-table-form blue" id="gendercolor">
<form name="frm_bp" class="wpt_test_form-huyet_ap" method="post" action="blood-pressure-calculator-result.asp" onsubmitx="return fun_submit();">


 <table border="0" cellspacing="1" width="100%" class="table table-tinh-toan" bgcolor="#E6F4FE">

<tbody><tr class="table-head"><td colspan="2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nhập chi tiết chỉ số của bạn</font></font></td></tr>
 <tr height="40px">
 
 <td width="55%" align="left" height="25" id="tabcol" valign="middle"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Giới tính </font></font><font color="#ff5500"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></font>
 </td>
 <td id="tbleft" width="45%" height="25" valign="middle">
  <input type="radio" value="male" name="sex" onclick="checkgenderbs();" required><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
 Nam giới &nbsp;&nbsp;</font></font><input type="radio" name="sex" value="female" onclick="checkgenderbs();" required><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
 Nữ giới</font></font></td>
 </tr>
 
 <tr height="40px">
 
 <td width="55%" align="left" height="25" id="tabcol1" valign="middle"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">

Tuổi </font></font><font color="#ff5500"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></font>
 </td>
 <td id="tbleft1" width="45%" height="25" valign="middle">
    <input size="10" type="number" name="age" onkeypress="return numeralsOnly(event)" maxlength="2" required><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">  (15-80 tuổi)
 </font></font></td>
 </tr>
 
  <tr height="40px">
  <td width="55%" align="left" height="25" id="tabcol2" valign="middle"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Huyết áp tâm thu (Số trên) / </font></font><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Áp suất tâm trương (Số dưới) </font></font><font color="#ff5500"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></font>
  </td>
  <td id="tbleft2" width="45%" height="25" valign="middle" style="white-space: nowrap;">
  <input size="5" type="number" name="systolic" onkeypress="return numeralsOnly(event)" maxlength="3" required><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> /
</font></font><input size="5" type="number" name="diastolic" onkeypress="return numeralsOnly(event)" maxlength="3" required><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> (mm Hg)
   </font></font></td>
   </tr>  
   
     <tr>
  <td width="55%" align="left" id="tabcol3" valign="middle"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Bạn có đang dùng thuốc huyết áp nào không? </font></font><font face="verdana" size="1" color="#ff5500"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></font>
  </td>
  <td id="tbleft3" width="45%" height="25" valign="middle">
  <input type="radio" value="Yes" name="tablet"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Có
 &nbsp;&nbsp;</font></font><input type="radio" name="tablet" value="No" required><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Không
   </font></font></td>
   </tr>


 <tr>
                    <td colspan="2" align="center" width="100%" id="tbsub">
                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="submit" class="flat-blue btn-lg btn btn-primary" value="Xem kết quả" id="test" required></font></font></td>
                    
                </tr>
                    
 </tbody></table>   </form> </div>

</div>
</div>
<div class="ket-qua-danh-gia ket-qua-huyet_ap" style="display:none;">
	<h3>Kết quả: 
        <h3 class="diem-so-huyet_ap-value">Điểm số Apgar: </h3>
		<div class="muc-do-result muc-do-1" style="display:none;">Chúc mừng! Huyết áp của bạn trong giới hạn bình thường theo độ tuổi của bạn<br>
Huyết áp của bạn bình thường và không có nguy cơ bị tăng huyết áp<br>
Lặp lại phép đo vài lần để có giá trị chung nhất. Đồng thời hiệu chỉnh thiết bị đo để có kết quả đo chính xác nhất. Bạn không nên đo sau bữa ăn hoặc tập thể dục hoặc sau khi bị căng thẳng. Khi đo huyết áp, băng quấn phải đặt đúng vị trí và cố định đúng trên cánh tay.<br>
Một lối sống lành mạnh sẽ giúp bạn có một sức khỏe tốt.</div>
        <div class="muc-do-result muc-do-2" style="display:none;">Huyết áp của bạn tăng nhẹ so với huyết áp tối ưu theo nhóm tuổi của bạn, nằm trong giới hạn chấp nhận được, và có thể coi là bình thường.<br>
Lặp lại phép đo vài lần để có giá trị chung nhất. Đồng thời hiệu chỉnh thiết bị đo để có kết quả đo chính xác nhất. Bạn không nên đo sau bữa ăn hoặc tập thể dục hoặc sau khi bị căng thẳng. Khi đo huyết áp, băng quấn phải đặt đúng vị trí và cố định đúng trên cánh tay.<br>
Nếu các giá trị này liên tục giống nhau thì bạn có thể bị tiền tăng huyết áp. Nó không được phân loại là bệnh nhưng trong một số nghiên cứu người ta phát hiện ra rằng người bị tiền tăng huyết áp có nguy cơ phát triển bệnh tim<br>
Các giá trị huyết áp cao hơn bình thường một chút là phổ biến ở những người lớn tuổi (trên 50 tuổi) và không cần dùng thuốc điều trị. Tuy nhiên nếu ở người trẻ tuổi thì có thể phải điều trị<br>
Chúng tôi khuyên bạn nên tham khảo ý kiến bác sĩ của bạn ngay lập tức. Bác sĩ sẽ quyết định xem bạn có phải dùng thuốc hay không hoặc thay đổi lối sống để  đưa huyết áp trở về bình thường.
</div>
        <div class="muc-do-result muc-do-3" style="display:none;">Chỉ số huyết áp của bạn cao hơn giới hạn có thể chấp nhận được và về lâu dài được coi là không tốt cho sức khỏe. <br>Bạn có thể thực hiện các biện pháp đơn giản để hạ huyết áp như giảm lượng muối ăn và đi bộ nhanh hàng ngày trong vòng 15 phút.<br>
Lặp lại phép đo vài lần để có giá trị chung nhất. Đồng thời hiệu chỉnh thiết bị đo để có kết quả đo chính xác nhất. Bạn không nên đo sau bữa ăn hoặc tập thể dục hoặc sau khi bị căng thẳng. Khi đo huyết áp, băng quấn phải đặt đúng vị trí và cố định đúng trên cánh tay.<br>
Nếu sau khi đo lại, các giá trị tương tự như giá trị đã đo, bạn nên thông báo với bác sĩ của mình.<br>
Một số người bị tăng huyế áp có thể bị đau ngực, khó thở, buồn nôn, mờ mắt. Tuy nhiên phần lớn tăng huyết áp không có bất kì triệu chứng nào cho đến khi xuất hiện các biến chứng như đau tim, suy tim, suy thận, đột quỵ.<br>
Nếu được chẩn đoán tăng huyết áp, bạn có thể được yêu cầu làm một vài xét nghiệm máu và điện tim</div>
        <div class="muc-do-result muc-do-4" style="display:none;">Huyết áp của bạn khá cao và cần kiểm soát bằng thuốc<br>
Lặp lại phép đo vài lần để có giá trị chung nhất. Đồng thời hiệu chỉnh thiết bị đo để có kết quả đo chính xác nhất. Bạn không nên đo sau bữa ăn hoặc tập thể dục hoặc sau khi bị căng thẳng. Khi đo huyết áp, băng quấn phải đặt đúng vị trí và cố định đúng trên cánh tay.<br>
Nếu sau khi đo lại, các giá trị tương tự như giá trị đã đo, bạn nên thông báo với bác sĩ của mình.<br>
Một số người bị tăng huyế áp có thể bị đau ngực, khó thở, buồn nôn, mờ mắt. Tuy nhiên phần lớn tăng huyết áp không có bất kì triệu chứng nào cho đến khi xuất hiện các biến chứng như đau tim, suy tim, suy thận, đột quỵ.<br>
Nếu được chẩn đoán tăng huyết áp, bạn có thể được yêu cầu làm một vài xét nghiệm máu và điện tim</div>
        <div class="muc-do-result muc-do-5" style="display:none;">Huyết áp của bạn quá cao và điều này có thể gây nguy hiểm cho sức khỏe của bạn, bạn cần gặp bác sĩ ngay lập tức.<br>
Lặp lại phép đo vài lần để có giá trị chung nhất. Đồng thời hiệu chỉnh thiết bị đo để có kết quả đo chính xác nhất. Bạn không nên đo sau bữa ăn hoặc tập thể dục hoặc sau khi bị căng thẳng. Khi đo huyết áp, băng quấn phải đặt đúng vị trí và cố định đúng trên cánh tay.<br>
Nếu sau khi đo lại, các giá trị tương tự như giá trị đã đo, bạn nên thông báo với bác sĩ của mình.<br>
Một số người bị tăng huyế áp có thể bị đau ngực, khó thở, buồn nôn, mờ mắt. Tuy nhiên phần lớn tăng huyết áp không có bất kì triệu chứng nào cho đến khi xuất hiện các biến chứng như đau tim, suy tim, suy thận, đột quỵ.<br>
Nếu được chẩn đoán tăng huyết áp, bạn có thể được yêu cầu làm một vài xét nghiệm máu và điện tim</div>
        <div class="muc-do-result muc-do-6" style="display:none;">Nếu kết quả đo của bạn là chính xác, cách giải thích của chúng tôi là bạn có tăng huyết áp tâm thu (số trên) và huyết áp tâm trương (số dưới) bình thường. Tính trạng này gọi là Tăng huyết áp tâm thu đơn độc<br>
Lặp lại phép đo vài lần để có giá trị chung nhất. Đồng thời hiệu chỉnh thiết bị đo để có kết quả đo chính xác nhất. Bạn không nên đo sau bữa ăn hoặc tập thể dục hoặc sau khi bị căng thẳng. Khi đo huyết áp, băng quấn phải đặt đúng vị trí và cố định đúng trên cánh tay.<br>
Loại huyết áp này không phải hiếm ở bệnh nhân lớn tuổi (trên 60 tuổi)  và không được coi là không khỏe mạnh. Nó cũng có thể xảy ra trong một thời gian ngắn sau khi tập thể dục hoặc khi mang thai.<br>
Nếu phát hiện tăng huyết áp tâm thu đơn độc ở người trẻ, cần liên hệ với bác sĩ ngay lập tức. Nó có thể gặp trong hở van tim hoặc cường giáp</div>
        <div class="muc-do-result muc-do-7" style="display:none;">Nếu kết quả đo của bạn là chính xác, cách giải thích của chúng tôi là bạn có  huyết áp tâm thu (số trên) bình thường và huyết áp tâm trương (số dưới) tăng. Tính trạng này gọi là Tăng huyết áp tâm trương đơn độc<br>
Lặp lại phép đo vài lần để có giá trị chung nhất. Đồng thời hiệu chỉnh thiết bị đo để có kết quả đo chính xác nhất. Bạn không nên đo sau bữa ăn hoặc tập thể dục hoặc sau khi bị căng thẳng. Khi đo huyết áp, băng quấn phải đặt đúng vị trí và cố định đúng trên cánh tay.<br>
Nếu bạn có tăng huyết áp tâm trương thì bạn có xu hướng phát triển tăng huyết áp tâm trương, điều này làm tăng nguy cơ tim mạch và đột quỵ<br>
Giảm huyết áp có khả năng bảo vệ đáng kể chống lại các vấn đề tim mạch nghiêm trọng cho bệnh nhân bị tăng huyết áp tâm trương đơn độc</div>
	</h3>
	<p>* Chú ý: Trắc nghiệm này chỉ có ý nghĩa tầm soát. Chẩn đoán xác định nên được thực hiện bởi bác sĩ chuyên khoa, sau khi đã hỏi bệnh và thăm khám.</p>
</div>
<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
 }}