<?php
namespace Controller;
error_reporting(-1);
ini_set('display_errors', 'On');
include_once "./Models/Note.php";
include_once "./Models/Category.php";
use Models\Category;
use Models\Model;
use Models\Note;
use stdClass;

class HomeController{
   public function home()
   {
      
        $objCategory = new Category;
        $categories = $objCategory->getAll(); 
        $noteModel  = new Note;
        if(isset($_SESSION["user"]->id)){

        $user_id    = $_SESSION["user"]->id;

        }else{

            $user_id = "";
        }
        if(empty($user_id)){
            if( isset($_SESSION["noteUser"]))
            {
               $noteUser = $_SESSION["noteUser"];
            }else{
                $noteUser = [];
            }
           
        }else{
            $noteUser   = $noteModel->NoteUser($user_id);
          
        }
       
     
        include_once "./Views/home/home.php";
   }
   

}