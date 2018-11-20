<section>
    <form>
        <label for="date">Date de passage</label>
        <input type="date" id="date" name="date" value="{$session->getDate()}">
        <label for="aptitude">Aptitude</label>
        <select id="aptitude">
            <option value="{$session->getAptitude()}">{$session->getAptitude()}</option>
            <option disabled></option>
            <option value="Apte">Apte</option>
            <option value="Inapte">Inapte</option>
        </select>
            
        <label for="psychologistNote">Note du psychologue</label>
        <textarea id="psychologistNote">{$session->getPsychologistNote()}</textarea>
       
        <label for="computerStation">PC COG/FVW :</label>
        <select id="computerStation">
            <option value="{$session->getComputerStation()}">{$session->getComputerStation()}</option>
            <option disabled></option>
            <option value="4">4</option>
            <option value="3">3</option>
            <option value="2">2</option>
            <option value="1">1</option>
        </select>
            
        <button type="submit" id="btnUpdateSession">Sauvegarder</button>
    </form>  
</section>