<?php
session_start();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Home</title>

    <link href="style.css" rel="stylesheet">
</head>
<body>

<div class="container">

<nav>
    <div class="wrapper">
        <ul>
            <!-- <li><a href="index.php">Home</a></li>
            <li><a href="discover.php">Discver</a></li>
            <li><a href="about.php">About</a></li> -->
            <li><a href="services.php">Services</a></li>
            <li><a href="about.php">Our Story</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="reviews.php">Reviews</a></li>


            <li><a href="index.php" class="logo">Paws & Claws</a></li>
            <li><a href="ourTeam.php">Our Team</a></li>
            <li><a href="joinTeam.php">Join our team</a></li>




            <?php

            // once the user has log in he will be able to access a profile section or log out
            if(isset($_SESSION['useruid'])){
                echo '<li><a href="profile.php">Profile</a></li>';
                echo '<li><a href="include/logout.inc.php">log-out</a></li>';

            }
            else{
                //  if the user has not log in it will display the log in or sign up options
                echo '<li><a href="login.php">Log-in</a></li>';
                echo '<li><a href="signup.php">Sign-up</a></li>';
            }
            
            ?>

        </ul>
    </div>
</nav>