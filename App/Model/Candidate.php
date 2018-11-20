<?php
namespace AntoninZ\Model;

class Candidate implements \JsonSerializable {
    private $_idCandidate;
    private $_firstname;
    private $_lastname;
    private $_birthDate;
    private $_gender;
    private $_email;
    private $_phoneNumber;
    private $_cellphoneNumber;
    private $_address;
    private $_allowable;
    private $_reservation;
    
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
    public function getIdCandidate() {return $this->_idCandidate;}
    public function getFirstname() {return $this->_firstname;}
    public function getLastname() {return $this->_lastname;}
    public function getBirthDate() {return $this->_birthDate;}
    public function getGender() {return $this->_gender;}
    public function getEmail() {return $this->_email;}
    public function getPhoneNumber() {return $this->_phoneNumber;}
    public function getCellphoneNumber() {return $this->_cellphoneNumber;}
    public function getAddress() {return $this->_address;}
    public function getAllowable() {return $this->_allowable;}
    public function getReservation() {return $this->_reservation;}

    // SETTER
    public function setIdCandidate($idCandidate) {$this->_idCandidate = $idCandidate;}
    public function setFirstname($firstname) {$this->_firstname = $firstname;}
    public function setLastname($lastname) {$this->_lastname = $lastname;}
    public function setBirthDate($birthDate) {$this->_birthDate = $birthDate;}
    public function setGender($gender) {$this->_gender = $gender;}
    public function setEmail($email) {$this->_email = $email;}
    public function setPhoneNumber($phoneNumber) {$this->_phoneNumber = $phoneNumber;}
    public function setCellphoneNumber($cellphoneNumber) {$this->_cellphoneNumber = $cellphoneNumber;}
    public function setAddress($address) {$this->_address = $address;}
    public function setAllowable($allowable){$this->_allowable = $allowable;}
    public function setReservation($reservation) {$this->_reservation = $reservation;}
    
    public function JsonSerialize()
    {
        return 
        [
            'idCandidate' => $this->_idCandidate,
            'firstname' => $this->_firstname,
            'lastname' => $this->_lastname,
            'birthDate' => $this->_birthDate,
            'gender' => $this->_gender,
            'email' => $this->_email,
            'phoneNumber' => $this->_phoneNumber,
            'cellphoneNumber' => $this->_cellphoneNumber,
            'address' => $this->_address,
            'allowable' => $this->_allowable
        ];
    }
}