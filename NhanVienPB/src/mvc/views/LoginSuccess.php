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

<body>
    <h1>Đăng nhập thành công</h1>
    <form action="LoginController.php?action=logout">
        <input type="submit" value="Logout">
    </form>
</body>

</html>