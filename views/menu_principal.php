<nav>
    <ul class="nav-links">
        <?php
        if (isset($_SESSION['statut'])) {
 
            if ($_SESSION['statut'] === 'utilisateur') {
               
                // Menu utilisateur
                echo '<li><a href="../views/index.php">Accueil</a></li>';
                echo '<li><a href="catalogue.php">Catalogue</a>';
                echo '</li>';
                echo '<li><a href="../views/view_theme.php">Thèmes</a></li>';
                echo '<li><a href="../views/view_extension.php">Extensions</a></li>';
                echo '<li><a href="chat.php">Contact</a></li>';
                echo '<li class="right-align"><a href="../models/models_deconnection.php">Déconnexion</a></li>';
 
            } elseif ($_SESSION['statut'] === 'administrateur') {
               
                // Menu administrateur
                echo '<li><a href="../views/index.php">Accueil</a></li>';
                echo '<li class="deroulant"><a href="Catalogue.php">Catalogue</a>';
                echo '</li>';
                echo '<li><a href="../views/view_theme.php">Thèmes</a></li>';
                echo '<li><a href="../views/view_extension.php">Extensions</a></li>';
                echo '<li class="deroulant"><a href="#">Administrateur</a>';
                    echo '<ul class="sous">';
                        echo '<li><a href="../views/gestion_produit.php">Gestion des Produits</a></li>';
                        echo '<li><a href="view_gestion_utilisateurs.php">Gestion des utilisateurs</a></li>';
                        echo '<li><a href="#">Gestion des rapports</a></li>';
                        echo '<li><a href="#">Paramètres du compte </a></li>';
                        echo '<li><a href="../models/models_deconnection.php">Déconnexion</a></li>';
                    echo '</ul>';
                echo '</li>';
            }
        } else {
           
                // Menu principal (non connecté)
                echo '<li><a href="index.php">Accueil</a></li>';
                echo '<li><a href="Catalogue.php">Catalogue</a>';                 
                echo '</li>';
                echo '<li><a href="../views/view_theme.php">Thèmes</a></li>';
                echo '<li><a href="../views/view_extension.php">Extensions</a></li>';
                echo '<li><a href="chat.php">Contact</a></li>';
                echo '<li class="right-align"><a href="Page_Inscription_Utilisateur.php">S\'inscrire</a></li>';
                echo '<li class="right-align"><a href="../views/connexion_utilisateur.php">Connexion</a></li>';
            }
        ?>
    </ul>
</nav>
 