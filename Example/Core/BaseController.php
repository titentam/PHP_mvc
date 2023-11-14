<?php
class BaseController{

    public function model($model){
        require_once "../Model/".$model.".php";
        return new $model;
    }

    public function view($view, $data=[]){
        require_once "../View/".$view.".php";
    }

}
?>