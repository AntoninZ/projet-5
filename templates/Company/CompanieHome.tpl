<section>
    <article class="articleForm columns-disabled coloredForm">
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
	<table class="dataTable">
	    <thead>
		<tr>
		    <th>N°</th>
		    <th>Entreprise</th>
		    <th>Accéder</th>
		</tr>  
	    </thead>
	    <tbody>
		{foreach from=$companies item=company}
		{if $company->getName() eq 'INDEPENDANT'}
		{else}
		<tr>
		    <td>{* INDEX generate by DataTable *}</td>
		    <td>{$company->getName()}</td>
		    <td><a href="?page=clients&amp;idCompany={$company->getIdCompany()}"><i class="fas fa-external-link-alt"></i></a></td>
		</tr>
		{/if}
		{/foreach}
	    </tbody>
	</table>
    </article>
</section>