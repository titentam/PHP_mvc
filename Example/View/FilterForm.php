<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center>
        <form action="C_Student.php" method="post">
            <table>
                <caption>Chọn thông tin tìm kiếm</caption>
                <tr>
                    <td><label for="field">Trường</label></td>
                    <td><select name="field" id="">
                            <option value="id" selected="true">ID</option>
                            <option value="name">Tên</option>
                            <option value="age">Tuổi</option>
                            <option value="university">Trường đại học</option>
                        </select></td>
                </tr>
                <tr>
                    <td><label for="input">Nhập thông tin</label></td>
                    <td><input type="text" name="input" id="" placeholder=""></td>
                </tr>
            </table>
            <input type="submit" value="OK" name="submitFilter">
        </form>
        <a href="../index.html">Go Back</a>
    </center>
</body>

</html>