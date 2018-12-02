<section>
    <article class="articleForm columns-2">
	<h2 class="center">{$user->getUsername()}</h2>
	<h3 class="colored-title">Modifier l'utilisateur</h3>
	<hr/>
	<form>
	    <div>
		<input type="text" class="noShow" id="idUser" value="{$user->getIdUser()}">
		
		<div>
		    <label for="username">Nom/Prénom :</label>
		    <input type="text" id="username" value="{$user->getUsername()}">
		</div>
		
		<div>
		    <label for="adeliNumber">Numéro ADELI</label>
		    <input type="text" id="adeliNumber" value="{$user->getAdeliNumber()}">
		</div>
	    </div>
	    
	    <div>
		<div>
		    <label for="gender">Sexe :</label>
		    <select id="gender">
			<option value="male" {if $user->getGender() == 'male'}selected="selected"{/if}>Homme</option>
			<option value="female" {if $user->getGender() == 'female'}selected="selected"{/if}>Femme</option>
		    </select>
		</div>
		<div>
		    <label for="role">Rôle</label>
		    <select id="role">
			<option value="psychologist" {if $user->getRole() == 'psychologist'}selected="selected"{/if}>Psychologue</option>
			<option value="assistant" {if $user->getRole() == 'assistant'}selected="selected"{/if}>Assistant</option>
		    </select>
		</div>
	    </div>
	    
	    <button type="submit" id="btnUpdateUserAccount">Sauvegarder</button>
	</form>
    </article>
</section>