// Initialize slide index
let slideIndex = 1;
showSlide(slideIndex);

// Function to move to the next slide
function nextSlide() {
    showSlide(slideIndex += 1);
}

// Function to move to the previous slide
function prevSlide() {
    showSlide(slideIndex -= 1);
}

// Function to show a specific slide
function currentSlide(n) {
    showSlide(slideIndex = n);
}

// Function to display the slide
function showSlide(n) {
    let slides = document.getElementsByClassName("slides");
    let dots = document.getElementsByClassName("dot");
    
    // Wrap around to the first slide if reaching the end
    if (n > slides.length) { 
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = slides.length;
    }
    
    // Hide all slides and remove the "active" class from dots
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; 
    }
    for (let i = 0; i < dots.length; i++) {
        dots[i].classList.remove("active");
    }
    
    // Display the current slide and set the "active" class for the corresponding dot
    slides[slideIndex - 1].style.display = "block"; 
    dots[slideIndex - 1].classList.add("active");
}

// Automatic slideshow
let slideInterval = setInterval(nextSlide, 5000);

// Pause the slideshow when hovering over the slider
document.getElementById('slider').addEventListener('mouseenter', function() {
    clearInterval(slideInterval);
});

// Resume the slideshow when leaving the slider
document.getElementById('slider').addEventListener('mouseleave', function() {
    slideInterval = setInterval(nextSlide, 5000);
});

// Add event listeners to dots for manual navigation
let dots = document.getElementsByClassName("dot");
for (let i = 0; i < dots.length; i++) {
    dots[i].addEventListener("click", function() {
        currentSlide(i + 1);
    });
}
