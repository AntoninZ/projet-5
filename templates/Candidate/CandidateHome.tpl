    
        <form autocomplete="off">
            <label for="search">Recherche</label>
            <input type="text" id="search" name="search" placeholder="Nom, email, téléphone fixe, portable">
        </form>

        <table id="result">
                {* SearchViewCandidate.tpl from JS *}
        </table>
        
        
            <form>
                <div>
                    <label for="lastname">Nom :</label>
                    <input type="text" name="lastname" id="lastname">
                </div>
                
                <div>
                    <label for="firstname">Prénom : </label>
                    <input type="text" name="firstname" id="firstname">
                </div>
                
                <div>
                    <label for="birthDate">Date de naissance :</label>
                    <input type="date" name="birthDate" id="birthDate">
                </div>
                
                <button type="submit" id="btnCreateCandidate">Créer</button>
            </form>