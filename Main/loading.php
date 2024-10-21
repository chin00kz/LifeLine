<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loading...</title>
  <style>
    /* Preloader styles */
    .preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 9999; /* Ensure preloader is on top of everything */
    }

    .loader {
      border: 6px solid #f3f3f3;
      border-top: 6px solid #3498db;
      border-radius: 50%;
      width: 50px;
      height: 50px;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    /* Hide content initially */
    .content {
      display: none;
    }
  </style>
</head>
<body>

<!-- Preloader -->
<div class="preloader" id="preloader">
  <div class="loader"></div>
</div>

<!-- Your Website Content -->
<div class="content" id="content" style="display:none;">
  <!-- Content will be loaded dynamically -->
</div>

<script src="script.js"></script>
<script>
  // Show preloader for 1-2 seconds before revealing content
  window.addEventListener('load', function() {
    setTimeout(function() {
      document.getElementById('preloader').style.display = 'none';
      document.getElementById('content').style.display = 'block';
    }, 1000); // Adjust delay as needed (1-2 seconds)
  });
</script>
</body>
</html>
