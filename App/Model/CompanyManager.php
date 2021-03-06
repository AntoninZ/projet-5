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
	$req = $this->_db->prepare('INSERT INTO p5_companies (name) VALUES (:name)');
	$req->bindValue(':name', $company->getName(), \PDO::PARAM_STR);
	$success = $req->execute();

	$req = $this->_db->query('SELECT MAX(idCompany) FROM p5_companies');
	$idCompany = $req->fetch(\PDO::FETCH_ASSOC);
       
	if(!$success || !$idCompany)
	{
	    throw new \Exception('Erreur serveur : la requête a échouée.');
	}
	else
	{
	    return $idCompany['MAX(idCompany)'];
	}
   }
   
   public function getCompany(Company $company)
   {
	$req = $this->_db->prepare('SELECT * FROM p5_companies WHERE idCompany = :idCompany OR name = :name');
	$req->bindValue(':idCompany', $company->getIdCompany(), \PDO::PARAM_INT);
	$req->bindValue(':name', $company->getName(), \PDO::PARAM_STR);
	$success = $req->execute();

	$data = $req->fetch(\PDO::FETCH_ASSOC);
       
	if(!$success)
	{
	    throw new \Exception('Erreur serveur : la requête a échouée.');
	}
	else
	{
	    return $a = new Company($data);
	}
   }
   
   public function getAllCompany()
   {
	$companies = [];

	$req = $this->_db->prepare('SELECT * FROM p5_companies ORDER BY name');
	$success = $req->execute();
	
	if(!$success)
	{
	    throw new \Exception('Erreur serveur : la requête a échouée.');
	}
	else
	{
	    while($data = $req->fetch(\PDO::FETCH_ASSOC))
	    {
		$companies[] = new Company($data);
	    }

	    return $companies;
	}
   }
   
   public function updateCompany(Company $company)
   {
	$req = $this->_db->prepare('UPDATE p5_companies SET name = :name WHERE idCompany = :idCompany');
	$req->bindValue(':name', $company->getName(), \PDO::PARAM_STR);
	$req->bindValue(':idCompany', $company->getIdCompany(), \PDO::PARAM_INT);
	$success = $req->execute();

	if(!$success)
	{
	    throw new \Exception('Erreur serveur : la requête a échouée.');
	}
   }
}
