<?php
if(!function_exists('happiness_test')){

function happiness_test(){
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
                        var ethnicity = $("#ethnicity :selected").text();
                        if (ethnicity == 'Chọn') {
                            alert('Bạn chưa chọn chủng tộc!');
                            return false;
                        }
                        if (sex != 'male' && sex != 'female') {
                            alert('Bạn chưa chọn giới tính');
                            return false;
                        }
                        if ($("input[name='q1']:checked").val() == undefined) {
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q2']:checked").val() == undefined) {
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q3']:checked").val() == undefined) {
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q4']:checked").val() == undefined) {
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }
                        if ($("input[name='q5']:checked").val() == undefined) {
                            alert('Bạn chưa trả lời câu hỏi!');
                            return false;
                        }

                        var total_ = 0;
                        $.map($("input[name!='sex']:radio:checked"), function (params, id) {
                            total_ += parseInt($(params).val());
                        });
                        if (total_ >= 31 && total_ <= 35) {
                            $('#muc_do').html("Cực kì hài lòng");
                            $('#content').html("Bạn cực kì hài lòng. Điểm số này cho thấy bạn yêu cuộc sống hiện tại. cảm thấy thú vị và mọi thứ đang diễn ra tốt đẹp với bạn.");
                        } else if (total_ >= 26 && total_ <= 30) {
                            $('#muc_do').html("Hài lòng");
                            $('#content').html("Hài lòng. Bạn thấy thích cuộc sống của bạn, hầu hết các lĩnh vực trong cuộc sống đều thuận lợi với bạn.");
                        } else if (total_ >= 21 && total_ <= 25) {
                            $('#muc_do').html("Hài lòng ít");
                            $('#content').html("Bạn hài lòng ít. Nhìn chung bạn hài lòng với cuộc sống của mình nhưng một số lĩnh vực còn cần cải thiện. bạn muốn chuyển sang một cấp độ cao hơn bằng cách thay đổi cuộc sống.");
                        } else if (total_ == 20) {
                            $('#muc_do').html("Trung lập");
                            $('#content').html("Bạn hài lòng ở mức trung bình.");
                        } else if (total_ >= 15 && total_ <= 19) {
                            $('#muc_do').html("Không hài lòng ít");
                            $('#content').html("Bạn đang không hài lòng đáng kể. Có rất nhiều lĩnh vực trong cuộc sống của bạn có vấn đề. Cần thay đổi thái độ, lối suy nghĩ và các hoạt động sống. Sự bất hạnh có thể là trở ngại cho một số hoạt động bình thường, tư vấn có thể có ích cho bạn.");
                        } else if (total_ >= 10 && total_ <= 14) {
                            $('#muc_do').html("Không hài lòng");
                            $('#content').html("Về cơ bản, bạn không hài lòng với cuộc sống hiện tại của mình. Bạn cần sự trợ giúp từ chuyên gia.");
                        } else if (total_ >= 5 && total_ <= 9) {
                            $('#muc_do').html("Cực kì không hài lòng");
                            $('#content').html("Về cơ bản, bạn không hài lòng với cuộc sống hiện tại của mình. Bạn cần sự trợ giúp từ chuyên gia.");
                        }
                        $('#total').html(total_);
                        $('#form_kq2').css('display', 'block');
                    });
                });
                function checkgender() { if (document.frmcal.sex[0].checked) { gendercolor.className = "calculator-table-form blue"; } else { gendercolor.className = "calculator-table-form pink"; } }
            </script>
            <div class="calculator-table-form blue auto-scrollx" id="gendercolor">
                <form method="post" name="frmcal">

                    <table cellpadding="5" width="100%" class="bluebox2 tv12blue">
                        <tbody>
                            <tr class="table-head">
                                <td colspan="2">Kiểm tra mức độ hạnh phúc của bạn</td>
                            </tr>
                            <tr>
                                <td>Giới tính</td>
                                <td><input type="radio" name="sex" value="male" onclick="checkgender()">Nam <input
                                        type="radio" name="sex" value="female" onclick="checkgender()">Nữ </td>
                            </tr>
                            <tr>
                                <td>Chủng tộc</td>
                                <td><select name="ethnicity" style="width: 100px" id="ethnicity">
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
                    <table border="0">

                        <tbody>

                            <tr>
                                <td bgcolor="#FF99CC" height="21">
                                    <p style="margin-left: 3; margin-right: 3"><b></b></p>
                                </td>
                                <td align="center" bgcolor="#FF82C0" height="21"><b>Cực kì không đồng ý</b></td>
                                <td align="center" bgcolor="#FF55AA" height="21"><b>Không đồng ý</b></td>
                                <td align="center" bgcolor="#FF379B" height="21"><b>Không đồng ý ít</b></td>
                                <td align="center" bgcolor="#FF2492" height="21"><b>Không đồng ý cũng không phản đối</b></td>
                                <td align="center" bgcolor="#FF0984" height="21"><b>Đồng ý ít</b></td>
                                <td align="center" bgcolor="#F00078" height="21"><b>Đồng ý</b></td>
                                <td align="center" bgcolor="#E80074" height="21"><b>Cực kì đồng ý</b></td>
                            </tr>
                            <tr>
                                <td height="21"><b>Trong hầu hết các mặt, cuộc sống của tôi gần giống cuộc sống lý tưởng của tôi.</b></td>
                                <td align="center" height="21"><b><input name="q1" type="radio" value="1"></b></td>
                                <td align="center" height="21"><b><input name="q1" type="radio" value="2"></b></td>
                                <td align="center" height="21"><b><input name="q1" type="radio" value="3"></b></td>
                                <td align="center" height="21"><b><input name="q1" type="radio" value="4"></b></td>
                                <td align="center" height="21"><b><input name="q1" type="radio" value="5"></b></td>
                                <td align="center" height="21"><b><input name="q1" type="radio" value="6"></b></td>
                                <td align="center" height="21"><b><input name="q1" type="radio" value="7"></b></td>

                            </tr>
                            <tr>
                                <td height="21"><b>Nhìn chung điều kiện sống của tôi hoàn hảo.</b></td>
                                <td align="center" height="21"><b><input name="q2" type="radio" value="1"></b></td>
                                <td align="center" height="21"><b><input name="q2" type="radio" value="2"></b></td>
                                <td align="center" height="21"><b><input name="q2" type="radio" value="3"></b></td>
                                <td align="center" height="21"><b><input name="q2" type="radio" value="4"></b></td>
                                <td align="center" height="21"><b><input name="q2" type="radio" value="5"></b></td>
                                <td align="center" height="21"><b><input name="q2" type="radio" value="6"></b></td>
                                <td align="center" height="21"><b><input name="q2" type="radio" value="7"></b></td>
                            </tr>
                            <tr>
                                <td height="21"><b>Tôi thấy hài lòng với cuộc sống của tôi.</b></td>
                                <td align="center" height="21"><b><input name="q3" type="radio" value="1"></b></td>
                                <td align="center" height="21"><b><input name="q3" type="radio" value="2"></b></td>
                                <td align="center" height="21"><b><input name="q3" type="radio" value="3"></b></td>
                                <td align="center" height="21"><b><input name="q3" type="radio" value="4"></b></td>
                                <td align="center" height="21"><b><input name="q3" type="radio" value="5"></b></td>
                                <td align="center" height="21"><b><input name="q3" type="radio" value="6"></b></td>
                                <td align="center" height="21"><b><input name="q3" type="radio" value="7"></b></td>
                            </tr>
                            <tr>
                                <td height="21"><b>Cho đến nay tôi đã có được những điều quan trọng mà tôi muốn trong đời mình.</b></td>
                                <td align="center" height="21"><b><input name="q4" type="radio" value="1"></b></td>
                                <td align="center" height="21"><b><input name="q4" type="radio" value="2"></b></td>
                                <td align="center" height="21"><b><input name="q4" type="radio" value="3"></b></td>
                                <td align="center" height="21"><b><input name="q4" type="radio" value="4"></b></td>
                                <td align="center" height="21"><b><input name="q4" type="radio" value="5"></b></td>
                                <td align="center" height="21"><b><input name="q4" type="radio" value="6"></b></td>
                                <td align="center" height="21"><b><input name="q4" type="radio" value="7"></b></td>
                            </tr>
                            <tr>
                                <td height="22"><b>Nếu tôi có thể sống lại cuộc đời của mình, tôi sẽ hầu như không thay đổi gì.</b></td>
                                <td align="center" height="22"><b><input name="q5" type="radio" value="1"></b></td>
                                <td align="center" height="22"><b><input name="q5" type="radio" value="2"></b></td>
                                <td align="center" height="22"><b><input name="q5" type="radio" value="3"></b></td>
                                <td align="center" height="22"><b><input name="q5" type="radio" value="4"></b></td>
                                <td align="center" height="22"><b><input name="q5" type="radio" value="5"></b></td>
                                <td align="center" height="22"><b><input name="q5" type="radio" value="6"></b></td>
                                <td align="center" height="22"><b><input name="q5" type="radio" value="7"></b></td>
                            </tr>
                            <tr>

                                <td colspan="8">
                                    <input type="button" value="Nộp" class="flat-btn" id="submit_btn">
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
                        <tr>
                            <td width="164" style="padding-left:5px; text-align: center;" align="center"
                                valign="middle"><b>
                                    Tổng điểm của bạn là: <font size="4" color="#FF0000"><b id="total"></b></font>
                                </b><br></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">
                                <b>Mức độ hạnh phúc của bạn là: </b>
                                <font size="4" color="#FF0000"><b id="muc_do"></b></font>
                            </td>
                        </tr>
                        <tr>
                            <td width="100%" colspan="2" align="justify" style="padding-left:5px;"
                                class="bluebox2 CalcDarkBgWhite1">
                                <p style="margin-left: 6;text-align:justify; text-align: center;" id="content">

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