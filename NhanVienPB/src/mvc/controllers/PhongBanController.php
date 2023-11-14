<?php
session_start();
require_once("Controller.php");

class PhongBanController extends Controller{
    public function __construct(){
        if(isset($_REQUEST["action"])){
            $action = $_REQUEST["action"];
            $this->$action();
        }
        else
            $this->index();
    }
    public function index(){
        $model = $this->GetModel("PhongBanModel");
        $list = $model->GetAllPB();
        $this->ShowView("ListPB",[
            "list"=>$list,
        ]);
    }
    public function listPBUpdate(){
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"]===false) {
            header("Location: /MVC/NhanVienPB/public/");
        }
        $model = $this->GetModel("PhongBanModel");
        $list = $model->GetAllPB();
        $this->ShowView("ListPBUpdate",[
            "list"=>$list,
        ]);
    }
    public function insertPB(){
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"]===false) {
            header("Location: /MVC/NhanVienPB/public/");
        }
        $this->ShowView("FormPB",[
            "action"=>'submitInsertPB',
        ]);
    }
    
    public function updatePB(){
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"]===false) {
            header("Location: /MVC/NhanVienPB/public/");
        }
        $idpb = $_REQUEST["idpb"];
        $model = $this->GetModel('PhongBanModel');
        $pb = $model->GetPBById($idpb);

        $this->ShowView("FormPB",[
            "pb"=>$pb,
            "action"=>'submitUpdatePB',
        ]);
    }
    public function submitInsertPB(){
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"]===false) {
            header("Location: /MVC/NhanVienPB/public/");
        }
        $model = $this->GetModel("PhongBanModel");

        $idpb = $_POST["IDPB"]; 
        $ten= $_POST["TenPB"]; 
        $mota = $_POST["MoTa"]; 

        $record = new PhongBan($idpb,$ten,$mota);
    
        $model->InsertPB($record);
        $this->index();
    }
    public function submitUpdatePB(){
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"]===false) {
            header("Location: /MVC/NhanVienPB/public/");
        }
        $model = $this->GetModel("PhongBanModel");

        $idpb = $_POST["IDPB"]; 
        $ten= $_POST["TenPB"]; 
        $mota = $_POST["MoTa"]; 

        $record = new PhongBan($idpb,$ten,$mota);
    
        $model->UpdatePB($record);
        $this->listPBUpdate();
    }
    public function listNVPB(){
        $idpb = $_REQUEST["idpb"];
        $model = $this->GetModel("NhanVienModel");
        $listNV = $model->GetListNVByIDPB($idpb);
        $this->ShowView("ListNV",[
            "listNV"=>$listNV,
            "idpb"=>$idpb,
        ]);
    }

   
    public function checkID(){
        $model = $this->GetModel("PhongBanModel");
        $id = $_REQUEST["IDPB"];
        if($model->CheckID($id)>0){
            echo json_encode(['message' => 'IDPB đã tồn tại','valid'=>'0']);
        }
        else{
            echo json_encode(['message' => 'IDPB hợp lệ','valid'=>'1']);
        }
    }
}
$nvctrl = new PhongBanController();

?>