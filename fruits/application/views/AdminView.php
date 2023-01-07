<div class="table">
    <a href=" <?= site_url('User/add/') ?>">Ajouter User</a>
    <table>
        <tr>
            <th> id </th>
            <th> nom </th>
            <th> prenom </th>
            <th> adresse </th>
            <th> mail </th>
            <th> telephone </th>
            <th> sexe </th>
            <th> mdp </th>
            <th> status </th>
        </tr>

        <?php foreach ($users as $user) : ?>
        <tr>
            <td>
                <?= $user->getId_user() ?>
            </td>
            <td>
                <?= $user->getNom() ?>
            </td>
            <td>
                <?= $user->getPrenom() ?>
            </td>
            <td>
                <?= $user->getAdresse() ?>
            </td>
            <td>
                <?= $user->getMail() ?>
            </td>
            <td>
                <?= $user->getTelephone() ?>
            </td>
            <td>
                <?= $user->getSexe() ?>
            </td>
            <td>
                <p>*****</p>
            </td>
            <td>
                <?= $user->getStatus() ?>
            </td>
            <td>
                <a href="<?= site_url('User/modif/' . $user->getId_user()) ?>"> modif</a>
            </td>
            <td>
                <a href="<?= site_url('User/delete/' . $user->getId_user()) ?>"> delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>