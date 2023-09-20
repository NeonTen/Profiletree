jQuery(document).ready(function() {
	// Main menu append to mobile menu.
	jQuery("header nav")
		.clone()
		.removeClass("hidden xl:block")
		.find("ul")
		.removeClass("items-center")
		.addClass("flex-col sm:flex-row mb-6")
		.appendTo(".clone");
});

// Theme switcher.
jQuery("html")
	.removeClass()
	.addClass(localStorage.getItem("theme"));
function setDarkTheme() {
	localStorage.setItem("theme", "dark");
	jQuery("html")
		.removeClass()
		.addClass(localStorage.getItem("theme"));
}
function setLightTheme() {
	localStorage.setItem("theme", "light");
	jQuery("html")
		.removeClass()
		.addClass(localStorage.getItem("theme"));
}
