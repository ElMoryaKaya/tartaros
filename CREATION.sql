CREATE DATABASE TARTAROS;

USE DATABASE TARTAROS;

CREATE TABLE type_jeux (
   id int(11) not null AUTO_INCREMENT,
   type_jeux varchar(255),
   PRIMARY KEY(id)
 );

 CREATE TABLE plateforme (
   id int(11) not null AUTO_INCREMENT,
   nom_console varchar(255),
   PRIMARY KEY(id)
 );

CREATE TABLE utilisateur (
  id INT(11) NOT NULL AUTO_INCREMENT,
  nom_client VARCHAR(255),
  prenom_client VARCHAR(255),
  pseudo VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  mot_de_passe VARCHAR(255) NOT NULL,
  statut VARCHAR(255),
  deleted_at DATE NULL,
  actif BOOLEAN not null default 1,
  utilisateur_ID INT(11),
  PRIMARY KEY (id),
  FOREIGN KEY (utilisateur_ID) REFERENCES utilisateur(id)
);

CREATE TABLE adresse (
    id INT(11) NOT NULL,
    ville_client VARCHAR(255),
    adresse VARCHAR(255),
    code_postal VARCHAR(255),
    pays DATE,
    utilisateur_ID INT(11) NOT NULL UNIQUE,
    FOREIGN KEY (utilisateur_ID) REFERENCES utilisateur(id)
);

CREATE TABLE probleme (
  id INT(11) NOT NULL AUTO_INCREMENT,
  motif VARCHAR(255) NOT NULL,
  utilisateur_ID INT(11) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (utilisateur_ID) REFERENCES utilisateur(id)
);

CREATE TABLE message (
  id INT(11) NOT NULL AUTO_INCREMENT,
  texte TEXT NOT NULL,
  date_envoi DATE NOT NULL,
  utilisateur_ID INT(11) NOT NULL,
  probleme_ID INT(11) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (utilisateur_ID) REFERENCES utilisateur(id),
  FOREIGN KEY (probleme_ID) REFERENCES probleme(id)
);

CREATE TABLE probleme (
  id INT(11) NOT NULL AUTO_INCREMENT,
  motif VARCHAR(255) NOT NULL,
  utilisateur_ID INT(11) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (utilisateur_ID) REFERENCES utilisateur(id)
);

ALTER TABLE produit
ADD COLUMN utilisateur_id INT(11),
ADD CONSTRAINT fk_utilisateur
    FOREIGN KEY (utilisateur_id)
    REFERENCES utilisateur(id);


CREATE TABLE produit (
  id INT(11) NOT NULL AUTO_INCREMENT,
  nom_produit VARCHAR(255) UNIQUE,
  type_produit VARCHAR(255) Not null,
  date_sortie DATE,
  prix FLOAT,
  note INT(11),
  PRIMARY KEY (id),
  utilisateur_ID INT(11) NOT NULL,
  FOREIGN KEY (utilisateur_ID) REFERENCES utilisateur(id)
);

CREATE TABLE cles_activation (
  id INT(11) NOT NULL AUTO_INCREMENT,
  numero_cles VARCHAR(255) UNIQUE,
  produit_ID INT(11) NOT NULL,
  FOREIGN KEY (produit_ID) REFERENCES produit(id),
  PRIMARY KEY (id)
);

CREATE TABLE panier (
  id INT(11) NOT NULL AUTO_INCREMENT,
  date_ajout DATE,
  produit_ID INT(11) NOT NULL,
  utilisateur_ID INT(11) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (produit_ID) REFERENCES produit(id),
  FOREIGN KEY (utilisateur_ID) REFERENCES utilisateur(id)
);

CREATE TABLE jeux (
    id INT(11) NOT NULL,
    plateforme_ID INT(11) NOT NULL,
    type_jeux_ID INT(11) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id) REFERENCES produits(id),
    FOREIGN KEY (plateforme_ID) REFERENCES plateforme(id),
    FOREIGN KEY (type_jeux_ID) REFERENCES type_jeux(id)
);

CREATE TABLE achat (
    id INT(11) NOT NULL AUTO_INCREMENT,
    date_achat DATE NOT NULL,
    produit_ID INT(11) NOT NULL,
    utilisateur_ID INT(11) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (produit_ID) REFERENCES produit(id),
    FOREIGN KEY (utilisateur_ID) REFERENCES utilisateur(id)
);

CREATE TABLE cles_achat (
    achet_ID INT(11) NOT NULL,
    cles_ID INT(11) NOT NULL,
    PRIMARY KEY (achet_ID, cles_ID),
    FOREIGN KEY (achet_ID) REFERENCES achat(id),
    FOREIGN KEY (cles_ID) REFERENCES cles_activation(id)
);
