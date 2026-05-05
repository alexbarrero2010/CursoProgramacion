/** @type {import('tailwindcss').Config} */
module.exports = {
	content: ['./src/**/*.{html,js}'],
	theme: {
		extend: {
			fontFamily: {
				sans: ['Roboto', 'serif'],
				serif: ['Merriweather', 'serif'],
				titulo: ['Oswald, serif'],
			},
			colors: {
				primario: '#62A87C',
				secundario: '#7EE081',
				detalles: {
					100: '#8447FF',
					200: '#4B00E0',
				},
			},
			backgroundImage: {
				hero: "url('./../src/imagenes/comida.svg')",
				hero2: "url('https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?q=80&w=1380&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')",
			},
			keyframes: {
				latido: {
					'0%': { transform: 'scale(1)' },
					'50%': { transform: 'scale(1.1)' },
					'100%': { transform: 'scale(1)' },
				},
			},
			animation: {
				boton: 'latido 1s ease-in-out infinite',
			},
		},
	},
	plugins: [],
};
