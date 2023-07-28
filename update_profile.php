<?php
include_once 'header.php';
include 'dbh.php';
$user_id = $_SESSION['user_id'];

if (isset($_POST['update_profile'])) {
    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);


    $update_pet_name = mysqli_real_escape_string($conn, $_POST['update_pet_name']);
    $update_pet_type = mysqli_real_escape_string($conn, $_POST['update_pet_type']);
    $update_description = mysqli_real_escape_string($conn, $_POST['update_description']);

    // add new update values

    $update_phone = mysqli_real_escape_string($conn, $_POST['update_phone']);
    $update_co_owner = mysqli_real_escape_string($conn, $_POST['update_co_owner']);
    $update_co_owner_phone = mysqli_real_escape_string($conn, $_POST['update_co_owner_phone']);
    $update_co_owner_email = mysqli_real_escape_string($conn, $_POST['update_co_owner_email']);
    $update_pet_age = mysqli_real_escape_string($conn, $_POST['update_pet_age']);

    // $update_neutered = mysqli_real_escape_string($conn,$_POST['update_neutered']);
    $update_address = mysqli_real_escape_string($conn, $_POST['update_address']);
    $update_zip_code = mysqli_real_escape_string($conn, $_POST['update_zip_code']);
    $update_city = mysqli_real_escape_string($conn, $_POST['update_city']);
    $update_state = mysqli_real_escape_string($conn, $_POST['update_state']);



    // neutered = '$update_neutered',



    // query to update name and email
    mysqli_query($conn, "UPDATE user_form SET name = '$update_name' , email='$update_email' , pet_name = '$update_pet_name', pet_type='$update_pet_type' , description = '$update_description',
    phone = '$update_phone', co_owner = '$update_co_owner' , co_owner_phone = '$update_co_owner_phone',co_owner_email = '$update_co_owner_email' ,pet_age = '$update_pet_age',
    address = '$update_address',zip_code = '$update_zip_code',city = '$update_city', state = '$update_state' WHERE id='$user_id'") or die('query failed');


    // image update setting
    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = 'uploaded_img/' . $update_image;


    // limit of the image size
    if (!empty($update_image)) {
        if ($update_image_size > 2000000) {
            $message[] = 'image is too large';
        } else {
            // update if the image has the requirements
            $image_update_query =  mysqli_query($conn, "UPDATE user_form SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
            if ($image_update_query) {
                move_uploaded_file($update_image_tmp_name, $update_image_folder);
            }
            $message[] = "image updated successfully!";
        }
    }
}



?>
<!-- content body -->
<div class="update-container">

    <div class="update_profile">
        <?php
        $select = mysqli_query($conn, "SELECT * FROM user_form WHERE id = '$user_id'") or die('query failed');
        if (mysqli_num_rows($select) > 0) {
            $fetch = mysqli_fetch_assoc($select);
        }


        // Default profile image
        if ($fetch['image'] == '') {
            echo '<img src="default-avatar.png">';
        } else {
            echo '<img src="uploaded_img/' . $fetch['image'] . '">';
        }

        if (isset($message)) {
            foreach ($message as $message) {
                echo '<div class="message">' . $message . '</div>';
            }
        }
        ?>

        <div class="profileInformation">

            <form action="" method="post" enctype="multipart/form-data">
                <div class="inputBox">

                    <div class="profileInfoRow">
                        <span>Owner Name:</span>
                        <input type="text" name="update_name" value="<?php echo $fetch['name'] ?>">
                    </div>


                    <div class="profileInfoRow">
                        <span>Email:</span>
                        <input type="text" name="update_email" value="<?php echo $fetch['email'] ?>">
                    </div>


                    <div class="profileInfoRow">
                        <span>Phone:</span>
                        <input type="tel" name="update_phone" value="<?php echo $fetch['phone'] ?>">
                    </div>


                    <div class="profileInfoRow">
                        <span>Pet's name:</span>
                        <input type="text" name="update_pet_name" value="<?php echo $fetch['pet_name'] ?>">
                    </div>


                    <div class="profileInfoRow">
                        <span>Pet type:</span>
                        <input type="text" name="update_pet_type" value="<?php echo $fetch['pet_type'] ?>">
                    </div>


                    <div class="profileInfoRow">
                        <span>Breed:</span>
                        <input type="text" name="update_description" value="<?php echo $fetch['description'] ?>">

                    </div>

                    <div class="profileInfoRow">
                        <span>Pet Age:</span>
                        <input type="number" name="update_pet_age" value="<?php echo $fetch['pet_age'] ?>">

                    </div>


                    <div class="profileInfoRow">
                        <span>Co Owner Name:</span>
                        <input type="text" name="update_co_owner" value="<?php echo $fetch['co_owner'] ?>">
                    </div>


                    <div class="profileInfoRow">
                        <span>Co Owner Email:</span>
                        <input type="text" name="update_co_owner_email" value="<?php echo $fetch['co_owner_email'] ?>">

                    </div>


                    <div class="profileInfoRow">
                        <span>Co Owner Phone:</span>
                        <input type="tel" name="update_co_owner_phone" value="<?php echo $fetch['co_owner_phone'] ?>">

                    </div>

                    <div class="profileInfoRow">
                        <span>Address:</span>
                        <input type="text" name="update_address" value="<?php echo $fetch['address'] ?>">
                    </div>


                    <div class="profileInfoRow">
                        <span>Zip Code:</span>
                        <input type="number" name="update_zip_code" value="<?php echo $fetch['zip_code'] ?>">

                    </div>


                    <div class="profileInfoRow">
                        <span>City:</span>
                        <input type="text" name="update_city" value="<?php echo $fetch['city'] ?>">
                    </div>

                    <div class="profileInfoRow">
                        <span>State:</span>
                        <select name="update_state">
                            <option value="<?php echo $fetch['state'] ?>" name="update_state"> <?php echo $fetch['state'] ?> </option>

                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </select>
                    </div>

                    <span>update picture:</span>
                    <input type="file" name="update_image" accept="image/jpg, image/jpeg ,image/png">

                </div>



        </div>

        <div class="outlinks_update">

            <!-- action to update the profile -->
            <input type="submit" value="update profile" name="update_profile">

            <!-- if user wants to change password -->
            <a href="changePassword.php">Change Passsword</a>

            <!-- go back to profile -->
            <a href="profile.php">go back</a>

        </div>

        </form>
    </div>
</div>
</div>

<!-- content body    -->

<?php
include_once 'footer.php';
?>