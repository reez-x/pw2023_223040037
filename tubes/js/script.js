// let menu = document.querySelector("#menu-icon");
// let nav = document.querySelector('nav');
// let text = document.querySelector('text');
// let awan1 = document.getElementById('awan1');
// let awan2 = document.getElementById('awan2');

// // menu.onclick = () => {
// // 	menu.classList.toggle('bx-x');
// // 	nav.classList.toggle('active');
// // }

// window.addEventListener('scroll', () => {
// 	let value = window.scrollY;
	
// 	text.style.marginTop = value * 2.5 + 'px';
// 	// awan1.style.top = value * -1.5 + 'px';
// 	// awan1.style.left = value * 1.5 + 'px';
// 	// awan2.style.left = value * -1.5 + 'px';
// });

// Parallax
let text = document.getElementById('text');
let awan1 = document.getElementById('awan1');
let awan2 = document.getElementById('awan2');

window,addEventListener('scroll', () => {
	let value = window.scrollY;

	text.style.marginTop = value * 2.5 + 'px';
	awan1.style.left = value * 1.5 + 'px';
	awan2.style.left = value * -1.5 + 'px';
});

var counter=1;
    setInterval(function(){
        document.getElementById('radio' + counter).checked=true;
        counter++;
        if(counter > 3){
            counter = 1;
        }
},4000);


// Header
// const header = document.querySelector("header");

// window.addEventListener ("scroll", function() {
// 	header.classList.toggle ("sticky", window.scrollY > 0);
// });


// Login
const registerButton = document.getElementById("register");
const loginButton = document.getElementById("login");
const container = document.getElementById("container");

registerButton.addEventListener("click", () => {
  container.classList.add("right-panel-active");
});

loginButton.addEventListener("click", () => {
  container.classList.remove("right-panel-active");
});



// Login Show Password
function togglePasswordVisibility() {
  var passwordInput = document.getElementById("password");
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
  } else {
    passwordInput.type = "password";
  }

}

function togglePasswordVisibilityRegister() {
  var passwordInputReg = document.getElementById("passwordreg");
  var passwordInput2 = document.getElementById("password2");
  if (passwordInputReg.type === "password") {
    passwordInputReg.type = "text";
  } else {
    passwordInputReg.type = "password";
  }
  if (passwordInput2.type === "password") {
    passwordInput2.type = "text";
  } else {
    passwordInput2.type = "password";
  }
}