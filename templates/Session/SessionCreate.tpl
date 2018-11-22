<section>
    <form>       
 
	<div>
	    <label for="idUser">Psychologue :</label>
	    <input type="text" id="idUser">
        </div>
	
	<div>
	    <label for="date">Date :</label>
	    <input type="date" id="date" value="{$smarty.now|date_format:"%Y-%m-%d"}">
        </div>
	
	<div>
	    <label for="aptitude">Aptitude</label>
	    <select id="aptitude">
		<option value="apte">Apte</option>
		<option value="inapte">Inapte</option>
	    </select>
        </div>
	    
	<div>
	    <label for="psychologistNote">Note du psychologue :</label>
	    <textarea id="psychologistNote"></textarea>
        </div>
	
	<div>
	    <label for="downPayment">Acompte :</label>
	    <input type="text" id="downPayment">
        </div>
	
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
	
        <button type="submit" id="btnCreateSession">Créer</button>
    </form>
</section>