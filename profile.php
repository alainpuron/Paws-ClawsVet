<?php
// conection to the header
include_once 'header.php';

// connection to the database 
include 'dbh.php';

$user_id = $_SESSION['user_id'];

// only way to access is with user_id
if (!isset($user_id)) {
    header('location:login.php');
    exit();
}
?>





<!-- profile of the user  -->
<div class="profile-container">

    <div class="profile">
                    <?php
                    // select all the info from the table and user based on the user_id
                    $select = mysqli_query($conn, "SELECT * FROM user_form WHERE id = '$user_id'") or die('query failed');
                    if (mysqli_num_rows($select) > 0) {
                        $fetch = mysqli_fetch_assoc($select);
                    }
                    // default profile image
                    if ($fetch['image'] == '') {
                        echo '<img src="default-avatar.png">';
                    }
                    // pet profile image 
                    else {
                        echo '<img src="uploaded_img/' . $fetch['image'] . '">';
                    }
                    ?>

        <!-- add new profile info -->
        <div class="profileInformation">

            <div class="profileInfoRow">
                <span>Owner Name:</span>
                <p> <?php echo $fetch['name']; ?></p>
            </div>

            <div class="profileInfoRow">
                <span>Owner Phone:</span>
                <p><?php echo $fetch['phone']; ?></p>
            </div>


            <div class="profileInfoRow">
                <span>Pet's Name:</span>
                <p><?php echo $fetch['pet_name']; ?></p>
            </div>


            <div class="profileInfoRow">
                <span>Pet Type:</span>
                <p><?php echo $fetch['pet_type']; ?></p>

            </div>


            <div class="profileInfoRow">
                <span>Breed:</span>
                <p><?php echo $fetch['description']; ?></p>
            </div>


            <div class="profileInfoRow">
                <span>Pet's age:</span>
                <p><?php echo $fetch['pet_age']; ?></p>
            </div>

            <div class="profileInfoRow">
                <span>Co Owner Name:</span>
                <p><?php echo $fetch['co_owner']; ?></p>
            </div>

            <div class="profileInfoRow">
                <span>Co Owner Phone:</span>
                <p><?php echo $fetch['co_owner_phone']; ?></p>

            </div>




        </div>


        <!-- update profile -->
        <div class="outlinks">
            <a href="update_profile.php">update profile</a>
        </div>
    </div>


</div>

<!-- connection to the footer -->
<?php
include_once 'footer.php';
?>