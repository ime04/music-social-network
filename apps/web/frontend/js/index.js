const logginButton = document.getElementById('sign-in');
const buttonToRegister = document.getElementById('register');
const registerButton = document.getElementById('user-register');

const formRegister = document.getElementById('register-form');
const formLogin = document.getElementById('login-form');

logginButton.addEventListener('click', () => {
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
    }).then(response => response.json())
        .then(data => console.log(data)); //TODO hacer un login y meterte dentro de la plataforma
});

    logginButton.addEventListener('click', () => {
        const user = document.getElementById('user-name-login').value;
        const pass = document.getElementById('pass-login').value;

        fetch('http://vps551323.ovh.net/user/login', {
            method: 'GET',
            body: formLogin
        }).then(response => {
            //if(response.success) {
            console.log('hola', JSON.parse(response.success));
            //}
            // return response.json();
        })


    });