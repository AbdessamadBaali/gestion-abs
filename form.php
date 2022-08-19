<!DOCTYPE html>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // assign variables
        $user_name = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
        $mail = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
        $msg =filter_var($_POST['msg'], FILTER_SANITIZE_STRING);


        // CREATING ARRAY EROORS
        $formEroors = array();

        if (strlen($user_name) <= 8){
            $formEroors[] = "Username Must Be Larger Than <strong>8</strong> Cahracters";
        }
        if (strlen(ltrim($msg)) <= 20){
            $formEroors[] = "Message Must Be Larger Than <strong>20</strong> Cahracters";
        }
        if (strlen(ltrim($mail)) == ''){
            $formEroors[] = "Email Can't Be <strong>Empty</strong>";
        }

        // If No Errors Send The Email mail(To, Subject, Message, Headers, Paarameters)
        $headers = 'From : ' . $mail .'\r\n';
        $myEmail = 'abdessamad.baalidev@gmail.com' ;
        if (empty($formEroors)){
            mail($myEmail, 'Contact Form', $msg, $headers);
            $user_name = '';
            $mail = '';
            $phone = '';
            $msg = '';
        }
    }

?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="font-end, back-end, web devoloper, baaliDev,full stack,">
        <meta name="auther" content="Abdessamad Baali">
        <meta name="description"
             content="Hi, my name is Abdessamad Baali. I'm a Front-end developer.Specialize 
             in the Html5, css and javaScript stack with decent knowledge in other technologies in the field as well.">
        <title>BaaliDev</title>
        <link rel="icon shortcut" href="images/icon of the pages/reshot-icon-portfolio-SMNPQ4E3UL.svg" >
        <link rel="stylesheet" href="styles/bootstrap-5.1.3-dist/css/bootstrap.css">
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="styles/responsive.css">
        <link rel="stylesheet" href="styles/fontawesome-free-6.0.0-beta2-web/css/all.css">
        <link rel="stylesheet" href="styles/form.css">

    </head>
<body>

        <!-- the header part of my portfolio -->
        <header>
            <!-- logo -->
            <div data-aos="fade-right" data-aos-duration="1300" class="logo">
                <a href="index.php" title="home">baaliDev</a>
                <a href="index.php" title="home">baaliDev</a>
            </div>
            <nav >
                <!--menu-btn  -->
                <input class="menu-btn" type="checkbox" id="menu-btn">
                <label class="menu-icon" for="menu-btn">
                    <span class="nav-icon"></span>
                </label>
                <ul  data-aos="fade-left"  data-aos-duration="1300"  class="nav">
                    <li class="nav-item"><a class="nav-link" href="index.php">home</a></li>
                    <li class="nav-item"><a class="nav-link" href="form.php">contact</a></li>
                </ul>
            </nav>
        </header>
        <!-- contact section -->
        <section  id="contact" class='py-4' >
            <h2 class="p-5 text-white">Contact Me!</h2>

            <div class="container-fuild container-from-card" > 
                
                <div  id="container-form">
                    <p  id="contact-paragraph" data-aos="fade-right" data-aos-duration="900">
                        Make sure to contact me whenever you want, 
                        I'm excited to. for freelancing opportunities, 
                        creating your website or project, feel free to make me know. 
                        However,I am ready to your requests or questions.
                    </p>
                    
                    <form id='form-contact' action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" data-aos="fade-right" data-aos-duration="900">
                        <?php if(! empty($formEroors)){ ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>                           
                                <?php
                                        foreach($formEroors as $eroor){
                                            echo $eroor . "<br/>";
                                        }
                                ?>
                            </div> 
                                        
                            <?php } ?>
                                        <!-- user name -->
                        <label  for="name">User name</label>
                        <input  class=" btn  rounded-pill" required
                                value="<?php if(isset($user_name)) echo $user_name?>"
                                id="name" type="text" name="user"
                                placeholder="Full Name" >
                        <div class="alert alert-danger custom-alert" role="alert">
                            <p>Username Must Be Larger Than <strong>8</strong> Cahracters</p>  
                        </div>
                                        <!-- mail -->
                        <label  for="mail">Email</label>
                        <input class="btn rounded-pill" id="mail" required
                               value="<?php if(isset($mail)) echo $mail?>"
                               type="email" name="mail" placeholder="Email" >
                        <div class="alert alert-danger custom-alert" role="alert">
                            <p>Email Can't Be <strong>Empty</strong></p>
                        </div>
                                        <!-- phone number -->
                        <label  for="phone">Phone</label>
                        <input class="btn rounded-pill" id="phone" 
                               value="<?php if(isset($phone)) echo $phone?>"
                               type="tel" name="phone" placeholder="phone"> 

                                        <!-- message -->
                        <label  for="msg">Your Message</label>
                        <textarea  
                                class="btn  "id="msg" name="msg"  
                                value="<?php if(isset($msg)) echo $msg;?>"> 
                        </textarea>
                        <div class="alert alert-danger custom-alert" role="alert">
                            <p>Message Must Be Larger Than <strong> 20 </strong> Cahracters</p>
                        </div>

                        <br>
                        <div class="btn-group ">
                            <input class="btn" type="submit" name="sendMail" value="Send" >    
                            <input class="btn" type="reset" name="supp" value="Reset" >    
                        </div>
                    </form>                    
                </div>
                
                <div class="container-card">

                    <div data-aos="flip-left"  data-aos-duration="900" class="card-info">
                        <i class="fa fa-map-marked fs-2"></i>
                        <p>address</p>
                        <span ></span>
                        <p >Lot Ain Aghbal Ahadaf Azrou</p>
                    </div>
                    <div data-aos="flip-up"  data-aos-duration="900" class="card-info ">
                        <i class="fa fa-envelope fs-2"></i>
                        <p>email</p>
                        <span></span>
                        <a href="mailto:abdessamad.baalidev@gmail.com" >abdessamad.baalidev@gmail.com</a>
                    </div>
                    <div data-aos="flip-right"  data-aos-duration="900" class="card-info">
                        <i class="fa fa-phone fs-2"></i>
                        <p>phone</p>
                        <span></span>
                        <p >+212 641336504</p>
                    </div>
                </div>
            </div> 
           
        </section> 
   <!-- footer section  -->
   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffd700" fill-opacity="1" d="M0,256L120,250.7C240,245,480,235,720,218.7C960,203,1200,181,1320,170.7L1440,160L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>

        <footer class="footer text-center ">
            <div class="container">
                <ul class="list-inline mb-3">
                    <li class="list-inline-item">
                        <a
                            class="social-link rounded-circle text-white mr-3 bg-black"  target="_blank"
                            href="https://github.com/AbdessamadBaali">
                            <i class="fab fa-github"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="social-link rounded-circle text-white bg-primary" target="_blank"
                         href="https://twitter.com/CodeBaali"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a 
                            class="social-link rounded-circle text-white bg-danger"
                            target="_blank" href="https://www.instagram.com/abdessamad.baali/">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a 
                            class="social-link rounded-circle text-white  bg-primary" target="_blank"
                            href="https://www.linkedin.com/in/abdessamad-baali-9a09b91ab/">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </li>

                </ul>
                <span class="text-dark" >Copyright © baaliDev 2022 </span>
                <span class="text-dark" >Baali Abdessamad Full-Stack Developer, UI Designer</span>
            </div>
        </footer>


        <script src="javaScripit/jquery-3.6.0..js"></script>

        <script src='javaScripit/form.js'></script>
</body>
</html>