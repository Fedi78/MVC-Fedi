<div class="container">
<h2 class='pt-4 text-center'><?php echo $mode ?> Un Auteur</h2>
<div class="formulaire"> 
<form action="index.php?uc=auteurs&action=validerForm" method="post">

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
            
        <!-- CONTINENT -->
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
<div class="col"> 
    <a href="index.php?uc=auteurs&action=list" class="btn nat">Revenir à la listes</a>
    <button type="submit"><?php echo $mode; ?></button>
</div>
</div>
</form>   
</div>
</div>