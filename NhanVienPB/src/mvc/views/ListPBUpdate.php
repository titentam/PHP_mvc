<?php

    echo '<table border="1" width="100%">';
    echo '<caption>Dữ liệu truy xuất từ bảng phòng ban</caption>';
    
    echo '<tr><th>Mã số</th><th>Tên phòng ban</th><th>Mô tả</th><th>Xem NV</th></tr>';

    $list = $data['list'];
    foreach($list as $record){
        echo '<tr><td>'.$record->IDPB.'</td><td>'.$record->TenPB.'</td><td>'.$record->MoTa.'</td><td><a href="PhongBanController.php?action=updatePB&idpb='.urlencode($record->IDPB).'">Cập nhật</a></td></tr>';
    }
    echo '</table>';
    
?>
<a href="/MVC/NhanVienPB/public/">Home</a>


