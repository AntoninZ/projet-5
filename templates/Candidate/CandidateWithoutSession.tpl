<section class="getAllCandidateWithoutSession">
    <article class="articleForm createCandidateWithoutSession">
	<h2>Ajouter un indépendant</h2>
	<hr />
	<form>
	    <div>
		<div>
		    <label for="lastname">Nom :</label>
		    <input type="text" id="lastname">
		</div>

		<div>
		    <label for="firstname">Prénom :</label>
		    <input type="text" id="firstname">
		</div>

		<div>
		    <label for="email">Email :</label>
		    <input type="text" id="email">
		</div>

		<div>
		    <label for="phoneNumber">Téléphone Fixe :</label>
		    <input type="text" id="phoneNumber">
		</div>

		<div>
		    <label for="cellphoneNumber">Téléphone portable :</label>
		    <input type="text" id="cellphoneNumber">
		</div>
	    </div>
	    
	    <div>
		<div>
		    <label for="creationDate">Date de création :</label>
		    <input type="date" id="creationDate" value="{$smarty.now|date_format:'%Y-%m-%d'}">
		</div>

		<div>
		    <label for="downPayment">Acompte :</label>
		    <select id="downPayment">
			<option value="yes">Oui</option>
			<option value="verify">A verifier</option>
			<option value="no" selected="selected">Non</option>
		    </select>
		</div>

		<div>
		    <label for="reservationDate">Date de réservation :</label>
		    <input type="date" id="reservationDate">
		</div>

		<div>
		    <label for="meeting">Afficher le candidat :</label>
		    <select>
			<option value="true">Oui</option>
			<option value="false">Non</option>
		    </select>
		</div>
	    </div>
		
	    <div class="assistantNote">
		<label for="assistantNote">Note de réservation :</label>
		<textarea id="assistantNote"></textarea>
	    </div>
	    
	    <button type="submit" id="btnCreateCandidateWithoutSession">Ajouter</button>
	</form>
    </article>
    <article>
	<h2>Récapitulatif des candidats indépendants</h2>
	<hr />
	<table>
	    <thead>
		<tr>
		    <th>Date</th>
		    <th>Téléphone port</th>
		    <th>Nom</th>
		    <th>Prénom</th>
		    <th>Email</th>
		    <th>Accompte</th>
		    <th>Rendez-vous</th>
		    <th>Note</th>
		    <th>Accéder</th>
		</tr>
	    </thead>

	    <tbody>
		{foreach from=$candidates item=candidate}
		<tr>
		    <td>{$candidate->getCreationDate()}</td>
		    <td>{$candidate->getCellphoneNumber()}</td>
		    <td>{$candidate->getLastname()}</td>
		    <td>{$candidate->getFirstname()}</td>
		    <td>{$candidate->getEmail()}</td>
		    <td>{$candidate->getDownPayment()}</td>
		    <td>{$candidate->getReservationDate()}</td>
		    <td>{$candidate->getAssistantNote()}</td>
		    <td><a href="?page=candidates&amp;idCandidate={$candidate->getIdCandidate()}">Accéder</a></td>
		</tr>
		{/foreach}
	    </tbody>
	</table>
    </article>
</section>
        