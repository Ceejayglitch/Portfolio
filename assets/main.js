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

// // Function to handle scroll events
// function handleScroll() {
//     const elements = document.querySelectorAll('.num');
//     const windowHeight = window.innerHeight;
    
//     elements.forEach(element => {
//         const bounding = element.getBoundingClientRect();
        
//         // If the element is in the viewport
//         if (bounding.top >= 0 && bounding.bottom <= windowHeight) {
//             const targetValue = parseInt(element.getAttribute('data-val'));
//             const smallElement = element.querySelector('small');
//             animateCount(smallElement, targetValue, 2000); // Adjust duration here
            
//             // Remove the class to prevent re-triggering the animation
//             element.classList.remove('num');
//         }
//     });
// }

// // Add event listener for scroll events
// window.addEventListener('scroll', handleScroll);

// // Initial check in case elements are already in view
// handleScroll();

// //progress bar
// // Get all the small elements containing the value
// const smallElements = document.querySelectorAll('small');

// // Iterate over each small element
// smallElements.forEach(smallElement => {
//     // Get the target value from the small element
//     const targetValue = parseInt(smallElement.textContent);
//     // Calculate the target width based on the target value
//     const targetWidth = targetValue + "%";

//     // Get the corresponding progress bar element
//     const progressBarId = smallElement.parentElement.nextElementSibling.querySelector('.progress-bar');
//     const progressBar = document.getElementById(progressBarId.id);

//     // Set the custom property to the target width
//     progressBar.style.setProperty('--target-width', targetWidth);

//     // Apply animation to the progress bar
//     progressBar.classList.add('animate-progress');
// });



// Function to handle scroll events
function handleScroll() {
    const elements = document.querySelectorAll('.num');
    const smallElements = document.querySelectorAll('small');
    const windowHeight = window.innerHeight;

    // Iterate over each small element
    smallElements.forEach(smallElement => {
        // Get the target value from the small element
        const targetValue = parseInt(smallElement.textContent);
        // Calculate the target width based on the target value
        const targetWidth = targetValue + "%";

        // Get the corresponding progress bar element
        const progressBarId = smallElement.parentElement.nextElementSibling.querySelector('.progress-bar');
        const progressBar = document.getElementById(progressBarId.id);

        // Set the custom property to the target width
        progressBar.style.setProperty('--target-width', targetWidth);

        // Apply animation to the progress bar
        progressBar.classList.add('animate-progress');
    });

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

// Add event listener for scroll events
window.addEventListener('scroll', handleScroll);

// Initial check in case elements are already in view
handleScroll();