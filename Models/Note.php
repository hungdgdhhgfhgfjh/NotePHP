<?php
namespace Models;
error_reporting(-1);
ini_set('display_errors', 'On');
include_once "database.php";
use Models\Model; 
use PDO;
class Note extends Model{
    public function store($data)
    {
        $sql  = "INSERT INTO `notes` (`id`, `note_Content`, `name_note`, `user_id`, `category_id`) VALUES (NULL, '".$data['note_Content']."', '".$data['name_note']."', '".$data['user_id']."', '".$data['category_id']."');";
        $result = $this->_db->query($sql);
        $result->setFetchMode(PDO::FETCH_OBJ);
        $users    = $result->fetchAll();    
    }
    public function NoteUser($user_id)
    {
        $sql = "SELECT notes.*,categories.name_categories FROM `notes` join `categories` 
        on notes.category_id = categories.id
         WHERE user_id = $user_id ";
        $result = $this->_db->query($sql);
        $result->setFetchMode(PDO::FETCH_OBJ);
        $noteUser    = $result->fetchAll();
        return $noteUser ;
    }
    public function show($id)
    {
        $sql    = " SELECT notes.*,categories.name_categories FROM `notes` join `categories` 
                    on notes.category_id = categories.id
                    where notes.id = $id";
        $result = $this->_db->query($sql);
        $result->setFetchMode(PDO::FETCH_OBJ);
        $note    = $result->fetch();
        return $note;
    }
    public function update($id,$data)
    {
        $sql = "UPDATE `notes` SET `note_Content` = '".$data["note_Content"]."',`category_id` = '".$data["category_id"]."', `name_note` = '".$data["name_note"]."' WHERE `notes`.`id` = $id; ";
        $result = $this->_db->query($sql);
       
        return $result;
    }
    public function detroy($id)
    {
        $sql ="DELETE FROM `notes` WHERE `notes`.`id` = $id";
        $result = $this->_db->query($sql);
       
        return $result;
    }
}