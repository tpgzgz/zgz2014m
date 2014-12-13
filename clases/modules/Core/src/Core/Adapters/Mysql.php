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
    
	public function delete($id)
	{
		$sql = "DELETE 
				FROM ".$this->table."
				WHERE ".key($id)."='".$id[key($id)]."'";
		$result = mysqli_query($this->link, $sql);
		return mysqli_affected_rows($link);
		//return $result;
	}
	
	public function insert($data)
	{
		$sql = "INSERT 
			INTO ".$this->table." SET ";
		$elements = count($data);
		//for ($i=0; $i<$elements-2; $i++) 
		//{
		//	$sql .= key($i)."='".$data[key($i)]."', ";
		//}
		foreach ($data as $key => $value) 
		{
			$sql .= $key."='".$value."',";
		}
		$sql = substr($sql, 0, -1);
		$result = mysqli_query($this->link, $sql);
		return mysqli_insert_id($link);
	}
	
	public function update($id,$data)
	{
		foreach ($data as $key => $value) 
		{
			$sql .= $key."='".$value."',";
		}
		$sql = substr($sql, 0, -1);
		$sql .= " WHERE ".key($id)."='".$id[key($id)]."'";
		$result = mysqli_query($this->link, $sql);
		return mysqli_affected_rows($link);
	}
    
}