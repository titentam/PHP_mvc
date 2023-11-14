<?php
require_once ("../Core/BaseController.php");
class C_Student extends BaseController{
    private $modelStudent;
    public function __construct(){
        $GLOBALS["modelStudent"] = $this->model("M_Student");
    }
    public function invoke(){ 
        if(isset($_GET["method"])){
            $method = $_GET["method"];
            if($method==="insert"){
                $this->view("StudentForm",[
                    "nameBtn"=> "submitInsert",
                    "tableName"=>"Chèn sinh viên",
                ]);
            } 
            else if($method=== "update"){
                $student = $GLOBALS["modelStudent"]->getStudentDetail($_GET["stid"]);
                
                $this->view("StudentForm",[
                    "nameBtn"=> "submitUpdate",
                    "tableName"=>"Cập nhật sinh viên",
                    "student"=>$student,
                ]);
            }
            else if($method=== "delete"){
                $rs = $GLOBALS["modelStudent"]->deleteStudent($_GET["stid"]);
                
                if($rs){
                    $this->DisplayListStudentDetail("delete");
                }
                
            }
            else if($method=== "search"){
                $this->view("FilterForm");
            }
            else if($method=== "list_update"){
                $this->DisplayListStudentDetail("update");
            }
            else if($method=== "list_delete"){
                $this->DisplayListStudentDetail("delete");
            }
            
            
        }
        else if(isset($_POST["submitInsert"])){

            $res = $GLOBALS["modelStudent"]->insertStudent(new E_Student($_REQUEST["id"], $_REQUEST["name"],$_REQUEST["age"],$_REQUEST["university"]));
            if($res){
                $this->DisplayAll();
            }   
        }
        else if(isset($_POST["submitUpdate"])){

            $res = $GLOBALS["modelStudent"]->updateStudent(new E_Student($_REQUEST["id"], $_REQUEST["name"],$_REQUEST["age"],$_REQUEST["university"]));
            if($res){
                
                $studentList = $GLOBALS["modelStudent"]->getAllStudents();
                $this->view("StudentListDetail",[
                    "studentList"=>$studentList,
                    "method"=> "update",
                ]);

            }   
        }
        else if(isset($_POST["submitFilter"])){
            $studentList = $GLOBALS["modelStudent"]->filterStudents($_REQUEST['field'], $_REQUEST['input']);
            if (sizeof($studentList) > 0) {
                $this->view("StudentListDetail",[
                    "studentList"=>$studentList,
                    "method"=>null,
                ]);
            } else {
                echo 'Bug ha';
            }
        }
        else{
            if(isset($_GET["stid"])){
                $student = $GLOBALS["modelStudent"]->getStudentDetail($_GET["stid"]);
                $this->displayStudent($student);
            }
            else{
                $this->DisplayAll();
                
            }
        }

    }

    private function DisplayAll(){
        $studentList = $GLOBALS["modelStudent"]->getAllStudents();
        $this->view("StudentList", [
            "studentList"=>$studentList,
        ]);
    }
    private function displayStudent($student){
        $this->view("StudentDetail", [
            "student"=>$student,
        ]);
    }
    private function DisplayListStudentDetail($method){
        $studentList = $GLOBALS["modelStudent"]->getAllStudents();
        $this->view("StudentListDetail",[
            "studentList"=>$studentList,
            "method"=>$method,
        ]);
    }
}
$C_Student = new C_Student();
$C_Student->invoke();

?>