
<?php



if ($_SESSION['login_user'])
{

?>
<div class="container">
    <h2 class="text-capitalize  text-muted">la liste des utilisateurs</h2>
    <section class="row d-flex justify-content-around my-3">
        <form class="row col-6" action="index.php" method="post">
            <div class="col-8 my-3">
                <input type="text" class="form-control" name="search" value="" placeholder="chercher par login">
                <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                </div>
            </div>
            <div class="col-4  my-3">
                <label class="btn btn-outline-secondary" for="search_mail"><i class="bi bi-search"></i></label>
                <input type="submit" id="search_mail" class="btn btn-outline-dark invisible" name="btnSearch" value="chercher">
            </div>
        </form>
        
        <form class="row col-6" action="index.php" method="post">
            <div class="col-8 my-3">
                <input type="text" class="form-control" name="search" value="" placeholder="chercher par type">
                <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                </div>
            </div>
            <div class="col-4  my-3">
                <label class="btn btn-outline-secondary" for="search_type"><i class="bi bi-search"></i></label>
                <input type="submit" id="search_type" class="btn btn-outline-dark invisible" name="btnSearch" value="chercher" >
            </div>
        </form>
    </section>

        <table class="table table-bordered  table-striped container " >
            <?php
                if ($list_utilisateur != 0)
                {
            ?>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Login</th>
                        <th scope="col">Mot de pass</th>
                        <th scope="col">Type User</th>
                        <!-- <th scope="col">Validation</th> -->
                        <th class="text-center" scope="col"> Activer / Desactiver</th>
                        <th class="text-center" scope="col"> Action</th>
                    </tr>
            <?php

                foreach ($list_utilisateur as $key => $value) 
                {
                    ?>
                        <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                            <td><?=$value->login ?></td>
                            <td><?= $value->pass  ?></td>
                            <td><?= $value->type_user  ?></td>

                            <td class="text-center">
                                <?php
                                    if ($value->validation == 0){
                                ?>
                                    <a  href="index.php?action=activer&login=<?=$value->login ?>">
                                        <i class="bi bi-x-circle-fill text-danger">Inactif</i>
                                    </a>
                                <?php } else {?>
                                    <a href="index.php?action=desactiver&login=<?=$value->login ?>">
                                        <i class="bi bi-check-circle-fill text-success">Active</i>    
                                    </a>
                                <?php } ?>
                            </td>
                            
                            <td class="text-center"> 
                                <a class="btn btn-outline-danger  m-0 " 
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement?')" href="index.php?action=supp&type=utilisateur&login=<?=$value->login ?>">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                            <!-- <td>
                                <a class="btn btn-outline-primary m-0"  href="index.php?action=modifier&type=utilisateur&login=<?=$value->login ?>">
                                <i class="bi bi-pencil-square"></i>
                                </a>
                            </td> -->
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