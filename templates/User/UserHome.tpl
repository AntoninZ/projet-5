<section class="UserHome">
    <article>
	<form>
	    <div>
		<label for="username">Pseudo :</label>
		<input type="text" id="username" value="{$smarty.session.username}">
	    </div>
	    <div>
		<label for="password">Modifier votre mot de passe :</label>
		<input type="password" id="password">
	    </div>
	    <div>
		<label for="passwordCheck">Confirmation mot de passe :</label>
		<input type="password" id="passwordCheck">
	    </div>
	    <button type="submit" id="btnUpdateUser">Sauvegarder changement</button>
	</form>
    </article>
</section>