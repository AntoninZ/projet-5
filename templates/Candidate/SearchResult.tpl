        
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Accéder</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$data|json_decode item=candidate}
                    <tr>
                        <td>{$candidate->lastname}</td>
                        <td>{$candidate->firstname}</td>
                        <td>{$candidate->birthDate|date_format:"%d/%m/%Y"}</td>
                        <td><a href="?page=candidates&amp;idCandidate={$candidate->idCandidate}">Accéder</a></td>
                    </tr>
                {foreachelse}
                    <td colspan="4">Aucun résultat</td>
                {/foreach}
            </tbody>
        