<?php
namespace Controller;
error_reporting(-1);
ini_set('display_errors', 'On');
include_once "./Models/User.php";
use Models\User;


class UserController{
    public function register()
    {
        include_once "./Views/user/register.php";
    }
    public function HandleRegister()
    {
        $required_fields = [
            'name' => 'tên',
            'email' => 'email',
            'password' => 'mật khẩu',
            'numberPhone' => 'số điện thoại',
        ];
        $_SESSION["errors"] = [];
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            $name        = $_REQUEST['name'];
            $email       = $_REQUEST['email'];
            $password    = $_REQUEST['password'];
            $numberPhone = $_REQUEST['numberPhone'];

            foreach ($required_fields as $field => $label) {
                if ($_POST[$field] == '') {
                    $errors[$field] = "Vui lòng nhập " . $label;
                }
             }
            if(count($errors) === 0){
                    $data = $_REQUEST;
                    $userModel = new User();
                    $userModel->store($data,$errors);
                   
            }
            else{
                $_SESSION["errors"] = $errors;
             
                header("location:index.php?users=register");
            }
        }

    }
    public function login()
    {
        include_once "./Views/user/login.php";
    }
    public function handleLogin()
    {
        $required_fields = [
            'email' => 'email',
            'password' => 'mật khẩu',
           
            
        ];
        $_SESSION["errors"] = [];
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
          
            $email       = $_REQUEST['email'];
            $password    = $_REQUEST['password'];
          

            foreach ($required_fields as $field => $label) {
                if ($_POST[$field] == '') {
                    $errors[$field] = "Vui lòng nhập " . $label;
                }
             }
            if(count($errors) === 0){
                    $data = $_REQUEST;
                    $userModel = new User();
                    $userModel->handleLogin($data,$errors);
            }
            else{
                $_SESSION["errors"] = $errors;
                header("location:index.php?users=login");

            }
        }
        
    }
    public function show()
    {
        $id = (isset($_REQUEST["id"])  && !empty($_REQUEST["id"]))?$_REQUEST["id"]:"";
        if(empty($id)){
            header("location:index.php?home=home");
        }
        $userModel = new User();

        $user = $userModel->show($id);
        include_once "./Views/user/show.php";
    }
    public function logout()
    {
        unset($_SESSION['user']);
        header("location:index.php?home=home");

    }
    public function edit()
    {

        $id = (isset($_REQUEST["id"])  && !empty($_REQUEST["id"]))?$_REQUEST["id"]:"";
        if(empty($id)){
            header("location:index.php?home=home");
        }
      
            $userModel = new User();

            $user = $userModel->show($id);
            include_once "./Views/user/edit.php";
        
       
     
    }
    public function update()
    {

        $id = (isset($_REQUEST["id"])  && !empty($_REQUEST["id"]))?$_REQUEST["id"]:"";
        if(empty($id)){
            header("location:index.php?home=home");
        }
    
        $required_fields = [
            'name' => 'tên',
            'email' => 'email',
            'password' => 'mật khẩu',
            'numberPhone' => 'số điện thoại',
        ];
        $_SESSION["errors"] = [];
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            $name        = $_REQUEST['name'];
            $email       = $_REQUEST['email'];
            $password    = $_REQUEST['password'];
            $numberPhone = $_REQUEST['numberPhone'];

            foreach ($required_fields as $field => $label) {
                if ($_POST[$field] == '') {
                    $errors[$field] = "Vui lòng nhập " . $label;
                }
            }
            if(count($errors) === 0){
                    $data = $_REQUEST;
                    $userModel = new User();
                    $userModel->update($data,$id);
                    $user = $userModel->show($id);
                    $_SESSION["user"] = $user;
                    header("location: index.php?home=home");

            }
            else{
                $_SESSION["errors"] = $errors;
                $_SESSION["old"]    = $_REQUEST;
                header("location:index.php?users=edit&&id=".$id);
            }
        }
                                                                                                                
   
    }
    public function deleteShow()
    {
        $id = (isset($_REQUEST["id"])  && !empty($_REQUEST["id"]))?$_REQUEST["id"]:"";
        if(empty($id)){
            header("location:index.php?home=home");
        }
        $userModel = new User();

        $user = $userModel->show($id);
        include_once "./Views/user/deleteShow.php";
    }
    public function delete()
    {
        $id = (isset($_REQUEST["id"])  && !empty($_REQUEST["id"]))?$_REQUEST["id"]:"";
        if(empty($id)){
            header("location:index.php?home=home");
        }
        $userModel = new User();
        $user = $userModel->delete($id);
        header("location: index.php?staffs=index");
    }
   public function index()
   {
    $middleWare = new Middleware();
    $middleWare->checkStaff();
    $userModel = new User();
    $users     = $userModel->getAll();
    include_once "./Views/user/index.php";
   }
}