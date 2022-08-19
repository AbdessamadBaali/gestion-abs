
<?php

if ($_SESSION['login_user'])
{

?>
<form method="POST" action="index.php" class="w-75 my-5 p-4 m-auto border">

    <h4 class="mb-3"><?= $btn_val?>  Stagiaire</h4>
    <div class="row g-3">

        <div class="col-sm-4">
            <label for="firstName" class="form-label">Cne</label>
            <input type="number" class="form-control" name="cne" placeholder="cne " 
                value="<?php 
                    if (isset($info_stagiaire)) echo $info_stagiaire[0]->cne;
                    else "" ;
                
                ?>" 
                required>
            <div class="invalid-feedback">
                Valid first name is required.
            </div>
        </div>


        <div class="col-sm-4">
            <label for="firstName" class="form-label">Prenom</label>
            <input type="text" class="form-control" name="prenom" placeholder="prenom" 
                value="<?php 
                    if (isset($info_stagiaire)) echo $info_stagiaire[0]->prenom;
                    else "" ;
                
                ?>" 
                required>
            <div class="invalid-feedback">
                Valid first name is required.
            </div>
        </div>


        <div class="col-sm-4">
            <label for="lastName" class="form-label">Nom</label>
            <input type="text" class="form-control" name="nom" placeholder="nom" 
                value="<?php 
                    if (isset($info_stagiaire)) echo $info_stagiaire[0]->nom ;
                    else "" ;
                    ?>" 
                required> 
            <div class="invalid-feedback">
                Valid last name is required.
            </div>
        </div>


        <div class="col-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email"                         
                value="<?php 
                        if (isset($info_stagiaire)) echo $info_stagiaire[0]->login;
                        else "" ;
                    
                    ?>" 
                required  placeholder="mail@example.com">
            <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
            </div>
        </div>


        <div class="col-sm-6">
            <label for="address" class="form-label">Ville</label>
            <input type="text" class="form-control" name="ville" 
                value="<?php 
                        if (isset($info_stagiaire)) echo $info_stagiaire[0]->ville; 
                        else echo "" ;
                        ?>" 
                placeholder="ville" required>
            <div class="invalid-feedback">
                Please enter your telephone.
            </div>
        </div>


        <div class="col-sm-6">
            <label for="address" class="form-label">Adress</label>
            <input type="text" class="form-control" name="adress" 
                value="<?php 
                            if (isset($info_stagiaire)) echo $info_stagiaire[0]->adress;
                            else echo "" ;
                        ?>" 
                        placeholder="adress" required>
            <div class="invalid-feedback">
                Please enter your shipping address.
            </div>
        </div>


        <div class="col-12">
            <label for="address" class="form-label">Tele</label>
            <input type="number" class="form-control" name="tel"  
            value="<?php 
                        if (isset($info_stagiaire)) echo $info_stagiaire[0]->tel; 
                        else echo "" ;
                        ?>" 
                        placeholder= "telephone" required>
            <div class="invalid-feedback">
                Please enter your telephone.
            </div>
        </div>
    

        <div class="col-sm-6">
            <label for="address" class="form-label">Date Naissance</label>
            <input type="date" class="form-control" name="dateN"  
            value="<?php 
                        if (isset($info_stagiaire)) echo $info_stagiaire[0]->dateN; 
                        else echo "" ;
                        ?>" 
                        placeholder= "telephone" required>
            <div class="invalid-feedback">
                Please enter your date de naissance.
            </div>
        </div>


        <div class="col-sm-6">
        <label for="address" class="form-label">Groupe</label>

                <select class="form-select" name="groupe">
                    <option selected disabled>-- select groupe --</option>
                    <?php
                        foreach ($list_groupe as  $value) {
                            if ($id == $value->id_groupe) echo "<option selected value='$value->id_groupe'>$value->nom</option>";
                            else echo "<option value='$value->id_groupe'>$value->nom</option>";
                        }   
                        
                    ?>
                </select>
            <div class="invalid-feedback">
                Please enter your date de naissance.
            </div>
        </div>


        <div class="col-3">
            <input type="hidden" name="mody" value="<?php if (isset($_GET['mody'])) echo $_GET['mody']?>">
            <input class="btn btn-outline-dark" type="submit" class="form-control"  name="add_mody" value="<?= $btn_val?> Stagiaire">
        </div>
    </div>

</form>

<?php
    }
else 
{
    header("location: ../index.php");
}