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
    <?php
    $action = $data['action'];
    ?>
    <form action="PhongBanController.php?action=<?php echo $action ?>" method="post">

        <label for="IDPB">ID phòng ban:</label>
        <div id="errorIDPB" style="display:none;color:red">Vui lòng nhập ID phòng ban</div> <br>
        <?php
        if (isset($_GET['IDPB']) and $_GET['valid'] == 0) {
            echo '<div style="color:red">' . $_GET['IDPB'] . 'đã tồn tại</div> <br>';
        }

        $pb = isset($data["pb"])?$data["pb"]:null;
        ?>
        <input type="text" id="IDPB" name="IDPB" value="<?php echo $pb?$pb->IDPB:''  ?>" <?php echo $pb?'readonly':''  ?>><br><br>

        <label for="TenPB">Tên phòng ban:</label>
        <div id="errorTenPB" style="display:none;color:red">Vui lòng nhập tên</div> <br>
        <input type="text" id="TenPB" name="TenPB" value="<?php echo $pb?$pb->TenPB:''  ?>" ><br><br>

        <label for="MoTa">Mô tả:</label>
        <div id="errorMoTa" style="display:none;color:red">Vui lòng nhập Mô tả</div> <br>
        <input type="text" id="MoTa" name="MoTa" value="<?php echo $pb?$pb->MoTa:''  ?>" ><br><br>
        
        <input name="submit" type="submit" value="OKE">

    </form>
    <a href="/MVC/NhanVienPB/public/">Home</a>
</body>
<script>
    // Lấy phần tử form
    const form = document.querySelector('form');
    const IDPBInput = document.getElementById('IDPB');
    IDPBInput.addEventListener("blur", function () {
        var IDPB = this.value;
        if (IDPB) {
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
                    // thêm span bên thể input IDPB
                    IDPBInput.insertAdjacentElement('afterend', span);
                }
            };

            // Mở kết nối đến file PHP kiểm tra IDPB
            xhr.open('POST', '../controllers/PhongBanController.php?action=CheckID', true);

            // Thiết lập header cho yêu cầu POST
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            // Gửi yêu cầu đến server với IDPB
            xhr.send('IDPB=' + IDPB);
        }
        else{
            IDPBInput.focus();        
        }
    });

    function validate() {
        // Lấy các phần tử cần validate
        const IDPB = document.getElementById('IDPB');
        const TenPB = document.getElementById('TenPB');
        const MoTa = document.getElementById('MoTa');

        // Lấy các phần tử hiển thị lỗi
        const errorIDPB = document.getElementById('errorIDPB');
        const errorTenPB = document.getElementById('errorTenPB');
        const errorMoTa = document.getElementById('errorMoTa');

        var res = true;
        errorIDPB.style.display = 'none';
        errorTenPB.style.display = 'none';
        errorMoTa.style.display = 'none';

        if (IDPB.value.trim() === '') {
            res = false;
            errorIDPB.style.display = 'block';
        }
        if (TenPB.value.trim() === '') {
            res = false;
            errorTenPB.style.display = 'block';
        }
        if (MoTa.value.trim() === '') {
            res = false;
            errorMoTa.style.display = 'block';
        }
        var span = document.getElementById('checkValid');
        
        <?php
        if($pb){
        echo 'var valid = true;';
        }
        else{
            echo "var valid = false;if (span) valid = span.style.color == 'green'; ";
        }
        ?>
        return res && valid;
    }

    // Sự kiện submit form
    form.addEventListener('submit', e => {
        if (!validate()) {
            document.getElementById('IDPB').focus();
            e.preventDefault(); // Ngăn submit form
        }
    });
</script>

</html>