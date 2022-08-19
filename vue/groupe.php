
<?php



if ($_SESSION['login_user'])
{

?>
<form method="POST" action="index.php"
        class="container m-4 w-50 my-5 p-4 m-auto border">
            <h4 class="mb-3"><?=   $btn_val ?> Groupe</h4>
                <div class="col-12">
                    <label for="firstName" class="form-label">Le Nom De Groupe</label>
                    <input type="text" class="form-control" name="goupe" placeholder=""
                    value="<?php 
                        if (isset($info_groupe)) echo $info_groupe[0]->nom;
                        else echo "" ;
                        ?>"
                     required>
                    <div class="invalid-feedback">
                            Groupe a ete Ajouter
                    </div>
                </div>
                <select class="form-select my-2" name="filier">
                    <option selected disabled>select filier</option>
                    <?php
                        foreach ($filiers as $key => $value) {
                            if ($id == $value->nom) echo "<option selected value='$value->id_filier'>$value->nom</option>";
                            else echo "<option value='$value->id_filier'>$value->nom</option>";
                        }   
                        
                    ?>
                </select>

                <div class="col-4 my-2">
                    <input type="hidden" name="mody" value="<?php if (isset($_GET['mody'])) echo $_GET['mody']?>">
                    <input  class="btn btn-outline-dark" type="submit" class="form-control" name="add_mody" value="<?=   $btn_val ?> Groupe">
                </div>
            
</form>

<?php
  
} else 
{
    header("location: ../index.php");
}