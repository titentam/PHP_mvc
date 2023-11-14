<?php
session_start();
require_once("Controller.php");
class NhanVienController extends Controller{
    public function __construct(){
        if(isset($_REQUEST["action"])){
            $action = $_REQUEST["action"];
            $this->$action();
        }
        else
            $this->index();
    }
    public function index(){
        $model = $this->GetModel("NhanVienModel");
        $listNV = $model->GetAllNV();
     
        $this->ShowView("ListNV",[
            "listNV"=>$listNV,
        ]);
    }
    public function insertNV(){

        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"]===false) {
            header("Location: /MVC/NhanVienPB/public/");
        }
        $modelPB = $this->GetModel("PhongBanModel");
        $listPB = $modelPB->GetAllPB();
        $this->ShowView("FormNV",[
            "listPB"=>$listPB,
        ]);
        
    }
    public function deleteNV(){
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"]===false) {
            header("Location: /MVC/NhanVienPB/public/");
        }
        $model = $this->GetModel("NhanVienModel");
        $list = $model->GetAllNV();
        $this->ShowView("ListRecordDelete",[
            "list"=>$list,
        ]);
    }
    public function submitInsertNV(){
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"]===false) {
            header("Location: /MVC/NhanVienPB/public/");
        }
        $model = $this->GetModel("NhanVienModel");
        $idnv = $_POST["IDNV"]; 
        $hoten = $_POST["HoTen"]; 
        $idpb = $_POST["IDPB"]; 
        $diachi = $_POST["DiaChi"]; 
        $record = new NhanVien($idnv,$hoten,$idpb, $diachi);
        
        $model->InsertNV($record);
        $this->index();
    }
    public function submitDelete(){
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"]===false) {
            header("Location: /MVC/NhanVienPB/public/");
        }
        $model = $this->GetModel("NhanVienModel");
        $list = $model->GetAllNV();
        foreach($list as $record){
            if (isset($_REQUEST[$record->IDNV])) {
                $model->DeleteNV($record->IDNV);
            }
        }
        $this->deleteNV();
    }

    public function filterNV(){
        $this->ShowView("FilterNV");
    }
    public function submitFilterNV(){
        $model = $this->GetModel("NhanVienModel");
        $option = $_REQUEST['option'];
        $data = $_REQUEST['data'];
        $listNV = $model->filterNV($option,$data);
        $this->ShowView("ListNV",[
            "listNV"=>$listNV,
        ]);

    }
    public function checkID(){
        $model = $this->GetModel("NhanVienModel");
        $id = $_REQUEST["idnv"];
        if($model->CheckID($id)>0){
            echo json_encode(['message' => 'IDNV đã tồn tại','valid'=>'0']);
        }
        else{
            echo json_encode(['message' => 'IDNV hợp lệ','valid'=>'1']);
        }
    }
}
$nvctrl = new NhanVienController();

?>