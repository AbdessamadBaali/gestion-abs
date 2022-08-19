<?php

if ($_SESSION['login_user'])
{

 if (isset($_POST['suivant']) ){

    if($_POST['suivant']== 'Suivant' or $_POST['suivant']== 'Afficher')
    {
?>

<div> 

    <form action="index.php" method="post" class="w-75 my-5 p-4 m-auto border">  
        <div class="my-3">
            <label class="form-label">Groupe :</label>

            <select class="form-select" name="groupe" required>
                <option selected disabled>Selectionnez Groupe</option>
                <?php
                    foreach ($list_groupe as $key => $value) {
                        // if ($id == $value->nom) echo "<option selected value='$value->id_filier'>$value->nom</option>";
                        echo "<option value='$value->id_groupe'>$value->nom</option>";
                    }   
                    
                ?>
            </select>
        </div>

    
        <div class="col-3 my-3">
            <input type="hidden" name="mody" value="<?php if (isset($_GET['mody'])) echo $_GET['mody']?>">
            <input class="btn btn-success" type="submit" class="form-control"  name="suivant" value="Afficher">
        </div>
    </form>
    


    <?php
        if (isset($_POST['suivant']) and $_POST['suivant'] == 'Afficher') 
        {
    ?>
    <form action="index.php" method="post" class="w-75 my-5 p-4 m-auto border">  
        <h2>Liste des stagiaires </h2>

        <table class="table table-bordered  container text-center " >
            <?php
                if ($list_stagiaire != 0)
                {
            ?>
                    <tr> 
                        <th scope="col">CNE</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th colspan="2" scope="col"> Absent</th>
                    </tr>
                <?php

                    foreach ($list_stagiaire as $key => $value) 
                    {
                ?>
                    <tr>
                        <td><?=$value->cne ?></td>
                        <td><?= $value->nom  ?></td>
                        <td><?= $value->prenom  ?></td>
                        <td class="text-center">
                            <input type="checkbox" name="abs[]"  value="<?=$value->cne ?>">                               
                        </td>
                    </tr>
                <?php
                    }
                    
                }else 
                {
                    ?>
                    <tr> 
                        <th scope="col">CNE</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col"> Absent</th>
                    </tr>
                    <?php
                }
        
                ?>

        </table> 
        <div class="col-3 my-3">
            <input class="btn btn-success" type="submit" class="form-control"  name="suivant" value="Valider">
        </div>
    </form>

    <?php }  ?>
</div>


<?php
    }
} else {

?>



<section>
    <form method="POST" action="index.php" class="w-75 my-5 p-4 m-auto border">

    <h4 class="mb-3 text-muted">Gestion d'Absence des Stagiaires</h4>
    <div class="my-3">
        <label class="form-label">Filier :</label>
        <select class="form-select" name="filier" required>
            <option selected disabled>Selectionnez La Filier</option>
                <?php
                    foreach ($filiers as $key => $value) {
                        if ($id == $value->nom) echo "<option selected value='$value->id_filier'>$value->nom</option>";
                        else echo "<option value='$value->id_filier'>$value->nom</option>";
                    }   
                    
                ?>
        </select>
    </div>

    <div class="my-3">
        <label for="address" class="form-label">Date De Seance</label>
        <input type="date" class="form-control" name="dateS"  
        value="<?= date("Y-m-d")?>" required>
        <div class="invalid-feedback">
            Please enter your date de naissance.
        </div>
    </div>

    <div class="my-3">
        <label class="form-label">Heure de debut :</label>
        <select class="form-select" name="heureD" required>
                <option selected disabled>-- Selectionnez Heure Depart --</option>
                <option value="08:30:00">08h:30</option>
                <option value="10:30:00">10h:30</option>
                <option value="11:00:00">11h:00</option>
                <option value="12:30:00">12h:30</option>
                <option value="13:30:00">13h:30</option>
                <option value="14:30:00">14h:30</option>
                <option value="16:00:00">16h:00</option>
                <option value="16:30:00">16h:30</option>
            </select>
    </div>

    <div class="my-3">
        <label class="form-label">Heure de debut :</label>
        <select class="form-select" name="heureF" required>
            <option selected disabled>-- Selectionnez Heure De Fin --</option>
            <option value="10:30:00">10h:30</option>
            <option value="11:00:00">11h:00</option>
            <option value="12:30:00">12h:30</option>
            <option value="13:30:00">13h:30</option>
            <option value="16:00:00">16h:00</option>
            <option value="16:30:00">16h:30</option>
            <option value="18:30:00">18h:30</option>
        </select>
    </div>  

    <div class="my-3">
        <label class="form-label">Type De Seanse :</label>
        <select class="form-select" name="typeS" required>
            <option selected disabled>-- Selectionnez Type Sience --</option>
            <option value="Presence">Presence</option>
        <option value="A distance">A distance</option>
        </select> 
    </div>  



    <div class="col-3 my-3">
        <input class="btn btn-success" type="submit" class="form-control"  name="suivant" value="Suivant">
    </div>

    </form>
</section>


<?php
    }

  
} else 
{
    header("location: ../index.php");
}