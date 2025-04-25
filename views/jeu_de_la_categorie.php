<?php
   if (session_status() === PHP_SESSION_NONE) {
    session_start();
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../Style/j_d_l_c.css"> 
  <link rel="stylesheet" type="text/css" href="../Style/style.css">
  <title>Tartaros</title>
</head>
<body>
  <header>
    <?php include("menu_principal.php"); ?>
  </header>
  
  <?php
  if(isset($_POST['category'])) {
    $category = $_POST['category'];
    switch($category) {
      case 'action':
        echo '<h3>action</h3>';
            break;

        case 'RPG':
            echo '<h3>RPG</h3>';
           
            break;

            case 'simulation':
                echo '<h3>simulation</h3>';
                
                break;

                case 'Strategy':
                    echo '<h3>Strategy</h3>';
                  
                    break;

                    case 'Sports':
                        echo '<h3>Sports</h3>';
                        
                        break;

                        case 'FPS':
                            echo '<h3>FPS</h3>';
                          
                            break;

                            case 'Adventure':
                                echo '<h3>Adventure</h3>';
                               
                                break;

                                case 'Indie':
                                    echo '<h3>Indie</h3>';
                                   
                                    break;

        // Ajoutez des cas pour les autres catégories ici...

      default:
        echo '<p>Aucune catégorie sélectionnée</p>';
    }
  } else {
    echo '<p>Aucune catégorie sélectionnée</p>';
  }
  ?>
  

  <footer>
    <?php include("Footer.php"); ?>
  </footer>
</body>
</html>
