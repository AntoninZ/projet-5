<section class="getClient">
    <article class="articleForm columns-2 updateClient">
	<h2 class="colored-title">Information client</h2>
	<form>
	    <input type="text" class="noShow" id="idCompany" value="{$client->getIdCompany()}">
	    <input type="text" class="noShow" id="idClient" value="{$client->getIdClient()}">
	    
	    <div>
		<div>
		    <label for="lastname">Nom :</label>
		    <input type="text" id="lastname" value="{$client->getLastname()}">
		</div>

		<div>
		    <label for="firstname">Prénom :</label>
		    <input type="text" id="firstname" value="{$client->getFirstname()}">
		</div>

		<div>
		    <label for="gender">Sexe :</label>
		    <select id="gender">
			<option value="male" {if $client->getGender() eq 'male'}selected="selected"{/if}>Homme</option>
			<option value="female" {if $client->getGender() eq 'female'}selected="selected"{/if}>Femme</option>
		    </select>
		</div>
	    </div>
		    
	    <div>
		<div>
		    <label for="address">Addresse :</label>
		    <input type="text" id="address" value="{$client->getAddress()}">
		</div>

		<div>
		    <label for="zipCode">Code postal :</label>
		    <input type="text" id="zipCode" value="{$client->getZipCode()}">
		</div>

		<div>
		    <label for="city">Ville :</label>
		    <input type="text" id="city" value="{$client->getCity()}">
		</div>

		<div>
		    <label for="phoneNumber">Téléphone fixe :</label>
		    <input type="text" id="phoneNumber" value="{$client->getPhoneNumber()}">
		</div>

		<div>
		    <label for="cellphoneNumber">Téléphone portable :</label>
		    <input type="text" id="cellphoneNumber" value="{$client->getCellphoneNumber()}">
		</div>

		<div>
		    <label for="email">Email :</label>
		    <input type="text"id="email" value="{$client->getEmail()}">
		</div>
	    </div>
	    <div>
		<button id="btnUpdateClient">Sauvegarder changement</button>
	    </div>
	</form>
	
    </article>
</section>