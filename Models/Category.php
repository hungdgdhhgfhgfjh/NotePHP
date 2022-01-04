<?php
namespace Models;
error_reporting(-1);
ini_set('display_errors', 'On');
include_once "database.php";
use Models\Model; 
use PDO;
class Category extends Model{
    public function getAll()
    {
        $sql = "SELECT * FROM categories ";
    

        $stmt = $this->_db->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $categiries = $stmt->fetchAll();
        return $categiries;
    }
}