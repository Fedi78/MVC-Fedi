<div class="container mt-5">

<div class="row pt-3">
<div class="col-9">
  <h2>Liste des Nationalités</h2>
</div>
<div class="col-3">
  <a href="index.php?uc=nationalite&action=add" class='btn btn-success'>
    <img src="./images/plus-circle.svg" width="20"><i class="fas fa-plus-circle"></i> Créer une nationalité
  </a>
</div>
</div>

<br>

<form action="index.php?uc=nationalite&action=list" method="post" class="border border-primary rounded p-3">

<div class="row">
  <div class="col">
    <input type="text" class="form-control" id="libelle" placeholder="Saisir le libellé" name="libelle" value="<?php echo $libelle; ?>">
  </div>
  <div class="col">
    <select name="continent" class="form-control" onChange="document.getElementById('formRecherche').submit()">
      <?php      
        echo "<option value='Tous'> Tous les continents</option>";
        foreach($lesContinents as $continent) {
          $selection = $continent->getNum() == intval($continentSel) ? 'selected' : '';
          echo "<option value='" . $continent->getNum() . "' " . $selection . ">" . $continent->getLibelle() . "</option>";
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
      <th class="col-md-4"><strong>Libellé</strong></th>
      <th class="col-md-3"><strong>Continent</strong></th>
      <th class="col-md-2"><strong>Actions</strong></th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach($lesNationalites as $nationalite) {
        echo "<tr>";
        echo "<td>" . $nationalite->numero . "</td>";
        echo "<td>" . $nationalite->libNation . "</td>";
        echo "<td>" . $nationalite->libContinent . "</td>";
        echo "<td>
                <a href='index.php?uc=nationalite&action=update&num=". $nationalite->numero ."' class='btn btn-success'>
                  <img src='./images/modifier.svg'>
                </a>
                <a href='#modalSuppr' data-toggle='modal' data-message='Voulez-vous supprimer cette nationalitée ?' data-suppr='index.php?uc=nationalite&action=delete&num=$nationalite->numero' class='btn btn-danger'>
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