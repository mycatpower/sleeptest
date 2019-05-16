<form id="login" class="ajax-auth" action="login" method="post">
    <!-- <h3>New to site? </h3> -->
    <!-- <hr /> -->
    <h1>Login</h1>
    <p class="status"></p>  
    <?php wp_nonce_field('ajax-login-nonce', 'security'); ?>  
    <!-- <label for="username">Username</label> -->
    <input id="username" type="text" class="required" name="username" placeholder="Email">
    <!-- <label for="password">Password</label> -->
    <input id="password" type="password" class="required" name="password" placeholder="Password">
    
    <input class="submit_button" type="submit" value="Login">
    <a class="text-link" href="<?php
echo wp_lostpassword_url(); ?>">Lost password?</a>
    <a id="pop_signup" href="" class="cr-acc-pop">Create an Account</a>
	<a class="close" href=""><i class="fas fa-times"></i></a>    
</form>

<form id="register" class="ajax-auth"  action="register" method="post">
	<!-- <h3>Already have an account? <a id="pop_login"  href="">Login</a></h3>
    <hr /> -->
    <h1>Signup</h1> <a id="pop_login"  href="" class="cr-acc-pop">Login</a>
    <p class="status"></p>
    <?php wp_nonce_field('ajax-register-nonce', 'signonsecurity'); ?>         
    <!-- <label for="signonname">Username</label> -->
    <input id="signonname" type="text" name="signonname" class="required" placeholder="Name">
    <!-- <label for="email">Email</label> -->
    <input id="email" type="text" class="required email" name="email" placeholder="Email">
    <!-- <label for="signonpassword">Password</label> -->
    <input id="signonpassword" type="password" class="required" name="signonpassword" placeholder="Password">
    <!-- <label for="password2">Confirm Password</label> -->
    <input type="password" id="password2" class="required" name="password2" placeholder="Confirm Password">
    <input class="submit_button" type="submit" value="Submit">
    <a class="close" href=""><i class="fas fa-times"></i></a>    
</form>