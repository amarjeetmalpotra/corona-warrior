// Login form
document.getElementById("login-form").addEventListener("submit", function (e) {
	e.preventDefault();
	const phone = document.getElementById("login-phone").value;
	const pass = document.getElementById("login-pass").value;
	const formData = new FormData(this);
	if (phone.length != 10 || isNaN(phone)) {
		toast("Enter valid phone number");
	} else if (pass.length < 6) {
		toast("Invalid password");
	} else {
		// Animate login button
		const btn = document.getElementById("login-btn");
		btn.disabled = true;
		btn.innerHTML =
			"Logging in <span class='spinner-border' role='status' aria-hidden='true' style='height: 1.5rem; width: 1.5rem'></span>";
		// Fetch API
		fetch("php/auth.php", {
			method: "post",
			body: formData,
		})
			.then((response) => {
				return response.text();
			})
			.then((text) => {
				if (text == "loggedin") {
					window.location = "dashboard.php";
				} else {
					toast(text);
				}
				btn.disabled = false;
				btn.innerHTML = "Login";
			})
			.catch((error) => {
				toast(error);
				btn.disabled = false;
				btn.innerHTML = "Login";
			});
	}
});
// Request account/signup form
document.getElementById("signup-form").addEventListener("submit", function (e) {
	e.preventDefault();
	const name = document.getElementById("name").value;
	const phone = document.getElementById("phone").value;
	const pass = document.getElementById("signup-pass").value;
	const cpass = document.getElementById("confirm-pass").value;
	const terms = document.getElementById("terms");
	const formData = new FormData(this);
	if (name === "") {
		toast("Enter your name");
	} else if (phone.length != 10 || isNaN(phone)) {
		toast("Enter valid phone number");
	} else if (pass.length < 6) {
		toast("Password must be atleast 6 characters");
	} else if (pass != cpass) {
		toast("Password doesn't match");
	} else if (!terms.checked) {
		toast("You must agree terms");
	} else {
		// Animate request button
		const btn = document.getElementById("signup-btn");
		btn.disabled = true;
		btn.innerHTML =
			"Processing <span class='spinner-border' role='status' aria-hidden='true' style='height: 1.5rem; width: 1.5rem'></span>";
		// Fetch API
		fetch("php/reg.php", {
			method: "post",
			body: formData,
		})
			.then((response) => {
				return response.text();
			})
			.then((text) => {
                toast(text);
                document.getElementById("signup-form").reset();
				btn.disabled = false;
				btn.innerHTML = "Request Account";
			})
			.catch((error) => {
				toast(error);
				btn.disabled = false;
				btn.innerHTML = "Request Account";
			});
	}
});
// Signup panel
document.getElementById("open-signup").addEventListener("click", () => {
	document.getElementById("login-panel").style.display = "none";
	document.getElementById("signup-panel").style.display = "block";
});
// Login panel
document.getElementById("open-login").addEventListener("click", () => {
	document.getElementById("signup-panel").style.display = "none";
	document.getElementById("login-panel").style.display = "block";
});
