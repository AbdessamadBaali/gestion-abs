
<div class="login-container">
    <form id="form-login" class="form-login" method="POST" action="index.php">
            <h3 class="text-white mb-3">Login Here</h3>
            <div class="m-2">
                <strong id="feed_back" class="text-danger"><?php
                        if (isset($_SESSION['msg'])) echo $_SESSION['msg']; 
                        unset($_SESSION['msg']);
                    ?>
                </strong>
            </div>           
                    
            <label for="login-input-user" class="login__label">
                Login
            </label>
            <input id="login-input-user" class="login__input" type="text" name="email" value="<?php if (isset($_COOKIE['login'])) echo $_COOKIE['login']; else echo "";?>" required/>
            
            <label for="login-input-password" class="login__label">
                Password
            </label>
            <input id="login-input-password" class="login__input" type="password" name="pass"  value="<?php if (isset($_COOKIE['login'])) echo $_COOKIE['pass']; else echo "";?>"/>
            
            <label for="memoriser" class="login__label--checkbox">
                <input id="memoriser" type="checkbox" class="login__input--checkbox" name="remember"/>
                Memoriser vos info
            </label>

            <input type="submit" class="login__submit" name='btnLog' id="btnLogin"  value="login">
            
        </form>
        <!-- <a href="#" class="login__forgot">Forgot Password?</a> -->
</div>