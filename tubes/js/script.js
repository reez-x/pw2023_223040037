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
let text = document.getElementById('text');
let awan1 = document.getElementById('awan1');
let awan2 = document.getElementById('awan2');

window,addEventListener('scroll', () => {
	let value = window.scrollY;

	text.style.marginTop = value * 2.5 + 'px';
	awan1.style.left = value * 1.5 + 'px';
	awan2.style.left = value * -1.5 + 'px';
});