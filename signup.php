<?php
include_once 'header.php';
?>

<?php
include 'dbh.php';

if (isset($_POST['submit'])) {
    $message = array(); // Initialize an array to store validation messages

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pet_type = mysqli_real_escape_string($conn, $_POST['pet_type']);
    $pet_name = mysqli_real_escape_string($conn, $_POST['pet_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $pet_age = mysqli_real_escape_string($conn, $_POST['pet_age']);
    $neutered = mysqli_real_escape_string($conn, $_POST['neutered']);

    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $co_owner = mysqli_real_escape_string($conn, $_POST['co_owner']);
    $co_owner_email = mysqli_real_escape_string($conn, $_POST['co_owner_email']);
    $co_owner_phone = mysqli_real_escape_string($conn, $_POST['co_owner_phone']);

    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $zip_code = mysqli_real_escape_string($conn, $_POST['zip_code']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);


    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/' . $image;

    // Validation checks
    if (
        empty($name) || empty($email) || empty($pet_type) || empty($pet_name)  || empty($pass) || empty($cpass)
        || empty($phone) || empty($pet_age) || empty($neutered) || empty($address) || empty($zip_code) || empty($city) || empty($state)
    ) {
        $message[] = 'All fields are required.';
    }

    if ($pass != $cpass) {
        $message[] = 'Confirm password does not match.';
    }

    if ($image_size > 2000000) { 
        $message[] = 'Image size is too large.';
    }

    // Check if there are any validation errors
    if (empty($message)) {
        // No errors, proceed with user registration
        $insert = mysqli_query($conn, "INSERT INTO user_form (name, pet_name, pet_type, email, image, password, description,phone,co_owner,co_owner_email,co_owner_phone,pet_age,neutered,address,zip_code,city,state) VALUES ('$name', '$pet_name', '$pet_type', '$email', '$image', '$pass', '$description','$phone','$co_owner','$co_owner_email','$co_owner_phone','$pet_age','$neutered','$address','$zip_code','$city','$state')") or die('Query failed.');

        if ($insert) {
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'Registered successfully!';
            header('location: login.php');
            exit();
        } else {
            $message[] = 'Registration failed. Please try again.';
        }
    }
}

?>

<!-- content body    -->
<div class="container_log">

<section class="signup-container">
    <h2>Sign-up</h2>

    <form action="" method="post" enctype="multipart/form-data">
        <?php
        if (isset($message)) {
            foreach ($message as $msg) {
                echo '<div class="message">' . $msg . '</div>';
            }
        }
        ?>

        <input type="text" name="name" placeholder="Enter your name" required>
        <input type="tel" name="phone" pattern="[0-9]{10}" placeholder="Phone:">

        <input type="email" name="email" placeholder="Enter email" required>
        <input type="password" name="password" placeholder="Enter password" required>
        <input type="password" name="cpassword" placeholder="Confirm password" required>
        <input type="text" name="pet_name" placeholder="Pet name" required>
        <input type="text" name="pet_type" placeholder="Type of pet" required>
        <input type="text" name="description" placeholder="Breed" >
        <input type="number" name="pet_age" placeholder="Pet age" required>

        <label>Neutered?</label>
        <div class="neutered">
        <input type="radio" name="neutered" value="yes" required>Yes
        <input type="radio" name="neutered" value="no" required>No
        </div>
        
        <input type="text" name="address" placeholder="Address" required>
        <input type="number" name="zip_code" placeholder="Zip code" required>
        <input type="text" name="city" placeholder="City" required>

        <select name="state" required>
            <option value="" selected disabled>Select State</option>
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


        <input type="text" name="co_owner" placeholder="Co-owner name">
        <!-- Fix phone number input with proper format -->
        <input type="tel" name="co_owner_phone" pattern="[0-9]{10}" placeholder="Co-owner phone">
        <input type="email" name="co_owner_email" placeholder="Co-owner email">
        <input type="file" name="image" accept="image/jpg, image/jpeg, image/png">
        <input type="submit" name="submit" value="Register now">
    </form>
</section>

</div>

<!-- content body    -->

<?php
include_once 'footer.php';
?>