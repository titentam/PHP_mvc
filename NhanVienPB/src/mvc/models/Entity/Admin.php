<?php
class Admin
{
    public $ID;
    public $Username;
    public $Password;
    
    public function __construct($ID, $Username, $Password)
    {
        $this->ID = $ID;
        $this->Username = $Username;
        $this->Password = $Password;
    }
}