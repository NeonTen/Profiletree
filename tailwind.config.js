module.exports = {
	content: ["**/*.{html,php,svg}", "js/custom.js", "../../**/*.php"],
	darkMode: "class",
	theme: {
		container: {
			center: true,
			padding: {
				xs: "1rem",
				DEFAULT: "1.5rem",
				lg: "2rem",
				"2xl": "2rem",
			},
		},
		extend: {
			colors: {
				"primary-color": "var(--clr-primary)",
				"hover-color": "var(--clr-hover)",
				"text-color": "var(--clr-text)",
				"light-color": "var(--clr-light)",
				"dark-color": "var(--clr-dark)",
				"border-color": "var(--clr-border)",
				"d-body-color": "var(--clr-d-body)",
				"d-dark-color": "var(--clr-d-dark)",
			},
			screens: {
				xs: "480px",
				"2xl": "1300px",
			},
			fontSize: {
				"65": "4.063rem",
				"45": "2.813rem",
			},
			transitionProperty: {
				height: "height",
				spacing: "margin, padding",
			},
		},
	},
	plugins: [require("@tailwindcss/forms")],
	safelist: ["items-end"],
};
