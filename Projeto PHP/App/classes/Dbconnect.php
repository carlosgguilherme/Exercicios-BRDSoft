<<<<<<< HEAD
<?php

namespace App\classes;

use \PDO;
use \PDOException;

class Dbconnect
{
 private $_localhost = 'localhost';
 private $_port = 3306;
 private $_user = 'root';
 private $_password = '';
 private $_dbname = 'projeto';

 protected $connection;

  public function __construct()
  {

      if(!isset($this->connection))
      {
          $this->setConnection();

      }

  return $this->connection;

  }

    private function setConnection(){
        try{
            $this->connection = new PDO('mysql:host='.$this->_localhost.
                ';dbname='.$this->_dbname.
                ';port='.$this->_port,
                $this->_user,
                $this->_password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }
}

=======
<?php

namespace App\classes;

use \PDO;
use \PDOException;

class Dbconnect
{
 private $_localhost = 'localhost';
 private $_port = 3306;
 private $_user = 'root';
 private $_password = '';
 private $_dbname = 'projeto';

 protected $connection;

  public function __construct()
  {

      if(!isset($this->connection))
      {
          $this->setConnection();

      }

  return $this->connection;

  }

    private function setConnection(){
        try{
            $this->connection = new PDO('mysql:host='.$this->_localhost.
                ';dbname='.$this->_dbname.
                ';port='.$this->_port,
                $this->_user,
                $this->_password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }
}

>>>>>>> 49d93b3cf9b82931085a02131248e66e762fc684
?>