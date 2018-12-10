<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Psychafeb - Intranet</title>
        <link rel="icon" type="image/png" href="./Public/images/logo.png" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.2/css/responsive.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="./Public/css/style.css" />
    </head>
    
    <body>
	<section class="printAttestation">
	    <header class="printHeader">
		<img src="/projet-5/Public/images/logo.png" alt="logo" />
		<p><span class="bold">Daniel ZIMMER</span><br/>
		    Psychologue diplômé d’état<br/>
		    <span class="bold">Evaluations, tests psychotechniques, bilans</span><br/>
		    <span class="bold">Agréé par la commission ferroviaire d’aptitudes</span><br/>
		</p>
	    </header>
	    
	    <div>
		<p class="bold center size-16">
		    {if $session->getGrade() == 'Conducteur'}
			Certificat initial d'aptitude psychologique pour l'habiliation de la fonction de sécurité du métier de conducteur de train
		    {else}
			Note d’évaluation des aptitudes psychologiques des agents affectés à des tâches essentielles pour la sécurité
			autres que la conduite de trains : 
			{if $session->getGrade() == 'Degré 3'}
			    Degré 3
			{elseif $session->getGrade() == 'Degré 2'}
			    Degré 2
			{elseif $session->getGrade() == 'Degré 1'}
			    Degré 1
			{/if}
		    {/if}
		</p>
		{if $company->getName() != 'INDEPENDANT'}<p class="bold center size-16">Pour le compte de la société {$company->getName()}</p>{/if}
		<p class="center size-12">
		    {if $session->getGrade() == 'Conducteur'}
			(Décret N°2010-708 du 29 juin 2010 et arrêté du 17 juillet 2015 modifiant l'arrêté du 6 août 2010 relatifs à la certification des conducteurs de trains)
		    {else}
			(Arrêté du 13 juillet 2017 modifiant l’arrêté du 7 mai 2015)
		    {/if}
		</p>
	    </div>
	    
	    <div>
		<p class="size-12 right">
			Je soussigné{if $user->getGender() == 'female'}e{/if}, {$user->getUsername()}, psychologue, certifie avoir reçu le 
			<span class="bold">
			    {$session->getDate()|date_format:"%A %d %B %Y":"fr_FR"|utf8_encode}
			</span>,
		</p>
		<p class="justify size-12 no-margin-top">
		    <span class="bold">
		    M{if $candidate->getGender() == 'female'}me{/if}. 
			{$candidate->getLastname()|upper} 
			{$candidate->getFirstname()}
		    </span>
		    et, au vu des résultats obtenus sur l’ensemble des tests, des investigations à l’entretien et des comportements à l’examen,
		</p>

		<p class="justify size-12">
		    <span class="bold">
		    M{if $candidate->getGender() == 'female'}me{/if}. 
			{$candidate->getLastname()|upper} 
			{$candidate->getFirstname()}
		    </span>
		    né{if $candidate->getGender() == 'female'}e{/if} le 
		    <span class="bold">
			{$candidate->getBirthDate()|date_format:"%d/%m/%Y"}
		    </span> 

		    <span class="bold underline size-12">
			{if $session->getAptitude() == 'Inapte'}ne répond pas{else}répond{/if}
		    </span><sup class="size-10"> 1</sup> 
		    {if $session->getGrade() == 'Conducteur'}
			aux exigences psychologiques formulées pour l’habilitation à l’exercice de la fonction conducteur de trains<sup class="size-10"> 2</sup>.
		    {else}
			aux exigences formulées pour les aptitudes psychologiques
			des agents affectés à des tâches essentielles pour la sécurité autres que la conduite des trains
		    
		    <span class="bold">
			{if $session->getGrade() == 'Degré 3'}
			    degré 3
			{elseif $session->getGrade() == 'Degré 2'}
			    degré 2
			{elseif $session->getGrade() == 'Degré 1'}
			    degré 1
			{/if}
		    </span>
		    <span class="italic size-10">(Arrêté du 13 juillet 2017 modifiant l’arrêté du 7 mai 2015, Annexe VII - 
			{if $session->getGrade() == 'Degré 3'}
			    c
			{elseif $session->getGrade() == 'Degré 2'}
			    b
			{elseif $session->getGrade() == 'Degré 1'}
			    a
			{/if})</span>.
		    {/if}
		</p>
	    </div>
	    
	    <div class="flexible">
		<p class="size-12">
		    {$user->getUsername()}, psychologue<br/>
		    <span class="bold">Numéro ADELI:</span> {$user->getAdeliNumber()}
		</p>
		
		<p class="size-12">
		    Evaluation psychologique réalisée<br/>
		    à <span class="bold">Juvisy sur Orge le {$session->getDate()|date_format:'%d/%m/%Y'}</span>
		</p>
	    </div>
	    
	    <p class="italic marg-30">Copie à transmettre à l’intéressé{if $candidate->getGender() == 'female'}e{/if}</p>
	    <hr />
	    <p class="size-10 justify">
		<sup>1</sup> En cas de difficulté ou de désaccord de l’intéressé ou de son employeur à propos du
		certificat d’aptitude psychologique délivré, un recours auprès de la Commission ferroviaire d’aptitudes peut être
		exercé dans un délai de deux mois à compter de la date où le certificat a été remis. Tout recours doit être expédié
		par voie postale à la Commission ferroviaire d’aptitudes.<br /> 
		[Ministère des transports, Secrétariat du bureau SRF2-Recours devant la Commission- Grande Arche de la Défense-Paroi
		Sud, 92055 LA DEFENSE Cedex]<br />
		{if $session->getGrade() == 'Conducteur'}<sup>2</sup> Selon l'annexe II, partie II de l'arrêté du 6 août 2010 relatif à la certification des conducteurs de train modifié par l'arrêté du 17 juillet 2015.{/if}
	    </p>
	    <p class="printFooter">53 rue Monttessuy 91260 Juvisy sur Orge Tél: 01.69.21.33.32 Email : dzimmer@psychafeb.com</p>
	</section>
    </body>
</html>
