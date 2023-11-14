<?php
// session_start();
// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === false){
//     header("Location: login.php");
//     exit;
// }
$list = $data["list"];

if (isset($_GET['success'])) {
    echo '<div style="color:green">Xóa nhân viên thành công</div> <br>';
}
if (isset($_GET['error'])) {
    echo '<div style="color:red">Xóa nhân viên thất bại</div> <br>';
}
echo '<form id="myForm" method="post" action="NhanVienController.php?action=submitDelete">';
echo '<table border="1" width="100%">';
echo '<caption>Dữ liệu truy xuất từ bảng nhân viên</caption>';
echo '<tr><th>Mã số</th><th>Họ tên</th><th>Phòng ban</th><th>Địa chỉ</th><th>Xóa</th></tr>';

foreach ($list as $record) {
    echo '<tr>';
    echo '<td>' . $record->IDNV . '</td>';
    echo '<td>' . $record->HoTen . '</td>';
    echo '<td>' . $record->IDPB . '</td>';
    echo '<td>' . $record->DiaChi . '</td>';
    echo '<td><input type="checkbox" name="'.$record->IDNV.'" value="'.$record->IDNV.'"></td>';
    echo '</tr>';
}

echo '</table>';
echo '<input type="submit" value="Xóa">';
echo '<input id="btnXoaAll" type="submit" value="Xóa tất cả">';
echo '</form>';

?>
<script>
    var btnXoaAll =document.getElementById('btnXoaAll');
    btnXoaAll.addEventListener('click', function() {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        var form = document.getElementById('myForm');

        // Đánh dấu tất cả các checkbox
        checkboxes.forEach(function(checkbox) {
        checkbox.checked = true;
        });
        form.submit();
    
});
</script>