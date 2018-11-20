<?php

namespace AntoninZ\Controller;

require('vendor/autoload.php');

use AntoninZ\Model\SessionManager;
use AntoninZ\Model\Session;

class SessionController {
    
    public function createSession()
    {
        date_default_timezone_set("Europe/Paris");
        $session = new Session([
            'idUser' => $_POST['idUser'],
            'idCandidate' => $_POST['idCandidate'],
            'date' => \date("Y-m-d"),
            'aptitude' => $_POST['aptitude'],
            'psychologistNote' => $_POST['psychologistNote'],
            'downPayment' => $_POST['downPayment'],
            'price' => $_POST['price'],
            'computerStation' => $_POST['computerStation']
        ]);
        
        $connection = new ConnectionController();
        $db = $connection->connect();
        $manager = new SessionManager($db);
        $manager->createSession($session);  
    }
    
    public function getSession()
    {
        $session = new Session([
            'idSession' => $_GET['idSession']
        ]);
        
        $connection = new ConnectionController();
        $db = $connection->connect();
        $manager = new SessionManager($db);
        $data = $manager->getSession($session);
        
        return $data;
    }
    
    public function getAllSession($idCandidate)
    {
        $session = new Session([
            'idCandidate' => $idCandidate
        ]);
        
        $connection = new ConnectionController();
        $db = $connection->connect();
        $manager = new SessionManager($db);
        $sessions = $manager->getAllSession($session);
        
        return $sessions;
    }
    
    public function updateSession()
    {
        $session = new Session([
            'idSession' => $_POST['idSession'],
            'idUser' => $_POST['idUser'],
            'idCandidate' => $_POST['idCandidate'],
            'date' => $_POST['date'],
            'aptitude' => $_POST['aptitude'],
            'psychologistNote' => $_POST['psychologistNote'],
            'downPayment' => $_POST['downPayment'],
            'price' => $_POST['price'],
            'computerStation' => $_POST['computerStation']
        ]);
        
        $connection = new ConnectionController();
        $db = $connection->connect();
        $manager = new SessionManager($db);
        $manager->updateSession($session);
    }
    
    public function deleteSession()
    {
        $session = new session([
            'idSession' => $_POST['idSession']
        ]);
        
        $connection = new ConnectionController();
        $db = $connection->connect();
        $manager = new SessionManager($db);
        $manager->deleteSession($session);
    }
}
