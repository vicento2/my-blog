const loginModal = document.getElementById('loginModal');
const signupModal = document.getElementById('signupModal');
const openLoginModal = document.getElementById('openLoginModal');
const openSignupModal = document.getElementById('openSignupModal');
const closeLogin = document.getElementById('closeLogin');
const closeSignup = document.getElementById('closeSignup');

openLoginModal.addEventListener('click', () => {
    loginModal.style.display = 'flex';
});

closeLogin.addEventListener('click', () => {
    loginModal.style.display = 'none';
});

openSignupModal.addEventListener('click', () => {
    signupModal.style.display = 'flex';
});

closeSignup.addEventListener('click', () => {
    signupModal.style.display = 'none';
});

document.getElementById('exitBtn').addEventListener('click', () => {
    if (confirm("Are you sure you want to exit?")) {
        window.close();
    }
});

document.getElementById('loginForm').addEventListener('submit', (e) => {
    e.preventDefault();
    const username = document.getElementById('loginUsername').value;
    const password = document.getElementById('loginPassword').value;
    alert(`Welcome back, ${username}!`);
    loginModal.style.display = 'none';
});

document.getElementById('signupForm').addEventListener('submit', (e) => {
    e.preventDefault();
    const username = document.getElementById('signupUsername').value;
    const password = document.getElementById('signupPassword').value;
    alert(`Account created for ${username}!`);
    signupModal.style.display = 'none';
});

window.addEventListener('click', (e) => {
    if (e.target === loginModal) loginModal.style.display = 'none';
    if (e.target === signupModal) signupModal.style.display = 'none';
});
const loginModal = document.getElementById('loginModal');
const signupModal = document.getElementById('signupModal');
const openLoginModal = document.getElementById('openLoginModal');
const openSignupModal = document.getElementById('openSignupModal');
const closeLogin = document.getElementById('closeLogin');
const closeSignup = document.getElementById('closeSignup');

openLoginModal.addEventListener('click', () => {
    loginModal.style.display = 'flex';
});

closeLogin.addEventListener('click', () => {
    loginModal.style.display = 'none';
});

openSignupModal.addEventListener('click', () => {
    signupModal.style.display = 'flex';
});

closeSignup.addEventListener('click', () => {
    signupModal.style.display = 'none';
});

document.getElementById('exitBtn').addEventListener('click', () => {
    if (confirm("Are you sure you want to exit?")) {
        window.close();
    }
});

document.getElementById('loginForm').addEventListener('submit', (e) => {
    e.preventDefault();
    const username = document.getElementById('loginUsername').value;
    const password = document.getElementById('loginPassword').value;
    alert(`Welcome back, ${username}!`);
    loginModal.style.display = 'none';
});

document.getElementById('signupForm').addEventListener('submit', (e) => {
    e.preventDefault();
    const username = document.getElementById('signupUsername').value;
    const password = document.getElementById('signupPassword').value;
    alert(`Account created for ${username}!`);
    signupModal.style.display = 'none';
});

window.addEventListener('click', (e) => {
    if (e.target === loginModal) loginModal.style.display = 'none';
    if (e.target === signupModal) signupModal.style.display = 'none';
});
