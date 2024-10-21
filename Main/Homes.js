/*Slider*/

var index = 0;
var slides = document.querySelectorAll(".slides");
var dot = document.querySelectorAll(".dot");
var prevBtn = document.querySelector(".prev");
var nextBtn = document.querySelector(".next");
var intervalId;  // To store the interval ID

function changeSlide(newIndex) {
    index = newIndex;

    if (index < 0) {
        index = slides.length - 1;
    }

    if (index > slides.length - 1) {
        index = 0;
    }

    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
        dot[i].classList.remove("active");
    }

    slides[index].style.display = "block";
    dot[index].classList.add("active");
}

function prevSlide() {
    index -= 1;
    changeSlide(index);
}

function nextSlide() {
    index += 1;
    changeSlide(index);
}

// Show buttons
function showButtons() {
    prevBtn.style.display = "block";
    nextBtn.style.display = "block";
}

// Dots click event
dot.forEach((dotItem, dotIndex) => {
    dotItem.addEventListener('click', () => {
        clearInterval(intervalId);  // Stop automatic slide change
        changeSlide(dotIndex);
        intervalId = setInterval(nextSlide, 5000);  // Restart automatic slide change
    });
});

changeSlide(index);
showButtons();
intervalId = setInterval(nextSlide, 5000);  // Automatic slide change
