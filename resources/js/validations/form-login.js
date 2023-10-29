var passwordField = document.getElementById('password');
var emailField = document.getElementById('email');

passwordField.addEventListener('input', function() {
    var password = passwordField.value;
    if (password.length < 8) {
        passwordField.setCustomValidity('A senha deve ter pelo menos 8 caracteres.');
    } else {
        passwordField.setCustomValidity('');
    }
});

emailField.addEventListener('input', function() {
    var email = emailField.value;
    if (!isValidEmail(email)) {
        emailField.setCustomValidity('Por favor, insira um email válido.');
    } else {
        emailField.setCustomValidity('');
    }
});

function isValidEmail(email) {
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return emailPattern.test(email);
}
