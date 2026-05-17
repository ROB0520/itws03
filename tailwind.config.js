/**
 * Tailwind configuration generated from views/partials/head.php theme variables
 */
module.exports = {
	content: [
		'./public/**/*.php',
		'./views/**/*.php',
		'./**/*.php'
	],
	theme: {
		extend: {
			colors: {
				background: '#FAFAFA',
				foreground: '#000000',
				primary: '#3F51B5',
				accent: '#4CAF50',
				card: '#FFFFFF',
				heading: '#000000',
				link: '#FFFFFF',
				tag: '#FFFFFF',
				'tag-foreground': '#000000',
				footer: '#000000',
				border: '#E0E0E0',
				input: '#FFFFFF',
			},
			fontFamily: {
				heading: ["Libre Baskerville", 'serif'],
				body: ["Figtree", 'sans-serif']
			},
			borderRadius: {
				DEFAULT: '0.5rem',
				sm: 'calc(0.5rem * 0.6)',
				md: 'calc(0.5rem * 0.8)',
				lg: '0.5rem',
				xl: 'calc(0.5rem * 1.4)',
				'2xl': 'calc(0.5rem * 1.8)',
				'3xl': 'calc(0.5rem * 2.2)',
				'4xl': 'calc(0.5rem * 2.6)'
			}
		}
	},
	plugins: []
}

