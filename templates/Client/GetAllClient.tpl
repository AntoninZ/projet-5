<section>
    <table>
	<thead>
	    <tr>
		<th>Nom</th>
		<th>Prénom</th>
		<th>Tél fixe</th>
		<th>Tél port</th>
		<th>Accéder</th>
	    </tr>
	</thead>
	<tbody>
	    {foreach from=$clients item=client}
	    <tr>
		<td>{$client->getLastname()}</td>
		<td>{$client->getFirstname()}</td>
		<td>{$client->getPhoneNumber()}</td>
		<td>{$client->getCellphoneNumber()}</td>
		<td><a href="?page=companies&amp;idClient={$client->getIdClient()}">Accéder</a></td>
	    </tr>
	    {/foreach}
	</tbody>
    </table>
</section>