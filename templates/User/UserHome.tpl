<section class="UserHome">
    <article class="articleForm columns-disabled">
	<h2 class="center">{$user->getUsername()|ucfirst}</h2>
	<h3 class="colored-title">Paramètre de compte</h3>
	<form>
	    <input type="text" class="noShow" id="idUser" value="{$user->getIdUser()}">
	    <div>
		<label for="password">Nouveau mot de passe :</label>
		<input type="password" id="password">
	    </div>
		
	    <div>
		<label for="passwordCheck">Confirmer :</label>
		<input type="password" id="passwordCheck">
	    </div>
		
	    <button type="submit" id="btnUpdateUserPassword">Sauvegarder changement</button>
	</form>
	{if $user->getRole() == 'psychologist'}
	    <a class="center" href="?page=getAllUser">Administrer les comptes</a>
	{/if}
    </article>
</section>