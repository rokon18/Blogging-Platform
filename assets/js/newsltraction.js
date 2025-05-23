function validateForm() {
  let email = document.getElementById("email").value.trim();
  let consent = document.getElementById("consent").checked;
  let isValid = true;


  document.getElementById("emailError").textContent = "";
  document.getElementById("consentError").textContent = "";

  if (email === "") {
    document.getElementById("emailError").textContent = "Email is required.";
    isValid = false;
  } else {
    let emailPattern = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;
    if (!emailPattern.test(email)) {
      document.getElementById("emailError").textContent = "Invalid email format.";
      isValid = false;
    }
  }

  if (!consent) {
    document.getElementById("consentError").textContent = "You must agree to the privacy policy.";
    isValid = false;
  }

  return isValid;
}
