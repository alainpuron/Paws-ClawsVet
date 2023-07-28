<?php
include_once 'header.php';
?>
<!-- content body    -->

<div class="contact_container">

  <h1>
    Contact
  </h1>


  <div class="form-container">
    <form action="https://formsubmit.co/alain.1puron@gmail.com" method="POST">

      <div></div>
      <input type="hidden" name="_captcha" value="false">


      <div class="infoRow">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required placeholder="John Smith"><br>


      </div>


      <div class="infoRow">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required placeholder="Johnsmith@gmail.com"><br>

      </div>


      <div class="infoRow">

        <label for="subject">subject:</label>
        <textarea id="subject" name="subject" required placeholder="Subject "></textarea><br>

      </div>


      <div class="infoRow">



        <label for="message">Message:</label>
        <textarea id="message" name="message" required placeholder="Message"></textarea><br>

      </div>



      <!-- <label for="name">Name:</label>
      <input type="text" id="name" name="name" required><br> -->

      <!-- <label for="email">Email:</label>
      <input type="email" id="email" name="email" required><br> -->

      <!-- <label for="subject">subject:</label>
      <textarea id="subject" name="subject" required></textarea><br> -->

      <!-- <label for="message">Message:</label>
      <textarea id="message" name="message" required></textarea><br> -->

      <input type="hidden" name="_next" value="http://localhost:8080/php/public_html/vet/contact.php">
      <input type="submit" value="Send" class="send" onclick="mailSent()">
    </form>
  </div>

</div>





</div>


<!-- content body    -->

<?php
include_once 'footer.php';
?>