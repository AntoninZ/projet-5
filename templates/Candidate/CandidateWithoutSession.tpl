<section>
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
            </tr>
        </thead>
        
        <tbody>
            <tr>
                <form>
                    <td><input type="date" id="creationDate" name="creationDate"></td>
                    <td><input type="text" id="cellphoneNumber" name="cellphoneNumber"></td>
                    <td><input type="text" id="lastname" name="lastname"></td>
                    <td><input type="text" id="firstname" name="firstname"></td>
                    <td><input type="text" id="email" name="email"></td>
                    <td><input type="text" id="downPayment" name="downPayment"></td>
                    <td><input type="date" id="reservationDate" name="reservationDate"></td>
                    <td><textarea id="assistantNote" name="assistantNote"></textarea></td>
                    <td><button type="submit" id="btnCreateCandidate">Ajouter</button></td>
                </form>
            </tr>
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
</section>
        