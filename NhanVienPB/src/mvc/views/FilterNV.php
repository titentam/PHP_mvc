<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>

<body>
    <form action="NhanVienController.php?action=submitFilterNV" method="post">
        <p>Chọn lựa chọn tìm kiếm:</p>
        <input type="radio" id="IDNV" name="option" value="IDNV">
        <label for="IDNV">ID nhân viên</label><br>

        <input type="radio" id="HoTen" name="option" value="HoTen">
        <label for="HoTen">Họ tên</label><br>

        <input type="radio" id="IDPB" name="option" value="IDPB">
        <label for="IDPB">ID phòng ban</label><br>

        <input type="radio" id="DiaChi" name="option" value="DiaChi">
        <label for="DiaChi">Địa chỉ</label><br>
        <div id="errorOption" style="display:none;color:red">Vui lòng chọn lựa chọn</div>  <br>  

        <label for="">Nhập dữ liệu</label><br>
        <input type="text" id="data" name="data">
        <div id="errorData" style="display:none;color:red">Vui lòng nhập dữ liệu</div>  <br>

        <input type="submit" value="Submit">
        
    </form>
</body>
<script>
        // Lấy phần tử form
    const form = document.querySelector('form');
    
    function validate(){
        // Lấy các phần tử cần validate
        const option = document.querySelector('input[name="option"]:checked');
        const data = document.getElementById('data');

        // Lấy các phần tử hiển thị lỗi
        const errorOption = document.getElementById('errorOption');
        const errorData = document.getElementById('errorData');

        var res = true;
        errorOption.style.display = 'none';
        errorData.style.display = 'none';
        
        if(option == null){
            res = false;
            errorOption.style.display = 'block';
        }  
        
        if(!data.value){
            res = false;
            errorData.style.display = 'block';
        }  
        
        return res;
    }
    
    // Sự kiện submit form
    form.addEventListener('submit', e => {
        if (!validate()) {
            e.preventDefault(); // Ngăn submit form
        }
    });
</script>   
</html>