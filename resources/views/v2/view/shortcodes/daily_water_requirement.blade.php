<?php
if(!function_exists('daily_water_requirement')){

function daily_water_requirement(){
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

    <script type="text/javascript">
        $(function () {
            $("input").each(function (index, element) {
                var $element = $(element);
                var defaultValue = $element.val();
                $element.css('color', '#ccc');
                $element.focus(function () {
                    $element.css('color', '#000');
                });
                $element.blur(function (e) {
                    var actualValue = $element.val();
                    if (actualValue != defaultValue) {
                        $element.css('color', '#000');
                    } else {
                        $element.css('color', '#ccc');
                    }

                });
            });
        });
    </script>

    <div>
                <h2>Công cụ tính lượng nước cần uống hàng ngày</h2>
                <p>
                    Bạn có mắc sai lầm khi đợi đến khi cảm thấy khát rồi mới uống nước hay không? <br>
                    Khát nước không phải là một tín hiệu từ cơ thể cho thấy rằng mức nước trong cơ thể bạn đang cạn kiệt. <br>
                    Đó là một cảnh báo rằng bạn đang bị mất nước và bạn cần phải uống nước sớm. <br>
                    Vào thời điểm bạn cảm thấy khát, cơ thể bạn đã mất 1% lượng nước. Uống nước đều đặn để bạn không bị mất nước.<br>
                    Công cụ tính này giúp bạn xác định lượng nước bạn phải uống mỗi ngày để tránh bị mất nước. <br>
                    Hãy nhớ rằng, đây chỉ là ước tính. <br>
                    Số lượng thực tế mà một người cần phụ thuộc vào nhiều yếu tố như tập thể dục, bệnh tật và hàm lượng chất lỏng trong khẩu phần ăn. <br>
                    Phụ nữ mang thai và cho con bú cần uống thêm chất lỏng để giữ đủ nước.
                </p>
            </div>
            <script language="javascript">
                jQuery(document).ready(function () {
                    $('#submit_btn').click(function () {
                        var weight = $("input[name='pounds']").val();
                        var time = $("input[name='time']").val();
                        if (weight == "" ) {
                            alert("Hãy nhập cân nặng của bạn");
                            return false;
                        } 
                        if (!weight.match(/^[0-9]+(\.[0-9]+)?$/))
                        {
                            alert("Hãy nhập đúng định dạng cân nặng!");
                            return false;
                        } 
                        if (time == ""){
                            alert("Hãy nhập thời gian tập thể dục mỗi ngày của bạn");
                            return false;
                        }
                        if (!time.match(/^[0-9]+(\.[0-9]+)?$/))
                        {
                            alert("Hãy nhập đúng định dạng thời gian tập thể dục mỗi ngày!");
                            return false;
                        } 
                        var lit = (weight*2.2*0.67*0.03) + (time/30)*12*0.03;
                        $('#lit').html(lit);
                        $('#form_kq2').css('display', 'block');
                    });
                });
            </script>

            <div class="calculator-table-form blue" id="gendercolor">

                <form method="POST" name="infant">
                    <input type="hidden" name="wt">
                    <center>
                        <table cellpadding="0" cellspacing="0" class="tv12black">
                            <tbody>
                                <tr class="table-head">
                                    <td colspan="2">Nhập chi tiết</td>

                                </tr>

                                <tr>
                                    <td>
                                        Cân nặng<span class="mandatory-star">*</span>
                                    </td>
                                    <td>
                                        <input size="10" type="text" name="pounds" maxlength="3" value="70">
                                        &nbsp;
                                        Kg
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Thời gian tập thể dục mỗi ngày<span class="mandatory-star">*</span>
                                    </td>
                                    <td>
                                        <input size="10" type="text" name="time" maxlength="5" value="120">
                                        &nbsp;
                                        Phút
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"> <span class="required">* Yêu cầu</span>
                                        <input type="button" value="Xác nhận" name="B1" class="flat-btn" id="submit_btn">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </center>
                </form>
            </div>
            <div class="calculator-table-form blue" style="padding-bottom: 20px;display: none;" id="form_kq2">
                <form name="waterreq">           
                  <table width="100%" cellpadding="10" style="border: 1px solid #42A0E2" bgcolor="white" class="tv12blue">    
                  <tbody><tr class="table-head"><td>Kết quả:</td></tr>         
                            <tr>
                                <td>Bạn cần uống ít nhất <font class="tv12red"><b id="lit"></b></font> lít nước hàng ngày.</td>
                            </tr>
                            
                        </tbody>
                    </table>              
                </form>
            </div>
            <div>
                <p>
                    Thông tin quan trọng về nước:<br>
                        ❖ Cơ thể con người được tạo thành từ gần như 60% -70% là nước.<br>
                        ❖ Đồ uống như trà, cà phê và tất cả đồ uống có cồn đều là chất lỏng khử nước và sẽ đào thải nước ra khỏi cơ thể bạn. Vì vậy, nếu bạn khát, hãy đảm bảo rằng bạn không uống bất kỳ chất lỏng làm mất nước nào.<br>
                        ❖ Uống một cốc nước trước bữa ăn. Nó không chỉ kiểm soát việc ăn uống của bạn và giúp giữ cho cân nặng của bạn ở mức khỏe mạnh mà còn giúp bảo vệ thành dạ dày của bạn khỏi tác hại của axit tiêu hóa.<br>
                        ❖ Uống đủ nước sẽ giúp bạn giảm cân vì nếu không có nước, cơ thể không thể chuyển hóa chất béo một cách đầy đủ.<br>
                        ❖ Các triệu chứng mất nước bao gồm nhức đầu, đau bụng, thay đổi hành vi, trầm cảm.<br>
                        ❖ Mất 22% -30% tổng lượng nước trong cơ thể có thể dẫn đến hôn mê và tử vong

                </p>
            </div>
<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
}}