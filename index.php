<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kindle</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
        <div class="kindle">
            <div class="screen">
                <div class="header">
                    <a href="index.php">⌂ Home</a>
                    <div class="date">
                        10h25
                    </div>
                </div>
                <div class="screen_content">
                  <!-- Mettre le contenu à afficher dans cette div -->
                  
                  <?php 
                    // On récupère la liste des livres
                    require 'books.php';
                    // Si on n'a pas de livre passé en url, on affiche la liste des livres 
                    if(!isset($_GET['book']) || !array_key_exists($_GET['book'], $books)) {
                        echo "<h2>Ma liste de livres</h2>";
                        // Affichage de la liste en images
                        echo "<div class='books-covers view'>";
                        foreach($books as $name => $book) {
                            // On crée un lien vers la même page mais avec la clé du livre en paramètre get
                            echo "<a href='index.php?book=".$name."'>";
                            // On affiche l'image dynamiquement d'après la clé du livre
                            echo "<img src='images/".$name.".jpg' />";
                            echo "</a>";
                        }
                        echo "</div>";

                        // Affichage de la liste en texte détaillé
                        echo "<div class='details view hidden'>";
                        echo "<ul>";
                        // On reboucle sur tous les livres
                        foreach ($books as $name => $book) {
                            // Pour chaque livre on affiche un lien et les infos du libre
                            echo "<li>
                                    <a class='titre' href='index.php?book=".$name."'>". $book['titre']. "</a>
                                    - <span class='auteur'>".$book['auteur']."</span> <span class='date'>".$book['annee']."
                                  </li>";
                        }
                        echo "</ul>";
                        echo "</div>";
                        echo "<div class='change-view'>Changer de vue</div>";
                    } else {
                        require 'livres/'. $_GET['book']. '.php';
                    }
                   ?>
                </div>
            </div>
            <h2>Kindle</h2>
        </div>
    </div>
    <!-- On ajoute notre script pour pouvoir changer de vue -->
    <script src="app.js"></script>
</body>
</html>