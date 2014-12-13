<?php
namespace Core\Adapters;

class Mysql implements AdapterInterface, MysqlInterface
{
    private $link;
    protected $table;
    
    public function connect($config)
    {
        // Conectarse al DBMS
        $this->link = mysqli_connect($config['database']['host'],
            $config['database']['user'],
            $config['database']['password']);
        
        mysqli_select_db($this->link, $config['database']['database']);
        
    }
    
    public function disconnect()
    {
        mysqli_close($this->link);
    }
    
    /**
     * @return the $table
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param field_type $table
     */
    public function setTable($table)
    {
        $this->table = $table;
    }
    
    public function fetchAll()
    {
        // SELECT * FROM users;
        $sql = "SELECT * FROM ".$this->table;
         
        // Retornar el data
        $result = mysqli_query($this->link, $sql);
        
        while ($row = mysqli_fetch_assoc($result))
        {
            $rows[] = $row;
        }
        return $rows;
    }
    
    
    public function fetch($id)
    {
        $sql = "SELECT * 
                FROM ".$this->table." 
                WHERE ".key($id)."='".$id[key($id)]."'";
        // Retornar el data
        $result = mysqli_query($this->link, $sql);
        $row = mysqli_fetch_assoc($result);
        
        return $row;
        
    }
    
    

    
   
    
    
}