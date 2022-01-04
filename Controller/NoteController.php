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
class NoteController{
    public function createNote()
    {
        $objCategory = new Category;
        $categories = $objCategory->getAll(); 
        include_once "./Views/note/creatNote.php";
    }
    public function storeNote()
    {
         $required_fields = [
             'category_id' => 'thể loại',
             'name_note' => 'tiêu đề',
             'note_Content' => 'nội dung',
             
         ];
         $_SESSION["errors"] = [];
         $errors = [];
         
         if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
             $category_id        = $_REQUEST['category_id'];
             $name_note          = $_REQUEST['name_note'];
             $note_Content       = $_REQUEST['note_Content'];
             $user_id            = (isset($_SESSION["user"]->id))?$_SESSION["user"]->id:"";
              
             foreach ($required_fields as $field => $label) {
                 if ($_POST[$field] == '') {
                     $errors[$field] = "Vui lòng nhập " . $label;
                     
                 }
              }
                if(count($errors) === 0){
                            if( empty($user_id) ){
                                    $data = new stdClass();
                                    $_SESSION["noteUser"] = [];
                                    $data->name_note      =  $_REQUEST['name_note'];
                                    $data->note_Content   =  $_REQUEST['note_Content'];
                                    $data->name_categories =  $_REQUEST['name_categories'];
                                    $_SESSION["noteUser"][] =  $data;
                
                                    header("location:index.php?home=home");
                            }
                            else{
                                    $data = $_REQUEST;
                                    $data["user_id"] = $user_id;
                                    $userModel = new Note();
                                    $userModel->store($data);
                                    header("location:index.php?home=home");
                                }
                }
                else{
                        if( empty($user_id) ){
                            $data = new stdClass();
                            $_SESSION["noteUser"]   = [];
                            $data->name_note        = $_REQUEST['name_note'];
                            $data->note_Content     = $_REQUEST['note_Content'];
                            $data->name_categories  = $_REQUEST['name_categories'];
                            $_SESSION["noteUser"][] = $data;
                            header("location:index.php?home=home");
                        }else{
                            $_SESSION["errors"] = $errors;
                            header("location:index.php?home=create");
                        }
                    }  


        }
    }
    public function show()
    {
        $id = (isset($_REQUEST["id"])  && !empty($_REQUEST["id"]))?$_REQUEST["id"]:"";
        if(empty($id)){
            header("location:index.php?home=home");
        }
        $nodeModel = new Note();
        $note = $nodeModel->show($id);
        
        include_once "./Views/note/show.php";
    }
    public function edit()
    {
        $id = (isset($_REQUEST["id"])  && !empty($_REQUEST["id"]))?$_REQUEST["id"]:"";
        if(empty($id)){
            header("location:index.php?home=home");
        }
        $nodeModel = new Note();
        $objCategory = new Category;
        $categories = $objCategory->getAll(); 
        $note = $nodeModel->show($id);
        include_once "./Views/note/edit.php";
        
    }
    public function update()
    {
        
        $id = (isset($_REQUEST["id"])  && !empty($_REQUEST["id"]))?$_REQUEST["id"]:"";
        if(empty($id)){
            header("location:index.php?home=home");
        }
        $required_fields = [
            'category_id' => 'thể loại',
            'name_note' => 'tiêu đề',
            'note_Content' => 'nội dung',
            
        ];
        $_SESSION["errors"] = [];
        $errors = [];
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
       {
            $category_id        = $_REQUEST['category_id'];
            $name_note          = $_REQUEST['name_note'];
            $note_Content       = $_REQUEST['note_Content'];
            $user_id            = (isset($_SESSION["user"]->id))?$_SESSION["user"]->id:"";
             
            foreach ($required_fields as $field => $label) {
                if ($_POST[$field] == '') {
                    $errors[$field] = "Vui lòng nhập " . $label;
                    
                }
             }
               if(count($errors) === 0){
                           if( empty($user_id) ){
                                   $data = new stdClass();
                                   $_SESSION["noteUser"] = [];
                                   $data->name_note      =  $_REQUEST['name_note'];
                                   $data->note_Content   =  $_REQUEST['note_Content'];
                                   $data->name_categories =  $_REQUEST['name_categories'];
                                   $_SESSION["noteUser"][] =  $data;
               
                                   header("location:index.php?home=home");
                           }
                           else{
                                   $data = $_REQUEST;
                                   $data["user_id"] = $user_id;
                                   $userModel = new Note();
                                   $userModel->update($id,$data);
                                   header("location:index.php?home=home");
                               }
               }
               else{
                       if( empty($user_id) ){
                          
                           $data = new stdClass();
                           $_SESSION["noteUser"]   = [];
                           $data->name_note        = $_REQUEST['name_note'];
                           $data->note_Content     = $_REQUEST['note_Content'];
                           $data->name_categories  = $_REQUEST['name_categories'];
                           $_SESSION["noteUser"][] = $data;
                           header("location:index.php?home=home");
                       }else{
                        
                           $_SESSION["errors"] = $errors;
                           header("location:index.php?home=create");
                       }
                   }  


       }
    }
    public function deleteShow()
    {
        $id = (isset($_REQUEST["id"])  && !empty($_REQUEST["id"]))?$_REQUEST["id"]:"";
        if(empty($id)){
            header("location:index.php?home=home");
        }
        $nodeModel = new Note();
        $note = $nodeModel->show($id);
        
        include_once "./Views/note/deleteShow.php";
    }
    public function detroy()
    {
        $id = (isset($_REQUEST["id"])  && !empty($_REQUEST["id"]))?$_REQUEST["id"]:"";
        if(empty($id)){
            header("location:index.php?home=home");
        }
        $nodeModel = new Note();
        $noteDelete = $nodeModel->detroy($id);
        header("location:index.php?home=home");

    }
}