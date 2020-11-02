const buttonToLogin = document.getElementById('sign-in');
const buttonToRegister = document.getElementById('register');
const registerButton = document.getElementById('register-button');

const formRegister = document.getElementById('register-form');
const formLogin = document.getElementById('login-form');

buttonToLogin.addEventListener('click', () => {
    formLogin.style.display = 'block';
    formRegister.style.display = 'none';
});

buttonToRegister.addEventListener('click', () => {
    formLogin.style.display = 'none';
    formRegister.style.display = 'block';
});

//INPUT CONST
const nameField = document.getElementById('name-field');
const passwordField = document.getElementById('password-field');
const repeatPasswordField = document.getElementById('repeat-password-field');
const emailField = document.getElementById('email-field');
const errorElement = document.getElementById('error');

formRegister.addEventListener('submit', (e) =>{
    let errorMessages = [];
    validateField(nameField)
    validateField(passwordField)
    validateField(repeatPasswordField)
    validateField(emailField)
})

function validateField(field){
    if(field.value === '' || field.value === null){
        field.style.backgroundColor = '#df6464';
    } else {
        field.style.backgroundColor = '';
    }
}
