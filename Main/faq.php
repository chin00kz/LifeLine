<?php include 'header.php'; ?>
<?php include('loading.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FAQ</title>
  <link rel="stylesheet" href="css/faq.css">
  <script src="faq.js"></script>
  <link rel="icon" href="images/transperent.png">
</head>
<body>

<div class="faq-section">
  <h2 class="faq-heading">Frequently Asked Questions</h2>
  
  <div class="faq-item">
    <input type="checkbox" id="faq-1" class="faq-toggle">
    <label for="faq-1" class="faq-question">What are your opening hours?</label>
    <div class="faq-answer">
      Our clinic is open Monday to Friday from 9:00 AM to 5:00 PM. We are closed on weekends and public holidays.
    </div>
  </div>

  <div class="faq-item">
    <input type="checkbox" id="faq-2" class="faq-toggle">
    <label for="faq-2" class="faq-question">Do you accept insurance?</label>
    <div class="faq-answer">
      Yes, we accept most major insurance plans. Please contact our office for specific details regarding your insurance coverage.
    </div>
  </div>

  <!-- Added FAQs -->
  
  <div class="faq-item">
    <input type="checkbox" id="faq-3" class="faq-toggle">
    <label for="faq-3" class="faq-question">How do I schedule an appointment?</label>
    <div class="faq-answer">
      You can schedule an appointment by calling our office or using our online appointment booking system.
    </div>
  </div>

  <div class="faq-item">
    <input type="checkbox" id="faq-4" class="faq-toggle">
    <label for="faq-4" class="faq-question">Can I request prescription refills online?</label>
    <div class="faq-answer">
      Yes, you can request prescription refills through our patient portal or by contacting our office.
    </div>
  </div>

  <div class="faq-item">
    <input type="checkbox" id="faq-5" class="faq-toggle">
    <label for="faq-5" class="faq-question">What insurances do you accept?</label>
    <div class="faq-answer">
      We accept a wide range of insurance plans. Please contact our office to verify if your insurance is accepted.
    </div>
  </div>

  <div class="faq-item">
    <input type="checkbox" id="faq-6" class="faq-toggle">
    <label for="faq-6" class="faq-question">Do you offer telemedicine services?</label>
    <div class="faq-answer">
      Yes, we offer telemedicine appointments for certain medical concerns. Please inquire with our staff for more information.
    </div>
  </div>

  <div class="faq-item">
    <input type="checkbox" id="faq-7" class="faq-toggle">
    <label for="faq-7" class="faq-question">How do I access my medical records?</label>
    <div class="faq-answer">
      You can access your medical records through our patient portal or by submitting a request to our office.
    </div>
  </div>

  <div class="faq-item">
    <input type="checkbox" id="faq-8" class="faq-toggle">
    <label for="faq-8" class="faq-question">How do I pay my medical bills online?</label>
    <div class="faq-answer">
      You can pay your medical bills online through our secure payment portal on our website.
    </div>
  </div>

  <!-- End of added FAQs -->

</div>

</body>
</html>

<script src="script.js"></script>

<?php include 'footer.php'; ?>