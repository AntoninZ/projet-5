<?php
namespace AntoninZ\Model;

class Session {
    private $_idSession;
    private $_idUser;
    private $_idCandidate;
    private $_idCompany;
    private $_date;
    private $_aptitude;
    private $_psychologistNote;
    private $_price;
    private $_computerStation;
    
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
    public function getIdSession() {return $this->_idSession;}
    public function getIdUser() {return $this->_idUser;}
    public function getIdCandidate() {return $this->_idCandidate;}
    public function getIdCompany() {return $this->_idCompany;}
    public function getDate() {return $this->_date;}
    public function getAptitude() {return $this->_aptitude;}
    public function getPsychologistNote() {return $this->_psychologistNote;}
    public function getPrice() {return $this->_price;}
    public function getComputerStation() {return $this->_computerStation;}  

     // SETTER
    public function setIdSession($idSession) {$this->_idSession = $idSession;}
    public function setIdUser($idUser) {$this->_idUser = $idUser;}
    public function setIdCandidate($idCandidate) {$this->_idCandidate = $idCandidate;}
    public function setIdCompany($idCompany) {$this->_idCompany = $idCompany;}
    public function setDate($date) {$this->_date = $date;}
    public function setAptitude($aptitude) {$this->_aptitude = $aptitude;}
    public function setPsychologistNote($psychologistNote) {$this->_psychologistNote = $psychologistNote;}
    public function setPrice($price) {$this->_price = $price;}
    public function setComputerStation($computerStation) {$this->_computerStation = $computerStation;}
    
}
