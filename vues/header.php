<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <link rel="stylesheet" href="style.css">

    <title>Jumbotron Template for Bootstrap</title>


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://bootswatch.com/4/darkly/bootstrap.css">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
  </head>

  <body>
   
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
      <a class="navbar-brand" href="index.php">Ma Bibliothèque</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
         <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="listeNationalite.php" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestion des genres</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Liste des genres</a>
              <a class="dropdown-item" href="#">ajouter un genres</a>
            </div>
            </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestion des auteurs</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Liste des auteurs</a>
              <a class="dropdown-item" href="#">ajouter un auteurs</a>
              <a class="dropdown-item" href="#">Rechercher un auteurs</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="listeNationalite.php" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestion des Nationalités</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="index.php?uc=nationalite&action=list">Liste des Nationalités</a>
              <a class="dropdown-item" href="index.php?uc=nationalite&action=add">ajouter un Nationalités</a>
            </div> 
              </li>
               <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestion des Continent</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                  <a class="dropdown-item" href="index.php?uc=continents&action=list">Liste des Continent</a>
                  <a class="dropdown-item" href="index.php?uc=continents&action=add">ajouter un Continent</a>
                </div>
              </li>
            </ul>
                <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
              </div>
            </nav> 
<br>
<br> 


                