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

    public function getCandidate()
    {
       $candidate = new Candidate([
           'idCandidate' => $_GET['idCandidate']
       ]);

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
        $a = $manager->getAllCandidate($candidate);
        
        return $a;
        
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
            'allowable' => $_POST['allowable']
        ]);

        $connection = new ConnectionController();
        $db = $connection->connect();
        $manager = new CandidateManager($db);
        $manager->updateCandidate($candidate);
    }

    public function deleteCandidate()
    {
        $candidate = new Candidate([
            'idCandidate' => $_GET['idCandidate']
        ]);

        $connection = new ConnectionController();
        $db = $connection->connect();
        $manager= new CandidateManager($db);
        $manager->deleteCandidate($candidate);
    }
}




