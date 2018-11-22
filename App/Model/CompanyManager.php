<?php

namespace AntoninZ\Model;

class CompanyManager {
   private $_db;
   
   public function setDb(\PDO $db)
   {
       $this->_db = $db;
   }
   
   public function __construct($db)
   {
       $this->setDb($db);
   }
   
   public function createCompany(Company $company)
   {
       $req = $this->_db->prepare('INSERT INTO companies (name, billAddress) VALUES (:name, :billAddress)');
       $req->bindValue(':name', $company->getName(), \PDO::PARAM_STR);
       $req->execute();
       
       $req = $this->_db->query('SELECT MAX(idCompany) FROM companies');
       $idCompany = $req->fetch(\PDO::FETCH_ASSOC);
        
        return $idCompany['MAX(idCompany)'];
   }
   
   public function getCompany(Company $company)
   {
       $req = $this->_db->prepare('SELECT * FROM companies WHERE idCompany = :idCompany OR name = :name');
       $req->bindValue(':idCompany', $company->getIdCompany(), \PDO::PARAM_INT);
       $req->bindValue(':name', $company->getName(), \PDO::PARAM_STR);
       $req->execute();
       
       $data = $req->fetch(\PDO::FETCH_ASSOC);
       return $a = new Company($data);
   }
   
   public function getAllCompany()
   {
       $companies = [];
       
       $req = $this->_db->prepare('SELECT * FROM companies');
       $req->execute();

       while($data = $req->fetch(\PDO::FETCH_ASSOC))
       {
           $companies[] = new Company($data);
       }
       
       return $companies;
   }
   
   public function updateCompany(Company $company)
   {
       $req = $this->_db->prepare('UPDATE companies SET name = :name WHERE idCompany = :idCompany');
       $req->bindValue(':name', $company->getName(), \PDO::PARAM_STR);
       $req->bindValue(':idCompany', $company->getIdCompany(), \PDO::PARAM_INT);
       $req->execute();
   }
   
   public function deleteCompany(Company $company)
   {
       $req = $this->_db->prepare('DELETE * FROM companies WHERE idCompany = :idCompany');
       $req->bindValue(':idCompany', $company->getIdCompany(), PDO::PARAM_INT);
       $req->execute();
   }
}
