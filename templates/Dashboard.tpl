<section class="dashboard">
    <form>
	<label for="date">Date :</label>
	<input type="date" id="date" value="{$smarty.now|date_format:"%Y-%m-%d"}">

	<label for="filterDate">Filtré par :</label>
	<select id="filterDate">
	    <option value="day">Jour</option>
	    <option value="month" selected="selected">Mois</option>
	    <option value="year">Année</option>
	</select>

	<label for="idCompany">Entreprise :</label>
	<select id="idCompany">
	    <option value=""></option>
	    {foreach from=$companyList item=company}
		<option value="{$company->getIdCompany()}">{$company->getName()}</option>
	    {/foreach}
	</select>

	<label for="grade">Degré d'évaluation :</label>
	<select id="grade">
	    <option value=""></option>
	    <option value="Degré 3">Degré 3</option>
	    <option value="Degré 2">Degré 2</option>
	    <option value="Degré 1">Degré 1</option>
	    <option value="Conducteur">Conducteur</option>
	    <option value="Permis">Permis</option>
	</select>

	<label for="aptitude">Aptitude :</label>
	<select id="aptitude">
	    <option value=""></option>
	    <option value="Apte">Apte</option>
	    <option value="Inapte">Inapte</option>
	</select>
	
	<button id="btnGetAllSessionByFilter">Recherche</button>
    </form>
	
	<article>
	    <table id="resultSession">
		<thead>
		    <tr>
			<th>N°</th>
			<th>Date</th>
			<th>Nom</th>
			<th>Prénom</th>
			<th>Entreprise</th>
			<th>Degré</th>
			<th>Aptitude</th>
		    </tr>
		</thead>
		<tbody>
		    {*if $sessions}
			{assign var=i value=0}
			{foreach from=$sessions item=session}
			<tr>
			    <td>
				{assign var=i value=$i+1}
				{$i}
			    </td>
			    <td>{$session->getDate()}</td>
			    <td>{$session->getIdCandidate()}</td>
			    <td>{$session->getIdCandidate()}</td>
			    <td>
				{assign var=idCompany value=$session->getIdCompany()}
				{$companies.$idCompany}
			    </td>
			    <td>{$session->getGrade()}</td>
			    <td>{$session->getAptitude()}</td>
			</tr>
			{/foreach}
		    {else}
			<tr>
			    <td colspan="7">Aucun résultat</td>
			</tr>
		    {/if*}
		</tbody>
	    </table>
	</article>
</section>

