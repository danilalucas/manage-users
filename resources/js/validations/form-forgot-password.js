var emailField = document.getElementById('email');

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
