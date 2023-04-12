<?php
$action = $_GET['action'];
switch ($action) {
    case 'list':
        // traitement du formulaire recherche
        $libelle = "";
        $continentSel = "Tous";
        if (!empty($_POST['libelle']) || !empty($_POST['continent'])) {
            $libelle = $_POST['libelle'];
            $continentSel = $_POST['continent'];
        }
        $lesContinents = Continent::findAll();
        $lesNationalites = Nationalite::findAll($libelle, $continentSel);
        include('vues/nationalite/listeNationalite.php');
        break;
    case 'add':
        $mode = "Ajouter";
        $lesContinents = Continent::findAll();
        include('vues/nationalite/formNationalite.php');
        break;
    case 'update':
        $lesContinents = Continent::findAll();
        $mode = "Modifier";
        $laNationalite = Nationalite::findById($_GET['num']);
        include('vues/nationalite/formNationalite.php');
        break;
        case 'delete' :
            $laNationalite = Nationalite::findById($_GET['num']);
            $nb=Nationalite::delete($laNationalite);

            if($nb==1)
            {
              $_SESSION['message']=["success"=>"La nationalitée a bien été supprimer"];
            }
            else
            {
                $_SESSION['message']=["danger"=>"La nationalitée n'a pas été supprimer"]; 
            }
            header('location: index.php?uc=nationalite&action=list');
            exit();
            break;
    case 'validerForm':
        $nationalite = new Nationalite;
        $continent = Continent::findById($_POST['continent']);
        if (empty($_POST['num'])) { //cas d'une création
            $nationalite->setLibelle($_POST['libelle'])
                ->setContinent($continent);
            $nb = Nationalite::add($nationalite);
            $message = "ajoutée";
        } else {
            $nationalite->setNum($_POST['num']) //cas d'une modif
                ->setLibelle($_POST['libelle'])
                ->setContinent($continent);
            $nb = Nationalite::update($nationalite);
            $message = "modifiée";
        }
        if ($nb == 1) {
            $_SESSION['message'] = ["success" => "La nationalité a bien été $message"];
        } else {
            $_SESSION['message'] = ["danger" => "La nationalité n'a pas été $message"];
        }
        header('location: index.php?uc=nationalite&action=list');
        exit();
        break;
}
