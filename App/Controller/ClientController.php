<?php

namespace AntoninZ\Controller;

use AntoninZ\Model\ClientManager;
use AntoninZ\Model\Client;

class ClientController
{
    public function createClient()
    {
        $client = new Client([
            'idCompany' => $_POST['idCompany'],
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'gender' => $_POST['gender'],
            'address' => $_POST['address'],
            'phoneNumber' => $_POST['phoneNumber'],
            'cellphoneNumber' => $_POST['cellphoneNumber']
        ]);

        $connection = new ConnectionController();
        $db = $connection->connect();
        $manager = new ClientManager($db);
        $manager->createClient($client);
    }

    public function getClient()
    {
       $client = new Client([
           'idClient' => $_GET['idClient'],
       ]);

       $connection = new ConnectionController();
       $db = $connection->connect();
       $manager = new ClientManager($db);
       $client = $manager->getClient($client);

       return $client;
    }

    public function getAllClient()
    {
	
	$client = new Client(['idCompany' => $_GET['idCompany']]);
	
        $connection = new ConnectionController();
        $db = $connection->connect();
        $manager = new ClientManager($db);
        $clients = $manager->getAllClient($client);

        return $clients;
    }

    public function updateClient()
    {
        $client = new Client([
            'idClient' => $_POST['idClient'],
            'idCompany' => $_POST['idCompany'],
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'gender' => $_POST['gender'],
            'address' => $_POST['address'],
            'phoneNumber' => $_POST['phoneNumber'],
            'cellphoneNumber' => $_POST['cellphoneNumber']
        ]);

        $connection = new ConnectionController();
        $db = $connection->connect();
        $manager = new ClientManager($db);
        $manager->updateClient($client);
    }

    public function deleteClient()
    {
        $client = new Client([
            'idClient' => $_GET['idClient']
        ]);

        $connection = new ConnectionController();
        $db = $connection->connect();
        $manager= new ClientManager($db);
        $manager->deleteClient($client);
    }
}