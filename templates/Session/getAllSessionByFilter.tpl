{if $sessions}
    
    {for $i = 1 to $sessions|@count}
	<p id="idPage-{$i}">{$i}</p>
    {/for}
{/if}
FINIR LE SYSTEME DE PAGINATION 
<table>
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

	{if $sessions}
	    {assign var=a value=0}
	    {for $i = 0 to $sessions|@count-1}
		{for $j = 0 to $sessions[$i]|@count-1} 
		    <tr>
			<td>
			    {assign var=a value=$a+1}
			    {$a}
			</td>
			<td>{$sessions[$i][$j]->getDate()}</td>
			<td>{$sessions[$i][$j]->getIdCandidate()}</td>
			<td>{$sessions[$i][$j]->getIdCandidate()}</td>
			<td>
			    {assign var=idCompany value=$sessions[$i][$j]->getIdCompany()}
			    {$companies.$idCompany}
			</td>
			<td>{$sessions[$i][$j]->getGrade()}</td>
			<td>{$sessions[$i][$j]->getAptitude()}</td>
		    </tr>
		{/for}
	    {/for}
	{else}
	    <tr>
		<td colspan="7">Aucun résultat</td>
	    </tr>
	{/if}
    </tbody>
</table>