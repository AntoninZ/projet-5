<section class="getAllClient">
    <article class="articleForm columns-disabled">
	<h2 class="colored-title"><i class="fas fa-minus"></i>Entreprise : {$company->getName()}</h2>
	<form>
	    <input type="text" class="noShow" id="idCompany" value="{$smarty.get.idCompany}">
	    <div>
		<label for="name">Nom :</label>
		<input type="text" id="name" value="{$company->getName()}">
	    </div>
	    <button type="submit" id="btnUpdateCompany">Sauvegarder</button>
	</form>
    </article>
	    
    <article class="articleForm columns-disabled">
	<h2 class="colored-title"><i class="fas fa-plus"></i>Ajouter un client</h2>
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
	<h2 class="colored-title"><i class="fas fa-plus"></i>Liste des clients</h2>
	<div class="tablePadding">
	    <table class="dataTable">
		<thead>
		    <tr>
			<th>N°</th>
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
			<td></td>
			<td>{$client->getLastname()}</td>
			<td>{$client->getFirstname()}</td>
			<td>{$client->getPhoneNumber()}</td>
			<td>{$client->getCellphoneNumber()}</td>
			<td>{$client->getEmail()}</td>
			<td><a href="?page=clients&amp;idClient={$client->getIdClient()}"><i class="fas fa-external-link-alt"></i></a></td>
			<td><button onclick="Client.deleteClient({$client->getIdClient()})"><i class="fas fa-trash-alt"></i></button></td>
		    </tr>
		    {/foreach}
		</tbody>
	    </table>
	</div>
    </article>
</section>