<?php

namespace AntoninZ\Model;

class CandidateManager {
    private $_db;
    
    //SETTER
    public function setDb(\PDO $db)
    {
        $this->_db = $db;
    }
    
    public function __construct(\PDO $db)
    {
        $this->setDb($db);
    }
    
    public function createCandidate(Candidate $candidate )
    {
        $req = $this->_db->prepare('INSERT INTO candidates (firstname, lastname, birthDate, gender, allowable) VALUES (:firstname, :lastname, :birthDate, :gender, :allowable)');
        $req->bindValue('firstname', $candidate->getFirstname(), \PDO::PARAM_STR);
        $req->bindValue('lastname', $candidate->getLastname(), \PDO::PARAM_STR);
        $req->bindValue('birthDate', $candidate->getBirthDate(), \PDO::PARAM_STR);
        $req->bindValue('gender', 'male', \PDO::PARAM_STR);
        $req->bindValue('allowable', 'true', \PDO::PARAM_STR);
        $req->execute();
        
        $req = $this->_db->query('SELECT MAX(idCandidate) FROM candidates');
        $data = $req->fetch(\PDO::FETCH_ASSOC);
        
        return $data['MAX(idCandidate)'];
    }
    
    public function createCandidateWithoutSession(Candidate $candidate)
    {
	$req = $this->_db->prepare('
		INSERT INTO candidates
		(firstname, lastname, email, phoneNumber, cellphoneNumber, creationDate, downPayment, reservationDate, assistantNote, meeting)
		VALUES
		(:firstname, :lastname, :email, :phoneNumber, :cellphoneNumber, :creationDate, :downPayment, :reservationDate, :assistantNote, :meeting)');
	$req->bindValue('firstname', $candidate->getFirstname(), \PDO::PARAM_STR);
	$req->bindValue('lastname', $candidate->getLastname(), \PDO::PARAM_STR);
	$req->bindValue('email', $candidate->getEmail(), \PDO::PARAM_STR);
	$req->bindValue('phoneNumber', $candidate->getPhoneNumber(), \PDO::PARAM_STR);
	$req->bindValue('cellphoneNumber', $candidate->getCellphoneNumber(), \PDO::PARAM_STR);
	$req->bindValue('creationDate', $candidate->getCreationDate(), \PDO::PARAM_STR);
	$req->bindValue('downPayment', $candidate->getDownPayment(), \PDO::PARAM_STR);
	$req->bindValue('reservationDate', $candidate->getReservationDate(), \PDO::PARAM_STR);
	$req->bindValue('assistantNote', $candidate->getAssistantNote(), \PDO::PARAM_STR);
	$req->bindValue('meeting', $candidate->getMeeting(), \PDO::PARAM_STR);
	$req->execute();
    }
    public function getCandidate(Candidate $candidate)
    {
        $req = $this->_db->prepare('SELECT * FROM candidates WHERE idCandidate = :idCandidate');
        $req->execute(array(
            'idCandidate' => $candidate->getIdCandidate()
        ));
        
        $data = $req->fetch(\PDO::FETCH_ASSOC);
        
        return $a = new Candidate($data);
        
    }
    
    public function getAllCandidate(Candidate $candidate)
    {
        $candidates = [];
        
        $req = $this->_db->prepare('SELECT * FROM candidates WHERE lastname LIKE :lastname OR email LIKE :email OR phoneNumber LIKE :phoneNumber OR cellphoneNumber LIKE :cellphoneNumber');
        $req->bindValue('lastname', $candidate->getLastname().'%', \PDO::PARAM_STR);
        $req->bindValue('email', $candidate->getEmail().'%', \PDO::PARAM_STR);
        $req->bindValue('phoneNumber', $candidate->getPhoneNumber().'%', \PDO::PARAM_STR);
        $req->bindValue('cellphoneNumber', $candidate->getCellphoneNumber().'%', \PDO::PARAM_STR);
        $req->execute();
        
        while($data = $req->fetch(\PDO::FETCH_ASSOC))
        {
            $candidates[] = new Candidate($data); 
        }
        
        return $candidates;
        
    }
    
    public function getAllCandidateWithoutSession()
    {
        $candidates = [];
        
        $req = $this->_db->query('SELECT * FROM candidates WHERE meeting = "true"');
        
        while($data = $req->fetch(\PDO::FETCH_ASSOC))
        {
            $candidates[] = new Candidate($data);
        }
        
        return $candidates;
    }
    
    public function updateCandidate(Candidate $candidate)
    {
        $req = $this->_db->prepare('UPDATE candidates SET firstname = :firstname, lastname = :lastname, birthDate = :birthDate, gender = :gender, email = :email, phoneNumber = :phoneNumber, cellphoneNumber = :cellphoneNumber, address = :address, zipCode = :zipCode, city = :city, allowable = :allowable WHERE idCandidate = :idCandidate');
        $req->bindValue('idCandidate', $candidate->getIdCandidate(), \PDO::PARAM_INT);
	$req->bindValue('firstname', $candidate->getFirstname(), \PDO::PARAM_STR);
        $req->bindValue('lastname', $candidate->getLastname(), \PDO::PARAM_STR);
        $req->bindValue('birthDate', $candidate->getBirthDate(), \PDO::PARAM_STR);
        $req->bindValue('gender', $candidate->getGender(), \PDO::PARAM_STR);
        $req->bindValue('email', $candidate->getEmail(), \PDO::PARAM_STR);
        $req->bindValue('phoneNumber', $candidate->getPhoneNumber(), \PDO::PARAM_STR);
        $req->bindValue('cellphoneNumber', $candidate->getCellphoneNumber(), \PDO::PARAM_STR);
        $req->bindValue('address', $candidate->getAddress(), \PDO::PARAM_STR);
	$req->bindValue('zipCode', $candidate->getZipCode(), \PDO::PARAM_STR);
	$req->bindValue('city', $candidate->getCity(), \PDO::PARAM_STR);
	$req->bindValue('allowable', $candidate->getAllowable(), \PDO::PARAM_STR);
        $req->execute();
    }
    
    public function updateCandidateWithoutSession(Candidate $candidate)
    {
	$req = $this->_db->prepare('UPDATE candidates SET
		creationDate = :creationDate,
		downPayment = :downPayment,
		reservationDate = :reservationDate,
		assistantNote = :assistantNote,
		meeting = :meeting
		WHERE idCandidate = :idCandidate');
	$req->bindValue(':idCandidate', $candidate->getIdCandidate(), \PDO::PARAM_INT);
	$req->bindValue(':creationDate', $candidate->getCreationDate(), \PDO::PARAM_STR);
	$req->bindValue(':downPayment', $candidate->getDownPayment(), \PDO::PARAM_STR);
	$req->bindValue(':reservationDate', $candidate->getReservationDate(), \PDO::PARAM_STR);
	$req->bindValue(':assistantNote', $candidate->getAssistantNote(), \PDO::PARAM_STR);
	$req->bindValue(':meeting', $candidate->getMeeting(), \PDO::PARAM_STR);
	$req->execute();	
    }
    
    public function deleteCandidate(Candidate $candidate)
    {
       $req = $this->_db->prepare('DELETE FROM candidates WHERE idCandidate = :idCandidate');
       $req->bindValue('idCandidate', $candidate->getIdCandidate(), \PDO::PARAM_INT);
       $req->execute();
    }
    
}
