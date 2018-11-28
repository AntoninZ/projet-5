<?php
session_start();

require('vendor/autoload.php');

// Import Namespace
use AntoninZ\Controller\{CandidateController, ClientController, CompanyController, SessionController, UserController};
use AntoninZ\Model\{Candidate, Client, Company, Session, User};

$userController = new UserController();
$candidateController = new CandidateController();
$sessionController = new SessionController();
$companyController = new CompanyController();
$clientController = new ClientController();
$smarty = new Smarty();


if(isset($_GET['signOut']))
{
    $_SESSION = array();
    session_unset();
    session_destroy();
}

if(isset($_SESSION['username']))
{
    if(isset($_GET['page']))
    {
        $smarty->display('Header.tpl');
        
        if($_GET['page'] == 'meeting')
        {
            $candidates = $candidateController->getAllCandidateWithoutSesion();
            $smarty->assign('candidates', $candidates);
            $smarty->display('Candidate/CandidateWithoutSession.tpl');
        }
        elseif($_GET['page'] == 'candidates')
        { 
            if(isset($_GET['idCandidate']))
            {
                $idCandidate = $_GET['idCandidate'];
                $candidate = $candidateController->getCandidate();
                $sessions = $sessionController->getAllSession($idCandidate);
                $users = $userController->getAllUserWherePsychologist();
		$companyList = $companyController->getAllCompany();
		
		if($sessions)
		{
		    foreach ($sessions as $session)
		    {
			$companies[$session->getIdCompany()] = $companyController->getCompanyById($session->getIdCompany())->getName();
		    }
                    $smarty->assign('sessions', $sessions);
		    $smarty->assign('companies', $companies);
		}
		
		$smarty->assign('users', $users);
                $smarty->assign('candidate', $candidate);
		$smarty->assign('companyList', $companyList);
                $smarty->display('Candidate/GetCandidate.tpl');
            }
            else
            {
                $smarty->display('Candidate/CandidateHome.tpl');
            }
        }
	elseif($_GET['page'] == 'session')
	{
	    if(isset($_GET['idSession']))
            {
                $session = $sessionController->getSession();
		$users = $userController->getAllUserWherePsychologist();
		$companies = $companyController->getAllCompany();
		
                $smarty->assign('session', $session);
		$smarty->assign('users', $users);
		$smarty->assign('companies', $companies);
                $smarty->display('Session/GetSession.tpl');
            }
	}
        elseif($_GET['page'] == 'companies')
        {
	    $companies = $companyController->getAllCompany();
	    $smarty->assign('companies', $companies);
	    $smarty->display('Company/CompanieHome.tpl');
        }
	elseif($_GET['page'] == 'clients')
	{
	    if(isset($_GET['idClient']))
	    {
		$client = $clientController->getClient();
		$smarty->assign('client', $client);
		$smarty->display('Client/GetClient.tpl');
	    }
	    else
	    {
		$clients = $clientController->getAllClient();
		$smarty->assign('clients', $clients);
		$smarty->display('Client/GetAllClient.tpl');
	    }
	}
        elseif($_GET['page'] == "settings")
        {
            $smarty->display('User/UserHome.tpl');
        }
        
        $smarty->display('Footer.tpl');
    }
    elseif(isset($_GET['action']))
    {
        if($_GET['action'] == 'search')
        {
            $candidateController = new CandidateController();
            $candidates = $candidateController->getAllCandidate();
            $smarty->assign('candidates', $candidates);
            $smarty->display('Candidate/GetAllCandidate.tpl');
            
        }
        elseif($_GET['action'] == 'createCandidate')
        {
            $lastId = $candidateController->createCandidate();
            
            echo $lastId;
        }
        elseif($_GET['action'] == 'updateCandidate')
        {
            $candidateController->updateCandidate();
        }
	elseif($_GET['action'] == 'updateCandidateWithoutSession')
	{
	    $candidateController->updateCandidateWithoutSession();
	}
	elseif($_GET['action'] == 'deleteCandidate')
	{
	    $sessionController->deleteSessionByIdCandidate();
	    $candidateController->deleteCandidate();
	}
	elseif($_GET['action'] == 'createSession')
	{
	    $lastId = $sessionController->createSession();
	    echo $lastId;
	}
	elseif($_GET['action'] == 'updateSession')
	{
	    $sessionController->updateSession();
	}
	elseif($_GET['action'] == 'deleteSession')
	{
	    $sessionController->deleteSession();
	}
	elseif($_GET['action'] == 'createCompany')
	{
	    $lastId = $companyController->createCompany();
	    echo $lastId;
	}
	elseif($_GET['action'] == 'updateCompany')
	{
	    $companyController->updateCompany();
	}
	elseif($_GET['action'] == 'deleteCompany')
	{
	    $companyController->deleteCompany();
	}
	elseif($_GET['action'] == 'createClient')
	{
	    $lastId = $clientController->createClient();
	    echo $lastId;
	}
	elseif($_GET['action'] == 'updateClient')
	{
	    $clientController->updateClient();
	}
	elseif($_GET['action'] == 'deleteClient')
	{
	    $data = $clientController->deleteClient();
	    echo $data->getIdClient();
	}
	elseif($_GET['action'] == 'getAllSessionByFilter')
	{
	    $sessions = $sessionController->getAllSessionByFilter();
	
	    foreach ($sessions as $session)
	    {
		$companies[$session->getIdCompany()] = $companyController->getCompanyById($session->getIdCompany())->getName();

		$candidate = $candidateController->getCandidateById($session->getIdCandidate());
		$candidatesFirstname[$session->getIdCandidate()] = $candidate->getFirstName();
		$candidatesLastname[$session->getIdCandidate()] = $candidate->getLastname();	    
	    }
	    
	    if($sessions){
		$smarty->assign('companies', $companies);
		$smarty->assign('candidatesFirstname', $candidatesFirstname);
		$smarty->assign('candidatesLastname', $candidatesLastname);
	    }
	    
	    $smarty->assign('sessions', $sessions);
	    $smarty->display('Session/getAllSessionByFilter.tpl');
	}
    }
    else
    {
        $smarty->display('Header.tpl');
	
	$companyList = $companyController->getAllCompany();
	$sessions = $sessionController->getAllSessionByFilter();
	
	foreach ($sessions as $session)
	{
	    $companies[$session->getIdCompany()] = $companyController->getCompanyById($session->getIdCompany())->getName();
	    
	    $candidate = $candidateController->getCandidateById($session->getIdCandidate());
	    $candidatesFirstname[$session->getIdCandidate()] = $candidate->getFirstName();
	    $candidatesLastname[$session->getIdCandidate()] = $candidate->getLastname();	    
	}
	
	if($sessions)
	{
	    $smarty->assign('companies', $companies);
	    $smarty->assign('candidatesFirstname', $candidatesFirstname);
	    $smarty->assign('candidatesLastname', $candidatesLastname);
	}
	
	$smarty->assign('sessions', $sessions);
	$smarty->assign('companyList', $companyList);
        $smarty->display('Dashboard.tpl');
        $smarty->display('Footer.tpl');
    }
}
else
{
    if(isset($_GET['connexion']))
    {
        
        $data = $userController->passwordVerify();

        if($data)
        {
            $_SESSION['username'] = $data->getUsername();
            $_SESSION['role'] = $data->getRole();
            $data = json_encode($data);
        }
        
        echo $data;   
    }
    else
    { 
        $smarty->display('Homepage.tpl');
        $smarty->display('Footer.tpl');
    }
}


    

