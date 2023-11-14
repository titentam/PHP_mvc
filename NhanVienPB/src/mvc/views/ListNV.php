<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $idpb = isset($data["idpb"])? $data["idpb"]:null;
    ?>
    <table border="1" width="100%">
        <caption>Danh sách nhân viên <?php echo $idpb?"trong IDPB = $idpb": '' ?></caption>
        <tr>
            <th>Mã số</th>
            <th>Họ tên</th>
            <th>Phòng ban</th>
            <th>Địa chỉ</th>
        </tr>
        <tbody>
            <?php
            $listNV = $data["listNV"];
            foreach ($listNV as $nv){
                echo '<tr><td>'.$nv->IDNV.'</td><td>'.$nv->HoTen.'</td><td>'.$nv->IDPB.'</td><td>'.$nv->DiaChi.'</td></tr>';
            }
            ?>
        </tbody>
       
    </table>
    <a href="/MVC/NhanVienPB/public/">Home</a>
</body>
</html>