<?php

namespace AntoninZ\Controller;

require('vendor/autoload.php');

use AntoninZ\Model\CandidateManager;
use AntoninZ\Model\Candidate;

class CandidateController
{
    public function createCandidate()
    {
	$candidate = new Candidate([
	    'firstname' => $_POST['firstname'],
	    'lastname' => $_POST['lastname'],
	    'birthDate' => $_POST['birthDate']
	]);


	$connection = new ConnectionController();
	$db = $connection->connect();
	$manager = new CandidateManager($db);
	$lastId = $manager->createCandidate($candidate);

	return $lastId;
    }

    public function getCandidateById($idCandidate){
	$candidate = new Candidate(['idCandidate' => $idCandidate]);
	
	$connection = new ConnectionController();
	$db = $connection->connect();
	$manager = new CandidateManager($db);
	$data = $manager->getCandidate($candidate);

	return $data;
    }
    
    public function getAllCandidate()
    {
	$candidate = new Candidate([
	    'lastname' => $_POST['lastname'],
	    'email' => $_POST['email'],
	    'phoneNumber' => $_POST['phoneNumber'],
	    'cellphoneNumber' => $_POST['cellphoneNumber']
	]);

	$connection = new ConnectionController();
	$db = $connection->connect();
	$manager = new CandidateManager($db);
	$data = $manager->getAllCandidate($candidate);

	return $data;  

    }
    
    public function createCandidateWithoutSession()
    {
	$candidate = new Candidate([
	    'lastname' => $_POST['lastname'],
	    'firstname' => $_POST['firstname'],
	    'email' => $_POST['email'],
	    'phoneNumber' => $_POST['phoneNumber'],
	    'cellphoneNumber' => $_POST['cellphoneNumber'],
	    'creationDate' => $_POST['creationDate'],
	    'downPayment' => $_POST['downPayment'],
	    'reservationDate' => $_POST['reservationDate'],
	    'meeting' => $_POST['meeting'],
	    'assistantNote' => $_POST['assistantNote']
	]);

	$connection = new ConnectionController();
	$db = $connection->connect();
	$manager = new CandidateManager($db);
	$lastId = $manager->createCandidateWithoutSession($candidate);
	return $lastId;
    }
    
    public function getAllCandidateWithoutSession()
    {

	$connection = new ConnectionController();
	$db = $connection->connect();
	$manager = new CandidateManager($db);
	$data= $manager->getAllCandidateWithoutSession();

	return $data;

    }
    
    public function updateCandidate()
    {

	$candidate = new Candidate([
	    'idCandidate' => $_POST['idCandidate'],
	    'firstname' => $_POST['firstname'],
	    'lastname' => $_POST['lastname'],
	    'birthDate' => $_POST['birthDate'],
	    'gender' => $_POST['gender'],
	    'email' => $_POST['email'],
	    'phoneNumber' => $_POST['phoneNumber'],
	    'cellphoneNumber' => $_POST['cellphoneNumber'],
	    'address' => $_POST['address'],
	    'zipCode' => $_POST['zipCode'],
	    'city' => $_POST['city'],
	    'allowable' => $_POST['allowable']
	]);

	$connection = new ConnectionController();
	$db = $connection->connect();
	$manager = new CandidateManager($db);
	$manager->updateCandidate($candidate);

    }
    
    public function updateCandidateWithoutSession()
    {
	$candidate = new Candidate([
	    'idCandidate' => $_POST['idCandidate'],
	    'creationDate' => $_POST['creationDate'],
	    'downPayment' => $_POST['downPayment'],
	    'reservationDate' => $_POST['reservationDate'],
	    'assistantNote' => $_POST['assistantNote'],
	    'meeting' => $_POST['meeting']
	]);

	$connection = new ConnectionController();
	$db = $connection->connect();
	$manager = new CandidateManager($db);
	$manager->updateCandidateWithoutSession($candidate);
    }
    
    public function deleteCandidate()
    {
	$candidate = new Candidate([
	    'idCandidate' => $_POST['idCandidate']
	]);

	$connection = new ConnectionController();
	$db = $connection->connect();
	$manager= new CandidateManager($db);
	$manager->deleteCandidate($candidate);

	return $candidate->getIdCandidate();
    }
}




