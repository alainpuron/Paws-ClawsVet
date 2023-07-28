<?php
include_once 'header.php';
?>

<?php
include 'dbh.php';

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

    $select = mysqli_query($conn, "SELECT * FROM user_form  WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user_id'] = $row['id'];
        header('location:profile.php');
        exit();
    } else {
        $message[] = 'Incorrect email or password.';
    }
}

?>
<!-- content body    -->

<div class="container_log">

    <section class="log-container">
        <h2>Log-in</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <?php
            if (isset($message)) {
                foreach ($message as $msg) {
                    echo '<div class="message">' . $msg . '</div>';
                }
            }
            ?>
            <input type="text" name="email" placeholder="enter email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" required>
            <input type="password" name="password" placeholder="enter password" required>
            <input type="submit" name="submit" value="Log in">
        </form>
    </section>
</div>

<!-- content body    -->

<?php
include_once 'footer.php';
?>
