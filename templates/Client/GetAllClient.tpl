<section class="getAllClient">
    
    <article class="articleForm createClient">
	<h2>Ajouter un client</h2>
	<hr />
	
	<form>
	    <input type="text" class="noShow" id="idCompany" value="{$smarty.get.idCompany}">
	    <div>
		<label for="lastname">Nom :</label>
		<input type="text" id="lastname">
	    </div>
	    
	    <div>
		<label for="firstname">Prénom :</label>
		<input type="text" id="firstname">
	    </div>
	    
	    <div>
		<label for="email">Email :</label>
		<input type="text" id="email">
	    </div>
	    
	    <button id="btnCreateClient">Ajouter client</button>
	</form>
    </article>
    
    <article>
	<table>
	    <thead>
		<tr>
		    <th>Nom</th>
		    <th>Prénom</th>
		    <th>Tél fixe</th>
		    <th>Tél port</th>
		    <th>Email</th>
		    <th>Accéder</th>
		    <th>Supprimer</th>
		</tr>
	    </thead>
	    <tbody>
		{foreach from=$clients item=client}
		<tr>
		    <td>{$client->getLastname()}</td>
		    <td>{$client->getFirstname()}</td>
		    <td>{$client->getPhoneNumber()}</td>
		    <td>{$client->getCellphoneNumber()}</td>
		    <td>{$client->getEmail()}</td>
		    <td><a href="?page=clients&amp;idClient={$client->getIdClient()}">Accéder</a></td>
		    <td><button onclick="Client.deleteClient({$client->getIdClient()})"><i class="fas fa-trash-alt"></i></button></td>
		</tr>
		{/foreach}
	    </tbody>
	</table>
    </article>
</section>