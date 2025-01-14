const signinBtn = document.getElementById('signin');
const signupBtn = document.getElementById('signup');
const firstForm = document.querySelector('.first-content');
const secondForm = document.querySelector('.second-content');

signinBtn.addEventListener('click', () => {
    firstForm.style.display = 'flex';
    secondForm.style.display = 'none';
});

signupBtn.addEventListener('click', () => {
    secondForm.style.display = 'flex';
    firstForm.style.display = 'none';
});
