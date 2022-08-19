
<?php



if ($_SESSION['login_user'])
{

?>
<form method="POST" action="index.php"
        class="container m-4 w-50 my-5 p-4 m-auto border">
            <h4 class="mb-3"><?=   $btn_val ?> Filier</h4>
                <div class="col-12">
                    <label for="firstName" class="form-label">Le Nom De Filier</label>
                    <input type="text" class="form-control" name="filier" placeholder="nom de filier"
                    value="<?php 
                        if (isset($info_filier)) echo $info_filier[0]->nom;
                        else echo "" ;
                        ?>"
                     required>
                    <div class="invalid-feedback">
                         Filier a ete Ajouter
                    </div>
                </div>
      
                <div class="col-4 my-2">
                    <input type="hidden" name="mody" value="<?php if (isset($_GET['mody'])) echo $_GET['mody']?>">
                    <input  class="btn btn-outline-dark" type="submit" class="form-control" name="add_mody" value="<?=   $btn_val ?> Filier">
                </div>
            
</form>

<?php
  
} else 
{
    header("location: ../index.php");
}

for ($i=0; $i < 10; $i++) { 
    # code...
    print("baali abdessamad");
}