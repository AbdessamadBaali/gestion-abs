
<?php

if ($_SESSION['login_user'])
{

?>
    <form method="POST" action="index.php" class="container w-50 my-5 p-5 m-auto border" >

    <h4 class="mb-3">Ajouter Utilisateur</h4>


        <div class="col-12 m-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="login" value="" placeholder="mail@example.com">
            <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
            </div>
        </div>

        <div class="col-12 m-3">
            <label for="address" class="form-label">Mot De Pass</label>
            <input type="password" class="form-control" name="pass" value=""  placeholder="mot de pass" >
            <div class="invalid-feedback">
                Please enter your telephone.
            </div>
        </div>
 
        <div class="col-12 m-3">
            <select class="form-select " name="type_user">

                <option selected disabled>select type utilisateur</option>
                <option value='formateur'>formateur</option>
                <option value='admin'>admin</option>

            </select>
        </div>

        <div class="col-3 m-3">
            <input class="btn btn-outline-dark" type="submit" class="form-control"  name="add_mody" value="<?= $btn_val ?> Utilisateur">
        </div>
    </form>

    <?php
    }
else 
{
    header("location: ../index.php");
}