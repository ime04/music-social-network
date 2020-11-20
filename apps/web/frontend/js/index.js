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
    const data = {
        username: 'victoraso',
        password: '1234',
        email: 'victor@gmail.com',
    };
    fetch('http://vps551323.ovh.net/user/register', {
        method: 'POST',
        mode: 'cors', // no-cors, *cors, same-origin
        cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
        credentials: 'same-origin', // include, *same-origin, omit
        headers: {
            'Content-Type': 'application/json'
            // 'Content-Type': 'application/x-www-form-urlencoded',
        },
        //redirect: 'follow', // manual, *follow, error
        referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
        body: JSON.stringify(data) // body data type must match "Content-Type" header
    }).then(response => {
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