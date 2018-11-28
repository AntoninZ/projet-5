<?php

namespace AntoninZ\Controller;

require('vendor/autoload.php');

use AntoninZ\Model\SessionManager;
use AntoninZ\Model\Session;

class SessionController {
    
    public function createSession()
    {
        $session = new Session([
            'idUser' => $_POST['idUser'],
            'idCandidate' => $_POST['idCandidate'],
	    'idCompany' => $_POST['idCompany'],
            'date' => $_POST['date'],
	    'grade' => $_POST['grade'],
            'aptitude' => $_POST['aptitude'],
            'psychologistNote' => $_POST['psychologistNote'],
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
    
    public function getAllSessionByFilter()
    {
	if(isset($_POST['idCompany']))
	{
	    $session = new Session([
		'idCompany' => $_POST['idCompany'],
		'grade' => $_POST['grade'],
		'aptitude' => $_POST['aptitude'],
		'date' => $_POST['date']
	    ]);
	    
	    $filterDate = $_POST['filterDate'];
	}
	else
	{
	    \date_default_timezone_set("Europe/Paris");
	    
	    $session = new Session([
		'idCompany' => '',
		'grade' => '',
		'aptitude' => '',
		'date' => \date("Y-m-d")
	    ]);
	    
	    $filterDate = "month";
	}
	
	$connection = new ConnectionController();
        $db = $connection->connect();
        $manager = new SessionManager($db);
        $sessions = $manager->getAllSessionByFilter($session, $filterDate);
	
        return $sessions;
    }
    
    public function updateSession()
    {
        $session = new Session([
            'idSession' => $_POST['idSession'],
            'idUser' => $_POST['idUser'],
	    'idCompany' => $_POST['idCompany'],
            'date' => $_POST['date'],
            'aptitude' => $_POST['aptitude'],
	    'grade' => $_POST['grade'],
            'psychologistNote' => $_POST['psychologistNote'],
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
    
    public function deleteSessionByIdCandidate()
    {
	$session = new session([
	    'idCandidate' => $_POST['idCandidate']
	]);
	
	$connection = new ConnectionController();
	$db = $connection->connect();
	$manager = new SessionManager($db);
	$manager->deleteSessionByIdCandidate($session);
    }
}
