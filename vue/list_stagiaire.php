
<?php



if ($_SESSION['login_user'])
{

?>
<div class="container">
        <h2 class="text-capitalize  text-muted">la liste des Stagiaire</h2>
        
        <form class="row m-auto" action="index.php" method="post">
            <div class="col-6 m-3">
                <input type="text" class="form-control" name="search" value="" placeholder="chercher par nom">
                <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                </div>
            </div>
            <div class="col-4  m-3">
                <label class="btn btn-outline-secondary" for="search_nom"><i class="bi bi-search"></i></label>
                <input type="submit" class="btn btn-outline-dark invisible" id="search_nom" name="btnSearch" value="chercher stagiaire">
            </div>
        </form>

        <table class="table table-bordered table-striped container text-center " >
        <?php
            if ($list_stagiaire != 0)
            {
        ?>
                <tr> 
                    <th scope="col">CNE</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Adress</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tel</th>
                    <th scope="col">Date Naissance</th>
                    <th colspan="2" scope="col"> Action</th>
                </tr>
            <?php

                foreach ($list_stagiaire as $key => $value) 
                {
            ?>
                <tr>
                    <td><?=$value->cne ?></td>
                    <td><?= $value->nom  ?></td>
                    <td><?= $value->prenom  ?></td>
                    <td><?= $value->ville ?></td>
                    <td><?= $value->adress ?></td> 
                    <td><?= $value->login ?></td>
                    <td><?= $value->tel ?></td>
                    <td><?= $value->dateN?></td>
                    <td> 
                        <a class="btn btn-outline-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement?')" href="index.php?action=supp&type=stagiaire&login=<?=$value->cne?>">
                        <i class="bi bi-trash"></i>
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-outline-primary" href="index.php?action=modifier&type=stagiaire&mody=<?=$value->cne?>">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                </tr>
            <?php
                }
                
            }else 
            {
                ?>
                    <tr>
                        <td>pas du resulta</td>
                    </tr>
                <?php
            }
    
            ?>

    </table> 
</div>
<?php
    }
else 
{
    header("location: ../index.php");
}