<?php

namespace AntoninZ\Model;

class SessionManager {
    private $_db;
    
    public function setDb(\PDO $db)
    {
        $this->_db = $db;
    }
    
    public function __construct($db)
    {
        $this->setDb($db);
    }
    
    public function createSession(Session $session)
    {
        $req = $this->_db->prepare('INSERT INTO sessions 
                (idUser, idCandidate, idCompany, date, aptitude, psychologistNote, price, computerStation)
                VALUES (:idUser, :idCandidate, :idCompany, :date, :aptitude, :psychologistNote, :price, :computerStation)');
        $req->bindValue('idUser', $session->getIdUser(), \PDO::PARAM_INT);
        $req->bindValue('idCandidate', $session->getIdCandidate(), \PDO::PARAM_INT);
        $req->bindValue('idCompany', $session->getIdCompany(), \PDO::PARAM_INT);
        $req->bindValue('date', $session->getDate(), \PDO::PARAM_STR);
        $req->bindValue('aptitude', $session->getAptitude(), \PDO::PARAM_STR);
        $req->bindValue('psychologistNote', $session->getPsychologistNote(), \PDO::PARAM_STR);
        $req->bindValue('price', $session->getPrice(), \PDO::PARAM_STR);
        $req->bindValue('computerStation', $session->getComputerStation(), \PDO::PARAM_STR);
	$req->execute();
    }
    
    public function getSession(Session $session)
    {
        $req = $this->_db->prepare('SELECT * FROM sessions WHERE idSession = :idSession');
        $req->bindValue(':idSession', $session->getIdSession(), \PDO::PARAM_INT);
        $req->execute();
        
        $data = $req->fetch(\PDO::FETCH_ASSOC);
        return $a = new Session($data);
    }
    
    public function getAllSession(Session $session)
    {
        $sessions = [];
        
        $req = $this->_db->prepare('SELECT * FROM sessions WHERE idCandidate = :idCandidate ORDER BY date DESC');
        $req->bindValue(':idCandidate', $session->getIdCandidate(), \PDO::PARAM_STR);
        $req->execute();
        
        while($data = $req->fetch(\PDO::FETCH_ASSOC))
        {
            $sessions[] = new Session($data);
        }
        
        return $sessions;
    }
    
    public function updateSession(Session $session)
    {
        $req = $this->_db->prepare('UPDATE sessions SET idUser = :idUser, idCompany = :idCompany, date = :date, aptitude = :aptitude, psychologistNote = :psychologistNote, price = :price, computerStation = :computerStation WHERE idSession = :idSession');
        $req->bindValue(':idSession', $session->getIdSession(), \PDO::PARAM_INT);
	$req->bindValue(':idUser', $session->getIdUser(), \PDO::PARAM_INT);
	$req->bindValue(':idCompany', $session->getIdCompany(), \PDO::PARAM_INT);
        $req->bindValue(':date', $session->getDate(), \PDO::PARAM_STR);
        $req->bindValue(':aptitude', $session->getAptitude(), \PDO::PARAM_STR);
        $req->bindValue(':psychologistNote', $session->getPsychologistNote(), \PDO::PARAM_STR);
        $req->bindValue(':price', $session->getPrice(), \PDO::PARAM_STR);
        $req->bindValue(':computerStation', $session->getComputerStation(), \PDO::PARAM_INT);
        $req->execute();
        
    }
    
    public function deleteSession(Session $session)
    {
        $req = $this->_db->prepare('DELETE * FROM sessions WHERE idSession = :idSession');
        $req->bindValue('idSession', $session->getIdSession(), PDO::PARAM_INT);
        $req->execute();
    }
            
}
