function togglePassword() {
    var passwordField = document.getElementById("password");
    var toggleIcon = document.querySelector(".toggle-password");

    if (passwordField.type === "password") {
        passwordField.type = "text";
        toggleIcon.textContent = "🙈";  // Change the icon to a crossed-eye emoji
    } else {
        passwordField.type = "password";
        toggleIcon.textContent = "👁";  // Revert to eye emoji
    }
}