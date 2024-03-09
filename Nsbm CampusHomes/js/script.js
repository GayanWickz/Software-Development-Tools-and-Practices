let searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = () =>{
    searchForm.classList.toggle('active'); 
    navbar.classList.remove('active');
}

let navbar = document.querySelector('.navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
}

window.onscroll = () =>{

    searchForm.classList.remove('active');
    navbar.classList.remove('active');
}

/* click the login icon and direct to login form*/

document.addEventListener('DOMContentLoaded', function() {
    // Find the element by its id
    var loginBtn = document.getElementById('login-btn');

    // Add a click event listener
    loginBtn.addEventListener('click', function() {
      // Redirect to login.jsp
      window.location.href = 'login.jsp';
    });
  });



/* click the cart icon and direct to Cart*/

document.addEventListener('DOMContentLoaded', function() {
    // Find the element by its id
    var cartBtn = document.getElementById('cart-btn');

    // Add a click event listener
    cartBtn.addEventListener('click', function() {
      // Redirect to login.jsp
      window.location.href = 'cart.jsp?userEmail=' + encodeURIComponent(userEmail);
    });
  });







  /* login form -> registration form */

  function Registration() {
    window.location.href = "registration.jsp";

  }

  /* registration form -> login form */

  function Login(){
    window.location.href ="login.jsp";
  }



/* Slider header */

const myslide = document.querySelectorAll('.myslider'),
    dot = document.querySelectorAll('.dot');

let counter = 1;
slidefun(counter);

let timer = setInterval(autoslide, 8000);
function autoslide(){
    counter += 1;
    slidefun(counter);
}

function plusSlides(n){
    counter += n;
    slidefun(counter);
    resetTimer();
}

function currentSlide(n){
    counter = n;
    slidefun(counter);
    resetTimer();
}

function resetTimer(){
    clearInterval(timer);
    timer = setInterval(autoslide, 8000);
}

function slidefun(n){
    let i;
    for(i=0;i<myslide.length;i++){
        myslide[i].style.display = "none";
    }

    for(i=0;i<dot.length;i++){
        dot[i].classList.remove('active');
    }

    if(n>myslide.length){
        counter = 1;
    }
    if(n<1){
        counter = myslide.length;
    }

    myslide[counter-1].style.display = "block";
    dot[counter-1].classList.add('active');
}


document.addEventListener('DOMContentLoaded', function () {
  //  displayCart();
    console.log(userEmail);

    // Add event listener for logout link
    const logoutLink = document.getElementById('logout-btn');
    if (logoutLink) {
        logoutLink.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent the default behavior of the anchor tag
          //  ClearCart();
            // Add logic to redirect to the logout servlet
            window.location.href = '/LogoutServlet'; // Replace with the actual logout URL
        });
    }
});