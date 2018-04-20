<?php
try
{
    $bdd= new PDO ('mysql:host=localhost;dbname=pokemon;charset=utf8','root','');
}
catch (Exception $e){
    die ('Erreur : '.$e->getMessage());
}
?>






<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Base de données Pokemon</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="container">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="http://www.pngmart.com/files/2/Pokeball-PNG-Pic.png" alt="" id="imagenavbar">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Infos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Catalogue</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="row">
        <div class="col-3">
            <ul class="menu-familles">
                <li><a href="page.php?type=plante" class="btn btn-primary">Plante</a></li>
                <li><a href="page.php?type=feu" class="btn btn-primary">Feu</a></li>
                <li><a href="page.php?type=electricite" class="btn btn-primary">Electricité</a></li>
                <li><a href="page.php?type=eau" class="btn btn-primary">Eau</a></li>
            </ul>
        </div>
        <div class="col-9 bloc-pokemons">
            <!-- fiche pokemon debut -->
            <?php
            $reponse=$bdd->query('SELECT * FROM pokemon WHERE type1="' . $_GET['type']. '" OR type2="'.$_GET['type'].'"');
            while ($donnees=$reponse->fetch()) {


                ?>

                <!-- fiche pokemon debut -->
                <div class="row fiche-pokemon">
                    <div class="col-3">
                        <img class="img-fluid" src="<?php echo $donnees["urlimage"] ?>">
                    </div>
                    <div class="col-9">

                        <h4><?php echo $donnees["nom"] ?></h4>

                        <p><?php echo $donnees ["type1"]?></p>

                        <p><?php echo $donnees ["type2"]?></p>
                    </div>
                </div>
                <!-- fiche pokemon fin -->
                <?php
            }
            ?>
        </div>
    </div>
    <footer>
        Ceci est le pied de page.
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>