<?php
if(!function_exists('shortcode_115')){

function shortcode_115(){
    ob_start();
?>
<script language="javascript">
                function checkgender() { if (document.form.sex[0].checked) { gendercolor.className = "calculator-table-form blue"; form_kq2.className = "calculator-table-form blue"; } else { gendercolor.className = "calculator-table-form pink"; form_kq2.className = "calculator-table-form pink"; } }
                jQuery(document).ready(function () {
                    $('#submit_btn').click(function () {
                        var sex = $("input[name='sex']:checked").val();
                        var age = $("#age :selected").val();
                        var ethnicity = $("#ethnicity :selected").text();
                        if (ethnicity == 'Chọn'){
                            alert('Bạn chưa chọn chủng tộc!');
                            return false;
                        }
                        if (age == ''){
                            alert('Bạn chưa chọn tuổi!');
                            return false;
                        }
                        if (sex != 'male' && sex != 'female') {
                            alert('Bạn chưa chọn giới tính!');
                            return false;
                        }
                        if($("input[name='q1']:checked").val() != undefined){
                        var q1 = $("input[name='q1']:checked").val();
                        } else {
                            alert('Bạn chưa chọn biểu hiện của trẻ!');
                            return false;
                        }
                        if($("input[name='q2']:checked").val() != undefined){
                        var q2 = $("input[name='q2']:checked").val();
                        } else {
                            alert('Bạn chưa chọn biểu hiện của trẻ!');
                            return false;
                        }
                        if($("input[name='q3']:checked").val() != undefined){
                        var q3 = $("input[name='q3']:checked").val();
                        } else {
                            alert('Bạn chưa chọn biểu hiện của trẻ!');
                            return false;
                        }
                        if($("input[name='q4']:checked").val() != undefined){
                        var q4 = $("input[name='q4']:checked").val();
                        } else {
                            alert('Bạn chưa chọn biểu hiện của trẻ!');
                            return false;
                        }
                        if($("input[name='q5']:checked").val() != undefined){
                        var q5 = $("input[name='q5']:checked").val();
                        } else {
                            alert('Bạn chưa chọn biểu hiện của trẻ!');
                            return false;
                        }
                        if($("input[name='q6']:checked").val() != undefined){
                        var q6 = $("input[name='q6']:checked").val();
                        } else {
                            alert('Bạn chưa chọn biểu hiện của trẻ!');
                            return false;
                        }
                        if($("input[name='q7']:checked").val() != undefined){
                        var q7 = $("input[name='q7']:checked").val();
                        } else {
                            alert('Bạn chưa chọn biểu hiện của trẻ!');
                            return false;
                        }
                        if($("input[name='q8']:checked").val() != undefined){
                        var q8 = $("input[name='q8']:checked").val();
                        } else {
                            alert('Bạn chưa chọn biểu hiện của trẻ!');
                            return false;
                        }
                        if($("input[name='q9']:checked").val() != undefined){
                        var q9 = $("input[name='q9']:checked").val();
                        } else {
                            alert('Bạn chưa chọn biểu hiện của trẻ!');
                            return false;
                        }
                        if($("input[name='q10']:checked").val() != undefined){
                        var q10 = $("input[name='q10']:checked").val();
                        } else {
                            alert('Bạn chưa chọn biểu hiện của trẻ!');
                            return false;
                        }
                        var total = parseInt(q1) + parseInt(q2) + parseInt(q3) + parseInt(q4) + parseInt(q5) + parseInt(q6) + parseInt(q7) + parseInt(q8) + parseInt(q9) + parseInt(q10);
                        if(total < 12) {
                            $('#content_').html('Trẻ không có các triệu chứng của tình trạng tăng động giảm chú ý. Tuy nhiên nếu bạn còn nghi ngờ, hãy hỏi người khác biết rõ về hành vi của trẻ để làm lại cuộc kiểm tra này hoặc có thể hỏi ý kiến bác sĩ tâm thần');
                        } else if (total >= 12){
                            $('#content_').html('Trẻ có thể đã ở trong nhóm các trẻ có biểu hiện "tăng động" và có thể mắc chứng rối loạn tăng động giảm trí nhớ với khả năng là 95%. Nếu điểm số các lần đều giống nhau, hãy hỏi ý kiến bác sĩ tâm thần, bác sĩ sẽ đưa ra chẩn đoán xác định và đưa ra liệu pháp điều trị cần thiết');
                        }
                        $('#form_kq2').css('display', 'block');
                    })
                });
            </script>
            <div class="calculator-table-form blue " id="gendercolor">
                <form method="post" name="form">


                    <table width="100%" border="0" cellpadding="0" cellspacing="1">
                        <tbody>
                            <tr class="table-head">
                                <td colspan="2">Nhập các thông tin sau</td>
                            </tr>
                            <tr>
                                <td width="53%" align="left">Chủng tộc của trẻ<span
                                        class="mandatory-star">&nbsp;*</span>
                                </td>
                                <td width="47%" valign="middle">
                                    <select name="ethnicity" id="ethnicity">
                                        <option value="-1" selected="">Chọn</option>
                                        <option value="0">Người Châu Á</option>
                                        <option value="1">Người châu Phi</option>
                                        <option value="2">Người da trắng</option>
                                        <option value="3">Người Tây Ban Nha</option>
                                        <option value="4">Các nhóm dân cư khác</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="53%" align="left">Tuổi hiện tại<span
                                        class="mandatory-star">&nbsp;*</span>
                                </td>
                                <td width="47%" valign="middle">
                                    <select size="1" name="age" class="tv12black" id="age">
                                        <option selected="" value="">Chọn</option>

                                        <option value="6">6</option>

                                        <option value="7">7</option>

                                        <option value="8">8</option>

                                        <option value="9">9</option>

                                        <option value="10">10</option>

                                        <option value="11">11</option>

                                        <option value="12">12</option>

                                        <option value="13">13</option>

                                        <option value="14">14</option>

                                        <option value="15">15</option>

                                        <option value="16">16</option>

                                        <option value="17">17</option>

                                        <option value="18">18</option>

                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="53%" align="left">Giới tính của trẻ<span
                                        class="mandatory-star">&nbsp;*</span></td>
                                <td width="47%" align="left" style="padding:10px">
                                    <input type="radio" value="male" name="sex" onclick="checkgender();">Nam&nbsp;
                                    <input type="radio" value="female" name="sex" id="female"
                                        onclick="checkgender();">Nữ&nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td width="53%" align="left">Mối quan hệ của bạn với trẻ<span
                                        class="mandatory-star">&nbsp;*</span></td>
                                <td width="47%" align="left" style="padding:10px">
                                    <input type="radio" value="Mother" name="rel" checked="checked">Mẹ&nbsp;
                                    <input type="radio" value="Father" name="rel" id="Father">Bố&nbsp;<br>
                                    <input type="radio" value="Brother" name="rel" id="Brother">Anh&nbsp;
                                    <input type="radio" value="Sister" name="rel" id="Sister">Chị&nbsp;<br>
                                    <input type="radio" value="Others" name="rel" id="Others">Khác&nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                            </tr>
                        </tbody>
                    </table>


                    <table width="100%" cellpadding="10">
                        <tbody>
                            <tr>
                                <td colspan="6" class="tv12blue">Ở độ tuổi từ 6-10, trẻ có các biểu hiện nào dưới đây, và mức độ biểu hiện của trẻ như thế nào. Hãy điền vào ô tương ứng.</td>
                            </tr>
                            <tr class="CalcDarkBgWhite">
                                <td width="2%"></td>
                                <td width="57%">Nhóm hành vi</td>
                                <td width="10%">Không bao giờ</td>
                                <td width="10%">Thỉnh thoảng</td>
                                <td width="10%">Khá thường xuyên</td>
                                <td width="10%">Rất thường xuyên</td>
                            </tr>
                            <tr height="40">
                                <td valign="baseline">1.</td>
                                <td valign="baseline">Không ngồi yên, cử động liên tục quá mức<font color="#ff0000"></font>
                                </td>
                                <td valign="baseline"><input type="radio" name="q1" value="0"></td>
                                <td valign="baseline"><input type="radio" name="q1" value="1"></td>
                                <td valign="baseline"><input type="radio" name="q1" value="2"></td>
                                <td valign="baseline"><input type="radio" name="q1" value="3"></td>
                            </tr>
                            <tr height="40">
                                <td valign="baseline">2.</td>
                                <td valign="baseline">Dễ bị kích thích, bốc đồng <font color="#ff0000"></font>
                                </td>
                                <td valign="baseline"><input type="radio" name="q2" value="0"></td>
                                <td valign="baseline"><input type="radio" name="q2" value="1"></td>
                                <td valign="baseline"><input type="radio" name="q2" value="2"></td>
                                <td valign="baseline"><input type="radio" name="q2" value="3"></td>
                            </tr>
                            <tr height="40">
                                <td valign="baseline">3.</td>
                                <td valign="baseline">Quấy rầy các trẻ khác <font color="#ff0000"></font>
                                </td>
                                <td valign="baseline"><input type="radio" name="q3" value="0"></td>
                                <td valign="baseline"><input type="radio" name="q3" value="1"></td>
                                <td valign="baseline"><input type="radio" name="q3" value="2"></td>
                                <td valign="baseline"><input type="radio" name="q3" value="3"></td>
                            </tr>
                            <tr height="40">
                                <td valign="baseline">4.</td>
                                <td valign="baseline">Không thể hoàn thành được công việc (khả năng tập trung chú ý ngắn) <font
                                        color="#ff0000"></font>
                                </td>
                                <td valign="baseline"><input type="radio" name="q4" value="0"></td>
                                <td valign="baseline"><input type="radio" name="q4" value="1"></td>
                                <td valign="baseline"><input type="radio" name="q4" value="2"></td>
                                <td valign="baseline"><input type="radio" name="q4" value="3"></td>
                            </tr>
                            <tr height="40">
                                <td valign="baseline">5.</td>
                                <td valign="baseline">Hay cựa quậy<font color="#ff0000"></font>
                                </td>
                                <td valign="baseline"><input type="radio" name="q5" value="0"></td>
                                <td valign="baseline"><input type="radio" name="q5" value="1"></td>
                                <td valign="baseline"><input type="radio" name="q5" value="2"></td>
                                <td valign="baseline"><input type="radio" name="q5" value="3"></td>
                            </tr>
                            <tr height="40">
                                <td valign="baseline">6.</td>
                                <td valign="baseline">Lơ là, thiếu chú ý, hay lãng trí<font color="#ff0000"></font>
                                </td>
                                <td valign="baseline"><input type="radio" name="q6" value="0"></td>
                                <td valign="baseline"><input type="radio" name="q6" value="1"></td>
                                <td valign="baseline"><input type="radio" name="q6" value="2"></td>
                                <td valign="baseline"><input type="radio" name="q6" value="3"></td>
                            </tr>
                            <tr height="40">
                                <td valign="baseline">7.</td>
                                <td valign="baseline">Thường phải ra lệnh ngay lập tức nếu không sẽ gây thất vọng<font
                                        color="#ff0000"></font>
                                </td>
                                <td valign="baseline"><input type="radio" name="q7" value="0"></td>
                                <td valign="baseline"><input type="radio" name="q7" value="1"></td>
                                <td valign="baseline"><input type="radio" name="q7" value="2"></td>
                                <td valign="baseline"><input type="radio" name="q7" value="3"></td>
                            </tr>
                            <tr height="40">
                                <td valign="baseline">8.</td>
                                <td valign="baseline">Hay khóc<font color="#ff0000"></font>
                                </td>
                                <td valign="baseline"><input type="radio" name="q8" value="0"></td>
                                <td valign="baseline"><input type="radio" name="q8" value="1"></td>
                                <td valign="baseline"><input type="radio" name="q8" value="2"></td>
                                <td valign="baseline"><input type="radio" name="q8" value="3"></td>
                            </tr>
                            <tr height="40">
                                <td valign="baseline">9.</td>
                                <td valign="baseline">Thay đổi tâm trạng rất nhanh<font color="#ff0000"></font>
                                </td>
                                <td valign="baseline"><input type="radio" name="q9" value="0"></td>
                                <td valign="baseline"><input type="radio" name="q9" value="1"></td>
                                <td valign="baseline"><input type="radio" name="q9" value="2"></td>
                                <td valign="baseline"><input type="radio" name="q9" value="3"></td>
                            </tr>
                            <tr height="40">
                                <td valign="baseline">10.</td>
                                <td valign="baseline">Tính khí dễ bùng nổ, bột phát (hành vi không đoán trước được)<font
                                        color="#ff0000"></font>
                                </td>
                                <td valign="baseline"><input type="radio" name="q10" value="0"></td>
                                <td valign="baseline"><input type="radio" name="q10" value="1"></td>
                                <td valign="baseline"><input type="radio" name="q10" value="2"></td>
                                <td valign="baseline"><input type="radio" name="q10" value="3"></td>
                            </tr>
                            <tr height="30">
                            </tr>
                            <tr>
                                <td colspan="6"><span class="red">* bắt buộc<input type="button" class="flat-btn"
                                            value="Kiểm tra" name="submit1" id="submit_btn"><input type="reset" class="flat-btn"
                                            value="Nhập lại" name="clear1"></span></td>
                            </tr>
                        </tbody>
                    </table>

                </form>
        </div>
        <div class="calculator-table-form  blue " style="padding-top: 10px; display: none;" id="form_kq2">      
            <table class="tv12black">
                <tbody><tr class="table-head"><td colspan="2">Kết quả</td></tr>
                <tr>
                    <td id="content_"></td>
                </tr>
                <tr>
                    <td class="calcnote">* Chú ý: đây là ứng dụng giúp tầm soát nguy cơ, không phải ứng dụng dùng để chẩn đoán bệnh</td>
                </tr>
            </tbody></table>
        </div>


<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
}}