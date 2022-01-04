<?php
namespace Models;
error_reporting(-1);
ini_set('display_errors', 'On');
Use PDO;

class Model {

    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_pass = '123456';
    private $db_name = 'note';
    protected $_db;
    public function __construct()
    {
        $this->_db = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name, $this->db_user, $this->db_pass);

    }

}
?>