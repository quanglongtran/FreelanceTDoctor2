<?php
if(!function_exists('shortcode_118')){

function shortcode_118(){
    ob_start();
?>
 <script language="javascript">
                function checkgender() { if (document.immunization.r1[0].checked) { gendercolor.className = "calculator-table-form blue"; form_kq2.className = "calculator-table-form blue"; } else { gendercolor.className = "calculator-table-form pink"; form_kq2.className = "calculator-table-form pink"; } }
                jQuery(document).ready(function () {
                    $('#submit_btn').click(function () {
                        var sex = $("input[name='r1']:checked").val();
                        var babyname = $("input[name='babyname']").val();
                        var day = $("#day :selected").val();
                        var month = $("#month :selected").val();
                        var year = $("#year :selected").val();
                        if (babyname == '') {
                            alert('Bạn chưa nhập tên của bé!');
                            return false;
                        }
                        if (!babyname.match(/^([a-zA-Z]+[ a-zA-Z]*)$/)) {
                            alert('Vui lòng chỉ nhập bảng chữ cái!');
                            return false;
                        }
                        if (sex != 'male' && sex != 'female') {
                            alert('Bạn chưa chọn giới tính!');
                            return false;
                        }
                        if (day == "") { alert("Vui lòng chọn ngày!"); return false; }
                        if (month == "") { alert("Vui lòng chọn tháng!"); return false; }
                        if (year == "") { alert("Vui lòng chọn năm!"); return false; }
                        var dd1 = new Date();
                        var dd2 = new Date(year, month - 1, day);
                        cd = dd2.getDate();
                        if (day != cd || dd1 < dd2) {
                            alert("Ngày không hợp lệ!");
                            return false;
                        }
                        $('#name_').html(babyname);
                        $('#birthday').html('Ngày ' + day + ' , ' + 'Tháng ' + month + ' , ' + 'Năm ' + year);
                        $('#day_').append('<b>' + 'Tháng ' + month + ' ,' + 'Năm ' + year + '</b>' + '<br>');
                        $('#day_').append('Sau tháng ' + month + ' :' + '1-2 tháng');
                        $('#day_1').append('<b>' + 'Tháng ' + month + ' ,' + 'Năm ' + year + '</b>' + '<br>');
                        $('#day_1').append('Sau tháng ' + month + ' :' + '2-3 tháng');
                        $('#day_2').append('<b>' + 'Tháng ' + month + ' ,' + 'Năm ' + year + '</b>' + '<br>');
                        $('#day_2').append('Sau tháng ' + month + ' :' + '3-4 tháng');
                        $('#day_3').append('<b>' + 'Tháng ' + month + ' ,' + 'Năm ' + year + '</b>' + '<br>');
                        $('#day_3').append('Sau tháng ' + month + ' :' + '4-5 tháng');
                        $('#day_4').append('<b>' + 'Tháng ' + month + ' ,' + 'Năm ' + year + '</b>' + '<br>');
                        $('#day_4').append('Sau tháng ' + month + ' :' + '5-6 tháng');
                        $('#day_5').append('<b>' + 'Tháng ' + month + ' ,' + 'Năm ' + year + '</b>' + '<br>');
                        $('#day_5').append('Sau tháng ' + month + ' :' + '6-7 tháng');
                        $('#day_6').append('<b>' + 'Tháng ' + month + ' ,' + 'Năm ' + year + '</b>' + '<br>');
                        $('#day_6').append('Sau tháng ' + month + ' :' + '7-8 tháng');
                        $('#day_7').append('<b>' + 'Tháng ' + month + ' ,' + 'Năm ' + year + '</b>' + '<br>');
                        $('#day_7').append('Sau tháng ' + month + ' :' + '8-9 tháng');
                        $('#day_8').append('<b>' + 'Tháng ' + month + ' ,' + 'Năm ' + year + '</b>' + '<br>');
                        $('#day_8').append('Sau tháng ' + month + ' :' + '9-10 tháng');
                        $('#day_9').append('<b>' + 'Tháng ' + month + ' ,' + 'Năm ' + year + '</b>' + '<br>');
                        $('#day_9').append('Sau tháng ' + month + ' :' + '10-11 tháng');
                        $('#day_10').append('<b>' + 'Tháng ' + month + ' ,' + 'Năm ' + year + '</b>' + '<br>');
                        $('#day_10').append('Sau tháng ' + month + ' :' + '11-12 tháng');
                        $('#day_11').append('<b>' + 'Tháng ' + month + ' ,' + 'Năm ' + year + '</b>' + '<br>');
                        $('#day_11').append('Sau tháng ' + month + ' :' + '12-13 tháng');
                        $('#day_12').append('<b>' + 'Tháng ' + month + ' ,' + 'Năm ' + year + '</b>' + '<br>');
                        $('#day_12').append('Sau tháng ' + month + ' :' + '13-14 tháng');
                        $('#day_13').append('<b>' + 'Tháng ' + month + ' ,' + 'Năm ' + year + '</b>' + '<br>');
                        $('#day_13').append('Sau tháng ' + month + ' :' + '14-15 tháng');
                        $('#day_14').append('<b>' + 'Tháng ' + month + ' ,' + 'Năm ' + year + '</b>' + '<br>');
                        $('#day_14').append('Sau tháng ' + month + ' :' + '15-16 tháng');
                        $('#form_kq2').css('display', 'block');
                    })
                });
            </script>
            <div class="calculator-table-form blue" id="gendercolor">
                <form method="POST" name="immunization">
                    <table cellpadding="0" cellspacing="0" class="tv12black">
                        <tbody>
                            <tr class="table-head">
                                <td colspan="2">Những cột mốc phát triển của trẻ</td>
                            </tr>
                            <tr>
                                <td>Tên của bé</td>
                                <td><input type="text" name="babyname" maxlength="50">
                                </td>
                            </tr>
                            <tr>
                                <td>Giới tính <span class="mandatory-star">*</span> </td>
                                <td><input type="radio" name="r1" value="male" checked="checked"
                                        onclick="checkgender();">Nam
                                    <input type="radio" name="r1" value="female" onclick="checkgender();">Nữ
                                </td>
                            </tr>
                            <tr>
                                <td>Ngày sinh<span class="mandatory-star">*</span></td>
                                <td><select size="1" name="dd" id="day">
                                        <option value="">Ngày</option>
                                        <script language="javascript">
                                            for (i = 1; i <= 31; i++) {
                                                document.write('<option value="' + i + '">' + i + '</option>');
                                            }
                                        </script>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
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
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                    </select>
                                    <select size="1" name="mm" id="month">
                                        <option value="">Tháng</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select> <select size="1" name="yy" id="year">
                                        <option value="">Năm</option>
                                        <script language="javascript">
                                            sdate = new Date();
                                            for (i = (sdate.getFullYear() - 10); i <= sdate.getFullYear(); i++) {
                                                document.write('<option value="' + i + '">' + i + '</option>');
                                            }
                                        </script>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><span class="required">* yêu cầu</span>
                                    <input class="flat-btn" type="button" value="Xác nhận" name="but_send"
                                        id="submit_btn">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="report-content" id="form_kq2" style="padding-top: 10px; display: none;">
                <div class="calcresult ">
                    <h3>Kết quả</h3>
                    <div class="content-inner">
                        <div class="result tv12black" style="text-align:left; padding-left:15px;"> <br><b>Tên của bé
                                :</b> <b id="name_"></b> </div>
                        <div class="result tv12black" style="text-align:left; padding-left:15px;"> <br><b>Ngày sinh
                                :</b> <b id="birthday"></b> </div>
                        <table cellpadding="0" cellspacing="0" class="tv12black">
                            <tbody>
                                <tr>
                                    <td><strong>Ngày</strong></td>
                                    <td><strong>Các mốc phát triển</strong></td>
                                </tr>


                                <tr>
                                    <td id="day_"></td>
                                    <td>Quay đầu về phía có tiếng động</td>
                                </tr>


                                <tr>
                                    <td id="day_1"></td>
                                    <td>Mỉm cười với mọi người</td>
                                </tr>


                                <tr>
                                    <td id="day_2"></td>
                                    <td>- Trẻ biết phát âm ậm ẹ<br>
                                        - Đưa được cổ lên<br>
                                        - Nhận ra mẹ mình<br>
                                        </td>
                                </tr>


                                <tr>
                                    <td id="day_3"></td>
                                    <td>Biết nắm chặt đồ vật khi đặt vào tay</td>
                                </tr>


                                <tr>
                                    <td id="day_4"></td>
                                    <td>- Biết với tới một đồ vật<br>
                                        - Cầm được đồ bằng hai tay<br>
                                        - Ngồi được nếu có người đỡ<br>
                                        </td>
                                </tr>


                                <tr>
                                    <td id="day_5"></td>
                                    <td>- Biết cười khi thấy mình trong gương<br>
                                        - Nói bập bẹ từng âm<br>
                                        </td>
                                </tr>


                                <tr>
                                    <td id="day_6"></td>
                                    <td>- Biết chộp và nắm đồ vật</td>
                                </tr>


                                <tr>
                                    <td id="day_7"></td>
                                    <td>Biết tự ngồi</td>
                                </tr>


                                <tr>
                                    <td id="day_8"></td>
                                    <td>- Biết đứng nếu có người đỡ<br>
                                        - Nói bập bẹ hai tiếng một<br>
                                        - Biết vẫy tay<br>
                                        - Biết cầm đồ vật giữa ngón trỏ và ngón cái<br>
                                        </td>
                                </tr>


                                <tr>
                                    <td id="day_9"></td>
                                    <td>- Đi chập chững khi có người đơ</td>
                                </tr>


                                <tr>
                                    <td id="day_10"></td>
                                    <td>Biết bò</td>
                                </tr>


                                <tr>
                                    <td id="day_11"></td>
                                    <td>- Tự đứng được<br>
                                        - Nói bập bẹ hai từ một<br>
                                        - Chơi trò chơi đơn giản với bóng<br>
                                        </td>
                                </tr>


                                <tr>
                                    <td id="day_12"></td>
                                    <td>- Biết chạy<br>
                                        - Nói lắp bắp 10 từ<br>
                                        </td>
                                </tr>


                                <tr>
                                    <td id="day_13"></td>
                                    <td>- Biết leo bậc cầu thang<br>
                                        - Biết nói những câu đơn giản<br>
                                        </td>
                                </tr>


                                <tr>
                                    <td id="day_14"></td>
                                    <td>- Biết đi xe đạp 3 bánh<br>
                                        - Biết kể chuyện<br>
                                        - Biết phân biệt giới tính<br>
                                        </td>
                                </tr>


                                <tr>
                                    <td colspan="2">
                                        <div class="note"><b>Chú ý: </b> Sự phát triển của trẻ thay đổi khá đa dạng. Ở trẻ sinh non hoặc khi trẻ có vấn đề sức khỏe (VD bệnh tim) thì những dấu mốc này có thể bị chậm hơn. Nếu có lo lắng gì về sự phát triển của trẻ, hãy hỏi ý kiến bác sĩ nhi khoa</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="px20"></div>
            </div>


<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
}}