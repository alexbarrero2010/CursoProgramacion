const cargarContador = () => {
	const imagen = document.getElementById('imagen');
	const cuenta = document.getElementById('cuenta');

	imagen.addEventListener('click', () => {
		cuenta.innerHTML = parseInt(cuenta.innerText) + 1;
	});
};

export default cargarContador;
