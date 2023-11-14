<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert student</title>
</head>
<body>
    <center>
        <?php

            $student = isset($data["student"]) ? $data["student"] : null;
            
            $nameBtn = $data["nameBtn"];
            $tableName = $data["tableName"];
        ?>
        <form action="C_Student.php" method="post"> 
            <table>
                <thead style="text-align: center;">
                    <tr>
                        <th><?php echo $tableName  ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            ID:
                        </td>
                        <td>
                            <input type="number" name="id" value="<?php echo $student ? $student->id : '' ?>" <?php echo $student ? "readonly": "" ?>>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Name:
                        </td>
                        <td>
                            <input type="text" name="name" value="<?php echo $student ? $student->name : '' ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Age:
                        </td>
                        <td>
                            <input type="text" name="age" value="<?php echo $student ? $student->age : '' ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            University:
                        </td>
                        <td>
                            <input type="text" name="university" value="<?php echo $student ? $student->university : '' ?>">
                        </td>
                    </tr>
                </tbody>
                
            </table>
            <input type="submit" name="<?php echo $nameBtn ?>" value="OK" >
            <input type="reset" name="btnReset" value="Reset" >
            <p><a href="../index.html">Home page</a>
        </form>
    </center>
    
</body>
</html>