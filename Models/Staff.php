<?php
namespace Models;
error_reporting(-1);
ini_set('display_errors', 'On');
include_once "database.php";

use Exception;
use Models\Model; 
use PDO;
class Staff extends Model{
    public function getAll()
    {
        $sql = "SELECT * FROM staffs ";
        $stmt = $this->_db->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $categiries = $stmt->fetchAll();
        return $categiries;
    }
    public function store($data,$errors)
    {
        try   {
            $sql  = "INSERT INTO `staffs` (`id`,`position`, `name`, `email`, `password`, `numberPhone`) VALUES (NULL, '".$data["position"]."','".$data["name"]."', '".$data["email"]."', '".$data["password"]."', '".$data["numberPhone"]."');";
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
          $sql  = "SELECT * FROM staffs WHERE email = '".$data["email"]."'";
          $stmt = $this->_db->query($sql);
          $stmt->setFetchMode(PDO::FETCH_OBJ);
          $checkEmail = $stmt->fetch();
          if(!empty($checkEmail)){
             $errors["issetEmail"] = "email của bạn đã tồn tại";
          }
          $sql  = "SELECT * FROM staffs WHERE numberPhone = '".$data["numberPhone"]."'";
          $stmt = $this->_db->query($sql);
          $stmt->setFetchMode(PDO::FETCH_OBJ);
          $checkPhone = $stmt->fetch();
          if(!empty($checkPhone)){
             $errors["issetPhone"] = "số điện thoại của bạn đã tồn tại";
          }
          $_SESSION['errors'] = $errors;
          $_SESSION["old"] = $_REQUEST;
          header("location:index.php?staffs=create");

         }  
    }
    public function show($id)
    {
        $sql = "SELECT * FROM staffs WHERE id = $id ";
        $stmt = $this->_db->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $staff = $stmt->fetch();
        return $staff;
    }
    public function update($data,$id)
    {
        try   {
            $sql  = "UPDATE `staffs` SET `name` = '".$data["name"]."',`position`='".$data["position"]."', `email`
             = '".$data["email"]."', `password` = '".$data["password"]."', 
             `numberPhone` = '".$data['numberPhone']."' WHERE `staffs`.`id` = $id; ";
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
        $sql ="DELETE FROM `staffs` WHERE `staffs`.`id` = $id";
        $result = $this->_db->query($sql);
       
        return $result;
    }
}