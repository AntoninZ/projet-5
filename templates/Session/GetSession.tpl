<section class="getSession">
    <article class="articleForm columns-2 updateSession">
	<h2>Session du {$session->getDate()|date_format:"%d/%m/%Y"} - {$smarty.get.lastname|upper} {$smarty.get.firstname}</h2>
	<hr />
	<form>
	    <div>
		<input type="text" id="idSession" class="noShow" value="{$smarty.get.idSession}">

		<div>
		    <label for="date">Date de passage :</label>
		    <input type="date" id="date" name="date" value="{$session->getDate()}">
		</div>

		<div>
		    <label for="idCompany">Entreprise :</label>
		    <select id="idCompany">
		    {foreach from=$companies item=company}
			<option value="{$company->getIdCompany()}" {if $company->getIdCompany() eq $session->getIdCompany()}selected="selected"{/if}>{$company->getName()}</option>
		    {/foreach}
		    </select>
		</div>

		<div>
		    <label for="idUser">Psychologue :</label>
		    <select id="idUser">
		    {foreach from=$users item=user}
			<option value="{$user->getIdUser()}" {if $user->getIdUser() eq $session->getIdUser()}selected="selected"{/if}>{$user->getUsername()}</option>
		    {/foreach}
		    </select>
		</div>

		<div>
		    <label for="grade">Degré d'évaluation :</label>
		    <select id="grade">
			<option value="Degré 3" {if $session->getGrade() eq 'Degré 3'}selected="selected"{/if}>Degré 3</option>
			<option value="Degré 2" {if $session->getGrade() eq 'Degré 2'}selected="selected"{/if}>Degré 2</option>
			<option value="Degré 1" {if $session->getGrade() eq 'Degré 1'}selected="selected"{/if}>Degré 1</option>
			<option value="Conducteur" {if $session->getGrade() eq 'Conducteur'}selected="selected"{/if}>Conducteur</option>
			<option value="Permis" {if $session->getGrade() eq 'Permis'}selected="selected"{/if}>Permis</option>
		    </select>
		</div>
	    </div>
		    
	    <div>
		<div>
		    <label for="aptitude">Aptitude :</label>
		    <select id="aptitude">
			<option value="Apte" {if $session->getAptitude() eq 'Apte'}selected="selected"{/if}>Apte</option>
			<option value="Inapte" {if $session->getAptitude() eq 'Inapte'}selected="selected"{/if}>Inapte</option>
		    </select>
		</div>
		
		<div>
		    <label for="computerStation">Ordinateur du candidat :</label>
		    <select id="computerStation">
			<option value="4" {if $session->getComputerStation() eq '4'}selected="selected"{/if}>4</option>
			<option value="3" {if $session->getComputerStation() eq '3'}selected="selected"{/if}>3</option>
			<option value="2" {if $session->getComputerStation() eq '2'}selected="selected"{/if}>2</option>
			<option value="1" {if $session->getComputerStation() eq '1'}selected="selected"{/if}>1</option>
		    </select>
		</div>

		<div>
		    <label for="price">Prix de l'évaluation</label>
		    <input type="text" id="price" value="{$session->getPrice()}">
		</div>
	    </div>
		
	    <div class="psychologistNote">
		<label for="psychologistNote">Note du psychologue :</label>
		<textarea id="psychologistNote">{$session->getPsychologistNote()}</textarea>
	    </div>
	    
	    <button type="submit" id="btnUpdateSession">Sauvegarder</button>
	</form> 
    </article>
</section>