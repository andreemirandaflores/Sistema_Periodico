const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.querySelector('.container');

signUpButton.addEventListener('click', () => {
  container.classList.add('right-panel-active');
});

signInButton.addEventListener('click', () => {
  container.classList.remove('right-panel-active');
});

/*Mobile*/
document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.querySelector('.mobile-login');
    const registerForm = document.querySelector('.mobile-register');

    document.getElementById('show-register').addEventListener('click', (e) => {
        e.preventDefault();
        loginForm.classList.remove('active');
        setTimeout(() => {
            registerForm.classList.add('active');
        }, 300);
    });

    document.getElementById('show-login').addEventListener('click', (e) => {
        e.preventDefault();
        registerForm.classList.remove('active');
        setTimeout(() => {
            loginForm.classList.add('active');
        }, 300);
    });
});

