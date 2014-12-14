<?php
namespace Core\Adapters;

class Txt implements AdapterInterface, TxtInterface
{
    private $link;
    protected $file;
    
    
    /**
     * @return the $file
     */
    public function getTable()
    {
    	return $this->file;
    }
    
    /**
     * @param field_type $file
     */
    public function setTable($table)
    {
    	$this->file = $file;
    }
        
    public function fetchAll()
    {
        
    }
    
    
    public function fetch($id)
    {
        
    }
    
	public function delete($id)
	{
		
	}
	
	public function insert($data)
	{
		foreach($filter as $key => $value)
      	{
                //         if(is_array($value))
                    //             $value=implode(',', $value);
                    //         $data[$key]=$value;
                    //     }
            //     $data[]=$imagename;
            //     $data = implode('|', $data);
            $filename = 'usuarios.txt';
            return file_put_contents($_SERVER['DOCUMENT_ROOT']."/".$filename,
                                        $data."\n",
                                        FILE_APPEND);
			}
	}
	
	public function update($id,$data)
	{
		
	}
    
}