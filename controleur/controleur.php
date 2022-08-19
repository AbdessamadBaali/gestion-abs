<?php

// session_start();

include "Modele/modele.php";
 
class Controleur_app  
{
	public $model;

	function __construct()
	{
		$this->model = new Modele_app();
	}

 
	public function execute_app()
	{

        // login 
        if(isset($_POST["btnLog"]))
        {
             
            $login_user = $_POST["email"];
            $pass_user = $_POST["pass"];

            $user = $this->model->login($login_user, $pass_user);
            if($user !== 0)
            {
                if ($user->validation === 1 ) 
                {

                    $_SESSION['login_user'] = $login_user;
                    $_SESSION['pass_user'] = $pass_user;
                    $_SESSION['type_user'] = $user->type_user;
    
    
                    if (isset($_POST['remember'])) {
                
                        setcookie('login',$_SESSION['login_user'],time()+60*60*24*30*365,$path = "",$domain = "",$secure = false,$httponly = false);
                    
                        setcookie('pass',$_SESSION['pass_user'],time()+60*60*24*30*365,$path = "",$domain = "",$secure = false,$httponly = false);
                    }
                    $_SESSION['msg'] = "merci de contacter l'administration pour valider votre compte!";
                  
                        include "vue/header.php";
                        include "vue/home.php";
                        // include "vue/footer.php";
                    
                } else 
                {
                    $_SESSION['msg'] = "merci de contacter l'administration pour valider votre compte!";
                    include "vue/header.php";
                    include "vue/login.php";
                    include "vue/footer.php";
                }


            }  
            if ($user === 0){

                $_SESSION['msg'] = "email ou mot de passe incorrect!!";

                include "vue/header.php";
                include "vue/login.php";
                include "vue/footer.php";
 
            }
        }

            elseif(isset($_POST["home"]))
            {

                include "vue/header.php";
                include "vue/home.php";

           
            }
            elseif (isset($_POST["btnAfficher"]) )
            {
                include "vue/header.php";
                include "vue/home.php";

                if (isset($_POST["option"]))
                {
    
                    if($_POST["option"] == "Utilisateurs")
                    {
                        $list_utilisateur = $this->model->list_table("users");
             
                        include "vue/list_utilisateur.php";
                
                    
                    } 
                    elseif ($_POST["option"] == "formateur")
                    {
                        $list_formateur = $this->model->list_table("formateur");
                        include "vue/list_formateur.php";
                    }
        
                    elseif($_POST["option"] == "module")
                    {
                        $list_module = $this->model->list_table("module");
                        include "vue/list_module.php";
            
                    }
                    elseif($_POST["option"] == "filier")
                    {
                        $list_filier = $this->model->list_table("filier");
                        include "vue/list_filier.php";
            
                    }
        
                    elseif($_POST["option"] == "stagiaire")
                    {
                        $list_stagiaire = $this->model->list_table("stagiaire");
                        include "vue/list_stagiaire.php";
                    }
        
                    elseif($_POST["option"] == "groupe")
                    {
                        $list_groupe = $this->model->list_groupe("admin");
                        include "vue/list_groupe.php";
                    } 
                   
                }
                include "vue/footer.php";

                                
            }
            elseif (isset($_POST['btnSearch']) ) // test of search 
            {
    
                include "vue/header.php";
                include "vue/home.php";
    
                $nom = $_POST["search"];
        
                if ($_POST['btnSearch'] == "chercher module")
                {
                        $list_module = $this->model->search("module", $nom);
        
                        include "vue/list_module.php";
                        
                }
        
                if ($_POST['btnSearch'] == "chercher formateur")
                {
                        $list_formateur = $this->model->search("formateur", $nom);
        
                        include "vue/list_formateur.php";
                }
        
                if ($_POST['btnSearch'] == "chercher stagiaire")
                {
                        $list_stagiaire = $this->model->search("stagiaire", $nom);
        
                        include "vue/list_stagiaire.php";
                }
        
                if ($_POST['btnSearch'] == "chercher groupe")
                {
                        $list_groupe = $this->model->search("groupe", $nom);
                        include "vue/list_groupe.php";
                }
        
                if ($_POST['btnSearch'] == "chercher")
                {
                        $list_utilisateur = $this->model->search("users", $nom);
        
                        include "vue/list_utilisateur.php";
                }
                
                

            }
            elseif (isset($_POST['typeAbs_afficher']) )
            {
                include "vue/header.php";


                $typeSearch =  "Par Cne";
                $_SESSION['typeAbs'] == "cne";

                if (isset($_POST['optionAbs']))
                {
                $_SESSION['typeAbs'] = $_POST['optionAbs'];

                    if ($_SESSION['typeAbs'] == "semain")
                        $typeSearch =  "Par Semain";

                    elseif ($_SESSION['typeAbs'] == "dates")
                        $typeSearch =  "Par Deux Dates";

                    
                }
                include "vue/listAbs.php";

    
            
            }
            elseif (isset($_POST['searchAbs']))
            {
                include "vue/header.php";
                if ($_POST['searchAbs'] == "Par Cne")
                {
                    $typeSearch =  "Par Cne";
                    $list_abs = $this->model->seach_week_cne($_SESSION['login_user'], $_POST['searchAbsVal']);
                    include "vue/listAbs.php";
                }

                elseif ($_POST['searchAbs'] == "Par Semain")
                {
                    $week_num = date("W",strtotime($_POST['searchAbsVal'] ));
                    $typeSearch =  "Semain";
                    $list_abs = $this->model->seach_week_cne($_SESSION['login_user'], (int) $week_num);
                    include "vue/listAbs.php";
                }

                elseif ($_POST['searchAbs'] == "Par Deux Dates")
                {
                    $typeSearch =  "Par Deux Dates";
                    $date1 =$_POST['searchAbsVal'];
                    $date2 =$_POST['searchAbsVal1'];
                    if($date2 < $date1){
                        $date1 =$_POST['searchAbsVal1'];
                        $date2 =$_POST['searchAbsVal'];
                    }
                    $list_abs = $this->model->seach_abs_date($_SESSION['login_user'], $date1, $date2);
                    include "vue/listAbs.php";
                }
                
            }
        
            elseif (isset($_GET['action']) and $_GET['action'] == "modifier") // action modifier
            {
                include "vue/header.php";

                $btn_val = "Modifier";

                // the attribute used to modify
                $mody = $_GET['mody'];

                if ($_GET['type'] == "formateur")
                {
                    $info_formateur = $this->model->search_info("formateur",$mody);
                    include "vue/formateur.php";

                }

                if ($_GET['type'] == "stagiaire")
                {
                    $list_groupe = $this->model->list_groupe();
                    $info_stagiaire = $this->model->search_info("stagiaire", $mody);
                    $id = $info_stagiaire[0]->id_groupe;
                    include "vue/stagiaire.php";
                }

                if ($_GET['type'] == "module")
                {
                    $info_module = $this->model->search_info("module", $mody);
                    include "vue/module.php";
                }

                if ($_GET['type'] == "filier")
                {
                    $info_filier = $this->model->search_info("filier", $mody);
                    include "vue/filier.php";
                }
    
                if ($_GET['type'] == "groupe")
                {
                    $id = $_GET['id'];
                    $info_groupe = $this->model->search_info("groupe", $mody);
                    $filiers = $this->model->filiers();
                    include "vue/groupe.php";
                }

            }


            elseif (isset($_GET['action']) and ($_GET['action'] == "activer" or $_GET['action'] == "desactiver" or $_GET['action'] == "supp"))
            {

                include "vue/header.php";
                include "vue/home.php";

                // the attribute used to delete
                $delete = $_GET['login'];
    
                if ( $_GET['action'] == "activer")
                {
                    $activer = $this->model->user_AD($delete,1);
                    $list_utilisateur = $this->model->search("users", "");
    
                    if ($activer == 1) include "vue/list_utilisateur.php";
                    
                } 
                if ( $_GET['action'] == "desactiver")
                {
    
                    $desactiver = $this->model->user_AD($delete,0);
                    $list_utilisateur = $this->model->search("users", "");
    
                    if ($desactiver == 1) include "vue/list_utilisateur.php";
    
                }
    
                if ( $_GET['action'] == "supp") // action supprimer
                {
                    if ($_GET['type'] == "utilisateur")
                    {
                        $delete = $this->model->delete_user($delete, 'users');
                        $list_utilisateur = $this->model->search("users", "");
                        if ($delete == 1) include "vue/list_utilisateur.php";
                    }
    
    
                    if ($_GET['type'] == "formateur")
                    {
                        $delete = $this->model->delete_user($delete, 'formateur');
                        $list_formateur = $this->model->search("formateur", "");
                        if ($delete == 1) include "vue/list_formateur.php";
                    }
    
                    if ($_GET['type'] == "stagiaire")
                    {
                        $delete = $this->model->delete_user($delete, 'stagiaire');
                        $list_stagiaire = $this->model->search("stagiaire", "");
                        if ($delete == 1) include "vue/list_stagiaire.php";
                    }
    
                    if ($_GET['type'] == "module")
                    {
                        $delete = $this->model->delete_user($delete, 'module');
                        $list_module = $this->model->search("module", "");
                        if ($delete == 1) include "vue/list_module.php";
                    }

                    if ($_GET['type'] == "filier")
                    {
                        $delete = $this->model->delete_user($delete, 'filier');
                        $list_filier = $this->model->search("filier", "");
                        if ($delete == 1) include "vue/list_filier.php";
                    }
                    if ($_GET['type'] == "groupe")
                    {
                        $delete = $this->model->delete_user($delete, 'groupe');
                        $list_groupe = $this->model->list_groupe("admin");
                        if ($delete == 1) include "vue/list_groupe.php";
                    }

                    // delete cne from absence

                    if ($_GET['type'] == "abs")
                    {
                        $delete = $this->model->delete_cne($_GET['cne']);
                        $list_abs = $this->model->list_abs($_SESSION['login_user']);
                        if ($delete == 1) include "vue/list_abs.php";
                    }

                } 
               
            } 
            // creer compte utilisateur groupe module formateur
            elseif (isset($_POST['creer'])) {

                include "vue/header.php";
                $btn_val = "Ajouter";
    
                if ($_POST['creer'] == "Ajouter Formateur")
                {
                    include "vue/formateur.php";
                }
    
                if ($_POST['creer'] == "Ajouter Utilisateur")
                {
                    include "vue/utilisateur.php";
                }
        
                if ($_POST['creer'] == "Ajouter Stagiaire")
                {
                    $list_groupe = $this->model->list_groupe();
                    include "vue/stagiaire.php";
                }
                if ($_POST['creer'] == "Ajouter Module")
                {
                    include "vue/module.php";
                }
                if ($_POST['creer'] == "Ajouter Filier")
                {
                    include "vue/filier.php";
                }
    
                if ($_POST['creer'] == "Ajouter Groupe")
                {
                    $filiers = $this->model->filiers();
                    if ($filiers != 0) include "vue/groupe.php";
                }
                include "vue/footer.php";

            } 
            
            elseif (isset($_POST['btnAbs']))
            {
                include "vue/header.php";
                include "vue/listAbs.php";
               
            }

            elseif (isset($_POST["add_mody"]))
            {
                include "vue/header.php";
                
                if ($_POST['add_mody'] == 'Ajouter Utilisateur')
                {
                    $btn_val = "Ajouter";
                    $login = $_POST['login'];
                    $pass = $_POST['pass'];
                    $type_user = $_POST['type_user'];

                    $login_valid = filter_var($login, FILTER_VALIDATE_EMAIL);
                    $pass_valid = filter_var($pass, FILTER_SANITIZE_STRING);


                    if ($login_valid == true and $pass_valid == true)
                    {
                        $result = $this->model->creer_admin($login, $pass,$type_user);
                        include "vue/utilisateur.php";
                    }

                    
                }
    
                elseif ($_POST['add_mody'] == 'Ajouter Formateur')
                {
                    $btn_val = "Ajouter";

                    $prenom = $_POST["prenom"];
                    $nom  = $_POST["nom"];
                    $email = $_POST["email"];
                    $adress  = $_POST["adress"];
                    $tel = $_POST["tel"];
                    $ville = $_POST['ville'];
    
                    $result = $this->model->creer_formateur($nom ,$prenom, $ville , $adress, $email , $tel);
                    include "vue/formateur.php";
                    
                }  
        
                elseif ($_POST['add_mody'] == 'Ajouter Module')
                {
                    $btn_val = "Ajouter";

                    $nom  = $_POST["module"];
    
                    $result = $this->model->creer_module_filier('module',$nom);
                    include "vue/module.php";
                    
                }  
            
                elseif ($_POST['add_mody'] == 'Ajouter Filier')
                {
                    $btn_val = "Ajouter";

                    $nom  = $_POST["filier"];

                    $result = $this->model->creer_module_filier('filier',$nom);
    
                    include "vue/module.php";
                    
                } 
                    
                elseif ($_POST['add_mody'] == 'Ajouter Groupe')
                {
                    $btn_val = "Ajouter";

                    $nom  = $_POST["goupe"];
                    $id_filier  = $_POST["filier"];
    
    
                    $result = $this->model->creer_groupe($nom, $id_filier);
                    include "vue/groupe.php";
                    
                } 
                                    
                elseif ($_POST['add_mody'] == 'Ajouter Stagiaire')
                {
                    $btn_val = "Ajouter";

                    $cne = $_POST["cne"];
                    $prenom = $_POST["prenom"];
                    $nom  = $_POST["nom"];
                    $email  = $_POST["email"];
                    $adress  = $_POST["adress"];
                    $ville = $_POST["ville"];
                    $tel = $_POST["tel"];
                    $dateN = $_POST["dateN"];;
                    $groupe = $_POST["groupe"];

                    $ajouter = $this->model->ajouter_stg("stagiaire",$cne, $prenom, $nom, $email, $ville ,$adress, $tel, $dateN, $groupe);
                    $list_groupe = $this->model->list_groupe();
                    
                    include "vue/stagiaire.php";
                    
                } 
                //  modifer formateur module groupe   
                elseif ($_POST['add_mody'] == 'Modifier Formateur')
                {
                    // the attribute used to modify
                    $mody = $_POST["mody"];
                    $btn_val = "Modifier";

                    $prenom = $_POST["prenom"];
                    $nom  = $_POST["nom"];
                    $email  = $_POST["email"];
                    $adress  = $_POST["adress"];
                    $ville = $_POST["ville"];
                    $tel = $_POST["tel"];

    
                    $modify = $this->model->modify_SF("formateur",$mody, $prenom, $nom, $email, $ville ,$adress, $tel, "");
                    if ($modify == 1) 
                    {

                        // $info_formateur = $this->model->search_matricule($mody);
                        $list_formateur = $this->model->list_table("formateur");
                        include "vue/home.php";
                        include "vue/list_formateur.php";
                        ?>
                            <script>
                                alert("formateur à était bien modifier!!")
                            </script>                        
                        <?php

                    }           
                    
                }
                elseif ($_POST['add_mody'] == 'Modifier Stagiaire')
                {
                    // the attribute used to modify
                    $mody = $_POST["mody"];
                    $btn_val = "Modifier";

                    $prenom = $_POST["prenom"];
                    $nom  = $_POST["nom"];
                    $email  = $_POST["email"];
                    $adress  = $_POST["adress"];
                    $ville = $_POST["ville"];
                    $tel = $_POST["tel"];
                    $dateN = $_POST["dateN"];

    
                    $modify = $this->model->modify_SF("stagiaire",$mody, $prenom, $nom, $email, $ville ,$adress, $tel, $dateN);
                    if ($modify == 1) 
                    {

                        // $info_formateur = $this->model->search_matricule($mody);
                        $list_stagiaire = $this->model->list_table("stagiaire");
                        include "vue/home.php";
                        include "vue/list_stagiaire.php";
                        ?>
                            <script>
                                alert("stagiaire à était bien modifier!!")
                            </script>                        
                        <?php

                    }       
                }       
        
                elseif ($_POST['add_mody'] == 'Modifier Module')
                {
                    $nom  = $_POST["module"];
                    $mody = $_POST["mody"];
                    $modify = $this->model->modify_GM("module" ,$mody, $nom, "");
                    if ($modify == 1) 
                    {

                        // $info_formateur = $this->model->search_matricule($mody);
                        $list_module = $this->model->list_table("module");
                        include "vue/home.php";
                        include "vue/list_module.php";
                        ?>
                            <script>
                                alert("module à était bien modifier!!")
                            </script>                        
                        <?php

                    }   
                    
                }  
    
                elseif ($_POST['add_mody'] == 'Modifier Filier')
                {
                    $nom  = $_POST["filier"];
                    $mody = $_POST["mody"];
                    $modify = $this->model->modify_filier($nom, $mody);
                    if ($modify == 1) 
                    {

                        // $info_formateur = $this->model->search_matricule($mody);
                        $list_filier = $this->model->list_table("filier");
                        include "vue/home.php";
                        include "vue/list_filier.php";
                        ?>
                            <script>
                                alert("module à était bien modifier!!")
                            </script>                        
                        <?php

                    }   
                    
                }     
                elseif ($_POST['add_mody'] == 'Modifier Groupe')
                {
                    $mody  = $_POST["mody"];
                    $nom  = $_POST["goupe"];
                    $id_filier  = $_POST["filier"];

                    $modify = $this->model->modify_GM("groupe" ,$mody, $nom, $id_filier);
                    if ($modify == 1) 
                    {

                        // $info_formateur = $this->model->search_matricule($mody);
                        $list_groupe = $this->model->list_groupe("admin");
                        include "vue/home.php";
                        include "vue/list_groupe.php";
                        ?>
                            <script>
                                alert("module à était bien modifier!!")
                            </script>                        
                        <?php

                    }   
                         
                } 

        }  elseif (isset($_POST['gestionAbs']))
        {
            if ($_POST['gestionAbs']  == "Gestion Absance")
            {
                $filiers = $this->model->filiers();
                include "vue/header.php";
                include "vue/gestionAbs.php";
            } else {
                include "vue/header.php";
                // include "vue/listAbs.php";
            }


        } elseif (isset($_POST['suivant'])) {

            if ($_POST['suivant'] == 'Suivant') {

                $_SESSION['id_filier'] = $_POST['filier'];
                $_SESSION['dateS']= $_POST['dateS'];
                $_SESSION['heureD'] = $_POST['heureD'];
                $_SESSION['heureF']= $_POST['heureF'];
                $_SESSION['typeS'] = $_POST['typeS'];

                $filiers = $this->model->filiers();
                $list_groupe = $this->model->list_groupe01($_SESSION['id_filier']);

                include "vue/header.php";
                include "vue/gestionAbs.php";


            } elseif ($_POST['suivant'] == 'Afficher') {


                if (isset($_POST['groupe'])) 
                {

                    $_SESSION['id_groupe'] = $_POST['groupe'];
                    $list_stagiaire = $this->model->list_stagiaire($_SESSION['id_groupe']);
                      

                } else $list_stagiaire = [];

                $list_groupe = $this->model->list_groupe01($_SESSION['id_filier'] );

                include "vue/header.php";
                include "vue/gestionAbs.php";

            } elseif ($_POST['suivant'] == 'Valider') {

                $seance_Valid = $this->model->seance($_SESSION['dateS'],$_SESSION['heureD'],$_SESSION['heureF'], $_SESSION['typeS'],$_SESSION["login_user"],  $_SESSION['id_groupe']);
                if($seance_Valid)
                {
                    if(!empty($_POST['abs'])) {

                        foreach($_POST['abs'] as $cne){

                            $idSeance = $this->model->max_idSeance();
                            $this->model->absence($cne,$idSeance->id_seance);

                        }
                    }

                }

                include "vue/header.php";
                include "vue/gestionAbs.php";

            }
    }
        else {
             session_unset();

            include "vue/header.php";
            include "vue/login.php";
            include "vue/footer.php";

        }

    }
}
