
<?php


if ($_SESSION['login_user'])
{

?>
<div class="container">
<h2 class="text-capitalize  text-muted">la liste des formateurs</h2>
        <form class="row m-auto" action="index.php" method="post">
            <div class="col-6 m-3">
                <input type="text" class="form-control" name="search" value="" placeholder="chercher par nom">
                <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                </div>
            </div>
            <div class="col-4  m-3">
                <label class="btn btn-outline-secondary" for="search_formateur"><i class="bi bi-search"></i></label>
                <input type="submit" class="btn btn-outline-dark invisible" id="search_formateur" name="btnSearch" value="chercher formateur">
            </div>
        </form>
        <table class="table table-bordered  table-striped container" >
            <?php
                if ($list_formateur != 0)
                {
            ?>
                <tr>
                    <th scope="col">Login</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Adress</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tel</th>
                    <th class="text-center" colspan="2" scope="col">Action</th>
                </tr>
            <?php

                    foreach ($list_formateur as $key => $value) 
                    {
                        ?>
                            <tr>
                                <td><?=$value->login ?></td>
                                <td><?= $value->nom  ?></td>
                                <td><?= $value->prenom   ?></td>
                                <td><?= $value->ville ?></td>
                                <td><?= $value->adress ?></td>
                                <td><?= $value->login ?></td>
                                <td><?= $value->tel ?></td>
                                <td>  
                                    <a class="btn btn-outline-danger"  onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement?')" href="index.php?action=supp&type=formateur&login=<?=$value->login?>">
                                    <i class="bi bi-trash"></i>
                                </a>
                                </td>
                                <td>
                                    <a class="btn btn-outline-primary"  href="index.php?action=modifier&type=formateur&mody=<?=$value->login?>">
                                    <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                    }
                } else 
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