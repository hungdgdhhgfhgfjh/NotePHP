<?php
namespace Controller;
include_once "./Models/Staff.php";
include_once "./Controller/Middleware.php";
use Models\Staff;
use Controller\Middleware;
class StaffController{
    public function index()
    {
        $middleWare = new Middleware();
        $middleWare->checkStaff();
      
       
        $StaffModel = new Staff();
        $staffs     = $StaffModel->getAll();
        include_once "./Views/staffs/index.php";
    }
    public function create()
    {
       
        $middleWare = new Middleware();
        $middleWare->checkLeader();
        include_once "./Views/staffs/create.php";
    }
    public function store()
    {
        $middleWare = new Middleware();
        $middleWare->checkLeader();
        $required_fields = [
            "position"=>"chức vụ",
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
            $position    = $_REQUEST["position"];
            foreach ($required_fields as $field => $label) {
                if ($_POST[$field] == '') {
                    $errors[$field] = "Vui lòng nhập " . $label;
                }
             }
            if(count($errors) === 0){
                    $data = $_REQUEST;
                    $StaffModel = new Staff();
                    $StaffModel->store($data,$errors);
                    header("location:index.php?staffs=index");
            }
            else{
                $_SESSION["errors"] = $errors;
                header("location:index.php?staffs=index");
            }
        }
    }
    public function edit()
    {
        $middleWare = new Middleware();
        $middleWare->checkLeader();
        $id = (isset($_REQUEST["id"])  && !empty($_REQUEST["id"]))?$_REQUEST["id"]:"";
        if(empty($id)){
            header("location:index.php?home=home");
        } 
    
        $staffModel = new Staff();

        $staff = $staffModel->show($id); 
        include_once "./Views/staffs/edit.php";
    }
    public function update()
    {
        $middleWare = new Middleware();
        $middleWare->checkLeader();
        $id = (isset($_REQUEST["id"])  && !empty($_REQUEST["id"]))?$_REQUEST["id"]:"";
        if(empty($id)){
            header("location:index.php?home=home");
        }

        $required_fields = [
            "position"=>"chức vụ",
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
            $position    = $_REQUEST["position"];
            foreach ($required_fields as $field => $label) {
                if ($_POST[$field] == '') {
                    $errors[$field] = "Vui lòng nhập " . $label;
                }
             }
            if(count($errors) === 0){
                    $data = $_REQUEST;
                    $staffModel = new Staff();
                    $staffModel->update($data,$id);
                    $staff = $staffModel->show($id);
                  
                    header("location: index.php?staffs=index");

            }
            else{
                $_SESSION["errors"] = $errors;
                header("location:index.php?staffs=edit&&id=".$id);
            }
        }
    }
    public function deleteShow()
    {
        $middleWare = new Middleware();
        $middleWare->checkLeader();
        $id = (isset($_REQUEST["id"])  && !empty($_REQUEST["id"]))?$_REQUEST["id"]:"";
        if(empty($id)){
            header("location:index.php?home=home");
        }

        $staffModel = new Staff();
        $staff = $staffModel->show($id); 
        include_once "./Views/staffs/deleteShow.php";
        
    }
    public function delete()
    {
        $middleWare = new Middleware();
        $middleWare->checkLeader();
        $id = (isset($_REQUEST["id"])  && !empty($_REQUEST["id"]))?$_REQUEST["id"]:"";
        if(empty($id)){
            header("location:index.php?home=home");
        }
        
        $staffModel = new Staff();
        $staff = $staffModel->delete($id);
        header("location: index.php?staffs=index");

    }
    public function show()
    {
        $middleWare = new Middleware();
        $middleWare->checkStaff();
        $id = (isset($_REQUEST["id"])  && !empty($_REQUEST["id"]))?$_REQUEST["id"]:"";
        if(empty($id)){
            header("location:index.php?home=home");
        }
        $staffModel = new Staff();
        $staff = $staffModel->show($id); 
        include_once "./Views/staffs/deleteShow.php";
    }
}