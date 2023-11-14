<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: rgb(255, 123, 47);">
    <table>
        <thead>
            <tr>
                <th>
                    <a href="/MVC/NhanVienPB/public/" target="_parent">Trang chủ</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <a href="../../controllers/NhanVienController.php?action=filterNV" target="MainContent">Tìm kiếm nhân viên</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="../../controllers/NhanVienController.php" target="MainContent">Xem thông tin nhân viên</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="../../controllers/PhongBanController.php" target="MainContent">Xem thông tin phòng ban</a>
                </td>
            </tr>
            <?php
                if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']===true){
                    echo    '<tr>
                                <td>
                                    <a href="../../controllers/NhanVienController.php?action=insertNV" target="MainContent">Thêm nhân viên</a>
                                </td>
                            </tr>';
                    echo    '<tr>
                                <td>
                                    <a href="../../controllers/PhongBanController.php?action=insertPB" target="MainContent">Thêm phòng ban</a>
                                </td>
                            </tr>';
                    echo    '<tr>
                                <td>
                                    <a href="../../controllers/PhongBanController.php?action=listPBUpdate" target="MainContent">Cập nhật phòng ban</a>
                                </td>
                            </tr>';
                    echo    '<tr>
                                <td>
                                    <a href="../../controllers/NhanVienController.php?action=deleteNV" target="MainContent">Xóa nhân viên</a>
                                </td>
                            </tr>';
                }
            ?>

            
        </tbody>
    </table>

</body>
</html>

