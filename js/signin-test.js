
function validateEmail() {
    const emailField = document.getElementById("email");
    const emailError = document.getElementById("emailError");
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.(com)$/;

    if (!emailPattern.test(emailField.value)) {
        emailError.style.display = "block";
        emailField.focus();
        return false; // Prevent form submission
    } else {
        emailError.style.display = "none";
        return true; // Allow form submission
    }
}

