<?php 
include_once 'header.php';
include 'dbh.php';
$user_id = $_SESSION['user_id'];

if(isset($_POST['update_profile'])){

    // password logic
    $old_pass = $_POST['old_pass'];
    $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
    $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
    $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));




    if (!empty($new_pass) && !empty($confirm_pass)) {
        
        if ($update_pass != $old_pass) {
            $message[] = 'Old password not matched!';
        }
        

        elseif ($new_pass != $confirm_pass) {
            $message[] = 'Confirm password not matched!';
        } 
    
        else {
            mysqli_query($conn, "UPDATE user_form SET password = '$confirm_pass' WHERE id = '$user_id'") or die ('Query failed');
            $message[] = 'Password updated successfully!';
        }
    }


    
}

?>
<!-- content body -->
<div class="update_pass_container">

<div class="profile">
    <?php
    $select = mysqli_query($conn, "SELECT * FROM user_form WHERE id = '$user_id'") or die('query failed');
    if (mysqli_num_rows($select) > 0) {
        $fetch = mysqli_fetch_assoc($select);
    }

 
    if (isset($message)) {
        foreach ($message as $message) {
            echo '<div class="message">'.$message.'</div>';
        }
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
    
         <div class="profileInformation">

            <input type='hidden' name="old_pass" value="<?php echo $fetch['password'] ?>">

            <div class="profileInfoRow">

            <span>Old password:</span>
            <input type="password" name="update_pass" placeholder="enter previous password">
            

            </div>

            <div class="profileInfoRow">
            <span>New Password</span>
            <input type="password" name="new_pass" placeholder="enter new password">
            </div>


            <div class="profileInfoRow">

            <span>Confirm password</span>
            <input type="password" name="confirm_pass" placeholder="confirm new password">
            </div>

        </div> 

        <input type="submit" value="update password"  name="update_profile">
        <!-- <a href="changePassword.php">Change Passsword</a> -->
        <a href="profile.php">Back to profile</a>
    </form>
</div>

</div>
<!-- content body    -->

<?php 
include_once 'footer.php';
?>