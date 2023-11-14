<?php
require_once("../core/DB.php");
require_once("Entity/Admin.php");

class AdminModel extends DB{
    public function GetAdmin($username, $password){
        $query = "Select * from Admin where Username = '$username' and Password = '$password'";
        $result = mysqli_query($this->con, $query);
        $result = mysqli_query($this->con, $query);
        $row_count = mysqli_num_rows($result);
        return $row_count;
    }

}

?>