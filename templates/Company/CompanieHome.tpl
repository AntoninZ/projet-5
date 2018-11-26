<section>
    <article class="articleForm createCompany">
	<h2>Ajouter une entreprise</h2>
	<hr />
	<form>
	    <div>
		<label for="name">Nom :</label>
		<input type="text" id="name">
	    </div>
	    
	    <button id="btnCreateCompany">Ajouter une entreprise</button>
	</form>
    </article>
    <article>
	<h2>Liste des entreprises</h2>
	<hr />
	<table>
	    <thead>
		<tr>
		    <th>Entreprise</th>
		    <th>Accéder</th>
		</tr>  
	    </thead>
	    <tbody>
		{foreach from=$companies item=company}
		{if $company->getName() eq 'INDEPENDANT'}
		{else}
		<tr>
		    <td>{$company->getName()}</td>
		    <td><a href="?page=clients&amp;idCompany={$company->getIdCompany()}">Accéder</a></td>
		</tr>
		{/if}
		{/foreach}
	    </tbody>
	</table>
    </article>
</section>