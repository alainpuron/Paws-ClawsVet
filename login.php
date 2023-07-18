<?php 
include_once 'header.php';
?>
 <!-- content body    -->

<div class="container-log">
<section class="signup-container">

<h2>log-in</h2>

<form action="include/login.inc.php" method="post">
<input type="text" name="uid" placeholder="Username/Email">
<input type="password" name="pwd" placeholder="Password">
<button type="submit" name="submit">Log in</button>

</form>
<?php
if(isset($_GET["error"])){
// error message letting know that all fields were not filled
if($_GET["error"] == "emptyinput"){
    echo "<p> Fill in all fields</p>";
}
// error message letting know that the information to log in is incorrect
else if ($_GET["error"] == "wronglogin"){
    echo "<p>Incorrect login information </p>";
}

}

?>

</section>

</div>

<!-- content body    -->

<?php 
include_once 'footer.php';
?>