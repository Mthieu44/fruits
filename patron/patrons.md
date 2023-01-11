# **SAE R3.04 - Patrons de conceptions**
### **_Groupe 2-1_**
### _Mathieu Bergeron, Tom Freret, Sylvain Baudouin, Tomás Martineau, Fabien Nicou_




## **_Factory - Strategy_**

### **_C'est quoi ?_**

Un design pattern Strategy est un patron de conception qui permet de définir une famille d'algorithmes, encapsuler chacun d'entre eux et les rendre interchangeable. Cela permet de changer l'algorithme utilisé sans avoir à changer le reste du code. 

Lorsqu'il est combiné avec le design pattern Factory, cela permet de créer des objets en utilisant des algorithmes différents en fonction des besoins spécifiques de l'application. La Factory crée les objets en utilisant les algorithmes appropriés, tandis que le Strategy définit les algorithmes eux-mêmes. En utilisant ces deux patrons ensemble, il est possible de créer des systèmes flexibles et évolutifs qui peuvent facilement gérer différents types d'algorithmes et de données.


![factory-strategy](img/factory-strategy.png)
_Schéma uml réprésentant les design paterns factory et strategy_

### **_Pourquoi on les utilise ?_** 




```php
abstract class UserStrategy
{
    abstract public function loadView();
}

/*
Classe qui permet de choisir les vues à charger.
*/
class UserFactory
{
    public static function makeUser($statut)
    {
        switch ($statut) {
            case "client":
                return new UserClient();
            case "responsable":
                return new UserResp();
            case "admin":
                return new UserAdmin();
        }
    }
}  
```
```php
class UserClient extends UserStrategy
{
    public function loadView()
    {
        $CI =& get_instance();
        $data['fruitsCommandes'] = array();

        $users = $CI->UserModel->findAll();
        $data['commandes'] = $CI->CommandeModel->findById_User($CI->session->user["user"]->id_user);
        foreach ($data['commandes'] as $c) {
            array_push($data['fruitsCommandes'], $CI->CommandeModel->getFruitFrom_IdCommande($c->id_commande));
        }
        $CI->load->view('ClientView', $data);
        $CI->load->view('FooterView');
    }
}
```
## **_Decorator_**

Le patron de conception **"Decorator"** est utilisé dans cet exemple avec la classe abstraite FruitDecorator qui étend la classe FruitEntity (déclarée avec le mot-clé extends). La classe FruitDecorator sert de classe de base pour les classes FruitQuantity et FruitCommande, qui héritent de cette classe.

Le patron de conception "Decorator" permet de ajouter de nouvelles responsabilités à un objet de manière transparente, en enveloppant l'objet dans un autre objet qui possède ces responsabilités supplémentaires. Dans cet exemple, la classe FruitDecorator ajoute la responsabilité de stocker une quantité de fruits et un identifiant de commande à l'objet FruitEntity.

Les classes FruitQuantity et FruitCommande sont des exemples de classes "decorators" qui héritent de FruitDecorator et ajoutent ces responsabilités à l'objet FruitEntity. La classe FruitQuantity ajoute simplement la responsabilité de stocker une quantité de fruits, tandis que la classe FruitCommande ajoute également la responsabilité de stocker un identifiant de commande.

Le patron de conception "Decorator" permet de rendre le code plus modulaire et flexible, car il est possible d'ajouter de nouvelles responsabilités à un objet sans avoir à en modifier la classe de base. Cela peut être utile lorsque vous avez besoin d'ajouter de nouvelles fonctionnalités à un objet de manière dynamique, sans avoir à créer de nouvelles classes pour chaque combinaison de responsabilités.