let emailInput = document.getElementById('email');
let passwordInput = document.getElementById('password');

function login() {
    if (emailInput.value === "") {
        emailInput.focus();
        return alert("Ju lutem shenoni nje email.")
    }

    if (passwordInput.value === "") {
        passwordInput.focus();
        return alert("Ju lutem shenoni nje password.")
    }

    if(!emailIsValid(emailInput.value)) {
        emailInput.focus()
        return alert("Emaili i shenuar nuk eshte valid.")
    }

    if (!passwordIsValid(passwordInput.value)) {
        passwordInput.focus()
        return alert("Passwordi duhet te jete mbi 6 karaktere.")
    }
}

function emailIsValid(email) {
    const emailRegex = /^([A-Za-z0-9_\-.])+@([A-Za-z0-9_\-.])+\.([A-Za-z]{2,4})$/;

    return emailRegex.test(email);
}

function passwordIsValid(password) {
    return password.length > 6
}
