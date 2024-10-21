<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback Form</title>
  <link rel="stylesheet" href="css/feedback.css">
  <link rel="icon" href="images/transperent.png">
</head>
<body>
  
<?php
// Assuming "lifeline" is the root folder for your project
include('header.php');
?>

  <h2>Feedback</h2>
  <div class="feedback-container">
    <form action="feedbacksubmit.php" method="post">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="Name" placeholder="Your Name" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Your Email" required>
      </div>
      <div class="form-group">
        <label for="feedback">Feedback</label>
        <textarea id="feedback" name="feedback_des" rows="5" placeholder="Your Feedback" required></textarea>
      </div>
      <div class="form-group">
        <button type="submit" name="submit">Submit</button>
      </div>
    </form>
  </div>
<br>
  <?php
// Assuming "lifeline" is the root folder for your project
include('footer.php');
?>
</body>
</html>
