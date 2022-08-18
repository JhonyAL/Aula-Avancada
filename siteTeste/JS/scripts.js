// FORM STYLE

var email = document.getElementById('email');
var password = document.getElementById('password');

email.addEventListener('focus', () => {
    email.style.borderColor = "#4A5F6A";
});

email.addEventListener('blur', () => {
    email.style.borderColor = "#ccc";
});

password.addEventListener('focus', () => {
    password.style.borderColor = "#4A5F6A";
});

password.addEventListener('blur', () => {
    password.style.borderColor = "#ccc";
});

// FORM FUNÇÃO

// const btn = document.querySelector("#send");

// btn.addEventListener("click", function(e) {

//     e.preventDefault();

//     const email = document.querySelector("#email");
//     const password = document.querySelector("#password");

//     const valueE = email.value;
//     const valueP = password.value;

//     console.log(valueE);
//     console.log(valueP);

// });

