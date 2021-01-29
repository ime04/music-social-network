const buttonToLogin = document.getElementById('sign-in');
const buttonToRegister = document.getElementById('register');
const registerButton = document.getElementById('user-register');

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

registerButton.addEventListener('click', () => {
    const userName = document.getElementById('user-name').value;
    const userPass = document.getElementById('user-pass').value;
    const userRepeatPass = document.getElementById('user-repeat-pass').value;
    const userEmail = document.getElementById('user-email').value;

    if (userPass !== userRepeatPass) {
        alert('Por favor rellene bien la contraseña');
        return false;
    }

    const formData = new FormData();
    formData.append('username', userName);
    formData.append('password', userPass);
    formData.append('email', userEmail);

    fetch('http://vps551323.ovh.net/user/register', {
        method: 'POST',
        body: formData
    }).json().then(response => {
        console.log(response);
    });
});

//INPUT CONST
/*const nameField = document.getElementById('name-field');
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
*/