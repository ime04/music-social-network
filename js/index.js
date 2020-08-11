var buttonToLogin = document.getElementById('sign-in');
var buttonToRegister = document.getElementById('register');

var formRegister = document.getElementById('register-form');
var formLogin = document.getElementById('login-form');

buttonToLogin.addEventListener('click', () => {
    formLogin.style.display = 'block';
    formRegister.style.display = 'none';
});

buttonToRegister.addEventListener('click', () => {
    formLogin.style.display = 'none';
    formRegister.style.display = 'block';
});