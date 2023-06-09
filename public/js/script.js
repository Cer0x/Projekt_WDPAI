window.onload = function(){

    const form = document.querySelector("form");
    const emailInput = form.querySelector('input[name="email"]');
    const confirmedPasswordInput = form.querySelector('input[name="confirmedPassword"]');


    function isEmail(email) {
        return /\S+@\S+\.\S+/.test(email);
    }

    function arePasswordsEqual(password, confirmedPassword) {
        return password === confirmedPassword;
    }

    function markValidation(element, condition) {
        !condition ? element.classList.add('invalid') : element.classList.remove('invalid');
    }

    function validateEmail() {
        setTimeout(function () {
                markValidation(emailInput, isEmail(emailInput.value));
            },
            1000
        );
    }

    function validatePassword() {
        setTimeout(function () {
                const condition = arePasswordsEqual(
                    confirmedPasswordInput.previousElementSibling.value,
                    confirmedPasswordInput.value
                );
                markValidation(confirmedPasswordInput, condition);
            },
            1000
        );
    }

    emailInput.addEventListener('keyup', validateEmail);
    confirmedPasswordInput.addEventListener('keyup', validatePassword);
}