<?php
namespace AntoninZ\Model;

class User implements \JsonSerializable {
    private $_idUser;
    private $_username;
    private $_password;
    private $_gender;
    private $_role;
    private $_adeliNumber;

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
    public function getIdUser() {return $this->_idUser;}
    public function getUsername() {return $this->_username;}
    public function getPassword() {return $this->_password;}
    public function getGender() {return $this->_gender;}
    public function getRole() {return $this->_role;}
    public function getAdeliNumber() {return $this->_adeliNumber;}
    
    // SETTER
    public function setIdUser($idUser) {$this->_idUser = $idUser;}
    public function setUsername($username) {$this->_username = $username;}
    public function setPassword($password) {$this->_password = $password;}
    public function setGender($gender) {$this->_gender = $gender;}
    public function setRole($role) {$this->_role = $role;}
    public function setAdeliNumber($adeliNumber) {$this->_adeliNumber = $adeliNumber;}

    public function JsonSerialize()
    {
        return 
        [
            'idUser' => $this->_idUser,
            'username' => $this->_username,
            'password' => $this->_password,
            'gender' => $this->_gender,
            'role' => $this->_role,
	    'adeliNumber' => $this->_adeliNumber
        ];
    }
}
