<?php
if(!function_exists('shortcode_120')){

function shortcode_120(){
    ob_start();
?>
 <script language="javascript">
                function checkgender() { if (document.frmcal.sex[0].checked) { gendercolor.className = "calculator-table-form blue"; form_kq2.className = "calculator-table-form blue"; } else { gendercolor.className = "calculator-table-form pink"; form_kq2.className = "calculator-table-form pink"; } }
                jQuery(document).ready(function () {
                    $('#submit_btn').click(function () {
                        var hsgfor = $("input[name='hsgfor']:checked").val();
                        var sex = $("input[name='sex']:checked").val();
                        var age = $("input[name='age']").val();

                        if (hsgfor == 2 || hsgfor == 3) {
                            if (age == "") {
                                alert("Nhập tuổi!");
                                calculator.age.focus();
                                return false;
                            }
                        }
                        if (hsgfor == 2) {
                            if (age != "") {
                                if ((parseInt(age) < 1) || (parseInt(age) > 17)) {
                                    alert("Hướng dẫn kiểm tra sức khỏe cho Trẻ em dành cho những người từ 1-17 tuổi!");
                                    calculator.age.focus();
                                    return false;
                                }
                            }
                        }
                        if (hsgfor == 3) {
                            if (age != "") {
                                if ((parseInt(age) < 18) || (parseInt(age) > 99)) {
                                    alert("Hướng dẫn kiểm tra sức khỏe cho Người lớn dành cho những người trên 18 tuổi!");
                                    calculator.age.focus();
                                    return false;
                                }
                            }
                        }

                        if (sex != 'b' && sex != 'g') {
                            alert('Bạn chưa chọn giới tính');
                            return false;
                        }
                        $('#tre_em').css('display', 'none');
                        $('#tren18').css('display', 'none');
                        $('#tre_so_sinh').css('display', 'none');
                        if (hsgfor == 2) {
                            $('#tre_em').css('display', 'block');
                        } else if (hsgfor == 3) {
                            $('#tren18').css('display', 'block');
                        } else {
                            $('#tre_so_sinh').css('display', 'block');
                        }

                        $('#form_kq2').css('display', 'block');
                    })
                });

                function disp() {
                    if (document.calculator.hsgfor[1].checked || document.calculator.hsgfor[2].checked) {
                        document.getElementById('age').style.display = "";
                    }
                    else {
                        document.getElementById('age').style.display = 'none';
                    }
                }
                function numeralsOnly(evt) {
                    evt = (evt) ? evt : event;
                    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0));

                    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                        return false;
                    }
                    return true;
                }

            </script>
            <form method="POST" name="calculator">
                <div class="calculator-table-form blue" id="gendercolor">

                    <table border="0" cellspacing="1" width="100%">
                        <tbody>
                            <tr class="table-head">
                                <td colspan="2">Chọn chi tiết của bạn ở đây</td>
                            </tr>
                            <tr>
                                <td id="tabcol1" width="50%" align="left" height="25" valign="middle">
                                    Hướng dẫn sàng lọc sức khỏe cho<font color="#FF6500">*</font>
                                </td>
                                <td id="tbleft1" width="50%" valign="middle">

                                    <input type="radio" name="hsgfor" value="1" onclick="disp()"
                                        style="color: rgb(204, 204, 204);">Trẻ sơ sinh<br><br>
                                    <input type="radio" name="hsgfor" value="2" onclick="disp()"
                                        style="color: rgb(204, 204, 204);">Trẻ em<br><br>
                                    <input type="radio" name="hsgfor" value="3" checked="" onclick="disp()"
                                        style="color: rgb(204, 204, 204);">Người lớn<br><br>

                                </td>
                            </tr>

                            <tr>

                                <td width="50%" align="left" height="25" id="tabcol" valign="middle">
                                    Giới tính<font color="#FF6500">*</font>
                                </td>
                                <td id="tbleft" width="50%" height="25" valign="middle">
                                    <input type="radio" value="b" checked="" name="sex" onclick="checkgender();"
                                        style="color: rgb(204, 204, 204);">
                                    Nam <input type="radio" name="sex" value="g" onclick="checkgender();"
                                        style="color: rgb(204, 204, 204);">
                                    Nữ
                                </td>
                            </tr>

                            <tr id="age" style="">
                                <td id="tabcol2" width="50%" align="left" height="25" valign="middle">

                                    Tuổi<font color="#FF6500">*</font>
                                </td>
                                <td id="tbleft2" width="50%" height="25 " valign="middle">
                                    <input size="10" type="text" name="age" id="Age"
                                        onkeypress="return numeralsOnly(event)" maxlength="2"
                                        style="color: rgb(204, 204, 204);">

                                </td>
                            </tr>


                            <tr>
                                <td colspan="2">
                                    <span class="required">Yêu cầu</span>
                                    <input type="button" value="Tính toán" name="B1" class="flat-btn"
                                        style="color: rgb(204, 204, 204);" id="submit_btn">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
            <form name="frm" method="post" id="form_kq2" style="display: none;">
                <table border="0" cellpadding="2" width="100%">
                    <tbody>
                        <tr>
                            <td width="100%">&nbsp;

                                <table align="center" border="0" cellpadding="10" width="100%" cellspacing="0"
                                    class="tv12blue bluebox2">
                                    <tbody>
                                        <tr>
                                            <td align="justify" width="100%" bgcolor="#E6F4FE" style="padding: 5px"
                                                colspan="2">

                                                <table width="100%" cellpadding="10"
                                                    style="border-style: solid; border-width: 0px; border-top-color:  #42a0e2; border-right-color:  #42a0e2; border-bottom-color:  #42a0e2; border-left-color:  #42a0e2">
                                                    <tbody>
                                                        <tr>
                                                            <td width="100%" style="background-color: #FFFFFF">
                                                                <table border="0" width="100%" cellspacing="0"
                                                                    class="tv12blue bluebox2">
                                                                    <tbody id="tren18" style="display: none;">
                                                                        <tr>
                                                                            <td width="30%"
                                                                                style="background-color: #FFFFFF; padding-top:2px;"
                                                                                valign="top" align="justify">
                                                                                <div id="1"
                                                                                    style="color:#663300;background-color:#E6F4FE;padding:7px 0px 7px 7px;">
                                                                                    <a href="javascript:fn_content('content1')"
                                                                                        class="contentblue14"><span
                                                                                            id="l1"
                                                                                            style="color:#663300;background-color:#E6F4FE"><b>Huyết
                                                                                                áp: </b></span></a>
                                                                                </div>
                                                                                <div id="2"
                                                                                    style="padding:7px 0px 7px 7px;"><a
                                                                                        href="javascript:fn_content('content2')"
                                                                                        class="contentblue14"><span
                                                                                            id="l2"><b>Cholesterol</b></span></a>
                                                                                </div>
                                                                                <div id="3"
                                                                                    style="padding:7px 0px 7px 7px;"><a
                                                                                        href="javascript:fn_content('content3')"
                                                                                        class="contentblue14"><span
                                                                                            id="l3"><b>Ung thư đại trực
                                                                                                tràng</b></span></a>
                                                                                </div>
                                                                                <div id="4"
                                                                                    style="padding:7px 0px 7px 7px;"><a
                                                                                        href="javascript:fn_content('content4')"
                                                                                        class="contentblue14"><span
                                                                                            id="l4"><b>Cân
                                                                                                nặng</b></span></a>
                                                                                </div>
                                                                                <div id="5"
                                                                                    style="padding:7px 0px 7px 7px;"><a
                                                                                        href="javascript:fn_content('content5')"
                                                                                        class="contentblue14"><span
                                                                                            id="l5"><b>Kiểm tra
                                                                                                mắt</b></span></a>
                                                                                </div>
                                                                                <div id="6"
                                                                                    style="padding:7px 0px 7px 7px;"><a
                                                                                        href="javascript:fn_content('content6')"
                                                                                        class="contentblue14"><span
                                                                                            id="l6"><b>Chăm sóc răng
                                                                                                miệng</b></span></a>
                                                                                </div>
                                                                            </td>

                                                                            <td width="70%" class="CalcLiteBgBlack"
                                                                                bgcolor="#E6F4FE" style="padding:15px;"
                                                                                valign="top" align="justify"
                                                                                id="content1"><b>
                                                                                    <font color="#663300">Khi nào nên
                                                                                        được tiến hành?</font>
                                                                                </b><br><br>Người trên 18 tuoir được
                                                                                khuyến cáo kiểm tra huyết áp mỗi 2 năm
                                                                                nếu nó bình thường (120/80 mmHg) và ít
                                                                                nhất mỗi 3 tháng nếu cao huyết áp
                                                                                (149/90 mmHg)<br><br> <b>
                                                                                    <font color="#663300">Kiểm tra những
                                                                                        gì và làm thế nào để tiến hành?
                                                                                    </font>
                                                                                </b><br><br>Huyết áp được kiểm tra bằng
                                                                                cách sử dụng thiết bị gọi là máy đo
                                                                                huyết áp. Nó có một bao đo quấn chặt
                                                                                quanh cánh tay của bệnh nhân và một ống
                                                                                nghe đặt trên đường đi của động mạch
                                                                                cánh tay. Áp lực ở bao đo tăng lên đến
                                                                                khi nghe được nhịp đập đầu tiên và sau
                                                                                đó áp lực giảm dần đến khi không nghe
                                                                                thấy tiếng đó nữa. Máy đo huyết áp đọc
                                                                                được điểm nghe thấy tiếng đập đầu tiên
                                                                                và đó là huyết áp tâm thu (khi tim co
                                                                                bóp) và điểm nghe thấy mất tiếng đập cho
                                                                                thấy huyết áp tâm trương (khi tim nghỉ
                                                                                )<br><br>
                                                                                <b>
                                                                                    <font color="#663300">Tại sao chúng
                                                                                        ta nên kiểm tra?</font>
                                                                                </b><br><br>Tăng huyết áp hoặc huyết áp
                                                                                cao không cho thấy bất kì triệu chứng
                                                                                nào đến khi tiến triển biến chứng như
                                                                                đột quỵ, cơn đau tim, suy tim, suy thận.
                                                                                Sàng lọc là khuyến cáo bởi vị huyết áp
                                                                                cao rất phổ biến và dễ kiểm soát bằng
                                                                                thuốc, chế độ ăn và thay đổi lối
                                                                                sống.<br><br> <b>
                                                                                </b><br><br>
                                                                            </td>
                                                                            <td width="70%" class="CalcLiteBgBlack"
                                                                                bgcolor="#E6F4FE"
                                                                                style="display:none; padding:15px;"
                                                                                valign="top" align="justify"
                                                                                id="content2"><b>
                                                                                    <font color="#663300">Khi nào nên
                                                                                        được tiến hành?</font>
                                                                                </b><br><br>Khuyến cáo người lớn trên 20
                                                                                tuổi nên sàng lọc cholesterol mỗi 5 năm
                                                                                và thường xuyên hơn ở độ tuổi ngoài 35
                                                                                tuổi. Những người có nguy cơ tim mạch,
                                                                                hút thuốc và bị huyết áp cao, béo phì ,
                                                                                tiểu đường nên kiểm tra sớm hơn.<br><br>
                                                                                <b>
                                                                                    <font color="#663300">Kiểm tra những
                                                                                        gì và làm thế nào để tiến hành?
                                                                                    </font>
                                                                                </b><br><br>Xét nghiệm máu kiểm tra
                                                                                Cholesterol toàn phần, triglycerid, HDL
                                                                                và LDL cholesterol cần được làm để đánh
                                                                                giá lượng mỡ trong máu. Các xét nghiệm
                                                                                này yêu cầu nhịn ăn qua đêm.<br><br>
                                                                                <b>
                                                                                    <font color="#663300">Tại sao chúng
                                                                                        ta nên kiểm tra?</font>
                                                                                </b><br><br>Lượng lipid dư thừa trong
                                                                                thành mạch có thể ngăn cản dòng máu tới
                                                                                các cơ quan sống còn như tim, não và có
                                                                                thể dẫn đến kết quả biến chứng như cơn
                                                                                đau tim, đột quỵ.
                                                                            </td>
                                                                            <td width="70%" class="CalcLiteBgBlack"
                                                                                bgcolor="#E6F4FE"
                                                                                style="display:none; padding:15px; "
                                                                                valign="top" align="justify"
                                                                                id="content3"><b>
                                                                                    <font color="#663300">Khi nào nên
                                                                                        được tiến hành?</font>
                                                                                </b><br><br>Khuyến cáo mọi người độ tuổi
                                                                                ngoài 50 nên tiến hành sàng lọc ung thư
                                                                                đại trực tràng. Tuy nhiên sàng lọc nên
                                                                                được làm tư năm 18 tuổi nếu bạn có nguy
                                                                                cơ phát triển ung thư đại trực tràng.
                                                                                Hãy nói với bác sĩ của bạn về nguy cơ
                                                                                phát triển ung thu đại trực tràng của
                                                                                bạn.<br><br> <b>
                                                                                    <font color="#663300">Kiểm tra những
                                                                                        gì và làm thế nào để tiến hành?
                                                                                    </font>
                                                                                </b><br><br>Cỏ rất nhiều xét nghiệm kiểm
                                                                                tra sàng lọc ung thư đại trực tràng. Ví
                                                                                dụ như: nội soi đại tràng, thụt bari đối
                                                                                quang kép và xét nghiệm phân. Bạn có thể
                                                                                quyết định xét nghiệm nào sẽ làm sau khi
                                                                                bác sĩ tư vấn. Mỗi xét nghiệm có quy
                                                                                trình khác nhau. Tần suất sàng lọc phụ
                                                                                thuộc vào loại xét nghiệm bạn làm và
                                                                                nguy cơ ung thư đại trực tràng của
                                                                                bạn.<br><br>
                                                                                <b>
                                                                                    <font color="#663300">Tại sao chúng
                                                                                        ta nên kiểm tra?
                                                                                    </font>
                                                                                </b><br><br>Ung thư đại trực tràng là
                                                                                một trong những ung thư phổ biến nhất có
                                                                                thể thấy ở con người. Tầm soát ung thư
                                                                                đại trực tràng phát hiện sự phát triển
                                                                                ung thư trọng ruột và đại tràng của
                                                                                bạn.<br><br> <b>

                                                                            </td>
                                                                            <td width="70%" class="CalcLiteBgBlack"
                                                                                bgcolor="#E6F4FE"
                                                                                style="display:none; padding:15px;"
                                                                                valign="top" align="justify"
                                                                                id="content4"><b>
                                                                                    <font color="#663300">Khi nào nên
                                                                                        được tiến hành?</font>
                                                                                </b><br><br>Chỉ số khối cơ thể (BMI) đo
                                                                                ít nhất mỗi 2 năm để kiểm tra tình trạng
                                                                                cân nặng của cơ thể liên quan đến lượng
                                                                                mỡ trong cơ thể bạn.<br><br> <b>
                                                                                    <font color="#663300">Kiểm tra những
                                                                                        gì và làm thế nào để tiến hành?
                                                                                    </font>
                                                                                </b><br><br>Chỉ số khối cơ thể (BMI) là
                                                                                công cụ đơn giản sử dụng cân nặng và
                                                                                chiều cao của bạn để chỉ ra tình trạng
                                                                                cân nặng của bạn. Theo tiêu chuẩn thế
                                                                                giới, chỉ số BMI bình thường từ 18.5 đến
                                                                                25 kg/m2. BMI trên 25 là thừa cân và
                                                                                dưới 18.5 là nhẹ cân. Tuy nhiên mức độ
                                                                                chuẩn này còn tùy thuộc vào quốc gia và
                                                                                chủng tộc của bạn.<br>
                                                                                Đối với người Châu Á, BMI bình thường từ
                                                                                18.5 đến 22.9 kg/m2. BMI dưới 18.5 là
                                                                                thiếu cân, trên 23 là thừa cân, ≥25 là
                                                                                béo phì.<br> <b>
                                                                                    <font color="#663300">Tại sao chúng
                                                                                        ta nên kiểm tra?</font>
                                                                                </b><br><br>Trở lên thừa cân và béo phì
                                                                                làm tăng nguy cơ cho rất nhiều bệnh liên
                                                                                quan
                                                                                tim mạch, tiểu đường và huyết áp cao.
                                                                                Kiểm tra chỉ số BMI sẽ giúp bạn biết
                                                                                tình trạng cân nặng của bạn và kiểm soát
                                                                                chúng ở mức bình thường.
                                                                                <br>
                                                                                Bạn có thể sử dụng công cụ tính BMI và
                                                                                công cụ tính phần trăm mỡ trong cơ thể
                                                                                của chúng tôi để ước tính tình trạng cân
                                                                                nặng và lượng calo bạn cần tiêu thụ để
                                                                                khỏe mạnh.<br>
                                                                            </td>
                                                                            <td width="70%" class="CalcLiteBgBlack"
                                                                                bgcolor="#E6F4FE"
                                                                                style="display:none; padding:15px;"
                                                                                valign="top" align="justify"
                                                                                id="content5"><b>
                                                                                    <font color="#663300">Khi nào nên
                                                                                        được tiến hành?</font>
                                                                                </b><br><br>Việc kiểm tra mắt được
                                                                                khuyến cao thực hiện mỗi năm một
                                                                                lần.<br><br> <b>
                                                                                    <font color="#663300">Kiểm tra những
                                                                                        gì và làm thế nào để tiến hành?
                                                                                    </font>
                                                                                </b><br><br>Bác sĩ chuyên khoa mắt tìm
                                                                                kiếm các tật khúc xạ ở mắt như cận thị/
                                                                                viễn thị, nhãn áp, tầm nhìn ngoại vi,
                                                                                nhận thức màu sắc, di chuyển nhãn cầu và
                                                                                nhiễm trùng mắt. Nó có thể có những quy
                                                                                trình khác nhau và có thể mất hơn một
                                                                                giờ tùy thuộc vào tình trạng mắt của
                                                                                bệnh nhân.<br><br> <b>
                                                                                    <font color="#663300">Tại sao chúng
                                                                                        ta nên kiểm tra?</font>
                                                                                </b><br><br>Bài kiểm tra giúp chẩn đoán
                                                                                chắc chắn các bất thường của mắt như
                                                                                bệnh Glocom và tăng nhãn áp sớm và giúp
                                                                                điều trị dễ dàng hơn cho bạn vì vậy bạn
                                                                                có thể nhìn tốt và bạn có thể có một số
                                                                                mẹo giúp chăm sóc đôi mắt của
                                                                                bạn.<br><br>
                                                                            </td>
                                                                            <td width="70%" class="CalcLiteBgBlack"
                                                                                bgcolor="#E6F4FE"
                                                                                style="display:none; padding:15px;"
                                                                                valign="top" align="justify"
                                                                                id="content6"><b>
                                                                                    <font color="#663300">Khi nào nên
                                                                                        được tiến hành?</font>
                                                                                </b><br><br>Tới gặp nha sĩ kiểm tra mỗi
                                                                                6 tháng hoặc theo lời khuyên của bác sĩ
                                                                                của bạn<br><br><b>
                                                                                    <font color="#663300">Kiểm tra những
                                                                                        gì và làm thế nào để tiến hành?
                                                                                    </font>
                                                                                </b><br><br>Nha sĩ của bạn tìm kiếm các
                                                                                dấu hiệu của bất kì bệnh lý răng miệng
                                                                                và sâu răng. Nha sĩ cũng làm sạch. Nha
                                                                                sĩ cũng làm sạch răng và lợi và có thể
                                                                                khám miệng cổ cho bạn. Làm sạch răng
                                                                                cùng với đánh bóng và flo.<br><br> <b>
                                                                                    <font color="#663300">Tại sao chúng
                                                                                        ta nên kiểm tra?</font>
                                                                                </b><br><br>Kiểm tra răng miệng thường
                                                                                xuyên giúp phát hiện sớm dấu hiệu các
                                                                                vấn đề về răng miệng và sâu răng sớm và
                                                                                hỗ trợ điều trị hiệu quả. Điều đó cũng
                                                                                giúp giữ răng bạn sạch <br><br>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                    <tbody id="tre_so_sinh" style="display: none;">
                                                                        <tr>
                                                                            <td width="30%"
                                                                                style="background-color: #FFFFFF; padding-top:2px;"
                                                                                valign="top" align="justify">
                                                                                <div id="7"
                                                                                    style="color:#663300;background-color:#E6F4FE;padding:7px 0px 7px 7px;">
                                                                                    <a href="javascript:fn_content('content7')"
                                                                                        class="contentblue14"><span
                                                                                            id="l7"
                                                                                            style="color:#663300;background-color:#E6F4FE"><b>Khám
                                                                                                thể chất:
                                                                                            </b></span></a>
                                                                                </div>
                                                                                <div id="8"
                                                                                    style="padding:7px 0px 7px 7px;"><a
                                                                                        href="javascript:fn_content('content8')"
                                                                                        class="contentblue14"><span
                                                                                            id="l8"><b>Kiểm tra mất khả
                                                                                                năng
                                                                                                nghe?</b></span></a>
                                                                                </div>
                                                                                <div id="9"
                                                                                    style="padding:7px 0px 7px 7px;"><a
                                                                                        href="javascript:fn_content('content9')"
                                                                                        class="contentblue14"><span
                                                                                            id="l9"><b>Kiểm tra bệnh
                                                                                                tim</b></span></a>
                                                                                </div>
                                                                                <div id="10"
                                                                                    style="padding:7px 0px 7px 7px;"><a
                                                                                        href="javascript:fn_content('content10')"
                                                                                        class="contentblue14"><span
                                                                                            id="l10"><b>Xét nghiệm máu
                                                                                                gót chân</b></span></a>
                                                                                </div>
                                                                                <div id="11"
                                                                                    style="padding:7px 0px 7px 7px;"><a
                                                                                        href="javascript:fn_content('content11')"
                                                                                        class="contentblue14"><span
                                                                                            id="l11"><b>Kiểm tra
                                                                                                mắt</b></span></a>
                                                                                </div>
                                                                            </td>

                                                                            <td width="70%" class="CalcLiteBgBlack"
                                                                                bgcolor="#E6F4FE" style="padding:15px;"
                                                                                valign="top" align="justify"
                                                                                id="content7"><b>
                                                                                    <font color="#663300">Khi nào nên
                                                                                        được tiến hành?</font>
                                                                                </b><br><br>Khám bác sĩ trong vòng 3
                                                                                ngày và tái khám trong 6-7 tuần sau
                                                                                sinh.<br><br> <b>
                                                                                    <font color="#663300">Kiểm tra những
                                                                                        gì và làm thế nào để tiến hành?
                                                                                    </font>
                                                                                </b><br><br>Khám tồng thể từ đầu đến
                                                                                chân cần tiến hành cho bé càng sớm càng
                                                                                tốt sau sinh để khẳng định bất kì bất
                                                                                thường thể chất nào cần được nghiên cứu
                                                                                kĩ lưỡng. Mắt trẻ được kiểm tra xem có
                                                                                đục thủy tinh thể không, kiểm tra lồng
                                                                                ngực xem có bất thường, nhịp thở bất
                                                                                thường không. Kiểm tra bụng xem có khối
                                                                                bất thường hay thoát vị gì không. Hông
                                                                                có lệch vị trí, mất cân đối không. Gót
                                                                                chân và các ngón chân cần kiểm tra xem
                                                                                có bàn chân khoèo không. Trẻ nam, dương
                                                                                vật có dị tật lỗ tiểu ở mặt dưới dương
                                                                                vật không hoặc lỗ tiểu ở mặt trên dương
                                                                                vật, kiểm tra bìu xem có tinh hoàn
                                                                                không.<br><br>
                                                                                <b>
                                                                                    <font color="#663300">Tại sao chúng
                                                                                        ta nên kiểm tra?</font>
                                                                                </b><br><br>Khám sức khỏe tổng quát để
                                                                                đảm bảo rằng em bé khỏe mạnh và không có
                                                                                bất kì rồi loạn nào có thể dẫn đến các
                                                                                biến chứng sau này trong cuộc sống của
                                                                                chúng.<br><br> <b>
                                                                                </b><br><br>
                                                                            </td>
                                                                            <td width="70%" class="CalcLiteBgBlack"
                                                                                bgcolor="#E6F4FE"
                                                                                style="display:none; padding:15px;"
                                                                                valign="top" align="justify"
                                                                                id="content8"><b>
                                                                                    <font color="#663300">Khi nào nên
                                                                                        được tiến hành?</font>
                                                                                </b><br><br>Các xét nghiệm sàng lọc
                                                                                thính lực ở trẻ sơ sinh nên được thực
                                                                                hiên trong vòng 1 tháng sau sinh<br><br>
                                                                                <b>
                                                                                    <font color="#663300">Kiểm tra những
                                                                                        gì và làm thế nào để tiến hành?
                                                                                    </font>
                                                                                </b><br><br>Phản xạ âm thanh (OAEs) là
                                                                                âm thanh được tạo ra ở trong tai có chức
                                                                                năng bình thường. Một đầu do kết nối với
                                                                                máy ghi âm được đưa vào ống tai của em
                                                                                bé. Một kích thích âm thanh nhỏ gây tra
                                                                                rung động ở trong tai. Điều này gây ra
                                                                                các OAEs được kích hoạt, thu nhận được
                                                                                bởi đầu dò.<br>
                                                                                Phản ứng thân não (ABR) được thực hiện ở
                                                                                những trẻ không đạt thửu nghiệm OAE. Một
                                                                                đâu kích thích được đưa vào trong tai
                                                                                trẻ thông qua một loại tai nghe. Kết quả
                                                                                là có dòng xung động đáp ứng sẽ được
                                                                                chụp lại bởi tấm điện cực đặt trong đầu
                                                                                trẻ.
                                                                                <br><br>
                                                                                <b>
                                                                                    <font color="#663300">Tại sao chúng
                                                                                        ta nên kiểm tra?</font>
                                                                                </b><br><br>Phát hiện mất thính lực sớm
                                                                                ở trẻ sơ sinh có thể ngăn chặn vấn đề về
                                                                                phát âm và cải thiện chất lượng cuộc
                                                                                sống cho trẻ khi lớn lên.
                                                                            </td>
                                                                            <td width="70%" class="CalcLiteBgBlack"
                                                                                bgcolor="#E6F4FE"
                                                                                style="display:none; padding:15px; "
                                                                                valign="top" align="justify"
                                                                                id="content9"><b>
                                                                                    <font color="#663300">Khi nào nên
                                                                                        được tiến hành?</font>
                                                                                </b><br><br>Trẻ sơ sinh nên sàng lọc
                                                                                bệnh tim trong vòng 2 ngày sau
                                                                                sinh<br><br> <b>
                                                                                    <font color="#663300">Kiểm tra những
                                                                                        gì và làm thế nào để tiến hành?
                                                                                    </font>
                                                                                </b><br><br>Tim trẻ em được kiểm tra xem
                                                                                có dị tật tim bẩm sinh hay các rối loạn
                                                                                khác bằng cách sử dụng phương pháp đo
                                                                                oxy theo mạch đập, có thể phát hiện
                                                                                những bất thường ngay cả trước khi cúng
                                                                                có dấu hiệu của tình trạng bệnh.<br><br>
                                                                                <b>
                                                                                    <font color="#663300">Tại sao chúng
                                                                                        ta nên kiểm tra?
                                                                                    </font>
                                                                                </b><br><br>Trẻ sơ sinh mắc bệnh tim bẩm
                                                                                sinh có nguy cơ tàn tật và tử vong đáng
                                                                                kể. Nếu được phát hiện sơm, bác sĩ tim
                                                                                mạch có thể kiểm tra chúng và có thể đưa
                                                                                ra phương pháp điều trị đặc biệt cho em
                                                                                bé để ngăn ngừa tàn tật và tử
                                                                                vong.<br><br> <b>

                                                                            </td>
                                                                            <td width="70%" class="CalcLiteBgBlack"
                                                                                bgcolor="#E6F4FE"
                                                                                style="display:none; padding:15px;"
                                                                                valign="top" align="justify"
                                                                                id="content10"><b>
                                                                                    <font color="#663300">Khi nào nên
                                                                                        được tiến hành?</font>
                                                                                </b><br><br>Xét nghiệm sàng lọc máu gót
                                                                                chân cho trẻ sơ sinh nên được làm một
                                                                                hoặc 2 ngày sau sinh<br><br> <b>
                                                                                    <font color="#663300">Kiểm tra những
                                                                                        gì và làm thế nào để tiến hành?
                                                                                    </font>
                                                                                </b><br><br>Máu lấy từ việc trích gót
                                                                                chân trẻ dùng để làm mẫu xét nghiệm để
                                                                                phát hiện nhiều tình trạng bệnh lý khác
                                                                                nhau. Các tình trạng được kiểm tra phụ
                                                                                thuộc vào luật pháp địa phương. Ở một số
                                                                                bệnh viện, sàng lọc được làm hơn 54 loại
                                                                                khác nhau, những xét nghiệm quan trọng
                                                                                được liệt kê dưới đây: <br>
                                                                                1: Phenylketo niệu (PKU): một rối loạn
                                                                                di truyền khi mà cơ thể không thể chuyển
                                                                                hóa hoặc cắt nhỏ protein gọi là
                                                                                Phenylalanine. Đó có thể gây ra co giật,
                                                                                rối loạn hành vi, chậm phát triển, bệnh
                                                                                bạch tạng và chậm phát triển trí tuệ
                                                                                nghiêm trọng trong khi tình trạng bệnh
                                                                                tiến triển. Tại Ấn Độ, cứ 18300 trẻ sơ
                                                                                sinh thì có 1 trẻ mắc chứng rối loạn
                                                                                phenylketo niệu. Một xét nghiệm máu như
                                                                                xét nghiệm Guthrie hoặc khối phổ Tandem
                                                                                được làm để phát hiện mức độ
                                                                                Phenylalanine cao, được thực hiện để
                                                                                chẩn đoán PKU. Kết quả dương tính được
                                                                                xác nhận với lần xét nghiêm thứ 2 trong
                                                                                vòng 2 tuần sau sinh.<br>
                                                                                2: Bệnh hồng cầu hình liềm: Rối loạn di
                                                                                truyền gây đau và làm tổn thương các cơ
                                                                                quan quan trọng. Trẻ sơ sinh mắc chứng
                                                                                rối loạn này dễ bị nhiễm trùng. Nó phổ
                                                                                biến ở người da đen hơn bất kì chủng tộc
                                                                                nào khác. Tỷ lệ mắc bệnh hồng cầu hình
                                                                                liềm ở Ấn Độ rất cao và người ta khuyến
                                                                                cáo nên khám sàng lọc.<br>
                                                                                3: Tăng sản tuyến thượng thận bẩm sinh:
                                                                                Một rối loạn tuyến nội tiết liên quan
                                                                                đến thiếu hụt sản xuất hooc môn của
                                                                                tuyến thượng thận. Nó gây ra hàng loạt
                                                                                các rối loạn như mất muối, mất nước, và
                                                                                ảnh hưởng đến phát triển sinh dục. Ở Ấn
                                                                                Độ, 1 trên 2600 trẻ em có rối loạn
                                                                                này.<br>
                                                                                4: Homocystinuria - Đây là rối loạn đe
                                                                                dọa tính mạng ảnh hưởng đến sự trao đổi
                                                                                chất của axit amin methionine. Nó dẫn
                                                                                đến rối loạn tâm thần, dài tay chân và
                                                                                các vấn đề về thị lực.<br>
                                                                                5: Galactosemia: Tình trạng trẻ thiếu
                                                                                enzym chuyển đổi galactose (một loại
                                                                                đường trong sữa) thành glucose (một loại
                                                                                đường mà cơ thể trẻ có thể sử dụng
                                                                                được). Kết quả là trẻ có thể không
                                                                                chuyển hóa được galactose trong các sản
                                                                                phẩm từ sữa và nó tích tụ trong cơ thể
                                                                                dẫn đền mù lòa, chậm phát triển trí tuệ
                                                                                nghiêm trọng hoặc thậm chí tử vong. Cứ
                                                                                10300 trẻ sơ sinh Ấn Độ thì có 1 trẻ mắc
                                                                                rối loạn này<br>
                                                                                6: Thiếu hụt Biotindase: Biotindase là
                                                                                một loại enzym tái chế biotin trong cơ
                                                                                thể. Thiếu hụt Biotindase có thể gây mất
                                                                                thính giác, suy giảm miễn dịch, chậm
                                                                                phát triển trí tuệ, co giật, hôn mê và
                                                                                tử vong.<br>
                                                                                7: Bệnh Maple syrup urine (MSUD): Thiếu
                                                                                hụt một loại enzym cần thiết sản xuất
                                                                                3-amino acid cần thiết cho cơ thể dẫn
                                                                                đến MUSD. Axit amin tích tụ trong cơ thể
                                                                                gây ra nước tiểu có mùi như lá phong.
                                                                                MUSD dẫn đến ít thèm ăn, khuyết tật về
                                                                                thể chất và chậm phát triển trí tuệ.<br>
                                                                                8: Rối loạn hooc môn tuyến giáp: Giảm
                                                                                tiết hooc môn tuyến giáp dẫn đến suy
                                                                                giáp. Cứ 1700 trẻ sơ sinh Ấn Độ thì có 1
                                                                                trẻ bị suy giáp bẩm sinh. Nó không phát
                                                                                triển ngay sau khi sinh và có thể gây ra
                                                                                những tổn thương không thể hồi phục.
                                                                                Ngay cả khi suy giáp nhẹ cũng có thể dẫn
                                                                                đến chậm phát triển trí tuệ, chậm phát
                                                                                triển về tim mạch.<br><br>
                                                                                <br> <b>
                                                                                    <font color="#663300">Tại sao chúng
                                                                                        ta nên kiểm tra?</font>
                                                                                </b><br><br>Sàng lọc là rất quan trọng
                                                                                với trẻ sơ sinh có rối loạn có thể trông
                                                                                khỏe mạnh nhưng thời điểm các triệu
                                                                                chứng xuất hiện, nó có thể đã gây ra tổn
                                                                                thương vĩnh viễn. Nếu phát hiện sớm các
                                                                                chất bổ sung cần thiết có thể được sử
                                                                                dụng để kiểm tra hoặc chữa trị.<br>
                                                                            </td>
                                                                            <td width="70%" class="CalcLiteBgBlack"
                                                                                bgcolor="#E6F4FE"
                                                                                style="display:none; padding:15px;"
                                                                                valign="top" align="justify"
                                                                                id="content11"><br>Nên kiểm tra mắt định
                                                                                kỳ 2 năm một lần.<br><br>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                    <tbody id="tre_em" style="display: none;">
                                                                        <tr>
                                                                            <td width="30%"
                                                                                style="background-color: #FFFFFF; padding-top:2px;"
                                                                                valign="top" align="justify">
                                                                                <div id="12"
                                                                                    style="color:#663300;background-color:#E6F4FE;padding:7px 0px 7px 7px;">
                                                                                    <a href="javascript:fn_content('content12')"
                                                                                        class="contentblue14"><span
                                                                                            id="l12"
                                                                                            style="color:#663300;background-color:#E6F4FE"><b>Chiều
                                                                                                cao và cân
                                                                                                nặng</b></span></a>
                                                                                </div>
                                                                                <div id="13"
                                                                                    style="padding:7px 0px 7px 7px;"><a
                                                                                        href="javascript:fn_content('content13')"
                                                                                        class="contentblue14"><span
                                                                                            id="l13"><b>Thính
                                                                                                giác</b></span></a>
                                                                                </div>
                                                                                <div id="14"
                                                                                    style="padding:7px 0px 7px 7px;"><a
                                                                                        href="javascript:fn_content('content14')"
                                                                                        class="contentblue14"><span
                                                                                            id="l14"><b>Thị
                                                                                                lực</b></span></a>
                                                                                </div>
                                                                                <div id="15"
                                                                                    style="padding:7px 0px 7px 7px;"><a
                                                                                        href="javascript:fn_content('content15')"
                                                                                        class="contentblue14"><span
                                                                                            id="l15"><b>Khám nha
                                                                                                khoa</b></span></a>
                                                                                </div>
                                                                            </td>

                                                                            <td width="70%" class="CalcLiteBgBlack"
                                                                                bgcolor="#E6F4FE" style="padding:15px;"
                                                                                valign="top" align="justify"
                                                                                id="content12"><b>
                                                                                    <font color="#663300">Khi nào nên
                                                                                        được tiến hành?</font>
                                                                                </b><br><br>Tất cả trẻ em nên được kiểm
                                                                                tra chiều cao và cân nặng định
                                                                                kì<br><br> <b>
                                                                                    <font color="#663300">Kiểm tra những
                                                                                        gì và làm thế nào để tiến hành?
                                                                                    </font>
                                                                                </b><br><br>Bác sĩ có thể cân, đo chiều
                                                                                cao cho trẻ và so sánh nó với số liệu
                                                                                trung bình của trẻ trong cùng độ tuổi ở
                                                                                quốc gia bạn. Sử dụng công cụ tính BMI
                                                                                cho trẻ có thể giúp ích. Hoặc bạn có thể
                                                                                sử dụng công cụ tính chiều cao và cân
                                                                                nặng cho trẻ em của chúng tôi. Trẻ em có
                                                                                BMI cao hơn 95 được phân loại là béo
                                                                                phì.<br><br>
                                                                                <b>
                                                                                    <font color="#663300">Tại sao chúng
                                                                                        ta nên kiểm tra?</font>
                                                                                </b><br><br>Béo phì không chỉ ảnh hưởng
                                                                                đến người lớn, trẻ em cũng dễ bị béo
                                                                                phì. Béo phì còn rất trẻ đồng nghĩa với
                                                                                việc tăng nguy cơ mắc các bệnh tim mạch,
                                                                                huyết áp cao và tiểu đường.<br><br> <b>
                                                                                </b><br><br>
                                                                            </td>
                                                                            <td width="70%" class="CalcLiteBgBlack"
                                                                                bgcolor="#E6F4FE"
                                                                                style="display:none; padding:15px;"
                                                                                valign="top" align="justify"
                                                                                id="content13"><b>
                                                                                    <font color="#663300">Khi nào nên
                                                                                        được tiến hành?</font>
                                                                                </b><br><br>Đánh giá thính lực nên được
                                                                                tiến hành càng sớm càng tốt trong vòng 3
                                                                                tháng. Trẻ em bắt đầu tới trường từ 3-5
                                                                                tuổi nên được kiểm tra thính lực. Phát
                                                                                hiện sớm các vấn đề có thể chăm sóc tốt
                                                                                hơn và trẻ em dường như có thể phát
                                                                                triển ngôn ngữ và giao tiếp xã hội tốt
                                                                                hơn. Bất kì trẻ sinh non, mang thai phức
                                                                                tạp, tăng bilirubin khi sinh, thời gian
                                                                                nằm NICU kéo dài, nhiễm trùng tai hoặc
                                                                                tiền sử gia đình có người bị mất thính
                                                                                lực cần được cảnh báo để cha mẹ nghi ngờ
                                                                                khả năng có vấn đề về thính giác ở con
                                                                                mình. Ngay cả khi với tư cách là cha mẹ,
                                                                                bạn nghi ngờ con mình mất thính lực, chỉ
                                                                                cần nói chuyện với bác sĩ của bạn vả
                                                                                thực hiện kiểm tra. <br><br> <b>
                                                                                    <font color="#663300">Kiểm tra những
                                                                                        gì và làm thế nào để tiến hành?
                                                                                    </font>
                                                                                </b><br><br>Khám sức khỏe sẽ được thực
                                                                                hiện để kiểm tra các vấn đề trong tai
                                                                                như tích tụ ráy tai, nhiễm trùng và có
                                                                                dị vật nhỏ trong tai. Trẻ có thể được
                                                                                yêu cần kiểm tra Phản ứng thân não
                                                                                (ABR). Trong ABR, một kích thích được
                                                                                đưa vào trong tai em bé thông qua tai
                                                                                nghe. Điều này dẫn đến một xung điện,
                                                                                thu lại được bằng các điện cực đặt trong
                                                                                đầu trẻ.<br><br>
                                                                                <b>
                                                                                    <font color="#663300">Tại sao chúng
                                                                                        ta nên kiểm tra?</font>
                                                                                </b><br><br>Phát hiện sớm tình trạng mất
                                                                                thính lực có thể ngăn ngừa nhiều vấn đề
                                                                                xã hội, tình cảm và học tập. Can thiệp
                                                                                sớm luôn mang lại kết quả tốt nhất và m
                                                                                ang lại những điều tốt nhất cho trẻ.
                                                                            </td>
                                                                            <td width="70%" class="CalcLiteBgBlack"
                                                                                bgcolor="#E6F4FE"
                                                                                style="display:none; padding:15px; "
                                                                                valign="top" align="justify"
                                                                                id="content14"><b>
                                                                                    <font color="#663300">Khi nào nên
                                                                                        được tiến hành?</font>
                                                                                </b><br><br>Kiểm tra mắt nên được thực
                                                                                hiện trong độ tuổi từ 2-5 tuổi<br><br>
                                                                                <b>
                                                                                    <font color="#663300">Kiểm tra những
                                                                                        gì và làm thế nào để tiến hành?
                                                                                    </font>
                                                                                </b><br><br>Bác sĩ chuyên khoa mắt tìm
                                                                                kiếm các tật khúc xạ ở mắt như cận thị,
                                                                                viễn thị, nhãn áp, thị lực ngoại vi,
                                                                                nhận thức màu sắc, chuyển động nhãn cầu
                                                                                và nhiễm trùng trong mắt. Điều này có
                                                                                thể bao gồm các quy trình khác nhau và
                                                                                có thể mất hơn 1 giờ tùy thuộc vào tình
                                                                                trạng mắt của trẻ.<br><br>
                                                                                <b>
                                                                                    <font color="#663300">Tại sao chúng
                                                                                        ta nên kiểm tra?
                                                                                    </font>
                                                                                </b><br><br>Bài kiểm tra này giúp chẩn
                                                                                đoán sớm một số bất thường về mắt như
                                                                                tăng nhãn áp và đục thủy tinh thể và
                                                                                giúp điều trị dễ dàng. Việc khám mắt
                                                                                giúp bác sĩ chỉ định kính phù hợp để thị
                                                                                lực tốt cho trẻ và trẻ nhìn được bảng
                                                                                trong lớp.<br><br> <b>

                                                                            </td>
                                                                            <td width="70%" class="CalcLiteBgBlack"
                                                                                bgcolor="#E6F4FE"
                                                                                style="display:none; padding:15px;"
                                                                                valign="top" align="justify"
                                                                                id="content15"><b>
                                                                                    <font color="#663300">Khi nào nên
                                                                                        được tiến hành?</font>
                                                                                </b><br><br>Hãy đi khám răng định kì 6
                                                                                tháng một lần hoặc theo khuyến cáo của
                                                                                bác sĩ<br><br> <b>
                                                                                    <font color="#663300">Kiểm tra những
                                                                                        gì và làm thế nào để tiến hành?
                                                                                    </font>
                                                                                </b><br><br>Nha sĩ tìm kiếm các dấu hiệu
                                                                                bất thường bệnh lý răng miệng và sâu
                                                                                răng. Nha sĩ cũng làm sạch răng và lợi
                                                                                và có thể kiểm tra miệng và cổ.<br> <b>
                                                                                    <font color="#663300">Tại sao chúng
                                                                                        ta nên kiểm tra?</font>
                                                                                </b><br><br>Khám răng định kì giúp phát
                                                                                hiện sớm các dấu hiệu của bệnh lý răng
                                                                                miệng và hỗ trợ điều trị hiệu quả. Nó
                                                                                cũng giúp chăm sóc răng sữa ở trẻ
                                                                                em.<br>
                                                                            </td>

                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <div>
                <p>
                <h2>Các mẹo ngăn ngừa bệnh tật:</h2><br>
                Hãy chắc chắn rằng bạn đã tiêm chính xác vắc – xin đúng thời điểm, hệ miễn dịch giúp ngăn ngừa bệnh
                tật.<br>
                Hãy tập thể dục và duy trì cân nặng hợp lý. Béo phì là một nguyên nhân gây ra rất nhiều bệnh về tim
                mạch. Bằng việc duy trì chế độ ăn thích hợp, bạn đã chắc chắn rằng bạn sống lâu hơn và khỏe mạnh
                hơn.<br>
                Tránh hút thuốc và sử dụng đồ uống có cồn. Chúng làm giảm tuổi thọ của bạn đáng kể.<br>
                Nếu bạn có quan hệ tình dục, luôn sử dụng các biện pháp phòng tránh các bệnh lây qua đường tình dục.
                Chuyển qua kiểm tra sàng lọc các bệnh lây truyền qua đường tình dục<br>
                Thực phẩm giàu vitamin B12 và axit folic khi dùng trong thai kì có thể giúp ngăn ngừa dị tật bẩm
                sinh.<br>
                Kiểm tra sức khỏe rất hữu ích trong việc nhận được bảo hiểm y tế.

                </p>
            </div>
            <script language="javascript">

                function fn_content(type) {

                    if (type.length == 8) {
                        var cid = type.substring(8, 7)
                    }
                    if (type.length == 9) {
                        var cid = type.substring(9, 7)
                    }
                    for (i = 1; i <= 15; i++) {
                        document.getElementById('content' + i).style.display = 'none';
                        document.getElementById(i).style.color = "#0066cc";
                        document.getElementById('l' + i).style.color = "#0066cc";
                        document.getElementById(i).style.background = "white";
                        document.getElementById('l' + i).style.background = "white";
                        if (i == cid) {
                            document.getElementById('content' + i).style.display = "";
                            document.getElementById(i).style.color = "#663300";
                            document.getElementById("l" + i).style.color = "#663300";
                            document.getElementById(i).style.background = '#E6F4FE';
                            document.getElementById("l" + i).style.background = '#E6F4FE';

                        }
                    }
                }
            </script>

<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
}}