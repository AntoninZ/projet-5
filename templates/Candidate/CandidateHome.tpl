<section class="candidateHome">
    <article class="createCandidate">
	<h2>Ajouter un candidat</h2>
	<hr />
	<form>
	    <div>
		<label for="lastname">Nom :</label>
		<input type="text" id="lastname" name="lastname">
	    </div>
	    
	    <div>
		<label for="firstname">Prénom :</label>
		<input type="text" id="firstname" name="firstname">
	    </div>
	    
	    <div>
		<label for="birthDate">Date de naissance :</label>
		<input type="date" id="birthDate" name="birthDate">
	    </div>
	    
	    <button type="submit" id="btnCreateCandidate">Ajouter</button>
	</form>
    </article>
    
    <article class="searchCandidate">
	<form class="searchForm" autocomplete="off">
	    <label for="search">Recherche :</label>
	    <span class="searchIcon"><i class="fas fa-search"></i></span>
	    <input type="text" id="search" name="search" placeholder="Nom, email, téléphone fixe, portable">
	</form>
	<table id="result">
	    <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Accéder</th>
                </tr>
            </thead>
	    
            <tbody>
	    <tr>
		<td colspan="4">Rechercher un candidat</td>
	    </tr>
	    </tbody>
	</table>
	    {* SearchViewCandidate.tpl from JS *}
    </article>  
</section>