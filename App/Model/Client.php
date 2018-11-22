<?php
namespace AntoninZ\Model;

class Client{
    
    private $_idClient;
    private $_idCompany;
    private $_firstname;
    private $_lastname;
    private $_gender;
    private $_address;
    private $_phoneNumber;
    private $_cellphoneNumber;
    
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
    public function getIdClient() {return $this->_idClient;}
    public function getIdCompany() {return $this->_idCompany;}
    public function getFirstname() {return $this->_firstname;}
    public function getLastname() {return $this->_lastname;}
    public function getGender() {return $this->_gender;}
    public function getAddress() {return $this->_address;}
    public function getPhoneNumber() {return $this->_phoneNumber;}
    public function getCellphoneNumber() {return $this->_cellphoneNumber;}
    
     // SETTER
    public function setIdClient($idClient) {$this->_idClient = $idClient;}
    public function setIdCompany($idCompany) {$this->_idCompany = $idCompany;}
    public function setFirstname($firstname) {$this->_firstname = $firstname;}
    public function setLastname($lastname) {$this->_lastname = $lastname;}
    public function setGender($gender) {$this->_gender = $gender;}
    public function setAddress($address) {$this->_address = $address;}
    public function setPhoneNumber($phoneNumber) {$this->_phoneNumber = $phoneNumber;}
    public function setCellphoneNumber($cellphoneNumber) {$this->_cellphoneNumber = $cellphoneNumber;}
    
}
