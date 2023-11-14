<?php
require_once("../core/DB.php");
require_once("Entity/NhanVien.php");
class NhanVienModel extends DB{
    public function GetAllNV(){
        $query = "Select * from nhanvien";
        $rs = mysqli_query($this->con, $query);
        $listNV =array();
        while($row = mysqli_fetch_array($rs)){
            $nv = new NhanVien($row["IDNV"], $row["HoTen"], $row["IDPB"],$row["DiaChi"]);
            array_push($listNV, $nv);
        }
        return $listNV;
    }
    public function GetListNVByIDPB($idpb){
        $query = "Select * from nhanvien where IDPB = '$idpb'";
        $rs = mysqli_query($this->con, $query);
        $listNV =array();
        while($row = mysqli_fetch_array($rs)){
            $nv = new NhanVien($row["IDNV"], $row["HoTen"], $row["IDPB"],$row["DiaChi"]);
            array_push($listNV, $nv);
        }
        return $listNV;
    }
    public function InsertNV(NhanVien $nv) {
        $id = mysqli_real_escape_string($this->con, $nv->IDNV);
        $hoTen = mysqli_real_escape_string($this->con, $nv->HoTen);
        $idPB = mysqli_real_escape_string($this->con, $nv->IDPB);
        $diaChi = mysqli_real_escape_string($this->con, $nv->DiaChi);
    
        $query = "INSERT INTO nhanvien (IDNV, HoTen, IDPB, DiaChi)
                  VALUES ('$id', '$hoTen', '$idPB', '$diaChi')";
            
        return mysqli_query($this->con, $query);
    }
    public function DeleteNV($id){
        $query = "Delete from nhanvien where IDNV ='$id'";
        return mysqli_query($this->con, $query);
    }
    public function filterNV($option, $data){
        $query = "SELECT * FROM nhanvien where $option = '$data'";
        $rs = mysqli_query($this->con,$query);
        $listNV =array();
        while($row = mysqli_fetch_array($rs)){
            $nv = new NhanVien($row["IDNV"], $row["HoTen"], $row["IDPB"],$row["DiaChi"]);
            array_push($listNV, $nv);
        }
        return $listNV;

    }
    public function CheckID($id) {
        $query = "SELECT * FROM nhanvien WHERE IDNV = '$id'";
        $result = mysqli_query($this->con, $query);
        $row_count = mysqli_num_rows($result);
        return $row_count;
    }
}

?>