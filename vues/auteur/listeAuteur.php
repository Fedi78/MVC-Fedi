<div class="container mt-5">

  <div class="row pt-3">
    <div class="col-9">
      <h2>Liste des Auteurs</h2>
    </div>
    <div class="col-3">
      <a href="index.php?uc=auteurs&action=add" class='btn btn-success'>
        <img src="./images/plus-circle.svg" width="20"><i class="fas fa-plus-circle"></i> Créer un Auteur
      </a>
    </div>
  </div>

  <br>

  <form action="index.php?uc=auteurs&action=list" method="post" class="border border-primary rounded p-3">

    <div class="row">
      <div class="col">
        <input type="text" class="form-control" id="libelle" placeholder="Saisir le libellé" name="nom" value="<?php echo $nom; ?>">
      </div>
      <div class="col">
        <select name="continent" class="form-control" onChange="document.getElementById('formRecherche').submit()">
          <?php      
            echo "<option value='Tous'> Tous les continents</option>";
            foreach($lesNationalites as $nationalite) {
              $selection = $nationalite->getNum() == intval($nationaliteSel) ? 'selected' : '';
              echo "<option value='" . $nationalite->getNum() . "' " . $selection . ">" . $nationalite->getLibelle() . "</option>";
            }
          ?>
        </select>
      </div>
      <div class="col">
        <button type="submit" class="btn btn-success btn-block">Rechercher</button>
      </div>
    </div>

  </form>

  <div class="container mt-5">
    <table class="table table-hover table-dark">
      <thead>
        <tr>
          <th class="col-md-2"><strong>Numéro</strong></th>
          <th class="col-md-4"><strong>Nom</strong></th>
          <th class="col-md-3"><strong>Prenom</strong></th>
          <th class="col-md-2"><strong>Nationalites</strong></th>
          <th class="col-md-2"><strong>Actions</strong></th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach($lesAuteurs as $auteur) {
            echo "<tr>";
            echo "<td>" . $auteur->numero . "</td>";
            echo "<td>" . $auteur->nom . "</td>";
            echo "<td>" . $auteur->prenom . "</td>";
            echo "<td>" . $auteur->libNationalite . "</td>";
            echo "<td>
                    <a href='index.php?uc=auteurs&action=update&num=". $auteur->numero ."' class='btn btn-success'>
                      <img src='./images/modifier.svg'>
                    </a>
                    <a href='#modalSuppr' data-toggle='modal' data-message='Voulez-vous supprimer cette Auteur ?' data-suppr='index.php?uc=auteurs&action=delete&num=$auteur->numero' class='btn btn-danger'>
                      <img src='./images/supp.svg'><i class='fas fa-plus-circle'></i>
                    </a>
                  </td>";
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
  </div>
    <br>
    <br