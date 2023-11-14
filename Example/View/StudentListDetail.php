<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
</head>
<body>
    <h2>Danh sách sinh viên</h2>
    <?php
    $studentList = $data["studentList"];
    $method = $data["method"];

    foreach ($studentList as $student) {
        if($method){
            echo '<a href="../Controller/C_Student.php?method='.$method.'&stid='.$student->id.'"> <b>'.$student->name.'</b> </a>';
        }
        else{
            echo "<b>$student->name</b>";
        }
        
        echo '<p>Age : '.$student->age.'</p>';
        echo '<p>University : '.$student->university.'</p><br>';
    }
    ?>
    <br>
    <p><a href="../index.html">Home page</a>
</body>
</html>

