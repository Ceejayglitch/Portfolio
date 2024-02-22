const hamburger = document.querySelector('.hamburger');
const navList = document.querySelector('nav ul');

hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    navList.classList.toggle('active');

});

const typed = new Typed('.multiple', {
    strings: ['Full-stack Developer', 'Graphic Designer'],
    typeSpeed:80,
    backSpeed:80,
    backDelay:1000,
    loop:true
});

// (function()
// {
//     new WOW().init();
//     $(".rotate").textrotator();
// })


//counting animation
// Function to animate counting
function animateCount(element, target, duration) {
    let start = 0;
    const step = Math.ceil(target / duration);
    const timer = setInterval(() => {
        start += step;
        element.textContent = start + "%";
        if (start >= target) {
            element.textContent = target + "%";
            clearInterval(timer);
        }
    }, 15); // Adjust speed of counting here
}

// Function to handle scroll events
function handleScroll() {
    const elements = document.querySelectorAll('.num');
    const windowHeight = window.innerHeight;
    
    elements.forEach(element => {
        const bounding = element.getBoundingClientRect();
        
        // If the element is in the viewport
        if (bounding.top >= 0 && bounding.bottom <= windowHeight) {
            const targetValue = parseInt(element.getAttribute('data-val'));
            const smallElement = element.querySelector('small');
            animateCount(smallElement, targetValue, 2000); // Adjust duration here
            
            // Remove the class to prevent re-triggering the animation
            element.classList.remove('num');
        }
    });
}


// basta smooth scrolling to
$(document).ready(function(){
    // Add smooth scrolling to all links
    $("a").on('click', function(event) {
  
      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== "") {
        // Prevent default anchor click behavior
        event.preventDefault();
  
        // Store hash
        var hash = this.hash;
  
        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 800, function(){
     
          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        });
      } // End if
    });
  });

//   function para sa hamburger scroll 

