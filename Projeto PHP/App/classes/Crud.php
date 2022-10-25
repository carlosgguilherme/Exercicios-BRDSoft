<<<<<<< HEAD
<?php

namespace App\classes;

//include_once ('Dbconnect.php');
use App\classes\dbconnect as Dbconnect;

class Crud extends Dbconnect
{


    public function __construct()
    {
        parent::__construct();
    }


    protected function execute($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    protected  function select($table, $where = null, $order = null, $limit = null, $fields = '*'){

        //DADOS DA QUERY
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';

        //MONTA A QUERY
        $query = 'SELECT '.$fields.' FROM '.$table.' '.$where.' '.$order.' '.$limit;

        //EXECUTA A QUERY
        return $this->execute($query);
    }

    protected function insert($values, $table)
    {

        //DADOS DA QUERY
        $fields = array_keys($values);
        $binds  = array_pad([],count($fields),'?');

        //MONTA A QUERY
        $query = 'INSERT INTO '.$table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';
        //echo $query;

        //EXECUTA O INSERT
        $this->execute($query,array_values($values));

        //RETORNA O ID INSERIDO
        return $this->connection->lastInsertId();
    }

    protected function update($table,$where,$values){
        //DADOS DA QUERY
        $fields = array_keys($values);

        //MONTA A QUERY
        $query = 'UPDATE '.$table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;

        //EXECUTAR A QUERY
        $this->execute($query,array_values($values));

        //RETORNA SUCESSO
        return true;
    }

    protected function delete($table,$where){
        //MONTA A QUERY
        $query = 'DELETE FROM '.$table.' WHERE '.$where;

        //EXECUTA A QUERY
        $this->execute($query);

        //RETORNA SUCESSO
        return true;
    }

    protected function limpaTabela($table){
        $query = 'TRUNCATE TABLE '.$table;
        $this->execute($query);
        return true;
    }



}
=======
<?php

namespace App\classes;

//include_once ('Dbconnect.php');
use App\classes\dbconnect as Dbconnect;

class Crud extends Dbconnect
{


    public function __construct()
    {
        parent::__construct();
    }


    protected function execute($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    protected  function select($table, $where = null, $order = null, $limit = null, $fields = '*'){

        //DADOS DA QUERY
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';

        //MONTA A QUERY
        $query = 'SELECT '.$fields.' FROM '.$table.' '.$where.' '.$order.' '.$limit;

        //EXECUTA A QUERY
        return $this->execute($query);
    }

    protected function insert($values, $table)
    {

        //DADOS DA QUERY
        $fields = array_keys($values);
        $binds  = array_pad([],count($fields),'?');

        //MONTA A QUERY
        $query = 'INSERT INTO '.$table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';
        //echo $query;

        //EXECUTA O INSERT
        $this->execute($query,array_values($values));

        //RETORNA O ID INSERIDO
        return $this->connection->lastInsertId();
    }

    protected function update($table,$where,$values){
        //DADOS DA QUERY
        $fields = array_keys($values);

        //MONTA A QUERY
        $query = 'UPDATE '.$table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;

        //EXECUTAR A QUERY
        $this->execute($query,array_values($values));

        //RETORNA SUCESSO
        return true;
    }

    protected function delete($table,$where){
        //MONTA A QUERY
        $query = 'DELETE FROM '.$table.' WHERE '.$where;

        //EXECUTA A QUERY
        $this->execute($query);

        //RETORNA SUCESSO
        return true;
    }

    protected function limpaTabela($table){
        $query = 'TRUNCATE TABLE '.$table;
        $this->execute($query);
        return true;
    }



}
>>>>>>> 49d93b3cf9b82931085a02131248e66e762fc684
?>