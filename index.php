    <?php ob_start();
        session_start(); 
        include ("vues/header.php");
        include ("modeles/Continent.php");
        include ("modeles/Nationalite.php");
        include ("modeles/monPdo.php");
        include ("vues/messageFlash.php");
        include ("modeles/genre.php");
        include "modeles/auteur.php";

    $uc = empty($_GET['uc']) ? "accueil" : $_GET["uc"];

    switch($uc)
    { 
        case 'accueil' :
            include ('vues/Accueil.php');
            break;
        case 'continents' :
            include ('controllers/continentController.php');
            break;
            case 'nationalite' :
                include ('controllers/nationaliteController.php');
                break;//brexk modal
        case 'genres' :
                include('controllers/genreController.php');
            break;
        case 'auteurs' :
            include('controllers/auteurController.php');
        break;
    }
    include "vues/footer.php"; ?>

