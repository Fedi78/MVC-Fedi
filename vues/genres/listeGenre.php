<div class="container mt-5">
<div class="row pt-4">

<div class="col-9"><h2>Liste des Genres</h2></div>
  <div class="col-3"><a href="index.php?uc=genres&action=add" class='btn btn-success'> <img src="./images/plus-circle.svg" width="25" > Créer un genre
</a>
  </div>
</div>
<br>


        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <td class="col-md-2"><strong>Numéro</strong></td>
                    <td class="col-md-6"><strong>Libellé</strong></td>
                    <td class="col-md-2"><strong>Actions</strong></td>
                </tr>
            </thead>

        <?php
    foreach($lesGenres as $genre){

    echo "<tr>";
    echo "<td>" . $genre->getNum() ." </td>";
    echo "<td>" . $genre->getLibelle() ."</td>";
    echo"
    
    <td>
        <a href='index.php?uc=genres&action=update&num=" . $genre->getNum() ."' class='btn btn-primary'><img src='./images/modifier.svg'>
        </a>   &nbsp;
        <a href='#modalSuppr' data-toggle='modal' data-message='Voulez-vous supprimer ce genre ?' data-suppr='index.php?uc=genres&action=delete&num=" . $genre->getNum() ." ' class='btn btn-danger'><img src='./images/supp.svg'><i class='far fa-trash-alt'></i></a></td>";
        echo "</tr>";
    }
    ?>
</table>
</div>

<br>
<br>