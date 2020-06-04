// DOM loaded callback
document.addEventListener("DOMContentLoaded", () => {
    // Dynamic copyright year
    document.getElementById("copy-year").innerHTML = new Date().getFullYear();
});
// Toast handler
const toast = (msg) => {
	const alertbox = document.getElementById("alert");
	alertbox.innerHTML =
		msg +
		" !";
	alertbox.style.transform = "translateY(0)";
	setTimeout(() => {
		alertbox.style.transform = "translateY(-150px)";
	}, 5000);
};
// Navbar toggle button
document.getElementById("menu-toggle").addEventListener("click", () => {
    const nav = document.getElementById("menu-bar");
    const navBtn = document.getElementById("menu-toggle");
	if (navBtn.className === "menu-toggle") {
        navBtn.className += " toggled";
        nav.className += " responsive";
	} else {
        navBtn.className = "menu-toggle";
        nav.className = "menu shadow";
	}
});
