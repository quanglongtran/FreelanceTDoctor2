<?php
if(!function_exists('shortcode_14')){

function shortcode_14(){
    ob_start();
?>
<style>
        /***************** calculator style --*********/
        .calculator-table,
        .calculator-table-form {
            margin: 0 0 20px 0;
            color: #000000;
            width: 90%;
            margin: 0 auto;
            line-height: 130%;
        }

        .calculator-table-form table,
        .calculator-table table {
            width: 100%;
            color: #000000;
        }

        .calculator-table-form td,
        .calculator-table td {
            border-left: 1px solid #fff;
        }

        .calculator-table-form td:nth-child(1),
        .calculator-table td:nth-child(1) {
            border-left: none;
        }

        .calculator-table-form.blue table {
            background: #E6F4FE;
            border: 1px solid #0F5885;
        }

        .calculator-table.blue table {
            background: #E6F4FE;
        }

        .calculator-table-form.pink table {
            background: #FBE4FD;
            border: 1px solid #AD0054;
        }

        .calculator-table.pink table {
            background: #B30035;
        }

        .calculator-table-form.blue td:first-child {
            background: #CFEAFC
        }

        .calculator-table-form.pink td:first-child {
            background: #FFD6EB
        }

        .calculator-table-form tr.table-head td,
        .calculator-table tr.table-head td {
            color: #fff;
            font-weight: bold;
        }

        .calculator-table-form.blue tr.table-head td,
        .calculator-table.blue tr.table-head td {
            background: #0F5885;
        }

        .calculator-table-form input[type='radio'],
        .calculator-table-form input[type='checkbox'] {
            margin-right: 5px;
        }

        .calculator-table-form.blue tr.table-head td,
        .calculator-table-form.pink tr.table-head td {
            font-size: 14px;
        }

        .calculator-table-form.blue tr.table-head td,
        .calculator-table.blue tr.table-head td {
            background: #0F5885;
        }

        .calculator-table-form.pink tr.table-head td,
        .calculator-table.pink tr.table-head td {
            background: #AD0054;
        }

        .calculator-table-form tr:last-child td {
            text-align: center;
        }

        .calculator-table-form tr.leftalign td {
            text-align: left !important;
        }

        .calculator-table-form td,
        .calculator-table td {
            border-right: 0px solid #fff;
            border-bottom: 1px solid #fff;
            padding: 10px 5px;
            vertical-align: top;
            text-align: left;
        }

        .calculator-table-form tr:last-child td,
        .calculator-table:last-child td {
            border-bottom: none;
        }

        .mandatory-star {
            color: #f00;
        }

        .required {
            color: #B30000;
            text-align: left;
            float: left;
            padding-top: 15px;
        }

        .calculator-table-form .flat-btn {
            border: 0;
            color: #fff;
            margin-left: 5px;
            cursor: pointer;
        }

        .calculator-table-form.blue .flat-btn,
        .result .flat-btn {
            background: #0F5885;
            color: #fff !important;
            font-size: 13px;
            font-weight: 600;
            /*border-radius:4px;*/
            padding: 8px 15px;
            display: inline-block;
        }

        .calculator-table-form.pink .flat-btn {
            background: #AD0054;
            color: #fff;
            font-weight: 600;
            /*border-radius:4px;*/
            font-size: 13px;
            padding: 8px 15px;
            display: inline-block;
        }

        .calculator-table-form.blue .flat-btn:hover {
            background: #0779A3;
        }

        .calculator-table-form.pink .flat-btn:hover {
            background: #D62060;
        }


        a:not([href]) {
            color: #333 !important;
            text-decoration: none;
        }

        /*.flat-btn,.flat-btn.blue{padding:5px 10px; background:#0F5885; color:#fff; text-decoration:none; margin:10px 0 0 0; display:inline-block; border-radius:4px;font-size: 13px !important;}*/
        .flat-btn:hover {
            text-decoration: none;
            background: #333;
            color: #fff
        }


        .flat-btn.pink {
            background: none repeat scroll 0 0 #FF85AD;
        }

        .flat-btn.pink:hover {
            text-decoration: none;
            background: #333;
            color: #fff
        }

        .calculator-table-form .form-control {
            font-size: 18px !important
        }
    </style>

<script language="javascript">
                jQuery(document).ready(function ($) {
                    function format_tien_te(data){
                        data = data.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                        return data.replace('.00', '');
                    }

                  
                    $('[name="waist_height"]').submit(function(event){
                        event.preventDefault();
                        $('#form_kq2').show();
                        var WHtR = parseInt($('[name="txtWaist"]').val()) / parseInt($('[name="height"]').val());
                        if(WHtR > 0.5){
                            $('.ketqua-text2').text('WHtR >0.5: Cho thấy nguy cơ mắc bệnh tiểu đường, bệnh tim mạch, đột quỵ cao hơn và tuổi thọ thấp hơn');
                        }else{
                            $('.ketqua-text2').text('WHtR <0.5: Được coi là lành mạnh đối với cả nam và nữ trên toàn thế giới');
                        }
                        $('.ketqua').text(format_tien_te(WHtR*100));

                        if($('[name="sex"]').val() == 'Male'){
                            if(WHtR <= 0.34){
                                $('.ketqua-text').text('Cực kì mành mai');
                                $('.ketqua-text1').text('Trọng lượng cơ thể của bạn thấp khi so sánh với các khuyến nghị tiêu chuẩn. Thiếu cân khiến bạn dễ bị nhiễm trùng, các vấn đề tiêu hóa và hiếm khi bị ung thư. Nguyên nhân nhẹ cân có thể do thiếu chất dinh dưỡng, không tiêu thụ đủ calo hoặc do rối loạn ăn uống.Tham khảo ý kiến bác sĩ hoặc chuyên gia dinh dưỡng để tăng cân bình thường.'
                                );
                            }
                            if(WHtR >= 0.35 && WHtR <= 0.42){
                                $('.ketqua-text').text('Mảnh mai');
                                $('.ketqua-text1').text('Trọng lượng cơ thể của bạn thấp khi so sánh với các khuyến nghị tiêu chuẩn. Thiếu cân khiến bạn dễ bị nhiễm trùng, các vấn đề tiêu hóa và hiếm khi bị ung thư. Nguyên nhân nhẹ cân có thể do thiếu chất dinh dưỡng, không tiêu thụ đủ calo hoặc do rối loạn ăn uống.Tham khảo ý kiến bác sĩ hoặc chuyên gia dinh dưỡng để tăng cân bình thường.'
                                );
                            }
                            if(WHtR >= 0.43 && WHtR <= 0.52){
                                $('.ketqua-text').text('Khỏe mạnh');
                                $('.ketqua-text1').text('Tiếp tục ăn uống lành mạnh và tập thể dục 150 phút mỗi tuần để giữ cân nặng của bạn trong phạm vi khuyến nghị.' );
                            }
                            if(WHtR >= 0.53 && WHtR <= 0.62){
                                $('.ketqua-text').text('Thừa cân');
                                $('.ketqua-text1').text('Bạn có thể có nhiều mỡ trong cơ thể hơn do lối sống ít vận động. Thừa cân là một yếu tố nguy cơ của bệnh tim, tiểu đường và tăng huyết áp. Chúng tôi khuyên bạn nên tăng cường hoạt động và tập thể dục ít nhất 150 phút mỗi tuần để giảm cân và lấy lại vóc dáng.' );
                            }
                            if(WHtR >= 0.63){
                                $('.ketqua-text').text('Bệnh béo phì');
                                $('.ketqua-text1').text('Béo phì làm giảm tuổi thọ của bạn và khiến bạn dễ mắc các bệnh khác nhau, đặc biệt là bệnh tim, tiểu đường, ngưng thở khi ngủ, viêm xương khớp, liệt dương và một số loại ung thư. Ngay cả một chế độ tập thể dục ngắn cũng có thể giúp bạn tăng tốc độ trao đổi chất hằng ngày và giúp bạn tăng lượng calo tiêu thụ và giảm cân. Tham khảo ý kiến của chuyên gia dinh dưỡng, chuyên gia thể dục và bác sĩ của bạn để cải thiện lối sống và tối ưu hóa cân nặng của bạn.' );
                            }
                        }else{
                            if(WHtR <= 0.34){
                                $('.ketqua-text').text('Cực kì mành mai');
                                $('.ketqua-text1').text('Trọng lượng cơ thể của bạn thấp khi so sánh với các khuyến nghị tiêu chuẩn. Thiếu cân khiến bạn dễ bị nhiễm trùng, các vấn đề tiêu hóa và hiếm khi bị ung thư. Nguyên nhân nhẹ cân có thể do thiếu chất dinh dưỡng, không tiêu thụ đủ calo hoặc do rối loạn ăn uống. Tham khảo ý kiến bác sĩ hoặc chuyên gia dinh dưỡng để tăng cân bình thường.'
                                );
                            }
                            if(WHtR >= 0.35 && WHtR <= 0.41){
                                $('.ketqua-text').text('Mảnh mai');
                                $('.ketqua-text1').text('Trọng lượng cơ thể của bạn thấp khi so sánh với các khuyến nghị tiêu chuẩn. Thiếu cân khiến bạn dễ bị nhiễm trùng, các vấn đề tiêu hóa và hiếm khi bị ung thư. Nguyên nhân nhẹ cân có thể do thiếu chất dinh dưỡng, không tiêu thụ đủ calo hoặc do rối loạn ăn uống. Tham khảo ý kiến bác sĩ hoặc chuyên gia dinh dưỡng để tăng cân bình thường.'
                                );
                            }
                            if(WHtR >= 0.42 && WHtR <= 0.48){
                                $('.ketqua-text').text('Khỏe mạnh');
                                $('.ketqua-text1').text('Tiếp tục ăn uống lành mạnh và tập thể dục 150 phút mỗi tuần để giữ cân nặng của bạn trong phạm vi khuyến nghị.' );
                            }
                            if(WHtR >= 0.49 && WHtR <= 0.57){
                                $('.ketqua-text').text('Thừa cân');
                                $('.ketqua-text1').text('Bạn có thể có nhiều mỡ trong cơ thể hơn do lối sống ít vận động. Thừa cân là một yếu tố nguy cơ của bệnh tim, tiểu đường và tăng huyết áp. Chúng tôi khuyên bạn nên tăng cường hoạt động và tập thể dục ít nhất 150 phút mỗi tuần để giảm cân và lấy lại vóc dáng.' );
                            }
                            if(WHtR >= 0.58){
                                $('.ketqua-text').text('Bệnh béo phì');
                                $('.ketqua-text1').text('Béo phì làm giảm tuổi thọ của bạn và khiến bạn dễ mắc các bệnh khác nhau, đặc biệt là bệnh tim, tiểu đường, ngưng thở khi ngủ, viêm xương khớp, liệt dương và một số loại ung thư. Ngay cả một chế độ tập thể dục ngắn cũng có thể giúp bạn tăng tốc độ trao đổi chất hằng ngày và giúp bạn tăng lượng calo tiêu thụ và giảm cân. Tham khảo ý kiến của chuyên gia dinh dưỡng, chuyên gia thể dục và bác sĩ của bạn để cải thiện lối sống và tối ưu hóa cân nặng của bạn.' );
                            }
                        }

                    })
                });
            </script>

        
<div class="calculator-table-form blue" id="gendercolor">
<form name="waist_height" method="post">
    <table border="0" cellpadding="5" cellspacing="0" width="100%" class="tv12black">
        <tbody><tr class="table-head">
            <td colspan="2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nhập chi tiết</font></font></td>
        </tr>
        <tr>
            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Giới tính </font></font><span class="mandatory-star"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span>
            </td>
            <td>
            <input type="radio" name="sex" value="Male" size="6" maxlength="3" onclick="checkgender();" checked=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Nam giới &nbsp;
            </font></font><input type="radio" name="sex" value="Female" size="6" maxlength="3" onclick="checkgender();"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Giống cái
             </font></font></td>
        </tr>   
         <tr>
        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Chiều cao </font></font><span class="mandatory-star"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span></td>
        <td><input type="text" name="height" style="width:80px" onkeyup="conv(3)" maxlength="3" placeholder="170" required>
          <input type="hidden" name="inches" value="0">
          <input type="hidden" name="selheight"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
          &nbsp;cm &nbsp;</font></font><br></td>
      </tr>

    <tr>
        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Kích thước vòng eo </font></font><span class="mandatory-star"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span></td>
        <td>
<input type="text" name="txtWaist" size="8" maxlength="6" placeholder="20-160" class="definput" onkeypress="return numeralsOnly(event)" onfocus="setfocus('waist');" required> &nbsp;cm
        </td>
    </tr>
    <tr>
        <td colspan="2"> 
        <span class="required"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">* Yêu cầu</font></font></span> 
        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input class="flat-btn" type="submit" value="Nộp"></font></font></font></font>
        <input class="flat-btn" type="reset" value="Reset" onclick="checkgender();">
        </td>
    </tr>               
</tbody></table>
</form>
</div>


        <div class="calculator-table-form blue " style="padding-top: 20px;display: none;" id="form_kq2">
            <table class="tv12black" cellpadding="5" cellspacing="1">
                <tbody><tr class="table-head"><td colspan="2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Kết quả</font></font></td></tr>
                    <tr><td colspan="3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                Tỷ lệ vòng eo trên chiều cao của bạn là </font></font><font color="red"><b><font style="vertical-align: inherit;"><font class="ketqua" style="vertical-align: inherit;"></font>%</font></b></font><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> . </font><font style="vertical-align: inherit;">Tỷ lệ này chỉ ra rằng bạn đang ở </font></font><b><font style="vertical-align: inherit;"><font class="ketqua-text" style="vertical-align: inherit;">  </font></font></b><br><br>
                                <p class="ketqua-text1"></p>
                                <p class="ketqua-text2"></p>
                            </td></tr>         
                </tbody>
            </table>
        </div>


<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
}}