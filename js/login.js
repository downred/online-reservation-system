let emailInput = document.getElementById('email');
let passwordInput = document.getElementById('password');
let errorMsgSpan = document.getElementsByClassName('err-msg')[0]

function login(e) {
    e.preventDefault()

    if (emailInput.value === "" || passwordInput.value === "") {
        emailInput.focus();
        return showErrorMsg('both',"Ju lutem shenoni te gjitha te dhenat.")
    }

    if (emailInput.value === "" || !emailIsValid(emailInput.value)) {
        emailInput.focus();
        return showErrorMsg('email',"Ju lutem shenoni nje email valide.")
    }

    if (!passwordIsValid(passwordInput.value)) {
        passwordInput.focus()
        return showErrorMsg('password', "Passwordi duhet te jete mbi 6 karaktere.")
    }



    errorMsgSpan.innerHTML = "";
    passwordInput.style.border = '1px solid';
    emailInput.style.border = '1px solid';
    window.location.href = "../success.html";
}

function showErrorMsg(inputType, msg) {

    if (inputType === 'email') {
        emailInput.style.border = '1px solid red';
        passwordInput.style.border = '1px solid';
    } else if (inputType === 'password') {
        emailInput.style.border = '1px solid';
        passwordInput.style.border = '1px solid red';
    } else {
        passwordInput.style.border = '1px solid red';
        emailInput.style.border = '1px solid red';
    }

    errorMsgSpan.innerHTML = msg;
}

function emailIsValid(email) {
    const emailRegex = /^([A-Za-z0-9_\-.])+@([A-Za-z0-9_\-.])+\.([A-Za-z]{2,4})$/;

    return emailRegex.test(email);
}

function passwordIsValid(password) {
    return password.length > 6
}
