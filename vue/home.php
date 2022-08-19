
<?php
if ($_SESSION['login_user'])
{

    if (isset($_SESSION['type_user']) and $_SESSION['type_user'] == 'admin'){
?>

<section class='d-flex flex-column align-items-center ' >
    <h1 class='text-capitalize m-2'>quel type d'utilisateur voulez vous afficher ?</h1>
        
    <form action="index.php" method="post" class="d-flex">

            <div class="form-check m-2">
                <input class="form-check-input" type="radio" id="admin" name="option"  value="Utilisateurs"> 
                <label class="form-check-label" for="admin" >
                    Utilisateurs
                </label>
            </div>

            <div class="form-check m-2">
                <input class="form-check-input" type="radio" id="formateur" name="option"  value="formateur">
                <label class="form-check-label" for="formateur">
                    Formateur
                </label>
            </div>

            <div class="form-check m-2">
                <input class="form-check-input" type="radio" id="etud" name="option" value="stagiaire">
                <label class="form-check-label"  for="etud">
                    Stagiaire
                </label>
            </div>

            <div class="form-check m-2">
                <input class="form-check-input" type="radio" id="filier" name="option" value="filier">
                <label class="form-check-label"  for="filier">
                    Filier
                </label>
            </div>

            <div class="form-check m-2">
                <input class="form-check-input" type="radio" id="module" name="option" value="module">
                <label class="form-check-label"  for="module">
                    Module
                </label>
            </div>
            
            <div class="form-check m-2">
                <input class="form-check-input" type="radio" id="groupe" name="option" value="groupe">
                <label class="form-check-label"  for="groupe">
                    Groupe
                </label>
            </div>
            <div class="form-check m-2">
                <input type="submit" class="btn btn-outline-dark" name="btnAfficher" value="Afficher">
            </div>
        </form>   
</section>
<?php

} else {

?>
<section class='d-flex flex-column align-items-center justify-content-center vh-100'>  
    <h1 class='text-capitalize m-2'>Gestion Absence</h1>
</section>


<?php
    }
} else 
{
    header("location: ../index.php");
}