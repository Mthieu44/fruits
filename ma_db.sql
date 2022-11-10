create table fruit(
    id_fruit INT primary key,
    nom VARCHAR2(20) NOT NULL,
    prix FLOAT(2) NOT NULL, 
    description VARCHAR2(200) NOT NULL);

create table categorie(
    id_categorie INT primary key,
    nom VARCHAR(20) NOT NULL,
    description VARCHAR(200) NOT NULL);
    
create table categorisation(
    id_fruit INT,
    id_categorie INT);
    
alter table categorisation add constraint PK_categorisation primary key (id_fruit, id_categorie);
alter table categorisation add constraint FK_categorisation_fruit foreign key (id_fruit) references fruit(id_fruit);
alter table categorisation add constraint FK_categorisation_categorie foreign key (id_categorie) references categorie(id_categorie);

create table client(
    id_client INT primary key, 
    nom VARCHAR2(20) NOT NULL, 
    prenom VARCHAR2(20) NOT NULL, 
    adresse VARCHAR2(60) NOT NULL,
    mail VARCHAR(60) NOT NULL,
    mdp VARCHAR(200) NOT NULL,
    status VARCHAR(20) NOT NULL);
    
create table commande(
    id_commande INT primary key,
    id_client INT NOT NULL,
    date_commande TIMESTAMP WITH LOCAL TIME ZONE NOT NULL,
    prix FLOAT(2) NOT NULL);
    
create table panier(
    id_commande INT NOT NULL,
    id_fruit INT NOT NULL,
    quantite INT NOT NULL);
    
alter table commande add constraint FK_commande_client foreign key (id_client) references client(id_client);
alter table panier add constraint PK_panier primary key (id_commande, id_fruit);
alter table panier add constraint FK_panier_commande foreign key (id_commande) references commande(id_commande);
alter table panier add constraint FK_panier_fruit foreign key (id_fruit) references fruit(id_fruit);


insert into fruit values(1, 'Bananes', 1.50, 'Des bananes jaunes. Vendues à la grappe');
insert into fruit values(2, 'Mangue', 1.50, 'Le meilleur fruit du monde. Vendues à lunité');

insert into categorie values(1, 'Fruits exotiques', 'Fruit venant de pays sous-développés');

insert into categorisation values(1, 1);
insert into categorisation values(2, 1);

select * from fruit;
select * from categorie;
select * from categorisation;
