<div class="table">
    <a href=" <?= site_url('Fruit/add/') ?>">Ajouter Produit</a>
    <table>
        <tr>
            <th> id </th>
            <th> nom </th>
            <th> description </th>
            <th> prix</th>
            <th> origine </th>
            <th> description</th>
            <th> image </th>
        </tr>

        <?php foreach ($fruits as $fruit) : ?>
        <tr>
            <td>
                <?= $fruit->getId_fruit() ?>
            </td>
            <td>
                <?= $fruit->getNom() ?>
            </td>
            <td>
                <?= $fruit->getDescription() ?>
            </td>
            <td>
                <?= $fruit->getPrix() ?>
            </td>
            <td>
                <?= $fruit->getOrigine() ?>
            </td>
            <td>
                <?php
                    foreach ($fruit->getCategory() as $category) {
                        echo ($category->getNom() . '<br>');
                    }
                    ?>
            </td>

            <td>
                <img src="<?= base_url('img/fruit/' . $fruit->getImage()) ?>" />
            </td>
            <td>
                <a href="<?= site_url('Fruit/modif/' . $fruit->getId_fruit()) ?>"> modif</a>
            </td>
            <td>
                <a href="<?= site_url('Fruit/delete/' . $fruit->getId_fruit()) ?>"> delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>