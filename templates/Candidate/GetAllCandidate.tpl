<table class="dataTable">
    <thead>
	<tr>
	    <th>N°</th>
	    <th>Nom</th>
	    <th>Prénom</th>
	    <th>Date de naissance</th>
	    <th>Accéder</th>
	</tr>
    </thead>
    <tbody>
	{foreach from=$candidates item=candidate}
	    <tr>
		<td></td>
		<td>{$candidate->getLastname()}</td>
		<td>{$candidate->getFirstname()}</td>
		<td>{$candidate->GetBirthDate()|date_format:"%d/%m/%Y"}</td>
		<td><a href="?page=candidates&amp;idCandidate={$candidate->GetIdCandidate()}"><i class="fas fa-external-link-alt"></i></a></td>
	    </tr>
	{/foreach}
    </tbody>
</table>