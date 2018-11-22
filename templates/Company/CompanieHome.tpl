<section>
    <table>
	<thead>
	    <tr>
		<th>Entreprise</th>
		<th>Accéder</th>
	    </tr>  
	</thead>
	<tbody>
	    {foreach from=$companies item=company}
	    <tr>
		<td>{$company->getName()}</a></td>
		<td><a href="?page=companies&amp;idCompany={$company->getIdCompany()}">Accéder</a></td>
	    </tr>
	    {/foreach}
	</tbody>
    </table>
</section>