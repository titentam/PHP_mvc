<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin chi tiết sinh viên</title>
</head>
<body>
    <h2>Chi tiết sinh viên</h2>
    <?php
        $student = $data["student"];
        echo '<p><b>'.$student->name.'</b></p>';
        echo '<p>Age : '.$student->age.'</p>';
        echo '<p>University : '.$student->university.'</p><br>';
    ?>
    <br>
    <p><a href="javascript:history.back()">Back</a>
</body>
</html>


