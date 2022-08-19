
<?php

if ($_SESSION['login_user'])
{

?>
<form method="POST" action="index.php" class="container m-4 w-50 my-5 p-4 m-auto border ">
    <h4 class="mb-3"><?= $btn_val ?> Module</h4>
        <div class="col-12">
            <label for="firstName" class="form-label">Nom de Module</label>
            <input type="text" class="form-control" name="module" placeholder="nom du module" 
            value="<?php 
                    if (isset($info_module)) echo $info_module[0]->nom;
                    else echo "" ;
                    ?>"
            required>
            <div class="invalid-feedback">
                Valid first name is required.
        </div>
    </div>


    <div class="col-4 my-2">
        <input type="hidden" name="mody" value="<?php if (isset($_GET['mody'])) echo $_GET['mody']?>">
        <input class="btn btn-outline-dark" type="submit" class="form-control" name="add_mody"  value="<?= $btn_val ?> Module">
    </div>
</form>
<?php
    }
else 
{
    header("location: ../index.php");
}