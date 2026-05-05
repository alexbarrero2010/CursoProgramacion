const btn = document.getElementById('btn-menu');
const contenedorNavbar = document.getElementById('contenedor-navbar');

btn.addEventListener('click', (e) => {
	e.preventDefault();
	contenedorNavbar.classList.toggle('active');
});

contenedorNavbar.addEventListener('click', (e) => {
	if (e.target === contenedorNavbar) {
		contenedorNavbar.classList.remove('active');
	}
});
