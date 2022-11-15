<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fruits • Boutique</title>


  <style>
    <?php include 'css/home.css';
    ?><?php include 'css/style.css';
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
                <li><a href="<?=site_url('Home')?>" >Accueil</a></li>
                <li><a href=" <?=site_url('Boutique')?>" class="yellow" >Boutique</a></li>
                <li><a href="<?=site_url('APropos')?>"  >A propos</a></li>
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
        <div class="bestsellers">
        <div class = "top-part">
          <div class="top-text">
            <h2>Ne manquez pas nos meilleures ventes !</h2>
            <p class="p01">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>
          </div>
        </div>
        <div class="fruit-menu">
          
          <img src="<?= base_url('img/back.png')?>" class="fleche" alt="back" />
        <?php foreach ($fruits as $fruit): ?>
          <div class="card-product">
            <a href="<?=site_url('Produit')?>">
              <img src="<?= base_url('img/orange.png')?>" alt="oranges" />
            </a>
              <h2 class="p02"><?= $fruit->getNom() ?></h2>
              <hr class="line small">
              <p class="p02"><?= $fruit->getPrix() ?> €</p>
              <div class="add-to-cart">
                <div class= "quantity">
                  <p class="p02">
                    <a href="<?= site_url('boutique/decrease_quantity/').strval($fruit->getId_fruit())?>"><p>-</p></a>
                    <p><?php 
                    if (!$this->session->fauxPanier){
                      echo 0;
                    }else{
                      $temp = true;
                      foreach ($this->session->fauxPanier as $fruitPanier) {
                        if ($fruitPanier->id_fruits == $fruit->getId_fruit()) {
                            echo $fruitPanier->quantity;
                            $temp = false;
                        }
                      }
                      if($temp){
                        echo 0;
                      }
                    }
                     ?></p>
                    <a href="<?= site_url('boutique/increase_quantity/').strval($fruit->getId_fruit())?>"><p>+</p></a>
                  </p>
                </div>
                <p class="p02">Ajouter au panier</p>
              </div>
          </div>
        <?php endforeach; ?>  
  
          <img src="<?= base_url('img/next.png')?>" class="fleche" alt="next" />
        </div>
      </div>

      <img src="<?= base_url('img/next.png') ?>" class="fleche" alt="next" />
    </div>
  </div>

  <hr class="line">

  <div class="selectCategory">
    <div class="tileSelect">
      <img src="<?= base_url('img/agrumes.png') ?>" alt="agrumes" />
      <h2 class="p02">Agrumes</h2>
    </div>
    <div class="tileSelect">
      <img src="<?= base_url('img/exotiques.png') ?>" alt="exotiques" />
      <h2 class="p02">Fruits exotiques</h2>
    </div>
    <div class="tileSelect">
      <img src="<?= base_url('img/rouges.png') ?>" alt="rouges" />
      <h2 class="p02">Fruits rouges</h2>
    </div>
    <div class="tileSelect">
      <img src="<?= base_url('img/pepins.png') ?>" alt="pepins" />
      <h2 class="p02">Fruits à pépins</h2>
    </div>
  </div>
  <div class="searchFruit">
    <form action="" class="formulaire">
      <input class="champ" type="text" placeholder="Chercher votre fruit favori" />
      <button type="submit" class="bouton">
        <i class="fa fa-search"></i>
      </button>
    </form>
  </div>


  <div class="productsMenu">
  <?php foreach ($fruits as $fruit): ?>
          <div class="card-product">
            <a href="<?=site_url('Produit')?>">
              <img src="<?= base_url('img/orange.png')?>" alt="oranges" />
            </a>
              <h2 class="p02"><?= $fruit->getNom() ?></h2>
              <hr class="line small">
              <p class="p02"><?= $fruit->getPrix() ?> €</p>
              <div class="add-to-cart">
                <div class= "quantity">
                  <p class="p02">
                    <a href="<?= site_url('boutique/decrease_quantity/').strval($fruit->getId_fruit())?>"><p>-</p></a>
                    <p><?php 
                    if (!$this->session->fauxPanier){
                      echo 0;
                    }else{
                      $temp = true;
                      foreach ($this->session->fauxPanier as $fruitPanier) {
                        if ($fruitPanier->id_fruits == $fruit->getId_fruit()) {
                            echo $fruitPanier->quantity;
                            $temp = false;
                        }
                      }
                      if($temp){
                        echo 0;
                      }
                    }
                     ?></p>
                    <a href="<?= site_url('boutique/increase_quantity/').strval($fruit->getId_fruit())?>"><p>+</p></a>
                  </p>
                </div>
                <p class="p02">Ajouter au panier</p>
              </div>
          </div>
        <?php endforeach; ?> 

    <div class="card-product">
      <a href="produit01.html">
        <img src="<?= base_url('img/orange.png') ?>" alt="oranges" />
      </a>
      <h2 class="p02">Orange</h2>
      <hr class="line small">
      <p class="p02">1.99€</p>
      <div class="add-to-cart">
        <p class="p02">- 0 +</p>
        <p class="p02">Ajouter au panier</p>
      </div>
    </div>

    <div class="card-product">
      <a href="produit01.html">
        <img src="<?= base_url('img/orange.png') ?>" alt="oranges" />
      </a>
      <h2 class="p02">Orange</h2>
      <hr class="line small">
      <p class="p02">1.99€</p>
      <div class="add-to-cart">
        <p class="p02">- 0 +</p>
        <p class="p02">Ajouter au panier</p>
      </div>
    </div>

    <div class="card-product">
      <a href="produit01.html">
        <img src="<?= base_url('img/orange.png') ?>" alt="oranges" />
      </a>
      <h2 class="p02">Orange</h2>
      <hr class="line small">
      <p class="p02">1.99€</p>
      <div class="add-to-cart">
        <p class="p02">- 0 +</p>
        <p class="p02">Ajouter au panier</p>
      </div>
    </div>

    <div class="card-product">
      <a href="produit01.html">
        <img src="<?= base_url('img/orange.png') ?>" alt="oranges" />
      </a>
      <h2 class="p02">Orange</h2>
      <hr class="line small">
      <p class="p02">1.99€</p>
      <div class="add-to-cart">
        <p class="p02">- 0 +</p>
        <p class="p02">Ajouter au panier</p>
      </div>
    </div>

    <div class="card-product">
      <a href="produit01.html">
        <img src="<?= base_url('img/orange.png') ?>" alt="oranges" />
      </a>
      <h2 class="p02">Orange</h2>
      <hr class="line small">
      <p class="p02">1.99€</p>
      <div class="add-to-cart">
        <p class="p02">- 0 +</p>
        <p class="p02">Ajouter au panier</p>
      </div>
    </div>

    <div class="card-product">
      <a href="produit01.html">
        <img src="<?= base_url('img/orange.png') ?>" alt="oranges" />
      </a>
      <h2 class="p02">Orange</h2>
      <hr class="line small">
      <p class="p02">1.99€</p>
      <div class="add-to-cart">
        <p class="p02">- 0 +</p>
        <p class="p02">Ajouter au panier</p>
      </div>
    </div>

    <div class="card-product">
      <a href="produit01.html">
        <img src="<?= base_url('img/orange.png') ?>" alt="oranges" />
      </a>
      <h2 class="p02">Orange</h2>
      <hr class="line small">
      <p class="p02">1.99€</p>
      <div class="add-to-cart">
        <p class="p02">- 0 +</p>
        <p class="p02">Ajouter au panier</p>
      </div>
    </div>

    <div class="card-product">
      <a href="produit01.html">
        <img src="<?= base_url('img/orange.png') ?>" alt="oranges" />
      </a>
      <h2 class="p02">Orange</h2>
      <hr class="line small">
      <p class="p02">1.99€</p>
      <div class="add-to-cart">
        <p class="p02">- 0 +</p>
        <p class="p02">Ajouter au panier</p>
      </div>
    </div>

    <div class="card-product">
      <a href="produit01.html">
        <img src="<?= base_url('img/orange.png') ?>" alt="oranges" />
      </a>
      <h2 class="p02">Orange</h2>
      <hr class="line small">
      <p class="p02">1.99€</p>
      <div class="add-to-cart">
        <p class="p02">- 0 +</p>
        <p class="p02">Ajouter au panier</p>
      </div>
    </div>

    <div class="card-product">
      <a href="produit01.html">
        <img src="<?= base_url('img/orange.png') ?>" alt="oranges" />
      </a>
      <h2 class="p02">Orange</h2>
      <hr class="line small">
      <p class="p02">1.99€</p>
      <div class="add-to-cart">
        <p class="p02">- 0 +</p>
        <p class="p02">Ajouter au panier</p>
      </div>
      <div class="navpages">
        <a href="index.html"><- </a>
        <a href="index.html">1 - </a>
        <a href="index2.html">2 - </a>
        <a href="index3.html">3</a>
        <a href="index4.html"> -></a>
  </div>

  <footer>
    <p>Tous droits réservés.</p>
  </footer>
</body>

</html>


