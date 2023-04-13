<?php 
$action = isset($_GET['action']) ? $_GET['action'] : 'list';
switch ($action) {
    case 'list':
        $nom = "";
        $prenom = "";
        $nationaliteSel = "Tous";
        if (!empty($_POST['nom']) || !empty($_POST['prenom']) || !empty($_POST['nationalite'])) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $nationaliteSel = $_POST['nationalite'];
        }
        $lesNationalites = Nationalite::findAll2();
        $lesAuteurs = Auteur::findAll($nom, $prenom, $nationaliteSel);

        include('vues/auteur/listeAuteur.php');
        break;
    case 'add':
        $mode = "Ajouter";
        $lesNationalites = Nationalite::findAll2();
        include("vues/auteur/formAuteur.php");
        break;
    case 'update':
        $mode = "Modifier";
        $lesNationalites = Nationalite::findAll2();
        $auteur = Auteur::findById($_GET['num']);
        include("vues/auteur/formAuteur.php");
        break;
    case 'delete':
        $auteur = Auteur::findById($_GET['num']);
        $nb = Auteur::delete($auteur);

        if ($nb == 1) {
            $_SESSION['message'] = ["success" => "L'auteur a bien été supprimé"];
        } else {
            $_SESSION['message'] = ["danger" => "L'auteur n'a pas été supprimé"];
        }
        header("Location: index.php?uc=auteurs&action=list");
        exit();
        break;

    case 'validerForm':
        $auteur = new Auteur();
        $nationalite = Nationalite::findById($_POST['nationalite']);

        if (empty($_POST['num'])) {
            $auteur->setNom($_POST['nom']);
            $auteur->setPrenom($_POST['prenom']);
            $auteur->setNumNationalite(Nationalite::findById($_POST['nationalite']));
            $nb=Auteur::add($auteur);
            $message = "ajouter";
        } else {
                $auteur->setNom($_POST['nom']);
                $auteur->setPrenom($_POST['prenom']);
                $auteur->setNum($_POST['num']);
                $auteur->setNumNationalite(Nationalite::findById($_POST['nationalite']));
                $nb=Auteur::update($auteur);
                $message = "modifier";
        }
        if ($nb == 1) {
            $_SESSION['message'] = ["success" => "L'auteur a bien été $message"];
        } else {
            $_SESSION['message'] = ["danger" => "L'auteur n'a pas été $message"];
        }

        header("Location: index.php?uc=auteurs&action=list");
        exit();
        break;


}
