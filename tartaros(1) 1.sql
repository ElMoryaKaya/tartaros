SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `achat` (
  `id` int(11) NOT NULL,
  `date_achat` date NOT NULL,
  `produit_ID` int(11) NOT NULL,
  `utilisateur_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `adresse` (
  `id` int(11) NOT NULL,
  `ville_client` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `code_postal` varchar(255) DEFAULT NULL,
  `pays` date DEFAULT NULL,
  `utilisateur_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `cles_achat` (
  `achet_ID` int(11) NOT NULL,
  `cles_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `cles_activation` (
  `id` int(11) NOT NULL,
  `numero_cles` varchar(255) DEFAULT NULL,
  `produit_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `jeux` (
  `id` int(11) NOT NULL,
  `plateforme_ID` int(11) NOT NULL,
  `type_jeux_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `texte` text NOT NULL,
  `date_envoi` date NOT NULL,
  `utilisateur_ID` int(11) NOT NULL,
  `probleme_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `date_ajout` date DEFAULT NULL,
  `produit_ID` int(11) NOT NULL,
  `utilisateur_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `plateforme` (
  `id` int(11) NOT NULL,
  `nom_console` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `probleme` (
  `id` int(11) NOT NULL,
  `motif` varchar(255) NOT NULL,
  `utilisateur_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom_produit` varchar(255) DEFAULT NULL,
  `date_sortie` date DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `note` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `type_jeux` (
  `id` int(11) NOT NULL,
  `type_jeux` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom_client` varchar(255) DEFAULT NULL,
  `prenom_client` varchar(255) DEFAULT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `statut` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `utilisateur` (`id`, `nom_client`, `prenom_client`, `pseudo`, `email`, `mot_de_passe`, `statut`) VALUES
(1, NULL, NULL, 'andre242', 'andre35@gmail.com', '123456', 'Administrateur');


ALTER TABLE `achat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produit_ID` (`produit_ID`),
  ADD KEY `utilisateur_ID` (`utilisateur_ID`);


ALTER TABLE `adresse`
  ADD UNIQUE KEY `utilisateur_ID` (`utilisateur_ID`);


ALTER TABLE `cles_achat`
  ADD PRIMARY KEY (`achet_ID`,`cles_ID`),
  ADD KEY `cles_ID` (`cles_ID`);


ALTER TABLE `cles_activation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero_cles` (`numero_cles`),
  ADD KEY `produit_ID` (`produit_ID`);


ALTER TABLE `jeux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plateforme_ID` (`plateforme_ID`),
  ADD KEY `type_jeux_ID` (`type_jeux_ID`);


ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_ID` (`utilisateur_ID`),
  ADD KEY `probleme_ID` (`probleme_ID`);


ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produit_ID` (`produit_ID`),
  ADD KEY `utilisateur_ID` (`utilisateur_ID`);


ALTER TABLE `plateforme`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `probleme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_ID` (`utilisateur_ID`);

ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom_produit` (`nom_produit`);


ALTER TABLE `type_jeux`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);


ALTER TABLE `achat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `cles_activation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `plateforme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `probleme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `type_jeux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `achat`
  ADD CONSTRAINT `achat_ibfk_1` FOREIGN KEY (`produit_ID`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `achat_ibfk_2` FOREIGN KEY (`utilisateur_ID`) REFERENCES `utilisateur` (`id`);


ALTER TABLE `adresse`
  ADD CONSTRAINT `adresse_ibfk_1` FOREIGN KEY (`utilisateur_ID`) REFERENCES `utilisateur` (`id`);


ALTER TABLE `cles_achat`
  ADD CONSTRAINT `cles_achat_ibfk_1` FOREIGN KEY (`achet_ID`) REFERENCES `achat` (`id`),
  ADD CONSTRAINT `cles_achat_ibfk_2` FOREIGN KEY (`cles_ID`) REFERENCES `cles_activation` (`id`);


ALTER TABLE `cles_activation`
  ADD CONSTRAINT `cles_activation_ibfk_1` FOREIGN KEY (`produit_ID`) REFERENCES `produit` (`id`);


ALTER TABLE `jeux`
  ADD CONSTRAINT `jeux_ibfk_1` FOREIGN KEY (`id`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `jeux_ibfk_2` FOREIGN KEY (`plateforme_ID`) REFERENCES `plateforme` (`id`),
  ADD CONSTRAINT `jeux_ibfk_3` FOREIGN KEY (`type_jeux_ID`) REFERENCES `type_jeux` (`id`);


ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`utilisateur_ID`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`probleme_ID`) REFERENCES `probleme` (`id`);


ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`produit_ID`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `panier_ibfk_2` FOREIGN KEY (`utilisateur_ID`) REFERENCES `utilisateur` (`id`);


ALTER TABLE `probleme`
  ADD CONSTRAINT `probleme_ibfk_1` FOREIGN KEY (`utilisateur_ID`) REFERENCES `utilisateur` (`id`);
COMMIT;

