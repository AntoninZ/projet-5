<?php

namespace AntoninZ\Controller;

use AntoninZ\Model\ClientManager;

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

        $db = connect();
        $manager = new ClientManager($db);
        $manager->createClient($client);
    }

    public function getClient()
    {
       $client = new Client([
           'idClient' => $_GET['idClient'],
           'idCompany' => $_GET['idCompany']
       ]);

       $db = connect();
       $manager = new ClientManager($db);
       $data = $manager->getClient($client);

       return $data;
    }

    public function getAllClient()
    {
        $db = connect();
        $manager = new ClientManager($db);
        $data = $manager->getAllClient();

        return $data;
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

        $db = connect();
        $manager = new ClientManager($db);
        $manager->updateClient($client);
    }

    public function deleteClient()
    {
        $client = new Client([
            'idClient' => $_GET['idClient']
        ]);

        $db = connect();
        $manager= new ClientManager($db);
        $manager->deleteClient($client);
    }
}