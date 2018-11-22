<?php
namespace AntoninZ\Model;

class Company {
    private $_idCompany;
    private $_name;
    
    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

     // GETTER
    public function getIdCompany() {return $this->_idCompany;}
    public function getName() {return $this->_name;}

     // SETTER
    public function setIdCompany($idCompany) {$this->_idCompany = $idCompany;}
    public function setName($name) {$this->_name = $name;}

}
