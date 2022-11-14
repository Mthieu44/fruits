<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fruits • Boutique</title>


    <style>
        <?php include 'css/style.css';
        ?><?php include 'css/boutique.css';
        ?>
    </style>

</head>

<body>
    <header>
        <nav>
            <ul>
                <li class="logo">
                    <img src="<?= base_url('img/logo.png') ?>" alt="fruit" class="logo2" />
                    <h1><b class="yellow">F</b>RUITS</h1>
                </li>
                <li><a href="<?= site_url('Home') ?>">Accueil</a></li>
                <li><a href=" <?= site_url('Boutique') ?>" class="yellow">Boutique</a></li>
                <li><a href="<?= site_url('APropos') ?>">A propos</a></li>
                <li><a href="<?= site_url('Contact') ?>">Contact</a></li>
                <li class="connexion">
                    <img src="<?= base_url('img/bonhomme.png') ?>" alt="connexion" />
                    <a href="<?= site_url('Connexion') ?>">Connexion</a>
                </li>
                <li class="panier">
                    <a href="<?= site_url('Panier') ?>">
                        <img src="<?= base_url('img/panier.png') ?>" alt="panier" />
                        <div>
                            <p>0</p>
                        </div>
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <table>
        <tr>
            <th> id </th>
            <th> nom </th>
            <th> prix </th>
            <th> description </th>
            <th> categories </th>
            <th> image </th>
        </tr>
        <?php foreach ($fruits as $fruit): ?>
        <tr>
            <td>
                <?= $fruit->getId_fruit() ?>
            </td>
            <td>
                <?= $fruit->getNom() ?>
            </td>
            <td>
                <?= $fruit->getPrix() ?>
            </td>
            <td>
                <?= $fruit->getDescription() ?>
            </td>
            <td>
                <?php
            foreach ($fruit->getCategory() as $category) {
                echo ($category->getNom() . ', ' . $category->getDescription() . '<br>');
            }
                ?>
            </td>
            <td>
                <img src="<?= base_url('img/fruit/' . $fruit->getImage()) ?>" class="imgtest" />
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>