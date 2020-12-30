const form = document.querySelector("form");
const oldPasswordInput = document.querySelector('input[name="old_password"]');
const newPasswordInput = document.querySelector('input[name="new_password"]');
const confirmedPasswordInput = document.querySelector('input[name="repeated_password"]');

function isCorrectPassword(password) {
    return /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&-+=()])[0-9a-zA-Z!@#$%^&-+=()]{8,}$/.test(password);
}

function arePasswordsTheSame(password, confirmedPassword) {
    return password === confirmedPassword;
}

function markValidation(element, condition) {
    !condition ? element.classList.add("not-valid") : element.classList.remove("not-valid");
}

function validatePassword() {
    setTimeout(function() {
            markValidation(newPasswordInput, isCorrectPassword(newPasswordInput.value))
        }, 
        1000);
}

function confirmPassword() {
    setTimeout(function() {
            const condition = arePasswordsTheSame(
                newPasswordInput.value, 
                confirmedPasswordInput.value
            );
            markValidation(confirmedPasswordInput, condition)
        }, 
        1000);
}

newPasswordInput.addEventListener('keyup', validatePassword);
confirmedPasswordInput.addEventListener('keyup', confirmPassword);