<?php
 if (isset($_SESSION['type_user']) and $_SESSION['type_user'] == 'admin'){
?>

<header >
    <nav>
    <form action="index.php" method="post">
        <ul>
            <li>
                <input type="submit" name="home" value="Home" />
            </li>
            
            <li>
                <input type="checkbox"  id="dropdown">
                <label for="dropdown">Compte/Module/Groupe</label>
                <ul>
                    <li>
                        <input type="submit" name="creer" value="Ajouter Utilisateur" />
                    </li>
                    <li>
                        <input type="submit" name="creer" value="Ajouter Stagiaire" />
                    </li> 
                    <li>
                        <input type="submit" name="creer" value="Ajouter Formateur" />
                    </li>
                    <li>
                        <input type="submit" name="creer" value="Ajouter Module" />
                    </li>
                    <li>
                        <input type="submit" name="creer" value="Ajouter Filier" />
                    </li>
                    <li>
                        <input type="submit" name="creer" value="Ajouter Groupe" />
                    </li>
                </ul>
            </li>
            <li>
                <input type="submit" name="btnAbs" value="Validation Absance" />
            </li>  
 
        </ul>
        </form>
    </nav>
    <div>
        <span >
             <?php
                echo strtolower($_SESSION['login_user']);
             ?>
    </span>
        <a href="Modele/logout.php" >Logout</a>
    </div>

</header>

<?php

}  elseif (isset($_SESSION['type_user']) and $_SESSION['type_user'] == 'formateur'){
?>

<header >
    <nav>
    <form action="index.php" method="post">
        <ul>
            <li>
                <input type="submit" name="home" value="Home" />
            </li>
            <li>
                <input type="submit" name="gestionAbs" value="Gestion Absance" />
            </li>       
            <li>
                <input type="submit" name="btnAbs" value="Liste Absance" />
            </li>  
 
        </ul>
        </form>
    </nav>
    <div>
        <span >
             <?php
                echo strtolower($_SESSION['login_user']);
             ?>
    </span>
        <a href="Modele/logout.php" >Logout</a>
    </div>

</header>

<?php

} else {

?>

<header >
    <div class="logo">
        <a href="#">Gestion D'Absance</a>
    </div>

    <div>
          <a href="index.php">Login</a>
    </div>
</header>

<?php
    }
