<?php

namespace AntoninZ\Controller;

require('vendor/autoload.php');

use AntoninZ\Model\CompanyManager;
use AntoninZ\Model\Company;

class CompanyController {
    
    public function createCompany()
    {
        $company = new Company([
            'name' => $_POST['name'],
        ]);
        
        $connection = new ConnectionController();
        $db = $connection->connect();
        $manager = new CompanyManager($db);
        $idCompany = $manager->createCompany($company);
        
        return $idCompany;
    }
    
    public function getCompany() {
        
        $company = new Company([
            'idCompany' => $_GET['idCompany'],
            'name' => $_POST['name']
        ]);
        
        $connection = new ConnectionController();
        $db = $connection->connect();
        $manager = new CompanyManager($db);
        $data = $manager->getCompany($company);
        
        return $data;
    }
    
    public function getCompanyById($idCompany){
        $company = new Company(['idCompany' => $idCompany]);
        
        $connection = new ConnectionController();
        $db = $connection->connect();
        $manager = new CompanyManager($db);
        $data = $manager->getCompany($company);
        
        return $data;
    }
    
    public function getAllCompany() {
        $connection = new ConnectionController();
        $db = $connection->connect();
        $manager = new CompanyManager($db);
        $companies = $manager->getAllCompany();
        
        return $companies;
    }
    
    public function updateCompany()
    {
        $company = new Company([
            'idCompany' => $_GET['idCompany'],
            'name' => $_POST['name'],
        ]);
        
        $connection = new ConnectionController();
        $db = $connection->connect();
        $manager = new CompanyManager($db);
        $manager->updateCompany($company);
    }
    
    public function deleteCompany()
    {
        $company = new Company([
            'idCompany' => $_GET['idCompany']
        ]);
        
        $connection = new ConnectionController();
        $db = $connection->connect();
        $manager = new CompanyManager($db);
        $manager->deleteCompany($company);
    }
}
