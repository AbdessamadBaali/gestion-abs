<?php

session_start();

    class Modele_app
    {  

        function __construct()
        {
        }
        
        function session_check($login)
        {
            if (isset($login)) return 1;
            else return 0;
        }
 
        function login($login, $pass)
        { 
            try {
                include "connexiondb.php";
    
                $rep = "select * from users where login = '$login' and pass = '$pass'";
    
                $stat = $conn->prepare($rep);
                $stat->execute();
        
                $result = $stat->fetchAll(PDO::FETCH_OBJ);
        
                if (count($result) > 0 ) return $result[0];
                else return 0;
    
            } catch (\Throwable $th) {
                
                print_r($th->getMessage());
    
            }
    
    
        }
 

        function list_table($table)
        {
            include "connexiondb.php";

            try {

                if ($table == "users") $rep = "select * from users";

                else $rep = "select * from $table";

                $stat = $conn->prepare($rep);

                $stat->execute();

                $result = $stat->fetchAll(PDO::FETCH_OBJ);
    
                if(count($result) > 0 ) return $result;
                else return 0;

            } catch (PDOException $th) {

                print_r($th->getMessage());
            }

        }



        function list_groupe()
        {
            include "connexiondb.php";

            try {

                $rep = "select g.id_groupe, g.nom, f.nom as id_filier from groupe g, filier f where g.id_filier = f.id_filier";

                $stat = $conn->prepare($rep);

                $stat->execute();

                $result = $stat->fetchAll(PDO::FETCH_OBJ);
    
                if(count($result) > 0 ) return $result;
                else return 0;

            } catch (PDOException $th) {

                print_r($th->getMessage());
            }

        }

        function list_groupe01($idFilier)
        {
            include "connexiondb.php";

            try {

                $rep = "select g.id_groupe, g.nom, f.nom as id_filier from groupe g, filier f where g.id_filier = f.id_filier and g.id_filier = $idFilier";
           
                $stat = $conn->prepare($rep);

                $stat->execute();

                $result = $stat->fetchAll(PDO::FETCH_OBJ);
    
                if(count($result) > 0 ) return $result;
                else return 0;

            } catch (PDOException $th) {

                print_r($th->getMessage());
            }

        }


        function list_stagiaire($idGroupe)
        {
            include "connexiondb.php";

            try {

                $rep = "select s.* from groupe g, stagiaire s where g.id_groupe = s.id_groupe and g.id_groupe = $idGroupe";
           
                $stat = $conn->prepare($rep);

                $stat->execute();

                $result = $stat->fetchAll(PDO::FETCH_OBJ);
    
                if(count($result) > 0 ) return $result;
                else return 0;

            } catch (PDOException $th) {

                print_r($th->getMessage());
            }

        }


        function creer_module_filier($table,$nom)
        {
            include "connexiondb.php";

            try {
                
                $rep = "insert into $table(nom)  values('$nom')";

                $stat = $conn->prepare($rep);

                $stat->execute();
    
                if($stat) return 1;
                else return 0;

            } catch (PDOException $th) {

                print_r($th->getMessage());
            }

        }

        function creer_groupe($nom, $id_filier)
        {
            include "connexiondb.php";

            try {
                
                $rep = "insert into groupe(nom, id_filier)  values('$nom', $id_filier)";

                $stat = $conn->prepare($rep);

                $stat->execute();
    
                if($stat) return 1;
                else return 0;

            } catch (PDOException $th) {

                print_r($th->getMessage());
            }

        }

        function creer_admin($login, $pass,$type_user)
        {
            include "connexiondb.php";

            try {
                
                $rep = "INSERT INTO users VALUES('$login', '$pass', '$type_user', 0)";

                $stat = $conn->prepare($rep);

                $stat->execute();
    
                if($stat) return 1;
                else return 0;

            } catch (PDOException $th) {

                print_r($th->getMessage());
            }

        }


        function creer_formateur($nom, $prenom, $ville, $adress, $login,$tel)
        {
            include "connexiondb.php";

            try {
                
                $rep = "insert INTO formateur(nom,prenom,ville,adress,login,tel) VALUES('$nom', '$prenom', '$ville', '$adress', '$login', '$tel')";

                $stat = $conn->prepare($rep);

                $stat->execute();
    
                if($stat) return 1;
                else return 0;

            } catch (PDOException $th) {

                print_r($th->getMessage());
            }

        }
        function ajouter_stg($table,$cne, $prenom, $nom, $email, $ville ,$adress, $tel, $dateN, $groupe)
        {
            include "connexiondb.php";

            try {
                
                $rep = "insert INTO stagiaire(cne,nom,prenom,ville,adress,login,tel,dateN,id_groupe) VALUES('$cne','$nom', '$prenom', '$ville', '$adress', '$login', '$tel','$dateN', '$groupe')";

                $stat = $conn->prepare($rep);

                $stat->execute();
    
                if($stat) return 1;
                else return 0;

            } catch (PDOException $th) {

                print_r($th->getMessage());
            }
     
        }

        function filiers()
        {
            include "connexiondb.php";

            try {
                
                $rep = "select * from filier";

                $stat = $conn->prepare($rep);

                $stat->execute();
    

                $result = $stat->fetchAll(PDO::FETCH_OBJ);
    
                if(count($result) > 0 ) return $result;
                else return 0;

            } catch (PDOException $th) {

                print_r($th->getMessage());
            }
  
        }


        function search($table, $val)
        {
            include "connexiondb.php";

            try {

                if ($table == "users")
                {
                    if (str_ends_with($val, '@gmail.com'))
                        $rep = "select * from $table where login like '%$val%'";
                    elseif  ($val ==  'admin' or $val == "formateur")
                        $rep = "select * from $table where type_user = '$val'";
                    else 
                        $rep = "select * from users";

                }                                 
                elseif ($table == "groupe")$rep = "select g.id_groupe, g.nom, f.nom as id_filier from filier f, $table g where g.id_filier = f.id_filier and g.nom like '%$val%' ";
                else $rep = "select * from $table where nom like '%$val%' ";

                $stat = $conn->prepare($rep);

                $stat->execute();
    

                $result = $stat->fetchAll(PDO::FETCH_OBJ);
    
                if(count($result) > 0 ) return $result;
                else return 0;

            } catch (PDOException $th) {

                print_r($th->getMessage());
            }
  
        }
 
        // enable or disable user
        function user_AD($login,$ad)
        {
            include "connexiondb.php";

            try {

                $rep = "update users set validation = $ad where login = '$login'";

                $stat = $conn->prepare($rep);

                $stat->execute();
        
                if($stat) return 1;
                else return 0;

            } catch (PDOException $th) {

                print_r($th->getMessage());
            }
        }

    // delete user
    function delete_user($login, $table)
    {
        include "connexiondb.php";

        try {

            if ($table == "module") $rep = "DELETE FROM $table WHERE id_module = $login";
            elseif  ($table == "groupe") $rep = "DELETE FROM $table WHERE id_groupe = $login";
            elseif ($table == "filier") $rep = "delete from $table where id_filier = '$login'";
            else $rep = "delete from $table where login = '$login'";

            $stat = $conn->prepare($rep);

            $stat->execute();
    
            if($stat) return 1;
            else return 0;

        } catch (PDOException $th) {

            print_r($th->getMessage());
        }
    }

  // modify
  function modify_SF($table, $mody, $prenom, $nom, $email, $ville ,$adress, $tel, $daten)
  {
      include "connexiondb.php";

      try {
          if ($table == "formateur")
            $rep = "update $table set nom = '$nom', prenom = '$prenom', ville = '$ville' ,adress = '$adress',login = '$email', tel = '$tel' where matricule = $mody";
          else 
            $rep = "update $table set nom = '$nom', prenom = '$prenom', ville = '$ville' ,adress = '$adress',login = '$email', tel = '$tel',dateN = '$daten'  where cne = $mody";

          $stat = $conn->prepare($rep);

          $stat->execute();
  
          if($stat) return 1;
          else return 0;

      } catch (PDOException $th) {

          print_r($th->getMessage());
      }
  }

  function modify_GM($table ,$mody ,$nom, $id_filier)
  {
      include "connexiondb.php";

      try {

            if ($table == "module")
                $rep = "update $table set nom = '$nom'  where id_module = $mody";
            else
                $rep = "update $table set nom = '$nom', id_filier = $id_filier  where id_groupe = $mody";
          
          $stat = $conn->prepare($rep);

          $stat->execute();
  
          if($stat) return 1;
          else return 0;

      } catch (PDOException $th) {

          print_r($th->getMessage());
      }
  }

  function modify_filier($nom, $mody)
  {
      include "connexiondb.php";

      try {

            $rep = "update filier set nom = '$nom'  where id_filier = $mody";
          
          $stat = $conn->prepare($rep);

          $stat->execute();
  
          if($stat) return 1;
          else return 0;

      } catch (PDOException $th) {

          print_r($th->getMessage());
      }
  }
  function search_info($table, $val)
  {
      include "connexiondb.php";

      try {

            if ($table == 'formateur') $rep = "select * from $table where matricule = $val";
            elseif ($table == 'stagiaire')  $rep = "select * from $table where cne = $val";
            elseif ($table == 'groupe') $rep = "select * from $table where id_groupe = $val";
            elseif ($table == 'filier') $rep = "select * from $table where id_filier = $val";
            else  $rep = "select * from $table where id_module = $val";
          $stat = $conn->prepare($rep);

          $stat->execute();

 
          $result = $stat->fetchAll(PDO::FETCH_OBJ);

          if(count($result) > 0 ) return $result;
          else return 0;

      } catch (PDOException $th) {

          print_r($th->getMessage());
      }

  }


  function seance($date, $heureD, $heureF, $type, $login,$idGroupe)
  {
      include "connexiondb.php";

      try {
          
          $rep = "insert INTO seance(date,heureD,heureF,type,login,id_groupe) VALUES('$date', '$heureD', '$heureF', '$type', '$login', $idGroupe)";

          $stat = $conn->prepare($rep);

          $stat->execute();

          if($stat) return 1;
          else return 0;

      } catch (PDOException $th) {

          print_r($th->getMessage());
      }

  }


  function absence($cne,$idSeance)
  {
      include "connexiondb.php";

      try {
          
          $rep = "insert INTO absence(etat,id_seance,cne) VALUES('encour', '$idSeance', '$cne')";

          $stat = $conn->prepare($rep);

          $stat->execute();

          if($stat) return 1;
          else return 0;

      } catch (PDOException $th) {

          print_r($th->getMessage());
      }

  }

  function max_idSeance()
  {
    include "connexiondb.php";

    try {
        
        $rep = "select max(id_seance) as id_seance from seance";

        $stat = $conn->prepare($rep);

        $stat->execute();
 
        $result = $stat->fetchAll(PDO::FETCH_OBJ);

        if(count($result) > 0 ) return $result[0];
        else return 0;

    } catch (PDOException $th) {

        print_r($th->getMessage());
    }
  }



  function list_abs($log)
  {
      include "connexiondb.php";

      try {


        $rep = "select a.* , f.nom as nomF , s.*, stg.nom,stg.cne, stg.prenom, g.nom as nomG
        from absence a
        INNER JOIN seance s ON a.id_seance = s.id_seance 
        INNER JOIN formateur f ON f.login = s.login
        INNER JOIN groupe g ON g.id_groupe = s.id_groupe 
        INNER JOIN stagiaire stg ON stg.cne = a.cne
        WHERE f.login = '$log' order by s.date";
        

        $stat = $conn->prepare($rep);

        $stat->execute();

        $result = $stat->fetchAll(PDO::FETCH_OBJ);

        if(count($result) > 0 ) return $result;
        else return 0;

      } catch (PDOException $th) {

          print_r($th->getMessage());
      }

  }


  function seach_week_cne($log, $cne_week)
  {
      include "connexiondb.php";

      try {

        if(gettype($cne_week) == gettype('cne'))

            $rep = "select a.* , f.nom as nomF , s.*, stg.nom,stg.cne, stg.prenom, g.nom as nomG
            from absence a
            INNER JOIN seance s ON a.id_seance = s.id_seance 
            INNER JOIN formateur f ON f.login = s.login
            INNER JOIN groupe g ON g.id_groupe = s.id_groupe 
            INNER JOIN stagiaire stg ON stg.cne = a.cne
            WHERE f.login = '$log'
            and a.cne  = '$cne_week' order by s.date";

        else
            $rep = "select a.* , f.nom as nomF , s.*, stg.nom,stg.cne, stg.prenom, g.nom as nomG
            from absence a
            INNER JOIN seance s ON a.id_seance = s.id_seance 
            INNER JOIN formateur f ON f.login = s.login
            INNER JOIN groupe g ON g.id_groupe = s.id_groupe 
            INNER JOIN stagiaire stg ON stg.cne = a.cne
            WHERE f.login = '$log'  
            and week(s.date) = $cne_week  order by s.date";
            
        $stat = $conn->prepare($rep);

        $stat->execute();
        $result = $stat->fetchAll(PDO::FETCH_OBJ);

        if(count($result) > 0 ) return $result;
        else return 0;

      } catch (PDOException $th) {

          print_r($th->getMessage());
      }

  }

  function seach_abs_week($log, $week)
  {
      include "connexiondb.php";

      try {


        
        $stat = $conn->prepare($rep);

        $stat->execute();
        $result = $stat->fetchAll(PDO::FETCH_OBJ);

        if(count($result) > 0 ) return $result;
        else return 0;

      } catch (PDOException $th) {

          print_r($th->getMessage());
      }

  }


  function seach_abs_date($log, $date1, $date2)
  {
      include "connexiondb.php";

      try {

        $rep = "select a.* , f.nom as nomF , s.*, stg.nom,stg.cne, stg.prenom, g.nom as nomG
        from absence a
        INNER JOIN seance s ON a.id_seance = s.id_seance 
        INNER JOIN formateur f ON f.login = s.login
        INNER JOIN groupe g ON g.id_groupe = s.id_groupe 
        INNER JOIN stagiaire stg ON stg.cne = a.cne
        WHERE f.login = '$log'  
        and s.date between '$date1' and '$date2'  order by s.date";
        
        $stat = $conn->prepare($rep);

        $stat->execute();
        $result = $stat->fetchAll(PDO::FETCH_OBJ);

        if(count($result) > 0 ) return $result;
        else return 0;

      } catch (PDOException $th) {

          print_r($th->getMessage());
      }

  }

    // delete user
    function delete_cne($cne)
    {
        include "connexiondb.php";

        try {

            $rep = "delete from $table where cne = '$cne'";

            $stat = $conn->prepare($rep);

            $stat->execute();
    
            if($stat) return 1;
            else return 0;

        } catch (PDOException $th) {

            print_r($th->getMessage());
        }
    }

}