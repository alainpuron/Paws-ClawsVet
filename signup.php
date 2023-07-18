<?php 
include_once 'header.php';
?>
 <!-- content body    -->
 <div class="container-log">

<section class="signup-container">


<h2>Sign-up</h2>

<form action="include/signup.inc.php" method="post">
<input type="text" name="name" placeholder="Name">
<input type="text" name="email" placeholder="Email">
<input type="text" name="uid" placeholder="Username">
<input type="password" name="pwd" placeholder="Password">
<input type="password" name="pwdrepeat" placeholder="Repeat password">

<button type="submit" name="submit">Sign Up</button>

</form>
<?php 

if(isset($_GET["error"])){

    if($_GET["error"] == "emptyinput"){
        echo "<p> Fill in all fields</p>";
    }

    else if ($_GET["error"] == "invaliduid"){
        echo "<p>Choose a proper username </p>";
    }

    else if ($_GET["error"] == "invalidemail"){
        echo "<p>Choose a proper email </p>";
    }

    else if ($_GET["error"] == "passwordsdontmatch"){
        echo "<p>Passwords don't match</p>";
    }

    else if ($_GET["error"] == "usernametaken"){
        echo "<p>Username already taken</p>";
    }

    else if ($_GET["error"] == "none"){
        echo "<p>You have sign up!</p>";
    }

}

?>
</section>

</div>



<!-- content body    -->

<?php 
include_once 'footer.php';
?>