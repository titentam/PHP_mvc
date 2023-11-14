<?php
class Controller{

    public function GetModel($model){
        require_once "../models/".$model.".php";
        return new $model;
    }

    public static function ShowView($view, $data=[]){
        require_once "../views/".$view.".php";
    }

}
?>