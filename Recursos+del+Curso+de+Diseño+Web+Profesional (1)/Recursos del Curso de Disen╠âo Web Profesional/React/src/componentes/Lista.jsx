import Contacto from './Contacto';

const Lista = ({ titulo = 'Lista de contactos', contactos = [] }) => {
	return (
		<section className="lista">
			<h3 className="titulo">{titulo}</h3>
			{contactos.map((contacto, index) => {
				return <Contacto key={index} nombre={contacto.nombre} telefono={contacto.telefono} />;
			})}
		</section>
	);
};

export default Lista;
