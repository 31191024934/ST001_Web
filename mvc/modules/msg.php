<?php
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == "done") {
        echo "<div class='msg' style='background-color:green; color: white;'>
                Đăng kí thành công!
              </div>";
    } else if ($_GET['msg'] == "unvalid-data") {
        echo "
            <div class='msg col-6' style='margin-bottom: 10px; background-color:rgba(253, 61, 61, 0.459); color:white; text-align:center; margin-left: 25%'>
                Vui lòng kiểm tra lại dữ liệu nhập vào!
            </div>
        ";
    } else if ($_GET['msg'] == "duplicate") {
        echo "
        <div class='msg col-6' style='background-color:rgba(253, 61, 61, 0.459); color:white; margin-bottom: 10px; text-align:center; margin-left: 29%'>
            Tài khoản bạn đăng kí đã tồn tại, xin vui lòng chọn tên đăng nhập khác!
        </div>
        ";
    } else if ($_GET['msg'] == "login-fail") {
        echo "
        <div class='msg col-6' style='background-color:rgba(253, 61, 61, 0.459); color:white; margin-left: 25%; text-align: center;'>
            Username hoặc Password không đúng. Vui lòng kiểm tra lại!
        </div>
        ";
    }
}
