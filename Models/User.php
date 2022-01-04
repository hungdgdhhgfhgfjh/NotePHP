<?php
namespace Models;
error_reporting(-1);
ini_set('display_errors', 'On');
include_once "database.php";

use Exception;
use Models\Model; 
use PDO;
class User extends Model{
    public function store($data,$errors)
    {
        try   {
                $sql  = "INSERT INTO `users` (`id`, `name`, `email`, `password`, `numberPhone`) VALUES (NULL, '".$data["name"]."', '".$data["email"]."', '".$data["password"]."', '".$data["numberPhone"]."');";
                $result = $this->_db->query($sql);

               

                if (!$result)
                    {
                        throw new Exception();
                        
                        $error = 'registration failed !';
                    }
           
              } 
        catch (Exception $e)
             {
              $error = 'registration failed !';
              $sql  = "SELECT * FROM users WHERE email = '".$data["email"]."'";
              $stmt = $this->_db->query($sql);
              $stmt->setFetchMode(PDO::FETCH_OBJ);
              $checkEmail = $stmt->fetch();
              if(!empty($checkEmail)){
                 $errors["issetEmail"] = "email của bạn đã tồn tại";
              }
              $sql  = "SELECT * FROM users WHERE numberPhone = '".$data["numberPhone"]."'";
              $stmt = $this->_db->query($sql);
              $stmt->setFetchMode(PDO::FETCH_OBJ);
              $checkPhone = $stmt->fetch();
              if(!empty($checkPhone)){
                 $errors["issetPhone"] = "số điện thoại của bạn đã tồn tại";
              }
              $_SESSION['errors'] = $errors;
              $_SESSION["old"] = $_REQUEST;
              header("location:index.php?users=register");

             }  
    }
    public function handleLogin($data,$errors)
    {
        $sql    = "SELECT * FROM `users` WHERE email  = '".$data["email"]."' AND password ='".$data["password"]."'";

        $stmt   =  $this->_db->query($sql);
        //tùy chọn kiểu trả về
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        //lấy tất cả kết quả
        $user   = $stmt->fetch(); 
        $sql    = "SELECT * FROM `staffs` WHERE email = '".$data["email"]."' AND password ='".$data["password"]."'";
        $stmt   =  $this->_db->query($sql);
        //tùy chọn kiểu trả về
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        //lấy tất cả kết quả
        $admin   = $stmt->fetch(); 
        if(!$admin ){
           
        }else{
         
            $_SESSION["user"] = $admin;
            header("location:index.php?staffs=index");
            die();
         
        }
        if(!$user)
        {
            $sql  = "SELECT * FROM users WHERE email = '".$data["email"]."'";
            $stmt = $this->_db->query($sql);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $checkEmail = $stmt->fetch();
         
            if($checkEmail){
                $errors["checkPassword"] ="mật khẩu của bạn không đúng";
            }
            else{
                $errors["issetEmail"] = "email của không tồn tại";
            }
            $_SESSION['errors'] = $errors;
            $_SESSION["old"] = $_REQUEST;
           
            header("location:index.php?users=login");
            
        }

        else
        {
          $_SESSION["user"] = $user;
          $flag = 1;
          header("location: index.php?home=home");
        }  
    }
    public function show($id)
    {
        $sql = "SELECT * FROM `users` WHERE id = $id";
        $stmt = $this->_db->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $user = $stmt->fetch();
        return $user;
    }
    public function update($data,$id)
    {
        try   {
            $sql  = "UPDATE `users` SET `name` = '".$data["name"]."', `email`
             = '".$data["email"]."', `password` = '".$data["password"]."', 
             `numberPhone` = '".$data['numberPhone']."' WHERE `users`.`id` = $id; ";
            $result = $this->_db->query($sql);

            if (!$result)
                {
                    throw new Exception();
                    
                    $error = 'registration failed !';
                }
       
          } 
    catch (Exception $e)
         {
          $error = 'registration failed !';
          $sql  = "SELECT * FROM users WHERE email = '".$data["email"]."'";
          $stmt = $this->_db->query($sql);
          $stmt->setFetchMode(PDO::FETCH_OBJ);
          $checkEmail = $stmt->fetch();
          if(!empty($checkEmail)){
             $errors["issetEmail"] = "email của bạn đã tồn tại";
          }
          $sql  = "SELECT * FROM users WHERE numberPhone = '".$data["numberPhone"]."'";
          $stmt = $this->_db->query($sql);
          $stmt->setFetchMode(PDO::FETCH_OBJ);
          $checkPhone = $stmt->fetch();
          if(!empty($checkPhone)){
             $errors["issetPhone"] = "số điện thoại của bạn đã tồn tại";
          }
          $_SESSION['errors'] = $errors;
          header("location:index.php?users=edit&&id=".$id);
         }  
    }
    public function delete($id)
    {
        $sql ="DELETE FROM `users` WHERE `users`.`id` = $id";
        $result = $this->_db->query($sql);
       
        return $result;
    }
    public function getAll()
    {
        $sql = "SELECT * FROM users ";
        $stmt = $this->_db->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $users = $stmt->fetchAll();
        return $users;
    }
}