<?php
if(!function_exists('shortcode_113')){

function shortcode_113(){
    ob_start();
?>
 <script language="javascript">
                jQuery(document).ready(function () {
                    $('#submit_btn').click(function () {
                        var slt_disease = $("#slt_disease :selected").text();
                        if (slt_disease == 'Chọn') {
                            alert("Hãy chọn Bệnh tật/Tình trạng sức khỏe của bạn!");
                            return false;
                        }
                        var orders = [
                                {
                                "name": "Thiếu máu hồng cầu to",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin B9 và vitamin B12"
                                },
                                {
                                "name": "Thiếu máu hồng cầu nhỏ",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin B6"
                                },
                                {
                                "name": "Thiếu máu ác tính",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin B12"
                                },
                                {
                                "name": "BeriBeri",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin B1"
                                },
                                {
                                "name": "Chảy máu răng lợi",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin C"
                                },
                                {
                                "name": "Suy tim",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin B1"
                                },
                                {
                                "name": "Táo bón",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin B12"
                                },
                                {
                                "name": "Co giật",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin B6"
                                },
                                {
                                "name": "Trầm cảm",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin D"
                                },
                                {
                                "name": "Tóc khô",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin C"
                                },
                                {
                                "name": "Khô mắt",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin A"
                                },
                                {
                                "name": "Phù nề",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin B1"
                                },
                                {
                                "name": "Viêm lưỡi",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin B2"
                                },
                                {
                                "name": "Thiếu máu tan máu",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin E"
                                },
                                {
                                "name": "Tăng huyết áp",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin D"
                                },
                                {
                                "name": "Mất ngủ",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin B7"
                                },
                                {
                                "name": "Cáu gắt",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin B6"
                                },
                                {
                                "name": "Vấn đề về thận",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin E"
                                },
                                {
                                "name": "Yếu cơ",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin E"
                                },
                                {
                                "name": "Buồn nôn",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin B7"
                                },
                                {
                                "name": "Viêm dây thần kinh",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin B1"
                                },
                                {
                                "name": "Suy giảm thần kinh",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin B12"
                                },
                                {
                                "name": "Quáng gà",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin A"
                                },
                                {
                                "name": "Chảy máu cam",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin C"
                                },
                                {
                                "name": "Loãng xương",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin D"
                                },
                                {
                                "name": "Pellagra",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin B3"
                                },
                                {
                                "name": "Chứng sợ ám ảnh",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin B2"
                                },
                                {
                                "name": "Tăng trưởng xương kém",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin A"
                                },
                                {
                                "name": "Tăng trưởng kém",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin B2 và vitamin B9"
                                },
                                {
                                "name": "Thời gian chảy máu kéo dài",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin K"
                                },
                                {
                                "name": "Thoái hóa võng mạc",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin E"
                                },
                                {
                                "name": "Viêm khớp dạng thấp",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin D"
                                },
                                {
                                "name": "Bệnh còi xương",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin D"
                                },
                                {
                                "name": "Viêm da tiết bã",
                                "content": "Một trong những yếu tố gây ra bệnh tật/ Tình trạng sức khỏe trên là do thiếu hụt vitamin C"
                                }
                            ];
                            orders.map( function(order) {
                                $.map($("#slt_disease :selected"), function (params, id) {
                                    if (order.name == $(params).val()) {
                                        $('#name_tt').html($(params).val());
                                        $('#content_').html(order.content);

                                    }
                                });
                            });
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
                                    <td colspan="2">Chọn chi tiết</td>
                                </tr>
                                <tr>
                                    <td>Bệnh tật/Tình trạng sức khỏe</td>
                                    <td>
                                        <select name="slt_disease" id="slt_disease">
                                            <option>Chọn</option>
                                            <option value="Thiếu máu hồng cầu to">Thiếu máu hồng cầu to</option>
                                            <option value="Thiếu máu hồng cầu nhỏ">Thiếu máu hồng cầu nhỏ</option>
                                            <option value="Thiếu máu ác tính">Thiếu máu ác tính</option>
                                            <option value="BeriBeri">BeriBeri</option>
                                            <option value="Chảy máu răng lợi">Chảy máu răng lợi</option>
                                            <option value="Suy tim">Suy tim</option>
                                            <option value="Táo bón">Táo bón</option>
                                            <option value="Co giật">Co giật</option>
                                            <option value="Trầm cảm">Trầm cảm</option>
                                            <option value="Tóc khô">Tóc khô</option>
                                            <option value="Khô mắt">Khô mắt</option>
                                            <option value="Phù nề">Phù nề</option>
                                            <option value="Viêm lưỡi">Viêm lưỡi</option>
                                            <option value="Thiếu máu tan máu">Thiếu máu tan máu</option>
                                            <option value="Tăng huyết áp">Tăng huyết áp</option>
                                            <option value="Mất ngủ">Mất ngủ</option>
                                            <option value="Cáu gắt">Cáu gắt</option>
                                            <option value="Vấn đề về thận">Vấn đề về thận</option>
                                            <option value="Yếu cơ">Yếu cơ</option>
                                            <option value="Buồn nôn">Buồn nôn</option>
                                            <option value="Viêm dây thần kinh">Viêm dây thần kinh</option>
                                            <option value="Suy giảm thần kinh">Suy giảm thần kinh</option>
                                            <option value="Quáng gà">Quáng gà</option>
                                            <option value="Chảy máu cam">Chảy máu cam</option>
                                            <option value="Loãng xương">Loãng xương</option>
                                            <option value="Pellagra">Pellagra</option>
                                            <option value="Chứng sợ ám ảnh">Chứng sợ ám ảnh</option>
                                            <option value="Tăng trưởng kém">Tăng trưởng kém</option>
                                            <option value="Thời gian chảy máu kéo dài">Thời gian chảy máu kéo dài</option>
                                            <option value="Thoái hóa võng mạc">Thoái hóa võng mạc</option>
                                            <option value="Viêm khớp dạng thấp">Viêm khớp dạng thấp</option>
                                            <option value="Bệnh còi xương">Bệnh còi xương</option>
                                            <option value="Viêm da tiết bã">Viêm da tiết bã</option>
                                            <option value="Tăng trưởng xương kém">Tăng trưởng xương kém</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <span class="red">* </span>Bắt buộc
                                        <input type="button" value="Kiểm tra" name="but_check" class="flat-btn" id="submit_btn">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </center>
            <div class="calculator-table-form blue" style="padding-bottom: 30px;display: none;" id="form_kq2">
                <table border="0" cellpadding="5" cellspacing="1" width="100%" class="tv12black">
                    <tbody><tr class="table-head"><td colspan="2"><b>Kết quả</b></td></tr>
                    <tr><td width="50%">Bệnh tật / Tình trạng sức khỏe</td><td width="50%" id="name_tt"></td></tr>
                    <tr>
                        <td colspan="2" align="center" id="content_"></td>
                    </tr>
                </tbody></table>
            </div>

<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
}}