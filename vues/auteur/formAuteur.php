<div class="container mt-5">
<h2 class='pt-4 text-center'><?php echo $mode ?> Un Auteur</h2>
<form action="index.php?uc=auteurs&action=validerForm" method="post"
class="col-md-6 offset-md-3 border border-primary p-3 rounded">
<div class="form-group">
    <label for="nom">Nom</label>
        <input type="text" class="form-control" id="nom" placeholder="Saisir le nom" name="nom" value="<?php if ($mode == 'Modifier' && isset($auteur)) {
          echo $auteur->getNom();
            } ?>">
        </div>
        <div class="form-group">
            <label for="nom">Prenom</label>
            <input type="text" class="form-control" id="prenom" placeholder="Saisir le prenom" name="prenom" value="<?php if ($mode == 'Modifier' && isset($auteur)) {
                echo $auteur->getPrenom();
            } ?>">
        </div>
        <div class="form-group">
            <label for="nationalite">Nationalite</label>
    <select name="nationalite" class="form-control">
        <?php foreach ($lesNationalites as $nationalite) {
            $selection = '';
            if ($mode == 'Modifier' && isset($auteur)) {
                $selection = $nationalite->getNum() == $auteur->getNationalite()->getNum() ? 'selected' : '';
            }
            echo "<option value='" . $nationalite->getNum() . "'" . $selection . ">" . $nationalite->getLibelle() . "</option>";
                } ?>
            </select>
        </div>
        
            <input type="hidden" id="num" name="num" value="<?php if ($mode == 'Modifier' && isset($auteur)) {
                echo $auteur->getNum();
            } ?>" >

<br>
<div class="row">
<div class="col"><a href="index.php?uc=auteurs&action=list" class='btn btn-primary btn-block'>Revenir a La Liste</a> </div>
<div class="col"><div class="col"><button type='submit' class='btn btn-success btn-block'> <?php echo $mode ?> </button> </div>
</div>
</div>
</form>   
</div>
</div>