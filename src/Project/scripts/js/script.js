window.onload = function () {

  var menuBtn = document.querySelector('.menu-btn');
  var nav = document.querySelector('nav');
  var lineOne = document.querySelector('nav .menu-btn .line--1');
  var lineTwo = document.querySelector('nav .menu-btn .line--2');
  var lineThree = document.querySelector('nav .menu-btn .line--3');
  var searchInput = document.getElementById('searchContainer');
  var searchButton = document.getElementById('search');
  var link = document.querySelector('nav .nav-links');
  menuBtn.addEventListener('click', () => {
    nav.classList.toggle('nav-open');
    lineOne.classList.toggle('line-cross');
    lineTwo.classList.toggle('line-fade-out');
    lineThree.classList.toggle('line-cross');
    link.classList.toggle('fade-in');
  })
  document.addEventListener('click', function (event) {
    if (event.target !== document.getElementById('searchInput')) {
      searchInput.style.width = "100px";
      searchInput.style.transition = "width 1s";
    }
  });
  document.getElementById('searchContainer').onclick = function (event) {
    event.stopPropagation();
    searchInput.style.width = "350px";
    searchInput.style.transition = "width 1.4s";
  }
  searchButton.onclick = function () {
    searchInput.style.width = "100px";
    searchInput.style.transition = "width 1s";
  }


}
function registerFormChecker(event) {
  event.preventDefault(); // Prevent form submission

  var firstName = document.getElementById("name").value;
  var lastName = document.getElementById("lname").value;
  var email = document.getElementById("email").value;
  var password1 = document.getElementById("pass1").value;
  var password2 = document.getElementById("pass2").value;

  // Get alert elements
  var nameAlert = document.getElementById("nameAlert");
  var surnameAlert = document.getElementById("surnameAlert");
  var passwordAlert = document.getElementById("passwordAlert");
  var noMatchAlert = document.getElementById("noMatchAlert");
  var confirmPasswordAlert = document.getElementById("confirmPasswordAlert");
  var emailAlert = document.getElementById("emaillert");

  // Reset alerts
  nameAlert.classList.add("hidden");
  surnameAlert.classList.add("hidden");
  passwordAlert.classList.add("hidden");
  noMatchAlert.classList.add("hidden");
  confirmPasswordAlert.classList.add("hidden");
  emailAlert.classList.add("hidden");


    // Validate and sanitize inputs
    var isValid = true;

    // First Name validation (not empty)
    if (firstName.trim() === "") {
        nameAlert.classList.remove("hidden");
        nameAlert.classList.add("visible");
        isValid = false;
    }

    // Last Name validation (not empty)
    if (lastName.trim() === "") {
        surnameAlert.classList.remove("hidden");
        surnameAlert.classList.add("visible");
        isValid = false;
    }

    // Password validation (not empty)
    if (password1.trim() === "") {
        passwordAlert.classList.remove("hidden");
        passwordAlert.classList.add("visible");
        isValid = false;
    }

    // Confirm Password validation (not empty, match with Password)
    if (password2.trim() === "") {
        confirmPasswordAlert.classList.remove("hidden");
        confirmPasswordAlert.classList.add("visible");
        isValid = false;
    } else if (password1 !== password2) {
        noMatchAlert.classList.remove("hidden");
        noMatchAlert.classList.add("visible");
        isValid = false;
    }

    // Email validation (correct format)
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        emailAlert.classList.remove("hidden");
        emailAlert.classList.add("visible");
        isValid = false;
    }

    if (isValid) {
        // Form is valid, proceed with form submission
        document.getElementById("form").submit();
    }


  // After validation and sanitization, submit the form manually
  document.getElementById("register-form").submit();
}