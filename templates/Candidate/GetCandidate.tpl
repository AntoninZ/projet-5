        <section>
            <form>
                <input type="text" id="idCandidate" value="{$candidate->getIdCandidate()}">
        
                <label for="lastname">Nom :</label>
                <input type="text" name="lastname" id="lastname" value="{$candidate->getLastname()}">
                
                <label for="firstname">Prénom : </label>
                <input type="text" name="firstname" id="firstname" value="{$candidate->getFirstname()}">
                
                <label for="birthDate">Date de naissance :</label>
                <input type="date" name="birthDate" id="birthDate" value="{$candidate->getBirthDate()}">
                
                <label for="gender">Sexe :</label>
                <select name="gender" id="gender">
                    <option value="{$candidate->getGender()}" selected='selected'>
                        {if $candidate->getGender() eq 'male'}
                            Homme
                        {elseif $candidate->getGender() eq 'female'}
                            Femme
                        {/if}
                    </option>              
                    <option disabled></option>
                    <option value="male">Homme</option>
                    <option value="female">Femme</option>
                </select>
                
                <label for="email">Email :</label>
                <input type="text" name="email" id="email" value="{$candidate->getEmail()}">
                
                <label for="phoneNumber">Tél fixe :</label>
                <input type="text" name="phoneNumber" id="phoneNumber" value="{$candidate->getPhoneNumber()}">
                
                <label for="cellphoneNumber">Tél port :</label>
                <input type="text" name="cellphoneNumber" id="cellphoneNumber" value="{$candidate->getCellphoneNumber()}">
                
                <label for="address">Adresse :</label>
                <input type="text" name="address" id="address" value="{$candidate->getAddress()}">
                
                <label for="allowable">Interdit de cabinet</label>
                <select id="allowable">
                    <option value="{$candidate->getAllowable()}">
                        {if $candidate->getAllowable() eq 'true'}
                            Non
                        {else}
                            Oui
                        {/if}
                    </option>
                    <option disabled></option>
                    <option value="true">Non</option>
                    <option value="false">Oui</option>
                </select>
                <button type="submit" id="btnUpdateCandidate">Sauvegarder changement</button>
            </form>
            
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Entreprise</th>
                                <th>Aptitude</th>
                                <th>Accéder</th>
                            </tr>
                        </thead>
                        {foreach from=$sessions item=session}
                            
                            <tr>
                                <td>{$session->getDate()|date_format:"%d/%m/%Y"}</td>
                                
                                <td>
                                    {assign var=idCompany value=$session->getIdCompany()}
                                    {$companies.$idCompany}
                                </td>
                                
                                <td>{$session->getAptitude()}</td>
                                <td><a href="?page=candidates&idSession={$session->getIdSession()}">Accéder</a></td>
                            </tr>
                            
                        {/foreach}
                    </table>
        </section>