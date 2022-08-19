
<?php



if ($_SESSION['login_user'])
{

?>
<div class="container">
        <h2 class="text-capitalize text-muted">la liste des Modules</h2>
        
        <form class="row m-auto" action="index.php" method="post">
            <div class="col-6 m-3">
                <input type="text" class="form-control" name="search" value="" placeholder="chercher par nom">
                <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                </div>
            </div>
            <div class="col-4  m-3">
                <label class="btn btn-outline-secondary" for="search_nom"><i class="bi bi-search"></i></label>
                <input type="submit" class="btn btn-outline-dark invisible" id="search_nom" name="btnSearch" value="chercher module">
            </div>
        </form>

        <table class="table  table-bordered container table-striped " >

        <?php
        if ($list_module != 0)
        {
            ?> 
                <tr>
                    <th scope="col">id module</th>
                    <th scope="col">Nom</th>
                    <th class="text-center" colspan="2" scope="col">Action</th>
                </tr>
            <?php

            foreach ($list_module as $key => $value) 
            {
                ?>
                    <tr > 
                        <td><?=$value->id_module ?></td>
                        <td><?= $value->nom  ?></td>
                        <td class="text-center"> 
                            <a class="btn btn-outline-danger m-0" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement?')" href="index.php?action=supp&type=module&login=<?=$value->id_module?>">
                            <i class="bi bi-trash"></i>
                        </a>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-outline-primary m-0" href="index.php?action=modifier&type=module&mody=<?=$value->id_module?>">
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