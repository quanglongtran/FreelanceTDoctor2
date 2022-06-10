<?php
if(!function_exists('test_your_happiness_score')){

function test_your_happiness_score(){
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
                jQuery(document).ready(function () {
                    $('#submit_btn').click(function () {
                        var sex = $("input[name='sex']:checked").val();
                        var age = $("input[name='age']").val();
                        var ethnicity = $("#ethnicity :selected").text();
                        if(ethnicity == 'Chọn'){
                            alert('Bạn chưa chọn dân tộc!');
                            return false;
                        }
                        if(age == ""){
                            alert('Bạn chưa nhập tuổi!');
                            return false;
                        }
                        if(!age.match(/^[0-9]+(\.[0-9]+)?$/)){
                            alert("Vui lòng chọn tuổi hợp lệ!");
                            return false;
                        }
                        if (sex != 'male' && sex != 'female'){
                            alert('Bạn chưa chọn giới tính');
                            return false;
                        }
                        if ($("input[name='q1']:checked").val() == undefined){
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q2']:checked").val() == undefined){
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q3']:checked").val() == undefined){
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q4']:checked").val() == undefined){
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q5']:checked").val() == undefined){
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q6']:checked").val() == undefined){
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q7']:checked").val() == undefined){
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q8']:checked").val() == undefined){
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q9']:checked").val() == undefined){
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q10']:checked").val() == undefined){
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q11']:checked").val() == undefined){
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q12']:checked").val() == undefined){
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q13']:checked").val() == undefined){
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q14']:checked").val() == undefined){
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q15']:checked").val() == undefined){
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q16']:checked").val() == undefined){
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q17']:checked").val() == undefined){
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q18']:checked").val() == undefined){
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q19']:checked").val() == undefined){
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q20']:checked").val() == undefined){
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q21']:checked").val() == undefined){
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q22']:checked").val() == undefined){
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q23']:checked").val() == undefined){
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q24']:checked").val() == undefined){
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q25']:checked").val() == undefined){
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q26']:checked").val() == undefined){
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q27']:checked").val() == undefined){
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q28']:checked").val() == undefined){
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q29']:checked").val() == undefined){
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }

                        var total = 0;
                        $.map($("input[name!='sex']:radio:checked"), function (params, id) {
                            total += parseInt($(params).val());
                        });
                        var total_ = total/29;
                        if(total_ > 0 && total_ <3 ){
                            $('#status').html("Không hạnh phúc");
                            $('#content').html("Nếu bạn trả lời thành thật và bị điểm rất thấp, có lẽ bạn đang thấy tình hình của bản thân và bạn tồi tệ hơn thực tế");
                        } else if(total_ >= 2 && total_ <= 3 ){
                            $('#status').html("Hơi không hạnh phúc");
                            $('#content').html("Hãy thử một số bài tập trên trang web này như Gratitude Journal & Gratitude Lists , hoặc Gratitude Visit");
                        } else if(total_ >= 3 && total_ <= 4 ){
                            $('#status').html("Không thực sự hạnh phúc");
                            $('#content').html("Điểm 3,5 sẽ là con số trung bình chính xác của các câu trả lời hài lòng và không hài lòng. Một số bài tập được đề cập ở trên đã được thử nghiệm trong các nghiên cứu khoa học và được chứng minh là giúp mọi người hạnh phúc hơn lâu dài.");
                        } else if(total_ ==4 ){
                            $('#status').html("Hạnh phúc vừa phải");
                            $('#content').html("Thỏa mãn. Đây là những gì một người bình thường cho điểm.");
                        } else if(total_ >= 4 && total_ <= 5 ){
                            $('#status').html("Khá hạnh phúc");
                            $('#content').html("");
                        } else if(total_ >= 5 && total_ <= 6 ){
                            $('#status').html("Rất hạnh phúc");
                            $('#content').html("Hạnh phúc có nhiều lợi ích hơn là chỉ cảm thấy tốt. Nó tương quan với những lợi ích như sức khỏe, hôn nhân tốt hơn và đạt được mục tiêu của bạn");
                        } else if(total_ == 6 ){
                            $('#status').html("Quá hạnh phúc");
                            $('#content').html("Nghiên cứu gần đây dường như cho thấy rằng có một mức độ hạnh phúc tối ưu cho những việc như làm tốt ở cơ quan hoặc trường học, hoặc để có lợi cho sức khỏe, và rằng quá hạnh phúc có thể liên quan đến mức độ thấp hơn của những thứ như vậy");
                        }
                        var round_ = Math.round(total_,2);
                        $('#total').html(round_);
                        $('#form_kq2').css('display', 'block');
                    });
                });
                function checkgender(){if (document.frmcal.sex[0].checked){gendercolor.className = "calculator-table-form blue";} else {gendercolor.className = "calculator-table-form pink"; } }
            </script>
            <div class="calculator-table-form blue" id="gendercolor">
                <form method="post" name="frmcal">

                    <table cellpadding="5" width="100%" class="bluebox2 tv12blue">
                        <tbody>
                            <tr class="table-head">
                                <td colspan="2">Trả lời tất cả các câu hỏi một cách trung thực</td>
                            </tr>
                            <tr>
                                <td>Giới tính</td>
                                <td><input type="radio" name="sex" value="male" onclick="checkgender()">Nam <input
                                        type="radio" name="sex" value="female" onclick="checkgender()">Nữ </td>
                            </tr>
                            <tr>
                                <td width="50%">Tuổi</td>
                                <td width="50%">
                                    <input id="ag" type="text" maxlength="3" name="age" style="width: 65px"></td>
                            </tr>
                            <tr>
                                <td>Dân tộc</td>
                                <td><select name="ethnicity" style="width: 67px" id="ethnicity">
                                        <option value="-1">Chọn</option>
                                        <option value="0">Người Châu Á</option>
                                        <option value="1">Người châu Phi</option>
                                        <option value="2">Người da trắng</option>
                                        <option value="3">Người Tây Ban Nha</option>
                                        <option value="4">Các nhóm dân cư khác</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                            </tr>
                        </tbody>
                    </table>
                    <table border="1" cellpadding="0" cellspacing="0" bordercolor="#429fe2" width="100%"
                        class="content15">
                        <tbody>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">1.

                                </td>
                                <td width="312" class="bluebox2">
                                    Tôi không cảm thấy đặc biệt hài lòng với cách sống của tôi?<sup class="red">*</sup>

                                    <br>
                                    <br>
                                    <input type="radio" name="q1" value="6">Rất không đồng ý<br>
                                    <input type="radio" name="q1" value="5">Không đồng ý một phần<br>
                                    <input type="radio" name="q1" value="4">Phân vân<br>
                                    <input type="radio" name="q1" value="3">Đồng ý một phần<br>
                                    <input type="radio" name="q1" value="2">Đồng ý<br>
                                    <input type="radio" name="q1" value="1">Rất đồng ý<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    2
                                </td>
                                <td width="312" class="bluebox2">
                                    Tôi rất quan tâm đến người khác?<sup class="red">*</sup>

                                    <br>
                                    <br>

                                    <input type="radio" name="q2" value="1">Rất không đồng ý<br>
                                    <input type="radio" name="q2" value="2">Không đồng ý một phần<br>
                                    <input type="radio" name="q2" value="3">Phân vân<br>
                                    <input type="radio" name="q2" value="4">Đồng ý một phần<br>
                                    <input type="radio" name="q2" value="5">Đồng ý<br>
                                    <input type="radio" name="q2" value="6">Rất đồng ý<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    3
                                </td>
                                <td width="312" class="bluebox2">
                                    Tôi cảm thấy rằng cuộc sống rất bổ ích?<sup class="red">*</sup>
                                    <br>
                                    <br>


                                    <input type="radio" name="q3" value="1">Rất không đồng ý<br>
                                    <input type="radio" name="q3" value="2">Không đồng ý một phần<br>
                                    <input type="radio" name="q3" value="3">Phân vân<br>
                                    <input type="radio" name="q3" value="4">Đồng ý một phần<br>
                                    <input type="radio" name="q3" value="5">Đồng ý<br>
                                    <input type="radio" name="q3" value="6">Rất đồng ý<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    4
                                </td>
                                <td width="312" class="bluebox2">
                                    Tôi có tình cảm rất ấm áp đối với hầu hết mọi người?<sup
                                        class="red">*</sup><br>
                                    <br>


                                    <input type="radio" name="q4" value="1">Rất không đồng ý<br>
                                    <input type="radio" name="q4" value="2">Không đồng ý một phần<br>
                                    <input type="radio" name="q4" value="3">Phân vân<br>
                                    <input type="radio" name="q4" value="4">Đồng ý một phần<br>
                                    <input type="radio" name="q4" value="5">Đồng ý<br>
                                    <input type="radio" name="q4" value="6">Rất đồng ý<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    5
                                </td>
                                <td width="312" class="bluebox2">
                                    Tôi hiếm khi thức dậy với cảm giác được nghỉ ngơi?<sup class="red">*</sup>

                                    <br>
                                    <br>


                                    <input type="radio" name="q5" value="6">Rất không đồng ý<br>
                                    <input type="radio" name="q5" value="5">Không đồng ý một phần<br>
                                    <input type="radio" name="q5" value="4">Phân vân<br>
                                    <input type="radio" name="q5" value="3">Đồng ý một phần<br>
                                    <input type="radio" name="q5" value="2">Đồng ý<br>
                                    <input type="radio" name="q5" value="1">Rất đồng ý<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    6
                                </td>
                                <td width="312" class="bluebox2">
                                    Tôi không đặc biệt lạc quan về tương lai?<sup class="red">*</sup>

                                    <br>
                                    <br>


                                    <input type="radio" name="q6" value="6">Rất không đồng ý<br>
                                    <input type="radio" name="q6" value="5">Không đồng ý một phần<br>
                                    <input type="radio" name="q6" value="4">Phân vân<br>
                                    <input type="radio" name="q6" value="3">Đồng ý một phần<br>
                                    <input type="radio" name="q6" value="2">Đồng ý<br>
                                    <input type="radio" name="q6" value="1">Rất đồng ý<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    7
                                </td>
                                <td width="312" class="bluebox2">
                                    Tôi thấy hầu hết mọi thứ đều thú vị?<sup class="red">*</sup>

                                    <br>
                                    <br>


                                    <input type="radio" name="q7" value="1">Rất không đồng ý<br>
                                    <input type="radio" name="q7" value="2">Không đồng ý một phần<br>
                                    <input type="radio" name="q7" value="3">Phân vân<br>
                                    <input type="radio" name="q7" value="4">Đồng ý một phần<br>
                                    <input type="radio" name="q7" value="5">Đồng ý<br>
                                    <input type="radio" name="q7" value="6">Rất đồng ý<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    8
                                </td>
                                <td width="312" class="bluebox2">
                                    Tôi luôn cam kết và tham gia?<sup class="red">*</sup>

                                    <br>
                                    <br>


                                    <input type="radio" name="q8" value="1">Rất không đồng ý<br>
                                    <input type="radio" name="q8" value="2">Không đồng ý một phần<br>
                                    <input type="radio" name="q8" value="3">Phân vân<br>
                                    <input type="radio" name="q8" value="4">Đồng ý một phần<br>
                                    <input type="radio" name="q8" value="5">Đồng ý<br>
                                    <input type="radio" name="q8" value="6">Rất đồng ý<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    9
                                </td>
                                <td width="312" class="bluebox2">
                                    Cuộc sống tốt đẹp?<sup class="red">*</sup>

                                    <br>
                                    <br>


                                    <input type="radio" name="q9" value="1">Rất không đồng ý<br>
                                    <input type="radio" name="q9" value="2">Không đồng ý một phần<br>
                                    <input type="radio" name="q9" value="3">Phân vân<br>
                                    <input type="radio" name="q9" value="4">Đồng ý một phần<br>
                                    <input type="radio" name="q9" value="5">Đồng ý<br>
                                    <input type="radio" name="q9" value="6">Rất đồng ý<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    10
                                </td>
                                <td width="312" class="bluebox2">
                                    Tôi không nghĩ rằng thế giới là một nơi tốt đẹp?<sup
                                        class="red">*</sup>
                                    <br>
                                    <br>
                                    <input type="radio" name="q10" value="6">Rất không đồng ý<br>
                                    <input type="radio" name="q10" value="5">Không đồng ý một phần<br>
                                    <input type="radio" name="q10" value="4">Phân vân<br>
                                    <input type="radio" name="q10" value="3">Đồng ý một phần<br>
                                    <input type="radio" name="q10" value="2">Đồng ý<br>
                                    <input type="radio" name="q10" value="1">Rất đồng ý<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">11.

                                </td>
                                <td width="312" class="bluebox2">
                                    Tôi cười rất nhiều?<sup class="red">*</sup>

                                    <br>
                                    <br>
                                    <input type="radio" name="q11" value="1">Rất không đồng ý<br>
                                    <input type="radio" name="q11" value="2">Không đồng ý một phần<br>
                                    <input type="radio" name="q11" value="3">Phân vân<br>
                                    <input type="radio" name="q11" value="4">Đồng ý một phần<br>
                                    <input type="radio" name="q11" value="5">Đồng ý<br>
                                    <input type="radio" name="q11" value="6">Rất đồng ý<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    12
                                </td>
                                <td width="312" class="bluebox2">
                                    Tôi hài lòng về mọi thứ trong cuộc sống của mình?<sup class="red">*</sup>

                                    <br>
                                    <br>

                                    <input type="radio" name="q12" value="1">Rất không đồng ý<br>
                                    <input type="radio" name="q12" value="2">Không đồng ý một phần<br>
                                    <input type="radio" name="q12" value="3">Phân vân<br>
                                    <input type="radio" name="q12" value="4">Đồng ý một phần<br>
                                    <input type="radio" name="q12" value="5">Đồng ý<br>
                                    <input type="radio" name="q12" value="6">Rất đồng ý<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    13
                                </td>
                                <td width="312" class="bluebox2">
                                    Tôi không nghĩ mình trông hấp dẫn?<sup class="red">*</sup>
                                    <br>
                                    <br>


                                    <input type="radio" name="q13" value="6">Rất không đồng ý<br>
                                    <input type="radio" name="q13" value="5">Không đồng ý một phần<br>
                                    <input type="radio" name="q13" value="4">Phân vân<br>
                                    <input type="radio" name="q13" value="3">Đồng ý một phần<br>
                                    <input type="radio" name="q13" value="2">Đồng ý<br>
                                    <input type="radio" name="q13" value="1">Rất đồng ý<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    14
                                </td>
                                <td width="312" class="bluebox2">
                                    Có một khoảng cách giữa những gì tôi muốn làm và những gì tôi đã làm?<sup
                                        class="red">*</sup><br>
                                    <br>


                                    <input type="radio" name="q14" value="6">Rất không đồng ý<br>
                                    <input type="radio" name="q14" value="5">Không đồng ý một phần<br>
                                    <input type="radio" name="q14" value="4">Phân vân<br>
                                    <input type="radio" name="q14" value="3">Đồng ý một phần<br>
                                    <input type="radio" name="q14" value="2">Đồng ý<br>
                                    <input type="radio" name="q14" value="1">Rất đồng ý<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    15
                                </td>
                                <td width="312" class="bluebox2">
                                    Tôi rất hạnh phúc?<sup class="red">*</sup>

                                    <br>
                                    <br>


                                    <input type="radio" name="q15" value="1">Rất không đồng ý<br>
                                    <input type="radio" name="q15" value="2">Không đồng ý một phần<br>
                                    <input type="radio" name="q15" value="3">Phân vân<br>
                                    <input type="radio" name="q15" value="4">Đồng ý một phần<br>
                                    <input type="radio" name="q15" value="5">Đồng ý<br>
                                    <input type="radio" name="q15" value="6">Rất đồng ý<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    16
                                </td>
                                <td width="312" class="bluebox2">
                                    Tôi tìm thấy vẻ đẹp ở một số thứ?<sup class="red">*</sup>

                                    <br>
                                    <br>


                                    <input type="radio" name="q16" value="1">Rất không đồng ý<br>
                                    <input type="radio" name="q16" value="2">Không đồng ý một phần<br>
                                    <input type="radio" name="q16" value="3">Phân vân<br>
                                    <input type="radio" name="q16" value="4">Đồng ý một phần<br>
                                    <input type="radio" name="q16" value="5">Đồng ý<br>
                                    <input type="radio" name="q16" value="6">Rất đồng ý<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    17
                                </td>
                                <td width="312" class="bluebox2">
                                    Tôi luôn có tác dụng vui vẻ đối với người khác?<sup class="red">*</sup>

                                    <br>
                                    <br>


                                    <input type="radio" name="q17" value="1">Rất không đồng ý<br>
                                    <input type="radio" name="q17" value="2">Không đồng ý một phần<br>
                                    <input type="radio" name="q17" value="3">Phân vân<br>
                                    <input type="radio" name="q17" value="4">Đồng ý một phần<br>
                                    <input type="radio" name="q17" value="5">Đồng ý<br>
                                    <input type="radio" name="q17" value="6">Rất đồng ý<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    18
                                </td>
                                <td width="312" class="bluebox2">
                                    Tôi có thể phù hợp (tìm thời gian cho) mọi thứ tôi muốn?<sup class="red">*</sup>

                                    <br>
                                    <br>


                                    <input type="radio" name="q18" value="1">Rất không đồng ý<br>
                                    <input type="radio" name="q18" value="2">Không đồng ý một phần<br>
                                    <input type="radio" name="q18" value="3">Phân vân<br>
                                    <input type="radio" name="q18" value="4">Đồng ý một phần<br>
                                    <input type="radio" name="q18" value="5">Đồng ý<br>
                                    <input type="radio" name="q18" value="6">Rất đồng ý<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    19
                                </td>
                                <td width="312" class="bluebox2">
                                    Tôi cảm thấy rằng tôi không đặc biệt kiểm soát cuộc sống của mình?<sup class="red">*</sup>

                                    <br>
                                    <br>


                                    <input type="radio" name="q19" value="6">Rất không đồng ý<br>
                                    <input type="radio" name="q19" value="5">Không đồng ý một phần<br>
                                    <input type="radio" name="q19" value="4">Phân vân<br>
                                    <input type="radio" name="q19" value="3">Đồng ý một phần<br>
                                    <input type="radio" name="q19" value="2">Đồng ý<br>
                                    <input type="radio" name="q19" value="1">Rất đồng ý<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    20
                                </td>
                                <td width="312" class="bluebox2">
                                    Tôi cảm thấy có thể đảm nhận bất cứ điều gì?<sup
                                        class="red">*</sup>
                                    <br>
                                    <br>
                                    <input type="radio" name="q20" value="1">Rất không đồng ý<br>
                                    <input type="radio" name="q20" value="2">Không đồng ý một phần<br>
                                    <input type="radio" name="q20" value="3">Phân vân<br>
                                    <input type="radio" name="q20" value="4">Đồng ý một phần<br>
                                    <input type="radio" name="q20" value="5">Đồng ý<br>
                                    <input type="radio" name="q20" value="6">Rất đồng ý<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">21.

                                </td>
                                <td width="312" class="bluebox2">
                                    Tôi cảm thấy tinh thần hoàn toàn tỉnh táo?<sup class="red">*</sup>

                                    <br>
                                    <br>
                                    <input type="radio" name="q21" value="1">Rất không đồng ý<br>
                                    <input type="radio" name="q21" value="2">Không đồng ý một phần<br>
                                    <input type="radio" name="q21" value="3">Phân vân<br>
                                    <input type="radio" name="q21" value="4">Đồng ý một phần<br>
                                    <input type="radio" name="q21" value="5">Đồng ý<br>
                                    <input type="radio" name="q21" value="6">Rất đồng ý<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    22
                                </td>
                                <td width="312" class="bluebox2">
                                    Tôi thường trải nghiệm niềm vui và sự phấn chấn?<sup class="red">*</sup>

                                    <br>
                                    <br>

                                    <input type="radio" name="q22" value="1">Rất không đồng ý<br>
                                    <input type="radio" name="q22" value="2">Không đồng ý một phần<br>
                                    <input type="radio" name="q22" value="3">Phân vân<br>
                                    <input type="radio" name="q22" value="4">Đồng ý một phần<br>
                                    <input type="radio" name="q22" value="5">Đồng ý<br>
                                    <input type="radio" name="q22" value="6">Rất đồng ý<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    23
                                </td>
                                <td width="312" class="bluebox2">
                                    Tôi không thấy dễ dàng để đưa ra quyết định?<sup class="red">*</sup>
                                    <br>
                                    <br>


                                    <input type="radio" name="q23" value="6">Rất không đồng ý<br>
                                    <input type="radio" name="q23" value="5">Không đồng ý một phần<br>
                                    <input type="radio" name="q23" value="4">Phân vân<br>
                                    <input type="radio" name="q23" value="3">Đồng ý một phần<br>
                                    <input type="radio" name="q23" value="2">Đồng ý<br>
                                    <input type="radio" name="q23" value="1">Rất đồng ý<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    24
                                </td>
                                <td width="312" class="bluebox2">
                                    Tôi không có ý nghĩa và mục đích cụ thể trong cuộc sống của mình?<sup
                                        class="red">*</sup><br>
                                    <br>


                                    <input type="radio" name="q24" value="6">Rất không đồng ý<br>
                                    <input type="radio" name="q24" value="5">Không đồng ý một phần<br>
                                    <input type="radio" name="q24" value="4">Phân vân<br>
                                    <input type="radio" name="q24" value="3">Đồng ý một phần<br>
                                    <input type="radio" name="q24" value="2">Đồng ý<br>
                                    <input type="radio" name="q24" value="1">Rất đồng ý<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    25
                                </td>
                                <td width="312" class="bluebox2">
                                    Tôi cảm thấy mình có rất nhiều năng lượng?<sup class="red">*</sup>

                                    <br>
                                    <br>


                                    <input type="radio" name="q25" value="1">Rất không đồng ý<br>
                                    <input type="radio" name="q25" value="2">Không đồng ý một phần<br>
                                    <input type="radio" name="q25" value="3">Phân vân<br>
                                    <input type="radio" name="q25" value="4">Đồng ý một phần<br>
                                    <input type="radio" name="q25" value="5">Đồng ý<br>
                                    <input type="radio" name="q25" value="6">Rất đồng ý<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    26
                                </td>
                                <td width="312" class="bluebox2">
                                    Tôi thường có ảnh hưởng tốt đến các sự kiện?<sup class="red">*</sup>

                                    <br>
                                    <br>


                                    <input type="radio" name="q26" value="1">Rất không đồng ý<br>
                                    <input type="radio" name="q26" value="2">Không đồng ý một phần<br>
                                    <input type="radio" name="q26" value="3">Phân vân<br>
                                    <input type="radio" name="q26" value="4">Đồng ý một phần<br>
                                    <input type="radio" name="q26" value="5">Đồng ý<br>
                                    <input type="radio" name="q26" value="6">Rất đồng ý<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    27
                                </td>
                                <td width="312" class="bluebox2">
                                    Tôi không có niềm vui với người khác?<sup class="red">*</sup>

                                    <br>
                                    <br>


                                    <input type="radio" name="q27" value="6">Rất không đồng ý<br>
                                    <input type="radio" name="q27" value="5">Không đồng ý một phần<br>
                                    <input type="radio" name="q27" value="4">Phân vân<br>
                                    <input type="radio" name="q27" value="3">Đồng ý một phần<br>
                                    <input type="radio" name="q27" value="2">Đồng ý<br>
                                    <input type="radio" name="q27" value="1">Rất đồng ý<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    28
                                </td>
                                <td width="312" class="bluebox2">
                                    Tôi không cảm thấy đặc biệt khỏe mạnh?<sup class="red">*</sup>

                                    <br>
                                    <br>


                                    <input type="radio" name="q28" value="6">Rất không đồng ý<br>
                                    <input type="radio" name="q28" value="5">Không đồng ý một phần<br>
                                    <input type="radio" name="q28" value="4">Phân vân<br>
                                    <input type="radio" name="q28" value="3">Đồng ý một phần<br>
                                    <input type="radio" name="q28" value="2">Đồng ý<br>
                                    <input type="radio" name="q28" value="1">Rất đồng ý<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    29
                                </td>
                                <td width="312" class="bluebox2">
                                    Tôi không có những kỷ niệm đặc biệt vui vẻ trong quá khứ?<sup class="red">*</sup>

                                    <br>
                                    <br>


                                    <input type="radio" name="q29" value="6">Rất không đồng ý<br>
                                    <input type="radio" name="q29" value="5">Không đồng ý một phần<br>
                                    <input type="radio" name="q29" value="4">Phân vân<br>
                                    <input type="radio" name="q29" value="3">Đồng ý một phần<br>
                                    <input type="radio" name="q29" value="2">Đồng ý<br>
                                    <input type="radio" name="q29" value="1">Rất đồng ý<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p align="left" class="red">* Tất cả các câu hỏi cho bài kiểm tra Hạnh phúc là Bắt buộc</p>
                                    <input type="button" value="Xác nhận" class="flat-btn" id="submit_btn">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="calculator-table-form blue" style="padding-top: 20px; display: none;" id="form_kq2">

                <table border="0" cellpadding="0" cellspacing="0" bordercolorlight="#FFFFFF" bordercolor="#0593E2"
                    width="100%" class="content15">
                    <tbody>
                        <tr class="table-head">
                            <td height="20" colspan="2" align="middle" class="bgblue7" width="100%" id="status" style="text-align: center;"></td>
                        </tr>
                        <tr>
                            <td width="164" style="padding-left:5px" align="center" valign="middle"><b>
                                    <br>Số điểm của bạn là<br>
                                </b><br></td>

                            <td width="162" style="padding-left:5px">
                                <font size="4" color="#FF0000"><b id="total"></b></font>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td width="100%" colspan="2" align="justify" style="padding-left:5px"
                                class="bluebox2 CalcDarkBgWhite1">
                                <p style="margin-left: 6;text-align:justify;" id="content">
                                    
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>

<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
}}