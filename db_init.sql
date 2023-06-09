call addUser('Admin','Admin','10 Rue du maréchal Joffre','admin@test','$2y$10$JMuuaDMCavASPKf9KBcD1eaMHJ0zkeD8eYs7HjecoD8QeUVRhKQq6','0123456789','homme', 'admin');
call addUser('Client','Client','11 Rue du maréchal Joffre','client@test','$2y$10$JMuuaDMCavASPKf9KBcD1eaMHJ0zkeD8eYs7HjecoD8QeUVRhKQq6','0123456789','femme', 'client');
call addUser('Responsable','Responsable','12 Rue du maréchal Joffre','responsable@test','$2y$10$JMuuaDMCavASPKf9KBcD1eaMHJ0zkeD8eYs7HjecoD8QeUVRhKQq6','0123456789','autre', 'responsable');


call addCategorie('Agrumes','Très juteux et bien sucrés on adore les manger.');
call addCategorie('Fruits exotiques',"Provenant des quatre coins du globe, ils vont vous faire voyager.");
call addCategorie('Fruits à coque',"Quand arrive l'automne, on sort les casse-noix. ");
call addCategorie('Fruits rouges et baies','Que ferait-on sans nos fruits favoris ?');
call addCategorie('Fruits à noyau','De bons et tendres fruits au coeur de pierre.');
call addCategorie('Fruits à pépins','A consommer régulièrement pour une vie sans trop de pépins !');
call addCategorie('Promotions',"Ne pas s'en priver, votre porte-monnaie vous remerciera.");
call addCategorie('Indisponibles',"Ce fruit n'est plus dans nos stock");
call addCategorie('Meilleures Ventes',"C'est les meilleurs");
call addCategorie('Fruits de saison',"c'est l'hiver il fait froid");


call addFruit('Avocat',1.00,"C'est un fruit à la maturation originale qui ne peut mûrir que lorsqu'il est détaché de l'arbre. L'avocat est un fruit très calorique, riche en matières grasses. Vendu à l'unité.","Mexique","avocat.png");
call addFruit('Abricot',0.15,"L'abricot est un fruit charnu, de forme arrondie, possédant un noyau dur contenant une seule grosse graine. La chair est sucrée, peu juteuse, jaune orangé et ferme. Vendu à l'unité.","France, Rhône","abricot.png");
call addFruit('Pasteque',3.00,"Fruit lisse, à chair rouge et à graines noires, pesant entre 2 et 5kg. Vendu à l'unité.","France, Midi","pasteque.png");
call addFruit('Prune Quetsche',0.14,"C'est une petite prune qui mûrit dès mi-août, et qui est disponible dans les marchés jusqu'en octobre. Sous sa robe violette, elle cache une chair sucrée, acidulée, d’un jaune d’or légèrement foncé. Sa forme est oblongue et charnue.","France, Alsace","prune_quetsche.png");
call addFruit('Poire',0.30,"La poire est un fruit à pépins comestible au goût doux et sucré, produit par le poirier commun. Vendue à l'unité.","France, Pays de la Loire","poire.png");
call addFruit('Mûres',3.00,"La mûre est un fruit rouge comestible de la ronce commune, buisson épineux très enbahissant. Elle est de couleur noir bleuâtre à maturité, à la fin de l'été. Vendues en barquette de 125g environ.","France","mure.png");
call addFruit('Mangue',3.20,"La mangue est un fruit charnu, pesant de 300 g à 2 kg. Sa chair est jaune foncé, onctueuse, grasse et sucrée avec un faux goût de pêche et de fleur. Vendue à l'unité.","France, Savoie","mangue.png");
call addFruit('Orange',0.26,"Comestible, elle est réputée pour sa grande teneur en vitamine C. C'est le quatrième fruit le plus cultivé au monde. L’orange a donné son nom à la couleur. Vendue à l'unité.","Espagne","orange.png");
call addFruit('Raisin rouge',0.32,"Le raisin, fruit de la vigne, est un des fruits les plus cultivés au monde. Il se présente sous la forme de grappes composées de nombreux grains. Vendu à la grappe de 120g environ.","France, Pays de la Loire","raisin_rouge.png");
call addFruit('Ananas',1.50,"L'ananas, fruit tropical par excellence est sucré et très rafraîchissant de par sa grande richesse en eau (85,5%). Originaire d'Amérique du Sud, il se cuisine aussi bien dans les desserts que dans des plats sucrés-salés. Riche en vitamines et minéraux, il apporte une multitude de bienfaits pour la santé. Vendu à l'unité.","France, la Réunion","ananas.png");
call addFruit('Citron',0.50,"Avec sa jolie couleur jaune et son goût acide, le citron est reconnaissable entre mille. Cet agrume aux vertus santé uniques est consommé partout à travers le monde et a d’ailleurs vu sa consommation exploser ces dix dernières années. Côté cuisine, il se glisse absolument partout, de l’entrée au dessert, pour notre plus grand bonheur. Vendu à l'unité.","Argentine","citron.png");
call addFruit('Kiwi',0.80,"Le kiwi est un fruit qui provient d’un arbuste grimpant pollinisé du nom d’actinidier ou plus communément appelé arbre à kiwi. Originaire de Chine, il est aujourd’hui cultivé en Nouvelle-Zélande, en Amérique ainsi qu’en Europe. Gorgé de vitamine C, ce petit fruit brun à la peau velue contient une pulpe verte, dense, acidulée et juteuse avec de petites graines noires comestibles. Vendu à l'unité","France, Bretagne","kiwi.png");
call addFruit('Citron vert',0.60,"Appelé lime, ce fruit est produit tout au long de l’année au Mexique et aux Caraïbes. D’aspect très proche de celui du citron, il est entièrement vert. Son acidité particulière et parfumée est très prisée. Il mesure entre trois et six centimètres et possède ou non des pépins selon la variété. Vendu à l'unité.","Argentine","citron_vert.png");
call addFruit('Fraise',5.50,"La fraise est un fruit issu d’une plante herbacée nommée fraisier. Originaire à la fois du Chili et de l’Amérique, elle est cultivée dans la plupart du monde à l’heure actuelle. De forme ovoïde et de couleur rouge, la fraise est constellée de minuscules alvéoles remplies de graines jaunes ou parfois brunes. Riche en vitamines et en fibres, sa chair est tendre, juteuse et sucrée et se consomme crue ou cuite. Vendues en barquettes de 250g.","France, Pays de la Loire","fraise.png");
call addFruit('Datte',1.50,"Les dattes sont le fruit d’un palmier du Moyen-Orient. Elles se positionnent en régimes de 200 dattes. Avant sa maturité, la chair est verte. Mûre, sa couleur devient ambrée et légèrement translucide, englobant un noyau. Confite, elle révèle un goût sucré très apprécié. Elle mesure quelques centimètres de long pour deux centimètres de diamètre. Vendues en barquettes de 250g.","Tunisie","datte.png");
call addFruit("Papaye",3.60,"Fruit péruvien, la papaye pousse sur un arbrisseau et ressemble à un melon. Plus allongé que ce dernier, elle mesure une dizaine de centimères, est ornée d’une peau au toucher satin du vert au jaune en mûrissant. Parsemée de rayures pourpres, elle contient une chair orangée davantage sucrée que celle du melon, et des graines centrales comestibles. Vendue à l'unité.","Mexique","papaye.png");
call addFruit("Myrtille",5.00,"Provenant d’Europe et d’Asie, la myrtille pousse habituellement à l’état sauvage sous forme de grappes bleu nuit. D’environ 8 millimètres de diamètre, elle pourrait se confondre avec le bleuet. Riche en vitamine C et potassium, ce fruit fragile renferme aussi plusieurs acides dits astringents. Elle fait partie de la famille des airelles. Vendues en barquettes de 300g.","France, Vosges","myrtille.png");
call addFruit("Cerise",3.50,"La cerise est un fruit provenant d’un arbre du nom de cerisier. Originaire d’Asie, la cerise est cultivée dans de nombreux pays et notamment en Turquie, en Iran et aux Etats-Unis qui restent ses principaux producteurs. De petite taille, de forme sphérique et agrémentée d’un noyau, la cerise est essentiellement rouge, voire noire selon sa variété. Sous sa peau fine et brillante se cache une pulpe sucrée, juteuse et délicieusement parfumée. Vendu en barquettes de 500g.","France, Normandie","cerise.png");
call addFruit("Pomme rouge",0.40,"La pomme est un fruit issu d’un arbre fruitier appelé pommier. Originaire du Kazakhstan à la préhistoire, la pomme est à présent cultivée dans de nombreux pays, même si la Chine reste son principal producteur. De forme sphérique et de couleur variée, la pomme est peu calorique, chargée d’eau et de fibres. Sa fine peau cache une chair consistante qui se consomme crue, cuite ou en jus. Vendue à l'unité.","France, Pays de la Loire","pomme_rouge.png");
call addFruit("Pomme verte",0.50,"La pomme verte est le nom donné à une variété de pommes, la Granny Smith, qui conserve sa couleur verte à pleine maturité. Sa chair est juteuse, acidulée, ferme et croquante. Une légende veut qu’une anglaise d’un certain âge et grand-mère (granny en anglais), Maria Ann Smith, émigrée en Australie, jeta un jour un trognon de pomme dans son jardin. Et un pommier poussa donnant des pommes vertes. Le Granny Smith est maintenant le troisième pommier le plus cultivé en France après la Golden et la Gala. Vendue à l'unité.","France, Pays de la Loire","pomme_verte.png");
call addFruit("Goyave",2.80,"D’Amérique tropicale, la goyave est de la même famille que la cannelle et la muscade. De 5 à 8 centimètres de diamètre, sa peau mince est souvent jaune ou tachée de noir. Sa chaire intérieure est blanche ou rouge, a un parfum prononcé, et est légèrement acidulée. Désaltérante, elle a des graines dures et comestibles. Vendue à l'unité.","France, Martinique","goyave.png");
call addFruit("Mûre blanche",5.00,"Premièrement cultivé pour ses feuilles et alimentant le ver à soie, le mûrier blanc donne des fruits en syncarpes. On observe des variétés de fruits comestibles blancs et rougeâtres à la saveur sucrée. Leur forme bosselée varie de la framboise à la mûre. Crus ou secs, ils peuvent servir également à concocter du vin. Vendues en barquettes de 250g.","France, Pays de la Loire","mûre_blanche.png"  );
call addFruit("Fruit de la passion",1.70,"Le fruit de la passion, connu également sous le nom de grenadille ou maracuja est un fruit tropical provenant d'une variété de plante grimpante appelée passiflore. Il est essentiellement cultivé en Amérique du Sud dont il est originaire ainsi qu’en Indonésie. De la taille d’un œuf et de couleur orange, son épaisse écorce cache une pulpe granuleuse, légèrement acidulée, riche en antioxydants et en vitamines A et C. Vendu à l'unité.","Colombie","fruit_de_la_passion.png");
call addFruit("Framboise",2.00,"Il s’agit d’une ronce rosée venant d’Asie et qui existe aussi à l’état sauvage. Cultivée lors des croisades en Europe, elles ont une cavité centrale une fois cueillies. Ses nombreux petits replis fragiles sont doux, suaves et sucrés. Ce fruit acidulé est ordinairement rose, mais aussi jaune ou noir. Vendues en barquettes de 125g.","France, Pays de la Loire","framboise.png");
call addFruit("Banane",0.20,"La banane est un fruit provenant d’une plante herbacée géante appelée bananier. Cultivée dans de nombreux pays, elle est essentiellement exportée par l’Afrique, l’Amérique Centrale et l’Amérique Latine. Il existe deux types de bananes, la banane dessert et la banane à cuire ou plantain. La première, sucrée et de couleur jaune, se consomme crue et la seconde, amère et verte se consomme cuite. Vendue à l'unité.","France, Martinique","banane.png");
call addFruit("Coing",0.70,"Le coing pousse sous des climats chauds et se consomme en confitures, gelées ou pâtes de fruit. Sa forte teneur en pectine en permet ces confections. Ses pépins sont abondants et enclavés dans une chair ferme d’odeur suave. Il a une peau fine variant du vert au jaune avant la cueillette. Vendu à l'unité.","France, Alpes","coing.png");
call addFruit("Litchi",3.50,"Le litchi est un fruit issu d’un arbre tropical portant le nom de litchier. Originaire de Chine depuis plus de 2000 ans, il est néanmoins cultivé dans toute l’Asie, dans l’océan indien ainsi qu’au Brésil. De forme sphérique et de petite taille, il pousse en grappes contenant généralement une dizaine de fruits. Son écorce rose vif composée d’écailles recèle une pulpe blanche et juteuse, riche en vitamines C et B9 qui se consomme principalement crue. Vendus en barquettes de 250g.","Chine","litchi.png");
call addFruit("Pepino",1.00,"Originaire du Pérou, ce nouveau fruit pour les occidentaux vient de la famille de la tomate. Il a des airs de petit melon en étant légèrement plus long, avec une fine peau satinée. Allant du vert au jaune en mûrissant, il a des rayures pourpres. Il a une chair plus sucrée que le melon et de la même couleur. Vendu à l'unité.","Algérie","pepino.png");
call addFruit("Orange sanguine",0.40,"L'orange sanguine, ou sanguine, est une variété d'orange douce, fruit de l'oranger (Citrus sinensis), dont la couleur de pulpe va du rouge sang au rouge sombre. Une forte amplitude thermique hivernale induit la production d'anthocyanines dans le fruit. Vendue à l'unité.","Sicile","orange_sanguine.png");
call addFruit("Pêche",0.30,"Originaire de Chine, ce fruit doux est semblable à l'abricot et à la prune. Sa peau comestible est duveteuse et sa couleur est généralement cramoisie. La variété à chair jaune est moins fragile mais moins juteuse et sucrée. On peut en consommer l’amande, mais en faible quantité, car elle renferme de l’acide cyanhydrique. Vendue à l'unité.","Espagne","peche.png");
call addFruit("Nectarine",0.30,"La nectarine est un fruit qui provient d'une mutation spontanée et naturelle de certains pêchers, sans doute originaire de Chine. Ils produisent alors des fruits à peau lisse et non plus duveteuse. Vendue à l'unité.","France, Pays de la Loire","nectarine.png");
call addFruit("Brugnon",0.35,"Le brugnon est souvent délaissé au profit de ses cousines, les pêches et les nectarines. Et pour cause, ce fruit pourtant délicieusement juteux est bien plus fragile. En France, nous faisons généralement la différence entre le brugnon et la nectarine selon l’adhérence du noyau à la chair. En effet, si la chair se détache bien du noyau, c’est une nectarine, sinon c’est un brugnon. Notez que dans de nombreux pays, toutes les pêches à peau lisse sont considérées comme des nectarines. Vendu à l'unité.","France, Pays de la Loire","brugnon.png");
call addFruit("Kaki",0.90,"Le kaki est un fruit issu d’un arbre appelé plaqueminier. Originaire d’Asie, il continue à y être cultivé ainsi qu’en Amérique du Nord et en Europe. De forme ronde et de couleur orange, il est néanmoins un fruit très fragile. Riche en carotène et en provitamine A, sa chair est moelleuse et sucrée et se consomme à maturité, une fois sa peau devenue presque translucide. Vendu à l'unité.","Italie","kaki.png");
call addFruit("Grenade",0.90,"Le grenade pousse dans les pays tropicaux. Mesurant jusqu’à sept centimètres de diamètre, elle est entourée d’une peau coriace et épaisse, qui en fait une partie non comestible. Rouge et brillante, elle peut également être jaunâtre. Divisée en six sections internes, sa pulpe est charnue, juteuse et sucrée, et ses pépins sont eux plutôt amers. Vendue à l'unité.","Tunisie","grenade.png");
call addFruit("Groseille",1.30,"La groseille est issue d’un arbuste touffu et a des dizaines de variétés, dont la groseille à grappe. C’est une baie ronde, rouge ou blanche de moins de cinq millimètres. Elle éclate à la mastication et révèle une acidité particulière dite aigrelette, dont le jus pigmenté est riche en pectine. Vendues en barquettes de 100g.","France, Pays de la Loire","groseille.png");
call addFruit("Cassis",5.00,"Le cassis est une petite baie poussant sous forme de grappes. Il provient d’une plante médicinale appelée cassissier, originaire d’Europe et d’Asie du Nord. De la taille d’une olive et de couleur noire, son goût un peu aigre fait qu’il se consomme davantage en confiture, en sirop ou en tarte. Il est également riche en vitamine C et en polyphénol. Vendu en barquettes de 200g.","France, Bourgogne","cassis.png");
call addFruit("Cranberry",3.50,"La cranberry ou canneberge est une petite baie rouge provenant d’un arbrisseau robuste du même nom cultivé principalement en Amérique du Nord. Sa chair étant juteuse et acidulée, la cranberry se consomme essentiellement en jus. Elle est riche en potassium et en antioxydants. Vendues en barquettes de 200g.","USA","cranberry.png");
call addFruit("Fruit du dragon",3.50,"Le fruit du dragon, également appelé pitaya, est un fruit tropical provenant de différentes espèces de cactus. Cultivé essentiellement en Amérique du Sud et en Asie, il est généralement consommé crus ou en jus. Sous d’épaisses écailles roses se trouve une chair blanche ou rouge délicate et sucrée, dont la texture rappelle celle du kiwi. Vendu à l'unité.","Chine","fruit_du_dragon.png");
call addFruit("Figue",1.50,"Ce fruit est une enveloppe charnue recouvrant des graines croquantes appelées akènes, qui sont les véritables fruits du majestueux figuier. Elle est cultivée dans les pays méditerranéens et est très riche en sucre. Les figues les plus connues sont les noires, les vertes et les violettes. Ces dernières sont les plus juteuses, les plus sucrées et les moins répandues. Vendues en barquettes de 250g.","Antilles","figue.png");
call addFruit("Pamplemousse",1.00,"Le pamplemousse appartient à la catégorie des « agrumes », terme générique utilisé pour désigner les fruits à saveur acide, recouverts d’une écorce, et divisés en sections juteuses contenant des pépins. Riches en vitamines et composés antioxydants, le pamplemousse est doté de nombreux atouts nutritionnels. Vendu à l'unité.","Asie du Sud-Est","pamplemousse.png");
call addFruit("Raisin blanc",1.50,"Le raisin blanc se caractérise par ses grains qui vont du vert pâle au jaune doré. A l'intérieur, la chair est juteuse, d'un jaune très clair, transparente et elle renferme des pépins. Il existe de nombreuses variétés de ce fruit issu de la vigne. Vendu à la grappe de 250g.","France, Pays de la Loire","raisinblanc.png");
call addFruit("Honeydew",3.00,"Aussi appelé melon de miel, variété originaire des Etats-Unis produisant des fruits jaune crème à vert clair, uni sans tâche ni strie, ovales, de 1 kg, au parfum délicat, à la saveur fine et sucrée. Chair vert pâle sucrée et juteuse. Vendu à l'unité.","Espagne","honeydew.png");
call addFruit("Noix de coco",1.10,"Issue du palmier, la noix de coco n’est pas uniquement d’utilité alimentaire. En grappe de cinq drupes, les noix de coco sont entourées d’une coque fibreuse qu’il faut casser. Sa pulpe interne, juxtaposée à la coque, abrite en son centre un liquide blanc, translucide, sucré et rafraîchissant. Sa chair délicieuse est croustillante. Vendue à l'unité.","Asie du Sud-Est","noix_de_coco.png");
call addFruit("Carambole",1.00,"Fruit exotique succulent et riche en vitamines, la carambole décore également les assiettes. Sa forme étoilée est obtenue après que l’on ait ôté ses côtes saillantes. Elle est trouvée à l’origine sous une forme ovoïde. Elle provient d’Asie, d’Amérique ou d’Israël. Toxique à haute dose pour les reins, on aime cependant occasionnellement son goût acidulé et rafraîchissant. Vendue à l'unité.","Malaisie","carambole.png");
call addFruit("Physalis",2.00,"Différents noms désignent la physalis, comme celui de lanterne chinoise ou de cerise de terre. L’alkékenge, fruit asiatique apparenté à la tomate et l’aubergine, a un aspect décoratif avec une fine feuille qui le recouvre, ressemblant à un abat-jour en papier couleur sable. Baie rouge de la taille d’une cerise, il a un goût acidulé. Vendu en barquettes de 100g.","Amérique du Sud","physalis.png");
call addFruit("Kumquat",2.70,"Le kumquat est un agrume provenant d’un arbre du même nom. Originaire d’Asie, il est également cultivé en Europe, en Afrique ainsi qu’en Amérique. Son aspect extérieur rappelle l’orange à la différence que sa forme est ovale et qu’il est beaucoup plus petit. Tout se consomme dans le kumquat, de son écorce à sa chair sucrée et légèrement acidulée. Vendu en barquettes de 200g.","Méditerrannée","kumquat.png");    
call addFruit("Groseille blanche",0.80,"Les groseilles blanches ont tendance à être juteuses, parfumées, et légèrement acidulées. Ces fruits ont une saveur délicate et agréable en bouche. Si vous aimez les raisins, vous aimerez alors le goût des groseilles blanches. Vendues en barquettes de 125g.","France, Pays de la Loire","groseille_blanche.png");
call addFruit('Prune Reine-Claude',0.30,"La reine-claude est une prune de taille moyenne. Son nom lui vient de la reine Claude de France, femme de François 1er a qui elle fut dédiée. Ronde et verte à reflets dorés on la trouve dès le mois de juillet pour certaines variétés. Sa chair est ferme, très juteuse, sucrée et parfumée. Vendue à l'unité.","France, Midi-Pyrénées","prune_reine-claude.png");
call addFruit('Prune Mirabelle',0.20,"Le mirabellier est un petit arbre d'environ 4 à 5 mètres, rustique et productif très présent dans le Nord-Est de la France dont les prunes sont appréciées dans tous le pays. Les mirabelles sont de petites prunes rondes, jaune doré ou orangées, parfois ponctuées de rose, toujours très goûteuses, et dont la récolte se situe entre la fin du mois d'août et le début du mois de septembre. Vendue à l'unité.","France, Lorraine","prune_mirabelle.png");
call addFruit('Tomate',0.30,"Très simple à consommer, elle se prête à une infinité de préparations. Très riche au niveau nutritionnel, elle a de véritables atouts bien-être. Toutes ses qualités en font le légume le plus consommé en France. Vendue à l'unité.","France, Pays de la Loire","tomate.png");
call addFruit('Marron',0.30,"Le marron est un fruit de forme ovale d'environ quatre centimètres. Il révèle une couleur marron foncé avec des stries noires et une petite partie ovale de couleur beige.Vendues en barquettes de 100g","France, Rhône-Alpes","marron.png");
call addFruit('Noisette',0.20,"La noisette est un fruit sec oléagineux certes calorique mais d'un grand intérêt nutritionnel, riche en acides gras insaturés, en vitamine E et en magnésium. Récoltée d'août à octobre, on l'achète fraîche ou sèche, en coque ou décortiquée. Elle se glisse dans de nombreuses recettes ou se croque telle quelle.Vendues en barquettes de 100g.","France, Avignon","noisette.png");
call addFruit('Noix',0.20,"Ce fruit est aussi délicieux à croquer qu’intégré à toutes vos recettes, salées et sucrées, auxquelles il apporte une touche goûteuse et croquante.Vendues en barquettes de 100g.","France, Rhône-Alpes","noix.png");



call addCategorieToFruit(1,4);
call addCategorieToFruit(2,5);
call addCategorieToFruit(3,4);
call addCategorieToFruit(4,5);
call addCategorieToFruit(5,6);
call addCategorieToFruit(6,4);
call addCategorieToFruit(7,2);
call addCategorieToFruit(8,1);
call addCategorieToFruit(9,4);
call addCategorieToFruit(10,2);
call addCategorieToFruit(11,1);
call addCategorieToFruit(12,2);
call addCategorieToFruit(13,1);
call addCategorieToFruit(14,4);
call addCategorieToFruit(15,2);
call addCategorieToFruit(16,2);
call addCategorieToFruit(17,4);
call addCategorieToFruit(18,5);
call addCategorieToFruit(19,6);
call addCategorieToFruit(20,6);
call addCategorieToFruit(21,2);
call addCategorieToFruit(22,4);
call addCategorieToFruit(23,2);
call addCategorieToFruit(24,4);
call addCategorieToFruit(25,2);
call addCategorieToFruit(26,6);
call addCategorieToFruit(27,2);
call addCategorieToFruit(28,2);
call addCategorieToFruit(29,1);
call addCategorieToFruit(30,5);
call addCategorieToFruit(31,5);

call addCategorieToFruit(10,8);
call addCategorieToFruit(7,8);
call addCategorieToFruit(8,8);

call addCategorieToFruit(26,9);
call addCategorieToFruit(27,9);
call addCategorieToFruit(28,9);
call addCategorieToFruit(29,9);
call addCategorieToFruit(30,9);
call addCategorieToFruit(31,9);
call addCategorieToFruit(14,9);
call addCategorieToFruit(15,9);
call addCategorieToFruit(16,9);
call addCategorieToFruit(17,9);
call addCategorieToFruit(18,9);

call addCategorieToFruit(10,10);
call addCategorieToFruit(13,10);
call addCategorieToFruit(14,10);
call addCategorieToFruit(15,10);
call addCategorieToFruit(21,10);
call addCategorieToFruit(22,10);
call addCategorieToFruit(23,10);
call addCategorieToFruit(24,10);
call addCategorieToFruit(34,10);
call addCategorieToFruit(35,10);
call addCategorieToFruit(36,10);
call addCategorieToFruit(37,10);
call addCategorieToFruit(38,10);
call addCategorieToFruit(39,10);

call addCategorieToFruit(32,5);
call addCategorieToFruit(33,2);
call addCategorieToFruit(34,2);
call addCategorieToFruit(35,4);
call addCategorieToFruit(36,4);
call addCategorieToFruit(37,4);
call addCategorieToFruit(38,2);
call addCategorieToFruit(39,2);
call addCategorieToFruit(40,1);
call addCategorieToFruit(41,4);
call addCategorieToFruit(42,6);
call addCategorieToFruit(43,2);
call addCategorieToFruit(44,2);
call addCategorieToFruit(45,2);
call addCategorieToFruit(46,1);
call addCategorieToFruit(47,4);
call addCategorieToFruit(48,5);
call addCategorieToFruit(49,5);
call addCategorieToFruit(50,6);
call addCategorieToFruit(51,3);
call addCategorieToFruit(52,3);
call addCategorieToFruit(53,3);

call addCommande(1,'03-01-2023 16h45',7.14,'10 Rue du maréchal Joffre');
call addFruitToCommande(1,1,4);
call addFruitToCommande(1,4,1);
call addFruitToCommande(1,25,15);

call addCommande(2,'03-01-2023 18h45',7.14,'11 Rue du maréchal Joffre');
call addFruitToCommande(2,1,4);
call addFruitToCommande(2,4,1);
call addFruitToCommande(2,25,15);

call addCommande(3,'03-01-2023 20h45',7.14,'12 Rue du maréchal Joffre');
call addFruitToCommande(3,1,4);
call addFruitToCommande(3,4,1);
call addFruitToCommande(3,25,15);
