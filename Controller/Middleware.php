<?php
namespace Controller;
class Middleware{
    public function checkStaff()
    {
       
        $user = $_SESSION["user"];
        if(empty($user)){
            header("location: index.php?home=home");
            die();
        }
        if( $_SESSION["user"]->position == "giám đốc" || $_SESSION["user"]->position == "nhân viên"){
        } 
        else{
            header("location: index.php?home=home");
            die();
        }
    }public function checkLeader()
    {
        $user = $_SESSION["user"];
        if(empty($user)){
            header("location: index.php?home=home");
            die();
        }
        if($_SESSION["user"]->position == "giám đốc")    {

        }
        else{
            header("location: index.php?home=home");
            die();
        }
    }
}
