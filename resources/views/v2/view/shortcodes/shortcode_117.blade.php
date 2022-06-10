<?php
if(!function_exists('shortcode_117')){

function shortcode_117(){
    ob_start();
?>
<script language="javascript">
                function checkgender(){if (document.frm.gender[0].checked){gendercolor.className = "calculator-table-form blue";form_kq2.className = "calculator-table-form blue";} else {gendercolor.className = "calculator-table-form pink";form_kq2.className = "calculator-table-form pink"; } }
                jQuery(document).ready(function () {
                    $('#submit_btn').click(function () {
                        var sex = $("input[name='gender']:checked").val();
                        var father_cm = $("#father_cm").val();
                        var mother_cm = $("#mother_cm").val();
                        if (father_cm == '') {
                            alert('Bạn chưa nhập chiều cao của bố!');
                            return false;
                        }
                        if (mother_cm == '') {
                            alert('Bạn chưa nhập chiều cao của mẹ!');
                            return false;
                        }

                        if (sex != 'male' && sex != 'female') {
                            alert('Bạn chưa chọn giới tính!');
                            return false;
                        }
                        var total = (parseInt(father_cm) + parseInt(mother_cm))/2;
                        var height_ = 0;
                        if (sex == 'male'){
                            $('#form_sex').html('Nam');
                            height_  = total + 6.5;
                        } else {
                            $('#form_sex').html('Nữ');
                            height_  = total - 6.5;
                        }
                        var height_to = height_ - 10.16;
                        var height_from = height_ + 10.16;
                        $('#height_bo').html(parseInt(father_cm) + ' cm');
                        $('#height_me').html(parseInt(mother_cm) + ' cm');
                        $('#height_to').html(height_to);
                        $('#height_from').html(height_from);
                        $('#form_kq2').css('display', 'block');
                    })
                });
            </script>
            <div class="calculator-table-form blue" id="gendercolor">
                <form name="frm" method="post" >
                    <table border="0" cellpadding="5" cellspacing="1" width="100%" class="tv12black">
                        <tbody>
                            <tr class="table-head">
                                <td colspan="2">Điền thông tin</td>
                            </tr>
                            <tr>
                                <td>
                                    Giới tính <span class="mandatory-star">*</span>
                                </td>
                                <td><input type="radio" value="male" checked="" name="gender"
                                        onclick="checkgender();">Nam
                                    <input type="radio" name="gender" value="female" onclick="checkgender();">Nữ
                                </td>
                            </tr>
                            <tr>
                                <td>Chiều cao của bố<span class="mandatory-star">*</span></td>
                                <td>
                                    <input type="text" id="father_cm" size="5" maxlength="3"
                                        value="">&nbsp;cm<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td>Chiều cao của mẹ<span class="mandatory-star">*</span></td>
                                <td>
                                    <input type="text" id="mother_cm" size="5" maxlength="3"
                                        value="">&nbsp;cm<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><span class="required">* Yêu cầu</span>
                                    <input class="flat-btn" type="button" value="Kết quả" name="but_send" id="submit_btn">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
        </div>
        <div class="calculator-table-form blue" style="padding-top: 10px; display: none;" id="form_kq2">
            <table cellpadding="0" cellspacing="0" class="tv12black">
                <tbody>
                    <tr class="table-head">
                        <td colspan="2">Kết quả</td>
                    </tr>
                    <tr>
                        <td>Giới tính</td>
                        <td id="form_sex"> </td>
                    </tr>
                    <tr>
                        <td>Chiều cao của bố</td>
                        <td id="height_bo"></td>
                    </tr>
                    <tr>
                        <td>Chiều cao của mẹ</td>
                        <td id="height_me"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="tv12blue"><b>Phạm vi chiều cao tiềm năng</b></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <font color="#FF0000"><b id="height_to"></b></font> cm<br><br>đến<br><br>
                            <font color="#FF0000"><b id="height_from"></b></font>&nbsp;cm
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