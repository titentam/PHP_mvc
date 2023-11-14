<?php
require_once("../core/DB.php");
require_once("Entity/PhongBan.php");
class PhongBanModel extends DB{
    public function GetAllPB(){
        $query = "Select * from phongban";
        $rs = mysqli_query($this->con, $query);
        $list =array();
        while($row = mysqli_fetch_array($rs)){
            $record = new PhongBan($row["IDPB"], $row["TenPB"], $row["MoTa"]);
            array_push($list, $record);
        }
        
        return $list;
    }
    public function GetPBById($idpb){
        $query = "Select * from phongban where IDPB = '$idpb'";
        $rs = mysqli_query($this->con, $query);
        while($row = mysqli_fetch_array($rs)){
            $record = new PhongBan($row["IDPB"], $row["TenPB"], $row["MoTa"]);
            return $record;
        }
    }
    public function InsertPB(PhongBan $pb) {
        $id = mysqli_real_escape_string($this->con, $pb->IDPB);
        $ten = mysqli_real_escape_string($this->con, $pb->TenPB);
        $mota = mysqli_real_escape_string($this->con, $pb->MoTa);
        

        $query = "INSERT INTO phongban (IDPB, TenPB, MoTa)
                  VALUES ('$id', '$ten', '$mota')";
            
        return mysqli_query($this->con, $query);
    }
    public function UpdatePB(PhongBan $pb) {
        $id = mysqli_real_escape_string($this->con, $pb->IDPB);
        $ten = mysqli_real_escape_string($this->con, $pb->TenPB);
        $mota = mysqli_real_escape_string($this->con, $pb->MoTa);
    
        $query = "UPDATE phongban SET TenPB = '$ten', MoTa = '$mota' WHERE IDPB = '$id'";
        
        $result = mysqli_query($this->con, $query);
        
        return $result;
    }
    public function CheckID($id) {
        $query = "SELECT * FROM phongban WHERE IDPB = '$id'";
        $result = mysqli_query($this->con, $query);
        $row_count = mysqli_num_rows($result);
        return $row_count;
    }
    
}

?>