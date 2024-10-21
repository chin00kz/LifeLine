<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  echo "<h2>Thank you for your message, $name!</h2>";
  echo "<p>We'll get back to you at $email as soon as possible.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link rel="stylesheet" href="css/form.css">
</head>
<body>

  <div class="f-container">
    <div class="contact-info">
      <img src="images/form.jpg" alt="Contact Image">
    </div>
    <div class="contact-form">
      <h1>Contact Us</h1>
      <form action="process_contact.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <button type="submit">Send Message</button>
      </form>
    </div>
  </div>

</body>
</html>


