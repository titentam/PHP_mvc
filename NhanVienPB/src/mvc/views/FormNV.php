<?php
// session_start();
// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === false) {
//     header("Location: login.php");
//     exit;
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="NhanVienController.php?action=submitInsertNV" method="post">

        <label for="IDNV">ID nhân viên:</label>
        <div id="errorIDNV" style="display:none;color:red">Vui lòng nhập ID nhân viên</div> <br>
        <?php
        if (isset($_GET['IDNV']) and $_GET['valid'] == 0) {
            echo '<div style="color:red">' . $_GET['IDNV'] . 'đã tồn tại</div> <br>';
        }
        ?>
        <input type="text" id="IDNV" name="IDNV"><br><br>

        <label for="HoTen">Họ tên:</label>
        <div id="errorHoTen" style="display:none;color:red">Vui lòng nhập họ tên</div> <br>
        <input type="text" id="HoTen" name="HoTen"><br><br>

        <label for="IDPB">Phòng ban:</label>
        <select name="IDPB" id="IDPB">
            <?php

            $listPB = $data["listPB"];
            echo sizeof($listPB);
            foreach ($listPB as $row) {
                echo '<option value="' . $row->IDPB . '">' . $row->TenPB . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="DiaChi">Địa chỉ:</label>
        <div id="errorDiaChi" style="display:none;color:red">Vui lòng nhập địa chỉ</div> <br>
        <textarea id="DiaChi" name="DiaChi"></textarea><br><br>

        <input name="submit" type="submit" value="Thêm nhân viên">

    </form>
    <a href="/MVC/NhanVienPB/public/">Home</a>
</body>
<script>
    // Lấy phần tử form
    const form = document.querySelector('form');
    const idnvInput = document.getElementById('IDNV');
    idnvInput.addEventListener("blur", function () {
        var idnv = this.value;
        if (idnv) {
            // Tạo một đối tượng XMLHttpRequest
            var xhr = new XMLHttpRequest();

            // Thiết lập một hàm callback để xử lý phản hồi từ server
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {

                    var result = JSON.parse(xhr.responseText);

                    // Tạo một thẻ span mới
                    var span = document.getElementById('checkValid');
                    if (!span) {
                        span = document.createElement('span');
                        span.id = 'checkValid';
                    }
                    span.textContent = result.message;

                    if (result.valid == 0) {
                        span.style.color = 'red';
                    } else {
                        span.style.color = 'green';
                    }
                    // thêm span bên thể input idnv
                    idnvInput.insertAdjacentElement('afterend', span);
                }
            };

            // Mở kết nối đến file PHP kiểm tra idnv
            xhr.open('POST', '../controllers/NhanVienController.php?action=CheckID', true);

            // Thiết lập header cho yêu cầu POST
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            // Gửi yêu cầu đến server với idnv
            xhr.send('idnv=' + idnv);
        }
        else{
            idnvInput.focus();        
        }
    });

    function validate() {
        // Lấy các phần tử cần validate
        const idnv = document.getElementById('IDNV');
        const hoten = document.getElementById('HoTen');
        const diachi = document.getElementById('DiaChi');

        // Lấy các phần tử hiển thị lỗi
        const errorIDNV = document.getElementById('errorIDNV');
        const errorHoTen = document.getElementById('errorHoTen');
        const errorDiaChi = document.getElementById('errorDiaChi');

        var res = true;
        errorIDNV.style.display = 'none';
        errorHoTen.style.display = 'none';
        errorDiaChi.style.display = 'none';

        if (idnv.value.trim() === '') {
            res = false;
            errorIDNV.style.display = 'block';
        }
        if (hoten.value.trim() === '') {
            res = false;
            errorHoTen.style.display = 'block';
        }
        if (diachi.value.trim() === '') {
            res = false;
            errorDiaChi.style.display = 'block';
        }
        var span = document.getElementById('checkValid');
        var valid = false;
        if (span) valid = span.style.color == 'green';
        return res && valid;
    }

    // Sự kiện submit form
    form.addEventListener('submit', e => {
        if (!validate()) {
            document.getElementById('IDNV').focus();
            e.preventDefault(); // Ngăn submit form
        }
    });
</script>

</html>