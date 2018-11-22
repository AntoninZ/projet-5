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
                
		if($sessions)
		{
		
		    foreach ($sessions as $session)
		    {
			$companies[$session->getIdCompany()] = $companyController->getCompanyById($session->getIdCompany())->getName();
		    }
                    $smarty->assign('sessions', $sessions);
		    $smarty->assign('companies', $companies);
		}
		
                $smarty->assign('candidate', $candidate);
                $smarty->display('Candidate/GetCandidate.tpl');
                $smarty->display('Session/SessionCreate.tpl');
            }
            elseif(isset($_GET['idSession']))
            {
                $session = $sessionController->getSession();
                $smarty->assign('session', $session);
                $smarty->display('Session/GetSession.tpl');
            }
            else
            {
                $smarty->display('Candidate/CandidateHome.tpl');
            }
        }
        elseif($_GET['page'] == 'companies')
        {
	    if(isset($_GET['idCompany']))
	    {
		$clients = $clientController->getAllClient();
		
		$smarty->assign('clients', $clients);
		$smarty->display('Client/GetAllClient.tpl');
	    }
	    elseif(isset($_GET['idClient']))
	    {
		$client = $clientController->getClient();
		$smarty->assign('client', $client);
		$smarty->display('Client/GetClient.tpl');
	    }
	    else
	    {
		$companies = $companyController->getAllCompany();
		$smarty->assign('companies', $companies);
		$smarty->display('Company/CompanieHome.tpl');
	    }
        }
        elseif($_GET['page'] == "settings")
        {
            $smarty->display('User/Users.tpl');
        }
        
        $smarty->display('Footer.tpl');
    }
    elseif(isset($_GET['action']))
    {
        if($_GET['action'] == 'search')
        {
            $candidateController = new CandidateController();
            $data = $candidateController->getAllCandidate();
            $data = json_encode($data);
            $smarty->assign('data', $data);
            $smarty->display('Candidate/SearchResult.tpl');
            echo $data;
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
	elseif($_GET['action'] == 'createSession')
	{
	    $sessionController->createSession();
	}
    }
    else
    {
        $smarty->display('Header.tpl');
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


    

