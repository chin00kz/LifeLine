document.addEventListener('DOMContentLoaded', function() {
    const faqToggles = document.querySelectorAll('.faq-toggle');
  
    faqToggles.forEach(function(faqToggle) {
      faqToggle.addEventListener('change', function() {
        // Close other FAQ items
        faqToggles.forEach(function(otherToggle) {
          if (otherToggle !== faqToggle) {
            otherToggle.checked = false;
          }
        });
      });
    });
  });
  