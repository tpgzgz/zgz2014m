<?php
namespace Application\models;

use Core\Entity\HydrateInterface;

class entityUser implements HydrateInterface
{
    private $id;
    protected $lastname;
    protected $name;
    private $password;
    protected $email;
    public $description;
    public $gender;
    public $city;
    public $pets;
    public $languages;
    public $photo;   
    
    
    public function hydrate($data)
    {
        echo "hydrate";
    }
    
    public function extract()
    {
        echo "extract";
    }
    
   
    
}