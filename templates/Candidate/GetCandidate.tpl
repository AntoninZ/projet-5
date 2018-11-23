<section class="getCandidate">
    <article class="articleForm updateCandidate">
	<h2>Information candidat</h2>
	<hr />
	
	<form>
	    <div>
		<input type="text" id="idCandidate" class="noShow" value="{$candidate->getIdCandidate()}">

		<div>
		    <label for="lastname">Nom :</label>
		    <input type="text" name="lastname" id="lastname" value="{$candidate->getLastname()}">
		</div>

		<div>
		    <label for="firstname">Prénom :</label>
		    <input type="text" name="firstname" id="firstname" value="{$candidate->getFirstname()}">
		</div>

		<div>
		    <label for="birthDate">Date de naissance :</label>
		    <input type="date" name="birthDate" id="birthDate" value="{$candidate->getBirthDate()}">
		</div>

		<div>
		    <label for="gender">Sexe :</label>
		    <select name="gender" id="gender">
			<option value="male" {if $candidate->getGender() eq 'male'}selected="selected"{/if}>Homme</option>
			<option value="female" {if $candidate->getGender() eq 'female'}selected="selected"{/if}>Femme</option>
		    </select>
		</div>
	    </div>
	    <div>
		<div>
		    <label for="email">Email :</label>
		    <input type="text" name="email" id="email" value="{$candidate->getEmail()}">
		</div>

		<div>
		    <label for="phoneNumber">Tél fixe :</label>
		    <input type="text" name="phoneNumber" id="phoneNumber" value="{$candidate->getPhoneNumber()}">
		</div>

		<div>
		    <label for="cellphoneNumber">Tél port :</label>
		    <input type="text" name="cellphoneNumber" id="cellphoneNumber" value="{$candidate->getCellphoneNumber()}">
		</div>

		<div>
		    <label for="address">Adresse :</label>
		    <input type="text" name="address" id="address" value="{$candidate->getAddress()}">
		</div>

		<div>
		    <label for="allowable">A déjà annulé</label>
		    <select id="allowable">
			<option value="true" {if $candidate->getAllowable() eq 'true'}selected="selected"{/if}>Non</option>
			<option value="false" {if $candidate->getAllowable() eq 'false'}selected="selected"{/if}>Oui</option> 
		    </select>
		</div>
	    </div>
		    
	    <button type="submit" id="btnUpdateCandidate">Sauvegarder changement</button>
	</form>
    </article>
		    
    <article class="articleForm updateCandidateWithoutSession">
	<h2>Information de réservation</h2>
	<hr />
	<form>
	    <div>
		<div>
		    <label for="reservationDate">Date de réservation :</label>
		    <input type="date" id="reservationDate" value="{$candidate->getReservationDate()}">
		</div>
		
		<div>
		    <label for="downPayment">Acompte :</label>
		    <select id="downPayment">
			<option value="yes" {if $candidate->getDownPayment() eq 'yes'}selected="selected"{/if}>Oui</option>
			<option value="verify" {if $candidate->getDownPayment() eq 'verify'}selected="selected"{/if}>A vérifier</option>
			<option value="no" {if $candidate->getDownPayment() eq 'no'}selected="selected"{/if}>Non</option>
		    </select>
		</div>
	    
	    </div>
	    <div>
		<div>
		    <label for="creationDate">Date de création :</label>
		    <input type="date" id="creationDate" value="{$candidate->getCreationDate()}">
		</div>

		<div>
		    <label for="meeting">Afficher le candidat :</label>
		    <select id="meeting">
			<option value="true" {if $candidate->getMeeting() eq 'true'}selected="selected"{/if}>Oui</option>
			<option value="false" {if $candidate->getMeeting() eq 'false'}selected="selected"{/if}>Non</option>
		    </select>
		</div>
	    </div>
		    
	    <div class="assistantNote">
		<label for="assistantNote">Note de réservation :</label>
		<textarea id="assistantNote"></textarea>
	    </div>
		
		<button type="submit" id="btnUpdateCandidateWithoutSession">Sauvegarder changement</button>
	</form>
    </article>
		    
    <article class="articleForm createSession">
	<h2>Créer une session</h2>
	<hr />
	<form>
	    <div>
		<div>
		    <label for="idUser">Psychologue :</label>
		    <select id="idUser">
			{foreach from=$users item=user}
			    <option value="{$user->getIdUser()}">{$user->getUsername()}</option>
			{/foreach}
		    </select>
		</div>
		<div>
		    <label for="idCompany">Entreprise :</label>
		    <select id="idCompany">
			{foreach from=$companyList item=company}
			    <option value="{$company->getIdCompany()}">{$company->getName()}</option>
			{/foreach}
		    </select>
		</div>
		<div>
		    <label for="aptitude">Aptitude :</label>
		    <select id="aptitude">
			<option value=""></option>
			<option value="Apte">Apte</option>
			<option value="Inapte">Inapte</option>
		    </select>
		</div>
	    </div>
	    <div>

		<div>
		    <label for="price">Prix de l'évaluation :</label>
		    <input type="text" id="price">
		</div>

		<div>
		    <label for="computerStation">Ordinateur du candidat :</label>
		    <select id="computerStation" name="computerStation">
			<option value=""></option>
			<option value="4">4</option>
			<option value="3">3</option>
			<option value="2">2</option>
			<option value="1">1</option>
		   </select>
		</div>
		
		<div>
		    <label for="date">Date :</label>
		    <input type="date" id="date" value="{$smarty.now|date_format:"%Y-%m-%d"}">
		</div>
	    </div>
	    
	    <div class="psychologistNote">
		<label for="psychologistNote">Note du psychologue :</label>
		<textarea id="psychologistNote"></textarea>
	    </div>

	    <button type="submit" id="btnCreateSession">Créer une session</button>
	</form>
    </article>
	    
    {if isset($sessions)}
    <article>
    <h2>Sessions du candidat</h2>
    <hr />
    <table>
	<thead>
	    <tr>
		<th>Date</th>
		<th>Entreprise</th>
		<th>Aptitude</th>
		<th>Accéder</th>
	    </tr>
	</thead>
	<tbody>
	{foreach from=$sessions item=session}
	    <tr>
		<td>{$session->getDate()|date_format:"%d/%m/%Y"}</td>
		<td>
		    {assign var=idCompany value=$session->getIdCompany()}
		    {$companies.$idCompany}
		</td>
		<td>{$session->getAptitude()}</td>
		<td><a href="?page=session&amp;idSession={$session->getIdSession()}&amp;lastname={$candidate->getlastname()}&amp;firstname={$candidate->getFirstname()}">Accéder</a></td>
	    </tr>  
	{/foreach}
	</tbody>
    </table>
    </article>
    {/if}
</section>