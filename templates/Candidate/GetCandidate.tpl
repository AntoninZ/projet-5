<section class="getCandidate">
    <article class="articleForm columns-2 updateCandidate">
	<h2 class="colored-title"><i class="fas fa-minus"></i>Information candidat</h2>
	
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
		    <input type="text" name="email" id="email" value="{$candidate->getEmail()}" placeholder ="xxxx@xxxx.xxx">
		</div>

		<div>
		    <label for="phoneNumber">Tél fixe :</label>
		    <input type="text" name="phoneNumber" id="phoneNumber" value="{$candidate->getPhoneNumber()}" placeholder="0102030405">
		</div>

		<div>
		    <label for="cellphoneNumber">Tél port :</label>
		    <input type="text" name="cellphoneNumber" id="cellphoneNumber" value="{$candidate->getCellphoneNumber()}" placeholder="0601020304">
		</div>

		<div>
		    <label for="address">Adresse :</label>
		    <input type="text" name="address" id="address" value="{$candidate->getAddress()}">
		</div>
		
		<div>
		    <label for="zipCode">Code postal :</label>
		    <input type="text" id="zipCode" value="{$candidate->getZipCode()}" placeholder="91260">
		</div>
		
		<div>
		    <label for="city">Ville :</label>
		    <input type="text" id="city" value="{$candidate->getCity()}">
		</div>

		<div>
		    <label for="allowable">A déjà annulé</label>
		    <select id="allowable">
			<option value="true" {if $candidate->getAllowable() eq 'true'}selected="selected"{/if}>Non</option>
			<option value="false" {if $candidate->getAllowable() eq 'false'}selected="selected"{/if}>Oui</option> 
		    </select>
		</div>
	    </div>
	    <div>    
		<button type="submit" id="btnUpdateCandidate">Sauvegarder changement</button>
	    </div>
	</form>
    </article>
		    
    <article class="articleForm columns-2 updateCandidateWithoutSession">
	<h2 class="colored-title"><i class="fas fa-plus"></i>Information de réservation</h2>
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
		<textarea id="assistantNote">{$candidate->getAssistantNote()}</textarea>
	    </div>
		
		<button type="submit" id="btnUpdateCandidateWithoutSession">Sauvegarder changement</button>
	</form>
    </article>
		    
    <article class="articleForm columns-2 createSession">
	<h2 class="colored-title"><i class="fas fa-plus"></i>Créer une session</h2>
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
		    <label for="grade">Degré d'évaluation :</label>
		    <select id="grade">
			<option value="Degré 3">Degré 3</option>
			<option value="Degré 2">Degré 2</option>
			<option value="Degré 1">Degré 1</option>
			<option value="Conducteur">Conducteur</option>
			<option value="Permis">Permis</option>
		    </select>
		</div>
	    </div>
	    <div>
		<div>
		    <label for="aptitude">Aptitude :</label>
		    <select id="aptitude">
			<option value="">Choisir</option>
			<option value="Apte">Apte</option>
			<option value="Inapte">Inapte</option>
		    </select>
		</div>
		<div>
		    <label for="price">Prix de l'évaluation :</label>
		    <input type="text" id="price" placeholder="000">
		</div>

		<div>
		    <label for="computerStation">Ordinateur du candidat :</label>
		    <select id="computerStation" name="computerStation">
			<option value="">Choisir</option>
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
    <h2 class="colored-title"><i class="fas fa-plus"></i>Sessions du candidat</h2>
    <div class="tablePadding">
	<table class="dataTable">
	    <thead>
		<tr>
		    <th>N°</th>
		    <th>Date</th>
		    <th>Entreprise</th>
		    <th>Degré d'évaluation</th>
		    <th>Aptitude</th>
		    <th>Accéder</th>
		</tr>
	    </thead>
	    <tbody>
	    {foreach from=$sessions item=session}
		<tr>
		    <td></td>
		    <td>{$session->getDate()|date_format:"%d/%m/%Y"}</td>
		    <td>
			{assign var=idCompany value=$session->getIdCompany()}
			{$companies.$idCompany}
		    </td>
		    <td>{$session->getGrade()}</td>
		    <td>{$session->getAptitude()}</td>
		    <td><a href="?page=session&amp;idSession={$session->getIdSession()}&amp;lastname={$candidate->getlastname()}&amp;firstname={$candidate->getFirstname()}"><i class="fas fa-external-link-alt"></i></a></td>
		</tr>  
	    {/foreach}
	    </tbody>
	</table>
    </div>
    </article>
    {/if}
    {if $smarty.session.role == 'psychologist'}
	<p class="deleteOption" onclick="Candidate.deleteCandidate({$candidate->getIdCandidate()})">Supprimer toutes les informations du candidat</p>
    {/if}
</section>