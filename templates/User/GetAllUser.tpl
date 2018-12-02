<section>
    <article class="articleForm columns-2 coloredForm">
	<h2>Ajouter un utilisateur</h2>
	<hr/>
	<form>
	    <div>
		<div>
		    <label for="username">Nom/Prénom :</label>
		    <input type="text" id="username">
		</div>
		<div>
		    <label for="password">Mot de passe :</label>
		    <input type="password" id="password">
		</div>
		<div>
		    <label for="passwordCheck">Confirmer :</label>
		    <input type="password" id="passwordCheck">
		</div>
	    </div>
	    
	    <div>
		<div>
		    <label for="gender">Sexe :</label>
		    <select id="gender">
			<option value="male">Homme</option>
			<option value="female">Femme</option>
		    </select>
		</div>
		<div>
		    <label for="role">Rôle</label>
		    <input type="text" id="role">
		</div>

		<div>
		    <label for="adeliNumber">Numéro ADELI</label>
		    <input type="text" id="adeliNumber">
		</div>
	    </div>
	    
	    <button type="submit" id="btnCreateUser">Ajouter</button>
	</form>
    </article>
    <article class="articleForm columns-disabled">
	<table class="dataTable responsive wrap">
	    <thead>
		<tr>
		    <th>N°</th>
		    <th>Nom/Prénom</th>
		    <th>Rôle</th>
		    <th>Accéder</th>
		</tr>
	    </thead>
	    <tbody>
		{foreach from=$users item=$user}
		<tr>
		    <td></td>
		    <td>{$user->getUsername()}</td>
		    <td>{if $user->getRole() == 'psychologist'}Psychologue{else}Assistant{/if}</td>
		    <td><a href="?page=getUser&amp;idUser={$user->getIdUser()}"><i class="fas fa-external-link-alt" id="btnGetUser"></i></a></td>
		</tr>
		{/foreach}
	    </tbody>
	</table>
    </article>
</section>