<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fruits • A propos </title>

    
  <style>
  <?php include 'css/style.css'; ?>
  <?php include 'css/home.css'; ?>
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
                <li><a href="<?=site_url('Home')?>" >Accueil</a></li>
                <li><a href=" <?=site_url('Boutique')?>"  >Boutique</a></li>
                <li><a href="<?=site_url('APropos')?>" class="yellow" >A propos</a></li>
                <li><a href="<?=site_url('Contact')?>">Contact</a></li>
                <li class="connexion">
                    <img src="<?= base_url('img/bonhomme.png')?>" alt="connexion" />
                    <a href="<?=site_url('Connexion')?>">Connexion</a> 
                </li>
                <li class="panier">
                    <a href="<?=site_url('Panier')?>" >
                        <img src="<?= base_url('img/panier.png')?>" alt="panier"  />
                        <div><p>0</p></div>
                    </a>
                </li>
            </ul>
            </nav>
        </header>
    </body>
</html>