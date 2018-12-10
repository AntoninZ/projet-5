<table class="dataTable">
    <h2>Résultats de la recherche</h2>
    <hr />
    <thead>
	<tr>
	    <th>N°</th>
	    <th>Date</th>
	    <th>Nom</th>
	    <th>Prénom</th>
	    <th>Entreprise</th>
	    <th>Degré</th>
	    <th>Aptitude</th>
	    <th>Accéder</th>
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
	    <td><a href="?page=candidates&amp;idCandidate={$session->getIdCandidate()}"><i class="fas fa-external-link-alt"></i></a></td>
	</tr>
	{/foreach}
    </tbody>
</table>