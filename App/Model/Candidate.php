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
    
    private $_creationDate;
    private $_downPayment;
    private $_reservationDate;
    private $_assistantNote;
    private $_allowable;
    private $_meeting;
    
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
    
    public function getCreationDate() {return $this->_creationDate;}
    public function getDownPayment() {return $this->_downPayment;}
    public function getReservationDate() {return $this->_reservation;}
    public function getAssistantNote() {return $this->_assistantNote;}
    public function getAllowable() {return $this->_allowable;}
    public function getMeeting() {return $this->_meeting;}
    

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
    
    public function setCreationDate($creationDate){$this->_creationDate = $creationDate;}
    public function setDownPayment($downPayment) {$this->_downPayment = $downPayment;}
    public function setReservationDate($reservation) {$this->_reservation = $reservation;}
    public function setAssistantNote($assistantNote) {$this->_assistantNote = $assistantNote;}
    public function setAllowable($allowable){$this->_allowable = $allowable;}
    public function setMeeting($meeting) {$this->_meeting = $meeting;}
    
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
            'allowable' => $this->_allowable,
            'meeting' => $this->_meeting,
            'downPayment' => $this->_downPayment,
            'assistantNote' => $this->_assistantNote
        ];
    }
}