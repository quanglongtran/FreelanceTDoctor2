<?php
if(!function_exists('short_code_bmi')){
	function short_code_bmi(){
		ob_start();
?>
<script type="text/javascript">
        function ClearForm(form) {
            form.weight.value = "";
            form.height.value = "";
            form.bmi.value = "";
            form.my_comment.value = "";
        }
        function bmi(weight, height) {
            bmindx = Math.round(weight / eval(height * height) * 100) / 100;
            return bmindx;
        }
        function checkform(form) {
            if (form.weight.value == null || form.weight.value.length == 0 || form.height.value == null || form.height.value.length == 0) {
                alert("\nVui lòng nhập đầy đủ thông tin về chiều cao (cm) & cân nặng (kg) của bạn. \nSau đó nhấn vào nút 'Xem' để kiểm tra BMI và phần nhận xét.");
                return false;
            }
            else if (parseFloat(form.height.value) <= 0 ||
                parseFloat(form.height.value) >= 250 ||
                parseFloat(form.weight.value) <= 0 ||
                parseFloat(form.weight.value) >= 500) {
                alert("\nBạn đã nhập không đúng. Vui lòng nhập đầy đủ thông tin về chiều cao (cm) & cân nặng (kg) của bạn. \nSau đó nhấn vào nút 'Xem' để kiểm tra BMI và phần nhận xét.");
                ClearForm(form);
                return false;
            }
            return true;
        }
        function computeform(form) {
            if (checkform(form)) {
                yourbmi = (bmi(form.weight.value, form.height.value / 100));
                form.bmi.value = yourbmi;
                if (yourbmi >= 40) {
                    form.my_comment.value = "Bạn bị béo phì độ III !";
                }
                else if (yourbmi >= 35 && yourbmi < 40) {
                    form.my_comment.value = "Chỉ số BMI ở trên cho thấy bạn bị béo phì độ II !";
                }
                else if (yourbmi >= 30 && yourbmi < 35) {
                    form.my_comment.value = "Chỉ số BMI ở trên cho thấy bạn bị béo phì độ I";
                }
                else if (yourbmi >= 25 && yourbmi < 30) {
                    form.my_comment.value = "Chỉ số BMI ở trên cho thấy bạn bị thừa cân !";
                }
                else if (yourbmi >= 18.5 && yourbmi < 25) {
                    form.my_comment.value = "Chúc mừng bạn ! Bạn có chỉ số BMI bình thường !";
                }
                else if (yourbmi >= 17 && yourbmi < 18.5) {
                    form.my_comment.value = "Chỉ số BMI ở trên cho thấy bạn bị gầy độ I !";
                }
                else if (yourbmi >= 16 && yourbmi < 17) {
                    form.my_comment.value = "Chỉ số BMI ở trên cho thấy bạn bị gầy độ II ! ";
                }
                else if (yourbmi < 16) {
                    form.my_comment.value = "Chỉ số BMI ở trên cho thấy bạn bị gầy độ III ! ";
                }
            }
            return;
        }
  </script>  
  <form method="POST" name="BMI">
<div class="col-sm-12x">
                    <div class="control-group form-group">
                        <div class="controls">
                            <h3 class="text-center">
                                ĐO CHỈ SỐ CÂN NẶNG - CHIỀU CAO (BMI) ONLINE
                            </h3>
                        </div>
                    </div>
                    <div class="controls">
                        <label>Nhập chiều cao của bạn:</label>
                        <input type="text" class="form-control" placeholder="Tính theo cm" onfocus="this.form.height.value=''" size="3" name="height">
                    </div>
                    <div class="controls" style="padding-top: 10px;">
                        <label>Nhập cân nặng của bạn:</label>
                        <input type="text" class="form-control" placeholder="Tính theo kg" onfocus="this.form.weight.value=''" size="3" name="weight">
                    </div>
                    <div class="controls" style="padding-top: 15px;">
                        <table class="table">
                            <tbody><tr>
                                <td style="text-align:center;">
                                    <input type="button" value="XEM" onclick="computeform(this.form)" class="btn btn-primary" style="margin: 0;">
                                </td>
                                <td style="text-align:center;">
                                    <input type="reset" value="XÓA" onclick="ClearForm(this.form)" class="btn btn-success">
                                </td>
                            </tr>
                        </tbody></table>
                    </div>
                    <div class="controls" style="padding-top:10px;">
                        <label>Kết quả BMI của bạn:</label>
                        <input type="text" class="form-control" size="3" name="bmi">
                    </div>
                    <div class="controls" style="padding-top:10px;">
                        <label>Nhận xét BMI của bạn:</label>
                        <input type="text" class="form-control" size="3" name="my_comment">
                    </div>
                </div>
              </form>
<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
}
}