<?php
require_once ("E_Student.php");
require_once ("../Core/DB.php");
class M_Student extends DB {
    public function getAllStudents() {
        $sql = "select * from sinhvien";
        $rs = mysqli_query($this->con, $sql);
        $i =0;
        while ($row = mysqli_fetch_array($rs)) {
            $id = $row["ID"];
            $name = $row["Name"];
            $age = $row["Age"];
            $university = $row["University"];
            while ($i!=$id) $i++;
            $students[$i++]= new E_Student($id, $name, $age, $university); 
        }
        return $students;
    }
    public function getStudentDetail($id) {
        $allStudent = $this->getAllStudents();
        return $allStudent[$id];
    }
    public function insertStudent(E_Student $student) {
        $stmt = $this->con->prepare("INSERT INTO sinhvien (ID, Name, Age, University) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isis", $student->id, $student->name, $student->age, $student->university);
        return $stmt->execute();
    }

    public function updateStudent(E_Student $student){
        $stmt = $this->con->prepare("UPDATE sinhvien SET Name = ?, Age = ?, University = ? WHERE ID = ?");
        $stmt->bind_param("sssi", $student->name, $student->age, $student->university, $student->id);
        $result = $stmt->execute();
        return $result;
    }
    public function deleteStudent($stid) {
        $stmt = $this->con->prepare("DELETE FROM sinhvien WHERE ID = ?");
        $stmt->bind_param("i", $stid);
        $result = $stmt->execute();
        return $result;
    }

    public function filterStudents($field, $value)
    {
       
        if ($field !== 'id')
            $query = "SELECT * FROM `sinhvien` WHERE " . $field . " LIKE '%" . $value . "%'";
        else
            $query = "SELECT * FROM `sinhvien` WHERE " . $field . " LIKE " . $value . "";

        //echo $query;
        $result = mysqli_query($this->con, $query);
        $i = 0;

        $students = new ArrayObject();

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["ID"];
            $age = $row["Age"];
            $name = $row["Name"];
            $university = $row["University"];

            $students[++$i] = new E_Student($id, $name, $age, $university);
        }
        return $students;
    }
    
}

?>