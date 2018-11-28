<section class="dashboard">
    <article class="articleForm columns-2">
	<h2>Recherche par sessions</h2>
	<hr />
	<form>
	    <div>
		<div>
		    <label for="date">Date :</label>
		    <input type="date" id="date" value="{$smarty.now|date_format:"%Y-%m-%d"}">
		</div>
		
		<div>
		    <label for="filterDate">Filtré par :</label>
		    <select id="filterDate">
			<option value="day">Jour</option>
			<option value="month" selected="selected">Mois</option>
			<option value="year">Année</option>
		    </select>
		</div>
	    </div>
	    <div>
		<div>
		    <label for="idCompany">Entreprise :</label>
		    <select id="idCompany">
			<option value=""></option>
			{foreach from=$companyList item=company}
			    <option value="{$company->getIdCompany()}">{$company->getName()}</option>
			{/foreach}
		    </select>
		</div>
		    
		<div>
		    <label for="grade">Degré d'évaluation :</label>
		    <select id="grade">
			<option value=""></option>
			<option value="Degré 3">Degré 3</option>
			<option value="Degré 2">Degré 2</option>
			<option value="Degré 1">Degré 1</option>
			<option value="Conducteur">Conducteur</option>
			<option value="Permis">Permis</option>
		    </select>
		</div>
		
		<div>
		    <label for="aptitude">Aptitude :</label>
		    <select id="aptitude">
			<option value=""></option>
			<option value="Apte">Apte</option>
			<option value="Inapte">Inapte</option>
		    </select>
		</div>
	    </div>
		
	    <div class="flex-inline">
		<button id="btnGetAllSessionByFilter">Recherche</button>
	    </div>
	</form>
    </article>
	
    <article id="articleGetAllSessionByFilter">
	<h2>Sessions du mois</h2>
	<hr />
	<table class="dataTable">
	    <thead>
		<tr>
		    <th>N°</th>
		    <th>Date</th>
		    <th>Nom</th>
		    <th>Prénom</th>
		    <th>Entreprise</th>
		    <th>Degré</th>
		    <th>Aptitude</th>
		</tr>
	    </thead>
	    <tbody>
		{foreach from=$sessions item=session}
		    {assign var=idCompany value=$session->getIdCompany()}
		    {assign var=idCandidate value=$session->getIdCandidate()}
		<tr>
		    <td>{* DATA generate by DataTables *}</td>
		    <td>{$session->getDate()}</td>
		    <td>{$candidatesLastname.$idCandidate}</td>
		    <td>{$candidatesFirstname.$idCandidate}</td>
		    <td>{$companies.$idCompany}</td>
		    <td>{$session->getGrade()}</td>
		    <td>{$session->getAptitude()}</td>
		</tr>
		{/foreach}
	    </tbody>
	</table>
    </article>
</section>

