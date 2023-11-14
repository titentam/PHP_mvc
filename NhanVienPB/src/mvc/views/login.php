<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function reloadFrame() {
            // Lấy tham chiếu đến frame 2
            var frame2 = parent.frames['ListFuntion'];

            // Kiểm tra xem frame 2 có tồn tại không
            if (frame2) {
                // Tải lại frame 2
                frame2.location.reload();
            }
        }
        window.onload = function() {
            reloadFrame();
        };
    </script>
</head>

<body style="background-color: rgb(238, 77, 44);">
    <center>
        <form name="formLogin" method="post" action="LoginController.php?action=processLogin">
            <table name="table1">
                <tr>
                    <label for>Login</label>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="txtUsername">
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="txtPassword">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="btnOK" value="OK" onclick=ClickOk()>
                    </td>
                    <td>
                        <input type="reset" name="btnReset" value="Reset" onclick="ClickReset()">
                    </td>
                </tr>
            </table>
            <?php
            if (isset($data['error'])) {
                echo '<p style="color:red">Tài khoản và mật khẩu không đúng</p>';
            }
            ?>
        </form>
    </center>

</body>
<script>

    document.querySelector('form').addEventListener('submit', e => {
        if (!CheckValid()) {
            e.preventDefault(); // Ngăn submit form
        }
    });
    function RemoveError() {
        var rowToDelete = document.getElementById('errorRow');
        if (rowToDelete) {
            var table = document.querySelector('table');
            table.removeChild(rowToDelete);
        }
    }
    function InformError(error) {
        var table = document.querySelector('table');

        var newRow = document.createElement('tr');
        newRow.id = "errorRow";

        var newCell = document.createElement('td');
        newCell.colSpan = "2";

        newCell.style.textAlign = "center";

        var errorSpan = document.createElement('span');
        errorSpan.id = "lblErr";
        errorSpan.style.color = "Red";
        errorSpan.style.fontWeight = "bold";

        errorSpan.innerHTML = error;

        newCell.appendChild(errorSpan);

        newRow.appendChild(newCell);

        table.appendChild(newRow);
    }
    function CheckValid() {
        var res = true;
        RemoveError();
        var txtUsername = document.getElementsByName('txtUsername')[0].value;
        var txtPassword = document.getElementsByName('txtPassword')[0].value;

        if (!txtUsername && !txtPassword) {
            InformError('Username and Password not empty');
            res = false;
        }
        else if (!txtUsername) {
            InformError('Username not empty');
            res = false;
        }
        else if (!txtPassword) {
            InformError('Password not empty');
            res = false;
        }
        return res;
    }
    function ClickOk() {

        RemoveError();
        var txtUsername = document.getElementsByName('txtUsername')[0].value;
        var txtPassword = document.getElementsByName('txtPassword')[0].value;

        if (!txtUsername && !txtPassword) {
            InformError('Username and Password not empty');

        }
        else if (!txtUsername) {
            InformError('Username not empty');
        }
        else if (!txtPassword) {
            InformError('Password not empty');
        }
        else {
            document.formLogin.submit();
        }
    }
</script>

</html>