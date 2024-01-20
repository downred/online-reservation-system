
let nameInput = document.getElementById('name')
let lastNameInput = document.getElementById('lastname')
let confirmPasswordInput = document.getElementById('password_confirm')
let emailInput = document.getElementById('email');
let passwordInput = document.getElementById('password');

let errorMsgSpan = document.getElementsByClassName('err-msg')[0]
let allInputs = [nameInput, lastNameInput, confirmPasswordInput, emailInput, passwordInput]

function signup(e) {
    e.preventDefault()

    if (allInputs.some(input => !input.value)) {
        console.log("true?")
        nameInput.focus()
        return showErrorMsg('all', "Ju lutem shenoni te gjitha te dhenat.")
    }

    if (nameIsInvalid(nameInput.value)) {
        nameInput.focus()
        return showErrorMsg('name', "Emri juaj nuk mund te permbaje numra.")
    }

    if (nameIsInvalid(lastNameInput.value)) {
        lastNameInput.focus()
        return showErrorMsg('lastname', "Mbiemri juaj nuk mund te permbaje numra.")
    }

    if (emailInput.value === "" || !emailIsInvalid(emailInput.value)) {
        emailInput.focus();
        return showErrorMsg('email',"Ju lutem shenoni nje email valide.")
    }

    if (!passwordIsValid(passwordInput.value)) {
        passwordInput.focus()
        return showErrorMsg('password', "Passwordi duhet te jete mbi 6 karaktere.")
    }

    if (passwordInput.value !== confirmPasswordInput.value) {
        return showErrorMsg('pwNotMatching', "Passwordet e dhene nuk jane te njejte.")
    }

    resetErrorMsg();
    return true;
    // window.location.href = "../success.html";
}

function showErrorMsg(errorType, msg) {
    if (errorType === 'email') {
        emailInput.style.border = '1px solid red';
        resetInputBorders(emailInput)
    } else if (errorType === 'password') {
        passwordInput.style.border = '1px solid red';
        resetInputBorders(passwordInput)
    } else if (errorType === 'name') {
        nameInput.style.border = '1px solid red';
        resetInputBorders(nameInput)
    } else if (errorType === 'lastname') {
        lastNameInput.style.border = '1px solid red';
        resetInputBorders(lastNameInput)
    } else if (errorType === 'pwNotMatching') {
        passwordInput.style.border = "1px solid red"
        confirmPasswordInput.style.border = "1px solid red"
        resetInputBorders(passwordInput, confirmPasswordInput)
    }
    else {
        allInputs.forEach(input => input.style.border = "1px solid red")
    }

    errorMsgSpan.innerHTML = msg;
}

function emailIsInvalid(email) {
    const emailRegex = /^([A-Za-z0-9_\-.])+@([A-Za-z0-9_\-.])+\.([A-Za-z]{2,4})$/;

    return emailRegex.test(email);
}

function nameIsInvalid(name) {
    const nameRegex = /\d/

    return nameRegex.test(name)
}

function passwordIsValid(password) {
    return password.length > 6
}

function resetErrorMsg() {
    errorMsgSpan.innerHTML = "";
    allInputs.forEach(input => input.style.border = "1px solid")
}

function resetInputBorders(...args) {
    allInputs.filter(input => !args.includes(input)).forEach(input => input.style.border = "1px solid")
}
