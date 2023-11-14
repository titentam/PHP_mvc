<?php
session_start();
$_SESSION['loggedin']=false;
require_once("Controller.php");
class LoginController extends Controller{
    public function __construct(){
        if(isset($_REQUEST["action"])){
            $action = $_REQUEST["action"];
            $this->$action();
        }
        else
            $this->index();
    }
    public function index(){
        $this->ShowView("login");
    }
    public function processLogin(){
        $username  = $_REQUEST["txtUsername"];
        $password  = $_REQUEST["txtPassword"];
        $model = $this->GetModel("AdminModel");
        if($model->GetAdmin($username, $password)>0){
            $_SESSION['loggedin']=true;
            $this->ShowView("LoginSuccess");
        }
        else{
            $this->ShowView("login",[
                "error"=>1,
            ]);
        }

    }
    public function logout(){
        $_SESSION['loggedin']=false;
        $this->ShowView("login");
    }
    
}

new LoginController();
?>