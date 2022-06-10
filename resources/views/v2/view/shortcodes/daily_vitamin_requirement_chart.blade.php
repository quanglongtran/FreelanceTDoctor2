<?php
if(!function_exists('daily_vitamin_requirement_chart')){

function daily_vitamin_requirement_chart(){
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

    <script language="javascript">
                jQuery(document).ready(function () {
                    $('#submit_btn').click(function () {
                        var slt_vitamin = $("#slt_vitamin :selected").text();
                        if (slt_vitamin == 'Chọn') {
                            alert("Hãy chọn loại vitamin bạn cần");
                            return false;
                        }
                        if (slt_vitamin == 'Vitamin A (Retinol)') {
                            $('#nam').html('800 mcg (3000 IU)');
                            $('#nu').html('700 mcg(2333 IU)');
                            $('#loi_ich').html('Cần thiết cho thi lực và có thể làm giảm nguy cơ ung thư tiền liệt tuyến.Giữ cho các mô và da khỏe mạnh.Đóng một vai trò quan trọng trong sự phát triển của xương và miễn dịch.<br>Thực phẩm giàu carotenoid lutein và zeaxanthin có thể bảo vệ chống lại bệnh đục thủy tinh thể');
                            $('#nguon').html('Nguồn cung cấp retinoids: gan bò, trứng, tôm, cá, sữa tăng cường, bơ, pho mát Thụy Sĩ.<br>Nguồn cung cấp beta carotene: khoai lang, cà rốt, bí ngô, rau bina, xoài, củ cải xanh');
                        }
                        if (slt_vitamin == 'B1 (Thiamine)') {
                            $('#nam').html('1,2 mg');
                            $('#nu').html('1,1 mg');
                            $('#loi_ich').html('Giúp chuyển hóa thức ăn thành năng lượng.<br>Cần thiết cho làn da, mái tóc, cơ bắp và não khỏe mạnh và rất quan trọng đối với chức năng thần kinh.');
                            $('#nguon').html('Thịt lợn, gạo lứt, giăm bông, sữa đậu nành, dưa hấu, bí đỏ');
                        }
                        if (slt_vitamin == 'B2 (Ribloflavin)') {
                            $('#nam').html('1,3 mg');
                            $('#nu').html('1,1 mg');
                            $('#loi_ich').html('Giúp chuyển hóa thức ăn thành năng lượng. Cần thiết cho làn da, mái tóc, máu và não khỏe mạnh');
                            $('#nguon').html('Sữa, trứng, sữa chua, pho mát, thịt, rau lá xanh, ngũ cốc.');
                        }
                        if (slt_vitamin == 'B6 (Pyridoxine)') {
                            $('#nam').html('1,3 mg');
                            $('#nu').html('1,3 mg');
                            $('#loi_ich').html('Hỗ trợ giảm mức homocysteine và có thể làm giảm nguy cơ bệnh tim. Giúp chuyển đổi tryptophan thành niacin và serotonin, một chất dẫn truyền thần kinh đóng vai trò quan trọng trong giấc ngủ, sự thèm ăn và tâm trạng. Giúp tạo ra các tế bào hồng cầu ');
                            $('#nguon').html('Thịt, cá, thịt gia cầm, các loại đậu, đậu phụ và các sản phẩm từ đậu nành khác, khoai tây, trái cây không có múi như chuối và dưa hấu');
                        }
                        if (slt_vitamin == 'B12 (Cobalamin)') {
                            $('#nam').html('2,4 mcg');
                            $('#nu').html('2,4 mcg');
                            $('#loi_ich').html('Hỗ trợ làm giảm mức homocysteine và có thể làm giảm nguy cơ mắc bệnh tim. Hỗ trợ tạo ra các tế bào mới và phá vỡ một số axit béo và axit amin. Bảo vệ các tế bào thần kinh và khuyến khích sự phát triển bình thường của chúng');
                            $('#nguon').html('Thịt, gia cầm, cá, sữa, pho mát, trứng, ngũ cốc, sữa đậu nành');
                        }
                        if (slt_vitamin == 'B3 Niacin(Nicotinamide or Nicotinic acid)') {
                            $('#nam').html('16 mg');
                            $('#nu').html('14 mg');
                            $('#loi_ich').html('Giúp chuyển hóa thức ăn thành năng lượng. Cần thiết cho làn da khỏe mạnh, tế bào máu, não và hệ thần kinh');
                            $('#nguon').html('Thịt, gia cầm, cá, ngũ cốc tăng cường và ngũ cốc nguyên hạt, nấm, khoai tây, bơ đậu phộng');
                        }
                        if (slt_vitamin == 'Folic acid') {
                            $('#nam').html('400 mcg');
                            $('#nu').html('400 mcg');
                            $('#loi_ich').html('Quan trọng cho việc tạo tế bào mới. Giúp ngăn ngừa dị tật bẩm sinh não và cột sống khi dùng trong thời kỳ đầu của thai kỳ; nên được thực hiện thường xuyên bởi tất cả phụ nữ trong độ tuổi sinh đẻ vì phụ nữ có thể không biết mình đang mang thai trong những tuần đầu tiên của thai kỳ.');
                            $('#nguon').html('Các loại ngũ cốc và ngũ cốc tăng cường, măng tây, đậu bắp, rau bina, củ cải xanh, bông cải xanh, các loại đậu như đậu mắt đen và đậu gà, nước cam, nước ép cà chua');
                        }
                        if (slt_vitamin == 'Pantothenic acid (Vit. B5)') {
                            $('#nam').html('5 mg');
                            $('#nu').html('5 mg');
                            $('#loi_ich').html('Giúp chuyển hóa thức ăn thành năng lượng. Giúp tạo lipid (chất béo), chất dẫn truyền thần kinh, hormone steroid và hemoglobin');
                            $('#nguon').html('Thịt gà, lòng đỏ trứng, ngũ cốc nguyên hạt, bông cải xanh, nấm, bơ, các sản phẩm từ cà chua');
                        }
                        if (slt_vitamin == 'Biotin') {
                            $('#nam').html('30 mcg');
                            $('#nu').html('30 mcg');
                            $('#loi_ich').html('Giúp chuyển hóa thức ăn thành năng lượng và tổng hợp glucose. Giúp tạo ra và phá vỡ một số axit béo. Cần thiết cho xương và tóc khỏe mạnh');
                            $('#nguon').html('Ngũ cốc nguyên hạt, thịt nội tạng, lòng đỏ trứng, đậu nành và cá');
                        }
                        if (slt_vitamin == 'Vitamin C (Ascorbic Acid)') {
                            $('#nam').html('90 mg');
                            $('#nu').html('75 mg');
                            $('#loi_ich').html('Thực phẩm giàu vitamin C có thể làm giảm nguy cơ mắc một số bệnh ung thư, bao gồm cả ung thư miệng, thực quản, dạ dày và vú.  Sử dụng vitamin C bổ sung lâu dài có thể bảo vệ chống lại bệnh đục thủy tinh thể.  Giúp tạo ra collagen, một mô liên kết kết nối các vết thương lại với nhau và hỗ trợ các thành mạch máu. Tăng cường hệ thống miễn dịch');
                            $('#nguon').html('Trái cây và nước ép trái cây (đặc biệt là cam quýt), khoai tây, bông cải xanh, ớt chuông, rau bina, dâu tây, cà chua, cải Brussels');
                        }
                        if (slt_vitamin == 'Vitamin D') {
                            $('#nam').html('15 mcg (600 IU)');
                            $('#nu').html('15 mcg (600 IU)');
                            $('#loi_ich').html('Giúp duy trì nồng độ canxi và phốt pho trong máu bình thường, giúp xương chắc khỏe.  Giúp hình thành răng và xương.  Chất bổ sung có thể làm giảm số ca gãy xương không phải cột sống');
                            $('#nguon').html('Sữa tăng cường hoặc bơ thực vật, ngũ cốc tăng cường, cá béo');
                        }
                        if (slt_vitamin == 'Vitamin E (Tocopherol)') {
                            $('#nam').html('15 mg');
                            $('#nu').html('15 mg');
                            $('#loi_ich').html('Hoạt động như một chất chống oxy hóa, vô hiệu hóa các phân tử không ổn định có thể gây hại cho tế bào.  Bảo vệ vitamin A và một số lipid nhất định khỏi bị hư hại. Chế độ ăn giàu vitamin E có thể giúp ngăn ngừa bệnh Alzheimer. ');
                            $('#nguon').html('Dầu thực vật, nước sốt salad và bơ thực vật làm từ dầu thực vật, mầm lúa mì, rau lá xanh, ngũ cốc nguyên hạt, các loại hạt');
                        }
                        if (slt_vitamin == 'Vitamin K') {
                            $('#nam').html('120 mcg');
                            $('#nu').html('90 mcg');
                            $('#loi_ich').html('Kích hoạt các protein và canxi cần thiết cho quá trình đông máu. Có thể giúp ngăn ngừa gãy xương hông');
                            $('#nguon').html('Bắp cải, gan, trứng, sữa, rau bina, bông cải xanh, rau mầm, cải xoăn, cải thìa và các loại rau xanh khác');
                        }
                        $('#name_vitamin').html(slt_vitamin);
                        $('#form_kq2').css('display', 'block');
                    });
                });
            </script>
            <center>
                <div class="calculator-table-form blue">
                    <form name="vitamin_class">
                        <table border="0">
                            <tbody>
                                <tr class="table-head">
                                    <td colspan="2">Chọn chi tiết của bạn</td>
                                </tr>
                                <tr>
                                    <td>Các loại Vitamin</td>
                                    <td>
                                        <select name="slt_vitamin" id="slt_vitamin">
                                            <option>Chọn</option>
                                            <option value="Vitamin A (Retinol)">Vitamin A (Retinol)</option>
                                            <option value="B1 (Thiamine)">B1 (Thiamine)</option>
                                            <option value="B2 (Ribloflavin)">B2 (Ribloflavin)</option>
                                            <option value="B6 (Pyridoxine)">B6 (Pyridoxine)</option>
                                            <option value="B12 (Cobalamin)">B12 (Cobalamin)</option>
                                            <option value="B3 Niacin (Nicotinamide or Nicotinic acid)">B3 Niacin
                                                (Nicotinamide or Nicotinic acid)</option>
                                            <option value="Folic acid">Folic acid</option>
                                            <option value="Pantothenic acid (Vit. B5)">Pantothenic acid (Vit. B5)
                                            </option>
                                            <option value="Biotin">Biotin</option>
                                            <option value="Vitamin C (Ascorbic Acid)">Vitamin C (Ascorbic Acid)</option>
                                            <option value="Vitamin D">Vitamin D</option>
                                            <option value="Vitamin E (Tocopherol)">Vitamin E (Tocopherol)</option>
                                            <option value="Vitamin K">Vitamin K</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <span class="red">* </span>Yêu cầu
                                        <input type="button" class="btn" value="Kiểm tra" name="but_check"
                                            id="submit_btn">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </center>
            <div class="calculator-table-form blue" style="padding-bottom: 30px;display: none;" id="form_kq2">
                <table border="0" width="100%">
                    <tbody>
                        <tr class="table-head">
                            <td style="padding-left:5px" valign="top">Tên Vitamin</td>
                        </tr>
                        <tr>
                            <td style="padding-left:5px; " id="name_vitamin"></td>
                        </tr>
                        <tr class="table-head">
                            <td style="padding-left:5px" valign="top">Yêu cầu hàng ngày đối với Nam</td>
                        </tr>
                        <tr>
                            <td style="padding-left:5px; " valign="middle" id="nam"></td>
                        </tr>
                        <tr class="table-head">
                            <td style="padding-left:5px" valign="top">Yêu cầu hàng ngày đối với Nữ</td>
                        </tr>
                        <tr>
                            <td style="padding-left:5px; " valign="middle" id="nu"></td>
                        </tr>
                        <tr class="table-head">
                            <td style="padding-left:5px" valign="top">Lợi ích</td>
                        </tr>
                        <tr>
                            <td style="padding-left:5px; " valign="middle" id="loi_ich"></td>
                        </tr>
                        <tr class="table-head">
                            <td style="padding-left:5px" valign="top">Nguồn thực phẩm</td>
                        </tr>
                        <tr>
                            <td style="padding-left:5px;text-align: left; " valign="middle" id="nguon"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
}}