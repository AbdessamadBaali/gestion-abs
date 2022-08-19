
<?php



if ($_SESSION['login_user'])
{
 
    ?>

    <!-- test pour afficher absance -->
    <section class='d-flex flex-column align-items-center ' >
        <h1 class='text-capitalize m-2'>Quel type voulez-vous utiliser pour la recherche ?</h1>
            
        <form id="listAbs"action="index.php" method="post" class="d-flex">

                <div class="form-check m-2">
                    <input class="form-check-input" type="radio" id="Cne" name="optionAbs"  value="cne"> 
                    <label class="form-check-label" for="Cne" >
                        Cne De Stagiaire
                    </label>
                </div>

                <div class="form-check m-2">
                    <input class="form-check-input" type="radio" id="Semain" name="optionAbs"  value="semain">
                    <label class="form-check-label" for="Semain">
                        Semain
                    </label>
                </div>

                <div class="form-check m-2">
                    <input class="form-check-input" type="radio" id="Dates" name="optionAbs" value="dates">
                    <label class="form-check-label"  for="Dates">
                        Entre Deux Dates
                    </label>
                </div>
                <div class="form-check m-2">
                    <input type="submit" class="btn btn-outline-dark" name="typeAbs_afficher" value="Afficher">
                </div>
            </form>  
    </section>
     
            <?php
    if (isset($_POST['typeAbs_afficher']) OR isset($_POST['searchAbs']))
    {
    ?>
    <h3 class="ms-4">Chercher <?= $typeSearch ?></h3>
        <form id="mrg" class="row justify-content-center " action="index.php" method="post">
            <?php
            // if (isset($_POST['optionAbs']) )
            // {
                if ($_SESSION['typeAbs'] == "cne" )
                {
            ?>

                <div class="col-4 my-3">
                    <input type="text" class="form-control" name="searchAbsVal" value="" placeholder="Chercher <?= $typeSearch ?>">
                </div>

            <?php
                }
                if ($_SESSION['typeAbs'] == "semain")
                {
            ?>     
                <div class="col-4 my-3">
                    <input type="week" class="form-control" name="searchAbsVal" value="">
                </div>

            <?php
                }
                if ($_SESSION['typeAbs'] == "dates")
                {
            ?>         
                <div class="col-4 my-3">
                    <input type="date" class="form-control" name="searchAbsVal" value="" >
                </div>
                <div class="col-4 my-3"> 
                    <input type="date" class="form-control" name="searchAbsVal1" value="">
                </div>
            <?php
                // }
            }
            ?>
               

            <div class="col-1  my-3">
                <label class="btn btn-outline-secondary" for="search_abs"><i class="bi bi-search"></i></label>
                <input type="submit" class="btn btn-outline-dark invisible" id="search_abs" name="searchAbs" value="<?= $typeSearch?>">
            </div>
        </form>




    <?php
     } 
     if (isset($list_abs))
     {
    ?>

        <section class="m-5" >
            <h2 class="text-capitalize text-start text-muted">la liste des Absences  <?= $typeSearch ?></h2>

            <table class="table table-bordered  table-striped container" >

                <tr>
                    <th scope="col">Cne</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Etat De Seance</th>
                    <th scope="col">Formateur</th>
                    <th scope="col">Date</th>
                    <th scope="col">heure Debut</th>
                    <th scope="col">heure Fin</th>
                    <th scope="col">Groupe</th>
                    <th scope="col">Etat</th>
                    <th class="text-center" colspan="2" scope="col">Action</th>
                </tr>
                <?php
                    if (isset($list_abs) and $list_abs !== 0)
                    {

                        foreach ($list_abs as $key => $value) 
                        {
                            ?>
                                <tr>
                                    <td><?=$value->cne ?></td>
                                    <td><?= $value->nom  ?></td>
                                    <td><?= $value->prenom   ?></td>
                                    <td><?= $value->type ?></td>
                                    <td><?= $value->nomF ?></td>
                                    <td><?= $value->date ?></td>
                                    <td><?= $value->heureD ?></td>
                                    <td><?= $value->heureF ?></td>
                                    <td><?= $value->nomG ?></td>
                                    <td><?= $value->etat ?></td>

                                    <td>  
                                        <a class="btn btn-outline-danger"  onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement?')" href="index.php?action=supp&type=abs&cne=<?=$value->cne?>">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-primary"  href="index.php?action=modifier&type=formateur&mody=<?=$value->matricule?>">
                                        <i class="bi bi-pencil-square"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                        
                        }
                
                    }
                    else 
                    {
                        echo "<tr class='text-center' >
                                <td colspan='11'> pas de resulta</td> 
                            </tr>";
                    }
            
                ?>
                </table> 
        </section>

    <?php
    }
}
else 
{
    header("location: ../index.php");
}