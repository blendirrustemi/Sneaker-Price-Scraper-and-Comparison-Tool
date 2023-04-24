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
  
      var firstNamePattern = /^[a-zA-Z]+$/;
      if (firstName.trim() === "" || !firstNamePattern.test(firstName)) {
          nameAlert.classList.remove("hidden");
          nameAlert.classList.add("visible");
          isValid = false;
      }
  
      // Last Name validation (not empty, only letters)
      var lastNamePattern = /^[a-zA-Z]+$/;
      if (lastName.trim() === "" || !lastNamePattern.test(lastName)) {
          surnameAlert.classList.remove("hidden");
          surnameAlert.classList.add("visible");
          isValid = false;
      }  
      // Password validation (not empty)
      if (password1.trim() === ""  || password1.length < 8) {
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
      if(email === ""){
        emailEmptyAlert.classList.remove("hidden");
        emailEmptyAlert.classList.add("visible");
        isValid = false;
      }else if (!emailPattern.test(email)) {
          emailAlert.classList.remove("hidden");
          emailAlert.classList.add("visible");
          isValid = false;
      }
  
      if (isValid) {
          // Form is valid, proceed with form submission
          event.target.submit();
      }
  }

  function loginFormChecker(event) {
    event.preventDefault(); // Prevent form submission
  
    var email = document.getElementById("emailLogin").value;
    var password = document.getElementById("passwordLogin").value;
  
    // Get alert elements
    var emailLoginAlert = document.getElementById("emailLoginAlert");
    var passwordLoginAlert = document.getElementById("passwordLoginAlert");

  
    // Reset alerts
    emailLoginAlert.classList.add("hidden");
    passwordLoginAlert.classList.add("hidden");
  
  
      // Validate and sanitize inputs
      var isValid = true;
      // Password validation (not empty)
      if (password.trim() === ""  || password.length < 8) {
        passwordLoginAlert.classList.remove("hidden");
        passwordLoginAlert.classList.add("visible");
          isValid = false;
      }
  
      // Email validation
      if(email === ""){
        emailLoginAlert.classList.remove("hidden");
        emailLoginAlert.classList.add("visible");
        isValid = false;
      }
  
      if (isValid) {
          // Form is valid, proceed with form submission
          event.target.submit();
      }
  
  
    // After validation and sanitization, submit the form manually
  }